<?php

/**
 * This is the model class for table "{{articles}}".
 *
 * The followings are the available columns in table '{{articles}}':
 * @property integer $id
 * @property string $framecode
 * @property string $content
 * @property string $framename
 * @property string $type
 */
class Articles extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Articles the static model class
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
		return '{{articles}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('framecode', 'required'),
			array('framecode, framename', 'length', 'max'=>50),
			array('content', 'length', 'max'=>3000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, framecode, content, framename, type', 'safe', 'on'=>'search'),
				array('id, framecode, content, framename, type', 'safe'),
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
			'framecode' => 'Framecode',
			'content' => 'Content',
			'framename' => 'Framename',
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
		$criteria->compare('framecode',$this->framecode,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('framename',$this->framename,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function itemAlias($type,$code=NULL) {
		$_items = array(
				'type' => array('0'=>'viewable', '1'=>'meta','2'=>'text','3'=>'slideshow'),
				
		);
		if (isset($code))
			return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
		else
			return isset($_items[$type]) ? $_items[$type] : false;
	}
}