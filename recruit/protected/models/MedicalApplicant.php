<?php

class MedicalApplicant extends CActiveRecord {

    public function tableName() {
        return 'applicants';
    }

    public function getDbConnection() {
        return Yii::app()->dbmedical;
    }

    public function rules() {
        return array(
			array('gender_id, nationality_id, job_id, passport_status_id, status_id, created_by, updated_by, nextofkin_relation_id, nextofkin_gender_id, nextofkin_nationality_id', 'numerical', 'integerOnly'=>true),
			array('guid, given_name, middle_name, last_name, address1, address2, address3, district, contact_number, employer_name, employer_address1, employer_address2, employer_address3, employer_district, employer_contact_number, passport_number, passport_issue_place, passport_entry_point, passport_upload, birth_upload, marriage_upload, national_upload, other_upload, is_synchronize, status, disable, nextofkin_given_name, nextofkin_middle_name, nextofkin_last_name, nextofkin_address1, nextofkin_address2, nextofkin_address3, nextofkin_district', 'length', 'max'=>255),
			array('birth_date, passport_issue_date, passport_expiry_date, created_at, updated_at, nextofkin_birth_date, nextofkin_contact_number', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, guid, given_name, middle_name, last_name, birth_date, gender_id, nationality_id, job_id, address1, address2, address3, district, contact_number, employer_name, employer_address1, employer_address2, employer_address3, employer_district, employer_contact_number, passport_number, passport_status_id, passport_issue_date, passport_expiry_date, passport_issue_place, passport_entry_point, passport_upload, birth_upload, marriage_upload, national_upload, other_upload, is_synchronize, status, status_id, created_at, created_by, updated_at, updated_by, disable, nextofkin_given_name, nextofkin_middle_name, nextofkin_last_name, nextofkin_address1, nextofkin_address2, nextofkin_address3, nextofkin_district, nextofkin_relation_id, nextofkin_gender_id, nextofkin_nationality_id, nextofkin_birth_date, nextofkin_contact_number', 'safe', 'on'=>'search'),
		);
    }

    public function relations() {
        return array(
        );
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}