<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Report</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Branch</li>
                    <li class="breadcrumb-item active">Report</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
        <?php if($report['type'] == 'on'){ ?>
            <h4 class="card-title">Registration Report From <span class="label label-primary"><?php echo $report['startdate']; ?></span> To <span class="label label-primary"><?php echo $report['enddate']; ?></span></h4>
        <?php } else { ?>
            <h4 class="card-title">Overall Registration Report</h4>
        <?php } ?>    
            <h6 class="card-subtitle"><?php echo $user->profile->company->name; ?></h6>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-2">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="box bg-info text-center">
                            <h1 class="font-light text-white"><?php echo number_format(count($report['batch'])); ?></h1>
                            <h6 class="text-white">Batch</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="box bg-info text-center">
                            <h1 class="font-light text-white"><?php echo number_format($report['application']); ?></h1>
                            <h6 class="text-white">Application</h6>
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
                            <div class="soc-header bg-danger"><i class="fa fa-users"></i> BRN</div>
                            <div class="soc-content">
                                <div class="col-6 edge-right edge-bottom">
                                    <i class="fa fa-check text-success"></i>
                                    <span class="label label-info">Return</span>
                                    <h3 class="font-medium"><?php echo number_format($report['track']['r']['brn']['in']); ?></h3>
                                </div>
                                <div class="col-6 edge-bottom">
                                    <i class="fa fa-check text-success"></i>
                                    <span class="label label-info">Verify</span>
                                    <h3 class="font-medium"><?php echo number_format($report['track']['r']['brn']['verify']); ?></h3>
                                </div>
                            </div>
                            <div class="soc-content">
                                <div class="col-6 edge-right">
                                    <i class="fa fa-times text-danger"></i>
                                    <span class="label label-info">Return</span>
                                    <h3 class="font-medium"><?php echo number_format($report['track']['r']['brn']['not_in']); ?></h3>
                                </div>
                                <div class="col-6">
                                    <i class="fa fa-times text-danger"></i>
                                    <span class="label label-info">Verify</span>
                                    <h3 class="font-medium"><?php echo number_format($report['track']['r']['brn']['not']); ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="box bg-dark text-center">
                            <h1 class="font-light text-white"><?php echo number_format($report['vtr']); ?></h1>
                            <h6 class="text-white">VTR</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="box bg-warning text-center">
                            <h1 class="font-light text-white"><?php echo number_format($report['vln']); ?></h1>
                            <h6 class="text-white">VLN Fee (BDT)</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="box bg-success text-center">
                            <h1 class="font-light text-white"><?php echo number_format($report['fee']); ?></h1>
                            <h6 class="text-white">Total Fee (BDT)</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="box bg-dark text-center">
                            <h1 class="font-light text-white"><?php echo number_format($report['vdr']); ?></h1>
                            <h6 class="text-white">VDR</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="box bg-warning text-center">
                            <h1 class="font-light text-white"><?php echo number_format($report['osc']); ?></h1>
                            <h6 class="text-white">OSC Fee (BDT)</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">&nbsp;</div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="d-flex flex-row">
                    <div class="p-20 bg-info">
                        <h3 class="text-white box m-b-0"><i class="fa fa-calendar"></i></h3>
                    </div>
                    <div class="align-self-center m-l-20">
                        <div class="row m-t-20">
                            <form id="form-report-visa" class="form-horizontal" action="index.php?r=Branch/Report" method="post">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Start Date</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="icon-calender"></i></span>
                                                        </div>
                                                        <input type="text" name="startdate" class="form-control vft-element datepicker-autoclose" placeholder="DD-MM-YYYY" data-required="true">
                                                    </div>
                                                    <small class="form-control-feedback text-info"><strong>Note:</strong> DD-MM-YYYY</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">End Date</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="icon-calender"></i></span>
                                                        </div>
                                                        <input type="text" name="enddate" class="form-control vft-element datepicker-autoclose" placeholder="DD-MM-YYYY" data-required="true">
                                                    </div>
                                                    <small class="form-control-feedback text-info"><strong>Note:</strong> DD-MM-YYYY</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <!--<a class="btn btn-success" id="submit-report">Submit</a>-->
                                            <input type="submit" class="btn btn-success" value="Submit">
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
    
    <div class="card">
        <div class="card-body">        
            <div class="table-responsive m-t-40">
                <table id="table-application-report" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Batch ID</th>
                            <th class="text-center">Reg's Date</th>
                            <th class="text-center">
                                <span class="label label-info">T</span>
                                <br /><i class="fa fa-id-badge fa-2x"></i>
                                <br /><i class="fa fa-database"></i>
                            </th>
                            <th class="text-center">
                                <span class="label label-success">R</span>
                                <br /><i class="fa fa-id-badge fa-2x text-success"></i>
                                <br /><i class="fa fa-times"></i>
                            </th>
                            <th class="text-center">
                                <span class="label label-success">R</span>
                                <br /><i class="fa fa-id-badge fa-2x text-success"></i>
                                <br /><i class="fa fa-check"></i>
                            </th>
                            <th class="text-center">VTR</th>
                            <th class="text-center">VDR</th>
                            <th class="text-center">VLN Fee<br />(BDT)</th>
                            <th class="text-center">OSC Fee<br />(BDT)</th>
                            <th class="text-center">Total Fee<br />(BDT)</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(count($report['batch']) > 0){
                            $i = 0;
                            foreach($report['batch'] as $b){
                                $i++;

                                $bch = Applicant::model()->findAllByAttributes(array(
                                    'batch_id' => $b->id 
                                ));

                                $bch_not_out = Applicant::model()->findAllByAttributes(array(
                                    'batch_id' => $b->id,
                                    'result_id' => 17
                                ));

                                $bch_out = Applicant::model()->findAllByAttributes(array(
                                    'batch_id' => $b->id,
                                    'result_id' => 18
                                ));
                                
                                $total_vln = 0;
                                $total_osc = 0;
                                $total_fee = 0;
                                $payment = Payment::model()->findAllByAttributes(array(
                                    'batch_id' => $b->id,
                                ));
                                foreach($payment as $p){
                                    $fee = $p->vln_fee + $p->osc_fee;
                                    $total_vln = $total_vln + $p->vln_fee;
                                    $total_osc = $total_osc + $p->osc_fee;
                                    $total_fee = $total_fee + $fee;
                                }
                                
                                $total_vdr = 0;
                                $total_vtr = 0;
                                foreach($bch as $c){
                                    if($c->visa_id == 1){
                                        $total_vdr = $total_vdr + 1;
                                    } else if($c->visa_id == 1){
                                        $total_vtr = $total_vtr + 1;
                                    }
                                }
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $b->batch_guid; ?></td>
                            <td><?php echo date('d M Y', strtotime($b->created_at)); ?></td>
                            <td class="text-center bg2-yellow"><?php echo number_format(count($bch)); ?></td>
                            <td class="text-center"><?php echo number_format(count($bch_not_out)); ?></td>
                            <td class="text-center"><?php echo number_format(count($bch_out)); ?></td>
                            <td class="text-center bg2-yellow"><?php echo number_format($total_vtr); ?></td>
                            <td class="text-center bg2-yellow"><?php echo number_format($total_vdr); ?></td>
                            <td class="text-right"><?php echo number_format($total_vln); ?></td>
                            <td class="text-right"><?php echo number_format($total_osc); ?></td>
                            <td class="text-right bg2-yellow"><?php echo number_format($total_fee); ?></td>
                        </tr>
                    <?php
                            }
                        } else {    
                    ?>
                        <tr>
                            <td colspan="11" class="text-center">NO RECORD FOUND</td>
                        </tr>
                    <?php } ?>    
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>

<?php
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/datatables/jquery.dataTables.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/toast-master/js/jquery.toast.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.extend.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/visafasttrack/js/branch/report2.js", CClientScript::POS_END);