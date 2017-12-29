<?php
$this->breadcrumbs=array(
	'Automails'=>array('index'),
	'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('automail-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->menu = UserModule::isAdmin()?array(
	array('label'=>UserModule::t('Manage User'), 'url'=>array('/user/admin')),
		array('label'=>UserModule::t('Profile'), 'url'=>array('/user/Profile')),
		array('label'=>UserModule::t('Edit'), 'url'=>array(''),),
		array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword')),
):array(
		array('label'=>UserModule::t('Profile'), 'url'=>array('/user/Profile')),
		array('label'=>UserModule::t('Edit'), 'url'=>array('/user/Profile/edit'),),
		array('label'=>UserModule::t('Change password'), 'url'=>array('/user/profile/changepassword')),
		array('label'=>UserModule::t('Manage Updates'), 'url'=>array('//automail/manage'), 'active'=>true),); ?>
<div class="projectView">
<h1 style="margin-bottom:10px">Manage Alerts</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'automail-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'email',
		'address',
		'radius',
		/*
		'active',
		*/
		array(
			'class'=>'CButtonColumn',
				'template'=>'{delete}'
		),
	),
)); ?>
</div>