<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'report-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php foreach($pages as $page){
		?>
	<div class="pageView">
	<div class="pageTitle"><?php echo CHtml::encode($page->title)?></div>
		<?php 
		$questions = $page->questions();
		
		foreach($questions as $question){
			
		?>
		
		<div class="row">
		<div class="rowTitle"><?php echo CHtml::encode($question->title); ?></div>
			<?php if ($question->widgetEdit($model)) {
				echo $question->widgetEdit($model);
			} elseif ($question->range) {
				echo $form->dropDownList($model,$question->varname,Report::range($question->range));
			} elseif ($question->field_type=="TEXT") {
				echo $form->textArea($model,$question->varname,array('rows'=>6, 'cols'=>50));
			} elseif ($question->field_type=="RADIO") {
			$choices = Choices::model()->findAll(
					array('order' => 'position', 'condition'=>'question ='.$question->id));
			
			// format models as $key=>$value with listData
			$list = CHtml::listData($choices,
					'id', 'text');
			echo $form->radioButtonList($model,$question->varname,$list,array('rows'=>6, 'cols'=>50));
			
		}
		elseif ($question->field_type=="SELECT") {
			$choices = Choices::model()->findAll(
					array('order' => 'position', 'condition'=>'question ='.$question->id));
			
			// format models as $key=>$value with listData
			$list = CHtml::listData($choices,
					'id', 'text');
			echo $form->checkBoxList($model,$question->varname,$list,array('rows'=>6, 'cols'=>50));
			
		}else {
				echo $form->textField($model,$question->varname,array('style'=>'width:430px; font-size:15px', 'size'=>60,'maxlength'=>(($question->field_size)?$question->field_size:255)));
			}
			echo $form->error($model,$question->varname);
			$varname = $question->varname;
			//echo $model->$varname; ?>
		
	</div>
	<?php } ?>
	</div>
	<?php } ?>
	<div class="row buttons">
		
		<?php echo CHtml::button('Commit',array('submit' => array('report/review&id='.$model->id)));?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->