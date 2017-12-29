<?php
$this->breadcrumbs=array(
	'Companys'=>array('index'),
	$model->id=>array('view','id'=>$model->company_name),
	'Update',
);
if(UserModule::isAdmin()){
$this->menu=array(
	array('label'=>'List Company', 'url'=>array('index')),
	array('label'=>'Create Company', 'url'=>array('create')),
	array('label'=>'View Company', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Company', 'url'=>array('admin')),
);}
?>

<h1>Update Company <?php echo $model->company_name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>