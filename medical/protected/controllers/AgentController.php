<?php

class AgentController extends Controller
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
                    'Index','Dashboard',
                    'ListApplicant','ListApplicantDependant','ListDependant','ListTransaction',
                    'AccountView','AccountRegister','AccountTopupView','AccountTopupCreate',
                    'AjaxTopupRegister','AjaxTopupView','AjaxTopupUpdate','AjaxTopupImage','AjaxRegisterView',
                    'AjaxApplicantRegister','AjaxApplicantView','AjaxApplicantEdit','AjaxApplicantUpdate',
                    'AjaxApplicantDelete','ListVisa','AjaxCheckBalance'
                ),
                'users'=>array('*'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }
    
    /* Admin */
    public function actionIndex()
    {
        $this->actionDashboard();
    }

    public function actionDashboard()
    {
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        $applicant = Applicant::model()->findAllByAttributes(array('created_by' => $user->id));
        //$dependant = Dependant::model()->findAllByAttributes(array('created_by' => $user->id));
        
        $tbalance = Balance::model()->findAllByAttributes(array(
            'agent_id' => $user->id,
            'type' => 'TRANSACTION'
        ), array('order' => 'created_at ASC'));
        
        $rbalance = Balance::model()->findAllByAttributes(array(
            'agent_id' => $user->id,
            'type' => 'REGISTRATION'
        ), array('order' => 'created_at ASC'));
        
        $bdashboard = array();
        foreach($tbalance as $b){
            if($b->status->name == 'PENDING'){
                $bdashboard['pending'] += $b->amount;
                $bdashboard['pending_number'] += 1;
                $bdashboard['available'] += 0;
                $bdashboard['approved'] += 0;
                $bdashboard['approved_number'] += 0;
            } else if($b->status->name == 'SUCCESS'){
                $bdashboard['pending'] += 0;
                $bdashboard['pending_number'] += 0;
                $bdashboard['available'] += $b->amount;
                $bdashboard['approved'] += $b->amount;
                $bdashboard['approved_number'] += 1;
            }
            $bdashboard['current'] += $b->amount;
        }
        
        foreach($rbalance as $b){
            $bdashboard['amount'] += $b->amount;
            $bdashboard['total'] += $b->amount;
            $bdashboard['worker'] += 1;
        }
        
        $bdashboard['available'] -= $bdashboard['total'];
        $bdashboard['current'] -= $bdashboard['total'];
        
        $applicant_total = array(
            'male' => 0,
            'female' => 0,
            'all' => 0
        );
        
        foreach($applicant as $a){
            if($a->gender->name == 'MALE'){
                $applicant_total['male'] += 1;
            } else if($a->gender->name == 'FEMALE'){
                $applicant_total['female'] += 1;
            }
            $applicant_total['all'] += 1;
        }
        
        $result_total = array(
            'yes' => 0,
            'no' => 0,
            'all' => 0
        );
        foreach($applicant as $d){
            $t = Transaction::model()->findByAttributes(array('guid'=>$d->guid));
            if($t->result == 'YES'){
                $result_total['yes'] += 1;
            } else if($t->result == 'NO'){
                $result_total['no'] += 1;
            }
            
            if($t->result == 'YES' || $t->result == 'NO'){
                $result_total['all'] += 1;
            }
        }
        
        $this->render('dashboard', array(
            'bdashboard' => $bdashboard,
            'applicant' => $applicant_total,
            'result' => $result_total,
        ));
    }
    
    public function actionListApplicant()
    {
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        
        $applicant = Applicant::model()->findAllByAttributes(array(
            'created_by' => $user->id
        ), array(
            'order' => 'id DESC'
        ));
        
        $nationality = Status::model()->findAllByAttributes(array(
            'type' => 'NATIONAL'
        ), array('order' => 'order_number ASC'));
        $list_nationality = CHtml::listData($nationality, 'id', 'name');
        
        $gender = Status::model()->findAllByAttributes(array(
            'type' => 'GENDER'
        ), array('order' => 'order_number ASC'));
        $list_gender = CHtml::listData($gender, 'id', 'name');
        
        $district = Status::model()->findAllByAttributes(array(
            'type' => 'DISTRICT'
        ), array('order' => 'order_number ASC'));
        $list_district = CHtml::listData($district, 'id', 'name');
        
        $job = Status::model()->findAllByAttributes(array(
            'type' => 'JOB'
        ), array('order' => 'order_number ASC'));
        $list_job = CHtml::listData($job, 'id', 'name');
        
        $relation = Status::model()->findAllByAttributes(array(
            'type' => 'RELATION'
        ), array('order' => 'order_number ASC'));
        $list_relation = CHtml::listData($relation, 'id', 'name');
        
        $status = Status::model()->findAllByAttributes(array(
            'type' => 'PASSPORT'
        ), array('order' => 'order_number ASC'));
        $list_status = CHtml::listData($status, 'id', 'name');
        
        $dependant = Status::model()->findAllByAttributes(array(
            'type' => 'DEPENDANT'
        ), array('order' => 'order_number ASC'));
        $list_dependant = CHtml::listData($dependant, 'initial', 'name');
        
        $clinic = Profile::model()->findAllByAttributes(array(
            'type' => 'DOCTOR'
        ), array('order' => 'id ASC'));
        $list_clinic = CHtml::listData($clinic, 'id', 'name');
        
        $this->render('list/ls_applicant', array(
            'applicant' => $applicant,
            'list_nationality' => $list_nationality,
            'list_gender' => $list_gender,
            'list_district' => $list_district,
            'list_job' => $list_job,
            'list_relation' => $list_relation,
            'list_status' => $list_status,
            'list_dependant' => $list_dependant,
            'list_clinic' => $list_clinic
        ));
    }
    
    public function actionListApplicantDependant($id)
    {
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        
        $applicant = Applicant::model()->findByAttributes(array(
            'id' => $id,
            'created_by' => $user->id
        ));
        
        $dependant = Dependant::model()->findAllByAttributes(array(
            'applicant_id' => $id
        ));
        
        $nationality = Status::model()->findAllByAttributes(array(
            'type' => 'NATIONAL'
        ), array('order' => 'order_number ASC'));
        $list_nationality = CHtml::listData($nationality, 'id', 'name');
        
        $gender = Status::model()->findAllByAttributes(array(
            'type' => 'GENDER'
        ), array('order' => 'order_number ASC'));
        $list_gender = CHtml::listData($gender, 'id', 'name');
        
        $district = Status::model()->findAllByAttributes(array(
            'type' => 'DISTRICT'
        ), array('order' => 'order_number ASC'));
        $list_district = CHtml::listData($district, 'id', 'name');
        
        $relation = Status::model()->findAllByAttributes(array(
            'type' => 'RELATION'
        ), array('order' => 'order_number ASC'));
        $list_relation = CHtml::listData($relation, 'id', 'name');
        
        $this->render('list/ls_applicant_dependant', array(
            'applicant' => $applicant,
            'dependant' => $dependant,
            'list_nationality' => $list_nationality,
            'list_gender' => $list_gender,
            'list_district' => $list_district,
            'list_relation' => $list_relation
        ));
    }        
    
    public function actionListDependant()
    {
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        
        $dependant = Dependant::model()->findAllByAttributes(array(
            'created_by' => $user->id
        ), array(
            'order' => 'id ASC'
        ));
        
        $this->render('list/ls_dependant', array(
            'dependant' => $dependant
        ));
    }
    
    public function actionListVisa()
    {
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        
        $appl = Applicant::model()->findAllByAttributes(array(
            'created_by' => $user->id
        ), array(
            'order' => 'id DESC'
        ));
        
        $applicant = array();
        foreach($appl as $a){
            $t = Transaction::model()->findByAttributes(array('guid'=>$a->guid));
            if($t->result == 'YES'){
                if(empty($a->middle_name)){
                    $name = $a->given_name.' '.$a->last_name;
                } else {
                    $name = $a->given_name.' '.$a->middle_name.' '.$a->last_name;
                }
                
                $applicant[]  = array(
                    'id' => $a->id,
                    'guid' => $a->guid,
                    'name' => $name,
                    'birthdate' => strtoupper(date('d F Y', strtotime($a->birth_date))),
                    'gender' => $a->gender->name,
                    'passport' => $a->passport_number,
                    'country' => $a->nationality->name,
                    'status' => $a->status
                );
            }
        }
        
        $nationality = Status::model()->findAllByAttributes(array(
            'type' => 'NATIONAL'
        ), array('order' => 'order_number ASC'));
        $list_nationality = CHtml::listData($nationality, 'id', 'name');
        
        $gender = Status::model()->findAllByAttributes(array(
            'type' => 'GENDER'
        ), array('order' => 'order_number ASC'));
        $list_gender = CHtml::listData($gender, 'id', 'name');
        
        $district = Status::model()->findAllByAttributes(array(
            'type' => 'DISTRICT'
        ), array('order' => 'order_number ASC'));
        $list_district = CHtml::listData($district, 'id', 'name');
        
        $job = Status::model()->findAllByAttributes(array(
            'type' => 'JOB'
        ), array('order' => 'order_number ASC'));
        $list_job = CHtml::listData($job, 'id', 'name');
        
        $relation = Status::model()->findAllByAttributes(array(
            'type' => 'RELATION'
        ), array('order' => 'order_number ASC'));
        $list_relation = CHtml::listData($relation, 'id', 'name');
        
        $status = Status::model()->findAllByAttributes(array(
            'type' => 'PASSPORT'
        ), array('order' => 'order_number ASC'));
        $list_status = CHtml::listData($status, 'id', 'name');
        
        $dependant = Status::model()->findAllByAttributes(array(
            'type' => 'DEPENDANT'
        ), array('order' => 'order_number ASC'));
        $list_dependant = CHtml::listData($dependant, 'initial', 'name');
        
        $this->render('list/ls_visa', array(
            'applicant' => $applicant,
            'list_nationality' => $list_nationality,
            'list_gender' => $list_gender,
            'list_district' => $list_district,
            'list_job' => $list_job,
            'list_relation' => $list_relation,
            'list_status' => $list_status,
            'list_dependant' => $list_dependant
        ));
    }
    
    public function actionAccountView()
    {
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        $applicant = Applicant::model()->findAllByAttributes(array('created_by' => $user->id));
        //$dependant = Dependant::model()->findAllByAttributes(array('created_by' => $user->id));
        
        $sd = Yii::app()->request->getPost('start_date');
        $ed = Yii::app()->request->getPost('end_date');
        
        if(empty($sd) && empty($ed)){
            $tbalance = Balance::model()->findAllByAttributes(array(
                'agent_id' => $user->id,
                'type' => 'TRANSACTION'
            ), array('order' => 'created_at ASC'));

            $rbalance = Balance::model()->findAllByAttributes(array(
                'agent_id' => $user->id,
                'type' => 'REGISTRATION'
            ), array('order' => 'created_at ASC'));

            $balance = Balance::model()->findAllByAttributes(array(
                'agent_id' => $user->id
            ), array('order' => 'created_at ASC'));
        } else {
            $startdate = date("Y-m-d", strtotime($sd));
            $enddate = date("Y-m-d", strtotime($ed));
            
            $tbalance = Balance::model()->findAllByAttributes(array(
                'agent_id' => $user->id,
                'type' => 'TRANSACTION'
            ), array(
                'condition' => 'updated_date BETWEEN :startdate AND :enddate ',
                'order' => 'created_at ASC',
                'params' => array(
                    ':startdate' => $startdate,
                    ':enddate' => $enddate
                )
            ));

            $rbalance = Balance::model()->findAllByAttributes(array(
                'agent_id' => $user->id,
                'type' => 'REGISTRATION'
            ), array(
                'condition' => 'updated_date BETWEEN :startdate AND :enddate ',
                'order' => 'created_at ASC',
                'params' => array(
                    ':startdate' => $startdate,
                    ':enddate' => $enddate
                )
            ));

            $balance = Balance::model()->findAllByAttributes(array(
                'agent_id' => $user->id
            ), array(
                'condition' => 'updated_date BETWEEN :startdate AND :enddate ',
                'order' => 'created_at ASC',
                'params' => array(
                    ':startdate' => $startdate,
                    ':enddate' => $enddate
                )
            ));
        }
        
        
        $bdashboard = array();
        foreach($tbalance as $b){
            if($b->status->name == 'PENDING'){
                $bdashboard['pending'] += $b->amount;
                $bdashboard['pending_number'] += 1;
                $bdashboard['available'] += 0;
                $bdashboard['approved'] += 0;
                $bdashboard['approved_number'] += 0;
            } else if($b->status->name == 'SUCCESS'){
                $bdashboard['pending'] += 0;
                $bdashboard['pending_number'] += 0;
                $bdashboard['available'] += $b->amount;
                $bdashboard['approved'] += $b->amount;
                $bdashboard['approved_number'] += 1;
            }
            $bdashboard['current'] += $b->amount;
        }
        
        foreach($rbalance as $b){
            $bdashboard['amount'] += $b->amount;
            $bdashboard['transaction'] += 1;
            $bdashboard['total'] += $b->amount;
        }
        
        $bdashboard['available'] -= $bdashboard['total'];
        $bdashboard['current'] -= $bdashboard['total'];
        
//        echo '<pre>';
//        print_r($bdashboard);
//        echo '</pre>';
        
        $this->render('account/ac_viewaccount', array(
            'bdashboard' => $bdashboard,
            'balance' => $balance
        ));
    }
    
    public function actionAccountRegister()
    {
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        $tbalance = Balance::model()->findAllByAttributes(array(
            'agent_id' => $user->id,
            'type' => 'TRANSACTION'
        ), array('order' => 'created_at ASC'));
        
        $rbalance = Balance::model()->findAllByAttributes(array(
            'agent_id' => $user->id,
            'type' => 'REGISTRATION'
        ), array('order' => 'created_at ASC'));
        
        $bdashboard = array();
        foreach($tbalance as $b){
            if($b->status->name == 'PENDING'){
                $bdashboard['pending'] += $b->amount;
                $bdashboard['pending_number'] += 1;
                $bdashboard['available'] += 0;
                $bdashboard['approved'] += 0;
                $bdashboard['approved_number'] += 0;
            } else if($b->status->name == 'SUCCESS'){
                $bdashboard['pending'] += 0;
                $bdashboard['pending_number'] += 0;
                $bdashboard['available'] += $b->amount;
                $bdashboard['approved'] += $b->amount;
                $bdashboard['approved_number'] += 1;
            }
            $bdashboard['current'] += $b->amount;
        }
        
        foreach($rbalance as $b){
            $bdashboard['amount'] += $b->amount;
            $bdashboard['total'] += $b->amount;
            $bdashboard['worker'] += 1;
        }
        
        $bdashboard['available'] -= $bdashboard['total'];
        $bdashboard['current'] -= $bdashboard['total'];

        $this->render('account/ac_viewregister', array(
            'bdashboard' => $bdashboard,
            'rbalance' => $rbalance
        ));
    }
    
    public function actionAjaxRegisterView($id)
    {
        $this->layout = false;
        $b = Balance::model()->findByPk($id);
        $t = Transaction::model()->findByAttributes(array('guid' => $b->reference_id));
        $a = Applicant::model()->findByAttributes(array('guid' => $b->reference_id));
        
        if(empty($a->middle_name)){
            $name = $a->given_name.' '.$a->last_name;
        } else {
            $name = $a->given_name.' '.$a->middle_name.' '.$a->last_name;
        } 
        
        $result = array();
        $result['id'] = !empty($a->id) ? $a->id : '';
        $result['code'] = !empty($a->guid) ? $a->guid : '';
        $result['name'] = !empty($a->given_name) ? $name : '';
        $result['passport'] = !empty($a->passport_number) ? $a->passport_number : '';
        $result['gender'] = !empty($a->gender_id) ? $a->gender_id : '';
        $result['gender_name'] = !empty($a->gender_id) ? $a->gender->name : '';
        $result['dob'] = !empty($a->birth_date) ? date("d-m-Y",strtotime($a->birth_date)) : '';
        $result['national'] = !empty($a->nationality_id) ? $a->nationality_id : '';
        $result['national_name'] = !empty($a->nationality_id) ? $a->nationality->name : '';
        $result['job'] = !empty($a->job_id) ? $a->job_id : '';
        $result['job_name'] = !empty($a->job_id) ? $a->job->name : '';
        $result['transaction_code'] = !empty($t->guid) ? $t->guid : '';
        $result['receipt_code'] = !empty($t->receipt) ? $t->receipt : '';
        $result['employer_name'] = !empty($a->employer_name) ? $a->employer_name : '';
        $result['employer_district'] = !empty($a->employer_district) ? $a->employer_district : '';
        $result['employer_contact'] = !empty($a->employer_contact_number) ? $a->employer_contact_number : '';
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAccountTopupView()
    {
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        $topup = Topup::model()->findAllByAttributes(array(
           'agent_id' => $user->id,
           'status_id' => 133
        ));
        
        $tbalance = Balance::model()->findAllByAttributes(array(
            'agent_id' => $user->id,
            'type' => 'TRANSACTION'
        ), array('order' => 'created_at ASC'));
        
        $rbalance = Balance::model()->findAllByAttributes(array(
            'agent_id' => $user->id,
            'type' => 'REGISTRATION'
        ), array('order' => 'created_at ASC'));
        
        $bdashboard = array();
        foreach($tbalance as $b){
            if($b->status->name == 'PENDING'){
                $bdashboard['pending'] += $b->amount;
                $bdashboard['pending_number'] += 1;
                $bdashboard['available'] += 0;
                $bdashboard['approved'] += 0;
                $bdashboard['approved_number'] += 0;
            } else if($b->status->name == 'SUCCESS'){
                $bdashboard['pending'] += 0;
                $bdashboard['pending_number'] += 0;
                $bdashboard['available'] += $b->amount;
                $bdashboard['approved'] += $b->amount;
                $bdashboard['approved_number'] += 1;
            }
            $bdashboard['current'] += $b->amount;
        }
        
        foreach($rbalance as $b){
            $bdashboard['amount'] += $b->amount;
            $bdashboard['total'] += $b->amount;
            $bdashboard['worker'] += 1;
        }
        
        $bdashboard['available'] -= $bdashboard['total'];
        $bdashboard['current'] -= $bdashboard['total'];
        
        $bank = Status::model()->findAllByAttributes(array(
            'type' => 'BANK'
        ), array('order' => 'order_number ASC'));
        $list1 = CHtml::listData($bank, 'id', 'name');
        
        $account = Status::model()->findAllByAttributes(array(
            'type' => 'ACCOUNT'
        ), array('order' => 'order_number ASC'));
        $list2 = CHtml::listData($account, 'id', 'name');
        
        $location = Status::model()->findAllByAttributes(array(
            'type' => 'DISTRICT'
        ), array('order' => 'order_number ASC'));
        $list3 = CHtml::listData($location, 'id', 'name');
        
        $this->render('account/ac_viewtopup', array(
            'topup' => $topup,
            'bdashboard' => $bdashboard,
            'list1' => $list1,
            'list2' => $list2,
            'list3' => $list3
        ));
    }
    
    public function actionAccountTopupCreate()
    {
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        $tbalance = Balance::model()->findAllByAttributes(array(
            'agent_id' => $user->id,
            'type' => 'TRANSACTION'
        ), array('order' => 'created_at ASC'));
        
        $rbalance = Balance::model()->findAllByAttributes(array(
            'agent_id' => $user->id,
            'type' => 'REGISTRATION'
        ), array('order' => 'created_at ASC'));
        
        $bdashboard = array();
        foreach($tbalance as $b){
            if($b->status->name == 'PENDING'){
                $bdashboard['pending'] += $b->amount;
                $bdashboard['pending_number'] += 1;
                $bdashboard['available'] += 0;
                $bdashboard['approved'] += 0;
                $bdashboard['approved_number'] += 0;
            } else if($b->status->name == 'SUCCESS'){
                $bdashboard['pending'] += 0;
                $bdashboard['pending_number'] += 0;
                $bdashboard['available'] += $b->amount;
                $bdashboard['approved'] += $b->amount;
                $bdashboard['approved_number'] += 1;
            }
            $bdashboard['current'] += $b->amount;
        }
        
        foreach($rbalance as $b){
            $bdashboard['amount'] += $b->amount;
            $bdashboard['total'] += $b->amount;
            $bdashboard['worker'] += 1;
        }
        
        $bdashboard['available'] -= $bdashboard['total'];
        $bdashboard['current'] -= $bdashboard['total'];
        
        $bank = Status::model()->findAllByAttributes(array(
            'type' => 'BANK'
        ), array('order' => 'order_number ASC'));
        $list1 = CHtml::listData($bank, 'id', 'name');
        
        $account = Status::model()->findAllByAttributes(array(
            'type' => 'ACCOUNT'
        ), array('order' => 'order_number ASC'));
        $list2 = CHtml::listData($account, 'id', 'name');
        
        $location = Status::model()->findAllByAttributes(array(
            'type' => 'DISTRICT'
        ), array('order' => 'order_number ASC'));
        $list3 = CHtml::listData($location, 'id', 'name');
        
        $this->render('account/ac_createtopup', array(
            'bdashboard' => $bdashboard,
            'list1' => $list1,
            'list2' => $list2,
            'list3' => $list3
        ));
    }
    
    public function actionAjaxTopupRegister()
    {
        $this->layout = false;
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        
        $result = array();
        
        $t = new Topup;
        $t->code = Helpers::getGUID();
        $t->agent_id = $user->id;
        $t->bank_id =  Yii::app()->request->getPost('t_bank');
        $t->location = Yii::app()->request->getPost('t_location');
        $t->account_id = Yii::app()->request->getPost('t_account');
        $topup_datetime = Yii::app()->request->getPost('t_topup_date');
        $t->topup_date = date("Y-m-d H:i", strtotime($topup_datetime));
        $t->reference_number = strtoupper(Yii::app()->request->getPost('t_reference'));
        $t->amount = str_replace(',','',Yii::app()->request->getPost('t_amount'));
        $t->status_id = 133;
        $t->remark = strtoupper(Yii::app()->request->getPost('t_remark'));
        $t->created_at = date("Y-m-d H:i:s");
        $t->created_by = $user->id;
        $t->disable = 'ACTIVE';
        $result['save'] = $t->save() ? 'success' : 'failure';
        
        $b = new Balance;
        $b->reference_id = $t->code;
        $b->agent_id = $user->id;
        $b->type = 'TRANSACTION';
        $b->description = 'TOPPED UP BY '.$b->agent->code.' '.$b->agent->name;
        $b->amount = str_replace(',','',Yii::app()->request->getPost('t_amount'));
        $b->updated_date = date("Y-m-d H:i:s");
        $b->status_id = 138;
        $b->created_at = date("Y-m-d H:i:s");
        $b->created_by = $user->id;
        $b->disable = 'ACTIVE';
        $result['save'] = $b->save() ? 'success' : 'failure';
        
        if(!empty($_FILES)){
            if($_FILES['t_topup_image']['type'] == 'image/gif'){
                $target_type = 'gif';
            } else if($_FILES['t_topup_image']['type'] == 'image/jpeg'){
                $target_type = 'jpg';
            } else if($_FILES['t_topup_image']['type'] == 'image/jpg'){
                $target_type = 'jpg';
            } else if($_FILES['t_topup_image']['type'] == 'image/pjpeg'){
                $target_type = 'jpg';
            } else if($_FILES['t_topup_image']['type'] == 'image/x-png'){
                $target_type = 'png';
            } else if($_FILES['t_topup_image']['type'] == 'image/png'){
                $target_type = 'png';
            }
            
            $target_dir = 'uploads/topups/';
            $target_file = $target_dir.basename($t->code.'.'.$target_type);
            move_uploaded_file($_FILES['t_topup_image']['tmp_name'], $target_file);
        }
        
        if($result['save'] == 'success'){
            $result['status'] = 'success';
            $result['success_form'] =   '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    Top-Up has been successfully registered in the system.
                                                </div>
                                            </div>    
                                        </div>';
        } else {
            $result['status'] = 'failure';
            $result['error_form'] =     '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    Top-Up has not been successfully registered in the system.
                                                </div>
                                            </div>    
                                        </div>';
        }
        
        //print_r($_POST);
        //print_r($_FILES);
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxTopupView($id)
    {
        $this->layout = false;
        $t = Topup::model()->findByPk($id);
        
        $target_dir = 'uploads/topups/';
        
        if(file_exists($target_dir.$t->code.'.jpg')){
            $directory = $target_dir.$t->code.'.jpg';
        } else if(file_exists($target_dir.$t->code.'.gif')) {
            $directory = $target_dir.$t->code.'.gif';
        } else if(file_exists($target_dir.$t->code.'.png')) {
            $directory = $target_dir.$t->code.'.png';
        } else {
            $directory = 'vendor/sebumi/images/nobankslip.jpg';
        }
        
        $result = array();
        $result['id'] = !empty($t->id) ? $t->id : '';
        $result['code'] = !empty($t->code) ? $t->code : '';
        $result['agent'] = !empty($t->agent_id) ? $t->agent_id : '';
        $result['agent_name'] = !empty($t->agent_id) ? $t->agent->name : '';
        $result['bank'] = !empty($t->bank_id) ? $t->bank_id : '';
        $result['bank_name'] = !empty($t->bank_id) ? $t->bank->name : '';
        $result['location'] = !empty($t->location) ? $t->location : '';
        //$result['location_name'] = !empty($t->location_id) ? $t->location->name : '';
        $result['account'] = !empty($t->account_id) ? $t->account_id : '';
        $result['account_name'] = !empty($t->account_id) ? $t->account->name : '';
        $result['topup_date'] = !empty($t->topup_date) ? date("d-m-Y H:i",strtotime($t->topup_date)) : '';
        $result['reference'] = !empty($t->reference_number) ? $t->reference_number : '';
        $result['amount'] = !empty($t->amount) ? $t->amount : '';
        $result['status'] = !empty($t->status_id) ? $t->status_id : '';
        $result['status_name'] = !empty($t->status_id) ? $t->status->name : '';
        $result['remark'] = !empty($t->remark) ? $t->remark : '';
        $result['imagedir'] = $directory;
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxTopupUpdate($id)
    {
        $this->layout = false;
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        
        $result = array();
        
        $t = Topup::model()->findByPk($id);
        $t->agent_id = $user->id;
        $t->bank_id =  Yii::app()->request->getPost('u_bank');
        $t->location_id = Yii::app()->request->getPost('u_location');
        $t->account_id = Yii::app()->request->getPost('u_account');
        $topup_datetime = Yii::app()->request->getPost('u_topup_date');
        $t->topup_date = date("Y-m-d H:i", strtotime($topup_datetime));
        $t->reference_number = strtoupper(Yii::app()->request->getPost('u_reference'));
        $t->amount = str_replace(',','',Yii::app()->request->getPost('u_amount'));
        $t->remark = strtoupper(Yii::app()->request->getPost('u_remark'));
        $t->updated_at = date("Y-m-d H:i:s");
        $t->updated_by = $user->id;
        $result['save'] = $t->save() ? 'success' : 'failure';
        
        $b = Balance::model()->findByAttributes(array('reference_id' => $t->code));
        $b->agent_id = $user->id;
        $b->type = 'TRANSACTION';
        $b->description = 'TOP-UP UPDATED BY '.$b->agent->code.' '.$b->agent->name;
        $b->amount = str_replace(',','',Yii::app()->request->getPost('u_amount'));
        $b->updated_date = date("Y-m-d H:i:s");
        $b->updated_at = date("Y-m-d H:i:s");
        $b->updated_by = $user->id;
        $result['save'] = $b->save() ? 'success' : 'failure';
        
        if(!empty($_FILES)){
            if($_FILES['u_topup_image']['type'] == 'image/gif'){
                $target_type = 'gif';
            } else if($_FILES['u_topup_image']['type'] == 'image/jpeg'){
                $target_type = 'jpg';
            } else if($_FILES['u_topup_image']['type'] == 'image/jpg'){
                $target_type = 'jpg';
            } else if($_FILES['u_topup_image']['type'] == 'image/pjpeg'){
                $target_type = 'jpg';
            } else if($_FILES['u_topup_image']['type'] == 'image/x-png'){
                $target_type = 'png';
            } else if($_FILES['u_topup_image']['type'] == 'image/png'){
                $target_type = 'png';
            }
            
            $target_dir = 'uploads/topups/';
            if(file_exists($target_dir.$t->code.'.jpg')){
                unlink($target_dir.$t->code.'.jpg');
            } else if(file_exists($target_dir.$t->code.'.gif')) {
                unlink($target_dir.$t->code.'.gif');
            } else if(file_exists($target_dir.$t->code.'.png')) {
                unlink($target_dir.$t->code.'.png');
            }
            $target_file = $target_dir.basename($t->code.'.'.$target_type);
            move_uploaded_file($_FILES['u_topup_image']['tmp_name'], $target_file);
        }
        
        if($result['save'] == 'success'){
            $result['status'] = 'success';
            $result['success_form'] =   '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    Top-Up has been successfully updated in the system.
                                                </div>
                                            </div>    
                                        </div>';
        } else {
            $result['status'] = 'failure';
            $result['error_form'] =     '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    Top-Up has not been successfully updated in the system.
                                                </div>
                                            </div>    
                                        </div>';
        }
        
        //print_r($_POST);
        //print_r($_FILES);
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxTopupImage($id)
    {
        $this->layout = false;
        $t = Topup::model()->findByPk($id);
        
        $target_dir = 'uploads/topups/';
        
        if(file_exists($target_dir.$t->code.'.jpg')){
            $directory = $target_dir.$t->code.'.jpg';
        } else if(file_exists($target_dir.$t->code.'.gif')) {
            $directory = $target_dir.$t->code.'.gif';
        } else if(file_exists($target_dir.$t->code.'.png')) {
            $directory = $target_dir.$t->code.'.png';
        } else {
            $directory = 'vendor/sebumi/images/nobankslip.jpg';
        }
        
        $imagedir = '<img src="'.$directory.'" class="img-sebumi" width="500">';
        echo $imagedir;
    }
    
    public function actionAjaxApplicantRegister2()
    {
        $this->layout = false;
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        
        $result = array();
        
        print_r($_POST);
        print_r($_FILES);
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxApplicantRegister()
    {
        $this->layout = false;
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        
        $result = array();
        
        $a = new Applicant;
        $applicant_guid = Helpers::getGUID();
        
        $a->guid = $applicant_guid;
        $a->given_name = strtoupper(Yii::app()->request->getPost('r_given_name'));
        $a->middle_name = strtoupper(Yii::app()->request->getPost('r_middle_name'));
        $a->last_name = strtoupper(Yii::app()->request->getPost('r_last_name'));
        $a->birth_date = date("Y-m-d", strtotime(Yii::app()->request->getPost('r_birth_date')));
        $a->gender_id = Yii::app()->request->getPost('r_gender');
        $a->nationality_id = Yii::app()->request->getPost('r_nationality');
        $a->job_id = Yii::app()->request->getPost('r_job_sector');
        
        $a->address1 = strtoupper(Yii::app()->request->getPost('r_address1'));
        $a->address2 = strtoupper(Yii::app()->request->getPost('r_address2'));
        $a->address3 = strtoupper(Yii::app()->request->getPost('r_address3'));
        $a->district = Yii::app()->request->getPost('r_district');
        $a->contact_number = Yii::app()->request->getPost('r_contact');
        
        $a->employer_name = strtoupper(Yii::app()->request->getPost('r_employer_name'));
        $a->employer_address1 = strtoupper(Yii::app()->request->getPost('r_employer_address1'));
        $a->employer_address2 = strtoupper(Yii::app()->request->getPost('r_employer_address2'));
        $a->employer_address3 = strtoupper(Yii::app()->request->getPost('r_employer_address3'));
        $a->employer_district = Yii::app()->request->getPost('r_employer_district');
        $a->employer_contact_number = strtoupper(Yii::app()->request->getPost('r_employer_contact'));
        
        $a->passport_number = strtoupper(Yii::app()->request->getPost('r_passport_number'));
        $a->passport_status_id = strtoupper(Yii::app()->request->getPost('r_passport_status'));
        
        $passport_issuedate = Yii::app()->request->getPost('r_passport_issuedate');
        if(empty($passport_issuedate)){
            $a->passport_issue_date = NULL;
        } else {
            $a->passport_issue_date = date("Y-m-d", strtotime($passport_issuedate));
        }
        
        $passport_expirydate = Yii::app()->request->getPost('r_passport_expirydate');
        if(empty($passport_expirydate)){
            $a->passport_expiry_date = NULL;
        } else {
            $a->passport_expiry_date = date("Y-m-d", strtotime($passport_expirydate));
        }
        
        $a->passport_issue_place = strtoupper(Yii::app()->request->getPost('r_passport_issueplace'));
        $a->passport_entry_point = strtoupper(Yii::app()->request->getPost('r_passport_entrypoint'));
        
        /*
        $a->plks_number = strtoupper(Yii::app()->request->getPost('r_plks_number'));
        $a->bpa_number = strtoupper(Yii::app()->request->getPost('r_bpa_number'));
        
        $plks_issuedate = Yii::app()->request->getPost('r_plks_issuedate');
        if(empty($plks_issuedate)){
            $a->plks_expiry_date = NULL;
        } else {
            $a->plks_expiry_date = date("Y-m-d", strtotime($plks_issuedate));
        }
        
        $plks_issuedate = Yii::app()->request->getPost('r_plks_issuedate');
        if(empty($plks_issuedate)){
            $a->plks_issue_date = NULL;
        } else {
            $a->plks_issue_date = date("Y-m-d", strtotime($plks_issuedate));
        }
        */
        
        $a->nextofkin_given_name = strtoupper(Yii::app()->request->getPost('r_nextkin_given_name'));
        $a->nextofkin_middle_name = strtoupper(Yii::app()->request->getPost('r_nextkin_middle_name'));
        $a->nextofkin_last_name = strtoupper(Yii::app()->request->getPost('r_nextkin_last_name'));
        $a->nextofkin_birth_date = date("Y-m-d", strtotime(Yii::app()->request->getPost('r_nextkin_birth_date')));
        $a->nextofkin_gender_id = Yii::app()->request->getPost('r_nextkin_gender');
        $a->nextofkin_nationality_id = Yii::app()->request->getPost('r_nextkin_nationality');
        $a->nextofkin_relation_id = Yii::app()->request->getPost('r_nextkin_relation');
        
        $a->nextofkin_address1 = strtoupper(Yii::app()->request->getPost('r_nextkin_address1'));
        $a->nextofkin_address2 = strtoupper(Yii::app()->request->getPost('r_nextkin_address2'));
        $a->nextofkin_address3 = strtoupper(Yii::app()->request->getPost('r_nextkin_address3'));
        $a->nextofkin_district = Yii::app()->request->getPost('r_nextkin_district');
        $a->nextofkin_contact_number = Yii::app()->request->getPost('r_nextkin_contact');
        
        
        $a->passport_upload = 'NO';
        $a->birth_upload = 'NO';
        $a->marriage_upload = 'NO';
        $a->national_upload = 'NO';
        $a->other_upload = 'NO';
        $a->is_synchronize = 'NO';
        $a->status = 'OFFLINE';
        $a->status_id = '1';
        $a->created_at = date("Y-m-d H:i:s");
        $a->created_by = $user->id;
        $a->disable = 'ACTIVE';
        
        /** APPLICANT: PHOTO */
        
        if($_FILES['r_photo_document']['size'] > 0){
            Helpers::fileUpload($_FILES['r_photo_document'],'uploads/photos/',$applicant_guid);
        }
        
        $applicant_photo = Yii::app()->request->getPost('r_applicant_photo_snap');
        if(!empty($applicant_photo)){
            Helpers::base64FileUpload($applicant_photo,'uploads/photos/',$applicant_guid);
        }
        
        /** APPLICANT: PASSPORT */
        
        if($_FILES['r_passport_document']['size'] > 0){
            Helpers::fileUpload($_FILES['r_passport_document'],'uploads/passports/',$applicant_guid);
            $a->passport_upload = 'YES';
        }
        
        $applicant_passport = Yii::app()->request->getPost('r_applicant_passport_snap');
        if(!empty($applicant_photo)){
            Helpers::base64FileUpload($applicant_passport,'uploads/passports/',$applicant_guid);
            $a->passport_upload = 'YES';
        }
        
        /** APPLICANT: BIRTH */
        
        if($_FILES['r_birth_document']['size'] > 0){
            Helpers::fileUpload($_FILES['r_birth_document'],'uploads/births/',$applicant_guid);
            $a->birth_upload = 'YES';
        }
        
        $applicant_birth = Yii::app()->request->getPost('r_applicant_birth_snap');
        if(!empty($applicant_birth)){
            Helpers::base64FileUpload($applicant_birth,'uploads/births/',$applicant_guid);
            $a->birth_upload = 'YES'; 
        }
        
        /** APPLICANT: MARRIAGE */
        
        if($_FILES['r_marriage_document']['size'] > 0){
            Helpers::fileUpload($_FILES['r_marriage_document'],'uploads/marriages/',$applicant_guid);
            $a->marriage_upload = 'YES';
        }
        
        $applicant_marriage = Yii::app()->request->getPost('r_applicant_marriage_snap');
        if(!empty($applicant_marriage)){
            Helpers::base64FileUpload($applicant_marriage,'uploads/marriages/',$applicant_guid);
            $a->marriage_upload = 'YES'; 
        }
        
        /** APPLICANT: NATIONAL ID */
        
        if($_FILES['r_national_document']['size'] > 0){
            Helpers::fileUpload($_FILES['r_national_document'],'uploads/nationals/',$applicant_guid);
            $a->national_upload = 'YES';
        }
        
        $applicant_national = Yii::app()->request->getPost('r_applicant_national_snap');
        if(!empty($applicant_national)){
            Helpers::base64FileUpload($applicant_national,'uploads/nationals/',$applicant_guid);
            $a->imm13_upload = 'YES'; 
        }
        
        /** APPLICANT: DOCUMENT */
        
        if($_FILES['r_other_document']['size'] > 0){
            Helpers::fileUpload($_FILES['r_other_document'],'uploads/others/',$applicant_guid);
            $a->other_upload = 'YES';
        }
        
        $applicant_other = Yii::app()->request->getPost('r_applicant_other_snap');
        if(!empty($applicant_other)){
            Helpers::base64FileUpload($applicant_other,'uploads/others/',$applicant_guid);
            $a->other_upload = 'YES'; 
        }
        
        if($a->save()){
            $result['status'] = 'success';
            
            $receiptcode = Sequence::model()->sequence_item(5);
            
            $t = new Transaction;
            $t->guid = $a->guid;
            $t->receipt = html_entity_decode($receiptcode);
            $t->agent_id = $user->id;
            $t->applicant_id = $a->id;
            $t->doctor_id = strtoupper(Yii::app()->request->getPost('r_clinic'));
            $t->status_id = '1';
            $t->created_at = date("Y-m-d H:i:s");
            $t->created_by = $user->id;
            $t->disable = 'ACTIVE';        
            
            $result['status'] = $t->save() ? 'success' : 'failure';
            
            if($result['status'] == 'success'){
                $s = Status::model()->findByPk(142);
                $b = new Balance;
                $b->reference_id = $t->guid;
                $b->agent_id = $t->agent_id;
                $b->type = 'REGISTRATION';
                $b->description = 'RECEIPT '.$t->receipt.' ON '.$t->created_at;
                $b->amount = $s->amount;
                $b->updated_date = date('Y-m-d', strtotime($t->created_at));
                $b->status_id = 137;
                $b->created_at = date("Y-m-d H:i:s");
                $b->created_by = $user->id;
                $b->disable = 'ACTIVE';
                
                $result['status'] = $b->save() ? 'success' : 'failure';
            }
            
        } else {
            $result['status'] = 'failure';
        }
        
        if($result['status'] == 'success'){
            $result['success_form'] =   '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    Applicant has been successfully registered in the system.
                                                </div>
                                            </div>    
                                        </div>';
        } else {
            $result['error_form'] =     '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    Applicant has not been successfully registered in the system.
                                                </div>
                                            </div>    
                                        </div>';
        }
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxApplicantView($id)
    {
        $this->layout = false;
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        $a = Applicant::model()->findByPk($id);
        $t = Transaction::model()-> findByAttributes(array('guid'=>$a->guid));
        //$dependant = Dependant::model()->findAllByAttributes(array('applicant_id' => $a->id));
        
        $result = array();
        $result['clinic_doctor'] = !empty($t->doctor_id) ? $t->doctor->name : NULL;
        
        $result['applicant_id'] = !empty($a->id) ? $a->id : NULL;
        $result['applicant_guid'] = !empty($a->guid) ? $a->guid : NULL;
        $result['applicant_given_name'] = !empty($a->given_name) ? strtoupper($a->given_name) : NULL;
        $result['applicant_middle_name'] = !empty($a->middle_name) ? strtoupper($a->middle_name) : NULL;
        $result['applicant_last_name'] = !empty($a->last_name) ? strtoupper($a->last_name) : NULL;
        $result['applicant_birth_date'] = !empty($a->birth_date) ? date('d-m-Y', strtotime($a->birth_date)) : NULL;
        $result['applicant_gender'] = !empty($a->gender_id) ? $a->gender->name : NULL;
        $result['applicant_nationality'] = !empty($a->nationality_id) ? $a->nationality->name : NULL;
        $result['applicant_job'] = !empty($a->job_id) ? $a->job->name : NULL;
        $result['applicant_address1'] = !empty($a->address1) ? strtoupper($a->address1) : NULL;
        $result['applicant_address2'] = !empty($a->address2) ? strtoupper($a->address2) : NULL;
        $result['applicant_address3'] = !empty($a->address3) ? strtoupper($a->address3) : NULL;
        $result['applicant_district'] = !empty($a->district) ? $a->district : NULL;
        $result['applicant_contact_number'] = !empty($a->contact_number) ? strtoupper($a->contact_number) : NULL;
        
        $result['employer_name'] = !empty($a->employer_name) ? strtoupper($a->employer_name) : NULL;
        $result['employer_address1'] = !empty($a->employer_address1) ? strtoupper($a->employer_address1) : NULL;
        $result['employer_address2'] = !empty($a->employer_address2) ? strtoupper($a->employer_address2) : NULL;
        $result['employer_address3'] = !empty($a->employer_address3) ? strtoupper($a->employer_address3) : NULL;
        $result['employer_district'] = !empty($a->employer_district) ? $a->employer_district : NULL;
        $result['employer_contact_number'] = !empty($a->employer_contact_number) ? strtoupper($a->employer_contact_number) : NULL;
        
        $result['applicant_passport_number'] = !empty($a->passport_number) ? strtoupper($a->passport_number) : NULL;
        $result['applicant_passport_status'] = !empty($a->passport_status_id) ? strtoupper($a->passportStatus->name) : NULL;
        $result['applicant_passport_issuedate'] = !empty($a->passport_issue_date) ? date('d-m-Y', strtotime($a->passport_issue_date)) : NULL;
        $result['applicant_passport_expirydate'] = !empty($a->passport_expiry_date) ? date('d-m-Y', strtotime($a->passport_expiry_date)) : NULL;
        $result['applicant_passport_issueplace'] = !empty($a->passport_issue_place) ? strtoupper($a->passport_issue_place) : NULL;
        $result['applicant_passport_entrypoint'] = !empty($a->passport_entry_point) ? strtoupper($a->passport_entry_point) : NULL;
        
        $result['applicant_plks_number'] = !empty($a->plks_number) ? strtoupper($a->plks_number) : NULL;
        $result['applicant_bpa_number'] = !empty($a->bpa_number) ? strtoupper($a->bpa_number) : NULL;
        $result['applicant_plks_issuedate'] = !empty($a->plks_issue_date) ? date('d-m-Y', strtotime($a->plks_issue_date)) : NULL;
        $result['applicant_plks_expirydate'] = !empty($a->plks_expiry_date) ? date('d-m-Y', strtotime($a->plks_expiry_date)) : NULL;
        
        $result['nextofkin_given_name'] = !empty($a->nextofkin_given_name) ? strtoupper($a->nextofkin_given_name) : NULL;
        $result['nextofkin_middle_name'] = !empty($a->nextofkin_middle_name) ? strtoupper($a->nextofkin_middle_name) : NULL;
        $result['nextofkin_last_name'] = !empty($a->nextofkin_last_name) ? strtoupper($a->nextofkin_last_name) : NULL;
        $result['nextofkin_birth_date'] = !empty($a->nextofkin_birth_date) ? date('d-m-Y', strtotime($a->nextofkin_birth_date)) : NULL;
        $result['nextofkin_gender'] = !empty($a->nextofkin_gender_id) ? $a->nextofkinGender->name : NULL;
        $result['nextofkin_nationality'] = !empty($a->nextofkin_nationality_id) ? $a->nextofkinNationality->name : NULL;
        $result['nextofkin_relation'] = !empty($a->nextofkin_relation_id) ? $a->nextofkinRelation->name : NULL;
        $result['nextofkin_address1'] = !empty($a->nextofkin_address1) ? strtoupper($a->nextofkin_address1) : NULL;
        $result['nextofkin_address2'] = !empty($a->nextofkin_address2) ? strtoupper($a->nextofkin_address2) : NULL;
        $result['nextofkin_address3'] = !empty($a->nextofkin_address3) ? strtoupper($a->nextofkin_address3) : NULL;
        $result['nextofkin_district'] = !empty($a->nextofkin_district) ? $a->nextofkin_district : NULL;
        $result['nextofkin_contact_number'] = !empty($a->nextofkin_contact_number) ? $a->nextofkin_contact_number : NULL;
                
        $result['applicant_gallery'] = ''
            .Helpers::fileGallery2('uploads/photos/',$a->guid,'Photo','applicant-photo-zoom')
            .Helpers::fileGallery2('uploads/passports/',$a->guid,'Passport','applicant-passport-zoom')
            .Helpers::fileGallery2('uploads/births/',$a->guid,'Birth Certificate','applicant-birth-zoom')
            .Helpers::fileGallery2('uploads/nationals/',$a->guid,'National','applicant-national-zoom')    
            .Helpers::fileGallery2('uploads/marriages/',$a->guid,'Marriage Certificate','applicant-marriage-zoom')
            .Helpers::fileGallery2('uploads/others/',$a->guid,'Other Document','applicant-other-zoom');
        
        //$result['count_dependant'] = count($dependant);
        
        /*
        if(count($dependant)){
            $i = 0;
            foreach($dependant as $d){
                $i++;
                
                $result['dependant'][] = array(
                    'dependant_id' => !empty($d->id) ? $d->id : NULL,
                    'dependant_guid' => !empty($d->guid) ? $d->guid : NULL,
                    'dependant_given_name' => !empty($d->given_name) ? strtoupper($d->given_name) : NULL,
                    'dependant_middle_name' => !empty($d->middle_name) ? strtoupper($d->middle_name) : NULL,
                    'dependant_last_name' => !empty($d->last_name) ? strtoupper($d->last_name) : NULL,
                    'dependant_birth_date' => !empty($d->birth_date) ? date('d-m-Y', strtotime($d->birth_date)) : NULL,
                    'dependant_gender' => !empty($d->gender_id) ? $d->gender->name : NULL,
                    'dependant_nationality' => !empty($d->nationality_id) ? $d->nationality->name : NULL,
                    'dependant_address1' => !empty($d->address1) ? strtoupper($d->address1) : NULL,
                    'dependant_address2' => !empty($d->address2) ? strtoupper($d->address2) : NULL,
                    'dependant_address3' => !empty($d->address3) ? strtoupper($d->address3) : NULL,
                    'dependant_district' => !empty($d->district_id) ? $d->district->name : NULL,
                    'dependant_contact_number' => !empty($d->contact_number) ? strtoupper($d->contact_number) : NULL,
                    'dependant_relation' => !empty($d->relation_id) ? strtoupper($d->relation->name) : NULL,
                    'dependant_passport_number' => !empty($d->passport_number) ? strtoupper($d->passport_number) : NULL,
                    'dependant_passport_status' => !empty($d->passport_status_id) ? strtoupper($d->passportStatus->name) : NULL,
                    'dependant_passport_issuedate' => !empty($d->passport_issue_date) ? date('d-m-Y', strtotime($d->passport_issue_date)) : NULL,
                    'dependant_passport_expirydate' => !empty($d->passport_expiry_date) ? date('d-m-Y', strtotime($d->passport_expiry_date)) : NULL,
                    'dependant_passport_issueplace' => !empty($d->passport_issue_place) ? strtoupper($d->passport_issue_place) : NULL,
                    'dependant_passport_entrypoint' => !empty($d->passport_entry_point) ? strtoupper($d->passport_entry_point) : NULL,
                    'dependant_gallery' => ''
                        .Helpers::fileGallery2('uploads/photos/',$d->guid,'Photo','dependant-'.$i.'-photo-zoom')
                        .Helpers::fileGallery2('uploads/passports/',$d->guid,'Passport','dependant-'.$i.'-passport-zoom')
                        .Helpers::fileGallery2('uploads/births/',$d->guid,'Birth Certificate','dependant-'.$i.'-birth-zoom')
                        .Helpers::fileGallery2('uploads/marriages/',$d->guid,'Marriage Certificate','dependant-'.$i.'-marriage-zoom')
                        .Helpers::fileGallery2('uploads/imm13s/',$d->guid,'IMM13','dependant-'.$i.'-imm13-zoom')
                        .Helpers::fileGallery2('uploads/others/',$d->guid,'Other Document','dependant-'.$i.'-other-zoom')
                );
            }
        }
        */
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxApplicantEdit($id)
    {
        $this->layout = false;
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        $a = Applicant::model()->findByPk($id);
        $t = Transaction::model()->findByAttributes(array('guid'=>$a->guid));
        //$dependant = Dependant::model()->findAllByAttributes(array('applicant_id' => $a->id));
        
        $result = array();
        $result['clinic_doctor'] = !empty($t->doctor_id) ? $t->doctor_id : NULL;
        
        $result['applicant_id'] = !empty($a->id) ? $a->id : NULL;
        $result['applicant_guid'] = !empty($a->guid) ? $a->guid : NULL;
        $result['applicant_given_name'] = !empty($a->given_name) ? strtoupper($a->given_name) : NULL;
        $result['applicant_middle_name'] = !empty($a->middle_name) ? strtoupper($a->middle_name) : NULL;
        $result['applicant_last_name'] = !empty($a->last_name) ? strtoupper($a->last_name) : NULL;
        $result['applicant_birth_date'] = !empty($a->birth_date) ? date('d-m-Y', strtotime($a->birth_date)) : NULL;
        $result['applicant_gender'] = !empty($a->gender_id) ? $a->gender_id : NULL;
        $result['applicant_nationality'] = !empty($a->nationality_id) ? $a->nationality_id : NULL;
        $result['applicant_job'] = !empty($a->job_id) ? $a->job_id : NULL;
        $result['applicant_address1'] = !empty($a->address1) ? strtoupper($a->address1) : NULL;
        $result['applicant_address2'] = !empty($a->address2) ? strtoupper($a->address2) : NULL;
        $result['applicant_address3'] = !empty($a->address3) ? strtoupper($a->address3) : NULL;
        $result['applicant_district'] = !empty($a->district) ? $a->district : NULL;
        $result['applicant_contact_number'] = !empty($a->contact_number) ? strtoupper($a->contact_number) : NULL;
        
        $result['employer_name'] = !empty($a->employer_name) ? strtoupper($a->employer_name) : NULL;
        $result['employer_address1'] = !empty($a->employer_address1) ? strtoupper($a->employer_address1) : NULL;
        $result['employer_address2'] = !empty($a->employer_address2) ? strtoupper($a->employer_address2) : NULL;
        $result['employer_address3'] = !empty($a->employer_address3) ? strtoupper($a->employer_address3) : NULL;
        $result['employer_district'] = !empty($a->employer_district) ? $a->employer_district : NULL;
        $result['employer_contact_number'] = !empty($a->employer_contact_number) ? strtoupper($a->employer_contact_number) : NULL;
        
        $result['applicant_passport_number'] = !empty($a->passport_number) ? strtoupper($a->passport_number) : NULL;
        $result['applicant_passport_status'] = !empty($a->passport_status_id) ? $a->passport_status_id : NULL;
        $result['applicant_passport_issuedate'] = !empty($a->passport_issue_date) ? date('d-m-Y', strtotime($a->passport_issue_date)) : NULL;
        $result['applicant_passport_expirydate'] = !empty($a->passport_expiry_date) ? date('d-m-Y', strtotime($a->passport_expiry_date)) : NULL;
        $result['applicant_passport_issueplace'] = !empty($a->passport_issue_place) ? strtoupper($a->passport_issue_place) : NULL;
        $result['applicant_passport_entrypoint'] = !empty($a->passport_entry_point) ? strtoupper($a->passport_entry_point) : NULL;
        
        $result['applicant_plks_number'] = !empty($a->plks_number) ? strtoupper($a->plks_number) : NULL;
        $result['applicant_bpa_number'] = !empty($a->bpa_number) ? strtoupper($a->bpa_number) : NULL;
        $result['applicant_plks_issuedate'] = !empty($a->plks_issue_date) ? date('d-m-Y', strtotime($a->plks_issue_date)) : NULL;
        $result['applicant_plks_expirydate'] = !empty($a->plks_expiry_date) ? date('d-m-Y', strtotime($a->plks_expiry_date)) : NULL;
        
        $result['applicant_edit_photo'] = Helpers::fileDisplay('uploads/photos/',$a->guid,'Photo');
        $result['applicant_edit_passport'] = Helpers::fileDisplay('uploads/passports/',$a->guid,'Passport');
        $result['applicant_edit_birth'] = Helpers::fileDisplay('uploads/births/',$a->guid,'Birth Certificate');
        $result['applicant_edit_national'] = Helpers::fileDisplay('uploads/nationals/',$a->guid,'National ID');
        $result['applicant_edit_marriage'] = Helpers::fileDisplay('uploads/marriages/',$a->guid,'Marriage Certificate');
        //$result['applicant_edit_imm13'] = Helpers::fileDisplay('uploads/imm13s/',$a->guid,'IMM13');
        $result['applicant_edit_other'] = Helpers::fileDisplay('uploads/others/',$a->guid,'Other Document');
        
        $result['nextofkin_given_name'] = !empty($a->nextofkin_given_name) ? strtoupper($a->nextofkin_given_name) : NULL;
        $result['nextofkin_middle_name'] = !empty($a->nextofkin_middle_name) ? strtoupper($a->nextofkin_middle_name) : NULL;
        $result['nextofkin_last_name'] = !empty($a->nextofkin_last_name) ? strtoupper($a->nextofkin_last_name) : NULL;
        $result['nextofkin_birth_date'] = !empty($a->nextofkin_birth_date) ? date('d-m-Y', strtotime($a->nextofkin_birth_date)) : NULL;
        $result['nextofkin_gender'] = !empty($a->nextofkin_gender_id) ? $a->nextofkin_gender_id : NULL;
        $result['nextofkin_nationality'] = !empty($a->nextofkin_nationality_id) ? $a->nextofkin_nationality_id : NULL;
        $result['nextofkin_relation'] = !empty($a->nextofkin_relation_id) ? $a->nextofkin_relation_id : NULL;
        $result['nextofkin_address1'] = !empty($a->nextofkin_address1) ? strtoupper($a->nextofkin_address1) : NULL;
        $result['nextofkin_address2'] = !empty($a->nextofkin_address2) ? strtoupper($a->nextofkin_address2) : NULL;
        $result['nextofkin_address3'] = !empty($a->nextofkin_address3) ? strtoupper($a->nextofkin_address3) : NULL;
        $result['nextofkin_district'] = !empty($a->nextofkin_district) ? $a->nextofkin_district : NULL;
        $result['nextofkin_contact_number'] = !empty($a->nextofkin_contact_number) ? $a->nextofkin_contact_number : NULL;
        
        /*
        $result['count_dependant'] = count($dependant);
        
        if(count($dependant)){
            foreach($dependant as $d){
                $result['dependant'][] = array(
                    'dependant_id' => !empty($d->id) ? $d->id : NULL,
                    'dependant_guid' => !empty($d->guid) ? $d->guid : NULL,
                    'dependant_given_name' => !empty($d->given_name) ? strtoupper($d->given_name) : NULL,
                    'dependant_middle_name' => !empty($d->middle_name) ? strtoupper($d->middle_name) : NULL,
                    'dependant_last_name' => !empty($d->last_name) ? strtoupper($d->last_name) : NULL,
                    'dependant_birth_date' => !empty($d->birth_date) ? date('d-m-Y', strtotime($d->birth_date)) : NULL,
                    'dependant_gender' => !empty($d->gender_id) ? $d->gender_id : NULL,
                    'dependant_nationality' => !empty($d->nationality_id) ? $d->nationality_id : NULL,
                    'dependant_address1' => !empty($d->address1) ? strtoupper($d->address1) : NULL,
                    'dependant_address2' => !empty($d->address2) ? strtoupper($d->address2) : NULL,
                    'dependant_address3' => !empty($d->address3) ? strtoupper($d->address3) : NULL,
                    'dependant_district' => !empty($d->district_id) ? $d->district_id : NULL,
                    'dependant_contact_number' => !empty($d->contact_number) ? strtoupper($d->contact_number) : NULL,
                    'dependant_relation' => !empty($d->relation_id) ? $d->relation_id : NULL,
                    'dependant_passport_number' => !empty($d->passport_number) ? strtoupper($d->passport_number) : NULL,
                    'dependant_passport_status' => !empty($d->passport_status_id) ? $d->passport_status_id : NULL,
                    'dependant_passport_issuedate' => !empty($d->passport_issue_date) ? date('d-m-Y', strtotime($d->passport_issue_date)) : NULL,
                    'dependant_passport_expirydate' => !empty($d->passport_expiry_date) ? date('d-m-Y', strtotime($d->passport_expiry_date)) : NULL,
                    'dependant_passport_issueplace' => !empty($d->passport_issue_place) ? strtoupper($d->passport_issue_place) : NULL,
                    'dependant_passport_entrypoint' => !empty($d->passport_entry_point) ? strtoupper($d->passport_entry_point) : NULL,
                    'dependant_edit_photo' => Helpers::fileDisplay('uploads/photos/',$d->guid,'Photo'),
                    'dependant_edit_passport' => Helpers::fileDisplay('uploads/passports/',$d->guid,'Passport'),
                    'dependant_edit_birth' => Helpers::fileDisplay('uploads/births/',$d->guid,'Birth Certificate'),
                    'dependant_edit_marriage' => Helpers::fileDisplay('uploads/marriages/',$d->guid,'Marriage Certificate'),
                    'dependant_edit_imm13' => Helpers::fileDisplay('uploads/imm13s/',$d->guid,'IMM13'),
                    'dependant_edit_other' => Helpers::fileDisplay('uploads/others/',$d->guid,'Other Document')
                );
            }
        }
        */
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxApplicantUpdate2()
    {
        $this->layout = false;
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        
        $result = array();
        
        print_r($_POST);
        print_r($_FILES);
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxApplicantUpdate()
    {
        $this->layout = false;
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));

        $result = array();
        
        $applicant_guid = Yii::app()->request->getPost('e_guid');
        
        $a = Applicant::model()->findByAttributes(array('guid' => $applicant_guid));
        //$adependant = Dependant::model()->findAllByAttributes(array('applicant_id' => $a->id));
        
        $a->given_name = strtoupper(Yii::app()->request->getPost('e_given_name'));
        $a->middle_name = strtoupper(Yii::app()->request->getPost('e_middle_name'));
        $a->last_name = strtoupper(Yii::app()->request->getPost('e_last_name'));
        $a->birth_date = date("Y-m-d", strtotime(Yii::app()->request->getPost('e_birth_date')));
        $a->gender_id = Yii::app()->request->getPost('e_gender');
        $a->nationality_id = Yii::app()->request->getPost('e_nationality');
        $a->job_id = Yii::app()->request->getPost('e_job_sector');

        $a->address1 = strtoupper(Yii::app()->request->getPost('e_address1'));
        $a->address2 = strtoupper(Yii::app()->request->getPost('e_address2'));
        $a->address3 = strtoupper(Yii::app()->request->getPost('e_address3'));
        $a->district = Yii::app()->request->getPost('e_district');
        $a->contact_number = Yii::app()->request->getPost('e_contact');

        $a->employer_name = strtoupper(Yii::app()->request->getPost('e_employer_name'));
        $a->employer_address1 = strtoupper(Yii::app()->request->getPost('e_employer_address1'));
        $a->employer_address2 = strtoupper(Yii::app()->request->getPost('e_employer_address2'));
        $a->employer_address3 = strtoupper(Yii::app()->request->getPost('e_employer_address3'));
        $a->employer_district = Yii::app()->request->getPost('e_employer_district');
        $a->employer_contact_number = strtoupper(Yii::app()->request->getPost('e_employer_contact'));

        $a->passport_number = strtoupper(Yii::app()->request->getPost('e_passport_number'));
        $a->passport_status_id = strtoupper(Yii::app()->request->getPost('e_passport_status'));

        $passport_issuedate = Yii::app()->request->getPost('e_passport_issuedate');
        if(empty($passport_issuedate)){
            $a->passport_issue_date = NULL;
        } else {
            $a->passport_issue_date = date("Y-m-d", strtotime($passport_issuedate));
        }

        $passport_expirydate = Yii::app()->request->getPost('e_passport_expirydate');
        if(empty($passport_expirydate)){
            $a->passport_expiry_date = NULL;
        } else {
            $a->passport_expiry_date = date("Y-m-d", strtotime($passport_expirydate));
        }

        $a->passport_issue_place = strtoupper(Yii::app()->request->getPost('e_passport_issueplace'));
        $a->passport_entry_point = strtoupper(Yii::app()->request->getPost('e_passport_entrypoint'));

        /*
        $a->plks_number = strtoupper(Yii::app()->request->getPost('e_plks_number'));
        $a->bpa_number = strtoupper(Yii::app()->request->getPost('e_bpa_number'));

        $plks_issuedate = Yii::app()->request->getPost('e_plks_issuedate');
        if(empty($plks_issuedate)){
            $a->plks_expiry_date = NULL;
        } else {
            $a->plks_expiry_date = date("Y-m-d", strtotime($plks_issuedate));
        }

        $plks_issuedate = Yii::app()->request->getPost('e_plks_issuedate');
        if(empty($plks_issuedate)){
            $a->plks_issue_date = NULL;
        } else {
            $a->plks_issue_date = date("Y-m-d", strtotime($plks_issuedate));
        }
        */
        
        $a->nextofkin_given_name = strtoupper(Yii::app()->request->getPost('e_nextkin_given_name'));
        $a->nextofkin_middle_name = strtoupper(Yii::app()->request->getPost('e_nextkin_middle_name'));
        $a->nextofkin_last_name = strtoupper(Yii::app()->request->getPost('e_nextkin_last_name'));
        $a->nextofkin_birth_date = date("Y-m-d", strtotime(Yii::app()->request->getPost('e_nextkin_birth_date')));
        $a->nextofkin_gender_id = Yii::app()->request->getPost('e_nextkin_gender');
        $a->nextofkin_nationality_id = Yii::app()->request->getPost('e_nextkin_nationality');
        $a->nextofkin_relation_id = Yii::app()->request->getPost('e_nextkin_relation');
        
        $a->nextofkin_address1 = strtoupper(Yii::app()->request->getPost('e_nextkin_address1'));
        $a->nextofkin_address2 = strtoupper(Yii::app()->request->getPost('e_nextkin_address2'));
        $a->nextofkin_address3 = strtoupper(Yii::app()->request->getPost('e_nextkin_address3'));
        $a->nextofkin_district = Yii::app()->request->getPost('e_nextkin_district');
        $a->nextofkin_contact_number = Yii::app()->request->getPost('e_nextkin_contact');
        
        $a->updated_at = date("Y-m-d H:i:s");
        $a->updated_by = $user->id;
        
        /** APPLICANT: PHOTO */

        if($_FILES['e_photo_document']['size'] > 0){
            Helpers::fileUpload($_FILES['e_photo_document'],'uploads/photos/',$applicant_guid);
        }
        
        $applicant_photo = Yii::app()->request->getPost('e_applicant_photo_snap');
        if(!empty($applicant_photo)){
            Helpers::base64FileUpload($applicant_photo,'uploads/photos/',$applicant_guid);
        }

        /** APPLICANT: PASSPORT */

        if($_FILES['e_passport_document']['size'] > 0){
            Helpers::fileUpload($_FILES['e_passport_document'],'uploads/passports/',$applicant_guid);
            $a->passport_upload = 'YES';
        }

        $applicant_passport = Yii::app()->request->getPost('e_applicant_passport_snap');
        if(!empty($applicant_passport)){
            Helpers::base64FileUpload($applicant_passport,'uploads/passports/',$applicant_guid);
            $a->passport_upload = 'YES';
        }

        /** APPLICANT: BIRTH */

        if($_FILES['e_birth_document']['size'] > 0){
            Helpers::fileUpload($_FILES['e_birth_document'],'uploads/births/',$applicant_guid);
            $a->birth_upload = 'YES';
        }

        $applicant_birth = Yii::app()->request->getPost('e_applicant_birth_snap');
        if(!empty($applicant_birth)){
            Helpers::base64FileUpload($applicant_birth,'uploads/births/',$applicant_guid);
            $a->birth_upload = 'YES';
        }
        
        /** APPLICANT: NATIONAL ID */

        if($_FILES['e_national_document']['size'] > 0){
            Helpers::fileUpload($_FILES['e_national_document'],'uploads/nationals/',$applicant_guid);
            $a->national_upload = 'YES';
        }

        $applicant_national = Yii::app()->request->getPost('e_applicant_national_snap');
        if(!empty($applicant_national)){
            Helpers::base64FileUpload($applicant_national,'uploads/nationals/',$applicant_guid);
            $a->national_upload = 'YES';
        }

        /** APPLICANT: MARRIAGE */

        if($_FILES['e_marriage_document']['size'] > 0){
            Helpers::fileUpload($_FILES['e_marriage_document'],'uploads/marriages/',$applicant_guid);
            $a->marriage_upload = 'YES';
        }

        $applicant_marriage = Yii::app()->request->getPost('e_applicant_marriage_snap');
        if(!empty($applicant_marriage)){
            Helpers::base64FileUpload($applicant_marriage,'uploads/marriages/',$applicant_guid);
            $a->marriage_upload = 'YES';
        }

        /** APPLICANT: IMM13 */
        /*
        if($_FILES['e_imm13_document']['size'] > 0){
            Helpers::fileUpload($_FILES['e_imm13_document'],'uploads/imm13s/',$applicant_guid);
            $a->imm13_upload = 'YES';
        }

        $applicant_imm13 = Yii::app()->request->getPost('e_applicant_imm13_snap');
        if(!empty($applicant_imm13)){
            Helpers::base64FileUpload($applicant_imm13,'uploads/imm13s/',$applicant_guid);
            $a->imm13_upload = 'YES';
        }
        */

        /** APPLICANT: DOCUMENT */

        if($_FILES['e_other_document']['size'] > 0){
            Helpers::fileUpload($_FILES['e_other_document'],'uploads/others/',$applicant_guid);
            $a->other_upload = 'YES';
        }

        $applicant_other = Yii::app()->request->getPost('e_applicant_other_snap');
        if(!empty($applicant_other)){
            Helpers::base64FileUpload($applicant_other,'uploads/others/',$applicant_guid);
            $a->other_upload = 'YES';
        }
        
        if($a->save()){
            $result['status'] = 'success';
            
            $t = Transaction::model()->findByAttributes(array('guid'=>$a->guid));
            $t->doctor_id = Yii::app()->request->getPost('e_clinic');
            $t->updated_at = date("Y-m-d H:i:s");
            $t->updated_by = $user->id;
        } else {
            $result['status'] = 'failure';
        }
        
        if($result['status'] == 'success'){
            $result['success_form'] =   '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    Applicant has been successfully updated in the system.
                                                </div>
                                            </div>
                                        </div>';
        } else {
            $result['error_form'] =     '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    Applicant has not been successfully updated in the system.
                                                </div>
                                            </div>
                                        </div>';
        }

        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();    
    }
    
    public function actionAjaxApplicantDelete()
    {
        $this->layout = false;
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));

        $result = array();
        
        $applicant_guid = Yii::app()->request->getPost('d_guid');
        
        $a = Applicant::model()->findByAttributes(array('guid' => $applicant_guid));
        $adependant = Dependant::model()->findAllByAttributes(array('applicant_id' => $a->id));
        
        $a->disable = 'INACTIVE';
        $a->updated_at = date("Y-m-d H:i:s");
        $a->updated_by = $user->id;
        
        if($a->save()){
            $result['status'] = 'success';
            
            $dependant = count($adependant);
            
            if($dependant > 0){
                foreach($adependant as $d){
                    $d->disable = 'INACTIVE';
                    $d->updated_at = date("Y-m-d H:i:s");
                    $d->updated_by = $user->id;
                    
                    $result['status'] = $d->save() ? 'success' : 'failure';
                }        
            }
        } else {
            $result['status'] = 'failure';
        }
        
        if($result['status'] == 'success'){
            $result['success_form'] =   '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    Applicant has been successfully deleted in the system.
                                                </div>
                                            </div>
                                        </div>';
        } else {
            $result['error_form'] =     '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    Applicant has not been successfully deleted in the system.
                                                </div>
                                            </div>
                                        </div>';
        }

        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();    
    } 
    
    public function actionAjaxCheckBalance()
    {
        $this->layout = false;
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));

        $result = array();
        
        $balance = Balance::model()->findAllByAttributes(array(
            'agent_id' => $user->id,
            'status_id' => 137
        ));
        
        $trncost = 0;
        $regcost = 0;
        
        foreach($balance as $b){
            if($b->type == 'TRANSACTION'){
                $trncost += $b->amount;
            } else if($b->type == 'REGISTRATION'){
                $regcost += $b->amount;
            }
        }
        
        $balcost = $trncost - $regcost;
        $result['balance'] = number_format($balcost,2);
        
        if($balcost > 200){
            $result['status'] = 'success';
        } else {
            $result['status'] = 'failure';
        }
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();    
    }
}