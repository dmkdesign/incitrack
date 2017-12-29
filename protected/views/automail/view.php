<?php
$this->breadcrumbs=array(
	'Automails'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Automail', 'url'=>array('index')),
	array('label'=>'Create Automail', 'url'=>array('create')),
	array('label'=>'Update Automail', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Automail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Automail', 'url'=>array('admin')),
);
?>

<h1>View Automail #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'email',
		'lat',
		'lng',
		'radius',
		'active',
	),
)); ?>
