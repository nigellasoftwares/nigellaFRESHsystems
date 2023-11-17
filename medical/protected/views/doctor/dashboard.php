<div class="wrapper wrapper-content">
	<!--
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
                    <small>Pending Top-Ups</small>
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
	-->
    
    <h4>Worker Information</h4>
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-warning">
                    <h5>Total Applicant</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $applicant['all']; ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-user"></i> Worker</div>
                    <small>Worker Registered</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-info">
                    <h5>Total Male Worker</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $applicant['male']; ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-male"></i> Male</div>
                    <small>Male Worker Registered</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-success">
                    <h5>Total Female Worker</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $applicant['female']; ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-female"></i> Female</div>
                    <small>Female Worker Registered</small>
                </div>
            </div>
        </div>
		<!--
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-primary">
                    <h5>Payment Total</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo number_format($applicant['allrm'],0); ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-list-alt"></i> Rp</div>
                    <small>Payment Registered</small>
                </div>
            </div>
        </div>
		-->
    </div>
    
    <h4>Worker Certified Information</h4>
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-success">
                    <h5>Total Certified</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $applicant['certified']; ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-user"></i> Worker</div>
                    <small>Worker Registered</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-warning">
                    <h5>Total Not Certified Yet</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $applicant['notcertified']; ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-user"></i> Worker</div>
                    <small>Worker Registered</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-primary">
                    <h5>Total Fit Worker</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $applicant['fit']; ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-male"></i> Worker</div>
                    <small>Fit Worker</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-danger">
                    <h5>Total Unfit Worker</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo number_format($applicant['unfit'],0); ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-male"></i> Worker</div>
                    <small>Unfit Worker</small>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    /* jQuery UI */
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/jquery-ui/jquery-ui.min.js", CClientScript::POS_END);
    
    Yii::app()->clientScript->registerScriptFile("vendor/sebumi/js/doctor/dashboard.js", CClientScript::POS_END);