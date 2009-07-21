<?php
/*
Plugin Name: Meenews Widget
Plugin URI: http://www.wp-newsletter.com
Description: Adds a form Widget to inscribe a newsletter list
Version: 2.5
Author: Daniel Perez Tierravirtual.com
Author URI: http://Tierravirtual.com
*/


/*
	Copyright 2008  Lester Chan  (email : lesterchan@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

### Function: Init WP-Meenews Widget
function widget_meenews_init() {
	if (!function_exists('register_sidebar_widget')) {
		return;
	}

	### Function: WP-Meenews Widget
	function widget_meenews($args) {
        		extract($args);
		global $traducciones;
        $titleFrontEnd = get_option('titleFrontEnd');
        $listToFrontEnd = get_option('listToFrontEnd');
        echo $before_widget;
        echo $before_title . $titleFrontEnd . $after_title;
        if (class_exists('TvNewsletter')):
        echo "<ul><li>";
            TvNewsletter::activateNewsletterPlugin($listToFrontEnd);
        endif;
         echo "<br></li></ul>";
        echo $after_widget;
	}

	### Function: meenews Widget Options
	function widget_meenews_options() {
        global $wpdb;
		global $traducciones;
        $titleFrontEnd = get_option('titleFrontEnd');
        $listToFrontEnd = get_option('listToFrontEnd');
		if ($_POST['meenews-submit']) {
			$titleFrontEnd = strip_tags($_POST['titleFrontEnd']);
			$listToFrontEnd = intval($_POST['listSuscribes']);

			update_option('titleFrontEnd', $titleFrontEnd);
			update_option('listToFrontEnd', $listToFrontEnd);
		}
		?>

		<?php
		echo '<p><label for="meenews-title">';
		_e($traducciones['textTitulo'], 'meenews');
		echo ': </label><input type="text" id="titleFrontEnd" name="titleFrontEnd" value="'.htmlspecialchars(stripslashes($titleFrontEnd)).'" /></p>'."\n";
		_e($traducciones['textListInscribe'], 'meenews');
		$tabla = $wpdb->prefix . 'newscategories';
         $query = "SELECT * FROM $tabla";
         $Lista = $wpdb->get_results( $query );
		 if($Lista) {
            echo "<select name='listSuscribes' >";
			foreach($Lista as $subscribeList) {
					echo "<option value='$subscribeList->id'>$subscribeList->categoria</option>\n";
			}
            echo '</select></p>'."\n";
		}else{
           echo 'No tienes listas creadas ves al panel de configuracion del plugin y crea una lista';
        }
		
		echo '<input type="hidden" id="meenews-submit" name="meenews-submit" value="1" />'."\n";
	}

	// Register Widgets
	register_sidebar_widget(array('Newsletter', 'meenews'), 'widget_meenews');
	register_widget_control(array('Newsletter', 'meenews'), 'widget_meenews_options', 200, 300);
}


### Function: Load The meenews widget
add_action('plugins_loaded', 'widget_meenews_init');
?>