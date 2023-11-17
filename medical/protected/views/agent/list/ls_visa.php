<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Visa Management</h2>
        <ol class="breadcrumb">
            <li>
                List
            </li>
            <li>
                Visa
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
            <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Worker Registered List</h5>
                    <div class="ibox-tools">
                        <!--
                        <a class="btn btn-outline btn-success applicant-new">
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
                        <table class="table table-striped table-bordered table-hover table-list-applicant">
                            <thead>
                                <tr>
                                    <th width="6%">#</th>
                                    <th>Worker <span class="label label-default">Name</span> <span class="label label-default">ID</span></th>
                                    <th>Date Of Birth</th>
                                    <th>Gender</th>
                                    <th>Passport</th>
                                    <th>Country</th>
                                    <th>Result</th>
                                    <th width="18%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(count($applicant)){
                                    $i = 0;
                                    foreach($applicant as $a){
                                        $i += 1;
                            ?>
                                <tr>
                                    <td class="text-center">
                                        <span class="badge badge-primary"><?php echo $i; ?></span>
                                    </td>
                                    <td><?php echo $a['name'].'<br />'.$a['guid']; ?></td>
                                    <td><?php echo $a['birthdate']; ?></td>
                                    <td><?php echo $a['gender']; ?></td>
                                    <td><?php echo $a['passport']; ?></td>
                                    <td><?php echo $a['country']; ?></td>
                                    <td>SUITABLE</td>
                                    <td>
                                        <a href="index.php?r=Print/ApplicantVisa&id=<?php echo $a['id']; ?>" target="_blank" class="btn btn-outline btn-sm btn-warning applicant-visa-print" data-id="<?php echo $a['id']; ?>" data-toggle="tooltip" data-placement="top" title="Print Visa Application Form"><i class="fa fa-qrcode"></i></a>
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
                                    <th>Worker <span class="label label-default">Name</span> <span class="label label-default">ID</span></th>
                                    <th>Date Of Birth</th>
                                    <th>Gender</th>
                                    <th>Passport</th>
                                    <th>Country</th>
                                    <th>Result</th>
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
    //Yii::app()->clientScript->registerScriptFile("vendor/sebumi/js/agent/list/list_applicant.js", CClientScript::POS_END);    