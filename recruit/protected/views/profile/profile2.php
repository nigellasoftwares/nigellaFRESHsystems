<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Profile</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><span class="label label-primary"><?php echo $user->profile->company->name; ?></span></h4>
            <h4 class="card-title">View Profile Information</h4>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card-body bg-light">
                <h5 class="font-light m-t-0">Statistic for Foreign Worker</h5>
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
                        <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#company" role="tab">Company</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#person" role="tab">Person In Charge</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#password" role="tab">Change Password</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Agent -->
                    <div class="tab-pane active" id="profile" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <form id="form-edit-profile">
                                        <div class="form-actions">
                                            <input type="hidden" name="pid" value="<?php echo $user->profile->id; ?>">
                                            <h3 class="m-b-20">Profile Information</h3>
                                    
                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Profile ID</strong></label>
                                                        <input type="text" name="profile_id" class="form-control vft-element-readonly" readonly="true" placeholder="Profile ID" value="<?php echo strtoupper($user->profile->code); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Full Name <i class="fa fa-asterisk text-danger"></i></strong></label>
                                                        <input type="text" name="full_name" class="form-control vft-element" placeholder="Full Name" value="<?php echo strtoupper($user->profile->fullname); ?>" data-required="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Contact Number 1 <i class="fa fa-asterisk text-danger"></i></strong></label>
                                                        <input type="text" name="contact_number1" class="form-control vft-element" placeholder="Contact Number 1" value="<?php echo strtoupper($user->profile->contact_number1); ?>" data-required="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Contact Number 2</strong></label>
                                                        <input type="text" name="contact_number2" class="form-control vft-element" placeholder="Contact Number 2" value="<?php echo strtoupper($user->profile->contact_number2); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Mobile Number 1</strong></label>
                                                        <input type="text" name="mobile_number1" class="form-control vft-element" placeholder="Mobile Number 1" value="<?php echo strtoupper($user->profile->mobile_number1); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Mobile Number 2</strong></label>
                                                        <input type="text" name="mobile_number2" class="form-control vft-element" placeholder="Mobile Number 2" value="<?php echo strtoupper($user->profile->mobile_number2); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Email Address <i class="fa fa-asterisk text-danger"></i></strong></label>
                                                        <input type="text" name="email_address" class="form-control vft-element" placeholder="Email Address" value="<?php echo $user->profile->email; ?>" data-required="true">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="pull-right">
                                                        <a class="btn btn-success" id="submit-profile">
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
                    </div>
                    
                    <!-- Company -->
                    <div class="tab-pane" id="company" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <form id="form-edit-company2">
                                        <input type="hidden" name="cid" value="<?php echo $user->profile->company->id; ?>">
                                        <div class="form-actions">
                                            <h3 class="m-b-20">Company Information</h3>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Company ID</strong></label>
                                                        <input type="text" name="company_id" class="form-control vft-element-readonly" placeholder="Company ID" readonly="true" value="<?php echo $user->profile->company->code; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Company Name <i class="fa fa-asterisk text-danger"></i></strong></label>
                                                        <input type="text" name="company_name" class="form-control vft-element" placeholder="Company Name" value="<?php echo $user->profile->company->name; ?>" data-required="true">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Company Address <i class="fa fa-asterisk text-danger"></i></strong></label>
                                                        <textarea name="company_address" class="form-control vft-element" placeholder="Address" rows="2" data-required="true"><?php echo strtoupper($user->profile->company->address); ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Zip Code <i class="fa fa-asterisk text-danger"></i></strong></label>
                                                        <input type="text" name="company_zipcode" class="form-control vft-element" placeholder="Zip Code" value="<?php echo $user->profile->company->postcode; ?>" data-required="true">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Contact Number 1 <i class="fa fa-asterisk text-danger"></i></strong></label>
                                                        <input type="text" name="company_contact_number1" class="form-control vft-element" placeholder="Contact Number 1" value="<?php echo $user->profile->company->contact_number1; ?>" data-required="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Contact Number 2</strong></label>
                                                        <input type="text" name="company_contact_number2" class="form-control vft-element" placeholder="Contact Number 2" value="<?php echo $user->profile->company->contact_number2; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Email Address <i class="fa fa-asterisk text-danger"></i></strong></label>
                                                        <input type="text" name="company_email_address" class="form-control vft-element" placeholder="Email Address" value="<?php echo $user->profile->company->email; ?>" data-required="true">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="pull-right">
                                                        <a class="btn btn-success" id="submit-company2">
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
                    </div>    
                    
                    <!-- Person -->
                    <div class="tab-pane" id="person" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <form id="form-edit-person">
                                        <input type="hidden" name="cid" value="<?php echo $user->profile->company->id; ?>">
                                        <div class="form-actions">
                                            <h3 class="m-b-20">Person In Charge Information</h3>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Person In Charge Name <i class="fa fa-asterisk text-danger"></i></strong></label>
                                                        <input type="text" name="person_name" class="form-control vft-element" placeholder="Person In Charge Name" value="<?php echo $user->profile->company->person_incharge; ?>" data-required="true">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Mobile Number 1</strong></label>
                                                        <input type="text" name="person_mobile_number1" class="form-control vft-element" placeholder="Contact Number 1" value="<?php echo $user->profile->company->mobile_number1; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Mobile Number 2</strong></label>
                                                        <input type="text" name="person_mobile_number2" class="form-control vft-element" placeholder="Contact Number 2" value="<?php echo $user->profile->company->mobile_number2; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Email Address <i class="fa fa-asterisk text-danger"></i></strong></label>
                                                        <input type="text" name="person_email_address" class="form-control vft-element" placeholder="Email Address" value="<?php echo $user->profile->company->person_email; ?>" data-required="true">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="pull-right">
                                                        <a class="btn btn-success" id="submit-person">
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
                    </div>
                    
                    <!-- Password -->
                    <div class="tab-pane" id="password" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <form id="form-edit-password">
                                        <input type="hidden" name="uid" value="<?php echo $user->id; ?>">
                                        <div class="form-actions">
                                            <h3 class="m-b-20">Password Information</h3>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Current Password <i class="fa fa-asterisk text-danger"></i></strong></label>
                                                        <input type="password" name="password_old" class="form-control vft-element" placeholder="Current Password" data-required="true">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>New Password <i class="fa fa-asterisk text-danger"></i></strong></label>
                                                        <input type="password" name="password_new" id="password-user1" class="form-control vft-element" placeholder="New Password" data-required="true">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Confirm New Password <i class="fa fa-asterisk text-danger"></i></strong></label>
                                                        <input type="password" name="password_retype" id="password-user2" class="form-control vft-element" placeholder="Confirm New Password" data-required="true" data-equalto="#password-user1">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="pull-right">
                                                        <a class="btn btn-success" id="submit-password">
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
                    </div>
                    
                </div>    
            </div>
        </div>    
    </div>       
</div>

<?php
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/toast-master/js/jquery.toast.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.extend.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/profile/view.js", CClientScript::POS_END);