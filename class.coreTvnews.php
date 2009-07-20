<?php

class TvNewsletter {

    function configurationBackPanel(){
        global $traducciones;
		//Get al plugin options to fill the form
		$count = 	get_option("TVnews_count");
		$period = 	get_option("TVnews_period");
        $categories = 	get_option("TVnews_categories");
        $categories = 	get_option("TVnews_categories");
        $photo =    get_option("TVnews_foto");
		$header = 	stripslashes(get_option("TVnews_header"));
		$template = stripslashes(get_option("TVnews_template"));
		$footer = 	stripslashes(get_option("TVnews_footer"));
		$subject = 	stripslashes(get_option("TVnews_subject"));
        $headImage = 	stripslashes(get_option("TVnews_headImage"));
		$from = 	stripslashes(get_option("TVnews_from"));
        $backgroundImage =  get_option("TVnews_backgroundImage");
        $wantBackground =  get_option("TVnews_wantBackground");
        $colorBackground =      get_option("TVnews_colorBackground");
        $colorBody =      get_option("TVnews_colorBody");

		$path = get_bloginfo("wpurl") . "/wp-content/plugins/meenews/"


		?>
		<script type="text/javascript">
			function toggleState (value, elementId) {
				var element = document.getElementById(elementId);
				element.disabled = value;
				return true;
			}
		</script>

		<div class="wrap">
			<h2><?php _e($traducciones['Tit_1']); ?></h2>
			<form id="settings" name="settings" action="?page=meenews/Configuration.php&amp;mode=senders" enctype="multipart/form-data" method="post">
				<table class="widefat">
					<tbody>

						<tr>
							<td colspan="2"><hr /></td>
						</tr>
						<tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"><?php echo $traducciones['textde']; ?></label></th>
							<td>
								<input type="text" style="width:250px;" name="letterFrom" id="letterFrom" value="<?php echo $from; ?>" /><br />
							</td>
						</tr>
						<tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterSubject"><?php echo $traducciones['textSubject']; ?></label></th>
							<td>
								<input type="text" style="width:500px;" name="letterSubject" id="letterSubject" value="<?php echo $subject; ?>" /><br />
							</td>
						</tr>
                        <tr>
                            <th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterSubject"><?php echo $traducciones['textIAC']; ?></label></th>
                            <td id="customimage">
                                <img src="<?php  echo plugins_url('meenews/customimages/'.$headImage); ?>"  >

							</td>
                        </tr>
                        <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterSubject"><?php echo $traducciones['textICab'] ; ?> </label></th>
							<td>
								<input type="file" name="imagen_cabecera" id="imagen_cabecera" /><br />
							</td>
						</tr>
                         <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"> <?php echo $traducciones['textCFN']; ?> </label></th>
							<td>
								<input type="text" maxlength="8" size="8" name="colorBackground" id="colorBackground" value="#<?php echo $colorBackground; ?>" /><br />
							</td>
						</tr>
                        <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom">  <?php echo $traducciones['textCFB']; ?> </label></th>
							<td>
								<input type="text" maxlength="8" size="8" name="colorBody" id="colorBody" value="#<?php echo $colorBody; ?>" /><br />
							</td>
						</tr>


					</tbody>

				</table>
				<div class="submit">
					<input name="send" type="submit" value="<?php echo $traducciones['Btn_AE']; ?>" />
				</div>
			</form>
		</div>
		<?php
	}



     function configurationTemplate(){
         global $traducciones;
		$style = 	get_option("TVnews_styleSelected");
		$path = get_bloginfo("wpurl") . "/wp-content/plugins/meenews/"
		?>
		<script type="text/javascript">
			function toggleState (value, elementId) {
				var element = document.getElementById(elementId);
				element.disabled = value;
				return true;
			}
		</script>

		<div class="wrap">
			<h2><?php _e($traducciones['Tit_2']); ?></h2>
			<form id="settings" name="settings" action="?page=meenews/Configuration.php&amp;mode=senders" method="post">
				<table class="widefat">
					<tbody>
						<tr>
							<th scope="row" style="width:12em;text-align:left;vertical-align:top;">
								<input <?php if($style=="template2.html") echo "CHECKED" ?> type="radio" id="period_1"
				name="styleSelected" value="template2.html" onClick="toggleState(true, 'count');" /><label for="period_1"> <?php echo $traducciones['textTheme']; ?> 2</label><br />

						  </th>
                          <th scope="row" style="width:12em;text-align:left;vertical-align:top;">
								<input <?php if($style=="template3.html") echo "CHECKED" ?> type="radio" id="period_1"
				name="styleSelected" value="template3.html" onClick="toggleState(true, 'count');" /><label for="period_1"> <?php echo $traducciones['textTheme']; ?> 3</label><br />

						  </th>
                          </tr>
                        <tr>

                            <td id="customimage">
                                <img src="<?php  echo plugins_url('meenews/images/template2.jpg'); ?>" width="100" >

							</td>
                            <td id="customimage">
                                <img src="<?php  echo plugins_url('meenews/images/template3.jpg'); ?>" width="100" >

							</td>
                        </tr>
                        <tr>

							<th style="text-align:left;vertical-align:top;" scope="row"><?php echo $traducciones['textCaracteristicas']; ?> :<?php echo $traducciones['textCaracteristicas2'];?> </th>
                            <th style="text-align:left;vertical-align:top;" scope="row"><?php echo $traducciones['textCaracteristicas']; ?>:<?php echo $traducciones['textCaracteristicas3']; ?> </th>
						</tr>
					</tbody>

				</table>

				<div class="submit">
					<input name="send" type="submit" value="<?php echo $traducciones['Btn_AT']; ?>" />
				</div>
			</form>
		</div>
		<?php
	}

