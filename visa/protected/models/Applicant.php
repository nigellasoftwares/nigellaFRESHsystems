<?php

/**
 * This is the model class for table "applicants".
 *
 * The followings are the available columns in table 'applicants':
 * @property integer $id
 * @property string $guid
 * @property integer $payment_id
 * @property integer $batch_id
 * @property integer $branch_id
 * @property integer $admin_id
 * @property string $full_name
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property integer $gender_id
 * @property string $birth_date
 * @property string $birth_place
 * @property integer $current_nationality_id
 * @property integer $former_nationality_id
 * @property integer $passport_id
 * @property string $passport_other
 * @property string $passport_number
 * @property string $passport_issue_place
 * @property string $passport_issue_date
 * @property string $passport_expiry_date
 * @property string $occupation_other
 * @property string $position_other
 * @property string $education_other
 * @property string $employer_name
 * @property string $employer_phone
 * @property string $employer_address
 * @property string $employer_zipcode
 * @property string $home_address
 * @property string $home_zipcode
 * @property string $home_phone
 * @property string $home_mobile
 * @property string $email
 * @property integer $marital_id
 * @property string $marital_other
 * @property string $location_visa_apply
 * @property integer $purposevisit_id
 * @property string $purposevisit_other
 * @property integer $visa_id
 * @property integer $entrynumber_id
 * @property string $entrynumber_other
 * @property string $express_service
 * @property string $expected_date
 * @property integer $longest_stay
 * @property string $travel_expense
 * @property string $inviter_name
 * @property string $inviter_address
 * @property string $inviter_phone
 * @property string $inviter_relationship
 * @property string $granted_date
 * @property string $granted_place
 * @property string $visited_location
 * @property string $visa_overstayed
 * @property string $visa_overstayed_detail
 * @property string $visa_refused
 * @property string $visa_refused_detail
 * @property string $visa_criminal
 * @property string $visa_criminal_detail
 * @property string $visa_condition
 * @property string $visa_condition_detail
 * @property string $visa_other_detail
 * @property string $declared_sign
 * @property string $declared_date
 * @property integer $result_id
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $disable
 *
 * The followings are the available model relations:
 * @property Payments[] $payments
 * @property Passportscans[] $passportscans
 * @property Occupations[] $occupations
 * @property Educations[] $educations
 * @property Emergencies[] $emergencies
 * @property Payments $payment
 * @property Batches $batch
 * @property Branches $branch
 * @property Admins $admin
 * @property Genders $gender
 * @property Passports $passport
 * @property Nationalities $currentNationality
 * @property Nationalities $formerNationality
 * @property Maritals $marital
 * @property Purposevisits $purposevisit
 * @property Visas $visa
 * @property Entrynumbers $entrynumber
 * @property Users $createdBy
 * @property Users $updatedBy
 * @property Results $result
 * @property Families[] $families
 * @property Itenaries[] $itenaries
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
			array('payment_id, batch_id, branch_id, admin_id, gender_id, current_nationality_id, former_nationality_id, passport_id, marital_id, purposevisit_id, visa_id, entrynumber_id, longest_stay, result_id, result2_id, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('guid, first_name, middle_name, last_name, passport_other, passport_number, occupation_other, position_other, education_other, employer_name, employer_phone, employer_zipcode, home_zipcode, home_phone, home_mobile, marital_other, entrynumber_other, express_service, travel_expense, inviter_phone, inviter_relationship, granted_place, visited_location, visa_overstayed, visa_refused, visa_criminal, visa_condition, declared_sign, disable', 'length', 'max'=>255),
			array('full_name, birth_place, passport_issue_place, birth_date, passport_issue_date, passport_expiry_date, employer_address, home_address, email, location_visa_apply, purposevisit_other, expected_date, inviter_name, inviter_address, granted_date, visa_overstayed_detail, visa_refused_detail, visa_criminal_detail, visa_condition_detail, visa_other_detail, declared_date, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, guid, payment_id, batch_id, branch_id, admin_id, full_name, first_name, middle_name, last_name, gender_id, birth_date, birth_place, current_nationality_id, former_nationality_id, passport_id, passport_other, passport_number, passport_issue_place, passport_issue_date, passport_expiry_date, occupation_other, position_other, education_other, employer_name, employer_phone, employer_address, employer_zipcode, home_address, home_zipcode, home_phone, home_mobile, email, marital_id, marital_other, location_visa_apply, purposevisit_id, purposevisit_other, visa_id, entrynumber_id, entrynumber_other, express_service, expected_date, longest_stay, travel_expense, inviter_name, inviter_address, inviter_phone, inviter_relationship, granted_date, granted_place, visited_location, visa_overstayed, visa_overstayed_detail, visa_refused, visa_refused_detail, visa_criminal, visa_criminal_detail, visa_condition, visa_condition_detail, visa_other_detail, declared_sign, declared_date, result_id, result2_id, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on'=>'search'),
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
			'payments' => array(self::HAS_MANY, 'Payment', 'applicant_id'),
			'passportscans' => array(self::HAS_MANY, 'Passportscan', 'applicant_id'),
			'occupations' => array(self::HAS_MANY, 'Occupation', 'applicant_id'),
			'educations' => array(self::HAS_MANY, 'Education', 'applicant_id'),
			'emergencies' => array(self::HAS_MANY, 'Emergency', 'applicant_id'),
			'payment' => array(self::BELONGS_TO, 'Payment', 'payment_id'),
			'batch' => array(self::BELONGS_TO, 'Batch', 'batch_id'),
			'branch' => array(self::BELONGS_TO, 'Branch', 'branch_id'),
			'admin' => array(self::BELONGS_TO, 'Admin', 'admin_id'),
			'gender' => array(self::BELONGS_TO, 'Gender', 'gender_id'),
			'passport' => array(self::BELONGS_TO, 'Passport', 'passport_id'),
			'currentNationality' => array(self::BELONGS_TO, 'Nationality', 'current_nationality_id'),
			'formerNationality' => array(self::BELONGS_TO, 'Nationality', 'former_nationality_id'),
			'marital' => array(self::BELONGS_TO, 'Marital', 'marital_id'),
			'purposevisit' => array(self::BELONGS_TO, 'Purposevisit', 'purposevisit_id'),
			'visa' => array(self::BELONGS_TO, 'Visa', 'visa_id'),
			'entrynumber' => array(self::BELONGS_TO, 'Entrynumber', 'entrynumber_id'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
			'result' => array(self::BELONGS_TO, 'Result', 'result_id'),
                        'result2' => array(self::BELONGS_TO, 'Result', 'result2_id'),
			'families' => array(self::HAS_MANY, 'Family', 'applicant_id'),
			'itenaries' => array(self::HAS_MANY, 'Itenary', 'applicant_id'),
		);
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
        
        public static function statApplicantByBranch($bid,$aid,$type = '')
        {
            if($type == 'today'){
                $application = Applicant::model()->findAllByAttributes(array(
                    'branch_id' => $bid,
                    'admin_id' => $aid
                ), array(
                    'condition' => 'DATE(created_at) = DATE(NOW())',
                    'order' => 'id ASC'
                ));
            } else {
                $application = Applicant::model()->findAllByAttributes(array(
                    'branch_id' => $bid,
                    'admin_id' => $aid
                ), array(
                    'order' => 'id ASC'
                ));
            }
            
            $app_vdr = 0;
            $app_vtr = 0;
            $app_male = 0;
            $app_female = 0;
            
            foreach($application as $a){
                if($a->visa_id == 1){
                    $app_vdr = $app_vdr + 1;
                } else if($a->visa_id == 2){
                    $app_vtr = $app_vtr + 1;
                }
                
                if($a->gender_id == 1){
                    $app_male = $app_male + 1;
                } else if($a->gender_id == 2){
                    $app_female = $app_female + 1;
                }
            }
            
            $applicant = array(
                'application' => count($application),
                'vdr' => $app_vdr,
                'vtr' => $app_vtr,
                'male' => $app_male,
                'female' => $app_female
            );
            
            return $applicant;
        }
        
        public static function reportApplicantByBranch($bid,$aid,$startdate,$enddate)
        {
            $application = Applicant::model()->findAllByAttributes(array(
                'branch_id' => $bid,
                'admin_id' => $aid
            ), array(
                'condition' => 'DATE(created_at) BETWEEN :startdate AND :enddate',
                'params' => array(
                    ':startdate' => $startdate,
                    ':enddate' => $enddate
                ),
                'order' => 'id ASC'
            ));
            
            $app_vdr = 0;
            $app_vtr = 0;
            $app_male = 0;
            $app_female = 0;
            
            foreach($application as $a){
                if($a->visa_id == 1){
                    $app_vdr = $app_vdr + 1;
                } else if($a->visa_id == 2){
                    $app_vtr = $app_vtr + 1;
                }
                
                if($a->gender_id == 1){
                    $app_male = $app_male + 1;
                } else if($a->gender_id == 2){
                    $app_female = $app_female + 1;
                }
            }
            
            $applicant = array(
                'application' => count($application),
                'vdr' => $app_vdr,
                'vtr' => $app_vtr,
                'male' => $app_male,
                'female' => $app_female
            );
            
            return $applicant;
        }
        
        public static function statApplicantByAdmin($aid,$type = '')
        {
            if($type == 'today'){
                $application = Applicant::model()->findAllByAttributes(array(
                    'admin_id' => $aid
                ), array(
                    'condition' => 'DATE(created_at) = DATE(NOW())',
                    'order' => 'id ASC'
                ));
            } else {
                $application = Applicant::model()->findAllByAttributes(array(
                    'admin_id' => $aid
                ), array(
                    'order' => 'id ASC'
                ));
            }
            
            $app_vdr = 0;
            $app_vtr = 0;
            $app_male = 0;
            $app_female = 0;
            
            foreach($application as $a){
                if($a->visa_id == 1){
                    $app_vdr = $app_vdr + 1;
                } else if($a->visa_id == 2){
                    $app_vtr = $app_vtr + 1;
                }
                
                if($a->gender_id == 1){
                    $app_male = $app_male + 1;
                } else if($a->gender_id == 2){
                    $app_female = $app_female + 1;
                }
            }
            
            $applicant = array(
                'application' => count($application),
                'vdr' => $app_vdr,
                'vtr' => $app_vtr,
                'male' => $app_male,
                'female' => $app_female
            );
            
            return $applicant;
        }
        
        public static function reportApplicantByAdmin($aid,$startdate,$enddate)
        {
            $application = Applicant::model()->findAllByAttributes(array(
                'admin_id' => $aid
            ), array(
                'condition' => 'DATE(created_at) BETWEEN :startdate AND :enddate',
                'params' => array(
                    ':startdate' => $startdate,
                    ':enddate' => $enddate
                ),
                'order' => 'id ASC'
            ));
            
            $app_vdr = 0;
            $app_vtr = 0;
            $app_male = 0;
            $app_female = 0;
            
            foreach($application as $a){
                if($a->visa_id == 1){
                    $app_vdr = $app_vdr + 1;
                } else if($a->visa_id == 2){
                    $app_vtr = $app_vtr + 1;
                }
                
                if($a->gender_id == 1){
                    $app_male = $app_male + 1;
                } else if($a->gender_id == 2){
                    $app_female = $app_female + 1;
                }
            }
            
            $applicant = array(
                'application' => count($application),
                'vdr' => $app_vdr,
                'vtr' => $app_vtr,
                'male' => $app_male,
                'female' => $app_female
            );
            
            return $applicant;
        }
        
        public static function statApplicantByOsc($type = '')
        {
            if($type == 'today'){
                $application = Applicant::model()->findAll(array(
                    'condition' => 'DATE(created_at) = DATE(NOW())',
                    'order' => 'id ASC'
                ));
            } else {
                $application = Applicant::model()->findAll(array('order' => 'id ASC'));
            }
            
            $app_vdr = 0;
            $app_vtr = 0;
            $app_male = 0;
            $app_female = 0;
            $app_approve = 0;
            $app_reject = 0;
            
            foreach($application as $a){
                if($a->visa_id == 1){
                    $app_vdr = $app_vdr + 1;
                } else if($a->visa_id == 2){
                    $app_vtr = $app_vtr + 1;
                }
                
                if($a->gender_id == 1){
                    $app_male = $app_male + 1;
                } else if($a->gender_id == 2){
                    $app_female = $app_female + 1;
                }
                
                if($a->result2_id == 10){
                    $app_approve = $app_approve + 1;
                } else if($a->result2_id == 11){
                    $app_reject = $app_reject + 1;
                }
            }
            
            $applicant = array(
                'application' => count($application),
                'vdr' => $app_vdr,
                'vtr' => $app_vtr,
                'male' => $app_male,
                'female' => $app_female,
                'approve' => $app_approve,
                'reject' => $app_reject
            );
            
            return $applicant;
        }
        
        public static function reportApplicantByOsc($startdate,$enddate)
        {
            $application = Applicant::model()->findAll(array(
                'condition' => 'DATE(created_at) BETWEEN :startdate AND :enddate',
                'params' => array(
                    ':startdate' => $startdate,
                    ':enddate' => $enddate
                ),
                'order' => 'id ASC'
            ));
            
            $app_vdr = 0;
            $app_vtr = 0;
            $app_male = 0;
            $app_female = 0;
            
            foreach($application as $a){
                if($a->visa_id == 1){
                    $app_vdr = $app_vdr + 1;
                } else if($a->visa_id == 2){
                    $app_vtr = $app_vtr + 1;
                }
                
                if($a->gender_id == 1){
                    $app_male = $app_male + 1;
                } else if($a->gender_id == 2){
                    $app_female = $app_female + 1;
                }
            }
            
            $applicant = array(
                'application' => count($application),
                'vdr' => $app_vdr,
                'vtr' => $app_vtr,
                'male' => $app_male,
                'female' => $app_female
            );
            
            return $applicant;
        }
}
