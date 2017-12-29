<script>
<?php
	$createDate=false;
	$createTime=false;
if($question->field_type == 'DATE' ||$question->field_type == 'DATETIME'){
	$createDate=true;
	$defaultValue='1979-07-20';
}
if($question->field_type == 'TIME' ||$question->field_type == 'DATETIME')
{
	$createTime=true;
	if(isset($defaultValue))
	{
		$defaultValue=$defaultValue.' 00:00:00';
	}
	else
	{
		$defaultValue='00:00:00';
	}
}
	$js="function calcDate_".$question->varname."()
	{
	var date ='';
	var time='';
	var dateTime='';
	var hour='';
	var minute='';
	";
	if($createDate==true){
		$js.="day = $('#".$question->varname."_day').val();
		month = $('#".$question->varname."_month').val();
		year = $('#".$question->varname."_year').val();
		dateTime = year.toString()+'-'+month.toString()+'-'+day.toString();
		";
	}
	if($createTime==true){
		$js.="hour = $('#".$question->varname."_hour').val();
		minute = $('#".$question->varname."_minute').val();
		time= hour.toString()+':'+minute.toString()+':00';
		if(dateTime == ''){
		dateTime=time;}
		else{
		dateTime+=' '+ time;}
		";
	}
	$js.="$('#Report_".$question->varname."').val(dateTime);
	$(document).bind('custom','#Report_dateOfBirth',function(){ calculateage();}); /**/
	$('#Report_dateOfBirth').trigger('custom');
}";
	//$('#Report_".$question->varname."').trigger('custom');
	echo $js;
?>
	

	</script>
<div class="row">
<div class="rowTitle"><?php echo CHtml::encode($question->title); ?></div>

<?php

$year='';
$month='';
$day='';
$hour='';
$minute='';
$varname =$question->varname;
date_default_timezone_set ( 'America/Vancouver');
$timestamp =strtotime($model->$varname);
if ( $timestamp  )
{
	$year = sprintf("%02s", date('Y',$timestamp));
	$month =sprintf("%02s",date('m',$timestamp));
	$day = sprintf("%02s",date('j',$timestamp));
	$hour = sprintf("%02s",date('H',$timestamp));
	$minute = sprintf("%02s",date('i',$timestamp));
}
else {
	$localtime = localtime(time(), true);	
	$year = $localtime['tm_year']+1900;
	$month =sprintf("%02s",$localtime['tm_mon']+1);
	$day =sprintf("%02s",$localtime['tm_mday']);
	$hour = sprintf("%02s",$localtime['tm_hour']);
	$minute = sprintf("%02s",$localtime['tm_min']);
}

		
if($model->$varname!='0000-00-00')
	$value = date("Y-m-d H:i:s");
else 
	$value = $model->$varname;
echo $form->hiddenField($model, $question->varname,array('text'=>$value));
if ($createDate==true)
{
	
	echo "<div class='datesection'><div class='datelabel'>Date</div>";
	
	echo Chtml::dropDownList($question->varname.'_month',$month, $model->getMonths(),array('style'=>'margin-right:10px','onBlur'=>'js:calcDate_'.$question->varname.'();return false',
			'ajax' => array(
					'type'=>'POST', //request type
					'url'=>CController::createUrl('report/dynamicDays',array('monthField' => $question->varname.'_month','dayField'=>$question->varname.'_day')), //url to call.
					'update'=>'#'.$question->varname.'_day', //selector to update
					//'data'=>'js:javascript statement'
					//leave out the data key to pass all form values through
			)));
	echo Chtml::dropDownList( $question->varname.'_day',$day,$model->getDays(strtolower(date('m'))),array('style'=>'margin-right:10px','onChange'=>'js:calcDate_'.$question->varname.'();return false'));
	echo Chtml::dropDownList($question->varname.'_year', $year, $model->getYears(),array('style'=>'margin-right:20px','onChange'=>'js:calcDate_'.$question->varname.'();'));
	echo "</div><!--end of date div-->";
}
if($createTime==true)
{
	echo "<div class='timesection'><div class='timelabel'>Time (24HR)</div>";
	
	echo Chtml::dropDownList($question->varname.'_hour',$hour, $model->getHours(),array('style'=>'margin-right:10px','onBlur'=>'js:calcDate_'.$question->varname.'();return false;'));
	echo Chtml::dropDownList($question->varname.'_minute', $minute,$model->getMinutes(),array('style'=>'margin-right:10px','onBlur'=>'js:calcDate_'.$question->varname.'();return false;'));
	echo "</div><!--end of time div-->";
	
}echo $form->error($model,$question->varname);
?>

</div>

