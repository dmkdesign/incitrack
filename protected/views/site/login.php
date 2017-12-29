<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<p style="font-family:Helvetica,Arial, sans-serif; font-style:italic; font-weight:bold; line-height:10px;">Already have an account? Sign In</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
		'action'=>'index.php?r=site/login',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>

		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		<?php echo CHtml::submitButton('Login', array('name'=>'login','class'=>'btn')); ?> <a href="/solarlist/index.php?r=user/recovery" style="margin-left:50px">Forgot Password?</a>


<?php $this->endWidget(); ?>
</div><!-- form -->
