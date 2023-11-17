<?php

/**
 * This is the model class for table "occupations".
 *
 * The followings are the available columns in table 'occupations':
 * @property integer $id
 * @property integer $applicant_id
 * @property integer $occupationtype_id
 * @property string $position
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $disable
 *
 * The followings are the available model relations:
 * @property Applicants $applicant
 * @property Occupationtypes $occupationtype
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class Occupation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'occupations';
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
			array('applicant_id, occupationtype_id, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('position, disable', 'length', 'max'=>255),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, applicant_id, occupationtype_id, position, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on'=>'search'),
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
			'occupationtype' => array(self::BELONGS_TO, 'Occupationtype', 'occupationtype_id'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Occupation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
