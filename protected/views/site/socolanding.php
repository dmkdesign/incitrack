
<?php 
$baseUrl = Yii::app()->baseUrl; 
  $cs = Yii::app()->getClientScript();
  $cs->registerScriptFile($baseUrl.'/assets/slides/slides.min.jquery.js');
  $cs->registerCssFile($baseUrl.'/css/slides.css');
  ?>

<div style="background-color: transparent; padding-top:35px; padding-bottom:30px; min-height:350px">
	
  	<div class="clear-fix">
  		<div class='span-10'>
            <?php
				Yii::app()->clientScript->registerScriptFile("http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false");
				$script = "$(document).ready(function(){
				var input = document.getElementById('address');
				var options = {
					  types: ['(cities)'],
					  
					};
							
				autocomplete = new google.maps.places.Autocomplete(input,options);
				
				$('#slides').slides({
						preload: true,
						preloadImage: 'img/loading.gif',
						play: 5000,
						pause: 2500,
						hoverPause: true,
						animationStart: function(current){
							$('.caption').animate({
								bottom:-35
							},100);
							if (window.console && console.log) {
								// example return of current slide number
								console.log('animationStart on slide: ', current);
							};
						},
						animationComplete: function(current){
							$('.caption').animate({
								bottom:0
							},200);
							if (window.console && console.log) {
								// example return of current slide number
								console.log('animationComplete on slide: ', current);
							};
						},
						slidesLoaded: function() {
							$('.caption').animate({
								bottom:0
							},200);
						}
					});
				}
				);";
				
			Yii::app()->clientScript->registerScript("g_auto_comp",$script,CClientScript::POS_HEAD);?>
            <?php $this->widget('instaCMS',array('framecode'=>'socoH1', 'adminBackColor'=>'#FFFF99')); ?>
            <?php $this->widget('instaCMS',array('framecode'=>'socoH2', 'adminBackColor'=>'#FFFF99')); ?>
            
            <div style="position:relative; text-align:left">
            <?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'search-form',
				'enableAjaxValidation'=>false,
				)); ?>
			<h3 style="margin-bottom: 5px">Where do you want to find leads?</h3>
            <?php echo CHtml::textField('address', '', array('style'=>'padding:5px; font-size:15px; width:280px; height: 24px ', 'autocomplete'=>'off', 'placeholder'=>'city, state')); ?>
            <?php echo CHtml::submitButton('Search', array('name'=>'Search', 'class'=>'btnSocoSearch', 'style'=>'position:absolute; left:280px; width:80px; height: 36px!important', 'onClick'=>"_gaq.push(['_trackEvent', 'SocoSearch', 'SocoLanding', '']);")); ?>
            <?php $this->endWidget(); ?>
            </div>
        </div>
    	<div class="span-14 clear-fix sliderFrame" style="float:right">
    	  
             <div id="slides">
              	<div class="slides_container">
    		 <?php $this->widget('instaCMS',array('framecode'=>'socoLandingPic', 'adminBackColor'=>'#FFFF99')); ?>
    			</div>
    		</div>
    	</div>
       	
 	</div>
 </div>
 

 <!-- end .content -->


