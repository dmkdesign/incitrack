<?php
$this->breadcrumbs=array(
	'Choices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Choices', 'url'=>array('index')),
	array('label'=>'Manage Choices', 'url'=>array('admin')),
);
?>

<h1>Create Choices</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>