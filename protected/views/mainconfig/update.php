<?php
$this->breadcrumbs=array(
	'Mainconfigs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Mainconfig', 'url'=>array('index')),
	array('label'=>'Create Mainconfig', 'url'=>array('create')),
	array('label'=>'View Mainconfig', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Mainconfig', 'url'=>array('admin')),
);
?>

<h1>Update Mainconfig <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>