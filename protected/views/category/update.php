<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
		array('label'=>'Manage Categories', 'url'=>array('admin')),
	array('label'=>'Create Category', 'url'=>array('create')),
	array('label'=>'Update Category', 'url'=>'','active'=>true),
	array('label'=>'View Category', 'url'=>array('view', 'id'=>$model->id)),
	
);
?>

<h1>Update Category <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', compact('model','graphic','saveImage','images')); ?>
<br><hr>
<?php echo $this->renderPartial("//images/_ajaxform",array('model'=>$images,'productid'=>$model->id, 'graphic'=>$graphic),true);?>