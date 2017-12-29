<?php

class ReportController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

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
			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','review','wizard','dynamicDays','admin','saveExit','verify','commit','ajaxUpdate'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete','uncommit'),
				'users'=>array_merge(UserModule::getAdmins(),UserModule::getSupervisors())
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
	public function actionReview($id)
	{
		$pages = Page::model()->findAll(array('order'=>'sequence ASC'));//this needs to be get all pages sort them and take
		$model = $this->loadModel($id);
		$readyToCommit = false;
		if($model->validate())
		if(isset($_POST['Report']))
		{
			$model->attributes=$_POST['Report'];
			$model=$this->serialize($model); 
			if($model->validate())
			{
				//set a success message
				$model->save();
				$this->redirect(array('view','id'=>$model->id));
			}
		}
		$this->render('Review',array(
				'model'=>$model,'pages'=>$pages, 'readyToCommit'=>$readyToCommit
		));
	}
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->layout='//layouts/column1_report';
		$pages = Page::model()->findAll(array('order'=>'sequence ASC'));//this needs to be get all pages sort them and take
		$this->render('view',array(
			'model'=>$this->loadModel($id),'pages'=>$pages
		));
	}
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionUpdate($id)
	{	
		$this->layout='//layouts/wizard';
		$model=$this->loadModel($id);
		//$model = $this->unserialize($model); //convert text to array for multiple choice attributes load model does it
		$formcomplete=false;
		unset(Yii::app()->session['validationcheck']);
		//$model = $this->unserialize($model); //convert multiple choice text to array
		$pages = Page::model()->findAll(array('order'=>'sequence ASC'));//this needs to be get all pages sort them and take 
		$pageId=1;
		$currentPage=Page::model()->with('questions:forOwner')->findByPk($pageId);

		
		$questions = $currentPage->questions;
		
		$model->scenario='page1';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		
		$this->render('wizard',	compact('model','questions','currentPage','pages','formcomplete'));
		
	}
	
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$this->layout='//layouts/wizard';
		$this->menu=array(
				array('label'=>'Report Wizard', 'url'=>'','active'=>true),
				array('label'=>'Manage My Reports', 'url'=>array('admin')),
		);
		//setup new report
		$model=new Report;
		$formcomplete=false;
		$model->ownerId = Yii::app()->user->getId();
		$profile = Profile::model()->findByPk(Yii::app()->user->id);
		if (isset($profile))
		{
			if(isset($profile->company))
			{
				$model->company=$profile->company;
			}
			if (isset($profile->branch))
				$model->branch=$profile->branch;
				
		}
		unset(Yii::app()->session['validationcheck']);
		//$model = $this->unserialize($model); //convert multiple choice text to array
		$pages = Page::model()->findAll(array('order'=>'sequence ASC'));//this needs to be get all pages sort them and take 
		$pageId=1;
		$currentPage=Page::model()->with('questions:forOwner')->findByPk($pageId);

		
		$questions = $currentPage->questions;
		
		$model->scenario='page1';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		
		$this->render('wizard',	compact('model','questions','currentPage','pages','formcomplete'));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionWizard($id,$nextPageId,$currentId)
	{
		$this->layout='//layouts/wizard';
		$formcomplete;
		if($id>0)
		{
			$model=$this->loadModel($id);
			//$model=$this->explode($model);
		}
		else
		{
			$model=new Report;
			$model->ownerId = Yii::app()->user->getId();
		}
		$this->menu=array(
				array('label'=>'Report Wizard', 'url'=>'','active'=>true),
				array('label'=>'Review Report', 'url'=>array('view', 'id'=>$model->id)),
				array('label'=>'Manage My Reports', 'url'=>array('admin')),
		);
		
		//$model = $this->unserialize($model); //convert multiple choice text to array
		$pages = Page::model()->findAll(array('order'=>'sequence ASC'));//this needs to be get all pages sort them and take
		
		if($model->status ==Report::COMMIT){
			$model->scenario='commitpage'.$currentId;
		}
		else{
			$model->scenario='page'.$currentId;
		}
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	
		if(isset($_POST['Report']))
		{
			if(isset ($_POST['verify']))
			{
				$this->actionVerify($id,$nextPageId);
				return;
			}
			if(isset ($_POST['saveexit']))
			{
				$this->actionSaveExit($id);
				return;
			}
			if(isset ($_POST['commit']))
			{
				$this->actionCommit($id,$currentId);
				return;
			}
			if($model->status ==Report::COMMIT){
				$model->scenario='commitpage'.$currentId;
			}
			else{
				$model->scenario='page'.$currentId;
			}
			$model->attributes=$_POST['Report'];
			$validationcheck = $this->checkvalidation($model,$currentId);
			//reset scenario
			/*
			if($model->status ==Report::COMMIT){
				$model->scenario='commitpage'.$currentId;
			}
			else{
				$model->scenario='page'.$currentId;
			}*/
			$formcomplete = true;
			foreach($pages as $page){
				if($validationcheck["page".$page->id]['prelim']==true && $validationcheck["page".$page->id]['commit']==true&& $formcomplete==true)
					$formcomplete = true;
				else {
					$formcomplete = false;
				}
			}
			//end of wizard
			if($nextPageId>count($pages))
			{
				$model=$this->serialize($model); //convert multiple choice atrributes to text
				$model->status=Report::COMMIT;
				$model->save();
				$pages = Page::model()->findAll(array('order'=>'sequence ASC'));//this needs to be get all pages sort them and take
				
				
			
				if($formcomplete == true)
				{
					unset(Yii::app()->session['validationcheck']);
					$this->redirect(array('review','id'=>$model->id));
				}
				else
				{	//model didn't save. Next page not valid.
					$pageId = $currentId;
					$model = $this->unserialize($model); //convert multiple choice text to array
					$page=Page::model()->findByPk($pageId);
					$questions = $page->questions();
					$model->scenario='commitpage'.$currentId;
					$model->validate(); //validate curentpage
					Yii::app()->user->setFlash('error', "You are missing some required fields.  Please check for red indicators on the page tabs!");
					//$this->render('update',	compact('model','questions','pageId','pages'));
				}
			}	
			//not comitting
			else{
				//go to next page
				if($model->validate())
				{
					$model=$this->serialize($model);
					$model->save();
					$model = $this->unserialize($model); //convert multiple choice text to array
					
					
					$pageId = $nextPageId;
									
					if($model->status ==Report::COMMIT){
						$model->scenario='commitpage'.$nextPageId;
					}
					else{
						$model->scenario='page'.$nextPageId;
					}
					
					 //convert multiple choice atrributes to text
					
					$model->validate(); //check next page
					
				}
				else//failed validation
				{	
					
					$pageId = $currentId;
					$validationcheck = $this->checkvalidation($model,$pageId);
					//$this->redirect(array('wizard', 'id'=>$id, 'nextPageId'=>$currentId , 'currentId'=>$currentId));
					
				}
			}
		}
		else {
			$pageId = $nextPageId;
			$validationcheck = $this->checkvalidation($model,$pageId);
		}
		
		
		
		$currentPage=Page::model()->with('questions:forOwner')->findByPk($pageId);
		$questions = $currentPage->questions();
		
		$this->render('wizard',	compact('model','questions','currentPage','pages','validationcheck','formcomplete'));
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate1($id)
	{
		$model=$this->loadModel($id);
		$pages = Page::model()->findAll(array('order'=>'sequence ASC'));//this needs to be get all pages sort them and take
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		//if fields are SELECT of RADIO
		//$model = $this->explode($model);//added an after find function
		if(isset($_POST['Report']))
		{
			$model->attributes=$_POST['Report'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,'pages'=>$pages
		));
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionSaveExit($id)
	{
		$model=$this->loadModel($id);
		
		if(isset($_POST['Report']))
		{	
			$model->attributes=$_POST['Report'];
			$model=$this->serialize($model);
			$model->save();
			$this->redirect(array('view','id'=>$model->id));
		}
	
		
	}
	/**
	 * validates the report and notifies user of missing fields. Sets to commitable if all fields pass the test.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionVerify($id,$currentId)
	{
		$this->layout='//layouts/wizard';
		$model=$this->loadModel($id);
		$pages = Page::model()->findAll(array('order'=>'sequence ASC'));//this needs to be get all pages sort them and take
		if(isset($_POST['Report']))
		{
			$model->attributes=$_POST['Report'];
			if($model->status==Report::COMMIT)
			{
				$model->status=Report::PRELIMINARY;
			}
			elseif($model->status==Report::PRELIMINARY)
			{
				$model->status=Report::COMMIT;
			}
			
			//save model with no scenario so it doesn't fail on save
			$model->scenario='';
			$model=$this->serialize($model);
			$model->save();
			$model=$this->unserialize($model);
			$validationcheck = $this->checkvalidation($model,'page'.$currentId);
			//reset scenario to current page
			
			$formcomplete=true;
			foreach($pages as $page){
				if($validationcheck["page".$page->id]['prelim']==true && $validationcheck["page".$page->id]['commit']==true&&$formcomplete==true)
					$formcomplete = true;
				else {
					$formcomplete = false;
				}
			}
			
		}		
		$currentPage=Page::model()->with('questions:forOwner')->findByPk($currentId);
		$questions = $currentPage->questions();
		$this->render('wizard',array('model'=>$model,'questions'=>$questions,'currentPage'=>$currentPage,'pages'=>$pages,'validationcheck'=>$validationcheck,'formcomplete'=>$formcomplete,));
		return;
	}
	
	/**
	 * validates the report and commits the report. Sets to commitable if all fields pass the test.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionCommit($id,$currentId)
	{
		$this->layout='//layouts/wizard';
		$model=$this->loadModel($id);
		$pages = Page::model()->findAll(array('order'=>'sequence ASC'));//this needs to be get all pages sort them and take
		//$model=$this->unserialize($model);
		if(isset($_POST['Report']))
		{
			$model->attributes=$_POST['Report'];
			
			
			
			//reset scenario to current page
			
			$validationcheck = $this->checkvalidation($model,'page'.$currentId);
			$formcomplete=true;
			foreach($pages as $page){
				if($validationcheck["page".$page->id]['prelim']==true && $validationcheck["page".$page->id]['commit']==true&&$formcomplete==true)
					$formcomplete = true;
				else {
					$formcomplete = false;
				}
			}
			if($formcomplete ==true)
			{
				unset(Yii::app()->session['validationcheck']);
				$model->status=Report::COMMITTED;
				$model=$this->serialize($model);
				$model->save();
				
				$this->redirect(array('view','id'=>$model->id));
			}
			$model->validate();
		
		}
		$currentPage=Page::model()->with('questions:forOwner')->findByPk($currentId);
		$questions = $currentPage->questions();
		$this->render('wizard',array('model'=>$model,'questions'=>$questions,'currentPage'=>$currentPage,'pages'=>$pages,'validationcheck'=>$validationcheck,'formcomplete'=>$formcomplete,));
		return;
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUncommit($id)
	{
		
		$model=$this->loadModel($id);
	
		$model=$this->serialize($model);
		$model->status= Report::COMMIT;
		$model->save();
		$this->redirect(array('view','id'=>$model->id));
	
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
		$dataProvider=new CActiveDataProvider('Report');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Report('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Report']))
			$model->attributes=$_GET['Report'];

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
		$model=Report::model()->findByPk($id);
		
	
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		
		$model = $this->unserialize($model); //convert multiple choice text to array
		if($model->status==Report::COMMIT)
			$model->setScenario('commit');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='report-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	protected function serialize($model)
	{
		$questions=Question::model()->findAll();
		foreach($questions as $question)
		{
				$varname = $question->varname;
				if($question->field_type =='SELECT')
				{
					
					if(isset($_POST['Report'][$varname]))
					{
						
						$model->$varname =serialize($_POST['Report'][$varname]);
					}
					elseif(isset($model->$varname))
					{
						$model->$varname =serialize($model->$varname);
					}
				}
				if($question->field_type =='RADIO')
				{
					if(isset($_POST['Report'][$varname]))
					{
					
						$model->$varname =$_POST['Report'][$varname];
					}
				}/*
				if($question->field_type =='DATETIME')
				{
					if(isset($_POST['Report'][$varname]))
					{
						$date = $_POST['Report'][$varname];
						$newDate = DateTime::createFromFormat('Y-m-d H:i:s', $date);
						$model->$varname = $newDate;
						
					}
				}*/
		}
			
		return $model;
	}
	
	protected function unserialize($model)
	{
		$questions=Question::model()->findAll();
		foreach($questions as $question){
			if($question->field_type =='SELECT')
			{
				if($model->getAttribute($question->varname)!='')
				{
					$varname = $question->varname;
					$model->$varname = @unserialize($model->getAttribute($question->varname));
				}
			}
			/*
			if($question->field_type =='DATETIME')
			{
				if($model->getAttribute($question->varname)!='')
				{
					$varname = $question->varname;
					$newDate = $model->getAttribute($question->varname);
					
					$model->$varname = $newDate->format('Y-m-d H:i:s');
			
				}
			}*/
		}
		return $model;
	}
	protected function checkvalidation($model,$currentPageId)
	{
		
		$rules = array();
		$pages = Page::model()->findAll(array('order'=>'sequence ASC'));//this needs to be get all pages sort them and take
		if (!isset(Yii::app()->session['validationcheck']) || count(Yii::app()->session['validationcheck'])==0)
		{
			foreach($pages as $page){
				$status=array("prelim"=>false,"commit"=>false,"visited"=>false);
				$validationcheck['page'.$page->id]=$status;
			}
		}
		else{
			$validationcheck = Yii::app()->session['validationcheck'];
		}
		//set current page to visited
		$validationcheck["page".$currentPageId]['visited']= true;
		foreach($pages as $page){
			
			$model->scenario="page".$page->id;
			if($model->validate())
			{
				$validationcheck["page".$page->id]["prelim"]=true;
			}
			else 
				{
					$validationcheck["page".$page->id]["prelim"]=false;
				}
			$model->scenario="commitpage".$page->id;
			if($model->validate())
			{
				$validationcheck["page".$page->id]["commit"]=true;
			}
			else
			{
				$validationcheck["page".$page->id]["commit"]=false;
			}
			
		}
		
		Yii::app()->session['validationcheck']=$validationcheck;
		//reset scenario to current page
		if($model->status ==Report::COMMIT){
			$model->scenario='commitpage'.$currentPageId;
		}
		else{
			$model->scenario='page'.$currentPageId;
		}
		$model->validate();
		return $validationcheck;
	}
	public function actionDynamicDays($monthField,$dayField)
	{
		$model=new Report;
		$data =$model->getDays($_POST[$monthField]);
	
		foreach($data as $key=>$value)
		{
			if($value === $_POST[$dayField])
			{
				echo CHtml::tag('option', array('value'=>$key, 'selected'=>'selected'),CHtml::encode($value),true);
			}
			else
			{
				echo CHtml::tag('option', array('value'=>$key),CHtml::encode($value),true);
			}
		}
	}
}
