<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Top-Up Management</h2>
        <ol class="breadcrumb">
            <li>
                Top-Up
            </li>
            <li>
                Manage Top-Up
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
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
                <div class="ibox-title bg-info">
                    <h5>Pending Top-Ups</h5>
                    <span class="pull-right">
                        <h5><?php echo number_format($bdashboard['pending_number'],0); ?></h5>
                    </span>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo number_format($bdashboard['pending'],2); ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-bank"></i> RM</div>
                    <small>Pending Amount</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-success">
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
    
    <div class="row">
            <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Account Transaction List</h5>
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
                        <table class="table table-striped table-bordered table-hover table-list-managetopup">
                            <thead>
                                <tr>
                                    <th width="6%">#</th>
                                    <th>Top-Up ID</th>
                                    <th width="10%">Date Time</th>
                                    <th>Bank</th>
                                    <th>Reference</th>
                                    <th width="8%">Status</th>
                                    <th width="8%">Amount<br /><span class="label label-success">RM</span></th>
                                    <th width="8%">Pending<br /><span class="label label-success">RM</span></th>
                                    <th width="8%">Current<br /><span class="label label-success">RM</span></th>
                                    <th width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i = 0;
                                foreach($btopup as $b){
                                    $i += 1;
                                    $topup1 = substr($b['topup_code'],0,9);
                                    $topup2 = substr($b['topup_code'],9,15);
                                    $topup3 = substr($b['topup_code'],24,12);
                                    $topup = $topup1.'<br />'.$topup2.'<br />'.$topup3;
                                    $date = date("d-m-Y", strtotime($b['topup_date']));
                                    $time = date("H:i", strtotime($b['topup_date']));
                                    $datetime = $date.'<br /><i class="fa fa-clock-o"></i> '.$time;
                                    $bank = $b['topup_account'].'<br />'.$b['topup_bank'].'<br />'.$b['topup_location'];
                                    $reference = $b['topup_reference'];
                                    if($b['topup_status'] == 'SUCCESS'){
                                        $status = '<span class="label label-primary text-12">'.$b['topup_status'].'</span>';
                                    } else if($b['topup_status'] == 'PENDING'){
                                        $status = '<span class="label label-danger text-12">'.$b['topup_status'].'</span>';
                                    }
                                    $amount = number_format($b['topup_amount'],2);
                                    $pending = number_format($b['topup_pending'],2);
                                    $current = number_format($b['topup_current'],2);
                            ?>
                                <tr>
                                    <td class="text-center">
                                        <span class="badge badge-primary"><?php echo $i; ?></span>
                                    </td>
                                    <td><?php echo $topup; ?></td>
                                    <td><?php echo $datetime; ?></td>
                                    <td><?php echo $bank; ?></td>
                                    <td><?php echo $reference; ?></td>
                                    <td><?php echo $status; ?></td>
                                    <td class="text-right"><?php echo $amount; ?></td>
                                    <td class="text-right"><?php echo $pending; ?></td>
                                    <td class="text-right"><?php echo $current; ?></td>
                                    <td>
                                        <a class="btn btn-outline btn-sm btn-primary topup-view" data-id="<?php echo $b['topup_id']; ?>" data-toggle="tooltip" data-placement="top" title="View Topup"><i class="fa fa-search"></i></a>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                            <tfoot>
                                <tr id="current">
                                    <th colspan="6" class="text-right"><span class="label label-success">Total Current Page</span> </th>
                                    <th id="cur_amount" class="text-right"></th>
                                    <th id="cur_pending" class="text-right"></th>
                                    <th id="cur_current" class="text-right"></th>
                                    <th>&nbsp;</th>
                                </tr>
                                <tr id="total">
                                    <th colspan="6" class="text-right"><span class="label label-success">Total All Pages</span> </th>
                                    <th id="all_amount" class="text-right"></th>
                                    <th id="all_pending" class="text-right"></th>
                                    <th id="all_current" class="text-right"></th>
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><strong>Agent Code</strong></label>
                                <input type="text" name="v_topup_agent_code" class="form-control topup-agent-code" placeholder="Agent Code" readonly="true" />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label><strong>Agent Name</strong></label>
                                <input type="text" name="v_topup_agent_name" class="form-control topup-agent-name" placeholder="Agent Name" readonly="true" />
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
                            <div class="topup-image-obyu">
                                <img src="vendor/obyu/images/nobankslip.jpg" class="img-obyu topup-image" width="500">
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
<?php
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/dataTables/datatables.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/autoNumeric/autoNumeric.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/number/accounting.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/sebumi/js/admin/topup/managetopup.js", CClientScript::POS_END);