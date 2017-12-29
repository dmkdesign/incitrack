<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contacts-sococontact-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit', array('class'=>'btn', 'onClick'=>"_gaq.push(['_trackEvent', 'Email', 'SocoLanding', '']);")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->