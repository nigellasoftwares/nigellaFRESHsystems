<?php

class HighcommController extends Controller
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
                    'Application','ApplicationBatch','ApplicationApplicantView',
                    'ApplicationApplicant2','ScanQR','AjaxQRCheck',
                    'AjaxApplicantVerifyReturn','AjaxOSCReturn',
                    'AjaxApplicantResultView','AjaxApplicantResult',
                    'ApplicationReport','AjaxApplicantView',
                    'AjaxBarchartDaily','AjaxBarchartMonthly',
                    'Report','Statistic'
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
        $batch1 = Batch::model()->statBatchByOsc('today');
        $batch2 = Batch::model()->statBatchByOsc();
        
        $application1 = Applicant::model()->statApplicantByOsc('today');
        $application2 = Applicant::model()->statApplicantByOsc();
        
        $payment1 = Payment::model()->statPaymentByOsc('today');
        $payment2 = Payment::model()->statPaymentByOsc();
        
        $ptrack1 = Passportscan::model()->statTrackingByOsc('today');
        $ptrack2 = Passportscan::model()->statTrackingByOsc();
        
        $stat = array(
            'today' => array(
                'batch' => count($batch1),
                'application' => $application1['application'],
                'vdr' => $application1['vdr'],
                'vtr' => $application1['vtr'],
                'male' => $application1['male'],
                'female' => $application1['female'],
                'approve' => $application1['approve'],
                'reject' => $application1['reject'],
                'vln' => $payment1['pay_vln'],
                'osc' => $payment1['pay_osc'],
                'fee' => $payment1['pay_all'],
                'track' => $ptrack1
            ),
            'all' => array(
                'batch' => count($batch2),
                'application' => $application2['application'],
                'vdr' => $application2['vdr'],
                'vtr' => $application2['vtr'],
                'male' => $application2['male'],
                'female' => $application2['female'],
                'approve' => $application2['approve'],
                'reject' => $application2['reject'],
                'vln' => $payment2['pay_vln'],
                'osc' => $payment2['pay_osc'],
                'fee' => $payment2['pay_all'],
                'track' => $ptrack2
            )
        );
        
        $this->render('dashboard', array(
            'stat' => $stat
        ));
    }
    
    public function actionAjaxBarchartDaily()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $day = range(1,date('t'));
        $days = array();
        foreach($day as $d1){
            $days[] = str_pad($d1, '2', '0', STR_PAD_LEFT);
        }
        
        $visa = array();
        foreach($days as $d2){
            $a = Applicant::model()->findAll(array(
                'condition' => 'DATE(created_at) = :date',
                'params' => array(':date' => date('Y-m-').$d2)
            ));
            
            $visa[] = count($a);
        }    
                
        $result = array(
            'title' => 'Visa Application',
            'days' => $days,
            'visas' => $visa
        );
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxBarchartMonthly()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $month = range(1,12);
        $months = array();
        foreach($month as $m1){
            $months[] = str_pad($m1, '2', '0', STR_PAD_LEFT);
        }
        $monthnames = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
        
        $visa = array();
        foreach($months as $m2){
            $d = date('t', strtotime(date('Y-').$m2.'-01'));
            $a = Applicant::model()->findAll(array(
                'condition' => 'DATE(created_at) BETWEEN :date1 AND :date2',
                'params' => array(
                    ':date1' => date('Y-').$m2.'-01',
                    ':date2' => date('Y-').$m2.'-'.$d,
                )
            ));
            
            $visa[] = count($a);
        }    
                
        $result = array(
            'title' => 'Visa Application',
            'months' => $monthnames,
            'visas' => $visa
        );
        
