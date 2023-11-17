<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Top-Up Management</h2>
        <ol class="breadcrumb">
            <li>
                Account
            </li>
            <li>
                Create Topup
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
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-primary">
                    <h5>Payment Total</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo number_format($bdashboard['total'],2); ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-list-alt"></i> RM</div>
                    <small>Payment Registered</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-warning">
                    <h5>Payment Amount</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo number_format($bdashboard['amount'],2); ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-list"></i> RM</div>
                    <small>Total Amount</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-success">
                    <h5>Payment GST</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo number_format($bdashboard['gst'],2); ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-bank"></i> RM</div>
                    <small>Total GST</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-info">
                    <h5>Total Worker</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo number_format($bdashboard['worker'],0); ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-user"></i> Workers</div>
                    <small>Workers Registered</small>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Branch Accounts</h5>
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
                                    <td>KUCHING</td>
                                </tr>
                                <tr>
                                    <td class="text-right"><span class="badge badge-primary">2</span></td>
                                    <td>ACCOUNT #002</td>
                                    <td>5555 5555 0002</td>
                                    <td>MAYBANK</td>
                                    <td>KUCHING</td>
                                </tr>
                                <tr>
                                    <td class="text-right"><span class="badge badge-primary">3</span></td>
                                    <td>ACCOUNT #003</td>
                                    <td>5555 5555 0003</td>
                                    <td>MAYBANK</td>
                                    <td>KUCHING</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Top-Up Registration</h5>
                </div>
                <form id="form-new-topup" enctype="multipart/form-data">
                    <div class="ibox-content">
                        <div class="message-form"></div>
                        <div class="row">
                            <div class="col-lg-4">
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
                            <div class="col-lg-4">
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
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label><strong>Transaction Date</strong></label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" name="t_topup_date" class="form-control topup-date" placeholder="dd-mm-yyyy" data-required="true" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label><strong>Transaction Time</strong></label>
                                    <div class="input-group clockpicker">
                                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                        <input type="text" name="t_topup_time" class="form-control topup-time" placeholder="hh:mm" data-required="true" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label><strong>Location</strong></label>
                                    <?php
                                        echo CHtml::dropDownList('t_location', null, $list3, 
                                        array(
                                            'empty' => 'Select Location', 
                                            'class' => 'form-control chosen-location topup-location',
                                            'data-required' => 'true',
                                        ));
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label><strong>Reference Number</strong></label>
                                    <input type="text" name="t_reference" class="form-control topup-reference" placeholder="Reference Number" data-required="true" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label><strong>Amount</strong></label>
                                    <input type="text" name="t_amount" class="form-control price text-right topup-amount" placeholder="0.00" data-required="true" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
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
                    </div>
                    <div class="ibox-footer">
                        <div class="row">
                            <span class="pull-right m-r-md">
                                <a id="submit-topup" class="btn btn-w-m btn-primary">Submit</a>
                                <!-- <input type="submit" value="Submit" /> -->
                            </span>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>
<?php
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/dataTables/datatables.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.extend.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/chosen/chosen.jquery.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/datapicker/bootstrap-datepicker.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/clockpicker/clockpicker.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/jasny/jasny-bootstrap.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/autoNumeric/autoNumeric.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/number/accounting.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/sebumi/js/agent/account/createtopup.js", CClientScript::POS_END);