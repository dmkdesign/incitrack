<?php
$this->breadcrumbs=array(
	UserModule::t('Questions')=>array('admin'),
	UserModule::t('Manage'),
);
?>
<h1><?php echo UserModule::t('Manage Questions'); ?></h1>

<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
			array('label'=>UserModule::t('Create Question'),'url'=>array('create','pageid'=>'')),
		),
	));
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id',
		'varname',
		'title',
		'page_id',
		'field_type',
		'field_size',
		//'field_size_min',
		array(
			'name'=>'required',
			'value'=>'Question::itemAlias("required",$data->required)',
		),
		//'match',
		//'range',
		//'error_message',
		//'other_validator',
		//'default',
		'position',
		array(
			'name'=>'visible',
			'value'=>'Question::itemAlias("visible",$data->visible)',
		),
		//*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
