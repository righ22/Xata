<?php

/**
 * This is the model class for table "tbl_user_xata".
 *
 * The followings are the available columns in table 'tbl_user_xata':
 * @property integer $id
 * @property integer $uid
 * @property integer $xid
 * @property integer $rights
 * @property integer $public
 *
 * The followings are the available model relations:
 * @property TblUser $u
 * @property TblXata $x
 */
class UserXata extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserXata the static model class
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
		return 'tbl_user_xata';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, xid, rights, public', 'required'),
			array('uid, xid, rights, public', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uid, xid, rights, public', 'safe', 'on'=>'search'),
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
			'u' => array(self::BELONGS_TO, 'TblUser', 'uid'),
			'x' => array(self::BELONGS_TO, 'TblXata', 'xid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'uid' => 'Uid',
			'xid' => 'Xid',
			'rights' => 'Rights',
			'public' => 'Public',
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
		$criteria->compare('uid',$this->uid);
		$criteria->compare('xid',$this->xid);
		$criteria->compare('rights',$this->rights);
		$criteria->compare('public',$this->public);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}