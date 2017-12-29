<?php
$this->breadcrumbs=array(
	'Mainconfigs',
);

$this->menu=array(
	array('label'=>'Create Mainconfig', 'url'=>array('create')),
	array('label'=>'Manage Mainconfig', 'url'=>array('admin')),
);
?>

<h1>Mainconfigs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
