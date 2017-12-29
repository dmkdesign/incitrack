<?php
$this->breadcrumbs=array(
	'Automails',
);

$this->menu=array(
	array('label'=>'Create Automail', 'url'=>array('create')),
	array('label'=>'Manage Automail', 'url'=>array('admin')),
	array('label'=>'List Automail', 'url'=>array('index')),
);

$baseUrl = Yii::app()->baseUrl;
$cs =Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/assets/modalPopup/modal.js');
$url = $this->createUrl("automail/runAutomailer",array('id'=>$model->id));

$mailerscript = <<< MAP
function ajaxRequest() {
				
	    $.ajax({'type':'POST','data':'','beforeSend':function( request )
    		{
    		openModal('processingview','maskedDiv');
    		},'success':function( data )
    		{
    		closeModal('processingview','maskedDiv');
    		$("#status").html(data);
		},
		'url': '$url'
		});

}

MAP;
$cs->registerScript("update",$mailerscript,CClientScript::POS_HEAD);

?>

<h1>Automails found for project <?php echo $model->id?></h1>
<p>This is the list of automails associated with the above project id.</p>
<div id="status" style='font-size:16px; color:#00A0DE'></div>
<?php 
	
	
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'automail-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'email',
		'user_id',//array('name'=>'user_id','type'=>'raw','value'=>'CHtml::link($data->user_id,array("/user/admin/view","id"=> $data->user_id))'),
		'active',
		'distance'
		
	),
)); ?>
<?php echo CHtml::button('Send Mail', array('onClick' => 'javascript:ajaxRequest();return false;'));?>

 <div id="maskedDiv" class ="maskedModal"></div>
<div id="processingview" class ="popUp clearfix" style='padding:none'>
	<div style="float:left"><img src="images/processing.gif"></img></div>
	<div id="socodetailtext" style="padding:0px 15px 15px 15px; width:600px; float:right">
	We are processing your request, this may take a few moments.
	</div>
</div>