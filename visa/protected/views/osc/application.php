<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Application</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">One Stop Centre</li>
                    <li class="breadcrumb-item active">Application</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Application</h4>
            <h6 class="card-subtitle">Visa Application For Batch</h6>
            <div class="table-responsive m-t-40">
                <table id="table-application-batch" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Batch ID</th>
                            <th class="text-center">
                                <span class="label label-info">T</span>
                                <br /><i class="fa fa-id-badge fa-2x"></i>
                                <br /><i class="fa fa-database"></i>
                            </th>
                            <th class="text-center">
                                <span class="label label-primary">D</span>
                                <br /><i class="fa fa-id-badge fa-2x text-primary"></i>
                                <br /><i class="fa fa-times"></i>
                            </th>
                            <th class="text-center">
                                <span class="label label-primary">D</span>
                                <br /><i class="fa fa-id-badge fa-2x text-primary"></i>
                                <br /><i class="fa fa-check"></i>
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
                            <th>Branch</th>
                            <th>Admin</th>
                            <th>Registered Date</th>
                            <th>Registered By</th>
                            <th width="5%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 0;
                        foreach($batch as $b){
                            $bch = Applicant::model()->findAllByAttributes(array(
                                'batch_id' => $b->id
                            ));
                            
                            if(count($bch) == 0){
                                continue;
                            } else if(count($bch) > 0){
                                $i++;
                            }
                            
                            $bch_not_in = Applicant::model()->findAllByAttributes(array(
                                'batch_id' => $b->id,
                                'result_id' => 5
                            ));
                            
                            $bch_in = Applicant::model()->findAllByAttributes(array(
                                'batch_id' => $b->id,
                                'result_id' => range(6,18)
                            ));
                            
                            $bch_not_out = Applicant::model()->findAllByAttributes(array(
                                'batch_id' => $b->id,
                                'result_id' => 13
                            ));
                            
                            $bch_out = Applicant::model()->findAllByAttributes(array(
                                'batch_id' => $b->id,
                                'result_id' => range(14,18)
                            ));
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $b->batch_guid; ?></td>
                            <td class="text-center"><?php echo count($bch); ?></td>
                            <td class="text-center"><?php echo count($bch_not_in); ?></td>
                            <td class="text-center"><?php echo count($bch_in); ?></td>
                            <td class="text-center"><?php echo count($bch_not_out); ?></td>
                            <td class="text-center"><?php echo count($bch_out); ?></td>
                            <td><?php echo $b->branch->user->profile->company->name; ?></td>
                            <td><?php echo $b->admin->user->profile->company->name; ?></td>
                            <td><?php echo date('d M Y', strtotime($b->created_at)); ?></td>
                            <td><?php echo $b->createdBy->profile->name; ?></td>
                            <td>
                                <a href="index.php?r=Osc/ApplicationBatch&id=<?php echo $b->id; ?>" class="btn btn-sm waves-effect waves-light btn-info text-white" data-toggle="tooltip" data-placement="top" title="View" data-original-title="View"><i class="fa fa-search"></i></a>
                                <a href="index.php?r=Osc/ApplicationReport&id=<?php echo $b->id; ?>" class="btn btn-sm waves-effect waves-light btn-warning text-dark" data-toggle="tooltip" data-placement="top" title="Report" data-original-title="Report"><i class="fa fa-files-o"></i></a>
                            </td>
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

<?php
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/datatables/jquery.dataTables.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/toast-master/js/jquery.toast.js", CClientScript::POS_END);
    //Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.min.js", CClientScript::POS_END);
    //Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.extend.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/visafasttrack/js/osc/application.js", CClientScript::POS_END);