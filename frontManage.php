<?php


if($_POST["show"]=="SaveIns"){
    

        global $wpdb, $user_identity, $user_ID;

		if(empty($_POST['newsletter'])) {

			return;
		}
            ?>
            <?php
        require_once('../../../wp-config.php');
        include_once("class.coreTvnews.php");
        include_once("class.users.php");
        require("Languages.php");
		$email = $_POST['email'];
        $lista = $_POST['lista'];

		if($email != "" && $email != $traducciones['textISEmail']) {


			$bots_useragent = array('googlebot', 'google', 'msnbot', 'ia_archiver', 'lycos', 'jeeves', 'scooter', 'fast-webcrawler', 'slurp@inktomi', 'turnitinbot', 'technorati', 'yahoo', 'findexa', 'findlinks', 'gaisbo', 'zyborg', 'surveybot', 'bloglines', 'blogsearch', 'ubsub', 'syndic8', 'userland', 'gigabot', 'become.com');
			$useragent = $_SERVER['HTTP_USER_AGENT'];
			foreach ($bots_useragent as $bot) {
				if (stristr($useragent, $bot) !== false) {
	
					return;
				}
			}
            if($lista == "") {
                $lista = 1;
            }

			$message = "";
			$result = 0;
			$value = TvUsersNews::addSubscriptor($email,$lista);

		    echo $value['message'];
			

			exit();
		}
		echo $traducciones['textPIEmail'];

		exit();
}

if($_GET["Showing"]=="ShowNewsletter"){
 require_once('../../../wp-config.php');
  global $wpdb;
  $tabla = $wpdb->prefix . 'savednewsletters';
  $query = "SELECT * FROM $tabla WHERE id='".$_GET["NewsId"]."';";
  $results = $wpdb->get_row( $query );
  if($results != ""){
      echo $results->newsletter;
	   
  }else{
     echo "No existe el newsletter que quiere ver";
  }
}
?>
