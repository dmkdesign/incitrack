
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
		$items =
		array(
				array('label'=>'About Incitrack', 'url'=>array('/category/view','id'=>'about'), ),
				array('url'=>'http://www.bcarc.ca', 'label'=>"BCARC", ));
		
		
			$this->widget('zii.widgets.CMenu',array(
					'items'=>$items,
			));
		 ?><?php /*  <divclass="welcome_banner">
		 <?php if(!(Yii::App()->user->isGuest)): ?> <?php echo CHtml::encode("Welcome: ".UserModule::user()->profile->firstname)?> &nbsp |&nbsp 
		 <a href="index.php?r=/user/logout">Logout</a> <?php else: ?><div style="color:#F7931E; display:inline; font-size:15px; ">Have an account? </div>
		  <?php echo CHtml::submitButton('Log In', array('onclick'=>'javascript:location.href="index.php?r=user/login"', 'class'=>'btn', 'style'=>'margin-left:10px')); endif; ?>
		  </div> 
		*/ ?>
	
	
		 
	</div><!-- mainmenu -->
	</div><!-- mainmenu banner-->
	<div id="logo" class="clear-fix"><a href="
		<?php 
		switch(Yii::App()->user->getState('userType'))
		{
			case user::TYPE_NORMAL:
				echo CHtml::encode('index.php?r=report/report/index');
				break;
			case user::TYPE_SUPERVISOR:
				echo CHtml::encode('index.php?r=soco/index');
				break;
			case user::TYPE_BCARC:
				echo CHtml::encode('index.php?r=admin');
				break;
				case user::TYPE_ADMIN:
					echo CHtml::encode('index.php?r=admin');
					break;
			default:
				echo CHtml::encode('index.php?');
				break;
		}
		?>" >
		<img src="images/Logo.png" alt="Logo"/></a></div>
	</div><!-- header_container-->	
	<div class='hazard'></div>
	</div><!-- header -->
