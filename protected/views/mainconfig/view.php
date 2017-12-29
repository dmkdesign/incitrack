<?php
$this->breadcrumbs=array(
	'Mainconfigs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Mainconfig', 'url'=>array('index')),
	array('label'=>'Create Mainconfig', 'url'=>array('create')),
	array('label'=>'Update Mainconfig', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Mainconfig', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Mainconfig', 'url'=>array('admin')),
);
?>

<h1>View Mainconfig #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'merchant_mode',
		'pricing',
	),
)); ?>
