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
            
            <form id="form-training-worker">
                <div class="table-responsive m-t-40">
                    
                    <table id="table-application-transaction" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center"><i class="fa fa-check-square-o"></i></th>
                                <th>Foreign<br />Worker ID</th>
                                <th>Full Name</th>
                                <th>Passport</th>
                                <th>Nationality</th>
                                <th>Registered Date</th>
                                <th>Employer</th>
                                <th>Demand Letter</th>
                                <th>Slip</th>
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
                                <td class="text-center">
                                    <input type="checkbox" name="training[]" class="checkbox-form" value="<?php echo $t->id; ?>" />
                                </td>
                                <td><?php echo $t->worker->code; ?></td>
                                <td width="20%"><?php echo strtoupper($t->worker->full_name); ?></td>
                                <td><?php echo strtoupper($t->passport->number); ?></td>
                                <td><?php echo $t->worker->nationality->country; ?></td>
                                <td><?php echo date('d M Y', strtotime($t->created_at)); ?></td>
                                <td><?php echo $t->employer->profile->company->name; ?></td>
                                <td><?php echo $t->quota->code; ?></td>
                                <td class="text-center">
                                    <a href="index.php?r=Sourceagent/TrainingSlip&id=<?php echo $t->id; ?>" target="_blank" class="btn btn-sm waves-effect waves-light btn-warning training-print" data-id="<?php echo $t->id; ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Training Slip">
                                        <i class="fa fa-print"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            }    
                        ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="row">
                    <div class="col-md-9">&nbsp;</div>
                    <div class="col-md-3">
                        <!--
                        <div class="row m-t-40">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"><strong>Medical Clinic</strong></label>
                                    <select class="form-control vtf-element" name="clinic">
                                        <option>Clinic 1 e-Bfbms</option>
                                        <option>Clinic 2 e-Bfbms</option>
                                        <option>Clinic 3 e-Bfbms</option>
                                        <option>Clinic 4 e-Bfbms</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        -->
                        <div class="row m-t-40">
                            <div class="col-md-12">
                                <div class="pull-right">
                                    <a class="btn btn-success" id="submit-training">
                                        <i class="fa fa-check"></i> Save
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </form>    
            
        </div>
    </div>
</div>

<?php
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/datatables/jquery.dataTables.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/toast-master/js/jquery.toast.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/sourceagent/training.js", CClientScript::POS_END);