<?php
$this->breadcrumbs=array(
	'Reports'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'View Report', 'url'=>array('view', 'id'=>$model->id),'active'=>true),
	array('label'=>'Update Report', 'url'=>array('update', 'id'=>$model->id,), 'visible'=>($model->status!=Report::COMMITTED)),
	
);
?>

<?php echo $this->renderPartial('//layouts/dashboard_page', compact('currentPage','model','formcomplete'),true); ?>
<?php /*echo CHtml::button('Update Report',array('submit' => array('report/wizard&id='.$model->id.'&pageId=1')))*/?>
<div id ="page" class="container"><div id="submenu">
<?php 
	$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				));
?></div>
<div class="pageView">

<div class="reportTitle">View Report #<?php echo $model->id; ?></div>



	
	<?php /*
<table class="dataGrid" style="width:600px">
	<?php 
		$questions=Question::model()->forOwner()->sort()->findAll();
		if ($questions) {
			foreach($questions as $question) {
				//echo "<pre>"; print_r($profile); die();
			?>
	<tr>
	<th class="label"><?php echo CHtml::encode($question->title); ?>
	</th>
    <td><?php echo $model->getAttribute($question->varname); ?>
	</td>
	</tr>
			<?php
			}
		}
?>
</table>
 */?>
<?php 
	
	$questions=Question::model()->forOwner()->sort()->findAll();
	
	foreach($pages as $page){
		$labels = array();
		$questions=$page->questions();
		if ($questions)
		{
			foreach($questions as $question)
			{	
				if($question->field_type=='SELECT')
				{
						$newVal =array();
						$value="";
						$answers = $model->getAttribute($question->varname);
						if (is_array($answers))
						{
							foreach($answers as $key => $value)
							{	//$choices = $question->choices;
								$choice = Choices::model()->findbyPk($value);
								if(isset($choice))
								array_push($newVal,$choice->text);
								
							}
							$value=implode(',',$newVal);
						}
						$attribute['label']=$question->title;
						$attribute['value']=$value;
						array_push($labels,$attribute);
				}
				elseif($question->field_type=='RADIO')
				{
					$newVal =array();
					$value="";
					$answer = $model->getAttribute($question->varname);
					if (!empty($answer))
					{
							$choice = Choices::model()->findbyPk($answer);
							if(isset($choice))
								$value=	$choice->text;
				
					}
					$attribute['label']=$question->title;
					$attribute['value']=$value;
					array_push($labels,$attribute);
				}
				else {
					array_push($labels,$question->varname.':raw:'.$question->title);
				}		
			}
			?>
			<div class="pageView">
			<div class="pageTitle"><?php echo CHtml::encode($page->title);?></div>
			<?php
			$this->widget('zii.widgets.CDetailView', array(	'data'=>$model,
			'attributes'=>$labels,
			'cssFile' => Yii::app()->baseUrl . '/css/widgets/detailview.css',
			));
			?>
	</div>
 <?php
	}
} ?>


</div>
</div>