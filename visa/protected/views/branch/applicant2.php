<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Application</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Branch</li>
                    <li class="breadcrumb-item active">Application</li>
                </ol>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="pull-right">
                <a href="index.php?r=Branch/ApplicationBatch&id=<?php echo $applicant->batch_id; ?>" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                    <i class="fa fa-arrow-circle-o-left"></i> View Batch Applicants
                </a>
            </div>
            
            <h4 class="card-title">Application Batch <span class="label label-primary"><?php echo $applicant->batch->batch_guid; ?></span></h4>
            <h6 class="card-subtitle">Continue Register Visa Applicant</h6>
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
                            <li class="nav-item <?php echo $sign['occupation']; ?>"> 
                                <a class="nav-link" data-toggle="tab" href="#occupation" role="tab">
                                    <span class="hidden-sm-up"><i class="fa fa-briefcase"></i></span> 
                                    <span class="hidden-xs-down">Occupation</span>
                                </a> 
                            </li>
                            <li class="nav-item <?php echo $sign['family']; ?>"> 
                                <a class="nav-link" data-toggle="tab" href="#family" role="tab">
                                    <span class="hidden-sm-up"><i class="fa fa-users"></i></span> 
                                    <span class="hidden-xs-down">Family</span>
                                </a> 
                            </li>
                            <li class="nav-item <?php echo $sign['emergency']; ?>"> 
                                <a class="nav-link" data-toggle="tab" href="#emergency" role="tab">
                                    <span class="hidden-sm-up"><i class="fa fa-ambulance"></i></span> 
                                    <span class="hidden-xs-down">Emergency</span>
                                </a> 
                            </li>
                            <li class="nav-item <?php echo $sign['travel']; ?>"> 
                                <a class="nav-link" data-toggle="tab" href="#travel" role="tab">
                                    <span class="hidden-sm-up">
                                        <i class="fa fa-plane"></i></span> 
                                        <span class="hidden-xs-down">Travel</span>
                                </a> 
                            </li>
                            <li class="nav-item <?php echo $sign['other']; ?>"> 
                                <a class="nav-link" data-toggle="tab" href="#other" role="tab">
                                    <span class="hidden-sm-up">
                                        <i class="fa fa-paperclip"></i></span> 
                                        <span class="hidden-xs-down">Other</span>
                                </a> 
                            </li>
                            <li class="nav-item <?php echo $sign['declaration']; ?>"> 
                                <a class="nav-link" data-toggle="tab" href="#declare" role="tab">
                                    <span class="hidden-sm-up">
                                        <i class="ti-marker-alt"></i></span> 
                                        <span class="hidden-xs-down">Declaration</span>
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
                                            <input type="hidden" name="applicant_id" value="<?php echo $applicant->id; ?>">
                                            <input type="hidden" name="batch_id" value="<?php echo $applicant->batch_id; ?>">

                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Full Name</strong> <span class="text-danger">*</span></label>
                                                        <input type="text" name="fullname" class="form-control vft-element" placeholder="Full Name" value="<?php echo $applicant->full_name; ?>" data-required="true">
                                                        <small class="form-control-feedback text-info"><strong>Note:</strong> Full name as in passport.</small> 
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Photo Upload</strong></label>
                                                        <input type="file" name="upload_photo" class="form-control vft-element">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>First Name</strong> <span class="text-danger">*</span></label>
                                                        <input type="text" name="firstname" class="form-control vft-element" placeholder="First Name" value="<?php echo $applicant->first_name; ?>" data-required="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Citizen Number</strong> <span class="text-danger">*</span></label></label>
                                                        <input type="text" name="citizen_number" class="form-control vft-element" placeholder="Citizen Number" data-required="true" value="<?php echo strtoupper($applicant->national_number); ?>">
                                                        <small class="form-control-feedback text-info"><strong>Note:</strong> National Card ID</small> 
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Middle Name</strong> <span class="text-danger">*</span></label>
                                                        <input type="text" name="middlename" class="form-control vft-element" placeholder="Middle Name" value="<?php echo $applicant->middle_name; ?>" data-required="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Passport Number</strong> <span class="text-danger">*</span></label>
                                                        <input type="text" name="passport_number" class="form-control vft-element" placeholder="Passport Number" data-required="true" value="<?php echo strtoupper($applicant->passport_number); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Last Name</strong> <span class="text-danger">*</span></label>
                                                        <input type="text" name="lastname" class="form-control vft-element" placeholder="Last Name" value="<?php echo $applicant->last_name; ?>" data-required="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Date Of Birth</strong> <span class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="icon-calender"></i></span>
                                                            </div>
                                                            <input type="text" name="dateofbirth" class="form-control vft-element datepicker-autoclose" placeholder="DD-MM-YYYY" data-required="true" value="<?php echo date('d M Y',strtotime($applicant->birth_date)); ?>">
                                                        </div>
                                                        <small class="form-control-feedback text-info"><strong>Note:</strong> DD-MM-YYYY</small>
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
                                                                
                                                                $gender_checked = $g->id == $applicant->gender_id ? 'checked' : NULL;
                                                        ?>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio<?php echo $h; ?>" name="gender" class="custom-control-input" value="<?php echo $g->id; ?>" <?php echo $gender_checked; ?> data-required="true">
                                                            <label class="custom-control-label" for="customRadio<?php echo $h; ?>"><?php echo ucfirst(strtolower($g->name)); ?></label>
                                                        </div>
                                                        <?php
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Place Of Birth</strong> <span class="text-danger">*</span></label>
                                                        <textarea name="placeofbirth" class="form-control vft-element" placeholder="Place Of Birth" data-required="true"><?php echo strtoupper($applicant->birth_place); ?></textarea>
                                                        <small class="form-control-feedback text-info"><strong>Note:</strong> City, Province/State, Country</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Current Nationality</strong> <span class="text-danger">*</span></label>
                                                        <select name="current_nationality" class="form-control select2-currentnationality custom-select vft-element" data-required="true">
                                                            <option value="">Select Current Nationality</option>
                                                            <?php 
                                                                foreach($cnationality as $c){ 
                                                                $cnationality_selected = $applicant->current_nationality_id == $c->id ? 'selected' : NULL;    
                                                            ?>
                                                                <option value="<?php echo $c->id; ?>" <?php echo $cnationality_selected; ?>><?php echo $c->name; ?></option>
                                                            <?php 
                                                                } 
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Former Nationality</strong></label>
                                                        <select name="former_nationality" class="form-control select2-formernationality custom-select vft-element">
                                                            <option value="">Select Former Nationality</option>
                                                            <?php 
                                                                foreach($fnationality as $f){ 
                                                                $fnationality_selected = $applicant->former_nationality_id == $f->id ? 'selected' : NULL;    
                                                            ?>
                                                                <option value="<?php echo $f->id; ?>" <?php echo $fnationality_selected; ?>><?php echo $f->name; ?></option>
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
                                                        <label class="control-label"><strong>Passport Type</strong> <span class="text-danger">*</span></label>
                                                        <select name="passport_type" class="form-control select2-passporttype custom-select vft-element" data-required="true">
                                                            <option value="">Select Passport Type</option>
                                                            <?php 
                                                                foreach($passport as $p){ 
                                                                $passport_selected = $applicant->passport_id == $p->id ? 'selected' : NULL;    
                                                            ?>
                                                                <option value="<?php echo $p->id; ?>" <?php echo $passport_selected; ?>><?php echo $p->name; ?></option>
                                                            <?php 
                                                                } 
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Passport Type (Other)</strong></label>
                                                        <input type="text" name="passport_other" class="form-control vft-element" placeholder="Other" value="<?php echo strtoupper($applicant->passport_other); ?>">
                                                        <small class="form-control-feedback text-info"><strong>Note:</strong> Please specify if <strong class="text-dark">Other</strong> in <strong class="text-dark">Passport Type</strong>.</small> 
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Date Of Issue</strong> <span class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="icon-calender"></i></span>
                                                            </div>
                                                            <input type="text" name="passport_dateofissue" class="form-control vft-element datepicker-autoclose" placeholder="DD-MM-YYYY" data-required="true" value="<?php echo date('d M Y', strtotime($applicant->passport_issue_date)); ?>">
                                                        </div>
                                                        <small class="form-control-feedback text-info"><strong>Note:</strong> DD-MM-YYYY</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Date Of Expiry</strong> <span class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="icon-calender"></i></span>
                                                            </div>
                                                            <input type="text" name="passport_dateofexpiry" class="form-control vft-element datepicker-autoclose" placeholder="DD-MM-YYYY" data-required="true" value="<?php echo date('d M Y', strtotime($applicant->passport_expiry_date)); ?>">
                                                        </div>
                                                        <small class="form-control-feedback text-info"><strong>Note:</strong> DD-MM-YYYY</small>
                                                    </div>
                                                </div>
                                            </div>    
                                            <div class="row row-line">    
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Place Of Issue</strong> <span class="text-danger">*</span></label>
                                                        <textarea name="passport_placeofissue" class="form-control vft-element" placeholder="Place Of Issue" rows="1" data-required="true"><?php echo strtoupper($applicant->passport_issue_place); ?></textarea>
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
                                            <input type="hidden" name="applicant_id" value="<?php echo $applicant->id; ?>">
                                            <input type="hidden" name="batch_id" value="<?php echo $applicant->batch_id; ?>">

                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Education</strong> <span class="text-danger">*</span></label>
                                                        <?php 
                                                            $m = 0;
                                                            foreach($educationtype as $e){ 
                                                                $m++;

                                                                $education = Education::model()->findByAttributes(array(
                                                                    'applicant_id' => $applicant->id,
                                                                    'educationtype_id' => $e->id
                                                                ));

                                                                $education_checked = $education != NULL ? 'checked' : NULL;
                                                        ?>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="educationtype[]" class="custom-control-input" id="customCheck<?php echo $m; ?>" value="<?php echo $e->id; ?>" <?php echo $education_checked; ?> data-required="true">
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
                                                        <input type="text" name="education_other" class="form-control vft-element" placeholder="Other" value="<?php echo $applicant->education_other; ?>">
                                                        <small class="form-control-feedback text-info"><strong>Note:</strong> Please specify if <strong class="text-dark">Other</strong> in <strong class="text-dark">Education</strong>.</small>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Email Address</strong> <span class="text-danger">*</span></label>
                                                        <input type="text" name="email" class="form-control vft-element" placeholder="Email Address" value="<?php echo $applicant->email; ?>" data-required="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Employer/School Name</strong> <span class="text-danger">*</span></label>
                                                        <textarea name="employer_name" class="form-control vft-element" placeholder="Employer/School Name" rows="2" data-required="true"><?php echo $applicant->employer_name; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Address</strong> <span class="text-danger">*</span></label>
                                                        <textarea name="employer_address" class="form-control vft-element" placeholder="Address" rows="2" data-required="true"><?php echo $applicant->employer_address; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Zip Code</strong> <span class="text-danger">*</span></label>
                                                        <input type="text" name="employer_zipcode" class="form-control vft-element" placeholder="Zip Code" value="<?php echo $applicant->employer_zipcode; ?>" data-required="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Phone Number</strong> <span class="text-danger">*</span></label>
                                                        <input type="text" name="employer_phone" class="form-control vft-element" placeholder="Phone Number" value="<?php echo $applicant->employer_phone; ?>" data-required="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Home Address</strong> <span class="text-danger">*</span></label>
                                                        <textarea name="home_address" class="form-control vft-element" placeholder="Address" rows="2" data-required="true"><?php echo $applicant->home_address; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Zip Code</strong> <span class="text-danger">*</span></label>
                                                        <input type="text" name="home_zipcode" class="form-control vft-element" placeholder="Zip Code" value="<?php echo $applicant->home_zipcode; ?>" data-required="true">
                                                    </div>
                                                </div>
                                            </div>    
                                            <div class="row row-line">    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Phone Number</strong> <span class="text-danger">*</span></label>
                                                        <input type="text" name="home_phone" class="form-control vft-element" placeholder="Phone Number" value="<?php echo $applicant->home_phone; ?>" data-required="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Mobile Number</strong> <span class="text-danger">*</span></label>
                                                        <input type="text" name="home_mobile" class="form-control vft-element" placeholder="Mobile Number" value="<?php echo $applicant->home_mobile; ?>" data-required="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Marital Status</strong> <span class="text-danger">*</span></label>
                                                        <select name="marital_status" class="form-control select2-marital custom-select vft-element" data-required="true">
                                                            <option value="">Select Marital Status</option>
                                                            <?php 
                                                                foreach($marital as $m){ 
                                                                $marital_selected = $applicant->marital_id == $m->id ? 'selected' : NULL;    
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
                                                        <label class="control-label"><strong>Marital Status (Other)</strong></label>
                                                        <input type="text" name="marital_other" class="form-control vft-element" placeholder="Other" value="<?php echo $applicant->marital_other; ?>">
                                                        <small class="form-control-feedback text-info"><strong>Note:</strong> Please specify if <strong class="text-dark">Other</strong> in <strong class="text-dark">Marital Status</strong>.</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Location When Applying For This Visa</strong> <span class="text-danger">*</span></label>
                                                        <input type="text" name="location_visa_apply" class="form-control vft-element" placeholder="Other" value="<?php echo $applicant->location_visa_apply; ?>" data-required="true">
                                                        <small class="form-control-feedback text-info"><strong>Note:</strong> Country or territory where the applicant is located when applying for this visa.</small>
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

                            <!-- Occupation -->
                            <div class="tab-pane" id="occupation" role="tabpanel">
                                <div class="p-20">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="m-b-20">Occupation Information</h3>
                                        </div>
                                    </div>

                                    <form id="form-update-occupation">
                                        <div class="form-actions">
                                            <input type="hidden" name="applicant_id" value="<?php echo $applicant->id; ?>">
                                            <input type="hidden" name="batch_id" value="<?php echo $applicant->batch_id; ?>">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="pull-right">
                                                        <a class="btn btn-info d-none d-lg-block m-l-15 text-white occupation-new" data-id="<?php echo $applicant->id; ?>">
                                                            <i class="fa fa-plus-circle"></i> Add Occupation
                                                        </a>
                                                    </div>

                                                    <div class="table-responsive">
                                                        <table id="table-application-occupation" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Occupation</th>
                                                                    <th>Position</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                                $i = 0;
                                                                foreach($occupation as $o){
                                                                    $i++;
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $i; ?></td>
                                                                    <td><?php echo $o->occupationtype->name; ?></td>
                                                                    <td><?php echo $o->position; ?></td>
                                                                    <td>
                                                                        <a class="btn btn-sm waves-effect waves-light btn-danger text-white occupation-delete disabled" data-id="<?php echo $o->id; ?>" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                                }
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>    
                                            </div>

                                        </div>
                                    </form>    
                                </div>
                            </div>

                            <!-- Family -->
                            <div class="tab-pane" id="family" role="tabpanel">
                                <div class="p-20">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="m-b-20">Family Information</h3>
                                        </div>
                                    </div>

                                    <form id="form-update-family">
                                        <div class="form-actions">
                                            <input type="hidden" name="applicant_id" value="<?php echo $applicant->id; ?>">
                                            <input type="hidden" name="batch_id" value="<?php echo $applicant->batch_id; ?>">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="pull-right">
                                                        <a class="btn btn-info d-none d-lg-block m-l-15 text-white family-new" data-id="<?php echo $applicant->id; ?>">
                                                            <i class="fa fa-plus-circle"></i> Add Family
                                                        </a>
                                                    </div>

                                                    <div class="table-responsive">
                                                        <table id="table-application-family" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Name</th>
                                                                    <th>Nationality</th>
                                                                    <th>Occupation</th>
                                                                    <th>Relationship</th>
                                                                    <th width="5%">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                                $j = 0;
                                                                foreach($family as $f){
                                                                    $j++;
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $j; ?></td>
                                                                    <td><?php echo $f->name; ?></td>
                                                                    <td><?php echo $f->nationality->name; ?></td>
                                                                    <td><?php echo $f->occupationtype->name; ?></td>
                                                                    <td><?php echo $f->relationship->name; ?></td>
                                                                    <td>
                                                                        <a class="btn btn-sm waves-effect waves-light btn-danger text-white family-delete disabled" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                                }
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>    
                                            </div>

                                        </div>
                                    </form>    
                                </div>
                            </div>

                            <!-- Emergency -->
                            <div class="tab-pane" id="emergency" role="tabpanel">
                                <div class="p-20">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="m-b-20">Emergency Contact Information</h3>
                                        </div>
                                    </div>

                                    <form id="form-update-emergency">
                                        <div class="form-actions">
                                            <input type="hidden" name="applicant_id" value="<?php echo $applicant->id; ?>">
                                            <input type="hidden" name="batch_id" value="<?php echo $applicant->batch_id; ?>">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="pull-right">
                                                        <a class="btn btn-info d-none d-lg-block m-l-15 text-white emergency-new" data-id="<?php echo $applicant->id; ?>">
                                                            <i class="fa fa-plus-circle"></i> Add Emergency Contact
                                                        </a>
                                                    </div>

                                                    <div class="table-responsive">
                                                        <table id="table-application-emergency" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Name</th>
                                                                    <th>Phone Number</th>
                                                                    <th>Mobile Number</th>
                                                                    <th>Relationship</th>
                                                                    <th width="5%">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                                $k = 0;
                                                                foreach($emergency as $e){
                                                                    $k++;
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $k; ?></td>
                                                                    <td><?php echo strtoupper($e->name); ?></td>
                                                                    <td><?php echo $e->phone; ?></td>
                                                                    <td><?php echo $e->mobile; ?></td>
                                                                    <td><?php echo $e->relationship->name; ?></td>
                                                                    <td>
                                                                        <a class="btn btn-sm waves-effect waves-light btn-danger text-white emergency-delete disabled" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                                }
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>    
                                            </div>

                                        </div>
                                    </form>    
                                </div>
                            </div>

                            <!-- Travel -->
                            <div class="tab-pane" id="travel" role="tabpanel">
                                <div class="p-20">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="m-b-20">Travel Information</h3>
                                        </div>
                                    </div>

                                    <form id="form-update-travel">
                                        <div class="form-actions">
                                            <input type="hidden" name="applicant_id" value="<?php echo $applicant->id; ?>">
                                            <input type="hidden" name="batch_id" value="<?php echo $applicant->batch_id; ?>">

                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Purpose Of Visit</strong> <span class="text-danger">*</span></label>
                                                        <?php 
                                                            $n = 0;
                                                            foreach($purposevisit as $p){ 
                                                                $n++;
                                                        ?>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio1<?php echo $n; ?>" name="purposevisit" class="custom-control-input" value="<?php echo $p->id; ?>" <?php echo $applicant->purposevisit_id == $p->id ? 'checked' : NULL; ?> data-required="true">
                                                            <label class="custom-control-label" for="customRadio1<?php echo $n; ?>"><?php echo ucfirst(strtolower($p->name)); ?></label>
                                                        </div>
                                                        <?php 
                                                            } 
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Purpose Of Visit (Other)</strong></label>
                                                        <textarea name="purposevisit_other" class="form-control vft-element" placeholder="Other" rows="2"><?php echo strtoupper($applicant->purposevisit_other); ?></textarea>
                                                        <small class="form-control-feedback text-info"><strong>Note:</strong> Please specify if <strong class="text-dark">Other</strong> in <strong class="text-dark">Purpose Of Visit</strong>.</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="pull-right">
                                                <a class="btn btn-success" id="submit-travel">
                                                    <i class="fa fa-check"></i> Save
                                                </a>
                                            </div>
                                        </div>
                                    </form>    
                                </div>
                            </div>

                            <!-- Other -->
                            <div class="tab-pane" id="other" role="tabpanel">
                                <div class="p-20">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="m-b-20">Other Information</h3>
                                        </div>
                                    </div>

                                    <form id="form-update-other">
                                        <div class="form-actions">
                                            <input type="hidden" name="applicant_id" value="<?php echo $applicant->id; ?>">
                                            <input type="hidden" name="batch_id" value="<?php echo $applicant->batch_id; ?>">

                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>&nbsp;</th>
                                                            <th>YES</th>
                                                            <th>NO</th>
                                                            <th>Please specify if <strong>YES</strong>.</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Have you ever overstayed your visa or residence permit in Malaysia?</td>
                                                            <td><input type="radio" name="visa_overstayed" class="form-control" value="YES" <?php echo $applicant->visa_overstayed == 'YES' ? 'checked' : NULL; ?> data-required="true"></td>
                                                            <td><input type="radio" name="visa_overstayed" class="form-control" value="NO" <?php echo $applicant->visa_overstayed == 'NO' ? 'checked' : NULL; ?> data-required="true"></td>
                                                            <td><textarea name="visa_overstayed_detail" class="form-control vft-element" placeholder="Detail" rows="2"><?php echo strtoupper($applicant->visa_overstayed_detail); ?></textarea></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Have you ever been refused a visa for Malaysia, or been refused entry into Malaysia?</td>
                                                            <td><input type="radio" name="visa_refused" class="form-control" value="YES" <?php echo $applicant->visa_refused == 'YES' ? 'checked' : NULL; ?> data-required="true"></td>
                                                            <td><input type="radio" name="visa_refused" class="form-control" value="NO" <?php echo $applicant->visa_refused == 'NO' ? 'checked' : NULL; ?> data-required="true"></td>
                                                            <td><textarea name="visa_refused_detail" class="form-control vft-element" placeholder="Detail" rows="2"><?php echo strtoupper($applicant->visa_refused_detail); ?></textarea></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Do you have any criminal record in Malaysia or any other country?</td>
                                                            <td><input type="radio" name="visa_criminal" class="form-control" value="YES" <?php echo $applicant->visa_criminal == 'YES' ? 'checked' : NULL; ?> data-required="true"></td>
                                                            <td><input type="radio" name="visa_criminal" class="form-control" value="NO" <?php echo $applicant->visa_criminal == 'NO' ? 'checked' : NULL; ?> data-required="true"></td>
                                                            <td><textarea name="visa_criminal_detail" class="form-control vft-element" placeholder="Detail" rows="2"><?php echo strtoupper($applicant->visa_criminal_detail); ?></textarea></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Are you experiencing any of the following conditions?
                                                                <ul>
                                                                    <li>Serious mental disorder</li>
                                                                    <li>Infectious pulmonary tuberculosis</li>
                                                                    <li>Other infectious disease of public health hazards</li>
                                                                </ul>
                                                            </td>
                                                            <td><input type="radio" name="visa_condition" class="form-control" value="YES" <?php echo $applicant->visa_condition == 'YES' ? 'checked' : NULL; ?> data-required="true"></td>
                                                            <td><input type="radio" name="visa_condition" class="form-control" value="NO" <?php echo $applicant->visa_condition == 'NO' ? 'checked' : NULL; ?> data-required="true"></td>
                                                            <td><textarea name="visa_condition_detail" class="form-control vft-element" placeholder="Detail" rows="2"><?php echo strtoupper($applicant->visa_condition_detail); ?></textarea></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Did you visit countries or territories affected by infectious diseases in the last 30 days?</td>
                                                            <td><input type="radio" name="visa_disease" class="form-control" value="YES" <?php echo $applicant->visa_disease == 'YES' ? 'checked' : NULL; ?> data-required="true"></td>
                                                            <td><input type="radio" name="visa_disease" class="form-control" value="NO" <?php echo $applicant->visa_disease == 'NO' ? 'checked' : NULL; ?> data-required="true"></td>
                                                            <td><textarea name="visa_disease_detail" class="form-control vft-element" placeholder="Detail" rows="2"><?php echo strtoupper($applicant->visa_disease_detail); ?></textarea></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>More Information</strong></label>
                                                        <textarea name="visa_other_detail" class="form-control vft-element" placeholder="Other" rows="2"><?php echo strtoupper($applicant->visa_other_detail); ?></textarea>
                                                        <small class="form-control-feedback text-info"><strong>Note:</strong> If you have more information about your visa application other than the above to declare, please give details above.</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="pull-right">
                                                <a class="btn btn-success" id="submit-other">
                                                    <i class="fa fa-check"></i> Save
                                                </a>
                                            </div>
                                        </div>
                                    </form>    
                                </div>
                            </div>

                            <!-- Declare -->
                            <div class="tab-pane" id="declare" role="tabpanel">
                                <div class="p-20">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="m-b-20">Declaration</h3>
                                        </div>
                                    </div>

                                    <form id="form-update-declare">
                                        <div class="form-actions">
                                            <input type="hidden" name="applicant_id" value="<?php echo $applicant->id; ?>">
                                            <input type="hidden" name="batch_id" value="<?php echo $applicant->batch_id; ?>">

                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td>I hereby declare that I have read and understood all the questions in this 
                                                                application and shall bear all the legal consequences for the authencity of 
                                                                the informations and materials I provided.
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>I understand that whether to issue a visa, type of visa, number of entries, 
                                                                validity and duration of each stay will be determined by consular official, 
                                                                and that any false, misleading or incomplete statement may result in the 
                                                                refusal of a visa for or denial of entry into Malaysia.
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>I understand that, according to Malaysian law, applicant may be refused entry 
                                                                into Malaysia even if a visa is granted.
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="declare_sign" class="custom-control-input" id="customCheck100" value="YES" <?php echo $applicant->declared_sign == 'YES' ? 'checked' : NULL; ?> data-required="true">
                                                            <label class="custom-control-label" for="customCheck100">I have read and understood.</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="pull-right">
                                                <a class="btn btn-success" id="submit-declare">
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
                        <?php echo Helpers::fileDisplay('uploads/photos/',$applicant->guid,'Applicant'); ?>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td width="30%">Applicant ID</td>
                                        <td class="font-bold"><?php echo $applicant->guid; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Full Name</td>
                                        <td class="font-bold"><?php echo $applicant->full_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Passport</td>
                                        <td class="font-bold"><?php echo $applicant->passport_number; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nationality</td>
                                        <td class="font-bold"><?php echo $applicant->currentNationality->country; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <img src="<?php echo Yii::app()->params['qrlink']; ?>/php/qr.php?d=<?php echo $applicant->guid; ?>&e=Q&t=J&size=150" class="image-qrcode" />
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>

<div class="modal fade" id="modal-new-occupation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Occupation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="form-new-occupation">
                <input type="hidden" name="applicant_id" class="applicant-id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><strong>Occupation</strong> <span class="text-danger">*</span></label>
                                <?php
                                    $occupation_list = CHtml::listData($occupationtype, 'id', 'name');
                                    echo CHtml::dropDownList('occupation', null, $occupation_list, 
                                    array(
                                        'empty' => 'Select Occupation', 
                                        'class' => 'form-control custom-select vft-element',
                                        'data-required' => 'true',
                                    ));
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><strong>Position</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="position" class="form-control vft-element" placeholder="Position" data-required="true">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="submit-occupation-modal" class="btn btn-info d-none d-lg-block m-l-15 text-white">Submit</a>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                </div>  
            </form>
        </div>
    </div>    
</div>    

<div class="modal fade" id="modal-new-family">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Family</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="form-new-family">
                <input type="hidden" name="applicant_id" class="applicant-id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><strong>Name</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control vft-element" placeholder="Name" data-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><strong>Nationality</strong> <span class="text-danger">*</span></label>
                                <?php
                                    $nationality_list = CHtml::listData($nationality, 'id', 'name');
                                    echo CHtml::dropDownList('nationality', null, $nationality_list, 
                                    array(
                                        'empty' => 'Select Nationality', 
                                        'class' => 'form-control custom-select vft-element',
                                        'data-required' => 'true',
                                    ));
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><strong>Occupation</strong> <span class="text-danger">*</span></label>
                                <?php
                                    $occupation2_list = CHtml::listData($occupationtype, 'id', 'name');
                                    echo CHtml::dropDownList('occupation', null, $occupation2_list, 
                                    array(
                                        'empty' => 'Select Occupation', 
                                        'class' => 'form-control custom-select vft-element',
                                        'data-required' => 'true',
                                    ));
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><strong>Relationship</strong> <span class="text-danger">*</span></label>
                                <?php
                                    $relationship_list = CHtml::listData($relationship, 'id', 'name');
                                    echo CHtml::dropDownList('relationship', null, $relationship_list, 
                                    array(
                                        'empty' => 'Select Relationship', 
                                        'class' => 'form-control custom-select vft-element',
                                        'data-required' => 'true',
                                    ));
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="submit-family" class="btn btn-info d-none d-lg-block m-l-15 text-white">Submit</a>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                </div>  
            </form>
        </div>
    </div>    
</div>

<div class="modal fade" id="modal-new-emergency">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Emergency Contact</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="form-new-emergency">
                <input type="hidden" name="applicant_id" class="applicant-id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><strong>Name</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control vft-element" placeholder="Name" data-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><strong>Phone Number</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="phone_number" class="form-control vft-element" placeholder="Phone Number" data-required="true">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><strong>Mobile Number</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="mobile_number" class="form-control vft-element" placeholder="Mobile Number" data-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><strong>Relationship</strong> <span class="text-danger">*</span></label>
                                <?php
                                    $relationship2_list = CHtml::listData($relationship, 'id', 'name');
                                    echo CHtml::dropDownList('relationship', null, $relationship2_list, 
                                    array(
                                        'empty' => 'Select Relationship', 
                                        'class' => 'form-control custom-select vft-element',
                                        'data-required' => 'true',
                                    ));
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="submit-emergency" class="btn btn-info d-none d-lg-block m-l-15 text-white">Submit</a>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                </div>  
            </form>
        </div>
    </div>    
</div>

<?php
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/datatables/jquery.dataTables.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/toast-master/js/jquery.toast.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/select2/dist/js/select2.full.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.extend.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/visafasttrack/js/branch/applicationapplicant2.js", CClientScript::POS_END);