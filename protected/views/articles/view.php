<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	$model->framename,
);

$this->menu=array(
	array('label'=>'List Articles', 'url'=>array('index')),
	array('label'=>'Create Articles', 'url'=>array('create')),
	array('label'=>'Update Articles', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Articles', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Articles', 'url'=>array('admin')),
);
?>

<h1>View Article: <?php echo $model->framename; ?></h1>
<div class="projectView">

	<b><?php echo CHtml::encode($model->getAttributeLabel('framecode')); ?>:</b>
	<?php echo CHtml::link($model->framecode, array('view', 'id'=>$model->id),array('style'=>'font-decoration:none; font-size:15px; font-color:#999999')); ?>
	<br />
	<b><?php echo CHtml::encode($model->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode(Articles::itemAlias('type',$model->type)); ?>
	<br />
	<br>
	<?php echo $model->content?>
</div>
