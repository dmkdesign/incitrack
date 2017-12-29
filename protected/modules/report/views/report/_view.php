<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
<table>
	<?php 
		$questions=Question::model()->forOwner()->sort()->findAll();
		if ($questions) {
			foreach($questions as $question) {
				//echo "<pre>"; print_r($profile); die();
			?>
<tr>
	<th class="label"><?php echo CHtml::encode(UserModule::t($question->title)); ?>
</th>
    <td><?php echo $data->getAttribute($question->varname); ?>
</td>
</tr>
			<?php
			}//$profile->getAttribute($field->varname)
		}
?>
</table>

</div>