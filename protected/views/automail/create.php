<?php
$this->breadcrumbs=array(
	'Automails'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Automail', 'url'=>array('index')),
	array('label'=>'Manage Automail', 'url'=>array('admin')),
);
?>

<h1>Create Automail</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>