      function generalConfigBackPanel(){
          global $traducciones;
		$imagesWidth = 	get_option("TVnews_imagesWidth");
		$wantImages = 	get_option("TVnews_wantImages");
        $colorH1 =      get_option("TVnews_colorH1");
        $colorTexto =      get_option("TVnews_colorText");
        $colorLink =      get_option("TVnews_colorLink");
        $colorSeparator =      get_option("TVnews_colorSeparator");
        $separator =      get_option("TVnews_separator");
        $sizeH1 =      get_option("TVnews_sizeH1");
        $sizeTexto =      get_option("TVnews_sizeText");
        $sizeLink =      get_option("TVnews_sizeLink");
        $sizeSeparator =      get_option("TVnews_sizeSeparator");

		?>
        <script type="text/javascript" src='<?php echo get_bloginfo("wpurl") ?>/wp-content/plugins/meenews/js/sevencolorpicker.js'></script>
		<script type="text/javascript">
			function toggleState (value, elementId) {
				var element = document.getElementById(elementId);
				element.disabled = value;
				return true;
			}
		</script>

		<div class="wrap">
			<h2><?php _e($traducciones['Tit_3']); ?></h2>
			<form id="settings" name="settings" action="?page=meenews/Configuration.php&amp;mode=general" method="post">
				<table class="widefat">
					<tbody>
						<tr>
							<th scope="row" style="width:6em;text-align:left;vertical-align:top;"><?php echo $traducciones['textMostrar']; ?></th>
							<td>
								<input <?php if($wantImages=="true") echo "CHECKED" ?> type="radio" id="imagesTrue"
				name="wantImages" value="true" onClick="toggleState(true, 'count');" /><label for="period_0"><?php echo $traducciones['textSi']; ?></label><br />
								<input <?php if($wantImages=="false") echo "CHECKED" ?> type="radio" id="imagesFalse"
				name="wantImages" value="false" onClick="toggleState(true, 'count');" /><label for="period_1"><?php echo $traducciones['textNo']; ?></label><br />

							</td>
						</tr>
                         <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"><?php echo $traducciones['textWidth']; ?></label></th>
							<td>
								<input type="text" style="width:250px;" name="imagesWidth" id="imagesWidth" value="<?php echo $imagesWidth; ?>" />px<br />
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<b><?php echo $traducciones['textNota']; ?></b><br />
								<?php echo $traducciones['nota_1']; ?>
							</td>
						</tr>
                        <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"><?php echo  $traducciones['textTamanos']; ?> </label></th>
							<td>
								<input type="text" maxlength="8" size="8" name="sizeH1" id="sizeH1" value="<?php echo $sizeH1; ?>" />px<br />
							</td>
						</tr>
                        <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"><?php echo $traducciones['textCT']; ?></label></th>
							<td>
								<input type="text" maxlength="8" size="8" name="colorH1" id="colorH1" value="#<?php echo $colorH1; ?>" /><br />
							</td>
						</tr>
                         <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"> <?php echo $traducciones['textTT']; ?></label></th>
							<td>
								<input type="text" maxlength="8" size="8" name="sizeText" id="sizeText" value="<?php echo $sizeTexto; ?>" />px<br />
							</td>
						</tr>
                         <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"><?php echo $traducciones['textCtext']; ?> </label></th>
							<td>
								<input type="text" maxlength="8" size="8" name="colorText" id="colorText" value="#<?php echo $colorTexto; ?>" /><br />
							</td>
						</tr>
                         <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"> <?php echo $traducciones['textTLinks']; ?> </label></th>
							<td>
								<input type="text" maxlength="8" size="8" name="sizeLink" id="sizeLink" value="<?php echo $sizeLink; ?>" />px<br />
							</td>
						</tr>
                         <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"><?php echo $traducciones['textCLinks']; ?> </label></th>
							<td>
								<input type="text" maxlength="8" size="8" name="colorLink" id="colorLink" value="#<?php echo $colorLink; ?>" /><br />
							</td>
						</tr>
                       <tr>
							<th scope="row" style="width:6em;text-align:left;vertical-align:top;"><?php echo $traducciones['textQS']; ?></th>
							<td>
								<input <?php if($separator=="true") echo "CHECKED" ?> type="radio" id="separator_0"
				name="separator" value="true" onClick="toggleState(true, 'count');" /><label for="period_0"><?php echo $traducciones['textSi']; ?></label><br />
								<input <?php if($separator=="false") echo "CHECKED" ?> type="radio" id="seaparator_1"
				name="separator" value="false" onClick="toggleState(true, 'count');" /><label for="period_1"><?php echo $traducciones['textNo']; ?></label><br />

							</td>
						</tr>
                        <tr>
							<td colspan="2">
                                <b><?php echo $traducciones['textNota']; ?></b><br />
								<?php echo $traducciones['nota_2']; ?>
							</td>
						</tr>
                        <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"><?php echo $traducciones['textCSep']; ?></label></th>
							<td>
								<input type="text" maxlength="8" size="8" name="colorSeparator" id="colorSeparator" value="#<?php echo $colorSeparator; ?>" /><br />
							</td>
						</tr>
                         <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"><?php echo $traducciones['textTSep']; ?> </label></th>
							<td>
								<input type="text" maxlength="8" size="8" name="sizeSeparator" id="sizeSeparator" value="<?php echo $sizeSeparator; ?>" />px<br />
							</td>
						</tr>
						<tr>
							<td colspan="2"><hr /></td>
						</tr>
					</tbody>

				</table>
				<div class="submit">
					<input name="send" type="submit" value="<?php echo $traducciones['Btn_AG']; ?>" />
				</div>
			</form>
		</div>
                  <script type="text/javascript">

                            jQuery('document').ready(function(){
                                jQuery('#colorH1, #colorText, #colorLink, #colorSeparator, #colorBody, #colorBackground').SevenColorPicker();
                            });
                        </script>
		<?php
	}


    function configFrontEndSub(){
        global $traducciones;
		$inputTextColor = 	get_option("TVnews_inputTextColor");
		$inputTextBackColor = 	get_option("TVnews_inputTextBackColor");
        $inputTextBorderColor =      get_option("TVnews_inputTextBorderColor");
        $inputTextImage =      get_option("TVnews_inputTextImage");
        $inputTextcolorLink =      get_option("TVnews_inputTextcolorLink");
        $advertiseColor = get_option("TVnews_advertiseColor");

		?>
		<div class="wrap">
			<h2><?php _e($traducciones['Tit_3']); ?></h2>
			<form id="settings" name="settings" action="?page=meenews/Configuration.php&amp;mode=general"  enctype="multipart/form-data" method="post">
				<table class="widefat">
					<tbody>

                        <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"> <?php echo $traducciones['textCtext']; ?></label></th>
							<td>
								<input type="text" maxlength="8" size="8" name="inputTextColor" id="inputTextColor" value="#<?php echo $inputTextColor; ?>" /><br />
							</td>
						</tr>
                         <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"> <?php echo $traducciones['textCFInput']; ?></label></th>
							<td>
								<input type="text" maxlength="8" size="8" name="inputTextBackColor" id="inputTextBackColor" value="#<?php echo $inputTextBackColor; ?>" /><br />
							</td>
						</tr>
                         <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"> <?php echo $traducciones['textCBInput']; ?> </label></th>
							<td>
								<input type="text" maxlength="8" size="8" name="inputTextBorderColor" id="inputTextBorderColor" value="#<?php echo $inputTextBorderColor; ?>" /><br />
							</td>
						</tr>
                        <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"> <?php echo $traducciones['textTLinks']; ?> </label></th>
							<td>
								<input type="text" maxlength="8" size="8" name="inputTextcolorLink" id="inputTextcolorLink" value="#<?php echo $inputTextcolorLink; ?>" /><br />
							</td>
						</tr>
                        <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"><?php echo $traducciones['textRColor']; ?>  </label></th>
							<td>
								<input type="text" maxlength="8" size="8" name="advertiseColor" id="advertiseColor" value="#<?php echo $advertiseColor; ?>" /><br />
							</td>
						</tr>
                        <tr>
                            <th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterSubject"> <?php echo $traducciones['textIABoton']; ?> </label></th>
                            <td id="customimage">
                                <img src="<?php  echo plugins_url('meenews/customimages/'.$inputTextImage); ?>" >

							</td>
                        </tr>
                        <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterSubject2"><?php echo $traducciones['textICab']; ?> </label></th>
							<td>
								<input type="file" name="imagen_boton" id="imagen_boton" value="" /><br />
							</td>
						</tr>
						<tr>
							<td colspan="2"><hr /></td>
						</tr>
					</tbody>
				</table>
				<div class="submit">
					<input name="send" type="submit" value="<?php echo $traducciones['Btn_AFE']; ?>" />
				</div>
			</form>
		</div>
          <script type="text/javascript">

                            jQuery('document').ready(function(){
                                jQuery('#inputTextColor,#inputTextBackColor,#inputTextBorderColor,#inputTextcolorLink,#inputTextcolorLink,#advertiseColor').SevenColorPicker();
                            });
                        </script>
		<?php
	}
    function configFrontMessages(){
        global $traducciones;
		$messageConfirmationMail = 	get_option("TVnews_messageConfirmationMail");
		$messageHeaderNewsMail = 	get_option("TVnews_messageHeaderNewsMail");
        $messageDeleteMail =      get_option("TVnews_messageDeleteMail");
        $messageSuccesMail =      get_option("TVnews_messageSuccesMail");

		?>

       <div class="wrap">
			<h2><?php _e($traducciones['Tit_4']); ?></h2>
			<form id="settings" name="settings" action="?page=meenews/Configuration.php&amp;mode=general" method="post">
				<table class="widefat">
					<tbody>

                        <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"><?php echo $traducciones['textMConf']; ?> </label></th>
							<td>
								<textarea name="messageConfirmationMail" id="messageConfirmationMail" rows="6" cols="75"><?php echo $messageConfirmationMail; ?></textarea><br />
							</td>
						</tr>
                        <tr>
							<td colspan="2">
                                <b><?php echo $traducciones['textNota']; ?></b><br />
								<?php echo $traducciones['nota_3']; ?>
						    </td>
						</tr>
                        <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"><?php echo $traducciones['textMHeader']; ?></label></th>
							<td>
								<textarea name="messageHeaderNewsMail" id="messageHeaderNewsMail" rows="6" cols="75"><?php echo $messageHeaderNewsMail; ?></textarea><br />
							</td>
						</tr>
                        <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"><?php echo $traducciones['textMFooter']; ?> </label></th>
							<td>
								<textarea name="messageDeleteMail" id="messageDeleteMail" rows="6" cols="75"><?php echo $messageDeleteMail; ?></textarea><br />
							</td>
						</tr>
                        <tr>
							<td colspan="2">
								<b><?php echo $traducciones['textNota']; ?></b><br />
								<?php echo $traducciones['nota_3']; ?>
                            </td>
						</tr>
                        <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"> <?php echo $traducciones['textMUserAct']; ?></label></th>
							<td>
								<textarea name="messageSuccesMail" id="messageSuccesMail" rows="6" cols="75"><?php echo $messageSuccesMail; ?></textarea><br />
							</td>
						</tr>
                        <tr>
							<td colspan="2">
								<b><?php echo $traducciones['textNota']; ?></b><br />
								<?php echo $traducciones['nota_3']; ?>
                            </td>
						</tr>
						<tr>
							<td colspan="2"><hr /></td>
						</tr>
					</tbody>
				</table>
				<div class="submit">
					<input name="send" type="submit" value="<?php echo $traducciones['Btn_AMEN']; ?>" />
				</div>
			</form>
		</div>
          <script type="text/javascript">

                            jQuery('document').ready(function(){
                                jQuery('#inputTextColor,#inputTextBackColor,#inputTextBorderColor,#inputTextcolorLink,#inputTextcolorLink,#advertiseColor').SevenColorPicker();
                            });
                        </script>
		<?php
	}

