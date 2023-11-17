<?php

class MasterController extends Controller
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
                    'Index','Mainboard','Profile',
                    'Dashboard','Application','View','PrintSlip',
                    'Medical','Flight','FlightList','PrintFlight'
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
        $this->actionMainboard();
    }

    public function actionMainboard()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $sourceagent = Profile::model()->findAllByAttributes(array(
            'type' => 'SOURCE AGENT'
        ), array('order' => 'id ASC'));
        
        $link = 'index.php?r=Master/Dashboard';
        
        $this->render('mainboard', array(
            'user' => $user,
            'sourceagent' => $sourceagent,
            'link' => $link
        ));
    }
    
    public function actionProfile()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $state = State::model()->findAll(array(
            'order' => 'sort ASC'
        ));
        
        $transaction = Transaction::model()->findAll();
        
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
        
        $useradmin = User::model()->findAllByAttributes(array(
            'role_id' => '2',
            'access_id' => '2'
        ), array('order' => 'id DESC'));
        
        $this->render('../profile/profile', array(
            'user' => $user,
            'state' => $state,
            'statistic' => $statistic,
            'useradmin' => $useradmin
        ));
    }
    
    public function actionDashboard($said)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $sagent = Profile::model()->findByPk($said);
        
        $stat = array(
            'today' => Transaction::model()->statisticBySourceAgent($sagent->id,'today'),
            'all' => Transaction::model()->statisticBySourceAgent($sagent->id),
        );
        
        $this->render('../sourceagent/dashboard', array(
            'user' => $user,
            'sagent' => $sagent,
            'stat' => $stat
        ));
    }
    
    public function actionApplication($said)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $sagent = Profile::model()->findByPk($said);
        
        $transaction = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $sagent->id
        ), array('order' => 'id DESC'));
        
        $this->render('../sourceagent/application', array(
            'user' => $user,
            'sagent' => $sagent,
            'transaction' => $transaction
        ));
    }
    
    public function actionView($id)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $transaction = Transaction::model()->findByPk($id);
        $gender = Gender::model()->findAll(array('order' => 'sort ASC'));
        $educationtype = Educationtype::model()->findAll(array('order' => 'sort ASC'));
        
        $link = 'index.php?r=Master/Application&said='.$transaction->sourceagency_id;
        
        $this->render('../worker/view', array(
            'user' => $user,
            'transaction' => $transaction,
            'gender' => $gender,
            'educationtype' => $educationtype,
            'link' => $link
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
    
    public function actionMedical($said)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $sagent = Profile::model()->findByPk($said);
        
        $transaction = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $sagent->id
        ), array('order' => 'id ASC'));
        
        $this->render('medical', array(
            'user' => $user,
            'sagent' => $sagent,
            'transaction' => $transaction
        ));
    }
    
    public function actionFlight($said)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $sagent = Profile::model()->findByPk($said);
        
        $transaction = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $sagent->id,
            'medical' => 'YES',
            'visa' => 'YES',
            'approval' => 'YES'
        ), array('order' => 'id ASC'));
        
        $this->render('flight', array(
            'user' => $user,
            'sagent' => $sagent,
            'transaction' => $transaction
        ));
    }
    
    public function actionFlightList($said)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $sagent = Profile::model()->findByPk($said);
        
        $transaction = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $sagent->id,
            'medical' => 'YES',
            'visa' => 'YES',
            'approval' => 'YES'
        ), array(
            'condition' => 'departure IS NULL AND flight_number IS NOT NULL AND eta_malaysia IS NOT NULL AND flight_date IS NOT NULL',
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
            'sagent' => $sagent,
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