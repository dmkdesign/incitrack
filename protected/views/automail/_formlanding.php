<div class="form portletShadowBox">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'automail-form',
	'enableAjaxValidation'=>false,
)); ?>

	
	<?php $this->widget('instaCMS',array('framecode'=>'automailHeader')) ?>
	<?php if(Yii::app()->user->isGuest):?>
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255, 'style'=>'width:235px')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	<?php endif ?>
	<h4>Find Projects:</h4>
	<div class="row" style="margin-bottom: 15px; font-size:16px">
		within &nbsp;<?php echo $form->dropDownList($model,'radius',Automail::itemAlias('radiusOptions'),array('options' => array('100'=>array('selected'=>true)))); ?>	
		<?php echo $form->dropDownList($model,'units',Automail::itemAlias('units'),array(
			'ajax' => array(
			'type'=>'POST', //request type
			'url'=>CController::createUrl('automail/dynamicRadius'), //url to call.
			'update'=>'#'.CHtml::activeId($model, 'radius'), //selector to update
			//'data'=>'js:javascript statement' 
			))); ?> &nbsp;of
	</div>
	<div class="row">
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255,'style'=>'width:255px')); ?>
	</div>
	<div class="row"  style="color: #00A0DE" id ="automailresponse"></div>
	<div class="row buttons">
		<?php echo CHtml::ajaxSubmitButton(
  "Sign Up",
  Yii::app()->createUrl( 'automail/ajaxCreate'),
  array( // ajaxOptions
    'type' =>'POST',
    'beforeSend' => "function( request )
                     {
                       
                     }",
    'success' => "function( data )
                  {
                    $('#automailresponse').html(data);
                  }",
  ),
  array( //htmlOptions
  		'class'=>'btnAuction',
  		'style'=>'font-size:16px'
  )); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->