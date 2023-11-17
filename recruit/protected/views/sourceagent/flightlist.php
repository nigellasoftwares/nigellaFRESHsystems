<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Flight List</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item active">Flight List</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><span class="label label-primary"><?php echo $user->profile->company->name; ?></span></h4>
            <h4 class="card-title">Flight List for Foreign Worker</h4>
            
            <div class="table-responsive m-t-40">
                <table id="table-application-flight" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Flight Number</th>
                            <th class="text-center">ETA Malaysia</th>
                            <th class="text-center">Flight Date</th>
                            <th class="text-center">Foreign Worker</th>
                            <th class="text-center">Male</th>
                            <th class="text-center">Female</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 0;
                        foreach($flight as $k=>$v){
                            $i++;
                            $worker = Transaction::model()->findAllByAttributes(array(
                                'flight_number' => $k
                            ));
                            
                            $gender = array();
                            foreach($worker as $t){
                                if($t->worker->gender->name == 'MALE'){
                                    $gender['male'][] = 1;
                                } else if($t->worker->gender->name == 'FEMALE'){
                                    $gender['female'][] = 1;
                                }
                            }
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $i; ?></td>
                            <td class="text-center"><?php echo strtoupper($k); ?></td>
                            <td class="text-center"><?php echo strtoupper($v['eta']); ?></td>
                            <td class="text-center"><?php echo date('d M Y', strtotime($v['date'])); ?></td>
                            <td class="text-center"><?php echo count($worker); ?> <i class="fa fa-user"></i></td>
                            <td class="text-center"><?php echo count($gender['male']); ?> <i class="fa fa-male"></i></td>
                            <td class="text-center"><?php echo count($gender['female']); ?> <i class="fa fa-female"></i></td>
                            <td class="text-center">
                                <a href="index.php?r=Sourceagent/PrintFlight&id=<?php echo $k; ?>" target="_blank" class="btn btn-sm waves-effect waves-light btn-warning text-dark" data-toggle="tooltip" data-placement="top" title="Print Flight Slip" data-original-title="Print Flight Slip"><i class="fa fa-print"></i> <i class="fa fa-plane"></i></a>
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
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/sourceagent/flightlist.js", CClientScript::POS_END);