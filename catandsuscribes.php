<?php
$delete = $_REQUEST["del"];
$activate = $_REQUEST["actv"];
$user= $_REQUEST["user"];
$actv= $_REQUEST["actv"];
$message = "";
$succcessMsg = true;
$membersUpdate = false;
$limit = 0;
global $traducciones;
//si modificamos la configuracion general
if($_POST["send"]== $traducciones['Btn_AG'] ){

    update_option("TVnews_wantImages", $_POST["wantImages"]);
	update_option("TVnews_imagesWidth", $_POST["imagesWidth"]);

    $message = $traducciones['Msj_1'];

    TvNewsletter::echoAdvertiseMessage($message);

}


//si modificamos la configuracion general
if($_POST["send"]== $traducciones['Btn_EN'] ){
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $lista = $_POST["listSuscribes"];
    $confirmation = $_POST["confirmacion"];

    $mensaje = TvUsersNews::addSubscriptor($email, $lista, $confirmation);
    TvNewsletter::echoAdvertiseMessage($mensaje['message'],$mensaje['result']);
}

if($_POST["send"]== $traducciones['Btn_NL'] ){
   
      $nombre = $_POST["name"];
      if(TvUsersNews::newList($nombre)){
          $returnVal['result']=true;
          $returnVal['message']= $traducciones['Msj_2'] ;
      }else{
          $returnVal['result']=false;
          $returnVal['message']= $traducciones['Msj_3'] ;
      }
      TvNewsletter::echoAdvertiseMessage($returnVal['message'],$returnVal['result']);

}
if(is_numeric($delete)){
  if(is_numeric($user)){
	$membersUpdate = true;
	TvUsersNews::removeSusbscriptorList($delete);
	$message = $traducciones['Msj_4'];
	$succcessMsg = true;
  }else{
     $membersUpdate = true;
	TvUsersNews::removeList($delete);
	$message = $traducciones['Msj_5'];
	$succcessMsg = true;

  }
  TvNewsletter::echoAdvertiseMessage($message,$succcessMsg);
}
//prints the HTML to configure the newsletter
if(is_numeric($actv)){
 $membersUpdate = true;
	if(TvUsersNews::passToActivate($actv)){
		$returnVal['result']=true;
        $returnVal['message']= $traducciones['Msj_20'] ;
	}else{
		$email = TvUsersNews::getSubscriptionEmail($activate);
		$estado = TvUsersNews::getStateClient($email);
		if($estado != "active"){
			   $returnVal['message']= $traducciones['Msj_21'] ;
		}else{
			   $returnVal['message']= $traducciones['Msj_21'] ;
		}
		$returnVal['result']=false;

	}
    TvNewsletter::echoAdvertiseMessage($returnVal['message'],$returnVal['result']);
}

if($_POST["send"]== $traducciones['Btn_Import'] ){
    $row = 1;
    $lista = $_POST["listSuscribes"];
    $confirmation = $_POST["confirmacion"];
    $file = basename($_FILES['userfile']['name']);
	$ext = explode('.', $file);
	$uploaddir = "../wp-content/plugins/meenews/customimages/";
	$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    $i = 1;
    if($ext[1] == 'csv' || $ext[1] == 'txt'){

        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            $handle = fopen ($uploadfile,"r");
            while ($data = fgetcsv ($handle, 1000, ",")) {
                $num = count ($data);
                $row ;
                   $mensaje = TvUsersNews::addSubscriptor($data[0], $lista, $confirmation);
                $i ++;
           }
           $message = $traducciones['textImportOk']." ".$i;
           $result = true;
           fclose ($handle);
      }else{
          $message = $traducciones['textImportFall'];
          $result = false;
      }
  }else{
       $message = $traducciones['textImportFall'];;
       $result = false;
  }

TvNewsletter::echoAdvertiseMessage($message,$result);
}
?>

<script type="text/javascript" src="<?php echo get_bloginfo("wpurl") ?>/wp-content/plugins/meenews/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo("wpurl") ?>/wp-content/plugins/meenews/js/ui.tabs.js"></script>
<link href="<?php echo get_bloginfo("wpurl") ?>/wp-content/plugins/meenews/css/ui.tabs.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
// Tabs
jQuery(document).ready(function() {
	jQuery('#tvtabs > ul').tabs();
});
</script>

<div id="tvtabs">

<ul>
<li><a href="#tab1"><span><?php echo $traducciones['textLista']; ?></span></a></li>
<li><a href="#tab2"><span><?php echo $traducciones['textSuscriptores']; ?></span></a></li>
<li><a href="#tab3"><span><?php echo $traducciones['textImport']; ?></span></a></li>
</ul>

<div id="tab1">

<?php
TvNewsletter::categoryInsertBackPanel();
TvNewsletter::manageLists();
?>
</div>
<div id="tab2">

<?php
TvNewsletter::UsersInsertBackPanel();
TvNewsletter::manageMembers();
?>
</div>
<div id="tab3">

<?php
TvNewsletter::ImportSusbcribers();
?>
</div>


</div> <!--/ tvtabs --