<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mode')); ?>:</b>
	<?php echo CHtml::encode($data->mode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('merchant_url')); ?>:</b>
	<?php echo CHtml::encode($data->merchant_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('merchant_cid')); ?>:</b>
	<?php echo CHtml::encode($data->merchant_cid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('merchant_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->merchant_user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('merchant_password')); ?>:</b>
	<?php echo CHtml::encode($data->merchant_password); ?>
	<br />


</div>