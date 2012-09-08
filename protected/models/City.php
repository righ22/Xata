<?php

/**
 * This is the model class for table "tbl_city".
 *
 * The followings are the available columns in table 'tbl_city':
 * @property integer $id
 * @property integer $country_id
 * @property string $caption
 *
 * The followings are the available model relations:
 * @property TblCountry $country
 * @property TblXata[] $tblXatas
 */
class City extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return City the static model class
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
		return 'tbl_city';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('country_id, caption', 'required'),
			array('country_id', 'numerical', 'integerOnly'=>true),
			array('caption', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, country_id, caption', 'safe', 'on'=>'search'),
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
			'country' => array(self::BELONGS_TO, 'TblCountry', 'caption'),
			'tblXatas' => array(self::HAS_MANY, 'TblXata', 'city_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'country_id' => 'Country',
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
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('caption',$this->caption,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
  
//----------- User added functions----------------------  
  static public function check($_cpt,$_cntry){
    $city=City::model()->find('country_id=:cntry AND caption=:cpt', array(':cntry'=>$_cntry,':cpt'=>$_cpt));
    if($city!==null){
      return $city->getPrimaryKey();
    }
    
    $city= new City;
    
    $city->attributes=array('caption'=>$_cpt,'country_id'=>$_cntry);
  	if($city->save())
      return $city->getPrimaryKey();
    
    return false;
  }  
}