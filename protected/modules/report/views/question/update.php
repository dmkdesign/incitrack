<?php
$this->breadcrumbs=array(
	UserModule::t('Profile Fields')=>array('admin'),
	$model->title=>array('view','id'=>$model->id),
	UserModule::t('Update'),
);
?>

<h1><?php echo UserModule::t('Update ProfileField ').$model->id; ?></h1>

<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
			array('label'=>UserModule::t('Create Question'),'url'=>array('create')),
			array('label'=>UserModule::t('View Question'),'url'=>array('view','id'=>$model->id)),
		),
	));
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>