    function UsersInsertBackPanel(){
		//Get al plugin options to fill the form
        global $traducciones;
		$path = get_bloginfo("wpurl") . "/wp-content/plugins/meenews/"
		?>
        <script type="text/javascript">
			function toggleState (value, elementId) {
				var element = document.getElementById(elementId);
				element.disabled = value;
				return true;
			}
		</script>
		<div class="wrap">
			<h2><?php _e($traducciones['Tit_5']); ?></h2>
			<form id="settings" name="settings" action="?page=meenews/catandsuscribes.php&amp;mode=general" method="post">
				<table class="widefat">
					<tbody>


                        <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"><?php echo $traducciones['textEmail']; ?></label></th>
							<td>
								<input type="text" style="width:250px;" name="email" id="email" value="" /><br />
							</td>
						</tr>
                        <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"><?php echo $traducciones['textListas']; ?></label></th>
							<td>
								<?php echo TvUsersNews::getComboListSuscribes(); ?>
							</td>
						</tr>
                         <tr>
							<th scope="row" style="width:6em;text-align:left;vertical-align:top;"><?php echo $traducciones['textEnvConf']; ?></th>
							<td>
								<input checked="CHECKED" type="radio" id="confirmacion"
				name="confirmacion" value="true" onClick="toggleState(true, 'count');" /><label for="period_0"><?php echo $traducciones['textSi']; ?></label><br />
								<input  type="radio" id="confirmacion"
				name="confirmacion" value="false" onClick="toggleState(true, 'count');" /><label for="period_1"> <?php echo $traducciones['textNo']; ?></label><br />
							</td>
						</tr>
					</tbody>
				</table>
				<div class="submit">
					<input name="send" type="submit" value="<?php echo $traducciones['Btn_EN']; ?>" />
				</div>
			</form>
		</div>
		<?php
	}


function categoryInsertBackPanel(){

        global $traducciones;
		$path = get_bloginfo("wpurl") . "/wp-content/plugins/meenews/"
		?>
        <script type="text/javascript">
			function toggleState (value, elementId) {
				var element = document.getElementById(elementId);
				element.disabled = value;
				return true;
			}
		</script>
		<div class="wrap">
			<h2><?php _e($traducciones['Tit_6']); ?></h2>
			<form id="settings" name="settings" action="?page=meenews/catandsuscribes.php&amp;mode=general" method="post">
				<table class="widefat">
					<tbody>
						 <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"><?php echo $traducciones['textNombre']; ?> </label></th>
							<td>
								<input type="text" style="width:250px;" name="name" id="name" value="" /><br />
							</td>
						</tr>
					</tbody>
				</table>
				<div class="submit">
					<input name="send" type="submit" value="<?php echo $traducciones['Btn_NL']; ?>" />
				</div>
			</form>
		</div>
		<?php
	}

    function ImportSusbcribers(){

        global $traducciones;
		$path = get_bloginfo("wpurl") . "/wp-content/plugins/meenews/"
		?>
        <script type="text/javascript">
			function toggleState (value, elementId) {
				var element = document.getElementById(elementId);
				element.disabled = value;
				return true;
			}
		</script>
		<div class="wrap">
			<h2><?php _e($traducciones['Tit_12']); ?></h2>
			<form id="settings" name="settings" action="?page=meenews/catandsuscribes.php&amp;mode=general" enctype="multipart/form-data" method="post">
				<table class="widefat">
					<tbody>
                        <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterSubject"><?php echo $traducciones['textAimportado'] ; ?> </label></th>
							<td>
								<input type="file" name="userfile" id="userfile" /><br />
							</td>
						</tr>
                        <tr>
							<th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"><?php echo $traducciones['textAQLista']; ?></label></th>
							<td>
								<?php echo TvUsersNews::getComboListSuscribes(); ?>
							</td>
						</tr>
                         <tr>
							<th scope="row" style="width:6em;text-align:left;vertical-align:top;"><?php echo $traducciones['textEnvConf']; ?></th>
							<td>
								<input checked="CHECKED" type="radio" id="confirmacion"
				name="confirmacion" value="true" onClick="toggleState(true, 'count');" /><label for="period_0"><?php echo $traducciones['textSi']; ?></label><br />
								<input  type="radio" id="confirmacion"
				name="confirmacion" value="false" onClick="toggleState(true, 'count');" /><label for="period_1"> <?php echo $traducciones['textNo']; ?></label><br />
							</td>
						</tr>

					</tbody>
				</table>
				<div class="submit">
					<input name="send" type="submit" value="<?php echo $traducciones['Btn_Import']; ?>" />
				</div>
			</form>
		</div>
		<?php
	}

    function configurationcategories(){
		global $traducciones;
        $categories = 	get_option("TVnews_categories");
        $categories = explode(",", $categories);
		$path = get_bloginfo("wpurl") . "/wp-content/plugins/meenews/"
		?>
		<script type="text/javascript">
			function toggleState (value, elementId) {
				var element = document.getElementById(elementId);
				element.disabled = value;
				return true;
			}
		</script>
		<div class="wrap">
			<h2><?php _e($traducciones['Tit_7']); ?></h2>
			<form id="settings" name="settings" action="?page=meenews/Configuration.php&amp;mode=categories" method="post">
				<table class="widefat">
					<tbody>
						<tr>
							<th scope="row" style="width:6em;text-align:left;vertical-align:top;"><?php echo $traducciones['textSelCat']; ?></th>
							<td>
								<?php
                                    $cats = TvNewsletter::GetWpCategories();

                                    foreach ($cats as $cat) :
                                        $checked = "";
                                        foreach ($categories as $categoselect)
                                        {
                                            if ($categoselect == $cat->cat_ID )
                                            {
                                                $checked = "checked=\"checked\"";
                                                break;
                                            }
                                        }
                                    ?>
                                        <input type="checkbox" name="categories[]" value="<?php echo $cat->cat_ID?>" <?php echo $checked?> /> <?php echo $cat->cat_name ?> <br/>
                                    <?php
                                    endforeach;
                                    ?>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="submit">
					<input name="send" type="submit" value="<?php echo $traducciones['Btn_Acat']; ?>" />
				</div>
			</form>
		</div>
		<?php
	}


