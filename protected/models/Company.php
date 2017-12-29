<?php

/**
 * This is the model class for table "{{company}}".
 *
 * The followings are the available columns in table '{{company}}':
 * @property integer $id
 * @property string $company_name
 * @property string $contact_name
 * @property string $contact_email
 * @property string $contact_phone
 * @property string $logo_file
 * @property string $css_file
 * @property string $branches
 */
class Company extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Company the static model class
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
		return '{{company}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_name, contact_name, contact_email, contact_phone,', 'required'),
			array('company_name, contact_name, contact_email, contact_phone, logo_file', 'length', 'max'=>255),
			array('branches', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, company_name, contact_name, contact_email, contact_phone, logo_file, css_file', 'safe', 'on'=>'search'),
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
			'company_name' => 'Company Name',
			'contact_name' => 'Contact Name',
			'contact_email' => 'Contact Email',
			'contact_phone' => 'Contact Phone',
			'logo_file' => 'Logo File',
			'css_file' => 'Css File',
			'branches'=> 'Branches available in company, separate by semicolon and no spaces.ex "(Vancouver;Abbotsford;Maple Ridge)"'
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
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('contact_name',$this->contact_name,true);
		$criteria->compare('contact_email',$this->contact_email,true);
		$criteria->compare('contact_phone',$this->contact_phone,true);
		$criteria->compare('logo_file',$this->logo_file,true);
		$criteria->compare('css_file',$this->css_file,true);
		$criteria->compare('branches',$this->branches,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}