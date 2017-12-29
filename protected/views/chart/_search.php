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
		<?php echo $form->label($model,'q_id'); ?>
		<?php echo $form->textField($model,'q_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'menuLabel'); ?>
		<?php echo $form->textField($model,'menuLabel',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'chartTitle'); ?>
		<?php echo $form->textField($model,'chartTitle',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isPie'); ?>
		<?php echo $form->textField($model,'isPie'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isBar'); ?>
		<?php echo $form->textField($model,'isBar'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customView'); ?>
		<?php echo $form->textField($model,'customView',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'chartType'); ?>
		<?php echo $form->textField($model,'chartType',array('size'=>60,'maxlength'=>255)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'section'); ?>
		<?php echo $form->textField($model,'section',array('size'=>60,'maxlength'=>255)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'sequence'); ?>
		<?php echo $form->textField($model,'sequence',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->