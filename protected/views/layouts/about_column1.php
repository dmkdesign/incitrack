<?php $this->beginContent('//layouts/about_layout'); ?>
<div id="submenu">
<?php 
	$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				));
?></div>

<?php echo $content; ?>

<?php $this->endContent(); ?>