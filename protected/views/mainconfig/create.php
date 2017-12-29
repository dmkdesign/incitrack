<?php
$this->breadcrumbs=array(
	'Mainconfigs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Mainconfig', 'url'=>array('index')),
	array('label'=>'Manage Mainconfig', 'url'=>array('admin')),
);
?>

<h1>Create Mainconfig</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>