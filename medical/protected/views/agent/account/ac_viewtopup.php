<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Top-Up Management</h2>
        <ol class="breadcrumb">
            <li>
                Account
            </li>
            <li>
                View Top-Up
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <h4>Account Information</h4>
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-primary">
                    <h5>Available Balance</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo number_format($bdashboard['available'],2); ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-list-alt"></i> RM</div>
                    <small>Account Available</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-warning">
                    <h5>Current Balance</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo number_format($bdashboard['current'],2); ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-list"></i> RM</div>
                    <small>Current Available</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-success">
                    <h5>Pending Top-Ups</h5>
                    <span class="pull-right">
                        <h5><?php echo number_format($bdashboard['pending_number'],0); ?></h5>
                    </span>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo number_format($bdashboard['pending'],2); ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-user"></i> RM</div>
                    <small>Pending Amount</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-info">
                    <h5>Approved Top-Ups</h5>
                    <span class="pull-right">
                        <h5><?php echo number_format($bdashboard['approved_number'],0); ?></h5>
                    </span>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo number_format($bdashboard['approved'],2); ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-bank"></i> RM</div>
                    <small>Approved Amount</small>
                </div>
            </div>
        </div>
    </div>
    
    <h4>Payment Information</h4>
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-primary">
                    <h5>Payment Total</h5>
                    <div class="pull-right">
                        <span class="text-white font-bold">10</span>
                    </div>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo number_format($bdashboard['total'],2); ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-list-alt"></i> RM</div>
                    <small>Payment Registered</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-warning">
                    <h5>Payment Applicant</h5>
                    <div class="pull-right">
                        <span class="text-white font-bold">10</span>
                    </div>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo number_format($bdashboard['amount'],2); ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-list"></i> RM</div>
                    <small>Total Amount</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-success">
                    <h5>Payment Dependant</h5>
                    <div class="pull-right">
                        <span class="text-white font-bold">10</span>
                    </div>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo number_format($bdashboard['gst'],2); ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-bank"></i> RM</div>
                    <small>Total Amount</small>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
            <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Top-Up Transaction List</h5>
                    <div class="ibox-tools">
                        <a class="btn btn-outline btn-success topup-register">
                            <i class="fa fa-plus"></i> Register Top-Up
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover table-list-viewtopup">
                            <thead>
                                <tr>
                                    <th width="6%">#</th>
                                    <th width="10%">Date Time</th>
                                    <th width="15%">Top-Up ID</th>
                                    <th>Bank</th>
                                    <th width="10%">Account Transferred</th>
                                    <th>Reference</th>
                                    <th width="8%">Status</th>
                                    <th width="10%">Amount<br /><span class="label label-success">RM</span></th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i = 0;
                                foreach($topup as $t){
                                    $i += 1;
                                    $date = date("d-m-Y", strtotime($t->topup_date));
                                    $time = date("H:i", strtotime($t->topup_date));
                                    $datetime = $date.'<br /><i class="fa fa-clock-o"></i> '.$time;
                                    $topup1 = substr($t->code,0,9);
                                    $topup2 = substr($t->code,9,15);
                                    $topup3 = substr($t->code,24,12);
                                    $topup = $topup1.'<br />'.$topup2.'<br />'.$topup3;
                                    $bank = $t->bank->name.'<br />'.$t->location->name;
                                    $account = $t->account->name;
                                    $reference = $t->reference_number;
                                    if($t->status->name == 'NEW'){
                                        $status = '<span class="label label-info text-12">'.$t->status->name.'</span>';
                                    } else if($t->status->name == 'PENDING'){
                                        $status = '<span class="label label-warning text-12">'.$t->status->name.'</span>';
                                    } else if($t->status->name == 'APPROVED'){
                                        $status = '<span class="label label-primary text-12">'.$t->status->name.'</span>';
                                    } else if($t->status->name == 'REJECTED'){
                                        $status = '<span class="label label-danger text-12">'.$t->status->name.'</span>';
                                    }
                                    $amount = number_format($t->amount,2);
                            ?>
                                <tr>
                                    <td class="text-center">
                                        <span class="badge badge-primary"><?php echo $i; ?></span>
                                    </td>
                                    <td><?php echo $datetime; ?></td>
                                    <td><?php echo $topup; ?></td>
                                    <td><?php echo $bank; ?></td>
                                    <td><?php echo $account; ?></td>
                                    <td><?php echo $reference; ?></td>
                                    <td><?php echo $status; ?></td>
                                    <td class="text-right"><?php echo $amount; ?></td>
                                    <td>
                                        <a class="btn btn-outline btn-sm btn-primary topup-view" data-id="<?php echo $t->id; ?>" data-toggle="tooltip" data-placement="top" title="View Top-Up"><i class="fa fa-search"></i></a>
                                        <a class="btn btn-outline btn-sm btn-warning topup-edit" data-id="<?php echo $t->id; ?>" data-toggle="tooltip" data-placement="top" title="Edit Top-Up"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                            <tfoot>
                                <tr id="current">
                                    <th colspan="7" class="text-right"><span class="label label-success">Total Current Page</span> </th>
                                    <th id="cur_amount" class="text-right"></th>
                                    <th>&nbsp;</th>
                                </tr>
                                <tr id="total">
                                    <th colspan="7" class="text-right"><span class="label label-success">Total All Pages</span> </th>
                                    <th id="all_amount" class="text-right"></th>
                                    <th>&nbsp;</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="modal-new-topup">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceInRight">
            <!--
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h6 class="modal-title">New Top-Up Information</h6>
            </div>
            -->
            <form id="form-new-topup">
                <div class="modal-body">
                    <div class="message-form"></div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <span class="label label-primary2">New Top-Up Registration</span>
                        </div>
                        <div class="hr-line-solid"></div>
                    </div>    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Bank Name</strong></label>
                                <?php
                                    echo CHtml::dropDownList('t_bank', null, $list1, 
                                    array(
                                        'empty' => 'Select Bank', 
                                        'class' => 'form-control chosen-bank topup-bank',
                                        'data-required' => 'true',
                                    ));
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Transaction Date Time</strong></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" name="t_topup_date" class="form-control text-center datetimepicker topup-date" placeholder="dd-mm-yyyy hh:mm" data-required="true" />
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Location</strong></label>
                                <?php
//                                    echo CHtml::dropDownList('t_location', null, $list3, 
//                                    array(
//                                        'empty' => 'Select Location', 
//                                        'class' => 'form-control chosen-location topup-location',
//                                        'data-required' => 'true',
//                                    ));
                                ?>
                                <input type="text" name="t_location" class="form-control" placeholder="Location" data-required="true" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Reference Number</strong></label>
                                <input type="text" name="t_reference" class="form-control topup-reference" placeholder="Reference Number" data-required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Branch Account</strong></label>
                                <?php
                                    echo CHtml::dropDownList('t_account', null, $list2, 
                                    array(
                                        'empty' => 'Select Account', 
                                        'class' => 'form-control chosen-account topup-account',
                                        'data-required' => 'true',
                                    ));
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Amount</strong></label>
                                <input type="text" name="t_amount" class="form-control price text-right topup-amount" placeholder="0.00" data-required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>Remarks</strong></label>
                                <textarea name="t_remark" class="form-control" placeholder="Remarks"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>Transaction Image</strong></label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                    <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
                                        <span class="fileinput-new">Select file</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="t_topup_image"/>
                                    </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div> 
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <span class="label label-primary2">Branch Accounts</span>
                        </div>
                        <div class="hr-line-solid"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-right" width="6%">#</th>
                                        <th>Account</th>
                                        <th>Branch Account</th>
                                        <th>Bank</th>
                                        <th>Location</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-right"><span class="badge badge-primary">1</span></td>
                                        <td>ACCOUNT #001</td>
                                        <td>5555 5555 0001</td>
                                        <td>MAYBANK</td>
                                        <td>KUALA LUMPUR</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><span class="badge badge-primary">2</span></td>
                                        <td>ACCOUNT #002</td>
                                        <td>5555 5555 0002</td>
                                        <td>MAYBANK</td>
                                        <td>KUALA LUMPUR</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><span class="badge badge-primary">3</span></td>
                                        <td>ACCOUNT #003</td>
                                        <td>5555 5555 0003</td>
                                        <td>MAYBANK</td>
                                        <td>KUALA LUMPUR</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="submit-topup" class="btn btn-primary">Submit</a>
                    <a class="btn btn-default" data-dismiss="modal">Close</a>
                </div>
            </form>    
        </div>
    </div>
</div>

<div class="modal inmodal" id="modal-view-topup">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceInRight">
            <!--
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h6 class="modal-title">View Top-Up Information</h6>
            </div>
            -->
            <form id="form-view-topup">
                <div class="modal-body">
                    <div class="message-form"></div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <span class="label label-primary2">View Top-Up Registration</span>
                        </div>
                        <div class="hr-line-solid"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label><strong>Top-Up Code</strong></label>
                                <input type="text" name="v_topup_code" class="form-control topup-code" placeholder="Top-Up Code" readonly="true" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><strong>Status</strong></label>
                                <input type="text" name="v_topup_status" class="form-control topup-status-name" placeholder="Status" readonly="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Bank Name</strong></label>
                                <input type="text" name="v_topup_bank" class="form-control topup-bank-name" placeholder="Bank Name" readonly="true" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Transaction Date Time</strong></label>
                                <input type="text" name="v_topup_date" class="form-control topup-date" placeholder="Date Time" readonly="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Location</strong></label>
                                <input type="text" name="v_topup_location" class="form-control topup-location-name" placeholder="Location" readonly="true" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Reference Number</strong></label>
                                <input type="text" name="v_topup_reference" class="form-control topup-reference" placeholder="Reference" readonly="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Branch Account</strong></label>
                                <input type="text" name="v_topup_account" class="form-control topup-account-name" placeholder="Account" readonly="true" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Amount</strong></label>
                                <input type="text" name="v_topup_amount" class="form-control price text-right topup-amount" placeholder="0.00" readonly="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>Remarks</strong></label>
                                <textarea name="v_topup_remark" class="form-control" placeholder="Remarks" readonly="true"></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <span class="label label-primary2">Transaction Image</span>
                        </div>
                        <div class="hr-line-solid"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="topup-image-sebumi">
                                <img src="vendor/sebumi/images/nobankslip.jpg" class="img-sebumi topup-image" width="500">
                            </div>
                        </div>
                    </div>    
                    <div class="row">&nbsp;</div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <span class="label label-primary2">Branch Accounts</span>
                        </div>
                        <div class="hr-line-solid"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-right" width="6%">#</th>
                                        <th>Account</th>
                                        <th>Branch Account</th>
                                        <th>Bank</th>
                                        <th>Location</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-right"><span class="badge badge-primary">1</span></td>
                                        <td>ACCOUNT #001</td>
                                        <td>5555 5555 0001</td>
                                        <td>MAYBANK</td>
                                        <td>KUALA LUMPUR</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><span class="badge badge-primary">2</span></td>
                                        <td>ACCOUNT #002</td>
                                        <td>5555 5555 0002</td>
                                        <td>MAYBANK</td>
                                        <td>KUALA LUMPUR</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><span class="badge badge-primary">3</span></td>
                                        <td>ACCOUNT #003</td>
                                        <td>5555 5555 0003</td>
                                        <td>MAYBANK</td>
                                        <td>KUALA LUMPUR</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-default" data-dismiss="modal">Close</a>
                </div>
            </form>    
        </div>
    </div>
</div>

<div class="modal inmodal" id="modal-edit-topup">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceInRight">
            <!--
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h6 class="modal-title">Edit Top-Up Information</h6>
            </div>
            -->
            <form id="form-edit-topup">
                <div class="modal-body">
                    <div class="message-form"></div>
                    <input type="hidden" name="u_topup_id" class="topup-id">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="label label-primary2">Edit Top-Up Registration</span>
                        </div>
                        <div class="hr-line-solid"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label><strong>Top-Up Code</strong></label>
                                <input type="text" name="u_topup_code" class="form-control topup-code" placeholder="Top-Up Code" readonly="true" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><strong>Status</strong></label>
                                <input type="text" name="u_topup_status" class="form-control topup-status-name" placeholder="Status" readonly="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Bank Name</strong></label>
                                <?php
                                    echo CHtml::dropDownList('u_bank', null, $list1, 
                                    array(
                                        'empty' => 'Select Bank', 
                                        'class' => 'form-control chosen-bank topup-bank',
                                        'data-required' => 'true',
                                    ));
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Transaction Date Time</strong></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" name="u_topup_date" class="form-control text-center datetimepicker topup-date" placeholder="dd-mm-yyyy hh:mm" data-required="true" />
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Location</strong></label>
                                <?php
//                                    echo CHtml::dropDownList('u_location', null, $list3, 
//                                    array(
//                                        'empty' => 'Select Location', 
//                                        'class' => 'form-control chosen-location topup-location',
//                                        'data-required' => 'true',
//                                    ));
                                ?>
                                <input type="text" name="u_location" class="form-control topup-location" placeholder="Location" data-required="true" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Reference Number</strong></label>
                                <input type="text" name="u_reference" class="form-control topup-reference" placeholder="Reference Number" data-required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Branch Account</strong></label>
                                <?php
                                    echo CHtml::dropDownList('u_account', null, $list2, 
                                    array(
                                        'empty' => 'Select Account', 
                                        'class' => 'form-control chosen-account topup-account',
                                        'data-required' => 'true',
                                    ));
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Amount</strong></label>
                                <input type="text" name="u_amount" class="form-control price text-right topup-amount" placeholder="0.00" data-required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>Remarks</strong></label>
                                <textarea name="u_remark" class="form-control" placeholder="Remarks"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>Transaction Image</strong></label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                    <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
                                        <span class="fileinput-new">Select file</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="u_topup_image"/>
                                    </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div> 
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <span class="label label-primary2">Transaction Image</span>
                        </div>
                        <div class="hr-line-solid"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="topup-image-sebumi">
                                <img src="vendor/sebumi/images/nobankslip.jpg" class="img-sebumi topup-image" width="500">
                            </div>
                        </div>
                    </div>    
                    <div class="row">&nbsp;</div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <span class="label label-primary2">Branch Accounts</span>
                        </div>
                        <div class="hr-line-solid"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-right" width="6%">#</th>
                                        <th>Account</th>
                                        <th>Branch Account</th>
                                        <th>Bank</th>
                                        <th>Location</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-right"><span class="badge badge-primary">1</span></td>
                                        <td>ACCOUNT #001</td>
                                        <td>5555 5555 0001</td>
                                        <td>MAYBANK</td>
                                        <td>KUALA LUMPUR</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><span class="badge badge-primary">2</span></td>
                                        <td>ACCOUNT #002</td>
                                        <td>5555 5555 0002</td>
                                        <td>MAYBANK</td>
                                        <td>KUALA LUMPUR</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><span class="badge badge-primary">3</span></td>
                                        <td>ACCOUNT #003</td>
                                        <td>5555 5555 0003</td>
                                        <td>MAYBANK</td>
                                        <td>KUALA LUMPUR</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="update-topup" class="btn btn-primary">Update</a>
                    <a class="btn btn-default" data-dismiss="modal">Close</a>
                </div>
            </form>    
        </div>
    </div>
</div>
<?php
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/dataTables/datatables.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.extend.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/chosen/chosen.jquery.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/datetimepicker/js/bootstrap-datetimepicker.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/jasny/jasny-bootstrap.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/autoNumeric/autoNumeric.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/number/accounting.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/sebumi/js/agent/account/viewtopup.js", CClientScript::POS_END);