<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Register</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item">Employer</li>
                    <li class="breadcrumb-item active">Register</li>
                </ol>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="pull-right">
                <a href="<?php echo $link; ?>" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                    <i class="fa fa-arrow-circle-o-left"></i> Back To Employer
                </a>
            </div>
            
            <h4 class="card-title"><span class="label label-primary"><?php echo $user->profile->company->name; ?></span></h4>
            <h4 class="card-title">Register New Employer</h4>
        </div>
    </div>
    
    <form id="form-new-employer">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h5 class="m-b-0 text-white">Employer Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="alert alert-warning">
                                    <h3 class="text-warning"><i class="fa fa-exclamation-circle"></i> Information</h3> 
                                    You need to upload the <b>jpg</b> file format only or you may upload it later.
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Logo Upload</strong></label>
                                            <input type="file" name="upload_logo" class="form-control vft-element2" data-parsley-fileextension="jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="m-b-20">Employer Information</h3>
                                    </div>
                                </div>
                                
                                <div class="row row-line">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Employer Name</strong> <span class="text-danger">*</span></label>
                                            <input type="text" name="employer_name" class="form-control vft-element" placeholder="Employer Name" data-parsley-required="true">
                                        </div>
                                    </div>
                                </div>

                                <div class="row row-line">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Employer Address</strong> <span class="text-danger">*</span></label>
                                            <input type="text" name="employer_address1" class="form-control vft-element" placeholder="Employer Address (1)" data-parsley-required="true">
                                            <input type="text" name="employer_address2" class="form-control vft-element" placeholder="Employer Address (2)">
                                            <input type="text" name="employer_address3" class="form-control vft-element" placeholder="Employer Address (3)">
                                            <input type="text" name="employer_address4" class="form-control vft-element" placeholder="Employer Address (4)">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Registration Number</strong> <span class="text-danger">*</span></label>
                                            <input type="text" name="employer_regno" class="form-control vft-element" placeholder="Registration Number" data-parsley-required="true">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label"><strong>Zip Code</strong> <span class="text-danger">*</span></label>
                                            <input type="text" name="employer_zipcode" class="form-control vft-element" placeholder="Zip Code" data-parsley-required="true">
                                        </div>
                                    </div>
                                </div>

                                <div class="row row-line">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"><strong>District</strong> <span class="text-danger">*</span></label>
                                            <input type="text" name="employer_district" class="form-control vft-element" placeholder="District" data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"><strong>State</strong> <span class="text-danger">*</span></label>
                                            <select name="employer_state" class="form-control select2-state custom-select vft-element" data-parsley-required="true">
                                                <option value="">Select State</option>
                                                <?php 
                                                    foreach($state as $s){ 
                                                ?>
                                                    <option value="<?php echo $s->id; ?>"><?php echo $s->name; ?></option>
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
                                            <label class="control-label"><strong>Contact Number (1)</strong> <span class="text-danger">*</span></label>
                                            <input type="text" name="employer_contact1" class="form-control vft-element" placeholder="Contact Number (1)" data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Contact Number (2)</strong></label>
                                            <input type="text" name="employer_contact2" class="form-control vft-element" placeholder="Contact Number (2)">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Email Address</strong> <span class="text-danger">*</span></label>
                                            <input type="text" name="employer_email" class="form-control vft-element" placeholder="Email Address" data-parsley-required="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-info">
                        <h5 class="m-b-0 text-white">Login Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-warning">
                                    <h3 class="text-warning"><i class="fa fa-exclamation-circle"></i> Information</h3> 
                                    Username should be any name that related to Employer's company name. Please make sure 
                                    the username for this employer is unique and no spaces.
                                </div>
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"><strong>Username</strong> <span class="text-danger">*</span></label>
                                    <input type="text" name="employer_username" class="form-control vft-element" placeholder="Username" data-parsley-required="true" data-parsley-whitespace="0" data-parsley-username="true">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-info">
                        <h5 class="m-b-0 text-white">Person In Charge Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="m-b-20">Person In Charge Information</h3>
                            </div>
                        </div>
                            
                        <div class="row row-line">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"><strong>Full Name</strong> <span class="text-danger">*</span></label>
                                    <input type="text" name="pic_fullname" class="form-control vft-element" placeholder="Full Name" data-parsley-required="true">
                                </div>
                            </div>
                        </div>

                        <div class="row row-line">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><strong>Mobile Number (1)</strong> <span class="text-danger">*</span></label>
                                    <input type="text" name="pic_mobile1" class="form-control vft-element" placeholder="Mobile Number (1)" data-parsley-required="true">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><strong>Mobile Number (2)</strong></label>
                                    <input type="text" name="pic_mobile2" class="form-control vft-element" placeholder="Mobile Number (2)">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"><strong>Email Address</strong> <span class="text-danger">*</span></label>
                                    <input type="text" name="pic_email" class="form-control vft-element" placeholder="Email Address" data-parsley-required="true">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row m-b-20">
            <div class="col-md-12">
                <div class="pull-right">
                    <a class="btn btn-success" id="submit-employer">
                        <i class="fa fa-check"></i> Save
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/datatables/jquery.dataTables.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/toast-master/js/jquery.toast.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/select2/dist/js/select2.full.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.extend2.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/employer/register.js", CClientScript::POS_END);