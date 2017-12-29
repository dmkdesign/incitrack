<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<?php $this->renderPartial('//layouts/header_tag'); ?>
<body>
<?php $this->renderPartial('//layouts/header_main'); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php /*$this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); */?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>


</div><!-- page -->
<?php $this->renderPartial('//layouts/footer_main'); ?>
	
</body>
</html>