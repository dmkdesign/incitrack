<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php $this->renderPartial('//layouts/kissmetrics'); ?>
<?php $this->renderPartial('//layouts/header_tag'); ?>
</head>

<?php 
$baseUrl = Yii::app()->baseUrl; 
  $cs = Yii::app()->getClientScript();
  $cs->registerScriptFile($baseUrl.'/assets/modalPopup/modal.js');
  ?>
<body style="background-color:#FFF">
<?php $this->renderPartial('//layouts/header_main'); ?>
<div class="container" id="page">

<div id="helpdesk"> 
		<link href="https://d3jyn100am7dxp.cloudfront.net/assets/widget_embed.cssgz?1330067445" media="screen" rel="stylesheet" type="text/css" />
<!--If you already have fancybox on the page this script tag should be omitted-->
<script src="https://d3jyn100am7dxp.cloudfront.net/assets/widget_embed_libraries.jsgz?1330067446" type="text/javascript"></script>
	<script>
                        
                        // ********************************************************************************
                        // This needs to be placed in the document body where you want the widget to render
                        // ********************************************************************************
                        
                        new DESK.Widget({ 
                                version: 1, 
                                site: 'gridbid.desk.com', 
                                port: '80', 
                                type: 'chat', 
                                displayMode: 1,  //0 for popup, 1 for lightbox
                                features: {  
                               	 offerAlways: false, 
                                 offerAgentsOnline: true, 
                                 offerRoutingAgentsAvailable: false,  
                                 offerEmailIfChatUnavailable: true 
                                },  
                                fields: { 
                                        ticket: { 
                                                // desc: '',
                                // labels_new: '',
                                // priority: '',
                                // subject: ''
                                        }, 
                                        interaction: { 
                                                // email: '',
                                // name: ''
                                        }, 
                                        chat: { 
                                                //subject: '' 
                                        }, 
                                        customer: { 
                                                // company: '',
                                // desc: '',
                                // first_name: '',
                                // last_name: '',
                                // title: ''
                                        } 
                                } 
                        }).render();  
                </script></div>
	<?php if(isset($this->breadcrumbs)):?>
		<?php /*$this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); */?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>


</div><!-- page -->
<div class="footer" id="footer" align="center"  style="clear:both">
<div style="width:960px; margin:auto">
    <div style="float:left; margin-left:5px; color:#6E665E">
	<a href="index.php?r=site/about"><?php echo Yii::App()->name;?> About Us</a>  &nbsp| &nbsp <a href="index.php?r=site/FAQ"><?php echo Yii::App()->name;?> FAQ</a>  &nbsp| &nbsp <a href="index.php?r=site/Contact">Contact Us</a>  &nbsp| &nbsp <a href="http://solar.gridbid.com/" target="_blank">Gridbid Blog</a>
      &nbsp| &nbsp <a href="http://www.twitter.com/gridbid" rel="nofollow" target="_blank">Twitter</a> &nbsp |  &nbsp<a href="http://www.facebook.com/pages/gridbid/348456555179022" rel="nofollow" target="_blank">Facebook</a>
     </div>
    <div style="float:right">&copy; <?php echo date('Y'); ?> Habitat Enterprises Ltd.
    </div>
</div>
	</div><!-- footer -->
	<!-- Start of HubSpot Tracking Code -->
<script type="text/javascript" language="javascript"> var hs_portalid=160669; var hs_salog_version = "2.00"; var hs_ppa = "gridbid.app12.hubspot.com"; document.write(unescape("%3Cscript src='" + document.location.protocol + "//" + hs_ppa + "/salog.js.aspx' type='text/javascript'%3E%3C/script%3E")); </script>
<!-- End of HubSpot Tracking Code --> 
	
</body>
</html>