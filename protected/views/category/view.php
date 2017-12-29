<?php
$this->breadcrumbs=array(
	$model->title,
);
if(UserModule::isAdmin()){
$this->menu=array(
		
	array('label'=>'Manage Categories', 'url'=>array('admin')),
	array('label'=>'Create Category', 'url'=>array('create')),
	array('label'=>'View Category', 'url'=>'', 'active'=>true),
	array('label'=>'Update Category', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Category', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
}

?>

<div class="category">
<h1><?php echo $model->title; ?></h1>

<div class="description"><?php echo $model->description; ?></div>
</div>