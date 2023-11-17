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
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Foreign Worker Management</h4>

                    <div class="table-responsive m-t-40">
                        <table id="table-application-agent" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Country</th>
                                    <th class="text-center">Agent</th>
                                    <th class="text-center">Total<br />Registered</th>
                                    <th class="text-center">Medical<br />Completed</th>
                                    <th class="text-center">Pending<br />VDR</th>
                                    <th class="text-center">VDR<br />Approved</th>
                                    <th class="text-center">Approved<br />For<br />Departure</th>
                                    <th class="text-center">Ready<br />For<br />Departure</th>
                                    <th class="text-center">Arrival &<br />Completed</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach($agency as $a){
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $a['country']; ?></td>
                                    <td class="text-center"><?php echo $a['company']; ?></td>
                                    <td class="text-center"><?php echo $a['total']; ?></td>
                                    <td class="text-center"><?php echo $a['medical']; ?></td>
                                    <td class="text-center"><?php echo $a['pending_vdr']; ?></td>
                                    <td class="text-center"><?php echo $a['vdr_approved']; ?></td>
                                    <td class="text-center"><?php echo $a['approval']; ?></td>
                                    <td class="text-center"><?php echo $a['departure']; ?></td>
                                    <td class="text-center"><?php echo $a['arrival']; ?></td>
                                </tr>
                            <?php
                                }    
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="background-color: #eaeef2;">
                        <div class="card-body p-b-0">
                            <ul class="nav nav-tabs customtab2">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#registertotal"><i class="icon-people"></i> Total</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#registertoday"><i class="fa fa-calendar"></i> Today</a>
                                </li>
                            </ul>
                            <div class="tab-content m-t-20">
                                <!-- Total Registration -->
                                <div class="tab-pane active" id="registertotal" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="d-flex flex-row">
                                                    <div class="p-10 bg-info">
                                                        <h3 class="text-white box m-b-0"><i class="icon-people"></i></h3></div>
                                                    <div class="align-self-center m-l-20">
                                                        <h3 class="m-b-0 text-info"><?php echo number_format($stat['all']['register']); ?></h3>
                                                        <h5 class="text-muted m-b-0">Registered</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="d-flex flex-row">
                                                    <div class="p-10 bg-success"><h3 class="text-white box m-b-0"><i class="fa fa-medkit"></i></h3></div>
                                                    <div class="align-self-center m-l-20">
                                                        <h3 class="m-b-0 text-success"><?php echo number_format($stat['all']['medical']['completed']); ?></h3>
                                                        <h5 class="text-muted m-b-0">Med. Completed</h5>
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
                                                        <h3 class="m-b-0 text-success"><?php echo number_format($stat['all']['visa']['completed']); ?></h3>
                                                        <h5 class="text-muted m-b-0">Visa Completed</h5>
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
                                                        <h3 class="m-b-0 text-danger"><?php echo number_format($stat['all']['medical']['pending']); ?></h3>
                                                        <h5 class="text-muted m-b-0">Med. Pending</h5>
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
                                                        <h3 class="m-b-0 text-danger"><?php echo number_format($stat['all']['visa']['pending']); ?></h3>
                                                        <h5 class="text-muted m-b-0">Visa Pending</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Today Registration -->
                                <div class="tab-pane" id="registertoday" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="d-flex flex-row">
                                                    <div class="p-10 bg-info">
                                                        <h3 class="text-white box m-b-0"><i class="icon-people"></i></h3></div>
                                                    <div class="align-self-center m-l-20">
                                                        <h3 class="m-b-0 text-info"><?php echo number_format($stat['today']['register']); ?></h3>
                                                        <h5 class="text-muted m-b-0">Registered</h5>
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
                                                        <h5 class="text-muted m-b-0">Med. Completed</h5>
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
                                                        <h5 class="text-muted m-b-0">Visa Completed</h5>
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
                                                        <h5 class="text-muted m-b-0">Med. Pending</h5>
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
                                                        <h5 class="text-muted m-b-0">Visa Pending</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body p-b-0">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs customtab2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#register" role="tab">
                                <span class="hidden-sm-up"><i class="icon-people"></i></span> <span class="hidden-xs-down">Register</span>
                            </a>
                        </li>
                        <li class="nav-item"> 
                            <a class="nav-link" data-toggle="tab" href="#reminder" role="tab">
                                <span class="hidden-sm-up"><i class="icon-bell"></i></span> <span class="hidden-xs-down">Reminder</span>
                            </a> 
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="register" role="tabpanel">
                            <div class="p-20">
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
                                                        <th colspan="2" class="text-right">Total Count</th>
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
                                                        <th colspan="2" class="text-right">Total Count</th>
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
                        <div class="tab-pane" id="reminder" role="tabpanel">
                            <div class="p-20">
                                <div class="row">
                                    <div class="card-body bg-light">
                                        <h5 class="font-light m-t-0">Medical Reminder <i class="fa fa-calendar"></i> <?php echo date('d M Y'); ?></h5>
                                    </div>
                                    <div class="card">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th>&nbsp;</th>
                                                        <th colspan="2" class="text-right">Total Foreign Worker</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td class="txt-oflo"><i class="fa fa-calendar"></i> 1 Month</td>
                                                        <td><span class="badge badge-info badge-pill">1M</span></td>
                                                        <td class="text-right"><?php echo number_format($reminder['medical']['reminder']['month_01']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">2</td>
                                                        <td class="txt-oflo"><i class="fa fa-calendar"></i> 2 Weeks</td>
                                                        <td><span class="badge badge-warning badge-pill">2W</span></td>
                                                        <td class="text-right"><?php echo number_format($reminder['medical']['reminder']['week_02']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">3</td>
                                                        <td class="txt-oflo"><i class="fa fa-calendar"></i> 1 Week</td>
                                                        <td><span class="badge badge-warning badge-pill">1W</span></td>
                                                        <td class="text-right"><?php echo number_format($reminder['medical']['reminder']['week_01']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">4</td>
                                                        <td class="txt-oflo"><i class="fa fa-calendar"></i> 3 Days</td>
                                                        <td><span class="badge badge-danger badge-pill">3D</span></td>
                                                        <td class="text-right"><?php echo number_format($reminder['medical']['reminder']['day_03']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">5</td>
                                                        <td class="txt-oflo"><i class="fa fa-calendar"></i> 2 Days</td>
                                                        <td><span class="badge badge-danger badge-pill">2D</span></td>
                                                        <td class="text-right"><?php echo number_format($reminder['medical']['reminder']['day_02']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">6</td>
                                                        <td class="txt-oflo"><i class="fa fa-calendar"></i> 1 Day</td>
                                                        <td><span class="badge badge-danger badge-pill">1D</span></td>
                                                        <td class="text-right"><?php echo number_format($reminder['medical']['reminder']['day_01']); ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card-body bg-light">
                                        <h5 class="font-light m-t-0">PLKS Reminder <i class="fa fa-calendar"></i> <?php echo date('d M Y'); ?></h5>
                                    </div>
                                    <div class="card">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th>&nbsp;</th>
                                                        <th colspan="2" class="text-right">Total Foreign Worker</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td class="txt-oflo"><i class="fa fa-calendar"></i> 3 Months</td>
                                                        <td><span class="badge badge-info badge-pill">3M</span></td>
                                                        <td class="text-right"><?php echo number_format($reminder['plks']['reminder']['month_03']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">2</td>
                                                        <td class="txt-oflo"><i class="fa fa-calendar"></i> 2 Months</td>
                                                        <td><span class="badge badge-info badge-pill">2M</span></td>
                                                        <td class="text-right"><?php echo number_format($reminder['plks']['reminder']['month_02']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">3</td>
                                                        <td class="txt-oflo"><i class="fa fa-calendar"></i> 1 Month</td>
                                                        <td><span class="badge badge-info badge-pill">1M</span></td>
                                                        <td class="text-right"><?php echo number_format($reminder['plks']['reminder']['month_01']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">4</td>
                                                        <td class="txt-oflo"><i class="fa fa-calendar"></i> 2 Weeks</td>
                                                        <td><span class="badge badge-warning badge-pill">2W</span></td>
                                                        <td class="text-right"><?php echo number_format($reminder['plks']['reminder']['week_02']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">5</td>
                                                        <td class="txt-oflo"><i class="fa fa-calendar"></i> 1 Week</td>
                                                        <td><span class="badge badge-warning badge-pill">1W</span></td>
                                                        <td class="text-right"><?php echo number_format($reminder['plks']['reminder']['week_01']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">6</td>
                                                        <td class="txt-oflo"><i class="fa fa-calendar"></i> 3 Days</td>
                                                        <td><span class="badge badge-danger badge-pill">3D</span></td>
                                                        <td class="text-right"><?php echo number_format($reminder['plks']['reminder']['day_03']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">7</td>
                                                        <td class="txt-oflo"><i class="fa fa-calendar"></i> 2 Days</td>
                                                        <td><span class="badge badge-danger badge-pill">2D</span></td>
                                                        <td class="text-right"><?php echo number_format($reminder['plks']['reminder']['day_02']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">8</td>
                                                        <td class="txt-oflo"><i class="fa fa-calendar"></i> 1 Day</td>
                                                        <td><span class="badge badge-danger badge-pill">1D</span></td>
                                                        <td class="text-right"><?php echo number_format($reminder['plks']['reminder']['day_01']); ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/datatables/jquery.dataTables.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/echarts/echarts-all.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/admin/dashboard.js", CClientScript::POS_END);