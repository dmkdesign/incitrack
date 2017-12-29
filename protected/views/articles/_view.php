<div class="projectView">

	<b><?php echo CHtml::encode($data->getAttributeLabel('framename')); ?>:</b>
	<?php echo CHtml::link($data->framename, array('view', 'id'=>$data->id),array('style'=>'font-decoration:none; font-size:15px; font-color:#999999')); ?>
	<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('framecode')); ?>:</b>
	<?php echo CHtml::link($data->framecode, array('view', 'id'=>$data->id),array('style'=>'font-decoration:none; font-size:15px; font-color:#999999')); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode(Articles::itemAlias('type',$data->type)); ?>
	<br />

</div>