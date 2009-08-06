<?php

if($_POST["show"]=="Post"){
    require_once('../../../wp-config.php');
    include_once("class.coreTvnews.php");
    include_once("class.users.php");
    include_once("class.design.php");
    
    $post = TvDesignNews::extractPost($_POST["id"]);
    echo TvNewsletter::generateRow($post,1);
    die();
}

if($_POST["send"]== $traducciones['Btn_GN']){
    $newsletter = $_POST["finalDesign"];
    $title = $_POST["titleDesign"];
    $newsletter= TvDesignNews::generateFinalNeswletter($newsletter);
    $message =  TvDesignNews::saveNewsletter($newsletter, $title);
    
    TvNewsletter::echoAdvertiseMessage($traducciones['textNSOk']);


}


TvNewsletter::desingNewsletterBack();


?>
