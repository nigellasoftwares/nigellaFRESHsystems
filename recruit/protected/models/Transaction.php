<?php

class Transaction extends CActiveRecord {

    public function tableName() {
        return 'transactions';
    }
    
    public function defaultScope()
    {
        return array(
            'condition' => "disable = 'ACTIVE'",
        );
    }
    
    public function rules() {
        return array(
            array('worker_id, sourceagency_id, localagency_id, employer_id, passport_id, created_by, updated_by', 'numerical', 'integerOnly' => true),
            array('code, guid, flight_number, eta_malaysia, medical, visa, status, disable', 'length', 'max' => 255),
            array('arrival_date, plks_expiry_date, flight_date, created_at, updated_at', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, code, guid, worker_id, sourceagency_id, localagency_id, employer_id, passport_id, arrival_date, plks_expiry_date, flight_number, eta_malaysia, flight_date, medical, visa, status, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on' => 'search'),
            
            array('created_at, updated_at','default', 'value'=>date('Y-m-d H:i:s'), 'setOnEmpty'=>false,'on'=>'insert'),
            array('created_by, updated_by','default', 'value'=>Yii::app()->user->getState('userid'), 'setOnEmpty'=>false,'on'=>'insert'),
            array('updated_at','default', 'value'=>date('Y-m-d H:i:s'), 'setOnEmpty'=>false,'on'=>'update'),
            array('updated_by','default', 'value'=>Yii::app()->user->getState('userid'), 'setOnEmpty'=>false,'on'=>'update'),
        );
    }

    public function relations() {
        return array(
            'passports' => array(self::HAS_MANY, 'Passport', 'transaction_id'),
            'worker' => array(self::BELONGS_TO, 'Worker', 'worker_id'),
            'sourceagency' => array(self::BELONGS_TO, 'User', 'sourceagency_id'),
            'localagency' => array(self::BELONGS_TO, 'User', 'localagency_id'),
            'employer' => array(self::BELONGS_TO, 'User', 'employer_id'),
            'quota' => array(self::BELONGS_TO, 'Quota', 'quota_id'),
            'passport' => array(self::BELONGS_TO, 'Passport', 'passport_id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
        );
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public static function statisticBySourceAgent($id,$type = '') 
    {
        if($type == 'today'){
            $transaction = Transaction::model()->findAllByAttributes(array(
                'sourceagency_id' => $id
            ), array(
                'condition' => 'DATE(created_at) = DATE(NOW())',
                'order' => 'id ASC'
            ));
        } else {
            $transaction = Transaction::model()->findAllByAttributes(array(
                'sourceagency_id' => $id
            ), array(
                'order' => 'id ASC'
            ));
        }
        
        $male = 0;
        $female = 0;
        $m_completed = 0;
        $m_pending = 0;
        $v_completed = 0;
        $v_pending = 0;
        $afd_completed = 0;
        $afd_pending = 0;
        
        foreach($transaction as $t){
            if($t->worker->gender->name == 'MALE'){
                $male += 1;
            } else if($t->worker->gender->name == 'FEMALE'){
                $female += 1;
            }
            
            if($t->medical == 'YES'){
                $m_completed += 1;
            } else {
                $m_pending += 1;
            }
            
            if($t->visa == 'YES'){
                $v_completed += 1;
            } else {
                $v_pending += 1;
            }
            
            if($t->approval == 'YES'){
                $afd_completed += 1;
            } else {
                $afd_pending += 1;
            }
        }    
            
        $output = array(
            'register' => count($transaction),
            'male' => $male,
            'female' => $female,
            'medical' => array(
                'completed' => $m_completed,
                'pending' => $m_pending,
            ),
            'visa' => array(
                'completed' => $v_completed,
                'pending' => $v_pending,
            ),
            'approval' => array(
                'completed' => $afd_completed,
                'pending' => $afd_pending,
            )
       );
        
        return $output;
    }
    
    public static function statisticByLocalAgent($type = '') 
    {
        if($type == 'today'){
            $transaction = Transaction::model()->findAll(array(
                'condition' => 'DATE(created_at) = DATE(NOW())',
                'order' => 'id ASC'
            ));
        } else {
            $transaction = Transaction::model()->findAll(array(
                'order' => 'id ASC'
            ));
        }
        
        $male = 0;
        $female = 0;
        $m_completed = 0;
        $m_pending = 0;
        $v_completed = 0;
        $v_pending = 0;
        
        foreach($transaction as $t){
            if($t->worker->gender->name == 'MALE'){
                $male += 1;
            } else if($t->worker->gender->name == 'FEMALE'){
                $female += 1;
            }
            
            if($t->medical == 'YES'){
                $m_completed += 1;
            } else {
                $m_pending += 1;
            }
            
            if($t->visa == 'YES'){
                $v_completed += 1;
            } else {
                $v_pending += 1;
            }
        }    
            
        $output = array(
            'register' => count($transaction),
            'male' => $male,
            'female' => $female,
            'medical' => array(
                'completed' => $m_completed,
                'pending' => $m_pending,
            ),
            'visa' => array(
                'completed' => $v_completed,
                'pending' => $v_pending,
            )
       );
        
        return $output;
    }
    
    public static function statisticByEmployer($id,$type = '') 
    {
        if($type == 'today'){
            $transaction = Transaction::model()->findAllByAttributes(array(
                'employer_id' => $id
            ), array(
                'condition' => 'DATE(created_at) = DATE(NOW())',
                'order' => 'id ASC'
            ));
        } else {
            $transaction = Transaction::model()->findAllByAttributes(array(
                'employer_id' => $id
            ), array(
                'order' => 'id ASC'
            ));
        }
        
        $male = 0;
        $female = 0;
        $m_completed = 0;
        $m_pending = 0;
        $v_completed = 0;
        $v_pending = 0;
        
        foreach($transaction as $t){
            if($t->worker->gender->name == 'MALE'){
                $male += 1;
            } else if($t->worker->gender->name == 'FEMALE'){
                $female += 1;
            }
            
            if($t->medical == 'YES'){
                $m_completed += 1;
            } else {
                $m_pending += 1;
            }
            
            if($t->visa == 'YES'){
                $v_completed += 1;
            } else {
                $v_pending += 1;
            }
        }    
            
        $output = array(
            'register' => count($transaction),
            'male' => $male,
            'female' => $female,
            'medical' => array(
                'completed' => $m_completed,
                'pending' => $m_pending,
            ),
            'visa' => array(
                'completed' => $v_completed,
                'pending' => $v_pending,
            )
       );
        
        return $output;
    }
    
    public static function medicalReminder($role,$id = '')
    {
        if($role == 'ADMIN'){
            $transaction = Transaction::model()->findAll(array(
                'condition' => 'arrival_date IS NOT NULL',
                'order' => 'id ASC'
            ));
        } else if($role == 'EMPLOYER'){
            $transaction = Transaction::model()->findAllByAttributes(array(
                'employer_id' => $id
            ), array(
                'condition' => 'arrival_date IS NOT NULL',
                'order' => 'id ASC'
            ));
        }
        
        $today = date('Y-m-d');
        $status = array();
        $status['reminder']['today'] = $today;
        
        foreach($transaction as $t){
            $onemonth = date('Y-m-d', strtotime($t->arrival_date.'+1 month'));
            $status['reminder']['onemonth'] = $onemonth;
            
            if($onemonth == $today){
                $status['reminder']['month_01'] += 1;
                $status['worker']['month_01'][]  = array(
                    'code' => $t->worker->code,
                    'name' => $t->worker->full_name,
                    'passport' => $t->passport->number,
                    'nationality' => $t->worker->nationality->country,
                    'arrival' => date('d M Y', strtotime($t->arrival_date))    
                );
            }
            
            $twoweeks = date('Y-m-d', strtotime($t->arrival_date.'+2 weeks'));
            $status['reminder']['twoweeks'] = $twoweeks;
            
            if($twoweeks == $today){
                $status['reminder']['week_02'] += 1;
                $status['worker']['week_02'][]  = array(
                    'code' => $t->worker->code,
                    'name' => $t->worker->full_name,
                    'passport' => $t->passport->number,
                    'nationality' => $t->worker->nationality->country,
                    'arrival' => date('d M Y', strtotime($t->arrival_date))    
                );
            }
            
            $oneweek = date('Y-m-d', strtotime($t->arrival_date.'+1 week'));
            $status['reminder']['oneweek'] = $oneweek;
            
            if($oneweek == $today){
                $status['reminder']['week_01'] += 1;
                $status['worker']['week_01'][]  = array(
                    'code' => $t->worker->code,
                    'name' => $t->worker->full_name,
                    'passport' => $t->passport->number,
                    'nationality' => $t->worker->nationality->country,
                    'arrival' => date('d M Y', strtotime($t->arrival_date))    
                );
            }
            
            $threedays = date('Y-m-d', strtotime($t->arrival_date.'+3 days'));
            $status['reminder']['threedays'] = $threedays;
            
            if($threedays == $today){
                $status['reminder']['day_03'] += 1;
                $status['worker']['day_03'][]  = array(
                    'code' => $t->worker->code,
                    'name' => $t->worker->full_name,
                    'passport' => $t->passport->number,
                    'nationality' => $t->worker->nationality->country,
                    'arrival' => date('d M Y', strtotime($t->arrival_date))    
                );
            }
            
            $twodays = date('Y-m-d', strtotime($t->arrival_date.'+2 days'));
            $status['reminder']['twodays'] = $twodays;
            
            if($twodays == $today){
                $status['reminder']['day_02'] += 1;
                $status['worker']['day_02'][]  = array(
                    'code' => $t->worker->code,
                    'name' => $t->worker->full_name,
                    'passport' => $t->passport->number,
                    'nationality' => $t->worker->nationality->country,
                    'arrival' => date('d M Y', strtotime($t->arrival_date))    
                );
            }
            
            $oneday = date('Y-m-d', strtotime($t->arrival_date.'+1 day'));
            $status['reminder']['oneday'] = $oneday;
            
            if($oneday == $today){
                $status['reminder']['day_01'] += 1;
                $status['worker']['day_01'][]  = array(
                    'code' => $t->worker->code,
                    'name' => $t->worker->full_name,
                    'passport' => $t->passport->number,
                    'nationality' => $t->worker->nationality->country,
                    'arrival' => date('d M Y', strtotime($t->arrival_date))    
                );
            }
        }
        
        return $status;
    }
    
    public static function plksReminder($role,$id = '')
    {
        if($role == 'ADMIN'){
            $transaction = Transaction::model()->findAll(array(
                'condition' => 'arrival_date IS NOT NULL AND plks_expiry_date IS NOT NULL',
                'order' => 'id ASC'
            ));
        } else if($role == 'EMPLOYER'){
            $transaction = Transaction::model()->findAllByAttributes(array(
                'employer_id' => $id
            ), array(
                'condition' => 'arrival_date IS NOT NULL AND plks_expiry_date IS NOT NULL',
                'order' => 'id ASC'
            ));
        }
        
        $today = date('Y-m-d');
        $status = array();
        $status['reminder']['today'] = $today;
        
        foreach($transaction as $t){
            $threemonths = date('Y-m-d', strtotime($t->plks_expiry_date.'-3 months'));
            $status['reminder']['threemonths'] = $threemonths;
            
            if($threemonths == $today){
                $status['reminder']['month_03'] += 1;
                $status['worker']['month_03'][]  = array(
                    'code' => $t->worker->code,
                    'name' => $t->worker->full_name,
                    'passport' => $t->passport->number,
                    'nationality' => $t->worker->nationality->country,
                    'arrival' => date('d M Y', strtotime($t->plks_expiry_date))    
                );
            }
            
            $twomonths = date('Y-m-d', strtotime($t->plks_expiry_date.'-2 months'));
            $status['reminder']['twomonths'] = $twomonths;
            
            if($twomonths == $today){
                $status['reminder']['month_02'] += 1;
                $status['worker']['month_02'][]  = array(
                    'code' => $t->worker->code,
                    'name' => $t->worker->full_name,
                    'passport' => $t->passport->number,
                    'nationality' => $t->worker->nationality->country,
                    'arrival' => date('d M Y', strtotime($t->plks_expiry_date))    
                );
            }
            
            $onemonth = date('Y-m-d', strtotime($t->plks_expiry_date.'-1 month'));
            $status['reminder']['onemonth'] = $onemonth;
            
            if($onemonth == $today){
                $status['reminder']['month_01'] += 1;
                $status['worker']['month_01'][]  = array(
                    'code' => $t->worker->code,
                    'name' => $t->worker->full_name,
                    'passport' => $t->passport->number,
                    'nationality' => $t->worker->nationality->country,
                    'arrival' => date('d M Y', strtotime($t->plks_expiry_date))    
                );
            }
            
            $twoweeks = date('Y-m-d', strtotime($t->plks_expiry_date.'-2 weeks'));
            $status['reminder']['twoweeks'] = $twoweeks;
            
            if($twoweeks == $today){
                $status['reminder']['week_02'] += 1;
                $status['worker']['week_02'][]  = array(
                    'code' => $t->worker->code,
                    'name' => $t->worker->full_name,
                    'passport' => $t->passport->number,
                    'nationality' => $t->worker->nationality->country,
                    'arrival' => date('d M Y', strtotime($t->plks_expiry_date))    
                );
            }
            
            $oneweek = date('Y-m-d', strtotime($t->plks_expiry_date.'-1 week'));
            $status['reminder']['oneweek'] = $oneweek;
            
            if($oneweek == $today){
                $status['reminder']['week_01'] += 1;
                $status['worker']['week_01'][]  = array(
                    'code' => $t->worker->code,
                    'name' => $t->worker->full_name,
                    'passport' => $t->passport->number,
                    'nationality' => $t->worker->nationality->country,
                    'arrival' => date('d M Y', strtotime($t->plks_expiry_date))    
                );
            }
            
            $threedays = date('Y-m-d', strtotime($t->plks_expiry_date.'-3 days'));
            $status['reminder']['threedays'] = $threedays;
            
            if($threedays == $today){
                $status['reminder']['day_03'] += 1;
                $status['worker']['day_03'][]  = array(
                    'code' => $t->worker->code,
                    'name' => $t->worker->full_name,
                    'passport' => $t->passport->number,
                    'nationality' => $t->worker->nationality->country,
                    'arrival' => date('d M Y', strtotime($t->plks_expiry_date))    
                );
            }
            
            $twodays = date('Y-m-d', strtotime($t->plks_expiry_date.'-2 days'));
            $status['reminder']['twodays'] = $twodays;
            
            if($twodays == $today){
                $status['reminder']['day_02'] += 1;
                $status['worker']['day_02'][]  = array(
                    'code' => $t->worker->code,
                    'name' => $t->worker->full_name,
                    'passport' => $t->passport->number,
                    'nationality' => $t->worker->nationality->country,
                    'arrival' => date('d M Y', strtotime($t->plks_expiry_date))    
                );
            }
            
            $oneday = date('Y-m-d', strtotime($t->plks_expiry_date.'-1 day'));
            $status['reminder']['oneday'] = $oneday;
            
            if($oneday == $today){
                $status['reminder']['day_01'] += 1;
                $status['worker']['day_01'][]  = array(
                    'code' => $t->worker->code,
                    'name' => $t->worker->full_name,
                    'passport' => $t->passport->number,
                    'nationality' => $t->worker->nationality->country,
                    'arrival' => date('d M Y', strtotime($t->plks_expiry_date))    
                );
            }
        }
        
        return $status;
    }
}
