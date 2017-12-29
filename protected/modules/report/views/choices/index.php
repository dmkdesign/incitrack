<?php
$this->breadcrumbs=array(
	'Choices',
);

$this->menu=array(
	array('label'=>'Create Choices', 'url'=>array('create')),
	array('label'=>'Manage Choices', 'url'=>array('admin')),
);
?>

<h1>Choices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
