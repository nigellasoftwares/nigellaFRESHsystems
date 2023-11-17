<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Application</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Branch</li>
                    <li class="breadcrumb-item active">Application</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="pull-right">
                <a href="index.php?r=Branch/Application" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                    <i class="fa fa-arrow-circle-o-left"></i> View All Batches
                </a>
            </div>
            
            <h4 class="card-title">Application Report <span class="label label-primary"><?php echo $batch->batch_guid; ?></span></h4>
            <h6 class="card-subtitle">Visa Application For Applicant</h6>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="social-widget">
                            <div class="soc-header bg-danger"><i class="fa fa-users"></i> BRN</div>
                            <?php
                                $dash_d_brn_process = array_sum($statustrack['deliver']['brn']['process']);
                                $dash_r_brn_out = array_sum($statustrack['return']['brn']['out']);
                                $dash_r_brn_verify = array_sum($statustrack['return']['brn']['verify']);
                                
                                $dash_r_brn_out_not = $dash_d_brn_process - $dash_r_brn_out;
                                $dash_r_brn_verify_not = $dash_r_brn_out - $dash_r_brn_verify;
                            ?>
                            <div class="soc-content">
                                <div class="col-4 b-r edge-right <?php echo $labelstatus['d_brn_process']; ?>">
                                    <a class="dashlink" href="index.php?r=Branch/ApplicationReport&id=<?php echo $batch->id; ?>">
                                        <h6 class="text-muted">Process</h6>
                                        <i class="fa fa-database"></i>
                                        <h3 class="font-medium"><?php echo $dash_d_brn_process; ?></h3>
                                    </a>    
                                </div>
                                <div class="col-4 edge-bottom <?php echo $labelstatus['r_brn_out']; ?>">
                                    <a class="dashlink" href="index.php?r=Branch/ApplicationReport&id=<?php echo $batch->id; ?>&rid=17">
                                        <h6 class="text-muted">Return</h6>
                                        <i class="fa fa-check text-success"></i>
                                        <h3 class="font-medium"><?php echo $dash_r_brn_out; ?></h3>
                                    </a>
                                </div>
                                <div class="col-4 edge-bottom <?php echo $labelstatus['r_brn_verify']; ?>">
                                    <a class="dashlink" href="index.php?r=Branch/ApplicationReport&id=<?php echo $batch->id; ?>&rid=18">
                                        <h6 class="text-muted">Verify</h6>
                                        <i class="fa fa-check text-success"></i>
                                        <h3 class="font-medium"><?php echo $dash_r_brn_verify; ?></h3>
                                    </a>
                                </div>
                            </div>
                            <div class="soc-content">
                                <div class="col-4 b-r edge-right <?php echo $labelstatus['d_brn_process']; ?>">
                                    <a href="index.php?r=Branch/ApplicationReport&id=<?php echo $batch->id; ?>">&nbsp;</a>
                                </div>
                                <div class="col-4 <?php echo $labelstatus['r_brn_out_not']; ?>">
                                    <a class="dashlink" href="index.php?r=Branch/ApplicationReport&id=<?php echo $batch->id; ?>&rid=17&tid=1">
                                        <i class="fa fa-times text-danger"></i>
                                        <h3 class="font-medium"><?php echo $dash_r_brn_out_not; ?></h3>
                                    </a>
                                </div>
                                <div class="col-4 <?php echo $labelstatus['r_brn_verify_not']; ?>">
                                    <a class="dashlink" href="index.php?r=Branch/ApplicationReport&id=<?php echo $batch->id; ?>&rid=18&tid=1">
                                        <i class="fa fa-times text-danger"></i>
                                        <h3 class="font-medium"><?php echo $dash_r_brn_verify_not; ?></h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="social-widget">
                            <div class="soc-header bg-warning"><i class="fa fa-user"></i> ADM</div>
                            <?php
                                $dash_d_adm_in = array_sum($statustrack['deliver']['adm']['in']);
                                $dash_d_adm_verify = array_sum($statustrack['deliver']['adm']['verify']);
                                $dash_r_adm_out = array_sum($statustrack['return']['adm']['out']);
                                $dash_r_adm_verify = array_sum($statustrack['return']['adm']['verify']);
                                
                                $dash_d_adm_in_not = $dash_d_brn_process - $dash_d_adm_in;
                                $dash_d_adm_verify_not = $dash_d_adm_in - $dash_d_adm_verify;
                                $dash_r_adm_out_not = $dash_d_brn_process - $dash_r_adm_out;
                                $dash_r_adm_verify_not = $dash_r_adm_out - $dash_r_adm_verify;
                            ?>
                            <div class="soc-content">
                                <div class="col-3 b-r edge-bottom <?php echo $labelstatus['d_adm_in']; ?>">
                                    <a class="dashlink" href="index.php?r=Branch/ApplicationReport&id=<?php echo $batch->id; ?>&rid=2">
                                        <h6 class="text-muted">Deliver</h6>
                                        <i class="fa fa-check text-success"></i>
                                        <h3 class="font-medium"><?php echo $dash_d_adm_in; ?></h3>
                                    </a>
                                </div>
                                <div class="col-3 edge-right edge-bottom <?php echo $labelstatus['d_adm_verify']; ?>">
                                    <a class="dashlink" href="index.php?r=Branch/ApplicationReport&id=<?php echo $batch->id; ?>&rid=3">
                                        <h6 class="text-muted">Verify</h6>
                                        <i class="fa fa-check text-success"></i>
                                        <h3 class="font-medium"><?php echo $dash_d_adm_verify; ?></h3>
                                    </a>
                                </div>
                                <div class="col-3 edge-bottom <?php echo $labelstatus['r_adm_out']; ?>">
                                    <a class="dashlink" href="index.php?r=Branch/ApplicationReport&id=<?php echo $batch->id; ?>&rid=15">
                                        <h6 class="text-muted">Return</h6>
                                        <i class="fa fa-check text-success"></i>
                                        <h3 class="font-medium"><?php echo $dash_r_adm_out; ?></h3>
                                    </a>
                                </div>
                                <div class="col-3 edge-bottom <?php echo $labelstatus['r_adm_verify']; ?>">
                                    <a class="dashlink" href="index.php?r=Branch/ApplicationReport&id=<?php echo $batch->id; ?>&rid=16">
                                        <h6 class="text-muted">Verify</h6>
                                        <i class="fa fa-check text-success"></i>
                                        <h3 class="font-medium"><?php echo $dash_r_adm_verify; ?></h3>
                                    </a>
                                </div>
                            </div>
                            <div class="soc-content">
                                <div class="col-3 b-r <?php echo $labelstatus['d_adm_in_not']; ?>">
                                    <a class="dashlink" href="index.php?r=Branch/ApplicationReport&id=<?php echo $batch->id; ?>&rid=2&tid=1">
                                        <i class="fa fa-times text-danger"></i>
                                        <h3 class="font-medium"><?php echo $dash_d_adm_in_not; ?></h3>
                                    </a>
                                </div>
                                <div class="col-3 edge-right <?php echo $labelstatus['d_adm_verify_not']; ?>">
                                    <a class="dashlink" href="index.php?r=Branch/ApplicationReport&id=<?php echo $batch->id; ?>&rid=3&tid=1">
                                        <i class="fa fa-times text-danger"></i>
                                        <h3 class="font-medium"><?php echo $dash_d_adm_verify_not; ?></h3>
                                    </a>
                                </div>
                                <div class="col-3 <?php echo $labelstatus['r_adm_out_not']; ?>">
                                    <a class="dashlink" href="index.php?r=Branch/ApplicationReport&id=<?php echo $batch->id; ?>&rid=15&tid=1">
                                        <i class="fa fa-times text-danger"></i>
                                        <h3 class="font-medium"><?php echo $dash_r_adm_out_not; ?></h3>
                                    </a>
                                </div>
                                <div class="col-3 <?php echo $labelstatus['r_adm_verify_not']; ?>">
                                    <a class="dashlink" href="index.php?r=Branch/ApplicationReport&id=<?php echo $batch->id; ?>&rid=16&tid=1">
                                        <i class="fa fa-times text-danger"></i>
                                        <h3 class="font-medium"><?php echo $dash_r_adm_verify_not; ?></h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="social-widget">
                            <div class="soc-header bg-success"><i class="fa fa-building-o"></i> OSC</div>
                            <?php
                                $dash_d_osc_in = array_sum($statustrack['deliver']['osc']['in']);
                                $dash_d_osc_verify = array_sum($statustrack['deliver']['osc']['verify']);
                                $dash_r_osc_out = array_sum($statustrack['return']['osc']['out']);
                                $dash_r_osc_verify = array_sum($statustrack['return']['osc']['verify']);
                                
                                $dash_d_osc_in_not = $dash_d_brn_process - $dash_d_osc_in;
                                $dash_d_osc_verify_not = $dash_d_osc_in - $dash_d_osc_verify;
                                $dash_r_osc_out_not = $dash_d_brn_process - $dash_r_osc_out;
                                $dash_r_osc_verify_not = $dash_r_osc_out - $dash_r_osc_verify;
                            ?>
                            <div class="soc-content">
                                <div class="col-3 b-r edge-bottom <?php echo $labelstatus['d_osc_in']; ?>">
                                    <a class="dashlink" href="index.php?r=Branch/ApplicationReport&id=<?php echo $batch->id; ?>&rid=5">
                                        <h6 class="text-muted">Deliver</h6>
                                        <i class="fa fa-check text-success"></i>
                                        <h3 class="font-medium"><?php echo $dash_d_osc_in; ?></h3>
                                    </a>
                                </div>
                                <div class="col-3 edge-right edge-bottom <?php echo $labelstatus['d_osc_verify']; ?>">
                                    <a class="dashlink" href="index.php?r=Branch/ApplicationReport&id=<?php echo $batch->id; ?>&rid=6">
                                        <h6 class="text-muted">Verify</h6>
                                        <i class="fa fa-check text-success"></i>
                                        <h3 class="font-medium"><?php echo $dash_d_osc_verify; ?></h3>
                                    </a>
                                </div>
                                <div class="col-3 edge-bottom <?php echo $labelstatus['r_osc_out']; ?>">
                                    <a class="dashlink" href="index.php?r=Branch/ApplicationReport&id=<?php echo $batch->id; ?>&rid=13">
                                        <h6 class="text-muted">Return</h6>
                                        <i class="fa fa-check text-success"></i>
                                        <h3 class="font-medium"><?php echo $dash_r_osc_out; ?></h3>
                                    </a>
                                </div>
                                <div class="col-3 edge-bottom <?php echo $labelstatus['r_osc_verify']; ?>">
                                    <a class="dashlink" href="index.php?r=Branch/ApplicationReport&id=<?php echo $batch->id; ?>&rid=14">
                                        <h6 class="text-muted">Verify</h6>
                                        <i class="fa fa-check text-success"></i>
                                        <h3 class="font-medium"><?php echo $dash_r_osc_verify; ?></h3>
                                    </a>
                                </div>
                            </div>
                            <div class="soc-content">
                                <div class="col-3 b-r <?php echo $labelstatus['d_osc_in_not']; ?>">
                                    <a class="dashlink" href="index.php?r=Branch/ApplicationReport&id=<?php echo $batch->id; ?>&rid=5&tid=1">
                                        <i class="fa fa-times text-danger"></i>
                                        <h3 class="font-medium"><?php echo $dash_d_osc_in_not; ?></h3>
                                    </a>
                                </div>
                                <div class="col-3 edge-right <?php echo $labelstatus['d_osc_verify_not']; ?>">
                                    <a class="dashlink" href="index.php?r=Branch/ApplicationReport&id=<?php echo $batch->id; ?>&rid=6&tid=1">
                                        <i class="fa fa-times text-danger"></i>
                                        <h3 class="font-medium"><?php echo $dash_d_osc_verify_not; ?></h3>
                                    </a>
                                </div>
                                <div class="col-3 <?php echo $labelstatus['r_osc_out_not']; ?>">
                                    <a class="dashlink" href="index.php?r=Branch/ApplicationReport&id=<?php echo $batch->id; ?>&rid=13&tid=1">
                                        <i class="fa fa-times text-danger"></i>
                                        <h3 class="font-medium"><?php echo $dash_r_osc_out_not; ?></h3>
                                    </a>
                                </div>
                                <div class="col-3 <?php echo $labelstatus['r_osc_verify_not']; ?>">
                                    <a class="dashlink" href="index.php?r=Branch/ApplicationReport&id=<?php echo $batch->id; ?>&rid=14&tid=1">
                                        <i class="fa fa-times text-danger"></i>
                                        <h3 class="font-medium"><?php echo $dash_r_osc_verify_not; ?></h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="social-widget">
                            <div class="soc-header bg-info"><i class="fa fa-building"></i> HC</div>
                            <?php
                                $dash_d_hc_in = array_sum($statustrack['deliver']['hc']['in']);
                                $dash_d_hc_verify = array_sum($statustrack['deliver']['hc']['verify']);
                                $dash_d_hc_in_not = $dash_d_brn_process - $dash_d_hc_in;
                                $dash_d_hc_verify_not = $dash_d_hc_in - $dash_d_hc_verify;
                            ?>
                            <div class="soc-content">
                                <div class="col-6 b-r edge-right edge-bottom <?php echo $labelstatus['d_hc_in']; ?>">
                                    <a class="dashlink" href="index.php?r=Branch/ApplicationReport&id=<?php echo $batch->id; ?>&rid=8">
                                        <h6 class="text-muted">Deliver</h6>
                                        <i class="fa fa-check text-success"></i>
                                        <h3 class="font-medium"><?php echo $dash_d_hc_in; ?></h3>
                                    </a>
                                </div>
                                <div class="col-6 edge-bottom <?php echo $labelstatus['d_hc_verify']; ?>">
                                    <a class="dashlink" href="index.php?r=Branch/ApplicationReport&id=<?php echo $batch->id; ?>&rid=9">
                                        <h6 class="text-muted">Verify</h6>
                                        <i class="fa fa-check text-success"></i>
                                        <h3 class="font-medium"><?php echo $dash_d_hc_verify; ?></h3>
                                    </a>
                                </div>
                            </div>
                            <div class="soc-content">
                                <div class="col-6 b-r edge-right edge-bottom <?php echo $labelstatus['d_hc_in_not']; ?>">
                                    <a class="dashlink" href="index.php?r=Branch/ApplicationReport&id=<?php echo $batch->id; ?>&rid=8&tid=1">
                                        <i class="fa fa-times text-danger"></i>
                                        <h3 class="font-medium"><?php echo $dash_d_hc_in_not; ?></h3>
                                    </a>
                                </div>
                                <div class="col-6 edge-bottom <?php echo $labelstatus['d_hc_verify_not']; ?>">
                                    <a class="dashlink" href="index.php?r=Branch/ApplicationReport&id=<?php echo $batch->id; ?>&rid=9&tid=1">
                                        <i class="fa fa-times text-danger"></i>
                                        <h3 class="font-medium"><?php echo $dash_d_hc_verify_not; ?></h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">        
            <div class="table-responsive m-t-40">
                <table id="table-application-report" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th rowspan="3">#</th>
                            <th rowspan="3">Passport</th>
                            <th rowspan="3">Action</th>
                            <th colspan="5" class="text-center">
                                <span class="label label-danger">DELIVER</span>
                            </th>
                            <th rowspan="2" colspan="2" class="text-center">
                                <span class="label label-warning text-dark">HIGHCOMM</span>
                            </th>
                            <th colspan="6" class="text-center">
                                <span class="label label-success">RETURN</span>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-center">
                                <span class="label label-info">B</span>
                            </th>
                            <th colspan="2" class="text-center">
                                <span class="label label-info">ADMIN</span>
                            </th>
                            <th colspan="2" class="text-center">
                                <span class="label label-info">OSC</span>
                            </th>
                            <th colspan="2" class="text-center">
                                <span class="label label-info">OSC</span>
                            </th>
                            <th colspan="2" class="text-center">
                                <span class="label label-info">ADMIN</span>
                            </th>
                            <th colspan="2" class="text-center">
                                <span class="label label-info">BRANCH</span>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-center" data-toggle="tooltip" data-placement="top" title="Process">
                                <i class="fa fa-desktop"></i>
                            </th>
                            <th class="text-center" data-toggle="tooltip" data-placement="top" title="Delivered To Admin">
                                <i class="fa fa-sign-in"></i>
                            </th>
                            <th class="text-center" data-toggle="tooltip" data-placement="top" title="Verified By Admin">
                                <i class="fa fa-check"></i>
                            </th>
                            <th class="text-center" data-toggle="tooltip" data-placement="top" title="Delivered To OSC">
                                <i class="fa fa-sign-in"></i>
                            </th>
                            <th class="text-center" data-toggle="tooltip" data-placement="top" title="Verified By Admin">
                                <i class="fa fa-check"></i>
                            </th>
                            <th class="text-center" data-toggle="tooltip" data-placement="top" title="Delivered To High Commission">
                                <i class="fa fa-sign-in"></i>
                            </th>
                            <th class="text-center" data-toggle="tooltip" data-placement="top" title="Verified By High Commission">
                                <i class="fa fa-check"></i>
                            </th>
                            <th class="text-center" data-toggle="tooltip" data-placement="top" title="Returned To OSC">
                                <i class="fa fa-sign-out"></i>
                            </th>
                            <th class="text-center" data-toggle="tooltip" data-placement="top" title="Verified By OSC">
                                <i class="fa fa-check"></i>
                            </th>
                            <th class="text-center" data-toggle="tooltip" data-placement="top" title="Returned To Admin">
                                <i class="fa fa-sign-out"></i>
                            </th>
                            <th class="text-center" data-toggle="tooltip" data-placement="top" title="Verified By Admin">
                                <i class="fa fa-check"></i>
                            </th>
                            <th class="text-center" data-toggle="tooltip" data-placement="top" title="Returned To Branch">
                                <i class="fa fa-sign-out"></i>
                            </th>
                            <th class="text-center" data-toggle="tooltip" data-placement="top" title="Verified By Branch">
                                <i class="fa fa-check"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 0;
                        foreach($applicant as $a){
                            $i++;
                            $bg_hc = $i % 2 ? 'bg1-yellow' : 'bg2-yellow';
                            $bg_brn = $i % 2 ? 'bg1-blue' : 'bg2-blue';

                            $passportscan = Passportscan::model()->findAllByAttributes(array(
                                'applicant_id' => $a->id
                            ), array('order' => 'id ASC'));

                            $statusscan = array(
                                'd_brn_process' => Helpers::d_icon(),
                                'd_adm_in' => Helpers::d_icon(),
                                'd_adm_verify' => Helpers::d_icon(),
                                'd_osc_in' => Helpers::d_icon(),
                                'd_osc_verify' => Helpers::d_icon(),
                                'd_hc_in' => Helpers::d_icon(),
                                'd_hc_verify' => Helpers::d_icon(),
                                'r_osc_out' => Helpers::d_icon(),
                                'r_osc_verify' => Helpers::d_icon(),
                                'r_adm_out' => Helpers::d_icon(),
                                'r_adm_verify' => Helpers::d_icon(),
                                'r_brn_out' => Helpers::d_icon(),
                                'r_brn_verify' => Helpers::d_icon()
                            );

                            foreach($passportscan as $pr){
                                if($pr->status_id == 1){
                                    $statusscan['d_brn_process'] = Helpers::s_icon($pr->scanned_date);
                                }
                                if($pr->status_id == 2){
                                    $statusscan['d_adm_in'] = Helpers::s_icon($pr->scanned_date);
                                }
                                if($pr->status_id == 3){
                                    $statusscan['d_adm_verify'] = Helpers::s_icon($pr->scanned_date);
                                }
                                if($pr->status_id == 5){
                                    $statusscan['d_osc_in'] = Helpers::s_icon($pr->scanned_date);
                                }
                                if($pr->status_id == 6){
                                    $statusscan['d_osc_verify'] = Helpers::s_icon($pr->scanned_date);
                                }
                                if($pr->status_id == 8){
                                    $statusscan['d_hc_in'] = Helpers::s_icon($pr->scanned_date);
                                }
                                if(in_array($pr->status_id,range(9,12))){
                                    $statusscan['d_hc_verify'] = Helpers::s_icon($pr->scanned_date);
                                }
                                if($pr->status_id == 13){
                                    $statusscan['r_osc_out'] = Helpers::s_icon($pr->scanned_date);
                                }
                                if($pr->status_id == 14){
                                    $statusscan['r_osc_verify'] = Helpers::s_icon($pr->scanned_date);
                                }
                                if($pr->status_id == 15){
                                    $statusscan['r_adm_out'] = Helpers::s_icon($pr->scanned_date);
                                }
                                if($pr->status_id == 16){
                                    $statusscan['r_adm_verify'] = Helpers::s_icon($pr->scanned_date);
                                }
                                if($pr->status_id == 17){
                                    $statusscan['r_brn_out'] = Helpers::s_icon($pr->scanned_date);
                                }
                                if($pr->status_id == 18){
                                    $statusscan['r_brn_verify'] = Helpers::s_icon($pr->scanned_date);
                                }
                            }
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo strtoupper($a->passport_number); ?></td>
                            <td>
                                <a data-id="<?php echo $a->id; ?>" class="btn btn-sm waves-effect waves-light btn-success text-white visa-view" data-toggle="tooltip" data-placement="top" title="View" data-original-title="View"><i class="fa fa-search"></i></a>
                            </td>
                            <td class="text-center <?php echo $bg_brn; ?>"><?php echo $statusscan['d_brn_process']; ?></td>
                            <td class="text-center"><?php echo $statusscan['d_adm_in']; ?></td>
                            <td class="text-center"><?php echo $statusscan['d_adm_verify']; ?></td>
                            <td class="text-center"><?php echo $statusscan['d_osc_in']; ?></td>
                            <td class="text-center"><?php echo $statusscan['d_osc_verify']; ?></td>
                            <td class="text-center <?php echo $bg_hc; ?>"><?php echo $statusscan['d_hc_in']; ?></td>
                            <td class="text-center <?php echo $bg_hc; ?>"><?php echo $statusscan['d_hc_verify']; ?></td>
                            <td class="text-center"><?php echo $statusscan['r_osc_out']; ?></td>
                            <td class="text-center"><?php echo $statusscan['r_osc_verify']; ?></td>
                            <td class="text-center"><?php echo $statusscan['r_adm_out']; ?></td>
                            <td class="text-center"><?php echo $statusscan['r_adm_verify']; ?></td>
                            <td class="text-center <?php echo $bg_brn; ?>"><?php echo $statusscan['r_brn_out']; ?></td>
                            <td class="text-center <?php echo $bg_brn; ?>"><?php echo $statusscan['r_brn_verify']; ?></td>
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

<div class="modal fade" id="modal-view-visa">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Visa Application</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="form-view-visa">
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="pull-right">
                            <span class="photo">&nbsp;</span>
                        </div>
                        <h4 class="card-title font-bold fullname">&nbsp;</h4>
                        <h6 class="card-subtitle guid">&nbsp;</h6>
                        <h6 class="card-subtitle m-t-10 m-b-20">
                            <span class="label label-info nationality">&nbsp;</span> 
                            <span class="label label-info passport">&nbsp;</span>
                        </h6>
                    </div>
                    <div class="col-md-12 m-t-30">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                                    <span class="hidden-sm-up"><i class="ti-home"></i></span> 
                                    <span class="hidden-xs-down">Personal</span>
                                </a> 
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                                    <span class="hidden-sm-up"><i class="ti-user"></i></span> 
                                    <span class="hidden-xs-down">Other</span>
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tabcontent-border">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <div class="p-20">
                                    <div class="row">
                                        <h3 class="m-b-20">Personal Information</h3>

                                        <div class="form-actions">
                                            <div class="row row-line">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>First Name</strong></label>
                                                        <input type="text" name="firstname" class="form-control vft-element-readonly firstname" placeholder="First Name" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Middle Name</strong></label>
                                                        <input type="text" name="middlename" class="form-control vft-element-readonly middlename" placeholder="Middle Name" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Last Name</strong></label>
                                                        <input type="text" name="lastname" class="form-control vft-element-readonly lastname" placeholder="Last Name" readonly="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Gender</strong></label>
                                                        <input type="text" name="gender" class="form-control vft-element-readonly gender" placeholder="Gender" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Date Of Birth</strong></label>
                                                        <div class="input-group">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="icon-calender"></i></span>
                                                            </div>
                                                            <input type="text" name="dateofbirth" class="form-control vft-element-readonly dateofbirth" placeholder="DD-MM-YYYY" readonly="true">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Place Of Birth</strong></label>
                                                        <textarea name="placeofbirth" class="form-control vft-element-readonly placeofbirth" placeholder="Place Of Birth" readonly="true"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Current Nationality</strong></label>
                                                        <input type="text" name="current_nationality" class="form-control vft-element-readonly current-nationality" placeholder="Current Nationality" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Citizen Number</strong></label>
                                                        <input type="text" name="citizen_number" class="form-control vft-element-readonly citizen-number" placeholder="Citizen Number" readonly="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">    
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Former Nationality</strong></label>
                                                        <input type="text" name="former_nationality" class="form-control vft-element-readonly former-nationality" placeholder="Former Nationality" readonly="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Passport Type</strong></label>
                                                        <input type="text" name="passport_type" class="form-control vft-element-readonly passport-type" placeholder="Passport Type" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Passport Type (Other)</strong></label>
                                                        <input type="text" name="passport_other" class="form-control vft-element-readonly passport-other" placeholder="Other" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Passport Number</strong></label>
                                                        <input type="text" name="passport_number" class="form-control vft-element-readonly passport-number" placeholder="Passport Number" readonly="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Date Of Issue</strong></label>
                                                        <div class="input-group">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="icon-calender"></i></span>
                                                            </div>
                                                            <input type="text" name="passport_dateofissue" class="form-control vft-element-readonly passport-dateofissue" placeholder="DD-MM-YYYY" readonly="true">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Place Of Issue</strong></label>
                                                        <textarea name="passport_placeofissue" class="form-control vft-element-readonly passport-placeofissue" placeholder="Place Of Issue" rows="1" readonly="true"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Date Of Expiry</strong></label>
                                                        <div class="input-group">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="icon-calender"></i></span>
                                                            </div>
                                                            <input type="text" name="passport_dateofexpiry" class="form-control vft-element-readonly passport-dateofexpiry" placeholder="DD-MM-YYYY" readonly="true">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile" role="tabpanel">
                                <div class="p-20">
                                    <div class="row">
                                        <h3 class="m-b-20">Other Information</h3>

                                        <div class="form-action">
                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Education</strong></label>
                                                        <input type="text" name="education" class="form-control vft-element-readonly education" placeholder="Education" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Education (Other)</strong></label>
                                                        <input type="text" name="education_other" class="form-control vft-element-readonly education-other" placeholder="Other" readonly="true" value="<?php echo empty($applicant->education_other) ? NULL : strtoupper($applicant->education_other); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Email Address</strong></label>
                                                        <input type="text" name="email" class="form-control vft-element-readonly email" placeholder="Email Address" readonly="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Employer/School Name</strong></label>
                                                        <textarea name="employer_name" class="form-control vft-element-readonly employer-name" placeholder="Employer/School Name" rows="2" readonly="true"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Address</strong></label>
                                                        <textarea name="employer_address" class="form-control vft-element-readonly employer-address" placeholder="Address" rows="2" readonly="true"></textarea>
                                                    </div>
                                                </div>
                                            </div>    
                                            <div class="row row-line">    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Zip Code</strong></label>
                                                        <input type="text" name="employer_zipcode" class="form-control vft-element-readonly employer-zipcode" placeholder="Zip Code" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Phone Number</strong></label>
                                                        <input type="text" name="employer_phone" class="form-control vft-element-readonly employer-phone" placeholder="Phone Number" readonly="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Home Address</strong></label>
                                                        <textarea name="home_address" class="form-control vft-element-readonly home-address" placeholder="Address" rows="2" readonly="true"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Zip Code</strong></label>
                                                        <input type="text" name="home_zipcode" class="form-control vft-element-readonly home-zipcode" placeholder="Zip Code" readonly="true">
                                                    </div>
                                                </div>
                                            </div>    
                                            <div class="row row-line">    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Phone Number</strong></label>
                                                        <input type="text" name="home_phone" class="form-control vft-element-readonly home-phone" placeholder="Phone Number" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Mobile Number</strong></label>
                                                        <input type="text" name="home_mobile" class="form-control vft-element-readonly home-mobile" placeholder="Mobile Number" readonly="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row row-line">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Marital Status</strong></label>
                                                        <input type="text" name="marital_status" class="form-control vft-element-readonly marital-status" placeholder="Marital Status" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Marital Status (Other)</strong></label>
                                                        <input type="text" name="marital_other" class="form-control vft-element-readonly marital-other" placeholder="Other" readonly="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><strong>Location When Applying For This Visa</strong></label>
                                                        <input type="text" name="location_visa_apply" class="form-control vft-element-readonly location-visa-apply" placeholder="Other" readonly="true">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                </div>  
            </form>
        </div>
    </div>    
</div>

<?php
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/datatables/jquery.dataTables.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/toast-master/js/jquery.toast.js", CClientScript::POS_END);
    //Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.min.js", CClientScript::POS_END);
    //Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.extend.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/visafasttrack/js/branch/applicationreport.js", CClientScript::POS_END);