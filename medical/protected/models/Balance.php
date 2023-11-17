<?php

/**
 * This is the model class for table "balances".
 *
 * The followings are the available columns in table 'balances':
 * @property integer $id
 * @property string $reference_id
 * @property integer $agent_id
 * @property string $type
 * @property string $description
 * @property double $amount
 * @property string $updated_date
 * @property string $remark
 * @property integer $status_id
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $disable
 *
 * The followings are the available model relations:
 * @property Profiles $agent
 * @property Statuses $status
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class Balance extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'balances';
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
			array('agent_id, status_id, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			array('reference_id, type, description, disable', 'length', 'max'=>255),
			array('updated_date, remark, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, reference_id, agent_id, type, description, amount, updated_date, remark, status_id, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on'=>'search'),
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
			'reference_id' => 'Reference',
			'agent_id' => 'Agent',
			'type' => 'Type',
			'description' => 'Description',
			'amount' => 'Amount',
			'updated_date' => 'Updated Date',
			'remark' => 'Remark',
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
		$criteria->compare('reference_id',$this->reference_id,true);
		$criteria->compare('agent_id',$this->agent_id);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('updated_date',$this->updated_date,true);
		$criteria->compare('remark',$this->remark,true);
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
	 * @return Balance the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
