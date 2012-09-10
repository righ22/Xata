<?php

/**
 * This is the model class for table "tbl_xata".
 *
 * The followings are the available columns in table 'tbl_xata':
 * @property integer $id
 * @property integer $type_id
 * @property integer $city_id
 * @property string $address 
 * @property integer $owner
 * @property integer $cost
 * @property integer $rental_m
 * @property integer $rental_d
 * @property integer $rental_h
 * @property integer $visit
 * @property double  $longitude
 * @property double  $latitude
 * @property string $description
 *
 * The followings are the available model relations:
 * @property TblUserXata[] $tblUserXatas
 * @property TblXataType $type
 * @property TblCity $city
 * @property TblUser $owner0
 */
class Xata extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Xata the static model class
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
		return 'tbl_xata';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_id, city_id, owner, visit, longitude, latitude', 'required'),
			array('type_id, city_id, owner, cost, rental_m, rental_d, rental_h, visit', 'numerical', 'integerOnly'=>true),
      array('longitude, latitude', 'numerical'),			
			array('address', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type_id, city_id, address, owner, cost, rental_m, rental_d, rental_h, visit, longitude, latitude, description', 'safe', 'on'=>'search'),
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
			'tblUserXatas' => array(self::HAS_MANY, 'UserXata', 'xid'),
			'type' => array(self::BELONGS_TO, 'XataType', 'type_id'),
			'city' => array(self::BELONGS_TO, 'City', 'city_id'),
			'owner0' => array(self::BELONGS_TO, 'User', 'owner'),				
		/*
			'owner' => array(self::BELONGS_TO, 'TblUser', 'id'),
			'type_caption' => array(self::BELONGS_TO, 'TblXataType', 'caption'),		
			'type_description' => array(self::BELONGS_TO, 'TblXataType', 'description'),		
			'city' => array(self::BELONGS_TO, 'City', 'city_id'),
			//'country' => array(self::BELONGS_TO, 'TblCity', 'country'),
			 */		
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type_id' => 'Type',
			'city_id' => 'City ID',
			'city_caption' => 'City',		
			'address' => Yii::t('xata','Address'),
      'owner'  => 'Owner',		
			'cost' => Yii::t('xata','Cost'),
			'rental_m' => Yii::t('xata','Rental M'),
			'rental_d' => Yii::t('xata','Rental D'),
			'rental_h' => Yii::t('xata','Rental H'),
			'visit' => Yii::t('xata','Visit'),
			'longitude' => Yii::t('xata','Longitude'),
			'latitude'  => Yii::t('xata','Latitude'),  
			'description' => Yii::t('xata','Description'),      
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
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('owner',$this->owner);		
		$criteria->compare('cost',$this->cost);
		$criteria->compare('rental_m',$this->rental_m);
		$criteria->compare('rental_d',$this->rental_d);
		$criteria->compare('rental_h',$this->rental_h);
		$criteria->compare('visit',$this->visit);
		$criteria->compare('longitude',$this->longitude);
		$criteria->compare('latitude',$this->latitude);    
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	//----- USER ADDS FUNCTIONS -----------------------------------
	
}