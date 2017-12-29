<?php
$this->breadcrumbs=array(
	UserModule::t("Users"),
);
?>

<h1><?php echo UserModule::t("List User"); ?></h1>
<?php if(UserModule::isAdmin()) {
	$this->menu=array(array('label'=>UserModule::t('Manage Users'),'url'=>array('/user/admin')),
	array('label'=>UserModule::t('Manage Profile Fields'),'url'=>array('profileField/admin')),);

} ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
			'name' => 'username',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->username),array("user/view","id"=>$data->id))',
		),
		array(
			'name' => 'createtime',
			'value' => 'date("d.m.Y H:i:s",$data->createtime)',
		),
		array(
			'name' => 'lastvisit',
			'value' => '(($data->lastvisit)?date("d.m.Y H:i:s",$data->lastvisit):UserModule::t("Not visited"))',
		),
	),
)); ?>
