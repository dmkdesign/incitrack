<?php
$this->breadcrumbs=array(
	'Reports',
);

/*$this->menu=array(
	array('label'=>'Create Report', 'url'=>array('create')),
	array('label'=>'Manage My Reports', 'url'=>array('admin')),
);*/
?>
<div class="report index">
<div class="reportTitle">Reports</div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
		'id'=>'report_list'//explicitly define the id
)); ?>
</div>
