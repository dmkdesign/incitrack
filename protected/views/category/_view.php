<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sortOrder')); ?>:</b>
	<?php echo CHtml::encode($data->sortOrder); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('menuText')); ?>:</b>
	<?php echo CHtml::encode($data->menuText); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menuVisible')); ?>:</b>
	<?php echo CHtml::encode($data->menuVisible); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isVisible')); ?>:</b>
	<?php echo CHtml::encode($data->isVisible); ?>
	<br />


</div>