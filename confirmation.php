<?php
include_once("../../../wp-blog-header.php");
include_once("wp-TVnewsletter.php");

$del = $_REQUEST["del"];
$add = $_REQUEST["add"];
$delConf = $_POST['delconf'];

$content = "";
$content .= "<h1>" . get_bloginfo("name") . " - Newsletter</h1>\n";

if($del != ""){//newsletter removal confirmation
	if( TvUsersNews::isConfirmation($del)){
		if($delConf != ""){//we have answered confirmation
			if($delConf == "Yes"){//we have answerd Yes to the confirmation
				$id =  TvUsersNews::getConfirmationId($del);
				$email =  TvUsersNews::getSubscriptionEmail($id);
				 TvUsersNews::removeSusbscriptorList($id);
				$content .= "<div class='success'>".$traducciones['textElMail']."<b>$email</b>". $traducciones['textSusBOk']." </div>\n";
			}else{
				$content .= "<div class='success'>".$traducciones['textBSCancelada']."</div>\n";
			}
		}else{ //ask before removing
			$content .= "<h2>Confirmacion de borrado</h2>\n";
			$content .= "<div style='padding:10px;'><p>".$traducciones['textSBSus']." \"" . get_bloginfo("name") . "\"". $traducciones['textNewsletter']."?</p>\n";
			$content .= "<form action=\"\" method=\"post\">\n";
			$content .= "	<input class=\"button\" type=\"submit\" name=\"delconf\" value='Yes'/>\n";
			$content .= "	<input class=\"button\" type=\"submit\" name=\"delconf\" value='No'/>\n";
			$content .= "</form></div>\n";
		}
	}else{//the confirmation number was not valid
		$content .= "<div class=\"errorTitle\">".$traducciones['textNCInvalido']."</div>\n";
		$content .= "<p>".$traducciones['textACEOK']."</p>\n";
	}
}elseif($add != ""){//subscription confirmation
	if( TvUsersNews::isConfirmation($add)){
		$id =  TvUsersNews::getConfirmationId($add);
		
		TvUsersNews::activateaddSubscriptorr($id);
		$email =  TvUsersNews::getSubscriptionEmail($id);
		$content .= "<div class=\"success\">".$traducciones['textElMail']." <b>$email</b>". $traducciones['textSusAOk']."</div>\n";
	}else{//the confirmation number was not valid
		$content .= "<div class=\"errorTitle\">".$traducciones['textNCInvalido']."</div>\n";
		$content .= "<p>".$traducciones['textACEOK']."</p>\n";
	}
}else{//the user should not be here... redirect to homepage
	header( 'Location: '.get_bloginfo("url") ) ;
	exit();
}
//write the HTML for the confirmation page
 TvNewsletter::htmlConfPage($content);
?>