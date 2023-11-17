<?php

class AjaxController extends Controller
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
                    'Index',
                    'AjaxWorkerRegister','AjaxWorkerView',
                    'AjaxPersonalUpdate','AjaxPersonal2Update',
                    'AjaxTransactionDelete','AjaxInformationUpdate',
                    'AjaxVerifyProgress','AjaxBarchartDaily','AjaxBarchartMonthly',
                    'AjaxAdminBarchartDaily','AjaxAdminBarchartMonthly',
                    'AjaxProfileUpdate','AjaxCompanyUpdate','AjaxCompany2Update','AjaxPersonUpdate',
                    'AjaxPasswordMatch','AjaxPasswordUpdate',
                    'AjaxMedicalUpdate','AjaxTrainingUpdate',
                    'AjaxVisaUpdate','AjaxDepartureUpdate','AjaxFlightUpdate',
                    'AjaxEmployerUpdate','AjaxJobSearch','AjaxWorkerPrint',
                    'AjaxAdminUserRegister','AjaxAdminUserView','AjaxAdminUserDelete',
                    'AjaxEmployerRegister','AjaxEmployerView','AjaxEmployerInfoUpdate','AjaxEmployerDelete',
                    'AjaxAgentRegister','AjaxAgentUpdate',
                    'AjaxDemandLetterRegister','AjaxDemandLetterView','AjaxDemandLetterUpdate','AjaxDemandLetterDelete',
                    'AjaxImageCrop','AjaxUsernameCheck',
					'AjaxCovid19Upload'
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
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
        unset(Yii::app()->session['csrf_token']);
        unset(Yii::app()->session);
    }
    
    public function actionAjaxWorkerRegister()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $result = array();
        
        $worker_guid = Helpers::getGUID();
        $transaction_guid = Helpers::getGUID();
        
        $gender = Yii::app()->request->getPost('gender');
        $dateofbirth = Yii::app()->request->getPost('dateofbirth');
        $dateofissue = Yii::app()->request->getPost('passport_dateofissue');
        $dateofexpiry = Yii::app()->request->getPost('passport_dateofexpiry');
        $education_other = Yii::app()->request->getPost('education_other');
        $educationtype = Yii::app()->request->getPost('educationtype');
        $email = Yii::app()->request->getPost('email');
        
        $w = new Worker;
        $w->code = html_entity_decode(Sequence::model()->sequence_item(6));
        $w->guid = $worker_guid;
        $w->full_name = strtoupper(Yii::app()->request->getPost('fullname'));
        $w->first_name = strtoupper(Yii::app()->request->getPost('firstname'));
        $w->middle_name = strtoupper(Yii::app()->request->getPost('middlename'));
        $w->last_name = strtoupper(Yii::app()->request->getPost('lastname'));
        
        $w->gender_id = empty($gender) ? NULL : $gender;
        $w->birth_date = empty($dateofbirth) ? NULL : date('Y-m-d', strtotime($dateofbirth));
        $w->birth_place = strtoupper(Yii::app()->request->getPost('placeofbirth'));
        $w->nationality_id = Yii::app()->request->getPost('nationality');
        $w->national_card = strtoupper(Yii::app()->request->getPost('national_card_number'));
        $w->jobsector_id = Yii::app()->request->getPost('jobsector');
        
        $w->home_address = strtoupper(Yii::app()->request->getPost('home_address'));
        $w->home_zipcode = Yii::app()->request->getPost('home_zipcode');
        $w->home_phone = Yii::app()->request->getPost('home_phone');
        $w->home_mobile = Yii::app()->request->getPost('home_mobile');
        $w->email = empty($email) ? NULL : $email;
        
        $w->marital_id = Yii::app()->request->getPost('marital_status');
        $w->children_number = Yii::app()->request->getPost('children_number');
        $w->education_other = empty($education_other) ? NULL : strtoupper($education_other);
        $w->relation_id = Yii::app()->request->getPost('nextofkin_relation');
        $w->kin_name = strtoupper(Yii::app()->request->getPost('nextofkin_name'));
        $w->kin_mobile = strtoupper(Yii::app()->request->getPost('nextofkin_mobile'));
        $result['status'] = $w->save() ? 'success' : 'failure';
        
        if(count($educationtype) > 0){
            foreach($educationtype as $et){
                $e = new Education;
                $e->worker_id = $w->id;
                $e->educationtype_id = $et;
                $e->save();
            }    
        }
        
        $t = new Transaction;
        $t->code = html_entity_decode(Sequence::model()->sequence_transaction());
        $t->guid = $transaction_guid;
        $t->worker_id = $w->id;
        $t->sourceagency_id = $user->id;
        $t->localagency_id = 2;
        $result['status'] = $t->save() ? 'success' : 'failure';
        
        $p = new Passport;
        $p->transaction_id = $t->id;
        $p->worker_id = $w->id;
        $p->number = strtoupper(Yii::app()->request->getPost('passport_number'));
        $p->issue_place = strtoupper(Yii::app()->request->getPost('passport_placeofissue'));
        $p->issue_date = empty($dateofissue) ? NULL : date('Y-m-d', strtotime($dateofissue));
        $p->expiry_date = empty($dateofexpiry) ? NULL : date('Y-m-d', strtotime($dateofexpiry));
        $result['status'] = $p->save() ? 'success' : 'failure';
        
        $tr = Transaction::model()->findByPk($t->id);
        $tr->passport_id = $p->id;
        $result['status'] = $tr->save() ? 'success' : 'failure';
        
        if($_FILES['upload_photo']['size'] > 0){
            Helpers::fileUpload($_FILES['upload_photo'],'uploads/photos/',$transaction_guid);
        }
        
        if($_FILES['upload_passport']['size'] > 0){
            Helpers::fileUpload($_FILES['upload_passport'],'uploads/passports/',$transaction_guid);
        }
                
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }    
    
    public function actionAjaxWorkerView($id)
    {
        $this->layout = false;
        $result = array();
        
        $t = Transaction::model()->findByPk($id);
        
        $result['transaction_id'] = $t->id;
        $result['transaction_code'] = $t->code;
        $result['transaction_guid'] = $t->guid;
        
        $result['worker_id'] = $t->worker->id;
        $result['worker_code'] = $t->worker->code;
        $result['worker_guid'] = $t->worker->guid;        
        $result['worker_fullname'] = $t->worker->full_name;
        $result['worker_firstname'] = $t->worker->first_name;
        $result['worker_middlename'] = $t->worker->middle_name;
        $result['worker_lastname'] = $t->worker->last_name;
		$result['worker_nationality'] = $t->worker->nationality->country;
        
        $result['passport'] = $t->passport->number;
        $result['employer'] = $t->employer->profile->company->name;
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxPersonalUpdate()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $transactionid = Yii::app()->request->getPost('transaction_id');
        $result = array();
        
        $gender = Yii::app()->request->getPost('gender');
        $dateofbirth = Yii::app()->request->getPost('dateofbirth');
        $dateofissue = Yii::app()->request->getPost('passport_dateofissue');
        $dateofexpiry = Yii::app()->request->getPost('passport_dateofexpiry');
        
        $t = Transaction::model()->findByPk($transactionid);
        $w = Worker::model()->findByPk($t->worker->id);
        $w->full_name = strtoupper(Yii::app()->request->getPost('fullname'));
        $w->first_name = strtoupper(Yii::app()->request->getPost('firstname'));
        $w->middle_name = strtoupper(Yii::app()->request->getPost('middlename'));
        $w->last_name = strtoupper(Yii::app()->request->getPost('lastname'));
        $w->gender_id = empty($gender) ? NULL : $gender;
        $w->birth_date = empty($dateofbirth) ? NULL : date('Y-m-d', strtotime($dateofbirth));
        $w->birth_place = strtoupper(Yii::app()->request->getPost('placeofbirth'));
        $w->nationality_id = Yii::app()->request->getPost('nationality');
        $w->national_card = strtoupper(Yii::app()->request->getPost('national_card_number'));
        $w->jobsector_id = Yii::app()->request->getPost('jobsector');
        $result['status'] = $w->save() ? 'success' : 'failure';
        
        $p = Passport::model()->findByPk($t->passport->id);
        $p->number = strtoupper(Yii::app()->request->getPost('passport_number'));
        $p->issue_place = strtoupper(Yii::app()->request->getPost('passport_placeofissue'));
        $p->issue_date = empty($dateofissue) ? NULL : date('Y-m-d', strtotime($dateofissue));
        $p->expiry_date = empty($dateofexpiry) ? NULL : date('Y-m-d', strtotime($dateofexpiry));
        $result['status'] = $p->save() ? 'success' : 'failure';
        
        if($_FILES['upload_photo']['size'] > 0){
            Helpers::fileUpload($_FILES['upload_photo'],'uploads/photos/',$t->guid);
        }
        
        if($_FILES['upload_passport']['size'] > 0){
            Helpers::fileUpload($_FILES['upload_passport'],'uploads/passports/',$t->guid);
        }
        
        $result['id'] = $t->id;
        $result['role'] = ucfirst(strtolower(str_replace(' ','',$user->role->name)));
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxPersonal2Update()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $transactionid = Yii::app()->request->getPost('transaction_id');
        $result = array();
        
        $education_other = Yii::app()->request->getPost('education_other');
        $educationtype = Yii::app()->request->getPost('educationtype');
        $email = Yii::app()->request->getPost('email');
        
        $t = Transaction::model()->findByPk($transactionid);
        $w = Worker::model()->findByPk($t->worker->id);
        $w->home_address = strtoupper(Yii::app()->request->getPost('home_address'));
        $w->home_zipcode = Yii::app()->request->getPost('home_zipcode');
        $w->home_phone = Yii::app()->request->getPost('home_phone');
        $w->home_mobile = Yii::app()->request->getPost('home_mobile');
        $w->email = empty($email) ? NULL : $email;
        $w->marital_id = Yii::app()->request->getPost('marital_status');
        $w->children_number = Yii::app()->request->getPost('children_number');
        $w->education_other = empty($education_other) ? NULL : strtoupper($education_other);
        $w->relation_id = Yii::app()->request->getPost('nextofkin_relation');
        $w->kin_name = strtoupper(Yii::app()->request->getPost('nextofkin_name'));
        $w->kin_mobile = strtoupper(Yii::app()->request->getPost('nextofkin_mobile'));
        $result['status'] = $w->save() ? 'success' : 'failure';
        
        $education = Education::model()->findAllByAttributes(array('worker_id' => $w->id));
        
        $educate = array();
        foreach($education as $ed){
            $educate[] = $ed->educationtype_id;
        }
        
        if(count($education) > 0){
            foreach($educationtype as $et){
                $e2 = Education::model()->findByAttributes(array(
                    'worker_id' => $w->id,
                    'educationtype_id' => $et
                ));
                if($e2 == NULL){
                    $e3 = new Education;
                    $e3->worker_id = $w->id;
                    $e3->educationtype_id = $et;
                    $e3->save();
                }
            }
            
            foreach($educate as $ed){
                if(!in_array($ed,$educationtype)){
                    $e4 = Education::model()->findByAttributes(array(
                        'worker_id' => $w->id,
                        'educationtype_id' => $ed
                    ));
                    $e4->disable = 'INACTIVE';
                    $e4->save();
                }
            }
        } else {
            foreach($educationtype as $et){
                $e5 = new Education;
                $e5->worker_id = $w->id;
                $e5->educationtype_id = $et;
                $e5->save();
            }
        }
        
        $result['id'] = $t->id;
        $result['role'] = ucfirst(strtolower(str_replace(' ','',$user->role->name)));
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxTransactionDelete($id)
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $result = array();
        
        $t = Transaction::model()->findByPk($id);
        $t->disable = 'INACTIVE';
        $result['status'] = $t->save() ? 'success' : 'failure';
        
        $result['role'] = ucfirst(strtolower(str_replace(' ','',$user->role->name)));
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxInformationUpdate($id)
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $result = array();
        
        $pid = Yii::app()->request->getPost('pid');
        $employer = Yii::app()->request->getPost('employer');
        $arrival_date = Yii::app()->request->getPost('arrival_date');
        $plks_expiry_date = Yii::app()->request->getPost('plks_expiry_date');
        $plks_expiry_date2 = empty($plks_expiry_date) ? NULL : date('Y-m-d', strtotime($plks_expiry_date));
        $medical = Yii::app()->request->getPost('medical');
        $visa = Yii::app()->request->getPost('visa');
        
        $t = Transaction::model()->findByPk($id);
        $t->employer_id = empty($employer) ? NULL : $employer;
        $t->arrival_date = empty($arrival_date) ? NULL : date('Y-m-d', strtotime($arrival_date));
        $t->plks_expiry_date = empty($plks_expiry_date) ? NULL : date('Y-m-d', strtotime($plks_expiry_date));
        $t->plks_start_date = empty($plks_expiry_date) ? NULL : date('Y-m-d', strtotime('-1 year', strtotime($plks_expiry_date2)));
        $t->medical = empty($medical) ? NULL : strtoupper($medical);
        $t->visa = empty($visa) ? NULL : strtoupper($visa);
        $result['status'] = $t->save() ? 'success' : 'failure';
        
        $result['id'] = $t->id;
        $result['role'] = ucfirst(strtolower(str_replace(' ','',$user->role->name)));
        $result['link'] = empty($pid) ? NULL : 'PID';
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxVerifyProgress()
    {
        $this->layout = false;
        $user = User::model()->findByPk(2);
        $transactionid = Yii::app()->request->getPost('transaction_id');
        $result = array();
        
        $t = Transaction::model()->findByPk($transactionid);
        
        if(empty($t->arrival_date)){
            $t->arrival = 'YES';
            $t->arrival_date = date('Y-m-d H:i:s');
        } else if(empty($t->plks_start_date)){
            $t->plks_start_date = date('Y-m-d H:i:s');
            $t->plks_expiry_date = date('Y-m-d H:i:s', strtotime('+1 year'));
        }
        
        $t->updated_by = $user->id;
        $result['status'] = $t->save() ? 'success' : 'failure';
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxBarchartDaily($said = '')
    {
        $this->layout = false;
        if(empty($said)){
            $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        } else {
            $user = User::model()->findByPk($said);
        }    
        
        $day = range(1,date('t'));
        $days = array();
        foreach($day as $d1){
            $days[] = str_pad($d1, '2', '0', STR_PAD_LEFT);
        }
        
        $worker = array();
        foreach($days as $d2){
            if($user->role->id == 3){
                $t = Transaction::model()->findAllByAttributes(array(
                    'sourceagency_id' => $user->id,
                ), array(
                    'condition' => 'DATE(created_at) = :date',
                    'params' => array(':date' => date('Y-m-').$d2)
                ));
            } else {
                $t = Transaction::model()->findAll(array(
                    'condition' => 'DATE(created_at) = :date',
                    'params' => array(':date' => date('Y-m-').$d2)
                ));
            }
            
            $worker[] = count($t);
        }    
                
        $result = array(
            'branch' => $user->profile->company->name,
            'days' => $days,
            'workers' => $worker
        );
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxAdminBarchartDaily()
    {
        $this->layout = false;
        //$user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $day = range(1,date('t'));
        $days = array();
        foreach($day as $d1){
            $days[] = str_pad($d1, '2', '0', STR_PAD_LEFT);
        }
        
        $profile = Profile::model()->findAllByAttributes(array(
            'type' => 'SOURCE AGENT'
        ), array(
            'order' => 'id ASC'
        ));
        
        $branches = array();
        $colors = array();
        $series = array();
        
        foreach($profile as $p){
            $branches[] = $p->company->remark;
            
            $colors[] = '#'.substr(md5(rand()), 0, 6);
            
            $worker = array();
            foreach($days as $d2){
                $t = Transaction::model()->findAllByAttributes(array(
                    'sourceagency_id' => $p->id,
                ), array(
                    'condition' => 'DATE(created_at) = :date',
                    'params' => array(':date' => date('Y-m-').$d2)
                ));
                
                $worker[] = count($t);
            }
            
            $series[] = array(
                'name' => $p->company->remark,
                'type' => 'bar',
                'data' => $worker,
                'markPoint' => array(
                    'data' => array(
                        array(
                            'type' => 'max',
                            'name' => 'Max'
                        ),
                        array(
                            'type' => 'min',
                            'name' => 'Min'
                        )
                    )
                ),
                'markLine' => array(
                    'data' => array(
                        array(
                            'type' => 'average',
                            'name' => 'Average'
                        )
                    )
                )
            );
        }
        
        $result = array(
            'branches' => $branches,
            'colors' => $colors,
            'days' => $days,
            'series' => $series
        );
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }        
    
    public function actionAjaxBarchartMonthly($said = '')
    {
        $this->layout = false;
        if(empty($said)){
            $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        } else {
            $user = User::model()->findByPk($said);
        }
        
        $month = range(1,12);
        $months = array();
        foreach($month as $m1){
            $months[] = str_pad($m1, '2', '0', STR_PAD_LEFT);
        }
        $monthnames = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
        
        $worker = array();
        foreach($months as $m2){
            $d = date('t', strtotime(date('Y-').$m2.'-01'));
            
            if($user->role->id == 3){
                $t = Transaction::model()->findAllByAttributes(array(
                    'sourceagency_id' => $user->id
                ), array(
                    'condition' => 'DATE(created_at) BETWEEN :date1 AND :date2',
                    'params' => array(
                        ':date1' => date('Y-').$m2.'-01',
                        ':date2' => date('Y-').$m2.'-'.$d,
                    )
                ));
            } else {
                $t = Transaction::model()->findAll(array(
                    'condition' => 'DATE(created_at) BETWEEN :date1 AND :date2',
                    'params' => array(
                        ':date1' => date('Y-').$m2.'-01',
                        ':date2' => date('Y-').$m2.'-'.$d,
                    )
                ));
            }
            
            $worker[] = count($t);
        }    
                
        $result = array(
            'branch' => $user->profile->company->name,
            'months' => $monthnames,
            'workers' => $worker
        );
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxAdminBarchartMonthly()
    {
        $this->layout = false;
        //$user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $month = range(1,12);
        $months = array();
        foreach($month as $m1){
            $months[] = str_pad($m1, '2', '0', STR_PAD_LEFT);
        }
        $monthnames = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
        
        $profile = Profile::model()->findAllByAttributes(array(
            'type' => 'SOURCE AGENT'
        ), array(
            'order' => 'id ASC'
        ));
        
        $branches = array();
        $colors = array();
        $series = array();
        
        foreach($profile as $p){
            $branches[] = $p->company->remark;
            
            $colors[] = '#'.substr(md5(rand()), 0, 6);
            
            $worker = array();
            foreach($months as $m2){
                $d = date('t', strtotime(date('Y-').$m2.'-01'));
                
                $t = Transaction::model()->findAllByAttributes(array(
                    'sourceagency_id' => $p->id
                ), array(
                    'condition' => 'DATE(created_at) BETWEEN :date1 AND :date2',
                    'params' => array(
                        ':date1' => date('Y-').$m2.'-01',
                        ':date2' => date('Y-').$m2.'-'.$d,
                    )
                ));
                
                $worker[] = count($t);
            }
            
            $series[] = array(
                'name' => $p->company->remark,
                'type' => 'bar',
                'data' => $worker,
                'markPoint' => array(
                    'data' => array(
                        array(
                            'type' => 'max',
                            'name' => 'Max'
                        ),
                        array(
                            'type' => 'min',
                            'name' => 'Min'
                        )
                    )
                ),
                'markLine' => array(
                    'data' => array(
                        array(
                            'type' => 'average',
                            'name' => 'Average'
                        )
                    )
                )
            );
        }
        
        $result = array(
            'branches' => $branches,
            'colors' => $colors,
            'months' => $monthnames,
            'series' => $series
        );
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxProfileUpdate()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $pid = Yii::app()->request->getPost('pid');
        $contactnumber2 = Yii::app()->request->getPost('contact_number2');
        $mobilenumber1 = Yii::app()->request->getPost('mobile_number1');
        $mobilenumber2 = Yii::app()->request->getPost('mobile_number2');
        
        $result = array();
        
        $p = Profile::model()->findByPk($pid);
        $p->fullname = strtoupper(Yii::app()->request->getPost('full_name'));
        $p->contact_number1 = strtoupper(Yii::app()->request->getPost('contact_number1'));
        $p->contact_number2 = empty($contactnumber2) ? NULL : strtoupper($contactnumber2);
        $p->mobile_number1 = empty($mobilenumber1) ? NULL : strtoupper($mobilenumber1);
        $p->mobile_number2 = empty($mobilenumber2) ? NULL : strtoupper($mobilenumber2);
        $p->email = Yii::app()->request->getPost('email_address');
        $result['status'] = $p->save() ? 'success' : 'failure';
        
        $result['role'] = ucfirst(strtolower(str_replace(' ','',$user->role->name)));
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxCompanyUpdate()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $cid = Yii::app()->request->getPost('cid');
        $companyaddress2 = Yii::app()->request->getPost('company_address2');
        $companyaddress3 = Yii::app()->request->getPost('company_address3');
        $companyaddress4 = Yii::app()->request->getPost('company_address4');
        $contactnumber2 = Yii::app()->request->getPost('contact_number2');
        
        $result = array();
        
        $c = Company::model()->findByPk($cid);
        $c->name = strtoupper(Yii::app()->request->getPost('company_name'));
        $c->address1 = strtoupper(Yii::app()->request->getPost('company_address1'));
        $c->address2 = empty($companyaddress2) ? NULL : strtoupper($companyaddress2);
        $c->address3 = empty($companyaddress3) ? NULL : strtoupper($companyaddress3);
        $c->address4 = empty($companyaddress4) ? NULL : strtoupper($companyaddress4);
        $c->postcode = strtoupper(Yii::app()->request->getPost('company_zipcode'));
        $c->state_id = Yii::app()->request->getPost('company_state');
        $c->contact_number1 = strtoupper(Yii::app()->request->getPost('contact_number1'));
        $c->contact_number2 = empty($contactnumber2) ? NULL : strtoupper($contactnumber2);
        $c->email = Yii::app()->request->getPost('company_email_address');
        $result['status'] = $c->save() ? 'success' : 'failure';
        
        $result['role'] = ucfirst(strtolower(str_replace(' ','',$user->role->name)));
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxCompany2Update()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $cid = Yii::app()->request->getPost('cid');
        $contactnumber2 = Yii::app()->request->getPost('contact_number2');
        
        $result = array();
        
        $c = Company::model()->findByPk($cid);
        $c->name = strtoupper(Yii::app()->request->getPost('company_name'));
        $c->address = strtoupper(Yii::app()->request->getPost('company_address'));
        $c->postcode = strtoupper(Yii::app()->request->getPost('company_zipcode'));
        $c->contact_number1 = strtoupper(Yii::app()->request->getPost('contact_number1'));
        $c->contact_number2 = empty($contactnumber2) ? NULL : strtoupper($contactnumber2);
        $c->email = Yii::app()->request->getPost('company_email_address');
        $result['status'] = $c->save() ? 'success' : 'failure';
        
        $result['role'] = ucfirst(strtolower(str_replace(' ','',$user->role->name)));
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxPersonUpdate()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $cid = Yii::app()->request->getPost('cid');
        $personmobilenumber1 = Yii::app()->request->getPost('person_mobile_number1');
        $personmobilenumber2 = Yii::app()->request->getPost('person_mobile_number2');
        
        $result = array();
        
        $c = Company::model()->findByPk($cid);
        $c->person_incharge = strtoupper(Yii::app()->request->getPost('person_name'));
        $c->mobile_number1 = empty($personmobilenumber1) ? NULL : strtoupper($personmobilenumber1);
        $c->mobile_number2 = empty($personmobilenumber2) ? NULL : strtoupper($personmobilenumber2);
        $c->person_email = Yii::app()->request->getPost('person_email_address');
        $result['status'] = $c->save() ? 'success' : 'failure';
        
        $result['role'] = ucfirst(strtolower(str_replace(' ','',$user->role->name)));
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxPasswordMatch()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $passwordold = Yii::app()->request->getPost('password_old');
        
        $result = array();
        
        if(md5($passwordold) == $user->password){
            $result['status'] = 'success';
        } else {
            $result['status'] = 'failure';
        }
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxPasswordUpdate()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $passwordnew = Yii::app()->request->getPost('password_new');
        
        $result = array();
        $user->password = md5($passwordnew);
        $result['status'] = $user->save() ? 'success' : 'failure';
        
        $result['role'] = ucfirst(strtolower(str_replace(' ','',$user->role->name)));
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxMedicalUpdate()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $result = array();
        $medical = Yii::app()->request->getPost('medical');
        $clinic = Yii::app()->request->getPost('clinic');

        foreach($medical as $m){
            $t = Transaction::model()->findByPk($m);
            $t->medical_id = $clinic;
            //$t->medical = 'YES';
            
            $result['status'] = $t->save() ? 'success' : 'failure';

            $a1 = MedicalApplicant::model()->findByAttributes(array(
                'guid' => $t->worker->guid
            ));
            
            if(!$a1){
                $a2 = new MedicalApplicant;
                $a2->guid = $t->worker->guid;
                $a2->given_name = $t->worker->first_name;
                $a2->middle_name = $t->worker->middle_name; 
                $a2->last_name = $t->worker->last_name;
                $a2->birth_date = $t->worker->birth_date;
                
                if($t->worker->gender_id == 1){
                    $a2->gender_id = 75;
                } else if($t->worker->gender_id == 2){
                    $a2->gender_id = 76;
                }

                $a2->nationality_id = 45;
                
                if($t->worker->jobsector_id == 1){ /* AGRICULTURE */
                    $a2->job_id = 67;
                } else if($t->worker->jobsector_id == 2){ /* CONSTRUCTION */
                    $a2->job_id = 68;
                } else if($t->worker->jobsector_id == 3){ /* DOMESTIC */
                    $a2->job_id = 69;
                } else if($t->worker->jobsector_id == 4){ /* ESTATE */
                    $a2->job_id = 70;
                } else if($t->worker->jobsector_id == 5){ /* MANUFACTURING */
                    $a2->job_id = 71;
                } else if($t->worker->jobsector_id == 6){ /* PLANTATION */
                    $a2->job_id = 72;
                } else if($t->worker->jobsector_id == 7){ /* SERVICES */
                    $a2->job_id = 73;
                } else if($t->worker->jobsector_id == 8){ /* OTHERS */
                    $a2->job_id = 74;
                }
                
                $a2->address1 = $t->worker->home_address;
                $a2->district = 'DHAKA';
                $a2->contact_number = $t->worker->home_phone;
                $a2->employer_name = $t->employer->profile->company->name;
                $a2->employer_address1 = empty($t->employer->profile->company->address1) ? NULL : $t->employer->profile->company->address1; 
                $a2->employer_address2 = empty($t->employer->profile->company->address2) ? NULL : $t->employer->profile->company->address2; 
                $a2->employer_address3 = empty($t->employer->profile->company->address2) ? NULL : $t->employer->profile->company->address3;
                $a2->employer_district = $t->employer->profile->company->district;
                $a2->employer_contact_number = $t->employer->profile->company->contact_number1;
                
                $a2->passport_number = $t->passport->number;
                $a2->passport_status_id = 91;
                $a2->passport_issue_date = $t->passport->issue_date;
                $a2->passport_expiry_date = $t->passport->expiry_date;
                $a2->passport_issue_place = $t->passport->issue_place;
                $a2->passport_entry_point = 'KUALA LUMPUR';

                $a2->passport_upload = 'NO';
                $a2->birth_upload = 'NO';
                $a2->marriage_upload = 'NO';
                $a2->national_upload = 'NO';
                $a2->other_upload = 'NO';
                $a2->is_synchronize = 'NO';
                $a2->status = 'OFFLINE';
                $a2->status_id = 1;

                if($t->worker->relation_id == 1){
                    $a2->nextofkin_relation_id = 77;
                } else if($t->worker->relation_id == 2){
                    $a2->nextofkin_relation_id = 78;
                } else if($t->worker->relation_id == 3){
                    $a2->nextofkin_relation_id = 79;
                } else if($t->worker->relation_id == 4){
                    $a2->nextofkin_relation_id = 80;
                } else if($t->worker->relation_id == 5){
                    $a2->nextofkin_relation_id = 82;
                } else if($t->worker->relation_id == 6){
                    $a2->nextofkin_relation_id = 81;
                } else if($t->worker->relation_id == 7){
                    $a2->nextofkin_relation_id = 83;
                } else if($t->worker->relation_id == 8){
                    $a2->nextofkin_relation_id = 84;
                } else if($t->worker->relation_id == 9){
                    $a2->nextofkin_relation_id = 85;
                } else if($t->worker->relation_id == 10){
                    $a2->nextofkin_relation_id = 86;
                } else if($t->worker->relation_id == 11){
                    $a2->nextofkin_relation_id = 87;
                } else if($t->worker->relation_id == 12){
                    $a2->nextofkin_relation_id = 88;
                } else if($t->worker->relation_id == 13){
                    $a2->nextofkin_relation_id = 89;
                } else {
                    $a2->nextofkin_relation_id = 90;    
                }    

                $a2->nextofkin_given_name = $t->worker->kin_name;
                $a2->nextofkin_district = 'BANGLADESH';
                $a2->nextofkin_nationality_id = 45;
                $a2->nextofkin_contact_number = $t->worker->kin_mobile;

                $a2->created_at = date('Y-m-d H:i:s');
                $a2->created_by = 2;
                $a2->updated_at = date('Y-m-d H:i:s');
                $a2->updated_by = 2;
                $a2->disable = 'ACTIVE';

                $result['status'] = $a2->save() ? 'success' : 'failure';
            }

            $a3 = MedicalApplicant::model()->findByAttributes(array(
                'guid' => $t->worker->guid
            ));

            $b1 = MedicalTransaction::model()->findByAttributes(array(
                'guid' => $t->worker->guid
            ));

            if(!$b1){
                $b2 = new MedicalTransaction;
                $b2->guid = $t->worker->guid;
                $b2->agent_id = 2;
                $b2->applicant_id = $a3->id;
                $b2->created_at = date('Y-m-d H:i:s');
                $b2->created_by = 2;
                $b2->doctor_id = $t->medical_id;
                $b2->disable = 'ACTIVE';
                $b2->is_verified = 'YES';
                
                $result['status'] = $b2->save() ? 'success' : 'failure';
            }   
            
            $source = 'uploads/photos/'.$t->guid.'.jpg';
            $destination = '../medical/uploads/photos/'.$t->worker->guid.'.jpg';

            if(!file_exists($destination)) {
                copy($source,$destination);
            }
        }
        
        $result['role'] = ucfirst(strtolower(str_replace(' ','',$user->role->name)));
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxTrainingUpdate()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $result = array();
        $training = Yii::app()->request->getPost('training');
        foreach($training as $m){
            $t = Transaction::model()->findByPk($m);
            $t->training = 'YES';
            $result['status'] = $t->save() ? 'success' : 'failure';
        }
        
        $result['role'] = ucfirst(strtolower(str_replace(' ','',$user->role->name)));
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxVisaUpdate()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $result = array();
        $medical = Yii::app()->request->getPost('visa');
        foreach($medical as $m){
            $t = Transaction::model()->findByPk($m);
            $t->visa = 'YES';
            $result['status'] = $t->save() ? 'success' : 'failure';
        }
        
        $result['role'] = ucfirst(strtolower(str_replace(' ','',$user->role->name)));
        $result['agent'] = Yii::app()->request->getPost('agent_id');
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxDepartureUpdate()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $result = array();
        $medical = Yii::app()->request->getPost('approval');
        foreach($medical as $m){
            $t = Transaction::model()->findByPk($m);
            $t->approval = 'YES';
            $result['status'] = $t->save() ? 'success' : 'failure';
        }
        
        $result['role'] = ucfirst(strtolower(str_replace(' ','',$user->role->name)));
        $result['agent'] = Yii::app()->request->getPost('agent_id');
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxFlightUpdate()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $flight_number = Yii::app()->request->getPost('flight_number');
        $eta_malaysia = Yii::app()->request->getPost('eta_malaysia');
        $flight_date = Yii::app()->request->getPost('flight_date');
        
        $result = array();
        $flight = Yii::app()->request->getPost('flight');
        foreach($flight as $f){
            $t = Transaction::model()->findByPk($f);
            $t->departure = 'YES';
            $t->flight_number = strtoupper($flight_number);
            $t->eta_malaysia = strtoupper($eta_malaysia);
            $t->flight_date = date('Y-m-d', strtotime($flight_date));
            $result['status'] = $t->save() ? 'success' : 'failure';
        }
        
        $result['role'] = ucfirst(strtolower(str_replace(' ','',$user->role->name)));
        $result['agent'] = Yii::app()->request->getPost('agent_id');
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxEmployerUpdate()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $worker = Yii::app()->request->getPost('worker');
        $demand = Yii::app()->request->getPost('demandletter');
        $quota = Quota::model()->findByPk($demand);
        
        $result = array();
        foreach($worker as $w){
            $t = Transaction::model()->findByPk($w);
            $t->employer_id = $quota->employer_id;
            $t->quota_id = $demand;
            $result['status'] = $t->save() ? 'success' : 'failure';
        }
        
        $result['role'] = ucfirst(strtolower(str_replace(' ','',$user->role->name)));
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }     
    
    public function actionAjaxJobSearch()
    {
        $this->layout = false;
        $jobid = Yii::app()->request->getPost('job_id');
        
        $result = array();
        $job = Jobsector::model()->findByPk($jobid);
        $result['jobsector'] = $job->name;
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }     
    
    public function actionAjaxWorkerPrint()
    {
        $this->layout = false;
        $print = Yii::app()->request->getPost('print');
        
        $result = array(
            'print' => $print,
            'status' => 'success'
        );
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxAdminUserRegister()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $result = array();
        
        $userid = strtoupper(Yii::app()->request->getPost('userid'));
        $method = strtoupper(Yii::app()->request->getPost('method'));
        $contactnumber2 = strtoupper(Yii::app()->request->getPost('contact_number2'));
        $mobilenumber2 = strtoupper(Yii::app()->request->getPost('mobile_number2'));
        
        if($method == 'NEW'){
            $p = new Profile;
            $p->code = html_entity_decode(Sequence::model()->sequence_item(3));
            $p->guid = Helpers::getGUID();
            $p->company_id = '2';
            $p->type = 'ADMIN';
            $p->fullname = strtoupper(Yii::app()->request->getPost('fullname'));
            $p->initial = strtoupper(Yii::app()->request->getPost('username'));
            $p->contact_number1 = strtoupper(Yii::app()->request->getPost('contact_number1'));
            $p->contact_number2 = empty($contactnumber2) ? NULL : strtoupper($contactnumber2);
            $p->mobile_number1 = strtoupper(Yii::app()->request->getPost('mobile_number1'));
            $p->mobile_number2 = empty($mobilenumber2) ? NULL : strtoupper($mobilenumber2);
            $p->email = Yii::app()->request->getPost('email');
            $p->remark = 'USER ADMIN';
            $result['status'] = $p->save() ? 'success' : 'failure';

            $u = new User;
            $u->guid = Helpers::getGUID();
            $u->username = strtoupper(Yii::app()->request->getPost('username'));
            $u->password = 'e10adc3949ba59abbe56e057f20f883e'; /* 123456 */
            $u->profile_id = $p->id;
            $u->role_id = '2';
            $u->access_id = '2';
            $u->status_id = '1';
            $result['status'] = $u->save() ? 'success' : 'failure';
        } else if($method == 'EDIT'){
            $p = Profile::model()->findByPk($userid);
            $p->fullname = strtoupper(Yii::app()->request->getPost('fullname'));
            $p->initial = strtoupper(Yii::app()->request->getPost('username'));
            $p->contact_number1 = strtoupper(Yii::app()->request->getPost('contact_number1'));
            $p->contact_number2 = empty($contactnumber2) ? NULL : strtoupper($contactnumber2);
            $p->mobile_number1 = strtoupper(Yii::app()->request->getPost('mobile_number1'));
            $p->mobile_number2 = empty($mobilenumber2) ? NULL : strtoupper($mobilenumber2);
            $p->email = Yii::app()->request->getPost('email');
            $result['status'] = $p->save() ? 'success' : 'failure';
            
            $u = User::model()->findByPk($userid);
            $u->username = strtoupper(Yii::app()->request->getPost('username'));
            $result['status'] = $u->save() ? 'success' : 'failure';
        }
        
        $result['role'] = ucfirst(strtolower(str_replace(' ','',$user->role->name)));
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }      
    
    public function actionAjaxAdminUserView($id)
    {
        $this->layout = false;
        $u = User::model()->findByPk($id);
        
        $result = array(
            'userid' => $u->id,
            'code' => strtoupper($u->profile->code),
            'fullname' => strtoupper($u->profile->fullname),
            'username' => strtoupper($u->username),
            'contactnumber1' => strtoupper($u->profile->contact_number1),
            'contactnumber2' => strtoupper($u->profile->contact_number2),
            'mobilenumber1' => strtoupper($u->profile->mobile_number1),
            'mobilenumber2' => strtoupper($u->profile->mobile_number2),
            'emailaddress' => $u->profile->email
        );
        
        echo '<pre>';
        print_r($result);
        echo '</pre>';
        die();
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }  
    
    public function actionAjaxAdminUserDelete($id)
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $result = array();
        
        $u = User::model()->findByPk($id);
        $u->disable = 'INACTIVE';
        $result['status'] = $u->save() ? 'success' : 'failure';
        
        $result['role'] = ucfirst(strtolower(str_replace(' ','',$user->role->name)));
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxEmployerRegister()
    {
        $this->layout = false;
        //$user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $result = array();
        
        $employeraddress2 = strtoupper(Yii::app()->request->getPost('employer_address2'));
        $employeraddress3 = strtoupper(Yii::app()->request->getPost('employer_address3'));
        $employeraddress4 = strtoupper(Yii::app()->request->getPost('employer_address4'));
        
        $employercontact2 = strtoupper(Yii::app()->request->getPost('employer_contact2'));
        $picmobile2 = strtoupper(Yii::app()->request->getPost('pic_mobile2'));
        
        $c = new Company;
        $c->code = html_entity_decode(Sequence::model()->sequence_item(2));
        $c->guid = Helpers::getGUID();
        $c->name = strtoupper(Yii::app()->request->getPost('employer_name'));
        $c->register_number = strtoupper(Yii::app()->request->getPost('employer_regno'));
        $c->address1 = strtoupper(Yii::app()->request->getPost('employer_address1'));
        $c->address2 = empty($employeraddress2) ? NULL : strtoupper($employeraddress2);
        $c->address3 = empty($employeraddress3) ? NULL : strtoupper($employeraddress3);
        $c->address4 = empty($employeraddress4) ? NULL : strtoupper($employeraddress4);
        $c->postcode = strtoupper(Yii::app()->request->getPost('employer_zipcode'));
        $c->district = strtoupper(Yii::app()->request->getPost('employer_district'));
        $c->state_id = Yii::app()->request->getPost('employer_state');
        $c->contact_number1 = strtoupper(Yii::app()->request->getPost('employer_contact1'));
        $c->contact_number2 = empty($employercontact2) ? NULL : strtoupper($employercontact2);
        $c->email = Yii::app()->request->getPost('employer_email');
        $c->person_incharge = strtoupper(Yii::app()->request->getPost('pic_fullname'));
        $c->mobile_number1 = strtoupper(Yii::app()->request->getPost('pic_mobile1'));
        $c->mobile_number2 = empty($picmobile2) ? NULL : strtoupper($picmobile2);
        $c->person_email = Yii::app()->request->getPost('pic_email');
        $c->remark = strtoupper(Yii::app()->request->getPost('employer_username'));
        $result['status'] = $c->save() ? 'success' : 'failure';
        
        $p = new Profile;
        $p->code = html_entity_decode(Sequence::model()->sequence_item(7));
        $p->guid = Helpers::getGUID();
        $p->company_id = $c->id;
        $p->type = 'EMPLOYER';
        $p->fullname = strtoupper(Yii::app()->request->getPost('pic_fullname'));
        $p->initial = strtoupper(Yii::app()->request->getPost('employer_username'));
        $p->contact_number1 = strtoupper(Yii::app()->request->getPost('employer_contact1'));
        $p->contact_number2 = empty($employercontact2) ? NULL : strtoupper($employercontact2);
        $p->mobile_number1 = strtoupper(Yii::app()->request->getPost('pic_mobile1'));
        $p->mobile_number2 = empty($picmobile2) ? NULL : strtoupper($picmobile2);
        $p->email = Yii::app()->request->getPost('pic_email');
        $p->remark = strtoupper(Yii::app()->request->getPost('employer_name'));
        $result['status'] = $p->save() ? 'success' : 'failure';

        $u = new User;
        $u->guid = Helpers::getGUID();
        $u->username = strtoupper(Yii::app()->request->getPost('employer_username'));
        $u->password = 'e10adc3949ba59abbe56e057f20f883e'; /* 123456 */
        $u->profile_id = $p->id;
        $u->role_id = '4';
        $u->status_id = '1';
        $result['status'] = $u->save() ? 'success' : 'failure';
        
        if($_FILES['upload_logo']['size'] > 0){
            Helpers::fileUpload($_FILES['upload_logo'],'uploads/employers/',$c->guid);
        }
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxEmployerView($id)
    {
        $this->layout = false;
        $e = User::model()->findByAttributes(array(
            'profile_id' => $id
        ));
        
        $result = array(
            'employer_id' => $e->id,
            'employerprofile_id' => $e->profile->id,
            'employer_code' => strtoupper($e->profile->code),
            'employer_name' => strtoupper($e->profile->company->name)
        );
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }   
    
    public function actionAjaxEmployerInfoUpdate($id)
    {
        $this->layout = false;
        //$user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $result = array();
        
        $employerid = strtoupper(Yii::app()->request->getPost('employerid'));
        $employeraddress2 = strtoupper(Yii::app()->request->getPost('employer_address2'));
        $employeraddress3 = strtoupper(Yii::app()->request->getPost('employer_address3'));
        $employeraddress4 = strtoupper(Yii::app()->request->getPost('employer_address4'));
        
        $employercontact2 = strtoupper(Yii::app()->request->getPost('employer_contact2'));
        $picmobile2 = strtoupper(Yii::app()->request->getPost('pic_mobile2'));
        
        $p = Profile::model()->findByPk($employerid);
        $p->fullname = strtoupper(Yii::app()->request->getPost('pic_fullname'));
        $p->contact_number1 = strtoupper(Yii::app()->request->getPost('employer_contact1'));
        $p->contact_number2 = empty($employercontact2) ? NULL : strtoupper($employercontact2);
        $p->mobile_number1 = strtoupper(Yii::app()->request->getPost('pic_mobile1'));
        $p->mobile_number2 = empty($picmobile2) ? NULL : strtoupper($picmobile2);
        $p->email = Yii::app()->request->getPost('pic_email');
        $p->remark = strtoupper(Yii::app()->request->getPost('employer_name'));
        $result['status'] = $p->save() ? 'success' : 'failure';
        
        $c = Company::model()->findByPk($p->company_id);
        $c->name = strtoupper(Yii::app()->request->getPost('employer_name'));
        $c->register_number = strtoupper(Yii::app()->request->getPost('employer_regno'));
        $c->address1 = strtoupper(Yii::app()->request->getPost('employer_address1'));
        $c->address2 = empty($employeraddress2) ? NULL : strtoupper($employeraddress2);
        $c->address3 = empty($employeraddress3) ? NULL : strtoupper($employeraddress3);
        $c->address4 = empty($employeraddress4) ? NULL : strtoupper($employeraddress4);
        $c->postcode = strtoupper(Yii::app()->request->getPost('employer_zipcode'));
        $c->district = strtoupper(Yii::app()->request->getPost('employer_district'));
        $c->state_id = Yii::app()->request->getPost('employer_state');
        $c->contact_number1 = strtoupper(Yii::app()->request->getPost('employer_contact1'));
        $c->contact_number2 = empty($employercontact2) ? NULL : strtoupper($employercontact2);
        $c->email = Yii::app()->request->getPost('employer_email');
        $c->person_incharge = strtoupper(Yii::app()->request->getPost('pic_fullname'));
        $c->mobile_number1 = strtoupper(Yii::app()->request->getPost('pic_mobile1'));
        $c->mobile_number2 = empty($picmobile2) ? NULL : strtoupper($picmobile2);
        $c->person_email = Yii::app()->request->getPost('pic_email');
        $result['status'] = $c->save() ? 'success' : 'failure';
        
        if($_FILES['upload_logo']['size'] > 0){
            Helpers::fileUpload($_FILES['upload_logo'],'uploads/employers/',$c->guid);
        }
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }       
    
    public function actionAjaxEmployerDelete($id)
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $result = array();
        
        $u = User::model()->findByPk($id);
        $u->disable = 'INACTIVE';
        $result['status'] = $u->save() ? 'success' : 'failure';
        
        $p = Profile::model()->findByPk($u->profile_id);
        $p->disable = 'INACTIVE';
        $result['status'] = $p->save() ? 'success' : 'failure';
        
        
        
        $result['role'] = ucfirst(strtolower(str_replace(' ','',$user->role->name)));
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxDemandLetterRegister()
    {
        $this->layout = false;
        $employerid = strtoupper(Yii::app()->request->getPost('employerid'));
        $remark = Yii::app()->request->getPost('fw_remark');
        
        $result = array();
        $result['id'] = $employerid;
        
        $qt = new Quota;
        $qt->code = html_entity_decode(Sequence::model()->sequence_item(9));
        $qt->guid = Helpers::getGUID();
        $qt->employer_id = $employerid;
        $qt->required = Yii::app()->request->getPost('fw_required');
        $qt->remark = empty($remark) ? NULL : strtoupper($remark);
        $qt->status = 'ACTIVE';
        $result['status'] = $qt->save() ? 'success' : 'failure';
        
        if($_FILES['upload_demandletter']['size'] > 0){
            Helpers::fileUploadPdf($_FILES['upload_demandletter'],'uploads/demandletters/',$qt->guid);
        }
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxDemandLetterView($id)
    {
        $this->layout = false;
        $result = array();
        
        $quota = Quota::model()->findByPk($id);
        $result['id'] = $quota->id;
        $result['required'] = $quota->required;
        $result['remark'] = $quota->remark;
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxDemandLetterUpdate()
    {
        $this->layout = false;
        $quotaid = strtoupper(Yii::app()->request->getPost('demandletterid'));
        $remark = Yii::app()->request->getPost('fw_remark');
        $result = array();
        
        $quota = Quota::model()->findByPk($quotaid);
        $quota->required = Yii::app()->request->getPost('fw_required');
        $quota->remark = empty($remark) ? NULL : strtoupper($remark);
        $result['status'] = $quota->save() ? 'success' : 'failure';
        $result['id'] = $quota->employer_id;
        
        if($_FILES['upload_demandletter']['size'] > 0){
            Helpers::fileUploadPdf($_FILES['upload_demandletter'],'uploads/demandletters/',$quota->guid);
        }
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxDemandLetterDelete($id)
    {
        $this->layout = false;
        $result = array();
        
        $quota = Quota::model()->findByPk($id);
        $quota->disable = 'INACTIVE';
        $result['status'] = $quota->save() ? 'success' : 'failure';
        $result['id'] = $quota->employer_id;
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxImageCrop($id)
    {
        $this->layout = false;
        $transaction = Transaction::model()->findByPk($id);
        $result = array();
        
        $image = Yii::app()->request->getPost('image');
        $doc = Yii::app()->request->getPost('doc');
        
        if($doc == 'photo'){
            $targetdir = 'uploads/photos';
        } else if($doc == 'passport'){
            $targetdir = 'uploads/passports';
        }
        
        $upload = Helpers::base64FileUpload($image,$targetdir,$transaction->guid);
        $result['status'] = $upload == true ? 'success' : 'failure';
        $result['id'] = $transaction->id;
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxAgentRegister()
    {
        $this->layout = false;
        //$user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $result = array();
        
        $agentcontact2 = strtoupper(Yii::app()->request->getPost('agent_contact2'));
        $picmobile2 = strtoupper(Yii::app()->request->getPost('pic_mobile2'));
        
        $c = new Company;
        $c->code = html_entity_decode(Sequence::model()->sequence_item(2));
        $c->guid = Helpers::getGUID();
        $c->name = strtoupper(Yii::app()->request->getPost('agent_name'));
        $c->register_number = strtoupper(Yii::app()->request->getPost('agent_regno'));
        $c->address = strtoupper(Yii::app()->request->getPost('agent_address'));
        $c->postcode = strtoupper(Yii::app()->request->getPost('agent_zipcode'));
        $c->country_id = Yii::app()->request->getPost('agent_country');
        $c->contact_number1 = strtoupper(Yii::app()->request->getPost('agent_contact1'));
        $c->contact_number2 = empty($agentcontact2) ? NULL : strtoupper($agentcontact2);
        $c->email = Yii::app()->request->getPost('agent_email');
        $c->person_incharge = strtoupper(Yii::app()->request->getPost('pic_fullname'));
        $c->mobile_number1 = strtoupper(Yii::app()->request->getPost('pic_mobile1'));
        $c->mobile_number2 = empty($picmobile2) ? NULL : strtoupper($picmobile2);
        $c->person_email = Yii::app()->request->getPost('pic_email');
        $c->remark = strtoupper(Yii::app()->request->getPost('agent_username'));
        $result['status'] = $c->save() ? 'success' : 'failure';
        
        $p = new Profile;
        $p->code = html_entity_decode(Sequence::model()->sequence_item(4));
        $p->guid = Helpers::getGUID();
        $p->company_id = $c->id;
        $p->type = 'SOURCE AGENT';
        $p->fullname = strtoupper(Yii::app()->request->getPost('pic_fullname'));
        $p->initial = strtoupper(Yii::app()->request->getPost('agent_username'));
        $p->contact_number1 = strtoupper(Yii::app()->request->getPost('agent_contact1'));
        $p->contact_number2 = empty($agentcontact2) ? NULL : strtoupper($agentcontact2);
        $p->mobile_number1 = strtoupper(Yii::app()->request->getPost('pic_mobile1'));
        $p->mobile_number2 = empty($picmobile2) ? NULL : strtoupper($picmobile2);
        $p->email = Yii::app()->request->getPost('pic_email');
        $p->remark = 'SOURCE AGENT';
        $result['status'] = $p->save() ? 'success' : 'failure';

        $u = new User;
        $u->guid = Helpers::getGUID();
        $u->username = strtoupper(Yii::app()->request->getPost('agent_username'));
        $u->password = 'e10adc3949ba59abbe56e057f20f883e'; /* 123456 */
        $u->profile_id = $p->id;
        $u->role_id = '3';
        $u->status_id = '1';
        $result['status'] = $u->save() ? 'success' : 'failure';
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxAgentUpdate($id)
    {
        $this->layout = false;
        //$user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $result = array();
        
        $agentid = strtoupper(Yii::app()->request->getPost('agentid'));
        $agentcontact2 = strtoupper(Yii::app()->request->getPost('agent_contact2'));
        $picmobile2 = strtoupper(Yii::app()->request->getPost('pic_mobile2'));
        
        $p = Profile::model()->findByPk($agentid);
        $p->fullname = strtoupper(Yii::app()->request->getPost('pic_fullname'));
        $p->contact_number1 = strtoupper(Yii::app()->request->getPost('agent_contact1'));
        $p->contact_number2 = empty($agentcontact2) ? NULL : strtoupper($agentcontact2);
        $p->mobile_number1 = strtoupper(Yii::app()->request->getPost('pic_mobile1'));
        $p->mobile_number2 = empty($picmobile2) ? NULL : strtoupper($picmobile2);
        $p->email = Yii::app()->request->getPost('pic_email');
        $result['status'] = $p->save() ? 'success' : 'failure';
        
        $c = Company::model()->findByPk($p->company_id);
        $c->name = strtoupper(Yii::app()->request->getPost('agent_name'));
        $c->register_number = strtoupper(Yii::app()->request->getPost('agent_regno'));
        $c->address = strtoupper(Yii::app()->request->getPost('agent_address'));
        $c->postcode = strtoupper(Yii::app()->request->getPost('agent_zipcode'));
        $c->country_id = Yii::app()->request->getPost('agent_country');
        $c->contact_number1 = strtoupper(Yii::app()->request->getPost('agent_contact1'));
        $c->contact_number2 = empty($agentcontact2) ? NULL : strtoupper($agentcontact2);
        $c->email = Yii::app()->request->getPost('agent_email');
        $c->person_incharge = strtoupper(Yii::app()->request->getPost('pic_fullname'));
        $c->mobile_number1 = strtoupper(Yii::app()->request->getPost('pic_mobile1'));
        $c->mobile_number2 = empty($picmobile2) ? NULL : strtoupper($picmobile2);
        $c->person_email = Yii::app()->request->getPost('pic_email');
        $result['status'] = $c->save() ? 'success' : 'failure';
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }        
    
    public function actionAjaxUsernameCheck()
    {
        $this->layout = false;
        //$user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $result = array();
        
        $username = strtoupper(Yii::app()->request->getPost('username'));
        
        $user = User::model()->findAllByAttributes(array(
            'username' => $username
        ));
        
        if(count($user) > 0){
            $result['status'] = 'failure';
        } else {
            $result['status'] = 'success';
        }
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }

	public function actionAjaxCovid19Upload()
    {
        $this->layout = false;
        $result = array();
        
        $id = Yii::app()->request->getPost('transaction_id');
        $trans = Transaction::model()->findByPk($id);
        
        if($_FILES['upload_covid19']['size'] > 0){
            Helpers::fileUploadPdf($_FILES['upload_covid19'],'uploads/covid19/',$trans->guid);
            $result['status'] = 'success';
        } else {
            $result['status'] = 'failure';
        }
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }	
}