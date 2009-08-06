<?php
class TvDesignNews {

    function extractSelectedTables(){
        $categories = 	get_option("TVnews_categories");
        $categories = explode(",", $categories);
        $result = "";
        foreach ($categories as $categoselect){
            $result .= TvDesignNews::construcTables($categoselect);
        }
        return $result;
        
    }
    function removeNewsletter($id){
		global $wpdb;

		$query = "DELETE FROM ".TVNEWS_NEWSLETERS."  WHERE id='$id';";
		$results = $wpdb->query( $query );
		return true;
	}

    function extractPost($postId){

        global $wpdb;

        $query = "SELECT * FROM {$wpdb->posts} WHERE ID='$postId';";
		$results = $wpdb->get_results( $query );

        return $results;
    }

    function nameCategory($idcategory){
        global $wpdb;

        $query = "SELECT * FROM {$wpdb->terms} WHERE term_id='$idcategory';";
		$results = $wpdb->get_results( $query );

        foreach($results as $result)
        return $result->name;
    }


    function construcTables($category){
        global $wpdb;
        global $traducciones;

        global $post;
        $results = get_posts('numberposts=10&category='.$category);
        if ($results){
           $table = '
             <div class="table">
                        <table class="widefat">
                            <thead>
                                <tr>
                                    <th scope="col">'. TvDesignNews::nameCategory($category).'</th>
                                    <th colspan="2" scope="col" style="width:4em;text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>';



                  foreach($results as $result) :
                          $table .= '<tr >
                                        <td id="tit'.$result->ID.'">'.$result->post_title.'</td>
                                        <td  colspan="2" scope="col" style="width:4em;text-align:center"  id="Inc'.$result->ID.'">	<a class="delete"
                                        href="javascript:showPosted('.$result->ID.')" >'.$traducciones['textJaAnadir'].'</a>
                                        </td>
                                    </tr>';
                   endforeach;
           $table .= ' </tbody>
                        </table>

            </div>
            <br>';
        }
        return $table;

    }

    function generateTheme(){
         global $traducciones;
        $colorH1 =      "#".get_option("TVnews_colorH1");
        $colorBackground =      "#".get_option("TVnews_colorBackground");
        $colorTexto =      "#".get_option("TVnews_colorText");
        $messageDelette =      get_option("TVnews_messageDeleteMail");

        $headImage = 	get_option("TVnews_headImage");
        $messageHeaderNewsMail = 	get_option("TVnews_messageHeaderNewsMail");
        $final = TvDesignNews::generateHeader();
        $fecha = "<p  style='float:left;font-size: 10px;font-family: arial;color:$colorBackground;margin-left:10px;margin-top:0px'>". date("d-m-Y")."</p>";
        $novisualiza = "<p  style='float:right;font-size: 10px;font-family: arial;color:$colorBackground;margin-right:10px;margin-top:0px'>".$traducciones['textNoVisualiza']."</p>";
        $title = get_bloginfo("name");
        $colorH1 =      "#".get_option("TVnews_colorH1");
        $colorBackground =      "#".get_option("TVnews_colorBackground");
        $search = "{Title}";
        $replace = "<div style='background-color:$colorH1; color:$colorBackground;width:100%;height:19px;padding-top:4px;'>".$fecha.$novisualiza."</div>";
        $final['message'] = str_replace($search, $replace, $final['message']);
        $search = "{Wellcome Message}";
        $replace = $messageHeaderNewsMail;
        $final['message'] = str_replace($search, $replace, $final['message']);
        $search = "{HeadImage}";
        $replace = "<img src='". plugins_url('meenews/customimages/'.$headImage) ."'>";
        $final['message'] = str_replace($search, $replace, $final['message']);
        $search = "{Lista}";
        $replace = "<ul class='lista'></ul>";
        $final['message'] = str_replace($search, $replace, $final['message']);
        $search = "{ListaFooter}";
        $replace = "<ul class='lista' style='background-color:$colorH1; color:$colorBackground; width:100%; height:30x; text-align: left; padding-left:5px;'>
        <li>Resumen Newsletter</li></ul>";
        $final['message'] = str_replace($search, $replace, $final['message']);
        $search = "{Content}";
        $replace = "<table  border='0' class='newsletter' width='100%' cellpadding='2' cellspacing='2'><tbody id='finalTabla'></tbody></table>";
        $final['message'] = str_replace($search, $replace, $final['message']);
        $search = "{Footer}";
        $replace = "<p style='font-family:arial; font-size:10px; text-align:justify; width:auto; color:$colorTexto' class='contenido' align='left'>$messageDelette Mee Newsletter Plugin</p>";
        $final['message'] = str_replace($search, $replace, $final['message']);
        return $final['style'].$final['message'];

    }

    function generateFinalNeswletter($newsletter){
        $colorH1 =      "#".get_option("TVnews_colorH1");
        $colorBackground =      "#".get_option("TVnews_colorBackground");
        $colorBody =      "#".get_option("TVnews_colorBody");
        $header = '
        <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
        <html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Newsletter</title>';
        $cuerpo .= '</head>';
        $cuerpo .= "<body>
        <div style=\"width:100%; height:100%; background-color:$colorBody; font-family: arial; font-size:$sizeTexto; text-align:justify;\">";
        $cuerpo .= $newsletter;
        $cuerpo .= '</div></body>';
        $cuerpo .= '</html>';
        $final =$header.$cuerpo;

        return $final;
    }

