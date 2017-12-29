<?php

class LoginController extends Controller
{
	public $defaultAction = 'login';

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		if (Yii::app()->user->isGuest) {
			$model=new UserLogin;
			// collect user input data
			if(isset($_POST['UserLogin']))
			{
				$model->attributes=$_POST['UserLogin'];
				// validate user input and redirect to previous page if valid
				if($model->validate()) {
					$this->lastViset();
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
					if (strpos(Yii::app()->user->returnUrl,'/index.php')!==false)
						$this->redirect(Yii::app()->controller->module->returnUrl);
					else
						$this->redirect(Yii::app()->user->returnUrl);
				}
			}
			// display the login form
			$this->render('/user/login',array('model'=>$model));
		} else
			$this->redirect(Yii::app()->controller->module->returnUrl);
	}
	
	private function lastViset() {
		$lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
		$lastVisit->lastvisit = time();
		$lastVisit->save();
	}

}