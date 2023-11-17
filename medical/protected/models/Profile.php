<?php

/**
 * This is the model class for table "profiles".
 *
 * The followings are the available columns in table 'profiles':
 * @property integer $id
 * @property string $code
 * @property string $type
 * @property string $name
 * @property string $initial
 * @property string $comment
 * @property integer $status_id
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $disable
 *
 * The followings are the available model relations:
 * @property Doctorcertifies[] $doctorcertifies
 * @property Users[] $users
 * @property Balances[] $balances
 * @property Statuses $status
 * @property Users $createdBy
 * @property Users $updatedBy
 * @property Transactions[] $transactions
 * @property Transactions[] $transactions1
 * @property Topups[] $topups
 * @property Doctorexams[] $doctorexams
 * @property Labexams[] $labexams
 * @property Xrayexams[] $xrayexams
 */
class Profile extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'profiles';
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
			array('status_id, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('code, type, name, initial, comment, disable', 'length', 'max'=>255),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, code, type, name, initial, comment, status_id, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on'=>'search'),
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
			'doctorcertifies' => array(self::HAS_MANY, 'Doctorcertify', 'doctor_id'),
			'users' => array(self::HAS_MANY, 'User', 'profile_id'),
			'balances' => array(self::HAS_MANY, 'Balance', 'agent_id'),
			'status' => array(self::BELONGS_TO, 'Status', 'status_id'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
			'transactions' => array(self::HAS_MANY, 'Transaction', 'agent_id'),
			'transactions1' => array(self::HAS_MANY, 'Transaction', 'doctor_id'),
			'topups' => array(self::HAS_MANY, 'Topup', 'agent_id'),
			'doctorexams' => array(self::HAS_MANY, 'Doctorexam', 'doctor_id'),
			'labexams' => array(self::HAS_MANY, 'Labexam', 'doctor_id'),
			'xrayexams' => array(self::HAS_MANY, 'Xrayexam', 'doctor_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'code' => 'Code',
			'type' => 'Type',
			'name' => 'Name',
			'initial' => 'Initial',
			'comment' => 'Comment',
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
		$criteria->compare('code',$this->code,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('initial',$this->initial,true);
		$criteria->compare('comment',$this->comment,true);
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
	 * @return Profile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
