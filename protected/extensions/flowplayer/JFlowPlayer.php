<?php

/**
 * JFlowPlayer class file.
 *
 * @author jerry2801 <jerry2801@gmail.com>
 *
 * A typical usage of JFlowPlayer is as follows:
 * <pre>
 * $this->widget('application.extensions.flowplayer.JFlowPlayer', array(
 *     'url' => Html::mediaUrl('video.flv'),
 *     'id'=>'player',
 *     'width' => '400px',
 *     'height' => '280px',
 * ));
 * </pre>
 */

class JFlowPlayer extends CWidget
{
	public $baseUrl;
    public $url;
    public $id;
    public $width;
    public $height;
    public $image;

    public function init()
    {
        $dir = dirname(__FILE__).DIRECTORY_SEPARATOR.'source';
        $this->baseUrl = Yii::app()->getAssetManager()->publish($dir);

        $cs = Yii::app()->getClientScript();

        if(! $this->id)
            $this->id='player';

        if(! $this->width)
            $this->width='520px';

        if(! $this->height)
            $this->height='330px';

        $playerUrl = $this->baseUrl.'/flowplayer-3.2.11.swf';
        
        $cs->registerScriptFile($this->baseUrl.'/flowplayer-3.2.10.min.js');
        $cs->registerScriptFile($this->baseUrl.'/flowplayer.ipad-3.2.9.js');

        $cs->registerScript('flowplayer-script-'.$this->id,'flowplayer("'.$this->id.'", {src:"'.$playerUrl.'"},{quality:"low"}).ipad();');

    }

    public function run()
    {
        echo '<a href="'.$this->url.'" style="display:block;width:'.$this->width.';height:'.$this->height.'" id="'.$this->id.'"><img style="display:block;width:'.$this->width.';" src="'.$this->image.'"</a>';
    }
}