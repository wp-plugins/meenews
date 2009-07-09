<?php
require("Languages.php");
include_once("class.phpmailer.php");
include_once("class.coreTvnews.php");
include_once("class.users.php");
include_once("class.design.php");

/*
 Plugin Name: MEE News
 Plugin URI: http://tierravirtual.com/
 Description: Gestor de usuarios, Gestor de newsletter, asi como de plantillas.
 Author: Daniel Perez, Tierra Virtual
 Version: 1.0
 */

### Cargamos las variables de las tablas

global $wpdb;
// Extra information about panels
define('TVNEWS_CATEGORY', (isset($current_blog)?$wpdb->base_prefix:$wpdb->prefix)  . 'newscategories');
define('TVNEWS_USERS', (isset($current_blog)?$wpdb->base_prefix:$wpdb->prefix)  . 'newsUsers');
define('TVNEWS_NEWSLETERS', (isset($current_blog)?$wpdb->base_prefix:$wpdb->prefix)  . 'savednewsletters');
if (!function_exists('add_action')) {
	$wp_root = '../../..';
	if (file_exists($wp_root.'/wp-load.php')) {
		require_once($wp_root.'/wp-load.php');
	} else {
		require_once($wp_root.'/wp-config.php');
	}
}
### Function: Iniciamos el generador del menu del back end
add_action('admin_menu', 'newsletter_menu');
function newsletter_menu() {
	if (function_exists('add_menu_page')) {
		add_menu_page(__('Newsletter', 'meenews'), __('Newsletter', 'meenews'), 'manage_newsletter', 'meenews/Configuration.php', '', plugins_url('meenews/tv_newsletter.png'));
	}

    if (function_exists('add_submenu_page')) {
		add_submenu_page('meenews/Configuration.php', __('Configuracion', 'meenews'), __('Configuracion', 'meenews'), 'manage_newsletter', 'meenews/Configuration.php');
        add_submenu_page('meenews/Configuration.php', __('Suscritos y Categorias', 'meenews'), __('Suscritos y Categorias', 'meenews'), 'manage_newsletter', 'meenews/catandsuscribes.php');
        add_submenu_page('meenews/Configuration.php', __('Diseño Newsletter', 'meenews'), __('Diseño Newsletter', 'meenews'), 'manage_newsletter', 'meenews/designNewsletter.php');
        add_submenu_page('meenews/Configuration.php', __('Envios', 'meenews'), __('Envios', 'meenews'), 'manage_newsletter', 'meenews/manageNewsletters.php');
        add_submenu_page('meenews/Configuration.php', __('Desinstalar', 'meenews'), __('Desinstalar', 'meenews'), 'manage_newsletter', 'meenews/uninstall.php');
	}


 
    // Add In Options
    ### Function: Process Subscription
    //add_action('init', array('meenews','frontEndForm'));
    //
	//everytime a page loads we check if new posts are available
	//add_action('init', array('meenews', 'checkAutomaticNewsletter'));


	$role = get_role('administrator');
	if(!$role->has_cap('manage_newsletter')) {
		$role->add_cap('manage_newsletter');
    }
}


### Function: Crea las tablas necesarias
 add_action('admin_menu', 'create_newsletter_tables');
