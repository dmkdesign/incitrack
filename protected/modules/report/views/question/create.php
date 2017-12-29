<?php
$this->breadcrumbs=array(
	UserModule::t('Question')=>array('admin'),
	UserModule::t('Create'),
);
?>
<h1><?php echo UserModule::t('Create Question'); ?></h1>

<?php echo $this->renderPartial('_menu',array(
		'list'=> array(),
	)); ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>