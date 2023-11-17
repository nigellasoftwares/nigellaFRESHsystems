<?php

class DoctorController extends Controller
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
                    'Index','Dashboard','Barcode','Worker','Medical',
                    'AjaxBarcodeSearch','AjaxMedicalUpdate','AjaxLabxrayUpdate','AjaxCertifyUpdate',
                    'AccountView','AccountRegister','AccountTopupView','AccountTopupCreate',
                    'AjaxTopupRegister','AjaxTopupView','AjaxTopupUpdate','AjaxTopupImage','AjaxRegisterView',
                    'AjaxFingerprintVerify','AjaxFingerprintCheck'
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
        $transaction = Transaction::model()->findAllByAttributes(array('doctor_id' => $user->profile->id));
        
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
            'fit' => 0,
            'unfit' => 0,
            'certified' => 0,
            'notcertified' => 0,
            'all' => 0,
            'allrm' => 0
        );
        
        foreach($transaction as $t){
            $applicant = Applicant::model()->findByAttributes(array('guid' => $t->guid));
            if($applicant->gender->name == 'MALE'){
                $applicant_total['male'] += 1;
            } else if($applicant->gender->name == 'FEMALE'){
                $applicant_total['female'] += 1;
            }
            
            if($t->result == 'YES'){
                $applicant_total['fit'] += 1;
            } else if($t->result == 'NO'){
                $applicant_total['unfit'] += 1;
            }
            
            if($t->result == 'YES' || $t->result == 'NO'){
                $applicant_total['certified'] += 1;
            } else {
                $applicant_total['notcertified'] += 1;
            }
            
            $applicant_total['all'] += 1;
        }
        
        $applicant_total['allrm'] = $applicant_total['all'] * 20000;
        
        $this->render('dashboard', array(
            'bdashboard' => $bdashboard,
            'applicant' => $applicant_total
        ));
    }
    
    public function actionBarcode()
    {
        $this->render('list/ls_barcode');
    }
    
    public function actionWorker($id)
    {
        $t = Transaction::model()->findByPk($id);
        $a = Applicant::model()->findByAttributes(array('guid'=>$t->guid));
        $d = Profile::model()->findByPk($t->doctor_id);
        $de = Doctorexam::model()->findByAttributes(array('transaction_id' => $t->id));
        $le = Labexam::model()->findByAttributes(array('transaction_id' => $t->id));
        $xe = Xrayexam::model()->findByAttributes(array('transaction_id' => $t->id));
        $dc = Doctorcertify::model()->findByAttributes(array('transaction_id' => $t->id));
        
        //$t->is_verified = NULL;
        //$t->save();

        $this->render('list/ls_worker', array(
            'transaction' => $t,
            'worker' => $a,
            'doctor' => $d,
            'de' => $de,
            'le' => $le,
            'xe' => $xe,
            'dc' => $dc
        ));
    }
    
    public function actionMedical($id)
    {
        $t = Transaction::model()->findByPk($id);
        $a = Applicant::model()->findByAttributes(array('guid'=>$t->guid));
        $d = Profile::model()->findByPk($t->doctor_id);
        $de = Doctorexam::model()->findByAttributes(array('transaction_id' => $t->id));
        $le = Labexam::model()->findByAttributes(array('transaction_id' => $t->id));
        $xe = Xrayexam::model()->findByAttributes(array('transaction_id' => $t->id));
        $dc = Doctorcertify::model()->findByAttributes(array('transaction_id' => $t->id));

        $this->render('list/ls_medical', array(
            'transaction' => $t,
            'worker' => $a,
            'doctor' => $d,
            'de' => $de,
            'le' => $le,
            'xe' => $xe,
            'dc' => $dc
        ));
    }
    
    public function actionAjaxBarcodeSearch()
    {
        $this->layout = false;
        $result = array();
        
        $barcode = Yii::app()->request->getPost('barcode');
        $t = Transaction::model()->findByAttributes(array('guid'=>$barcode));
        
        if($t){
            $result['id'] = $t->id;
            $result['status'] = 'success';
            $result['success_form'] =   '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    This barcode is registered for medical examination in the system.
                                                </div>
                                            </div>    
                                        </div>';
        } else {
            $result['id'] = '';
            $result['status'] = 'failure';
            $result['error_form'] =     '<div class="row">
                                            <div class="col-md-6">
                                                <div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    This barcode is not registered for medical examination in the system.
                                                </div>
                                            </div>    
                                        </div>';
        }
        
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxFingerprintVerify($id)
    {
        $this->layout = false;
        
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        $transaction = Transaction::model()->findByPk($id);
        $doctor = Profile::model()->findByPk($transaction->doctor_id);
        $doctorexam = Doctorexam::model()->findByAttributes(array('transaction_id' => $transaction->id));

        if($doctorexam){
            $de = Doctorexam::model()->findByAttributes(array('transaction_id' => $transaction->id));
            $de->updated_at = date("Y-m-d H:i:s");
            $de->updated_by = $user->id;
        } else {
            $de = new Doctorexam;
            $de->transaction_id = $transaction->id;
            $de->doctor_id = $doctor->id;
            $de->status_id = '1';
            $de->created_at = date("Y-m-d H:i:s");
            $de->created_by = $user->id;
            $de->disable = 'ACTIVE';
        }
        
        /* PART 1 - Declaration By Doctor */
        
        $de->exam_date = date("Y-m-d", strtotime(Yii::app()->request->getPost('p1_medical_date')));
        
        $result = array();
        $result['id'] = $transaction->id;
        
        if($de->save()){
            $transaction->doctorexam_id = $de->id;
            $transaction->updated_at = date("Y-m-d H:i:s");
            $transaction->updated_by = $user->id;
            $transaction->save();
            
            $result['status'] = 'success';
            $result['success_form'] =   '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    Worker has been successfully verified in the system.
                                                </div>
                                            </div>    
                                        </div>';
        } else {
            $result['status'] = 'failure';
            $result['error_form'] =     '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    Worker has not been successfully verified in the system.
                                                </div>
                                            </div>    
                                        </div>';
        }
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxFingerprintCheck($id)
    {
        $this->layout = false;
        
        $transaction = Transaction::model()->findByPk($id);
        
        $result = array();
        $result['id'] = $transaction->id;
        
        if($transaction->is_verified == 'YES'){
            $result['status_verify'] = 'success';
            $result['success_verify_form'] =   '<div class="row">
                                                    <div class="col-md-12">
                                                        <div class="alert alert-success alert-dismissable">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                            Fingerprint is matched in the system.
                                                        </div>
                                                    </div>    
                                                </div>';
            
        } else if($transaction->is_verified == 'NO'){
            $result['status_verify'] = 'failure';
            $result['error_verify_form'] =     '<div class="row">
                                                    <div class="col-md-12">
                                                        <div class="alert alert-danger alert-dismissable">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                            Fingerprint is not matched in the system.
                                                        </div>
                                                    </div>    
                                                </div>';
            
        } else {
            $result['status_verify'] = 'empty';
            $result['error_verify_form'] =     '<div class="row">
                                                    <div class="col-md-12">
                                                        <div class="alert alert-danger alert-dismissable">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                            Fingerprint is not verified yet in the system.
                                                        </div>
                                                    </div>    
                                                </div>';
        }
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxMedicalUpdate($id)
    {
        $this->layout = false;
        
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        $transaction = Transaction::model()->findByPk($id);
        $doctor = Profile::model()->findByPk($transaction->doctor_id);
        $doctorexam = Doctorexam::model()->findByAttributes(array('transaction_id' => $transaction->id));
        
        if($doctorexam){
            $de = Doctorexam::model()->findByAttributes(array('transaction_id' => $transaction->id));
            $de->updated_at = date("Y-m-d H:i:s");
            $de->updated_by = $user->id;
        } else {
            $de = new Doctorexam;
            $de->transaction_id = $transaction->id;
            $de->doctor_id = $doctor->id;
            $de->status_id = '1';
            $de->created_at = date("Y-m-d H:i:s");
            $de->created_by = $user->id;
        }
        
        /* PART 1 - Declaration By Doctor */
        
        $de->exam_date = date("Y-m-d", strtotime(Yii::app()->request->getPost('p1_medical_date')));
        
        /* PART 2 - Medical History - Category 1 Disease */
        
        $de->malaria = Yii::app()->request->getPost('c1_malaria');
        $c1_malaria_date = Yii::app()->request->getPost('c1_malaria_date');
        if(!empty($c1_malaria_date)){
            $de->malaria_date = date("Y-m-d", strtotime($c1_malaria_date));
        }
        
        $de->std = Yii::app()->request->getPost('c1_std');
        $c1_std_date = Yii::app()->request->getPost('c1_std_date');
        if(!empty($c1_std_date)){
            $de->std_date = date("Y-m-d", strtotime($c1_std_date));
        }
        
        $de->cancer = Yii::app()->request->getPost('c1_cancer');
        $c1_cancer_date = Yii::app()->request->getPost('c1_cancer_date');
        if(!empty($c1_cancer_date)){
            $de->cancer_date = date("Y-m-d", strtotime($c1_cancer_date));
        }
        
        $de->epilepsy = Yii::app()->request->getPost('c1_epilepsy');
        $c1_epilepsy_date = Yii::app()->request->getPost('c1_epilepsy_date');
        if(!empty($c1_epilepsy_date)){
            $de->epilepsy_date = date("Y-m-d", strtotime($c1_epilepsy_date));
        }
        
        $de->psychiatric = Yii::app()->request->getPost('c1_psychiatric');
        $c1_psychiatric_date = Yii::app()->request->getPost('c1_psychiatric_date');
        if(!empty($c1_psychiatric_date)){
            $de->psychiatric_date = date("Y-m-d", strtotime($c1_psychiatric_date));
        }
        
        $de->viral = Yii::app()->request->getPost('c1_hepatitis');
        $c1_hepatitis_date = Yii::app()->request->getPost('c1_hepatitis_date');
        if(!empty($c1_hepatitis_date)){
            $de->viral_date = date("Y-m-d", strtotime($c1_hepatitis_date));
        }
        
        $de->leprosy = Yii::app()->request->getPost('c1_leprosy');
        $c1_leprosy_date = Yii::app()->request->getPost('c1_leprosy_date');
        if(!empty($c1_leprosy_date)){
            $de->leprosy_date = date("Y-m-d", strtotime($c1_leprosy_date));
        }
        
        $de->tuber = Yii::app()->request->getPost('c1_tuberculosis');
        $c1_tuberculosis_date = Yii::app()->request->getPost('c1_tuberculosis_date');
        if(!empty($c1_tuberculosis_date)){
            $de->tuber_date = date("Y-m-d", strtotime($c1_tuberculosis_date));
        }
        
        $de->hiv = Yii::app()->request->getPost('c1_hiv');
        $c1_hiv_date = Yii::app()->request->getPost('c1_hiv_date');
        if(!empty($c1_hiv_date)){
            $de->hiv_date = date("Y-m-d", strtotime($c1_hiv_date));
        }
        
        /* PART 2 - Medical History - Category 2 Disease */
        
        $de->kidney = Yii::app()->request->getPost('c2_kidney');
        $c2_kidney_date = Yii::app()->request->getPost('c2_kidney_date');
        if(!empty($c2_kidney_date)){
            $de->kidney_date = date("Y-m-d", strtotime($c2_kidney_date));
        }
        
        $de->ulcer = Yii::app()->request->getPost('c2_ulcer');
        $c2_ulcer_date = Yii::app()->request->getPost('c2_ulcer_date');
        if(!empty($c2_ulcer_date)){
            $de->ulcer_date = date("Y-m-d", strtotime($c2_ulcer_date));
        }
        
        $de->diabetes = Yii::app()->request->getPost('c2_diabetes');
        $c2_diabetes_date = Yii::app()->request->getPost('c2_diabetes_date');
        if(!empty($c2_diabetes_date)){
            $de->diabetes_date = date("Y-m-d", strtotime($c2_diabetes_date));
        }
        
        $de->asthma = Yii::app()->request->getPost('c2_asthma');
        $c2_asthma_date = Yii::app()->request->getPost('c2_asthma_date');
        if(!empty($c2_asthma_date)){
            $de->asthma_date = date("Y-m-d", strtotime($c2_asthma_date));
        }
        
        $de->heart_disease = Yii::app()->request->getPost('c2_heart');
        $c2_heart_date = Yii::app()->request->getPost('c2_heart_date');
        if(!empty($c2_heart_date)){
            $de->heart_disease_date = date("Y-m-d", strtotime($c2_heart_date));
        }
        
        $de->hypertension = Yii::app()->request->getPost('c2_tension');
        $c2_tension_date = Yii::app()->request->getPost('c2_tension_date');
        if(!empty($c2_tension_date)){
            $de->hypertension_date = date("Y-m-d", strtotime($c2_tension_date));
        }
        
        $de->others_history = Yii::app()->request->getPost('c2_other');
        $c2_other_date = Yii::app()->request->getPost('c2_other_date');
        if(!empty($c2_other_date)){
            $de->others_history_date = date("Y-m-d", strtotime($c2_other_date));
        }
        
        $de->drugs = Yii::app()->request->getPost('c2_drug');
        $de->comment_history = strtoupper(Yii::app()->request->getPost('c2_comment'));
        
        /* PART 3 - Physical Examination - Section A General Examination */
        
        $de->height = Yii::app()->request->getPost('sa_height');
        $de->weight = Yii::app()->request->getPost('sa_weight');
        $de->pulse = Yii::app()->request->getPost('sa_pulse');
        $de->bp_systolic = Yii::app()->request->getPost('sa_systolic');
        $de->bp_diastolic = Yii::app()->request->getPost('sa_diastolic');
        
        $de->lymph = Yii::app()->request->getPost('sa_lymph');
        $de->jaundice = Yii::app()->request->getPost('sa_jaundice');
        $de->pallor = Yii::app()->request->getPost('sa_pallor');
        $de->anaesthetic = Yii::app()->request->getPost('sa_anaesthetic');
        $de->deformites = Yii::app()->request->getPost('sa_limbs');
        $de->skinrash = Yii::app()->request->getPost('sa_skin');
        $de->hear_left = Yii::app()->request->getPost('sa_hearing_left');
        $de->hear_right = Yii::app()->request->getPost('sa_hearing_right');
        $de->vis_unaided_left = Yii::app()->request->getPost('sa_unaided_left');
        $de->vis_unaided_right = Yii::app()->request->getPost('sa_unaided_right');
        $de->vis_aided_left = Yii::app()->request->getPost('sa_aided_left');
        $de->vis_aided_right = Yii::app()->request->getPost('sa_aided_right');
        $de->others_general = Yii::app()->request->getPost('sa_other');
        $de->comment_general = strtoupper(Yii::app()->request->getPost('sa_comment'));
        
        /* PART 3 - Physical Examination - Section B Systems Examination */
        
        $de->cardio_heartsound = Yii::app()->request->getPost('sb_heart_sound');
        $de->cardio_heartsize = Yii::app()->request->getPost('sb_heart_size');
        $de->cardio_other = Yii::app()->request->getPost('sb_heart_other');
        
        $de->res_breath = Yii::app()->request->getPost('sb_breath_sound');
        $de->res_other = Yii::app()->request->getPost('sb_breath_other');
        
        $de->abdomen_rectal = Yii::app()->request->getPost('sb_rectal');
        $de->abdomen_lymph = Yii::app()->request->getPost('sb_lymph');
        $de->abdomen_swelling = Yii::app()->request->getPost('sb_swelling');
        $de->abdomen_spleen = Yii::app()->request->getPost('sb_spleen');
        $de->abdomen_liver = Yii::app()->request->getPost('sb_liver');
        
        $de->nerv_reflex = Yii::app()->request->getPost('sb_reflex');
        $de->nerv_sensor = Yii::app()->request->getPost('sb_sensor');
        $de->nerv_motor = Yii::app()->request->getPost('sb_motor');
        $de->nerv_size = Yii::app()->request->getPost('sb_nerve');
        $de->nerv_cognitive = Yii::app()->request->getPost('sb_cognitive');
        $de->nerv_speech = Yii::app()->request->getPost('sb_speech');
        $de->nerv_mental = Yii::app()->request->getPost('sb_mental');
        
        $de->gen_sores = Yii::app()->request->getPost('sb_ulcer');
        $de->gen_discharge = Yii::app()->request->getPost('sb_discharge');
        $de->gen_kidney = Yii::app()->request->getPost('sb_kidney');
        
        $de->comment_gen = strtoupper(Yii::app()->request->getPost('sb_comment'));
        
        $result = array();
        $result['id'] = Yii::app()->request->getPost('transaction_id');
        $result['tid'] = Yii::app()->request->getPost('type_id');
        
        if($de->save()){
            $transaction->doctorexam_id = $de->id;
            $transaction->updated_at = date("Y-m-d H:i:s");
            $transaction->updated_by = $user->id;
            $transaction->save();
            
            $result['status'] = 'success';
            $result['success_form'] =   '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    Medical has been successfully updated in the system.
                                                </div>
                                            </div>    
                                        </div>';
        } else {
            $result['status'] = 'failure';
            $result['error_form'] =     '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    Medical has not been successfully updated in the system.
                                                </div>
                                            </div>    
                                        </div>';
        }
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxLabxrayUpdate($id)
    {
        $this->layout = false;
        
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        $transaction = Transaction::model()->findByPk($id);
        $doctor = Profile::model()->findByPk($transaction->doctor_id);
        $labexam = Labexam::model()->findByAttributes(array('transaction_id' => $transaction->id));
        $xrayexam = Xrayexam::model()->findByAttributes(array('transaction_id' => $transaction->id));
        $status = 'SUCCESS';
        
        /* Lab Result */
        
        if($labexam){
            $le = Labexam::model()->findByAttributes(array('transaction_id' => $transaction->id));
            $le->updated_at = date("Y-m-d H:i:s");
            $le->updated_by = $user->id;
        } else {
            $le = new Labexam;
            $le->transaction_id = $transaction->id;
            $le->doctor_id = $doctor->id;
            $le->overdue = NULL;
            $le->certify = 'YES';
            $le->read = NULL;
            $le->status_id = '1';
            $le->created_at = date("Y-m-d H:i:s");
            $le->created_by = $user->id;
        }
        
        $le->specimen_date = date("Y-m-d", strtotime(Yii::app()->request->getPost('lab_specimen_date')));
        
        /* Blood Tests */
        
        $le->blood_group = Yii::app()->request->getPost('lab_blood_group');
        $le->blood_group_rh = Yii::app()->request->getPost('lab_blood_group_rh');
        $le->blood_malaria = Yii::app()->request->getPost('lab_malaria');
        $le->blood_vdrl = Yii::app()->request->getPost('lab_vdrl');
        $le->blood_hbsag = Yii::app()->request->getPost('lab_hbsag');
        $le->blood_hiv = Yii::app()->request->getPost('lab_hiv');
        
        /* Urine Tests */
        
        $le->urine_cannabis = Yii::app()->request->getPost('lab_cannabis');
        $le->urine_opiates = Yii::app()->request->getPost('lab_opiates');
        $le->urine_microscopic = Yii::app()->request->getPost('lab_microscopic');
        $le->urine_albumin = Yii::app()->request->getPost('lab_albumin');
        $le->urine_sugar = Yii::app()->request->getPost('lab_sugar');
        $le->urine_gravity = Yii::app()->request->getPost('lab_gravity');
        $le->urine_color = Yii::app()->request->getPost('lab_colour');
        
        /* Lab Comment */
        
        $le->reason_if_abnormal = strtoupper(Yii::app()->request->getPost('lab_reason'));
        $le->report_date = date("Y-m-d H:i:s");
        
        $le->read = 'YES';
        $le->updated_at = date("Y-m-d H:i:s");
        $le->updated_by = $user->id;
        $status = $le->save() ? 'SUCCESS' : 'FAILURE';
        
        /* Xray Findings */
        
        if($xrayexam){
            $xe = Xrayexam::model()->findByAttributes(array('transaction_id' => $transaction->id));
            $xe->updated_at = date("Y-m-d H:i:s");
            $xe->updated_by = $user->id;
        } else {
            $xe = new Xrayexam;
            $xe->transaction_id = $transaction->id;
            $xe->doctor_id = $doctor->id;
            $xe->pregnant = NULL;
            $xe->overdue = NULL;
            $xe->certify = 'YES';
            $xe->read = NULL;
            $xe->status_id = '1';
            $xe->created_at = date("Y-m-d H:i:s");
            $xe->created_by = $user->id;
        }
        
        $xe->exam_date = date("Y-m-d", strtotime(Yii::app()->request->getPost('xray_taken_date')));
        
        /* Report Findings */
        
        $xe->pleura = Yii::app()->request->getPost('xray_pleura');
        $xe->pleura_reason = Yii::app()->request->getPost('xray_pleura_abnormal');
        $xe->mediastinum = Yii::app()->request->getPost('xray_mediastinum');
        $xe->mediastinum_reason = Yii::app()->request->getPost('xray_mediastinum_abnormal');
        $xe->lung_fields = Yii::app()->request->getPost('xray_lung');
        $xe->lung_fields_reason = Yii::app()->request->getPost('xray_lung_abnormal');
        $xe->heart_shape = Yii::app()->request->getPost('xray_heart');
        $xe->heart_shape_reason = Yii::app()->request->getPost('xray_heart_abnormal');
        $xe->thoracic_cage = Yii::app()->request->getPost('xray_thoracic');
        $xe->thoracic_cage_reason = Yii::app()->request->getPost('xray_thoracic_abnormal');
        $xe->focal_lesion = Yii::app()->request->getPost('xray_focal');
        $xe->focal_lesion_reason = Yii::app()->request->getPost('xray_focal_abnormal');
        $xe->other_abnormal = Yii::app()->request->getPost('xray_other');
        $xe->other_abnormal_reason = Yii::app()->request->getPost('xray_other_abnormal');
        $xe->impression = Yii::app()->request->getPost('xray_impression');
        $xe->report_date = date("Y-m-d H:i:s");
        
        $xe->read = 'YES';
        $xe->updated_at = date("Y-m-d H:i:s");
        $xe->updated_by = $user->id;
        $status = $xe->save() ? 'SUCCESS' : 'FAILURE';
               
        $result = array();
        $result['id'] = Yii::app()->request->getPost('transaction_id');
        $result['tid'] = Yii::app()->request->getPost('type_id');
        
        if($status == 'SUCCESS'){
            $transaction->labexam_id = $le->id;
            $transaction->xrayexam_id = $xe->id;
            $transaction->updated_at = date("Y-m-d H:i:s");
            $transaction->updated_by = $user->id;
            $transaction->save();
            
            $result['status'] = 'success';
            $result['success_form'] =   '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    Lab and X-Ray  has been successfully updated in the system.
                                                </div>
                                            </div>    
                                        </div>';
        } else {
            $result['status'] = 'failure';
            $result['error_form'] =     '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    Lab and X-Ray  has not been successfully updated in the system.
                                                </div>
                                            </div>    
                                        </div>';
        }
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionAjaxCertifyUpdate($id)
    {
        $this->layout = false;
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        $transaction = Transaction::model()->findByPk($id);
        $doctor = Profile::model()->findByPk($transaction->doctor_id);
        $doctorcertify = Doctorcertify::model()->findByAttributes(array('transaction_id' => $transaction->id));
        
        if($doctorcertify){
            $dc = Doctorcertify::model()->findByAttributes(array('transaction_id' => $transaction->id));
            $dc->certify_date = date("Y-m-d");
            $dc->updated_at = date("Y-m-d H:i:s");
            $dc->updated_by = $user->id;
        } else {
            $dc = new Doctorcertify;
            $dc->transaction_id = $transaction->id;
            $dc->doctor_id = $doctor->id;
            $dc->certify_date = date("Y-m-d");
            $dc->status_id = '1';
            $dc->created_at = date("Y-m-d H:i:s");
            $dc->created_by = $user->id;
        }
        
        /* PART 4 - Certification By Doctor - Diseases/Condition */
        /* Diseases/Condition */
        
        $dc->psychiatric = Yii::app()->request->getPost('p4_psychiatric');
        $dc->epilepsy = Yii::app()->request->getPost('p4_epilepsy');
        $dc->cancer = Yii::app()->request->getPost('p4_cancer');
        $dc->hepatitis = Yii::app()->request->getPost('p4_hepatitis');
        $dc->std = Yii::app()->request->getPost('p4_std');
        $dc->leprosy = Yii::app()->request->getPost('p4_leprosy');
        $dc->malaria = Yii::app()->request->getPost('p4_malaria');
        $dc->tuberculosis = Yii::app()->request->getPost('p4_tuberculosis');
        $dc->hiv = Yii::app()->request->getPost('p4_hiv');
        $dc->others = Yii::app()->request->getPost('p4_other');
        
        /* I Also Found That */
        
        $dc->cannabis = Yii::app()->request->getPost('p4_cannabis');
        $dc->opiates = Yii::app()->request->getPost('p4_opiates');
        
        /* PART 4 - Certification By Doctor - Certification */
        /* Certification */
        
        $dc->result = Yii::app()->request->getPost('p4_suitable');
        $dc->others_comment = strtoupper(Yii::app()->request->getPost('p4_comment'));
        $dc->reason_comment = strtoupper(Yii::app()->request->getPost('p4_reason'));
        
        /* PART 4 - Certification By Doctor - Follow-Up */
        /* Follow-Up */
        
        /*
        $dc->office = Yii::app()->request->getPost('p4_office');
        $p4_office_date = Yii::app()->request->getPost('p4_office_date');
        if(!empty($p4_office_date)){
            $dc->office_date = date("Y-m-d", strtotime($p4_office_date));
        }
        
        $dc->government = Yii::app()->request->getPost('p4_government');
        $p4_government_date = Yii::app()->request->getPost('p4_government_date');
        if(!empty($p4_government_date)){
            $dc->government_date = date("Y-m-d", strtotime($p4_government_date));
        }
        
        $dc->private = Yii::app()->request->getPost('p4_private');
        $p4_private_date = Yii::app()->request->getPost('p4_private_date');
        if(!empty($p4_private_date)){
            $dc->private_date = date("Y-m-d", strtotime($p4_private_date));
        }
        
        $dc->treating = Yii::app()->request->getPost('p4_treating');
        $p4_treating_date = Yii::app()->request->getPost('p4_treating_date');
        if(!empty($p4_treating_date)){
            $dc->treating_date = date("Y-m-d", strtotime($p4_treating_date));
        }
        
        $dc->another = Yii::app()->request->getPost('p4_another');
        $p4_another_date = Yii::app()->request->getPost('p4_another_date');
        if(!empty($p4_another_date)){
            $dc->another_date = date("Y-m-d", strtotime($p4_another_date));
        }
        */
        
        $result = array();
        $result['id'] = Yii::app()->request->getPost('transaction_id');
        $result['tid'] = Yii::app()->request->getPost('type_id');
        
        if($dc->save()){
            $transaction->doctorcertify_id = $dc->id;
            $transaction->result = $dc->result;
            $transaction->updated_at = date("Y-m-d H:i:s");
            $transaction->updated_by = $user->id;
            $transaction->save();

            $recruitworker = RecruitWorker::model()->findByAttributes(array(
                'guid' => $transaction->guid
            ));
            $recruittransaction = RecruitTransaction::model()->findByAttributes(array(
                'worker_id' => $recruitworker->id
            ));
            $recruittransaction->medical = $transaction->result;
            $recruittransaction->save();
            
            $result['status'] = 'success';
            $result['success_form'] =   '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    Certification has been successfully updated in the system.
                                                </div>
                                            </div>    
                                        </div>';
        } else {
            $result['status'] = 'failure';
            $result['error_form'] =     '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    Certification has not been successfully updated in the system.
                                                </div>
                                            </div>    
                                        </div>';
        }
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
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
}