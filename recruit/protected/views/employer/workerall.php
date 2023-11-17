<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Foreign Worker Management</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item">Foreign Worker</li>
                    <li class="breadcrumb-item active">All Workers</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><span class="label label-primary"><?php echo $user->profile->company->name; ?></span></h4>
            <h4 class="card-title">Application for Foreign Worker</h4>
            
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
                            <th class="text-center">Action</th>
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
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-settings"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-item text-danger"><?php echo $a['company']; ?></div>
                                        <a class="dropdown-item" href="index.php?r=Employer/ViewAgent&id=<?php echo $a['id']; ?>">View</a>
                                        <a class="dropdown-item" href="index.php?r=Employer/LinkWorkerAll&id=<?php echo $a['id']; ?>">Foreign Worker</a>
                                    </div>
                                </div>
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