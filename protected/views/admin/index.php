<?php
$this->breadcrumbs=array(
	'Subconfigs',
);

$this->menu=array(
	
	array('label'=>'Manage Projects', 'url'=>array('/roof/admin')),
	array('label'=>'Manage Auctions', 'url'=>array('/auctions/admin')),
	array('label'=>'Manage Bids', 'url'=>array('/bids/admin')),
	array('label'=>'Manage Automailer', 'url'=>array('/Automail/index')),
	array('label'=>'Manage Users', 'url'=>array('/user/admin')),
	array('label'=>'View Trasactions', 'url'=>array('/Transactions')),
	array('label'=>'Manage Subconfigs', 'url'=>array('admin')),
		
	
);
?>

<h1>Subconfigs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
