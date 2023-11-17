<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Dashboard</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">High Commissioner</li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">TOTAL NEW TODAY</h5>
                    <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                        <div id="sparklinedash"></div>
                        <div class="ml-auto">
                            <h2 class="text-success"> <span class="counter"><?php echo $today_new; ?></span></h2>
                        </div>
                    </div>
                </div>
                <div id="sparkline8" class="sparkchart"></div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">TOTAL APPLICATION</h5>
                    <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                        <div id="sparklinedash2"></div>
                        <div class="ml-auto">
                            <h2 class="text-purple"> <span class="counter"><?php echo $total_all; ?></span></h2>
                        </div>
                    </div>
                </div>
                <div id="sparkline8" class="sparkchart"></div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">TOTAL APPROVED</h5>
                    <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                        <div id="sparklinedash3"></div>
                        <div class="ml-auto">
                            <h2 class="text-info"> <span class="counter"><?php echo $total_approved; ?></span></h2>
                        </div>
                    </div>
                </div>
                <div id="sparkline8" class="sparkchart"></div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">TOTAL REJECTED</h5>
                    <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                        <div id="sparklinedash4"></div>
                        <div class="ml-auto">
                            <h2 class="text-danger"> <span class="counter"><?php echo $total_rejected; ?></span></h2>
                        </div>
                    </div>
                </div>
                <div id="sparkline8" class="sparkchart"></div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <div class="row">
        <!-- column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">VISA APPLICATION REPORT</h4>
                    <div id="bar-chart" style="width:100%; height:400px;"></div>
                </div>
            </div>
        </div>
        <!-- column -->
    </div>
</div>

<?php
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/echarts/echarts-all.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/visafasttrack/js/highcomm/dashboard.js", CClientScript::POS_END);