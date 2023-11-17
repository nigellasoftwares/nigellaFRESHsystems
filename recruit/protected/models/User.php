<?php

class User extends CActiveRecord {

    public function tableName() {
        return 'users';
    }
    
    public function defaultScope()
    {
        return array(
            'condition' => "disable = 'ACTIVE'",
        );
    }
    
    public function rules() {
        return array(
            array('profile_id, role_id, status_id, created_by, updated_by', 'numerical', 'integerOnly' => true),
            array('guid, username, password, disable', 'length', 'max' => 255),
            array('created_at, updated_at', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, guid, username, password, profile_id, role_id, status_id, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on' => 'search'),
            
            array('created_at, updated_at','default', 'value'=>date('Y-m-d H:i:s'), 'setOnEmpty'=>false,'on'=>'insert'),
            array('created_by, updated_by','default', 'value'=>Yii::app()->user->getState('userid'), 'setOnEmpty'=>false,'on'=>'insert'),
            array('updated_at','default', 'value'=>date('Y-m-d H:i:s'), 'setOnEmpty'=>false,'on'=>'update'),
            array('updated_by','default', 'value'=>Yii::app()->user->getState('userid'), 'setOnEmpty'=>false,'on'=>'update'),
        );
    }

    public function relations() {
        return array(
            'genders' => array(self::HAS_MANY, 'Gender', 'created_by'),
            'genders1' => array(self::HAS_MANY, 'Gender', 'updated_by'),
            'districts' => array(self::HAS_MANY, 'District', 'created_by'),
            'districts1' => array(self::HAS_MANY, 'District', 'updated_by'),
            'profile' => array(self::BELONGS_TO, 'Profile', 'profile_id'),
            'role' => array(self::BELONGS_TO, 'Role', 'role_id'),
            'status' => array(self::BELONGS_TO, 'Status', 'status_id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
            'users' => array(self::HAS_MANY, 'User', 'created_by'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
            'users1' => array(self::HAS_MANY, 'User', 'updated_by'),
            'roles' => array(self::HAS_MANY, 'Role', 'created_by'),
            'roles1' => array(self::HAS_MANY, 'Role', 'updated_by'),
            'statuses' => array(self::HAS_MANY, 'Status', 'created_by'),
            'statuses1' => array(self::HAS_MANY, 'Status', 'updated_by'),
            'maritals' => array(self::HAS_MANY, 'Marital', 'created_by'),
            'maritals1' => array(self::HAS_MANY, 'Marital', 'updated_by'),
            'companies' => array(self::HAS_MANY, 'Company', 'created_by'),
            'companies1' => array(self::HAS_MANY, 'Company', 'updated_by'),
            'passports' => array(self::HAS_MANY, 'Passport', 'created_by'),
            'passports1' => array(self::HAS_MANY, 'Passport', 'updated_by'),
            'profiles' => array(self::HAS_MANY, 'Profile', 'created_by'),
            'profiles1' => array(self::HAS_MANY, 'Profile', 'updated_by'),
            'workers' => array(self::HAS_MANY, 'Worker', 'created_by'),
            'workers1' => array(self::HAS_MANY, 'Worker', 'updated_by'),
            'transactions' => array(self::HAS_MANY, 'Transaction', 'sourceagency_id'),
            'transactions1' => array(self::HAS_MANY, 'Transactions', 'localagency_id'),
            'transactions2' => array(self::HAS_MANY, 'Transaction', 'employer_id'),
            'transactions3' => array(self::HAS_MANY, 'Transaction', 'created_by'),
            'transactions4' => array(self::HAS_MANY, 'Transactions', 'updated_by'),
            'nationalities' => array(self::HAS_MANY, 'Nationality', 'created_by'),
            'nationalities1' => array(self::HAS_MANY, 'Nationality', 'updated_by'),
            'educations' => array(self::HAS_MANY, 'Education', 'created_by'),
            'educations1' => array(self::HAS_MANY, 'Education', 'updated_by'),
            'states' => array(self::HAS_MANY, 'State', 'created_by'),
            'states1' => array(self::HAS_MANY, 'State', 'updated_by'),
            'quota' => array(self::HAS_MANY, 'Quota', 'employer_id'),
        );
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public static function hashing($pass){
        return password_hash($pass, PASSWORD_BCRYPT, ['cost' => 8]);
    }

    public function passwordVerify($pass){        
        return password_verify($pass, $this->password);
    }

    public function validatePassword($password)
    {

        if ($password == $this->password) {
            return true;
        } else {
            return false;
        }

//      return CPasswordHelper::verifyPassword($password,$this->password);
//      if($password != $this->password){
//          return false;
//      } else {
//          return true;
//      }
    }

    public function hashPassword($password)
    {
        return CPasswordHelper::hashPassword($password);
    }
}
