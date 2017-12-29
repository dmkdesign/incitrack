<?php

class ChartController extends Controller
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
				'actions'=>array('index','view','ajaxUpdate'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('create','update','admin','delete'),
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
		$chart = $this->loadModel($id);
		
		$options=
		array(
		
				'scripts' => array(
						'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
						'modules/exporting', // adds Exporting button/menu to chart
						'themes/grid-light'        // applies global 'grid' theme to all charts
				),
				'options' => array(
		
						'title' => array('text' =>$chart->chartTitle),
						/*'xAxis' => array(
						 'categories' => $data['xaxis'],
						),*/
						'yAxis' => array(
								'title' => array('text' => '# of incidents'),
								'allowDecimals'=>false,
						),
						//'colors'=>array('#0563FE', '#6AC36A', '#FFD148', '#FF2F2F'),
						'gradient' => array('enabled'=> true),
						'credits' => array('enabled' => false),
						/*'exporting' => array('enabled' => false),*/ //to turn off exporting uncomment
						'chart' => array(
								'plotBackgroundColor' => '#ffffff',
								'plotBorderWidth' => null,
								'plotShadow' => false,
								'height' => 400,
								'type'=>Chart::itemAlias('chartType',$chart->chartType)
						),
						
						'tooltip' => array(
								'pointFormat' => '{series.name}: <b>{point.y}</b>',
								'percentageDecimals' => 1,
						),
		
						'plotOptions'=>array(
								'pie'=>array('dataLabels'=>array('distance'=>-30,'color'=>'black', 'format'=>'<b>{point.name}</b>:<br> {point.percentage:.1f} %',),'showInLegend'=>true),
								'column'=>array('dataLabels'=>array('distance'=>-30,'color'=>'black', 'formatter'=>"js:function(){return this.series.name +':<b>'+ this.point.y+'</b>';}",'enabled'=>false),),
						),
						/*'series' => $data['data'],array(
						 array('type'=>$model->chartType,'name' => $model->label, 'data' => $series,
						 			
						 ),
						)*/
				));
		if(Yii::App()->user->getState('userType')==User::TYPE_ADMIN)
		{
			$this->layout='admin';
		}
		
		
		$question = Question::model()->findByPk($chart->q_id);
		$profile = Profile::model()->findByPk(Yii::app()->user->id); //will need to limit access depending on user type
		$criteria = new CDbCriteria;
		
		switch(Yii::app()->user->getState('userType')){
			case user::TYPE_SUPERVISOR:
		
		
				$criteria->join ='INNER JOIN (
				SELECT user_id
				from tbl_Profiles
				Where company = "'.$profile->company.'") te on te.user_id = t.ownerId';
				//$criteria->compare('id',$this->id);
				break;
		
			case user::TYPE_ADMIN:
				//$criteria->compare('id',$this->id);
				//do nothing admin should see all
				break;
			default:
				$criteria->compare('ownerId',Yii::app()->user->id);
				$criteria->compare('id',$this->id);
				break;
		}
		$criteria->compare('status',Report::COMMITTED);
	
		$choices = Choices::model()->findAll(
					array('order' => 'position', 'condition'=>'question ='.$question->id));
