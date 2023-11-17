<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Dashboard</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-info">
                                <h3 class="text-white box m-b-0"><i class="icon-people"></i></h3></div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-info"><?php echo number_format($stat['today']['register']); ?></h3>
                                <h5 class="text-muted m-b-0">Registered Today</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-success"><h3 class="text-white box m-b-0"><i class="fa fa-medkit"></i></h3></div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-success"><?php echo number_format($stat['today']['medical']['completed']); ?></h3>
                                <h5 class="text-muted m-b-0">Med. Compl. Today</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-success">
                                <h3 class="text-white box m-b-0"><i class="fa fa-plane"></i></h3></div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-success"><?php echo number_format($stat['today']['visa']['completed']); ?></h3>
                                <h5 class="text-muted m-b-0">Visa Compl. Today</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">&nbsp;</div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-danger">
                                <h3 class="text-white box m-b-0"><i class="fa fa-medkit"></i></h3></div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-danger"><?php echo number_format($stat['today']['medical']['pending']); ?></h3>
                                <h5 class="text-muted m-b-0">Med. Pend. Today</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-danger">
                                <h3 class="text-white box m-b-0"><i class="fa fa-plane"></i></h3></div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-danger"><?php echo number_format($stat['today']['visa']['pending']); ?></h3>
                                <h5 class="text-muted m-b-0">Visa Pend. Today</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Daily Registration Report for month <?php echo date('F Y'); ?></h4>
                            <div id="bar-chart-daily" style="width:100%; height:400px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Monthly Registration Report for year <?php echo date('Y'); ?></h4>
                            <div id="bar-chart-monthly" style="width:100%; height:400px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="box bg-info text-center">
                            <h1 class="font-light text-white"><?php echo number_format($stat['all']['register']); ?></h1>
                            <h6 class="text-white"><i class="icon-people"></i> Total Registration</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="box bg-success text-center">
                            <h1 class="font-light text-white"><?php echo number_format($stat['all']['medical']['completed']); ?></h1>
                            <h6 class="text-white"><i class="fa fa-medkit"></i> Total Medical Completed</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="box bg-success text-center">
                            <h1 class="font-light text-white"><?php echo number_format($stat['all']['visa']['completed']); ?></h1>
                            <h6 class="text-white"><i class="fa fa-plane"></i> Total Visa Completed</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">&nbsp;</div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="box bg-danger text-center">
                            <h1 class="font-light text-white"><?php echo number_format($stat['all']['medical']['pending']); ?></h1>
                            <h6 class="text-white"><i class="fa fa-medkit"></i> Total Medical Pending</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="box bg-danger text-center">
                            <h1 class="font-light text-white"><?php echo number_format($stat['all']['visa']['pending']); ?></h1>
                            <h6 class="text-white"><i class="fa fa-plane"></i> Total Visa Pending</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="card-body bg-light">
                    <h5 class="font-light m-t-0">Statistic for Today <i class="fa fa-calendar"></i> <?php echo date('d M Y'); ?></h5>
                </div>
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="txt-oflo"><i class="icon-people"></i> Registered</td>
                                    <td><span class="badge badge-info badge-pill">Foreign<br />Worker</span></td>
                                    <td class="text-right"><?php echo number_format($stat['today']['register']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="txt-oflo"><i class="fa fa-male"></i> Male</td>
                                    <td><span class="badge badge-info badge-pill">Foreign<br />Worker</span></td>
                                    <td class="text-right"><?php echo number_format($stat['today']['male']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td class="txt-oflo"><i class="fa fa-female"></i> Female</td>
                                    <td><span class="badge badge-info badge-pill">Foreign<br />Worker</span></td>
                                    <td class="text-right"><?php echo number_format($stat['today']['female']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td class="txt-oflo"><i class="fa fa-medkit"></i> Completed</td>
                                    <td><span class="badge badge-success badge-pill">Medical</span></td>
                                    <td class="text-right"><?php echo number_format($stat['today']['medical']['completed']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">5</td>
                                    <td class="txt-oflo"><i class="fa fa-medkit"></i> Pending</td>
                                    <td><span class="badge badge-danger badge-pill">Medical</span></td>
                                    <td class="text-right"><?php echo number_format($stat['today']['medical']['pending']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">6</td>
                                    <td class="txt-oflo"><i class="fa fa-plane"></i> Completed</td>
                                    <td><span class="badge badge-success badge-pill">Visa</span></td>
                                    <td class="text-right"><?php echo number_format($stat['today']['visa']['completed']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">7</td>
                                    <td class="txt-oflo"><i class="fa fa-plane"></i> Pending</td>
                                    <td><span class="badge badge-danger badge-pill">Visa</span></td>
                                    <td class="text-right"><?php echo number_format($stat['today']['visa']['pending']); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card-body bg-light">
                    <h5 class="font-light m-t-0">Overall Statistic</h5>
                </div>
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="txt-oflo"><i class="icon-people"></i> Registered</td>
                                    <td><span class="badge badge-info badge-pill">Foreign<br />Worker</span></td>
                                    <td class="text-right"><?php echo number_format($stat['all']['register']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="txt-oflo"><i class="fa fa-male"></i> Male</td>
                                    <td><span class="badge badge-info badge-pill">Foreign<br />Worker</span></td>
                                    <td class="text-right"><?php echo number_format($stat['all']['male']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td class="txt-oflo"><i class="fa fa-female"></i> Female</td>
                                    <td><span class="badge badge-info badge-pill">Foreign<br />Worker</span></td>
                                    <td class="text-right"><?php echo number_format($stat['all']['female']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td class="txt-oflo"><i class="fa fa-medkit"></i> Completed</td>
                                    <td><span class="badge badge-success badge-pill">Medical</span></td>
                                    <td class="text-right"><?php echo number_format($stat['all']['medical']['completed']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">5</td>
                                    <td class="txt-oflo"><i class="fa fa-medkit"></i> Pending</td>
                                    <td><span class="badge badge-danger badge-pill">Medical</span></td>
                                    <td class="text-right"><?php echo number_format($stat['all']['medical']['pending']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">6</td>
                                    <td class="txt-oflo"><i class="fa fa-plane"></i> Completed</td>
                                    <td><span class="badge badge-success badge-pill">Visa</span></td>
                                    <td class="text-right"><?php echo number_format($stat['all']['visa']['completed']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">7</td>
                                    <td class="txt-oflo"><i class="fa fa-plane"></i> Pending</td>
                                    <td><span class="badge badge-danger badge-pill">Visa</span></td>
                                    <td class="text-right"><?php echo number_format($stat['all']['visa']['pending']); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/echarts/echarts-all.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/webmin/dashboard.js", CClientScript::POS_END);