<?php
$this->breadcrumbs=array(
	'Choices'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Choices', 'url'=>array('index')),
	array('label'=>'Create Choices', 'url'=>array('create')),
	array('label'=>'View Choices', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Choices', 'url'=>array('admin')),
);
?>

<h1>Update Choices <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>