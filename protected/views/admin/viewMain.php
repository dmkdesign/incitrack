<?php
$this->breadcrumbs=array(
	'Mainconfigs'=>array('index'),
	$model->id,
);

$this->menu=array(array('label'=>'Manage Pages', 'url'=>array('report/Page')),
				array('label'=>'Manage Reports', 'url'=>array('/report/report/admin')),
				array('label'=>'Manage Questions', 'url'=>array('/report/question')),
				array('label'=>'Manage Users', 'url'=>array('/user/admin')),
				array('label'=>'Manage Subconfigs', 'url'=>array('admin')),
);
?>

<h1>Administration</h1>
Welcome to the administrative panel for <?php echo Yii::app()->name?>.  Below you will find the current system setup. <br>
On the right are portals that will take you to the area you want to manage.<br><br>
To view what configurations are available go to 'Manage Subconfigs' on the right. <br>
Sandbox is for testing things like Credit Cards, and live is for real transactions.<br><br>

Click the 'Admin' menu above to return here.

<br><br><br>
<div class='portletShadowBox'>
<h3>Current System Settings</h3>
The system is currently running in <strong><?php echo CHtml::encode($model->mode); ?></strong> mode.<br><br>

The pricing plan is set to:  <?php echo CHtml::encode($model->pricing);?>.<br><br>

Your database information is: <?php echo Yii::app()->db->connectionString?><br><br>

Click <?php echo CHtml::link('here', array('admin/updateMain'))?> to change these settings.

</div>