//TODO: Add	time criteria	
		if(isset($_POST['filter']))
		{
			//$criteria->addBetweenCondition("Date",$datestart,$dateend);
		}
		$records=Report::model()->findAll($criteria);
		
		
		switch($chart->customView)
		{
			
			case 'monthlyTrend':
				$series= array('January'=>0, 'February'=>0,'March'=>0,'April'=>0,'May'=>0,'June'=>0,'July'=>0,'August'=>0,'September'=>0,'October'=>0,'November'=>0,'December'=>0);
				$data = array();
				foreach ($records as $record)
				{
					$varname = $question->varname;
						
					$answer = $record->$varname;
					$timestamp = strtotime($answer);
					$year=-1;
					$year=date('Y',$timestamp);
					if(!array_key_exists($year,$data))
					{
						$data[$year]=$series;
					}
					$day=-1;
					$month=date('n',$timestamp);
					switch ($month)
					{
						case 1;
							$data[$year]['January']++;
							break;
						case 2:
							$data[$year]['February']++;
							break;
						case 3:
							$data[$year]['March']++;
							break;
						case 4:
							$data[$year]['April']++;
							break;
						case 5:
							$data[$year]['May']++;
							break;
						case 6:
							$data[$year]['June']++;
							break;
						case 7:
							$data[$year]['July']++;
							break;
						case 8:
							$data[$year]['August']++;
							break;
						case 9:
							$data[$year]['September']++;
							break;
						case 10:
							$data[$year]['October']++;
							break;
						case 11:
							$data[$year]['November']++;
							break;
						case 12:
							$data[$year]['December']++;
							break;
					}
				}
				break;
			case 'dayOfWeek':
				$series= array('Sunday'=>0, 'Monday'=>0,'Tuesday'=>0,'Wednesday'=>0,'Thursday'=>0,'Friday'=>0,'Saturday'=>0);
				$data = array();
				foreach ($records as $record)
				{
					$varname = $question->varname;
					
					$answer = $record->$varname;
					$timestamp = strtotime($answer);
					$year=-1;
					$year=date('Y',$timestamp);
					if(!array_key_exists($year,$data))
					{
						$data[$year]=$series;
					}
					$day=-1;
					$day=date('N',$timestamp);
					switch ($day)
					{
						case 7;
							$data[$year]['Sunday']++;
							break;
						case 1:
							$data[$year]['Monday']++;
							break;
						case 2:
							$data[$year]['Tuesday']++;
							break;
						case 3:
							$data[$year]['Wednesday']++;
							break;
						case 4:
							$data[$year]['Thursday']++;
							break;
						case 5:
							$data[$year]['Friday']++;
							break;
						case 6:
							$data[$year]['Saturday']++;
							break;
					}
				}
				break;
			case 'timeOfDay':
				$series= array('7 to 9 AM'=>0, '9 to 12PM'=>0,'12-3PM'=>0,'3 to 6PM'=>0,'6 to 7 AM'=>0);
				$data = array();
				foreach ($records as $record)
				{
					$varname = $question->varname;
						
					$answer = $record->$varname;
					$timestamp = strtotime($answer);
					$year=-1;
					$year=date('Y',$timestamp);
					if(!array_key_exists($year,$data))
					{
						$data[$year]=$series;
					}
					$hour=-1;
					$hour=date('H',$timestamp);
					$minute=-1;
					$minute=date('m',$timestamp);
					$time = $hour+$minute/60;
					if($time >=7 && $time<= 9){
						
						$data[$year]['7 to 9 AM']++;
					}
					elseif($time >9 && $time<= 12)
					{
							$data[$year]['9 to 12PM']++;
					}
					elseif($time >12 && $time<= 15)
					{
						$data[$year]['12-3PM']++;
					}
					elseif($time >15 && $time<= 18)
					{
						$data[$year]['3 to 6PM']++;
					}
					else 
						$data[$year]['6 to 7 AM']++;
					
						
				}
				break;
			case 'areaInjured':
				
				$data = array();
				$questionHead = Question::model()->find(array('condition'=>'varname ="bodyPartHead"'));
				$choicesHead = Choices::model()->findAll(
				array('order' => 'position', 'condition'=>'question ='.$questionHead->id));
				$questionUpperBody = Question::model()->find(array('condition'=>'varname ="bodyPartUpperBody"'));
				$choicesUpperBody = Choices::model()->findAll(
						array('order' => 'position', 'condition'=>'question ='.$questionUpperBody->id));
				$questionLowerBody = Question::model()->find(array('condition'=>'varname ="bodyPartLowerBody"'));
				$choicesLowerBody = Choices::model()->findAll(
						array('order' => 'position', 'condition'=>'question ='.$questionLowerBody->id));
				//build axis for drill down
				$xAxisHead = array();
				foreach ($choicesHead as $choice)
				{
					$xAxisHead[]=$choice->text;
				}
				$xAxisUpperBody = array();
				foreach ($choicesUpperBody as $choice)
				{
					$xAxisUpperBody[]=$choice->text;
				}
				
				$xAxisLowerBody = array();
				foreach ($choicesLowerBody as $choice)
				{
					$xAxisLowerBody[]=$choice->text;
				}
				//main X-axis
				$xAxis=array('Head','Upper Body','Lower Body');
				$series = array('Head'=>0,'Upper Body'=>0,'Lower Body'=>0);
				foreach ($records as $record)
				{
					
			
					$bodyPartHead= unserialize($record->bodyPartHead);
					$bodyPartUpper= unserialize($record->bodyPartUpperBody);
					$bodyPartLower= unserialize($record->bodyPartLowerBody);
					$timestamp = strtotime($record->dateIncident);
					$year=-1;
					$year=date('Y',$timestamp);
					if(!array_key_exists($year,$data))
					{
						$data[$year]=$series;
					}
					if(is_array($bodyPartHead)&& count($bodyPartHead)>0)
					{
						foreach($bodyPartHead as $entry)//entry will be id of choice
						{
							$choice = Choices::model()->findByPk($entry);
							if(in_array($choice->text,$xAxisHead))
							{
								$data[$year]['Head']++;
							
							}
							
						}
					}
					if(is_array($bodyPartUpper)&& count($bodyPartUpper)>0)
					{
						foreach($bodyPartUpper as $entry)//entry will be id of choice
						{
							$choice = Choices::model()->findByPk($entry);
							if(in_array($choice->text,$xAxisUpperBody))
							{
								$data[$year]['Upper Body']++;
					
							}
					
						}
					}	
					if(is_array($bodyPartLower)&& count($bodyPartLower)>0)
					{
						foreach($bodyPartLower as $entry)//entry will be id of choice
						{
							$choice = Choices::model()->findByPk($entry);
							if(in_array($choice->text,$xAxisLowerBody))
							{
								$data[$year]['Lower Body']++;
					
							}
					
						}
					}			
			
				}
	
				break;
			case 'typeHazard':
					
				$data = array();
				$question = Question::model()->find(array('condition'=>'varname ="typeHazard"'));
				$choices = Choices::model()->findAll(
						array('order' => 'position', 'condition'=>'question ='.$question->id));
				
				//build axis for drill down
				$xAxis = array();
				foreach ($choices as $choice)
				{
					$xAxis[]=$choice->text;
				}
				
				//main X-axis
				
				$series = array();
				foreach ($records as $record)
				{
			
			
					$answer= unserialize($record->typeHazard);
					$timestamp = strtotime($record->dateIncident);
					$year=-1;
					$year=date('Y',$timestamp);
					if(!array_key_exists($year,$data))
					{
						$data[$year]=$series;
					}
					if(is_array($answer)&& count($answer)>0)
					{
						foreach($answer as $entry)//entry will be id of choice
						{
							$choice = Choices::model()->findByPk($entry);
							$group = '';
							if(isset($choice)){
							switch($choice->graphic)
							{
								case 'stf':
									$group='Slip/Trip/Fall';
									break;
								case 'ph':
									$group='Physical Hazard';
									break;
								case 'mh':
									$group='Mechanical Hazard';
									break;
								case 'eh':
									$group='Environmental Hazard';
									break;
								case 'ch':
									$group='Chemical Hazard';
									break;
								case 'bh':
									$group='Biological Hazard';
									break;
								case 'cs':
									$group='Confined Space';
									break;
											
							}
							if(array_key_exists($group,$data[$year]))
							{
								$data[$year][$group]++;
			
							}
							else
							{
								$data[$year][$group]=1;
							}
							}
			
						}
					}
					
			
				}
			
				break;
			case 'typestf':
					
				$data = array();
				$question = Question::model()->find(array('condition'=>'varname ="typeHazard"'));
				$choices = Choices::model()->findAll(
						array('order' => 'position', 'condition'=>'question ='.$question->id));
			
				
			
				//main X-axis
			
				$series = array();
				foreach ($records as $record)
				{
						
						
					$answer= unserialize($record->typeHazard);
					$timestamp = strtotime($record->dateIncident);
					$year=-1;
					$year=date('Y',$timestamp);
					if(!array_key_exists($year,$data))
					{
						$data[$year]=$series;
					}
					if(is_array($answer)&& count($answer)>0)
					{
						foreach($answer as $entry)//entry will be id of choice
						{
							$choice = Choices::model()->findByPk($entry);
							$group = '';
							if(isset($choice)){
								switch($choice->graphic)
								{
									case 'stf':
										$column=$choice->text;
										if(array_key_exists($column,$data[$year]))
										{
											$data[$year][$column]++;
												
										}
										else
										{
											$data[$year][$column]=1;
										}
										break;
									default:
										//do nothing
										break;
											
								}
								
							}
								
						}
					}
						
						
				}
					
				break;
			case 'typemh':
			
				$data = array();
				$question = Question::model()->find(array('condition'=>'varname ="typeHazard"'));
				$choices = Choices::model()->findAll(
						array('order' => 'position', 'condition'=>'question ='.$question->id));
			
					
			
				//main X-axis
			
				$series = array();
			foreach ($records as $record)
			{
					
					
				$answer= unserialize($record->typeHazard);
				$timestamp = strtotime($record->dateIncident);
				$year=-1;
				$year=date('Y',$timestamp);
				if(!array_key_exists($year,$data))
				{
					$data[$year]=$series;
				}
				if(is_array($answer)&& count($answer)>0)
				{
					foreach($answer as $entry)//entry will be id of choice
					{
						$choice = Choices::model()->findByPk($entry);
						$group = '';
						if(isset($choice)){
							switch($choice->graphic)
							{
								case 'mh':
									$column=$choice->text;
									if(array_key_exists($column,$data[$year]))
									{
										$data[$year][$column]++;
									
									}
									else
									{
										$data[$year][$column]=1;
									}
									break;
								default:
									//do nothing
									break;
		
							}
							
						}
							
					}
				}
					
					
			}
		
			break;
			case 'typeph':
					
				$data = array();
				$question = Question::model()->find(array('condition'=>'varname ="typeHazard"'));
				$choices = Choices::model()->findAll(
						array('order' => 'position', 'condition'=>'question ='.$question->id));
					
					
					
				//main X-axis
					
				$series = array();
				foreach ($records as $record)
				{
			
			
					$answer= unserialize($record->typeHazard);
					$timestamp = strtotime($record->dateIncident);
					$year=-1;
					$year=date('Y',$timestamp);
					if(!array_key_exists($year,$data))
					{
						$data[$year]=$series;
					}
					if(is_array($answer)&& count($answer)>0)
					{
						foreach($answer as $entry)//entry will be id of choice
						{
							$choice = Choices::model()->findByPk($entry);
							$group = '';
							if(isset($choice)){
								switch($choice->graphic)
								{
									case 'ph':
										$column=$choice->text;
										if(array_key_exists($column,$data[$year]))
										{
											$data[$year][$column]++;
			
										}
										else
										{
											$data[$year][$column]=1;
										}
										break;
									default:
										//do nothing
										break;
											
								}
							}
						}
					}
				}
					
				break;
			case 'typeeh':
			
				$data = array();
				$question = Question::model()->find(array('condition'=>'varname ="typeHazard"'));
				$choices = Choices::model()->findAll(
						array('order' => 'position', 'condition'=>'question ='.$question->id));
			
			
			
				//main X-axis
			
				$series = array();
				foreach ($records as $record)
				{
			
			
					$answer= unserialize($record->typeHazard);
					$timestamp = strtotime($record->dateIncident);
					$year=-1;
					$year=date('Y',$timestamp);
					if(!array_key_exists($year,$data))
					{
						$data[$year]=$series;
					}
					if(is_array($answer)&& count($answer)>0)
					{
						foreach($answer as $entry)//entry will be id of choice
						{
							$choice = Choices::model()->findByPk($entry);
							$group = '';
							if(isset($choice)){
								switch($choice->graphic)
								{
									case 'eh':
										$column=$choice->text;
										if(array_key_exists($column,$data[$year]))
										{
											$data[$year][$column]++;
			
										}
										else
										{
											$data[$year][$column]=1;
										}
										break;
									default:
										//do nothing
										break;
			
								}
							}
						}
					}
				}
			
				break;
			case 'typech':
					
				$data = array();
				$question = Question::model()->find(array('condition'=>'varname ="typeHazard"'));
				$choices = Choices::model()->findAll(
						array('order' => 'position', 'condition'=>'question ='.$question->id));
					
					
					
				//main X-axis
					
				$series = array();
				foreach ($records as $record)
				{
						
						
					$answer= unserialize($record->typeHazard);
					$timestamp = strtotime($record->dateIncident);
					$year=-1;
					$year=date('Y',$timestamp);
					if(!array_key_exists($year,$data))
					{
						$data[$year]=$series;
					}
					if(is_array($answer)&& count($answer)>0)
					{
						foreach($answer as $entry)//entry will be id of choice
						{
							$choice = Choices::model()->findByPk($entry);
							$group = '';
							if(isset($choice)){
								switch($choice->graphic)
								{
									case 'ch':
										$column=$choice->text;
										if(array_key_exists($column,$data[$year]))
										{
											$data[$year][$column]++;
												
										}
										else
										{
											$data[$year][$column]=1;
										}
										break;
									default:
										//do nothing
										break;
											
								}
							}
						}
					}
				}
					
				break;
			case 'typecs':
					
				$data = array();
				$question = Question::model()->find(array('condition'=>'varname ="typeHazard"'));
				$choices = Choices::model()->findAll(
						array('order' => 'position', 'condition'=>'question ='.$question->id));
					
					
					
				//main X-axis
					
				$series = array();
				foreach ($records as $record)
				{
			
			
					$answer= unserialize($record->typeHazard);
					$timestamp = strtotime($record->dateIncident);
					$year=-1;
					$year=date('Y',$timestamp);
					if(!array_key_exists($year,$data))
					{
						$data[$year]=$series;
					}
					if(is_array($answer)&& count($answer)>0)
					{
						foreach($answer as $entry)//entry will be id of choice
						{
							$choice = Choices::model()->findByPk($entry);
							$group = '';
							if(isset($choice)){
								switch($choice->graphic)
								{
									case 'cs':
										$column=$choice->text;
										if(array_key_exists($column,$data[$year]))
										{
											$data[$year][$column]++;
			
										}
										else
										{
											$data[$year][$column]=1;
										}
										break;
									default:
										//do nothing
										break;
											
								}
							}
						}
					}
				}
					
				break;
			case 'typebh':
					
				$data = array();
				$question = Question::model()->find(array('condition'=>'varname ="typeHazard"'));
				$choices = Choices::model()->findAll(
						array('order' => 'position', 'condition'=>'question ='.$question->id));
				$series = array();
				
				foreach ($records as $record)
				{
						
						
					$answer= unserialize($record->typeHazard);
					$timestamp = strtotime($record->dateIncident);
					$year=-1;
					$year=date('Y',$timestamp);
					if(!array_key_exists($year,$data))
					{
						$data[$year]=$series;
					}
					if(is_array($answer)&& count($answer)>0)
					{
						foreach($answer as $entry)//entry will be id of choice
						{
							$choice = Choices::model()->findByPk($entry);
							$group = '';
							if(isset($choice)){
								switch($choice->graphic)
								{
									case 'bh':
										$column=$choice->text;
										if(array_key_exists($column,$data[$year]))
										{
											$data[$year][$column]++;
												
										}
										else
										{
											$data[$year][$column]=1;
										}
										break;
									default:
										//do nothing
										break;
											
								}
							}
						}
					}
				}
					
				break;
			default:
				$data=array();
				$series = array();
				foreach ($records as $record)
				{
					$timestamp = strtotime($record->dateIncident);
					$year=-1;
					$year=date('Y',$timestamp);
					if(!array_key_exists($year,$data))
					{
						$data[$year]=$series;
					}
					$varname = $question->varname;
					if($question->field_type=='SELECT')
					{
						$answer = unserialize($record->$varname);
					}
					else{
						$answer = $record->$varname;
					}
					//build data array key=>value pairs
					if(is_array($answer)&& count($answer)>0)
					{
						foreach($answer as $entry)//entry will be id of choice
						{
							$choice = Choices::model()->findByPk($entry);
							if(array_key_exists($choice->text,$data[$year]))
							{
								$data[$year][$choice->text]++;
							
							}
							else {
								$data[$year][$choice->text]=1;
							}
						}
					}
					elseif(count($choices)>0)
					{
						foreach($choices as $choice)//entry will be id of choice
						{
							
							if($answer == $choice->id ){
									if( array_key_exists($choice->text,$series))
								{
									$data[$year][$choice->text]++;
										
								}
								else {
									$data[$year][$choice->text]=1;
								}
							}
						}
						
					}
					else {
						if($answer!=''){
						if(array_key_exists($answer,$series))
						{
							$data[$year][$answer]++;
								
						}
						else {
							$data[$year][$answer]=1;
						}
						}
					}
				}
				
				break;
		}
		
		$xAxis = array();
		$mData = array(); //main series containing all selected options in the record set
		$allSeries=array();
		foreach($data as $year=>$series){
			foreach( $series as $key=>$value)
			{
				if(!in_array($key,$xAxis)){
					array_push($xAxis, $key);
					
					$mSeries[]=0;
				}
				
			}	
		}
		foreach($data as $year=>$series){
			
			$tData= $mSeries;
			foreach( $series as $key=>$value)
			{
		
				if($chart->chartType=='pie')
				{
					$value = array($key,intval($value));
						
				}
				
				$index = array_search($key, $xAxis);
				$tData[$index]= $value;
		
			}
			
			$tSeries['name']=$year;
			$tSeries['data']= $tData;
			$tSeries['type']= Chart::itemAlias('chartType',$chart->chartType);
			array_push($allSeries,$tSeries);
		
		}
		
		//$chartData['data']=$allSeries;
		//$chartData['xaxis']=$xAxis;
		$chartOptions['series']=$allSeries;
		$chartOptions['xAxis']['categories']=$xAxis;
		if(is_array($chartOptions))
		{
			$options['options']=array_merge($options['options'], $chartOptions);
			//$options['options']=$chartOptions;
		}
		if(isset($_GET['json']) && $_GET['json'] == 1){
			
			echo CJSON::encode($options);
		}
		else{
			$this->render('view',array(
			'options'=>$options,'model'=>$chart,'choices'=>$choices,'question'=>$question
		));
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Chart;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Chart']))
		{
			$model->attributes=$_POST['Chart'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Chart']))
		{
			$model->attributes=$_POST['Chart'];
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
				$dataProvider=new CActiveDataProvider('Chart');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,));
		
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Chart('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Chart']))
			$model->attributes=$_GET['Chart'];

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
		$model=Chart::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='chart-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public static function getAjaxMenuArrayConfig($view,$id)
	{
		return array(
				'url' => array('Chart/View','id'=>$id,'json'=>1),
				
				'type' => 'POST',
				'dataType' => 'json',
				'contentType'=> 'application/json',
				'cache' => false,
				
	'success' => "function(response) {
	// You success action. Sample...
				//var key = getKey(Highcharts.charts);			
				//var container = Highcharts.charts[0].container;
				//Highcharts.charts[key].destroy();
				//chart.destroy();
				response['options']['chart']['renderTo']='yw2';
				chart = new Highcharts.Chart(response['options']);
				//chart.container = container;
	//container.highcharts(response['options']);
	}",
			'error' => "function(error) {
			// You error action
	}",
	);
	}
	
}
