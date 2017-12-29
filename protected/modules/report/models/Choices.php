<?php

/**
 * This is the model class for table "{{choices}}".
 *
 * The followings are the available columns in table '{{choices}}':
 * @property integer $id
 * @property integer $text
 * @property integer $position
 * @property integer $graphic
 * @property integer $question
 */
class Choices extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Choices the static model class
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
		return '{{choices}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('text, position , question', 'required'),
			array('position, question', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, text, position, graphic, question', 'safe', 'on'=>'search'),
			array('id, text, position, graphic, question', 'safe'),
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
			'text' => 'Text',
			'position' => 'Position',
			'graphic' => 'Graphic',
			'question' => 'Question',
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
		$criteria->compare('text',$this->text);
		$criteria->compare('position',$this->position);
		$criteria->compare('graphic',$this->graphic);
		$criteria->compare('question',$this->question);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}