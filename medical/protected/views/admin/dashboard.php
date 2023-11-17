<div class="wrapper wrapper-content">
    <h4>Applicant Information</h4>
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-warning">
                    <h5>Total Applicant</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $applicant['all']; ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-user"></i> Applicant</div>
                    <small>Applicant Registered</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-info">
                    <h5>Total Male Applicant</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $applicant['male']; ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-male"></i> Male</div>
                    <small>Male Applicant Registered</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-success">
                    <h5>Total Female Applicant</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $applicant['female']; ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-female"></i> Female</div>
                    <small>Female Applicant Registered</small>
                </div>
            </div>
        </div>
    </div>
    
    <h4>Dependant Information</h4>
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-warning">
                    <h5>Total Dependant</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $dependant['all']; ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-user"></i> Dependant</div>
                    <small>Dependant Registered</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-info">
                    <h5>Total Male Dependant</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $dependant['male']; ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-male"></i> Male</div>
                    <small>Male Dependant Registered</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title bg-success">
                    <h5>Total Female Dependant</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $dependant['female']; ?></h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-female"></i> Female</div>
                    <small>Female Dependant Registered</small>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    /* jQuery UI */
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/jquery-ui/jquery-ui.min.js", CClientScript::POS_END);
    
    Yii::app()->clientScript->registerScriptFile("vendor/sebumi/js/admin/dashboard.js", CClientScript::POS_END);