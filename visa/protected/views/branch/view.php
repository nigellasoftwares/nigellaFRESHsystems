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
            <h6 class="card-subtitle">View Visa Applicant</h6>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"> 
                        <?php echo Helpers::fileDisplayCircle('uploads/photos/',$applicant->guid,'Applicant'); ?>
                        <h4 class="card-title m-t-10"><?php echo $applicant->full_name; ?></h4>
                        <h6 class="card-subtitle"><?php echo $applicant->passport_number; ?></h6>
                        <h6 class="card-subtitle"><?php echo $applicant->currentNationality->name; ?></h6>
                        <img src="<?php echo Yii::app()->params['qrlink']; ?>/php/qr.php?d=<?php echo $applicant->guid; ?>&e=Q&t=J&size=150" class="image-qrcode" />
                    </center>
                </div>
                
                <div><hr></div>
                
                <div class="card-body">
                    <?php
                        if($applicant->result2_id == 1){
                            $result_application = '<span class="label label-info">NO RESULT ON APPLICATION</span>';
                        } else if($applicant->result2_id == 10){
                            $result_application = '<span class="label label-success">APPROVED</span>';
                        } else if($applicant->result2_id == 11){
                            $result_application = '<span class="label label-danger">REJECTED</span>';
                        } else if($applicant->result2_id == 12){
                            $result_application = '<span class="label label-warning">PENDING</span>';
                        }
                    
                        if(empty($applicant->remark)){
                            $result_remark = '<span class="label label-info">NO REMARKS ON APPLICATION</span>';
                            $result_date = '<span class="label label-info">NO DATE ON APPLICATION</span>';
                        } else {
                            $result_remark = strtoupper($applicant->remark);
                            $result_date = date('d M Y', strtotime($applicant->result2_date));
                        }
                    ?>
                    
                    <small class="text-muted">Result</small>
                    <h6><?php echo $result_application; ?></h6>
                    <small class="text-muted p-t-30 db">Remarks</small>
                    <h6><?php echo $result_remark; ?></h6>
                    <small class="text-muted">Date</small>
                    <h6><?php echo $result_date; ?></h6>
                </div>
                
                <div><hr></div>
                
                <div class="card-body"> 
                    <small class="text-muted">Applicant ID</small>
                    <h6><?php echo $applicant->guid; ?></h6> 
                    <small class="text-muted p-t-30 db">Phone</small>
                    <h6><?php echo $applicant->home_mobile; ?></h6> 
                    <small class="text-muted p-t-30 db">Address</small>
                    <h6><?php echo $applicant->home_address; ?></h6>
                    <small class="text-muted p-t-30 db">Zip Code</small>
                    <h6><?php echo $applicant->home_zipcode; ?></h6>
                    <div class="map-box">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116834.00977764184!2d90.34928565811633!3d23.780777744779236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka%2C%20Bangladesh!5e0!3m2!1sen!2smy!4v1568174408513!5m2!1sen!2smy" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <br/>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#status" role="tab">Status</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#personal" role="tab">Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#information" role="tab">Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#travel" role="tab">Travel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#other" role="tab">Other</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#declare" role="tab">Declaration</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Status -->
                    <div class="tab-pane active" id="status" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <h3 class="m-b-20">Status</h3>

                                <div class="row">
                                    <?php
                                        $statusscan = array(
                                            'd_branch' => '<i class="fa fa-spin fa-spinner"></i>',
                                            'd_admin' => '<i class="fa fa-spin fa-spinner"></i>',
                                            'd_osc' => '<i class="fa fa-spin fa-spinner"></i>',
                                            'd_highcomm' => '<i class="fa fa-spin fa-spinner"></i>',
                                            'r_osc' => '<i class="fa fa-spin fa-spinner"></i>',
                                            'r_admin' => '<i class="fa fa-spin fa-spinner"></i>',
                                            'r_branch' => '<i class="fa fa-spin fa-spinner"></i>'
                                        );
                                    
                                        foreach($passportscan as $pr){
                                            if($pr->status_id == 1){
                                                $statusscan['d_branch'] = '<i class="fa fa-check fa-2x text-success"></i><br /><span class="label label-info">'.date('d M Y', strtotime($pr->scanned_date)).'</span>';
                                            }
                                            if(in_array($pr->status_id,range(2,3))){
                                                $statusscan['d_admin'] = '<i class="fa fa-check fa-2x text-success"></i><br /><span class="label label-info">'.date('d M Y', strtotime($pr->scanned_date)).'</span>';
                                            }
                                            if(in_array($pr->status_id,range(5,7))){
                                                $statusscan['d_osc'] = '<i class="fa fa-check fa-2x text-success"></i><br /><span class="label label-info">'.date('d M Y', strtotime($pr->scanned_date)).'</span>';
                                            }
                                            if(in_array($pr->status_id,range(8,12))){
                                                $statusscan['d_highcomm'] = '<i class="fa fa-check fa-2x text-success"></i><br /><span class="label label-info">'.date('d M Y', strtotime($pr->scanned_date)).'</span>';
                                            }
                                            if(in_array($pr->status_id,range(13,14))){
                                                $statusscan['r_osc'] = '<i class="fa fa-check fa-2x text-success"></i><br /><span class="label label-info">'.date('d M Y', strtotime($pr->scanned_date)).'</span>';
                                            }
                                            if(in_array($pr->status_id,range(15,16))){
                                                $statusscan['r_admin'] = '<i class="fa fa-check fa-2x text-success"></i><br /><span class="label label-info">'.date('d M Y', strtotime($pr->scanned_date)).'</span>';
                                            }
                                            if(in_array($pr->status_id,range(17,18))){
                                                $statusscan['r_branch'] = '<i class="fa fa-check fa-2x text-success"></i><br /><span class="label label-info">'.date('d M Y', strtotime($pr->scanned_date)).'</span>';
                                            }
                                        }
                                    ?>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="4" class="bg-primary text-white text-center">Deliver</th>
                                                    <th colspan="3" class="bg-success text-white text-center">Return</th>
                                                </tr>
                                                <tr>
                                                    <th class="bg-primary text-white">Branch</th>
                                                    <th class="bg-primary text-white">Admin</th>
                                                    <th class="bg-primary text-white">OSC</th>
                                                    <th class="bg-primary text-white">High Comm</th>
                                                    <th class="bg-success text-white">OSC</th>
                                                    <th class="bg-success text-white">Admin</th>
                                                    <th class="bg-success text-white">Branch</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center h-62"><?php echo $statusscan['d_branch']; ?></td>
                                                    <td class="text-center h-62"><?php echo $statusscan['d_admin']; ?></td>
                                                    <td class="text-center h-62"><?php echo $statusscan['d_osc']; ?></td>
                                                    <td class="text-center h-62"><?php echo $statusscan['d_highcomm']; ?></td>
                                                    <td class="text-center h-62"><?php echo $statusscan['r_osc']; ?></td>
                                                    <td class="text-center h-62"><?php echo $statusscan['r_admin']; ?></td>
                                                    <td class="text-center h-62"><?php echo $statusscan['r_branch']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <ul class="timeline">
                                    <?php
                                        $psn = 0;
                                        foreach($passportscan as $ps){
                                            $psn++;
                                            $timelineside = $psn % 2 ? NULL : 'timeline-inverted';
                                            
                                            if($ps->status->stage == 'APPROVE'){
                                                $label_stage = 'label label-success';
                                            } else if($ps->status->stage == 'REJECT'){
                                                $label_stage = 'label label-danger';
                                            } else {
                                                $label_stage = 'label label-info';
                                            }
                                    ?>
                                    <li class="<?php echo $timelineside; ?>">
                                        <div class="timeline-badge <?php echo Helpers::randomColour(); ?>">
                                            <i class="fa fa-id-badge"></i>
                                        </div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title"><?php echo ucwords(strtolower($ps->status->name)); ?></h4>
                                                <p>
                                                    <small class="text-muted"><i class="fa fa-calendar"></i> <?php echo date('d M Y', strtotime($ps->scanned_date)); ?></small>
                                                    <br /><span class="<?php echo $label_stage; ?>"><?php echo ucwords(strtolower($ps->status->stage)); ?></span>
                                                </p>
                                            </div>
                                            <!--
                                            <div class="timeline-body">
                                                <p>Hello World.</p>
                                            </div>
                                            -->
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Personal -->
                    <div class="tab-pane" id="personal" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <h3 class="m-b-20">Personal Information</h3>
                                    
                                    <form id="form-new-applicant">
                                        <div class="form-actions">
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Full Name</strong></label>
                                                        <input type="text" name="fullname" class="form-control vft-element-readonly" placeholder="Full Name" readonly="true" value="<?php echo strtoupper($applicant->full_name); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>First Name</strong></label>
                                                        <input type="text" name="firstname" class="form-control vft-element-readonly" placeholder="First Name" readonly="true" value="<?php echo strtoupper($applicant->first_name); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Middle Name</strong></label>
                                                        <input type="text" name="middlename" class="form-control vft-element-readonly" placeholder="Middle Name" readonly="true" value="<?php echo strtoupper($applicant->middle_name); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Last Name</strong></label>
                                                        <input type="text" name="lastname" class="form-control vft-element-readonly" placeholder="Last Name" readonly="true" value="<?php echo strtoupper($applicant->last_name); ?>">
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
                                                                
                                                                $gender_checked = $g->id == $applicant->gender_id ? 'checked' : NULL;
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
                                                            <input type="text" name="dateofbirth" class="form-control vft-element-readonly" placeholder="DD-MM-YYYY" readonly="true" value="<?php echo date('d M Y',strtotime($applicant->birth_date)); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Place Of Birth</strong></label>
                                                        <textarea name="placeofbirth" class="form-control vft-element-readonly" placeholder="Place Of Birth" readonly="true"><?php echo strtoupper($applicant->birth_place); ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Current Nationality</strong></label>
                                                        <input type="text" name="current_nationality" class="form-control vft-element-readonly" placeholder="Current Nationality" readonly="true" value="<?php echo $applicant->currentNationality->name; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Citizen Number</strong></label>
                                                        <input type="text" name="citizen_number" class="form-control vft-element-readonly" placeholder="Citizen Number" readonly="true" value="<?php echo strtoupper($applicant->national_number); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">    
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Former Nationality</strong></label>
                                                        <input type="text" name="former_nationality" class="form-control vft-element-readonly" placeholder="Former Nationality" readonly="true" value="<?php echo empty($applicant->former_nationality_id) ? NULL : $applicant->formerNationality->name; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Passport Type</strong></label>
                                                        <input type="text" name="passport_type" class="form-control vft-element-readonly" placeholder="Passport Type" readonly="true" value="<?php echo $applicant->passport->name; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Passport Type (Other)</strong></label>
                                                        <input type="text" name="passport_other" class="form-control vft-element-readonly" placeholder="Other" readonly="true" value="<?php echo empty($applicant->passport_other) ? NULL : strtoupper($applicant->passport_other); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Passport Number</strong></label>
                                                        <input type="text" name="passport_number" class="form-control vft-element-readonly" placeholder="Passport Number" readonly="true" value="<?php echo strtoupper($applicant->passport_number); ?>">
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
                                                            <input type="text" name="passport_dateofissue" class="form-control vft-element-readonly" placeholder="DD-MM-YYYY" readonly="true" value="<?php echo date('d M Y', strtotime($applicant->passport_issue_date)); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Place Of Issue</strong></label>
                                                        <textarea name="passport_placeofissue" class="form-control vft-element-readonly" placeholder="Place Of Issue" rows="1" readonly="true"><?php echo strtoupper($applicant->passport_issue_place); ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Date Of Expiry</strong></label>
                                                        <div class="input-group">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="icon-calender"></i></span>
                                                            </div>
                                                            <input type="text" name="passport_dateofexpiry" class="form-control vft-element-readonly" placeholder="DD-MM-YYYY" readonly="true" value="<?php echo date('d M Y', strtotime($applicant->passport_expiry_date)); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Education</strong></label>
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
                                                            <input type="checkbox" name="educationtype[]" class="custom-control-input" id="customCheck<?php echo $m; ?>" value="<?php echo $e->id; ?>" <?php echo $education_checked; ?> disabled="true">
                                                            <label class="custom-control-label" for="customCheck<?php echo $m; ?>"><?php echo ucfirst(strtolower($e->name)); ?></label>
                                                        </div>
                                                        <?php 
                                                            } 
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Education (Other)</strong></label>
                                                        <input type="text" name="education_other" class="form-control vft-element-readonly" placeholder="Other" readonly="true" value="<?php echo empty($applicant->education_other) ? NULL : strtoupper($applicant->education_other); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Email Address</strong></label>
                                                        <input type="text" name="email" class="form-control vft-element-readonly" placeholder="Email Address" value="<?php echo $applicant->email; ?>" readonly="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Employer/School Name</strong></label>
                                                        <textarea name="employer_name" class="form-control vft-element-readonly" placeholder="Employer/School Name" rows="2" readonly="true"><?php echo strtoupper($applicant->employer_name); ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Address</strong></label>
                                                        <textarea name="employer_address" class="form-control vft-element-readonly" placeholder="Address" rows="2" readonly="true"><?php echo strtoupper($applicant->employer_address); ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Zip Code</strong></label>
                                                        <input type="text" name="employer_zipcode" class="form-control vft-element-readonly" placeholder="Zip Code" value="<?php echo $applicant->employer_zipcode; ?>" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Phone Number</strong></label>
                                                        <input type="text" name="employer_phone" class="form-control vft-element-readonly" placeholder="Phone Number" value="<?php echo $applicant->employer_phone; ?>" readonly="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Home Address</strong></label>
                                                        <textarea name="home_address" class="form-control vft-element-readonly" placeholder="Address" rows="2" readonly="true"><?php echo strtoupper($applicant->home_address); ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Zip Code</strong></label>
                                                        <input type="text" name="home_zipcode" class="form-control vft-element-readonly" placeholder="Zip Code" value="<?php echo $applicant->home_zipcode; ?>" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Phone Number</strong></label>
                                                        <input type="text" name="home_phone" class="form-control vft-element-readonly" placeholder="Phone Number" value="<?php echo $applicant->home_phone; ?>" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Mobile Number</strong></label>
                                                        <input type="text" name="home_mobile" class="form-control vft-element-readonly" placeholder="Mobile Number" value="<?php echo $applicant->home_mobile; ?>" readonly="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Marital Status</strong></label>
                                                        <input type="text" name="marital_status" class="form-control vft-element-readonly" placeholder="Marital Status" value="<?php echo $applicant->marital->name; ?>" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Marital Status (Other)</strong></label>
                                                        <input type="text" name="marital_other" class="form-control vft-element-readonly" placeholder="Other" readonly="true" value="<?php echo empty($applicant->marital_other) ? NULL : strtoupper($applicant->marital_other); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Location When Applying For This Visa</strong></label>
                                                        <input type="text" name="location_visa_apply" class="form-control vft-element-readonly" placeholder="Other" value="<?php echo strtoupper($applicant->location_visa_apply); ?>" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Information -->
                    <div class="tab-pane" id="information" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <h3 class="m-b-20">Occupation Information</h3>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th width="10%" class="text-center bg-info text-white">#</th>
                                                    <th width="45%" class="bg-info text-white">Occupation</th>
                                                    <th width="45%" class="bg-info text-white">Position</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $a = 0;
                                                    foreach($occupation as $o){
                                                        $a++;
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $a; ?></td>
                                                    <td><?php echo $o->occupationtype->name; ?></td>
                                                    <td><?php echo strtoupper($o->position); ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <div class="row m-t-30">
                                    <h3 class="m-b-20">Family Information</h3>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center bg-info text-white">#</th>
                                                    <th class="bg-info text-white">Name</th>
                                                    <th class="bg-info text-white">Nationality</th>
                                                    <th class="bg-info text-white">Occupation</th>
                                                    <th class="bg-info text-white">Relationship</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $b = 0;
                                                    foreach($family as $f){
                                                        $b++;
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $b; ?></td>
                                                    <td><?php echo strtoupper($f->name); ?></td>
                                                    <td><?php echo $f->nationality->name; ?></td>
                                                    <td><?php echo $f->occupationtype->name; ?></td>
                                                    <td><?php echo $f->relationship->name; ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <div class="row m-t-30">
                                    <h3 class="m-b-20">Emergency Information</h3>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center bg-info text-white">#</th>
                                                    <th class="bg-info text-white">Name</th>
                                                    <th class="bg-info text-white">Phone Number</th>
                                                    <th class="bg-info text-white">Mobile Number</th>
                                                    <th class="bg-info text-white">Relationship</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $c = 0;
                                                    foreach($emergency as $e){
                                                        $c++;
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $c; ?></td>
                                                    <td><?php echo strtoupper($e->name); ?></td>
                                                    <td><?php echo $e->phone; ?></td>
                                                    <td><?php echo $e->mobile; ?></td>
                                                    <td><?php echo $e->relationship->name; ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Travel -->
                    <div class="tab-pane" id="travel" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <h3 class="m-b-20">Travel Information</h3>
                                    
                                    <form id="form-update-travel">
                                        <div class="form-actions">
                                            <input type="hidden" name="applicant_id" value="<?php echo $applicant->id; ?>">
                                            <input type="hidden" name="batch_id" value="<?php echo $applicant->batch_id; ?>">

                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Purpose Of Visit</strong></label>
                                                        <?php 
                                                            $n = 0;
                                                            foreach($purposevisit as $p){ 
                                                                $n++;
                                                        ?>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio<?php echo $n; ?>" name="purposevisit" class="custom-control-input" value="<?php echo $p->id; ?>" <?php echo $applicant->purposevisit_id == $p->id ? 'checked' : NULL; ?> disabled="true">
                                                            <label class="custom-control-label" for="customRadio<?php echo $n; ?>"><?php echo ucfirst(strtolower($p->name)); ?></label>
                                                        </div>
                                                        <?php 
                                                            } 
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Purpose Of Visit (Other)</strong></label>
                                                        <textarea name="purposevisit_other" class="form-control vft-element-readonly" placeholder="Other" rows="2" readonly="true"><?php echo empty($applicant->purposevisit_other) ? NULL : strtoupper($applicant->purposevisit_other); ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Other -->
                    <div class="tab-pane" id="other" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <h3 class="m-b-20">Other Information</h3>
                                    
                                    <form id="form-update-other">
                                        <div class="form-actions">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="bg-info">&nbsp;</th>
                                                            <th class="bg-info text-white">YES</th>
                                                            <th class="bg-info text-white">NO</th>
                                                            <th class="bg-info text-white">Please specify if <strong>YES</strong>.</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Have you ever overstayed your visa or residence permit in Malaysia?</td>
                                                            <?php 
                                                                $visa_overstayed_yes = $applicant->visa_overstayed == 'YES' ? '<i class="fa fa-check"></i>' : NULL;
                                                                $visa_overstayed_no = $applicant->visa_overstayed == 'NO' ? '<i class="fa fa-check"></i>' : NULL;
                                                            ?>
                                                            <td><?php echo $visa_overstayed_yes; ?></td>    
                                                            <td><?php echo $visa_overstayed_no; ?></td>
                                                            <td><textarea name="visa_overstayed_detail" class="form-control vft-element-readonly" placeholder="Detail" rows="2" readonly="true"><?php echo empty($applicant->visa_overstayed_detail) ? NULL : strtoupper($applicant->visa_overstayed_detail); ?></textarea></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Have you ever been refused a visa for Malaysia, or been refused entry into Malaysia?</td>
                                                            <?php 
                                                                $visa_refused_yes = $applicant->visa_refused == 'YES' ? '<i class="fa fa-check"></i>' : NULL;
                                                                $visa_refused_no = $applicant->visa_refused == 'NO' ? '<i class="fa fa-check"></i>' : NULL;
                                                            ?>
                                                            <td><?php echo $visa_refused_yes; ?></td>
                                                            <td><?php echo $visa_refused_no; ?></td>
                                                            <td><textarea name="visa_refused_detail" class="form-control vft-element-readonly" placeholder="Detail" rows="2" readonly="true"><?php echo empty($applicant->visa_refused_detail) ? NULL : strtoupper($applicant->visa_refused_detail); ?></textarea></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Do you have any criminal record in Malaysia or any other country?</td>
                                                            <?php 
                                                                $visa_criminal_yes = $applicant->visa_criminal == 'YES' ? '<i class="fa fa-check"></i>' : NULL;
                                                                $visa_criminal_no = $applicant->visa_criminal == 'NO' ? '<i class="fa fa-check"></i>' : NULL;
                                                            ?>
                                                            <td><?php echo $visa_criminal_yes; ?></td>
                                                            <td><?php echo $visa_criminal_no; ?></td>
                                                            <td><textarea name="visa_criminal_detail" class="form-control vft-element-readonly" placeholder="Detail" rows="2" readonly="true"><?php echo empty($applicant->visa_criminal_detail) ? NULL : strtoupper($applicant->visa_criminal_detail); ?></textarea></td>
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
                                                            <?php 
                                                                $visa_condition_yes = $applicant->visa_condition == 'YES' ? '<i class="fa fa-check"></i>' : NULL;
                                                                $visa_condition_no = $applicant->visa_condition == 'NO' ? '<i class="fa fa-check"></i>' : NULL;
                                                            ?>
                                                            <td><?php echo $visa_condition_yes; ?></td>
                                                            <td><?php echo $visa_condition_no; ?></td>
                                                            <td><textarea name="visa_condition_detail" class="form-control vft-element-readonly" placeholder="Detail" rows="2" readonly="true"><?php echo empty($applicant->visa_condition_detail) ? NULL : strtoupper($applicant->visa_condition_detail); ?></textarea></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Did you visit countries or territories affected by infectious diseases in the last 30 days?</td>
                                                            <?php 
                                                                $visa_disease_yes = $applicant->visa_disease == 'YES' ? '<i class="fa fa-check"></i>' : NULL;
                                                                $visa_disease_no = $applicant->visa_disease == 'NO' ? '<i class="fa fa-check"></i>' : NULL;
                                                            ?>
                                                            <td><?php echo $visa_disease_yes; ?></td>
                                                            <td><?php echo $visa_disease_no; ?></td>
                                                            <td><textarea name="visa_disease_detail" class="form-control vft-element-readonly" placeholder="Detail" rows="2" readonly="true"><?php echo empty($applicant->visa_disease_detail) ? NULL : strtoupper($applicant->visa_disease_detail); ?></textarea></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>More Information</strong></label>
                                                        <textarea name="visa_other_detail" class="form-control vft-element-readonly" placeholder="Other" rows="2" readonly="true"><?php echo empty($applicant->visa_other_detail) ? NULL : strtoupper($applicant->visa_other_detail); ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Declare -->
                    <div class="tab-pane" id="declare" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <h3 class="m-b-20">Declaration</h3>
                                    
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
                                                            <input type="checkbox" name="declare_sign" class="custom-control-input" id="customCheck100" value="YES" <?php echo $applicant->declared_sign == 'YES' ? 'checked' : NULL; ?> disabled="true">
                                                            <label class="custom-control-label" for="customCheck100">I have read and understood.</label>
                                                        </div>
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
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/datatables/jquery.dataTables.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/visafasttrack/js/branch/applicationapplicantview.js", CClientScript::POS_END);