<div class="rowTitle"><?php echo $question->title ;?></div>
<div class="row horRadioGroup horRadioGroup1">
<div class="rowTitle">Slip/Trip/Fall</div>
<?php
$index = 0;
//Head section
$htmlOptions=array();


$choices = Choices::model()->findAll(
		array('order' => 'position', 'condition'=>'question ='.$question->id, 'condition'=>'graphic="stf"'));

$varname = $question->varname;
CHtml::resolveNameID($model,$varname,$htmlOptions);
$selection=$model->$varname;
$baseID ='Report';
$name=$htmlOptions['name'];
if(substr($name,-2)!=='[]')
	$name.='[]';
if(array_key_exists('uncheckValue',$htmlOptions))
{
	$uncheck=$htmlOptions['uncheckValue'];
	unset($htmlOptions['uncheckValue']);
}
else
	$uncheck='';
$hiddenOptions=isset($htmlOptions['id']) ? array('id'=>CHtml::ID_PREFIX.$htmlOptions['id']) : array('id'=>false);
echo $hidden=$uncheck!==null ? CHtml::hiddenField($name,$uncheck,$hiddenOptions) : '';

$labelOptions=isset($htmlOptions['labelOptions'])?$htmlOptions['labelOptions']:array();
foreach ($choices as $choice)
{	
	$label=$choice->text;
	$checked=!is_array($selection) && !strcmp($choice->id,$selection) || is_array($selection) && in_array($choice->id,$selection);
	
	$htmlOptions['value']=$choice->id;
	$htmlOptions['id']=$baseID.'_'.$index++;
	$option=CHtml::checkBox($name,$checked,$htmlOptions);
	$label=CHtml::label($label,$htmlOptions['id'],$labelOptions);
	$items[]=strtr('{input}{label}',array('{input}'=>$option,'{label}'=>$label));
}
	$output = implode('',$items);
	unset($items);
	echo $output;
?></div>

<div class="row horRadioGroup horRadioGroup1">
<div class="rowTitle">Physical Hazard</div>
<?php
$choices = Choices::model()->findAll(
		array('order' => 'position', 'condition'=>'question ='.$question->id, 'condition'=>'graphic="ph"'));
foreach ($choices as $choice)
{	$label=$choice->text;
	$checked=is_array($selection) && in_array($choice->id,$selection);
	
	$htmlOptions['value']=$choice->id;
	
	$htmlOptions['id']=$baseID.'_'.$index++;
	$option=CHtml::checkBox($name,$checked,$htmlOptions);
	$label=CHtml::label($label,$htmlOptions['id'],$labelOptions);
	$items[]=strtr('{input}{label}',array('{input}'=>$option,'{label}'=>$label));
}
$output = implode('',$items);
unset($items);
echo $output;
?>

</div>
<div class="row horRadioGroup horRadioGroup1">
<div class="rowTitle">Mechanical Hazard</div>
<?php 
$choices = Choices::model()->findAll(
		array('order' => 'position', 'condition'=>'question ='.$question->id, 'condition'=>'graphic="mh"'));
foreach ($choices as $choice)
{	$label=$choice->text;
	$checked=is_array($selection) && in_array($choice->id,$selection);
	
	$htmlOptions['value']=$choice->id;
	
	$htmlOptions['id']=$baseID.'_'.$index++;
	$option=CHtml::checkBox($name,$checked,$htmlOptions);
	$label=CHtml::label($label,$htmlOptions['id'],$labelOptions);
	$items[]=strtr('{input}{label}',array('{input}'=>$option,'{label}'=>$label));
}
$output = implode('',$items);
unset($items);
echo $output;
?>
</div>
<div class="row horRadioGroup horRadioGroup1">
<div class="rowTitle">Electrical Hazard</div>
<?php 
$choices = Choices::model()->findAll(
		array('order' => 'position', 'condition'=>'question ='.$question->id, 'condition'=>'graphic="eh"'));
foreach ($choices as $choice)
{	$label=$choice->text;
	$checked=is_array($selection) && in_array($choice->id,$selection);
	
	$htmlOptions['value']=$choice->id;
	
	$htmlOptions['id']=$baseID.'_'.$index++;
	$option=CHtml::checkBox($name,$checked,$htmlOptions);
	$label=CHtml::label($label,$htmlOptions['id'],$labelOptions);
	$items[]=strtr('{input}{label}',array('{input}'=>$option,'{label}'=>$label));
}
$output = implode('',$items);
unset($items);
echo $output;
?>
</div>

<div class="row horRadioGroup horRadioGroup1">
<div class="rowTitle">Chemical Hazard</div>
<?php $choices = Choices::model()->findAll(
		array('order' => 'position', 'condition'=>'question ='.$question->id, 'condition'=>'graphic="ch"'));
foreach ($choices as $choice)
{	$label=$choice->text;
	$checked=is_array($selection) && in_array($choice->id,$selection);
	
	$htmlOptions['value']=$choice->id;
	
	$htmlOptions['id']=$baseID.'_'.$index++;
	$option=CHtml::checkBox($name,$checked,$htmlOptions);
	$label=CHtml::label($label,$htmlOptions['id'],$labelOptions);
	$items[]=strtr('{input}{label}',array('{input}'=>$option,'{label}'=>$label));
}
$output = implode('',$items);
unset($items);
echo $output;
?>
</div>
<div class="row horRadioGroup horRadioGroup1">
<div class="rowTitle">Biological Hazard</div>
<?php $choices = Choices::model()->findAll(
		array('order' => 'position', 'condition'=>'question ='.$question->id, 'condition'=>'graphic="bh"'));
foreach ($choices as $choice)
{	$label=$choice->text;
	$checked=is_array($selection) && in_array($choice->id,$selection);
	
	$htmlOptions['value']=$choice->id;
	
	$htmlOptions['id']=$baseID.'_'.$index++;
	$option=CHtml::checkBox($name,$checked,$htmlOptions);
	$label=CHtml::label($label,$htmlOptions['id'],$labelOptions);
	$items[]=strtr('{input}{label}',array('{input}'=>$option,'{label}'=>$label));
}
$output = implode('',$items);
unset($items);
echo $output;
?>
</div>
<div class="row horRadioGroup horRadioGroup1">
<div class="rowTitle">Confined Space</div>
<?php 
$choices = Choices::model()->findAll(
		array('order' => 'position', 'condition'=>'question ='.$question->id, 'condition'=>'graphic="cs"'));
foreach ($choices as $choice)
{	$label=$choice->text;
	$checked=is_array($selection) && in_array($choice->id,$selection);
	
	$htmlOptions['value']=$choice->id;
	
	$htmlOptions['id']=$baseID.'_'.$index++;
	$option=CHtml::checkBox($name,$checked,$htmlOptions);
	$label=CHtml::label($label,$htmlOptions['id'],$labelOptions);
	$items[]=strtr('{input}{label}',array('{input}'=>$option,'{label}'=>$label));
}
$output = implode('',$items);
unset($items);
echo $output;
?>
</div>