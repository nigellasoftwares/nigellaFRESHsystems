<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Worker Management</h2>
        <ol class="breadcrumb">
            <li>
                List
            </li>
            <li>
                Worker
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
                        <a class="btn btn-outline btn-success applicant-new">
                            Register
                        </a>
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
                                    <th width="18%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(count($applicant)){
                                    $i = 0;
                                    foreach($applicant as $a){
                                        $i += 1;
                                        
                                        $id = empty($a->id) ? '<span class="label text-white">EMPTY</span>' : $a->id;
                                        $guid = empty($a->guid) ? '<span class="label text-white">EMPTY</span>' : $a->guid;
                                        
                                        if(empty($a->middle_name)){
                                            $name = $a->given_name.' '.$a->last_name;
                                        } else {
                                            $name = $a->given_name.' '.$a->middle_name.' '.$a->last_name;
                                        }
                                        
                                        $birthdate = empty($a->birth_date) ? '<span class="label text-white">EMPTY</span>' : date('d-m-Y', strtotime($a->birth_date));
                                        $gender = empty($a->gender_id) ? '<span class="label text-white">EMPTY</span>' : $a->gender->name;
                                        $passport = empty($a->passport_number) ? '<span class="label text-white">EMPTY</span>' : $a->passport_number;
                                        $country = empty($a->nationality_id) ? '<span class="label text-white">EMPTY</span>' : $a->nationality->name;
                                        $status = empty($a->status) ? '<span class="label text-white">EMPTY</span>' : $a->status;
                                        
                                        if($a->is_synchronize == 'NO'){
                                            $disable = NULL;
                                        } else if($a->is_synchronize == 'YES'){
                                            $disable = 'disabled';
                                        }
                            ?>
                                <tr>
                                    <td class="text-center">
                                        <span class="badge badge-primary"><?php echo $i; ?></span>
                                    </td>
                                    <td><?php echo $name.'<br />'.$guid; ?></td>
                                    <td><?php echo $birthdate; ?></td>
                                    <td><?php echo $gender; ?></td>
                                    <td><?php echo $passport; ?></td>
                                    <td><?php echo $country; ?></td>
                                    <td>
                                        <a class="btn btn-outline btn-sm btn-primary applicant-view" data-id="<?php echo $a->id; ?>" data-toggle="tooltip" data-placement="top" title="View Worker"><i class="fa fa-search"></i></a>
                                        <a href="index.php?r=Print/Applicant&id=<?php echo $a->id; ?>" target="_blank" class="btn btn-outline btn-sm btn-warning applicant-print" data-id="<?php echo $a->id; ?>" data-toggle="tooltip" data-placement="top" title="Print Worker"><i class="fa fa-print"></i></a>
                                        <a class="btn btn-outline btn-sm btn-success applicant-edit" data-id="<?php echo $a->id; ?>" data-toggle="tooltip" data-placement="top" title="Amend Worker"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-outline btn-sm btn-danger applicant-delete" data-id="<?php echo $a->id; ?>" data-toggle="tooltip" data-placement="top" title="Delete Worker"><i class="fa fa-trash"></i></a>
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

<div class="modal inmodal" id="modal-new-applicant">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">New Worker Information</h4>
            </div>
            <form id="form-new-applicant" data-smk-icon="glyphicon-remove-sign">
                <div class="modal-body">
                    <div class="message-form"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <span class="label label-primary2">Web Camera</span>
                                </div>
                                <div class="hr-line-solid"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pull-left">
                                                <a class="btn btn-sm btn-outline btn-success snapshot-take">
                                                    <i class="fa fa-camera"></i> Take Snapshot
                                                </a>
                                                <a class="btn btn-sm btn-outline btn-success another-take">
                                                    <i class="fa fa-camera"></i> Take Another
                                                </a>
                                            </div>
                                            <div class="pull-right">
                                                <h4 class="text-left m">
                                                    <i class="fa fa-camera"></i> Camera
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row h-150">&nbsp;</div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="label label-primary2">Clinic</span>
                                        </div>
                                        <div class="hr-line-solid"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><strong>Clinic</strong></label>
                                                <?php
                                                    echo CHtml::dropDownList('r_clinic', null, $list_clinic,
                                                    array(
                                                        'empty' => 'Select Clinic',
                                                        'class' => 'form-control',
                                                        'required' => true
                                                    ));
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <div class="ibox-content">
                                            <div class="sebumi-camera"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tabs-container">
                                <ul class="nav nav-tabs">
                                    <li class="tab-applicant active"><a data-toggle="tab" href="#pane-applicant"> Applicant</a></li>
                                <?php for($dt = 1; $dt < 6; $dt++){ ?>
                                    <li class="tab-dependant tab-dependant-<?php echo $dt; ?>">
                                        <a data-toggle="tab" href="#pane-dependant-<?php echo $dt; ?>">
                                            Dependant <span class="label label-warning"><?php echo $dt; ?></span>
                                        </a>
                                    </li>
                                <?php } ?>
                                </ul>
                                <div class="tab-content">
                                    <div id="pane-applicant" class="tab-pane active">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="pull-right">
                                                        <a class="btn btn-sm btn-outline btn-success applicant-photo-save">
                                                            <i class="fa fa-camera"></i> Photo
                                                        </a>
                                                        <a class="btn btn-sm btn-outline btn-success applicant-passport-save">
                                                            <i class="fa fa-camera"></i> Passport
                                                        </a>
                                                        <a class="btn btn-sm btn-outline btn-success applicant-birth-save">
                                                            <i class="fa fa-camera"></i> Birth
                                                        </a>
                                                        <a class="btn btn-sm btn-outline btn-success applicant-national-save">
                                                            <i class="fa fa-camera"></i> National ID
                                                        </a>
                                                        <a class="btn btn-sm btn-outline btn-success applicant-marriage-save">
                                                            <i class="fa fa-camera"></i> Marriage
                                                        </a>
                                                        <!--
                                                        <a class="btn btn-sm btn-outline btn-success applicant-imm13-save">
                                                            <i class="fa fa-camera"></i> IMM13
                                                        </a>
                                                        -->
                                                        <a class="btn btn-sm btn-outline btn-success applicant-other-save">
                                                            <i class="fa fa-camera"></i> Other
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Document</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4>Document Upload</h4>
                                                    <div class="ibox-content">
                                                        <div class="scroll-content">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><strong>Photo</strong></label>
                                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                            <div class="form-control" data-trigger="fileinput">
                                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                <span class="fileinput-filename"></span>
                                                                            </div>
                                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                                <span class="fileinput-new">Select file</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file" name="r_photo_document" />
                                                                            </span>
                                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><strong>Passport</strong></label>
                                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                            <div class="form-control" data-trigger="fileinput">
                                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                <span class="fileinput-filename"></span>
                                                                            </div>
                                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                                <span class="fileinput-new">Select file</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file" name="r_passport_document" />
                                                                            </span>
                                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><strong>Birth Certificate</strong></label>
                                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                            <div class="form-control" data-trigger="fileinput">
                                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                <span class="fileinput-filename"></span>
                                                                            </div>
                                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                                <span class="fileinput-new">Select file</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file" name="r_birth_document" />
                                                                            </span>
                                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><strong>National ID</strong></label>
                                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                            <div class="form-control" data-trigger="fileinput">
                                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                <span class="fileinput-filename"></span>
                                                                            </div>
                                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                                <span class="fileinput-new">Select file</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file" name="r_national_document" />
                                                                            </span>
                                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><strong>Marriage Certificate</strong></label>
                                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                            <div class="form-control" data-trigger="fileinput">
                                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                <span class="fileinput-filename"></span>
                                                                            </div>
                                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                                <span class="fileinput-new">Select file</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file" name="r_marriage_document" />
                                                                            </span>
                                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><strong>IMM13</strong></label>
                                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                            <div class="form-control" data-trigger="fileinput">
                                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                <span class="fileinput-filename"></span>
                                                                            </div>
                                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                                <span class="fileinput-new">Select file</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file" name="r_imm13_document" />
                                                                            </span>
                                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            -->
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><strong>Other Document</strong></label>
                                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                            <div class="form-control" data-trigger="fileinput">
                                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                <span class="fileinput-filename"></span>
                                                                            </div>
                                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                                <span class="fileinput-new">Select file</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file" name="r_other_document" />
                                                                            </span>
                                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="slick-camera-applicant">
                                                        <div>
                                                            <div class="panel panel-default panel-success">
                                                                <div class="panel-heading">
                                                                    <span class="font-bold">Photo</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="snap-applicant-photo">
                                                                        <img class="image-applicant" src="vendor/sebumi/images/no_image_available.png" width="216" />
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="r_applicant_photo_snap" class="snap-applicant-photo-image" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="panel panel-default panel-success">
                                                                <div class="panel-heading">
                                                                    <span class="font-bold">Passport Document</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="snap-applicant-passport">
                                                                        <img class="image-applicant" src="vendor/sebumi/images/no_image_available.png" width="216" />
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="r_applicant_passport_snap" class="snap-applicant-passport-image" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="panel panel-default panel-success">
                                                                <div class="panel-heading">
                                                                    <span class="font-bold">Birth Document</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="snap-applicant-birth">
                                                                        <img class="image-applicant" src="vendor/sebumi/images/no_image_available.png" width="216" />
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="r_applicant_birth_snap" class="snap-applicant-birth-image" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="panel panel-default panel-success">
                                                                <div class="panel-heading">
                                                                    <span class="font-bold">National ID Document</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="snap-applicant-national">
                                                                        <img class="image-applicant" src="vendor/sebumi/images/no_image_available.png" width="216" />
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="r_applicant_national_snap" class="snap-applicant-national-image" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="panel panel-default panel-success">
                                                                <div class="panel-heading">
                                                                    <span class="font-bold">Marriage Document</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="snap-applicant-marriage">
                                                                        <img class="image-applicant" src="vendor/sebumi/images/no_image_available.png" width="216" />
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="r_applicant_marriage_snap" class="snap-applicant-marriage-image" />
                                                            </div>
                                                        </div>
                                                        <!--
                                                        <div>
                                                            <div class="panel panel-default panel-success">
                                                                <div class="panel-heading">
                                                                    <span class="font-bold">IMM13 Document</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="snap-applicant-imm13">
                                                                        <img class="image-applicant" src="vendor/sebumi/images/no_image_available.png" width="216" />
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="r_applicant_imm13_snap" class="snap-applicant-imm13-image" />
                                                            </div>
                                                        </div>
                                                        -->
                                                        <div>
                                                            <div class="panel panel-default panel-success">
                                                                <div class="panel-heading">
                                                                    <span class="font-bold">Other Document</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="snap-applicant-other">
                                                                        <img class="image-applicant" src="vendor/sebumi/images/no_image_available.png" width="216" />
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="r_applicant_other_snap" class="snap-applicant-other-image" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Worker Fingerprint</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><strong>Fingerprint</strong></label> <span class="label label-warning">LEFT</span>
                                                        <br />Place fingerprint to biometric device to register.<br /><br />
                                                        <div>
                                                            <div style="float: left; text-align: center; margin-right: 10px;">
                                                                <img src="vendor/sebumi/images/fingerprint.png" height="120" style="border: 1px solid #e5e6e7; padding: 10px;" />
                                                                <br /><span class="label label-warning">THUMB</span>
                                                            </div>
                                                            <div style="float: left; text-align: center; margin-right: 10px;">
                                                                <img src="vendor/sebumi/images/fingerprint.png" height="120" style="border: 1px solid #e5e6e7; padding: 10px;" />
                                                                <br /><span class="label label-warning">INDEX</span>
                                                            </div>
                                                            <div style="float: left; text-align: center; margin-right: 10px;">
                                                                <img src="vendor/sebumi/images/fingerprint.png" height="120" style="border: 1px solid #e5e6e7; padding: 10px;" />
                                                                <br /><span class="label label-warning">MIDDLE</span>
                                                            </div>
                                                            <div style="float: left; text-align: center; margin-right: 10px;">
                                                                <img src="vendor/sebumi/images/fingerprint.png" height="120" style="border: 1px solid #e5e6e7; padding: 10px;" />
                                                                <br /><span class="label label-warning">RING</span>
                                                            </div>
                                                            <div style="float: left; text-align: center;">
                                                                <img src="vendor/sebumi/images/fingerprint.png" height="120" style="border: 1px solid #e5e6e7; padding: 10px;" />
                                                                <br /><span class="label label-warning">LITTLE</span>
                                                            </div>
                                                        </div>    
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <br /><br />
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><strong>Fingerprint</strong></label> <span class="label label-warning">RIGHT</span>
                                                        <br />Place fingerprint to biometric device to register.<br /><br />
                                                        <div>
                                                            <div style="float: left; text-align: center; margin-right: 10px;">
                                                                <img src="vendor/sebumi/images/fingerprint.png" height="120" style="border: 1px solid #e5e6e7; padding: 10px;" />
                                                                <br /><span class="label label-warning">THUMB</span>
                                                            </div>
                                                            <div style="float: left; text-align: center; margin-right: 10px;">
                                                                <img src="vendor/sebumi/images/fingerprint.png" height="120" style="border: 1px solid #e5e6e7; padding: 10px;" />
                                                                <br /><span class="label label-warning">INDEX</span>
                                                            </div>
                                                            <div style="float: left; text-align: center; margin-right: 10px;">
                                                                <img src="vendor/sebumi/images/fingerprint.png" height="120" style="border: 1px solid #e5e6e7; padding: 10px;" />
                                                                <br /><span class="label label-warning">MIDDLE</span>
                                                            </div>
                                                            <div style="float: left; text-align: center; margin-right: 10px;">
                                                                <img src="vendor/sebumi/images/fingerprint.png" height="120" style="border: 1px solid #e5e6e7; padding: 10px;" />
                                                                <br /><span class="label label-warning">RING</span>
                                                            </div>
                                                            <div style="float: left; text-align: center;">
                                                                <img src="vendor/sebumi/images/fingerprint.png" height="120" style="border: 1px solid #e5e6e7; padding: 10px;" />
                                                                <br /><span class="label label-warning">LITTLE</span>
                                                            </div>
                                                        </div>    
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <br /><br />
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Personal</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Given Name</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <input type="text" name="r_given_name" class="form-control" placeholder="Given Name" required="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Middle Name</strong></label>
                                                        <input type="text" name="r_middle_name" class="form-control" placeholder="Middle Name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Last Name</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <input type="text" name="r_last_name" class="form-control" placeholder="Last Name" required="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 1)</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <input type="text" name="r_address1" class="form-control" placeholder="Address (Line 1)" required="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Date Of Birth</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="r_birth_date" class="form-control" placeholder="Date Of Birth" required="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Gender</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <?php
                                                            echo CHtml::dropDownList('r_gender', null, $list_gender,
                                                            array(
                                                                'empty' => 'Select Gender',
                                                                'class' => 'form-control',
                                                                'required' => true
                                                            ));
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 2)</strong></label>
                                                        <input type="text" name="r_address2" class="form-control" placeholder="Address (Line 2)" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Nationality</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <?php
                                                            echo CHtml::dropDownList('r_nationality', null, $list_nationality,
                                                            array(
                                                                'empty' => 'Select Nationality',
                                                                'class' => 'form-control',
                                                                'required' => true
                                                            ));
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Job Sector</strong></label>
                                                        <?php
                                                            echo CHtml::dropDownList('r_job_sector', null, $list_job,
                                                            array(
                                                                'empty' => 'Select Job Sector',
                                                                'class' => 'form-control'
                                                            ));
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 3)</strong></label>
                                                        <input type="text" name="r_address3" class="form-control" placeholder="Address (Line 3)" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>District</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <?php
