<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'company-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'company_name'); ?>
		<?php echo $form->textField($model,'company_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'company_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_name'); ?>
		<?php echo $form->textField($model,'contact_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'contact_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_email'); ?>
		<?php echo $form->textField($model,'contact_email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'contact_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_phone'); ?>
		<?php echo $form->textField($model,'contact_phone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'contact_phone'); ?>
	</div>
<?php if(UserModule::isAdmin()):?>
	<div class="row">
		<?php echo $form->labelEx($model,'logo_file'); ?>
		<?php echo $form->textField($model,'logo_file',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'logo_file'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'css_file'); ?>
		<?php echo $form->textArea($model,'css_file',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'css_file'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'branches'); ?>
		<?php echo $form->textArea($model,'branches',array('rows'=>1,'cols'=>50,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'branches'); ?>
	</div>
<?php endif?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->