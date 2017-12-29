<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mode'); ?>
		<?php echo $form->textField($model,'mode',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'merchant_url'); ?>
		<?php echo $form->textField($model,'merchant_url',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'merchant_cid'); ?>
		<?php echo $form->textField($model,'merchant_cid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'merchant_user_id'); ?>
		<?php echo $form->textField($model,'merchant_user_id',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->