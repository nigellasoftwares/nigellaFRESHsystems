<?php

class EmployerController extends Controller
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
                    'Worker','View','Attendance',
                    'WorkerAll','ViewAgent','LinkWorkerAll','ViewWorkerAll',
                    'WorkerMy','LinkWorkerMy','ViewWorkerMy'
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
            'today' => Transaction::model()->statisticByEmployer($user->profile->id,'today'),
            'all' => Transaction::model()->statisticByEmployer($user->profile->id),
        );    
        
        $this->render('dashboard', array(
            'user' => $user,
            'stat' => $stat
        ));
    }
    
    public function actionProfile()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $state = State::model()->findAll(array(
            'order' => 'sort ASC'
        ));
        
        $transaction = Transaction::model()->findAllByAttributes(array(
            'employer_id' => $user->profile->id
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
        
        $this->render('../profile/profile', array(
            'user' => $user,
            'state' => $state,
            'statistic' => $statistic
        ));
    }
    
    public function actionReminderMedical()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $transaction = Transaction::model()->findAllByAttributes(array(
            'employer_id' => $user->profile->id
        ), array('order' => 'id ASC'));
        
        $this->render('../reminder/medical', array(
            'transaction' => $transaction
        ));
    }
    
    public function actionReminderPlks()
    {
        $this->render('../reminder/plks');
    }
    
    public function actionAttendance()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $this->render('attendance', array(
            'user' => $user
        ));
    }
    
    public function actionWorker()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $transaction = Transaction::model()->findAllByAttributes(array(
            'employer_id' => $user->profile->id
        ), array('order' => 'id DESC'));
        
        $this->render2('worker', array(
            'user' => $user,
            'transaction' => $transaction
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
        
        $link = 'index.php?r=Employer/Worker';
        $link2 = 'index.php?r=Employer/ListWorker';
        
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
    
    public function actionWorkerAll()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        //$transaction = Transaction::model()->findAll(array('order' => 'id DESC'));
        $agency = $agency = Profile::model()->agency_stat();
        
        $this->render('workerall', array(
            'user' => $user,
            'agency' => $agency
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
        
        $link = 'index.php?r=Employer/WorkerAll';
        
        $this->render('../agent/view', array(
            'user' => $user,
            'agent' => $agent,
            'login' => $login,
            'statistic' => $statistic,
            'link' => $link
        ));
    }
    
    public function actionLinkWorkerAll($id)
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
        
        $pendingvdr = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $id,
            'medical' => 'YES'
        ), array(
            'condition' => 'visa IS NULL',
            'order' => 'id ASC'
        ));
        
        $vdrapproved = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $id,
            'medical' => 'YES'
        ), array(
            'condition' => 'visa IS NOT NULL',
            'order' => 'id ASC'
        ));
        
        $approval = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $id,
            'medical' => 'YES',
            'visa' => 'YES',
            'approval' => 'YES'
        ), array(
            /*'condition' => 'departure IS NULL',*/
            'order' => 'id ASC'
        ));
        
        $departure = Transaction::model()->findAllByAttributes(array(
            'sourceagency_id' => $id,
            'medical' => 'YES',
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
        
        $link = 'index.php?r=Employer/WorkerAll';
        $link2 = 'Employer/ViewWorkerAll';
        
        $this->render('linkworker', array(
            'user' => $user,
            'agent' => $agent,
            'total' => $total,
            'medical' => $medical,
            'pendingvdr' => $pendingvdr,
            'vdrapproved' => $vdrapproved,
            'approval' => $approval,
            'departure' => $departure,
            'arrival' => $arrival,
            'percenter' => $percenter,
            'jobsector' => $jobsector,
            'employer' => $employer,
            'quotafw' => $quotafw,
            'link' => $link,
            'link2' => $link2
        ));
    }
    
    public function actionViewWorkerAll($id)
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
        
        $link = 'index.php?r=Employer/LinkWorkerAll&id='.$transaction->sourceagency_id;
        $link2 = 'index.php?r=Employer/LinkWorkerAll&id='.$transaction->sourceagency_id;
        
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
    
    public function actionLinkWorkerMy()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $total = Transaction::model()->findAllByAttributes(array(
            'employer_id' => $user->id,
        ), array('order' => 'id ASC'));
        
        $medical = Transaction::model()->findAllByAttributes(array(
            'employer_id' => $user->id,
            'medical' => 'YES'
        ), array('order' => 'id ASC'));
        
        $pendingvdr = Transaction::model()->findAllByAttributes(array(
            'employer_id' => $user->id,
            'medical' => 'YES'
        ), array(
            'condition' => 'visa IS NULL',
            'order' => 'id ASC'
        ));
        
        $vdrapproved = Transaction::model()->findAllByAttributes(array(
            'employer_id' => $user->id,
            'medical' => 'YES'
        ), array(
            'condition' => 'visa IS NOT NULL',
            'order' => 'id ASC'
        ));
        
        $approval = Transaction::model()->findAllByAttributes(array(
            'employer_id' => $user->id,
            'medical' => 'YES',
            'visa' => 'YES',
            'approval' => 'YES'
        ), array(
            /*'condition' => 'departure IS NULL',*/
            'order' => 'id ASC'
        ));
        
        $departure = Transaction::model()->findAllByAttributes(array(
            'employer_id' => $user->id,
            'medical' => 'YES',
            'visa' => 'YES',
            'approval' => 'YES',
            'departure' => 'YES'
        ), array(
            /*'condition' => 'arrival IS NULL',*/
            'order' => 'id ASC'
        ));
        
        $arrival = Transaction::model()->findAllByAttributes(array(
            'employer_id' => $user->id,
            'medical' => 'YES',
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
        
        $link2 = 'Employer/ViewWorkerMy';
        
        $this->render('linkworker', array(
            'user' => $user,
            'total' => $total,
            'medical' => $medical,
            'pendingvdr' => $pendingvdr,
            'vdrapproved' => $vdrapproved,
            'approval' => $approval,
            'departure' => $departure,
            'arrival' => $arrival,
            'percenter' => $percenter,
            'jobsector' => $jobsector,
            'employer' => $employer,
            'quotafw' => $quotafw,
            'link2' => $link2
        ));
    }
    
    public function actionViewWorkerMy($id)
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
        
        $link = 'index.php?r=Employer/LinkWorkerMy&id='.$transaction->sourceagency_id;
        $link2 = 'index.php?r=Employer/LinkWorkerMy&id='.$transaction->sourceagency_id;
        
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
}