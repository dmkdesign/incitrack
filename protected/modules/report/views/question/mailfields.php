<script>function fillLocalAddress(obj)
{
	if(obj.checked){
	var mailAddress = $('#Report_mailingAddress').val();

		$('#Report_localAddress').val(mailAddress);
	}
}</script>
<div class="row">
<div class="rowTitle"><?php echo CHtml::encode($question->title); ?></div>
<?php
$params=array('onBlur'=>'calculateage();return false;');

echo $form->textField($model,$question->varname,array('style'=>'width:430px; font-size:15px;display:inline-block;', 'size'=>60,'maxlength'=>(($question->field_size)?$question->field_size:255)));
echo '<label style="display:inline-block">'.Chtml::checkBox('cb_copylocal',false, array('onclick'=>'javascript:fillLocalAddress(this);','style'=>'margin-left:15px;margin-right: 5px;')).'Local same as mailing<label>';
?>
</div>


