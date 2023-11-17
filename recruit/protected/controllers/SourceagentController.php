<?php

class SourceagentController extends Controller
{
    public $layout='main/main';
    
    /* @return array action filters */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }
    
    /*  Specifies the access control rules.
        This method is used by the 'accessControl' filter.
        @return array access control rules */
    public function accessRules()
    {
        return array(
            array('allow',
                'actions'=>array(
                    'Index','Dashboard','Profile',
                    'Application','Register','View','Edit','PrintSlip',
                    'Medical','MedicalSlip','Training','TrainingSlip',
                    'Worker','Calendar','Flight','FlightList','PrintFlight'
                ),
                'users'=>array('*'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }
    
    public function actionIndex()
    {
        $this->actionDashboard();
    }

    public function actionDashboard()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $stat = array(
            'today' => Transaction::model()->statisticBySourceAgent($user->id,'today'),
            'all' => Transaction::model()->statisticBySourceAgent($user->id),
        );
        
		$demand = array();
        $quota = array();
        
        $transaction = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $user->id
        ), array(
            'order' => 'id DESC',
            'condition' => 'quota_id IS NOT NULL'
        ));
        
        foreach($transaction as $t){
            $demand[$t->quota_id][] = array(
                'id' => $t->quota->code,
                'guid' => $t->quota->guid,
                'employer' => $t->employer->profile->company->name,
                'allocated' => 1,
                'medical' => $t->medical == 'YES' ? 1 : 0,
                'booking' => empty($t->flight_number) ? 0 : 1,
                'arrival' => $t->arrival == 'YES' ? 1 : 0
            );
            
            $quota[$t->quota_id] = array(
                'id' => $t->quota->code,
                'guid' => $t->quota->guid,
                'employer' => $t->employer->profile->company->name
            );
        }
        
        foreach($demand as $k=>$v){
            $allocation = array_column($v, 'allocated');
            $medical = array_column($v, 'medical');
            $booking = array_column($v, 'booking');
            $arrival = array_column($v, 'arrival');
            
            $quota[$k]['allocated'] = array_sum($allocation);
            $quota[$k]['medical'] = array_sum($medical);
            $quota[$k]['booking'] = array_sum($booking);
            $quota[$k]['arrival'] = array_sum($arrival);
        }
		
        $this->render('dashboard', array(
            'user' => $user,
            'stat' => $stat,
			'quota' => $quota
        ));
    }
    
    public function actionProfile()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $transaction = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $user->id
        ));
        
        $statistic = array(
            'all_count' => 0,
            'today_count' => 0,
            'medical_completed' => 0,
            'medical_pending' => 0,
            'visa_completed' => 0,
            'visa_pending' => 0
        );
        
        foreach($transaction as $t){
            $statistic['all_count'] += 1;
            if(strstr($t->created_at,date('Y-m-d')) == TRUE){
                $statistic['today_count'] += 1;
            }
            if($t->medical == 'YES'){
                $statistic['medical_completed'] += 1;
            } else {
                $statistic['medical_pending'] += 1;
            }
            if($t->visa == 'YES'){
                $statistic['visa_completed'] += 1;
            } else {
                $statistic['visa_pending'] += 1;
            }
        }
        
        $this->render('../profile/profile2', array(
            'user' => $user,
            'statistic' => $statistic
        ));
    }
    
    public function actionApplication()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $transaction = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $user->id
        ), array('order' => 'id DESC'));
        
        $this->render('application', array(
            'user' => $user,
            'transaction' => $transaction
        ));
    }   
    
    public function actionRegister()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $gender = Gender::model()->findAll(array('order' => 'sort ASC'));
        $nationality = Nationality::model()->findAll(array('order' => 'sort ASC'));
        $jobsector = Jobsector::model()->findAll(array('order' => 'sort ASC'));
        $educationtype = Educationtype::model()->findAll(array('order' => 'sort ASC'));
        $marital = Marital::model()->findAll(array('order' => 'sort ASC'));
        $nextofkin = Relation::model()->findAll(array('order' => 'sort ASC'));
        
        $this->render('register', array(
            'user' => $user,
            'gender' => $gender,
            'nationality' => $nationality,
            'jobsector' => $jobsector,
            'educationtype' => $educationtype,
            'marital' => $marital,
            'nextofkin' => $nextofkin
        ));
    }
    
    public function actionView($id)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $transaction = Transaction::model()->findByPk($id);
        $gender = Gender::model()->findAll(array('order' => 'sort ASC'));
        $educationtype = Educationtype::model()->findAll(array('order' => 'sort ASC'));
        
        $link = 'index.php?r=Sourceagent/Application';
        
        $this->render('../worker/view', array(
            'user' => $user,
            'transaction' => $transaction,
            'gender' => $gender,
            'educationtype' => $educationtype,
            'link' => $link
        ));
    }
    
    public function actionEdit($id)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $transaction = Transaction::model()->findByPk($id);
        
        $gender = Gender::model()->findAll(array('order' => 'sort ASC'));
        $nationality = Nationality::model()->findAll(array('order' => 'sort ASC'));
        $jobsector = Jobsector::model()->findAll(array('order' => 'sort ASC'));
        $educationtype = Educationtype::model()->findAll(array('order' => 'sort ASC'));
        $marital = Marital::model()->findAll(array('order' => 'sort ASC'));
        $nextofkin = Relation::model()->findAll(array('order' => 'sort ASC'));
        
        $sign = Helpers::applicantInformation($transaction->id);
        
        $this->render('../worker/edit', array(
            'user' => $user,
            'transaction' => $transaction,
            'gender' => $gender,
            'nationality' => $nationality,
            'jobsector' => $jobsector,
            'educationtype' => $educationtype,
            'marital' => $marital,
            'nextofkin' => $nextofkin,
            'sign' => $sign
        ));    
    }
    
    public function actionPrintSlip($id)
    {
        $transaction = Transaction::model()->findByPk($id);
        
        $pdf = Yii::app()->ePdf->mpdf('utf-8','A4','','','2','4','2','2');
        $pdf->SetFont('helvetica', '', 11);
        $pdf->showImageErrors = true;
        $pdf->shrink_tables_to_fit = 1;
        
        $pdf->WriteHTML($this->renderPartial('../print/slip',array(
            'transaction' => $transaction
        ), true));
        
        $filename = 'registration-slip-'.$transaction->code.'.pdf';
        $pdf->Output($filename,'I');
    }
    
    public function actionMedical()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));

        $medical = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $user->id
        ), array(
            'condition' => 'medical_id IS NOT NULL AND medical IS NULL AND employer_id IS NOT NULL AND quota_id IS NOT NULL',
            'order' => 'id ASC'
        ));
        
        $pending = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $user->id
        ), array(
            'condition' => 'medical_id IS NULL AND medical IS NULL AND employer_id IS NOT NULL AND quota_id IS NOT NULL',
            'order' => 'id ASC'
        ));
        
        $clinic = MedicalProfile::model()->findAllByAttributes(array(
            'type' => 'DOCTOR'
        ), array(
            'order' => 'id ASC'
        ));

        $this->render('medical', array(
            'user' => $user,
            'medical' => $medical,
            'pending' => $pending,
            'clinic' => $clinic
        ));
    }
    
    public function actionMedicalSlip($id)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $trans = Transaction::model()->findByPk($id);
        $clinic = MedicalProfile::model()->findByPk($trans->medical_id);
                
        $pdf = Yii::app()->ePdf->mpdf('utf-8','A4','','','10','10','10.5','26');
        $pdf->SetFont('helvetica', '', 11);
        $pdf->showImageErrors = true;
        $pdf->shrink_tables_to_fit = 1;
        $pdf->WriteHTML($this->renderPartial('medicalslip', array(
            't' => $trans,
            'c' => $clinic,
            'user' => $user
        ), true));
        
        $filename = 'medicalslip-'.$id.'.pdf';
        $pdf->Output($filename,'I');
    }
    
    public function actionTraining2()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $transaction = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $user->id,
            'medical' => 'YES'
        ), array(
            'condition' => 'employer_id IS NOT NULL AND quota_id IS NOT NULL',
            'order' => 'id ASC'
        ));
        
        $this->render('training', array(
            'user' => $user,
            'transaction' => $transaction
        ));
    }
    
    public function actionTraining()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $training = Profile::model()->findAllByAttributes(array(
            'type' => 'TRAINING CENTER'
        ), array(
            'order' => 'id ASC'
        ));
        
        $this->render('training2', array(
            'user' => $user,
            'training' => $training
        ));
    }
    
    public function actionCalendar()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $this->render('calendar', array(
            'user' => $user
        ));
    }
    
    public function actionTrainingSlip($id)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $trans = Transaction::model()->findByPk($id);
        
        $pdf = Yii::app()->ePdf->mpdf('utf-8','A4','','','10','10','10.5','26');
        $pdf->SetFont('helvetica', '', 11);
        $pdf->showImageErrors = true;
        $pdf->shrink_tables_to_fit = 1;
        $pdf->WriteHTML($this->renderPartial('trainingslip', array(
            't' => $trans,
            'user' => $user
        ), true));
        
        $filename = 'trainingslip-'.$id.'.pdf';
        $pdf->Output($filename,'I');
    }
    
    public function actionWorker()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $total = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $user->id,
        ), array('order' => 'id ASC'));
        
        $medical = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $user->id,
            'medical' => 'YES'
        ), array('order' => 'id ASC'));
        
        $training = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $user->id,
            'medical' => 'YES',
            'training' => 'YES'
        ), array('order' => 'id ASC'));
        
        $pendingvdr = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $user->id,
            'medical' => 'YES',
            'training' => 'YES'
        ), array(
            'condition' => 'visa IS NULL',
            'order' => 'id ASC'
        ));
        
        $vdrapproved = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $user->id,
            'medical' => 'YES',
            'training' => 'YES'
        ), array(
            'condition' => 'visa IS NOT NULL',
            'order' => 'id ASC'
        ));
        
        $approval = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $user->id,
            'medical' => 'YES',
            'training' => 'YES',
            'visa' => 'YES',
            'approval' => 'YES'
        ), array(
            /*'condition' => 'departure IS NULL',*/
            'order' => 'id ASC'
        ));
        
        $departure = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $user->id,
            'medical' => 'YES',
            'training' => 'YES',
            'visa' => 'YES',
            'approval' => 'YES',
            'departure' => 'YES'
        ), array(
            /*'condition' => 'arrival IS NULL',*/
            'order' => 'id ASC'
        ));
        
        $arrival = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $user->id,
            'medical' => 'YES',
            'training' => 'YES',
            'visa' => 'YES',
            'approval' => 'YES',
            'departure' => 'YES',
            'arrival' => 'YES'
        ), array(
            'order' => 'id ASC'
        ));
        
        $percenter = array(
            'total' => count($total) > 0 ? (count($total)/count($total)) * 100 : 0,
            'medical' =>  count($total) > 0 ? (count($medical)/count($total)) * 100 : 0,
            'training' =>  count($total) > 0 ? (count($training)/count($total)) * 100 : 0,
            'pendingvdr' => count($medical) > 0 ? (count($pendingvdr)/count($medical)) * 100 : 0,
            'vdrapproved' => count($medical) > 0 ? (count($vdrapproved)/count($medical)) * 100 : 0,
            'approval' => count($vdrapproved) > 0 ? (count($approval)/count($vdrapproved)) * 100 : 0,
            'departure' => count($approval) > 0 ? (count($departure)/count($approval)) * 100 : 0,
            'arrival' => count($departure) > 0 ? (count($arrival)/count($departure)) * 100 : 0
        );
        
        $jobsector = Jobsector::model()->findAll(array('order' => 'sort ASC'));
        
        $employer = Profile::model()->findAllByAttributes(array(
            'type' => 'EMPLOYER'
        ), array(
            'order' => 'id ASC'
        ));
        
        $quotafw = Helpers::statForeignWorkerQuota();
        
        $link = 'index.php?r=Admin/Worker';
        
        $this->render('worker', array(
            'user' => $user,
            'total' => $total,
            'medical' => $medical,
            'training' => $training,
            'pendingvdr' => $pendingvdr,
            'vdrapproved' => $vdrapproved,
            'approval' => $approval,
            'departure' => $departure,
            'arrival' => $arrival,
            'percenter' => $percenter,
            'jobsector' => $jobsector,
            'employer' => $employer,
            'quotafw' => $quotafw,
            'link' => $link
        ));
    }        

    public function actionFlight()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $transaction = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $user->id,
            'medical' => 'YES',
            'visa' => 'YES',
            'approval' => 'YES'
        ), array(
            'condition' => 'departure IS NULL',
            'order' => 'id ASC'
        ));
        
        $this->render('flight', array(
            'user' => $user,
            'transaction' => $transaction
        ));
    }
    
    public function actionFlightList()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $transaction = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $user->id,
            'medical' => 'YES',
            'visa' => 'YES',
            'approval' => 'YES'
        ), array(
            /*'condition' => 'departure IS NULL AND flight_number IS NOT NULL AND eta_malaysia IS NOT NULL AND flight_date IS NOT NULL',*/
            'condition' => 'flight_number IS NOT NULL AND eta_malaysia IS NOT NULL AND flight_date IS NOT NULL',
            'order' => 'id ASC'
        ));
        
        $flight = array();
        
        if(count($transaction) > 0){
            foreach($transaction as $t){
                $flight[$t->flight_number] = array(
                    'eta' => $t->eta_malaysia,
                    'date' => $t->flight_date
                );
            }
        }
        
        $this->render('flightlist', array(
            'user' => $user,
            'flight' => $flight
        ));
    }     
    
    public function actionPrintFlight($id)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $transaction = Transaction::model()->findAllByAttributes(array(
            'flight_number' => $id
        ), array(
            'order' => 'id ASC'
        ));
        
        $info = array();
        $worker = array();
        
        foreach($transaction as $t){
            $info = array(
                'flight' => $t->flight_number,
                'eta' => $t->eta_malaysia,
                'date' => $t->flight_date
            );
            
            if($t->worker->gender->name == 'MALE'){
                $worker['male'][] = 1;
            } else if($t->worker->gender->name == 'FEMALE'){
                $worker['female'][] = 1;
            }
            $worker['total'][] = 1;
        }
        
        
        $pdf = Yii::app()->ePdf->mpdf('utf-8','A4','','','8','8','20','20');
        $pdf->SetFont('helvetica', '', 11);
        $pdf->showImageErrors = true;
        $pdf->shrink_tables_to_fit = 1;
        $pdf->SetHTMLFooter($this->renderPartial('../print/footer','',TRUE));
        
        $pdf->WriteHTML($this->renderPartial('../print/flight',array(
            'info' => $info,
            'user' => $user,
            'worker' => $worker,
            'transaction' => $transaction
        ), true));
        
        $printtoday = date('YmdHis');
        $filename = 'flight-slip-'.$printtoday.'.pdf';
        $pdf->Output($filename,'I');
    }
}