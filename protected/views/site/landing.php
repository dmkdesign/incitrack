<?php $this->breadcrumbs=''; ?>

<?php 
$baseUrl = Yii::app()->baseUrl; 
  $cs = Yii::app()->getClientScript();
  $cs->registerScriptFile($baseUrl.'/assets/slides/slides.min.jquery.js');
  $cs->registerCssFile($baseUrl.'/css/slides.css');
  ?>
<?php //remove slide show from front page
  /*
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

</script>*/
  
?>
<div class="pageView">

<div class ='landingcontainer'>
<div class='landing title'>Welcome to BCARC's Incitrack</div>
<div class='landing login'>
<?php 
	$this->renderPartial('user.views.user.login',array('model'=>$model), false);
	?>
  
  </div>
 </div>
</div>
 <!-- end .content -->


