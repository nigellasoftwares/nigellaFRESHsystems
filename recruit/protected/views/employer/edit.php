<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Edit</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item">Employer</li>
                    <li class="breadcrumb-item active">Edit</li>
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
            <h4 class="card-title">Edit Employer Information</h4>
        </div>
    </div>
    
    <div class="card">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs profile-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#demandletter" role="tab">Demand Letter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#employer" role="tab">Employer</a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Demand Letter -->
            <div class="tab-pane active" id="demandletter" role="tabpanel">
                <div class="card-header bg-info">
                    <h5 class="m-b-0 text-white">Demand Letter Information</h5>
                    <div class="ribbon ribbon-danger ribbon-right">Demand Letter Information</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <form id="form-register-demandletter">
                                <div class="alert alert-warning">
                                    <h3 class="text-warning"><i class="fa fa-exclamation-circle"></i> Information</h3> 
                                    You need to upload the <span class="font-bold text-danger">PDF</span> file format only.
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Foreign Worker Required</strong></label>
                                            <input type="text" name="fw_required" class="form-control text-right vft-element2 fw-required" placeholder="0" data-parsley-required="true">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Remark</strong></label>
                                            <input type="text" name="fw_remark" class="form-control vft-element2" placeholder="Remark">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Demand Letter Upload</strong> <span class="text-danger"><br />PDF Only</span></label>
                                            <input type="file" name="upload_demandletter" class="form-control vft-element2" data-parsley-fileextension="pdf" data-parsley-required="true">
                                        </div>
                                    </div>
									<div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Document Upload (1)</strong> <span class="text-danger"><br />PDF Only</span></label>
                                            <input type="file" name="upload_document1" class="form-control vft-element2" data-parsley-fileextension="pdf" data-parsley-required="true">
                                        </div>
                                    </div>
									<div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Document Upload (2)</strong> <span class="text-danger"><br />PDF Only</span></label>
                                            <input type="file" name="upload_document2" class="form-control vft-element2" data-parsley-fileextension="pdf" data-parsley-required="true">
                                        </div>
                                    </div>
									<div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Document Upload (3)</strong> <span class="text-danger"><br />PDF Only</span></label>
                                            <input type="file" name="upload_document3" class="form-control vft-element2" data-parsley-fileextension="pdf" data-parsley-required="true">
                                        </div>
                                    </div>
									<div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label"><strong>Document Upload (4)</strong> <span class="text-danger"><br />PDF Only</span></label>
                                            <input type="file" name="upload_document4" class="form-control vft-element2" data-parsley-fileextension="pdf" data-parsley-required="true">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pull-right">
                                            <input type="hidden" name="employerid" class="employerid" value="<?php echo $employer->id; ?>" />
                                            <a class="btn btn-success" id="submit-demandletter">
                                                <i class="fa fa-check"></i> Save
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-9">
                            <h3 class="m-b-20">Recruitment Status</h3>
                            
                            <div class="alert alert-info">
                                <h4 class="text-info"><i class="fa fa-briefcase"></i> <?php echo $employer->company->name; ?></h4> 
                                <i class="fa fa-thumb-tack"></i> <?php echo $employer->company->register_number; ?> <i class="fa fa-thumb-tack m-l-20"></i> <?php echo $employer->company->district; ?> <i class="fa fa-thumb-tack m-l-20"></i> <?php echo $employer->company->state->name; ?>
                            </div>

                            <div class="row">
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
                                                    <th class="text-center">Action</th>
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
                                                    <td class="text-center vert-middle"><?php echo $s['action']; ?></td>
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
                                                    <td class="text-center vert-middle">No Action</td>
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
                                                    <td class="text-center vert-middle bg-total2">&nbsp;</td>
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
                        
            <!-- Employer -->
            <div class="tab-pane" id="employer" role="tabpanel">
                <div class="card-header bg-info">
                    <h5 class="m-b-0 text-white">Employer Information</h5>
                    <div class="ribbon ribbon-danger ribbon-right">Employer Information</div>
                </div>
                <div class="card-body">
                    <form id="form-edit-employer">
                        <div class="form-actions">
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="alert alert-warning">
                                        <h3 class="text-warning"><i class="fa fa-exclamation-circle"></i> Information</h3> 
                                        You need to upload the <span class="font-bold text-danger">JPG</span> file format only or you may upload it later.
                                    </div>

                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <?php echo Helpers::fileDisplaySlip('uploads/employers/',$employer->company->guid,$employer->company->name); ?>
                                            </div>
                                        </div>
                                    </div>    

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><strong>Logo Upload</strong><br /><span class="text-danger">JPG Only</span></label>
                                                <input type="file" name="upload_logo" class="form-control vft-element2" data-parsley-fileextension="jpg">
                                            </div>
                                        </div>
                                    </div>
                                    
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

                                <div class="col-md-9">
                                    <h3 class="m-b-20">Employer Information</h3>

                                    <div class="row row-line">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><strong>Employer Name</strong> <span class="text-danger">*</span></label>
                                                <input type="text" name="employer_name" class="form-control vft-element" placeholder="Employer Name" data-parsley-required="true" value="<?php echo $employer->company->name; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row row-line">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label"><strong>Employer Address</strong> <span class="text-danger">*</span></label>
                                                <input type="text" name="employer_address1" class="form-control vft-element" placeholder="Employer Address (1)" data-parsley-required="true" value="<?php echo $employer->company->address1; ?>">
                                                <input type="text" name="employer_address2" class="form-control vft-element" placeholder="Employer Address (2)" value="<?php echo empty($employer->company->address2) ? NULL : $employer->company->address2; ?>">
                                                <input type="text" name="employer_address3" class="form-control vft-element" placeholder="Employer Address (3)" value="<?php echo empty($employer->company->address3) ? NULL : $employer->company->address3; ?>">
                                                <input type="text" name="employer_address4" class="form-control vft-element" placeholder="Employer Address (4)" value="<?php echo empty($employer->company->address4) ? NULL : $employer->company->address4; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label"><strong>Registration Number</strong> <span class="text-danger">*</span></label>
                                                <input type="text" name="employer_regno" class="form-control vft-element" placeholder="Registration Number" data-parsley-required="true" value="<?php echo $employer->company->register_number; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label"><strong>Zip Code</strong> <span class="text-danger">*</span></label>
                                                <input type="text" name="employer_zipcode" class="form-control vft-element" placeholder="Zip Code" data-parsley-required="true" value="<?php echo $employer->company->postcode; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row row-line">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label"><strong>District</strong> <span class="text-danger">*</span></label>
                                                <input type="text" name="employer_district" class="form-control vft-element" placeholder="District" data-parsley-required="true" value="<?php echo $employer->company->district; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label"><strong>State</strong> <span class="text-danger">*</span></label>
                                                <select name="employer_state" class="form-control select2-state custom-select vft-element" data-parsley-required="true">
                                                    <option value="">Select State</option>
                                                    <?php 
                                                        foreach($state as $s){ 
                                                            $state_selected = $employer->company->state_id == $s->id ? 'selected' : NULL;
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
                                                <label class="control-label"><strong>Contact Number (1)</strong> <span class="text-danger">*</span></label>
                                                <input type="text" name="employer_contact1" class="form-control vft-element" placeholder="Contact Number (1)" data-parsley-required="true" value="<?php echo $employer->company->contact_number1; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label"><strong>Contact Number (2)</strong></label>
                                                <input type="text" name="employer_contact2" class="form-control vft-element" placeholder="Contact Number (2)" value="<?php echo empty($employer->company->contact_number2) ? NULL : $employer->company->contact_number2; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row row-line2">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><strong>Email Address</strong> <span class="text-danger">*</span></label>
                                                <input type="text" name="employer_email" class="form-control vft-element" placeholder="Email Address" data-parsley-required="true" value="<?php echo $employer->company->email; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <h3 class="m-b-20">Person In Charge Information</h3>

                                    <div class="row row-line">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><strong>Full Name</strong> <span class="text-danger">*</span></label>
                                                <input type="text" name="pic_fullname" class="form-control vft-element" placeholder="Full Name" data-parsley-required="true" value="<?php echo $employer->company->person_incharge; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row row-line">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label"><strong>Mobile Number (1)</strong> <span class="text-danger">*</span></label>
                                                <input type="text" name="pic_mobile1" class="form-control vft-element" placeholder="Mobile Number (1)" data-parsley-required="true" value="<?php echo $employer->company->mobile_number1; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label"><strong>Mobile Number (2)</strong></label>
                                                <input type="text" name="pic_mobile2" class="form-control vft-element" placeholder="Mobile Number (2)" value="<?php echo empty($employer->company->contact_number2) ? NULL : $employer->company->mobile_number2; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row row-line">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><strong>Email Address</strong> <span class="text-danger">*</span></label>
                                                <input type="text" name="pic_email" class="form-control vft-element" placeholder="Email Address" data-parsley-required="true" value="<?php echo $employer->company->person_email; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-right">
                                        <input type="hidden" name="employerid" class="employerid" value="<?php echo $employer->id; ?>" />
                                        <a class="btn btn-success" id="update-employer">
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

<div class="modal fade" id="modal-edit-demandletter">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Demand Letter</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="form-edit-demandletter">
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <h3 class="text-warning"><i class="fa fa-exclamation-circle"></i> Information</h3> 
                        You need to upload the <span class="font-bold text-danger">PDF</span> file format only or you may upload it later.
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label"><strong>Foreign Worker Required</strong></label>
                        <input type="text" name="fw_required" class="form-control text-right vft-element2 fw-required" placeholder="0" data-parsley-required="true">
                    </div>
                    <div class="form-group">
                        <label class="control-label"><strong>Remark</strong></label>
                        <input type="text" name="fw_remark" class="form-control vft-element2 fw-remark" placeholder="Remark">
                    </div>
                    <div class="form-group">
                        <label class="control-label"><strong>Demand Letter Upload</strong> <span class="text-danger">PDF Only</span></label>
                        <input type="file" name="upload_demandletter" class="form-control vft-element2" data-parsley-fileextension="pdf">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="demandletterid" class="demandletter-id">
                    <a id="update-demandletter" class="btn btn-info waves-effect waves-light text-white">Save Changes</a>
                    <a class="btn btn-default waves-effect" data-dismiss="modal">Close</a>
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
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/employer/edit.js", CClientScript::POS_END);