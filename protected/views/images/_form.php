<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'images-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'filename'); ?>
		<?php echo $form->textField($model,'filename',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'filename'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo $form->textField($model,'category'); ?>
		<?php echo $form->error($model,'category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'associate_id'); ?>
		<?php echo $form->textField($model,'associate_id'); ?>
		<?php echo $form->error($model,'associate_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alt_text'); ?>
		<?php echo $form->textField($model,'alt_text',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'alt_text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'caption'); ?>
		<?php echo $form->textField($model,'caption',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'caption'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->