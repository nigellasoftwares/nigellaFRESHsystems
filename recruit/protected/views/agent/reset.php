<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Reset Password</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item">Agent</li>
                    <li class="breadcrumb-item active">Reset Password</li>
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
            <h4 class="card-title">Reset Password</h4>
        </div>
    </div>
    
    <form id="form-reset-agent">
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
                                            <input type="text" name="agent_name" class="form-control vft-element-readonly" placeholder="Agent Name" readonly="true" value="<?php echo $agent->company->name; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Registration Number</strong> <span class="text-danger">*</span></label>
                                            <input type="text" name="agent_regno" class="form-control vft-element-readonly" placeholder="Registration Number" readonly="true" value="<?php echo $agent->company->register_number; ?>">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row row-line">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Agent Address</strong> <span class="text-danger">*</span></label>
                                            <textarea name="agent_address" class="form-control vft-element-readonly" rows="3" placeholder="Agent Address" readonly="true"><?php echo $agent->company->address; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Zip Code</strong> <span class="text-danger">*</span></label>
                                            <input type="text" name="agent_zipcode" class="form-control vft-element-readonly" placeholder="Zip Code" readonly="true" value="<?php echo $agent->company->postcode; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Country</strong> <span class="text-danger">*</span></label>
                                            <input type="text" name="agent_country" class="form-control vft-element-readonly" placeholder="Country" readonly="true" value="<?php echo $agent->company->country->name; ?>">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row row-line">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Contact Number (1)</strong> <span class="text-danger">*</span></label>
                                            <input type="text" name="agent_contact1" class="form-control vft-element-readonly" placeholder="Contact Number (1)" readonly="true" value="<?php echo $agent->company->contact_number1; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Contact Number (2)</strong></label>
                                            <input type="text" name="agent_contact2" class="form-control vft-element-readonly" placeholder="Contact Number (2)" readonly="true" value="<?php echo empty($agent->company->contact_number2) ? NULL : $agent->company->contact_number2 ; ?>">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Email Address</strong> <span class="text-danger">*</span></label>
                                            <input type="text" name="agent_email" class="form-control vft-element-readonly" placeholder="Email Address" readonly="true" value="<?php echo $agent->company->email; ?>">
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
                            <h5 class="m-b-0 text-white">Login Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><strong>Username</strong></label>
                                                <div class="alert alert-warning">
                                                    <h3 class="m-b-20"><?php echo $login->username; ?></h3>
                                                </div>
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
                            <h5 class="m-b-0 text-white">Reset Password</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-warning">
                                                Password will be reset to <span class="text-dark">123456</span>.
                                            </div>
                                            <div class="form-group">
                                                <div class="checkbox checkbox-success">
                                                    <input id="checkbox1" type="checkbox" name="agent_reset" value="YES">
                                                    <label for="checkbox1">Reset Password</label>
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
                    <div class="col-md-12">
                        <div class="pull-right">
                            <input type="hidden" name="agentid" class="agentid" value="<?php echo $agent->id; ?>" />
                            <a class="btn btn-success" id="reset-agent">
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
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.extend2.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/agent/reset.js", CClientScript::POS_END);