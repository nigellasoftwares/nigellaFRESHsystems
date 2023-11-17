<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Application</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Branch</li>
                    <li class="breadcrumb-item active">Application</li>
                </ol>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="pull-right">
                <a href="index.php?r=Branch/ApplicationBatch&id=<?php echo $batch->id; ?>" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                    <i class="fa fa-arrow-circle-o-left"></i> View Batch Applicants
                </a>
            </div>
            
            <h4 class="card-title">Application Batch <span class="label label-primary"><?php echo $batch->batch_guid; ?></span></h4>
            <h6 class="card-subtitle">Register New Visa Applicant</h6>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header bg-info">
            <h5 class="m-b-0 text-white">Personal Information</h5>
        </div>
        <div class="card-body">
            <form id="form-new-applicant">
                <div class="form-actions">
                    <input type="hidden" name="batch_id" value="<?php echo $batch->id; ?>">
                    
                    <div class="row row-line">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><strong>Full Name</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="fullname" class="form-control vft-element" placeholder="Full Name" data-required="true">
                                <small class="form-control-feedback text-info"><strong>Note:</strong> Full name as in passport.</small> 
                            </div>
                        </div>
                    </div>
                    
                    <div class="row row-line">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><strong>Photo Upload</strong> <span class="text-danger">*</span></label>
                                <input type="file" name="upload_photo" class="form-control vft-element" data-required="true">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row row-line">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label"><strong>First Name</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="firstname" class="form-control vft-element" placeholder="First Name" data-required="true">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label"><strong>Middle Name</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="middlename" class="form-control vft-element" placeholder="Middle Name" data-required="true">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label"><strong>Last Name</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="lastname" class="form-control vft-element" placeholder="Last Name" data-required="true">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row row-line">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label"><strong>Gender</strong> <span class="text-danger">*</span></label>
                                <?php
                                    $i = 0;
                                    foreach($gender as $g){
                                        $i++;
                                ?>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio<?php echo $i; ?>" name="gender" class="custom-control-input" value="<?php echo $g->id; ?>" data-required="true">
                                    <label class="custom-control-label" for="customRadio<?php echo $i; ?>"><?php echo ucfirst(strtolower($g->name)); ?></label>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label"><strong>Date Of Birth</strong> <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="icon-calender"></i></span>
                                    </div>
                                    <input type="text" name="dateofbirth" class="form-control vft-element datepicker-autoclose" placeholder="DD-MM-YYYY" data-required="true">
                                </div>
                                <small class="form-control-feedback text-info"><strong>Note:</strong> DD-MM-YYYY</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label"><strong>Place Of Birth</strong> <span class="text-danger">*</span></label>
                                <textarea name="placeofbirth" class="form-control vft-element" placeholder="Place Of Birth" rows="1" data-required="true"></textarea>
                                <small class="form-control-feedback text-info"><strong>Note:</strong> City, Province/State, Country</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row row-line">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label"><strong>Current Nationality</strong> <span class="text-danger">*</span></label>
                                <?php
                                    $cnationality_list = CHtml::listData($cnationality, 'id', 'name');
                                    echo CHtml::dropDownList('current_nationality', null, $cnationality_list, 
                                    array(
                                        'empty' => 'Select Current Nationality', 
                                        'class' => 'form-control select2-currentnationality custom-select vft-element',
                                        'data-required' => 'true',
                                    ));
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label"><strong>Citizen Number</strong> <span class="text-danger">*</span></label></label>
                                <input type="text" name="citizen_number" class="form-control vft-element" placeholder="Citizen Number" data-required="true">
                                <small class="form-control-feedback text-info"><strong>Note:</strong> National Card ID</small> 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label"><strong>Former Nationality</strong></label>
                                <?php
                                    $fnationality_list = CHtml::listData($fnationality, 'id', 'name');
                                    echo CHtml::dropDownList('former_nationality', null, $fnationality_list, 
                                    array(
                                        'empty' => 'Select Former Nationality', 
                                        'class' => 'form-control select2-formernationality custom-select vft-element',
                                        //'data-required' => 'true',
                                    ));
                                ?>
                                <small class="form-control-feedback text-info"><strong>Note:</strong> If any.</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row row-line">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label"><strong>Passport Type</strong> <span class="text-danger">*</span></label>
                                <?php
                                    $passport_list = CHtml::listData($passport, 'id', 'name');
                                    echo CHtml::dropDownList('passport_type', null, $passport_list, 
                                    array(
                                        'empty' => 'Select Passport Type', 
                                        'class' => 'form-control select2-passporttype custom-select vft-element',
                                        'data-required' => 'true',
                                    ));
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label"><strong>Passport Type (Other)</strong></label>
                                <input type="text" name="passport_other" class="form-control vft-element" placeholder="Other">
                                <small class="form-control-feedback text-info"><strong>Note:</strong> Please specify if <strong class="text-dark">Other</strong> in <strong class="text-dark">Passport Type</strong>.</small> 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label"><strong>Passport Number</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="passport_number" class="form-control vft-element" placeholder="Passport Number">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row row-line">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label"><strong>Date Of Issue</strong> <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="icon-calender"></i></span>
                                    </div>
                                    <input type="text" name="passport_dateofissue" class="form-control vft-element datepicker-autoclose" placeholder="DD-MM-YYYY" data-required="true">
                                </div>
                                <small class="form-control-feedback text-info"><strong>Note:</strong> DD-MM-YYYY</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label"><strong>Place Of Issue</strong> <span class="text-danger">*</span></label>
                                <textarea name="passport_placeofissue" class="form-control vft-element" placeholder="Place Of Issue" rows="1" data-required="true"></textarea>
                                <small class="form-control-feedback text-info"><strong>Note:</strong> City, Province/State, Country</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label"><strong>Date Of Expiry</strong> <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="icon-calender"></i></span>
                                    </div>
                                    <input type="text" name="passport_dateofexpiry" class="form-control vft-element datepicker-autoclose" placeholder="DD-MM-YYYY" data-required="true">
                                </div>
                                <small class="form-control-feedback text-info"><strong>Note:</strong> DD-MM-YYYY</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="pull-right">
                        <a class="btn btn-success" id="submit-applicant">
                            <i class="fa fa-check"></i> Save
                        </a>
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
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/select2/dist/js/select2.full.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.extend.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/visafasttrack/js/branch/applicationapplicant.js", CClientScript::POS_END);