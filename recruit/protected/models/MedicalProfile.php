<?php

class MedicalProfile extends CActiveRecord {

    public function tableName() {
        return 'profiles';
    }

    public function getDbConnection() {
        return Yii::app()->dbmedical;
    }

    public function rules() {
        return array(
            array('status_id, created_by, updated_by', 'numerical', 'integerOnly' => true),
            array('code, type, name, initial, company, comment, disable', 'length', 'max' => 255),
            array('created_at, updated_at', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, code, type, name, initial, company, comment, status_id, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on' => 'search'),
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
