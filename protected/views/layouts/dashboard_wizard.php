<script>
function submitVerify(){
	$('#report-form').append("<input type='hidden' name='verify' value='1' />");
	$('#report-form').submit();
	return true;
	};
	function submitSaveExit(){
		$('#report-form').append("<input type='hidden' name='saveexit' value='1' />");
		$('#report-form').submit();
		return true;
		};
		function submitCommit(){
			$('#report-form').append("<input type='hidden' name='commit' value='1' />");
			$('#report-form').submit();
			return true;
			};
</script>

<div id="dashboardmenu" >
	


		<?php 
		
		$items =
		array(	!empty($model->id)?
				array('label'=>"<div class='vertical_align'></div><div class='dashboardmenu_item'><img src ='".Yii::app()->request->baseUrl."/images/saveexit.png'/><br>Save & Exit Wizard</div>", 'url'=>'#','linkOptions'=>array('onclick'=>'submitSaveExit();' )):
				array('label'=>"<div class='vertical_align'></div><div class='dashboardmenu_item'><img src ='".Yii::app()->request->baseUrl."/images/saveexit.png'/><br>Abandon Report</div>", 'url'=>array('/report/report/admin'))
				);
		if(isset($model->id)){
			$htmlOptions = array('label'=>"<div class='vertical_align'></div><div class='dashboardmenu_item'><img src ='".Yii::app()->request->baseUrl."/images/verify.png'/><br>Verify Mode<br>(Off)</div>", 'url'=>'#','itemOptions'=>array('class'=>'verifyOff', 'onclick'=>'submitVerify();' ));
		
			if($model->status==Report::COMMIT)
			{ 
				$htmlOptions['itemOptions']=array('class'=>'verifyOn current','onclick'=>'submitVerify();');
			  	$htmlOptions['label']= "<div class='vertical_align'></div><div class='dashboardmenu_item'><img src ='".Yii::app()->request->baseUrl."/images/verify.png'/><br>Verify Mode<br>(On)</div>";
			}
				array_push($items,$htmlOptions);//'submit' =>array('verify','id'=>$model->id,'currentPage'=>$currentPage->id), )
		}
		if(isset($formcomplete)&& $formcomplete==true && $model->status==Report::COMMIT)
		{
			array_push($items,array('label'=>"<div class='vertical_align'></div><div class='dashboardmenu_item'><img src ='".Yii::app()->request->baseUrl."/images/commit.png'/><br>Commit</div>", 'url'=>'#','linkOptions'=>array('onclick'=>'submitCommit();' )));
			
		
		
		}
		
		switch(Yii::App()->user->getState('userType'))
		{
			case user::TYPE_NORMAL:
				
				break;
			case user::TYPE_SUPERVISOR:
						if($model->status==Report::COMMITTED)
							array_push($items,array('label'=>"<div class='vertical_align'></div><div class='dashboardmenu_item'><img src ='".Yii::app()->request->baseUrl."/images/commit.png'/><br>Uncommit</div>", 'url'=>array('uncommit','id'=>$model->id), ));
				break;
			case user::TYPE_BCARC:
				
				break;
			case user::TYPE_ADMIN:
				if($model->status==Report::COMMITTED)
					array_push($items,array('label'=>"<div class='vertical_align'></div><div class='dashboardmenu_item'><img src ='".Yii::app()->request->baseUrl."/images/commit.png'/><br>Uncommit</div>", 'url'=>array('uncommit','id'=>$model->id,), ));
				array_push($items, array('label'=>"<div class='vertical_align'></div><div class='dashboardmenu_item'><img src ='".Yii::app()->request->baseUrl."/images/CMS.png'/><br>CMS</div>", 'url'=>array('/category/admin'), ));
				array_push($items, array('label'=>"<div class='vertical_align'></div><div class='dashboardmenu_item'><img src ='".Yii::app()->request->baseUrl."/images/Admin.png'/><br>Admin</div>", 'url'=>array('/admin')));
					break;
			default:
			
				break;
		}
		
	
			$this->widget('zii.widgets.CMenu',array(
					'items'=>$items,
					
					'encodeLabel'=>false,
			));
		 ?>

	</div><!-- dashboard -->
