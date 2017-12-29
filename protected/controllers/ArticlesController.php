<?php

class ArticlesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/admin';
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
			
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view','create','update','admin','delete'),
				'users'=>Yii::app()->getModule('user')->getAdmins(),
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
		$model=new Articles;
		$graphic = new PictureUpload();
		$dir = Yii::getPathOfAlias('webroot.images');
		$uploaded = false;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Upload']))
		{
			$graphic->attributes = $_POST['pictureUpload'];
				
			//die();
			if($graphic->validate())
			{
				$file = CUploadedFile::getInstance($graphic,'file');
				$filename = $file->getName();
		
				$fileSavePath =  $dir.DIRECTORY_SEPARATOR.$filename;
				$uploaded = $file->saveAs($fileSavePath);
				if($uploaded)
					Yii::app()->user->setFlash('success','Your file was uploaded');
			}
		}
		else if(isset($_POST['Articles']))
		{
			$model->attributes=$_POST['Articles'];
			$p = new CHtmlPurifier();
			$p->options = array('URI.AllowedSchemes'=>array(
					'http' => true,
					'https' => true,),
					'Attr.EnableID'=>true,
					'HTML.EnableAttrID'=>true);
			$model->content = $p->purify($model->content);
			if($model->validate() && $model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,'graphic'=>$graphic
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$graphic = new PictureUpload();
		$dir = Yii::getPathOfAlias('webroot.images');
		$uploaded = false;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Upload']))
		{
			$graphic->attributes = $_POST['pictureUpload'];
				
			//die();
			if($graphic->validate())
			{
				$file = CUploadedFile::getInstance($graphic,'file');
				$filename = $file->getName();
		
				$fileSavePath =  $dir.DIRECTORY_SEPARATOR.$filename;
				$uploaded = $file->saveAs($fileSavePath);
				if($uploaded)
					Yii::app()->user->setFlash('success','Your file was uploaded');
			}
		}
		else if(isset($_POST['Articles']))
		{
			$model->attributes=$_POST['Articles'];
			
			$p = new CHtmlPurifier();
			$p->options = array('URI.AllowedSchemes'=>array(
					'http' => true,
					'https' => true,
			));
			$model->content = $p->purify($model->content);
			if($model->validate() && $model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		
		$this->render('update',array(
			'model'=>$model,'graphic'=>$graphic
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
		$dataProvider=new CActiveDataProvider('Articles');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Articles('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Articles']))
			$model->attributes=$_GET['Articles'];

		$this->render('admin',array(
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
		$model=Articles::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='articles-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
