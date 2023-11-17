<?php

class RecruitWorker extends CActiveRecord {

    public function tableName() {
        return 'workers';
    }

    public function getDbConnection() {
        return Yii::app()->dbrecruit;
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
        );
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}