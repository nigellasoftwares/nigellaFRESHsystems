<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $profile_id
 * @property integer $role_id
 * @property integer $branch_id
 * @property integer $admin_id
 * @property integer $status_id
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $disable
 *
 * The followings are the available model relations:
 * @property Roles[] $roles
 * @property Roles[] $roles1
 * @property Fees[] $fees
 * @property Fees[] $fees1
 * @property Visas[] $visases
 * @property Visas[] $visases1
 * @property Relationships[] $relationships
 * @property Relationships[] $relationships1
 * @property Payments[] $payments
 * @property Payments[] $payments1
 * @property Batches[] $batches
 * @property Batches[] $batches1
 * @property Passportscans[] $passportscans
 * @property Passportscans[] $passportscans1
 * @property Passportscans[] $passportscans2
 * @property Companies[] $companies
 * @property Companies[] $companies1
 * @property Occupations[] $occupations
 * @property Occupations[] $occupations1
 * @property Genders[] $genders
 * @property Genders[] $genders1
 * @property Passports[] $passports
 * @property Passports[] $passports1
 * @property Educations[] $educations
 * @property Educations[] $educations1
 * @property Emergencies[] $emergencies
 * @property Emergencies[] $emergencies1
 * @property Applicants[] $applicants
 * @property Applicants[] $applicants1
 * @property Maritals[] $maritals
 * @property Maritals[] $maritals1
 * @property Families[] $families
 * @property Families[] $families1
 * @property Educationtypes[] $educationtypes
 * @property Educationtypes[] $educationtypes1
 * @property Nationalities[] $nationalities
 * @property Nationalities[] $nationalities1
 * @property Occupationtypes[] $occupationtypes
 * @property Occupationtypes[] $occupationtypes1
 * @property Entrynumbers[] $entrynumbers
 * @property Entrynumbers[] $entrynumbers1
 * @property Itenaries[] $itenaries
 * @property Itenaries[] $itenaries1
 * @property Statuses[] $statuses
 * @property Statuses[] $statuses1
 * @property Purposevisits[] $purposevisits
 * @property Purposevisits[] $purposevisits1
 * @property Profiles $profile
 * @property Roles $role
 * @property Branches $branch
 * @property Admins $admin
 * @property Statuses $status
 * @property User $createdBy
 * @property User[] $users
 * @property User $updatedBy
 * @property User[] $users1
 * @property Profiles[] $profiles
 * @property Profiles[] $profiles1
 * @property Results[] $results
 * @property Results[] $results1
 * @property Admins[] $admins
 * @property Admins[] $admins1
 * @property Admins[] $admins2
 * @property Branches[] $branches
 * @property Branches[] $branches1
 * @property Branches[] $branches2
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
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
			array('profile_id, role_id, branch_id, admin_id, status_id, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('username, password, disable', 'length', 'max'=>255),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, profile_id, role_id, branch_id, admin_id, status_id, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on'=>'search'),
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
			'roles' => array(self::HAS_MANY, 'Role', 'created_by'),
			'roles1' => array(self::HAS_MANY, 'Role', 'updated_by'),
			'fees' => array(self::HAS_MANY, 'Fee', 'created_by'),
			'fees1' => array(self::HAS_MANY, 'Fee', 'updated_by'),
			'visases' => array(self::HAS_MANY, 'Visa', 'created_by'),
			'visases1' => array(self::HAS_MANY, 'Visa', 'updated_by'),
			'relationships' => array(self::HAS_MANY, 'Relationship', 'created_by'),
			'relationships1' => array(self::HAS_MANY, 'Relationship', 'updated_by'),
			'payments' => array(self::HAS_MANY, 'Payment', 'created_by'),
			'payments1' => array(self::HAS_MANY, 'Payment', 'updated_by'),
			'batches' => array(self::HAS_MANY, 'Batch', 'updated_by'),
			'batches1' => array(self::HAS_MANY, 'Batch', 'created_by'),
			'passportscans' => array(self::HAS_MANY, 'Passportscan', 'user_id'),
			'passportscans1' => array(self::HAS_MANY, 'Passportscan', 'created_by'),
			'passportscans2' => array(self::HAS_MANY, 'Passportscan', 'updated_by'),
			'companies' => array(self::HAS_MANY, 'Company', 'created_by'),
			'companies1' => array(self::HAS_MANY, 'Company', 'updated_by'),
			'occupations' => array(self::HAS_MANY, 'Occupation', 'created_by'),
			'occupations1' => array(self::HAS_MANY, 'Occupation', 'updated_by'),
			'genders' => array(self::HAS_MANY, 'Gender', 'created_by'),
			'genders1' => array(self::HAS_MANY, 'Gender', 'updated_by'),
			'passports' => array(self::HAS_MANY, 'Passport', 'created_by'),
			'passports1' => array(self::HAS_MANY, 'Passport', 'updated_by'),
			'educations' => array(self::HAS_MANY, 'Education', 'created_by'),
			'educations1' => array(self::HAS_MANY, 'Education', 'updated_by'),
			'emergencies' => array(self::HAS_MANY, 'Emergency', 'updated_by'),
			'emergencies1' => array(self::HAS_MANY, 'Emergency', 'created_by'),
			'applicants' => array(self::HAS_MANY, 'Applicant', 'created_by'),
			'applicants1' => array(self::HAS_MANY, 'Applicant', 'updated_by'),
			'maritals' => array(self::HAS_MANY, 'Marital', 'created_by'),
			'maritals1' => array(self::HAS_MANY, 'Marital', 'updated_by'),
			'families' => array(self::HAS_MANY, 'Family', 'created_by'),
			'families1' => array(self::HAS_MANY, 'Family', 'updated_by'),
			'educationtypes' => array(self::HAS_MANY, 'Educationtype', 'created_by'),
			'educationtypes1' => array(self::HAS_MANY, 'Educationtype', 'updated_by'),
			'nationalities' => array(self::HAS_MANY, 'Nationality', 'created_by'),
			'nationalities1' => array(self::HAS_MANY, 'Nationality', 'updated_by'),
			'occupationtypes' => array(self::HAS_MANY, 'Occupationtype', 'created_by'),
			'occupationtypes1' => array(self::HAS_MANY, 'Occupationtype', 'updated_by'),
			'entrynumbers' => array(self::HAS_MANY, 'Entrynumber', 'created_by'),
			'entrynumbers1' => array(self::HAS_MANY, 'Entrynumber', 'updated_by'),
			'itenaries' => array(self::HAS_MANY, 'Itenary', 'created_by'),
			'itenaries1' => array(self::HAS_MANY, 'Itenary', 'updated_by'),
			'statuses' => array(self::HAS_MANY, 'Status', 'created_by'),
			'statuses1' => array(self::HAS_MANY, 'Status', 'updated_by'),
			'purposevisits' => array(self::HAS_MANY, 'Purposevisit', 'created_by'),
			'purposevisits1' => array(self::HAS_MANY, 'Purposevisit', 'updated_by'),
			'profile' => array(self::BELONGS_TO, 'Profile', 'profile_id'),
			'role' => array(self::BELONGS_TO, 'Role', 'role_id'),
			'branch' => array(self::BELONGS_TO, 'Branch', 'branch_id'),
			'admin' => array(self::BELONGS_TO, 'Admin', 'admin_id'),
			'status' => array(self::BELONGS_TO, 'Status', 'status_id'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
			'users' => array(self::HAS_MANY, 'User', 'created_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
			'users1' => array(self::HAS_MANY, 'User', 'updated_by'),
			'profiles' => array(self::HAS_MANY, 'Profile', 'created_by'),
			'profiles1' => array(self::HAS_MANY, 'Profile', 'updated_by'),
			'results' => array(self::HAS_MANY, 'Result', 'created_by'),
			'results1' => array(self::HAS_MANY, 'Result', 'updated_by'),
			'admins' => array(self::HAS_MANY, 'Admin', 'user_id'),
			'admins1' => array(self::HAS_MANY, 'Admin', 'created_by'),
			'admins2' => array(self::HAS_MANY, 'Admin', 'updated_by'),
			'branches' => array(self::HAS_MANY, 'Branch', 'user_id'),
			'branches1' => array(self::HAS_MANY, 'Branch', 'created_by'),
			'branches2' => array(self::HAS_MANY, 'Branch', 'updated_by'),
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function hashing($pass){
            return password_hash($pass, PASSWORD_BCRYPT, ['cost' => 8]);
        }

        public function passwordVerify($pass){        
            return password_verify($pass, $this->password);
        }

        /**
         * Checks if the given password is correct.
         * @param string the password to be validated
         * @return boolean whether the password is valid
         */
        public function validatePassword($password)
        {

            if ($password == $this->password) {
                return true;
            } else {
                return false;
            }

    //      return CPasswordHelper::verifyPassword($password,$this->password);
    //      if($password != $this->password){
    //          return false;
    //      } else {
    //          return true;
    //      }
        }

        /**
         * Generates the password hash.
         * @param string password
         * @return string hash
         */
        public function hashPassword($password)
        {
            return CPasswordHelper::hashPassword($password);
        }
}
