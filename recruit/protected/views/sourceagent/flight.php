<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Flight Booking</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item active">Flight Booking</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><span class="label label-primary"><?php echo $user->profile->company->name; ?></span></h4>
            <h4 class="card-title">Flight Booking for Foreign Worker</h4>
            
            <form id="form-flight-worker">
                <div class="table-responsive m-t-40">

                    <table id="table-application-transaction" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center"><i class="fa fa-check-square-o"></i></th>
                                <th>Foreign Worker ID /<br />Full Name</th>
                                <th>Passport /<br />Nationality</th>
                                <th>Registered Date</th>
                                <th>Employer</th>
                                <th>Demand Letter</th>
                                <th>Pre Flight Covid-19 Test</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 0;
                            foreach($transaction as $t){
                                $i++;
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $i; ?></td>
                                <td class="text-center">
                                    <input type="checkbox" name="flight[]" class="checkbox-form" value="<?php echo $t->id; ?>" />
                                </td>
                                <td width="20%">
                                    <?php echo $t->worker->code; ?>
                                    <br />
                                    <span class="font-bold"><?php echo strtoupper($t->worker->full_name); ?></span>
                                </td>
                                <td>
                                    <span class="font-bold"><?php echo strtoupper($t->passport->number); ?></span>
                                    <br />
                                    <?php echo $t->worker->nationality->country; ?>
                                </td>
                                <td><?php echo date('d M Y', strtotime($t->created_at)); ?></td>
                                <td><?php echo $t->employer->profile->company->name; ?></td>
                                <td class="text-center">
                                    <?php echo $t->quota->code; ?>
                                    <br />
                                    <a href="uploads/demandletters/<?php echo $t->quota->guid; ?>.pdf" target="_blank" class="btn btn-sm waves-effect waves-light btn-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <?php
                                        if(file_exists('uploads/covid19/'.$t->guid.'.pdf')){
                                    ?>
                                    <a href="uploads/covid19/<?php echo $t->guid; ?>.pdf" target="_blank" class="btn btn-sm waves-effect waves-light btn-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    <?php
                                        } else {
                                    ?>
                                    <i class="fa fa-times text-danger"></i> NO FILE
                                    <br />
                                    <?php        
                                        }
                                    ?>
                                    <a id="upload-covid19" data-id="<?php echo $t->id; ?>" class="btn btn-sm waves-effect waves-light btn-info text-white" data-toggle="tooltip" data-placement="top" title="" data-original-title="Upload">
                                        <i class="fa fa-folder-open-o"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            }    
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="row m-t-30">
                    <div class="col-md-9">&nbsp;</div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"><strong>Flight Number</strong> <span class="text-danger">*</span></label>
                                    <input type="text" name="flight_number" class="form-control vft-element2" placeholder="Flight Number" data-required="true">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"><strong>ETA Malaysia</strong> <span class="text-danger">*</span></label>
                                    <input type="text" name="eta_malaysia" class="form-control vft-element2" placeholder="ETA Malaysia" data-required="true">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">
                                        <i class="icon-calender"></i> <strong>Flight Date</strong> <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="flight_date" class="form-control vft-element2 datepicker-autoclose" placeholder="DD-MM-YYYY" data-required="true">
                                    <small class="form-control-feedback text-info"><strong>Note:</strong> DD-MM-YYYY</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-right">
                            <a class="btn btn-success" id="submit-flight">
                                <i class="fa fa-check"></i> Save
                            </a>
                        </div>
                    </div>
                </div>
            </form>    
            
        </div>
    </div>
</div>

<div class="modal fade" id="modal-upload-covid19">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white">Pre Flight Covid-19 Test</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <form id="form-upload-covid19">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td width="30%">Worker Code</td>
                                            <td class="font-bold worker-code">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>Worker Name</td>
                                            <td class="font-bold worker-name">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>Passport</td>
                                            <td class="font-bold passport">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>Nationality</td>
                                            <td class="font-bold nationality">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>Employer</td>
                                            <td class="font-bold employer">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                You need to upload the <b>PDF</b> file format only.
                            </div>
                        </div>    
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>File Upload</label>
                                <input type="file" name="upload_covid19" class="form-control vtf-element" data-parsley-fileextension="pdf" data-parsley-required="true" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="transaction_id" class="transaction-id" />
                    <a class="btn btn-default" data-dismiss="modal">Close</a>
                    <a class="btn btn-info text-white" id="submit-covid19">Upload</a>
                </div>
            </form>    
        </div>
    </div>
</div>

<?php
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/datatables/jquery.dataTables.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/toast-master/js/jquery.toast.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.extend.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/sourceagent/flight.js", CClientScript::POS_END);