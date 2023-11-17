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
            <h6 class="card-subtitle">Verify Foreign Worker Information</h6>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h5 class="m-b-0 text-white">Scan QR Information</h5>
                        </div>
                        <div class="card-body">
                            <form id="form-scan-applicant">
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><strong>QR Code</strong></label>
                                                <input type="text" name="qrcode" class="form-control vft-element-readonly" placeholder="QR Code" readonly="true" value="<?php echo $transaction->guid; ?>">
                                                <input type="hidden" name="record" class="form-control record-status" value="<?php echo $record; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h5 class="m-b-0 text-white">Progress Date</h5>
                        </div>
                        <div class="card-body">
                            <form id="form-progress-applicant">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label text-black font-bold">
                                                <i class="icon-calender"></i> <strong>Date Of Arrival</strong>
                                            </label>
                                            <input type="text" name="arrival_date" class="form-control vft-element-readonly arrival-date" placeholder="dd-mm-yyyy" readonly="true" value="<?php echo empty($transaction->arrival_date) ? NULL : date('d M Y', strtotime($transaction->arrival_date)); ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label text-black font-bold">
                                                <i class="icon-calender"></i> <strong>PLKS Expiry Date</strong>
                                            </label>
                                            <input type="text" name="plks_expiry_date" class="form-control vft-element-readonly plks-expiry-date" placeholder="dd-mm-yyyy" readonly="true" value="<?php echo empty($transaction->plks_expiry_date) ? NULL : date('d M Y', strtotime($transaction->plks_expiry_date)); ?>">
                                        </div>
                                    </div>
                                </div>
                                -->
                                    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info">
                    <h5 class="m-b-0 text-white">Applicant Information</h5>
                </div>
                <div class="card-body">
                    <form id="form-verify-worker">
                        <div class="form-actions">
                            <input type="hidden" name="transaction_id" class="transaction-id" value="<?php echo $transaction->id; ?>">
                            
                            <div class="row row-line">
                                <div class="col-md-8">
                                    <div class="row row-line">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><strong>Transaction ID</strong></label>
                                                <input type="text" name="transaction_code" class="form-control transaction-code" placeholder="Transaction ID" disabled="true" value="<?php echo $transaction->code; ?>">
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><strong>Full Name</strong></label>
                                                <input type="text" name="fullname" class="form-control fullname" placeholder="Full Name" disabled="true" value="<?php echo $transaction->worker->full_name; ?>">
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="photo text-center">
                                        <?php echo Helpers::fileDisplay('uploads/photos/',$transaction->guid,'Foreign Worker'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row row-line">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Gender</strong></label>
                                        <input type="text" name="gender" class="form-control gender" placeholder="Gender" disabled="true" value="<?php echo $transaction->worker->gender->name; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">
                                            <i class="icon-calender"></i> <strong>Date Of Birth</strong>
                                        </label>
                                        <input type="text" name="dateofbirth" class="form-control dateofbirth" placeholder="Date Of Birth" disabled="true" value="<?php echo date('d M Y', strtotime($transaction->worker->birth_date)); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Place Of Birth</strong></label>
                                        <textarea name="placeofbirth" class="form-control placeofbirth" placeholder="Place Of Birth" rows="1" disabled="true"><?php echo $transaction->worker->birth_place; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row row-line">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Passport Number</strong></label>
                                        <input type="text" name="passport_number" class="form-control passport_number" placeholder="Passport Number" disabled="true" value="<?php echo $transaction->passport->number; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Nationality</strong></label>
                                        <input type="text" name="nationality" class="form-control nationality" placeholder="Nationality" disabled="true" value="<?php echo $transaction->worker->nationality->name; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row row-line">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">
                                            <i class="icon-calender"></i> <strong>Date Of Issue</strong>
                                        </label>
                                        <input type="text" name="dateofissue" class="form-control dateofissue" placeholder="Date Of Issue" disabled="true" value="<?php echo date('d M Y', strtotime($transaction->passport->issue_date)); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Place Of Issue</strong></label>
                                        <textarea name="placeofissue" class="form-control placeofissue" placeholder="Place Of Issue" rows="1" disabled="true"><?php echo $transaction->passport->issue_place; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">
                                            <i class="icon-calender"></i> <strong>Date Of Expiry</strong>
                                        </label>
                                        <input type="text" name="dateofexpiry" class="form-control dateofexpiry" placeholder="Date Of Expiry" disabled="true" value="<?php echo date('d M Y', strtotime($transaction->passport->expiry_date)); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="pull-right">
                                <a class="btn btn-success verify-check">
                                    <i class="fa fa-check"></i> Confirm Arrival
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
			
			<div class="card">
                <div class="card-header bg-info">
                    <h5 class="m-b-0 text-white">Pre Flight Covid-19 Test Information</h5>
                </div>
                <div class="card-body">
                    <?php
                        $covid19pdf = 'uploads/covid19/'.$transaction->guid.'.pdf';
                        $nocovid19pdf = 'vendor/imandor/images/nofile.jpg';

                        if(file_exists($covid19pdf)){
                            $covid19file = '<iframe src="'.$covid19pdf.'#toolbar=0" width="100%" height="500"></iframe>';
                        } else {
                            $covid19file = '<img alt="image" class="img-responsive" src="'.$nocovid19pdf.'">';
                        }
                    ?>
                    <div col-md-12>
                        <?php echo $covid19file; ?>
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
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/select2/dist/js/select2.full.min.js", CClientScript::POS_END);
    //Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.min.js", CClientScript::POS_END);
    //Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.extend.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/site/scanqr.js", CClientScript::POS_END);