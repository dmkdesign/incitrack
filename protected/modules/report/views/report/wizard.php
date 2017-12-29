<?php
$this->breadcrumbs=array(
	'Reports'=>array('index'),
	'Report Wizard',
);

//menu set in controller
?>
<?php echo $this->renderPartial('//layouts/dashboard_wizard', compact('currentPage','model','formcomplete'),true); ?>
<div id ="page" class="container">
<div class="pageView">
<?php echo $this->renderPartial('_form', compact('model','questions','currentPage','pages','validationcheck'),false); ?>
</div>
</div>