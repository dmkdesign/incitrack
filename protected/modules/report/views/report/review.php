<?php
$this->breadcrumbs=array(
	'Reports'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Wizard View', 'url'=>array('wizard&pageId=1','id'=>$model->id)),
	array('label'=>'Manage Reports', 'url'=>array('admin')),
);
?>
<div class="report review">
<div class="reportTitle">Review Report #<?php echo $model->id; ?></div>


	<?php echo $this->renderPartial('_review', compact('model','pages')); ?>
</div>