<?php

/**
 * This is the model class for table "applicants".
 *
 * The followings are the available columns in table 'applicants':
 * @property integer $id
 * @property string $guid
 * @property string $given_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $birth_date
 * @property integer $gender_id
 * @property integer $nationality_id
 * @property integer $job_id
 * @property string $address1
 * @property string $address2
 * @property string $address3
 * @property integer $district_id
 * @property string $contact_number
 * @property string $employer_name
 * @property string $employer_address1
 * @property string $employer_address2
 * @property string $employer_address3
 * @property integer $employer_district_id
 * @property string $employer_contact_number
 * @property string $passport_number
 * @property integer $passport_status_id
 * @property string $passport_issue_date
 * @property string $passport_expiry_date
 * @property string $passport_issue_place
 * @property string $passport_entry_point
 * @property string $plks_number
 * @property string $bpa_number
 * @property string $plks_issue_date
 * @property string $plks_expiry_date
 * @property string $passport_upload
 * @property string $birth_upload
 * @property string $marriage_upload
 * @property string $imm13_upload
 * @property string $other_upload
 * @property string $is_synchronize
 * @property string $status
 * @property integer $status_id
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $disable
 *
 * The followings are the available model relations:
 * @property Dependants[] $dependants
 * @property Transactions[] $transactions
 * @property Statuses $gender
 * @property Statuses $nationality
 * @property Statuses $job
 * @property Statuses $district
 * @property Statuses $employerDistrict
 * @property Statuses $passportStatus
 * @property Statuses $status0
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class Applicant extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'applicants';
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
			array('gender_id, nationality_id, job_id, district_id, employer_district_id, passport_status_id, status_id, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('guid, given_name, middle_name, last_name, address1, address2, address3, contact_number, employer_name, employer_address1, employer_address2, employer_address3, employer_contact_number, passport_number, passport_issue_place, passport_entry_point, plks_number, bpa_number, passport_upload, birth_upload, marriage_upload, imm13_upload, other_upload, is_synchronize, status, disable', 'length', 'max'=>255),
			array('birth_date, passport_issue_date, passport_expiry_date, plks_issue_date, plks_expiry_date, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, guid, given_name, middle_name, last_name, birth_date, gender_id, nationality_id, job_id, address1, address2, address3, district_id, contact_number, employer_name, employer_address1, employer_address2, employer_address3, employer_district_id, employer_contact_number, passport_number, passport_status_id, passport_issue_date, passport_expiry_date, passport_issue_place, passport_entry_point, plks_number, bpa_number, plks_issue_date, plks_expiry_date, passport_upload, birth_upload, marriage_upload, imm13_upload, other_upload, is_synchronize, status, status_id, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on'=>'search'),
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
			'dependants' => array(self::HAS_MANY, 'Dependant', 'applicant_id'),
			'transactions' => array(self::HAS_MANY, 'Transaction', 'applicant_id'),
			'gender' => array(self::BELONGS_TO, 'Status', 'gender_id'),
			'nationality' => array(self::BELONGS_TO, 'Status', 'nationality_id'),
			'job' => array(self::BELONGS_TO, 'Status', 'job_id'),
			'district' => array(self::BELONGS_TO, 'Status', 'district_id'),
			'employerDistrict' => array(self::BELONGS_TO, 'Status', 'employer_district_id'),
			'passportStatus' => array(self::BELONGS_TO, 'Status', 'passport_status_id'),
			'status0' => array(self::BELONGS_TO, 'Status', 'status_id'),
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
			'guid' => 'Guid',
			'given_name' => 'Given Name',
			'middle_name' => 'Middle Name',
			'last_name' => 'Last Name',
			'birth_date' => 'Birth Date',
			'gender_id' => 'Gender',
			'nationality_id' => 'Nationality',
			'job_id' => 'Job',
			'address1' => 'Address1',
			'address2' => 'Address2',
			'address3' => 'Address3',
			'district_id' => 'District',
			'contact_number' => 'Contact Number',
			'employer_name' => 'Employer Name',
			'employer_address1' => 'Employer Address1',
			'employer_address2' => 'Employer Address2',
			'employer_address3' => 'Employer Address3',
			'employer_district_id' => 'Employer District',
			'employer_contact_number' => 'Employer Contact Number',
			'passport_number' => 'Passport Number',
			'passport_status_id' => 'Passport Status',
			'passport_issue_date' => 'Passport Issue Date',
			'passport_expiry_date' => 'Passport Expiry Date',
			'passport_issue_place' => 'Passport Issue Place',
			'passport_entry_point' => 'Passport Entry Point',
			'plks_number' => 'Plks Number',
			'bpa_number' => 'Bpa Number',
			'plks_issue_date' => 'Plks Issue Date',
			'plks_expiry_date' => 'Plks Expiry Date',
			'passport_upload' => 'Passport Upload',
			'birth_upload' => 'Birth Upload',
			'marriage_upload' => 'Marriage Upload',
			'imm13_upload' => 'Imm13 Upload',
			'other_upload' => 'Other Upload',
			'is_synchronize' => 'Is Synchronize',
			'status' => 'Status',
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
		$criteria->compare('guid',$this->guid,true);
		$criteria->compare('given_name',$this->given_name,true);
		$criteria->compare('middle_name',$this->middle_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('birth_date',$this->birth_date,true);
		$criteria->compare('gender_id',$this->gender_id);
		$criteria->compare('nationality_id',$this->nationality_id);
		$criteria->compare('job_id',$this->job_id);
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('address3',$this->address3,true);
		$criteria->compare('district_id',$this->district_id);
		$criteria->compare('contact_number',$this->contact_number,true);
		$criteria->compare('employer_name',$this->employer_name,true);
		$criteria->compare('employer_address1',$this->employer_address1,true);
		$criteria->compare('employer_address2',$this->employer_address2,true);
		$criteria->compare('employer_address3',$this->employer_address3,true);
		$criteria->compare('employer_district_id',$this->employer_district_id);
		$criteria->compare('employer_contact_number',$this->employer_contact_number,true);
		$criteria->compare('passport_number',$this->passport_number,true);
		$criteria->compare('passport_status_id',$this->passport_status_id);
		$criteria->compare('passport_issue_date',$this->passport_issue_date,true);
		$criteria->compare('passport_expiry_date',$this->passport_expiry_date,true);
		$criteria->compare('passport_issue_place',$this->passport_issue_place,true);
		$criteria->compare('passport_entry_point',$this->passport_entry_point,true);
		$criteria->compare('plks_number',$this->plks_number,true);
		$criteria->compare('bpa_number',$this->bpa_number,true);
		$criteria->compare('plks_issue_date',$this->plks_issue_date,true);
		$criteria->compare('plks_expiry_date',$this->plks_expiry_date,true);
		$criteria->compare('passport_upload',$this->passport_upload,true);
		$criteria->compare('birth_upload',$this->birth_upload,true);
		$criteria->compare('marriage_upload',$this->marriage_upload,true);
		$criteria->compare('imm13_upload',$this->imm13_upload,true);
		$criteria->compare('other_upload',$this->other_upload,true);
		$criteria->compare('is_synchronize',$this->is_synchronize,true);
		$criteria->compare('status',$this->status,true);
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
	 * @return Applicant the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
