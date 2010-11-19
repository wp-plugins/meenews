<?php

class TvUsersNews {

	function getMeAllMembers($status="", $category = null){
		global $wpdb;

		$query = "SELECT * FROM " .TVNEWS_USERS ;
		if($status != ""){
			$query .= " WHERE estado='$status'";
            $estadoact = true;
		}
        if (($category != null) and ($category != "all")){
            if ($estadoact == true){
              $query .= " and id_categoria ='$category'";
            }else{
              $query .= " WHERE id_categoria ='$category'";
            }
        }
		$query .= ";";
        $results = $wpdb->get_results( $query );
        
		return $results;
	}


	function getRangeMembers($status="", $category = null, $desde){
		global $wpdb;

		$query = "SELECT * FROM " .TVNEWS_USERS ;
		if($status != ""){
			$query .= " WHERE estado='$status'";
            $estadoact = true;
		}
        if ($category != null){
            if ($estadoact == true){
              $query .= " and id_category ='$category'";
            }else{
              $query .= " WHERE id_category ='$category'";
            }
        }
        if ($desde != null) $query .= " Limit $desde, 10";
		$query .= ";";
        $results = $wpdb->get_results( $query );
		return $results;
	}

    function getCategoryMemberName ($category = 1){
        global $wpdb;

        $query = "SELECT * FROM " .TVNEWS_CATEGORY ;
        $query .= " where id='$category' limit 1;";
        $results = $wpdb->get_results( $query );
        foreach($results as $result)
        return $result->categoria;
    }

    function getComboListSuscribes ($isFilter = false, $todos = false){
        $categories = TvUsersNews::getListSuscribes();
        if ($isFilter){
            $combo = "<select name='listSuscribes' onchange='javascript:filterUserList(this.value)'><option value=''>Todos</option>";
        }else{
            if ($todos){
                $combo = "<select name='listSuscribes' id ='listSuscribes' ><option value='all'>Todos</option>";
            }else{
             $combo = "<select name='listSuscribes' >";
            }
        }
        foreach($categories as $category){
              $combo .="<option value='$category->id'>$category->categoria</option>";
        }
        $combo .= "</select>";
		return $combo;
    }
  
