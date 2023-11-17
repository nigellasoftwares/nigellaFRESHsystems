<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Registration Management</h2>
        <ol class="breadcrumb">
            <li>
                Account
            </li>
            <li>
                View Registration
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
                    <h1 class="no-margins"><?php //echo number_format($bdashboard['gst'],2); ?></h1>
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
                    <h5>Registration Transaction List</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover table-list-viewregister">
                            <thead>
                                <tr>
                                    <th width="6%">#</th>
                                    <th width="10%">Registered Date</th>
                                    <th>Transaction</th>
                                    <th>Reference</th>
                                    <th width="8%">Amount<br /><span class="label label-success">RM</span></th>
                                    <th width="8%">Total<br /><span class="label label-success">RM</span></th>
                                    <th width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i = 0;
                                foreach($rbalance as $b){
                                    $i += 1;
                                    $date = date("d-m-Y", strtotime($b->created_at));
                                    $time = date("H:i:s", strtotime($b->created_at));
                                    $datetime = $date.'<br /><i class="fa fa-clock-o"></i> '.$time;
                                    $transaction = $b->reference_id;
                                    $reference = $b->description; //W18AAA0001;
                                    $amount = $b->amount;
                                    //$total = $b->amount + $b->gst;
                                    $total = $b->amount;
                            ?>
                                <tr>
                                    <td class="text-center">
                                        <span class="badge badge-primary"><?php echo $i; ?></span>
                                    </td>
                                    <td><?php echo $datetime; ?></td>
                                    <td><?php echo $transaction; ?></td>
                                    <td><?php echo $reference; ?></td>
                                    <td class="text-right"><?php echo number_format($amount,2); ?></td>
                                    <td class="text-right"><?php echo number_format($total,2); ?></td>
                                    <td>
                                        <a class="btn btn-outline btn-sm btn-primary register-view" data-id="<?php echo $b->id; ?>" data-toggle="tooltip" data-placement="top" title="View Registration"><i class="fa fa-search"></i></a>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                            <tfoot>
                                <tr id="current">
                                    <th colspan="4" class="text-right"><span class="label label-success">Total Current Page</span> </th>
                                    <th id="cur_amount" class="text-right"></th>
                                    <th id="cur_total" class="text-right"></th>
                                    <th>&nbsp;</th>
                                </tr>
                                <tr id="total">
                                    <th colspan="4" class="text-right"><span class="label label-success">Total All Pages</span> </th>
                                    <th id="all_amount" class="text-right"></th>
                                    <th id="all_total" class="text-right"></th>
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

<div class="modal inmodal" id="modal-view-register">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">View Registration Information</h4>
            </div>
            <form id="form-view-register">
                <div class="modal-body">
                    <div class="message-form"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <span class="label label-primary2">Transaction</span>
                        </div>
                        <div class="hr-line-solid"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label><strong>Transaction Code</strong></label>
                                <input type="text" name="v_transaction_code" class="form-control transaction-code" placeholder="Transaction Code" readonly="true" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><strong>Receipt Code</strong></label>
                                <input type="text" name="v_receipt_code" class="form-control receipt-code" placeholder="Receipt Code" readonly="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <span class="label label-primary2">Worker</span>
                        </div>
                        <div class="hr-line-solid"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>Worker Name</strong></label>
                                <input type="text" name="v_worker_name" class="form-control worker-name" placeholder="Worker Name" readonly="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Passport</strong></label>
                                <input type="text" name="v_passport" class="form-control worker-passport" placeholder="Passport" readonly="true" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Country Origin</strong></label>
                                <input type="text" name="v_national" class="form-control worker-national" placeholder="Country Origin" readonly="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Date Of Birth</strong></label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" name="v_birth_date" class="form-control worker-dob" placeholder="Date Of Birth" readonly="true" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Gender</strong></label>
                                <input type="text" name="v_gender" class="form-control worker-gender" placeholder="Gender" readonly="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <span class="label label-primary2">Employer</span>
                        </div>
                        <div class="hr-line-solid"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>Employer Name</strong></label>
                                <input type="text" name="v_employer_name" class="form-control employer-name" placeholder="Employer Name" readonly="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>District</strong></label>
                                <input type="text" name="v_employer_district" class="form-control employer-district" placeholder="Employer District" readonly="true" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Contact Number</strong></label>
                                <input type="text" name="v_employer_number" class="form-control employer-contact" placeholder="Contact Number" readonly="true" />
                            </div>
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
<?php
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/dataTables/datatables.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/autoNumeric/autoNumeric.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/number/accounting.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/sebumi/js/agent/account/viewregister.js", CClientScript::POS_END);