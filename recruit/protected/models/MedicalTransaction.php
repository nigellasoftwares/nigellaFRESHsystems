<?php

class MedicalTransaction extends CActiveRecord {

    public function tableName() {
        return 'transactions';
    }

    public function getDbConnection() {
        return Yii::app()->dbmedical;
    }

    public function rules() {
        return array(
			array('agent_id, applicant_id, created_by, updated_by, doctor_id, doctorexam_id, labexam_id, xrayexam_id, doctorcertify_id, status_id', 'numerical', 'integerOnly'=>true),
			array('charge', 'numerical'),
			array('guid, disable, is_taken, qrcode, transmit, result', 'length', 'max'=>255),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, guid, agent_id, applicant_id, created_at, created_by, updated_at, updated_by, disable, charge, is_taken, doctor_id, doctorexam_id, labexam_id, xrayexam_id, doctorcertify_id, result, qrcode, transmit, status_id', 'safe', 'on'=>'search'),
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