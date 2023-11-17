<?php

/**
 * This is the model class for table "labexams".
 *
 * The followings are the available columns in table 'labexams':
 * @property integer $id
 * @property integer $transaction_id
 * @property integer $doctor_id
 * @property string $overdue
 * @property string $specimen_date
 * @property string $blood_group
 * @property string $blood_group_rh
 * @property string $blood_hiv
 * @property string $blood_hbsag
 * @property string $blood_vdrl
 * @property string $blood_tpha
 * @property string $blood_malaria
 * @property string $urine_opiates
 * @property string $urine_cannabis
 * @property string $urine_pregnancy
 * @property string $urine_color
 * @property string $urine_gravity
 * @property string $urine_sugar
 * @property string $urine_sugar_level
 * @property string $urine_sugar_moles
 * @property string $urine_albumin
 * @property string $urine_albumin_level
 * @property string $urine_albumin_moles
 * @property string $urine_microscopic
 * @property string $reason_if_abnormal
 * @property string $report_date
 * @property string $certify
 * @property string $read
 * @property integer $status_id
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $disable
 *
 * The followings are the available model relations:
 * @property Transactions[] $transactions
 * @property Transactions $transaction
 * @property Profiles $doctor
 * @property Statuses $status
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class Labexam extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'labexams';
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
			array('transaction_id, doctor_id, status_id, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('overdue, blood_group, blood_group_rh, blood_hiv, blood_hbsag, blood_vdrl, blood_tpha, blood_malaria, urine_opiates, urine_cannabis, urine_pregnancy, urine_color, urine_gravity, urine_sugar, urine_sugar_level, urine_sugar_moles, urine_albumin, urine_albumin_level, urine_albumin_moles, urine_microscopic, certify, read, disable', 'length', 'max'=>255),
			array('specimen_date, reason_if_abnormal, report_date, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, transaction_id, doctor_id, overdue, specimen_date, blood_group, blood_group_rh, blood_hiv, blood_hbsag, blood_vdrl, blood_tpha, blood_malaria, urine_opiates, urine_cannabis, urine_pregnancy, urine_color, urine_gravity, urine_sugar, urine_sugar_level, urine_sugar_moles, urine_albumin, urine_albumin_level, urine_albumin_moles, urine_microscopic, reason_if_abnormal, report_date, certify, read, status_id, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on'=>'search'),
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
			'transactions' => array(self::HAS_MANY, 'Transaction', 'labexam_id'),
			'transaction' => array(self::BELONGS_TO, 'Transaction', 'transaction_id'),
			'doctor' => array(self::BELONGS_TO, 'Profile', 'doctor_id'),
			'status' => array(self::BELONGS_TO, 'Status', 'status_id'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'transaction_id' => 'Transaction',
			'doctor_id' => 'Doctor',
			'overdue' => 'Overdue',
			'specimen_date' => 'Specimen Date',
			'blood_group' => 'Blood Group',
			'blood_group_rh' => 'Blood Group Rh',
			'blood_hiv' => 'Blood Hiv',
			'blood_hbsag' => 'Blood Hbsag',
			'blood_vdrl' => 'Blood Vdrl',
			'blood_tpha' => 'Blood Tpha',
			'blood_malaria' => 'Blood Malaria',
			'urine_opiates' => 'Urine Opiates',
			'urine_cannabis' => 'Urine Cannabis',
			'urine_pregnancy' => 'Urine Pregnancy',
			'urine_color' => 'Urine Color',
			'urine_gravity' => 'Urine Gravity',
			'urine_sugar' => 'Urine Sugar',
			'urine_sugar_level' => 'Urine Sugar Level',
			'urine_sugar_moles' => 'Urine Sugar Moles',
			'urine_albumin' => 'Urine Albumin',
			'urine_albumin_level' => 'Urine Albumin Level',
			'urine_albumin_moles' => 'Urine Albumin Moles',
			'urine_microscopic' => 'Urine Microscopic',
			'reason_if_abnormal' => 'Reason If Abnormal',
			'report_date' => 'Report Date',
			'certify' => 'Certify',
			'read' => 'Read',
			'status_id' => 'Status',
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
		$criteria->compare('transaction_id',$this->transaction_id);
		$criteria->compare('doctor_id',$this->doctor_id);
		$criteria->compare('overdue',$this->overdue,true);
		$criteria->compare('specimen_date',$this->specimen_date,true);
		$criteria->compare('blood_group',$this->blood_group,true);
		$criteria->compare('blood_group_rh',$this->blood_group_rh,true);
		$criteria->compare('blood_hiv',$this->blood_hiv,true);
		$criteria->compare('blood_hbsag',$this->blood_hbsag,true);
		$criteria->compare('blood_vdrl',$this->blood_vdrl,true);
		$criteria->compare('blood_tpha',$this->blood_tpha,true);
		$criteria->compare('blood_malaria',$this->blood_malaria,true);
		$criteria->compare('urine_opiates',$this->urine_opiates,true);
		$criteria->compare('urine_cannabis',$this->urine_cannabis,true);
		$criteria->compare('urine_pregnancy',$this->urine_pregnancy,true);
		$criteria->compare('urine_color',$this->urine_color,true);
		$criteria->compare('urine_gravity',$this->urine_gravity,true);
		$criteria->compare('urine_sugar',$this->urine_sugar,true);
		$criteria->compare('urine_sugar_level',$this->urine_sugar_level,true);
		$criteria->compare('urine_sugar_moles',$this->urine_sugar_moles,true);
		$criteria->compare('urine_albumin',$this->urine_albumin,true);
		$criteria->compare('urine_albumin_level',$this->urine_albumin_level,true);
		$criteria->compare('urine_albumin_moles',$this->urine_albumin_moles,true);
		$criteria->compare('urine_microscopic',$this->urine_microscopic,true);
		$criteria->compare('reason_if_abnormal',$this->reason_if_abnormal,true);
		$criteria->compare('report_date',$this->report_date,true);
		$criteria->compare('certify',$this->certify,true);
		$criteria->compare('read',$this->read,true);
		$criteria->compare('status_id',$this->status_id);
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
	 * @return Labexam the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
