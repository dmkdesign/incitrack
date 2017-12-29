

function openModal(popName, maskName, xoffset,yoffset )
{
	if(xoffset===undefined)
		xoffset=0;
	if(yoffset===undefined)
		var yoffset = document.body.scrollTop;
	 	if (yoffset == 0)
	 	{
	 
	    if (window.pageYOffset)
	 
	         yoffset = window.pageYOffset;
	 
	    else
	 
	        yoffset = (document.body.parentElement) ? document.body.parentElement.scrollTop : 0;
	 
	}

	var winW = 630, winH = 460;
	//windows
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

	
	var clientH =document.documentElement.clientHeight;
	var clientW = document.documentElement.clientWidth;
       $('#'+popName).css('visibility','visible');
       $('#'+popName).css('display','block');
       if((yoffset+winH/2-$('#'+popName).height()/2)<0)
       {
    	   $('#'+popName).css('top',yoffset);
       }
       else
    	   {
       $('#'+popName).css('top',yoffset+winH/2-$('#'+popName).height()/2);
    	   }
       $('#'+popName).css('left',(winW/2-$('#'+popName).width()/2- getScrollbarWidth()+xoffset)+'px');
       //mask
       $('#'+maskName).css('display','');
       $('#'+maskName).css('visibility','visible');
       $('#'+maskName).css('top','0px');
       $('#'+maskName).css('left','0px');
       $('#'+maskName).css('width', winW+'px');
       $('#'+maskName).css('height', getDocHeight() + 'px');

}

function getDocHeight() {
    var D = document;
    return Math.max(
        Math.max(D.body.scrollHeight, D.documentElement.scrollHeight),
        Math.max(D.body.offsetHeight, D.documentElement.offsetHeight),
        Math.max(D.body.clientHeight, D.documentElement.clientHeight)
    );
}
function closeModal(popName, maskName)
{	
	 $('#'+popName).hide();
	 $('#'+maskName).hide();
	return false;
}
var scrollbarWidth = 0;
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