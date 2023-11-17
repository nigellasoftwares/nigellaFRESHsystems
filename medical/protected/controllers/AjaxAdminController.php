<?php

class AjaxAdminController extends Controller
{
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
                    'ProfileRegister','ProfileView','ProfileUpdate','ProfileDelete',
                    'SettingNew','SettingRegister','SettingEdit','SettingUpdate','SettingDelete',
                    'TopupView','TopupUpdate','AjaxApplicantView'
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
        $this->redirect('index.php?r=Site/Error');
    }
    
    /* Profile */
    public function actionProfileRegister()
    {
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        $type = Yii::app()->request->getPost('r_type');
        switch($type){
            case 'ADMIN':   $role = '1';  $role_id = '3'; break;
            case 'AGENT':   $role = '2';  $role_id = '5'; break;
            case 'STAFF':   $role = '3';  $role_id = '4'; break;
            case 'DOCTOR':  $role = '4';  $role_id = '6'; break;
            case 'LAB':     $role = '6';  $role_id = '7'; break;
            case 'XRAY':    $role = '11'; $role_id = '8'; break;
        }
            
        $profilecode = Sequence::model()->sequence_item($role);
        $p = new Profile;
        
        $result = array();
        $p->code = html_entity_decode($profilecode);
        $p->type = Yii::app()->request->getPost('r_type');
        $p->name = strtoupper(Yii::app()->request->getPost('r_name'));
        $p->initial = strtoupper(Yii::app()->request->getPost('r_initial'));
        $p->register_number = strtoupper(Yii::app()->request->getPost('r_register_number'));
        $p->contact_person = strtoupper(Yii::app()->request->getPost('r_contact_person'));
        $p->nric = strtoupper(Yii::app()->request->getPost('r_nric'));
        if($type == 'LAB' || $type == 'XRAY'){
            $p->centre = strtoupper(Yii::app()->request->getPost('r_name'));
        } else if($type == 'STAFF') {
            $p->centre = $p->staff_branch(Yii::app()->request->getPost('r_centre'));
        } else {
            $p->centre = strtoupper(Yii::app()->request->getPost('r_centre'));
        }
        $p->address1 = strtoupper(Yii::app()->request->getPost('r_address1'));
        $p->address2 = strtoupper(Yii::app()->request->getPost('r_address2'));
        $p->address3 = strtoupper(Yii::app()->request->getPost('r_address3'));
        $p->district_id = Yii::app()->request->getPost('r_district');
        $p->state_id = '48';
        $p->group = strtoupper(Yii::app()->request->getPost('r_group'));
        $p->license_number = strtoupper(Yii::app()->request->getPost('r_license_number'));
        $p->phone1 = Yii::app()->request->getPost('r_phone1');
        $p->phone2 = Yii::app()->request->getPost('r_phone2');
        $p->fax = Yii::app()->request->getPost('r_fax');
        $p->email = Yii::app()->request->getPost('r_email');
        $p->comment = strtoupper(Yii::app()->request->getPost('r_remark'));
        $p->status_id = '1';
        $p->created_at = date("Y-m-d H:i:s");
        $p->created_by = $user->id;
        
        if($p->save()){
            $u = new User;
            $u->username = $p->code;
            $u->password = 'c1fc693491c3aa849f02729488a757d1';
            $u->profile_id = $p->id;
            $u->role_id = $role_id;
            $u->status_id = '1';
            $u->created_at = date("Y-m-d H:i:s");
            $u->created_by = $user->id;
            $u->save();
            
            $r = Profile::model()->findByPk($p->id);
            $r->user_id = $u->id;
            $r->save();
            
            if($type == 'DOCTOR'){
                $c = new Coupling;
                $c->doctor_id = $p->id;
                $c->status_id = '1';
                $c->created_at = date("Y-m-d H:i:s");
                $c->created_by = $user->id;
                $c->save();
                
                $q = new Quota;
                $q->doctor_id = $p->id;
                $q->amount = 600;
                $q->used = 0;
                $q->balance = 600;
                $q->status_id = '1';
                $q->created_at = date("Y-m-d H:i:s");
                $q->created_by = $user->id;
                $q->save();
            }
            
            $result['status'] = 'success';
            $result['success_form'] =   '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    '.$type.' has been successfully registered in the system.
                                                </div>
                                            </div>    
                                        </div>';
        } else {
            $result['status'] = 'failure';
            $result['error_form'] =     '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    '.$type.' has not been successfully registered in the system.
                                                </div>
                                            </div>    
                                        </div>';
        }
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionProfileView($id)
    {
        $p = Profile::model()->findByPk($id);
        
        $result = array();
        $result['id'] = !empty($p->id) ? $p->id : '';
        $result['code'] = !empty($p->code) ? $p->code : '';
        $result['type'] = !empty($p->type) ? $p->type : '';
        $result['name'] = !empty($p->name) ? $p->name : '';
        $result['initial'] = !empty($p->initial) ? $p->initial : '';
        $result['register_number'] = !empty($p->register_number) ? $p->register_number : '';
        $result['contact_person'] = !empty($p->contact_person) ? $p->contact_person : '';
        $result['nric'] = !empty($p->nric) ? $p->nric : '';
        if($p->type == 'STAFF'){
            $result['centre'] = !empty($p->centre) ? $p->staff_branch_id($p->centre) : '';
            $result['centre_name'] = !empty($p->centre) ? $p->centre : '';
        } else {
            $result['centre'] = !empty($p->centre) ? $p->centre : '';
        }
        $result['address1'] = !empty($p->address1) ? $p->address1 : '';
        $result['address2'] = !empty($p->address2) ? $p->address2 : '';
        $result['address3'] = !empty($p->address3) ? $p->address3 : '';
        $result['district'] = !empty($p->district_id) ? $p->district_id : '';
        $result['district_name'] = !empty($p->district_id) ? $p->district->name : '';
        $result['group'] = !empty($p->group) ? $p->group : '';
        $result['license_number'] = !empty($p->license_number) ? $p->license_number : '';
        $result['phone1'] = !empty($p->phone1) ? $p->phone1 : '';
        $result['phone2'] = !empty($p->phone1) ? $p->phone2 : '';
        $result['fax'] = !empty($p->fax) ? $p->fax : '';
        $result['email'] = !empty($p->email) ? $p->email : '';
        $result['comment'] = !empty($p->fax) ? $p->comment : '';
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionProfileUpdate($id)
    {
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        $p = Profile::model()->findByPk($id);
        $type = Yii::app()->request->getPost('u_type');
        
        $result = array();
        $p->name = strtoupper(Yii::app()->request->getPost('u_name'));
        $p->initial = strtoupper(Yii::app()->request->getPost('u_initial'));
        $p->register_number = strtoupper(Yii::app()->request->getPost('u_register_number'));
        $p->contact_person = strtoupper(Yii::app()->request->getPost('u_contact_person'));
        $p->nric = strtoupper(Yii::app()->request->getPost('u_nric'));
        if($type == 'LAB' || $type == 'XRAY'){
            $p->centre = strtoupper(Yii::app()->request->getPost('u_name'));
        } else if($type == 'STAFF'){
            $p->centre = $p->staff_branch(Yii::app()->request->getPost('u_centre'));
        } else {
            $p->centre = strtoupper(Yii::app()->request->getPost('u_centre'));
        }
        $p->address1 = strtoupper(Yii::app()->request->getPost('u_address1'));
        $p->address2 = strtoupper(Yii::app()->request->getPost('u_address2'));
        $p->address3 = strtoupper(Yii::app()->request->getPost('u_address3'));
        $p->district_id = Yii::app()->request->getPost('u_district');
        $p->group = strtoupper(Yii::app()->request->getPost('u_group'));
        $p->license_number = strtoupper(Yii::app()->request->getPost('u_license_number'));
        $p->phone1 = Yii::app()->request->getPost('u_phone1');
        $p->phone2 = Yii::app()->request->getPost('u_phone2');
        $p->fax = Yii::app()->request->getPost('u_fax');
        $p->email = Yii::app()->request->getPost('u_email');
        $p->comment = strtoupper(Yii::app()->request->getPost('u_remark'));
        $p->updated_at = date("Y-m-d H:i:s");
        $p->updated_by = $user->id;
        
        if($p->save()){
            $result['status'] = 'success';
            $result['success_form'] =   '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    '.$type.' has been successfully updated in the system.
                                                </div>
                                            </div>    
                                        </div>';
        } else {
            $result['status'] = 'failure';
            $result['error_form'] =     '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    '.$type.' has not been successfully updated in the system.
                                                </div>
                                            </div>    
                                        </div>';
        }
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionProfileDelete($id)
    {
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        $p = Profile::model()->findByPk($id);
        $type = Yii::app()->request->getPost('d_type');
        
        $result = array();
        $p->updated_at = date("Y-m-d H:i:s");
        $p->updated_by = $user->id;
        $p->disable = 'INACTIVE';
        
        if($p->save()){
            $result['status'] = 'success';
            $result['success_form'] =   '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    '.$type.' has been successfully deleted in the system.
                                                </div>
                                            </div>    
                                        </div>';
        } else {
            $result['status'] = 'failure';
            $result['error_form'] =     '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    '.$type.' has not been successfully deleted in the system.
                                                </div>
                                            </div>    
                                        </div>';
        }
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    /* Settings */
    public function actionSettingNew($type)
    {
        $s = Status::model()->findAll(array(
            'condition' => 'type = :type AND initial != :initial',
            'order' => 'order_number DESC',
            'params' => array(
                ':type' => $type,
                ':initial' => 'OTH'
            )
        ));
        
        $ordernum = (int)substr($s[0]['order_number'],1,3);
        $ordernum += 1; 
        $sequence = 'A'.str_pad($ordernum, '3', '0', STR_PAD_LEFT);
        
        $result = array();
        $result['sequence'] = $sequence;
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionSettingRegister($type)
    {
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        $s = new Status;
        
        $result = array();
        $s->guid = Helpers::getGUID();
        $s->name = strtoupper(Yii::app()->request->getPost('r_setting_name'));
        $s->initial = strtoupper(Yii::app()->request->getPost('r_setting_code'));
        $s->type = $type;
        $s->order_number = strtoupper(Yii::app()->request->getPost('r_setting_sequence'));
        $s->created_at = date("Y-m-d H:i:s");
        $s->created_by = $user->id;
        $s->disable = 'ACTIVE';
        
        if($s->save()){
            $result['status'] = 'success';
            $result['success_form'] =   '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    '.ucfirst($type).' has been successfully registered in the system.
                                                </div>
                                            </div>    
                                        </div>';
        } else {
            $result['status'] = 'failure';
            $result['error_form'] =     '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    '.ucfirst($type).' has not been successfully registered in the system.
                                                </div>
                                            </div>    
                                        </div>';
        }
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionSettingEdit($id)
    {
        $s = Status::model()->findByPk($id);
        
        $result = array();
        $result['id'] = !empty($s->id) ? $s->id : '';
        $result['name'] = !empty($s->name) ? $s->name : '';
        $result['code'] = !empty($s->initial) ? $s->initial : '';
        $result['sequence'] = !empty($s->order_number) ? $s->order_number : '';
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionSettingUpdate($id,$type)
    {
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        $s = Status::model()->findByPk($id);
        
        $result = array();
        $s->name = strtoupper(Yii::app()->request->getPost('u_setting_name'));
        $s->initial = strtoupper(Yii::app()->request->getPost('u_setting_code'));
        $s->order_number = strtoupper(Yii::app()->request->getPost('u_setting_sequence'));
        $s->updated_at = date("Y-m-d H:i:s");
        $s->updated_by = $user->id;
        
        if($s->save()){
            $result['status'] = 'success';
            $result['success_form'] =   '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    '.ucfirst($type).' has been successfully updated in the system.
                                                </div>
                                            </div>    
                                        </div>';
        } else {
            $result['status'] = 'failure';
            $result['error_form'] =     '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    '.ucfirst($type).' has not been successfully updated in the system.
                                                </div>
                                            </div>    
                                        </div>';
        }
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionSettingDelete($id,$type)
    {
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        $s = Status::model()->findByPk($id);
        
        $result = array();
        $s->updated_at = date("Y-m-d H:i:s");
        $s->updated_by = $user->id;
        $s->disable = 'INACTIVE';
        
        if($s->save()){
            $result['status'] = 'success';
            $result['success_form'] =   '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    '.ucfirst($type).' has been successfully deleted in the system.
                                                </div>
                                            </div>    
                                        </div>';
        } else {
            $result['status'] = 'failure';
            $result['error_form'] =     '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    '.ucfirst($type).' has not been successfully deleted in the system.
                                                </div>
                                            </div>    
                                        </div>';
        }
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
    
    public function actionTopupView($id)
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
        $result['agent_code'] = !empty($t->agent_id) ? $t->agent->code : '';
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
    
    public function actionTopupUpdate($id)
    {
        $this->layout = false;
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        
        $result = array();
        
        $t = Topup::model()->findByPk($id);
        $t->status_id =  Yii::app()->request->getPost('u_status');
        $t->updated_at = date("Y-m-d H:i:s");
        $t->updated_by = $user->id;
        $result['save'] = $t->save() ? 'success' : 'failure';
        
        $b = Balance::model()->findByAttributes(array('reference_id' => $t->code));
        $b->status_id = $t->status_id == 135 ? 137 : 138; 
        $b->description = 'TOP-UP APPROVED BY '.$user->profile->code.' ON '.date("Y-m-d H:i:s");
        $b->updated_date = date("Y-m-d H:i:s");
        $t->updated_at = date("Y-m-d H:i:s");
        $t->updated_by = $user->id;
        $result['save'] = $b->save() ? 'success' : 'failure';
        
        if($result['save'] == 'success'){
            $result['status'] = 'success';
            $result['success_form'] =   '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    Top-Up has been successfully approved in the system.
                                                </div>
                                            </div>    
                                        </div>';
        } else {
            $result['status'] = 'failure';
            $result['error_form'] =     '<div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    Top-Up has not been successfully approved in the system.
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
        $user = User::model()->findByAttributes(array('username' => Yii::app()->user->getState('username')));
        $a = Applicant::model()->findByPk($id);
        $dependant = Dependant::model()->findAllByAttributes(array('applicant_id' => $a->id));
        
        $result = array();
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
        $result['applicant_district'] = !empty($a->district_id) ? $a->district->name : NULL;
        $result['applicant_contact_number'] = !empty($a->contact_number) ? strtoupper($a->contact_number) : NULL;
        
        $result['employer_name'] = !empty($a->employer_name) ? strtoupper($a->employer_name) : NULL;
        $result['employer_address1'] = !empty($a->employer_address1) ? strtoupper($a->employer_address1) : NULL;
        $result['employer_address2'] = !empty($a->employer_address2) ? strtoupper($a->employer_address2) : NULL;
        $result['employer_address3'] = !empty($a->employer_address3) ? strtoupper($a->employer_address3) : NULL;
        $result['employer_district'] = !empty($a->employer_district_id) ? $a->district->name : NULL;
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
        
        $result['applicant_gallery'] = '
            <a href="uploads/photos/'.$a->guid.'.jpg" title="Photo" data-gallery=""><img src="uploads/photos/'.$a->guid.'.jpg" height="100" width="100"></a>
			<a href="uploads/passports/'.$a->guid.'.jpg" title="Passport" data-gallery=""><img src="uploads/passports/'.$a->guid.'.jpg" height="100" width="100"></a>
            <a href="uploads/births/'.$a->guid.'.jpg" title="Birth Certificate" data-gallery=""><img src="uploads/births/'.$a->guid.'.jpg" height="100" width="100"></a>
            <a href="uploads/marriages/'.$a->guid.'.jpg" title="Marriage Certificate" data-gallery=""><img src="uploads/marriages/'.$a->guid.'.jpg" height="100" width="100"></a>
            <a href="uploads/imm13s/'.$a->guid.'.jpg" title="IMM13" data-gallery=""><img src="uploads/imm13s/'.$a->guid.'.jpg" height="100" width="100"></a>
            <a href="uploads/others/'.$a->guid.'.jpg" title="Other Document" data-gallery=""><img src="uploads/others/'.$a->guid.'.jpg" height="100" width="100"></a>';
        
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
                );
            }
        }
        
        header('Content-Type: application/json');
        echo CJavaScript::jsonEncode($result);
        Yii::app()->end();
    }
}