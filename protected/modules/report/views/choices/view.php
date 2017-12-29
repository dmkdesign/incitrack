<?php
$this->breadcrumbs=array(
	'Choices'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Choices', 'url'=>array('index')),
	array('label'=>'Create Choices', 'url'=>array('create')),
	array('label'=>'Update Choices', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Choices', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Choices', 'url'=>array('admin')),
);
?>
<div class="choices View">
<div lasss="choicesTitle">View Choices #<?php echo $model->id; ?></div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'text',
		'position',
		'graphic',
		'question',
	),
	'cssFile' => Yii::app()->baseUrl . '/css/widgets/detailview.css'
)); ?>
</div>