<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Application</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item active">Application</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="pull-right">
                <a href="index.php?r=Sourceagent/Register" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                    <i class="fa fa-plus-circle"></i> Register New Foreign Worker
                </a>
            </div>
            
            <h4 class="card-title"><span class="label label-primary"><?php echo $user->profile->company->name; ?></span></h4>
            <h4 class="card-title">Application for Foreign Worker</h4>
            
            <div class="table-responsive m-t-40">
                <table id="table-application-transaction" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Foreign<br />Worker ID</th>
                            <th>Full Name</th>
                            <th>Passport</th>
                            <th>Nationality</th>
                            <th>Registered Date</th>
                            <th width="19%">Action</th>
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
                            <td><?php echo $t->worker->nationality->country; ?></td>
                            <td><?php echo date('d M Y', strtotime($t->created_at)); ?></td>
                            <td>
                                <a href="index.php?r=Sourceagent/View&id=<?php echo $t->id; ?>" class="btn btn-sm waves-effect waves-light btn-success text-white" data-toggle="tooltip" data-placement="top" title="View" data-original-title="View"><i class="fa fa-search"></i></a>
                                <a href="index.php?r=Sourceagent/Edit&id=<?php echo $t->id; ?>" class="btn btn-sm waves-effect waves-light btn-info text-white" data-toggle="tooltip" data-placement="top" title="Edit" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="index.php?r=Sourceagent/PrintSlip&id=<?php echo $t->id; ?>" target="_blank" class="btn btn-sm waves-effect waves-light btn-warning text-dark" data-toggle="tooltip" data-placement="top" title="Slip" data-original-title="Slip"><i class="fa fa-file-text-o"></i></a>
                                <a data-id="<?php echo $t->id; ?>" class="btn btn-sm waves-effect waves-light btn-danger text-white transaction-delete" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><i class="fa fa-trash"></i></a>
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
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/sourceagent/application.js", CClientScript::POS_END);