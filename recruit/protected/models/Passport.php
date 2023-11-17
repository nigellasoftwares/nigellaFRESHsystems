<?php

class Passport extends CActiveRecord {

    public function tableName() {
        return 'passports';
    }
    
    public function defaultScope()
    {
        return array(
            'condition' => "disable = 'ACTIVE'",
        );
    }
    
    public function rules() {
        return array(
            array('transaction_id, worker_id, created_by, updated_by', 'numerical', 'integerOnly' => true),
            array('number, issue_place, status, disable', 'length', 'max' => 255),
            array('issue_date, expiry_date, created_at, updated_at', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, transaction_id, worker_id, number, issue_place, issue_date, expiry_date, status, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on' => 'search'),
            
            array('created_at, updated_at','default', 'value'=>date('Y-m-d H:i:s'), 'setOnEmpty'=>false,'on'=>'insert'),
            array('created_by, updated_by','default', 'value'=>Yii::app()->user->getState('userid'), 'setOnEmpty'=>false,'on'=>'insert'),
            array('updated_at','default', 'value'=>date('Y-m-d H:i:s'), 'setOnEmpty'=>false,'on'=>'update'),
            array('updated_by','default', 'value'=>Yii::app()->user->getState('userid'), 'setOnEmpty'=>false,'on'=>'update'),
        );
    }

    public function relations() {
        return array(
            'transaction' => array(self::BELONGS_TO, 'Transaction', 'transaction_id'),
            'worker' => array(self::BELONGS_TO, 'Worker', 'worker_id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
            'transactions' => array(self::HAS_MANY, 'Transaction', 'passport_id'),
        );
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
