<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<?php $this->renderPartial('//layouts/kissmetrics'); ?>
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
</head>

<body>

<div class="container" id="page">

	<div id="header" class="span-24" style="background-color:#F0F0F0; background-image:splashheader.png; display:inline-block; height:175px">
		<div id="logo" style="margin:5px 0 0 5px"><img src="images/Logo.png" alt="Logo" /></div>

        <div id="SolarListInfo" class="span-16" style="margin-left:10px">Motto here! 
         <p><strong>Click <a href="http://http://www.facebook.com/pages/Powerlend/340350322655941">here</a> for our story.</strong></p>
</div>
        
	</div><!-- header -->


	<?php echo $content; ?>

	<div class="footer" id="footer" align="center"  style="clear:both">
    <div style="float:left; margin-left:5px">
    <a href="index.php?r=site/About">About <?php Yii::App()->name;?></a> | <a href=".index.php?r=site/FAQ">FAQ</a> | <a href="index.php?r=site/Contact">Contact Us</a>
    </div>
    <div style="float:right">Copyright &copy; <?php echo date('Y'); ?> by Solarlist Inc.
    </div>
		
		<br />
		<?php echo Yii::powered(); ?><br />
        Coded by <a href="http://www.dmkdesign.ca">DMK Design</a>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>