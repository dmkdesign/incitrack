<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'articles-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype'=>'multipart/form-data')
)); ?>
	<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>	
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="clear-fix">
		<div class="span-10" style="inline-block">
			<div class="row">
				<?php echo $form->labelEx($model,'framename'); ?>
				<?php if(Yii::app()->getModule('user')->isAdmin()):?>
				<?php echo $form->textField($model,'framename',array('size'=>50,'maxlength'=>50)); ?>
				<?php else: {
				echo $form->label($model,'framename');
				} 
				endif?>
				<?php echo $form->error($model,'framename'); ?>
			</div>
			<div class="row">
				<?php echo $form->labelEx($model,'framecode'); ?>
				<?php if(Yii::app()->getModule('user')->isAdmin()):?>
				<?php echo $form->textField($model,'framecode',array('size'=>50,'maxlength'=>50)); ?>
				<?php endif;?>
				<?php echo $form->error($model,'framecode'); ?>
			</div>
			<div class="row">
				<?php echo $form->labelEx($model,'type'); ?>
				<?php if(Yii::app()->getModule('user')->isAdmin()):?>
				<?php echo $form->dropDownList($model,'type',Articles::itemAlias('type')); ?>
				<?php endif;?>
				<?php echo $form->error($model,'type'); ?>
			</div>
		</div>
		<div style="float:left">
		
			<div id ="photoDiv" style="margin:20px 0px">
			Use this to upload any graphics you want to include in the content.  <br>
		The "src" field of the image tag should contain "images/articles/filename.extension".<br>
			<?php echo CHtml::error($graphic,'file')?>
			<?php  echo CHtml::activeFileField($graphic,'file')?>
			<?php echo CHtml::submitButton('Upload Photo', array('name'=>'Upload', 'class'=>'btnUpload'))?>
			</div>
		</div>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'content'); 
		$this->widget('application.extensions.cleditor.ECLEditor', array(
        'model'=>$model,
        'attribute'=>'content', //Model attribute name. Nome do atributo do modelo.
        'options'=>array(
            'width'=>'800',
            'height'=>'600',
            'useCSS'=>true,
        ),
        'value'=>$model->content, //If you want pass a value for the widget. I think you will. Se você precisar passar um valor para o gadget. Eu acho irá.
    ));
		
		 echo $form->error($model,'content'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->