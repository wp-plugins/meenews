<?php

include_once("../../../wp-blog-header.php");
include_once("meenews.php");

$del = $_REQUEST["del"];
$add = $_REQUEST["add"];
$delConf = $_POST['delconf'];
$idnews = $_REQUEST["news"];
$content = "";
$content .= "<h1>" . get_bloginfo("name") . " - Newsletter</h1>\n";

if($del != ""){
	if( TvUsersNews::isConfirmation($del)){
		if($delConf != ""){
			if($delConf == "Yes"){
				$id =  TvUsersNews::getConfirmationId($del);
				$email =  TvUsersNews::getSubscriptionEmail($id);
				 TvUsersNews::removeSusbscriptorList($id);
  				$content .= "<div class='success'>".$traducciones['textElMail']."<b>$email</b>". $traducciones['textSusBOk']." </div>\n";
			}else{
				$content .= "<div class='success'>".$traducciones['textBSCancelada']."</div>\n";
			}
		}else{ 
			$content .= "<h2>Confirmacion de borrado</h2>\n";
			$content .= "<div style='padding:10px;'><p>".$traducciones['textSBSus']." \"" . get_bloginfo("name") . "\"". $traducciones['textNewsletter']."?</p>\n";
			$content .= "<form action=\"\" method=\"post\">\n";
			$content .= "	<input class=\"button\" type=\"submit\" name=\"delconf\" value='Yes'/>\n";
			$content .= "	<input class=\"button\" type=\"submit\" name=\"delconf\" value='No'/>\n";
			$content .= "</form></div>\n";
		}
	}else{
		$content .= "<div class=\"errorTitle\">".$traducciones['textNCInvalido']."</div>\n";
		$content .= "<p>".$traducciones['textACEOK']."</p>\n";
	}
}elseif($add != ""){
	if( TvUsersNews::isConfirmation($add)){
		$id =  TvUsersNews::getConfirmationId($add);
		
		TvUsersNews::activateaddSubscriptorr($id);
		$email =  TvUsersNews::getSubscriptionEmail($id);
		$content .= "<div class=\"success\">".$traducciones['textElMail']." <b>$email</b>". $traducciones['textSusAOk']."</div>\n";
	}else{
		$content .= "<div class=\"errorTitle\">".$traducciones['textNCInvalido']."</div>\n";
		$content .= "<p>".$traducciones['textACEOK']."</p>\n";
	}
}else{
	header( 'Location: '.get_bloginfo("url") ) ;
	exit();
}

 TvNewsletter::htmlConfPage($content);
?>