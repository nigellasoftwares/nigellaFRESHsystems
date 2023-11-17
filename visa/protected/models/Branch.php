<?php

/**
 * This is the model class for table "branches".
 *
 * The followings are the available columns in table 'branches':
 * @property integer $id
 * @property integer $user_id
 * @property integer $admin_id
 * @property string $comment
 * @property string $status
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $disable
 *
 * The followings are the available model relations:
 * @property Payments[] $payments
 * @property Batches[] $batches
 * @property Passportscans[] $passportscans
 * @property Applicants[] $applicants
 * @property Users[] $users
 * @property Users $user
 * @property Admins $admin
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class Branch extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'branches';
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
			array('user_id, admin_id, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('status, disable', 'length', 'max'=>255),
			array('comment, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, admin_id, comment, status, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on'=>'search'),
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
			'payments' => array(self::HAS_MANY, 'Payment', 'branch_id'),
			'batches' => array(self::HAS_MANY, 'Batch', 'branch_id'),
			'passportscans' => array(self::HAS_MANY, 'Passportscan', 'branch_id'),
			'applicants' => array(self::HAS_MANY, 'Applicant', 'branch_id'),
			'users' => array(self::HAS_MANY, 'User', 'branch_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'admin' => array(self::BELONGS_TO, 'Admin', 'admin_id'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Branch the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
