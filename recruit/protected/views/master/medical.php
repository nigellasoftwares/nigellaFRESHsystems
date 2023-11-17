<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Medical</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item active">Medical</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><span class="label label-primary"><?php echo $sagent->company->name; ?></span></h4>
            <h4 class="card-title">Medical for Foreign Worker</h4>
            
            <form id="form-medical-worker">
                <div class="table-responsive m-t-40">

                    <table id="table-application-transaction" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center">Medical</th>
                                <th>Foreign<br />Worker ID</th>
                                <th>Full Name</th>
                                <th>Passport</th>
                                <th>Nationality</th>
                                <th>Registered Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 0;
                            foreach($transaction as $t){
                                $i++;
                                
                                $medical = '';
                                if($t->medical == 'YES'){
                                    $medical = '<span class="label label-success">YES</span>';
                                } else {
                                    $medical = '<span class="label label-danger">NO</span>';
                                }
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $i; ?></td>
                                <td class="text-center"><?php echo $medical; ?></td>
                                <td><?php echo $t->worker->code; ?></td>
                                <td><?php echo strtoupper($t->worker->full_name); ?></td>
                                <td><?php echo strtoupper($t->passport->number); ?></td>
                                <td><?php echo $t->worker->nationality->country; ?></td>
                                <td><?php echo date('d M Y', strtotime($t->created_at)); ?></td>
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
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/master/medical.js", CClientScript::POS_END);