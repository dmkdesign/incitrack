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
<div style="background-color: transparent; padding-top:35px; padding-bottom:5px">
	<table>
  		<tr >
    		<td style=" vertical-align:top;text-align:left; border-top:none; padding:10px 0px; " width="45%" >
            <img src="images/home_title.png" alt="Get the best price for your roof!"/>
            <p style="margin-top:20px; margin-bottom:20px; font-size:16px; line-height:25px">Save up to 30% on rooftop solar when solar installers compete for your roof on Gridbid</p>
            <input class="btnAuction" type="submit" alt ="Post your roof" value="Auction Your Roof" style="float:none;display:block;width:auto; height:50px;" onclick="javascript:location.href='index.php?r=/site/CreateProject'; return false;"/>
            <div style="font-size:16px;margin-top:40px">
  			Are you a solar contractor?  <a href="index.php?r=site/soco">Get exclusive solar leads</a>
  			</div>
            </td>
  			<td style=" vertical-align:top; text-align:center;border-top:none; padding:0px"  width="55%" >
  			<div class="sliderFrame">
  			
  			<div id="slides" >
			  <div class="slides_container" style="overflow: hidden; position: relative; display: block;  ">

			   	<div class="slide">
				   	<img alt="Slide 1" src="images/solar1.jpg" width="440px">
				   	<div class="caption" style="bottom: 0px;">Find the right installer, fast</div>
			   	</div>
			   	<div class="slide">
				   	<img alt="Slide 2" src="images/solar2.jpg" width="440px">
				   	<div class="caption" style="bottom: 0px;">Auction any size of project</div>
			   	</div>
			   	<div class="slide">
				   	<img alt="Slide 3" src="images/solar3.jpg" width="440px">
				   	<div class="caption" style="bottom: 0px;">Guarantee your best deal</div>
			   	</div>
			   	<div class="slide">
				   	<img alt="Slide 4" src="images/solar4.jpg" width="440px">
				   	<div class="caption" style="bottom: 0px;">Compare bids side-by-side</div>
			   	</div>
			  </div>
			  <a href="#" class="prev"><img src="img/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
			 <a href="#" class="next"><img src="img/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
			  
			</div>
			</div>
            
            </td>
 		</tr>
  </table>
 
  
  </div>
 

 <!-- end .content -->


