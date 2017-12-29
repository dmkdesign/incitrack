<?php

/**
 * This is the model class for table "{{chart}}".
 *
 * The followings are the available columns in table '{{chart}}':
 * @property integer $id
 * @property integer $q_id
 * @property string $menuLabel
 * @property string $chartTitle
 * @property integer $isPie
 * @property integer $isBar
 * @property varchar $customView
 * @property varchar $chartType
 * @property varchar $section
 * @property varchar $sequence
 * 
 */
class Chart extends CActiveRecord
{
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return Chart the static model class
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
		return '{{chart}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('q_id, menuLabel, chartTitle, chartType', 'required'),
			array('q_id, isPie, isBar,section,chartType,publish, section', 'numerical', 'integerOnly'=>true),
			array('menuLabel,customView,chartTitle', 'length', 'max'=>255),
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, q_id, menuLabel, chartTitle, isPie, isBar, isCustom,section,chartType,sequence,publish', 'safe', 'on'=>'search'),
				array('id, q_id, menuLabel, chartTitle, isPie, isBar, isCustom,section,chartType,sequence,publish', 'safe', ),
		);
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
			'q_id' => 'Question ID',
			'menuLabel' => 'chart label or title',
			'chartTitle' => 'Title of Chart',
			'chartType'	=> 'Chart Type',
			'isPie' => 'Does this chart work as a Pie Chart?',
			'isBar' => 'Does this chart work as a Bar Chart?',
			'customView' => 'Name of custom view for the chart.  Default render if blank.',
			'section' => 'What menu section in the menu is this found?',
			'sequence'=>'Display Order',
			'publish'=>'Is this graph ready to be published?'
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('q_id',$this->q_id);
		$criteria->compare('menuLabel',$this->menuLabel,true);
		$criteria->compare('chartTitle',$this->chartTitle,true);
		$criteria->compare('isPie',$this->isPie);
		$criteria->compare('isBar',$this->isBar);
		$criteria->compare('customView',$this->customView);
		$criteria->compare('sequence',$this->sequence);
		$criteria->compare('publish',$this->sequence);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function itemAlias($type,$code=NULL) {
		$_items = array(
				'section' => array('0'=>'Timeline',
						'1'=>'Incident Details',
						'2'=>'Injury Type',
						'3'=>'Hazard Type',
						'4'=>'Cause and Effect',
						'5'=>'Demographic',
						'6'=>'Safety',
						'7'=>'Procedure',
						'8'=>'Misc'),
				'chartType' => array(
						'0'=>'area',
						'1'=>'areaspline',
						'2'=>'bar',
						'3'=>'column',
						'4'=>'line',
						'5'=>'pie',
						'6'=>'scatter',
						'7'=>'spline'
						),
				'publish' => array(
						'0'=>'No',
						'1'=>'Yes',		
				),
				
					
		);
		if (isset($code))
			return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
		else
			return isset($_items[$type]) ? $_items[$type] : false;
	}
}