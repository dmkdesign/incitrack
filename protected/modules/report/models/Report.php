<?php

/**
 * This is the model class for table "{{report}}".
 *
 * The followings are the available columns in table '{{report}}':
 * @property integer $id
 * @property integer $status
 * @property integer $ownerId
 */
class Report extends CActiveRecord
{
	private $_model;
	private $_modelReg;
	
	const PRELIMINARY =0;
	const COMMIT=1;
	const COMMITTED=2;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Report the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{report}}';
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		
		//$requiredcommit = array();
		
		$rules = array();
		$safe=array();
		$model=$this->getQuestions();
		$pages = Page::model()->findAll(array('order'=>'sequence ASC'));//get all pages and create rules based on page scenario
		foreach ($pages as $page )
		{
			$requiredcommit = array();
			$requiredprelim = array();
			$numerical = array();
			$pagecomplete = array();
			$pagerules =array();
			
			$questions = $page->questions();
			foreach ($questions as $field) {
				$field_rule = array();
				//required
				if ($field->required==Question::REQUIRED_YES_PRELIM){
					array_push($requiredprelim,$field->varname );
					array_push($requiredcommit,$field->varname);
				}
				elseif ($field->required==Question::REQUIRED_YES_SHOW_REG){
					array_push($requiredcommit,$field->varname);
				}
				//numeric
				if ($field->field_type=='FLOAT'||$field->field_type=='INTEGER')
					array_push($numerical,$field->varname);
				//text
				if ($field->field_type=='VARCHAR'||$field->field_type=='TEXT') {
					$field_rule = array($field->varname, 'length', 'max'=>$field->field_size, 'min' => $field->field_size_min,'on'=>'page'.$page->id);
					if ($field->error_message) $field_rule['message'] = $field->error_message;
					array_push($pagerules,$field_rule);
				}
				
				if ($field->other_validator) {
					if (strpos($field->other_validator,'{')===0) {
						$validator = (array)CJavaScript::jsonDecode($field->other_validator);
						foreach ($validator as $name=>$val) {
							$field_rule = array($field->varname, $name,'on'=>'page'.$page->id);
							$field_rule = array_merge($field_rule,(array)$validator[$name]);
							if ($field->error_message) $field_rule['message'] = $field->error_message;
							array_push($pagerules,$field_rule);
						}
					} else {
						$field_rule = array($field->varname, $field->other_validator,'on'=>'page'.$page->id);
						if ($field->error_message) $field_rule['message'] = $field->error_message;
						array_push($pagerules,$field_rule);
					}
				} elseif ($field->field_type=='DATE') {
					$field_rule = array($field->varname, 'type', 'type' => 'date', 'dateFormat' => 'yyyy-mm-dd', 'on'=>'page'.$page->id,'allowEmpty'=>true);
					if ($field->error_message) $field_rule['message'] = $field->error_message;
					array_push($pagerules,$field_rule);
				}
				if ($field->match) {
					$field_rule = array($field->varname, 'match', 'pattern' => $field->match,'on'=>'page'.$page->id);
					if ($field->error_message) $field_rule['message'] = $field->error_message;
					array_push($pagerules,$field_rule);
				}
				if ($field->range) {
					$field_rule = array($field->varname, 'in', 'range' => self::rangeRules($field->range),'on'=>'page'.$page->id);
					if ($field->error_message) $field_rule['message'] = $field->error_message;
					array_push($pagerules,$field_rule);
				}
				array_push($safe,$field->varname);
			}
			
			array_push($pagerules,array(implode(',',$numerical), 'numerical', 'integerOnly'=>true,'on'=>'page'.$page->id));
			array_push($pagerules,array(implode(',',$requiredprelim), 'required','on'=>'page'.$page->id));
			array_push($pagerules,array(implode(',',$requiredcommit), 'required','on'=>'commitpage'.$page->id));
			$rules = array_merge($rules,$pagerules);
			
		}
		array_push($safe,'status');
		array_push($safe,'id');
		array_push($safe,'company');
		array_push($safe,'branch');
		array_push($rules,array(implode(',',$safe),'safe'));
			array_push($rules,array(implode(',',$safe),'safe','on'=>'search'));
		
		
	
		return $rules;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules_old()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		$required = array();
		$requiredcommit = array();
		$numerical = array();		
		$rules = array();
		
		$model=$this->getQuestions();
		
		foreach ($model as $field) {
			$field_rule = array();
			if ($field->required==Question::REQUIRED_YES_PRELIM)
				array_push($required,$field->varname);
			if ($field->required==Question::REQUIRED_YES_SHOW_REG)
				array_push($requiredcommit,$field->varname);
			if ($field->field_type=='FLOAT'||$field->field_type=='INTEGER')
				array_push($numerical,$field->varname);
			if ($field->field_type=='VARCHAR'||$field->field_type=='TEXT') {
				$field_rule = array($field->varname, 'length', 'max'=>$field->field_size, 'min' => $field->field_size_min);
				if ($field->error_message) $field_rule['message'] = $field->error_message;
				array_push($rules,$field_rule);
			}
			if ($field->other_validator) {
				if (strpos($field->other_validator,'{')===0) {
					$validator = (array)CJavaScript::jsonDecode($field->other_validator);
					foreach ($validator as $name=>$val) {
						$field_rule = array($field->varname, $name);
						$field_rule = array_merge($field_rule,(array)$validator[$name]);
						if ($field->error_message) $field_rule['message'] = $field->error_message;
						array_push($rules,$field_rule);
					}
				} else {
					$field_rule = array($field->varname, $field->other_validator);
					if ($field->error_message) $field_rule['message'] = $field->error_message;
					array_push($rules,$field_rule);
				}
			} elseif ($field->field_type=='DATE' && $this->status == Report::COMMIT) {
				$field_rule = array($field->varname, 'type', 'type' => 'date', 'dateFormat' => 'yyyy-mm-dd', 'allowEmpty'=>true);
				if ($field->error_message) $field_rule['message'] = $field->error_message;
				array_push($rules,$field_rule);
			}
			if ($field->match) {
				$field_rule = array($field->varname, 'match', 'pattern' => $field->match);
				if ($field->error_message) $field_rule['message'] = $field->error_message;
				array_push($rules,$field_rule);
			}
			if ($field->range) {
				$field_rule = array($field->varname, 'in', 'range' => self::rangeRules($field->range));
				if ($field->error_message) $field_rule['message'] = $field->error_message;
				array_push($rules,$field_rule);
			}
			array_push($safe,$field->varname);
		}
		
		array_push($rules,array(implode(',',$required), 'required'));
		array_push($rules,array(implode(',',$requiredcommit), 'required','on'=>'commit'));
		array_push($rules,array(implode(',',$numerical), 'numerical', 'integerOnly'=>true));
		array_push($rules,array(implode(',',$safe),'safe'));
		
		return $rules;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
	$profile = Profile::model()->findByPk(Yii::app()->user->id);
		$criteria = new CDbCriteria;
		switch(Yii::app()->user->getState('userType')){
			case user::TYPE_SUPERVISOR:
		
				
				$criteria->join ='INNER JOIN (
				SELECT user_id
				from tbl_Profiles
				Where company = "'.$profile->company.'") te on te.user_id = t.ownerId';
				
				break;
				
			case user::TYPE_ADMIN:
				
				//do nothing admin should see all
				break;
			default:
				
				
				break;
		}
		/*SELECT * FROM `tbl_report` r
		INNER JOIN (
				SELECT user_id
				from tbl_Profiles
				Where company = 'DMK Design'
		
		) te on te.user_id = r.ownerId
		*/
		

		$criteria->compare('id',$this->id);
		$criteria->compare('firstName',$this->firstName);
		$criteria->compare('lastName',$this->lastName);
		$criteria->compare('status',$this->status);
		$criteria->compare('reportDate',$this->reportDate);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getQuestions() {
			//Add filter here depending on 
			if (!$this->_model)
				$this->_model=Question::model()->forOwner()->findAll();
			return $this->_model;
		
	}
	private function rangeRules($str) {
		$rules = explode(';',$str);
		for ($i=0;$i<count($rules);$i++)
			$rules[$i] = current(explode("==",$rules[$i]));
			return $rules;
	}
	
	static public function range($str,$fieldValue=NULL) {
	$rules = explode(';',$str);
			$array = array();
			for ($i=0;$i<count($rules);$i++) {
			$item = explode("==",$rules[$i]);
			if (isset($item[0])) $array[$item[0]] = ((isset($item[1]))?$item[1]:$item[0]);
	}
	if (isset($fieldValue))
		if (isset($array[$fieldValue])) return $array[$fieldValue]; else return '';
		else
		return $array;
	}
	
	/*protected function beforeSave()
	{
		$questions=$this->getQuestions();
		foreach($questions as $question){
			if($question->field_type =='SELECT'|| $question->field_type =='RADIO')
			{	
				if($this->getAttribute($question->varname)!='')
				{
					$varname = $question->varname;
					$this->$varname = serialize($this->getAttribute($question->varname));
				}
			}
		}
		
		return parent::beforeSave();
	}
	/*
	protected function afterFind()
	{
		$questions=$this->getQuestions();
		//$str = $this->financingOptions;
		foreach($questions as $question){
			if($question->field_type =='SELECT'|| $question->field_type =='RADIO')
			{	
				if($this->getAttribute($question->varname)!='')
				{
					$varname = $question->varname;
					$this->$varname = @unserialize($this->getAttribute($question->varname));
				}
			}
		}

	}*/
	public static function getYears()
	{
		$years = array();
		$currentYear=intval(date('Y'));
		for($i=1940; $i<=($currentYear+10);$i++)
		{
		$years[$i]=$i;
		}
		return $years;
	}
	
		public static function getMonths()
		{
		$months = array('01'=>'January','02'=>'February', '03'=>'March', '04'=>'April','05'=>'May', '06'=>'June', '07'=>'July','08'=>'August','09'=>'September','10'=>'October','11'=>'November','12'=>'December');
				return $months;
		}
	
		public static function getDays($month=NULL)
		{
	
			if($month ==='03'||$month ==='06'||$month==='09'||$month==='11')
			{
				$maxdays=30;
			}
			elseif($month==='02')
			{
			$maxdays = 28;
			}
			else
			{
			$maxdays = 31;
			}
	
			$days=array();
	
			for($i=1;$i<=$maxdays;$i++)
			{
			$days[sprintf("%02s", $i)]= strval($i);
			}
			return $days;
			}
	
			public static function getHours()
			{
			
				$hours=array();
			
				for($i=0;$i<=23;$i++)
				{
				$hours[sprintf("%02s", $i)]= sprintf("%02s", $i);
				}
				return $hours;
			}
			public static function getMinutes()
			{
					
				$minutes=array();
					
				for($i=0;$i<=59;$i++)
				{
				$hours[sprintf("%02s", $i)]= sprintf("%02s", $i);
				}
				return $hours;
			}
			public function isFuture($attribute, $params)
			{
			$futureDate =  new DateTime($this->$attribute);
			$today = new DateTime(); //now
			$dateDiff=date_diff($futureDate,$today);
			if($futureDate<$today)
				{
				$this->addError($attribute, 'Your date must be in the future!');
				}
	
			}
			public static function itemAlias($type,$code=NULL) {
				$_items = array(
						'status' => array('0'=>'Preliminary', '1'=>'Verify','2'=>'Committed',),
						'status_decode' => array('Preliminary'=>'0', 'Verify'=>'1','Committed'=>'2',),
			
				);
				if (isset($code))
					return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
				else
					return isset($_items[$type]) ? $_items[$type] : false;
			}
}
