<?php
$this->breadcrumbs=array(
	'Automails'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Automail', 'url'=>array('index')),
	array('label'=>'Create Automail', 'url'=>array('create')),
	array('label'=>'View Automail', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Automail', 'url'=>array('admin')),
);
?>

<h1>Update Automail <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>