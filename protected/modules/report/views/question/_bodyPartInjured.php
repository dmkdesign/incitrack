<div class="rowTitle"><?php echo CHtml::encode('Body Part Injured') ;?></div>
<div class="row horRadioGroup">

<?php
//Head section
$question = Question::model()->findByAttributes(array('varname'=>'bodyPartHead'));
echo "<div class='rowTitle'>".CHtml::encode($question->title)."</div>";
$choices = Choices::model()->findAll(
		array('order' => 'position', 'condition'=>'question ='.$question->id));
	
// format models as $key=>$value with listData
$list = CHtml::listData($choices,
		'id', 'text');
/*
 if(!empty($question->css))
 {echo '<div class="'.$question->css.'">';
}*/
echo $form->checkBoxList($model,$question->varname,$list,array(
		'separator' => '', // overwriting the line break
		'template' => '{input} {label}', // put the label behind
));

echo $form->error($model,$question->varname);
?></div>
<div class="row horRadioGroup">
<?php 
//upper body
$question = Question::model()->findByAttributes(array('varname'=>'bodyPartUpperBody'));
echo "<div class='rowTitle'>".CHtml::encode($question->title)."</div>";
$choices = Choices::model()->findAll(
		array('order' => 'position', 'condition'=>'question ='.$question->id));

// format models as $key=>$value with listData
$list = CHtml::listData($choices,
		'id', 'text');
/*
 if(!empty($question->css))
 {echo '<div class="'.$question->css.'">';
}*/
echo $form->checkBoxList($model,$question->varname,$list,array(
		'separator' => '', // overwriting the line break
		'template' => '{input} {label}', // put the label behind
));

echo $form->error($model,$question->varname);

?>

</div>
<div class="row horRadioGroup">
<?php 
//upper body
$question = Question::model()->findByAttributes(array('varname'=>'bodyPartLowerBody'));
echo "<div class='rowTitle'>".CHtml::encode($question->title)."</div>";
$choices = Choices::model()->findAll(
		array('order' => 'position', 'condition'=>'question ='.$question->id));

// format models as $key=>$value with listData
$list = CHtml::listData($choices,
		'id', 'text');
/*
 if(!empty($question->css))
 {echo '<div class="'.$question->css.'">';
}*/
echo $form->checkBoxList($model,$question->varname,$list,array(
		'separator' => '', // overwriting the line break
		'template' => '{input} {label}', // put the label behind
));

echo $form->error($model,$question->varname);

?>

</div>

