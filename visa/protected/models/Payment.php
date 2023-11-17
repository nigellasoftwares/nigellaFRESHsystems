<?php

/**
 * This is the model class for table "payments".
 *
 * The followings are the available columns in table 'payments':
 * @property integer $id
 * @property integer $applicant_id
 * @property integer $batch_id
 * @property integer $branch_id
 * @property integer $admin_id
 * @property integer $visa_id
 * @property double $vln_fee
 * @property double $osc_fee
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $disable
 *
 * The followings are the available model relations:
 * @property Applicants $applicant
 * @property Batches $batch
 * @property Branches $branch
 * @property Admins $admin
 * @property Visas $visa
 * @property Users $createdBy
 * @property Users $updatedBy
 * @property Applicants[] $applicants
 */
class Payment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payments';
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
			array('applicant_id, batch_id, branch_id, admin_id, visa_id, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('vln_fee, osc_fee', 'numerical'),
			array('disable', 'length', 'max'=>255),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, applicant_id, batch_id, branch_id, admin_id, visa_id, vln_fee, osc_fee, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on'=>'search'),
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
			'applicant' => array(self::BELONGS_TO, 'Applicant', 'applicant_id'),
			'batch' => array(self::BELONGS_TO, 'Batch', 'batch_id'),
			'branch' => array(self::BELONGS_TO, 'Branch', 'branch_id'),
			'admin' => array(self::BELONGS_TO, 'Admin', 'admin_id'),
			'visa' => array(self::BELONGS_TO, 'Visa', 'visa_id'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
			'applicants' => array(self::HAS_MANY, 'Applicant', 'payment_id'),
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Payment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function statPaymentByBranch($bid,$aid,$type = '')
        {
            if($type == 'today'){
                $payment = Payment::model()->findAllByAttributes(array(
                    'branch_id' => $bid,
                    'admin_id' => $aid
                ), array(
                    'condition' => 'DATE(created_at) = DATE(NOW())',
                    'order' => 'id ASC'
                ));
            } else {
                $payment = Payment::model()->findAllByAttributes(array(
                    'branch_id' => $bid,
                    'admin_id' => $aid
                ), array(
                    'order' => 'id ASC'
                ));
            }
            
            $pay_vln = 0;
            $pay_osc = 0;
            $pay_all = 0;
            
            foreach($payment as $p){
                $pay_vln = $pay_vln + $p->vln_fee;
                $pay_osc = $pay_osc + $p->osc_fee;
                $totalpay = $p->vln_fee + $p->osc_fee;
                $pay_all = $pay_all + $totalpay;
            }
            
            $fee = array(
                'pay_vln' => $pay_vln,
                'pay_osc' => $pay_osc,
                'pay_all' => $pay_all
            );
            
            return $fee;
        }
        
        public static function reportPaymentByBranch($bid,$aid,$startdate,$enddate)
        {
            $payment = Payment::model()->findAllByAttributes(array(
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
            
            $pay_vln = 0;
            $pay_osc = 0;
            $pay_all = 0;
            
            foreach($payment as $p){
                $pay_vln = $pay_vln + $p->vln_fee;
                $pay_osc = $pay_osc + $p->osc_fee;
                $totalpay = $p->vln_fee + $p->osc_fee;
                $pay_all = $pay_all + $totalpay;
            }
            
            $fee = array(
                'pay_vln' => $pay_vln,
                'pay_osc' => $pay_osc,
                'pay_all' => $pay_all
            );
            
            return $fee;
        }
        
        public static function statPaymentByAdmin($aid,$type = '')
        {
            if($type == 'today'){
                $payment = Payment::model()->findAllByAttributes(array(
                    'admin_id' => $aid
                ), array(
                    'condition' => 'DATE(created_at) = DATE(NOW())',
                    'order' => 'id ASC'
                ));
            } else {
                $payment = Payment::model()->findAllByAttributes(array(
                    'admin_id' => $aid
                ), array(
                    'order' => 'id ASC'
                ));
            }
            
            $pay_vln = 0;
            $pay_osc = 0;
            $pay_all = 0;
            
            foreach($payment as $p){
                $pay_vln = $pay_vln + $p->vln_fee;
                $pay_osc = $pay_osc + $p->osc_fee;
                $totalpay = $p->vln_fee + $p->osc_fee;
                $pay_all = $pay_all + $totalpay;
            }
            
            $fee = array(
                'pay_vln' => $pay_vln,
                'pay_osc' => $pay_osc,
                'pay_all' => $pay_all
            );
            
            return $fee;
        }
        
        public static function reportPaymentByAdmin($aid,$startdate,$enddate)
        {
            $payment = Payment::model()->findAllByAttributes(array(
                'admin_id' => $aid
            ), array(
                'condition' => 'DATE(created_at) BETWEEN :startdate AND :enddate',
                'params' => array(
                    ':startdate' => $startdate,
                    ':enddate' => $enddate
                ),
                'order' => 'id ASC'
            ));
            
            $pay_vln = 0;
            $pay_osc = 0;
            $pay_all = 0;
            
            foreach($payment as $p){
                $pay_vln = $pay_vln + $p->vln_fee;
                $pay_osc = $pay_osc + $p->osc_fee;
                $totalpay = $p->vln_fee + $p->osc_fee;
                $pay_all = $pay_all + $totalpay;
            }
            
            $fee = array(
                'pay_vln' => $pay_vln,
                'pay_osc' => $pay_osc,
                'pay_all' => $pay_all
            );
            
            return $fee;
        }
        
        public static function statPaymentByOsc($type = '')
        {
            if($type == 'today'){
                $payment = Payment::model()->findAll(array(
                    'condition' => 'DATE(created_at) = DATE(NOW())',
                    'order' => 'id ASC'
                ));
            } else {
                $payment = Payment::model()->findAll(array('order' => 'id ASC'));
            }
            
            $pay_vln = 0;
            $pay_osc = 0;
            $pay_all = 0;
            
            foreach($payment as $p){
                $pay_vln = $pay_vln + $p->vln_fee;
                $pay_osc = $pay_osc + $p->osc_fee;
                $totalpay = $p->vln_fee + $p->osc_fee;
                $pay_all = $pay_all + $totalpay;
            }
            
            $fee = array(
                'pay_vln' => $pay_vln,
                'pay_osc' => $pay_osc,
                'pay_all' => $pay_all
            );
            
            return $fee;
        }
        
        public static function reportPaymentByOsc($startdate,$enddate)
        {
            $payment = Payment::model()->findAll(array(
                'condition' => 'DATE(created_at) BETWEEN :startdate AND :enddate',
                'params' => array(
                    ':startdate' => $startdate,
                    ':enddate' => $enddate
                ),
                'order' => 'id ASC'
            ));
            
            $pay_vln = 0;
            $pay_osc = 0;
            $pay_all = 0;
            
            foreach($payment as $p){
                $pay_vln = $pay_vln + $p->vln_fee;
                $pay_osc = $pay_osc + $p->osc_fee;
                $totalpay = $p->vln_fee + $p->osc_fee;
                $pay_all = $pay_all + $totalpay;
            }
            
            $fee = array(
                'pay_vln' => $pay_vln,
                'pay_osc' => $pay_osc,
                'pay_all' => $pay_all
            );
            
            return $fee;
        }
}
