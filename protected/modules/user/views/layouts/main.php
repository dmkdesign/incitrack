<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
		<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?> 
	<script type="text/javascript">
	

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-29288929-1']);
  _gaq.push(['_trackPageview']);


  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  

</script>
	<script src="//cdn.optimizely.com/js/52920456.js"></script>
</head>

<body>
<div id="header" style="height:130px">
	<div id="header-container">
		<div style="float:right; padding: 5px 0px 5px 0px; font-size:15px; margin-top:30px; "><a style="font-size:15px" href="index.php?r=site/about">About Gridbid</a>  &nbsp | &nbsp 
		<div style="color:#F7931E;display:inline-block;font-size:15px;line-height: 15px"> Questions? 1.855.474.3243
		 <img style="vertical-align:top;margin-left:2px; margin-top:1px" src='images/american_flag.jpeg'/></div>  &nbsp | &nbsp
		 <?php if(!(Yii::App()->user->isGuest)): ?>Welcome: <?php echo CHtml::encode("You're logged in.")?> &nbsp |&nbsp 
		 <a href="index.php?r=/user/logout">Logout</a> <?php else: ?><div style="color:#F7931E; display:inline; font-size:15px; ">Have an account? </div>
		  <?php echo CHtml::submitButton('Log In', array('onclick'=>'javascript:location.href="index.php?r=user/login"', 'class'=>'btn', 'style'=>'margin-left:10px')); endif; ?></div> 
		<div id="logo"><a href="
		<?php 
		switch($userType = Yii::App()->user->getState('userType'))
		{
			case 'roof':
				echo CHtml::encode('index.php?r=roof/index');
				break;
			case 'soco':
				echo CHtml::encode('index.php?r=soco/index');
				break;
			case 'admin':
				echo CHtml::encode('index.php?r=admin');
				break;
			default:
				echo CHtml::encode('index.php?');
				break;
		}
		?>" >
		<img src="images/Logo.png" alt="Logo"/></a></div>
	</div><!-- headercontainer -->
	<div style="background-color:#6E665E; height:40px; clear:both">
		<div id="mainmenu" style="width:960px; margin:auto">
	
		<?php 
		function isItemActive ($route,$id)
		{
			//explode the route ($route format example: /site/contact)
			$menu = explode("/",$route);
		
			//compare the first array element to the $id passed
			foreach( $menu as $string)
			{
			 if ($string == $id )
			 	return true;
			}
			return false;
		}
		$userType = Yii::App()->user->getState('userType');
	
		if($userType == 'roof')
		{
			$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
					array('label'=>'My Projects', 'url'=>array('/roof/index&id='.Yii::App()->user->id), 'active'=> isItemActive ($this->route,'index')),
				//array('label'=>'My Projects', 'url'=>array('/roof/list&id='.Yii::App()->user->id), 'active'=> isItemActive ($this->route,'list')),
				array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>"My Profile", 'visible'=>!Yii::app()->user->isGuest, 'active'=>isItemactive($this->route,'profile')),
			),		
			));
			echo '<div style="float:right; margin:5px 20px">'; echo CHtml::submitButton('Add a new project',array('class'=>'btn', 'submit'=>'index.php?r=roof/create'));
		}
		elseif ($userType =='soco')
			{
			$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
						array('label'=>'Find Leads', 'url'=>array('/soco/index')),
						array('label'=>'My Projects', 'url'=>array('/soco/dashboard', 'view'=>'about')),
						array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>'My Account', 'visible'=>!Yii::app()->user->isGuest),
				),
				));
			}
			elseif($userType == 'admin')
			{
				$this->widget('zii.widgets.CMenu',array(
						'items'=>array(
										
								array('label'=>'CMS', 'url'=>array('/articles/admin')),
								array('label'=>'Admin', 'url'=>array('/admin')),
						),
				));
				echo '<div style="float:right; margin:5px 20px">'; echo CHtml::submitButton('Add a new project',array('class'=>'btn', 'submit'=>'index.php?r=roof/create'));
			}

		 ?>
		 
	</div><!-- mainmenu -->
	</div><!-- mainmenu banner-->
	</div><!-- header -->
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
    <a href="index.php?r=site/FAQ"><?php echo Yii::App()->name;?> FAQ</a>  &nbsp | &nbsp <a href="index.php?r=site/Contact">Contact Us</a>  &nbsp | &nbsp <a href="http://solar.gridbid.com/" target="_blank">Gridbid Blog</a>
      &nbsp | &nbsp<a href="http://www.twitter.com/gridbid" rel="nofollow" target="_blank">Twitter</a> &nbsp |  &nbsp<a href="http://www.facebook.com/pages/gridbid/348456555179022" rel="nofollow" target="_blank">Facebook</a>
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