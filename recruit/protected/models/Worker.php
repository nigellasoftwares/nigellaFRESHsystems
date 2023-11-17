<?php

class Worker extends CActiveRecord {

    public function tableName() {
        return 'workers';
    }
    
    public function defaultScope()
    {
        return array(
            'condition' => "disable = 'ACTIVE'",
        );
    }
    
    public function rules() {
        return array(
            array('gender_id, nationality_id, jobsector_id, marital_id, created_by, updated_by', 'numerical', 'integerOnly' => true),
            array('code, guid, full_name, first_name, middle_name, last_name, birth_place, national_card, education_other, employer_name, employer_phone, employer_zipcode, home_zipcode, home_phone, home_mobile, marital_other, status, disable', 'length', 'max' => 255),
            array('birth_date, employer_address, home_address, email, location_visa_apply, created_at, updated_at', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, code, guid, full_name, first_name, middle_name, last_name, gender_id, birth_date, birth_place, nationality_id, national_card, jobsector_id, education_other, employer_name, employer_phone, employer_address, employer_zipcode, home_address, home_zipcode, home_phone, home_mobile, email, marital_id, marital_other, location_visa_apply, status, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on' => 'search'),
            
            array('created_at, updated_at','default', 'value'=>date('Y-m-d H:i:s'), 'setOnEmpty'=>false,'on'=>'insert'),
            array('created_by, updated_by','default', 'value'=>Yii::app()->user->getState('userid'), 'setOnEmpty'=>false,'on'=>'insert'),
            array('updated_at','default', 'value'=>date('Y-m-d H:i:s'), 'setOnEmpty'=>false,'on'=>'update'),
            array('updated_by','default', 'value'=>Yii::app()->user->getState('userid'), 'setOnEmpty'=>false,'on'=>'update'),
        );
    }

    public function relations() {
        return array(
            'passports' => array(self::HAS_MANY, 'Passport', 'worker_id'),
            'gender' => array(self::BELONGS_TO, 'Gender', 'gender_id'),
            'nationality' => array(self::BELONGS_TO, 'Nationality', 'nationality_id'),
            'jobsector' => array(self::BELONGS_TO, 'Jobsector', 'jobsector_id'),
            'marital' => array(self::BELONGS_TO, 'Marital', 'marital_id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
            'transactions' => array(self::HAS_MANY, 'Transaction', 'worker_id'),
            'educations' => array(self::HAS_MANY, 'Education', 'worker_id'),
			'relation' => array(self::BELONGS_TO, 'Relation', 'relation_id'),
        );
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
