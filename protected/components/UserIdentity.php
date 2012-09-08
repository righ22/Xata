<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
  private $_id;  

  /**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
    
    $ha = Yii::app()->getModule('hybridauth')->getHybridAuth();
    if($ha){
      $google = $ha->getAdapter('google');
      if($google->isUserConnected())
        $guser=$google->getUserProfile();
      //$google->setUserStatus('Hi');
    }  
/*
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;

/*
        Yii::import('ext.eoauth.*');
 
        $ui = new EOAuthUserIdentity(
                array(
                    //Set the "scope" to the service you want to use
                        'scope'=>'https://sandbox.google.com/apis/ads/publisher/',
                        'provider'=>array(
                                'request'=>'https://www.google.com/accounts/OAuthGetRequestToken',
                                'authorize'=>'https://www.google.com/accounts/OAuthAuthorizeToken',
                                'access'=>'https://www.google.com/accounts/OAuthGetAccessToken',
                        )
                )
        );
 
        if ($ui->authenticate()) {
            $user=Yii::app()->user;
            $user->login($ui);
            $this->redirect($user->returnUrl);
        }
        else throw new CHttpException(401, $ui->error);  
*/
	  $username=strtolower($this->username);
    $user=User::model()->find('LOWER(username)=?',array($username));
    if($user===null)
      $this->errorCode=self::ERROR_USERNAME_INVALID;
    else if($user->password!=$this->password)//!$user->validatePassword($this->password))
      $this->errorCode=self::ERROR_PASSWORD_INVALID;
    else{
      $this->_id=$user->id;
      $this->username=$user->username;
      $this->errorCode=self::ERROR_NONE;
    }
    return $this->errorCode==self::ERROR_NONE;

  }
 
  public function getId(){
    return $this->_id;
  }
}