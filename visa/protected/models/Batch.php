<?php

/**
 * This is the model class for table "batches".
 *
 * The followings are the available columns in table 'batches':
 * @property integer $id
 * @property string $batch_guid
 * @property integer $branch_id
 * @property integer $admin_id
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $disable
 *
 * The followings are the available model relations:
 * @property Payments[] $payments
 * @property Branches $branch
 * @property Admins $admin
 * @property Users $updatedBy
 * @property Users $createdBy
 * @property Passportscans[] $passportscans
 * @property Applicants[] $applicants
 */
class Batch extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'batches';
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
			array('branch_id, admin_id, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('batch_guid, disable', 'length', 'max'=>255),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, batch_guid, branch_id, admin_id, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on'=>'search'),
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
			'payments' => array(self::HAS_MANY, 'Payment', 'batch_id'),
			'branch' => array(self::BELONGS_TO, 'Branch', 'branch_id'),
			'admin' => array(self::BELONGS_TO, 'Admin', 'admin_id'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
			'passportscans' => array(self::HAS_MANY, 'Passportscan', 'batch_id'),
			'applicants' => array(self::HAS_MANY, 'Applicant', 'batch_id'),
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Batch the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function statBatchByBranch($bid,$aid,$type = '')
        {
            if($type == 'today'){
                $batch = Batch::model()->findAllByAttributes(array(
                    'branch_id' => $bid,
                    'admin_id' => $aid
                ), array(
                    'condition' => 'DATE(created_at) = DATE(NOW())',
                    'order' => 'id ASC'
                ));
            } else {
                $batch = Batch::model()->findAllByAttributes(array(
                    'branch_id' => $bid,
                    'admin_id' => $aid
                ), array(
                    'order' => 'id ASC'
                ));
            }
            
            return $batch;
        }
        
        public static function reportBatchByBranch($bid,$aid,$startdate,$enddate)
        {
            $batch = Batch::model()->findAllByAttributes(array(
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
            
            return $batch;
        }

        public static function statBatchByAdmin($aid,$type = '')
        {
            if($type == 'today'){
                $batch = Batch::model()->findAllByAttributes(array(
                    'admin_id' => $aid
                ), array(
                    'condition' => 'DATE(created_at) = DATE(NOW())',
                    'order' => 'id ASC'
                ));
            } else {
                $batch = Batch::model()->findAllByAttributes(array(
                    'admin_id' => $aid
                ), array(
                    'order' => 'id ASC'
                ));
            }
            
            return $batch;
        }
        
        public static function reportBatchByAdmin($aid,$startdate,$enddate)
        {
            $batch = Batch::model()->findAllByAttributes(array(
                'admin_id' => $aid
            ), array(
                'condition' => 'DATE(created_at) BETWEEN :startdate AND :enddate',
                'params' => array(
                    ':startdate' => $startdate,
                    ':enddate' => $enddate
                ),
                'order' => 'id ASC'
            ));
            
            return $batch;
        }
        
        public static function statBatchByOsc($type = '')
        {
            if($type == 'today'){
                $batch = Batch::model()->findAll(array(
                    'condition' => 'DATE(created_at) = DATE(NOW())',
                    'order' => 'id ASC'
                ));
            } else {
                $batch = Batch::model()->findAll(array('order' => 'id ASC'));
            }
            
            return $batch;
        }
        
        public static function reportBatchByOsc($startdate,$enddate)
        {
            $batch = Batch::model()->findAll(array(
                'condition' => 'DATE(created_at) BETWEEN :startdate AND :enddate',
                'params' => array(
                    ':startdate' => $startdate,
                    ':enddate' => $enddate
                ),
                'order' => 'id ASC'
            ));
            
            return $batch;
        }
}
