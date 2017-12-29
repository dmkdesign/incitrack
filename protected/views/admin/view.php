<?php
$this->breadcrumbs=array(
	'Subconfigs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Subconfigs', 'url'=>array('index')),
	array('label'=>'Create Subconfigs', 'url'=>array('create')),
	array('label'=>'Update Subconfigs', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Subconfigs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Subconfigs', 'url'=>array('admin')),
);
?>

<h1>View Subconfigs #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'mode',
		'merchant_url',
		'merchant_cid',
		'merchant_user_id',
		'merchant_password',
	),
)); ?>
