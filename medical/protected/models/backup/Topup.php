<?php

/**
 * This is the model class for table "topups".
 *
 * The followings are the available columns in table 'topups':
 * @property integer $id
 * @property string $code
 * @property integer $agent_id
 * @property integer $bank_id
 * @property integer $location_id
 * @property integer $account_id
 * @property string $topup_date
 * @property string $reference_number
 * @property double $amount
 * @property integer $status_id
 * @property string $remark
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $disable
 *
 * The followings are the available model relations:
 * @property Profiles $agent
 * @property Statuses $bank
 * @property Statuses $location
 * @property Statuses $account
 * @property Statuses $status
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class Topup extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'topups';
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
			array('agent_id, bank_id, location_id, account_id, status_id, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			array('code, reference_number, disable', 'length', 'max'=>255),
			array('topup_date, remark, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, code, agent_id, bank_id, location_id, account_id, topup_date, reference_number, amount, status_id, remark, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on'=>'search'),
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
			'agent' => array(self::BELONGS_TO, 'Profile', 'agent_id'),
			'bank' => array(self::BELONGS_TO, 'Status', 'bank_id'),
			'location' => array(self::BELONGS_TO, 'Status', 'location_id'),
			'account' => array(self::BELONGS_TO, 'Status', 'account_id'),
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
			'code' => 'Code',
			'agent_id' => 'Agent',
			'bank_id' => 'Bank',
			'location_id' => 'Location',
			'account_id' => 'Account',
			'topup_date' => 'Topup Date',
			'reference_number' => 'Reference Number',
			'amount' => 'Amount',
			'status_id' => 'Status',
			'remark' => 'Remark',
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
		$criteria->compare('agent_id',$this->agent_id);
		$criteria->compare('bank_id',$this->bank_id);
		$criteria->compare('location_id',$this->location_id);
		$criteria->compare('account_id',$this->account_id);
		$criteria->compare('topup_date',$this->topup_date,true);
		$criteria->compare('reference_number',$this->reference_number,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('remark',$this->remark,true);
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
	 * @return Topup the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
