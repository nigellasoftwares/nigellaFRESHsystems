<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">User</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item active">User</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><span class="label label-primary"><?php echo $user->profile->company->name; ?></span></h4>
            <h4 class="card-title">User</h4>
            
            <div class="table-responsive m-t-40">
                <table id="table-application-admin" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="10%">Username</th>
                            <th>Full Name</th>
                            <th width="16%">Role</th>
                            <th width="10%">Status</th>
                            <th width="10%">Registered Date</th>
                            <th width="16%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 0;
                        foreach($system as $s){
                            $i++;
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $i; ?></td>
                            <td><?php echo $s->username; ?></td>
                            <td><?php echo strtoupper($s->profile->fullname); ?></td>
                            <td><?php echo strtoupper($s->role->name); ?></td>
                            <td><?php echo strtoupper($s->status->name); ?></td>
                            <td><?php echo date('d M Y', strtotime($s->created_at)); ?></td>
                            <td>
                                <a data-id="<?php echo $s->id; ?>" class="btn btn-sm waves-effect waves-light btn-success text-white" data-toggle="tooltip" data-placement="top" title="Edit" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                <a data-id="<?php echo $s->id; ?>" class="btn btn-sm waves-effect waves-light btn-info text-white" data-toggle="tooltip" data-placement="top" title="Change Password" data-original-title="Change Password"><i class="fa fa-cog"></i></a>
                                <a data-id="<?php echo $s->id; ?>" class="btn btn-sm waves-effect waves-light btn-danger text-white" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><i class="fa fa-trash"></i></a>
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
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/webmin/administrator.js", CClientScript::POS_END);