    function saveNewsletter($newsletter, $title, $mode = "manual"){

          global $wpdb;
        $sizeTexto =      get_option("TVnews_sizeText")."px";
        $colorBody =      "#".get_option("TVnews_colorBody");
        $fecha = date("Y-m-d H:i:s");
        $newsletter = ereg_replace("'","''", $newsletter);
        $search = ".design";
        $replace = "body";
        $newsletter = str_replace($search, $replace,$newsletter);
        $newsletter = stripslashes($newsletter);
        $query = "INSERT INTO ".TVNEWS_NEWSLETERS." (title, newsletter, mode, sending) ";
		$query .= "VALUES ('$title', '$newsletter', '$mode','$fecha');";
        $results = $wpdb->query( $query );
		return $results != '';
    }
    function extractNewsletter($idNewsletter){
        global $wpdb;
         $tabla = $wpdb->prefix . 'savednewsletters';
        $query = "SELECT * FROM $tabla WHERE id='$idNewsletter';";
		$results = $wpdb->get_row( $query );
		if($results != "")
			return $results->newsletter;
    }
    /*
     * Devuelve de la base de datos todas las listas de usuarios en formato array
     */
     function getSavedNewsletters (){
        global $wpdb;

        $query = "SELECT * FROM " .TVNEWS_NEWSLETERS ;
        $query .= " ;";
        $results = $wpdb->get_results( $query );

        return $results;
    }

    function howUserHave ($lista){
        global $wpdb;
        $tabla = $wpdb->prefix . 'newsusers';
        $query = "SELECT COUNT(*)  FROM $tabla" ;
        if ($lista != "all")
        $query .= " WHERE id_categoria = '$lista' ;";
        $results = $wpdb->get_var( $query );
        return $results;

    }

    function generateHeader(){

         global $traducciones;
        $headImage = 	get_option("TVnews_headImage");
        $imagesWidth = 	get_option("TVnews_imagesWidth");
		$wantImages = 	get_option("TVnews_wantImages");
        $colorH1 =      get_option("TVnews_colorH1");
        $colorTexto =      "#".get_option("TVnews_colorText");
        $colorLink =      get_option("TVnews_colorLink");
        $sizeH1 =      get_option("TVnews_sizeH1")."px";
        $sizeTexto =      get_option("TVnews_sizeText")."px";
        $sizeLink =      get_option("TVnews_sizeLink")."px";
        $sizeSeparator =      get_option("TVnews_sizeSeparator")."px";
        $colorSeparator =      "#".get_option("TVnews_colorSeparator");
        $separator =      get_option("TVnews_separator");
        $backgroundImage =  get_option("TVnews_backgroundImage");
        $wantBackground =  get_option("TVnews_wantBackground");
        $colorBackground =      "#".get_option("TVnews_colorBackground");
        $styleSelected =      get_option("TVnews_styleSelected");
        $messageHeaderNewsMail = 	get_option("TVnews_messageHeaderNewsMail");
        $colorBody =      "#".get_option("TVnews_colorBody");

        $style = "<style type='text/css'>
                    .newsletter .separador, .separador{width:100%; clear:both; border-bottom:$sizeSeparator dotted $colorSeparator;height:2px;margin:5px 0 5px 0;}
                    .design{font-family: arial; font-size:$sizeTexto; text-align:justify; background-color:$colorBody;color:$colorTexto;}
                    table.newsletter a{color:#$colorLink;text-decoration:none;font-size:$sizeLink; }
                    table.newsletter h1{font-family: arial;clear:both; color:#$colorH1; font-size:$sizeH1; padding:0px; font-weight:bold;margin-bottom:8px;}
                    table.newsletter img {margin-right:10px; margin-bottom:10px; float:left;border-color:#$colorH1;border:1px;border-style:solid;}
                    table.newsletter {table-layout:fixed;background-color:$colorBackground}
                    table.newsletter ul, .listanews ul{margin-left:25px; font-style:italic; text-align:left;color:$colorTexto;}
                    table.newsletter p {font-family:arial; font-size:$sizeTexto; text-align:justify; width:auto; color:$colorTexto}
                    table.newsletter a {font-size: $sizeLink; color:$colorLink; text-decoration:none; font-weight:bold}
                    .footernews, .headernews, .listanews{background-color:#$colorH1; color:$colorBackground}
                    .headernews {font-size:17px; width:100%; height:30x; text-align: center}
                    .principal{margin:0 auto}
                    </style>
                    ";

        $message = file_get_contents("$styleSelected", 'r');
        $search = "{FondoCustomizado}";
        $replace = "style='table-layout:fixed;background-color:$colorBackground;margin:0 auto'";
        $message = str_replace($search, $replace, $message);
        $design['style'] = $style;
        $design['message'] = $message;
        $search = "{DontVisualize}";
        $replace = "<p  style='float:right;font-size: 10px;font-family: arial;color:#$colorTexto;'>".$traducciones['textNoVisualiza']."</p>";
        $design['message'] = str_replace($search, $replace, $design['message']);
        $search = "{Separador}";
        $replace = "<p  style='width:100%; border-bottom: $sizeSeparator $colorSeparator dotted; clear:both; height:2px'></p>";
        $design['message'] = str_replace($search, $replace, $design['message']);
        return $design;
    }
}
$TvDesignNews = new TvDesignNews();
?>
