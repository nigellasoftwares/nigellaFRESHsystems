<?php

/**
 * This is the model class for table "itenaries".
 *
 * The followings are the available columns in table 'itenaries':
 * @property integer $id
 * @property integer $applicant_id
 * @property string $name
 * @property string $date
 * @property string $address
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $disable
 *
 * The followings are the available model relations:
 * @property Applicants $applicant
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class Itenary extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'itenaries';
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
			array('applicant_id, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('name, disable', 'length', 'max'=>255),
			array('date, address, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, applicant_id, name, date, address, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on'=>'search'),
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
			'applicant' => array(self::BELONGS_TO, 'Applicant', 'applicant_id'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Itenary the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
