<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">View</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item">Employer</li>
                    <li class="breadcrumb-item active">View</li>
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
            <h4 class="card-title">View Employer Information</h4>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"> 
                        <?php echo Helpers::fileDisplayCircle('uploads/employers/',$employer->company->guid,$employer->company->name); ?>
                        <h4 class="card-title m-t-10"><?php echo $employer->company->name; ?></h4>
                        <h6 class="card-subtitle"><?php echo $employer->code; ?></h6>
                        <h6 class="card-subtitle"><?php echo $employer->company->person_incharge; ?></h6>
                        <img src="<?php echo Yii::app()->params['qrlink']; ?>/php/qr.php?d=<?php echo $employer->company->guid; ?>&e=Q&t=J&size=150" class="image-qrcode" />
                    </center>
                </div>
                
                <div><hr></div>
                
                <div class="card-body"> 
                    <small class="text-muted p-t-30 db">Address</small>
                    <h6 class="text-black font-bold"><?php echo $employer->company->address1; ?></h6>
                    <?php
                        echo empty($employer->company->address2) ? NULL : '<h6 class="text-black font-bold">'.$employer->company->address2.'</h6>';
                        echo empty($employer->company->address3) ? NULL : '<h6 class="text-black font-bold">'.$employer->company->address3.'</h6>';
                        echo empty($employer->company->address4) ? NULL : '<h6 class="text-black font-bold">'.$employer->company->address4.'</h6>';
                    ?>
                    <small class="text-muted p-t-30 db">Zip Code</small>
                    <h6 class="text-black font-bold"><?php echo $employer->company->postcode; ?></h6>
                    <small class="text-muted p-t-30 db">District</small>
                    <h6 class="text-black font-bold"><?php echo $employer->company->district; ?></h6>
                    <small class="text-muted p-t-30 db">State</small>
                    <h6 class="text-black font-bold"><?php echo $employer->company->state->name; ?></h6>
                    <small class="text-muted p-t-30 db">Phone</small>
                    <h6 class="text-black font-bold"><?php echo $employer->company->contact_number1; ?></h6>
                    <?php
                        echo empty($employer->company->contact_number2) ? NULL : '<h6 class="text-black font-bold">'.$employer->company->contact_number2.'</h6>';
                    ?>
                    <small class="text-muted p-t-30 db">Mobile</small>
                    <?php
                        echo empty($employer->company->mobile_number1) ? NULL : '<h6 class="text-black font-bold">'.$employer->company->mobile_number1.'</h6>';
                        echo empty($employer->company->mobile_number2) ? NULL : '<h6 class="text-black font-bold">'.$employer->company->mobile_number2.'</h6>';
                    ?>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#demandletter" role="tab">D. Letter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#employer" role="tab">Employer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#person" role="tab">Person</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#worker" role="tab">F. Worker</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Demand Letter -->
                    <div class="tab-pane active" id="demandletter" role="tabpanel">
                        <div class="card-body">
                            <div class="row">
                                <h3 class="m-b-20">Demand Letter Information</h3>
                                <div class="ribbon ribbon-danger ribbon-right">Demand Letter</div>

                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Demand<br />Letter ID</th>
                                                    <th class="text-center">
                                                        <span class="badge badge-info">A</span><br />Required
                                                    </th>
                                                    <th class="text-center">
                                                        <span class="badge badge-info">B</span><br />Allocated
                                                    </th>
                                                    <th class="text-center">
                                                        <span class="badge badge-danger">C = A - B</span><br />Balance
                                                    </th>
                                                    <th class="text-center">
                                                        <span class="badge badge-info">D</span><br />Arrived
                                                    </th>
                                                    <th class="text-center">
                                                        <span class="badge badge-danger">E = C - D</span><br />Balance
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $total = array(
                                                    'required' => 0,
                                                    'allocated' => 0,
                                                    'balance1' => 0,
                                                    'arrived' => 0,
                                                    'balance2' => 0
                                                );

                                                if(count($statfw) > 0){
                                                    foreach($statfw as $s){
                                            ?> 
                                                <tr>
                                                    <td class="text-center vert-middle"><?php echo $s['code']; ?></td>
                                                    <td class="text-center font-large required"><?php echo $s['required']; ?></td>
                                                    <td class="text-center font-large allocated"><?php echo $s['allocated']; ?></td>
                                                    <td class="text-center font-large balance1 text-danger"><?php echo $s['balance1']; ?></td>
                                                    <td class="text-center font-large arrived"><?php echo $s['arrived']; ?></td>
                                                    <td class="text-center font-large balance2 text-danger"><?php echo $s['balance2']; ?></td>
                                                </tr>
                                            <?php
                                                        $total['required'] = $total['required'] + $s['required'];
                                                        $total['allocated'] = $total['allocated'] + $s['allocated'];
                                                        $total['balance1'] = $total['balance1'] + $s['balance1'];
                                                        $total['arrived'] = $total['arrived'] + $s['arrived'];
                                                        $total['balance2'] = $total['balance2'] + $s['balance2'];
                                                    }
                                                } else {    
                                            ?>
                                                <tr>
                                                    <td class="text-center vert-middle">No Code</td>
                                                    <td class="text-center font-large required">0</td>
                                                    <td class="text-center font-large allocated">0</td>
                                                    <td class="text-center font-large balance1 text-danger">0</td>
                                                    <td class="text-center font-large arrived">0</td>
                                                    <td class="text-center font-large balance2 text-danger">0</td>
                                                </tr>
                                            <?php
                                                }
                                                if(count($statfw) > 0){
                                            ?>
                                            <tr>
                                                <td class="text-center vert-middle font-bold bg-total2">Total</td>
                                                <td class="text-center font-large required bg-total2"><?php echo $total['required']; ?></td>
                                                <td class="text-center font-large allocated bg-total2"><?php echo $total['allocated']; ?></td>
                                                <td class="text-center font-large balance1 bg-total2 text-danger"><?php echo $total['balance1']; ?></td>
                                                <td class="text-center font-large arrived bg-total2"><?php echo $total['arrived']; ?></td>
                                                <td class="text-center font-large balance2 bg-total2 text-danger"><?php echo $total['balance2']; ?></td>
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
                    
                    <!-- Employer -->
                    <div class="tab-pane" id="employer" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <h3 class="m-b-20">Employer Information</h3>
                                    <div class="ribbon ribbon-danger ribbon-right">Employer</div>
                                    
                                    <form id="form-view-employer">
                                        <div class="form-actions">
                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Employer Name</strong></label>
                                                        <input type="text" name="employer_name" class="form-control vft-element-readonly" placeholder="Employer Name" readonly="true" value="<?php echo strtoupper($employer->company->name); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Employer Address</strong></label>
                                                        <input type="text" name="employer_address1" class="form-control vft-element-readonly" placeholder="Employer Address (1)" readonly="true" value="<?php echo $employer->company->address1; ?>">
                                                        <input type="text" name="employer_address2" class="form-control vft-element-readonly" placeholder="Employer Address (2)" readonly="true" value="<?php echo empty($employer->company->address2) ? NULL : strtoupper($employer->company->address2); ?>">
                                                        <input type="text" name="employer_address3" class="form-control vft-element-readonly" placeholder="Employer Address (3)" readonly="true" value="<?php echo empty($employer->company->address3) ? NULL : strtoupper($employer->company->address3); ?>">
                                                        <input type="text" name="employer_address4" class="form-control vft-element-readonly" placeholder="Employer Address (4)" readonly="true" value="<?php echo empty($employer->company->address4) ? NULL : strtoupper($employer->company->address4); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Registration Number</strong></label>
                                                        <input type="text" name="employer_regno" class="form-control vft-element-readonly" placeholder="Registration Number" readonly="true" value="<?php echo strtoupper($employer->company->register_number); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Zip Code</strong></label>
                                                        <input type="text" name="employer_zipcode" class="form-control vft-element-readonly" placeholder="Zip Code" readonly="true" value="<?php echo strtoupper($employer->company->postcode); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>District</strong></label>
                                                        <input type="text" name="employer_district" class="form-control vft-element-readonly" placeholder="District" readonly="true" value="<?php echo strtoupper($employer->company->district); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>State</strong></label>
                                                        <input type="text" name="employer_state" class="form-control vft-element-readonly" placeholder="State" readonly="true" value="<?php echo $employer->company->state->name; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Contact Number (1)</strong></label>
                                                        <input type="text" name="employer_contact1" class="form-control vft-element-readonly" placeholder="Contact Number (1)" readonly="true" value="<?php echo strtoupper($employer->company->contact_number1); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Contact Number (2)</strong></label>
                                                        <input type="text" name="employer_contact2" class="form-control vft-element-readonly" placeholder="Contact Number (2)" readonly="true" value="<?php echo empty($employer->company->contact_number2) ? NULL : strtoupper($employer->company->contact_number2); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row row-line">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Email Address</strong></label>
                                                        <input type="text" name="employer_email" class="form-control vft-element-readonly" placeholder="Email Address" readonly="true" value="<?php echo $employer->company->email; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Username</strong></label>
                                                        <input type="text" name="employer_username" class="form-control vft-element-readonly" placeholder="Username" readonly="true" value="<?php echo $login->username; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Person Incharge -->
                    <div class="tab-pane" id="person" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <div class="ribbon ribbon-danger ribbon-right">Person In Charge</div>
                                    <div class="col-md-12">
                                        <h3 class="m-b-20">Person In Charge Information</h3>
                                        
                                        <form id="form-view-personincharge">
                                            <div class="form-actions">
                                                <div class="row row-line">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label"><strong>Full Name</strong></label>
                                                            <input type="text" name="pic_name" class="form-control vft-element-readonly" placeholder="Full Name" readonly="true" value="<?php echo strtoupper($employer->company->person_incharge); ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row row-line">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label"><strong>Mobile Number (1)</strong></label>
                                                            <input type="text" name="pic_mobile1" class="form-control vft-element-readonly" placeholder="Mobile Number (1)" readonly="true" value="<?php echo strtoupper($employer->company->mobile_number1); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label"><strong>Mobile Number (2)</strong></label>
                                                            <input type="text" name="pic_mobile2" class="form-control vft-element-readonly" placeholder="Mobile Number (2)" readonly="true" value="<?php echo empty($employer->company->mobile_number2) ? NULL : strtoupper($employer->company->mobile_number2); ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row row-line">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label class="control-label"><strong>Email Address</strong></label>
                                                            <input type="text" name="pic_email" class="form-control vft-element-readonly" placeholder="Email Address" readonly="true" value="<?php echo $employer->company->person_email; ?>">
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
                    
                    <!-- Profile -->
                    <div class="tab-pane" id="profile" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <div class="ribbon ribbon-danger ribbon-right">Profile</div>
                                    <div class="col-md-12">
                                        <h3 class="m-b-20">Profile Information</h3>
                                        
                                        <form id="form-view-profile">
                                            <div class="form-actions">
                                                <div class="row row-line">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label"><strong>Full Name</strong></label>
                                                            <input type="text" name="profile_name" class="form-control vft-element-readonly" placeholder="Full Name" readonly="true" value="<?php echo strtoupper($employer->fullname); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row row-line">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label"><strong>Initial</strong></label>
                                                            <input type="text" name="profile_initial" class="form-control vft-element-readonly" placeholder="Initial" readonly="true" value="<?php echo strtoupper($employer->initial); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row row-line">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label"><strong>Contact Number (1)</strong></label>
                                                            <input type="text" name="profile_contact1" class="form-control vft-element-readonly" placeholder="Contact Number (1)" readonly="true" value="<?php echo strtoupper($employer->contact_number1); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label"><strong>Contact Number (2)</strong></label>
                                                            <input type="text" name="profile_contact2" class="form-control vft-element-readonly" placeholder="Contact Number (2)" readonly="true" value="<?php echo empty($employer->contact_number2) ? NULL : strtoupper($employer->contact_number2); ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row row-line">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label"><strong>Mobile Number (1)</strong></label>
                                                            <input type="text" name="profile_mobile1" class="form-control vft-element-readonly" placeholder="Mobile Number (1)" readonly="true" value="<?php echo strtoupper($employer->mobile_number1); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label"><strong>Mobile Number (2)</strong></label>
                                                            <input type="text" name="profile_mobile2" class="form-control vft-element-readonly" placeholder="Mobile Number (2)" readonly="true" value="<?php echo empty($employer->mobile_number2) ? NULL : strtoupper($employer->mobile_number2); ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row row-line">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label class="control-label"><strong>Email Address</strong></label>
                                                            <input type="text" name="profile_email" class="form-control vft-element-readonly" placeholder="Email Address" readonly="true" value="<?php echo $employer->email; ?>">
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
                    
                    <!-- Foreign Worker -->
                    <div class="tab-pane" id="worker" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <h3 class="m-b-20">Foreign Worker Information</h3>
                                    <div class="ribbon ribbon-danger ribbon-right">Foreign Worker</div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card card-shadow">
                                            <div class="d-flex flex-row">
                                                <div class="p-10 bg-info">
                                                    <h3 class="text-white box m-b-0"><i class="icon-people"></i></h3></div>
                                                <div class="align-self-center m-l-20">
                                                    <h3 class="m-b-0 text-info"><?php echo count($worker['total']); ?></h3>
                                                    <h5 class="text-muted m-b-0">Total</h5></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card card-shadow">
                                            <div class="d-flex flex-row">
                                                <div class="p-10 bg-success">
                                                    <h3 class="text-white box m-b-0"><i class="fa fa-male"></i></h3></div>
                                                <div class="align-self-center m-l-20">
                                                    <h3 class="m-b-0 text-success"><?php echo count($worker['male']); ?></h3>
                                                    <h5 class="text-muted m-b-0">Male</h5></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card card-shadow">
                                            <div class="d-flex flex-row">
                                                <div class="p-10 bg-danger">
                                                    <h3 class="text-white box m-b-0"><i class="fa fa-female"></i></h3></div>
                                                <div class="align-self-center m-l-20">
                                                    <h3 class="m-b-0 text-danger"><?php echo count($worker['female']); ?></h3>
                                                    <h5 class="text-muted m-b-0">Female</h5></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="table-responsive m-t-40">
                                        <table id="table-application-worker" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Code</th>
                                                    <th>Full Name</th>
                                                    <th>Passport</th>
                                                    <th>Job Sector</th>
                                                    <th>Gender</th>
                                                    <th>Registered Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $i = 0;
                                                foreach($transaction as $t){
                                                    $i++;
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $i; ?></td>
                                                    <td><?php echo $t->worker->code; ?></td>
                                                    <td><?php echo strtoupper($t->worker->full_name); ?></td>
                                                    <td><?php echo strtoupper($t->passport->number); ?></td>
                                                    <td><?php echo strtoupper($t->worker->jobsector->name); ?></td>
                                                    <td><?php echo strtoupper($t->worker->gender->name); ?></td>
                                                    <td><?php echo date('d M Y', strtotime($t->created_at)); ?></td>
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

<?php
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/datatables/jquery.dataTables.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/toast-master/js/jquery.toast.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/select2/dist/js/select2.full.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/employer/view.js", CClientScript::POS_END);