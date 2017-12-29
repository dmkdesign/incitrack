<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{/*
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//add meta tags
		$keywords = Articles::model()->find("framecode = 'metaKeywordsLanding'");
		if(isSet($keywords))
		Yii::app()->clientScript->registerMetaTag($keywords->content, 'keywords');
		
		$description = Articles::model()->find("framecode = 'metaDescriptionLanding'");
		if(isSet($description))
		Yii::app()->clientScript->registerMetaTag($description->content, 'description');
		
		
		$model= new LoginForm;
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
			{
				$profile = new Profile();
				$profile = $profile->find('user_id=:user_id', array(':user_id'=>Yii::App()->user->id));
				Yii::App()->user->setState('userType',$profile->userType);
				$this->redirect(Yii::app()->user->returnUrl);
				
			}
		}
		$loginDiv = null;//$this->renderPartial('login', array('model'=>$model),true);
		
		if(Yii::App()->user->isGuest)
		{
			$this->layout = 'splash';
		}
		$this->render('landing',array('model'=>$model, 'loginDiv'=>$loginDiv));
		*/
		if(!Yii::app()->user->isGuest)
	{
		$this->redirect(Yii::app()->user->returnUrl);
	}
		$this->forward('site/landing');
	}
	
	public function actionWizard()
	{
		$this->layout = 'wizard';
		$this->render('wizard');
	}
	public function actionAbout()
	{
		$keywords = Articles::model()->find("framecode = 'metaKeywordsABout'");
		if(isSet($keywords))
			Yii::app()->clientScript->registerMetaTag($keywords->content, 'keywords');
		
		$description = Articles::model()->find("framecode = 'metaDescriptionAbout'");
		if(isSet($description))
			Yii::app()->clientScript->registerMetaTag($description->content, 'description');
		
		$title = Articles::model()->find("framecode = 'metaTitleAbout'");
		if(isSet($title))
		{
			$this->pageTitle = $title->content;
		}
		if(Yii::app()->user->isGuest)
		{			
		$this->layout ='NoMenu';
		}
		else
		{
			$this->layout='about_column1';
		}
		$this->render('about');
	}
	public function actionMap()
	{
		
		$this->render('demo');
	}

	public function actionLanding()
	{	
		//add meta tags
		$keywords = Articles::model()->find("framecode = 'metaKeywordsLanding'");
		if(isSet($keywords))
			Yii::app()->clientScript->registerMetaTag($keywords->content, 'keywords');
		
		$description = Articles::model()->find("framecode = 'metaDescriptionLanding'");
		if(isSet($description))
			Yii::app()->clientScript->registerMetaTag($description->content, 'description');
	
		$model= new LoginForm;
		$loginDiv = null;//$this->renderPartial('login', array('model'=>$model),true);
		$this->layout = 'splash';
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			if($model->validate() && $model->login())
			{
				$profile = new Profile();
				$profile = $profile->find('user_id=:user_id', array(':user_id'=>Yii::App()->user->id));
				Yii::App()->user->setState('userType',$profile->userType);
				switch($profile->userType)
				{
					case User::TYPE_SUPERVISOR:
					case User::TYPE_NORMAL:
						Yii::App()->user->setReturnUrl('index.php?r=report/report/admin');
						break;
					case User::TYPE_BCARC:
						Yii::App()->user->setReturnUrl('index.php?r=analytics/index');
						break;
					case User::TYPE_ADMIN:
						Yii::App()->user->setReturnUrl('index.php?r=admin');
						break;
					default:
						//do nothing
						break;
				}
				$this->redirect(Yii::app()->user->returnUrl);
				
			}
		}
		$this->render('landing',array('model'=>$model, 'loginDiv'=>$loginDiv));

	}
	
	

		
	

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		
		//add meta tags
		$keywords = Articles::model()->find("framecode = 'metaKeywordsContactUs'");
		if(isSet($keywords))
		Yii::app()->clientScript->registerMetaTag($keywords->content, 'keywords');
		
		$description = Articles::model()->find("framecode = 'metaDescriptionContactUs'");
		if(isSet($description))
		Yii::app()->clientScript->registerMetaTag($description->content, 'description');
		
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				sendMailPear(Yii::app()->params['adminEmail'],$model->subject,$headers."\r\n".$model->body);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;
		$loginDiv = $this->renderPartial('login', array('model'=>$model),true);



		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
			{
				$profile = new Profile();
				$profile = $profile->find('user_id=:user_id', array(':user_id'=>Yii::App()->user->id));
				Yii::App()->user->setState('userType',$profile->userType);
				switch($profile->userType)
				{
					case 'roof':
						$this->redirect('index.php?r=roof/index');
						break;
					case 'soco':
						$this->redirect('index.php?r=bids/index & id='.Yii::App()->user->id);
						break;
					default:
						$this->redirect('index.php?r=roof/admin');
						break;
				}
				
			}
		}
		// display the login form
		$this->layout = 'SplashLayout';
		$this->render('landing',array('model'=>$model, 'loginDiv'=>$loginDiv));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionTandC()
	{
		$this->render('TandC');
	}
}


require_once "Mail/Mail.php";
/**
*send mail with PEAR
*/
function sendMailPear($email, $subject, $message)
 {
	 require_once "Mail.php";
  $from = "GridBid <contact@dmkddesign.ca>";
 $to = $email;
 $body = $message;
 
 $host = "ssl://smtp.gmail.com";
 $username = "support@gridbid.com";
 $password = "701gridbid";
 $port = '465';
 
 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'auth' => true,
	 'port' => $port,
     'username' => $username,
     'password' => $password));
 
 $mail = $smtp->send($to, $headers, $body);
 
 if (PEAR::isError($mail)) {
   Yii::app()->user->setFlash('error', "An email was trying to be sent to ".$email." but failed.");
  }
  else
  {
   
  }

 }
 
