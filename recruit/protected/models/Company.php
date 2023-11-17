<?php

class Company extends CActiveRecord {

    public function tableName() {
        return 'companies';
    }
    
    public function defaultScope()
    {
        return array(
            'condition' => "disable = 'ACTIVE'",
        );
    }
    
    public function rules() {
        return array(
            array('district_id, state_id, created_by, updated_by', 'numerical', 'integerOnly' => true),
            array('code, guid, name, register_number, address1, address2, address3, address4, postcode, district, contact_number1, contact_number2, person_incharge, mobile_number1, mobile_number2, status, disable', 'length', 'max' => 255),
            array('address, email, person_email, remark, created_at, updated_at', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, code, guid, name, register_number, address, address1, address2, address3, address4, postcode, district, district_id, state_id, contact_number1, contact_number2, email, person_incharge, mobile_number1, mobile_number2, person_email, remark, status, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on' => 'search'),
            
            array('created_at, updated_at','default', 'value'=>date('Y-m-d H:i:s'), 'setOnEmpty'=>false,'on'=>'insert'),
            array('created_by, updated_by','default', 'value'=>Yii::app()->user->getState('userid'), 'setOnEmpty'=>false,'on'=>'insert'),
            array('updated_at','default', 'value'=>date('Y-m-d H:i:s'), 'setOnEmpty'=>false,'on'=>'update'),
            array('updated_by','default', 'value'=>Yii::app()->user->getState('userid'), 'setOnEmpty'=>false,'on'=>'update'),
        );
    }

    public function relations() {
        return array(
            'profiles' => array(self::HAS_MANY, 'Profile', 'company_id'),
            'district0' => array(self::BELONGS_TO, 'District', 'district_id'),
            'state' => array(self::BELONGS_TO, 'State', 'state_id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
            'country' => array(self::BELONGS_TO, 'Nationality', 'country_id'),
        );
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
