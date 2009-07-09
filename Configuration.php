<script type="text/javascript">
function sendNewsletter(formID,textID,value){
	var formElement = document.getElementById(formID);
	var limit = document.getElementById(textID);
	limit.value = value;
	formElement.submit();
}
</script>
<?php

$message = "";
$succcessMsg = true;
$membersUpdate = false;
$limit = 0;

//si modificamos la configuracion general
if($_POST["send"]==$traducciones['Btn_AG']){
    
    update_option("TVnews_wantImages", $_POST["wantImages"]);
	update_option("TVnews_imagesWidth", $_POST["imagesWidth"]);
    update_option("TVnews_colorLink", substr($_POST["colorLink"],1));
    update_option("TVnews_colorText",substr($_POST["colorText"],1));
    update_option("TVnews_colorH1", substr($_POST["colorH1"],1));
     update_option("TVnews_sizeLink", $_POST["sizeLink"]);
    update_option("TVnews_sizeText",$_POST["sizeText"]);
    update_option("TVnews_sizeH1", $_POST["sizeH1"]);
    update_option("TVnews_colorSeparator", substr($_POST["colorSeparator"],1));
    update_option("TVnews_sizeSeparator", $_POST["sizeSeparator"]);
    update_option("TVnews_separator", $_POST["separator"]);

   
    TvNewsletter::echoAdvertiseMessage($traducciones['Msj_18']);

}
//si modificamos la configuracion general
if($_POST["send"]==$traducciones['Btn_AT']){

    update_option("TVnews_styleSelected", $_POST["styleSelected"]);


    TvNewsletter::echoAdvertiseMessage($traducciones['Msj_12']);

}
//si modificamos la configuracion general
if($_POST["send"]==$traducciones['Btn_AE']){
    include_once("class.uploadphoto.php");
    $successMsg=true;
    update_option("TVnews_period", $_POST["period"]);
	//validate that the number of posts is a positive number
	if(is_numeric($_POST["count"]) && $_POST["count"] > 0){
        update_option("TVnews_count", $_POST["count"]);
	}
    update_option("TVnews_from", $_POST["letterFrom"]);
    update_option("TVnews_subject", strip_tags($_POST["letterSubject"]));
    update_option("TVnews_header", strip_tags($_POST["letterHeader"]));
    update_option("TVnews_template", strip_tags($_POST["letterTemplate"]));
    update_option("TVnews_footer", strip_tags($_POST["letterFooter"]));
    update_option("TVnews_wantBackground", $_POST["wantBackground"]);
    update_option("TVnews_colorBackground", substr($_POST["colorBackground"],1));
    update_option("TVnews_colorBody", substr($_POST["colorBody"],1));

    $archivo = $_FILES['imagen_cabecera']['name'];
	
    if ($archivo!="") {
		
            $nombre_archivo = $_FILES['imagen_cabecera']['name'];
            $tipo_archivo = $_FILES['imagen_cabecera']['type'];
            $tamano_archivo = $_FILES['imagen_cabecera']['size'];
			
			//extensión del archivo
			$extension = explode(".",$nombre_archivo); 
			$num = count($extension)-1; 

			//renombro la foto en el directorio
			$nombre_archivo_final =  time().'.'.$extension[$num];

			// Características de la nueva imagen
			$imagenoriginal = $_FILES['imagen_cabecera']['tmp_name'];
			$dirdestino = "../wp-content/plugins/wp-TVnewsletter/customimages/";
			$nombrefinal = $nombre_archivo_final;
			$anchofinal = 600;
			$altofinal = 700;
			$calidad = 82;
			
			// Ejecuto la función para redimensionar la foto
			redimensionar($imagenoriginal, $dirdestino, $nombrefinal, $anchofinal, $altofinal, $calidad);
			update_option("TVnews_headImage",$nombre_archivo_final );
           $message = $traducciones['Msj_14'].$nombre_archivo_final."";
		   
    }else{
		
         $successMsg=false;
         $message = $traducciones['Msj_13'].$archivo;
		 $message = 'No se ha subido el archivo: '.$archivo;
		 
    }
    $fondo = $_FILES['imagen_fondo']['name'];

    if ($fondo!="") {

            $nombre_archivo = $_FILES['imagen_fondo']['name'];
            $tipo_archivo = $_FILES['imagen_fondo']['type'];
            $tamano_archivo = $_FILES['imagen_fondo']['size'];

			//extensión del archivo
			$extension = explode(".",$nombre_archivo);
			$num = count($extension)-1;

			//renombro la foto en el directorio
			$nombre_archivo_final =  time().'.'.$extension[$num];

			// Características de la nueva imagen
			$imagenoriginal = $_FILES['imagen_fondo']['tmp_name'];
			$dirdestino = "../wp-content/plugins/wp-TVnewsletter/customimages/";
			$nombrefinal = $nombre_archivo_final;
			$anchofinal = 700;
			$altofinal = 900;
			$calidad = 82;

			// Ejecuto la función para redimensionar la foto
			redimensionar($imagenoriginal, $dirdestino, $nombrefinal, $anchofinal, $altofinal, $calidad);
			update_option("TVnews_backgroundImage",$nombre_archivo_final );
           $message = $traducciones['Msj_14'].$nombre_archivo_final;

    }
        
		TvNewsletter::echoAdvertiseMessage($message,$succcessMsg);
}
if($_POST["send"]==$traducciones['Btn_AFE']){
    include_once("class.uploadphoto.php");
    $successMsg=true;
    update_option("TVnews_inputTextColor", substr($_POST["inputTextColor"],1));
    update_option("TVnews_inputTextBackColor", substr($_POST["inputTextBackColor"],1));
    update_option("TVnews_inputTextBorderColor", substr($_POST["inputTextBorderColor"],1));
    update_option("TVnews_inputTextcolorLink", substr($_POST["inputTextcolorLink"],1));
    update_option("TVnews_advertiseColor", substr($_POST["advertiseColor"],1));



    $archivo = $_FILES['imagen_boton']['name'];

    if ($archivo!="") {

            $nombre_archivo = $_FILES['imagen_boton']['name'];
            $tipo_archivo = $_FILES['imagen_boton']['type'];
            $tamano_archivo = $_FILES['imagen_boton']['size'];

			//extensión del archivo
			$extension = explode(".",$nombre_archivo);
			$num = count($extension)-1;

			//renombro la foto en el directorio
			$nombre_archivo_final =  time().'.'.$extension[$num];

			// Características de la nueva imagen
			$imagenoriginal = $_FILES['imagen_boton']['tmp_name'];
			$dirdestino = "../wp-content/plugins/wp-TVnewsletter/customimages/";
			$nombrefinal = $nombre_archivo_final;
			$anchofinal = 100;
			$altofinal = 80;
			$calidad = 100;

			// Ejecuto la función para redimensionar la foto
			if (redimensionar($imagenoriginal, $dirdestino, $nombrefinal, $anchofinal, $altofinal, $calidad)){
                update_option("TVnews_inputTextImage",$nombre_archivo_final );
               $message = $traducciones['Msj_14'] ;
            }else{
                $successMsg=false;
                $message = $traducciones['Msj_17'] .$nombre_archivo_final;
            }

    }

		TvNewsletter::echoAdvertiseMessage($message,$succcessMsg);
}



    if($_POST["send"]==$traducciones['Btn_Acat']){
        $categoria = "";
        foreach($_POST['categories'] as $categoria) {
         $categorias .= $categoria.",";
        }
        $long=strlen($categorias)-1;
        $categorias = substr($categorias,0,$long);
        update_option("TVnews_categories", $categorias);
        
        TvNewsletter::echoAdvertiseMessage($traducciones['Msj_15']);

    }

    if($_POST["send"]==$traducciones['Btn_AMEN']){

        update_option("TVnews_messageConfirmationMail", stripslashes($_POST['messageConfirmationMail']));
        update_option("TVnews_messageHeaderNewsMail", stripslashes($_POST['messageHeaderNewsMail']));
        update_option("TVnews_messageDeleteMail", stripslashes($_POST['messageDeleteMail']));
        update_option("TVnews_messageSuccesMail", stripslashes($_POST['messageSuccesMail']));
        
        TvNewsletter::echoAdvertiseMessage($traducciones['Msj_16'] );

    }
