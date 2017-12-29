<?php
$this->breadcrumbs=array(
	'Analytics',
);?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<?php 
$this->Widget('ext.highcharts.HighchartsWidget', array(
'scripts' => array(
      'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
      'modules/exporting', // adds Exporting button/menu to chart
      'themes/grid-light'        // applies global 'grid' theme to all charts
    ),
    'options' => array(
      'title' => array('text' => 'Patient Visits By Day (Last Two Weeks)'),
      'xAxis' => array(
         'categories' => array('14th','15th','16th','17th','18th','19th','20th','21th','22th','23th','24th','25th','26th','27th','28th')
      ),
      'yAxis' => array(
         'title' => array('text' => 'Number of Visits')
      ),
      'colors'=>array('#0563FE', '#6AC36A', '#FFD148', '#FF2F2F'),
      'gradient' => array('enabled'=> true),
      'credits' => array('enabled' => false),
      /*'exporting' => array('enabled' => false),*/ //to turn off exporting uncomment
      'chart' => array(
        'plotBackgroundColor' => '#ffffff',
        'plotBorderWidth' => null,
        'plotShadow' => false,
        'height' => 400,
      ),
      'title' => false,
       'series' => array(
          array('type'=>'column','name' => 'Hampton Office', 'data' => array(20, 25, 25,35, 30, 28,25, 27, 23, 24, 25, 26,27,28,33)),
          array('type'=>'spline','name' => 'Hampton Office', 'data' => array(20, 25, 25,35, 30, 28,25, 27, 23, 24, 25, 26,27,28,33)),
          array('type'=>'spline','name' => 'Richmond Office', 'data' => array(5, 7, 8,9, 7, 10,11, 12, 13,15, 17, 14,15,16,18)),
          array(
            'type'=>'pie',
            'name' => 'Richmond Office',
            'data' => array(5, 7, 8),
            'dataLabels' => array(
              'enabled' => false,
            ),
            'showInLegend'=>false,
            'size'=>'10',
            'center'=>array(20, 20),
          ),
      ),
    )
  ));
?>