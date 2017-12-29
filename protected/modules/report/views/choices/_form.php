<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'choices-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textField($model,'text',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position'); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'graphic'); ?>
		<?php echo $form->textField($model,'graphic',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'graphic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'question'); ?>
		<?php echo $form->textField($model,'question'); ?>
		<?php echo $form->error($model,'question'); ?>
	</div>

	<div class="row buttons">
		<?php 
		$url ='index.php?r=report/choices/update&id='.$model->id;
		if($model->isNewRecord)
		{ $url ='index.php?r=report/choices/create&id='.$model->id.'&questionid='.$model->question;}
		  echo CHtml::button($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save'), array('submit' => $url)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->