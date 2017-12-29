<?php
$this->breadcrumbs=array(
	'Charts'=>array('index'),
	$model->id,
);

if(Yii::App()->user->getState('userType')==user::TYPE_ADMIN){
$this->menu=array(
	array('label'=>'List Chart', 'url'=>array('index')),
	array('label'=>'Create Chart', 'url'=>array('create')),
	array('label'=>'Update Chart', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Chart', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Chart', 'url'=>array('admin')),
);}
?>
<?php

$sections = Chart::itemAlias('section');
$items= array();
foreach($sections as $section)
{	$mainItem = array('label' =>$section,'htmlOptions'=>array('class'=>'closed'));
	
	$subItems=array();
	$charts = Chart::model()->findAll(array('condition'=>'section='.array_search($section,$sections).' AND publish=1','order'=>'sequence'));
	foreach ($charts as $chart)
	{
		array_push($subItems,array('label'=>$chart->menuLabel,'url'=>'#','linkOptions' => array('ajax' => ChartController::getAjaxMenuArrayConfig('view',$chart->id)),));
	}
	$mainItem['items']=$subItems;
	array_push($items,$mainItem);
}
$this->widget('ext.slidetoggle.ESlidetoggle',
  array(
   'itemSelector' => 'ul#chartMenu li',
   'titleSelector' => 'ul#chartMenu li span',
   'collapsed' => 'ul#chartmenu li ul.collapsible.closed',
  	'arrow'=>false,
  ));


?>

<div id="availableCharts" class="last" style="position: absolute;">
		<div id="sidebar" style="position: relative;" >
		<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Available Charts',
				'contentCssClass'=>'chartmenu_content',
				'decorationCssClass'=>'chartmenu_decoration',
				'titleCssClass'=>'chartmenu_title'
		));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$items,
				'id'=>'chartMenu',
					'submenuHtmlOptions' => array(
							'class' => 'collapsible closed',
							'style'=>'display:none')
				//'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
		?>
		</div><!-- sidebar -->
</div>
<script type="text/javascript">
var sidebar = $('#availableCharts');
var content = $('#content');
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
   sidebar.css('left',((winW-getScrollbarWidth())/2-960/2-277)+'px');
   
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
<h1><?php //echo $model->chartTitle; ?></h1>

<?php 
/*
$options=
array(
	
		'scripts' => array(
				'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
				'modules/exporting', // adds Exporting button/menu to chart
				'themes/grid-light'        // applies global 'grid' theme to all charts
		),
		'options' => array(
				
				'title' => array('text' => $model->chartTitle),
				//'xAxis' => array(
						'categories' => $data['xaxis'],
				),//
				'yAxis' => array(
						'title' => array('text' => '# of incidents'),
						'allowDecimals'=>false,
				),
				//'colors'=>array('#0563FE', '#6AC36A', '#FFD148', '#FF2F2F'),
				'gradient' => array('enabled'=> true),
				'credits' => array('enabled' => false),
				//'exporting' => array('enabled' => false),/ //to turn off exporting uncomment
				'chart' => array(
						'plotBackgroundColor' => '#ffffff',
						'plotBorderWidth' => null,
						'plotShadow' => false,
						'height' => 400,
						'type'=>Chart::itemAlias('chartType',$model->chartType)
				),
				'title' => false,
				'tooltip' => array(
						'pointFormat' => '{series.name}: <b>{point.y}</b>',
						'percentageDecimals' => 1,
				),

				'plotOptions'=>array(
						'pie'=>array('dataLabels'=>array('distance'=>-30,'color'=>'black', 'format'=>'<b>{point.name}</b>:<br> {point.percentage:.1f} %',),'showInLegend'=>true),
						'column'=>array('dataLabels'=>array('distance'=>-30,'color'=>'black', 'formatter'=>"js:function(){return this.series.name +':<b>'+ this.point.y+'</b>';}",'enabled'=>false),),
				),
				//'series' => $data['data'],array(
						array('type'=>$model->chartType,'name' => $model->label, 'data' => $series,
								 
						),
				//)/
		));*/
/*
if(is_array($chartOptions))
{
	$options['options']=array_merge($options['options'], $chartOptions);
	//$options['options']=$chartOptions;
}*/
$this->Widget('ext.Highcharts.HighchartsWidget',$options ); ?>
<?php if(isset($choices)): ?>
<?php 
	$list = CHtml::listData($choices,
			'id', 'text');
 ?>
<div id="data_options" class="form">
<h3>Filters</h3>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'chart-form',
	'enableAjaxValidation'=>false,
)); ?>

<div class="row <?php echo !empty($question->css)?$question->css:'' ?>" style="padding:10px 30px ">
<?php
/*
echo CHtml::checkBoxList('choices',array_keys($list) ,$list, 
		array(
			'separator' => '', // overwriting the line break
			'template' => '{input} {label}', // put the label behind
			'checkAll'=>'Check All',
			'checkAllLast'=>true
)); */?>
</div>
<div class="row buttons">
		<?php echo CHtml::submitButton('Filter'); ?>
	</div>
<?php $this->endWidget(); ?>

</div>
<?php endif;?>
<script>function getKey(data) {

	var arrayLength = data.length;
	  for (var i = 0; i < arrayLength; i++){
		  i++;
		  	if (data[i] !== 'undefined'){return i;
		    }
	  }
	 
	    }</script>