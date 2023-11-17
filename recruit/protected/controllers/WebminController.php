<?php

class WebminController extends Controller
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
                    'Worker','View',
                    'Company',
                    'SourceAgent','ViewSourceAgent','ListWorker',
                    'LocalAgent','Administrator','ViewAdministrator',
                    'User',
                    'Sequence'
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
            'today' => Transaction::model()->statisticByLocalAgent('today'),
            'all' => Transaction::model()->statisticByLocalAgent(),
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
        
        $this->render('../profile/profile', array(
            'user' => $user,
            'state' => $state
        ));
    }
    
    public function actionWorker()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $transaction = Transaction::model()->findAll(array('order' => 'id DESC'));
        
        $this->render('worker', array(
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
        
        $link = 'index.php?r=Webmin/Worker';
        $link2 = 'index.php?r=Webmin/ListWorker';
        
        $this->render('../worker/view', array(
            'user' => $user,
            'transaction' => $transaction,
            'gender' => $gender,
            'educationtype' => $educationtype,
            'link' => $link,
            'link2' => $link2
        ));
    }
    
    public function actionCompany()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $company = Company::model()->findAll(array('order' => 'id DESC'));
        
        $this->render('company', array(
            'user' => $user,
            'company' => $company
        ));
    }
    
    public function actionSourceAgent()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $agent = Profile::model()->findAllByAttributes(array(
            'type' => 'SOURCE AGENT'
        ), array('order' => 'id ASC'));
        
        $link = 'index.php?r=Webmin/ViewSourceAgent';
        $link2 = 'index.php?r=Webmin/ListWorker';
        
        $this->render('../agent/agent', array(
            'user' => $user,
            'agent' => $agent,
            'link' => $link,
            'link2' => $link2
        ));
    }
    
    public function actionViewSourceAgent($id)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $agent = Profile::model()->findByPk($id);
        
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
        
        $link = 'index.php?r=Webmin/SourceAgent';
        
        $this->render('../agent/view', array(
            'user' => $user,
            'agent' => $agent,
            'statistic' => $statistic,
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
        
        $link = 'index.php?r=Webmin/SourceAgent';
        $link2 = 'index.php?r=Webmin/View';
        
        $this->render('../agent/listworker', array(
            'user' => $user,
            'agent' => $agent,
            'transaction' => $transaction,
            'link' => $link,
            'link2' => $link2
        ));
    }
    
    public function actionLocalAgent()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $agent = Profile::model()->findByPk(2);
        
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
        
        $link = 'index.php?r=Webmin/LocalAgent';
        
        $this->render('../agent/view', array(
            'user' => $user,
            'agent' => $agent,
            'statistic' => $statistic,
            'link' => $link
        ));
    }
    
    public function actionAdministrator()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $admin = Profile::model()->findAllByAttributes(array(
            'type' => 'WEBMIN'
        ), array('order' => 'id ASC'));
        
        $this->render('administrator', array(
            'user' => $user,
            'admin' => $admin
        ));
    }
    
    public function actionViewAdministrator($id)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $admin = Profile::model()->findByPk($id);
        
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
        
        $this->render('viewadministrator', array(
            'user' => $user,
            'admin' => $admin,
            'statistic' => $statistic
        ));
    }
    
    public function actionUser()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $system = User::model()->findAll(array('order' => 'id ASC'));
        
        $this->render('user', array(
            'user' => $user,
            'system' => $system
        ));
    }
    
    public function actionSequence()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $sequence = Sequence::model()->findAll(array(
            'order' => 'id ASC'
        ));
        
        $this->render('sequence', array(
            'user' => $user,
            'sequence' => $sequence
        ));
    }
}