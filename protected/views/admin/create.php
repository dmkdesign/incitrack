<?php
$this->breadcrumbs=array(
	'Subconfigs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Subconfigs', 'url'=>array('index')),
	array('label'=>'Manage Subconfigs', 'url'=>array('admin')),
);
?>

<h1>Create Subconfigs</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>