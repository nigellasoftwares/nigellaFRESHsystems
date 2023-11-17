<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Dependant Management</h2>
        <ol class="breadcrumb">
            <li>
                List
            </li>
            <li>
                Dependant
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
            <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Dependant Registered List</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover table-list-dependant">
                            <thead>
                                <tr>
                                    <th width="6%">#</th>
                                    <th>Dependant Name / Dependant ID</th>
                                    <th>Gender</th>
                                    <th>Passport</th>
                                    <th>Country</th>
                                    <th>Relation</th>
                                    <th width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(count($dependant)){
                                    $i = 0;
                                    foreach($dependant as $d){
                                        $i += 1;
                                        $id = empty($d->id) ? '<span class="label text-white">EMPTY</span>' : $d->id;
                                        $guid = empty($d->guid) ? '<span class="label text-white">EMPTY</span>' : $d->guid;
                                        
                                        if(empty($d->middle_name)){
                                            $name = $d->given_name.' '.$d->last_name;
                                        } else {
                                            $name = $d->given_name.' '.$d->middle_name.' '.$d->last_name;
                                        }
                                        
                                        $gender = empty($d->gender_id) ? '<span class="label text-white">EMPTY</span>' : $d->gender->name;
                                        $passport = empty($d->passport_number) ? '<span class="label text-white">EMPTY</span>' : $d->passport_number;
                                        $country = empty($d->nationality_id) ? '<span class="label text-white">EMPTY</span>' : $d->nationality->name;
                                        $relation = empty($d->relation_id) ? '<span class="label text-white">EMPTY</span>' : $d->relation->name;
                                        
                                        if($d->is_synchronize == 'NO'){
                                            $disable = NULL;
                                        } else if($d->is_synchronize == 'YES'){
                                            $disable = 'disabled';
                                        }
                            ?>
                                <tr>
                                    <td class="text-center">
                                        <span class="badge badge-primary"><?php echo $i; ?></span>
                                    </td>
                                    <td><?php echo $name.'<br />'.$guid; ?></td>
                                    <td><?php echo $gender; ?></td>
                                    <td><?php echo $passport; ?></td>
                                    <td><?php echo $country; ?></td>
                                    <td><?php echo $relation; ?></td>
                                    <td>
                                        <a href="index.php?r=Print/Dependant&id=<?php echo $d->id; ?>" target="_blank" class="btn btn-outline btn-sm btn-warning dependant-print" data-id="<?php echo $d->id; ?>" data-toggle="tooltip" data-placement="top" title="Print Dependant"><i class="fa fa-print"></i></a>
                                    </td>
                                </tr>
                            <?php 
                                    }
                                }    
                            ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Dependant Name</th>
                                    <th>Gender</th>
                                    <th>Passport</th>
                                    <th>Country</th>
                                    <th>Relation</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/dataTables/datatables.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.extend.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/chosen/chosen.jquery.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/datapicker/bootstrap-datepicker.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/sebumi/js/admin/list/list_dependant.js", CClientScript::POS_END);