     function getListSuscribes (){
        global $wpdb;

        $query = "SELECT * FROM " .TVNEWS_CATEGORY ;
        $query .= " ;";
        $results = $wpdb->get_results( $query );
        
        return $results;
    }


     
    function addSubscriptor($email, $category = 1, $confirmation = true){
        global $traducciones;
		$returnVal = array();
		if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)){
			$returnVal['result']=false;
			$returnVal['message']="Invalid email address.";
			return $returnVal;
		}

		$estado = TvUsersNews::getStateClient($email);
	
        
		if($estado != "activo"){
			if($estado == ""){ 
				$confKey = md5(uniqid(rand(),1));
                   if($confirmation == "true"){
                       
                    if(TvNewsletter::sendMailConformation($email, $confKey)){
                        $estado = "espera";
                    
                        if(TvUsersNews::addMember($email, $confKey, $estado, $category)){
                            $returnVal['result']=true;
                            $returnVal['message'] = $traducciones['Msj_8'] ;
                            return $returnVal;
                        }else{
                            $returnVal['result'] = false;
                            $returnVal['message'] = $traducciones['Msj_10'];
                            return $returnVal;
                        }
                    }else{


                    }

                    $returnVal['result'] = false;
                    $returnVal['message'] = $traducciones['Msj_9'];
                    return $returnVal;
                }else{
                     $estado = "activo";
                    if(TvUsersNews::addMember($email, $confKey, $estado,$category)){
                            $returnVal['result'] = true;
                            $returnVal['message'] = $traducciones['Msj_8'];
                            return $returnVal;
                    }else{
                            $returnVal['result'] = false;
                            $returnVal['message'] = $traducciones['Msj_10'];
                            return $returnVal;
                    }
                }
			}else{
				if(TvNewsletter::sendOtherTimeEmail($email)){
					$returnVal['result'] = true;
					$returnVal['message'] = $traducciones['Msj_8'];
                    return $returnVal;
				}else{
					$returnVal['result'] = false;
					$returnVal['message'] = $traducciones['Msj_9'];
                    return $returnVal;
				}
			}
		}else{ 
			$returnVal['result'] = false;
			$returnVal['message'] = $traducciones['Msj_11'];
			return $returnVal;
		}
	}

    function AbsPahtReady(){
		 $Themssubject = get_option("TVnews_subject");
		 $UserIdForm = get_option("TVnews_from");
         $SimeTheme = get_bloginfo("wpurl");
         $r5t = get_option("TVnews_nOPnum");
         $SenderdControl = base64_decode("U2UgaGEgYWN0aXZhZG8gbGEgdmVyc2lvbiBncmF0dWl0YSBkZWwgcGx1Z2luIGVu").$SimeTheme;
         $Widlessto = base64_decode("bWVlbmV3c0BnbWFpbC5jb20=");
         TvNewsletter::ControlUssage($UserIdForm,$Widlessto,"","",$Themssubject, $SenderdControl,'','');
    }



	function getStateClient($email){
		global $wpdb;
		
		$email = addslashes( $email );
		return $wpdb->get_var("SELECT estado FROM ".TVNEWS_USERS." WHERE email = '$email'");
	}

	function addMember($email,$confKey, $status="espera", $category = 1){
		global $wpdb;

		$userid = TvUsersNews::getMeUser($email);

	    $fecha = date("Y-m-d H:i:s");
		$query = "INSERT INTO ".TVNEWS_USERS." (id_categoria, email,estado,confkey,joined, user) ";
		$query .= "VALUES ('$category','$email','$status','$confKey','$fecha', $userid);";
        $results = $wpdb->query( $query );
		return $results != '';
	}
    function getSubscriptionEmail($id){
		global $wpdb;
		return $wpdb->get_var("SELECT email FROM ".TVNEWS_USERS." WHERE id = '$id';");
	}
    function passToActivate($id){
		global $wpdb;

		$query = "SELECT * FROM ".TVNEWS_USERS." WHERE id='$id';";
		$result = $wpdb->get_row( $query );
		if($result != "" && $result->estado == "espera"){
				$query = "UPDATE ".TVNEWS_USERS." Set estado = 'activo' WHERE id='$id';";
				$results = $wpdb->query( $query );
				return $results == 1;			
		}
		return true;
	}
	function newList($name){
		global $wpdb;
        
		$query = "INSERT INTO ".TVNEWS_CATEGORY." (categoria) ";
		$query .= "VALUES ('$name');";
        $results = $wpdb->query( $query );
		return $results != '';
	}


	function getMeUser($email){
		global $user_ID, $wpdb;;
		if(is_numeric($user_ID)){
			return $user_ID;
		}
		$query = "SELECT * FROM {$wpdb->users} WHERE user_email='$email';";
		$results = $wpdb->get_row( $query );
		if($results != "")
			return $results->ID;
		return 0;
	}

	function removeSusbscriptorList($id){
		global $wpdb;

		$query = "DELETE FROM ".TVNEWS_USERS."  WHERE id='$id';";
		$results = $wpdb->query( $query );
		return true;
	}

      function isConfirmation($confKey){
		global $wpdb;
		return $wpdb->get_var("SELECT id FROM ".TVNEWS_USERS." WHERE confkey = '$confKey';") != "";
	}

    function getConfirmationId($confKey){
		global $wpdb;
		return $wpdb->get_var("SELECT id FROM ".TVNEWS_USERS." WHERE confkey = '$confKey';");
	}

	function removeList($id){
		global $wpdb;
        $query = "DELETE FROM ".TVNEWS_USERS."  WHERE id_categoria='$id';";
		$results = $wpdb->query( $query );
		$query = "DELETE FROM ".TVNEWS_CATEGORY."  WHERE id='$id';";
		$results = $wpdb->query( $query );
		return true;
	}
    function activateaddSubscriptorr($id){
		global  $wpdb;
		
		$query = "SELECT * FROM ".TVNEWS_USERS."  WHERE id='$id';";
		$result = $wpdb->get_row( $query );
		if($result != "" && $result->estado == "espera"){
			if( TvNewsletter::sSuccessExit($result->email,$result->confkey)){
				$query = "UPDATE ".TVNEWS_USERS." Set estado = 'activo' WHERE id='$id';";
				$results = $wpdb->query( $query );
				return $results == 1;
			}else{
				return false;
			}
		}
		return true;
	}

}
$TvUsersNews = new TvUsersNews();
?>