//                                                            echo CHtml::dropDownList('r_district', null, $list_district,
//                                                            array(
//                                                                'empty' => 'Select District',
//                                                                'class' => 'form-control',
//                                                                'required' => true
//                                                            ));
                                                        ?>
                                                        <input type="text" name="r_district" class="form-control" placeholder="District" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Contact Number</strong></label>
                                                        <input type="text" name="r_contact" class="form-control" placeholder="Contact Number" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Job Order</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Malaysian Employer</strong></label>
                                                        <input type="text" name="r_employer_name" class="form-control" placeholder="Employer Name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 1)</strong></label>
                                                        <input type="text" name="r_employer_address1" class="form-control" placeholder="Address (Line 1)" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>District</strong></label>
                                                        <?php
//                                                            echo CHtml::dropDownList('r_employer_district', null, $list_district,
//                                                            array(
//                                                                'empty' => 'Select District',
//                                                                'class' => 'form-control'
//                                                            ));
                                                        ?>
                                                        <input type="text" name="r_employer_district" class="form-control" placeholder="District" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 2)</strong></label>
                                                        <input type="text" name="r_employer_address2" class="form-control" placeholder="Address (Line 2)" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Contact Number</strong></label>
                                                        <input type="text" name="r_employer_contact" class="form-control" placeholder="Contact Number" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 3)</strong></label>
                                                        <input type="text" name="r_employer_address3" class="form-control" placeholder="Address (Line 3)" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Passport</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Number</strong></label>
                                                        <input type="text" name="r_passport_number" class="form-control" placeholder="Passport Number" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Status</strong></label>
                                                        <?php
                                                            echo CHtml::dropDownList('r_passport_status', null, $list_status,
                                                            array(
                                                                'empty' => 'Select Status',
                                                                'class' => 'form-control',
                                                            ));
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Issue Date</strong></label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="r_passport_issuedate" class="form-control" placeholder="Passport Issue Date" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Expiry Date</strong></label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="r_passport_expirydate" class="form-control" placeholder="Passport Expiry Date" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Issue Place</strong></label>
                                                        <input type="text" name="r_passport_issueplace" class="form-control" placeholder="Passport Issue Place" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Entry Point</strong></label>
                                                        <input type="text" name="r_passport_entrypoint" class="form-control" placeholder="Passport Entry Point" />
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!--
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">PLKS</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>PLKS Number</strong></label>
                                                        <input type="text" name="r_plks_number" class="form-control" placeholder="PLKS Number" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>BPA Number</strong></label>
                                                        <input type="text" name="r_bpa_number" class="form-control" placeholder="BPA Number" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>PLKS Issue Date</strong></label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="r_plks_issuedate" class="form-control" placeholder="PLKS Issue Date" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>PLKS Expiry Date</strong></label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="r_plks_expirydate" class="form-control" placeholder="PLKS Expiry Date" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            -->
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Next Of Kin</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Given Name</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <input type="text" name="r_nextkin_given_name" class="form-control" placeholder="Given Name" required="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Middle Name</strong></label>
                                                        <input type="text" name="r_nextkin_middle_name" class="form-control" placeholder="Middle Name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Last Name</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <input type="text" name="r_nextkin_last_name" class="form-control" placeholder="Last Name" required="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 1)</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <input type="text" name="r_nextkin_address1" class="form-control" placeholder="Address (Line 1)" required="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Date Of Birth</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="r_nextkin_birth_date" class="form-control" placeholder="Date Of Birth" required="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Gender</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <?php
                                                            echo CHtml::dropDownList('r_nextkin_gender', null, $list_gender,
                                                            array(
                                                                'empty' => 'Select Gender',
                                                                'class' => 'form-control',
                                                                'required' => true
                                                            ));
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 2)</strong></label>
                                                        <input type="text" name="r_nextkin_address2" class="form-control" placeholder="Address (Line 2)" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Nationality</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <?php
                                                            echo CHtml::dropDownList('r_nextkin_nationality', null, $list_nationality,
                                                            array(
                                                                'empty' => 'Select Nationality',
                                                                'class' => 'form-control',
                                                                'required' => true
                                                            ));
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Contact Number</strong></label>
                                                        <input type="text" name="r_nextkin_contact" class="form-control" placeholder="Contact Number" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 3)</strong></label>
                                                        <input type="text" name="r_nextkin_address3" class="form-control" placeholder="Address (Line 3)" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>District</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <?php
