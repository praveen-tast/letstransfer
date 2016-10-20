<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    private $_id;
    private $_email;
    const ACCOUNT_VALID = 0;
    const ERROR_ACCOUNT_NOT_VERFIED = 1;
    const ERROR_ACCOUNT_SUSPENDED = 2;
    const ERROR_ACCOUNT_DELETED = 3;
    const ERROR_ACCOUNT_RESET = 4;
    const ERROR_USERNAME_INVALID = 5;
    const ERROR_PASSWORD_INVALID = 6;

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {

        $user = User::model()->findByAttributes(array('email_address' => $this->username));

        if ($user === null) {
     
             $user = User::model()->findByAttributes(array('mobile_phone' => $this->username));
            if ($user === null) {
                
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            }
            else {
            if ($user->password !== $user->encrypt($this->password)) {
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            } else {

                //login was OK, but check for user status. We cannot login unless status_id=1
                if ($user->status_id == Lookup::getLookupOptionId(Lookup::LOOKUP_USER_STATUS, "confirmed")) {

                    $this->_id = $user->id;
                    $this->_email = $user->email_address;
                    if (null === $user->last_login_time) {
                        $lastLogin = time();
                    } else {
                        $lastLogin = strtotime($user->last_login_time);
                    }

                    Yii::app()->user->setId($user->id);
                    $this->setState('lastLoginTime', $lastLogin);
                    $this->setState('email',$user->email_address);
                    $this->setState('timezone',$user->time_zone);
                    $this->errorCode = self::ACCOUNT_VALID;
                }else if($user->status_id==Lookup::getLookupOptionId(Lookup::LOOKUP_USER_STATUS, "pending"))
                {
                    
                    //confirmation pending// ask to verify using email
                    $this->errorCode = self::ERROR_ACCOUNT_NOT_VERFIED;
                }
                else if($user->status_id==Lookup::getLookupOptionId(Lookup::LOOKUP_USER_STATUS, "suspended"))
                {
                    //account suspended. Contact Adminisitrator
                     $this->errorCode = self::ERROR_ACCOUNT_SUSPENDED;
                }
                else if($user->status_id==Lookup::getLookupOptionId(Lookup::LOOKUP_USER_STATUS, "deleted"))
                {
                    //account deleted
                     $this->errorCode = self::ERROR_ACCOUNT_DELETED;
                }
                else if($user->status_id==Lookup::getLookupOptionId(Lookup::LOOKUP_USER_STATUS, "reset"))
                {
                     Yii::app()->user->setId($user->id);   
                    //account set for reset flag. redirect them to the forgot password screen.
                     $this->errorCode = self::ERROR_ACCOUNT_RESET;
                }
            }
        }
            
            
        } 
        else {
            if ($user->password !== $user->encrypt($this->password)) {
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            } else {

                //login was OK, but check for user status. We cannot login unless status_id=1
                if ($user->status_id == Lookup::getLookupOptionId(Lookup::LOOKUP_USER_STATUS, "confirmed")) {

                    $this->_id = $user->id;
                    $this->_email = $user->email_address;
                    if (null === $user->last_login_time) {
                        $lastLogin = time();
                    } else {
                        $lastLogin = strtotime($user->last_login_time);
                    }

                    Yii::app()->user->setId($user->id);
                    $this->setState('lastLoginTime', $lastLogin);
                    $this->setState('email',$user->email_address);
                    $this->setState('timezone',$user->time_zone);
                    $this->errorCode = self::ACCOUNT_VALID;
                }else if($user->status_id==Lookup::getLookupOptionId(Lookup::LOOKUP_USER_STATUS, "pending"))
                {
                    
                    //confirmation pending// ask to verify using email
                    $this->errorCode = self::ERROR_ACCOUNT_NOT_VERFIED;
                }
                else if($user->status_id==Lookup::getLookupOptionId(Lookup::LOOKUP_USER_STATUS, "suspended"))
                {
                    //account suspended. Contact Adminisitrator
                     $this->errorCode = self::ERROR_ACCOUNT_SUSPENDED;
                }
                else if($user->status_id==Lookup::getLookupOptionId(Lookup::LOOKUP_USER_STATUS, "deleted"))
                {
                    //account deleted
                     $this->errorCode = self::ERROR_ACCOUNT_DELETED;
                }
                else if($user->status_id==Lookup::getLookupOptionId(Lookup::LOOKUP_USER_STATUS, "reset"))
                {
                     Yii::app()->user->setId($user->id);   
                    //account set for reset flag. redirect them to the forgot password screen.
                     $this->errorCode = self::ERROR_ACCOUNT_RESET;
                }
            }
        }
//        $msg['message']='ERROR_PASSWORD_INVALID';
//        return json_encode($msg);
//        if($this->errorCode==6)
//        {
//            return 'ERROR_PASSWORD_INVALID';
//        }
        return $this->errorCode;
        
    }

    public function getId() {
        return $this->_id;
    }
    
    public function getEmail()
    {
        return $this->_email;
    }

}