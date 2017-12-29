<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<?php 
$baseUrl = Yii::app()->baseUrl; 
  $cs = Yii::app()->getClientScript();
  $cs->registerScriptFile($baseUrl.'/assets/modalPopup/modal.js');
  ?>
<?php $this->renderPartial('//layouts/header_tag'); ?>
<body>

<?php $this->renderPartial('//layouts/header_landing'); ?>


<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php /*$this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); */?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>


</div><!-- page -->
<!-- How it works -->

 <div style="background-color: #F7F7F7; padding:20px 10px; border:solid 1px #D9D9D9">
 <div class="span-24" style="margin:auto; margin-top:10px; margin-bottom:10px; float:none">
  <div class="portletShadowBox clear-fix" style="padding:20px" >
  <div class="span-5" style="float:left; font-size:20px; font-weight:bold">Gridbid for solar installers</div>
  <div class="span-18" style="float:right">
   <table style="margin-bottom:0px;" >
  	<tr>
  		<td style="vertical-align:top"><div style="width:106px; margin:auto"><img src="images/how_gridbid_works5.png" alt="how_gridbid_works5.png"/></div><div style ="font-size: 14px;font-weight:bold; text-align:center; margin:auto; margin-top:5px;width:120px;" >Find Roofs Near You</div></td>
  		
  		<td style="vertical-align:top"><div style="width:106px; margin:auto"><img src="images/how_gridbid_works6.png" alt="how_gridbid_works6.png"/></div><div style ="font-size: 14px;font-weight:bold; text-align:center; margin:auto; margin-top:5px;width:120px;" >Bid Online</div></td>
  		
  		<td style="vertical-align:top"><div style="width:106px; margin:auto"><img src="images/how_gridbid_works7.png" alt="how_gridbid_works7.png"/></div><div style ="font-size: 14px;font-weight:bold; text-align:center; margin:auto; margin-top:5px;width:120px;" >Secure Exclusive Leads</div></td>
  		
  		<td style="vertical-align:top"><div style="width:106px; margin:auto"><img src="images/how_gridbid_works8.png" alt="how_gridbid_works8.png"/></div><div style ="font-size: 14px;font-weight:bold; text-align:center; margin:auto; margin-top:5px;width:120px;" >Save A Bundle</div></td>
  	</tr>
  </table>
  
  </div>
   </div>
  </div>
</div><!-- How it works -->

<?php $this->renderPartial('//layouts/footer_main'); ?>
	
</body>
</html>