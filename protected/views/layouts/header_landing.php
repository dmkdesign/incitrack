
<div id="header" height="90px"><div id="header-container">
		<div style="float:right; padding: 5px 0px 5px 0px; font-size:15px; margin-top:30px; "><a style="font-size:15px" href="index.php?r=site/about">About Gridbid</a>  &nbsp | &nbsp 
		<div style="color:#F7931E;display:inline-block;font-size:15px;line-height: 15px"> Questions? 1.855.474.3243
		 <img style="vertical-align:top;margin-left:2px; margin-top:1px" src='images/american_flag.png'/></div>  &nbsp | &nbsp
		 <?php if(!(Yii::App()->user->isGuest)): ?>Welcome: <?php echo CHtml::encode("You're logged in.")?> &nbsp |&nbsp 
		 <a href="index.php?r=/user/logout">Logout</a> <?php else: ?><div style="color:#F7931E; display:inline; font-size:15px; ">Have an account? </div>
		  <?php echo CHtml::submitButton('Log In', array('onclick'=>'javascript:location.href="index.php?r=user/login"', 'class'=>'btn', 'style'=>'margin-left:10px')); endif; ?></div> 
		  <div id="logo"><a href="index.php" ><img src="images/Logo.png" alt="Logo"/></a></div>
		<div id="mainmenu">
	
		<?php 
		function isItemActive ($route,$id)
		{
			//explode the route ($route format example: /site/contact)
			$menu = explode("/",$route);
		
			//compare the first array element to the $id passed
			foreach( $menu as $string)
			{
			 if ($string == $id )
			 	return true;
			}
			return false;
		}
		$userType = Yii::App()->user->getState('userType');
		/*
		if($userType == 'roof')
		{
			$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'My Projects', 'url'=>array('/roof/list&id='.Yii::App()->user->id), 'active'=> isItemActive ($this->route,'list')),
				array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest, 'active'=>isItemactive($this->route,'profile')),
			),		
			));
		}
		else
			*/if ($userType =='soco')
			{
			$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
						array('label'=>'Home', 'url'=>array('/site/index')),
						array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
						array('label'=>'Contact', 'url'=>array('/site/contact')),
						//array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				//array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
						array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
						array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),
						array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest),
				),
				));
			}
			elseif($userType == 'admin')
			{
				$this->widget('zii.widgets.CMenu',array(
						'items'=>array(
								array('label'=>'Home', 'url'=>array('/site/index')),							
								array('url'=>array('/user'), 'label'=>'Users', 'visible'=>!Yii::app()->user->isGuest),
								array('label'=>'Projects', 'url'=>array('/roof/admin')),
								array('label'=>'Bids', 'url'=>array('/bids/index')),
								array('label'=>'Auctions', 'url'=>array('/auctions/index')),
								array('label'=>'CMS', 'url'=>array('/articles/index')),
						),
				));
			}

		 ?>
	</div><!-- mainmenu -->
	</div><!-- headercontainer -->
	
	</div><!-- header -->