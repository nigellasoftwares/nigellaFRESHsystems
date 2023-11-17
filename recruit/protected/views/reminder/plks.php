<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">PLKS</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item active">Reminder</li>
                    <li class="breadcrumb-item active">PLKS</li>
                </ol>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><span class="label label-primary"><?php echo $user->profile->company->name; ?></span></h4>
            <h4 class="card-title">PLKS Reminder</h4>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-info">
                                <h3 class="text-white box m-b-0"><i class="fa fa-calendar"></i></h3></div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-info"><?php echo number_format($reminder['month_01']); ?></h3>
                                <h5 class="text-muted m-b-0">1 Month</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-warning">
                                <h3 class="text-white box m-b-0"><i class="fa fa-calendar"></i></h3>
                            </div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-warning"><?php echo number_format($reminder['week_02']); ?></h3>
                                <h5 class="text-muted m-b-0">2 Weeks</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-danger">
                                <h3 class="text-white box m-b-0"><i class="fa fa-calendar"></i></h3></div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-danger"><?php echo number_format($reminder['day_03']); ?></h3>
                                <h5 class="text-muted m-b-0">3 Days</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-danger">
                                <h3 class="text-white box m-b-0"><i class="fa fa-calendar"></i></h3></div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-danger"><?php echo number_format($reminder['day_01']); ?></h3>
                                <h5 class="text-muted m-b-0">1 Day</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card-body bg-light">
                <h5 class="font-light m-t-0">Today : <strong><?php echo date('d M Y'); ?></strong></h5>
            </div>
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Reminder</th>
                                <th>&nbsp;</th>
                                <th>Foreign Worker</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="txt-oflo"><i class="fa fa-calendar"></i> 3 Months</td>
                                <td><span class="badge badge-info badge-pill">3M</span></td>
                                <td class="text-right"><?php echo number_format($reminder['month_03']); ?></td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td class="txt-oflo"><i class="fa fa-calendar"></i> 2 Months</td>
                                <td><span class="badge badge-info badge-pill">2M</span></td>
                                <td class="text-right"><?php echo number_format($reminder['month_02']); ?></td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td class="txt-oflo"><i class="fa fa-calendar"></i> 1 Month</td>
                                <td><span class="badge badge-info badge-pill">1M</span></td>
                                <td class="text-right"><?php echo number_format($reminder['month_01']); ?></td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td class="txt-oflo"><i class="fa fa-calendar"></i> 2 Weeks</td>
                                <td><span class="badge badge-warning badge-pill">2W</span></td>
                                <td class="text-right"><?php echo number_format($reminder['week_02']); ?></td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td class="txt-oflo"><i class="fa fa-calendar"></i> 1 Week</td>
                                <td><span class="badge badge-warning badge-pill">1W</span></td>
                                <td class="text-right"><?php echo number_format($reminder['week_01']); ?></td>
                            </tr>
                            <tr>
                                <td class="text-center">6</td>
                                <td class="txt-oflo"><i class="fa fa-calendar"></i> 3 Days</td>
                                <td><span class="badge badge-danger badge-pill">3D</span></td>
                                <td class="text-right"><?php echo number_format($reminder['day_03']); ?></td>
                            </tr>
                            <tr>
                                <td class="text-center">7</td>
                                <td class="txt-oflo"><i class="fa fa-calendar"></i> 2 Days</td>
                                <td><span class="badge badge-danger badge-pill">2D</span></td>
                                <td class="text-right"><?php echo number_format($reminder['day_02']); ?></td>
                            </tr>
                            <tr>
                                <td class="text-center">8</td>
                                <td class="txt-oflo"><i class="fa fa-calendar"></i> 1 Day</td>
                                <td><span class="badge badge-danger badge-pill">1D</span></td>
                                <td class="text-right"><?php echo number_format($reminder['day_01']); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#month_03" role="tab">
                            <span class="badge badge-info"><?php echo number_format($reminder['month_03']); ?></span><br />3 Months
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#month_02" role="tab">
                            <span class="badge badge-info"><?php echo number_format($reminder['month_02']); ?></span><br />2 Months
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#month_01" role="tab">
                            <span class="badge badge-info"><?php echo number_format($reminder['month_01']); ?></span><br />1 Month
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#week_02" role="tab">
                            <span class="badge badge-warning"><?php echo number_format($reminder['week_02']); ?></span><br />2 Weeks
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#week_01" role="tab">
                            <span class="badge badge-warning"><?php echo number_format($reminder['month_01']); ?></span><br />1 Week
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#day_03" role="tab">
                            <span class="badge badge-danger"><?php echo number_format($reminder['day_03']); ?></span><br />3 Days
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#day_02" role="tab">
                            <span class="badge badge-danger"><?php echo number_format($reminder['day_02']); ?></span><br />2 Days
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#day_01" role="tab">
                            <span class="badge badge-danger"><?php echo number_format($reminder['day_01']); ?></span><br />1 Day
                        </a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- 3 Months -->
                    <div class="tab-pane active" id="month_03" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <form id="form-view-month03">
                                        <div class="form-actions">
                                            <h3 class="m-b-20">3 Months Reminder for PLKS Renewal</h3>
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive m-t-40">
                                                        <table id="table-reminder-month03" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Foreign<br />Worker ID</th>
                                                                    <th>Full Name</th>
                                                                    <th>Passport</th>
                                                                    <th>Nationality</th>
                                                                    <th>PLKS Expiry Date</th>
                                                                    <!--
                                                                    <th>Action</th>
                                                                    -->
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                                $a = 0;
                                                                foreach($worker['month_03'] as $w){
                                                                    $a++;
                                                            ?>
                                                                <tr>
                                                                    <td class="text-center"><?php echo $a; ?></td>
                                                                    <td><?php echo $w['code']; ?></td>
                                                                    <td><?php echo strtoupper($w['name']); ?></td>
                                                                    <td><?php echo strtoupper($w['passport']); ?></td>
                                                                    <td><?php echo $w['nationality']; ?></td>
                                                                    <td><?php echo $w['plks_expiry']; ?></td>
                                                                    <!--
                                                                    <td>
                                                                        <a data-id="<?php echo $t->id; ?>" class="btn btn-sm waves-effect waves-light btn-danger text-white transaction-delete" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                    -->
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
                                    </form>    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 2 Months -->
                    <div class="tab-pane" id="month_02" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <form id="form-view-month02">
                                        <div class="form-actions">
                                            <h3 class="m-b-20">2 Months Reminder for PLKS Renewal</h3>
                                    
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive m-t-40">
                                                        <table id="table-reminder-month02" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Foreign<br />Worker ID</th>
                                                                    <th>Full Name</th>
                                                                    <th>Passport</th>
                                                                    <th>Nationality</th>
                                                                    <th>PLKS Expiry Date</th>
                                                                    <!--
                                                                    <th>Action</th>
                                                                    -->
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                                $b = 0;
                                                                foreach($worker['month_02'] as $w){
                                                                    $b++;
                                                            ?>
                                                                <tr>
                                                                    <td class="text-center"><?php echo $b; ?></td>
                                                                    <td><?php echo $w['code']; ?></td>
                                                                    <td><?php echo strtoupper($w['name']); ?></td>
                                                                    <td><?php echo strtoupper($w['passport']); ?></td>
                                                                    <td><?php echo $w['nationality']; ?></td>
                                                                    <td><?php echo $w['plks_expiry']; ?></td>
                                                                    <!--
                                                                    <td>
                                                                        <a data-id="<?php echo $t->id; ?>" class="btn btn-sm waves-effect waves-light btn-danger text-white transaction-delete" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                    -->
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
                                    </form>    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 1 Month -->
                    <div class="tab-pane" id="month_01" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <form id="form-view-month01">
                                        <div class="form-actions">
                                            <h3 class="m-b-20">1 Month Reminder for PLKS Renewal</h3>
                                    
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive m-t-40">
                                                        <table id="table-reminder-month01" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Foreign<br />Worker ID</th>
                                                                    <th>Full Name</th>
                                                                    <th>Passport</th>
                                                                    <th>Nationality</th>
                                                                    <th>PLKS Expiry Date</th>
                                                                    <!--
                                                                    <th>Action</th>
                                                                    -->
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                                $c = 0;
                                                                foreach($worker['month_01'] as $w){
                                                                    $c++;
                                                            ?>
                                                                <tr>
                                                                    <td class="text-center"><?php echo $c; ?></td>
                                                                    <td><?php echo $w['code']; ?></td>
                                                                    <td><?php echo strtoupper($w['name']); ?></td>
                                                                    <td><?php echo strtoupper($w['passport']); ?></td>
                                                                    <td><?php echo $w['nationality']; ?></td>
                                                                    <td><?php echo $w['plks_expiry']; ?></td>
                                                                    <!--
                                                                    <td>
                                                                        <a data-id="<?php echo $t->id; ?>" class="btn btn-sm waves-effect waves-light btn-danger text-white transaction-delete" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                    -->
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
                                    </form>    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 2 Weeks -->
                    <div class="tab-pane" id="week_02" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <form id="form-view-week02">
                                        <div class="form-actions">
                                            <h3 class="m-b-20">2 Weeks Reminder for PLKS Renewal</h3>
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive m-t-40">
                                                        <table id="table-reminder-week02" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Foreign<br />Worker ID</th>
                                                                    <th>Full Name</th>
                                                                    <th>Passport</th>
                                                                    <th>Nationality</th>
                                                                    <th>PLKS Expiry Date</th>
                                                                    <!--
                                                                    <th>Action</th>
                                                                    -->
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                                $d = 0;
                                                                foreach($worker['week_02'] as $w){
                                                                    $d++;
                                                            ?>
                                                                <tr>
                                                                    <td class="text-center"><?php echo $d; ?></td>
                                                                    <td><?php echo $w['code']; ?></td>
                                                                    <td><?php echo strtoupper($w['name']); ?></td>
                                                                    <td><?php echo strtoupper($w['passport']); ?></td>
                                                                    <td><?php echo $w['nationality']; ?></td>
                                                                    <td><?php echo $w['plks_expiry']; ?></td>
                                                                    <!--
                                                                    <td>
                                                                        <a data-id="<?php echo $t->id; ?>" class="btn btn-sm waves-effect waves-light btn-danger text-white transaction-delete" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                    -->
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
                                    </form>
                                </div>    
                             </div>
                        </div>
                    </div>    
                    
                    <!-- 1 Week -->
                    <div class="tab-pane" id="week_01" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <form id="form-view-week01">
                                        <div class="form-actions">
                                            <h3 class="m-b-20">1 Week Reminder for PLKS Renewal</h3>
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive m-t-40">
                                                        <table id="table-reminder-week01" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Foreign<br />Worker ID</th>
                                                                    <th>Full Name</th>
                                                                    <th>Passport</th>
                                                                    <th>Nationality</th>
                                                                    <th>Arrival Date</th>
                                                                    <!--
                                                                    <th>Action</th>
                                                                    -->
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                                $e = 0;
                                                                foreach($worker['week_01'] as $w){
                                                                    $e++;
                                                            ?>
                                                                <tr>
                                                                    <td class="text-center"><?php echo $e; ?></td>
                                                                    <td><?php echo $w['code']; ?></td>
                                                                    <td><?php echo strtoupper($w['name']); ?></td>
                                                                    <td><?php echo strtoupper($w['passport']); ?></td>
                                                                    <td><?php echo $w['nationality']; ?></td>
                                                                    <td><?php echo $w['plks_expiry']; ?></td>
                                                                    <!--
                                                                    <td>
                                                                        <a data-id="<?php echo $t->id; ?>" class="btn btn-sm waves-effect waves-light btn-danger text-white transaction-delete" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                    -->
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
                                    </form>
                                </div>    
                             </div>
                        </div>
                    </div>
                    
                    <!-- 3 Days -->
                    <div class="tab-pane" id="day_03" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <form id="form-view-day03">
                                        <div class="form-actions">
                                            <h3 class="m-b-20">3 Days Reminder for PLKS Renewal</h3>
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive m-t-40">
                                                        <table id="table-reminder-day03" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Foreign<br />Worker ID</th>
                                                                    <th>Full Name</th>
                                                                    <th>Passport</th>
                                                                    <th>Nationality</th>
                                                                    <th>Arrival Date</th>
                                                                    <!--
                                                                    <th>Action</th>
                                                                    -->
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                                $f = 0;
                                                                foreach($worker['day_03'] as $w){
                                                                    $f++;
                                                            ?>
                                                                <tr>
                                                                    <td class="text-center"><?php echo $f; ?></td>
                                                                    <td><?php echo $w['code']; ?></td>
                                                                    <td><?php echo strtoupper($w['name']); ?></td>
                                                                    <td><?php echo strtoupper($w['passport']); ?></td>
                                                                    <td><?php echo $w['nationality']; ?></td>
                                                                    <td><?php echo $w['plks_expiry']; ?></td>
                                                                    <!--
                                                                    <td>
                                                                        <a data-id="<?php echo $t->id; ?>" class="btn btn-sm waves-effect waves-light btn-danger text-white transaction-delete" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                    -->
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
                                    </form>
                                </div>    
                             </div>
                        </div>
                    </div>
                    
                    <!-- 2 Days -->
                    <div class="tab-pane" id="day_02" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <form id="form-view-day02">
                                        <div class="form-actions">
                                            <h3 class="m-b-20">2 Days Reminder for PLKS Renewal</h3>
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive m-t-40">
                                                        <table id="table-reminder-day02" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Foreign<br />Worker ID</th>
                                                                    <th>Full Name</th>
                                                                    <th>Passport</th>
                                                                    <th>Nationality</th>
                                                                    <th>PLKS Expiry Date</th>
                                                                    <!--
                                                                    <th>Action</th>
                                                                    -->
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                                $g = 0;
                                                                foreach($worker['day_02'] as $w){
                                                                    $g++;
                                                            ?>
                                                                <tr>
                                                                    <td class="text-center"><?php echo $g; ?></td>
                                                                    <td><?php echo $w['code']; ?></td>
                                                                    <td><?php echo strtoupper($w['name']); ?></td>
                                                                    <td><?php echo strtoupper($w['passport']); ?></td>
                                                                    <td><?php echo $w['nationality']; ?></td>
                                                                    <td><?php echo $w['plks_expiry']; ?></td>
                                                                    <!--
                                                                    <td>
                                                                        <a data-id="<?php echo $t->id; ?>" class="btn btn-sm waves-effect waves-light btn-danger text-white transaction-delete" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                    -->
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
                                    </form>
                                </div>    
                             </div>
                        </div>
                    </div>
                    
                    <!-- 1 Day -->
                    <div class="tab-pane" id="day_01" role="tabpanel">
                        <div class="card-body">
                            <div class="p-20">
                                <div class="row">
                                    <form id="form-view-day01">
                                        <div class="form-actions">
                                            <h3 class="m-b-20">1 Day Reminder for PLKS Renewal</h3>
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive m-t-40">
                                                        <table id="table-reminder-day01" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Foreign<br />Worker ID</th>
                                                                    <th>Full Name</th>
                                                                    <th>Passport</th>
                                                                    <th>Nationality</th>
                                                                    <th>PLKS Expiry Date</th>
                                                                    <!--
                                                                    <th>Action</th>
                                                                    -->
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                                $h = 0;
                                                                foreach($worker['day_01'] as $w){
                                                                    $h++;
                                                            ?>
                                                                <tr>
                                                                    <td class="text-center"><?php echo $h; ?></td>
                                                                    <td><?php echo $w['code']; ?></td>
                                                                    <td><?php echo strtoupper($w['name']); ?></td>
                                                                    <td><?php echo strtoupper($w['passport']); ?></td>
                                                                    <td><?php echo $w['nationality']; ?></td>
                                                                    <td><?php echo $w['plks_expiry']; ?></td>
                                                                    <!--
                                                                    <td>
                                                                        <a data-id="<?php echo $t->id; ?>" class="btn btn-sm waves-effect waves-light btn-danger text-white transaction-delete" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                    -->
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
                                    </form>
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
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/toast-master/js/jquery.toast.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/select2/dist/js/select2.full.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.extend.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/reminder/plks.js", CClientScript::POS_END);