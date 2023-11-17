<?php

/**
 * This is the model class for table "passportscans".
 *
 * The followings are the available columns in table 'passportscans':
 * @property integer $id
 * @property integer $applicant_id
 * @property integer $batch_id
 * @property string $passport_number
 * @property integer $user_id
 * @property integer $branch_id
 * @property integer $admin_id
 * @property string $scanned_date
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $disable
 *
 * The followings are the available model relations:
 * @property Applicants $applicant
 * @property Batches $batch
 * @property Users $user
 * @property Branches $branch
 * @property Admins $admin
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class Passportscan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'passportscans';
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
			array('applicant_id, batch_id, user_id, branch_id, admin_id, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('passport_number, disable', 'length', 'max'=>255),
			array('scanned_date, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, applicant_id, batch_id, passport_number, user_id, branch_id, admin_id, scanned_date, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'branch' => array(self::BELONGS_TO, 'Branch', 'branch_id'),
			'admin' => array(self::BELONGS_TO, 'Admin', 'admin_id'),
                        'status' => array(self::BELONGS_TO, 'Result', 'status_id'),
                        'result' => array(self::BELONGS_TO, 'Result', 'result_id'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Passportscan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function statTrackingByBranch($bid,$aid,$type = '')
        {
            $batch = Batch::model()->statBatchByBranch($bid,$aid);
            
            $batchscope = array();
            foreach($batch as $b){
                $batchscope[] = $b->id;
            }
            
            if($type == 'today'){
                $passport = Passportscan::model()->findAllByAttributes(array(
                    'batch_id' => $batchscope
                ), array(
                    'condition' => 'DATE(created_at) = DATE(NOW())',
                    'order' => 'id ASC'
                ));
            } else {
                $passport = Passportscan::model()->findAllByAttributes(array(
                    'batch_id' => $batchscope
                ), array(
                    'order' => 'id ASC'
                ));
            }
            
            $d_brn_process = 0;
            $d_adm_in = 0;
            $d_adm_verify = 0;
            $d_osc_in = 0;
            $d_osc_verify = 0;
            $d_hc_in = 0;
            $d_hc_verify = 0;
            $r_osc_in = 0;
            $r_osc_verify = 0;
            $r_adm_in = 0;
            $r_adm_verify = 0;
            $r_brn_in = 0;
            $r_brn_verify = 0;
            
            foreach($passport as $p){
                if($p->status_id == 1){
                    $d_brn_process = $d_brn_process + 1;
                } else if($p->status_id == 2){
                    $d_adm_in = $d_adm_in + 1;
                } else if($p->status_id == 3){
                    $d_adm_verify = $d_adm_verify + 1;
                } else if($p->status_id == 5){
                    $d_osc_in = $d_osc_in + 1;
                } else if($p->status_id == 6){
                    $d_osc_verify = $d_osc_verify + 1;
                } else if($p->status_id == 8){
                    $d_hc_in = $d_hc_in + 1;
                } else if($p->status_id == 9){
                    $d_hc_verify = $d_hc_verify + 1;
                } else if($p->status_id == 13){
                    $r_osc_in = $r_osc_in + 1;
                } else if($p->status_id == 14){
                    $r_osc_verify = $r_osc_verify + 1;
                } else if($p->status_id == 15){
                    $r_adm_in = $r_adm_in + 1;
                } else if($p->status_id == 16){
                    $r_adm_verify = $r_adm_verify + 1;
                } else if($p->status_id == 17){
                    $r_brn_in = $r_brn_in + 1;
                } else if($p->status_id == 18){
                    $r_brn_verify = $r_brn_verify + 1;
                }
            }
            
            $d_adm_verify_not = $d_adm_in - $d_adm_verify;
            $d_osc_verify_not = $d_osc_in - $d_osc_verify;
            $d_hc_verify_not = $d_hc_in - $d_hc_verify;
            $r_osc_verify_not = $r_osc_in - $r_osc_verify;
            $r_adm_verify_not = $r_adm_in - $r_adm_verify;
            $r_brn_verify_not = $r_brn_in - $r_brn_verify;
            
            $d_adm_percent = number_format((($d_adm_verify/$d_adm_in) * 100),2);
            $d_osc_percent = number_format((($d_osc_verify/$d_osc_in) * 100),2);
            $d_hc_percent = number_format((($d_hc_verify/$d_hc_in) * 100),2);
            $r_osc_percent = number_format((($r_osc_verify/$r_osc_in) * 100),2);
            $r_adm_percent = number_format((($r_adm_verify/$r_adm_in) * 100),2);
            $r_brn_percent = number_format((($r_brn_verify/$r_brn_in) * 100),2);       
            
            $track = array(
                'd' => array(
                    'brn' => array(
                        'process' => $d_brn_process
                    ),
                    'adm' => array(
                        'in' => $d_adm_in,
                        'not_in' => $d_brn_process - $d_adm_in,
                        'verify' => $d_adm_verify,
                        'not' => $d_adm_verify_not,
                        'percent' => $d_adm_percent == 'nan' ? 0 : $d_adm_percent
                    ),
                    'osc' => array(
                        'in' => $d_osc_in,
                        'not_in' => $d_brn_process - $d_osc_in,
                        'verify' => $d_osc_verify,
                        'not' => $d_osc_verify_not,
                        'percent' => $d_osc_percent == 'nan' ? 0 : $d_osc_percent
                    ),
                    'hc' => array(
                        'in' => $d_hc_in,
                        'not_in' => $d_brn_process - $d_hc_in,
                        'verify' => $d_hc_verify,
                        'not' => $d_hc_verify_not,
                        'percent' => $d_hc_percent == 'nan' ? 0 : $d_hc_percent
                    )
                ),
                'r' => array(
                    'osc' => array(
                        'in' => $r_osc_in,
                        'not_in' => $d_brn_process - $r_osc_in,
                        'verify' => $r_osc_verify,
                        'not' => $r_osc_verify_not,
                        'percent' => $r_osc_percent == 'nan' ? 0 : $r_osc_percent
                    ),
                    'adm' => array(
                        'in' => $r_adm_in,
                        'not_in' => $d_brn_process - $r_adm_in,
                        'verify' => $r_adm_verify,
                        'not' => $r_adm_verify_not,
                        'percent' => $r_adm_percent == 'nan' ? 0 : $r_adm_percent
                    ),
                    'brn' => array(
                        'in' => $r_brn_in,
                        'not_in' => $d_brn_process - $r_brn_in,
                        'verify' => $r_brn_verify,
                        'not' => $r_brn_verify_not,
                        'percent' => $r_brn_percent == 'nan' ? 0 : $r_brn_percent
                    )
                )
            );
            
            return $track;
        }
        
        public static function reportTrackingByBranch($bid,$aid,$startdate,$enddate)
        {
            $batch = Batch::model()->statBatchByBranch($bid,$aid);
            
            $batchscope = array();
            foreach($batch as $b){
                $batchscope[] = $b->id;
            }
            
            $passport = Passportscan::model()->findAllByAttributes(array(
                'batch_id' => $batchscope
            ), array(
                'condition' => 'DATE(created_at) BETWEEN :startdate AND :enddate',
                'params' => array(
                    ':startdate' => $startdate,
                    ':enddate' => $enddate
                ),
                'order' => 'id ASC'
            ));
            
            $d_brn_process = 0;
            $d_adm_in = 0;
            $d_adm_verify = 0;
            $d_osc_in = 0;
            $d_osc_verify = 0;
            $d_hc_in = 0;
            $d_hc_verify = 0;
            $r_osc_in = 0;
            $r_osc_verify = 0;
            $r_adm_in = 0;
            $r_adm_verify = 0;
            $r_brn_in = 0;
            $r_brn_verify = 0;
            
            foreach($passport as $p){
                if($p->status_id == 1){
                    $d_brn_process = $d_brn_process + 1;
                } else if($p->status_id == 2){
                    $d_adm_in = $d_adm_in + 1;
                } else if($p->status_id == 3){
                    $d_adm_verify = $d_adm_verify + 1;
                } else if($p->status_id == 5){
                    $d_osc_in = $d_osc_in + 1;
                } else if($p->status_id == 6){
                    $d_osc_verify = $d_osc_verify + 1;
                } else if($p->status_id == 8){
                    $d_hc_in = $d_hc_in + 1;
                } else if($p->status_id == 9){
                    $d_hc_verify = $d_hc_verify + 1;
                } else if($p->status_id == 13){
                    $r_osc_in = $r_osc_in + 1;
                } else if($p->status_id == 14){
                    $r_osc_verify = $r_osc_verify + 1;
                } else if($p->status_id == 15){
                    $r_adm_in = $r_adm_in + 1;
                } else if($p->status_id == 16){
                    $r_adm_verify = $r_adm_verify + 1;
                } else if($p->status_id == 17){
                    $r_brn_in = $r_brn_in + 1;
                } else if($p->status_id == 18){
                    $r_brn_verify = $r_brn_verify + 1;
                }
            }
            
            $d_adm_verify_not = $d_adm_in - $d_adm_verify;
            $d_osc_verify_not = $d_osc_in - $d_osc_verify;
            $d_hc_verify_not = $d_hc_in - $d_hc_verify;
            $r_osc_verify_not = $r_osc_in - $r_osc_verify;
            $r_adm_verify_not = $r_adm_in - $r_adm_verify;
            $r_brn_verify_not = $r_brn_in - $r_brn_verify;
            
            $d_adm_percent = number_format((($d_adm_verify/$d_adm_in) * 100),2);
            $d_osc_percent = number_format((($d_osc_verify/$d_osc_in) * 100),2);
            $d_hc_percent = number_format((($d_hc_verify/$d_hc_in) * 100),2);
            $r_osc_percent = number_format((($r_osc_verify/$r_osc_in) * 100),2);
            $r_adm_percent = number_format((($r_adm_verify/$r_adm_in) * 100),2);
            $r_brn_percent = number_format((($r_brn_verify/$r_brn_in) * 100),2);       
            
            $track = array(
                'd' => array(
                    'brn' => array(
                        'process' => $d_brn_process
                    ),
                    'adm' => array(
                        'in' => $d_adm_in,
                        'not_in' => $d_brn_process - $d_adm_in,
                        'verify' => $d_adm_verify,
                        'not' => $d_adm_verify_not,
                        'percent' => $d_adm_percent == 'nan' ? 0 : $d_adm_percent
                    ),
                    'osc' => array(
                        'in' => $d_osc_in,
                        'not_in' => $d_brn_process - $d_osc_in,
                        'verify' => $d_osc_verify,
                        'not' => $d_osc_verify_not,
                        'percent' => $d_osc_percent == 'nan' ? 0 : $d_osc_percent
                    ),
                    'hc' => array(
                        'in' => $d_hc_in,
                        'not_in' => $d_brn_process - $d_hc_in,
                        'verify' => $d_hc_verify,
                        'not' => $d_hc_verify_not,
                        'percent' => $d_hc_percent == 'nan' ? 0 : $d_hc_percent
                    )
                ),
                'r' => array(
                    'osc' => array(
                        'in' => $r_osc_in,
                        'not_in' => $d_brn_process - $r_osc_in,
                        'verify' => $r_osc_verify,
                        'not' => $r_osc_verify_not,
                        'percent' => $r_osc_percent == 'nan' ? 0 : $r_osc_percent
                    ),
                    'adm' => array(
                        'in' => $r_adm_in,
                        'not_in' => $d_brn_process - $r_adm_in,
                        'verify' => $r_adm_verify,
                        'not' => $r_adm_verify_not,
                        'percent' => $r_adm_percent == 'nan' ? 0 : $r_adm_percent
                    ),
                    'brn' => array(
                        'in' => $r_brn_in,
                        'not_in' => $d_brn_process - $r_brn_in,
                        'verify' => $r_brn_verify,
                        'not' => $r_brn_verify_not,
                        'percent' => $r_brn_percent == 'nan' ? 0 : $r_brn_percent
                    )
                )
            );
            
            return $track;
        }

        public static function statTrackingByAdmin($aid,$type = '')
        {
            $batch = Batch::model()->statBatchByAdmin($aid);
            
            $batchscope = array();
            foreach($batch as $b){
                $batchscope[] = $b->id;
            }
            
            if($type == 'today'){
                $passport = Passportscan::model()->findAllByAttributes(array(
                    'batch_id' => $batchscope
                ), array(
                    'condition' => 'DATE(created_at) = DATE(NOW())',
                    'order' => 'id ASC'
                ));
            } else {
                $passport = Passportscan::model()->findAllByAttributes(array(
                    'batch_id' => $batchscope
                ), array(
                    'order' => 'id ASC'
                ));
            }
            
            $d_brn_process = 0;
            $d_adm_in = 0;
            $d_adm_verify = 0;
            $d_osc_in = 0;
            $d_osc_verify = 0;
            $d_hc_in = 0;
            $d_hc_verify = 0;
            $r_osc_in = 0;
            $r_osc_verify = 0;
            $r_adm_in = 0;
            $r_adm_verify = 0;
            $r_brn_in = 0;
            $r_brn_verify = 0;
            
            foreach($passport as $p){
                if($p->status_id == 1){
                    $d_brn_process = $d_brn_process + 1;
                } else if($p->status_id == 2){
                    $d_adm_in = $d_adm_in + 1;
                } else if($p->status_id == 3){
                    $d_adm_verify = $d_adm_verify + 1;
                } else if($p->status_id == 5){
                    $d_osc_in = $d_osc_in + 1;
                } else if($p->status_id == 6){
                    $d_osc_verify = $d_osc_verify + 1;
                } else if($p->status_id == 8){
                    $d_hc_in = $d_hc_in + 1;
                } else if($p->status_id == 9){
                    $d_hc_verify = $d_hc_verify + 1;
                } else if($p->status_id == 13){
                    $r_osc_in = $r_osc_in + 1;
                } else if($p->status_id == 14){
                    $r_osc_verify = $r_osc_verify + 1;
                } else if($p->status_id == 15){
                    $r_adm_in = $r_adm_in + 1;
                } else if($p->status_id == 16){
                    $r_adm_verify = $r_adm_verify + 1;
                } else if($p->status_id == 17){
                    $r_brn_in = $r_brn_in + 1;
                } else if($p->status_id == 18){
                    $r_brn_verify = $r_brn_verify + 1;
                }
            }
            
            $d_adm_verify_not = $d_adm_in - $d_adm_verify;
            $d_osc_verify_not = $d_osc_in - $d_osc_verify;
            $d_hc_verify_not = $d_hc_in - $d_hc_verify;
            $r_osc_verify_not = $r_osc_in - $r_osc_verify;
            $r_adm_verify_not = $r_adm_in - $r_adm_verify;
            $r_brn_verify_not = $r_brn_in - $r_brn_verify;
            
            $d_adm_percent = number_format((($d_adm_verify/$d_adm_in) * 100),2);
            $d_osc_percent = number_format((($d_osc_verify/$d_osc_in) * 100),2);
            $d_hc_percent = number_format((($d_hc_verify/$d_hc_in) * 100),2);
            $r_osc_percent = number_format((($r_osc_verify/$r_osc_in) * 100),2);
            $r_adm_percent = number_format((($r_adm_verify/$r_adm_in) * 100),2);
            $r_brn_percent = number_format((($r_brn_verify/$r_brn_in) * 100),2);
            
            $track = array(
                'd' => array(
                    'brn' => array(
                        'process' => $d_brn_process
                    ),
                    'adm' => array(
                        'in' => $d_adm_in,
                        'not_in' => $d_brn_process - $d_adm_in,
                        'verify' => $d_adm_verify,
                        'not' => $d_adm_verify_not,
                        'percent' => $d_adm_percent == 'nan' ? 0 : $d_adm_percent
                    ),
                    'osc' => array(
                        'in' => $d_osc_in,
                        'not_in' => $d_brn_process - $d_osc_in,
                        'verify' => $d_osc_verify,
                        'not' => $d_osc_verify_not,
                        'percent' => $d_osc_percent == 'nan' ? 0 : $d_osc_percent
                    ),
                    'hc' => array(
                        'in' => $d_hc_in,
                        'not_in' => $d_brn_process - $d_hc_in,
                        'verify' => $d_hc_verify,
                        'not' => $d_hc_verify_not,
                        'percent' => $d_hc_percent == 'nan' ? 0 : $d_hc_percent
                    )
                ),
                'r' => array(
                    'osc' => array(
                        'in' => $r_osc_in,
                        'not_in' => $d_brn_process - $r_osc_in,
                        'verify' => $r_osc_verify,
                        'not' => $r_osc_verify_not,
                        'percent' => $r_osc_percent == 'nan' ? 0 : $r_osc_percent
                    ),
                    'adm' => array(
                        'in' => $r_adm_in,
                        'not_in' => $d_brn_process - $r_adm_in,
                        'verify' => $r_adm_verify,
                        'not' => $r_adm_verify_not,
                        'percent' => $r_adm_percent == 'nan' ? 0 : $r_adm_percent
                    ),
                    'brn' => array(
                        'in' => $r_brn_in,
                        'not_in' => $d_brn_process - $r_brn_in,
                        'verify' => $r_brn_verify,
                        'not' => $r_brn_verify_not,
                        'percent' => $r_brn_percent == 'nan' ? 0 : $r_brn_percent
                    )
                )
            );
            
            return $track;
        }
        
        public static function reportTrackingByAdmin($aid,$startdate,$enddate)
        {
            $batch = Batch::model()->statBatchByAdmin($aid);
            
            $batchscope = array();
            foreach($batch as $b){
                $batchscope[] = $b->id;
            }
            
            $passport = Passportscan::model()->findAllByAttributes(array(
                'batch_id' => $batchscope
            ), array(
                'condition' => 'DATE(created_at) BETWEEN :startdate AND :enddate',
                'params' => array(
                    ':startdate' => $startdate,
                    ':enddate' => $enddate
                ),
                'order' => 'id ASC'
            ));
            
            $d_brn_process = 0;
            $d_adm_in = 0;
            $d_adm_verify = 0;
            $d_osc_in = 0;
            $d_osc_verify = 0;
            $d_hc_in = 0;
            $d_hc_verify = 0;
            $r_osc_in = 0;
            $r_osc_verify = 0;
            $r_adm_in = 0;
            $r_adm_verify = 0;
            $r_brn_in = 0;
            $r_brn_verify = 0;
            
            foreach($passport as $p){
                if($p->status_id == 1){
                    $d_brn_process = $d_brn_process + 1;
                } else if($p->status_id == 2){
                    $d_adm_in = $d_adm_in + 1;
                } else if($p->status_id == 3){
                    $d_adm_verify = $d_adm_verify + 1;
                } else if($p->status_id == 5){
                    $d_osc_in = $d_osc_in + 1;
                } else if($p->status_id == 6){
                    $d_osc_verify = $d_osc_verify + 1;
                } else if($p->status_id == 8){
                    $d_hc_in = $d_hc_in + 1;
                } else if($p->status_id == 9){
                    $d_hc_verify = $d_hc_verify + 1;
                } else if($p->status_id == 13){
                    $r_osc_in = $r_osc_in + 1;
                } else if($p->status_id == 14){
                    $r_osc_verify = $r_osc_verify + 1;
                } else if($p->status_id == 15){
                    $r_adm_in = $r_adm_in + 1;
                } else if($p->status_id == 16){
                    $r_adm_verify = $r_adm_verify + 1;
                } else if($p->status_id == 17){
                    $r_brn_in = $r_brn_in + 1;
                } else if($p->status_id == 18){
                    $r_brn_verify = $r_brn_verify + 1;
                }
            }
            
            $d_adm_verify_not = $d_adm_in - $d_adm_verify;
            $d_osc_verify_not = $d_osc_in - $d_osc_verify;
            $d_hc_verify_not = $d_hc_in - $d_hc_verify;
            $r_osc_verify_not = $r_osc_in - $r_osc_verify;
            $r_adm_verify_not = $r_adm_in - $r_adm_verify;
            $r_brn_verify_not = $r_brn_in - $r_brn_verify;
            
            $d_adm_percent = number_format((($d_adm_verify/$d_adm_in) * 100),2);
            $d_osc_percent = number_format((($d_osc_verify/$d_osc_in) * 100),2);
            $d_hc_percent = number_format((($d_hc_verify/$d_hc_in) * 100),2);
            $r_osc_percent = number_format((($r_osc_verify/$r_osc_in) * 100),2);
            $r_adm_percent = number_format((($r_adm_verify/$r_adm_in) * 100),2);
            $r_brn_percent = number_format((($r_brn_verify/$r_brn_in) * 100),2);       
            
            $track = array(
                'd' => array(
                    'brn' => array(
                        'process' => $d_brn_process
                    ),
                    'adm' => array(
                        'in' => $d_adm_in,
                        'not_in' => $d_brn_process - $d_adm_in,
                        'verify' => $d_adm_verify,
                        'not' => $d_adm_verify_not,
                        'percent' => $d_adm_percent == 'nan' ? 0 : $d_adm_percent
                    ),
                    'osc' => array(
                        'in' => $d_osc_in,
                        'not_in' => $d_brn_process - $d_osc_in,
                        'verify' => $d_osc_verify,
                        'not' => $d_osc_verify_not,
                        'percent' => $d_osc_percent == 'nan' ? 0 : $d_osc_percent
                    ),
                    'hc' => array(
                        'in' => $d_hc_in,
                        'not_in' => $d_brn_process - $d_hc_in,
                        'verify' => $d_hc_verify,
                        'not' => $d_hc_verify_not,
                        'percent' => $d_hc_percent == 'nan' ? 0 : $d_hc_percent
                    )
                ),
                'r' => array(
                    'osc' => array(
                        'in' => $r_osc_in,
                        'not_in' => $d_brn_process - $r_osc_in,
                        'verify' => $r_osc_verify,
                        'not' => $r_osc_verify_not,
                        'percent' => $r_osc_percent == 'nan' ? 0 : $r_osc_percent
                    ),
                    'adm' => array(
                        'in' => $r_adm_in,
                        'not_in' => $d_brn_process - $r_adm_in,
                        'verify' => $r_adm_verify,
                        'not' => $r_adm_verify_not,
                        'percent' => $r_adm_percent == 'nan' ? 0 : $r_adm_percent
                    ),
                    'brn' => array(
                        'in' => $r_brn_in,
                        'not_in' => $d_brn_process - $r_brn_in,
                        'verify' => $r_brn_verify,
                        'not' => $r_brn_verify_not,
                        'percent' => $r_brn_percent == 'nan' ? 0 : $r_brn_percent
                    )
                )
            );
            
            return $track;
        }
        
        public static function statTrackingByOsc($type = '')
        {
            $batch = Batch::model()->statBatchByOsc();
            
            $batchscope = array();
            foreach($batch as $b){
                $batchscope[] = $b->id;
            }
            
            if($type == 'today'){
                $passport = Passportscan::model()->findAllByAttributes(array(
                    'batch_id' => $batchscope
                ), array(
                    'condition' => 'DATE(created_at) = DATE(NOW())',
                    'order' => 'id ASC'
                ));
            } else {
                $passport = Passportscan::model()->findAllByAttributes(array(
                    'batch_id' => $batchscope
                ), array(
                    'order' => 'id ASC'
                ));
            }
            
            $d_brn_process = 0;
            $d_adm_in = 0;
            $d_adm_verify = 0;
            $d_osc_in = 0;
            $d_osc_verify = 0;
            $d_hc_in = 0;
            $d_hc_verify = 0;
            $r_osc_in = 0;
            $r_osc_verify = 0;
            $r_adm_in = 0;
            $r_adm_verify = 0;
            $r_brn_in = 0;
            $r_brn_verify = 0;
            
            foreach($passport as $p){
                if($p->status_id == 1){
                    $d_brn_process = $d_brn_process + 1;
                } else if($p->status_id == 2){
                    $d_adm_in = $d_adm_in + 1;
                } else if($p->status_id == 3){
                    $d_adm_verify = $d_adm_verify + 1;
                } else if($p->status_id == 5){
                    $d_osc_in = $d_osc_in + 1;
                } else if($p->status_id == 6){
                    $d_osc_verify = $d_osc_verify + 1;
                } else if($p->status_id == 8){
                    $d_hc_in = $d_hc_in + 1;
                } else if($p->status_id == 9){
                    $d_hc_verify = $d_hc_verify + 1;
                } else if($p->status_id == 13){
                    $r_osc_in = $r_osc_in + 1;
                } else if($p->status_id == 14){
                    $r_osc_verify = $r_osc_verify + 1;
                } else if($p->status_id == 15){
                    $r_adm_in = $r_adm_in + 1;
                } else if($p->status_id == 16){
                    $r_adm_verify = $r_adm_verify + 1;
                } else if($p->status_id == 17){
                    $r_brn_in = $r_brn_in + 1;
                } else if($p->status_id == 18){
                    $r_brn_verify = $r_brn_verify + 1;
                }
            }
            
            $d_adm_verify_not = $d_adm_in - $d_adm_verify;
            $d_osc_verify_not = $d_osc_in - $d_osc_verify;
            $d_hc_verify_not = $d_hc_in - $d_hc_verify;
            $r_osc_verify_not = $r_osc_in - $r_osc_verify;
            $r_adm_verify_not = $r_adm_in - $r_adm_verify;
            $r_brn_verify_not = $r_brn_in - $r_brn_verify;
            
            $d_adm_percent = number_format((($d_adm_verify/$d_adm_in) * 100),2);
            $d_osc_percent = number_format((($d_osc_verify/$d_osc_in) * 100),2);
            $d_hc_percent = number_format((($d_hc_verify/$d_hc_in) * 100),2);
            $r_osc_percent = number_format((($r_osc_verify/$r_osc_in) * 100),2);
            $r_adm_percent = number_format((($r_adm_verify/$r_adm_in) * 100),2);
            $r_brn_percent = number_format((($r_brn_verify/$r_brn_in) * 100),2);
            
            $track = array(
                'd' => array(
                    'brn' => array(
                        'process' => $d_brn_process
                    ),
                    'adm' => array(
                        'in' => $d_adm_in,
                        'not_in' => $d_brn_process - $d_adm_in,
                        'verify' => $d_adm_verify,
                        'not' => $d_adm_verify_not,
                        'percent' => $d_adm_percent == 'nan' ? 0 : $d_adm_percent
                    ),
                    'osc' => array(
                        'in' => $d_osc_in,
                        'not_in' => $d_brn_process - $d_osc_in,
                        'verify' => $d_osc_verify,
                        'not' => $d_osc_verify_not,
                        'percent' => $d_osc_percent == 'nan' ? 0 : $d_osc_percent
                    ),
                    'hc' => array(
                        'in' => $d_hc_in,
                        'not_in' => $d_brn_process - $d_hc_in,
                        'verify' => $d_hc_verify,
                        'not' => $d_hc_verify_not,
                        'percent' => $d_hc_percent == 'nan' ? 0 : $d_hc_percent
                    )
                ),
                'r' => array(
                    'osc' => array(
                        'in' => $r_osc_in,
                        'not_in' => $d_brn_process - $r_osc_in,
                        'verify' => $r_osc_verify,
                        'not' => $r_osc_verify_not,
                        'percent' => $r_osc_percent == 'nan' ? 0 : $r_osc_percent
                    ),
                    'adm' => array(
                        'in' => $r_adm_in,
                        'not_in' => $d_brn_process - $r_adm_in,
                        'verify' => $r_adm_verify,
                        'not' => $r_adm_verify_not,
                        'percent' => $r_adm_percent == 'nan' ? 0 : $r_adm_percent
                    ),
                    'brn' => array(
                        'in' => $r_brn_in,
                        'not_in' => $d_brn_process - $r_brn_in,
                        'verify' => $r_brn_verify,
                        'not' => $r_brn_verify_not,
                        'percent' => $r_brn_percent == 'nan' ? 0 : $r_brn_percent
                    )
                )
            );
            
            return $track;
        }
        
        public static function reportTrackingByOsc($startdate,$enddate)
        {
            $batch = Batch::model()->statBatchByOsc();
            
            $batchscope = array();
            foreach($batch as $b){
                $batchscope[] = $b->id;
            }
            
            $passport = Passportscan::model()->findAllByAttributes(array(
                'batch_id' => $batchscope
            ), array(
                'condition' => 'DATE(created_at) BETWEEN :startdate AND :enddate',
                'params' => array(
                    ':startdate' => $startdate,
                    ':enddate' => $enddate
                ),
                'order' => 'id ASC'
            ));
            
            $d_brn_process = 0;
            $d_adm_in = 0;
            $d_adm_verify = 0;
            $d_osc_in = 0;
            $d_osc_verify = 0;
            $d_hc_in = 0;
            $d_hc_verify = 0;
            $r_osc_in = 0;
            $r_osc_verify = 0;
            $r_adm_in = 0;
            $r_adm_verify = 0;
            $r_brn_in = 0;
            $r_brn_verify = 0;
            
            foreach($passport as $p){
                if($p->status_id == 1){
                    $d_brn_process = $d_brn_process + 1;
                } else if($p->status_id == 2){
                    $d_adm_in = $d_adm_in + 1;
                } else if($p->status_id == 3){
                    $d_adm_verify = $d_adm_verify + 1;
                } else if($p->status_id == 5){
                    $d_osc_in = $d_osc_in + 1;
                } else if($p->status_id == 6){
                    $d_osc_verify = $d_osc_verify + 1;
                } else if($p->status_id == 8){
                    $d_hc_in = $d_hc_in + 1;
                } else if($p->status_id == 9){
                    $d_hc_verify = $d_hc_verify + 1;
                } else if($p->status_id == 13){
                    $r_osc_in = $r_osc_in + 1;
                } else if($p->status_id == 14){
                    $r_osc_verify = $r_osc_verify + 1;
                } else if($p->status_id == 15){
                    $r_adm_in = $r_adm_in + 1;
                } else if($p->status_id == 16){
                    $r_adm_verify = $r_adm_verify + 1;
                } else if($p->status_id == 17){
                    $r_brn_in = $r_brn_in + 1;
                } else if($p->status_id == 18){
                    $r_brn_verify = $r_brn_verify + 1;
                }
            }
            
            $d_adm_verify_not = $d_adm_in - $d_adm_verify;
            $d_osc_verify_not = $d_osc_in - $d_osc_verify;
            $d_hc_verify_not = $d_hc_in - $d_hc_verify;
            $r_osc_verify_not = $r_osc_in - $r_osc_verify;
            $r_adm_verify_not = $r_adm_in - $r_adm_verify;
            $r_brn_verify_not = $r_brn_in - $r_brn_verify;
            
            $d_adm_percent = number_format((($d_adm_verify/$d_adm_in) * 100),2);
            $d_osc_percent = number_format((($d_osc_verify/$d_osc_in) * 100),2);
            $d_hc_percent = number_format((($d_hc_verify/$d_hc_in) * 100),2);
            $r_osc_percent = number_format((($r_osc_verify/$r_osc_in) * 100),2);
            $r_adm_percent = number_format((($r_adm_verify/$r_adm_in) * 100),2);
            $r_brn_percent = number_format((($r_brn_verify/$r_brn_in) * 100),2);       
            
            $track = array(
                'd' => array(
                    'brn' => array(
                        'process' => $d_brn_process
                    ),
                    'adm' => array(
                        'in' => $d_adm_in,
                        'not_in' => $d_brn_process - $d_adm_in,
                        'verify' => $d_adm_verify,
                        'not' => $d_adm_verify_not,
                        'percent' => $d_adm_percent == 'nan' ? 0 : $d_adm_percent
                    ),
                    'osc' => array(
                        'in' => $d_osc_in,
                        'not_in' => $d_brn_process - $d_osc_in,
                        'verify' => $d_osc_verify,
                        'not' => $d_osc_verify_not,
                        'percent' => $d_osc_percent == 'nan' ? 0 : $d_osc_percent
                    ),
                    'hc' => array(
                        'in' => $d_hc_in,
                        'not_in' => $d_brn_process - $d_hc_in,
                        'verify' => $d_hc_verify,
                        'not' => $d_hc_verify_not,
                        'percent' => $d_hc_percent == 'nan' ? 0 : $d_hc_percent
                    )
                ),
                'r' => array(
                    'osc' => array(
                        'in' => $r_osc_in,
                        'not_in' => $d_brn_process - $r_osc_in,
                        'verify' => $r_osc_verify,
                        'not' => $r_osc_verify_not,
                        'percent' => $r_osc_percent == 'nan' ? 0 : $r_osc_percent
                    ),
                    'adm' => array(
                        'in' => $r_adm_in,
                        'not_in' => $d_brn_process - $r_adm_in,
                        'verify' => $r_adm_verify,
                        'not' => $r_adm_verify_not,
                        'percent' => $r_adm_percent == 'nan' ? 0 : $r_adm_percent
                    ),
                    'brn' => array(
                        'in' => $r_brn_in,
                        'not_in' => $d_brn_process - $r_brn_in,
                        'verify' => $r_brn_verify,
                        'not' => $r_brn_verify_not,
                        'percent' => $r_brn_percent == 'nan' ? 0 : $r_brn_percent
                    )
                )
            );
            
            return $track;
        }
}
