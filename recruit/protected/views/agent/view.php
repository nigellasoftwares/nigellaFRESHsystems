<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">View</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item">Agent</li>
                    <li class="breadcrumb-item active">View</li>
                </ol>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
        <?php if(!strstr(Yii::app()->request->requestUri,"Webmin/LocalAgent") == TRUE){ ?>    
            <div class="pull-right">
                <a href="<?php echo $link; ?>" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                    <i class="fa fa-arrow-circle-o-left"></i> Back To Agent
                </a>
            </div>
        <?php } ?>    
            
            <h4 class="card-title"><span class="label label-primary"><?php echo $user->profile->company->name; ?></span></h4>
        <?php if(strstr(Yii::app()->request->requestUri,"Webmin/ViewSourceAgent") == TRUE){ ?>    
            <h4 class="card-title">View Source Agent Information</h4>
        <?php } else if(strstr(Yii::app()->request->requestUri,"Webmin/LocalAgent") == TRUE){ ?>
            <h4 class="card-title">View Admin Information</h4>
        <?php } else { ?>
            <h4 class="card-title">View Agent Information</h4>
        <?php } ?>    
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card-body bg-light">
                <h5 class="font-light m-t-0">Statistic for Agent</h5>
            </div>
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="txt-oflo"><i class="fa fa-users"></i> Total Regist'd</td>
                                <td><span class="badge badge-info badge-pill">Foreign<br />Worker</span></td>
                                <td class="text-right"><?php echo number_format($statistic['all_count']); ?></td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td class="txt-oflo"><i class="fa fa-users"></i> Today Regist'd</td>
                                <td><span class="badge badge-info badge-pill">Foreign<br />Worker</span></td>
                                <td class="text-right"><?php echo number_format($statistic['today_count']); ?></td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td class="txt-oflo"><i class="fa fa-medkit"></i> Completed</td>
                                <td><span class="badge badge-success badge-pill">Medical</span></td>
                                <td class="text-right"><?php echo number_format($statistic['medical_completed']); ?></td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td class="txt-oflo"><i class="fa fa-medkit"></i> Pending</td>
                                <td><span class="badge badge-success badge-pill">Medical</span></td>
                                <td class="text-right"><?php echo number_format($statistic['medical_pending']); ?></td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td class="txt-oflo"><i class="fa fa-plane"></i> Completed</td>
                                <td><span class="badge badge-warning badge-pill">Visa</span></td>
                                <td class="text-right"><?php echo number_format($statistic['visa_completed']); ?></td>
                            </tr>
                            <tr>
                                <td class="text-center">6</td>
                                <td class="txt-oflo"><i class="fa fa-plane"></i> Pending</td>
                                <td><span class="badge badge-warning badge-pill">Visa</span></td>
                                <td class="text-right"><?php echo number_format($statistic['visa_pending']); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#agent" role="tab">Agent</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#company" role="tab">Company</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#person" role="tab">Person In Charge</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Agent -->
                    <div class="tab-pane active" id="agent" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <form id="form-view-agent">
                                        <div class="form-actions">
                                            <h3 class="m-b-20">Agent Information</h3>
                                            <div class="ribbon ribbon-danger ribbon-right">Agent Information</div>
                                    
                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Agent ID</strong></label>
                                                        <input type="text" name="agent_id" class="form-control vft-element-readonly" placeholder="Agent ID" readonly="true" value="<?php echo strtoupper($agent->code); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Username</strong></label>
                                                        <input type="text" name="agent_username" class="form-control vft-element-readonly" placeholder="Username" readonly="true" value="<?php echo strtoupper($login->username); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Full Name</strong></label>
                                                        <input type="text" name="full_name" class="form-control vft-element-readonly" placeholder="Full Name" readonly="true" value="<?php echo strtoupper($agent->fullname); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Contact Number 1</strong></label>
                                                        <input type="text" name="contact_number1" class="form-control vft-element-readonly" placeholder="Contact Number 1" readonly="true" value="<?php echo strtoupper($agent->contact_number1); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Contact Number 2</strong></label>
                                                        <input type="text" name="contact_number2" class="form-control vft-element-readonly" placeholder="Contact Number 2" readonly="true" value="<?php echo strtoupper($agent->contact_number2); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Mobile Number 1</strong></label>
                                                        <input type="text" name="mobile_number1" class="form-control vft-element-readonly" placeholder="Mobile Number 1" readonly="true" value="<?php echo strtoupper($agent->mobile_number1); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Mobile Number 2</strong></label>
                                                        <input type="text" name="mobile_number2" class="form-control vft-element-readonly" placeholder="Mobile Number 2" readonly="true" value="<?php echo strtoupper($agent->mobile_number2); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Email Address</strong></label>
                                                        <input type="text" name="email_address" class="form-control vft-element-readonly" placeholder="Email Address" readonly="true" value="<?php echo $agent->email; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Company -->
                    <div class="tab-pane" id="company" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <form id="form-view-company">
                                        <div class="form-actions">
                                            <h3 class="m-b-20">Company Information</h3>
                                            <div class="ribbon ribbon-danger ribbon-right">Company Information</div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Company ID</strong></label>
                                                        <input type="text" name="company_id" class="form-control vft-element-readonly" placeholder="Company ID" readonly="true" value="<?php echo $agent->company->code; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Company Name</strong></label>
                                                        <input type="text" name="company_name" class="form-control vft-element-readonly" placeholder="Company Name" readonly="true" value="<?php echo $agent->company->name; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Company Address</strong></label>
                                                        <textarea name="company_address" class="form-control vft-element-readonly" placeholder="Address" rows="2" readonly="true"><?php echo strtoupper($agent->company->address); ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Zip Code</strong></label>
                                                        <input type="text" name="company_zipcode" class="form-control vft-element-readonly" placeholder="Zip Code" value="<?php echo $agent->company->postcode; ?>" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Contact Number 1</strong></label>
                                                        <input type="text" name="company_contact_number1" class="form-control vft-element-readonly" placeholder="Contact Number 1" value="<?php echo $agent->company->contact_number1; ?>" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Contact Number 2</strong></label>
                                                        <input type="text" name="company_contact_number2" class="form-control vft-element-readonly" placeholder="Contact Number 2" value="<?php echo $agent->company->contact_number2; ?>" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Email Address</strong></label>
                                                        <input type="text" name="company_email_address" class="form-control vft-element-readonly" placeholder="Email Address" readonly="true" value="<?php echo $agent->company->email; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>    
                             </div>
                        </div>
                    </div>    
                    
                    <!-- Person -->
                    <div class="tab-pane" id="person" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <form id="form-view-company">
                                        <div class="form-actions">
                                            <h3 class="m-b-20">Person In Charge Information</h3>
                                            <div class="ribbon ribbon-danger ribbon-right">Person In Charge Information</div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Person In Charge Name</strong></label>
                                                        <input type="text" name="person_name" class="form-control vft-element-readonly" placeholder="Person In Charge Name" readonly="true" value="<?php echo $agent->company->person_incharge; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Mobile Number 1</strong></label>
                                                        <input type="text" name="person_mobile_number1" class="form-control vft-element-readonly" placeholder="Contact Number 1" value="<?php echo $agent->company->mobile_number1; ?>" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Mobile Number 2</strong></label>
                                                        <input type="text" name="person_mobile_number2" class="form-control vft-element-readonly" placeholder="Contact Number 2" value="<?php echo $agent->company->mobile_number2; ?>" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Email Address</strong></label>
                                                        <input type="text" name="person_email_address" class="form-control vft-element-readonly" placeholder="Email Address" readonly="true" value="<?php echo $agent->company->person_email; ?>">
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
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/agent/view.js", CClientScript::POS_END);