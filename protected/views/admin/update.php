<?php
$this->breadcrumbs=array(
	'Subconfigs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Subconfigs', 'url'=>array('index')),
	array('label'=>'Create Subconfigs', 'url'=>array('create')),
	array('label'=>'View Subconfigs', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Subconfigs', 'url'=>array('admin')),
);
?>

<h1>Update Subconfigs <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>