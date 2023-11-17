<?php

/**
 * This is the model class for table "doctorcertifies".
 *
 * The followings are the available columns in table 'doctorcertifies':
 * @property integer $id
 * @property integer $transaction_id
 * @property integer $doctor_id
 * @property string $certify_date
 * @property string $hiv
 * @property string $tuberculosis
 * @property string $malaria
 * @property string $leprosy
 * @property string $std
 * @property string $hepatitis
 * @property string $cancer
 * @property string $epilepsy
 * @property string $psychiatric
 * @property string $others
 * @property string $pregnant
 * @property string $opiates
 * @property string $cannabis
 * @property string $others_comment
 * @property string $result
 * @property string $reason_comment
 * @property string $office
 * @property string $office_date
 * @property string $government
 * @property string $government_date
 * @property string $private
 * @property string $private_date
 * @property string $treating
 * @property string $treating_date
 * @property string $another
 * @property string $another_date
 * @property integer $status_id
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $disable
 *
 * The followings are the available model relations:
 * @property Transactions $transaction
 * @property Profiles $doctor
 * @property Statuses $status
 * @property Users $createdBy
 * @property Users $updatedBy
 * @property Transactions[] $transactions
 */
class Doctorcertify extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'doctorcertifies';
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
			array('transaction_id, doctor_id, status_id, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('hiv, tuberculosis, malaria, leprosy, std, hepatitis, cancer, epilepsy, psychiatric, others, pregnant, opiates, cannabis, result, office, government, private, treating, another, disable', 'length', 'max'=>255),
			array('certify_date, others_comment, reason_comment, office_date, government_date, private_date, treating_date, another_date, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, transaction_id, doctor_id, certify_date, hiv, tuberculosis, malaria, leprosy, std, hepatitis, cancer, epilepsy, psychiatric, others, pregnant, opiates, cannabis, others_comment, result, reason_comment, office, office_date, government, government_date, private, private_date, treating, treating_date, another, another_date, status_id, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on'=>'search'),
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
			'transaction' => array(self::BELONGS_TO, 'Transaction', 'transaction_id'),
			'doctor' => array(self::BELONGS_TO, 'Profile', 'doctor_id'),
			'status' => array(self::BELONGS_TO, 'Status', 'status_id'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
			'transactions' => array(self::HAS_MANY, 'Transaction', 'doctorcertify_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'transaction_id' => 'Transaction',
			'doctor_id' => 'Doctor',
			'certify_date' => 'Certify Date',
			'hiv' => 'Hiv',
			'tuberculosis' => 'Tuberculosis',
			'malaria' => 'Malaria',
			'leprosy' => 'Leprosy',
			'std' => 'Std',
			'hepatitis' => 'Hepatitis',
			'cancer' => 'Cancer',
			'epilepsy' => 'Epilepsy',
			'psychiatric' => 'Psychiatric',
			'others' => 'Others',
			'pregnant' => 'Pregnant',
			'opiates' => 'Opiates',
			'cannabis' => 'Cannabis',
			'others_comment' => 'Others Comment',
			'result' => 'Result',
			'reason_comment' => 'Reason Comment',
			'office' => 'Office',
			'office_date' => 'Office Date',
			'government' => 'Government',
			'government_date' => 'Government Date',
			'private' => 'Private',
			'private_date' => 'Private Date',
			'treating' => 'Treating',
			'treating_date' => 'Treating Date',
			'another' => 'Another',
			'another_date' => 'Another Date',
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
		$criteria->compare('transaction_id',$this->transaction_id);
		$criteria->compare('doctor_id',$this->doctor_id);
		$criteria->compare('certify_date',$this->certify_date,true);
		$criteria->compare('hiv',$this->hiv,true);
		$criteria->compare('tuberculosis',$this->tuberculosis,true);
		$criteria->compare('malaria',$this->malaria,true);
		$criteria->compare('leprosy',$this->leprosy,true);
		$criteria->compare('std',$this->std,true);
		$criteria->compare('hepatitis',$this->hepatitis,true);
		$criteria->compare('cancer',$this->cancer,true);
		$criteria->compare('epilepsy',$this->epilepsy,true);
		$criteria->compare('psychiatric',$this->psychiatric,true);
		$criteria->compare('others',$this->others,true);
		$criteria->compare('pregnant',$this->pregnant,true);
		$criteria->compare('opiates',$this->opiates,true);
		$criteria->compare('cannabis',$this->cannabis,true);
		$criteria->compare('others_comment',$this->others_comment,true);
		$criteria->compare('result',$this->result,true);
		$criteria->compare('reason_comment',$this->reason_comment,true);
		$criteria->compare('office',$this->office,true);
		$criteria->compare('office_date',$this->office_date,true);
		$criteria->compare('government',$this->government,true);
		$criteria->compare('government_date',$this->government_date,true);
		$criteria->compare('private',$this->private,true);
		$criteria->compare('private_date',$this->private_date,true);
		$criteria->compare('treating',$this->treating,true);
		$criteria->compare('treating_date',$this->treating_date,true);
		$criteria->compare('another',$this->another,true);
		$criteria->compare('another_date',$this->another_date,true);
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
	 * @return Doctorcertify the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
