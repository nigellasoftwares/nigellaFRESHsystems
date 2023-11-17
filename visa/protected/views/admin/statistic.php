<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Statistic</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active">Statistic</li>
                </ol>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <h3>Statistic for Today <i class="fa fa-calendar"></i> <?php echo date('d M Y'); ?></h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
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
                <div class="col-md-3">
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
                <div class="col-md-3">
                    <div class="card">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-warning">
                                <h3 class="text-white box m-b-0"><i class="fa fa-id-badge"></i></h3></div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0"><?php echo number_format($stat['today']['vtr']); ?></h3>
                                <h5 class="text-muted m-b-0">VTR Today</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-inverse">
                                <h3 class="text-white box m-b-0"><i class="fa fa-id-badge"></i></h3></div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0"><?php echo number_format($stat['today']['vdr']); ?></h3>
                                <h5 class="text-muted m-b-0">VDR Today</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Status</th>
                                <th>Level</th>
                                <th class="text-center">Number<br />Of<br />Passport</th>
                                <th class="text-center">Not<br />Verified</th>
                                <th class="text-center">Verified</th>
                                <th class="text-center">Percent</th>
                                <th>Progress</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="txt-oflo">Delivered To Admin</td>
                                <td><span class="badge badge-info badge-pill">ADMIN</span></td>
                                <td class="text-center"><?php echo number_format($stat['today']['track']['d']['adm']['in']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['today']['track']['d']['adm']['not']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['today']['track']['d']['adm']['verify']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['today']['track']['d']['adm']['percent']); ?>%</td>
                                <td>
                                    <div class="progress progress-xs margin-vertical-10">
                                        <div class="progress-bar bg-info" style="width: <?php echo number_format($stat['today']['track']['d']['adm']['percent']); ?>%; height:8px;"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td class="txt-oflo">Delivered To OSC</td>
                                <td><span class="badge badge-warning badge-pill">ONE STOP CENTRE</span></td>
                                <td class="text-center"><?php echo number_format($stat['today']['track']['d']['osc']['in']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['today']['track']['d']['osc']['not']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['today']['track']['d']['osc']['verify']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['today']['track']['d']['osc']['percent']); ?>%</td>
                                <td>
                                    <div class="progress progress-xs margin-vertical-10">
                                        <div class="progress-bar bg-warning" style="width: <?php echo number_format($stat['today']['track']['d']['osc']['percent']); ?>%; height:8px;"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td class="txt-oflo">Delivered To High Commission</td>
                                <td><span class="badge badge-success badge-pill">HIGH COMMISSION</span></td>
                                <td class="text-center"><?php echo number_format($stat['today']['track']['d']['hc']['in']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['today']['track']['d']['hc']['not']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['today']['track']['d']['hc']['verify']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['today']['track']['d']['hc']['percent']); ?>%</td>
                                <td>
                                    <div class="progress progress-xs margin-vertical-10">
                                        <div class="progress-bar bg-success" style="width: <?php echo number_format($stat['today']['track']['d']['hc']['percent']); ?>%; height:8px;"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td class="txt-oflo">Returned To OSC</td>
                                <td><span class="badge badge-warning badge-pill">ONE STOP CENTRE</span></td>
                                <td class="text-center"><?php echo number_format($stat['today']['track']['r']['osc']['in']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['today']['track']['r']['osc']['not']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['today']['track']['r']['osc']['verify']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['today']['track']['r']['osc']['percent']); ?>%</td>
                                <td>
                                    <div class="progress progress-xs margin-vertical-10">
                                        <div class="progress-bar bg-warning" style="width: <?php echo number_format($stat['today']['track']['r']['osc']['percent']); ?>%; height:8px;"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td class="txt-oflo">Returned To Admin</td>
                                <td><span class="badge badge-info badge-pill">ADMIN</span></td>
                                <td class="text-center"><?php echo number_format($stat['today']['track']['r']['adm']['in']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['today']['track']['r']['adm']['not']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['today']['track']['r']['adm']['verify']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['today']['track']['r']['adm']['percent']); ?>%</td>
                                <td>
                                    <div class="progress progress-xs margin-vertical-10">
                                        <div class="progress-bar bg-info" style="width: <?php echo number_format($stat['today']['track']['r']['adm']['percent']); ?>%; height:8px;"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">6</td>
                                <td class="txt-oflo">Returned To Branch</td>
                                <td><span class="badge badge-success badge-pill">BRANCH</span></td>
                                <td class="text-center"><?php echo number_format($stat['today']['track']['r']['brn']['in']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['today']['track']['r']['brn']['not']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['today']['track']['r']['brn']['verify']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['today']['track']['r']['brn']['percent']); ?>%</td>
                                <td>
                                    <div class="progress progress-xs margin-vertical-10">
                                        <div class="progress-bar bg-success" style="width: <?php echo number_format($stat['today']['track']['r']['brn']['percent']); ?>%; height:8px;"></div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row m-t-10">
        <div class="col-md-12">
            <h3>Overall Statistic</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-info">
                                <h3 class="text-white box m-b-0"><i class="fa fa-desktop"></i></h3></div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-info"><?php echo number_format($stat['all']['batch']); ?></h3>
                                <h5 class="text-muted m-b-0">Overall Batch</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-success">
                                <h3 class="text-white box m-b-0"><i class="fa fa-edit"></i></h3></div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-success"><?php echo number_format($stat['all']['application']); ?></h3>
                                <h5 class="text-muted m-b-0">Overall Application</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-warning">
                                <h3 class="text-white box m-b-0"><i class="fa fa-id-badge"></i></h3></div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0"><?php echo number_format($stat['all']['vtr']); ?></h3>
                                <h5 class="text-muted m-b-0">Overall VTR</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-inverse">
                                <h3 class="text-white box m-b-0"><i class="fa fa-id-badge"></i></h3></div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0"><?php echo number_format($stat['all']['vdr']); ?></h3>
                                <h5 class="text-muted m-b-0">Overall VDR</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Status</th>
                                <th>Level</th>
                                <th class="text-center">Number<br />Of<br />Passport</th>
                                <th class="text-center">Not<br />Verified</th>
                                <th class="text-center">Verified</th>
                                <th class="text-center">Percent</th>
                                <th>Progress</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="txt-oflo">Delivered To Admin</td>
                                <td><span class="badge badge-info badge-pill">ADMIN</span></td>
                                <td class="text-center"><?php echo number_format($stat['all']['track']['d']['adm']['in']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['all']['track']['d']['adm']['not']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['all']['track']['d']['adm']['verify']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['all']['track']['d']['adm']['percent']); ?>%</td>
                                <td>
                                    <div class="progress progress-xs margin-vertical-10">
                                        <div class="progress-bar bg-info" style="width: <?php echo number_format($stat['all']['track']['d']['adm']['percent']); ?>%; height:8px;"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td class="txt-oflo">Delivered To OSC</td>
                                <td><span class="badge badge-warning badge-pill">ONE STOP CENTRE</span></td>
                                <td class="text-center"><?php echo number_format($stat['all']['track']['d']['osc']['in']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['all']['track']['d']['osc']['not']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['all']['track']['d']['osc']['verify']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['all']['track']['d']['osc']['percent']); ?>%</td>
                                <td>
                                    <div class="progress progress-xs margin-vertical-10">
                                        <div class="progress-bar bg-warning" style="width: <?php echo number_format($stat['all']['track']['d']['osc']['percent']); ?>%; height:8px;"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td class="txt-oflo">Delivered To High Commission</td>
                                <td><span class="badge badge-success badge-pill">HIGH COMMISSION</span></td>
                                <td class="text-center"><?php echo number_format($stat['all']['track']['d']['hc']['in']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['all']['track']['d']['hc']['not']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['all']['track']['d']['hc']['verify']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['all']['track']['d']['hc']['percent']); ?>%</td>
                                <td>
                                    <div class="progress progress-xs margin-vertical-10">
                                        <div class="progress-bar bg-success" style="width: <?php echo number_format($stat['all']['track']['d']['hc']['percent']); ?>%; height:8px;"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td class="txt-oflo">Returned To OSC</td>
                                <td><span class="badge badge-warning badge-pill">ONE STOP CENTRE</span></td>
                                <td class="text-center"><?php echo number_format($stat['all']['track']['r']['osc']['in']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['all']['track']['r']['osc']['not']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['all']['track']['r']['osc']['verify']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['all']['track']['r']['osc']['percent']); ?>%</td>
                                <td>
                                    <div class="progress progress-xs margin-vertical-10">
                                        <div class="progress-bar bg-warning" style="width: <?php echo number_format($stat['all']['track']['r']['osc']['percent']); ?>%; height:8px;"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td class="txt-oflo">Returned To Admin</td>
                                <td><span class="badge badge-info badge-pill">ADMIN</span></td>
                                <td class="text-center"><?php echo number_format($stat['all']['track']['r']['adm']['in']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['all']['track']['r']['adm']['not']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['all']['track']['r']['adm']['verify']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['all']['track']['r']['adm']['percent']); ?>%</td>
                                <td>
                                    <div class="progress progress-xs margin-vertical-10">
                                        <div class="progress-bar bg-info" style="width: <?php echo number_format($stat['all']['track']['r']['adm']['percent']); ?>%; height:8px;"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">6</td>
                                <td class="txt-oflo">Returned To Branch</td>
                                <td><span class="badge badge-success badge-pill">BRANCH</span></td>
                                <td class="text-center"><?php echo number_format($stat['all']['track']['r']['brn']['in']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['all']['track']['r']['brn']['not']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['all']['track']['r']['brn']['verify']); ?></td>
                                <td class="text-center"><?php echo number_format($stat['all']['track']['r']['brn']['percent']); ?>%</td>
                                <td>
                                    <div class="progress progress-xs margin-vertical-10">
                                        <div class="progress-bar bg-success" style="width: <?php echo number_format($stat['all']['track']['r']['brn']['percent']); ?>%; height:8px;"></div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    Yii::app()->clientScript->registerScriptFile("vendor/elite/dist/admin/js/custom.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/echarts/echarts-all.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/visafasttrack/js/admin/statistic.js", CClientScript::POS_END);