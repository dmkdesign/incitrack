<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('merchant_mode')); ?>:</b>
	<?php echo CHtml::encode($data->merchant_mode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pricing')); ?>:</b>
	<?php echo CHtml::encode($data->pricing); ?>
	<br />


</div>