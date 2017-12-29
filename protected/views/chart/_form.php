<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'chart-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'q_id'); ?>
		<?php
			$questions = Question::model()->findAll();
			$list = CHtml::listData($questions,'id', 'varname');
		 echo $form->dropDownList($model,'q_id',$list); ?>
		<?php echo $form->error($model,'q_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'menuLabel'); ?>
		<?php echo $form->textField($model,'menuLabel',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'menuLabel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'chartTitle'); ?>
		<?php echo $form->textField($model,'chartTitle',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'chartTitle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isPie'); ?>
		<?php echo $form->textField($model,'isPie'); ?>
		<?php echo $form->error($model,'isPie'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isBar'); ?>
		<?php echo $form->textField($model,'isBar'); ?>
		<?php echo $form->error($model,'isBar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'customView'); ?>
		<?php echo $form->textField($model,'customView',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'customView'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'chartType'); ?>
		
		<?php echo $form->dropDownList($model,'chartType',Chart::itemAlias('chartType')); //array('options'=>array('column'=>'selected')) ?>
		<?php echo $form->error($model,'chartType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'section'); ?>
		
		<?php echo $form->dropDownList($model,'section',Chart::itemAlias('section')); //array('options'=>array('column'=>'selected')) ?>
		<?php echo $form->error($model,'section'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'sequence'); ?>
		
		<?php echo $form->textField($model,'sequence',array('size'=>60,'maxlength'=>255)); //array('options'=>array('column'=>'selected')) ?>
		<?php echo $form->error($model,'sequence'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'publish'); ?>
		
		<?php echo $form->dropDownList($model,'publish',Chart::itemAlias('publish')); //array('options'=>array('column'=>'selected')) ?>
		<?php echo $form->error($model,'publish'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->