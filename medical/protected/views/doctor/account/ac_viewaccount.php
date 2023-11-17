<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Account Management</h2>
        <ol class="breadcrumb">
            <li>
                Account
            </li>
            <li>
                View Account
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
                    <h5>Payment Male Worker</h5>
                    <div class="pull-right">
                        <span class="text-white font-bold">10</span>
                    </div>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo number_format($bdashboard['totalmale'],2); ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-list"></i> RM</div>
                    <small>Total Amount</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-success">
                    <h5>Payment Female Worker</h5>
                    <div class="pull-right">
                        <span class="text-white font-bold">10</span>
                    </div>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo number_format($bdashboard['totalfemale'],2); ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-list"></i> RM</div>
                    <small>Total Amount</small>
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
                        <form id="form-range-date" class="form-inline" method="post" action="index.php?r=Agent/AccountView" data-validate="true">
                            <div class="form-group">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" name="start_date" class="form-control start-date" placeholder="Start Date" data-required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" name="end_date" class="form-control end-date" placeholder="End Date" data-required="true" />
                                </div>
                            </div>
                            <input type="submit" id="submit-date" class="btn btn-sm btn-primary" value="Submit" />
                            <a href="index.php?r=Agent/AccountView" class="btn btn-sm btn-primary">Reset</a>
                        </form>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover table-list-viewaccount">
                            <thead>
                                <tr>
                                    <th width="6%">#</th>
                                    <th width="10%">Date Time</th>
                                    <th>Transaction</th>
                                    <th>Description</th>
                                    <th width="8%">Status</th>
                                    <th width="7%">Amount<br />Out<br /><span class="label label-success">RM</span></th>
                                    <th width="7%">Amount<br />In<br /><span class="label label-success">RM</span></th>
                                    <th width="7%">Pending<br />Out<br /><span class="label label-success">RM</span></th>
                                    <th width="7%">Pending<br />In<br /><span class="label label-success">RM</span></th>
                                    <th width="7%">Current<br />Out<br /><span class="label label-success">RM</span></th>
                                    <th width="7%">Current<br />In<br /><span class="label label-success">RM</span></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i = 0;
                                foreach($balance as $b){
                                    $i += 1;
                                    $datetime = date("d-m-Y", strtotime($b->updated_date));
                                    //$time = date("H:i", strtotime($b->updated_date));
                                    //$datetime = $date.'<br /><i class="fa fa-clock-o"></i> '.$time;
                                    
                                    if($b->status->name == 'SUCCESS'){
                                        $status = '<span class="label label-primary text-12">'.$b->status->name.'</span>';
                                    } else if($b->status->name == 'PENDING'){
                                        $status = '<span class="label label-danger text-12">'.$b->status->name.'</span>';
                                    }
                                    
                                    if($b->type == 'TRANSACTION'){
                                        $trans1 = substr($b->reference_id,0,9);
                                        $trans2 = substr($b->reference_id,9,15);
                                        $trans3 = substr($b->reference_id,24,12);
                                        $transaction = $trans1.'<br />'.$trans2.'<br />'.$trans3;
                                        $description = 'TRANSACTION<br />TOPUP';
                                        
                                        if($b->status->name == 'SUCCESS'){
                                            $amount_in = $b->amount;
                                            $pending_in = NULL;
                                        } else if($b->status->name == 'PENDING'){ 
                                            $amount_in = NULL;
                                            $pending_in = $b->amount;
                                        }
                                        $amount_out = NULL;
                                        $pending_out = NULL;
                                        $current_out = NULL;
                                        $current_in = $b->amount;
                                    } else if($b->type == 'REGISTRATION'){
                                        $transaction = $b->reference_id;
                                        $description = 'REGISTRATION<br />'.$b->description;
                                        
                                        $amount_out = $b->amount;
                                        $amount_in = NULL;
                                        $pending_out = NULL;
                                        $pending_in = NULL;
                                        $current_out = $b->amount;
                                        $current_in = NULL;
                                    }
                            ?>
                                <tr>
                                    <td class="text-center">
                                        <span class="badge badge-primary"><?php echo $i; ?></span>
                                    </td>
                                    <td><?php echo $datetime; ?></td>
                                    <td><?php echo $transaction; ?></td>
                                    <td><?php echo $description; ?></td>
                                    <td><?php echo $status; ?></td>
                                    <td class="text-right"><?php echo empty($amount_out) ? NULL : number_format($amount_out,2); ?></td>
                                    <td class="text-right"><?php echo empty($amount_in) ? NULL : number_format($amount_in,2); ?></td>
                                    <td class="text-right"><?php echo empty($pending_out) ? NULL : number_format($pending_out,2); ?></td>
                                    <td class="text-right"><?php echo empty($pending_in) ? NULL : number_format($pending_in,2); ?></td>
                                    <td class="text-right"><?php echo empty($current_out) ? NULL : number_format($current_out,2); ?></td>
                                    <td class="text-right"><?php echo empty($current_in) ? NULL : number_format($current_in,2); ?></td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                            <tfoot>
                                <tr id="current">
                                    <th colspan="5" class="text-right"><span class="label label-success">Total Current Page</span> </th>
                                    <th id="cur_amount_out" class="text-right"></th>
                                    <th id="cur_amount_in" class="text-right"></th>
                                    <th id="cur_pending_out" class="text-right"></th>
                                    <th id="cur_pending_in" class="text-right"></th>
                                    <th id="cur_current_out" class="text-right"></th>
                                    <th id="cur_current_in" class="text-right"></th>
                                </tr>
                                <tr id="current-balance">
                                    <th colspan="5" class="text-right"><span class="label label-success">Balance Current Page</span> </th>
                                    <th colspan="2" id="cur_balance_amount" class="text-right"></th>
                                    <th colspan="2" id="cur_balance_pending" class="text-right"></th>
                                    <th colspan="2" id="cur_balance_current" class="text-right"></th>
                                </tr>
                                <tr id="total">
                                    <th colspan="5" class="text-right"><span class="label label-success">Total All Pages</span> </th>
                                    <th id="all_amount_out" class="text-right"></th>
                                    <th id="all_amount_in" class="text-right"></th>
                                    <th id="all_pending_out" class="text-right"></th>
                                    <th id="all_pending_in" class="text-right"></th>
                                    <th id="all_current_out" class="text-right"></th>
                                    <th id="all_current_in" class="text-right"></th>
                                </tr>
                                <tr id="current-total">
                                    <th colspan="5" class="text-right"><span class="label label-success">Balance All Pages</span> </th>
                                    <th colspan="2" id="all_balance_amount" class="text-right"></th>
                                    <th colspan="2" id="all_balance_pending" class="text-right"></th>
                                    <th colspan="2" id="all_balance_current" class="text-right"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/dataTables/datatables.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.extend.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/datapicker/bootstrap-datepicker.js", CClientScript::POS_END);
    //Yii::app()->clientScript->registerScriptFile("vendor/assets/datetimepicker/js/bootstrap-datetimepicker.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/autoNumeric/autoNumeric.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/number/accounting.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/sebumi/js/agent/account/viewaccount.js", CClientScript::POS_END);