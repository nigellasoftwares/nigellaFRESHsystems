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
            <h4 class="card-title"><span class="label label-primary"><?php echo $user->profile->company->name; ?></span></h4>
            <h4 class="card-title">Medical for Foreign Worker</h4>
        </div>
    </div>    
    
    <div class="row">
        <div class="col-md-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs customtab2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#medical" role="tab">
                        <span class="badge badge-info"><?php echo count($medical); ?></span><br />
                        <span class="hidden-xs-down">Clinic Assigned</span>
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo Helpers::percentvalue($percenter['medical']); ?>;height:15px;" role="progressbar">
                                <?php echo Helpers::percentvalue($percenter['medical']); ?>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" data-toggle="tab" href="#pending" role="tab">
                        <span class="badge badge-info"><?php echo count($pending); ?></span><br />
                        <span class="hidden-xs-down">Pending</span>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo Helpers::percentvalue($percenter['pending']); ?>;height:15px;" role="progressbar">
                                <?php echo Helpers::percentvalue($percenter['pending']); ?>
                            </div>
                        </div>
                    </a> 
                </li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content">
                
                <!-- Medical Assigned -->
                <div class="tab-pane active" id="medical" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <div class="ribbon ribbon-danger ribbon-right">Medical</div>
                                
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
                                            <th>Employer</th>
                                            <th>Clinic</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $i = 0;
                                        foreach($medical as $m){
                                            $i++;
                                            $c = MedicalProfile::model()->findByPk($m->medical_id);
                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo $i; ?></td>
                                            <td><?php echo $m->worker->code; ?></td>
                                            <td width="20%"><?php echo strtoupper($m->worker->full_name); ?></td>
                                            <td><?php echo strtoupper($m->passport->number); ?></td>
                                            <td><?php echo $m->worker->nationality->country; ?></td>
                                            <td><?php echo date('d M Y', strtotime($m->created_at)); ?></td>
                                            <td><?php echo $m->employer->profile->company->name; ?></td>
                                            <td><?php echo $c->company; ?></td>
                                            <td class="text-center">
                                                <a href="index.php?r=Sourceagent/MedicalSlip&id=<?php echo $m->id; ?>" target="_blank" class="btn btn-sm waves-effect waves-light btn-warning medical-print" data-id="<?php echo $t->id; ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Medical Slip">
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

                        </div>
                    </div>
                </div>
                
                <!-- Pending Medical -->
                <div class="tab-pane" id="pending" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <div class="ribbon ribbon-danger ribbon-right">Pending</div>
                            
                            <form id="form-medical-worker">
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $i = 0;
                                            foreach($pending as $p){
                                                $i++;
                                        ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i; ?></td>
                                                <td class="text-center">
                                                    <input type="checkbox" name="medical[]" class="checkbox-form" value="<?php echo $p->id; ?>" />
                                                </td>
                                                <td><?php echo $p->worker->code; ?></td>
                                                <td width="20%"><?php echo strtoupper($p->worker->full_name); ?></td>
                                                <td><?php echo strtoupper($p->passport->number); ?></td>
                                                <td><?php echo $p->worker->nationality->country; ?></td>
                                                <td><?php echo date('d M Y', strtotime($p->created_at)); ?></td>
                                                <td><?php echo $p->employer->profile->company->name; ?></td>
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
                                        <div class="row m-t-40">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"><strong>Medical Centre</strong></label>
                                                    <?php
                                                        $clinic_list = CHtml::listData($clinic, 'id', 'company');
                                                        echo CHtml::dropDownList('clinic', null, $clinic_list, 
                                                        array(
                                                            'empty' => 'Select Medical Centre',
                                                            'class' => 'form-control vft-element',
                                                            'data-parsley-required' => 'true'
                                                        ));
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-40">
                                            <div class="col-md-12">
                                                <div class="pull-right">
                                                    <a class="btn btn-success" id="submit-medical">
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
            </div>    
        </div>
    </div>
</div>

<?php
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/datatables/jquery.dataTables.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/toast-master/js/jquery.toast.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/sourceagent/medical.js", CClientScript::POS_END);