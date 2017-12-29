<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile"),
);
?>
<div class="pageView">
<h2><?php echo UserModule::t('Your profile'); ?></h2>
<?php $this->menu = UserModule::isAdmin()?array(
	array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin')),
		array('label'=>UserModule::t('Profile'), 'url'=>array('/user/Profile'), 'active'=>true),
		array('label'=>UserModule::t('Edit'), 'url'=>array('edit')),
		array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword')),
		
):array(
		array('label'=>UserModule::t('Profile'), 'url'=>array(''), 'active'=>true),
		array('label'=>UserModule::t('Edit'), 'url'=>array('edit')),
		array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword')),
		);
 ?>


<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>
<table class="dataGrid" style="width:600px">
<tr>
	<th class="label"><?php echo CHtml::encode('Username'); ?>
</th>
    <td><?php echo CHtml::encode($model->username); ?>
</td>
</tr>
<?php 
		$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
		if ($profileFields) {
			foreach($profileFields as $field) {
				//echo "<pre>"; print_r($profile); die();
			?>
<tr>
	<th class="label"><?php echo CHtml::encode(UserModule::t($field->title)); ?>
</th>
    <td><?php echo (($field->widgetView($profile))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname)))); ?>
</td>
</tr>
			<?php
			}//$profile->getAttribute($field->varname)
		}
?>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>
</th>
    <td><?php echo CHtml::encode($model->email); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('createtime')); ?>
</th>
    <td><?php echo date("d.m.Y H:i:s",$model->createtime); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('lastvisit')); ?>
</th>
    <td><?php echo date("d.m.Y H:i:s",$model->lastvisit); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('status')); ?>
</th>
    <td><?php echo CHtml::encode(User::itemAlias("UserStatus",$model->status));
    ?>
</td>
</tr>
</table>
</div>