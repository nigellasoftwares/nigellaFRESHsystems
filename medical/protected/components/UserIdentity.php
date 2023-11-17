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
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {
        $password   = md5($this->password);            
        $profile    = User::model()->find('UPPER(username)=?',array(strtoupper($this->username)));
        $csrf_token = Yii::app()->request->getPost('csrf_token');

        if (isset($csrf_token) && $csrf_token === Yii::app()->session['csrf_token']){
            if($profile == null){
                $this->errorCode=self::ERROR_USERNAME_INVALID;
            } else if(!$profile->validatePassword($password)){
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
                    //password not valid but don't tell user
            } else if($profile->status_id == '2'){ /* INACTIVE */
                $this->errorCode='Your account is not active.';
            } else {
                $this->errorCode = self::ERROR_NONE;
                $this->_id = $profile->id;
                $this->username = $profile->username;
                
                Yii::app()->user->setState('fullname', $profile->profile->name);
                Yii::app()->user->setState('username', $profile->username);
                Yii::app()->user->setState('role', $profile->role->name);
                Yii::app()->user->setState('user_id', $profile->id);
            }
        } else {
            throw new CHttpException(400,Yii::t('yii','Authentication token is not activated.'));
        }

        return !$this->errorCode;
    }

    /**
     * @return integer the ID of the user record
     */
    public function getId()
    {
        return $this->_id;
    }
}