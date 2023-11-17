<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Status</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item active">Status</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><span class="label label-primary"><?php echo $user->profile->company->name; ?></span></h4>
            <h4 class="card-title">Status Lookup</h4>
            
            <div class="table-responsive m-t-40">
                <table id="table-application-setting" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="10%">#</th>
                            <th>Name</th>
                            <th width="10%">Sort</th>
                            <th width="17%">Created Date</th>
                            <th width="17%">Created By</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 0;
                        foreach($item as $t){
                            $i++;
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $i; ?></td>
                            <td><?php echo $t->name; ?></td>
                            <td class="text-center"><?php echo $t->sort; ?></td>
                            <td class="text-center"><?php echo date('d M Y', strtotime($t->created_at)); ?></td>
                            <td class="text-center"><?php echo $t->createdBy->profile->fullname; ?></td>
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
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/setting/setting.js", CClientScript::POS_END);