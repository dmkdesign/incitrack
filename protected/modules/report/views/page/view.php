<?php
$this->breadcrumbs=array(
	'Pages'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Page', 'url'=>array('index')),
	array('label'=>'Create Page', 'url'=>array('create')),
	array('label'=>'Update Page', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Page', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Page', 'url'=>array('admin')),
);
?>

<h1>View Page #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'sequence',
		'css',
	),
	'cssFile' => Yii::app()->baseUrl . '/css/widgets/detailview.css'
)); ?>
<h2 style="margin-bottom:0">Questions</h2>
<?php 
	
	$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id',
		'varname',
		'title',
		'page_id',
		'field_type',
		'field_size',
		//'field_size_min',
		array(
			'name'=>'required',
			'value'=>'Question::itemAlias("required",$data->required)',
		),
		//'match',
		//'range',
		//'error_message',
		//'other_validator',
		//'default',
		'position',
		array(
			'name'=>'visible',
			'value'=>'Question::itemAlias("visible",$data->visible)',
		),
		//*/
		array(
			'class'=>'CButtonColumn',
			'viewButtonUrl'=>'Yii::app()->createUrl("report/question/view&id=". $data->id)',
			'updateButtonUrl'=>'Yii::app()->createUrl("report/question/update&id=". $data->id)',
			'deleteButtonUrl'=>'Yii::app()->createUrl("report/question/delete&id=". $data->id)',
		),
	),
	'cssFile' => Yii::app()->baseUrl . '/css/widgets/gridView.css'
)); ?>
<div class="row buttons">

		<?php echo CHtml::button('Add Question', array('title'=>'showQuestion','onclick'=>'js:showQuestion();'));  ?>
</div>
<div id="addQuestion" style="display:none">
	<?php echo $this->renderPartial("report.views.question._form",array('model'=>$question,'pageid'=>$model->id),true);?>
	
</div>