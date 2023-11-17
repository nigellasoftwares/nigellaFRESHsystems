<?php

/**
 * This is the model class for table "xrayexams".
 *
 * The followings are the available columns in table 'xrayexams':
 * @property integer $id
 * @property integer $transaction_id
 * @property integer $doctor_id
 * @property string $pregnant
 * @property string $overdue
 * @property string $exam_date
 * @property string $thoracic_cage
 * @property string $thoracic_cage_reason
 * @property string $heart_shape
 * @property string $heart_shape_reason
 * @property string $lung_fields
 * @property string $lung_fields_reason
 * @property string $mediastinum
 * @property string $mediastinum_reason
 * @property string $pleura
 * @property string $pleura_reason
 * @property string $focal_lesion
 * @property string $focal_lesion_reason
 * @property string $other_abnormal
 * @property string $other_abnormal_reason
 * @property string $impression
 * @property string $report_date
 * @property string $certify
 * @property string $read
 * @property integer $status_id
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $disable
 *
 * The followings are the available model relations:
 * @property Transactions[] $transactions
 * @property Transactions $transaction
 * @property Profiles $doctor
 * @property Statuses $status
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class Xrayexam extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'xrayexams';
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
			array('pregnant, overdue, thoracic_cage, heart_shape, lung_fields, pleura, pleura_reason, focal_lesion, other_abnormal, certify, read, disable', 'length', 'max'=>255),
			array('exam_date, thoracic_cage_reason, heart_shape_reason, lung_fields_reason, mediastinum, mediastinum_reason, focal_lesion_reason, other_abnormal_reason, impression, report_date, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, transaction_id, doctor_id, pregnant, overdue, exam_date, thoracic_cage, thoracic_cage_reason, heart_shape, heart_shape_reason, lung_fields, lung_fields_reason, mediastinum, mediastinum_reason, pleura, pleura_reason, focal_lesion, focal_lesion_reason, other_abnormal, other_abnormal_reason, impression, report_date, certify, read, status_id, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on'=>'search'),
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
			'transactions' => array(self::HAS_MANY, 'Transactions', 'xrayexam_id'),
			'transaction' => array(self::BELONGS_TO, 'Transactions', 'transaction_id'),
			'doctor' => array(self::BELONGS_TO, 'Profiles', 'doctor_id'),
			'status' => array(self::BELONGS_TO, 'Statuses', 'status_id'),
			'createdBy' => array(self::BELONGS_TO, 'Users', 'created_by'),
			'updatedBy' => array(self::BELONGS_TO, 'Users', 'updated_by'),
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
			'pregnant' => 'Pregnant',
			'overdue' => 'Overdue',
			'exam_date' => 'Exam Date',
			'thoracic_cage' => 'Thoracic Cage',
			'thoracic_cage_reason' => 'Thoracic Cage Reason',
			'heart_shape' => 'Heart Shape',
			'heart_shape_reason' => 'Heart Shape Reason',
			'lung_fields' => 'Lung Fields',
			'lung_fields_reason' => 'Lung Fields Reason',
			'mediastinum' => 'Mediastinum',
			'mediastinum_reason' => 'Mediastinum Reason',
			'pleura' => 'Pleura',
			'pleura_reason' => 'Pleura Reason',
			'focal_lesion' => 'Focal Lesion',
			'focal_lesion_reason' => 'Focal Lesion Reason',
			'other_abnormal' => 'Other Abnormal',
			'other_abnormal_reason' => 'Other Abnormal Reason',
			'impression' => 'Impression',
			'report_date' => 'Report Date',
			'certify' => 'Certify',
			'read' => 'Read',
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
		$criteria->compare('pregnant',$this->pregnant,true);
		$criteria->compare('overdue',$this->overdue,true);
		$criteria->compare('exam_date',$this->exam_date,true);
		$criteria->compare('thoracic_cage',$this->thoracic_cage,true);
		$criteria->compare('thoracic_cage_reason',$this->thoracic_cage_reason,true);
		$criteria->compare('heart_shape',$this->heart_shape,true);
		$criteria->compare('heart_shape_reason',$this->heart_shape_reason,true);
		$criteria->compare('lung_fields',$this->lung_fields,true);
		$criteria->compare('lung_fields_reason',$this->lung_fields_reason,true);
		$criteria->compare('mediastinum',$this->mediastinum,true);
		$criteria->compare('mediastinum_reason',$this->mediastinum_reason,true);
		$criteria->compare('pleura',$this->pleura,true);
		$criteria->compare('pleura_reason',$this->pleura_reason,true);
		$criteria->compare('focal_lesion',$this->focal_lesion,true);
		$criteria->compare('focal_lesion_reason',$this->focal_lesion_reason,true);
		$criteria->compare('other_abnormal',$this->other_abnormal,true);
		$criteria->compare('other_abnormal_reason',$this->other_abnormal_reason,true);
		$criteria->compare('impression',$this->impression,true);
		$criteria->compare('report_date',$this->report_date,true);
		$criteria->compare('certify',$this->certify,true);
		$criteria->compare('read',$this->read,true);
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
	 * @return Xrayexam the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
