<?php

class AdminController extends Controller
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
                    'ReminderMedical','ReminderPlks',
                    'Worker','View',
                    'Agent','RegisterAgent','ViewAgent','EditAgent','ResetAgent','ListWorker',
                    'LinkWorker','PrintWorker','PrintWorker2',
                    'Employer','RegisterEmployer','ViewEmployer','EditEmployer',
                    'Photo','Passport'
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
        $agency = Profile::model()->agency_stat();
        
        $stat = array(
            'today' => Transaction::model()->statisticByLocalAgent('today'),
            'all' => Transaction::model()->statisticByLocalAgent(),
        );
        
        $reminder = array(
            'medical' => Transaction::model()->medicalReminder('ADMIN'),
            'plks' => Transaction::model()->plksReminder('ADMIN'),
        );
        
        $this->render('dashboard', array(
            'user' => $user,
            'agency' => $agency,
            'stat' => $stat,
            'reminder' => $reminder
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
    
    public function actionReminderMedical()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $status = Transaction::model()->medicalReminder('ADMIN');
        
        $this->render('../reminder/medical', array(
            'user' => $user,
            'reminder' => $status['reminder'],
            'worker' => $status['worker']
        ));
    }
    
    public function actionReminderPlks()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $status = Transaction::model()->plksReminder('ADMIN');
        
        $this->render('../reminder/plks', array(
            'user' => $user,
            'reminder' => $status['reminder'],
            'worker' => $status['worker']
        ));
    }
    
    public function actionWorker()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        //$transaction = Transaction::model()->findAll(array('order' => 'id DESC'));
        $agency = $agency = Profile::model()->agency_stat();
        
        $this->render('worker', array(
            'user' => $user,
            'agency' => $agency
        ));
    }
    
    public function actionView($id)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $transaction = Transaction::model()->findByPk($id);
        $gender = Gender::model()->findAll(array('order' => 'sort ASC'));
        $educationtype = Educationtype::model()->findAll(array('order' => 'sort ASC'));
        $employer = Profile::model()->findAllByAttributes(array(
            'type' => 'EMPLOYER'
        ), array(
            'order' => 'id ASC'
        ));
        
        $link = 'index.php?r=Admin/LinkWorker&id='.$transaction->sourceagency_id;
        $link2 = 'index.php?r=Admin/LinkWorker'.$transaction->sourceagency_id;
        
        $this->render('../worker/view', array(
            'user' => $user,
            'employer' => $employer,
            'transaction' => $transaction,
            'gender' => $gender,
            'educationtype' => $educationtype,
            'link' => $link,
            'link2' => $link2
        ));
    }
    
    public function actionPhoto($id)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $document = 'photo';
        
        $transaction = Transaction::model()->findByPk($id);
        $link = 'index.php?r=Admin/LinkWorker&id='.$transaction->sourceagency_id;
        $link2 = 'index.php?r=Admin/LinkWorker'.$transaction->sourceagency_id;
        
        $this->render('../worker/photo', array(
            'user' => $user,
            'document' => $document,
            'transaction' => $transaction,
            'link' => $link,
            'link2' => $link2
        ));
    }
    
    public function actionPassport($id)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $document = 'passport';
        
        $transaction = Transaction::model()->findByPk($id);
        $link = 'index.php?r=Admin/LinkWorker&id='.$transaction->sourceagency_id;
        $link2 = 'index.php?r=Admin/LinkWorker'.$transaction->sourceagency_id;
        
        $this->render('../worker/passport', array(
            'user' => $user,
            'document' => $document,
            'transaction' => $transaction,
            'link' => $link,
            'link2' => $link2
        ));
    }
    
    public function actionAgent()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $agent = Profile::model()->findAllByAttributes(array(
            'type' => 'SOURCE AGENT'
        ), array('order' => 'id ASC'));
        
        $link = 'index.php?r=Admin/ViewAgent';
        $link2 = 'index.php?r=Admin/ListWorker';
        
        $this->render('../agent/agent', array(
            'user' => $user,
            'agent' => $agent,
            'link' => $link,
            'link2' => $link2
        ));
    }
    
    public function actionRegisterAgent()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $country = Nationality::model()->findAll(array(
            'order' => 'sort ASC'
        ));
        $link = 'index.php?r=Admin/Worker';
        
        $this->render('../agent/register', array(
            'user' => $user,
            'country' => $country,
            'link' => $link
        ));
    }
    
    public function actionViewAgent($id)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $agent = Profile::model()->findByPk($id);
        $login = User::model()->findByAttributes(array(
            'profile_id' => $agent->id
        ));
        
        $transaction = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $agent->id
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
        
        $link = 'index.php?r=Admin/Worker';
        
        $this->render('../agent/view', array(
            'user' => $user,
            'agent' => $agent,
            'login' => $login,
            'statistic' => $statistic,
            'link' => $link
        ));
    }    

    public function actionEditAgent($id)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $agent = Profile::model()->findByPk($id);
        $country = Nationality::model()->findAll(array(
            'order' => 'sort ASC'
        ));
        $login = User::model()->findByAttributes(array(
            'profile_id' => $agent->id
        ));
        
        $link = 'index.php?r=Admin/Worker';
        
        $this->render('../agent/edit', array(
            'user' => $user,
            'agent' => $agent,
            'login' => $login,
            'country' => $country,
            'link' => $link
        ));
    }
	
	public function actionResetAgent($id)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $agent = Profile::model()->findByPk($id);
        $login = User::model()->findByAttributes(array(
            'profile_id' => $agent->id
        ));
        
        $link = 'index.php?r=Admin/Worker';
        
        $this->render('../agent/reset', array(
            'user' => $user,
            'agent' => $agent,
            'login' => $login,
            'link' => $link
        ));
    }
    
    public function actionListWorker($id)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $agent = User::model()->findByPk($id);
        
        $transaction = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $id
        ), array('order' => 'id DESC'));
        
        $link = 'index.php?r=Admin/Agent';
        $link2 = 'index.php?r=Admin/View';
        
        $this->render('../agent/listworker', array(
            'user' => $user,
            'agent' => $agent,
            'transaction' => $transaction,
            'link' => $link,
            'link2' => $link2    
        ));
    }
    
    public function actionLinkWorker($id)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $agent = User::model()->findByPk($id);
        
        $total = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $id,
        ), array('order' => 'id ASC'));
        
        $medical = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $id,
            'medical' => 'YES'
        ), array('order' => 'id ASC'));
        
        $training = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $id,
            'medical' => 'YES',
            'training' => 'YES'
        ), array('order' => 'id ASC'));
        
        $pendingvdr = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $id,
            'medical' => 'YES',
            'training' => 'YES'
        ), array(
            'condition' => 'visa IS NULL',
            'order' => 'id ASC'
        ));
        
        $vdrapproved = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $id,
            'medical' => 'YES',
            'training' => 'YES'
        ), array(
            'condition' => 'visa IS NOT NULL',
            'order' => 'id ASC'
        ));
        
        $approval = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $id,
            'medical' => 'YES',
            'training' => 'YES',
            'visa' => 'YES',
            'approval' => 'YES'
        ), array(
            /*'condition' => 'departure IS NULL',*/
            'order' => 'id ASC'
        ));
        
        $departure = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $id,
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
            'sourceagency_id' => $id,
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
        
        $this->render('linkworker', array(
            'user' => $user,
            'agent' => $agent,
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
    
    public function actionPrintWorker()
    {
        $print = Yii::app()->request->getPost('print');
        
        /* Margin Left | Right | Top | Bottom */
        $pdf = Yii::app()->ePdf->mpdf('utf-8','A4-L','','','4','4','4','4');
        $pdf->SetFont('helvetica', '', 11);
        $pdf->showImageErrors = true;
        $pdf->shrink_tables_to_fit = 1;
        $pdf->SetHTMLFooter($this->renderPartial('../print/footer','',TRUE));
        
        $pdf->WriteHTML($this->renderPartial('../print/worker',array(
            'print' => $print
        ), true));
        
        //$printtoday = date('YmdHis');
        //$filename = 'foreignworker-slip-'.$printtoday.'.pdf';
        //$pdfString = $pdf->Output($filename,'I');
        $pdfString = $pdf->Output('','S');
        echo base64_encode($pdfString);
    }
    
    public function actionEmployer()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $employer = Profile::model()->findAllByAttributes(array(
            'type' => 'EMPLOYER'
        ), array('order' => 'id DESC'));
        
        $this->render('../employer/employer', array(
            'user' => $user,
            'employer' => $employer
        ));
    }
    
    public function actionRegisterEmployer()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $state = State::model()->findAll(array(
            'order' => 'sort ASC'
        ));
        $link = 'index.php?r=Admin/Employer';
        
        $this->render('../employer/register', array(
            'user' => $user,
            'state' => $state,
            'link' => $link
        ));
    }
    
    public function actionViewEmployer($id)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $employer = Profile::model()->findByPk($id);
        $login = User::model()->findByAttributes(array(
            'profile_id' => $employer->id
        ));
        $link = 'index.php?r=Admin/Employer';
        
        $transaction = Transaction::model()->findAllByAttributes(array(
            'employer_id' => $employer->id
        ));
        
        $worker = array();
        foreach($transaction as $t){
            $worker['total'][] = 1;

            if($t->worker->gender->name == 'MALE'){
                $worker['male'][] = 1;
            } else if($t->worker->gender->name == 'FEMALE'){
                $worker['female'][] = 1;
            }
        }
        
        $statfw = Helpers::statForeignWorker($id);
        
        $this->render('../employer/view', array(
            'user' => $user,
            'employer' => $employer,
            'login' => $login,
            'transaction' => $transaction,
            'worker' => $worker,
            'statfw' => $statfw,
            'link' => $link
        ));
    }    
    
    public function actionEditEmployer($id)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $employer = Profile::model()->findByPk($id);
        $login = User::model()->findByAttributes(array(
            'profile_id' => $employer->id
        ));
        $quota = Quota::model()->findByAttributes(array(
            'employer_id' => $id
        ));
        if($quota == NULL){
            $quotanumber = 0;
        } else {
            $quotanumber = $quota->required;
        }
        $link = 'index.php?r=Admin/Employer';
        
        $state = State::model()->findAll(array(
            'order' => 'sort ASC'
        ));
        
        $statfw = Helpers::statForeignWorker($id);
        
        $this->render('../employer/edit', array(
            'user' => $user,
            'state' => $state,
            'login' => $login,
            'employer' => $employer,
            'quotanumber' => $quotanumber,
            'statfw' => $statfw,
            'link' => $link
        ));
    }
}