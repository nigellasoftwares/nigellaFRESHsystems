<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Agent</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item active">Agent</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><span class="label label-primary"><?php echo $user->profile->company->name; ?></span></h4>
        <?php if(strstr(Yii::app()->request->requestUri,"Webmin/SourceAgent") == TRUE){ ?>
            <h4 class="card-title">Source Agent List</h4>
        <?php } else { ?>
            <h4 class="card-title">Agent List</h4>
        <?php } ?>    
            
            <div class="table-responsive m-t-40">
                <table id="table-application-agent" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="10%">Agent ID</th>
                            <th>Full Name</th>
                            <th width="20%">Contact</th>
                            <th width="20%">Company</th>
                            <th width="10%">Registered Date</th>
                            <th width="13%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 0;
                        foreach($agent as $a){
                            $i++;
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $i; ?></td>
                            <td><?php echo $a->code; ?></td>
                            <td><?php echo strtoupper($a->fullname); ?></td>
                            <td><i class="icon-phone"></i> <?php echo strtoupper($a->contact_number1); ?></td>
                            <td><?php echo strtoupper($a->company->name); ?></td>
                            <td><?php echo date('d M Y', strtotime($a->created_at)); ?></td>
                            <td>
                                <a href="<?php echo $link; ?>&id=<?php echo $a->id; ?>" class="btn btn-sm waves-effect waves-light btn-success text-white" data-toggle="tooltip" data-placement="top" title="View" data-original-title="View"><i class="fa fa-search"></i></a>
                                <a href="<?php echo $link2; ?>&id=<?php echo $a->id; ?>" class="btn btn-sm waves-effect waves-light btn-info text-white" data-toggle="tooltip" data-placement="top" title="Foreign Worker" data-original-title="Foreign Worker"><i class="fa fa-list"></i></a>
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
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/agent/agent.js", CClientScript::POS_END);