<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile")=>array('profile'),
	UserModule::t("Edit"),
);
?>
<div class="projectView">
<h2><?php echo UserModule::t('Edit profile'); ?></h2>
<?php $this->menu = UserModule::isAdmin()?array(
	array('label'=>UserModule::t('Manage User'), 'url'=>array('/user/admin')),
		array('label'=>UserModule::t('Profile'), 'url'=>array('/user/Profile')),
		array('label'=>UserModule::t('Edit'), 'url'=>array(''), 'active'=>true),
		array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword')),
		
):array(
		array('label'=>UserModule::t('Profile'), 'url'=>array('/user/Profile')),
		array('label'=>UserModule::t('Edit'), 'url'=>array(''), 'active'=>true),
		array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword')),
		); ?>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>
<div class="form">
<?php $form=$this->beginWidget('UActiveForm', array(
	'id'=>'profile-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo $form->errorSummary(array($model,$profile)); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'username', array('style'=>'font-size:14px;font-weight:normal; padding-bottom:5px')); ?>
		<?php echo $form->textField($model,'username',array('style'=>'width:430px; font-size:15px','size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email', array('style'=>'font-size:14px;font-weight:normal; padding-bottom:5px')); ?>
		<?php echo $form->textField($model,'email',array('style'=>'width:430px; font-size:15px','size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
				
			?>
			
	<div class="row">
		<?php echo $form->labelEx($profile,$field->varname, array('style'=>'font-size:14px;font-weight:normal; padding-bottom:5px'));
		
		if ($field->widgetEdit($profile)) {
			echo $field->widgetEdit($profile);
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo $form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		}
		elseif ($field->varname=="branch") {
			if($profile->company !=''){
				$company=Company::model()->findByPk($profile->company);
				if(isset($company) && $company->branches != '')
					{
						$dropDownList=array();
						$branches = explode(';',$company->branches);
						foreach($branches as $branch)
						{
							$dropDownList[$branch]=$branch;
						}
						echo $form->dropDownList($profile,$field->varname,$dropDownList);
					}
				else
						echo $form->textField($profile,$field->varname,array('style'=>'width:430px; font-size:15px', 'size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
			}
		} 
		elseif ($field->varname=="company") {
			
			// retrieve the models from db
			$companies = Company::model()->findAll();
			
			// format models as $key=>$value with listData
			$list = CHtml::listData($companies,
					'id', 'company_name');
				echo $form->dropDownList($profile,$field->varname,$list);
			
		}
		else {
			echo $form->textField($profile,$field->varname,array('style'=>'width:430px; font-size:15px', 'size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		echo $form->error($profile,$field->varname); ?>
	</div>	
			<?php
				
			}
		}
?>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save'), array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
</div><!-- form -->
