<?php

/**
 * This is the model class for table "transactions".
 *
 * The followings are the available columns in table 'transactions':
 * @property integer $id
 * @property string $guid
 * @property integer $agent_id
 * @property integer $applicant_id
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $disable
 * @property double $charge
 * @property string $is_taken
 * @property integer $doctor_id
 * @property integer $doctorexam_id
 * @property integer $labexam_id
 * @property integer $xrayexam_id
 * @property integer $doctorcertify_id
 * @property integer $result
 * @property string $qrcode
 * @property string $transmit
 * @property integer $status_id
 *
 * The followings are the available model relations:
 * @property Doctorcertifies[] $doctorcertifies
 * @property Profiles $agent
 * @property Applicants $applicant
 * @property Profiles $doctor
 * @property Doctorexams $doctorexam
 * @property Labexams $labexam
 * @property Xrayexams $xrayexam
 * @property Doctorcertifies $doctorcertify
 * @property Statuses $status
 * @property Users $createdBy
 * @property Users $updatedBy
 * @property Doctorexams[] $doctorexams
 * @property Labexams[] $labexams
 * @property Xrayexams[] $xrayexams
 */
class Transaction extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'transactions';
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
			array('agent_id, applicant_id, created_by, updated_by, doctor_id, doctorexam_id, labexam_id, xrayexam_id, doctorcertify_id, status_id', 'numerical', 'integerOnly'=>true),
			array('charge', 'numerical'),
			array('guid, disable, is_taken, qrcode, transmit, result', 'length', 'max'=>255),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, guid, agent_id, applicant_id, created_at, created_by, updated_at, updated_by, disable, charge, is_taken, doctor_id, doctorexam_id, labexam_id, xrayexam_id, doctorcertify_id, result, qrcode, transmit, status_id', 'safe', 'on'=>'search'),
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
			'doctorcertifies' => array(self::HAS_MANY, 'Doctorcertify', 'transaction_id'),
			'agent' => array(self::BELONGS_TO, 'Profile', 'agent_id'),
			'applicant' => array(self::BELONGS_TO, 'Applicant', 'applicant_id'),
			'doctor' => array(self::BELONGS_TO, 'Profile', 'doctor_id'),
			'doctorexam' => array(self::BELONGS_TO, 'Doctorexam', 'doctorexam_id'),
			'labexam' => array(self::BELONGS_TO, 'Labexam', 'labexam_id'),
			'xrayexam' => array(self::BELONGS_TO, 'Xrayexam', 'xrayexam_id'),
			'doctorcertify' => array(self::BELONGS_TO, 'Doctorcertify', 'doctorcertify_id'),
			'status' => array(self::BELONGS_TO, 'Status', 'status_id'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
			'doctorexams' => array(self::HAS_MANY, 'Doctorexam', 'transaction_id'),
			'labexams' => array(self::HAS_MANY, 'Labexam', 'transaction_id'),
			'xrayexams' => array(self::HAS_MANY, 'Xrayexam', 'transaction_id'),
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
			'agent_id' => 'Agent',
			'applicant_id' => 'Applicant',
			'created_at' => 'Created At',
			'created_by' => 'Created By',
			'updated_at' => 'Updated At',
			'updated_by' => 'Updated By',
			'disable' => 'Disable',
			'charge' => 'Charge',
			'is_taken' => 'Is Taken',
			'doctor_id' => 'Doctor',
			'doctorexam_id' => 'Doctorexam',
			'labexam_id' => 'Labexam',
			'xrayexam_id' => 'Xrayexam',
			'doctorcertify_id' => 'Doctorcertify',
			'result' => 'Result',
			'qrcode' => 'Qrcode',
			'transmit' => 'Transmit',
			'status_id' => 'Status',
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
		$criteria->compare('agent_id',$this->agent_id);
		$criteria->compare('applicant_id',$this->applicant_id);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('updated_by',$this->updated_by);
		$criteria->compare('disable',$this->disable,true);
		$criteria->compare('charge',$this->charge);
		$criteria->compare('is_taken',$this->is_taken,true);
		$criteria->compare('doctor_id',$this->doctor_id);
		$criteria->compare('doctorexam_id',$this->doctorexam_id);
		$criteria->compare('labexam_id',$this->labexam_id);
		$criteria->compare('xrayexam_id',$this->xrayexam_id);
		$criteria->compare('doctorcertify_id',$this->doctorcertify_id);
		$criteria->compare('result',$this->result_id);
		$criteria->compare('qrcode',$this->qrcode,true);
		$criteria->compare('transmit',$this->transmit,true);
		$criteria->compare('status_id',$this->status_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Transaction the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