//                                                            echo CHtml::dropDownList('r_district', null, $list_district,
//                                                            array(
//                                                                'empty' => 'Select District',
//                                                                'class' => 'form-control',
//                                                                'required' => true
//                                                            ));
                                                        ?>
                                                        <input type="text" name="r_nextkin_district" class="form-control" placeholder="District" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Relation</strong></label>
                                                        <?php
                                                            echo CHtml::dropDownList('r_nextkin_relation', null, $list_relation,
                                                            array(
                                                                'empty' => 'Select Relation',
                                                                'class' => 'form-control',
                                                                'required' => true
                                                            ));
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php for($dp = 1; $dp < 6; $dp++){ ?>
                                    <div id="pane-dependant-<?php echo $dp; ?>" class="tab-pane pane-dependant">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="pull-right">
                                                        <a class="btn btn-sm btn-outline btn-success dependant-<?php echo $dp; ?>-photo-save">
                                                            <i class="fa fa-camera"></i> Photo
                                                        </a>
                                                        <a class="btn btn-sm btn-outline btn-success dependant-<?php echo $dp; ?>-passport-save">
                                                            <i class="fa fa-camera"></i> Passport
                                                        </a>
                                                        <a class="btn btn-sm btn-outline btn-success dependant-<?php echo $dp; ?>-birth-save">
                                                            <i class="fa fa-camera"></i> Birth
                                                        </a>
                                                        <a class="btn btn-sm btn-outline btn-success dependant-<?php echo $dp; ?>-marriage-save">
                                                            <i class="fa fa-camera"></i> Marriage
                                                        </a>
                                                        <a class="btn btn-sm btn-outline btn-success dependant-<?php echo $dp; ?>-imm13-save">
                                                            <i class="fa fa-camera"></i> IMM13
                                                        </a>
                                                        <a class="btn btn-sm btn-outline btn-success dependant-<?php echo $dp; ?>-other-save">
                                                            <i class="fa fa-camera"></i> Other
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Document</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4>Document Upload</h4>
                                                    <div class="ibox-content">
                                                        <div class="scroll-content">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><strong>Passport</strong></label>
                                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                            <div class="form-control" data-trigger="fileinput">
                                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                <span class="fileinput-filename"></span>
                                                                            </div>
                                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                                <span class="fileinput-new">Select file</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file" name="r_dependant_passport_document[<?php echo $dp; ?>]" class="form-dependant-<?php echo $dp; ?>" />
                                                                            </span>
                                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><strong>Birth Certificate</strong></label>
                                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                            <div class="form-control" data-trigger="fileinput">
                                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                <span class="fileinput-filename"></span>
                                                                            </div>
                                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                                <span class="fileinput-new">Select file</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file" name="r_dependant_birth_document[<?php echo $dp; ?>]" class="form-dependant-<?php echo $dp; ?>" />
                                                                            </span>
                                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><strong>Marriage Certificate</strong></label>
                                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                            <div class="form-control" data-trigger="fileinput">
                                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                <span class="fileinput-filename"></span>
                                                                            </div>
                                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                                <span class="fileinput-new">Select file</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file" name="r_dependant_marriage_document[<?php echo $dp; ?>]" class="form-dependant-<?php echo $dp; ?>" />
                                                                            </span>
                                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><strong>IMM13</strong></label>
                                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                            <div class="form-control" data-trigger="fileinput">
                                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                <span class="fileinput-filename"></span>
                                                                            </div>
                                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                                <span class="fileinput-new">Select file</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file" name="r_dependant_imm13_document[<?php echo $dp; ?>]" class="form-dependant-<?php echo $dp; ?>" />
                                                                            </span>
                                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><strong>Other Document</strong></label>
                                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                            <div class="form-control" data-trigger="fileinput">
                                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                <span class="fileinput-filename"></span>
                                                                            </div>
                                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                                <span class="fileinput-new">Select file</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file" name="r_dependant_other_document[<?php echo $dp; ?>]" class="form-dependant-<?php echo $dp; ?>" />
                                                                            </span>
                                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="slick-camera-dependant-<?php echo $dp; ?>">
                                                        <div>
                                                            <div class="panel panel-default panel-success">
                                                                <div class="panel-heading">
                                                                    <span class="font-bold">Photo</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="snap-dependant-<?php echo $dp; ?>-photo">
                                                                        <img class="image-dependant" src="vendor/sebumi/images/no_image_available.png" width="216" />
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="r_dependant_photo_snap[<?php echo $dp; ?>]" class="snap-dependant-<?php echo $dp; ?>-photo-image form-dependant-<?php echo $dp; ?>" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="panel panel-default panel-success">
                                                                <div class="panel-heading">
                                                                    <span class="font-bold">Passport Document</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="snap-dependant-<?php echo $dp; ?>-passport">
                                                                        <img class="image-dependant" src="vendor/sebumi/images/no_image_available.png" width="216" />
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="r_dependant_passport_snap[<?php echo $dp; ?>]" class="snap-dependant-<?php echo $dp; ?>-passport-image form-dependant-<?php echo $dp; ?>" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="panel panel-default panel-success">
                                                                <div class="panel-heading">
                                                                    <span class="font-bold">Birth Document</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="snap-dependant-<?php echo $dp; ?>-birth">
                                                                        <img class="image-dependant" src="vendor/sebumi/images/no_image_available.png" width="216" />
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="r_dependant_birth_snap[<?php echo $dp; ?>]" class="snap-dependant-<?php echo $dp; ?>-birth-image form-dependant-<?php echo $dp; ?>" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="panel panel-default panel-success">
                                                                <div class="panel-heading">
                                                                    <span class="font-bold">Marriage Document</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="snap-dependant-<?php echo $dp; ?>-marriage">
                                                                        <img class="image-dependant" src="vendor/sebumi/images/no_image_available.png" width="216" />
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="r_dependant_marriage_snap[<?php echo $dp; ?>]" class="snap-dependant-<?php echo $dp; ?>-marriage-image form-dependant-<?php echo $dp; ?>" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="panel panel-default panel-success">
                                                                <div class="panel-heading">
                                                                    <span class="font-bold">IMM13 Document</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="snap-dependant-<?php echo $dp; ?>-imm13">
                                                                        <img class="image-dependant" src="vendor/sebumi/images/no_image_available.png" width="216" />
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="r_dependant_imm13_snap[<?php echo $dp; ?>]" class="snap-dependant-<?php echo $dp; ?>-imm13-image form-dependant-<?php echo $dp; ?>" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="panel panel-default panel-success">
                                                                <div class="panel-heading">
                                                                    <span class="font-bold">Other Document</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="snap-dependant-<?php echo $dp; ?>-other">
                                                                        <img class="image-dependant" src="vendor/sebumi/images/no_image_available.png" width="216" />
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="r_dependant_other_snap[<?php echo $dp; ?>]" class="snap-dependant-<?php echo $dp; ?>-other-image form-dependant-<?php echo $dp; ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Personal</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Given Name</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <input type="text" name="r_dependant_given_name[<?php echo $dp; ?>]" class="form-control form-dependant-<?php echo $dp; ?>" placeholder="Given Name" required="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Middle Name</strong></label>
                                                        <input type="text" name="r_dependant_middle_name[<?php echo $dp; ?>]" class="form-control form-dependant-<?php echo $dp; ?>" placeholder="Middle Name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Last Name</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <input type="text" name="r_dependant_last_name[<?php echo $dp; ?>]" class="form-control form-dependant-<?php echo $dp; ?>" placeholder="Last Name" required="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 1)</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <input type="text" name="r_dependant_address1[<?php echo $dp; ?>]" class="form-control form-dependant-<?php echo $dp; ?>" placeholder="Address (Line 1)" required="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Date Of Birth</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="r_dependant_birth_date[<?php echo $dp; ?>]" class="form-control form-dependant-<?php echo $dp; ?>" placeholder="Date Of Birth" required="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Gender</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <?php
                                                            echo CHtml::dropDownList('r_dependant_gender['.$dp.']', null, $list_gender,
                                                            array(
                                                                'empty' => 'Select Gender',
                                                                'class' => 'form-control form-dependant-'.$dp,
                                                                'required' => true
                                                            ));
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 2)</strong></label>
                                                        <input type="text" name="r_dependant_address2[<?php echo $dp; ?>]" class="form-control form-dependant-<?php echo $dp; ?>" id="form-required-dependant-<?php echo $dp; ?>-6" placeholder="Address (Line 2)" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Nationality</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <?php
                                                            echo CHtml::dropDownList('r_dependant_nationality['.$dp.']', null, $list_nationality,
                                                            array(
                                                                'empty' => 'Select Nationality',
                                                                'class' => 'form-control form-dependant-'.$dp,
                                                                'required' => true
                                                            ));
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Contact Number</strong></label>
                                                        <input type="text" name="r_dependant_contact[<?php echo $dp; ?>]" class="form-control form-dependant-<?php echo $dp; ?>" placeholder="Contact Number" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 3)</strong></label>
                                                        <input type="text" name="r_dependant_address3[<?php echo $dp; ?>]" class="form-control form-dependant-<?php echo $dp; ?>" placeholder="Address (Line 3)" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>District</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <?php
                                                            echo CHtml::dropDownList('r_dependant_district['.$dp.']', null, $list_district,
                                                            array(
                                                                'empty' => 'Select District',
                                                                'class' => 'form-control form-dependant-'.$dp,
                                                                'required' => true
                                                            ));
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Relation</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <?php
                                                            echo CHtml::dropDownList('r_dependant_relation['.$dp.']', null, $list_relation,
                                                            array(
                                                                'empty' => 'Select Relation',
                                                                'class' => 'form-control form-dependant-'.$dp,
                                                                'required' => true
                                                            ));
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Passport</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Number</strong></label>
                                                        <input type="text" name="r_dependant_passport_number[<?php echo $dp; ?>]" class="form-control form-dependant-<?php echo $dp; ?>" placeholder="Passport Number" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Status</strong></label>
                                                        <?php
                                                            echo CHtml::dropDownList('r_dependant_passport_status['.$dp.']', null, $list_status,
                                                            array(
                                                                'empty' => 'Select Status',
                                                                'class' => 'form-control form-dependant-'.$dp,
                                                            ));
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Issue Date</strong></label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="r_dependant_passport_issuedate[<?php echo $dp; ?>]" class="form-control form-dependant-<?php echo $dp; ?>" placeholder="Passport Issue Date" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Expiry Date</strong></label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="r_dependant_passport_expirydate[<?php echo $dp; ?>]" class="form-control form-dependant-<?php echo $dp; ?>" placeholder="Passport Expiry Date" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Issue Place</strong></label>
                                                        <input type="text" name="r_dependant_passport_issueplace[<?php echo $dp; ?>]" class="form-control form-dependant-<?php echo $dp; ?>" placeholder="Passport Issue Place" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Entry Point</strong></label>
                                                        <input type="text" name="r_dependant_passport_entrypoint[<?php echo $dp; ?>]" class="form-control form-dependant-<?php echo $dp; ?>" placeholder="Passport Entry Point" />
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="register-applicant" class="btn btn-primary">Register</a>
                    <a class="btn btn-default" data-dismiss="modal">Close</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal inmodal" id="modal-view-applicant">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">View Worker Information</h4>
            </div>
            <form id="form-view-applicant">
                <div class="modal-body">
                    <div class="message-form"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tabs-container">
                                <ul class="nav nav-tabs view-nav">
                                    <li class="view-tab-applicant active">
                                        <a data-toggle="tab" href="#view-pane-applicant">Worker</a>
                                    </li>
                                </ul>
                                <div class="tab-content view-content">
                                    <!-- PANE APPLICANT -->
                                    <div id="view-pane-applicant" class="tab-pane active">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Document</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4>Document Upload</h4>
                                                    <div class="ibox-content">
                                                        <div id="applicant-gallery" class="lightBoxGallery applicant-gallery"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Clinic</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><strong>Doctor</strong></label>
                                                        <input type="text" name="v_clinic" class="form-control clinic-doctor" placeholder="Doctor" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Personal</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><strong>Worker ID</strong></label>
                                                        <input type="text" name="v_guid" class="form-control applicant-guid" placeholder="Applicant ID" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Given Name</strong></label>
                                                        <input type="text" name="v_given_name" class="form-control applicant-given-name" placeholder="Given Name" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Middle Name</strong></label>
                                                        <input type="text" name="v_middle_name" class="form-control applicant-middle-name" placeholder="Middle Name" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Last Name</strong></label>
                                                        <input type="text" name="v_last_name" class="form-control applicant-last-name" placeholder="Last Name" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 1)</strong></label>
                                                        <input type="text" name="v_address1" class="form-control applicant-address1" placeholder="Address (Line 1)" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Date Of Birth</strong></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="v_birth_date" class="form-control applicant-birth-date" placeholder="Date Of Birth" disabled="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Gender</strong></label>
                                                        <input type="text" name="v_gender" class="form-control applicant-gender" placeholder="Gender" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 2)</strong></label>
                                                        <input type="text" name="v_address2" class="form-control applicant-address2" placeholder="Address (Line 2)" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Nationality</strong></label>
                                                        <input type="text" name="v_nationality" class="form-control applicant-nationality" placeholder="Nationality" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Job Sector</strong></label>
                                                        <input type="text" name="v_job" class="form-control applicant-job" placeholder="Job Sector" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 3)</strong></label>
                                                        <input type="text" name="v_address3" class="form-control applicant-address3" placeholder="Address (Line 3)" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>District</strong></label>
                                                        <input type="text" name="v_district" class="form-control applicant-district" placeholder="District" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Contact Number</strong></label>
                                                        <input type="text" name="v_contact" class="form-control applicant-contact-number" placeholder="Contact Number" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Job Details</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Malaysian Employer</strong></label>
                                                        <input type="text" name="v_employer_name" class="form-control employer-name" placeholder="Employer Name" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 1)</strong></label>
                                                        <input type="text" name="v_employer_address1" class="form-control employer-address1" placeholder="Address (Line 1)" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>District</strong></label>
                                                        <input type="text" name="v_employer_district" class="form-control employer-district" placeholder="District" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 2)</strong></label>
                                                        <input type="text" name="v_employer_address2" class="form-control employer-address2" placeholder="Address (Line 2)" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Contact Number</strong></label>
                                                        <input type="text" name="v_employer_contact" class="form-control employer-contact-number" placeholder="Contact Number" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 3)</strong></label>
                                                        <input type="text" name="v_employer_address3" class="form-control employer-address3" placeholder="Address (Line 3)" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Passport</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Number</strong></label>
                                                        <input type="text" name="v_passport_number" class="form-control applicant-passport-number" placeholder="Passport Number" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Status</strong></label>
                                                        <input type="text" name="v_passport_status" class="form-control applicant-passport-status" placeholder="Passport Status" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Issue Date</strong></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="v_passport_issuedate" class="form-control applicant-passport-issuedate" placeholder="Passport Issue Date" disabled="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Expiry Date</strong></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="v_passport_expirydate" class="form-control applicant-passport-expirydate" placeholder="Passport Expiry Date" disabled="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Issue Place</strong></label>
                                                        <input type="text" name="v_passport_issueplace" class="form-control applicant-passport-issueplace" placeholder="Passport Issue Place" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Entry Point</strong></label>
                                                        <input type="text" name="v_passport_entrypoint" class="form-control applicant-passport-entrypoint" placeholder="Passport Entry Point" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">PLKS</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>PLKS Number</strong></label>
                                                        <input type="text" name="v_plks_number" class="form-control applicant-plks-number" placeholder="PLKS Number" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>BPA Number</strong></label>
                                                        <input type="text" name="v_bpa_number" class="form-control applicant-bpa-number" placeholder="BPA Number" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>PLKS Issue Date</strong></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="v_plks_issuedate" class="form-control applicant-plks-issuedate" placeholder="PLKS Issue Date" disabled="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>PLKS Expiry Date</strong></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="r_plks_expirydate" class="form-control applicant-plks-expirydate" placeholder="PLKS Expiry Date" disabled="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Next Of Kin</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Given Name</strong></label>
                                                        <input type="text" name="v_nextofkin_given_name" class="form-control nextofkin-given-name" placeholder="Given Name" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Middle Name</strong></label>
                                                        <input type="text" name="v_nextofkin_middle_name" class="form-control nextofkin-middle-name" placeholder="Middle Name" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Last Name</strong></label>
                                                        <input type="text" name="v_nextofkin_last_name" class="form-control nextofkin-last-name" placeholder="Last Name" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 1)</strong></label>
                                                        <input type="text" name="v_nextofkin_address1" class="form-control nextofkin-address1" placeholder="Address (Line 1)" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Date Of Birth</strong></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="v_nextofkin_birth_date" class="form-control nextofkin-birth-date" placeholder="Date Of Birth" disabled="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Gender</strong></label>
                                                        <input type="text" name="v_nextofkin_gender" class="form-control nextofkin-gender" placeholder="Gender" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 2)</strong></label>
                                                        <input type="text" name="v_nextofkin_address2" class="form-control nextofkin-address2" placeholder="Address (Line 2)" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Nationality</strong></label>
                                                        <input type="text" name="v_nextofkin_nationality" class="form-control nextofkin-nationality" placeholder="Nationality" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Contact Number</strong></label>
                                                        <input type="text" name="v_nextofkin_contact" class="form-control nextofkin-contact-number" placeholder="Contact Number" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 3)</strong></label>
                                                        <input type="text" name="v_nextofkin_address3" class="form-control nextofkin-address3" placeholder="Address (Line 3)" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>District</strong></label>
                                                        <input type="text" name="v_nextofkin_district" class="form-control nextofkin-district" placeholder="District" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Relation</strong></label>
                                                        <input type="text" name="v_nextofkin_relation" class="form-control nextofkin-relation" placeholder="Relation" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- PANE DEPENDANT -->
                                    <?php for($dp = 1; $dp < 6; $dp++){ ?>
                                    <div id="view-pane-dependant-<?php echo $dp; ?>" class="tab-pane pane-dependant">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Document</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4>Document Upload</h4>
                                                    <div id="dependant-<?php echo $dp; ?>-gallery" class="lightBoxGallery dependant-<?php echo $dp; ?>-gallery"></div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Personal</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><strong>Next Of Kin ID</strong></label>
                                                        <input type="text" name="v_dependant_guid[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-guid" placeholder="Dependant ID" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Given Name</strong></label>
                                                        <input type="text" name="v_dependant_given_name[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-given-name" placeholder="Given Name" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Middle Name</strong></label>
                                                        <input type="text" name="v_dependant_middle_name[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-middle-name" placeholder="Middle Name" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Last Name</strong></label>
                                                        <input type="text" name="v_dependant_last_name[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-last-name" placeholder="Last Name" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 1)</strong></label>
                                                        <input type="text" name="v_dependant_address1[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-address1" placeholder="Address (Line 1)" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Date Of Birth</strong></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="v_dependant_birth_date[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-birth-date" placeholder="Date Of Birth" disabled="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Gender</strong></label>
                                                        <input type="text" name="v_dependant_gender[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-gender" placeholder="Gender" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 2)</strong></label>
                                                        <input type="text" name="v_dependant_address2[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-address2" placeholder="Address (Line 2)" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Nationality</strong></label>
                                                        <input type="text" name="v_dependant_nationality[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-nationality" placeholder="Nationality" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Contact Number</strong></label>
                                                        <input type="text" name="v_dependant_contact[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-contact-number" placeholder="Contact Number" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 3)</strong></label>
                                                        <input type="text" name="v_dependant_address3[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-address3" placeholder="Address (Line 3)" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>District</strong></label>
                                                        <input type="text" name="v_dependant_district[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-district" placeholder="District" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Relation</strong></label>
                                                        <input type="text" name="v_dependant_relation[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-relation" placeholder="Relation" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Passport</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Number</strong></label>
                                                        <input type="text" name="r_dependant_passport_number[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-passport-number" placeholder="Passport Number" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Status</strong></label>
                                                        <input type="text" name="r_dependant_passport_status[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-passport-status" placeholder="Passport Status" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Issue Date</strong></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="v_dependant_passport_issuedate[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-passport-issuedate" placeholder="Passport Issue Date" disabled="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Expiry Date</strong></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="v_dependant_passport_expirydate[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-passport-expirydate" placeholder="Passport Expiry Date" disabled="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Issue Place</strong></label>
                                                        <input type="text" name="v_dependant_passport_issueplace[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-passport-issueplace" placeholder="Passport Issue Place" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Entry Point</strong></label>
                                                        <input type="text" name="v_dependant_passport_entrypoint[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-passport-entrypoint" placeholder="Passport Entry Point" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-default" data-dismiss="modal">Close</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal inmodal" id="modal-edit-applicant">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Edit Worker Information</h4>
            </div>
            <form id="form-edit-applicant" data-smk-icon="glyphicon-remove-sign">
                <div class="modal-body">
                    <div class="message-form"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <span class="label label-primary2">Web Camera</span>
                                </div>
                                <div class="hr-line-solid"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pull-left">
                                                <a class="btn btn-sm btn-outline btn-success snapshot-take-edit">
                                                    <i class="fa fa-camera"></i> Take Snapshot
                                                </a>
                                                <a class="btn btn-sm btn-outline btn-success another-take-edit">
                                                    <i class="fa fa-camera"></i> Take Another
                                                </a>
                                            </div>
                                            <div class="pull-right">
                                                <h4 class="text-left m">
                                                    <i class="fa fa-camera"></i> Camera
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row h-150">&nbsp;</div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="label label-primary2">Clinic</span>
                                        </div>
                                        <div class="hr-line-solid"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><strong>Clinic</strong></label>
                                                <?php
                                                    echo CHtml::dropDownList('e_clinic', null, $list_clinic,
                                                    array(
                                                        'empty' => 'Select Clinic',
                                                        'class' => 'form-control clinic-doctor',
                                                        'required' => true
                                                    ));
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <div class="ibox-content">
                                            <div class="sebumi-camera-edit"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tabs-container">
                                <ul class="nav nav-tabs edit-nav">
                                    <li class="tab-applicant active">
                                        <a data-toggle="tab" href="#edit-pane-applicant">Worker</a>
                                    </li>
                                </ul>
                                <div class="tab-content edit-content">
                                    <!-- PANE APPLICANT -->
                                    <div id="edit-pane-applicant" class="tab-pane active">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="pull-right">
                                                        <a class="btn btn-sm btn-outline btn-success applicant-edit-photo-save">
                                                            <i class="fa fa-camera"></i> Photo
                                                        </a>
                                                        <a class="btn btn-sm btn-outline btn-success applicant-edit-passport-save">
                                                            <i class="fa fa-camera"></i> Passport
                                                        </a>
                                                        <a class="btn btn-sm btn-outline btn-success applicant-edit-birth-save">
                                                            <i class="fa fa-camera"></i> Birth
                                                        </a>
                                                        <a class="btn btn-sm btn-outline btn-success applicant-edit-national-save">
                                                            <i class="fa fa-camera"></i> National ID
                                                        </a>
                                                        <a class="btn btn-sm btn-outline btn-success applicant-edit-marriage-save">
                                                            <i class="fa fa-camera"></i> Marriage
                                                        </a>
                                                        <!--
                                                        <a class="btn btn-sm btn-outline btn-success applicant-edit-imm13-save">
                                                            <i class="fa fa-camera"></i> IMM13
                                                        </a>
                                                        -->
                                                        <a class="btn btn-sm btn-outline btn-success applicant-edit-other-save">
                                                            <i class="fa fa-camera"></i> Other
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Document</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4>Document Upload</h4>
                                                    <div class="ibox-content">
                                                        <div class="scroll-content">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><strong>Photo</strong></label>
                                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                            <div class="form-control" data-trigger="fileinput">
                                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                <span class="fileinput-filename"></span>
                                                                            </div>
                                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                                <span class="fileinput-new">Select file</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file" name="e_photo_document" />
                                                                            </span>
                                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><strong>Passport</strong></label>
                                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                            <div class="form-control" data-trigger="fileinput">
                                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                <span class="fileinput-filename"></span>
                                                                            </div>
                                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                                <span class="fileinput-new">Select file</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file" name="e_passport_document" />
                                                                            </span>
                                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><strong>Birth Certificate</strong></label>
                                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                            <div class="form-control" data-trigger="fileinput">
                                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                <span class="fileinput-filename"></span>
                                                                            </div>
                                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                                <span class="fileinput-new">Select file</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file" name="e_birth_document" />
                                                                            </span>
                                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><strong>National ID</strong></label>
                                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                            <div class="form-control" data-trigger="fileinput">
                                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                <span class="fileinput-filename"></span>
                                                                            </div>
                                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                                <span class="fileinput-new">Select file</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file" name="e_national_document" />
                                                                            </span>
                                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><strong>Marriage Certificate</strong></label>
                                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                            <div class="form-control" data-trigger="fileinput">
                                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                <span class="fileinput-filename"></span>
                                                                            </div>
                                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                                <span class="fileinput-new">Select file</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file" name="e_marriage_document" />
                                                                            </span>
                                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><strong>IMM13</strong></label>
                                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                            <div class="form-control" data-trigger="fileinput">
                                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                <span class="fileinput-filename"></span>
                                                                            </div>
                                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                                <span class="fileinput-new">Select file</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file" name="e_imm13_document" />
                                                                            </span>
                                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            -->
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><strong>Other Document</strong></label>
                                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                            <div class="form-control" data-trigger="fileinput">
                                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                <span class="fileinput-filename"></span>
                                                                            </div>
                                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                                <span class="fileinput-new">Select file</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file" name="e_other_document" />
                                                                            </span>
                                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="slick-camera-applicant-edit">
                                                        <div>
                                                            <div class="panel panel-default panel-success">
                                                                <div class="panel-heading">
                                                                    <span class="font-bold">Photo</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="snap-applicant-edit-photo">
                                                                        <!-- SNAP APPLICANT EDIT PHOTO -->
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="e_applicant_photo_snap" class="snap-applicant-edit-photo-image" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="panel panel-default panel-success">
                                                                <div class="panel-heading">
                                                                    <span class="font-bold">Passport Document</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="snap-applicant-edit-passport">
                                                                        <!-- SNAP APPLICANT EDIT PASSPORT -->
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="e_applicant_passport_snap" class="snap-applicant-edit-passport-image" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="panel panel-default panel-success">
                                                                <div class="panel-heading">
                                                                    <span class="font-bold">Birth Document</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="snap-applicant-edit-birth">
                                                                        <!-- SNAP APPLICANT EDIT BIRTH -->
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="e_applicant_birth_snap" class="snap-applicant-edit-birth-image" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="panel panel-default panel-success">
                                                                <div class="panel-heading">
                                                                    <span class="font-bold">National ID Document</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="snap-applicant-edit-national">
                                                                        <!-- SNAP APPLICANT EDIT NATIONAL -->
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="e_applicant_national_snap" class="snap-applicant-edit-national-image" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="panel panel-default panel-success">
                                                                <div class="panel-heading">
                                                                    <span class="font-bold">Marriage Document</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="snap-applicant-edit-marriage">
                                                                        <!-- SNAP APPLICANT EDIT MARRIAGE -->
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="e_applicant_marriage_snap" class="snap-applicant-edit-marriage-image" />
                                                            </div>
                                                        </div>
                                                        <!--
                                                        <div>
                                                            <div class="panel panel-default panel-success">
                                                                <div class="panel-heading">
                                                                    <span class="font-bold">IMM13 Document</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="snap-applicant-edit-imm13">
                                                                    -->
                                                                        <!-- SNAP APPLICANT EDIT IMM13 -->
                                                                    <!--    
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="e_applicant_imm13_snap" class="snap-applicant-edit-imm13-image" />
                                                            </div>
                                                        </div>
                                                        -->
                                                        <div>
                                                            <div class="panel panel-default panel-success">
                                                                <div class="panel-heading">
                                                                    <span class="font-bold">Other Document</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="snap-applicant-edit-other">
                                                                        <!-- SNAP APPLICANT EDIT OTHER -->
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="e_applicant_other_snap" class="snap-applicant-edit-other-image" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Personal</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><strong>Applicant ID</strong></label>
                                                        <input type="text" name="edit_guid" class="form-control applicant-guid" placeholder="Applicant ID" disabled="true" />
                                                        <input type="hidden" name="e_guid" class="applicant-guid2" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Given Name</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <input type="text" name="e_given_name" class="form-control applicant-given-name" placeholder="Given Name" required="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Middle Name</strong></label>
                                                        <input type="text" name="e_middle_name" class="form-control applicant-middle-name" placeholder="Middle Name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Last Name</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <input type="text" name="e_last_name" class="form-control applicant-last-name" placeholder="Last Name" required="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 1)</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <input type="text" name="e_address1" class="form-control applicant-address1" placeholder="Address (Line 1)" required="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Date Of Birth</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="e_birth_date" class="form-control applicant-birth-date" placeholder="Date Of Birth" required="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Gender</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <?php
                                                            echo CHtml::dropDownList('e_gender', null, $list_gender,
                                                            array(
                                                                'empty' => 'Select Gender',
                                                                'class' => 'form-control applicant-gender',
                                                                'required' => true
                                                            ));
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 2)</strong></label>
                                                        <input type="text" name="e_address2" class="form-control applicant-address2" placeholder="Address (Line 2)" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Nationality</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <?php
                                                            echo CHtml::dropDownList('e_nationality', null, $list_nationality,
                                                            array(
                                                                'empty' => 'Select Nationality',
                                                                'class' => 'form-control applicant-nationality',
                                                                'required' => true
                                                            ));
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Job Sector</strong></label>
                                                        <?php
                                                            echo CHtml::dropDownList('e_job_sector', null, $list_job,
                                                            array(
                                                                'empty' => 'Select Job Sector',
                                                                'class' => 'form-control applicant-job'
                                                            ));
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 3)</strong></label>
                                                        <input type="text" name="e_address3" class="form-control applicant-address3" placeholder="Address (Line 3)" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>District</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <?php
