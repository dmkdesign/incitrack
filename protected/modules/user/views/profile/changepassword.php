<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Change Password");
$this->breadcrumbs=array(
	UserModule::t("Profile") => array('/user/profile'),
	UserModule::t("Change Password"),
);
?>
<div class="projectView">
<h2><?php echo UserModule::t("Change password"); ?></h2>
<?php $this->menu = UserModule::isAdmin()?array(
	array('label'=>UserModule::t('Manage User'), 'url'=>array('/user/admin')),
		array('label'=>UserModule::t('Profile'), 'url'=>array('/user/Profile')),
		array('label'=>UserModule::t('Edit'), 'url'=>array('')),
		array('label'=>UserModule::t('Change password'), 'url'=>array(''), 'active'=>true),
		array('label'=>UserModule::t('Manage Updates'), 'url'=>array('//automail/manage'))
):array(
		array('label'=>UserModule::t('Profile'), 'url'=>array('/user/Profile')),
		array('label'=>UserModule::t('Edit'), 'url'=>array('/user/Profile/Edit')),
		array('label'=>UserModule::t('Change password'), 'url'=>array(''),'active'=>true),
		array('label'=>UserModule::t('Manage Updates'), 'url'=>array('//automail/manage')),); ?>

<div class="form">
<?php $form=$this->beginWidget('UActiveForm', array(
	'id'=>'changepassword-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	<?php echo CHtml::errorSummary($model); ?>
	
	<div class="row">
	<?php echo $form->labelEx($model,'password'); ?>
	<?php echo $form->passwordField($model,'password'); ?>
	<?php echo $form->error($model,'password'); ?>
	<p class="hint">
	<?php echo UserModule::t("Minimal password length 4 symbols."); ?>
	</p>
	</div>
	
	<div class="row">
	<?php echo $form->labelEx($model,'verifyPassword'); ?>
	<?php echo $form->passwordField($model,'verifyPassword'); ?>
	<?php echo $form->error($model,'verifyPassword'); ?>
	</div>
	
	<div class="row submit">
	<?php echo CHtml::submitButton(UserModule::t("Save")); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
</div>