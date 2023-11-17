<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Register</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item">Application</li>
                    <li class="breadcrumb-item active">Register</li>
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
            <h4 class="card-title">Register New Foreign Worker</h4>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header bg-info">
            <h5 class="m-b-0 text-white">Application Information</h5>
        </div>
        <div class="card-body">
            <form id="form-new-worker">
                <div class="form-actions">
                    <div class="row">
                        
                        <div class="col-md-3">
                            <div class="alert alert-warning">
                                <h3 class="text-warning"><i class="fa fa-exclamation-circle"></i> Information</h3> 
                                You need to upload the <b>jpg</b> file format only.
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-12 text-center">
                                    <img class="image-applicant" src="vendor/imandor/images/photo.jpg" height="200px">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="alert alert-info">
                                        You need to upload a photo image with the orientation as above.
                                    </div>
                                </div>
                            </div>
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Photo Upload</strong> <span class="text-danger">*</span></label>
                                        <input type="file" name="upload_photo" class="form-control vft-element2" data-parsley-fileextension="jpg" data-parsley-required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-12 text-center">
                                    <img class="image-applicant" src="vendor/imandor/images/passport.jpg" height="250px">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="alert alert-info">
                                        You need to upload a passport image with the orientation as above.
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Passport Upload</strong> <span class="text-danger">*</span></label>
                                        <input type="file" name="upload_passport" class="form-control vft-element2" data-parsley-fileextension="jpg" data-parsley-required="true">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-9">
                            <div class="row row-line">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Full Name</strong> <span class="text-danger">*</span></label>
                                        <input type="text" name="fullname" class="form-control vft-element" placeholder="Full Name" data-parsley-required="true">
                                        <small class="form-control-feedback text-info"><strong>Note:</strong> Full name as in passport.</small> 
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row row-line">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><strong>First Name</strong> <span class="text-danger">*</span></label>
                                        <input type="text" name="firstname" class="form-control vft-element" placeholder="First Name" data-parsley-required="true">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Middle Name</strong> <span class="text-danger">*</span></label>
                                        <input type="text" name="middlename" class="form-control vft-element" placeholder="Middle Name" data-parsley-required="true">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Last Name</strong> <span class="text-danger">*</span></label>
                                        <input type="text" name="lastname" class="form-control vft-element" placeholder="Last Name" data-parsley-required="true">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row row-line">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Gender</strong> <span class="text-danger">*</span></label>
                                        <?php
                                            $i = 0;
                                            foreach($gender as $g){
                                                $i++;
                                        ?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio<?php echo $i; ?>" name="gender" class="custom-control-input" value="<?php echo $g->id; ?>" data-parsley-required="true">
                                            <label class="custom-control-label" for="customRadio<?php echo $i; ?>"><?php echo ucfirst(strtolower($g->name)); ?></label>
                                        </div>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">
                                            <i class="icon-calender"></i> <strong>Date Of Birth</strong> <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="dateofbirth" class="form-control vft-element datepicker-autoclose" placeholder="DD-MM-YYYY" data-parsley-required="true">
                                        <small class="form-control-feedback text-info"><strong>Note:</strong> DD-MM-YYYY</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Place Of Birth</strong> <span class="text-danger">*</span></label>
                                        <textarea name="placeofbirth" class="form-control vft-element" placeholder="Place Of Birth" rows="1" data-parsley-required="true"></textarea>
                                        <small class="form-control-feedback text-info"><strong>Note:</strong> City, Province/State, Country</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row row-line">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Passport Number</strong> <span class="text-danger">*</span></label>
                                        <input type="text" name="passport_number" class="form-control vft-element" placeholder="Passport Number" data-parsley-required="true">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><strong>National Card ID Number</strong> <span class="text-danger">*</span></label></label>
                                        <input type="text" name="national_card_number" class="form-control vft-element" placeholder="National Card ID Number" data-parsley-required="true">
                                        <small class="form-control-feedback text-info"><strong>Note:</strong> Citizen Number</small> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Nationality</strong> <span class="text-danger">*</span></label>
                                        <?php
                                            $nationality_list = CHtml::listData($nationality, 'id', 'name');
                                            echo CHtml::dropDownList('nationality', null, $nationality_list, 
                                            array(
                                                'empty' => 'Select Nationality',
                                                'class' => 'form-control select2-nationality custom-select vft-element',
                                                'data-parsley-required' => 'true',
                                                'options' => array(
                                                    $user->profile->company->country_id => array(
                                                        'selected' => true
                                                    )
                                                )
                                            ));
                                        ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row row-line">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">
                                            <i class="icon-calender"></i> <strong>Date Of Issue</strong> <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="passport_dateofissue" class="form-control vft-element datepicker-autoclose" placeholder="DD-MM-YYYY" data-parsley-required="true">
                                        <small class="form-control-feedback text-info"><strong>Note:</strong> DD-MM-YYYY</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Place Of Issue</strong> <span class="text-danger">*</span></label>
                                        <textarea name="passport_placeofissue" class="form-control vft-element" placeholder="Place Of Issue" rows="1" data-parsley-required="true"></textarea>
                                        <small class="form-control-feedback text-info"><strong>Note:</strong> City, Province/State, Country</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">
                                            <i class="icon-calender"></i> <strong>Date Of Expiry</strong> <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="passport_dateofexpiry" class="form-control vft-element datepicker-autoclose" placeholder="DD-MM-YYYY" data-parsley-required="true">
                                        <small class="form-control-feedback text-info"><strong>Note:</strong> DD-MM-YYYY</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row row-line">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Job Sector</strong> <span class="text-danger">*</span></label>
                                        <?php
                                            $jobsector_list = CHtml::listData($jobsector, 'id', 'name');
                                            echo CHtml::dropDownList('jobsector', null, $jobsector_list, 
                                            array(
                                                'empty' => 'Select Job Sector',
                                                'class' => 'form-control select2-jobsector custom-select vft-element',
                                                'data-parsley-required' => 'true'
                                            ));
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Email Address</strong></label>
                                        <input type="text" name="email" class="form-control vft-element" placeholder="Email Address">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Home Address</strong> <span class="text-danger">*</span></label>
                                        <textarea name="home_address" class="form-control vft-element" placeholder="Home Address" rows="2" data-parsley-required="true"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Zip Code</strong> <span class="text-danger">*</span></label>
                                        <input type="text" name="home_zipcode" class="form-control vft-element" placeholder="Zip Code" data-parsley-required="true">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row row-line">    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Home Phone Number</strong> <span class="text-danger">*</span></label>
                                        <input type="text" name="home_phone" class="form-control vft-element" placeholder="Home Phone Number" data-parsley-required="true">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Bangladesh Mobile Number</strong> <span class="text-danger">*</span></label>
                                        <input type="text" name="home_mobile" class="form-control vft-element" placeholder="Bangladesh Mobile Number" data-parsley-required="true">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row row-line">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Marital Status</strong> <span class="text-danger">*</span></label>
                                        <select name="marital_status" class="form-control select2-marital custom-select vft-element" data-parsley-required="true">
                                            <option value="">Select Marital Status</option>
                                            <?php foreach($marital as $m){ ?>
                                                <option value="<?php echo $m->id; ?>"><?php echo $m->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Number Of Children</strong></label>
                                        <select name="children_number" class="form-control select2-children custom-select vft-element">
                                            <?php for($noc = 0; $noc <= 10; $noc++){ ?>
                                                <option value="<?php echo $noc; ?>"><?php echo $noc; ?></option>
                                            <?php } ?>
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
                                        ?>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="educationtype[]" class="custom-control-input" id="customCheck2<?php echo $m; ?>" value="<?php echo $e->id; ?>">
                                            <label class="custom-control-label" for="customCheck2<?php echo $m; ?>"><?php echo ucfirst(strtolower($e->name)); ?></label>
                                        </div>
                                        <?php 
                                            } 
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Education (Other)</strong></label>
                                        <input type="text" name="education_other" class="form-control vft-element" placeholder="Other">
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
                                            <?php foreach($nextofkin as $n){ ?>
                                                <option value="<?php echo $n->id; ?>"><?php echo $n->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Name Of Next-of-Kin</strong> <span class="text-danger">*</span></label>
                                        <textarea name="nextofkin_name" class="form-control vft-element" placeholder="Name Of Next-Of-Kin" rows="2" data-parsley-required="true"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row row-line">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Mobile Contact Number Of Next-of-Kin</strong> <span class="text-danger">*</span></label>
                                        <input type="text" name="nextofkin_mobile" class="form-control vft-element" placeholder="Mobile Contact Number" data-parsley-required="true">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-right">
                                <a class="btn btn-success" id="submit-worker">
                                    <i class="fa fa-check"></i> Save
                                </a>
                            </div>
                        </div>
                    </div>
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
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/sourceagent/register.js", CClientScript::POS_END);