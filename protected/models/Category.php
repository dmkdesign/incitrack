<?php

/**
 * This is the model class for table "{{category}}".
 *
 * The followings are the available columns in table '{{category}}':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $metakeywords
 * @property string $metadescription
 * @property string $menuText
 * @property string $menuLink
 * @property integer $menuVisible
 * @property integer $isVisible
 * @property integer $hasChildren
 * @property string $childName
 * @property integer $sortOrder
**/
class Category extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Category the static model class
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
		return '{{category}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, description', 'required'),
			array('menuVisible, isVisible', 'numerical', 'integerOnly'=>true),
			array('title,menuLink,metakeywords', 'length', 'max'=>250),
			array('metadescription', 'length', 'max'=>500),
			array('description', 'length', 'max'=>10000),
			array('menuText', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, description, menuText, menuVisible, isVisible, hasChildren, childName, sortOrder', 'safe', 'on'=>'search'),
				array('id, title, description, metakeywords, metadescription, menuText, menuVisible,menuLink, isVisible, hasChildren, childName, sortOrder', 'safe'),
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
			'title' => 'Title',
			'description' => 'Description',
			'menuText' => 'Text for the menu label',
			'menuLink' => 'Relative link for the category (controller/action).  Fill this in with the text following the "r=" in the page address you want to link to.',
			'menuVisible' => 'Is this category visible in the category menu?',
			'isVisible' => 'Is this category ready to be visible?',
			'hasChildren' => 'Does this category have children? (Advanced use)',
			'childName' => 'Child Class, (advanced use)',
			'sortOrder'=>'Sort Order',
			'metakeywords'=>'Meta Keywords - Separate keywords with a comma and choose words that reflect the page content',
			'metadescription'=>'Meta Description - Fill out a short blurb about the product or page.  This is often displayed along with search results in google so try to catch the users attention!'
					
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('menuText',$this->menuText,true);
		$criteria->compare('menuVisible',$this->menuVisible);
		$criteria->compare('isVisible',$this->isVisible);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}