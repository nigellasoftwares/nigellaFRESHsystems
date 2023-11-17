<?php

class Training extends CActiveRecord {

    public function tableName() {
        return 'trainings';
    }

    public function rules() {
        return array(
            array('name, license, owner, tel', 'length', 'max' => 255),
            array('address', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, license, address, owner, tel', 'safe', 'on' => 'search'),
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
