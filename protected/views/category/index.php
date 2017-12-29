<?php
$this->breadcrumbs=array(
	'Categories',
);

$this->menu=array(
		array('label'=>'Manage Categories', 'url'=>array('admin')),
	array('label'=>'Create Category', 'url'=>array('create')),
	
);
?>

<h1>Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
