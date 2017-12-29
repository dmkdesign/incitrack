<?php
$this->breadcrumbs=array(
	'Automails',
);

$this->menu=array(
	array('label'=>'Create Automail', 'url'=>array('create')),
	array('label'=>'Manage Automail', 'url'=>array('admin')),
);
?>

<h1>Properties List</h1>
<p>This is the list of active properties and their associated automail information.  Click the magnifying glass to view the properties details and the letter icon to run the automailer.</p>
<div id="status" style='font-size:16px; color:#00A0DE'></div>
<?php 
	
	// set the id to be used for the grid
$gridId = 'automail-grid';
// add CSRF code if CSRF validation is activated
$csrf = '';
if(Yii::app()->request->enableCsrfValidation) {
    $csrf = "\n\t\tdata:{ '".Yii::app()->request->csrfTokenName."':'".Yii::app()->request->csrfToken."' },";
}
// generate the update function (NB POST should be used for anything which alters state)
$ajaxGridButtonFunction = "function() { $.fn.yiiGridView.update('{$gridId}', {
    type: 'POST',
    url: $(this).attr('href'), $csrf
    success:function(data) {
        $.fn.yiiGridView.update('{$gridId}');
        $('#status').html(data);
        return;
    },
    error: function() {
    return;
	}
	});
return false;
}";

	
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'automail-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'ajaxUpdate'=>true,
	'columns'=>array(
		array('name'=>'id','type'=>'raw', 'value'=>'CHtml::link($data->id,array("roof/view","id"=> $data->id))'),//,
		'address1',
		'state',
		'created',
		'automailed',
		'last_automail',
		/*
		'active',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{email}',
				'buttons'=>array
				(
						'view' => array
						(
								'options'=>array('title'=>'View Project','style'=>'width:20px'),
								'url'=>'array("roof/view","id"=>$data->id)',
								'imageUrl'=>Yii::app()->request->baseUrl.'/images/inspect.png',
						),
						'email' => array
						(
								'label'=>'Run automailer',
								'options'=>array('title'=>'Preview automail results','style'=>'width:20px'),
			
								'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
								'url'=>'array("automail/preview","id"=>$data->id)',
								
							),
				),
		),
	),
)); ?>