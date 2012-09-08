<?php

/**
 * This is the model class for table "tbl_xata_type".
 *
 * The followings are the available columns in table 'tbl_xata_type':
 * @property integer $id
 * @property integer $parent
 * @property string $caption
 * @property string $description
 * @property string $img
 *
 * The followings are the available model relations:
 * @property TblXata[] $tblXatas
 * @property XataType $parent0
 * @property XataType[] $tblXataTypes
 */
class XataType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return XataType the static model class
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
		return 'tbl_xata_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('caption, description, img', 'required'),
			array('parent', 'numerical', 'integerOnly'=>true),
			array('caption, img', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent, caption, description, img', 'safe', 'on'=>'search'),
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
			'tblXatas' => array(self::HAS_MANY, 'Xata', 'type_id'),
			'getparent' => array(self::BELONGS_TO, 'XataType', 'parent'),
			'childs' => array(self::HAS_MANY, 'XataType', 'parent','order' => 'parent ASC'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent' => 'Parent',
			'caption' => 'Caption',
			'description' => 'Description',
			'img' => 'Img',
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
		$criteria->compare('parent',$this->parent);
		$criteria->compare('caption',$this->caption,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('img',$this->img,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
//------------- USER ADDS FUNCTIONS------------------------------------	
    public function getListed() {
      $subitems = array();
      if($this->childs) foreach($this->childs as $child) {
        $subitems[] = $child->getListed();
      }
      $returnarray = array('label' => $this->caption, 'url' => array('XataTypes/view', 'id' => $this->id));
      if($subitems != array()) 
        $returnarray = array_merge($returnarray, array('items' => $subitems));
      return $returnarray;
    }	
}