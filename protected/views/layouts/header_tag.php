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
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico" type="image/x-icon" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
	<meta property="og:type" content="website" />
	<meta property='og:image' content='<?php echo Yii::app()->request->baseUrl; ?>/images/Logo.png' />
	<meta property='og:title' content="@BCARC Incident Tracker" />
	<meta property='og:description' content="British Columbia Association of Restoration Contractors - Incident Tracking Web Application" />
	<meta property='og:url' content='<?php echo Yii::app()->request->baseUrl; ?>' />
	<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?> 
	<?php /* 
	<script>
	$(document).ready(function(){ 
		
	
		
		   
            }); 

	</script> */
	?>
</head>

