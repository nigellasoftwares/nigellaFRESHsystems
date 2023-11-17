<?php

class RecruitTransaction extends CActiveRecord {

    public function tableName() {
        return 'transactions';
    }

    public function getDbConnection() {
        return Yii::app()->dbrecruit;
    }

    public function rules() {
        return array(
            array('worker_id, sourceagency_id, localagency_id, employer_id, passport_id, created_by, updated_by', 'numerical', 'integerOnly' => true),
            array('code, guid, flight_number, eta_malaysia, medical, visa, status, disable', 'length', 'max' => 255),
            array('arrival_date, plks_expiry_date, flight_date, created_at, updated_at', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, code, guid, worker_id, sourceagency_id, localagency_id, employer_id, passport_id, arrival_date, plks_expiry_date, flight_number, eta_malaysia, flight_date, medical, visa, status, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on' => 'search'),
            
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