<?php

$newsletterURL= get_bloginfo("wpurl") . "/wp-content/plugins/meenews/";
?>
<link type="text/css" rel="stylesheet" href="<?php echo $newsletterURL ?>js/visualize.jQuery.css"/>
		<link type="text/css" rel="stylesheet" href="<?php echo $newsletterURL ?>js/demopage.css"/>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		<!--[if IE]><script type="text/javascript" src="<?php echo $newsletterURL ?>js/excanvas.compiled.js"></script><![endif]-->
		<script type="text/javascript" src="<?php echo $newsletterURL ?>js/visualize.jQuery.js"></script>
        <script type="text/javascript" src="<?php echo get_bloginfo("wpurl") ?>/wp-content/plugins/meenews/js/ui.core.js"></script>
        <script type="text/javascript" src="<?php echo get_bloginfo("wpurl") ?>/wp-content/plugins/meenews/js/ui.tabs.js"></script>
        <link href="<?php echo get_bloginfo("wpurl") ?>/wp-content/plugins/meenews/css/ui.tabs.css" rel="stylesheet" type="text/css" />


        <script type="text/javascript">
                    $(function(){

                        $('#tvtabs > ul').tabs();
                    });
          </script>
<div id="tvtabs">

        <ul>
        <li><a href="#tab1"><span><?php echo $traducciones['textGenerales']; ?></span></a></li>
        <li><a href="#tab2"><span><?php echo $traducciones['textNewsletter']; ?></span></a></li>
        
        </ul>
<div id="tab1">
        <div class="wrap" style="height:700px" >
		<img src="<?php  echo plugins_url('meenews/stats.png'); ?>"  >
		</div>
</div>
<div id="tab2">

    <div class="wrap">
 		<img src="<?php  echo plugins_url('meenews/stats1.png'); ?>"  >
       
       
	</div>
<br style="clear:both">
<br style="clear:both">

</div>
<br style="clear:both">
<br style="clear:both">
</div>
