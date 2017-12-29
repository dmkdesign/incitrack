<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<div class="clear-fix">
<div class="span-10" style="inline-block">
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'description'); 
		$this->widget('application.extensions.cleditor.ECLEditor', array(
        'model'=>$model,
        'attribute'=>'description', //Model attribute name. Nome do atributo do modelo.
        'options'=>array(
            'width'=>'800',
            'height'=>'600',
            'useCSS'=>true,
        ),
        'value'=>$model->description, //If you want pass a value for the widget. I think you will. Se você precisar passar um valor para o gadget. Eu acho irá.
    ));
		
		 echo $form->error($model,'description'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'metakeywords'); ?>
		<?php echo $form->textField($model,'metakeywords',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'metakeywords'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'metadescription'); 
		$this->widget('application.extensions.cleditor.ECLEditor', array(
        'model'=>$model,
        'attribute'=>'metadescription', //Model attribute name. Nome do atributo do modelo.
        'options'=>array(
            'width'=>'800',
            'height'=>'200',
            'useCSS'=>true,
        ),
        'value'=>$model->metadescription, //If you want pass a value for the widget. I think you will. Se você precisar passar um valor para o gadget. Eu acho irá.
    ));
		
		 echo $form->error($model,'metadescription'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'menuVisible'); ?>
		<?php echo $form->dropDownList($model,'menuVisible',array('1'=>'Yes','0'=>'No')); ?>
		<?php echo $form->error($model,'menuVisible'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'menuText'); ?>
		<?php echo $form->textField($model,'menuText',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'menuText'); ?>
	</div>
	<?php  if($model->menuLink != ""):?>
	<div class="row">
		<?php echo $form->labelEx($model,'menuLink'); ?>
		<?php echo $form->textField($model,'menuLink',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'menuLink'); ?>
	</div>
	<?php endif;?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'sortOrder'); ?>
		<?php echo $form->textField($model,'sortOrder',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'sortOrder'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isVisible'); ?>
		<?php echo $form->dropDownList($model,'isVisible',array('1'=>'Yes','0'=>'No')); ?>
		<?php echo $form->error($model,'isVisible'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'hasChildren'); ?>
		<?php echo $form->dropDownList($model,'hasChildren',array('1'=>'Yes','0'=>'No')); ?>
		<?php echo $form->error($model,'hasChildren'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'childName'); ?>
		<?php echo $form->textField($model,'childName',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'childName'); ?>
	</div>
	</div>
	</div>
	
<br>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->