//prints the HTML to configure the newsletter
?>

<script type="text/javascript" src="<?php echo get_bloginfo("wpurl") ?>/wp-content/plugins/wp-TVnewsletter/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo("wpurl") ?>/wp-content/plugins/wp-TVnewsletter/js/ui.tabs.js"></script>
<link href="<?php echo get_bloginfo("wpurl") ?>/wp-content/plugins/wp-TVnewsletter/css/ui.tabs.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
// Tabs
jQuery(document).ready(function() {
	jQuery('#tvtabs > ul').tabs();
});
</script>

<div id="tvtabs">

<ul>
<li><a href="#tab1"><span><?php echo $traducciones['textGeneral']; ?></span></a></li>
<li><a href="#tab2"><span><?php echo $traducciones['textEnvios']; ?></span></a></li>
<li><a href="#tab3"><span><?php echo $traducciones['textCategorias']; ?></span></a></li>
<li><a href="#tab4"><span><?php echo $traducciones['textTemplate']; ?></span></a></li>
<li><a href="#tab5"><span><?php echo $traducciones['textFFEnd']; ?></span></a></li>
<li><a href="#tab6"><span><?php echo $traducciones['textCMensajes']; ?></span></a></li>
</ul>

<div id="tab1">
<?php
TvNewsletter::generalConfigBackPanel();
?>
</div>

<div id="tab2">
<?php
TvNewsletter::configurationBackPanel();
?>
</div>

<div id="tab3">
<?php
TvNewsletter::configurationcategories();
?>
</div>

<div id="tab4">
<?php
TvNewsletter::configurationTemplate();
?>
</div>

<div id="tab5">
<?php
TvNewsletter::configFrontEndSub();
?>
</div>
<div id="tab6">
<?php
TvNewsletter::configFrontMessages();
?>
</div>
</div> <!--/ tvtabs -->