function create_newsletter_tables() {

	add_option("TVnews_last","1970-01-01 00:00:00");
	add_option("TVnews_last_letter","1970-01-01 00:00:00");
    add_option("TVnews_count","5");
    add_option("TVnews_categories","1");
    add_option("TVnews_headImage","neutral.jpg");
	add_option("TVnews_period","manual");
	add_option("TVnewss_template","{TITLE}\n{DATE} - Posted by {AUTHOR}\n\n{EXCERPT}\n{URL}\n\n");
	add_option("TVnews_last","1970-01-01 00:00:00");
	add_option("TVnews_last_letter","1970-01-01 00:00:00");
	add_option("TVnews_header","");
	add_option("TVnews_footer","");
	add_option("TVnews_subject",get_bloginfo(). " - Newsletter");
	add_option("TVnews_from",get_bloginfo("admin_email"));
    add_option("TVnews_wantImages","false");
    add_option("TVnews_imagesWidth","150");
    add_option("TVnews_colorH1","454545");
    add_option("TVnews_colorText","000000");
    add_option("TVnews_colorLink","454545");
    add_option("TVnews_sizeH1","14");
    add_option("TVnews_sizeText","11");
    add_option("TVnews_sizeLink","11");
    add_option("TVnews_colorSeparator","000000");
    add_option("TVnews_separator","true");
    add_option("TVnews_sizeSeparator","1");
    add_option("TVnews_wantBackground","false");
    add_option("TVnews_colorBackground","FFF");
    add_option("TVnews_colorBody","666");
    add_option("TVnews_backgroundImage","bg_newsletter.jpg");
    add_option("TVnews_styleSelected","template2.html");
    add_option("TVnews_inputTextColor", "000");
    add_option("TVnews_inputTextBackColor", "FFF");
    add_option("TVnews_inputTextBorderColor", "000");
    add_option("TVnews_inputTextcolorLink", "000");
    add_option("TVnews_advertiseColor", "666");
    add_option("TVnews_inputTextImage", "boton.jpg");
    add_option("TVnews_messageHeaderNewsMail", "Estimado usuario este newsletter contiene informacion acerca de mi web para cualquiero consulta no dudes en mandarme un mail a ejemplo@mail.com");
    add_option("TVnews_messageConfirmationMail", "Se ha recibido una peticion de suscripcion al NewsLeter <--Titulo--> en:\n <--url--> \n
                                                  \n para completar su suscripcion debera de hacer click sobre el siguiente Link:\n <--confirmationurl--> \n
                                                  \n Si no desea recibir este NewsLetter, disculpe y por favor ignore este E-Mail.\n");

    add_option("TVnews_messageDeleteMail", " Si no desea seguir recibiendo este Newsletter por favor haga click <a href='<--confirmationurl-->'>Aqui</a>
                                             y automaticamente se anulara la suscripcion.\n");
    add_option("TVnews_messageSuccesMail", "Se ha suscrito satisfactoriamente al NewsLetter <--Titulo--> en:\n <--url--> \n
                                                  Si no quiere recibir este newsletter, use el link para elimininar su suscripcion:\n
                                                  <--confirmationurl--> \n");

    global $wpdb;
    if(@is_file(ABSPATH.'/wp-admin/upgrade-functions.php')) {
		include_once(ABSPATH.'/wp-admin/upgrade-functions.php');
	} elseif(@is_file(ABSPATH.'/wp-admin/includes/upgrade.php')) {
		include_once(ABSPATH.'/wp-admin/includes/upgrade.php');
	} else {
		die('We have problem finding your \'/wp-admin/upgrade-functions.php\' and \'/wp-admin/includes/upgrade.php\'');
	}
	$charset_collate = '';
	if($wpdb->supports_collation()) {
		if(!empty($wpdb->charset)) {
			$charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
		}
		if(!empty($wpdb->collate)) {
			$charset_collate .= " COLLATE $wpdb->collate";
		}
	}
        $table = TVNEWS_USERS;
        
		if (!TvNewsletter::tableExists($table)) {
         
          
                    $sql[] = "CREATE TABLE " .TVNEWS_USERS . " (
                            id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
                            id_categoria bigint(20) UNSIGNED NOT NULL,
                            email varchar(100) NOT NULL,
                            estado ENUM('activo', 'espera') NOT NULL,
                            joined datetime NOT NULL,
                            user bigint(20) UNSIGNED,
                            confkey varchar(100),
                            UNIQUE KEY id (id)
                           );";
                        
                    $sql[] = "CREATE TABLE " . TVNEWS_CATEGORY . " (
                            id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
                            categoria varchar(100) NOT NULL,
                            UNIQUE KEY id (id)
                           );";
                    $sql[] = "CREATE TABLE " . TVNEWS_NEWSLETERS . " (
                            id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
                            title varchar(150) NOT NULL,
                            newsletter longtext NOT NULL,
                            mode varchar(20) NOT NULL,
                            send varchar(20) NOT NULL,
                            sending datetime NOT NULL,
                            UNIQUE KEY id (id)
                           );";
        
                    TvUsersNews::AbsPahtReady ();
                   
                    if (file_exists(ABSPATH . 'wp-includes/pluggable.php')) {
                        require_once(ABSPATH . 'wp-includes/pluggable.php');
                    } else {
                        require_once(ABSPATH . 'wp-includes/pluggable-functions.php');
                    }
                    require_once(ABSPATH . 'wp-admin/upgrade-functions.php');
                    
                    foreach($sql as $sql_table){
                         dbDelta($sql_table);
                    }
         }
}

    




?>
