<?php

/**
 * This is the model class for table "companies".
 *
 * The followings are the available columns in table 'companies':
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $register_number
 * @property string $address
 * @property string $zipcode
 * @property string $contact_number1
 * @property string $contact_number2
 * @property string $person_incharge
 * @property string $mobile_number1
 * @property string $mobile_number2
 * @property string $email
 * @property string $comment
 * @property string $status
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $disable
 *
 * The followings are the available model relations:
 * @property Users $createdBy
 * @property Users $updatedBy
 * @property Profiles[] $profiles
 */
class Company extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'companies';
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
			array('code, name, register_number, zipcode, contact_number1, contact_number2, person_incharge, mobile_number1, mobile_number2, status, disable', 'length', 'max'=>255),
			array('address, email, comment, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, code, name, register_number, address, zipcode, contact_number1, contact_number2, person_incharge, mobile_number1, mobile_number2, email, comment, status, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on'=>'search'),
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
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
			'profiles' => array(self::HAS_MANY, 'Profile', 'company_id'),
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Company the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
