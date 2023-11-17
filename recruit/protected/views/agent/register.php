<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Register</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item">Agent</li>
                    <li class="breadcrumb-item active">Register</li>
                </ol>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="pull-right">
                <a href="<?php echo $link; ?>" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                    <i class="fa fa-arrow-circle-o-left"></i> Back To Agent
                </a>
            </div>
            
            <h4 class="card-title"><span class="label label-primary"><?php echo $user->profile->company->name; ?></span></h4>
            <h4 class="card-title">Register New Agent</h4>
        </div>
    </div>
    
    <form id="form-new-agent">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header bg-info">
                        <h5 class="m-b-0 text-white">Agent Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="m-b-20">Agent Information</h3>
                            
                                <div class="row row-line">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Agent Name</strong> <span class="text-danger">*</span></label>
                                            <input type="text" name="agent_name" class="form-control vft-element" placeholder="Agent Name" data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Registration Number</strong> <span class="text-danger">*</span></label>
                                            <input type="text" name="agent_regno" class="form-control vft-element" placeholder="Registration Number" data-parsley-required="true">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row row-line">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Agent Address</strong> <span class="text-danger">*</span></label>
                                            <textarea name="agent_address" class="form-control vft-element" rows="3" placeholder="Agent Address" data-parsley-required="true"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Zip Code</strong> <span class="text-danger">*</span></label>
                                            <input type="text" name="agent_zipcode" class="form-control vft-element" placeholder="Zip Code" data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Country</strong> <span class="text-danger">*</span></label>
                                            <select name="agent_country" class="form-control select2-country custom-select vft-element" data-parsley-required="true">
                                                <option value="">Select Country</option>
                                                <?php 
                                                    foreach($country as $c){ 
                                                ?>
                                                    <option value="<?php echo $c->id; ?>"><?php echo $c->name; ?></option>
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
                                            <input type="text" name="agent_contact1" class="form-control vft-element" placeholder="Contact Number (1)" data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Contact Number (2)</strong></label>
                                            <input type="text" name="agent_contact2" class="form-control vft-element" placeholder="Contact Number (2)">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Email Address</strong> <span class="text-danger">*</span></label>
                                            <input type="text" name="agent_email" class="form-control vft-element" placeholder="Email Address" data-parsley-required="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h5 class="m-b-0 text-white">Person In Charge Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
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
                </div>
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h5 class="m-b-0 text-white">Login Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-warning">
                                                <h3 class="text-warning"><i class="fa fa-exclamation-circle"></i> Information</h3> 
                                                Username should be any name that related to Agent's company name. Please make sure 
                                                the username for this agent is unique and no spaces.
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><strong>Username</strong> <span class="text-danger">*</span></label>
                                                <input type="text" name="agent_username" class="form-control vft-element" placeholder="Username" data-parsley-required="true" data-parsley-whitespace="0" data-parsley-username="true">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-right">
                            <a class="btn btn-success" id="submit-agent">
                                <i class="fa fa-check"></i> Save
                            </a>
                        </div>
                    </div>
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
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/agent/register.js", CClientScript::POS_END);