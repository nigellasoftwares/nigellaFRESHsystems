<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Edit</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item">Application</li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="pull-right">
                <a href="index.php?r=Sourceagent/Application" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                    <i class="fa fa-arrow-circle-o-left"></i> Back To Foreign Workers
                </a>
            </div>
            
            <h4 class="card-title"><span class="label label-primary"><?php echo $user->profile->company->name; ?></span></h4>
            <h4 class="card-title">Edit Foreign Worker Information</h4>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header bg-info">
            <h5 class="m-b-0 text-white">Application Information</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <!-- Nav tabs -->
                    <div class="vtabs">
                        <ul class="nav nav-tabs tabs-vertical" role="tablist">
                            <li class="nav-item <?php echo $sign['personal_01']; ?>">
                                <a class="nav-link active" data-toggle="tab" href="#personal1" role="tab">
                                    <span class="hidden-sm-up"><i class="ti-user"></i></span> 
                                    <span class="hidden-xs-down">Personal 1</span> 
                                </a> 
                            </li>
                            <li class="nav-item <?php echo $sign['personal_02']; ?>"> 
                                <a class="nav-link" data-toggle="tab" href="#personal2" role="tab">
                                    <span class="hidden-sm-up"><i class="ti-home"></i></span> 
                                    <span class="hidden-xs-down">Personal 2</span>
                                </a> 
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- Personal 1 -->
                            <div class="tab-pane active" id="personal1" role="tabpanel">
                                <div class="p-20">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="m-b-20">Personal Information 1</h3>
                                        </div>
                                    </div>
                                    
                                    <form id="form-update-personal">
                                        <div class="form-actions">
                                            <input type="hidden" name="transaction_id" value="<?php echo $transaction->id; ?>">
                                            
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Photo Upload</strong></label>
                                                        <input type="file" name="upload_photo" class="form-control vft-element" data-parsley-fileextension="jpg">
                                                        <small class="form-control-feedback text-info"><strong>Note:</strong> If any, you need to upload the <strong>jpg</strong> file format only.</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Passport Upload</strong></label>
                                                        <input type="file" name="upload_passport" class="form-control vft-element" data-parsley-fileextension="jpg">
                                                        <small class="form-control-feedback text-info"><strong>Note:</strong> If any, you need to upload the <strong>jpg</strong> file format only.</small>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Full Name</strong> <span class="text-danger">*</span></label>
                                                        <input type="text" name="fullname" class="form-control vft-element" placeholder="Full Name" value="<?php echo $transaction->worker->full_name; ?>" data-required="true">
                                                        <small class="form-control-feedback text-info"><strong>Note:</strong> Full name as in passport.</small> 
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>First Name</strong> <span class="text-danger">*</span></label>
                                                        <input type="text" name="firstname" class="form-control vft-element" placeholder="First Name" value="<?php echo $transaction->worker->first_name; ?>" data-parsley-required="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>National Card ID Number</strong> <span class="text-danger">*</span></label></label>
                                                        <input type="text" name="national_card_number" class="form-control vft-element" placeholder="National Card ID Number" data-parsley-required="true" value="<?php echo strtoupper($transaction->worker->national_card); ?>">
                                                        <small class="form-control-feedback text-info"><strong>Note:</strong> Citizen Number</small> 
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Middle Name</strong> <span class="text-danger">*</span></label>
                                                        <input type="text" name="middlename" class="form-control vft-element" placeholder="Middle Name" value="<?php echo $transaction->worker->middle_name; ?>" data-parsley-required="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            <i class="icon-calender"></i> <strong>Date Of Birth</strong> <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" name="dateofbirth" class="form-control vft-element datepicker-autoclose" placeholder="DD-MM-YYYY" data-parsley-required="true" value="<?php echo date('d-m-Y',strtotime($transaction->worker->birth_date)); ?>">
                                                        <small class="form-control-feedback text-info"><strong>Note:</strong> DD-MM-YYYY</small>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Last Name</strong> <span class="text-danger">*</span></label>
                                                        <input type="text" name="lastname" class="form-control vft-element" placeholder="Last Name" value="<?php echo $transaction->worker->last_name; ?>" data-parsley-required="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Place Of Birth</strong> <span class="text-danger">*</span></label>
                                                        <textarea name="placeofbirth" class="form-control vft-element" placeholder="Place Of Birth" data-parsley-required="true"><?php echo strtoupper($transaction->worker->birth_place); ?></textarea>
                                                        <small class="form-control-feedback text-info"><strong>Note:</strong> City, Province/State, Country</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Gender</strong> <span class="text-danger">*</span></label>
                                                        <?php
                                                            $h = 0;
                                                            foreach($gender as $g){
                                                                $h++;
                                                                
                                                                $gender_checked = $g->id == $transaction->worker->gender_id ? 'checked' : NULL;
                                                        ?>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio<?php echo $h; ?>" name="gender" class="custom-control-input" value="<?php echo $g->id; ?>" <?php echo $gender_checked; ?> data-parsley-required="true">
                                                            <label class="custom-control-label" for="customRadio<?php echo $h; ?>"><?php echo ucfirst(strtolower($g->name)); ?></label>
                                                        </div>
                                                        <?php
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Job Sector</strong> <span class="text-danger">*</span></label>
                                                        <select name="jobsector" class="form-control select2-jobsector custom-select vft-element" data-parsley-required="true">
                                                            <option value="">Select Job Sector</option>
                                                            <?php 
                                                                foreach($jobsector as $j){ 
                                                                $jobsector_selected = $transaction->worker->jobsector_id == $j->id ? 'selected' : NULL;    
                                                            ?>
                                                                <option value="<?php echo $j->id; ?>" <?php echo $jobsector_selected; ?>><?php echo $j->name; ?></option>
                                                            <?php 
                                                                } 
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Passport Number</strong> <span class="text-danger">*</span></label>
                                                        <input type="text" name="passport_number" class="form-control vft-element" placeholder="Passport Number" data-parsley-required="true" value="<?php echo strtoupper($transaction->passport->number); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Nationality</strong> <span class="text-danger">*</span></label>
                                                        <select name="nationality" class="form-control select2-nationality custom-select vft-element" data-parsley-required="true">
                                                            <option value="">Select Nationality</option>
                                                            <?php 
                                                                foreach($nationality as $c){ 
                                                                $nationality_selected = $transaction->worker->nationality_id == $c->id ? 'selected' : NULL;    
                                                            ?>
                                                                <option value="<?php echo $c->id; ?>" <?php echo $nationality_selected; ?>><?php echo $c->name; ?></option>
                                                            <?php 
                                                                } 
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            <i class="icon-calender"></i> <strong>Date Of Issue</strong> <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" name="passport_dateofissue" class="form-control vft-element datepicker-autoclose" placeholder="DD-MM-YYYY" data-parsley-required="true" value="<?php echo date('d-m-Y', strtotime($transaction->passport->issue_date)); ?>">
                                                        <small class="form-control-feedback text-info"><strong>Note:</strong> DD-MM-YYYY</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            <i class="icon-calender"></i> <strong>Date Of Expiry</strong> <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" name="passport_dateofexpiry" class="form-control vft-element datepicker-autoclose" placeholder="DD-MM-YYYY" data-parsley-required="true" value="<?php echo date('d-m-Y', strtotime($transaction->passport->expiry_date)); ?>">
                                                        <small class="form-control-feedback text-info"><strong>Note:</strong> DD-MM-YYYY</small>
                                                    </div>
                                                </div>
                                            </div>    
                                            <div class="row row-line">    
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Place Of Issue</strong> <span class="text-danger">*</span></label>
                                                        <textarea name="passport_placeofissue" class="form-control vft-element" placeholder="Place Of Issue" rows="1" data-parsley-required="true"><?php echo strtoupper($transaction->passport->issue_place); ?></textarea>
                                                        <small class="form-control-feedback text-info"><strong>Note:</strong> City, Province/State, Country</small>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="pull-right">
                                                <a class="btn btn-success" id="submit-personal">
                                                    <i class="fa fa-check"></i> Save
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Personal 2 -->
                            <div class="tab-pane" id="personal2" role="tabpanel">
                                <div class="p-20">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="m-b-20">Personal Information 2</h3>
                                        </div>
                                    </div>

                                    <form id="form-update-personal2">
                                        <div class="form-actions">
                                            <input type="hidden" name="transaction_id" value="<?php echo $transaction->id; ?>">
                                            
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Email Address</strong></label>
                                                        <input type="text" name="email" class="form-control vft-element" placeholder="Email Address" value="<?php echo $transaction->worker->email; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Home Address</strong> <span class="text-danger">*</span></label>
                                                        <textarea name="home_address" class="form-control vft-element" placeholder="Home Address" rows="2" data-parsley-required="true"><?php echo $transaction->worker->home_address; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Zip Code</strong> <span class="text-danger">*</span></label>
                                                        <input type="text" name="home_zipcode" class="form-control vft-element" placeholder="Zip Code" value="<?php echo $transaction->worker->home_zipcode; ?>" data-parsley-required="true">
                                                    </div>
                                                </div>
                                            </div>    
                                            <div class="row row-line">    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Home Phone Number</strong> <span class="text-danger">*</span></label>
                                                        <input type="text" name="home_phone" class="form-control vft-element" placeholder="Home Phone Number" value="<?php echo $transaction->worker->home_phone; ?>" data-parsley-required="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Bangladesh Mobile Number</strong> <span class="text-danger">*</span></label>
                                                        <input type="text" name="home_mobile" class="form-control vft-element" placeholder="Bangladesh Mobile Number" value="<?php echo $transaction->worker->home_mobile; ?>" data-parsley-required="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Marital Status</strong> <span class="text-danger">*</span></label>
                                                        <select name="marital_status" class="form-control select2-marital custom-select vft-element" data-parsley-required="true">
                                                            <option value="">Select Marital Status</option>
                                                            <?php 
                                                                foreach($marital as $m){ 
                                                                $marital_selected = $transaction->worker->marital_id == $m->id ? 'selected' : NULL;    
                                                            ?>
                                                                <option value="<?php echo $m->id; ?>" <?php echo $marital_selected; ?>><?php echo $m->name; ?></option>
                                                            <?php 
                                                                } 
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Number Of Children</strong></label>
                                                        <select name="children_number" class="form-control select2-children custom-select vft-element">
                                                            <?php 
                                                                for($noc = 0; $noc <= 10; $noc++){
                                                                    $children_selected = $transaction->worker->children_number == $noc ? 'selected' : NULL;    
                                                            ?>
                                                                <option value="<?php echo $noc; ?>" <?php echo $children_selected; ?>><?php echo $noc; ?></option>
                                                            <?php 
                                                                } 
                                                            ?>
                                                        </select>
                                                        <small class="form-control-feedback text-info"><strong>Note:</strong> Please specify if <strong class="text-dark">Married</strong> in <strong class="text-dark">Marital Status</strong>.</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Education</strong></label>
                                                        <?php 
                                                            $m = 0;
                                                            foreach($educationtype as $e){ 
                                                                $m++;

                                                                $education = Education::model()->findByAttributes(array(
                                                                    'worker_id' => $transaction->worker->id,
                                                                    'educationtype_id' => $e->id
                                                                ));

                                                                $education_checked = $education != NULL ? 'checked' : NULL;
                                                        ?>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="educationtype[]" class="custom-control-input" id="customCheck<?php echo $m; ?>" value="<?php echo $e->id; ?>" <?php echo $education_checked; ?>>
                                                            <label class="custom-control-label" for="customCheck<?php echo $m; ?>"><?php echo ucfirst(strtolower($e->name)); ?></label>
                                                        </div>
                                                        <?php 
                                                            } 
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Education (Other)</strong></label>
                                                        <input type="text" name="education_other" class="form-control vft-element" placeholder="Other" value="<?php echo $transaction->worker->education_other; ?>">
                                                        <small class="form-control-feedback text-info"><strong>Note:</strong> Please specify if <strong class="text-dark">Other</strong> in <strong class="text-dark">Education</strong>.</small>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Next-of-Kin</strong> <span class="text-danger">*</span></label>
                                                        <select name="nextofkin_relation" class="form-control select2-nextofkin custom-select vft-element" data-parsley-required="true">
                                                            <option value="">Select Next-of-Kin</option>
                                                            <?php 
                                                                foreach($nextofkin as $n){ 
                                                                    $nextofkin_selected = $transaction->worker->relation_id == $n->id ? 'selected' : NULL;
                                                            ?>
                                                                <option value="<?php echo $n->id; ?>" <?php echo $nextofkin_selected; ?>><?php echo $n->name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Name Of Next-of-Kin</strong> <span class="text-danger">*</span></label>
                                                        <textarea name="nextofkin_name" class="form-control vft-element" placeholder="Name Of Next-Of-Kin" rows="2" data-parsley-required="true"><?php echo $transaction->worker->kin_name; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Mobile Contact Number Of Next-of-Kin</strong> <span class="text-danger">*</span></label>
                                                        <input type="text" name="nextofkin_mobile" class="form-control vft-element" placeholder="Mobile Contact Number" value="<?php echo $transaction->worker->kin_mobile; ?>" data-parsley-required="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="pull-right">
                                                <a class="btn btn-success" id="submit-personal2">
                                                    <i class="fa fa-check"></i> Save
                                                </a>
                                            </div>
                                        </div>
                                    </form>    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row m-b-20">
                        <?php echo Helpers::fileDisplay('uploads/photos/',$transaction->guid,'Applicant'); ?>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td width="30%">Trans ID</td>
                                        <td class="font-bold"><?php echo $transaction->code; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Foreign Worker ID</td>
                                        <td class="font-bold"><?php echo $transaction->worker->code; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Full Name</td>
                                        <td class="font-bold"><?php echo $transaction->worker->full_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Passport</td>
                                        <td class="font-bold"><?php echo $transaction->passport->number; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nationality</td>
                                        <td class="font-bold"><?php echo $transaction->worker->nationality->country; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <img src="<?php echo Yii::app()->params['qrlink']; ?>/php/qr.php?d=<?php echo $transaction->guid; ?>&e=Q&t=J&size=150" class="image-qrcode" />
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>

<?php
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/datatables/jquery.dataTables.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/toast-master/js/jquery.toast.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/select2/dist/js/select2.full.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/worker/edit.js", CClientScript::POS_END);