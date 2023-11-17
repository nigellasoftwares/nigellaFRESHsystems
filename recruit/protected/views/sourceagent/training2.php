<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Training</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item active">Training</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><span class="label label-primary"><?php echo $user->profile->company->name; ?></span></h4>
            <h4 class="card-title">Training for Foreign Worker</h4>
            
            <form id="form-medical-worker">
                <div class="table-responsive m-t-40">
                    
                    <table id="table-application-transaction" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Training Centre ID</th>
                                <th>Training Centre</th>
                                <th>Person In Charge</th>
                                <th>Address</th>
                                <th>Telephone</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 0;
                            foreach($training as $t){
                                $i++;
                        ?>    
                            <tr>
                                <td class="text-center"><?php echo $i; ?></td>
                                <td><?php echo $t->code; ?></td>
                                <td><?php echo $t->company->name; ?></td>
                                <td><?php echo $t->fullname; ?></td>
                                <td><?php echo $t->company->address; ?></td>
                                <td><?php echo $t->company->contact_number1; ?></td>
                                <td class="text-center">
                                    <a href="index.php?r=Sourceagent/Calendar&id=<?php echo $t->id; ?>" class="btn btn-sm waves-effect waves-light btn-info" data-toggle="tooltip" data-placement="top" data-original-title="View">
                                        <i class="fa fa-calendar"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            }    
                        ?>    
                        </tbody>
                    </table>
                </div>
            </form>    
            
        </div>
    </div>
</div>

<?php
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/datatables/jquery.dataTables.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/toast-master/js/jquery.toast.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/sourceagent/training2.js", CClientScript::POS_END);