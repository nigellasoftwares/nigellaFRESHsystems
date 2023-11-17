<?php

/**
 * This is the model class for table "statuses".
 *
 * The followings are the available columns in table 'statuses':
 * @property integer $id
 * @property string $guid
 * @property string $name
 * @property string $initial
 * @property string $type
 * @property string $order_number
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $disable
 *
 * The followings are the available model relations:
 * @property Topups[] $topups
 * @property Topups[] $topups1
 * @property Topups[] $topups2
 * @property Topups[] $topups3
 * @property Dependants[] $dependants
 * @property Dependants[] $dependants1
 * @property Dependants[] $dependants2
 * @property Dependants[] $dependants3
 * @property Dependants[] $dependants4
 * @property Dependants[] $dependants5
 * @property Balances[] $balances
 * @property Profiles[] $profiles
 * @property Users[] $users
 * @property Users[] $users1
 * @property Users $createdBy
 * @property Users $updatedBy
 * @property Applicants[] $applicants
 * @property Applicants[] $applicants1
 * @property Applicants[] $applicants2
 * @property Applicants[] $applicants3
 * @property Applicants[] $applicants4
 * @property Applicants[] $applicants5
 * @property Applicants[] $applicants6
 */
class Status extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'statuses';
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
			array('name, initial, type, order_number, disable', 'length', 'max'=>255),
			array('guid, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, guid, name, initial, type, order_number, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on'=>'search'),
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
			'topups' => array(self::HAS_MANY, 'Topup', 'bank_id'),
			'topups1' => array(self::HAS_MANY, 'Topup', 'location_id'),
			'topups2' => array(self::HAS_MANY, 'Topup', 'account_id'),
			'topups3' => array(self::HAS_MANY, 'Topup', 'status_id'),
			'dependants' => array(self::HAS_MANY, 'Dependant', 'gender_id'),
			'dependants1' => array(self::HAS_MANY, 'Dependant', 'nationality_id'),
			'dependants2' => array(self::HAS_MANY, 'Dependant', 'district_id'),
			'dependants3' => array(self::HAS_MANY, 'Dependant', 'relation_id'),
			'dependants4' => array(self::HAS_MANY, 'Dependant', 'passport_status_id'),
			'dependants5' => array(self::HAS_MANY, 'Dependant', 'status_id'),
			'balances' => array(self::HAS_MANY, 'Balance', 'status_id'),
			'profiles' => array(self::HAS_MANY, 'Profile', 'status_id'),
			'users' => array(self::HAS_MANY, 'User', 'role_id'),
			'users1' => array(self::HAS_MANY, 'User', 'status_id'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
			'applicants' => array(self::HAS_MANY, 'Applicant', 'gender_id'),
			'applicants1' => array(self::HAS_MANY, 'Applicant', 'nationality_id'),
			'applicants2' => array(self::HAS_MANY, 'Applicant', 'job_id'),
			'applicants3' => array(self::HAS_MANY, 'Applicant', 'district_id'),
			'applicants4' => array(self::HAS_MANY, 'Applicant', 'employer_district_id'),
			'applicants5' => array(self::HAS_MANY, 'Applicant', 'passport_status_id'),
			'applicants6' => array(self::HAS_MANY, 'Applicant', 'status_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'guid' => 'Guid',
			'name' => 'Name',
			'initial' => 'Initial',
			'type' => 'Type',
			'order_number' => 'Order Number',
			'created_at' => 'Created At',
			'created_by' => 'Created By',
			'updated_at' => 'Updated At',
			'updated_by' => 'Updated By',
			'disable' => 'Disable',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('guid',$this->guid,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('initial',$this->initial,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('order_number',$this->order_number,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('updated_by',$this->updated_by);
		$criteria->compare('disable',$this->disable,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Status the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