//        echo '<pre>';
//        print_r($result);
//        echo '</pre>';
//        die();
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionApplication()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $batch = Batch::model()->findAll(array('order' => 'id ASC'));
        
        $this->render('application', array(
            'branch' => $user->branch_id,
            'admin' => $user->admin_id,
            'batch' => $batch
        ));
    }
    
    public function actionApplicationBatch($id)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $batch = Batch::model()->findByPk($id);
        $applicant = Applicant::model()->findAllByAttributes(array(
            'batch_id' => $batch->id
        ), array('order' => 'id ASC'));
        
        $this->render('batch', array(
            'batch' => $batch,
            'branch' => $user->branch_id,
            'admin' => $user->admin_id,
            'applicant' => $applicant
        ));
    }
    
    public function actionApplicationApplicantView($id)
    {
        $applicant = Applicant::model()->findByPk($id);
        $gender = Gender::model()->findAll(array('order' => 'order_number ASC'));
        $educationtype = Educationtype::model()->findAll(array('order' => 'order_number ASC'));
        $purposevisit = Purposevisit::model()->findAll(array('order' => 'order_number ASC'));
        
        $occupation = Occupation::model()->findAllByAttributes(array(
            'applicant_id' => $id
        ), array('order' => 'id ASC'));
        
        $family = Family::model()->findAllByAttributes(array(
            'applicant_id' => $id
        ), array('order' => 'id ASC'));
        
        $emergency = Emergency::model()->findAllByAttributes(array(
            'applicant_id' => $id
        ), array('order' => 'id ASC'));
        
        $passportscan = Passportscan::model()->findAllByAttributes(array(
            'applicant_id' => $id
        ), array('order' => 'id ASC'));
        
        $result = Result::model()->findAllByAttributes(array(
            'id' => array(10,11)
        ), array('order' => 'id ASC'));
        
        $this->render('view', array(
            'applicant' => $applicant,
            'gender' => $gender,
            'educationtype' => $educationtype,
            'occupation' => $occupation,
            'family' => $family,
            'emergency' => $emergency,
            'purposevisit' => $purposevisit,
            'passportscan' => $passportscan,
            'result' => $result
        ));
    }
    
    public function actionApplicationApplicant2($id)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $applicant = Applicant::model()->findByPk($id);
        
        $occupation = Occupation::model()->findAllByAttributes(array(
            'applicant_id' => $applicant->id
        ), array('order' => 'id ASC'));
        
        $marital = Marital::model()->findAll(array('order' => 'order_number ASC'));
        
        $family = Family::model()->findAllByAttributes(array(
            'applicant_id' => $applicant->id
        ), array('order' => 'id ASC'));
        
        $emergency = Emergency::model()->findAllByAttributes(array(
            'applicant_id' => $applicant->id
        ), array('order' => 'id ASC'));
        
        $educationtype = Educationtype::model()->findAll(array('order' => 'order_number ASC'));
        $purposevisit = Purposevisit::model()->findAll(array('order' => 'order_number ASC'));
        $occupationtype = Occupationtype::model()->findAll(array('order' => 'order_number ASC'));
        $nationality = Nationality::model()->findAll(array('order' => 'order_number ASC'));
        $relationship = Relationship::model()->findAll(array('order' => 'order_number ASC'));
        
        $this->render('applicant2', array(
            'user' => $user,
            'applicant' => $applicant,
            'occupation' => $occupation,
            'marital' => $marital,
            'family' => $family,
            'emergency' => $emergency,
            'educationtype' => $educationtype,
            'purposevisit' => $purposevisit,
            'occupationtype' => $occupationtype,
            'nationality' => $nationality,
            'relationship' => $relationship
        ));
    }
    
    public function actionScanQR()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $this->render('scanqr', array(
           'user' => $user 
        ));
    }
    
    public function actionAjaxQRCheck()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $guid = Yii::app()->request->getPost('qrcode');
        $result = array();
        
        $a = Applicant::model()->findByAttributes(array('guid' => $guid));
        
        if($a == NULL){
            $result['status'] = 'failure';
        } else {
            $result['status'] = 'success';
            $result['applicant_id'] = $a->id;
            $result['batch_id'] = $a->batch_id;
            $result['guid'] = $a->guid;
            $result['fullname'] = $a->full_name;
            $result['gender'] = $a->gender->name;
            $result['dateofbirth'] = date('d M Y', strtotime($a->birth_date));
            $result['placeofbirth'] = $a->birth_place;
            $result['passport_number'] = $a->passport_number;
            $result['nationality'] = $a->currentNationality->country;
            $result['dateofissue'] = date('d M Y', strtotime($a->passport_issue_date));
            $result['placeofissue'] = $a->passport_issue_place;
            $result['dateofexpiry'] = date('d M Y', strtotime($a->passport_expiry_date));
            $result['result_id'] = $a->result_id;
            $result['photo'] = Helpers::fileDisplay('uploads/photos/',$a->guid,'Applicant');
        }
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxApplicantVerifyReturn()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $applicantid = Yii::app()->request->getPost('applicant_id');
        $result = array();
        
        $ap = Applicant::model()->findByPk($applicantid);
        
        if($ap->result_id == 8){
            $ap->result_id = 9;
            $ap->save();

            $ps = new Passportscan;
            $ps->applicant_id = $ap->id;
            $ps->batch_id = $ap->batch_id;
            $ps->passport_number = $ap->passport_number;
            $ps->user_id = $user->id;
            $ps->branch_id = $user->branch_id;
            $ps->admin_id = $user->admin_id;
            $ps->status_id = $ap->result_id;
            $ps->scanned_date = date('Y-m-d');
            $ps->result_id = $ap->result2_id;
            $ps->created_at = date('Y-m-d H:i:s');
            $ps->created_by = $user->id;
            $result['status'] = $ps->save() ? 'success' : 'failure';
        } else if($ap->result_id < 8){
            $result['status'] = 'before';
        } else if($ap->result_id > 8){
            $result['status'] = 'after';
        }
        
        $result['id'] = $ap->batch_id;
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxOSCReturn()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $batchid = Yii::app()->request->getPost('batch_id');
        $applicant = Yii::app()->request->getPost('applicant');
        $result = array();
        
        if($applicant){
            foreach($applicant as $a){
                $ap = Applicant::model()->findByPk($a);
                $ap->result_id = 13;
                $ap->save();
                
                $ps = new Passportscan;
                $ps->applicant_id = $ap->id;
                $ps->batch_id = $ap->batch_id;
                $ps->passport_number = $ap->passport_number;
                $ps->user_id = $user->id;
                $ps->branch_id = $user->branch_id;
                $ps->admin_id = $user->admin_id;
                $ps->status_id = $ap->result_id;
                $ps->scanned_date = date('Y-m-d');
                $ps->result_id = $ap->result2_id;
                $ps->created_at = date('Y-m-d H:i:s');
                $ps->created_by = $user->id;
                $result['status'] = $ps->save() ? 'success' : 'failure';
            }
        }
        
        $result['id'] = $batchid;
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxApplicantResultView($id)
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $result = array();
        
        $a = Applicant::model()->findByPk($id);
        $result['id'] = $a->result2_id;
        $result['result'] = $a->result2_id;
        $result['remarks'] = strtoupper($a->remark);
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxApplicantResult()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $applicantid = Yii::app()->request->getPost('applicant_id');
        $remark = Yii::app()->request->getPost('remark');
        $result = array();
        
        $a = Applicant::model()->findByPk($applicantid);
        $a->result2_id = Yii::app()->request->getPost('result');
        $a->result2_date = date('Y-m-d');
        $a->remark = strtoupper($remark);
        $a->updated_at = date('Y-m-d H:i:s');
        $a->updated_by = $user->id;
        $result['status'] = $a->save() ? 'success' : 'failure';
        
        $p = new Passportscan;
        $p->applicant_id = $a->id;
        $p->batch_id = $a->batch_id;
        $p->passport_number = $a->passport_number;
        $p->user_id = $user->id;
        $p->branch_id = $user->branch_id;
        $p->admin_id = $user->admin_id;
        $p->status_id = $a->result2_id;
        $p->scanned_date = date('Y-m-d');
        $p->result_id = $a->result2_id;
        $p->created_at = date('Y-m-d H:i:s');
        $p->created_by = $user->id;
        $result['status'] = $p->save() ? 'success' : 'failure';
        
        $result['id'] = $applicantid;
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionApplicationReport($id,$rid = 1,$tid = '')
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $batch = Batch::model()->findByPk($id);
        
        if($rid == 1){
            $applicant = Applicant::model()->findAllByAttributes(array(
                'batch_id' => $batch->id
            ), array('order' => 'id ASC'));
        } else {
            $checkstatus = array();
            $passportscan = Passportscan::model()->findAllByAttributes(array(
                'batch_id' => $batch->id
            ));
            
            foreach($passportscan as $ps){
                $checkstatus[$ps->applicant_id][] = $ps->status_id;
            }
            
            $appl = array();
            foreach($checkstatus as $k => $v){
                if(empty($tid)){
                    if(in_array($rid, $v)){
                        $appl[] = $k;
                    }
                } else {
                    if(!in_array($rid, $v)){
                        $appl[] = $k;
                    }
                }
            }
            
            $applicant = Applicant::model()->findAllByAttributes(array(
                'id' => $appl,
                'batch_id' => $batch->id
            ), array('order' => 'id ASC'));
        }
        
        $labelstatus = Helpers::bg_dashstat($rid,$tid);
        $statustrack = Helpers::stat_dashboard($batch->id);
        
        $this->render('report', array(
            'batch' => $batch,
            'applicant' => $applicant,
            'statustrack' => $statustrack,
            'labelstatus' => $labelstatus
        ));
    }
    
    public function actionAjaxApplicantView($id)
    {
        $this->layout = false;
        $a = Applicant::model()->findByPk($id);
        
        $edu = array();
        $education = Education::model()->findAllByAttributes(array(
            'applicant_id' => $a->id
        ));
        foreach($education as $e){
            $edu[] = $e->educationtype->name;
        }
        
        $result = array(
            'photo' => Helpers::fileDisplay2('uploads/photos/',$a->guid,'Applicant').'<img src="http://localhost/phpqrcode/php/qr.php?d='.$a->guid.'&e=Q&t=J&size=150" class="image-qrcode" />',
            'guid' => $a->guid,
            'fullname' => strtoupper($a->full_name),
            'firstname' => strtoupper($a->first_name),
            'middlename' => strtoupper($a->middle_name),
            'lastname' => strtoupper($a->last_name),
            'gender' => $a->gender->name,
            'dateofbirth' => empty($a->birth_date) ? NULL : date('d M Y', strtotime($a->birth_date)),
            'placeofbirth' => strtoupper($a->birth_place),
            'current_nationality' => $a->currentNationality->name,
            'citizen_number' => strtoupper($a->national_number),
            'former_nationality' => empty($a->former_nationality_id) ? NULL : $a->formerNationality->name,
            'passport_type' => $a->passport->name,
            'passport_other' => empty($a->passport_other) ? NULL : strtoupper($a->passport_type),
            'passport_number' => strtoupper($a->passport_number),
            'passport_dateofissue' => empty($a->passport_issue_date) ? NULL : date('d M Y', strtotime($a->passport_issue_date)),
            'passport_placeofissue' => strtoupper($a->passport_issue_place),
            'passport_dateofexpiry' => empty($a->passport_expiry_date) ? NULL : date('d M Y', strtotime($a->passport_expiry_date)),
            
            'education' => implode(' | ',$edu),
            'education_other' => empty($a->education_other) ? NULL : strtoupper($a->education_other),
            'email' => $a->email,
            'employer_name' => strtoupper($a->employer_name),
            'employer_address' => strtoupper($a->employer_address),
            'employer_zipcode' => strtoupper($a->employer_zipcode),
            'employer_phone' => $a->employer_phone,
            'home_address' => strtoupper($a->home_address),
            'home_zipcode' => strtoupper($a->home_zipcode),
            'home_phone' => $a->home_phone,
            'home_mobile' => $a->home_mobile,
            'marital_status' => $a->marital->name,
            'marital_other' => empty($a->marital_other) ? NULL : strtoupper($a->marital_other),
            'location_visa_apply' => strtoupper($a->location_visa_apply)
        );
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionReport()
    {
        $sd = Yii::app()->request->getPost('startdate');
        $ed = Yii::app()->request->getPost('enddate');
        
        if(!empty($sd) && !empty($ed)){
            $startdate = date('Y-m-d', strtotime($sd));
            $enddate = date('Y-m-d', strtotime($ed));
            $type = 'on';
            
            $batch = Batch::model()->reportBatchByOsc($startdate,$enddate);
            $application = Applicant::model()->reportApplicantByOsc($startdate,$enddate);
            $ptrack = Passportscan::model()->reportTrackingByOsc($startdate,$enddate);
        } else {
            $type = 'off';
            $batch = Batch::model()->statBatchByOsc();
            $application = Applicant::model()->statApplicantByOsc();
            $ptrack = Passportscan::model()->statTrackingByOsc();
        }
        
        $report = array(
            'type' => $type,
            'startdate' => date('d M Y', strtotime($startdate)),
            'enddate' => date('d M Y', strtotime($enddate)),
            
            'batch' => $batch,
            'application' => $application['application'],
            'vdr' => $application['vdr'],
            'vtr' => $application['vtr'],
            'approve' => $application['approve'],
            'reject' => $application['reject'],
            'track' => $ptrack
        );
        
        $this->render('report2', array(
            'report' => $report
        ));
    }
    
    public function actionStatistic()
    {
        $batch1 = Batch::model()->statBatchByOsc('today');
        $batch2 = Batch::model()->statBatchByOsc();
        
        $application1 = Applicant::model()->statApplicantByOsc('today');
        $application2 = Applicant::model()->statApplicantByOsc();
        
        $ptrack1 = Passportscan::model()->statTrackingByOsc('today');
        $ptrack2 = Passportscan::model()->statTrackingByOsc();
        
        $stat = array(
            'today' => array(
                'batch' => count($batch1),
                'application' => $application1['application'],
                'vdr' => $application1['vdr'],
                'vtr' => $application1['vtr'],
                'track' => $ptrack1
            ),
            'all' => array(
                'batch' => count($batch2),
                'application' => $application2['application'],
                'vdr' => $application2['vdr'],
                'vtr' => $application2['vtr'],
                'track' => $ptrack2
            )
        );
        
        $this->render('statistic', array(
            'stat' => $stat
        ));
    }
}