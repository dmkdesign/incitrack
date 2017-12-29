<?php
$this->breadcrumbs=array(
	'Reports'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
		array('label'=>'View Report', 'url'=>array('view', 'id'=>$model->id)),
		array('label'=>'Update Report', 'url'=>'','active'=>true),
		array('label'=>'Manage My Reports', 'url'=>array('admin')),
);
?>
<div class="report update">
<div class="reportTitle">Update Report <?php echo $model->id; ?></div>

<?php echo $this->renderPartial('_review', compact('model','pages') ); ?>
</div>