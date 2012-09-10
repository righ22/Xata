<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 *
 * The followings are the available model relations:
 * @property HaLogins[] $haLogins
 * @property TblUserTrust[] $tblUserTrusts
 * @property TblUserTrust[] $tblUserTrusts1
 * @property TblUserXata[] $tblUserXatas
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email', 'required'),
			array('username, password, email', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, email', 'safe', 'on'=>'search'),
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
			'haLogins' => array(self::HAS_MANY, 'HaLogins', 'userId'),
			'tblUserTrusts' => array(self::HAS_MANY, 'TblUserTrust', 'uid1'),
			'tblUserTrusts1' => array(self::HAS_MANY, 'TblUserTrust', 'uid2'),
			'tblUserXatas' => array(self::HAS_MANY, 'TblUserXata', 'uid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	// ---------- USER ADDS FUNCTIONS -------------------
	// Make a friend (set trust level for the user)
	public function setUserTrust($_uid2,$_lvl=Trust::$_avglvl){
	    $ut=new UserTrust();
	    $ut->attributes=array('uid1'=>$this->id,'uid2'=>$_uid2,'trust'=>$_lvl);
	    return $ut->save();
	}
	// Get trust level
  public function getTrustTo($_uid2){
	    return (int)UserTrust::model()->find("uid1=".$this->id." AND uid2=$_uid2 AND trust=$_lvl",'trust');
	}
	// Check trust (friends or not)
	public function isTrustTo($_uid2,$_lvl=Trust::$_avglvl){
	    $_uid2=(int) $_uid2;
	    $_lvl=(int) $_lvl;
	    return count(UserTrust::model()->findAll("uid1=".$this->id." AND uid2=$_uid2 AND trust>=$_lvl"));
	}
	public function isTrustedBy($_uid1,$_lvl=Trust::$_avglvl){
	    $_uid1=(int) $_uid1;
	    $_lvl=(int) $_lvl;
	    return count(UserTrust::model()->findAll("uid2=".$this->id." AND uid1=$_uid1 AND trust>=$_lvl"));
	}	
	
}