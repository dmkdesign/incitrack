<?php

/**
 * This is the model class for table "{{subconfigs}}".
 *
 * The followings are the available columns in table '{{subconfigs}}':
 * @property integer $id
 * @property string $mode
 * @property string $merchant_url
 * @property integer $merchant_cid
 * @property string $merchant_user_id
 * @property string $merchant_password
 */
class Subconfigs extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Subconfigs the static model class
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
		return '{{subconfigs}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('merchant_password', 'required'),
			array('merchant_cid', 'numerical', 'integerOnly'=>true),
			array('mode', 'length', 'max'=>10),
			array('merchant_url', 'length', 'max'=>255),
			array('merchant_user_id, merchant_password', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, mode, merchant_url, merchant_cid, merchant_user_id, merchant_password', 'safe', 'on'=>'search'),
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
			'mode' => 'Mode',
			'merchant_url' => 'Merchant Url',
			'merchant_cid' => 'Merchant Cid',
			'merchant_user_id' => 'Merchant User',
			'merchant_password' => 'Merchant Password',
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
		$criteria->compare('mode',$this->mode,true);
		$criteria->compare('merchant_url',$this->merchant_url,true);
		$criteria->compare('merchant_cid',$this->merchant_cid);
		$criteria->compare('merchant_user_id',$this->merchant_user_id,true);
		$criteria->compare('merchant_password',$this->merchant_password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}