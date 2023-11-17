<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Medical Examination</h2>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Worker Verification</h5>
                </div>
                <div class="ibox-content">
                    <form id="form-fingerprint-verify">
                        <div class="message-form"></div>
                        
                        <div class="row">
                            <input type="hidden" name="transaction_id" class="transaction-id" value="<?php echo $transaction->id; ?>" />
                            <div class="col-lg-6">
                                <!-- WORKER INFORMATION -->
                                <div class="panel-group" id="workerinfo">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#workerinfo" href="#collapseWorker">Worker Information <i class="fa fa-chevron-down"></i></a>
                                            </h4>
                                        </div>
                                        <div id="collapseWorker" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <div class="text-center">
                                                    <img style="border: 1px solid #dcdcdc; padding: 10px;" src="uploads/photos/<?php echo $worker->guid; ?>.jpg" height="200" />
                                                </div>
                                                
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th width="30%">Worker</th>
                                                            <th>Information</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><code>Worker Code</code></td>
                                                            <td><span class="text-primary"><?php echo $worker->guid; ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><code>Worker Name</code></td>
                                                            <td><span class="text-primary"><?php echo strtoupper($worker->given_name.' '.$worker->middle_name.' '.$worker->last_name); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><code>Date Of Birth</code></td>
                                                            <td><span class="text-primary"><?php echo strtoupper(date("d F Y", strtotime($worker->birth_date))); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><code>Gender</code></td>
                                                            <td><span class="text-primary"><?php echo $worker->gender->name; ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><code>Passport</code></td>
                                                            <td><span class="text-primary"><?php echo strtoupper($worker->passport_number); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><code>Country Origin</code></td>
                                                            <td><span class="text-primary"><?php echo $worker->nationality->name; ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><code>Job Type</code></td>
                                                            <td><span class="text-primary"><?php echo $worker->job->name; ?></span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#workerinfo" href="#collapseEmployer">Employer Information <i class="fa fa-chevron-down"></i></a>
                                            </h4>
                                        </div>
                                        <div id="collapseEmployer" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th width="30%">Employer</th>
                                                            <th>Information</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!--
                                                        <tr>
                                                            <td><code>Employer Code</code></td>
                                                            <td><span class="text-primary"><?php //echo $employer->code; ?></span></td>
                                                        </tr>
                                                        -->
                                                        <tr>
                                                            <td><code>Employer Name</code></td>
                                                            <td><span class="text-primary"><?php echo strtoupper($worker->employer_name); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><code>Address</code></td>
                                                            <td>
                                                            <?php
                                                                echo empty($worker->employer_address1) ? 
                                                                '<span class="label">EMPTY</span>' : 
                                                                '<span class="text-primary">'.strtoupper($worker->employer_address1).' '.strtoupper($worker->employer_address2).' '.strtoupper($worker->employer_address3).'</span>';
                                                            ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><code>District</code></td>
                                                            <td><span class="text-primary"><?php echo strtoupper($worker->employer_district); ?></span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#workerinfo" href="#collapseDoctor">Doctor Information <i class="fa fa-chevron-down"></i></a>
                                            </h4>
                                        </div>
                                        <div id="collapseDoctor" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th width="30%">Doctor</th>
                                                            <th>Information</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!--
                                                        <tr>
                                                            <td><code>Doctor Code</code></td>
                                                            <td><span class="text-primary"><?php //echo $doctor->code; ?></span></td>
                                                        </tr>
                                                        -->
                                                        <tr>
                                                            <td><code>Doctor Name</code></td>
                                                            <td><span class="text-primary"><?php echo $doctor->name; ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><code>Clinic Name</code></td>
                                                            <td><span class="text-primary"><?php echo 'DHAKA MEDICAL CLINIC'; //$doctor->centre; ?></span></td>
                                                        </tr>
                                                        <!--
                                                        <tr>
                                                            <td><code>Address</code></td>
                                                            <td>
                                                            <?php
                                                                //echo empty($doctor->address1) ? 
                                                                //'<span class="label">EMPTY</span>' : 
                                                                //'<span class="text-primary">'.$doctor->address1.'<br />'.$doctor->address2.'<br />'.$doctor->address3.'</span>';        
                                                            ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><code>District</code></td>
                                                            <td><span class="text-primary"><?php //echo $doctor->district->name; ?></span></td>
                                                        </tr>
                                                        -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!--
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#workerinfo" href="#collapseLab">Lab Information <i class="fa fa-chevron-down"></i></a>
                                            </h4>
                                        </div>
                                        <div id="collapseLab" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th width="30%">Lab</th>
                                                            <th>Information</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><code>Lab Code</code></td>
                                                            <td><span class="text-primary"><?php //echo $lab->code; ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><code>Lab Name</code></td>
                                                            <td><span class="text-primary"><?php //echo $doctor->name; ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><code>Address</code></td>
                                                            <td>
                                                            <?php
                                                                //echo empty($lab->address1) ? 
                                                                //'<span class="label">EMPTY</span' : 
                                                                //'<span class="text-primary">'.$lab->address1.'<br />'.$lab->address2.'<br />'.$lab->address3.'</span>';        
                                                            ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><code>District</code></td>
                                                            <td><span class="text-primary"><?php //echo $lab->district->name; ?></span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#workerinfo" href="#collapseXray">X-Ray Information <i class="fa fa-chevron-down"></i></a>
                                            </h4>
                                        </div>
                                        <div id="collapseXray" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th width="30%">X-Ray</th>
                                                            <th>Information</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><code>X-Ray Code</code></td>
                                                            <td><span class="text-primary"><?php //echo $xray->code; ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><code>X-Ray Name</code></td>
                                                            <td><span class="text-primary"><?php //echo $xray->name; ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><code>Address</code></td>
                                                            <td>
                                                            <?php
                                                                //echo empty($xray->address1) ? 
                                                                //'<span class="label">EMPTY</span>' : 
                                                                //'<span class="text-primary">'.$xray->address1.'<br />'.$xray->address2.'<br />'.$xray->address3.'</span>';        
                                                            ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><code>District</code></td>
                                                            <td><span class="text-primary"><?php //echo $xray->district->name; ?></span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#workerinfo" href="#collapseMedical">Medical Information <i class="fa fa-chevron-down"></i></a>
                                            </h4>
                                        </div>
                                        <div id="collapseMedical" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th width="30%">Medical</th>
                                                            <th>Information</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><code>Registration Date</code></td>
                                                            <td><?php echo strtoupper(date("d F Y", strtotime($transaction->created_at))); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><code>Medical Date</code></td>
                                                            <td><?php echo empty($de->exam_date) ? '<span class="label">EMPTY</span>' : strtoupper(date("d F Y", strtotime($de->exam_date))); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><code>Lab Medical Date</code></td>
                                                            <td><?php echo empty($le->report_date) ? '<span class="label">EMPTY</span>' : strtoupper(date("d F Y", strtotime($le->report_date))); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><code>X-Ray Medical Date</code></td>
                                                            <td><?php echo empty($xe->report_date) ? '<span class="label">EMPTY</span>' : strtoupper(date("d F Y", strtotime($xe->report_date))); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><code>Certification Date</code></td>
                                                            <td><?php echo empty($xe->certify_date) ? '<span class="label">EMPTY</span>' : strtoupper(date("d F Y", strtotime($xe->certify_date))); ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!-- DECLARATION -->
                                <div class="panel-group" id="declare">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#declare" href="#collapseDeclare">Declaration <i class="fa fa-chevron-down"></i></a>
                                            </h4>
                                        </div>
                                        <div id="collapseDeclare" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <ul class="list-group clear-list">
                                                    <li class="list-group-item fist-item">I hearby declare I am the examining doctor for this medical examination.</li>
                                                    <li class="list-group-item">I have obtained the consent from this worker <i class="fa fa-user-circle-o"></i> <span class="label label-primary"><?php echo $worker->guid; ?></span> <?php echo $worker->given_name.' '.$worker->middle_name.' '.$worker->last_name; ?></li>
                                                    <li class="list-group-item">I have checked and verified the identity of the worker is as stated in the <strong>Registration Form</strong> and the <strong>Passport</strong>.</li>
                                                    <li class="list-group-item">I understand that I have to report any positive cases of communicable diseases to the relevant health authorities.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#declare" href="#collapseNote">Note <i class="fa fa-chevron-down"></i></a>
                                            </h4>
                                        </div>
                                        <div id="collapseNote" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <ul class="list-group clear-list">
                                                    <li class="list-group-item fist-item">You must insert <strong>Date Of Medical Examination</strong> (within 24 hours of examinatiion of foreign worker) into Sebumi Online System before lab and x-ray are allowed to submit their results into Sebumi Online System.</li>
                                                    <li class="list-group-item">You cannot enter a date of medical examination later than today's date or earlier than registration form date.</li>
                                                    <li class="list-group-item">You will not be able to certify and transmit your medical results for this foreign worker until both lab results and x-ray report for this foreign worker had been transmitted by them.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- PART 1 | Declaration By Doctor -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <span class="label label-success">Part 1</span> Declaration By Doctor
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <strong>Date of Medical Examination</strong> (by Doctor) for Foreign Worker
                                                <br /><i class="fa fa-user-circle-o"></i> <span class="label label-primary"><?php echo $worker->guid; ?></span> <?php echo $worker->given_name.' '.$worker->middle_name.' '.$worker->last_name; ?>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group p-h-sm">
                                                    <div class="input-group date">
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                        <input type="text" name="p1_medical_date" class="form-control" placeholder="Medical Date" value="<?php echo empty($de->exam_date) ? NULL : date("d-m-Y", strtotime($de->exam_date)); ?>" required="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="checkbox checkbox-success">
                                                    <input name="p1_read" type="checkbox" class="read-declare-select" value="YES" <?php echo empty($de->exam_date) ? NULL : 'checked'; ?>>
                                                    <label class="text-danger">I have read, understood and agree to the declaration above.</label>
                                                </div>
                                            </div>    
                                        </div>    
                                    </div>
                                </div>
                                
                                <!-- PART 1 | Declaration By Doctor -->
								<!--
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Worker Fingerprint <span class="label label-warning">REGISTERED FINGERPRINT</span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
											-->
                                            <!--<input type="hidden" name="fingerprint_status" class="fingerprint-status" value="" />-->
                                            <!--
											<div class="col-lg-12">
                                                <strong>Place any fingerprint to biometric device to verify.</strong>
                                            </div>
                                            <div class="col-lg-12">&nbsp;</div>
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <img src="vendor/sebumi/images/fingerprint.png" height="120" style="border: 1px solid #e5e6e7; padding: 10px;" />
                                                    <br /><span class="label label-warning">FINGERPRINT</span>
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                </div>
								-->
                            </div>
                        </div>
                        
						<div class="message-form"></div>
						
                        <div class="text-right">
                            <a id="verify-fingerprint" class="btn btn-primary">Verify</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    Yii::app()->clientScript->registerScriptFile("vendor/assets/smoke/js/smoke.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/datapicker/bootstrap-datepicker.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/webcam/webcam.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/sebumi/js/plugins/webcam/webcam.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/sebumi/js/doctor/list/list_worker.js", CClientScript::POS_END);    