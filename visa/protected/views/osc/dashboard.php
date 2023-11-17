<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Dashboard</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">One Stop Centre</li>
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
                                <h3 class="text-white box m-b-0"><i class="fa fa-desktop"></i></h3></div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-info"><?php echo number_format($stat['today']['batch']); ?></h3>
                                <h5 class="text-muted m-b-0">Batch Today</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-danger">
                                <h3 class="text-white box m-b-0">DL</h3></div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-danger"><?php echo number_format($stat['today']['track']['d']['osc']['not']); ?></h3>
                                <h5 class="text-muted m-b-0">Not Verified Today</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-danger">
                                <h3 class="text-white box m-b-0">RT</h3></div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-danger"><?php echo number_format($stat['today']['track']['r']['osc']['not']); ?></h3>
                                <h5 class="text-muted m-b-0">Not Verified Today</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-success">
                                <h3 class="text-white box m-b-0"><i class="fa fa-edit"></i></h3></div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-success"><?php echo number_format($stat['today']['application']); ?></h3>
                                <h5 class="text-muted m-b-0">Application Today</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-success">
                                <h3 class="text-white box m-b-0">DL</h3></div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-success"><?php echo number_format($stat['today']['track']['d']['osc']['verify']); ?></h3>
                                <h5 class="text-muted m-b-0">Verified Today</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-success">
                                <h3 class="text-white box m-b-0">RT</h3></div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-success"><?php echo number_format($stat['today']['track']['r']['osc']['verify']); ?></h3>
                                <h5 class="text-muted m-b-0">Verified Today</h5>
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
                            <h1 class="font-light text-white"><?php echo number_format($stat['all']['batch']); ?></h1>
                            <h6 class="text-white">Total Batch</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="box bg-dark text-center">
                            <h1 class="font-light text-white"><?php echo number_format($stat['all']['vtr']); ?></h1>
                            <h6 class="text-white">Total VTR</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="box bg-warning text-center">
                            <h1 class="font-light text-white"><?php echo number_format($stat['all']['vln']); ?></h1>
                            <h6 class="text-white">Total VLN Fee (BDT)</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="box bg-info text-center">
                            <h1 class="font-light text-white"><?php echo number_format($stat['all']['application']); ?></h1>
                            <h6 class="text-white">Total Application</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="box bg-dark text-center">
                            <h1 class="font-light text-white"><?php echo number_format($stat['all']['vdr']); ?></h1>
                            <h6 class="text-white">Total VDR</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="box bg-warning text-center">
                            <h1 class="font-light text-white"><?php echo number_format($stat['all']['osc']); ?></h1>
                            <h6 class="text-white">Total OSC Fee (BDT)</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">&nbsp;</div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="box bg-success text-center">
                            <h1 class="font-light text-white"><?php echo number_format($stat['all']['fee']); ?></h1>
                            <h6 class="text-white">Total Fee (BDT)</h6>
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
                                    <th class="text-center" data-toggle="tooltip" data-placement="top" title="Number Of Passport">
                                        <i class="fa fa-id-badge"></i>
                                    </th>
                                    <th class="text-center" data-toggle="tooltip" data-placement="top" title="Not Verified">
                                        <i class="fa fa-times text-danger"></i>
                                    </th>
                                    <th class="text-center" data-toggle="tooltip" data-placement="top" title="Verified">
                                        <i class="fa fa-check text-success"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="txt-oflo">Delivered</td>
                                    <td><span class="badge badge-info badge-pill">ADM</span></td>
                                    <td><?php echo number_format($stat['today']['track']['d']['adm']['in']); ?></td>
                                    <td><?php echo number_format($stat['today']['track']['d']['adm']['not']); ?></td>
                                    <td><?php echo number_format($stat['today']['track']['d']['adm']['verify']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="txt-oflo">Delivered</td>
                                    <td><span class="badge badge-warning badge-pill">OSC</span></td>
                                    <td><?php echo number_format($stat['today']['track']['d']['osc']['in']); ?></td>
                                    <td><?php echo number_format($stat['today']['track']['d']['osc']['not']); ?></td>
                                    <td><?php echo number_format($stat['today']['track']['d']['osc']['verify']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td class="txt-oflo">Delivered</td>
                                    <td><span class="badge badge-success badge-pill">HC</span></td>
                                    <td><?php echo number_format($stat['today']['track']['d']['hc']['in']); ?></td>
                                    <td><?php echo number_format($stat['today']['track']['d']['hc']['not']); ?></td>
                                    <td><?php echo number_format($stat['today']['track']['d']['hc']['verify']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td class="txt-oflo">Returned</td>
                                    <td><span class="badge badge-warning badge-pill">OSC</span></td>
                                    <td><?php echo number_format($stat['today']['track']['r']['osc']['in']); ?></td>
                                    <td><?php echo number_format($stat['today']['track']['r']['osc']['not']); ?></td>
                                    <td><?php echo number_format($stat['today']['track']['r']['osc']['verify']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">5</td>
                                    <td class="txt-oflo">Returned</td>
                                    <td><span class="badge badge-info badge-pill">ADM</span></td>
                                    <td><?php echo number_format($stat['today']['track']['r']['adm']['in']); ?></td>
                                    <td><?php echo number_format($stat['today']['track']['r']['adm']['not']); ?></td>
                                    <td><?php echo number_format($stat['today']['track']['r']['adm']['verify']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">6</td>
                                    <td class="txt-oflo">Returned</td>
                                    <td><span class="badge badge-success badge-pill">BRN</span></td>
                                    <td><?php echo number_format($stat['today']['track']['r']['brn']['in']); ?></td>
                                    <td><?php echo number_format($stat['today']['track']['r']['brn']['not']); ?></td>
                                    <td><?php echo number_format($stat['today']['track']['r']['brn']['verify']); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card-body bg-light">
                    <h5 class="font-light m-t-0">Statistic for Today <i class="fa fa-calendar"></i> <?php echo date('d M Y'); ?></h5>
                </div>
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="txt-oflo">Batch</td>
                                    <td><span class="badge badge-warning badge-pill">OSC</span></td>
                                    <td><?php echo number_format($stat['today']['batch']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="txt-oflo">Application</td>
                                    <td><span class="badge badge-warning badge-pill">OSC</span></td>
                                    <td><?php echo number_format($stat['today']['application']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td class="txt-oflo">VLN Fee</td>
                                    <td><span class="badge badge-warning badge-pill">OSC</span></td>
                                    <td>BDT <?php echo number_format($stat['today']['vln']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td class="txt-oflo">OSC Fee</td>
                                    <td><span class="badge badge-warning badge-pill">OSC</span></td>
                                    <td>BDT <?php echo number_format($stat['today']['osc']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">5</td>
                                    <td class="txt-oflo">Total Fee</td>
                                    <td><span class="badge badge-warning badge-pill">OSC</span></td>
                                    <td>BDT <?php echo number_format($stat['today']['fee']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">6</td>
                                    <td class="txt-oflo">VTR</td>
                                    <td><span class="badge badge-warning badge-pill">OSC</span></td>
                                    <td><?php echo number_format($stat['today']['vtr']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">7</td>
                                    <td class="txt-oflo">VDR</td>
                                    <td><span class="badge badge-warning badge-pill">OSC</span></td>
                                    <td><?php echo number_format($stat['today']['vdr']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">8</td>
                                    <td class="txt-oflo">Male</td>
                                    <td><span class="badge badge-warning badge-pill">OSC</span></td>
                                    <td><?php echo number_format($stat['today']['male']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">9</td>
                                    <td class="txt-oflo">Female</td>
                                    <td><span class="badge badge-warning badge-pill">OSC</span></td>
                                    <td><?php echo number_format($stat['today']['female']); ?></td>
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
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="txt-oflo">Batch</td>
                                    <td><span class="badge badge-warning badge-pill">OSC</span></td>
                                    <td><?php echo number_format($stat['all']['batch']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="txt-oflo">Application</td>
                                    <td><span class="badge badge-warning badge-pill">OSC</span></td>
                                    <td><?php echo number_format($stat['all']['application']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td class="txt-oflo">VLN Fee</td>
                                    <td><span class="badge badge-warning badge-pill">OSC</span></td>
                                    <td>BDT <?php echo number_format($stat['all']['vln']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td class="txt-oflo">OSC Fee</td>
                                    <td><span class="badge badge-warning badge-pill">OSC</span></td>
                                    <td>BDT <?php echo number_format($stat['all']['osc']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">5</td>
                                    <td class="txt-oflo">Total Fee</td>
                                    <td><span class="badge badge-warning badge-pill">OSC</span></td>
                                    <td>BDT <?php echo number_format($stat['all']['fee']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">6</td>
                                    <td class="txt-oflo">VTR</td>
                                    <td><span class="badge badge-warning badge-pill">OSC</span></td>
                                    <td><?php echo number_format($stat['all']['vtr']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">7</td>
                                    <td class="txt-oflo">VDR</td>
                                    <td><span class="badge badge-warning badge-pill">OSC</span></td>
                                    <td><?php echo number_format($stat['all']['vdr']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">8</td>
                                    <td class="txt-oflo">Male</td>
                                    <td><span class="badge badge-warning badge-pill">OSC</span></td>
                                    <td><?php echo number_format($stat['all']['male']); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">9</td>
                                    <td class="txt-oflo">Female</td>
                                    <td><span class="badge badge-warning badge-pill">OSC</span></td>
                                    <td><?php echo number_format($stat['all']['female']); ?></td>
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
    Yii::app()->clientScript->registerScriptFile("vendor/elite/dist/admin/js/custom.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/echarts/echarts-all.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/visafasttrack/js/osc/dashboard.js", CClientScript::POS_END);