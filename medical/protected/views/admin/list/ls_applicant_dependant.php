<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Dependant Management</h2>
        <ol class="breadcrumb">
            <li>
                List
            </li>
            <li>
                Applicant
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
                    <h5><i class="fa fa-briefcase text-success"></i> <?php echo $applicant->given_name.' '.$applicant->last_name; ?></h5>
                    <div class="ibox-tools">
                        <a href="index.php?r=Admin/ListApplicant" class="btn btn-outline btn-success">
                            <i class="fa fa-rotate-left"></i> Back
                        </a>
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Applicant Name / Applicant ID</th>
                                <th>Gender</th>
                                <th>Passport</th>
                                <th>Permit</th>
                                <th>Country</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo empty($applicant->given_name) ? '<span class="label text-white">EMPTY</span>' : $applicant->given_name.' '.$applicant->middle_name.' '.$applicant->last_name; ?><br /><?php echo empty($applicant->guid) ? '<span class="label text-white">EMPTY</span>' : $applicant->guid; ?></td>
                                <td><?php echo empty($applicant->gender_id) ? '<span class="label text-white">EMPTY</span>' : $applicant->gender->name; ?></td>
                                <td><?php echo empty($applicant->passport_number) ? '<span class="label text-white">EMPTY</span>' : $applicant->passport_number; ?></td>
                                <td><?php echo empty($applicant->plks_number) ? '<span class="label text-white">EMPTY</span>' : $applicant->plks_number; ?></td>
                                <td><?php echo empty($applicant->nationality_id) ? '<span class="label text-white">EMPTY</span>' : $applicant->nationality->name; ?></td>
                                <td>
                                    <a href="index.php?r=Print/Applicant&id=<?php echo $applicant->id; ?>" target="_blank" class="btn btn-outline btn-sm btn-warning applicant-print" data-id="<?php echo $applicant->id; ?>" data-toggle="tooltip" data-placement="top" title="Print Applicant"><i class="fa fa-print"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Dependant Registered List</h5>
                    <div class="ibox-tools">
                        <!--
                        <a class="btn btn-outline btn-success dependant-new">
                            Register
                        </a>
                        -->
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
                                    <th>Dependant Name / Dependent ID</th>
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
                                        $status = empty($d->status) ? '<span class="label text-white">EMPTY</span>' : $d->status;
                                        
                                        if($d->is_synchronize == 'NO'){
                                            $disable = NULL;
                                        } else if($d->is_synchronize == 'YES'){
                                            $disable = 'disabled';
                                        }
                                        
                                        $disable = 'disabled';
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
                                    <th>Dependant Name / Dependant ID</th>
                                    <th>Gender</th>
                                    <th>Passport</th>
                                    <th>Permit</th>
                                    <th>Country</th>
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
    Yii::app()->clientScript->registerScriptFile("vendor/sebumi/js/admin/list/list_applicant_dependant.js", CClientScript::POS_END);