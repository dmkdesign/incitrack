<?php

class AutomailController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/admin';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('ajaxCreate', 'dynamicRadius'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update','manage','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','admin','create','view','RunAutomailer','Preview'),
				'users'=>UserModule::getAdmins(),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Automail;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Automail']))
		{
			$model->attributes=$_POST['Automail'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionDynamicRadius()
	{
		$data = null;
		if($_POST['Automail']['units']=='km')
		{
			$data = Automail::itemAlias('radiusOptionsKm');
		}
		else 
		{
			$data = Automail::itemAlias('radiusOptions');
		}
		foreach($data as $key=>$value)
		{
			echo CHtml::tag('option', array('value'=>$key),CHtml::encode($value),true);
		}
		
	}
	
	public function actionPreview($id)//id is project ID
	{
		$model=Leads::model()->findByPk($id);
		$automail = new Automail();
		$unit='mi';
		$lat=$model->lat;
		$lng=$model->lng;
		$dist=500;
		
		$builder=$automail ->getCommandBuilder();
		$table = $automail ->getTableSchema();
		if($unit == 'mi'){
		$command = $builder->createSqlCommand('CALL automailerimperial(
				:lat,
				:lng,
				:dist)',
				array(
						':lat' => $lat,
						':lng' => $lng,
						':dist' => $dist
				));
		}
		else {
			$command = $builder->createSqlCommand('CALL automailerimperial(
					:lat,
					:lng,
					:dist)',
					array(
							':lat' => $lat,
							':lng' => $lng,
							':dist' => $dist/1.6
					));
		}
		$i = 0;
		$data = $command->queryAll();
		
		$dataProvider = new CArrayDataProvider($data,
			array(
   				'id'=>'id',
    			'sort'=>array(
        			'attributes'=>array(
             			'id', 'userid', 'email','distance'
        			),
    			),
    			'pagination'=>array(
        			'pageSize'=>10,
    			),
			)
		);
		$this->render('preview',array(
				'model'=>$model,'dataProvider'=>$dataProvider
		));
	}
	
	public function actionRunAutomailer($id)//id is project ID
	{
		$roof=Leads::model()->findByPk($id);
	
		$automailer = new Automail();
		$results = $automailer->automail_notifications($roof->lat, $roof->lng, '500', 'mi', $id);
		echo "Success! ".$results.' notification(s) were sent.';
		Yii::app()->end();
	}
	
	public function actionAjaxCreate(){
		$model = new Automail();
		$model->attributes=$_POST['Automail'];
		$response = null;
		//calculate geolocation
		$totalAddress = trim($model->address);
		$totalAddress= str_replace(' ', '+',$totalAddress);
		$request= 'http://maps.googleapis.com/maps/api/geocode/json?address='.CHtml::encode($totalAddress).'&sensor=false';
	
		if(!Yii::app()->user->isGuest)
		{
			$model->user_id = Yii::app()->user->id;
			$user = User::model()->findByPk( Yii::app()->user->id);
			$model->email = $user->email;
			 
		}
		// Make the request
		$response = @file_get_contents($request);
		$jsonData = json_decode($response,true);
		if ($jsonData['status'] =='OK')
		{
				
			//use first return as this is almost always the best
			$model->lat = $jsonData['results']['0']['geometry']['location']['lat'];
	
			$model->lng = $jsonData['results']['0']['geometry']['location']['lng'];
			$model->active = 1;
			if($model->save())
			{
				$response = "You have been signed up!";
			}
			else
			{
				$response = "Please check your email.";
				foreach($model->errors as $error)
				{
					$response = $response.'<br>'.$error[0];
				}
			}
		}
		else
		{
			$response = "There was an error, please ensure that your address is in the format 'address, city, state/province'";
			$model->lat = 'error';
			$model->lng = 'error';
		}
		echo $response;
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Automail']))
		{
			$model->attributes=$_POST['Automail'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		
		$model=new Leads('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Leads']))
			$model->attributes=$_GET['Leads'];
		
		$sort = new CSort();
		$sort->attributes = array(
				'automailed'=>array(
						'asc'=>'automailed ASC',
						'desc'=>'automailed DESC',
				),
				'last_automail'=>array(
						'asc'=>'last_automail ASC',
						'desc'=>'last_automail DESC',
				),
				'*', // add all of the other columns as sortable
		);
		$dataProvider=new CActiveDataProvider('Automail');
		$this->render('index',array(
			'model'=>$model,'sort'=>$sort
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Automail('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Automail']))
			$model->attributes=$_GET['Automail'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionManage()
	{
		$this->layout='column1';
		$model=new Automail('search');
		$model->unsetAttributes();  // clear any default values
		$model->user_id= Yii::app()->user->id;
		if(isset($_GET['Automail']))
			$model->attributes=$_GET['Automail'];
	
		$this->render('manage',array(
				'model'=>$model,
		));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Automail::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='automail-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
