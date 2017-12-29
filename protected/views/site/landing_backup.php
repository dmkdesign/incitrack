<?php $this->breadcrumbs=''; ?>

<?php 
$baseUrl = Yii::app()->baseUrl; 
  $cs = Yii::app()->getClientScript();
  $cs->registerScriptFile($baseUrl.'/assets/slides/slides.min.jquery.js');
  $cs->registerCssFile($baseUrl.'/css/slides.css');
  ?>

<script type="text/javascript">

$(function(){
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
	}); 

</script>
 
<div style="background-color: transparent; padding-top:30px; padding-bottom:5px">
	<H1 >STAGING</H1>
	<table>
  		<tr >
    		<td style=" vertical-align:top; text-align:center;border-top:none; padding:0px"  width="60%" >
  			<?php /*
  			<div class="sliderFrame" style="float:left">
  			
  			<div id="slides" >
			  <div class="slides_container" style="overflow: hidden; position: relative; display: block;  ">

			   	<div class="slide">
				   	<img alt="Slide 1" src="images/solar1.jpg" width="440px">
				   	<div class="caption" style="bottom: 0px;"><?php $this->widget('instaCMS',array('framecode'=>'roofCaption1', 'adminBackColor'=>'#FFFF99')); ?></div>
			   	</div>
			   	<div class="slide">
				   	<img alt="Slide 2" src="images/solar2.jpg" width="440px">
				   	<div class="caption" style="bottom: 0px;"><?php $this->widget('instaCMS',array('framecode'=>'roofCaption2', 'adminBackColor'=>'#FFFF99')); ?></div>
			   	</div>
			   	<div class="slide">
				   	<img alt="Slide 3" src="images/solar3.jpg" width="440px">
				   	<div class="caption" style="bottom: 0px;"><?php $this->widget('instaCMS',array('framecode'=>'roofCaption3', 'adminBackColor'=>'#FFFF99')); ?></div>
			   	</div>
			   	<div class="slide">
				   	<img alt="Slide 4" src="images/solar4.jpg" width="440px">
				   	<div class="caption" style="bottom: 0px;"><?php $this->widget('instaCMS',array('framecode'=>'roofCaption4', 'adminBackColor'=>'#FFFF99')); ?></div>
			   	</div>
			  </div>
			  <a href="#" class="prev"><img src="img/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
			 <a href="#" class="next"><img src="img/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
			  
			</div>
			</div>
            */?>
              
            <div class="videoFrame" style="float:left;margin-top:12px">
            <?php $this->widget('JFlowPlayer', array(
    		'url' => 'images/Gridbid_video.mp4',
    		'id'=>'player',
    		'width'=>'500px',
    		'height'=>'330px',
            'image'=>'images/videosplash.png'
			)); ?>
			
			</div>
            </td>
            <td style=" vertical-align:top;text-align:left; border-top:none; padding:10px 0px; " width="40%" >
            <?php $this->widget('instaCMS',array('framecode'=>'roofH1', 'adminBackColor'=>'#FFFF99')); ?>
            <?php $this->widget('instaCMS',array('framecode'=>'roofH2', 'adminBackColor'=>'#FFFF99')); ?>
            <input class="btnAuction" type="submit" alt ="Post your roof" value="<?php $this->widget('instaCMS',array('framecode'=>'roofAuctionButtonText', 'adminBackColor'=>'#FFFF99')); ?>" style="float:none;display:block;width:auto; height:50px;" onclick="javascript:location.href='index.php?r=/site/CreateProject'; return false;"/>
            <div style="font-size:16px;margin-top:35px">
  			<?php $this->widget('instaCMS',array('framecode'=>'solarRedirectStatic', 'adminBackColor'=>'#FFFF99')); ?><a href="index.php?r=site/soco"><?php $this->widget('instaCMS',array('framecode'=>'solarRedirectLink', 'adminBackColor'=>'#FFFF99')); ?></a>
  			</div>
            </td>
 		</tr>
  </table>
 
  
  </div>
 

 <!-- end .content -->


