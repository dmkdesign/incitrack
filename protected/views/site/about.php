<?php
$this->breadcrumbs=array(
	'About',
);
?>
<div id="about" class="clear-fix">
<h2 style='margin-top:50px; margin-bottom:30px'><img src='images/about_gridbid.png' alt='About Gridbid'/></h2>
<h2 style="line-height:24px; font-size:22px; margin-bottom:40px">Gridbid.com is the world's first rooftop auction and it's where you help guarantee your best deal on rooftop solar by having solar installers compete for your business</h2>
<div class='clear-fix' style='padding-bottom: 40px; border-bottom:solid 2px #F2F2F2'>
<div class='span-14'>
<?php $this->widget('instaCMS',array('framecode'=>'aboutLeadIn', 'adminBackColor'=>'#FFFF99')); ?>
<?php $this->widget('instaCMS',array('framecode'=>'aboutBetterTime', 'adminBackColor'=>'#FFFF99')); ?>
<?php $this->widget('instaCMS',array('framecode'=>'aboutSecurity', 'adminBackColor'=>'#FFFF99')); ?>
</div>
<div class='span-10' style='float:right'>
<?php $this->widget('instaCMS',array('framecode'=>'aboutHomeOwners', 'adminBackColor'=>'#FFFF99')); ?>
<?php $this->widget('instaCMS',array('framecode'=>'aboutInstallers', 'adminBackColor'=>'#FFFF99')); ?>
</div>
</div>
<div class='clear-fix' style='border-bottom:solid 2px #F2F2F2'>
<h2 >How Gridbid Works</h2>
<a id="homeowners"></a>
<div class='portletShadowBox clear-fix' style="padding:20px; margin-bottom:30px">
<div style='width:200px; float:left'>
<h3 style='margin-bottom:70px; margin-top:0px'>Gridbid for homeowners & organizations</h3>
<?php echo CHtml::link('Auction your roof now!',array( 'leadsWizard/WizardStart'), array('style'=>'font-size:15px'))?>
</div>

<div style='float:right;width:690px'>
	<?php $this->widget('instaCMS',array('framecode'=>'aboutWhyRoof', 'adminBackColor'=>'#FFFF99')); ?>
	
	<?php $this->renderPartial('mini_howworks_roof');?>
</div>
</div>
<a id="installers"></a>
<div class='portletShadowBox clear-fix' style="padding:20px; margin-bottom:40px">
<div style='width:200px; float:left'>
<h3 style='margin-bottom:70px; margin-top:0px'>Gridbid for solar installer & investors</h3>
<?php echo CHtml::link('Get solar project leads now!',array( 'site/soco'), array('style'=>'font-size:15px'))?>
</div>
<div style='float:right; width:690px;'>
	<?php $this->widget('instaCMS',array('framecode'=>'aboutWhySoco', 'adminBackColor'=>'#FFFF99')); ?>
	
	<?php $this->renderPartial('mini_howworks_soco');?>
</div>
</div>
</div>
<h2>Meet the Gridbid team</h2>


<?php $this->widget('instaCMS',array('framecode'=>'bioThomas', 'adminBackColor'=>'#FFFF99')); ?>

<?php $this->widget('instaCMS',array('framecode'=>'bioKevin', 'adminBackColor'=>'#FFFF99')); ?>

<?php $this->widget('instaCMS',array('framecode'=>'bioMarc', 'adminBackColor'=>'#FFFF99')); ?>

<?php $this->widget('instaCMS',array('framecode'=>'bioAaron', 'adminBackColor'=>'#FFFF99')); ?>

<?php $this->widget('instaCMS',array('framecode'=>'bioDaniela', 'adminBackColor'=>'#FFFF99')); ?>

<?php $this->widget('instaCMS',array('framecode'=>'bioSpencer', 'adminBackColor'=>'#FFFF99')); ?>

<?php $this->widget('instaCMS',array('framecode'=>'bioInvestors', 'adminBackColor'=>'#FFFF99')); ?>

<?php $this->widget('instaCMS',array('framecode'=>'aboutAddress', 'adminBackColor'=>'#FFFF99')); ?>
</div>
