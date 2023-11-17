<?php

/**
 * This is the model class for table "occupationtypes".
 *
 * The followings are the available columns in table 'occupationtypes':
 * @property integer $id
 * @property string $name
 * @property string $order_number
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $disable
 *
 * The followings are the available model relations:
 * @property Occupations[] $occupations
 * @property Families[] $families
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class Occupationtype extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'occupationtypes';
	}
        
        public function defaultScope()
        {
            return array(
                'condition' => "disable = 'ACTIVE'",
            );
        }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('name, order_number, disable', 'length', 'max'=>255),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, order_number, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'occupations' => array(self::HAS_MANY, 'Occupation', 'occupationtype_id'),
			'families' => array(self::HAS_MANY, 'Family', 'occupationtype_id'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Occupationtype the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
