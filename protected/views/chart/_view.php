<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q_id')); ?>:</b>
	<?php echo CHtml::encode($data->q_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menuLabel')); ?>:</b>
	<?php echo CHtml::encode($data->menuLabel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('chartTitle')); ?>:</b>
	<?php echo CHtml::encode($data->chartTitle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isPie')); ?>:</b>
	<?php echo CHtml::encode($data->isPie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isBar')); ?>:</b>
	<?php echo CHtml::encode($data->isBar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customView')); ?>:</b>
	<?php echo CHtml::encode($data->customView); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('chartType')); ?>:</b>
	<?php echo CHtml::encode($data->chartType); ?>
	<br />

	*/ ?>

</div>