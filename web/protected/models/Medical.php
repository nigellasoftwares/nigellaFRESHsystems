<?php

class Medical extends CActiveRecord {

    public function tableName() {
        return 'medicals';
    }

    public function rules() {
        return array(
            array('name, code, owner, tel', 'length', 'max' => 255),
            array('address', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, code, address, owner, tel', 'safe', 'on' => 'search'),
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
