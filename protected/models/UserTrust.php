<?php

/**
 * This is the model class for table "tbl_user_trust".
 *
 * The followings are the available columns in table 'tbl_user_trust':
 * @property integer $id
 * @property integer $uid1
 * @property integer $uid2
 * @property integer $turst
 *
 * The followings are the available model relations:
 * @property TblUser $uid10
 * @property TblUser $uid20
 */
class UserTrust extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserTrust the static model class
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
		return 'tbl_user_trust';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid1, uid2, turst', 'required'),
			array('uid1, uid2, turst', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uid1, uid2, turst', 'safe', 'on'=>'search'),
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
			'uid10' => array(self::BELONGS_TO, 'TblUser', 'uid1'),
			'uid20' => array(self::BELONGS_TO, 'TblUser', 'uid2'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'uid1' => 'Uid1',
			'uid2' => 'Uid2',
			'turst' => 'Turst',
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
		$criteria->compare('uid1',$this->uid1);
		$criteria->compare('uid2',$this->uid2);
		$criteria->compare('turst',$this->turst);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}