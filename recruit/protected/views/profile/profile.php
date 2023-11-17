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
        <?php if($user->role->id == 2){ ?>
            <div class="card">
                <img class="card-img-top" src="vendor/imandor/images/teras_logo.png" alt="Teras" height="150">
                <div class="card-body">
                    <h4 class="card-title">TERAS</h4>
                    <p class="card-text">TERAS SDN BHD</p>
                    <p class="card-text">
                        UNIT 5-5-5 TOWER 5<br />
                        UOA BUSINESS PARK<br />
                        NO.1, JALAN PENGATURCARA U1/51A<br />
                        SECTION U1<br />
                        40150 SHAH ALAM<br />
                        SELANGOR DARUL EHSAN
                    </p>
                    <p class="card-text">
                        +603-5880-0653<br />+603-5880-0654
                    </p>
                    <p class="card-text">
                        admin@teras.com.my<br />terassb@gmail.com
                    </p>
                    <!--
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                    -->
                </div>
            </div>
        <?php } else { ?>    
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
        <?php } ?>    
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
                <?php if($user->role->id == 2 && $user->access_id == 1){ ?>    
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#user" role="tab">User</a>
                    </li>
                <?php } ?>    
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
                                            <div class="ribbon ribbon-danger ribbon-right">Profile Information</div>
                                            
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
                                    <form id="form-edit-company">
                                        <input type="hidden" name="cid" value="<?php echo $user->profile->company->id; ?>">
                                        <div class="form-actions">
                                            <h3 class="m-b-20">Company Information</h3>
                                            <div class="ribbon ribbon-danger ribbon-right">Company Information</div>
                                            
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
                                                        <input type="text" name="company_address1" class="form-control vft-element" placeholder="Company Address (1)" value="<?php echo $user->profile->company->address1; ?>" data-required="true">
                                                        <input type="text" name="company_address2" class="form-control vft-element" placeholder="Company Address (2)" value="<?php echo $user->profile->company->address2; ?>">
                                                        <input type="text" name="company_address3" class="form-control vft-element" placeholder="Company Address (3)" value="<?php echo $user->profile->company->address3; ?>">
                                                        <input type="text" name="company_address4" class="form-control vft-element" placeholder="Company Address (4)" value="<?php echo $user->profile->company->address4; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Zip Code <i class="fa fa-asterisk text-danger"></i></strong></label>
                                                        <input type="text" name="company_zipcode" class="form-control vft-element" placeholder="Zip Code" value="<?php echo $user->profile->company->postcode; ?>" data-required="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>State <i class="fa fa-asterisk text-danger"></i></strong></label>
                                                        <select name="company_state" class="form-control select2-state custom-select vft-element" data-required="true">
                                                            <option value="">Select State</option>
                                                            <?php 
                                                                foreach($state as $s){ 
                                                                $state_selected = $user->profile->company->state_id == $s->id ? 'selected' : NULL;    
                                                            ?>
                                                                <option value="<?php echo $s->id; ?>" <?php echo $state_selected; ?>><?php echo $s->name; ?></option>
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
                                                        <a class="btn btn-success" id="submit-company">
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
                                            <div class="ribbon ribbon-danger ribbon-right">Person In Charge Information</div>
                                            
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
                                            <div class="ribbon ribbon-danger ribbon-right">Password Information</div>
                                            
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
                    
                    <!-- User -->
                    <div class="tab-pane" id="user" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <h3 class="m-b-20">Admin User</h3>
                                    
                                    <div class="col-md-12">
                                        <div class="pull-right">
                                            <a href="javascript:void(0)" class="btn btn-info d-none d-lg-block m-l-15 text-white user-new">
                                                <i class="fa fa-plus-circle"></i> Register New User
                                            </a>
                                        </div>
                                    </div>    
                                    
                                    <div class="table-responsive m-t-40">
                                        <table id="table-application-user" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Code</th>
                                                    <th>Username</th>
                                                    <th>Full Name</th>
                                                    <th>Contact Number</th>
                                                    <th>Mobile Number</th>
                                                    <!--
                                                    <th>Registered Date</th>
                                                    -->
                                                    <th width="14%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $i = 0;
                                                foreach($useradmin as $u){
                                                    $i++;
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $i; ?></td>
                                                    <td><?php echo $u->profile->code; ?></td>
                                                    <td><?php echo strtoupper($u->username); ?></td>
                                                    <td><?php echo strtoupper($u->profile->fullname); ?></td>
                                                    <td><?php echo strtoupper($u->profile->contact_number1).'<br />'.strtoupper($u->profile->contact_number2); ?></td>
                                                    <td><?php echo strtoupper($u->profile->mobile_number1).'<br />'.strtoupper($u->profile->mobile_number2); ?></td>
                                                    <!--
                                                    <td><?php echo date('d M Y', strtotime($u->created_at)); ?></td>
                                                    -->
                                                    <td>
                                                        <a data-id="<?php echo $u->id; ?>" class="btn btn-sm waves-effect waves-light btn-info text-white user-edit" data-toggle="tooltip" data-placement="top" title="Edit" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                        <a data-id="<?php echo $u->id; ?>" class="btn btn-sm waves-effect waves-light btn-danger text-white user-delete" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><i class="fa fa-trash"></i></a>
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
                    </div>
                    
                </div>    
            </div>
        </div>    
    </div>       
</div>

<div class="modal fade" id="modal-new-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title-new-user">Admin User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-new-user">
                <div class="modal-body">
                    <div class="row row-line">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><strong>Full Name</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="fullname" class="form-control vft-element fullname" placeholder="Full Name" data-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row row-line">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><strong>Username</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="username" class="form-control vft-element username" placeholder="Username" data-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row row-line">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><strong>Contact Number 1</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="contact_number1" class="form-control vft-element contactnumber1" placeholder="Contact Number 1" data-required="true">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><strong>Contact Number 2</strong></label>
                                <input type="text" name="contact_number2" class="form-control vft-element contactnumber2" placeholder="Contact Number 2">
                            </div>
                        </div>
                    </div>
                    <div class="row row-line">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><strong>Mobile Number 1</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="mobile_number1" class="form-control vft-element mobilenumber1" placeholder="Contact Number 1" data-required="true">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><strong>Mobile Number 2</strong></label>
                                <input type="text" name="mobile_number2" class="form-control vft-element mobilenumber2" placeholder="Contact Number 2">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><strong>Email Address</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="email" class="form-control vft-element emailaddress" placeholder="Email Address" data-required="true">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="userid" class="userid" />
                    <input type="hidden" name="method" class="method" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="submit-user">Save</button>
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
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/profile/view.js", CClientScript::POS_END);