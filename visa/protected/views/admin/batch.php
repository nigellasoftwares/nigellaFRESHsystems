<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Application</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active">Application</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="pull-right">
                <a href="index.php?r=Admin/Application" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                    <i class="fa fa-arrow-circle-o-left"></i> View All Batches
                </a>
            </div>
            
            <h4 class="card-title">Application Batch <span class="label label-primary"><?php echo $batch->batch_guid; ?></span></h4>
            <h6 class="card-subtitle"><?php echo $batch->branch->user->profile->company->name; ?></h6>
            <h6 class="card-subtitle">Visa Application For Applicant</h6>
                        
            <form id="form-deliver-applicant">
                <input type="hidden" name="batch_id" value="<?php echo $batch->id; ?>" />
                <div class="table-responsive m-t-40">
                    <table id="table-application-applicant" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><input type="checkbox" name="osc[]" class="chk-osc chkbox" value="ALL"><br />OSC</th>
                                <th><input type="checkbox" name="brn[]" class="chk-brn chkbox" value="ALL"><br />BRN</th>
                                <th>Full Name</th>
                                <th>Passport/<br />Nationality</th>
                                <th>Reg'd Date/<br />Reg'd By</th>
                                <th>Status</th>
                                <th>Result</th>
                                <th width="5%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 0;
                            foreach($applicant as $a){
                                $i++;
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php
                                        if($a->result_id == 3){
                                    ?>
                                        <input type="checkbox" name="applicant[]" class="applicant-osc chkbox" value="<?php echo $a->id; ?>">
                                    <?php
                                        } else if($a->result_id == 2){
                                            echo '<span class="label label-danger">NOT VERIFIED FOR DELIVER</span>';
                                        } else if(in_array($a->result_id,range(5,14))){
                                            echo '<span class="label label-success">DELIVERED TO OSC</span>';
                                        }
                                    ?>
                                </td>
                                <td><?php
                                        if($a->result_id == 16){
                                    ?>
                                        <input type="checkbox" name="applicant2[]" class="applicant-brn chkbox" value="<?php echo $a->id; ?>">
                                    <?php
                                        } else if($a->result_id == 15){
                                            echo '<span class="label label-danger">NOT VERIFIED FOR RETURN</span>';
                                        } else if(in_array($a->result_id,range(17,18))){
                                            echo '<span class="label label-success">RETURNED TO BRANCH</span>';
                                        }
                                    ?>
                                </td>
                                <td><?php echo strtoupper($a->full_name); ?></td>
                                <td><?php echo strtoupper($a->passport_number); ?><br /><?php echo $a->currentNationality->country; ?></td>
                                <td><?php echo date('d M Y', strtotime($a->created_at)); ?><br /><?php echo $a->createdBy->profile->name; ?></td>
                                <td><?php echo $a->result->name; ?></td>
                                <td><?php echo $a->result2->name; ?></td>
                                <td>
                                    <a href="index.php?r=Admin/ApplicationApplicantView&id=<?php echo $a->id; ?>" class="btn btn-sm waves-effect waves-light btn-success text-white" data-toggle="tooltip" data-placement="top" title="View" data-original-title="View"><i class="fa fa-search"></i></a>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="m-t-30">
                    <a class="btn btn-warning" id="deliver-osc">
                        <i class="fa fa-building-o"></i> Deliver To OSC
                    </a> 
                    <a class="btn btn-success" id="return-brn">
                        <i class="fa fa-building-o"></i> Return To BRN
                    </a>
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
    Yii::app()->clientScript->registerScriptFile("vendor/visafasttrack/js/admin/applicationbatch.js", CClientScript::POS_END);