//                                                            echo CHtml::dropDownList('e_district', null, $list_district,
//                                                            array(
//                                                                'empty' => 'Select District',
//                                                                'class' => 'form-control applicant-district',
//                                                                'required' => true
//                                                            ));
                                                        ?>
                                                        <input type="text" name="e_district" class="form-control applicant-district" placeholder="District" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Contact Number</strong></label>
                                                        <input type="text" name="e_contact" class="form-control applicant-contact-number" placeholder="Contact Number" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Job Order</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Malaysian Employer</strong></label>
                                                        <input type="text" name="e_employer_name" class="form-control employer-name" placeholder="Employer Name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 1)</strong></label>
                                                        <input type="text" name="e_employer_address1" class="form-control employer-address1" placeholder="Address (Line 1)" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>District</strong></label>
                                                        <?php
//                                                            echo CHtml::dropDownList('e_employer_district', null, $list_district,
//                                                            array(
//                                                                'empty' => 'Select District',
//                                                                'class' => 'form-control employer-district'
//                                                            ));
                                                        ?>
                                                        <input type="text" name="e_employer_district" class="form-control employer-district" placeholder="District" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 2)</strong></label>
                                                        <input type="text" name="e_employer_address2" class="form-control employer-address2" placeholder="Address (Line 2)" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Contact Number</strong></label>
                                                        <input type="text" name="e_employer_contact" class="form-control employer-contact-number" placeholder="Contact Number" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 3)</strong></label>
                                                        <input type="text" name="e_employer_address3" class="form-control employer-address3" placeholder="Address (Line 3)" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Passport</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Number</strong></label>
                                                        <input type="text" name="e_passport_number" class="form-control applicant-passport-number" placeholder="Passport Number" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Status</strong></label>
                                                        <?php
                                                            echo CHtml::dropDownList('e_passport_status', null, $list_status,
                                                            array(
                                                                'empty' => 'Select Status',
                                                                'class' => 'form-control applicant-passport-status',
                                                            ));
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Issue Date</strong></label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="e_passport_issuedate" class="form-control applicant-passport-issuedate" placeholder="Passport Issue Date" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Expiry Date</strong></label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="e_passport_expirydate" class="form-control applicant-passport-expirydate" placeholder="Passport Expiry Date" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Issue Place</strong></label>
                                                        <input type="text" name="e_passport_issueplace" class="form-control applicant-passport-issueplace" placeholder="Passport Issue Place" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Entry Point</strong></label>
                                                        <input type="text" name="e_passport_entrypoint" class="form-control applicant-passport-entrypoint" placeholder="Passport Entry Point" />
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!--
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">PLKS</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>PLKS Number</strong></label>
                                                        <input type="text" name="e_plks_number" class="form-control applicant-plks-number" placeholder="PLKS Number" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>BPA Number</strong></label>
                                                        <input type="text" name="e_bpa_number" class="form-control applicant-bpa-number" placeholder="BPA Number" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>PLKS Issue Date</strong></label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="e_plks_issuedate" class="form-control applicant-plks-issuedate" placeholder="PLKS Issue Date" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>PLKS Expiry Date</strong></label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="e_plks_expirydate" class="form-control applicant-plks-expirydate" placeholder="PLKS Expiry Date" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            -->
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Next Of Kin</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Given Name</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <input type="text" name="e_nextkin_given_name" class="form-control nextofkin-given-name" placeholder="Given Name" required="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Middle Name</strong></label>
                                                        <input type="text" name="e_nextkin_middle_name" class="form-control nextofkin-middle-name" placeholder="Middle Name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Last Name</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <input type="text" name="e_nextkin_last_name" class="form-control nextofkin-last-name" placeholder="Last Name" required="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 1)</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <input type="text" name="e_nextkin_address1" class="form-control nextofkin-address1" placeholder="Address (Line 1)" required="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Date Of Birth</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="e_nextkin_birth_date" class="form-control nextofkin-birth-date" placeholder="Date Of Birth" required="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Gender</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <?php
                                                            echo CHtml::dropDownList('e_nextkin_gender', null, $list_gender,
                                                            array(
                                                                'empty' => 'Select Gender',
                                                                'class' => 'form-control nextofkin-gender',
                                                                'required' => true
                                                            ));
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 2)</strong></label>
                                                        <input type="text" name="e_nextkin_address2" class="form-control nextofkin-address2" placeholder="Address (Line 2)" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Nationality</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <?php
                                                            echo CHtml::dropDownList('e_nextkin_nationality', null, $list_nationality,
                                                            array(
                                                                'empty' => 'Select Nationality',
                                                                'class' => 'form-control nextofkin-nationality',
                                                                'required' => true
                                                            ));
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Contact Number</strong></label>
                                                        <input type="text" name="e_nextkin_contact" class="form-control nextofkin-contact-number" placeholder="Contact Number" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 3)</strong></label>
                                                        <input type="text" name="e_nextkin_address3" class="form-control nextofkin-address3" placeholder="Address (Line 3)" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>District</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <?php
