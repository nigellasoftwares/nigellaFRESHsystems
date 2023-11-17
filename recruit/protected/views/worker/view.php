<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">View</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item"><?php echo $user->role->id == 3 ? 'Application' : 'Foreign Worker'; ?></li>
                    <li class="breadcrumb-item active">View</li>
                </ol>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="pull-right">
                <a href="<?php echo $link; ?>" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                    <i class="fa fa-arrow-circle-o-left"></i> Back To Foreign Workers
                </a>
            </div>
        <?php if($user->role->id != 3 && $_GET['pid'] == 1){ ?>    
            <div class="pull-right">
                <a href="<?php echo $link2; ?>&id=<?php echo $transaction->createdBy->profile->id; ?>" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                    <i class="fa fa-arrow-circle-o-left"></i> Back To Agent
                </a>
            </div>
        <?php } ?>    
            
            <h4 class="card-title"><span class="label label-primary"><?php echo $user->profile->company->name; ?></span></h4>
            <h4 class="card-title">View Foreign Worker Information</h4>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"> 
                        <?php echo Helpers::fileDisplayCircle('uploads/photos/',$transaction->guid,'Foreign Worker'); ?>
                        <h4 class="card-title m-t-10"><?php echo $transaction->worker->full_name; ?></h4>
                        <h6 class="card-subtitle"><?php echo $transaction->passport->number; ?></h6>
                        <h6 class="card-subtitle"><?php echo $transaction->worker->nationality->name; ?></h6>
                        <img src="<?php echo Yii::app()->params['qrlink']; ?>/php/qr.php?d=<?php echo $transaction->guid; ?>&e=Q&t=J&size=150" class="image-qrcode" />
                    </center>
                </div>
                
                <div><hr></div>
                
                <div class="card-body">
                    <ul class="nav nav-tabs information-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#information" role="tab">Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#flight" role="tab">Flight</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!-- Information -->
                        <div class="tab-pane active" id="information" role="tabpanel">
                            <div class="p-20">
                                <form id="form-update-information">
                                <?php if($user->role->id == 1 || $user->role->id == 2){ ?>    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><strong>Employer</strong></label>
                                                <select name="employer" class="form-control select2-employer custom-select vft-element" data-required="true">
                                                    <option value="">Select Employer</option>
                                                    <?php 
                                                        foreach($employer as $e){ 
                                                        $employer_selected = $transaction->employer_id == $e->id ? 'selected' : NULL;    
                                                    ?>
                                                        <option value="<?php echo $e->id; ?>" <?php echo $employer_selected; ?>><?php echo $e->company->name; ?></option>
                                                    <?php 
                                                        } 
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if($user->role->id != 3){ ?>    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label text-black font-bold">
                                                    <i class="icon-calender"></i> <strong>Date Of Arrival</strong>
                                                </label>
                                                <input type="text" name="arrival_date" class="form-control <?php echo $user->role->id == 3 || $user->role->id == 4 ? 'vft-element-readonly' : 'vft-element datepicker-autoclose'; ?>" placeholder="dd-mm-yyyy" <?php echo $user->role->id == 3 || $user->role->id == 4 ? 'readonly' : NULL; ?> value="<?php echo empty($transaction->arrival_date) ? NULL : date('d M Y', strtotime($transaction->arrival_date)); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">    
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label text-black font-bold">
                                                    <i class="icon-calender"></i> <strong>PLKS Expiry Date</strong>
                                                </label>
                                                <input type="text" name="plks_expiry_date" class="form-control <?php echo $user->role->id == 3 || $user->role->id == 4 ? 'vft-element-readonly' : 'vft-element datepicker-autoclose'; ?>" placeholder="dd-mm-yyyy" <?php echo $user->role->id == 3 || $user->role->id == 4 ? 'readonly' : NULL; ?> value="<?php echo empty($transaction->plks_expiry_date) ? NULL : date('d M Y', strtotime($transaction->plks_expiry_date)); ?>">
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label text-black font-bold"><strong>Medical & Visa</strong></label>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="medical" class="custom-control-input" id="customCheck11" value="YES" <?php echo $transaction->medical == 'YES' ? 'checked' : NULL; ?> <?php echo $user->role->id == 3 || $user->role->id == 4 ? 'disabled' : NULL; ?> />
                                                    <label class="custom-control-label" for="customCheck11">Medical</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="visa" class="custom-control-input" id="customCheck12" value="YES" <?php echo $transaction->visa == 'YES' ? 'checked' : NULL; ?> <?php echo $user->role->id == 3 || $user->role->id == 4 ? 'disabled' : NULL; ?> />
                                                    <label class="custom-control-label" for="customCheck12">Visa</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                <?php if($user->role->id == 1 || $user->role->id == 2){ ?>
                                    <div class="pull-right">
                                        <input type="hidden" name="pid" value="<?php echo $_GET['pid']; ?>">
                                        <a data-id="<?php echo $transaction->id; ?>" class="btn btn-success btn-sm" id="submit-information">
                                            <i class="fa fa-check"></i> Save
                                        </a>
                                    </div>
                                <?php } ?>    
                                    
                                </form>    
                            </div>    
                        </div>
                        <!-- Flight -->
                        <div class="tab-pane" id="flight" role="tabpanel">
                            <div class="p-20">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label text-black font-bold"><strong>Flight Number</strong></label>
                                            <input type="text" name="flight_number" class="form-control vft-element-readonly" placeholder="Flight Number" readonly="true" value="<?php echo strtoupper($transaction->flight_number); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label text-black font-bold"><strong>ETA Malaysia</strong></label>
                                            <input type="text" name="eta_malaysia" class="form-control vft-element-readonly" placeholder="ETA Malaysia" readonly="true" value="<?php echo strtoupper($transaction->eta_malaysia); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label text-black font-bold">
                                                <i class="icon-calender"></i> <strong>Flight Date</strong>
                                            </label>
                                            <input type="text" name="flight_date" class="form-control vft-element-readonly" placeholder="dd-mm-yyyy" readonly="true" value="<?php echo empty($transaction->flight_date) ? NULL : date('d M Y', strtotime($transaction->flight_date)); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
                
                <div><hr></div>
                
                <div class="card-body"> 
                    <small class="text-muted">Transaction ID</small>
                    <h6 class="text-black font-bold"><?php echo $transaction->code; ?></h6>
                    <small class="text-muted">Foreign Worker ID</small>
                    <h6 class="text-black font-bold"><?php echo $transaction->worker->code; ?></h6> 
                    <small class="text-muted p-t-30 db">Phone</small>
                    <h6 class="text-black font-bold"><?php echo $transaction->worker->home_mobile; ?></h6> 
                    <small class="text-muted p-t-30 db">Address</small>
                    <h6 class="text-black font-bold"><?php echo $transaction->worker->home_address; ?></h6>
                    <small class="text-muted p-t-30 db">Zip Code</small>
                    <h6 class="text-black font-bold"><?php echo $transaction->worker->home_zipcode; ?></h6>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#nextofkin" role="tab">Next-of-Kin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#passport" role="tab">Passport</a>
                    </li>
                <?php if($user->role->id != 3){ ?>    
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#agent" role="tab">Agent</a>
                    </li>
                <?php } ?>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Personal -->
                    <div class="tab-pane active" id="personal" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <h3 class="m-b-20">Personal Information</h3>
                                    
                                    <form id="form-view-worker">
                                        <div class="form-actions">
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Full Name</strong></label>
                                                        <input type="text" name="fullname" class="form-control vft-element-readonly" placeholder="Full Name" readonly="true" value="<?php echo strtoupper($transaction->worker->full_name); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>First Name</strong></label>
                                                        <input type="text" name="firstname" class="form-control vft-element-readonly" placeholder="First Name" readonly="true" value="<?php echo strtoupper($transaction->worker->first_name); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Middle Name</strong></label>
                                                        <input type="text" name="middlename" class="form-control vft-element-readonly" placeholder="Middle Name" readonly="true" value="<?php echo strtoupper($transaction->worker->middle_name); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Last Name</strong></label>
                                                        <input type="text" name="lastname" class="form-control vft-element-readonly" placeholder="Last Name" readonly="true" value="<?php echo strtoupper($transaction->worker->last_name); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Gender</strong></label>
                                                        <?php
                                                            $h = 0;
                                                            foreach($gender as $g){
                                                                $h++;
                                                                
                                                                $gender_checked = $g->id == $transaction->worker->gender_id ? 'checked' : NULL;
                                                        ?>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio<?php echo $h; ?>" name="gender" class="custom-control-input" value="<?php echo $g->id; ?>" <?php echo $gender_checked; ?> disabled="true">
                                                            <label class="custom-control-label" for="customRadio<?php echo $h; ?>"><?php echo ucfirst(strtolower($g->name)); ?></label>
                                                        </div>
                                                        <?php
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Date Of Birth</strong></label>
                                                        <div class="input-group">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="icon-calender"></i></span>
                                                            </div>
                                                            <input type="text" name="dateofbirth" class="form-control vft-element-readonly" placeholder="DD-MM-YYYY" readonly="true" value="<?php echo date('d M Y',strtotime($transaction->worker->birth_date)); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Place Of Birth</strong></label>
                                                        <textarea name="placeofbirth" class="form-control vft-element-readonly" placeholder="Place Of Birth" readonly="true"><?php echo strtoupper($transaction->worker->birth_place); ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Passport Number</strong></label>
                                                        <input type="text" name="passport_number" class="form-control vft-element-readonly" placeholder="Passport Number" readonly="true" value="<?php echo strtoupper($transaction->passport->number); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>National Card ID Number</strong></label>
                                                        <input type="text" name="national_card_number" class="form-control vft-element-readonly" placeholder="National Card ID Number" readonly="true" value="<?php echo strtoupper($transaction->worker->national_card); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Nationality</strong></label>
                                                        <input type="text" name="nationality" class="form-control vft-element-readonly" placeholder="Nationality" readonly="true" value="<?php echo $transaction->worker->nationality->name; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Date Of Issue</strong></label>
                                                        <div class="input-group">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="icon-calender"></i></span>
                                                            </div>
                                                            <input type="text" name="passport_dateofissue" class="form-control vft-element-readonly" placeholder="DD-MM-YYYY" readonly="true" value="<?php echo date('d M Y', strtotime($transaction->passport->issue_date)); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Place Of Issue</strong></label>
                                                        <textarea name="passport_placeofissue" class="form-control vft-element-readonly" placeholder="Place Of Issue" rows="1" readonly="true"><?php echo strtoupper($transaction->passport->issue_place); ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Date Of Expiry</strong></label>
                                                        <div class="input-group">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="icon-calender"></i></span>
                                                            </div>
                                                            <input type="text" name="passport_dateofexpiry" class="form-control vft-element-readonly" placeholder="DD-MM-YYYY" readonly="true" value="<?php echo date('d M Y', strtotime($transaction->passport->expiry_date)); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Job Sector</strong></label>
                                                        <input type="text" name="jobsector" class="form-control vft-element-readonly" placeholder="Job Sector" readonly="true" value="<?php echo $transaction->worker->jobsector->name; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Email Address</strong></label>
                                                        <input type="text" name="email" class="form-control vft-element-readonly" placeholder="Email Address" value="<?php echo $transaction->worker->email; ?>" readonly="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Home Address</strong></label>
                                                        <textarea name="home_address" class="form-control vft-element-readonly" placeholder="Home Address" rows="2" readonly="true"><?php echo strtoupper($transaction->worker->home_address); ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Zip Code</strong></label>
                                                        <input type="text" name="home_zipcode" class="form-control vft-element-readonly" placeholder="Zip Code" value="<?php echo $transaction->worker->home_zipcode; ?>" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Home Phone Number</strong></label>
                                                        <input type="text" name="home_phone" class="form-control vft-element-readonly" placeholder="Home Phone Number" value="<?php echo $transaction->worker->home_phone; ?>" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Bangladesh Mobile Number</strong></label>
                                                        <input type="text" name="home_mobile" class="form-control vft-element-readonly" placeholder="Bangladesh Mobile Number" value="<?php echo $transaction->worker->home_mobile; ?>" readonly="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Marital Status</strong></label>
                                                        <input type="text" name="marital_status" class="form-control vft-element-readonly" placeholder="Marital Status" value="<?php echo $transaction->worker->marital->name; ?>" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Number Of Children</strong></label>
                                                        <input type="text" name="children_number" class="form-control vft-element-readonly" placeholder="Number Of Children" readonly="true" value="<?php echo $transaction->worker->children_number; ?>">
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
                                                            <input type="checkbox" name="educationtype[]" class="custom-control-input" id="customCheck<?php echo $m; ?>" value="<?php echo $e->id; ?>" <?php echo $education_checked; ?> disabled="true">
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
                                                        <input type="text" name="education_other" class="form-control vft-element-readonly" placeholder="Other" readonly="true" value="<?php echo empty($transaction->worker->education_other) ? NULL : strtoupper($transaction->worker->education_other); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Next Of Kin -->
                    <div class="tab-pane" id="nextofkin" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="m-b-20">Next-of-Kin Information</h3>

                                        <form id="form-view-nextofkin">
                                            <div class="form-actions">
                                                <div class="row row-line">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label"><strong>Next-of-Kin</strong></label>
                                                            <input type="text" name="nextofkin_relation" class="form-control vft-element-readonly" placeholder="Next-of-Kin" readonly="true" value="<?php echo strtoupper($transaction->worker->relation->name); ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row row-line">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label"><strong>Name Of Next-of-Kin</strong></label>
                                                            <input type="text" name="nextofkin_name" class="form-control vft-element-readonly" placeholder="Name Of Next-of-Kin" readonly="true" value="<?php echo strtoupper($transaction->worker->kin_name); ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row row-line">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label"><strong>Mobile Contact Number Of Next-of-Kin</strong></label>
                                                            <input type="text" name="nextofkin_mobile" class="form-control vft-element-readonly" placeholder="Mobile Contact Number Of Next-of-Kin" readonly="true" value="<?php echo strtoupper($transaction->worker->kin_mobile); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                    
                    <!-- Passport -->
                    <div class="tab-pane" id="passport" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <h3 class="m-b-20">Passport Information</h3>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php echo Helpers::fileDisplayPassport('uploads/passports/',$transaction->guid,'Applicant'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Agent -->
                    <div class="tab-pane" id="agent" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <form id="form-view-agent">
                                        <div class="form-actions">
                                            <h3 class="m-b-20">Agent Information</h3>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Agent ID</strong></label>
                                                        <input type="text" name="agent_id" class="form-control vft-element-readonly" placeholder="Agent ID" readonly="true" value="<?php echo strtoupper($transaction->createdBy->profile->code); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Full Name</strong></label>
                                                        <input type="text" name="full_name" class="form-control vft-element-readonly" placeholder="Full Name" readonly="true" value="<?php echo strtoupper($transaction->createdBy->profile->fullname); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Contact Number 1</strong></label>
                                                        <input type="text" name="contact_number1" class="form-control vft-element-readonly" placeholder="Contact Number 1" readonly="true" value="<?php echo strtoupper($transaction->createdBy->profile->contact_number1); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Contact Number 2</strong></label>
                                                        <input type="text" name="contact_number2" class="form-control vft-element-readonly" placeholder="Contact Number 2" readonly="true" value="<?php echo strtoupper($transaction->createdBy->profile->contact_number2); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Mobile Number 1</strong></label>
                                                        <input type="text" name="mobile_number1" class="form-control vft-element-readonly" placeholder="Mobile Number 1" readonly="true" value="<?php echo strtoupper($transaction->createdBy->profile->mobile_number1); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Mobile Number 2</strong></label>
                                                        <input type="text" name="mobile_number2" class="form-control vft-element-readonly" placeholder="Mobile Number 2" readonly="true" value="<?php echo strtoupper($transaction->createdBy->profile->mobile_number2); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Email Address</strong></label>
                                                        <input type="text" name="email_address" class="form-control vft-element-readonly" placeholder="Email Address" readonly="true" value="<?php echo $transaction->createdBy->profile->email; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <h3 class="m-b-20">Company Information</h3>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Company ID</strong></label>
                                                        <input type="text" name="company_id" class="form-control vft-element-readonly" placeholder="Company ID" readonly="true" value="<?php echo $transaction->createdBy->profile->company->code; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Company Name</strong></label>
                                                        <input type="text" name="company_name" class="form-control vft-element-readonly" placeholder="Company Name" readonly="true" value="<?php echo $transaction->createdBy->profile->company->name; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Company Address</strong></label>
                                                        <textarea name="company_address" class="form-control vft-element-readonly" placeholder="Address" rows="2" readonly="true"><?php echo strtoupper($transaction->createdBy->profile->company->address); ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Zip Code</strong></label>
                                                        <input type="text" name="company_zipcode" class="form-control vft-element-readonly" placeholder="Zip Code" value="<?php echo $transaction->createdBy->profile->company->postcode; ?>" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Contact Number 1</strong></label>
                                                        <input type="text" name="company_contact_number1" class="form-control vft-element-readonly" placeholder="Contact Number 1" value="<?php echo $transaction->createdBy->profile->company->contact_number1; ?>" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Contact Number 2</strong></label>
                                                        <input type="text" name="company_contact_number2" class="form-control vft-element-readonly" placeholder="Contact Number 2" value="<?php echo $transaction->createdBy->profile->company->contact_number2; ?>" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Email Address</strong></label>
                                                        <input type="text" name="company_email_address" class="form-control vft-element-readonly" placeholder="Email Address" readonly="true" value="<?php echo $transaction->createdBy->profile->company->email; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <h3 class="m-b-20">Person In Charge Information</h3>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Person In Charge Name</strong></label>
                                                        <input type="text" name="person_name" class="form-control vft-element-readonly" placeholder="Person In Charge Name" readonly="true" value="<?php echo $transaction->createdBy->profile->company->person_incharge; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Mobile Number 1</strong></label>
                                                        <input type="text" name="person_mobile_number1" class="form-control vft-element-readonly" placeholder="Contact Number 1" value="<?php echo $transaction->createdBy->profile->company->mobile_number1; ?>" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Mobile Number 2</strong></label>
                                                        <input type="text" name="person_mobile_number2" class="form-control vft-element-readonly" placeholder="Contact Number 2" value="<?php echo $transaction->createdBy->profile->company->mobile_number2; ?>" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Email Address</strong></label>
                                                        <input type="text" name="person_email_address" class="form-control vft-element-readonly" placeholder="Email Address" readonly="true" value="<?php echo $transaction->createdBy->profile->company->person_email; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>       
</div>

<?php
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/toast-master/js/jquery.toast.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/select2/dist/js/select2.full.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/worker/view.js", CClientScript::POS_END);