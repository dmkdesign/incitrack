<?php

/**
 * This is the model class for table "{{images}}".
 *
 * The followings are the available columns in table '{{images}}':
 * @property integer $id
 * @property string $filename
 * @property integer $category
 * @property integer $associate_id
 * @property string $alt_text
 * @property string $caption
 */
class Images extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Images the static model class
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
		return '{{images}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('filename', 'required'),
			array('category, associate_id', 'numerical', 'integerOnly'=>true),
			array('filename, alt_text', 'length', 'max'=>256),
			array('caption', 'length', 'max'=>512),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, filename, category, associate_id, alt_text, caption', 'safe', 'on'=>'search'),
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
			'filename' => 'Filename',
			'category' => 'Category',
			'associate_id' => 'Associate',
			'alt_text' => 'Alt Text',
			'caption' => 'Caption',
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
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('category',$this->category);
		$criteria->compare('associate_id',$this->associate_id);
		$criteria->compare('alt_text',$this->alt_text,true);
		$criteria->compare('caption',$this->caption,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,'pagination'=>false
		));
	}
	
public static function itemAlias($type,$code=NULL) {
		$_items = array(
				'category_decode' => array('article'=>'0', 'collection'=>'1','techniques' =>'2'),
				'category' => array(0=>'article', 1=>'collection',2=>'techniques'),
				
		);
		if (isset($code))
			return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
		else
			return isset($_items[$type]) ? $_items[$type] : false;
	}
}