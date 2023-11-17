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
            <div class="pull-right">
                <a href="index.php?r=Branch/ApplicationApplicant&id=<?php echo $batch->id; ?>" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                    <i class="fa fa-plus-circle"></i> Register New Applicant
                </a>
            </div>
            
            <h4 class="card-title">Application Batch <span class="label label-primary"><?php echo $batch->batch_guid; ?></span></h4>
            <h6 class="card-subtitle">Visa Application For Applicant</h6>
            
            <form id="form-deliver-applicant">
                <input type="hidden" name="batch_id" value="<?php echo $batch->id; ?>" />
                <div class="table-responsive m-t-40">
                    <table id="table-application-applicant" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><input type="checkbox" name="adm[]" class="chk-adm chkbox" value="ALL"><br />ADM</th>
                                <th>Full Name</th>
                                <th>Passport/<br />Nationality</th>
                                <th>Reg'd Date/<br />Reg'd By</th>
                                <th>Status</th>
                                <th>Result</th>
                                <th width="19%">Action</th>
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
                                        if($a->result_id == 1){
                                    ?>
                                        <input type="checkbox" class="applicant-adm chkbox" name="applicant[]" value="<?php echo $a->id; ?>">
                                    <?php
                                        } else if(in_array($a->result_id,range(2,16))){
                                            echo '<span class="label label-success">DELIVERED TO ADMIN</span>';
                                        } else if($a->result_id == 17){
                                            echo '<span class="label label-danger">NOT VERIFIED FOR RETURN</span>';
                                        } else if($a->result_id == 18){
                                            echo '<span class="label label-success">VERIFIED FOR RETURN</span>';
                                        }
                                    ?>
                                </td>
                                <td><?php echo strtoupper($a->full_name); ?></td>
                                <td><?php echo strtoupper($a->passport_number); ?><br /><?php echo $a->currentNationality->country; ?></td>
                                <td><?php echo date('d M Y', strtotime($a->created_at)); ?><br /><?php echo $a->createdBy->profile->name; ?></td>
                                <td><?php echo $a->result->name; ?></td>
                                <td><?php echo $a->result2->name; ?></td>
                                <td>
                                    <a href="index.php?r=Branch/ApplicationApplicantView&id=<?php echo $a->id; ?>" class="btn btn-sm waves-effect waves-light btn-success text-white" data-toggle="tooltip" data-placement="top" title="View" data-original-title="View"><i class="fa fa-search"></i></a>
                                    <a href="index.php?r=Branch/ApplicationApplicant2&id=<?php echo $a->id; ?>" class="btn btn-sm waves-effect waves-light btn-info text-white" data-toggle="tooltip" data-placement="top" title="Edit" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="index.php?r=Branch/PrintSlip&id=<?php echo $a->id; ?>" target="_blank" class="btn btn-sm waves-effect waves-light btn-warning text-dark" data-toggle="tooltip" data-placement="top" title="Slip" data-original-title="Slip"><i class="fa fa-file-text-o"></i></a>
                                    <a data-id="<?php echo $b->id; ?>" class="btn btn-sm waves-effect waves-light btn-danger text-white visa-delete disabled" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="m-t-30">
                    <a class="btn btn-warning" id="deliver-admin">
                        <i class="fa fa-building-o"></i> Deliver To Admin
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
    Yii::app()->clientScript->registerScriptFile("vendor/visafasttrack/js/branch/applicationbatch.js", CClientScript::POS_END);