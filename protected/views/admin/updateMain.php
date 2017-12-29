<?php
$this->breadcrumbs=array(
	'Mainconfigs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>

<h1>Update Mainconfig <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_formMain', array('model'=>$model)); ?>