<?php $this->renderPartial('//layouts/header_tag');?>
<?php 
$baseUrl = Yii::app()->baseUrl; 
  $cs = Yii::app()->getClientScript();
  $cs->registerScriptFile($baseUrl.'/assets/modalPopup/modal.js');
  ?>
<body style="background-color:#FFF">
<?php $this->renderPartial('//layouts/header_splash');?>
<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php /*$this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); */?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>


</div><!-- page -->

<?php $this->renderPartial('//layouts/footer_main');?>

</body>


</html>