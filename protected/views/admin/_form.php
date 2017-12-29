<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subconfigs-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'mode'); ?>
		<?php echo $form->textField($model,'mode',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'mode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'merchant_url'); ?>
		<?php echo $form->textField($model,'merchant_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'merchant_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'merchant_cid'); ?>
		<?php echo $form->textField($model,'merchant_cid'); ?>
		<?php echo $form->error($model,'merchant_cid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'merchant_user_id'); ?>
		<?php echo $form->textField($model,'merchant_user_id',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'merchant_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'merchant_password'); ?>
		<?php echo $form->textField($model,'merchant_password',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'merchant_password'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->