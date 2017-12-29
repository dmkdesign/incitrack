<?php
$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);
?>
<div id="about" class="projectView clear-fix">
<h2 style="margin-top:15px">About Us</h2>
<h3 style="line-height:24px;">Gridbid.com is the world's first rooftop auction and its where you help guarantee your best deal on rooftop solar by having solar installers compete for your business</h3>

<?php $this->widget('instaCMS',array('framecode'=>'aboutLeadIn', 'adminBackColor'=>'#FFFF99')); ?>
<h3 >For home owners and organizations - why use Gridbid to go solar?</h3>

<?php $this->widget('instaCMS',array('framecode'=>'aboutWhyRoof', 'adminBackColor'=>'#FFFF99')); ?>
<h3 >How Gridbid Works</h3>
<?php $this->renderPartial('mini_howworks_roof');?>

<h3>For Solar Installers and Investors - why use Gridbid to find new solar customers? </h3>


<?php $this->widget('instaCMS',array('framecode'=>'aboutWhySoco', 'adminBackColor'=>'#FFFF99')); ?>

<?php $this->widget('instaCMS',array('framecode'=>'aboutBetterTime', 'adminBackColor'=>'#FFFF99')); ?>

<h3>Security</h3>

<p>By default your data is securely stored in the Gridbid cloud using world-class technology and techniques.</p>

<h3>Meet the Gridbid team</h3>

<h4>Thomas Kineshanko, CEO</h4>
<?php $this->widget('instaCMS',array('framecode'=>'bioThomas', 'adminBackColor'=>'#FFFF99')); ?>
<?php $this->widget('instaCMS',array('framecode'=>'linksThomas', 'adminBackColor'=>'#FFFF99')); ?>

<h4>Kevin Starke, User Experience</h4>
<?php $this->widget('instaCMS',array('framecode'=>'bioKevin', 'adminBackColor'=>'#FFFF99')); ?>
<?php $this->widget('instaCMS',array('framecode'=>'linksKevin', 'adminBackColor'=>'#FFFF99')); ?>

<h4>Marc Baumgartner, Design</h4>
<?php $this->widget('instaCMS',array('framecode'=>'bioMarc', 'adminBackColor'=>'#FFFF99')); ?>
<?php $this->widget('instaCMS',array('framecode'=>'linkMarc', 'adminBackColor'=>'#FFFF99')); ?>

<h4>Daniela Korinth, SEO</h4>
<?php $this->widget('instaCMS',array('framecode'=>'bioDaniela', 'adminBackColor'=>'#FFFF99')); ?>
<?php $this->widget('instaCMS',array('framecode'=>'linkDaniela', 'adminBackColor'=>'#FFFF99')); ?>

<h4>Spencer, Loyalty </h4>
<?php $this->widget('instaCMS',array('framecode'=>'bioSpencer', 'adminBackColor'=>'#FFFF99')); ?>

<h4>Investors:</h4>
Gridbid is funded by Habitat Enterprises and a number of successful Angel Investors in the renewable energy marketplace including Matthew Shaw, Ralph Turfus, and Michael Volker. 
</div>