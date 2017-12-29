<?php $this->beginContent('//layouts/main'); ?>
<div id="submenu">
<?php 
	$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				));
?></div>
<div>

	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<?php $this->endContent(); ?>