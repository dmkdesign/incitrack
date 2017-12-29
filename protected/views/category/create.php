<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	
	array('label'=>'Manage Categories', 'url'=>array('admin')),
	array('label'=>'Create Category', 'url'=>'', 'active'=>true),
	array('label'=>'View Category', 'url'=>array('view', 'id'=>$model->id)),
);
?>
<div class="pageView">
<h1>Create Category</h1>

<?php echo $this->renderPartial('_form',compact('model','graphic','saveImage','images')); ?>
</div>