//                                                            echo CHtml::dropDownList('e_nextkin_district', null, $list_district,
//                                                            array(
//                                                                'empty' => 'Select District',
//                                                                'class' => 'form-control nextofkin-district',
//                                                                'required' => true
//                                                            ));
                                                        ?>
                                                        <input type="text" name="e_nextkin_district" class="form-control nextofkin-district" placeholder="District" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Relation</strong></label>
                                                        <?php
                                                            echo CHtml::dropDownList('e_nextkin_relation', null, $list_relation,
                                                            array(
                                                                'empty' => 'Select Relation',
                                                                'class' => 'form-control nextofkin-relation',
                                                                'required' => true
                                                            ));
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- PANE DEPENDANT -->
                                    <?php for($dp = 1; $dp < 6; $dp++){ ?>
                                    <div id="edit-pane-dependant-<?php echo $dp; ?>" class="tab-pane pane-dependant">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="pull-right">
                                                        <a class="btn btn-sm btn-outline btn-success dependant-<?php echo $dp; ?>-edit-photo-save">
                                                            <i class="fa fa-camera"></i> Photo
                                                        </a>
                                                        <a class="btn btn-sm btn-outline btn-success dependant-<?php echo $dp; ?>-edit-passport-save">
                                                            <i class="fa fa-camera"></i> Passport
                                                        </a>
                                                        <a class="btn btn-sm btn-outline btn-success dependant-<?php echo $dp; ?>-edit-birth-save">
                                                            <i class="fa fa-camera"></i> Birth
                                                        </a>
                                                        <a class="btn btn-sm btn-outline btn-success dependant-<?php echo $dp; ?>-edit-marriage-save">
                                                            <i class="fa fa-camera"></i> Marriage
                                                        </a>
                                                        <a class="btn btn-sm btn-outline btn-success dependant-<?php echo $dp; ?>-edit-imm13-save">
                                                            <i class="fa fa-camera"></i> IMM13
                                                        </a>
                                                        <a class="btn btn-sm btn-outline btn-success dependant-<?php echo $dp; ?>-edit-other-save">
                                                            <i class="fa fa-camera"></i> Other
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Document</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4>Document Upload</h4>
                                                    <div class="ibox-content">
                                                        <div class="scroll-content">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><strong>Passport</strong></label>
                                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                            <div class="form-control" data-trigger="fileinput">
                                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                <span class="fileinput-filename"></span>
                                                                            </div>
                                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                                <span class="fileinput-new">Select file</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file" name="e_dependant_passport_document[<?php echo $dp; ?>]" class="form-edit-dependant-<?php echo $dp; ?>" />
                                                                            </span>
                                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><strong>Birth Certificate</strong></label>
                                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                            <div class="form-control" data-trigger="fileinput">
                                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                <span class="fileinput-filename"></span>
                                                                            </div>
                                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                                <span class="fileinput-new">Select file</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file" name="e_dependant_birth_document[<?php echo $dp; ?>]" class="form-edit-dependant-<?php echo $dp; ?>" />
                                                                            </span>
                                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><strong>Marriage Certificate</strong></label>
                                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                            <div class="form-control" data-trigger="fileinput">
                                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                <span class="fileinput-filename"></span>
                                                                            </div>
                                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                                <span class="fileinput-new">Select file</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file" name="e_dependant_marriage_document[<?php echo $dp; ?>]" class="form-edit-dependant-<?php echo $dp; ?>" />
                                                                            </span>
                                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><strong>IMM13</strong></label>
                                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                            <div class="form-control" data-trigger="fileinput">
                                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                <span class="fileinput-filename"></span>
                                                                            </div>
                                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                                <span class="fileinput-new">Select file</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file" name="e_dependant_imm13_document[<?php echo $dp; ?>]" class="form-edit-dependant-<?php echo $dp; ?>" />
                                                                            </span>
                                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><strong>Other Document</strong></label>
                                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                            <div class="form-control" data-trigger="fileinput">
                                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                <span class="fileinput-filename"></span>
                                                                            </div>
                                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                                <span class="fileinput-new">Select file</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file" name="e_dependant_other_document[<?php echo $dp; ?>]" class="form-edit-dependant-<?php echo $dp; ?>" />
                                                                            </span>
                                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="slick-camera-dependant-<?php echo $dp; ?>-edit">
                                                        <div>
                                                            <div class="panel panel-default panel-success">
                                                                <div class="panel-heading">
                                                                    <span class="font-bold">Photo</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="snap-dependant-<?php echo $dp; ?>-edit-photo">
                                                                        <!-- SNAP DEPENDANT EDIT PHOTO -->
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="e_dependant_photo_snap[<?php echo $dp; ?>]" class="snap-dependant-<?php echo $dp; ?>-edit-photo-image form-edit-dependant-<?php echo $dp; ?>" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="panel panel-default panel-success">
                                                                <div class="panel-heading">
                                                                    <span class="font-bold">Passport Document</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="snap-dependant-<?php echo $dp; ?>-edit-passport">
                                                                        <!-- SNAP DEPENDANT EDIT PASSPORT -->
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="e_dependant_passport_snap[<?php echo $dp; ?>]" class="snap-dependant-<?php echo $dp; ?>-edit-passport-image form-edit-dependant-<?php echo $dp; ?>" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="panel panel-default panel-success">
                                                                <div class="panel-heading">
                                                                    <span class="font-bold">Birth Document</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="snap-dependant-<?php echo $dp; ?>-edit-birth">
                                                                        <!-- SNAP DEPENDANT EDIT BIRTH -->
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="e_dependant_birth_snap[<?php echo $dp; ?>]" class="snap-dependant-<?php echo $dp; ?>-edit-birth-image form-edit-dependant-<?php echo $dp; ?>" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="panel panel-default panel-success">
                                                                <div class="panel-heading">
                                                                    <span class="font-bold">Marriage Document</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="snap-dependant-<?php echo $dp; ?>-edit-marriage">
                                                                        <!-- SNAP DEPENDANT EDIT MARRIAGE -->
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="e_dependant_marriage_snap[<?php echo $dp; ?>]" class="snap-dependant-<?php echo $dp; ?>-edit-marriage-image form-edit-dependant-<?php echo $dp; ?>" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="panel panel-default panel-success">
                                                                <div class="panel-heading">
                                                                    <span class="font-bold">IMM13 Document</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="snap-dependant-<?php echo $dp; ?>-edit-imm13">
                                                                        <!-- SNAP DEPENDANT EDIT IMM13 -->
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="e_dependant_imm13_snap[<?php echo $dp; ?>]" class="snap-dependant-<?php echo $dp; ?>-edit-imm13-image form-edit-dependant-<?php echo $dp; ?>" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="panel panel-default panel-success">
                                                                <div class="panel-heading">
                                                                    <span class="font-bold">Other Document</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="snap-dependant-<?php echo $dp; ?>-edit-other">
                                                                        <!-- SNAP DEPENDANT EDIT OTHER -->
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="e_dependant_other_snap[<?php echo $dp; ?>]" class="snap-dependant-<?php echo $dp; ?>-edit-other-image form-edit-dependant-<?php echo $dp; ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Personal</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><strong>Dependant ID</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <input type="text" name="edit_dependant_guid[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-guid" placeholder="Dependant ID" disabled="true" />
                                                        <input type="hidden" name="e_dependant_guid[<?php echo $dp; ?>]" class="dependant-<?php echo $dp; ?>-guid2 form-edit-dependant-<?php echo $dp; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Given Name</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <input type="text" name="e_dependant_given_name[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-given-name form-edit-dependant-<?php echo $dp; ?>" placeholder="Given Name" required="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Middle Name</strong></label>
                                                        <input type="text" name="e_dependant_middle_name[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-middle-name form-edit-dependant-<?php echo $dp; ?>" placeholder="Middle Name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Last Name</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <input type="text" name="e_dependant_last_name[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-last-name form-edit-dependant-<?php echo $dp; ?>" placeholder="Last Name" required="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 1)</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <input type="text" name="e_dependant_address1[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-address1 form-edit-dependant-<?php echo $dp; ?>" placeholder="Address (Line 1)" required="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Date Of Birth</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="e_dependant_birth_date[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-birth-date form-edit-dependant-<?php echo $dp; ?>" placeholder="Date Of Birth" required="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Gender</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <?php
                                                            echo CHtml::dropDownList('e_dependant_gender['.$dp.']', null, $list_gender,
                                                            array(
                                                                'empty' => 'Select Gender',
                                                                'class' => 'form-control dependant-'.$dp.'-gender form-edit-dependant-'.$dp,
                                                                'required' => true
                                                            ));
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 2)</strong></label>
                                                        <input type="text" name="e_dependant_address2[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-address2 form-edit-dependant-<?php echo $dp; ?>" placeholder="Address (Line 2)" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Nationality</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <?php
                                                            echo CHtml::dropDownList('e_dependant_nationality['.$dp.']', null, $list_nationality,
                                                            array(
                                                                'empty' => 'Select Nationality',
                                                                'class' => 'form-control dependant-'.$dp.'-nationality form-edit-dependant-'.$dp,
                                                                'required' => true
                                                            ));
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Contact Number</strong></label>
                                                        <input type="text" name="e_dependant_contact[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-contact-number form-edit-dependant-<?php echo $dp; ?>" placeholder="Contact Number" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 3)</strong></label>
                                                        <input type="text" name="e_dependant_address3[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-address3 form-edit-dependant-<?php echo $dp; ?>" placeholder="Address (Line 3)" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>District</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <?php
                                                            echo CHtml::dropDownList('e_dependant_district['.$dp.']', null, $list_district,
                                                            array(
                                                                'empty' => 'Select District',
                                                                'class' => 'form-control dependant-'.$dp.'-district form-edit-dependant-'.$dp,
                                                                'required' => true
                                                            ));
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Relation</strong> <i class="fa fa-asterisk text-danger"></i></label>
                                                        <?php
                                                            echo CHtml::dropDownList('e_dependant_relation['.$dp.']', null, $list_relation,
                                                            array(
                                                                'empty' => 'Select Relation',
                                                                'class' => 'form-control dependant-'.$dp.'-relation form-edit-dependant-'.$dp,
                                                                'required' => true
                                                            ));
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Passport</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Number</strong></label>
                                                        <input type="text" name="e_dependant_passport_number[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-passport-number form-edit-dependant-<?php echo $dp; ?>" placeholder="Passport Number" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Status</strong></label>
                                                        <?php
                                                            echo CHtml::dropDownList('e_dependant_passport_status['.$dp.']', null, $list_status,
                                                            array(
                                                                'empty' => 'Select Status',
                                                                'class' => 'form-control dependant-'.$dp.'-passport-status form-edit-dependant-'.$dp,
                                                            ));
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Issue Date</strong></label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="e_dependant_passport_issuedate[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-passport-issuedate form-edit-dependant-<?php echo $dp; ?>" placeholder="Passport Issue Date" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Expiry Date</strong></label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="e_dependant_passport_expirydate[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-passport-expirydate form-edit-dependant-<?php echo $dp; ?>" placeholder="Passport Expiry Date" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Issue Place</strong></label>
                                                        <input type="text" name="e_dependant_passport_issueplace[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-passport-issueplace form-edit-dependant-<?php echo $dp; ?>" placeholder="Passport Issue Place" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>Passport Entry Point</strong></label>
                                                        <input type="text" name="e_dependant_passport_entrypoint[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-passport-entrypoint form-edit-dependant-<?php echo $dp; ?>" placeholder="Passport Entry Point" />
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="update-applicant" class="btn btn-primary">Update</a>
                    <a class="btn btn-default" data-dismiss="modal">Close</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal inmodal" id="modal-delete-applicant">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Delete Worker Information<br />
                    <small>Are you sure to delete this worker?</small>
                </h4>
            </div>
            <form id="form-delete-applicant">
                <div class="modal-body">
                    <div class="message-form"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tabs-container">
                                <ul class="nav nav-tabs delete-nav">
                                    <li class="delete-tab-applicant active">
                                        <a data-toggle="tab" href="#delete-pane-applicant">Worker</a>
                                    </li>
                                </ul>
                                <div class="tab-content delete-content">
                                    <!-- PANE APPLICANT -->
                                    <div id="delete-pane-applicant" class="tab-pane active">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Document</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4>Document Upload</h4>
                                                    <div class="ibox-content">
                                                        <div id="applicant-gallery" class="lightBoxGallery applicant-gallery"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Personal</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><strong>Applicant ID</strong></label>
                                                        <input type="text" name="delete_guid" class="form-control applicant-guid" placeholder="Applicant ID" disabled="true" />
                                                        <input type="hidden" name="d_guid" class="applicant-guid2" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Given Name</strong></label>
                                                        <input type="text" name="d_given_name" class="form-control applicant-given-name" placeholder="Given Name" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Middle Name</strong></label>
                                                        <input type="text" name="d_middle_name" class="form-control applicant-middle-name" placeholder="Middle Name" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Last Name</strong></label>
                                                        <input type="text" name="d_last_name" class="form-control applicant-last-name" placeholder="Last Name" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 1)</strong></label>
                                                        <input type="text" name="d_address1" class="form-control applicant-address1" placeholder="Address (Line 1)" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Date Of Birth</strong></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="d_birth_date" class="form-control applicant-birth-date" placeholder="Date Of Birth" disabled="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Gender</strong></label>
                                                        <input type="text" name="d_gender" class="form-control applicant-gender" placeholder="Gender" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 2)</strong></label>
                                                        <input type="text" name="d_address2" class="form-control applicant-address2" placeholder="Address (Line 2)" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Nationality</strong></label>
                                                        <input type="text" name="d_nationality" class="form-control applicant-nationality" placeholder="Nationality" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Job Sector</strong></label>
                                                        <input type="text" name="d_job" class="form-control applicant-job" placeholder="Job Sector" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 3)</strong></label>
                                                        <input type="text" name="d_address3" class="form-control applicant-address3" placeholder="Address (Line 3)" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>District</strong></label>
                                                        <input type="text" name="d_district" class="form-control applicant-district" placeholder="District" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Contact Number</strong></label>
                                                        <input type="text" name="d_contact" class="form-control applicant-contact-number" placeholder="Contact Number" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- PANE DEPENDANT -->
                                    <?php for($dp = 1; $dp < 6; $dp++){ ?>
                                    <div id="delete-pane-dependant-<?php echo $dp; ?>" class="tab-pane pane-dependant">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Document</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4>Document Upload</h4>
                                                    <div id="dependant-<?php echo $dp; ?>-gallery" class="lightBoxGallery dependant-<?php echo $dp; ?>-gallery"></div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="label label-primary2">Personal</span>
                                                </div>
                                                <div class="hr-line-solid"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><strong>Dependant ID</strong></label>
                                                        <input type="text" name="d_dependant_guid[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-guid" placeholder="Dependant ID" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Given Name</strong></label>
                                                        <input type="text" name="d_dependant_given_name[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-given-name" placeholder="Given Name" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Middle Name</strong></label>
                                                        <input type="text" name="d_dependant_middle_name[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-middle-name" placeholder="Middle Name" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Last Name</strong></label>
                                                        <input type="text" name="d_dependant_last_name[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-last-name" placeholder="Last Name" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 1)</strong></label>
                                                        <input type="text" name="d_dependant_address1[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-address1" placeholder="Address (Line 1)" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Date Of Birth</strong></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="d_dependant_birth_date[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-birth-date" placeholder="Date Of Birth" disabled="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Gender</strong></label>
                                                        <input type="text" name="d_dependant_gender[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-gender" placeholder="Gender" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 2)</strong></label>
                                                        <input type="text" name="d_dependant_address2[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-address2" placeholder="Address (Line 2)" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Nationality</strong></label>
                                                        <input type="text" name="d_dependant_nationality[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-nationality" placeholder="Nationality" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Contact Number</strong></label>
                                                        <input type="text" name="d_dependant_contact[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-contact-number" placeholder="Contact Number" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Address (Line 3)</strong></label>
                                                        <input type="text" name="d_dependant_address3[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-address3" placeholder="Address (Line 3)" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>District</strong></label>
                                                        <input type="text" name="d_dependant_district[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-district" placeholder="District" disabled="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Relation</strong></label>
                                                        <input type="text" name="d_dependant_relation[<?php echo $dp; ?>]" class="form-control dependant-<?php echo $dp; ?>-relation" placeholder="Relation" disabled="true" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="delete-applicant" class="btn btn-danger">Delete</a>
                    <a class="btn btn-default" data-dismiss="modal">Close</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/slick/slick.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/dataTables/datatables.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/smoke/js/smoke.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/chosen/chosen.jquery.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/datapicker/bootstrap-datepicker.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/jasny/jasny-bootstrap.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/blueimp/jquery.blueimp-gallery.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/webcam/webcam.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/sebumi/js/plugins/webcam/webcam.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/elevateZoom/jquery.elevatezoom.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/sweetalert/sweetalert.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/sebumi/js/agent/list/list_applicant.js", CClientScript::POS_END);    