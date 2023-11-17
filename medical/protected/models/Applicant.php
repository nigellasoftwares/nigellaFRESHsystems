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
 * @property string $district
 * @property string $contact_number
 * @property string $employer_name
 * @property string $employer_address1
 * @property string $employer_address2
 * @property string $employer_address3
 * @property string $employer_district
 * @property string $employer_contact_number
 * @property string $passport_number
 * @property integer $passport_status_id
 * @property string $passport_issue_date
 * @property string $passport_expiry_date
 * @property string $passport_issue_place
 * @property string $passport_entry_point
 * @property string $passport_upload
 * @property string $birth_upload
 * @property string $marriage_upload
 * @property string $national_upload
 * @property string $other_upload
 * @property string $is_synchronize
 * @property string $status
 * @property integer $status_id
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $disable
 * @property string $nextofkin_given_name
 * @property string $nextofkin_middle_name
 * @property string $nextofkin_last_name
 * @property string $nextofkin_address1
 * @property string $nextofkin_address2
 * @property string $nextofkin_address3
 * @property string $nextofkin_district
 * @property integer $nextofkin_relation_id
 * @property integer $nextofkin_gender_id
 * @property integer $nextofkin_nationality_id
 * @property string $nextofkin_birth_date
 * @property string $nextofkin_contact_number
 *
 * The followings are the available model relations:
 * @property Statuses $gender
 * @property Statuses $nationality
 * @property Statuses $job
 * @property Statuses $passportStatus
 * @property Statuses $status0
 * @property Users $createdBy
 * @property Users $updatedBy
 * @property Statuses $nextofkinRelation
 * @property Statuses $nextofkinGender
 * @property Statuses $nextofkinNationality
 * @property Transactions[] $transactions
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
			array('gender_id, nationality_id, job_id, passport_status_id, status_id, created_by, updated_by, nextofkin_relation_id, nextofkin_gender_id, nextofkin_nationality_id', 'numerical', 'integerOnly'=>true),
			array('guid, given_name, middle_name, last_name, address1, address2, address3, district, contact_number, employer_name, employer_address1, employer_address2, employer_address3, employer_district, employer_contact_number, passport_number, passport_issue_place, passport_entry_point, passport_upload, birth_upload, marriage_upload, national_upload, other_upload, is_synchronize, status, disable, nextofkin_given_name, nextofkin_middle_name, nextofkin_last_name, nextofkin_address1, nextofkin_address2, nextofkin_address3, nextofkin_district', 'length', 'max'=>255),
			array('birth_date, passport_issue_date, passport_expiry_date, created_at, updated_at, nextofkin_birth_date, nextofkin_contact_number', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, guid, given_name, middle_name, last_name, birth_date, gender_id, nationality_id, job_id, address1, address2, address3, district, contact_number, employer_name, employer_address1, employer_address2, employer_address3, employer_district, employer_contact_number, passport_number, passport_status_id, passport_issue_date, passport_expiry_date, passport_issue_place, passport_entry_point, passport_upload, birth_upload, marriage_upload, national_upload, other_upload, is_synchronize, status, status_id, created_at, created_by, updated_at, updated_by, disable, nextofkin_given_name, nextofkin_middle_name, nextofkin_last_name, nextofkin_address1, nextofkin_address2, nextofkin_address3, nextofkin_district, nextofkin_relation_id, nextofkin_gender_id, nextofkin_nationality_id, nextofkin_birth_date, nextofkin_contact_number', 'safe', 'on'=>'search'),
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
			'gender' => array(self::BELONGS_TO, 'Status', 'gender_id'),
			'nationality' => array(self::BELONGS_TO, 'Status', 'nationality_id'),
			'job' => array(self::BELONGS_TO, 'Status', 'job_id'),
			'passportStatus' => array(self::BELONGS_TO, 'Status', 'passport_status_id'),
			'status0' => array(self::BELONGS_TO, 'Status', 'status_id'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
			'nextofkinRelation' => array(self::BELONGS_TO, 'Status', 'nextofkin_relation_id'),
			'nextofkinGender' => array(self::BELONGS_TO, 'Status', 'nextofkin_gender_id'),
			'nextofkinNationality' => array(self::BELONGS_TO, 'Status', 'nextofkin_nationality_id'),
			'transactions' => array(self::HAS_MANY, 'Transaction', 'applicant_id'),
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
			'district' => 'District',
			'contact_number' => 'Contact Number',
			'employer_name' => 'Employer Name',
			'employer_address1' => 'Employer Address1',
			'employer_address2' => 'Employer Address2',
			'employer_address3' => 'Employer Address3',
			'employer_district' => 'Employer District',
			'employer_contact_number' => 'Employer Contact Number',
			'passport_number' => 'Passport Number',
			'passport_status_id' => 'Passport Status',
			'passport_issue_date' => 'Passport Issue Date',
			'passport_expiry_date' => 'Passport Expiry Date',
			'passport_issue_place' => 'Passport Issue Place',
			'passport_entry_point' => 'Passport Entry Point',
			'passport_upload' => 'Passport Upload',
			'birth_upload' => 'Birth Upload',
			'marriage_upload' => 'Marriage Upload',
			'national_upload' => 'National Upload',
			'other_upload' => 'Other Upload',
			'is_synchronize' => 'Is Synchronize',
			'status' => 'Status',
			'status_id' => 'Status',
			'created_at' => 'Created At',
			'created_by' => 'Created By',
			'updated_at' => 'Updated At',
			'updated_by' => 'Updated By',
			'disable' => 'Disable',
			'nextofkin_given_name' => 'Nextofkin Given Name',
			'nextofkin_middle_name' => 'Nextofkin Middle Name',
			'nextofkin_last_name' => 'Nextofkin Last Name',
			'nextofkin_address1' => 'Nextofkin Address1',
			'nextofkin_address2' => 'Nextofkin Address2',
			'nextofkin_address3' => 'Nextofkin Address3',
			'nextofkin_district' => 'Nextofkin District',
			'nextofkin_relation_id' => 'Nextofkin Relation',
			'nextofkin_gender_id' => 'Nextofkin Gender',
			'nextofkin_nationality_id' => 'Nextofkin Nationality',
			'nextofkin_birth_date' => 'Nextofkin Birth Date',
			'nextofkin_contact_number' => 'Nextofkin Contact Number',
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
		$criteria->compare('district',$this->district,true);
		$criteria->compare('contact_number',$this->contact_number,true);
		$criteria->compare('employer_name',$this->employer_name,true);
		$criteria->compare('employer_address1',$this->employer_address1,true);
		$criteria->compare('employer_address2',$this->employer_address2,true);
		$criteria->compare('employer_address3',$this->employer_address3,true);
		$criteria->compare('employer_district',$this->employer_district,true);
		$criteria->compare('employer_contact_number',$this->employer_contact_number,true);
		$criteria->compare('passport_number',$this->passport_number,true);
		$criteria->compare('passport_status_id',$this->passport_status_id);
		$criteria->compare('passport_issue_date',$this->passport_issue_date,true);
		$criteria->compare('passport_expiry_date',$this->passport_expiry_date,true);
		$criteria->compare('passport_issue_place',$this->passport_issue_place,true);
		$criteria->compare('passport_entry_point',$this->passport_entry_point,true);
		$criteria->compare('passport_upload',$this->passport_upload,true);
		$criteria->compare('birth_upload',$this->birth_upload,true);
		$criteria->compare('marriage_upload',$this->marriage_upload,true);
		$criteria->compare('national_upload',$this->national_upload,true);
		$criteria->compare('other_upload',$this->other_upload,true);
		$criteria->compare('is_synchronize',$this->is_synchronize,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('updated_by',$this->updated_by);
		$criteria->compare('disable',$this->disable,true);
		$criteria->compare('nextofkin_given_name',$this->nextofkin_given_name,true);
		$criteria->compare('nextofkin_middle_name',$this->nextofkin_middle_name,true);
		$criteria->compare('nextofkin_last_name',$this->nextofkin_last_name,true);
		$criteria->compare('nextofkin_address1',$this->nextofkin_address1,true);
		$criteria->compare('nextofkin_address2',$this->nextofkin_address2,true);
		$criteria->compare('nextofkin_address3',$this->nextofkin_address3,true);
		$criteria->compare('nextofkin_district',$this->nextofkin_district,true);
		$criteria->compare('nextofkin_relation_id',$this->nextofkin_relation_id);
		$criteria->compare('nextofkin_gender_id',$this->nextofkin_gender_id);
		$criteria->compare('nextofkin_nationality_id',$this->nextofkin_nationality_id);
		$criteria->compare('nextofkin_birth_date',$this->nextofkin_birth_date,true);
		$criteria->compare('nextofkin_contact_number',$this->nextofkin_contact_number,true);

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
