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
	<script type="text/javascript">
		function allFine(data) {
        // display data returned from action
	       
        $('#results').html(data);
        $('#results').show();
        $('#choicesdiv').hide();
        $('#Choices_text').val('');
        $('#Choices_position').val('');
        $('#Choices_graphic').val('');
        // refresh your grid
        $.fn.yiiGridView.update('choices-grid');
		}


 
</script>
	
	<div class="row buttons">
		<?php 
		$url ='index.php?r=report/choices/update&id='.$model->id;
		 echo CHtml::ajaxSubmitButton("Insert New Choice", array('choices/ajaxcreate'), array('update'=>'#results','data'=>'js:$("#choices-form").serialize()', 'success'=>'allFine')); ?>
		 
	</div>
<div id ="results" class="flash-success" style="display: none"></div>
<?php $this->endWidget(); ?>

</div><!-- form -->