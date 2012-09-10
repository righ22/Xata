<?php

class Trust{
  static private $_maxval=10;
  static public function getMax(){ return Trust::$_maxval;}     
      
  static private $_avgval=0;                                    // request is possible if $value is greater
  static public function getAvg(){ return Trust::$_avgval;}     // if not then 'unknown' users can't request to become 'Guest'
                                                                // only request on 'buy'(if there is price) or 'rent'   
  
  static private $_minval=0;
  static public function getMin(){ return Trust::$_minval;}
    
	static private $captions=array(
		'No guest',// 0  
    'Clothest people', // 1
    'Relatives', // 2
  	'Best friends', // 3
    'Good friends', // 4  
    'Friends only', // 5
    'Really great people', // 6
  	'Good people', // 7
    'Normal people', // 8
    'Almost anyone', // 9
  	"C'mon everybody!!!" // 10	    
	);    
  public function __construct($val){
      $this->value=$val;
  }  
  public function __set($name, $value){
    if($name=='value'){
      if(!is_numeric($value)) $value=0;
      else{
        if($value<$this->_minval)
            $value<$this->_minval;
        if($value>$this->_maxval)
            $value<$this->_maxval;            
      }
      $this->value=$value;
    }
  }
  
	public $value;

	public function getCpt(){
	    return $this->captions[$this->value];
	}
	public static function _getCpt($val){
	    return Yii::t('xata',Trust::$captions[$val]);
	} 
  
}