<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Employer</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item active">Employer</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="pull-right">
                <a href="index.php?r=Admin/RegisterEmployer" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                    <i class="fa fa-plus-circle"></i> Register New Employer
                </a>
            </div>
            
            <h4 class="card-title"><span class="label label-primary"><?php echo $user->profile->company->name; ?></span></h4>
            <h4 class="card-title">Employer List</h4>
            
            <div class="table-responsive m-t-40">
                <table id="table-application-employer" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Employer ID</th>
                            <th>Employer Name</th>
                            <th>District</th>
                            <th width="16%">Foreign Worker</th>
                            <th width="16%">Required</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 0;
                        foreach($employer as $e){
                            $i++;
                            
                            $worker = array();
                            $transaction = Transaction::model()->findAllByAttributes(array(
                                'employer_id' => $e->id
                            ));
                            
                            foreach($transaction as $t){
                                $worker['total'][] = 1;
                                
                                if($t->worker->gender->name == 'MALE'){
                                    $worker['male'][] = 1;
                                } else if($t->worker->gender->name == 'FEMALE'){
                                    $worker['female'][] = 1;
                                }
                            }
                            
                            if(empty($e->company->register_number)){
                                $regnum = NULL;
                            } else {
                                $regnum = '<br />
                                           <span class="badge badge-info">'.strtoupper($e->company->register_number).'</span>';
                            }
                            
                            $statfw = Helpers::statTotalForeignWorker($e->id);
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $i; ?></td>
                            <td><?php echo $e->code; ?></td>
                            <td>
                                <?php echo strtoupper($e->company->name); ?>
                                <?php echo $regnum; ?>
                            </td>
                            <td>
                                <?php echo strtoupper($e->company->district); ?>
                                <br />
                                <span class="badge badge-info"><?php echo $e->company->state->name; ?></span>
                            </td>
                            <td>
                                <div class="regworker">
                                    <label>Male</label>
                                    <span class="regw"><?php echo count($worker['male']); ?></span>
                                </div>
                                <div class="regworker">
                                    <label>Female</label>
                                    <span class="regw"><?php echo count($worker['female']); ?></span>
                                </div>
                                <div class="regworker">
                                    <label>Total</label>
                                    <span class="regw"><?php echo count($worker['total']); ?></span>
                                </div>
                            </td>
                            <td>
                                <div class="regworker">
                                    <label>D. Letter</label>
                                    <span class="regw"><?php echo $statfw['demand']; ?></span>
                                </div>
                                <div class="regworker">
                                    <label>Required</label>
                                    <span class="regw"><?php echo $statfw['required']; ?></span>
                                </div>
                                <div class="regworker">
                                    <label>Allocated</label>
                                    <span class="regw"><?php echo $statfw['allocated']; ?></span>
                                </div>
                                <div class="regworker">
                                    <label>Balance</label>
                                    <span class="regw"><?php echo $statfw['balance']; ?></span>
                                </div>
                            </td>
                            <td>
                                <a href="index.php?r=Admin/ViewEmployer&id=<?php echo $e->id; ?>" class="btn btn-sm waves-effect waves-light btn-success text-white" data-toggle="tooltip" data-placement="top" title="View" data-original-title="View"><i class="fa fa-search"></i></a>
                                <a href="index.php?r=Admin/EditEmployer&id=<?php echo $e->id; ?>" class="btn btn-sm waves-effect waves-light btn-info text-white" data-toggle="tooltip" data-placement="top" title="Edit" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                <a data-id="<?php echo $e->id; ?>" class="btn btn-sm waves-effect waves-light btn-danger text-white employer-delete" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><i class="fa fa-trash"></i></a>
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
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/employer/employer.js", CClientScript::POS_END);