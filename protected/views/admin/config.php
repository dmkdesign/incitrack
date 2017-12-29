<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mainconfig-config-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'merchant_mode'); ?>
		<?php echo $form->textField($model,'merchant_mode'); ?>
		<?php echo $form->error($model,'merchant_mode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pricing'); ?>
		<?php echo $form->textField($model,'pricing'); ?>
		<?php echo $form->error($model,'pricing'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->