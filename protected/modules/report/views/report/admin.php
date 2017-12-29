<?php
$this->breadcrumbs=array(
	'Reports'=>array('index'),
	'Manage',
);

/*$this->menu=array(
	array('label'=>'Create Report', 'url'=>array('create')),
	array('label'=>'Manage My Reports', 'url'=>array('admin'),'active'=>true),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('report-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<div class="report admin">
<h1>My Reports</h1>
<?php /* 
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
*/
?>

<?php 
	$profile= Profile::model()->findByPk(Yii::app()->user->id);
	if($profile->userType==User::TYPE_SUPERVISOR||$profile->userType==User::TYPE_ADMIN)
		$visButtons='{view}{update}{delete}';
	else 
		$visButtons='{view}{update}';
	
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'report-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array('header'=>'Report ID','name'=>'id','htmlOptions' => array('style' => 'width: 30px; text-align:center'),),
		array('header'=>'Last Name','name'=>'lastName'),
		'firstName',
		'reportDate',
		array('name'=>'status','value'=>'Report::itemAlias("status",$data->status)','filter'=>Report::itemAlias('status'),'type'=>'raw'),
		array(
			'class'=>'CButtonColumn',
			'template'=>$visButtons,
			'buttons'=>array (
					'update'=> array(							
							 'url'=>'Yii::app()->createUrl("report/report/wizard", array("id"=>$data->id,"nextPageId"=>"1","currentId"=>"1"))',
					),
					'view'=>array(
						
					),
					'delete'=>array(
				
					),
				),
		
		),
			),
		'cssFile'=>Yii::app()->baseUrl . '/css/reportgrid.css',
		'pager'=>array('cssFile'=>Yii::app()->baseUrl . '/css/reportpager.css',
				),
		'template'=>'{pager}{items}{summary}'
)); ?>
</div>
