<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Application</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active">Scan QR</li>
                </ol>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Scan QR</h4>
            <h6 class="card-subtitle">Verify Passport Applicant</h6>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-info">
                    <h5 class="m-b-0 text-white">Scan QR Information</h5>
                </div>
                <div class="card-body">
                    <form id="form-scan-applicant">
                        <div class="form-actions">
                            <div class="row row-line">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><strong>QR Code</strong></label>
                                        <input type="text" name="qrcode" class="form-control vft-element" placeholder="QR Code">
                                    </div>
                                </div>
                            </div>

                            <div class="pull-right">
                                <a class="btn btn-warning" id="scan-applicant">
                                    <i class="fa fa-qrcode"></i> Check
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info">
                    <h5 class="m-b-0 text-white">Applicant Information</h5>
                </div>
                <div class="card-body">
                    <form id="form-verify-applicant">
                        <div class="form-actions">
                            <input type="hidden" name="applicant_id" class="applicant-id">
                            <input type="hidden" name="batch_id" class="batch-id">
                            
                            <div class="row row-line">
                                <div class="col-md-8">
                                    <div class="row row-line">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><strong>Applicant ID</strong></label>
                                                <input type="text" name="applicant_guid" class="form-control applicant-guid" placeholder="Applicant ID" disabled="true">
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><strong>Full Name</strong></label>
                                                <input type="text" name="fullname" class="form-control fullname" placeholder="Full Name" disabled="true">
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="photo text-center">
                                        <img class="image-applicant" title="Applicant" src="vendor/visafasttrack/images/no_image_available.png" height="200" />
                                    </div>
                                </div>
                            </div>

                            <div class="row row-line">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Gender</strong></label>
                                        <input type="text" name="gender" class="form-control gender" placeholder="Gender" disabled="true">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Date Of Birth</strong></label>
                                        <input type="text" name="dateofbirth" class="form-control dateofbirth" placeholder="Date Of Birth" disabled="true">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Place Of Birth</strong></label>
                                        <textarea name="placeofbirth" class="form-control placeofbirth" placeholder="Place Of Birth" rows="1" disabled="true"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row row-line">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Passport Number</strong></label>
                                        <input type="text" name="passport_number" class="form-control passport_number" placeholder="Passport Number" disabled="true">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Nationality</strong></label>
                                        <input type="text" name="nationality" class="form-control nationality" placeholder="Nationality" disabled="true">
                                    </div>
                                </div>
                            </div>

                            <div class="row row-line">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Date Of Issue</strong></label>
                                        <input type="text" name="dateofissue" class="form-control dateofissue" placeholder="Date Of Issue" disabled="true">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Place Of Issue</strong></label>
                                        <textarea name="placeofissue" class="form-control placeofissue" placeholder="Place Of Issue" rows="1" disabled="true"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Date Of Expiry</strong></label>
                                        <input type="text" name="dateofexpiry" class="form-control dateofexpiry" placeholder="Date Of Expiry" disabled="true">
                                    </div>
                                </div>
                            </div>

                            <div class="pull-right">
                                <a class="btn btn-warning verify-reset">
                                    <i class="fa fa-rotate-left"></i> Reset
                                </a> 
                                <a class="btn btn-success verify-check">
                                    <i class="fa fa-check"></i> Verify
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/datatables/jquery.dataTables.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/toast-master/js/jquery.toast.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/select2/dist/js/select2.full.min.js", CClientScript::POS_END);
    //Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.min.js", CClientScript::POS_END);
    //Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.extend.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/visafasttrack/js/admin/scanqr.js", CClientScript::POS_END);