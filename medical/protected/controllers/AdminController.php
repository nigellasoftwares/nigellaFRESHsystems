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
                    'Index','Dashboard',
                    'ListAgent','ListApplicant','ListDependant','ListApplicantDependant',
                    'TopupManage','TopupApprove',
                    'SettingBank','SettingDistrict','SettingNational','SettingJob','SettingRelation',
                    'AjaxSettingOption'
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
        $applicant = Applicant::model()->findAll();
        //$dependant = Dependant::model()->findAll();
        $transaction = Transaction::model()->findAll();
        
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
        
        $dependant_total = array(
            'male' => 0,
            'female' => 0,
            'all' => 0
        );
        foreach($dependant as $d){
            if($d->gender->name == 'MALE'){
                $dependant_total['male'] += 1;
            } else if($d->gender->name == 'FEMALE'){
                $dependant_total['male'] += 1;
            }
            $dependant_total['all'] += 1;
        }
        
        $this->render('dashboard', array(
            'applicant' => $applicant_total,
            'dependant' => $dependant_total,
        ));
    }
    
    public function actionListApplicant()
    {
        $applicant = Applicant::model()->findAll(array(
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
        
        $this->render('list/ls_applicant', array(
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
    
    public function actionListApplicantDependant($id)
    {
        $applicant = Applicant::model()->findByPk($id);
        
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
    
    public function actionListAgent()
    {
        $agent = Profile::model()->findAllByAttributes(array(
            'type' => 'AGENT'
        ), array('order' => 'id ASC'));
        
        $district = Status::model()->findAllByAttributes(array(
            'type' => 'DISTRICT'
        ), array('order' => 'order_number ASC'));
        $list1 = CHtml::listData($district, 'id', 'name');
        
        $this->render('list/ls_agent',array(
            'agent' => $agent,
            'list1' => $list1,
        ));
    }
    
    public function actionListDependant()
    {
//        $dependant = Dependant::model()->findAll(array(
//            'order' => 'id ASC'
//        ));
//        
//        $this->render('list/ls_dependant', array(
//            'dependant' => $dependant
//        ));
    }
    
    public function actionTopupManage()
    {
        $balance = Balance::model()->findAllByAttributes(array(
            'type' => 'TRANSACTION'
        ), array('order' => 'created_at ASC'));
        
        $bdashboard = array();
        foreach($balance as $b){
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
        
        $btopup = array();
        foreach($balance as $b){
            $topup = Topup::model()->findByAttributes(array('code'=>$b->reference_id));
            $btopup[] = array(
                'topup_id' => $topup->id,
                'topup_code' => $b->reference_id,
                'topup_date' => $topup->topup_date,
                'topup_bank' => $topup->bank->name,
                'topup_account' => $topup->account->name,
                'topup_location' => $topup->location->name,
                'topup_reference' => $topup->reference_number,
                'topup_status' => $b->status->name,
                'topup_amount' => ($b->status->name == 'SUCCESS') ? $topup->amount : 0,
                'topup_pending' => ($b->status->name == 'PENDING') ? $topup->amount : 0,
                'topup_current' => $topup->amount
            );
        }
        
//        echo '<pre>';
//        print_r($btopup);
//        echo '</pre>';
        
        $this->render('topup/tp_manage', array(
            'bdashboard' => $bdashboard,
            'btopup' => $btopup
        ));
    }
    
    public function actionTopupApprove()
    {
        $topup = Topup::model()->findAllByAttributes(array(
            'status_id' => '133'
        ), array('order' => 'created_at ASC'));
        
        $balance = Balance::model()->findAllByAttributes(array(
            'type' => 'TRANSACTION'
        ), array('order' => 'created_at ASC'));
        
        $bdashboard = array();
        foreach($balance as $b){
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
        
        $status = Status::model()->findAllByAttributes(array(
            'type' => 'TOPUP'
        ), array('order' => 'order_number ASC'));
        $list1 = CHtml::listData($status, 'id', 'name');
        
        $this->render('topup/tp_approve', array(
            'bdashboard' => $bdashboard,
            'topup' => $topup,
            'list1' => $list1
        ));
    }    
    
    public function actionSettingBank()
    {
        $bank = Status::model()->findAllByAttributes(array(
            'type' => 'BANK'
        ), array('order' => 'order_number ASC'));
        
        $this->render('settings/st_bank',array(
            'bank' => $bank
        ));
    }
    
    public function actionSettingDistrict()
    {
        $district = Status::model()->findAllByAttributes(array(
            'type' => 'DISTRICT'
        ), array('order' => 'order_number ASC'));
        
        $this->render('settings/st_district',array(
            'district' => $district
        ));
    }
    
    public function actionSettingNational()
    {
        $national = Status::model()->findAllByAttributes(array(
            'type' => 'NATIONAL'
        ), array('order' => 'order_number ASC'));
        
        $this->render('settings/st_national',array(
            'national' => $national
        ));
    }
    
    public function actionSettingJob()
    {
        $job = Status::model()->findAllByAttributes(array(
            'type' => 'JOB'
        ), array('order' => 'order_number ASC'));
        
        $this->render('settings/st_job',array(
            'job' => $job
        ));
    }
    
    public function actionSettingRelation()
    {
        $relation = Status::model()->findAllByAttributes(array(
            'type' => 'RELATION'
        ), array('order' => 'order_number ASC'));
        
        $this->render('settings/st_relation',array(
            'relation' => $relation
        ));
    }
    
    public function actionAjaxSettingOption($type)
    {
        $this->layout = false;
        
        $setting = Status::model()->findAllByAttributes(array(
            'type' => $type
        ), array('order' => 'order_number ASC'));
        
        $result = array();
        foreach($setting as $s){
            $result[] = array(
                'value' => $s->id,
                'name' => $s->name
            );
        }
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
}