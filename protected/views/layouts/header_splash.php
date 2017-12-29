
<div id="header" >
	<div id="header-container">
		
		<div class="mainmenu_background" >
		<div id="mainmenu" >
	
		<?php 
		function isItemActive ($route,$id)
		{
			//explode the route ($route format example: /site/contact)
			//$menu = explode("r=",$route);
		
			//compare the first array element to the $id passed
			if(!(strpos($route,$id)===false))
			{
			 	return true;
			}
			return false;
		}
		function isCategoryActive ($url,$id)
		{
		
		
				
			//compare the first array element to the $id passed
			if (strpos($url,$id)!=false){
				return true;
			}
			return false;
		}
		$criteria = new CDbCriteria();
		$criteria->condition = "menuVisible =1 AND isVisible=1";
		$criteria->order ="sortOrder ASC";
			
		$menuItems = Category::model()->findAll($criteria);
		$items = array();//array('label'=>'Home', 'url'=>array('/site/index')),
			
		if (isset($_GET['id']))
		{
			$params = array('id'=>$_GET['id']);
		}
		else
		{
			$params = array();
		}
		$url=$this->createUrl($this->route,$params);
		foreach ($menuItems as $menuItem)
		{
		
			$item= array('label'=>$menuItem->menuText, 'url'=>array('/'.$menuItem->menuLink),'active'=>isCategoryActive($url,$menuItem->menuLink));
			array_push($items, $item);
		}
		
		
		array_push($items,	array('url'=>'http://www.bcarc.ca', 'label'=>"BCARC", ));
		array_push($items,	array('url'=>'/report/report/index', 'label'=>"Reports", 'visible'=>!yii::app()->user->isGuest));
		
			$this->widget('zii.widgets.CMenu',array(
					'items'=>$items,
			));
		 ?><div class="welcome_banner">
		 <?php if(!(Yii::App()->user->isGuest)): ?> <?php echo CHtml::encode("Welcome: ".UserModule::user()->profile->firstname)?> &nbsp |&nbsp 
		 <a href="index.php?r=/user/logout">Logout</a> <?php else: ?><div style="color:#F7931E; display:inline; font-size:15px; ">Have an account? </div>
		  <?php echo CHtml::submitButton('Log In', array('onclick'=>'javascript:location.href="index.php?r=user/login"', 'class'=>'btn', 'style'=>'margin-left:10px')); endif; ?>
		  </div> 
		
	
	
		 
	</div><!-- mainmenu -->
	</div><!-- mainmenu banner-->
	<div id="logo" class="clear-fix"><a href="" >
		<img src="images/Logo.png" alt="Logo"/></a></div>
	</div><!-- header_container-->	
	<div class='hazard'></div>
	</div><!-- header -->
