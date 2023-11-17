<?php

class Local extends CActiveRecord {

    public function tableName() {
        return 'locals';
    }

    public function rules() {
        return array(
            array('name, rocno, jtkno, owner, position, mobile', 'length', 'max' => 255),
            array('address', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, rocno, jtkno, address, owner, position, mobile', 'safe', 'on' => 'search'),
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
