<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Foreign Worker</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item active">Foreign Worker</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><span class="label label-primary"><?php echo $user->profile->company->name; ?></span></h4>
            <h4 class="card-title">Application for Foreign Worker</h4>
            
            <div class="table-responsive m-t-40">
                <table id="table-application-transaction" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="10%">Foreign<br />Worker ID</th>
                            <th>Full Name</th>
                            <th width="10%">Passport</th>
                            <th width="10%">Medical</th>
                            <th width="10%">VDR</th>
                            <th width="10%">Registered Date</th>
                            <th width="5%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 0;
                        foreach($transaction as $t){
                            $i++;
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $i; ?></td>
                            <td><?php echo $t->worker->code; ?></td>
                            <td><?php echo strtoupper($t->worker->full_name); ?></td>
                            <td><?php echo strtoupper($t->passport->number); ?></td>
                            <td class="text-center">
                                <?php echo $t->medical == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $t->visa == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                            </td>
                            <td><?php echo date('d M Y', strtotime($t->created_at)); ?></td>
                            <td>
                                <a href="index.php?r=Webmin/View&id=<?php echo $t->id; ?>" class="btn btn-sm waves-effect waves-light btn-success text-white" data-toggle="tooltip" data-placement="top" title="View" data-original-title="View"><i class="fa fa-search"></i></a>
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
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/admin/worker.js", CClientScript::POS_END);