<?php $this->beginContent('//layouts/main'); ?>
<div class="projectView clear-fix">
	
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->

	
</div>

<div id="sidecontainer" class="span-5 last" style="position: absolute;">
		<div id="sidebar" style="position: relative;" >
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operations',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
		?>
		</div><!-- sidebar -->
</div>
<script type="text/javascript">
var sidebar = $('#sidecontainer');
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
   sidebar.css('left',((winW-getScrollbarWidth())/2+960/2+10)+'px');
   
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
<?php $this->endContent(); ?>