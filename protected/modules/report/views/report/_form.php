
<div class="form">
<div class="report wizard">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'report-form',
	'enableAjaxValidation'=>false,
)); 
?>

<div id ="sidebar" class="navigation">
<ul><?php foreach($pages as $page)
{
	$class='neutral';
	
	if (isset($validationcheck) && is_array($validationcheck))
	{
		if($model->status==Report::COMMIT && $validationcheck['page'.$page->id]['commit']==false)
		{
			$class='error';
		}elseif($validationcheck['page'.$page->id]['prelim']==false&&($validationcheck['page'.$page->id]['visited']=='true'||$model->status==Report::COMMIT))
		{
			$class='error';
		}
		elseif($validationcheck['page'.$page->id]['prelim']==true && $validationcheck['page'.$page->id]['commit']=='true'){
			$class='complete';
		}
		elseif($validationcheck['page'.$page->id]['visited']=='true')
		{
			$class='incomplete';
		}
		
	}
	if($page->id == $currentPage->id)
	{
		$class= $class.' current';
	}
	echo "<li class='".$class."'><div class='vertical_align'></div>".CHtml::linkButton($page->title,array('submit' => array('report/wizard&id='.$model->id.'&nextPageId='.$pages[$page->sequence-1]->id.'&currentId='.$currentPage->id)))."</li>";

}
?></ul></div>.

<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<h1><?php echo $currentPage->title; ?></h1>
	<?php echo $form->errorSummary($model); ?>
	<?php foreach($questions as $question){
	if(!empty($question->choicesView))//if the vew is non standard then render it
	{
		$this->renderPartial('../question/'.$question->choicesView,array('model'=>$model,'form'=>$form,'question'=>$question),false);
	}
	else
	{
	?>
	<div class="row <?php echo !empty($question->css)?$question->css:'' ?> ">
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
			/*
			if(!empty($question->css))
			{
				echo '<div class="'.$question->css.'">';
			}*/
			echo $form->radioButtonList($model,$question->varname,$list,array(
'separator' => '', // overwriting the line break
'template' => '{input} {label}', // put the label behind
)); // additional css class array('rows'=>6, 'cols'=>50));
		/*if(!empty($question->css))
		{
			echo '</div>';
		}*/	
		}
		
		elseif ($question->field_type=="SELECT") {
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
			/*
			if(!empty($question->css))
			{
				echo '</div>';
			}*/
		}
		else {
			echo $form->textField($model,$question->varname,array('style'=>'width:430px; font-size:15px', 'size'=>60,'maxlength'=>(($question->field_size)?$question->field_size:255)));
		}
		echo $form->error($model,$question->varname);
		 ?>
		
	</div>
	<?php }} ?>
	<div class="row buttons">
		
		<?php /*pages array is 0 based and sequence is 1 based so must subtract 2 from sequence to get proper array position */
		if($currentPage->id==$pages[count($pages)-1]->id)
		{
			$nextPageId=$currentPage->sequence+1;//if last page then $pages not defined for next so make next page >#pages
		}else{
		$nextPageId=$pages[$currentPage->sequence]->id;
		}
		
		if($currentPage->sequence>1){echo CHtml::button($pages[$currentPage->sequence-2]->title,array('class'=>'btn previous','submit' => array('report/wizard&id='.$model->id.'&nextPageId='.$pages[$currentPage->sequence-2]->id.'&currentId='.$currentPage->id)));}
		 echo CHtml::button(($currentPage->id==$pages[count($pages)-1]->id)?'Review for Submission':$pages[$currentPage->sequence]->title,array('class'=>'btn next','submit' => array('report/wizard&id='.$model->id.'&nextPageId='.$nextPageId.'&currentId='.$currentPage->id)));?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- wizard -->
</div><!-- form -->
		 <script type="text/javascript">
var sidebar = $('.navigation');
var content = $('#page');
var winW = 630, winH = 460;
var scrollbarWidth = 0;
if( typeof( window.innerWidth ) == 'number' ) {
    //Non-IE
	winW = window.innerWidth;
	winH = window.innerHeight;
  } else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
    //IE 6+ in 'standards compliant mode'
	  winW = document.documentElement.clientWidth;
    winH = document.documentElement.clientHeight;
  } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
    //IE 4 compatible
	  winW = document.body.clientWidth;
    winH = document.body.clientHeight;
  }


   //sidebar.css('visibility','visible');
   sidebar.css('display','inline');
   sidebar.css('position','absolute');
   var padding_top = content.css('padding-top');
   padding_top = padding_top.replace(/\D/g,'');
   
   sidebar.css('top',(content.position().top-padding_top)+'px');
   sidebar.css('left',((winW-getScrollbarWidth())/2-960/2-212)+'px');
   
   function getScrollbarWidth() {
   	if ( !scrollbarWidth ) {
   		if ( $.browser.msie ) {
   			var $textarea1 = $('<textarea cols="10" rows="2"></textarea>')
   					.css({ position: 'absolute', top: -1000, left: -1000 }).appendTo('body'),
   				$textarea2 = $('<textarea cols="10" rows="2" style="overflow: hidden;"></textarea>')
   					.css({ position: 'absolute', top: -1000, left: -1000 }).appendTo('body');
   			scrollbarWidth = $textarea1.width() - $textarea2.width();
   			$textarea1.add($textarea2).remove();
   		} else {
   			var $div = $('<div />')
   				.css({ width: 100, height: 100, overflow: 'auto', position: 'absolute', top: -1000, left: -1000 })
   				.prependTo('body').append('<div />').find('div')
   					.css({ width: '100%', height: 200 });
   			scrollbarWidth = 100 - $div.width();
   			$div.parent().remove();
   		}
   	}
   	return scrollbarWidth;
   };
</script>