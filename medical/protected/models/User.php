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
 * @property integer $status_id
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $disable
 *
 * The followings are the available model relations:
 * @property Applicants[] $applicants
 * @property Applicants[] $applicants1
 * @property Doctorcertifies[] $doctorcertifies
 * @property Doctorcertifies[] $doctorcertifies1
 * @property Statuses[] $statuses
 * @property Statuses[] $statuses1
 * @property Profiles $profile
 * @property Statuses $role
 * @property Statuses $status
 * @property User $createdBy
 * @property User[] $users
 * @property User $updatedBy
 * @property User[] $users1
 * @property Balances[] $balances
 * @property Balances[] $balances1
 * @property Profiles[] $profiles
 * @property Profiles[] $profiles1
 * @property Transactions[] $transactions
 * @property Transactions[] $transactions1
 * @property Topups[] $topups
 * @property Topups[] $topups1
 * @property Doctorexams[] $doctorexams
 * @property Doctorexams[] $doctorexams1
 * @property Labexams[] $labexams
 * @property Labexams[] $labexams1
 * @property Xrayexams[] $xrayexams
 * @property Xrayexams[] $xrayexams1
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
			array('profile_id, role_id, status_id, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('username, password, disable', 'length', 'max'=>255),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, profile_id, role_id, status_id, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on'=>'search'),
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
			'applicants' => array(self::HAS_MANY, 'Applicant', 'created_by'),
			'applicants1' => array(self::HAS_MANY, 'Applicant', 'updated_by'),
			'doctorcertifies' => array(self::HAS_MANY, 'Doctorcertify', 'created_by'),
			'doctorcertifies1' => array(self::HAS_MANY, 'Doctorcertify', 'updated_by'),
			'statuses' => array(self::HAS_MANY, 'Status', 'created_by'),
			'statuses1' => array(self::HAS_MANY, 'Status', 'updated_by'),
			'profile' => array(self::BELONGS_TO, 'Profile', 'profile_id'),
			'role' => array(self::BELONGS_TO, 'Status', 'role_id'),
			'status' => array(self::BELONGS_TO, 'Status', 'status_id'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
			'users' => array(self::HAS_MANY, 'User', 'created_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
			'users1' => array(self::HAS_MANY, 'User', 'updated_by'),
			'balances' => array(self::HAS_MANY, 'Balance', 'created_by'),
			'balances1' => array(self::HAS_MANY, 'Balance', 'updated_by'),
			'profiles' => array(self::HAS_MANY, 'Profile', 'created_by'),
			'profiles1' => array(self::HAS_MANY, 'Profile', 'updated_by'),
			'transactions' => array(self::HAS_MANY, 'Transaction', 'created_by'),
			'transactions1' => array(self::HAS_MANY, 'Transaction', 'updated_by'),
			'topups' => array(self::HAS_MANY, 'Topup', 'created_by'),
			'topups1' => array(self::HAS_MANY, 'Topup', 'updated_by'),
			'doctorexams' => array(self::HAS_MANY, 'Doctorexam', 'created_by'),
			'doctorexams1' => array(self::HAS_MANY, 'Doctorexam', 'updated_by'),
			'labexams' => array(self::HAS_MANY, 'Labexam', 'created_by'),
			'labexams1' => array(self::HAS_MANY, 'Labexam', 'updated_by'),
			'xrayexams' => array(self::HAS_MANY, 'Xrayexam', 'created_by'),
			'xrayexams1' => array(self::HAS_MANY, 'Xrayexam', 'updated_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'profile_id' => 'Profile',
			'role_id' => 'Role',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('profile_id',$this->profile_id);
		$criteria->compare('role_id',$this->role_id);
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

        //    return CPasswordHelper::verifyPassword($password,$this->password);
        //    if($password != $this->password){
        //        return false;
        //    } else {
        //        return true;
        //    }
        }
}
