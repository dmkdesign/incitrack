<?php
$this->breadcrumbs=array(
	UserModule::t('Questions')=>array('admin'),
	UserModule::t($model->title),
);
?>
<div class="questionView">
<div class="questionTitle"><?php echo UserModule::t('View Question Field #').$model->varname; ?></h1>

<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
			array('label'=>UserModule::t('Create Question'),'url'=>array('create',)),
			array('label'=>UserModule::t('Update Question'),'url'=>array('update','id'=>$model->id)),
			
		),
	));
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'page_id',
		'varname',
		'title',
		'field_type',
		'field_size',
		'field_size_min',
		'required',
		'match',
		'range',
		'error_message',
		'other_validator',
		'widget',
		'widgetparams',
		'default',
		'position',
		'visible',
			'choicesView'
			
	),
	'cssFile' => Yii::app()->baseUrl . '/css/widgets/detailview.css'
)); ?>
<?php if ($model->field_type == 'SELECT' || $model->field_type == 'RADIO'){?>
<div id='choices_list'>
<?php 
	
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'choices-grid',
		'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id',
		'text',
		'position',
		'question',
		
		//*/
		array(
			'class'=>'CButtonColumn',
			'viewButtonUrl'=>'Yii::app()->createUrl("report/choices/view&id=". $data->id)',
			'updateButtonUrl'=>'Yii::app()->createUrl("report/choices/update&id=". $data->id)',
			'deleteButtonUrl'=>'Yii::app()->createUrl("report/choices/delete&id=". $data->id)',
		),
	),
)); ?>
</div>

<div class="row buttons">

		<?php echo CHtml::button('Add Choice', array('title'=>'showChoices','onclick'=>'js:showChoices();'));  ?>
</div>
<div id="choicesdiv" style="display:none">
<?php echo $this->renderPartial("report.views.choices._ajaxform",array('model'=>$choices,'questionid'=>$model->id),true);?>
</div>
<?php }?>
</div>
</div>