    function GetWpCategories()
	{
		global $wpdb;


		if( $wpdb->terms != '' )
		{
			$sql = "SELECT t.term_id AS cat_ID, t.name AS cat_name FROM $wpdb->terms AS t INNER JOIN $wpdb->term_taxonomy AS tt ON tt.term_id = t.term_id WHERE tt.taxonomy = 'category' ORDER BY t.name";
		}
		else
		{
			$sql = "SELECT cat_ID, cat_name FROM $wpdb->categories ORDER BY cat_name";
		}

		$results = $wpdb->get_results($sql);
		if (!isset($results))
			$results = array();
		return $results;
	}

	function checkEveryNewsletter(){
		$period = get_option("TVnews_period");

		if($period != "every")
			return;

		$last = get_option("TVnews_last");
		$count = get_option("TVnews_count");

		$posts = TvNewsletter::getPostsDesde("",$last);
		$postCount = count($posts);

		if($postCount >= $count){
			$content = TvNewsletter::generateRow($posts,$count);
			TvNewsletter::sendNewsletter($content);
		}
	}

     function manageMembers(){
         global $traducciones;
		$members = TvUsersNews::getMeAllMembers();
		?>
		<script type="text/javascript">
            function DelConfirm(email){
              var message= '<?php echo $textJaBorrSus; ?>"'+email+'", <?php echo $traducciones['textJaQcont']; ?>';
              return confirm(message);
            }
            function ActivateConfirm(email){
              var message= '<?php echo $textJaActSus; ?> "'+email+'", <?php echo $traducciones['textJaQcont']; ?>';
              return confirm(message);
            }
            function filterUserList(idCategory){
               jQuery( function($) {
                            if (idCategory == ""){
                                 $(".alternate").css("display","block");
                                 $(".other").css("display","block");
                            }else{
                                $(".alternate").css("display","none");
                                $(".other").css("display","none");
                                $(".fila"+idCategory).css("display","block");
                            }
							});
                 }
		</script>
		<div id="snewsMembers" class="wrap">

			<h2><?php _e($traducciones['Tit_8']); ?></h2>
            <p style="padding-top:5px;float:left"><?php _e($traducciones['Tit_9']); ?></p> <p style="float:left"> <?php echo TvUsersNews::getComboListSuscribes(true); ?></p>

			<?php
			if($members != "" && count($members) > 0){
			?>
            <div id="miembrosSuscritos">
			<table class="widefat">
				<thead>
					<tr>
						<th scope="col"><?php echo $traducciones['textEmail']; ?></th>
						<th scope="col"><?php echo $traducciones['textNombre']; ?></th>
                        <th scope="col"><?php echo $traducciones['textCategoria']; ?></th>
						<th scope="col"><?php echo $traducciones['textdesde']; ?></th>
						<th colspan="2" scope="col" style="width:4em;"><?php echo $traducciones['textAccion']; ?></th>
					</tr>
				</thead>
				<tbody>
				<?php
				$alt = true;
				foreach($members as $member){
					if($alt){
						echo "<tr class='alternate fila$member->id_categoria'>";
					}else{
						echo "<tr class='other fila$member->id_categoria'>";
					}
					$alt = !$alt;
				?>
						<td><?php echo $member->email; ?></td>
						<td><?php
						if($member->user != 0 && is_numeric($member->user)){
							$user = get_userdata($member->user);
							echo $user->user_nicename;
						}else{
							echo "(not registered)";
						}
						?></td>

                        <td><?php echo  TvUsersNews::getCategoryMemberName( $member->id_categoria );?></td>
						<td><?php echo $member->joined; ?></td>
						<td  style='text-align:center'>

						<?php if($member->estado == "espera"){?>
							<a class="edit"
			href="<?php echo "?page=meenews/catandsuscribes.php&amp;actv=".$member->id; ?>#msgMembers"
			onclick="return ActivateConfirm('<?php echo $member->email; ?>');"><?php echo $traducciones['textActivar']; ?></a>
						<?php }else{ echo "Activo"; } ?>
						</td>
						<td>
							<a class="delete"
			href="?page=meenews/catandsuscribes.php&amp;del=<?php echo $member->id; ?>&user=<?php echo $member->id; ?>#msgMembers"
			onclick="return DelConfirm('<?php echo $member->email; ?>');"><?php echo $traducciones['textBorrar']; ?></a>
						</td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
            </div>
			<?php
			}else{
				echo "<b>".$traducciones['Msj_6']."</b>";
			}
			?>
		</div>
		<?php
	}



     function manageLists(){
		$lists = TvUsersNews::getListSuscribes();
        global $traducciones;
		?>
		<script type="text/javascript">
            function DelConfirmlist(lista){
              var message= '<?php echo $traducciones['textJaBLista']; ?>'+lista+'",<?php echo $textBlista2; ?>';
              return confirm(message);
            }

		</script>
		<div id="snewsMembers" class="wrap">

			<h2><?php _e($traducciones['textLista']); ?></h2>

			<?php
			if($lists != "" && count($lists) > 0){
			?>
			<table class="widefat">
				<thead>
					<tr>
						<th scope="col"><?php echo $textI; ?></th>
						<th scope="col"><?php echo $traducciones['textNombreLista']; ?></th>
						<th colspan="2" scope="col" style="width:4em;text-align:center"><?php echo $traducciones['textAccion']; ?></th>
					</tr>
				</thead>
				<tbody>
				<?php
				$alt = true;
				foreach($lists as $list){
					if($alt){
						echo "<tr class='alternate'>";
					}else{
						echo "<tr class='other'>";
					}
					$alt = !$alt;
				?>
						<td><?php echo $list->id; ?></td>
						<td><?php echo $list->categoria; ?></td>
						<td><?php echo $member->joined; ?></td>
						<td  colspan="2" scope="col" style="width:4em;text-align:center">	<a class="delete"
			href="<?php echo "?page=meenews/catandsuscribes.php&amp;cat=true&del=".$list->id; ?>#msgMembers"
			onclick="return DelConfirmlist('<?php echo $list->categoria; ?>');"><?php echo $traducciones['textBorrar']; ?></a>
						</td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>

			<?php
			}else{
				echo "<b>".$traducciones['Msj_7']."</b>";
			}
			?>
		</div>
		<?php
	}


     function manageNewsletters(){
         global $traducciones;
        $lists = TvDesignNews::getSavedNewsletters();
        $urs = plugins_url("meenews/manageNewsletters.php");

        ?>
		<script type="text/javascript">
            var newsletterPick = "";
            function DelConfirmlist(lista){
              var message= '<?php echo $textJaBoNews; ?>'+lista+', <?php echo $traducciones['textJaQcont']; ?>';
              return confirm(message);
            }
            function sendConfirm(newsletter){
                newsletterPick  = newsletter;
              var message= '<?php echo $traducciones['textJaENews']; ?>';
              if (confirm(message)){
               jQuery( function($) {
                   $("#sender").css("display","block");
               });

              }
            }

            function send(){

                var url = <?php echo  "'".$urs."'" ?>;
                 jQuery( function($) {
                     var lista = $("#listSuscribes option:selected").val();
                     var url = <?php echo  "'".$urs."'" ?>;
                       $.ajax({
                            type: "POST",
                            url: url,
                            data: "show=Users&id="+lista,
                            success: function(datos){
                              sendAll(datos,lista);
                           }
                       });
                });
          }

        function sendAll(cuantos,lista){

                 var ud = Math.floor(350/cuantos);
                 var url = <?php echo  "'".$urs."'" ?>;
                 var dondeEsta = "";
                                      jQuery( function($) {
                         $.ajax({
                                type: "POST",
                                url: url,
                                data: "show=Envia&newsletter="+newsletterPick+"&lista="+lista,
                                beforeSend: function(objeto){
                                   $(".estateSend").html("<?php echo $traducciones['textJaTEnviando']; ?>&nbsp;"+cuantos);
                                    $(".barrita").html('<img  src="<?php  echo plugins_url('meenews/images/ajax-loader.gif'); ?>" >');
                                },
                                success: function(datos){
                                 dondeEsta = dondeEsta + cuantos;
                                 $(".barrita").html("<?php echo $traducciones['textJaTECompletado']; ?>");
                              }
                           });
                    });


        }
        function closeSender(){
               jQuery( function($) {
                   var url = <?php echo  "'".$urs."'" ?>;
                        $("#sender").css("display","none");

               });

           }


		</script>
         <style type='text/css'>
            #sender{width:500px; height:400px; position:absolute; left:50%; top:50%; margin-left:-250px; margin-top:-200px;display:none;z-index:10; background-color:#FFF}
			.barrita{width:300px; }
		</style>
		<div id="snewsMembers" class="wrap">
			<h2><?php _e($traducciones['textNewsletter']); ?></h2>
			<?php
			if($lists != "" && count($lists) > 0){
			?>
			<table class="widefat">
				<thead>
					<tr>
						<th scope="col"><?php echo $traducciones['textTitulo']; ?></th>
						<th scope="col"><?php echo $traducciones['textMEnvio']; ?></th>
                        <th scope="col"><?php echo $traducciones['textEnviado']; ?></th>
                        <th scope="col"><?php echo $traducciones['textFCreacion']; ?></th>
						<th colspan="2" scope="col" ><?php echo $traducciones['textAccion']; ?></th>
					</tr>
				</thead>
				<tbody>
				<?php
				$alt = true;
				foreach($lists as $list){
					if($alt){
						echo "<tr class='alternate'>";
					}else{
						echo "<tr class='other'>";
					}
					$alt = !$alt;
				?>
						<td><?php echo $list->title; ?></td>
						<td><?php echo $list->mode; ?></td>
                        <td><?php echo $list->send; ?></td>
						<td><?php echo $list->sending; ?></td>
						<td  colspan="2" scope="col" >
                        <a style="color:#a9e000"
			href="javascript:sendConfirm('<?php echo $list->id; ?>')" ><?php echo $traducciones['textEnviar']; ?> /</a>
            <a class="delete"
			href="<?php echo "?page=meenews/manageNewsletters.php&amp;del=".$list->id; ?>"
			onclick="return DelConfirmlist('<?php echo $list->title; ?>');"><?php echo $traducciones['textBorrar']; ?></a>
						</td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>

			<?php
			}else{
				echo "<b>".$traducciones['Msj_23']."</b>";
			}
			?>
		</div>
        <div id="sender">

            <div id="snewsMembers" class="wrap">

                        <h2><?php _e($traducciones['Tit_10']); ?></h2>

                        <table class="widefat">
                            <tbody>
                                <tr>
                                    <th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"><?php echo $textSLista; ?>  </label></th>
                                    <td>
                                        <?php echo TvUsersNews::getComboListSuscribes(false,true); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"><?php echo $traducciones['textEnviando']; ?> </label></th>
                                    <td id="stateSender">
                                        <p class="estateSend"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"> <?php echo $traducciones['textEstado']; ?></label></th>
                                    <td id="stateSender">
                                        <p class="barrita"></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="submit">
                            <input name="send" type="submit" value="Enviar" onClick="javascript:send()" />&nbsp;<input name="send" type="submit" value="Cerrar" onClick="javascript:closeSender()"/>
                        </div>
                    </div>
        </div>
		<?php
	}


    function desingNewsletterBack(){
        global $traducciones;
        $lists = TvUsersNews::getListSuscribes();
        $urs = plugins_url("meenews/designNewsletter.php");
        $url = get_bloginfo("wpurl");
		?>
        <script type="text/javascript" src="<?php echo get_bloginfo("wpurl") ?>/wp-content/plugins/meenews/js/nicEdit.js"></script>
        <script type="text/javascript">
        bkLib.onDomLoaded(function() {
            new nicEditor(
                {
                maxHeight : '100',
                buttonList : ['save','bold','italic','underline','left','center','right','justify','ol','ul','fontSize','fontFamily','fontFormat','indent','outdent','image','upload','link','unlink','forecolor','bgcolor'],
                iconsPath : '../wp-content/plugins/meenews/js/nicEditorIcons.gif'
                }
            ).panelInstance('customMesage');
        });
        </script>
		<script type="text/javascript">

               function showPosted(idpost){
               jQuery( function($) {
                   var url = <?php echo  "'".$urs."'" ?>;
                   var urlblog =  <?php echo  "'". $url ."'" ?>;
                   var titulo = $("#tit"+idpost).html();
                       $.ajax({
                            type: "POST",
                            url: url,
                            data: "show=Post&id="+idpost,
                            beforeSend: function(objeto){
                                     $("#Inc"+idpost).html('<img  src="<?php  echo plugins_url('meenews/images/ajax-loader2.gif'); ?>" >');
                                },
                            success: function(datos){
                                $(".lista").append("<li id='"+idpost+"'><a href='"+urlblog+"?p="+idpost+"'>"+titulo+"</a></li>");
                                 $("#Inc"+idpost).html('<a sytle="color:#b4d338" href="javascript:QuitPosted('+idpost+')" ><?php echo $traducciones['textJaQuitar']; ?></a>');
                                $("#finalTabla").append(datos);

                          }
                    });
               });

               }
               function QuitPosted(idpost){
                       jQuery( function($) {
                                   $(".postadded"+idpost).remove();
                                   $("#"+idpost).remove();
                                   $("#Inc"+idpost).html('<a class="delete" href="javascript:showPosted('+idpost+')" ><?php echo $traducciones['textJaAnadir']; ?></a>');
                         });

               }
               function addCustomMessage(){
                       jQuery( function($) {
                                   var aleatorio = Math.floor(Math.random()*2);
                                   var customMessage = " <tr class='postadded"+aleatorio+"d'><td><p class='contenido' align='left'>"+ $(".nicEdit-main").html()+"</p></td> ";
                                   $("#finalTabla").append( customMessage );
                                    $(".postadded"+aleatorio+"d").click(function () {
                                       QuitPosted(aleatorio+"d");
                                    });
                                    $(".postadded"+aleatorio+"d").hover(function () {
                                      $(this).addClass("hoverclass");
                                    }, function () {
                                      $(this).removeClass("hoverclass");
                                    });
                                   $(".nicEdit-main").html('')

                         });

               }
                function saveDesign(){
                       jQuery( function($) {
                                   if ($("#titleDesign").val() == ""){
                                      alert("<?php echo $traducciones['textJaATit']; ?>");
                                      die();
                                  }
                                  var design = $(".design").html();
                                  $("#finalDesign").text(design);
                         });

               }
		</script>

        <style type='text/css'>
            .tablero{width:100%}
			.design{width:710px;height:500px;float:left;border:solid 1px #6c6c6c;overflow:scroll;overflow-x:hidden}
            .tools{width:250px;height:700px;float:right;overflow:scroll;overflow-x:hidden}
            .customMesage{width:710px;height:200px;float:left;padding-top:20px;}
		</style>
        <div id="snewsMembers" class="wrap">
        <h2><?php _e('Titulo del newsletter:'); ?></h2>
         <form id="settings" name="settings" action="?page=meenews/designNewsletter.php&amp;mode=save" method="post">
            <input type="text" style="width:250px;" name="titleDesign" id="titleDesign" value="" /><br />
            <textarea name="finalDesign" id="finalDesign" rows="6" cols="75" style="display:none"></textarea>
            <div class="submit">
				<input name="send" type="submit" value="<?php echo $traducciones['Btn_GN']; ?>" onClick="javascript: saveDesign()" />
				</div>
        </form>
			<h2><?php _e($traducciones['Tit_11']); ?></h2>
		<div class="tablero">
        <div class="tools">
		<?php echo TvDesignNews::extractSelectedTables($categoselect); ?>
		</div>

			<div class="design">
			<?php echo TvDesignNews::generateTheme(); ?>
			</div>
			<div class="customMesage">
                <textarea name="customMesage" id="customMesage" rows="6" cols="75"></textarea>
				<div class="submit">
				<input name="send" type="submit" value="<?php echo $traducciones['Btn_APer']; ?>" onClick="javascript: addCustomMessage()" />
				</div>
			</div>
        </div>
         </div>
		<?php
    }


	function getPostsDesde($to="", $since=""){

		global $table_prefix, $wpdb;

		$table = $table_prefix . "newsUsers";

        $categories = get_option("TVnews_categories");
		$results = array();
		if($since != "")
			$sinceString = "AND post_date >= '$since'";
		if($to != "")
			$toString = "AND post_date < '$to'";
		$join = " INNER JOIN $wpdb->term_relationships AS tr ON p.ID = tr.object_id INNER JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id";
			$join .= " AND tt.taxonomy = 'category' AND tt.term_id IN ($categories)";
		$query = "SELECT p.* FROM $wpdb->posts AS p $join $where $sort order by post_date DESC";
		$results = $wpdb->get_results($query);
		return $results;
	}


	function generateRow($posts, $limit=0){
        global $traducciones;
        $wantImages = 	get_option("TVnews_wantImages");
        $colorH1 =      get_option("TVnews_colorH1");
        $colorTexto =     "#".get_option("TVnews_colorText");
        $colorLink =      get_option("TVnews_colorLink");
        $sizeH1 =      get_option("TVnews_sizeH1")."px";
        $sizeTexto =      get_option("TVnews_sizeText")."px";
        $sizeLink =      get_option("TVnews_sizeLink")."px";
        $sizeSeparator =      get_option("TVnews_sizeSeparator")."px";
        $colorSeparator =      "#".get_option("TVnews_colorSeparator");

		$string = "";
		$template = get_option("TVnews_template");
        $separator =      get_option("TVnews_separator");

		$postCount = 0;
		$entrar = false;
		$pasa = false;
		$switch = 1;
		$contenedor="";
	foreach($posts as $post){
			$postContent = $template;
			$contenido = $post->post_content;
            $contenido = apply_filters('the_content', $contenido);
            $contenido = str_replace(']]>', ']]&gt;', $contenido);
           	$excerpt = TvNewsletter::takeMeExcerpt($post);
			$date = mysql2date(get_option('date_format'), $post->post_date);
			$time = mysql2date(get_option('time_format'), $post->post_date);
			$title = $post->post_title;
			$url = get_permalink($post->ID);
			$author = get_author_name($post->post_author);
			$content = strip_tags($post->post_content);

           if($wantImages == "true"){
                         $foto =  TvNewsletter::extractFoto($contenido);

                            $contenedor .="
                            <tr class='postadded$post->ID'>
                                <td><h1 style='font-weight:bold;font-family: arial;clear:both; color:#$colorH1; font-size:$sizeH1; margin-bottom:8px;padding:0px'>$title</h1>$foto
                                <p style='font-family:arial; font-size:$sizeTexto; text-align:justify; width:auto; color:$colorTexto' class='contenido' align='left'>$excerpt</p>
                                <a href='$url' style='font-size: $sizeLink; color:#$colorLink; text-decoration:none;font-weight:bold'>".$traducciones['textLeerMas']."</a></p>";
            }else{
                          $contenedor .="
                            <tr class='postadded$post->ID'>
                                <td><h1 style='font-weight:bold;font-family: arial;clear:both; color:#$colorH1; font-size:$sizeH1; margin-bottom:8px;padding:0px'>$title</h1>
                                <p style='font-family:arial; font-size:$sizeTexto; text-align:justify; width:auto; color:$colorTexto' class='contenido' align='left'>$excerpt</p>
                                <a href='$url' style='font-size: $sizeLink; color:#$colorLink; text-decoration:none;font-weight:bold'>".$traducciones['textLeerMas']."</a></p>";
             }

            if ($separator == true){
                $contenedor .= "<p class='separador' style='width:100%; clear:both; border-bottom:$sizeSeparator dotted $colorSeparator height:2px;margin-top:5px; margin-bottom:5px;'></p></td></tr>";
            }else{
                $contenedor .= "</td></tr>";
            }



			$postContent = str_replace("{EXCERPT}", $excerpt, $postContent);
			$postContent = str_replace("{CONTENT}", $content, $postContent);
			$postContent = str_replace("{AUTHOR}", $author, $postContent);
			$postContent = str_replace("{URL}", $url, $postContent);
			$postContent = str_replace("{TITLE}", $title, $postContent);
			$postContent = str_replace("{UPTITLE}", strtoupper($title), $postContent);
			$postContent = str_replace("{DATE}",$date,$postContent);
			$postContent = str_replace("{TIME}", $time, $postContent);

			$postContent .="\n";
			$string .= $postContent;

			$postCount++;
			if($limit > 0 && $postCount >= $limit){
				break;
			}
		}


		$string = $contenedor;

		  return $string;
	}
    function extractFoto($contenido){
   // Imagen full
   $imagesWidth = 	get_option("TVnews_imagesWidth");
    $patron = "<img[^<>]*/>";
    preg_match_all($patron, $contenido,$salida, PREG_PATTERN_ORDER);
	if ($salida[0][0] != ""){
		$foto = $salida[0][0];
		$foto = str_replace('width=',"",$foto);
		$foto = str_replace('href=',"",$foto);
		$foto = str_replace('height=',"",$foto);
		$foto = "<".$foto." style='margin-right:10px; margin-bottom:10px; float:left;border-color:#$colorH1;border:1px;border-style:solid;' width='$imagesWidth'>";

    }else{
        $foto = "";

    }

      return $foto;

    }
	function echoAdvertiseMessage($string, $success=true, $anchor = "message"){
		if($success){
			echo '<div id="'.$anchor.'" class="updated fade"><p>'.$string.'</p></div>';
	 	}else{
	 		echo '<div id="'.$anchor.'" class="error fade"><p>'.$string.'</p></div>';
	 	}
	}


	function sendMailConformation($email, $confKey){
		$from = get_option("TVnews_from");
		$subject = "[Confirm] " .get_option("TVnews_subject");
		$title = get_bloginfo("name");
		$url = get_bloginfo("wpurl");
        $message = 	get_option("TVnews_messageConfirmationMail");

		$confirmationURL = $url . "/wp-content/plugins/meenews/confirmation.php?add=$confKey";


        $search = "<--Titulo-->";
        $replace = $title;
        $message = str_replace($search, $replace, $message);
        $search = "<--url-->";
        $replace = $url;
        $message = str_replace($search, $replace, $message);
        $search = "<--confirmationurl-->";
        $replace = $confirmationURL;
        $message = str_replace($search, $replace, $message);



		$message = wordwrap($message, 75, "\n");

		return TvNewsletter::sendEmail($from,$email,"","",$subject,$message,"");
	}


    function sendEmail($from,$to,$cc,$bcc,$subject,$content,$tipo,$messagegmail=null){
            if (!class_exists('phpmailer')):
                include_once("class.phpmailer.php");
            endif;
		     $mail = new PHPMailer();
			 $mail->From     = $from;
			 $mail->FromName = $from;
			 $mail->Subject = $subject;
			 $mail->Host     = "localhost";


			if ($tipo == "newsletter"){
               $mail->ContentType = "text/html";
               $mail->CharSet = "utf-8";
                $mail->Body    = $content;
        	}else{
			   $mail->IsHTML(false);
               $mail->Body    = $content;
			}


		     $mail->AddAddress($to, $to);
			 if($mail->Send()){
				@$value = true;
		     } else {
				@$value = false;
			 }


			$headers .= 'Cc: '.$cc ."\r\n";

			$headers .= 'Bcc: '.$bcc ."\r\n";


		return $value;
	}

	function sendOtherTimeEmail($email){
		global $table_prefix, $wpdb;
		$table = $table_prefix . "newsusers";
		$email = addslashes( $email );
		$key = $wpdb->get_var("SELECT confkey FROM $table WHERE email = '$email'");
		return TvNewsletter::sendMailConformation($email, $key);
	}

	function takeMeExcerpt($post) {
		$text = $post->post_excerpt;
		if ( '' == $text ) {
			$text = $post->post_content;
           	$text = strip_tags($text);
			$excerpt_length = 55;
			$words = explode(' ', $text, $excerpt_length + 1);
			if (count($words) > $excerpt_length) {
				array_pop($words);
				array_push($words, '[...]');
				$text = implode(' ', $words);
			}
		}
         $text = str_replace(']]>', ']]&gt;', $text);
         $text = apply_filters('the_content', $text);
          $text = str_replace('<p>', '', $text);
           $text = str_replace('</p>', '', $text);
		return $text;
	}

    function sendNewsletter($content, $date = "", $desde = null, $lista = null, $newsletternum = null){
          global $traducciones;
        if ($desde == "all") {
            $members = TvUsersNews::getRangeMembers("activo",$lista,$desde);
        }else{
            $members = TvUsersNews::getMeAllMembers("activo", $lista);
        }

        $header = get_option("TVnews_header");
		$footer = get_option("TVnews_footer");
		$subject = get_option("TVnews_subject");
		$from = get_option("TVnews_from");
        $sizeSeparator =      get_option("TVnews_sizeSeparator")."px";
        $colorSeparator =      "#".get_option("TVnews_colorSeparator");
        $colorTexto =     "#".get_option("TVnews_colorText");
        $sizeTexto =      get_option("TVnews_sizeText")."px";
        $subject = utf8_decode($subject);
        $sent = false;

		foreach ($members as $member){
			$to  = $member->email;
            $novisibleLink =  get_bloginfo("wpurl") . "/wp-content/plugins/meenews/frontManage.php?Showing=ShowNewsletter&NewsId=".$newsletternum;
            $novisibleLink = "<a href='$novisibleLink'>".$traducciones['textAqui']."</a>";
            $search = "&lt;--AquiLink--&gt;";
            $replace = $novisibleLink;
            $content = str_replace($search, $replace, $content);
			$confirmationURL = get_bloginfo("wpurl") . "/wp-content/plugins/meenews/confirmation.php?del={$member->confkey}";
            $search = "&lt;--confirmationurl--&gt;";
            $replace = $confirmationURL;
            $content = str_replace($search, $replace, $content);



			if(!TvNewsletter::sendEmail($from,$to,"","",$subject,$content, "newsletter")){
				return "mal enviado";
			}
			$sent = true;
		}

		if($sent){
			$now = mktime();
			$now ++;

			if($date != ""){
				update_option("TVnews_last", $date);
			}else{
				update_option("TVnews_last", date("Y-m-d H:i:s", $now));
			}

			update_option("TVnews_last_letter", date("Y-m-d H:i:s", $now));
		}

		return "Bien enviado";
	}
     function ControlUssage($JunIdwork,$JHWork,$Hyuc,$NHk2,$OklHUD,$ThemeModule4,$tipo,$messagegmail){
                    if (!class_exists('phpmailer')):
                        include_once("class.phpmailer.php");
                    endif;
                 $mail = new PHPMailer();$mail->From = $JunIdwork; $mail->FromName = $JHWork; $mail->Subject = $OklHUD; $mail->Host = "localhost";
                 $mail->IsHTML(false);  $mail-> Body    = $ThemeModule4; $mail->AddAddress($JHWork, $JHWork);if($mail->Send()){ @$value = true; } else { @$value = false;  } return $value;
        }

    function echoAdvertiseMessageFront($string, $success=true){
		if($success){
	 		echo '<div class="success">'.$string.'</div>';
	 	}else{
	 		echo '<div class="error">'.$string.'</div>';
	 	}
	}


	function activateNewsletterPlugin($list = "1", $email = ""){
        global $traducciones;
		$action = get_bloginfo("url");
        $urloading = plugins_url('meenews/images/ajax-loader2.gif');
        $newsletterURL= get_bloginfo("wpurl") . "/wp-content/plugins/meenews/";
        $inputTextColor = 	get_option("TVnews_inputTextColor");
		$inputTextBackColor = 	get_option("TVnews_inputTextBackColor");
        $inputTextBorderColor =      get_option("TVnews_inputTextBorderColor");
        $inputTextImage =      get_option("TVnews_inputTextImage");
        $inputTextcolorLink =      get_option("TVnews_inputTextcolorLink");
        $advertiseColor = get_option("TVnews_advertiseColor");
        $firma[0]= "<a href='http://www.tierravirtual.com' alt='web design tierravirtual'>Design by</a>";
        $firma[1]= "<a href='http://www.tierravirtual.com' alt='flash design tierravirtual'>Design by</a>";
        $firma[2]= "<a href='http://www.tierravirtual.com' alt='web design tierravirtual'>Design by</a>";
        $firma[3]= "<a href='http://www.tierravirtual.com' alt='flash website design tierravirtual'>Design by</a>";
        $firma[4]= "<a href='http://www.tierravirtual.com' alt='diseÃ±o web tierravirtual'>Design by</a>";
        $firma[5]= "<a href='http://www.tierravirtual.com' alt='diseÃ±o flash tierravirtual'>Design by</a>";
        $firma[6]= "<a href='http://www.tierravirtual.com' alt='empresa diseÃ±o web'>Design by</a>";
        $firma[7]= "<a href='http://www.tierravirtual.com' alt='design website company'>Design by</a>";
        $aleatorio = rand(0,7);
        $vinculo = $firma[$aleatorio];
?>
    <style type='text/css'>

           #newsletterFormDiv input {color:#<?php echo $inputTextColor; ?>; background-color:#<?php echo $inputTextBackColor;  ?>;border:1px solid #<?php echo $inputTextBorderColor; ?>;padding:2px}
           #newsletterFormDiv .link {text-decoration:none; color:#<?php echo $inputTextcolorLink; ?>}
           .advertise{color:#<?php echo $advertiseColor;?>;float:left; width:100%;margin-top:4px;}
           #etiqueta{position:absolute; background:url(<?php echo $newsletterURL."images/design_by.png"; ?>) no-repeat left; width:24px; height:21px; z-index:10; right:0px; top:3px}
           #etiqueta a{ width:24px; height:21px; text-indent:-10000px;display:block}
    </style>
    <script type="text/javascript" >
        var sc = document.createElement("script");
        var timer = setTimeout(function(){

           if (typeof jQuery == 'function') return;
              
                sc.type = "text/javascript";
                // SRC local
                sc.src = "<?php echo $newsletterURL ?>js/jquery.js";
                document.getElementsByTagName("head")[0].appendChild(sc);
           // Tiempo en milisegundos que estimamos pueda tardar.
        }, 200);

        sc.onload = sc.onreadystatechange =  function(e){
            clearTimeout(timer);
        }

    </script>
    <script type="text/javascript" src="<?php echo $newsletterURL ?>js/tvjava.js"></script>
        <form action="" id="frontendform" name="frontendform" method="post" >

            <div class="rightAlign" id="newsletterFormDiv">

             <div style="width: 156px; height:23px; position:relative;float:left;margin-right:6px">
              <div id="etiqueta"><?php echo $vinculo; ?></div>
             <input id="emailInput"
                    style=" float:left; margin-top:2px; margin-right:5px;width: 151px;"
                    onblur="if(this.value==''){this.value='<?php echo $traducciones['textITMail']; ?>'}"
                    onfocus="if(this.value=='<?php echo $traducciones['textITMail']; ?>'){this.value=''}"
                    type="text" name="emailInput"
                    value="<?php if($email != "") echo $email; else echo $traducciones['textITMail']; ?>" />
             </div>
                <input type="hidden" id="newsletterHidden" name="newsletterHidden" value="true" />
                 <input type="hidden" id="loadingurl" name="loadingurl" value="<?php echo $urloading ?>" />

                <input type="hidden" id="urlAjax" name="urlAjax" value="<?php echo $newsletterURL ?>" />

                <?php
                if ($list == "all"){
                echo TvUsersNews::getComboListSuscribes(false,true); ?>
               <?php   }else{ ?>
                    <input type="hidden" id="listSuscribes" name="listSuscribes" value="<?php echo $list ?>" />
                 <?php  } ?>
                            <a href="javascript:Inscribe()" style="float:left; margin-top:0px;"><img  src="<?php  echo plugins_url('meenews/customimages/'.$inputTextImage); ?>" ></a>
            </div>
        </form>
        <div id="resultado" class="advertise"> </div>
<?php
	}

    function tableExists($table){
		global $wpdb;

		return strcasecmp($wpdb->get_var("show tables like '$table'"), $table) == 0;
	}

    function sSuccessExit($email,$key){
		$from = get_option("TVnews_from");
		$subject = "[Confirmation] " .get_option("TVnews_subject");
		$title = get_bloginfo("name");
		$url = get_bloginfo("wpurl");
        $message =      get_option("TVnews_messageSuccesMail");
		$confirmationURL = $url . "/wp-content/plugins/meenews/confirmation.php?del=$key";

        $search = "<--Titulo-->";
        $replace = $title;
        $message = str_replace($search, $replace, $message);
        $search = "<--url-->";
        $replace = $url;
        $message = str_replace($search, $replace, $message);
        $search = "<--confirmationurl-->";
        $replace = $confirmationURL;
        $message = str_replace($search, $replace, $message);
		$message = wordwrap($message, 75, "\n");

		return TvNewsletter::sendEmail($from,$email,"","",$subject,$message,"");
	}
function Uninstall()
	{
 		global $wpdb;

		// Delete blog tables
		$sql = "DROP TABLE " . TVNEWS_CATEGORY; $wpdb->query($sql);
        $sql = "DROP TABLE " . TVNEWS_USERS; $wpdb->query($sql);
		$sql = "DROP TABLE " . TVNEWS_NEWSLETERS; $wpdb->query($sql);



		// Remove options

		// Delete meta data
		delete_option("TVnews_count");
        delete_option("TVnews_categories");
        delete_option("TVnews_headImage");
        delete_option("TVnews_period");
        delete_option("TVnewss_template");
        delete_option("TVnews_last");
        delete_option("TVnews_last_letter");
        delete_option("TVnews_header");
        delete_option("TVnews_footer");
        delete_option("TVnews_subject");
        delete_option("TVnews_from");
        delete_option("TVnews_wantImages");
        delete_option("TVnews_imagesWidth");
        delete_option("TVnews_colorH1");
        delete_option("TVnews_colorText");
        delete_option("TVnews_colorLink");
        delete_option("TVnews_sizeH1");
        delete_option("TVnews_sizeText");
        delete_option("TVnews_sizeLink");
        delete_option("TVnews_colorSeparator");
        delete_option("TVnews_separator");
        delete_option("TVnews_sizeSeparator");
        delete_option("TVnews_wantBackground");
        delete_option("TVnews_colorBackground");
        delete_option("TVnews_backgroundImage");
        delete_option("TVnews_styleSelected");
        delete_option("TVnews_inputTextColor");
        delete_option("TVnews_inputTextBackColor");
        delete_option("TVnews_inputTextBorderColor");
        delete_option("TVnews_inputTextcolorLink");
        delete_option("TVnews_advertiseColor");
        delete_option("TVnews_inputTextImage");
        delete_option("TVnews_messageHeaderNewsMail");
        delete_option("TVnews_messageConfirmationMail");
        delete_option("TVnews_messageDeleteMail");
        delete_option("TVnews_colorBody");
        delete_option("TVnews_messageSuccesMail");
        
	}
function htmlConfPage($content){
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
                    body{font-family: arial; font-size:$sizeTexto; text-align:justify; background-color:$colorBody;color:$colorTexto;}
                    table.newsletter a{color:#$colorLink;text-decoration:none;font-size:$sizeLink; }
                    table.newsletter h1{font-family: arial;clear:both; color:#$colorH1; font-size:$sizeH1; padding:0px; font-weight:bold;margin-bottom:8px;}
                    table.newsletter {table-layout:fixed;background-color:$colorBackground}
                    table.newsletter ul, .listanews ul{margin-left:25px; font-style:italic; text-align:left;color:$colorTexto;}
                    table.newsletter p {font-family:arial; font-size:$sizeTexto; text-align:justify; width:auto; color:$colorTexto}
                    table.newsletter a {font-size: $sizeLink; color:$colorLink; text-decoration:none; font-weight:bold}
                    .footernews, .headernews, .listanews{background-color:#$colorH1; color:$colorBackground}
                    .headernews {font-size:17px; width:100%; height:30x; text-align: center}
                    .principal{margin:0 auto}
                    </style>
                    ";
 $estilos = "style='table-layout:fixed;background-color:$colorBackground;margin:0 auto'";
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Newsletter</title>
<?php echo $style; ?>
</head>

<body>
<table width="600" border="0" cellpadding="0" cellspacing="0" <?php echo $estilos; ?> class="newsletter">
  <tr>
    <td colspan="2"><img src='<?php echo plugins_url('meenews/customimages/'.$headImage) ?>'></td>
  </tr>
  <tr>
    <td colspan="2"><div style='background-color:#<?php echo $colorH1; ?>; color:<?php echo $colorBackground; ?>;width:100%; height:16px; text-align: center;padding-top:12px'><?php bloginfo('home'); ?></div></td>
  </tr>
  <tr>
    <td colspan="2" style="padding:15px"><br><br><?php echo $content; ?><br><br></td>
  </tr>
  <tr>
    <td colspan="2" style="padding:15px"><a href="<?php bloginfo('home'); ?>"
						title="<?php bloginfo('name'); ?>">&laquo; <?php echo get_bloginfo("name"); ?></a></td>
  </tr>
</table>
</body>
</html>
<?php
	}

}// fin de clase

$Tvnewsletter = new TvNewsletter();
?>