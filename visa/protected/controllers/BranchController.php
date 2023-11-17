<?php

class BranchController extends Controller
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
                    'Application','AjaxBatchRegister',
                    'ApplicationBatch','ApplicationApplicant','ApplicationApplicantView',
                    'AjaxApplicantRegister','ApplicationApplicant2',
                    'AjaxPersonalUpdate','AjaxPersonal2Update','AjaxOccupationRegister','AjaxFamilyRegister',
                    'AjaxEmergencyRegister','AjaxTravelUpdate','AjaxOtherUpdate','AjaxDeclareUpdate',
                    'ScanQR','AjaxQRCheck','AjaxApplicantVerifyReturn','AjaxAdminDeliver',
                    'PrintSlip','PrintReceipt','ApplicationReport','AjaxApplicantView',
                    'AjaxBarchartDaily','AjaxBarchartMonthly','Report','Statistic'
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
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $batch1 = Batch::model()->statBatchByBranch($user->branch_id,$user->admin_id,'today');
        $batch2 = Batch::model()->statBatchByBranch($user->branch_id,$user->admin_id);
        
        $application1 = Applicant::model()->statApplicantByBranch($user->branch_id,$user->admin_id,'today');
        $application2 = Applicant::model()->statApplicantByBranch($user->branch_id,$user->admin_id);
        
        $payment1 = Payment::model()->statPaymentByBranch($user->branch_id,$user->admin_id,'today');
        $payment2 = Payment::model()->statPaymentByBranch($user->branch_id,$user->admin_id);
        
        $ptrack1 = Passportscan::model()->statTrackingByBranch($user->branch_id,$user->admin_id,'today');
        $ptrack2 = Passportscan::model()->statTrackingByBranch($user->branch_id,$user->admin_id);
        
        $stat = array(
            'today' => array(
                'batch' => count($batch1),
                'application' => $application1['application'],
                'vdr' => $application1['vdr'],
                'vtr' => $application1['vtr'],
                'male' => $application1['male'],
                'female' => $application1['female'],
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
            $a = Applicant::model()->findAllByAttributes(array(
                'branch_id' => $user->branch_id,
                'admin_id' => $user->admin_id,
            ), array(
                'condition' => 'DATE(created_at) = :date',
                'params' => array(':date' => date('Y-m-').$d2)
            ));
            
            $visa[] = count($a);
        }    
                
        $result = array(
            'branch' => $user->profile->company->name,
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
            $a = Applicant::model()->findAllByAttributes(array(
                'branch_id' => $user->branch_id,
                'admin_id' => $user->admin_id,
            ), array(
                'condition' => 'DATE(created_at) BETWEEN :date1 AND :date2',
                'params' => array(
                    ':date1' => date('Y-').$m2.'-01',
                    ':date2' => date('Y-').$m2.'-'.$d,
                )
            ));
            
            $visa[] = count($a);
        }    
                
        $result = array(
            'branch' => $user->profile->company->name,
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
        $batch = Batch::model()->findAllByAttributes(array(
            'branch_id' => $user->branch_id,
            'admin_id' => $user->admin_id
        ), array('order' => 'id ASC'));
        
        $this->render('application', array(
            'branch' => $user->branch_id,
            'admin' => $user->admin_id,
            'batch' => $batch
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
        
        $this->render('view', array(
            'applicant' => $applicant,
            'gender' => $gender,
            'educationtype' => $educationtype,
            'occupation' => $occupation,
            'family' => $family,
            'emergency' => $emergency,
            'purposevisit' => $purposevisit,
            'passportscan' => $passportscan
        ));
    }
    
    public function actionPrintReceipt($id)
    {
        $batch = Batch::model()->findByPk($id);
        $applicant = Applicant::model()->findAllByAttributes(array(
            'batch_id' => $id
        ), array('order' => 'id ASC'));
        $applicantvdr = Applicant::model()->findAllByAttributes(array(
            'batch_id' => $id,
            'visa_id' => 1
        ), array('order' => 'id ASC'));
        $applicantvtr = Applicant::model()->findAllByAttributes(array(
            'batch_id' => $id,
            'visa_id' => 2
        ), array('order' => 'id ASC'));
        $payment = Payment::model()->findAllByAttributes(array(
           'batch_id' => $id 
        ));
        
        $pdf = Yii::app()->ePdf->mpdf('utf-8','A4','','','10','10','23','26');
        $pdf->SetFont('helvetica', '', 11);
        $pdf->showImageErrors = true;
        $pdf->shrink_tables_to_fit = 1;
        $pdf->SetHTMLHeader($this->renderPartial('print/header',array(
            'batch' => $batch
        ),TRUE));
        $pdf->SetHTMLFooter($this->renderPartial('print/footer','',TRUE));
        
        $pdf->WriteHTML($this->renderPartial('print/receipt',array(
            'batch' => $batch,
            'applicant' => $applicant,
            'applicantvdr' => $applicantvdr,
            'applicantvtr' => $applicantvtr,
            'payment' => $payment
        ), true));
        
        $filename = 'receipt-slip-'.$batch->id.'.pdf';
        $pdf->Output($filename,'I');
    }
    
    public function actionPrintSlip($id)
    {
        $applicant = Applicant::model()->findByPk($id);
        
        //$pdf = Yii::app()->ePdf->mpdf('utf-8','A4','','','10','10','73.5','26');
        $pdf = Yii::app()->ePdf->mpdf('utf-8','A4','','','2','4','2','2');
        $pdf->SetFont('helvetica', '', 11);
        $pdf->showImageErrors = true;
        $pdf->shrink_tables_to_fit = 1;
        //$pdf->SetHTMLHeader($this->renderPartial('print/header','',TRUE));
        //$pdf->SetHTMLFooter($this->renderPartial('print/footer','',TRUE));
        
        $pdf->WriteHTML($this->renderPartial('print/slip',array(
            'applicant' => $applicant
        ), true));
        
        $filename = 'registration-slip-'.$applicant->id.'.pdf';
        $pdf->Output($filename,'I');
    }
    
    public function actionAjaxBatchRegister()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $result = array();
        
        $b = new Batch;
        $b->batch_guid = Helpers::getGUID();
        $b->branch_id = Yii::app()->request->getPost('branch');
        $b->admin_id = Yii::app()->request->getPost('admin');
        $b->created_at = date('Y-m-d H:i:s');
        $b->created_by = $user->id;
        $result['status'] = $b->save() ? 'success' : 'failure';
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionApplicationBatch($id)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $batch = Batch::model()->findByPk($id);
        $applicant = Applicant::model()->findAllByAttributes(array(
            'batch_id' => $batch->id,
            'branch_id' => $user->branch_id,
            'admin_id' => $user->admin_id
        ), array('order' => 'id ASC'));
        
        $this->render('batch', array(
            'batch' => $batch,
            'branch' => $user->branch_id,
            'admin' => $user->admin_id,
            'applicant' => $applicant
        ));
    }
    
    public function actionApplicationApplicant($id)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $batch = Batch::model()->findByPk($id);
        
        $gender = Gender::model()->findAll(array('order' => 'order_number ASC'));
        $cnationality = Nationality::model()->findAll(array('order' => 'order_number ASC'));
        $fnationality = Nationality::model()->findAll(array('order' => 'order_number ASC'));
        $passport = Passport::model()->findAll(array('order' => 'order_number ASC'));
        
        $this->render('applicant', array(
            'user' => $user,
            'batch' => $batch,
            'gender' => $gender,
            'cnationality' => $cnationality,
            'fnationality' => $fnationality,
            'passport' => $passport
        ));
    }
    
    public function actionAjaxApplicantRegister()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $vln = Fee::model()->findByPk(1);
        $osc = Fee::model()->findByPk(2);
        $result = array();
        
        $applicant_guid = Helpers::getGUID();
        $gender = Yii::app()->request->getPost('gender');
        $dateofbirth = Yii::app()->request->getPost('dateofbirth');
        $fnationality = Yii::app()->request->getPost('former_nationality');
        $passportother = Yii::app()->request->getPost('passport_other');
        $dateofissue = Yii::app()->request->getPost('passport_dateofissue');
        $dateofexpiry = Yii::app()->request->getPost('passport_dateofexpiry');
        
        $a = new Applicant;
        $a->guid = $applicant_guid;
        $a->batch_id = Yii::app()->request->getPost('batch_id');
        $a->branch_id = $user->branch_id;
        $a->admin_id = $user->admin_id;
        $a->full_name = strtoupper(Yii::app()->request->getPost('fullname'));
        $a->first_name = strtoupper(Yii::app()->request->getPost('firstname'));
        $a->middle_name = strtoupper(Yii::app()->request->getPost('middlename'));
        $a->last_name = strtoupper(Yii::app()->request->getPost('lastname'));
        $a->gender_id = empty($gender) ? NULL : $gender;
        $a->birth_date = empty($dateofbirth) ? NULL : date('Y-m-d', strtotime($dateofbirth));
        $a->birth_place = strtoupper(Yii::app()->request->getPost('placeofbirth'));
        $a->current_nationality_id = Yii::app()->request->getPost('current_nationality');
        $a->former_nationality_id = empty($fnationality) ? NULL : $fnationality;
        $a->national_number = strtoupper(Yii::app()->request->getPost('citizen_number'));
        $a->passport_id = Yii::app()->request->getPost('passport_type');
        $a->passport_other = empty($passportother) ? NULL : strtoupper($passportother);
        $a->passport_number = strtoupper(Yii::app()->request->getPost('passport_number'));
        $a->passport_issue_place = strtoupper(Yii::app()->request->getPost('passport_placeofissue'));
        $a->passport_issue_date = empty($dateofissue) ? NULL : date('Y-m-d', strtotime($dateofissue));
        $a->passport_expiry_date = empty($dateofexpiry) ? NULL : date('Y-m-d', strtotime($dateofexpiry));
        $a->result_id = 1;
        $a->result2_id = 1;
        $a->created_at = date('Y-m-d H:i:s');
        $a->created_by = $user->id;
        $result['status'] = $a->save() ? 'success' : 'failure';
        
        $p = new Payment;
        $p->applicant_id = $a->id;
        $p->batch_id = Yii::app()->request->getPost('batch_id');
        $p->branch_id = $user->branch_id;
        $p->admin_id = $user->admin_id;
        $p->vln_fee = $vln->price;
        $p->osc_fee = $osc->price;
        $p->created_at = date('Y-m-d H:i:s');
        $p->created_by = $user->id;
        $result['status'] = $p->save() ? 'success' : 'failure';
        
        $b = Applicant::model()->findByPk($a->id);
        $b->payment_id = $p->id;
        $result['status'] = $b->save() ? 'success' : 'failure';
        
        $ps = new Passportscan;
        $ps->applicant_id = $a->id;
        $ps->batch_id = $a->batch_id;
        $ps->passport_number = $a->passport_number;
        $ps->user_id = $user->id;
        $ps->branch_id = $user->branch_id;
        $ps->admin_id = $user->admin_id;
        $ps->status_id = $a->result_id;
        $ps->scanned_date = date('Y-m-d');
        $ps->result_id = $a->result2_id;
        $ps->created_at = date('Y-m-d H:i:s');
        $ps->created_by = $user->id;
        $result['status'] = $ps->save() ? 'success' : 'failure';
        
        
        if($_FILES['upload_photo']['size'] > 0){
            Helpers::fileUpload($_FILES['upload_photo'],'uploads/photos/',$applicant_guid);
        }
        
        $result['id'] = $a->id;
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionApplicationApplicant2($id)
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $applicant = Applicant::model()->findByPk($id);
        
        $gender = Gender::model()->findAll(array('order' => 'order_number ASC'));
        $cnationality = Nationality::model()->findAll(array('order' => 'order_number ASC'));
        $fnationality = Nationality::model()->findAll(array('order' => 'order_number ASC'));
        $passport = Passport::model()->findAll(array('order' => 'order_number ASC'));
        
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
        
        $sign = Helpers::applicantInformation($applicant->id);
        
        $this->render('applicant2', array(
            'user' => $user,
            'applicant' => $applicant,
            'gender' => $gender,
            'cnationality' => $cnationality,
            'fnationality' => $fnationality,
            'passport' => $passport,
            'occupation' => $occupation,
            'marital' => $marital,
            'family' => $family,
            'emergency' => $emergency,
            'educationtype' => $educationtype,
            'purposevisit' => $purposevisit,
            'occupationtype' => $occupationtype,
            'nationality' => $nationality,
            'relationship' => $relationship,
            'sign' => $sign
        ));
    }
    
    public function actionAjaxPersonalUpdate()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $applicantid = Yii::app()->request->getPost('applicant_id');
        $result = array();
        
        $gender = Yii::app()->request->getPost('gender');
        $dateofbirth = Yii::app()->request->getPost('dateofbirth');
        $fnationality = Yii::app()->request->getPost('former_nationality');
        $passportother = Yii::app()->request->getPost('passport_other');
        $dateofissue = Yii::app()->request->getPost('passport_dateofissue');
        $dateofexpiry = Yii::app()->request->getPost('passport_dateofexpiry');
        
        $a = Applicant::model()->findByPk($applicantid);
        $a->full_name = strtoupper(Yii::app()->request->getPost('fullname'));
        $a->first_name = strtoupper(Yii::app()->request->getPost('firstname'));
        $a->middle_name = strtoupper(Yii::app()->request->getPost('middlename'));
        $a->last_name = strtoupper(Yii::app()->request->getPost('lastname'));
        $a->gender_id = empty($gender) ? NULL : $gender;
        $a->birth_date = empty($dateofbirth) ? NULL : date('Y-m-d', strtotime($dateofbirth));
        $a->birth_place = strtoupper(Yii::app()->request->getPost('placeofbirth'));
        $a->current_nationality_id = Yii::app()->request->getPost('current_nationality');
        $a->former_nationality_id = empty($fnationality) ? NULL : $fnationality;
        $a->national_number = strtoupper(Yii::app()->request->getPost('citizen_number'));
        $a->passport_id = Yii::app()->request->getPost('passport_type');
        $a->passport_other = empty($passportother) ? NULL : strtoupper($passportother);
        $a->passport_number = strtoupper(Yii::app()->request->getPost('passport_number'));
        $a->passport_issue_place = strtoupper(Yii::app()->request->getPost('passport_placeofissue'));
        $a->passport_issue_date = empty($dateofissue) ? NULL : date('Y-m-d', strtotime($dateofissue));
        $a->passport_expiry_date = empty($dateofexpiry) ? NULL : date('Y-m-d', strtotime($dateofexpiry));
        $a->updated_at = date('Y-m-d H:i:s');
        $a->updated_by = $user->id;
        $result['status'] = $a->save() ? 'success' : 'failure';
        
        $passportscan = Passportscan::model()->findAllByAttributes(array(
            'applicant_id' => $applicantid
        ), array('order' => 'id ASC'));
        
        if($passportscan){
            foreach($passportscan as $p){
                $ps = Passportscan::model()->findByPk($p->id);
                $ps->passport_number = $a->passport_number;
                $ps->updated_at = date('Y-m-d H:i:s');
                $ps->updated_by = $user->id;
                $result['status'] = $ps->save() ? 'success' : 'failure';
            }
        }
        
        if($_FILES['upload_photo']['size'] > 0){
            Helpers::fileUpload($_FILES['upload_photo'],'uploads/photos/',$a->guid);
        }
        
        $result['id'] = $a->id;
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxPersonal2Update()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $applicantid = Yii::app()->request->getPost('applicant_id');
        $result = array();
        
        $education_other = Yii::app()->request->getPost('education_other');
        $marital_other = Yii::app()->request->getPost('marital_other');
        $educationtype = Yii::app()->request->getPost('educationtype');
        
        $a = Applicant::model()->findByPk($applicantid);
        $a->education_other = empty($education_other) ? NULL : strtoupper($education_other);
        $a->employer_name = strtoupper(Yii::app()->request->getPost('employer_name'));
        $a->employer_phone = Yii::app()->request->getPost('employer_phone');
        $a->employer_address = strtoupper(Yii::app()->request->getPost('employer_address'));
        $a->employer_zipcode = Yii::app()->request->getPost('employer_zipcode');
        $a->home_address = strtoupper(Yii::app()->request->getPost('home_address'));
        $a->home_zipcode = Yii::app()->request->getPost('home_zipcode');
        $a->home_phone = Yii::app()->request->getPost('home_phone');
        $a->home_mobile = Yii::app()->request->getPost('home_mobile');
        $a->email = Yii::app()->request->getPost('email');
        $a->marital_id = Yii::app()->request->getPost('marital_status');
        $a->marital_other = empty($marital_other) ? NULL : strtoupper($marital_other);
        $a->location_visa_apply = strtoupper(Yii::app()->request->getPost('location_visa_apply'));
        $a->updated_at = date('Y-m-d H:i:s');
        $a->updated_by = $user->id;
        $result['status'] = $a->save() ? 'success' : 'failure';
        
        $result['id'] = $a->id;
        
        $e1 = Education::model()->findAllByAttributes(array('applicant_id' => $a->id));
        if(count($e1) > 0){
            foreach($educationtype as $e){
                $e2 = Education::model()->findByAttributes(array(
                    'applicant_id' => $a->id,
                    'educationtype_id' => $e
                ));
                if(e2 == NULL){
                    $e4 = new Education;
                    $e4->applicant_id = $a->id;
                    $e4->educationtype_id = $e;
                    $e4->created_at = date('Y-m-d H:i:s');
                    $e4->created_by = $user->id;
                    $e4->save();
                }
            }
        } else {
            foreach($educationtype as $e){
                $e3 = new Education;
                $e3->applicant_id = $a->id;
                $e3->educationtype_id = $e;
                $e3->created_at = date('Y-m-d H:i:s');
                $e3->created_by = $user->id;
                $e3->save();
            }
        }
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxTravelUpdate()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $applicantid = Yii::app()->request->getPost('applicant_id');
        $result = array();
        
        $purposevisit = Yii::app()->request->getPost('purposevisit');
        $pv = Purposevisit::model()->findByPk($purposevisit);
        $purposevisit_other = Yii::app()->request->getPost('purposevisit_other');
        
        $a = Applicant::model()->findByPk($applicantid);
        $a->purposevisit_id = $purposevisit;
        $a->purposevisit_other = empty($purposevisit_other) ? NULL : strtoupper($purposevisit_other);
        $a->visa_id = $pv->visa_id;
        $a->updated_at = date('Y-m-d H:i:s');
        $a->updated_by = $user->id;
        $result['status'] = $a->save() ? 'success' : 'failure';
        
        $p = Payment::model()->findByAttributes(array('applicant_id' => $applicantid));
        $p->visa_id = $pv->visa_id;
        $p->updated_at = date('Y-m-d H:i:s');
        $p->updated_by = $user->id;
        $result['status'] = $p->save() ? 'success' : 'failure';
        
        $result['id'] = $a->id;
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxOtherUpdate()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $applicantid = Yii::app()->request->getPost('applicant_id');
        $result = array();
        
        $a = Applicant::model()->findByPk($applicantid);
        $a->visa_overstayed = Yii::app()->request->getPost('visa_overstayed');
        $a->visa_overstayed_detail = Yii::app()->request->getPost('visa_overstayed_detail');
        $a->visa_refused = Yii::app()->request->getPost('visa_refused');
        $a->visa_refused_detail = Yii::app()->request->getPost('visa_refused_detail');
        $a->visa_criminal = Yii::app()->request->getPost('visa_criminal');
        $a->visa_criminal_detail = Yii::app()->request->getPost('visa_criminal_detail');
        $a->visa_condition = Yii::app()->request->getPost('visa_condition');
        $a->visa_condition_detail = Yii::app()->request->getPost('visa_condition_detail');
        $a->visa_disease = Yii::app()->request->getPost('visa_disease');
        $a->visa_disease_detail = Yii::app()->request->getPost('visa_disease_detail');
        $a->visa_other_detail = Yii::app()->request->getPost('visa_other_detail');
        $a->updated_at = date('Y-m-d H:i:s');
        $a->updated_by = $user->id;
        $result['status'] = $a->save() ? 'success' : 'failure';
        
        $result['id'] = $a->id;
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxDeclareUpdate()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $applicantid = Yii::app()->request->getPost('applicant_id');
        $result = array();
        
        $declaredsign = Yii::app()->request->getPost('declare_sign');
        
        $a = Applicant::model()->findByPk($applicantid);
        $a->declared_sign = empty($declaredsign) ? 'NO' : 'YES';
        $a->declared_date = date('Y-m-d');
        $a->updated_at = date('Y-m-d H:i:s');
        $a->updated_by = $user->id;
        $result['status'] = $a->save() ? 'success' : 'failure';
        
        $result['id'] = $a->id;
        $result['bid'] = $a->batch_id;
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxOccupationRegister()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $applicantid = Yii::app()->request->getPost('applicant_id');
        $result = array();
        
        $o = new Occupation;
        $o->applicant_id = $applicantid;
        $o->occupationtype_id = Yii::app()->request->getPost('occupation');
        $o->position = strtoupper(Yii::app()->request->getPost('position'));
        $o->created_at = date('Y-m-d H:i:s');
        $o->created_by = $user->id;
        $result['status'] = $o->save() ? 'success' : 'failure';
        
        $result['id'] = $applicantid;
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxFamilyRegister()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $applicantid = Yii::app()->request->getPost('applicant_id');
        $result = array();
        
        $f = new Family;
        $f->applicant_id = $applicantid;
        $f->name = strtoupper(Yii::app()->request->getPost('name'));
        $f->nationality_id = Yii::app()->request->getPost('nationality');
        $f->occupationtype_id = Yii::app()->request->getPost('occupation');
        $f->relationship_id = Yii::app()->request->getPost('relationship');
        $f->created_at = date('Y-m-d H:i:s');
        $f->created_by = $user->id;
        $result['status'] = $f->save() ? 'success' : 'failure';
        
        $result['id'] = $applicantid;
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxEmergencyRegister()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $applicantid = Yii::app()->request->getPost('applicant_id');
        $result = array();
        
        $e = new Emergency;
        $e->applicant_id = $applicantid;
        $e->name = strtoupper(Yii::app()->request->getPost('name'));
        $e->phone = Yii::app()->request->getPost('phone_number');
        $e->mobile = Yii::app()->request->getPost('mobile_number');
        $e->relationship_id = Yii::app()->request->getPost('relationship');
        $e->created_at = date('Y-m-d H:i:s');
        $e->created_by = $user->id;
        $result['status'] = $e->save() ? 'success' : 'failure';
        
        $result['id'] = $applicantid;
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
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
        
        $ap->result_id = 18;
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
        
        $result['id'] = $ap->batch_id;
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxAdminDeliver()
    {
        $this->layout = false;
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $batchid = Yii::app()->request->getPost('batch_id');
        $applicant = Yii::app()->request->getPost('applicant');
        $result = array();
        
        if($applicant){
            foreach($applicant as $a){
                $ap = Applicant::model()->findByPk($a);
                $ap->result_id = 2;
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
    
    public function actionApplicationReport($id,$rid = 1,$tid = '')
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $batch = Batch::model()->findByPk($id);
        
        if($rid == 1){
            $applicant = Applicant::model()->findAllByAttributes(array(
                'batch_id' => $batch->id,
                'branch_id' => $user->branch_id,
                'admin_id' => $user->admin_id
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
                'batch_id' => $batch->id,
                'branch_id' => $user->branch_id,
                'admin_id' => $user->admin_id
            ), array('order' => 'id ASC'));
        }
        
        $labelstatus = Helpers::bg_dashstat($rid,$tid);
        $statustrack = Helpers::stat_dashboard($batch->id);
        
        $this->render('report', array(
            'batch' => $batch,
            'branch' => $user->branch_id,
            'admin' => $user->admin_id,
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
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        $sd = Yii::app()->request->getPost('startdate');
        $ed = Yii::app()->request->getPost('enddate');
        
        if(!empty($sd) && !empty($ed)){
            $startdate = date('Y-m-d', strtotime($sd));
            $enddate = date('Y-m-d', strtotime($ed));
            $type = 'on';
            
            $batch = Batch::model()->reportBatchByBranch($user->branch_id,$user->admin_id,$startdate,$enddate);
            $application = Applicant::model()->reportApplicantByBranch($user->branch_id,$user->admin_id,$startdate,$enddate);
            $payment = Payment::model()->reportPaymentByBranch($user->branch_id,$user->admin_id,$startdate,$enddate);
            $ptrack = Passportscan::model()->reportTrackingByBranch($user->branch_id,$user->admin_id,$startdate,$enddate);
        } else {
            $type = 'off';
            $batch = Batch::model()->statBatchByBranch($user->branch_id,$user->admin_id);
            $application = Applicant::model()->statApplicantByBranch($user->branch_id,$user->admin_id);
            $payment = Payment::model()->statPaymentByBranch($user->branch_id,$user->admin_id);
            $ptrack = Passportscan::model()->statTrackingByBranch($user->branch_id,$user->admin_id);
        }
        
        $report = array(
            'type' => $type,
            'startdate' => date('d M Y', strtotime($startdate)),
            'enddate' => date('d M Y', strtotime($enddate)),
            
            'batch' => $batch,
            'application' => $application['application'],
            'vdr' => $application['vdr'],
            'vtr' => $application['vtr'],
            'vln' => $payment['pay_vln'],
            'osc' => $payment['pay_osc'],
            'fee' => $payment['pay_all'],
            'track' => $ptrack
        );
        
        $this->render('report2', array(
            'user' => $user,
            'report' => $report
        ));
    }
    
    public function actionStatistic()
    {
        $user = User::model()->findByPk(Yii::app()->user->getState('userid'));
        
        $batch1 = Batch::model()->statBatchByBranch($user->branch_id,$user->admin_id,'today');
        $batch2 = Batch::model()->statBatchByBranch($user->branch_id,$user->admin_id);
        
        $application1 = Applicant::model()->statApplicantByBranch($user->branch_id,$user->admin_id,'today');
        $application2 = Applicant::model()->statApplicantByBranch($user->branch_id,$user->admin_id);
        
        $ptrack1 = Passportscan::model()->statTrackingByBranch($user->branch_id,$user->admin_id,'today');
        $ptrack2 = Passportscan::model()->statTrackingByBranch($user->branch_id,$user->admin_id);
        
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