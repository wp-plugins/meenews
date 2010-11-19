<?php


if($_POST["show"]=="Users"){
    
    require_once('../../../wp-config.php');
    include_once("class.coreTvnews.php");
    include_once("class.users.php");
    include_once("class.design.php");

    $idlist = $_POST["id"];
    echo TvDesignNews::howUserHave($idlist);
    die();
    
}else


if($_POST["show"]=="Envia"){
    global $traducciones;
    require_once('../../../wp-config.php');
    include_once("class.coreTvnews.php");
    include_once("class.users.php");
    include_once("class.design.php");
     $idNewsletter = $_POST["newsletter"];
    $desde = $_POST["desde"];
    $lista = $_POST["lista"];
    if($lista == "")$lista = null;
    $newsletter = TvDesignNews::extractNewsletter($idNewsletter);
    $mensaje = TvNewsletter::sendNewsletter($newsletter,"",$desde, $lista,$idNewsletter);
    echo "<br> ".$traducciones['textSendOk'].$mensaje['bien']."<br> ".$traducciones['textSendWrong'].$mensaje['mal'];
    die();
}else

if($_POST["show"]=="Previsualiza"){

    require_once('../../../wp-config.php');
    include_once("class.coreTvnews.php");
    include_once("class.users.php");
    include_once("class.design.php");

    $idNewsletter = $_POST["newsletter"];

    if($lista == "")$lista = null;
    $newsletter = TvDesignNews::extractNewsletter($idNewsletter);
    echo $newsletter;
    die();

}else{
    $del = $_REQUEST["del"];
    if(is_numeric($del)){
        TvDesignNews::removeNewsletter($del);
        
        $succcessMsg = true;

      TvNewsletter::echoAdvertiseMessage($traducciones['textNBok'] ,$succcessMsg);
    }

      TvNewsletter::manageNewsletters();

}

?>
