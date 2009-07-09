<?php
global $traducciones;
if($_POST["send"]==$traducciones['Btn_Ddesinstalar']){
    TvNewsletter::Uninstall();
    //prints the HTML to configure the newsletter
     TvNewsletter::echoAdvertiseMessage($traducciones['Msj_24'] ,true);
}
if($_POST["send"]=="Cancelar"){

    //prints the HTML to configure the newsletter
}
?>

<div class="wrap">
			<h2><?php _e($traducciones['textDesinstalador']); ?></h2>
			<form id="settings" name="settings" action="?page=meenews/uninstall.php&amp;mode=general" method="post">
				<table class="widefat">
					<tbody>
						
                        
						<tr>
							<td colspan="2">
                            <b><?php echo $traducciones['textNota']; ?></b><br />
								<?php echo $traducciones['nota_4']; ?>
							</td>
						</tr>
                        
						<tr>
							<td colspan="2"><hr /></td>
						</tr>
					</tbody>

				</table>
				<div class="submit">
					<input name="send" type="submit" value="Cancelar" />&nbsp;&nbsp;<input name="send" type="submit" value="<?php echo $traducciones['Btn_Ddesinstalar']; ?>" />
				</div>
			</form>
		</div>


