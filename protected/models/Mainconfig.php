<?php

/**
 * This is the model class for table "{{Mainconfig}}".
 *
 * The followings are the available columns in table '{{Mainconfig}}':
 * @property integer $id
 * @property string $merchant_mode
 * @property string $pricing
 */
class Mainconfig extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Mainconfig the static model class
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
		return '{{Mainconfig}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('merchant_mode, pricing', 'required'),
			array('merchant_mode, pricing', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, merchant_mode, pricing', 'safe', 'on'=>'search'),
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
			'merchant_mode' => 'Merchant Mode',
			'pricing' => 'Pricing',
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
		$criteria->compare('merchant_mode',$this->merchant_mode,true);
		$criteria->compare('pricing',$this->pricing,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function getMode()
	{
		//there is only one main config so get the first
		$mainconfig= Mainconfig::model()->findByPk('1');
		return $mainconfig->merchant_mode;
	}
}