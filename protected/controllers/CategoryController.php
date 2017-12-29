<?php

class CategoryController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='splash';

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
						'actions'=>array('view'),
						'users'=>array('*'),
				),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','update','create','admin','delete'),
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
		
		$model=$this->loadModel($id);
		$this->pageTitle = Yii::app()->name.' '.$model->title ;
		Yii::app()->clientScript->registerMetaTag($model->metadescription, 'description');
		Yii::app()->clientScript->registerMetaTag($model->metakeywords, 'keywords');
		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
	
		
		$model=new Category;
		$graphic = new PictureUpload();
		$saveImage = new Images();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Category']))
		{
			$model->attributes=$_POST['Category'];
			$p = new CHtmlPurifier();
			$p->options = array('URI.AllowedSchemes'=>array(
					'http' => true,
					'https' => true,
			));
			if($model->save()){//id not defined save to get id
				if($model->hasChildren == 0)
				{
					$model->menuLink = 'category/view&id='.$model->id;
				}
				else{
				$model->menuLink = $model->childName.'/index';
				}
			}
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',	compact('model','graphic','saveImage','images'));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{	$this->layout ='admin';
		$model=$this->loadModel($id);

		$images = new Images();
		$images->associate_id = $id;
		$images->category = Images::itemAlias('category_decode','category');
		$graphic = new PictureUpload();
		$saveImage = new Images();
		$dir = Yii::getPathOfAlias('webroot.images.category');
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
				$saveImage->filename = $filename;
				$saveImage->category = Images::itemAlias('category_decode','category');
				$saveImage->associate_id = 0;
				$saveImage->save();
				$fileSavePath =  $dir.DIRECTORY_SEPARATOR.$filename;
				$uploaded = $file->saveAs($fileSavePath);
				if($uploaded)
					Yii::app()->user->setFlash('success','Your file was uploaded');
				$this->render('update',array('model'=>$model,'graphic'=>$graphic,'saveImage'=>$saveImage));
			}
		}
		else if(isset($_POST['Category']))
		{
			$model->attributes=$_POST['Category'];
			if($model->hasChildren == 1)
			{
				$model->menuLink = $model->childName.'/index';
			}
			elseif($model->menuLink== "")
			{
				$model->menuLink = 'category/view&id='.$model->id;
			}		
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',compact('model','graphic','saveImage','images'));
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
		$dataProvider=new CActiveDataProvider('Category');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Category('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Category']))
			$model->attributes=$_GET['Category'];

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
		$model=Category::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='category-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
