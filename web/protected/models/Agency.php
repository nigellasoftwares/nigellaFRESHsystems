<?php

class Agency extends CActiveRecord {

    public function tableName() {
        return 'agencies';
    }

    public function rules() {
        return array(
            array('rlno', 'numerical', 'integerOnly' => true),
            array('name, owner, position, mobile', 'length', 'max' => 255),
            array('address, tel', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, rlno, address, tel, owner, position, mobile', 'safe', 'on' => 'search'),
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
