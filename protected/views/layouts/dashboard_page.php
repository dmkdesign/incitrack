<?php 
$baseUrl = Yii::app()->baseUrl; 
  $cs = Yii::app()->getClientScript();
  $cs->registerScriptFile($baseUrl.'/assets/modalPopup/modal.js');
  ?>
<div id="dashboardmenu" >
	


		<?php 
		
		$items =
		array(
				array('label'=>"<div class='vertical_align'></div><div class='dashboardmenu_item'><img src ='".Yii::app()->request->baseUrl."/images/create report.png'/><br>Create Report</div>", 'url'=>array('/report/report/create'), ),
				array('label'=>"<div class='vertical_align'></div><div class='dashboardmenu_item'><img src ='".Yii::app()->request->baseUrl."/images/report icon.png'/><br>Report History</div>", 'url'=>array('/report/report/admin'),),
				array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>"<div class='vertical_align'></div><div class='dashboardmenu_item'><img src ='".Yii::app()->request->baseUrl."/images/profile icon.png'/><br>Account Profile</div>", 'visible'=>!Yii::app()->user->isGuest));
		
		if($model->status==Report::COMMITTED){
			array_push($items,array('label'=>"<div class='vertical_align'></div><div class='dashboardmenu_item'><img src ='".Yii::app()->request->baseUrl."/images/email.png'/><br>Email Report</div>", 'url'=>array('email','id'=>$model->id), ));
			array_push($items,array('label'=>"<div class='vertical_align'></div><div class='dashboardmenu_item'><img src ='".Yii::app()->request->baseUrl."/images/print.png'/><br>Print Report</div>", 'url'=>array('print','id'=>$model->id), ));
			array_push($items,array('label'=>"<div class='vertical_align'></div><div class='dashboardmenu_item'><img src ='".Yii::app()->request->baseUrl."/images/uncommit.png'/><br>Uncommit</div>", 'url'=>'#', 'linkOptions'=>array('submit' => array('uncommit', 'id'=>$model->id), 'confirm' => 'Are you sure you want to uncommit this report?'),
			));
		}
		switch(Yii::App()->user->getState('userType'))
		{
			case user::TYPE_NORMAL:
				
				break;
			case user::TYPE_SUPERVISOR:
				$profile = Profile::model()->find('user_id=:user_id', array(':user_id'=>Yii::App()->user->id));
				$company=Company::model()->find('company_name=:company_name',array('company_name'=>$profile->company));
				if(isset($company)){
				array_push($items, array('label'=>"<div class='vertical_align'></div><div class='dashboardmenu_item'><img src ='".Yii::app()->request->baseUrl."/images/company.png'/><br>Manage Company</div>", 'url'=>array('/company/update','id'=>$company->id), ));
				}
				array_push($items, array('label'=>"<div class='vertical_align'></div><div class='dashboardmenu_item'><img src ='".Yii::app()->request->baseUrl."/images/manage users.png'/><br>Manage Users</div>", 'url'=>array('/user/admin'), ));
				array_push($items, array('label'=>"<div class='vertical_align'></div><div class='dashboardmenu_item'><img src ='".Yii::app()->request->baseUrl."/images/statistics.png'/><br>View Statistics</div>", 'url'=>array('/chart/view','id'=>25), ));
				
				break;
			case user::TYPE_BCARC:
				array_push($items, array('label'=>"<div class='vertical_align'></div><div class='dashboardmenu_item'><img src ='".Yii::app()->request->baseUrl."/images/statistics.png'/><br>View Statistics</div>", 'url'=>array('/chart/view','id'=>25), ));
				break;
			case user::TYPE_ADMIN:
				array_push($items, array('label'=>"<div class='vertical_align'></div><div class='dashboardmenu_item'><img src ='".Yii::app()->request->baseUrl."/images/statistics.png'/><br>View Statistics</div>", 'url'=>array('/chart/view','id'=>25), ));
				array_push($items, array('label'=>"<div class='vertical_align'></div><div class='dashboardmenu_item'><img src ='".Yii::app()->request->baseUrl."/images/company.png'/><br>Manage Company</div>", 'url'=>array('/company/index'), ));
				array_push($items, array('label'=>"<div class='vertical_align'></div><div class='dashboardmenu_item'><img src ='".Yii::app()->request->baseUrl."/images/CMS.png'/><br>CMS</div>", 'url'=>array('/category/admin'),));
				array_push($items, array('label'=>"<div class='vertical_align'></div><div class='dashboardmenu_item'><img src ='".Yii::app()->request->baseUrl."/images/admin.png'/><br>Admin</div>", 'url'=>array('/admin'),));
					break;
			default:
			
				break;
		}
		
			
	
			$this->widget('zii.widgets.CMenu',array(
					'items'=>$items,
					
					'encodeLabel'=>false,
			));
		 ?>

	</div><!-- header -->
<div id="mailer" style="display: hidden;"></div>