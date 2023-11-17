<style>
    input, select, textarea {
        background-color: #ffffcc !important;
    }
</style>    

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Medical Examination</h2>
    </div>
</div>

<div class="wrapper wrapper-content">
    <!-- MEDICAL INFORMATION -->
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title" style="background-color: #1791d9; color: white;">
                    <h5>Medical Information</h5>
					<!--
                    <div class="ibox-tools">
                        <a href="index.php?r=Print/Receipt&id=<?php echo $worker->id; ?>" target="_blank" class="btn btn-white" style="color: #1486cb;">
                            Print Receipt
                        </a>
                    </div>
					-->
                </div>
                <div class="ibox-content ibox-content-medical-information">
                    <div class="row">
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
                                                        <td><span class="text-primary"><?php echo 'KLINIK USAHA JAYA'; //$doctor->centre; ?></span></td>
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
                                                    <input type="text" name="p1_medical_date" class="form-control" placeholder="Medical Date" value="<?php echo empty($de->exam_date) ? $de->id : date("d-m-Y", strtotime($de->exam_date)); ?>" data-required="true" />
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- MEDICAL EXAMINATION -->
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title" style="background-color: #1791d9; color: white;">
                    <h5>Medical Examination</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link link-medical">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <form id="form-update-medical">
                    <div class="ibox-content ibox-content-medical">
                        <div class="message-medical"></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="hidden" name="transaction_id" class="transaction-id" value="<?php echo $transaction->id; ?>" />
                                <input type="hidden" name="type_id" class="type-id" value="<?php echo $_GET['type']; ?>" />
                                <!-- PART 2 | Physical Examination | Section A General Examination -->    
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="pull-right">
                                            <span class="label label-success">Section A General Examination</span>
                                        </div>
                                        <span class="label label-success">Part 2</span> Physical Examination
                                    </div>
                                    <div class="panel-body">
                                        <h3>Section A General Examination</h3>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th width="40%">Description</th>
                                                    <th width="15%">&nbsp;</th>
                                                    <th>&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><code>1.0</code></td>
                                                    <td><code>Height</code></td>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" name="sa_height" class="form-control text-right" placeholder="0" value="<?php echo empty($de->height) ? NULL : $de->height; ?>" data-required="true" />
                                                                <span class="input-group-addon">cm</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>2.0</code></td>
                                                    <td><code>Weight</code></td>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" name="sa_weight" class="form-control text-right" placeholder="0" value="<?php echo empty($de->weight) ? NULL : $de->weight; ?>" data-required="true" />
                                                                <span class="input-group-addon">kg</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>3.0</code></td>
                                                    <td><code>Pulse</code></td>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" name="sa_pulse" class="form-control text-right" placeholder="0" value="<?php echo empty($de->pulse) ? NULL : $de->pulse; ?>" data-required="true" />
                                                                <span class="input-group-addon">per minute</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>4.1</code></td>
                                                    <td><code>Blood Pressure: Systolic</code></td>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" name="sa_systolic" class="form-control text-right" placeholder="0" value="<?php echo empty($de->bp_systolic) ? NULL : $de->bp_systolic; ?>" data-required="true" />
                                                                <span class="input-group-addon">mm. Hg.</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>4.2</code></td>
                                                    <td><code>Blood Pressure: Diastolic</code></td>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" name="sa_diastolic" class="form-control text-right" placeholder="0" value="<?php echo empty($de->bp_diastolic) ? NULL : $de->bp_diastolic; ?>" data-required="true" />
                                                                <span class="input-group-addon">mm. Hg.</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th width="50%">Description</th>
                                                    <th width="15%">&nbsp;</th>
                                                    <th width="10%"><span class="label label-danger">Present</span></th>
                                                    <th width="10%"><span class="label label-primary">Absent</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><code>5.0</code></td>
                                                    <td><code>Lymph Node Enlargement</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($de->lymph){
                                                            if($de->lymph == 'YES'){
                                                                $sa_lymph_yes = 'checked';
                                                                $sa_lymph_no = NULL;
                                                            } else if($de->lymph == 'NO') {
                                                                $sa_lymph_yes = NULL;
                                                                $sa_lymph_no = 'checked';
                                                            }
                                                        } else {
                                                            $sa_lymph_yes = NULL;
                                                            $sa_lymph_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sa_lymph" class="medical-radio" value="YES" <?php echo $sa_lymph_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sa_lymph" class="medical-radio" value="NO" <?php echo $sa_lymph_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>6.0</code></td>
                                                    <td><code>Jaundice</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($de->jaundice){
                                                            if($de->jaundice == 'YES'){
                                                                $sa_jaundice_yes = 'checked';
                                                                $sa_jaundice_no = NULL;
                                                            } else if($de->jaundice == 'NO') {
                                                                $sa_jaundice_yes = NULL;
                                                                $sa_jaundice_no = 'checked';
                                                            }
                                                        } else {
                                                            $sa_jaundice_yes = NULL;
                                                            $sa_jaundice_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sa_jaundice" class="medical-radio" value="YES" <?php echo $sa_jaundice_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sa_jaundice" class="medical-radio" value="NO" <?php echo $sa_jaundice_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>7.0</code></td>
                                                    <td><code>Pallor</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($de->pallor){
                                                            if($de->pallor == 'YES'){
                                                                $sa_pallor_yes = 'checked';
                                                                $sa_pallor_no = NULL;
                                                            } else if($de->pallor == 'NO') {
                                                                $sa_pallor_yes = NULL;
                                                                $sa_pallor_no = 'checked';
                                                            }
                                                        } else {
                                                            $sa_pallor_yes = NULL;
                                                            $sa_pallor_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sa_pallor" class="medical-radio" value="YES" <?php echo $sa_pallor_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sa_pallor" class="medical-radio" value="NO" <?php echo $sa_pallor_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>8.0</code></td>
                                                    <td><code>Anaesthetic Skin Patch</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($de->anaesthetic){
                                                            if($de->anaesthetic == 'YES'){
                                                                $sa_anaesthetic_yes = 'checked';
                                                                $sa_anaesthetic_no = NULL;
                                                            } else if($de->anaesthetic == 'NO') {
                                                                $sa_anaesthetic_yes = NULL;
                                                                $sa_anaesthetic_no = 'checked';
                                                            }
                                                        } else {
                                                            $sa_anaesthetic_yes = NULL;
                                                            $sa_anaesthetic_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sa_anaesthetic" class="medical-radio" value="YES" <?php echo $sa_anaesthetic_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sa_anaesthetic" class="medical-radio" value="NO" <?php echo $sa_anaesthetic_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>9.0</code></td>
                                                    <td><code>Deformities Of Limbs</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($de->deformites){
                                                            if($de->deformites == 'YES'){
                                                                $sa_limbs_yes = 'checked';
                                                                $sa_limbs_no = NULL;
                                                            } else if($de->deformites == 'NO') {
                                                                $sa_limbs_yes = NULL;
                                                                $sa_limbs_no = 'checked';
                                                            }
                                                        } else {
                                                            $sa_limbs_yes = NULL;
                                                            $sa_limbs_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sa_limbs" class="medical-radio" value="YES" <?php echo $sa_limbs_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sa_limbs" class="medical-radio" value="NO" <?php echo $sa_limbs_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>10.0</code></td>
                                                    <td><code>Chronic Skin Rash</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($de->skinrash){
                                                            if($de->skinrash == 'YES'){
                                                                $sa_skin_yes = 'checked';
                                                                $sa_skin_no = NULL;
                                                            } else if($de->skinrash == 'NO') {
                                                                $sa_skin_yes = NULL;
                                                                $sa_skin_no = 'checked';
                                                            }
                                                        } else {
                                                            $sa_skin_yes = NULL;
                                                            $sa_skin_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sa_skin" class="medical-radio" value="YES" <?php echo $sa_skin_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sa_skin" class="medical-radio" value="NO" <?php echo $sa_skin_no; ?>>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th width="50%">Description</th>
                                                    <th width="15%">&nbsp;</th>
                                                    <th width="10%"><span class="label label-danger">Defective</span></th>
                                                    <th width="10%"><span class="label label-primary">Normal</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><code>11.1</code></td>
                                                    <td><code>Hearing Ability</code></td>
                                                    <td class="text-right"><span class="label label-warning">Left</span></td>
                                                    <?php
                                                        if($de->hear_left){
                                                            if($de->hear_left == 'YES'){
                                                                $sa_hearing_left_yes = 'checked';
                                                                $sa_hearing_left_no = NULL;
                                                            } else if($de->hear_left == 'NO') {
                                                                $sa_hearing_left_yes = NULL;
                                                                $sa_hearing_left_no = 'checked';
                                                            }
                                                        } else {
                                                            $sa_hearing_left_yes = NULL;
                                                            $sa_hearing_left_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sa_hearing_left" class="medical-radio" value="YES" <?php echo $sa_hearing_left_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sa_hearing_left" class="medical-radio" value="NO" <?php echo $sa_hearing_left_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>11.2</code></td>
                                                    <td><code>Hearing Ability</code></td>
                                                    <td class="text-right"><span class="label label-warning">Right</span></td>
                                                    <?php
                                                        if($de->hear_right){
                                                            if($de->hear_right == 'YES'){
                                                                $sa_hearing_right_yes = 'checked';
                                                                $sa_hearing_right_no = NULL;
                                                            } else if($de->hear_right == 'NO') {
                                                                $sa_hearing_right_yes = NULL;
                                                                $sa_hearing_right_no = 'checked';
                                                            }
                                                        } else {
                                                            $sa_hearing_right_yes = NULL;
                                                            $sa_hearing_right_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sa_hearing_right" class="medical-radio" value="YES" <?php echo $sa_hearing_right_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sa_hearing_right" class="medical-radio" value="NO" <?php echo $sa_hearing_right_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>12.1</code></td>
                                                    <td>
                                                        <code>Vision Test - Unaided</code>
                                                        <br /><small>If defective, please fill in visual acuity in #14 Comments below</small>
                                                    </td>
                                                    <td class="text-right"><span class="label label-warning">Left</span></td>
                                                    <?php
                                                        if($de->vis_unaided_left){
                                                            if($de->vis_unaided_left == 'YES'){
                                                                $sa_unaided_left_yes = 'checked';
                                                                $sa_unaided_left_no = NULL;
                                                            } else if($de->vis_unaided_left == 'NO') {
                                                                $sa_unaided_left_yes = NULL;
                                                                $sa_unaided_left_no = 'checked';
                                                            }
                                                        } else {
                                                            $sa_unaided_left_yes = NULL;
                                                            $sa_unaided_left_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sa_unaided_left" class="medical-radio" value="YES" <?php echo $sa_unaided_left_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sa_unaided_left" class="medical-radio" value="NO" <?php echo $sa_unaided_left_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>12.2</code></td>
                                                    <td>
                                                        <code>Vision Test - Unaided</code>
                                                        <br /><small>If defective, please fill in visual acuity in #14 Comments below</small>
                                                    </td>
                                                    <td class="text-right"><span class="label label-warning">Right</span></td>
                                                    <?php
                                                        if($de->vis_unaided_right){
                                                            if($de->vis_unaided_right == 'YES'){
                                                                $sa_unaided_right_yes = 'checked';
                                                                $sa_unaided_right_no = NULL;
                                                            } else if($de->vis_unaided_right == 'NO') {
                                                                $sa_unaided_right_yes = NULL;
                                                                $sa_unaided_right_no = 'checked';
                                                            }
                                                        } else {
                                                            $sa_unaided_right_yes = NULL;
                                                            $sa_unaided_right_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sa_unaided_right" class="medical-radio" value="YES" <?php echo $sa_unaided_right_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sa_unaided_right" class="medical-radio" value="NO" <?php echo $sa_unaided_right_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>12.3</code></td>
                                                    <td>
                                                        <code>Vision Test - Aided</code>
                                                        <br /><small>If defective, please fill in visual acuity in #14 Comments below</small>
                                                    </td>
                                                    <td class="text-right"><span class="label label-warning">Left</span></td>
                                                    <?php
                                                        if($de->vis_aided_left){
                                                            if($de->vis_aided_left == 'YES'){
                                                                $sa_aided_left_yes = 'checked';
                                                                $sa_aided_left_no = NULL;
                                                            } else if($de->vis_aided_left == 'NO') {
                                                                $sa_aided_left_yes = NULL;
                                                                $sa_aided_left_no = 'checked';
                                                            }
                                                        } else {
                                                            $sa_aided_left_yes = NULL;
                                                            $sa_aided_left_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sa_aided_left" class="medical-radio" value="YES" <?php echo $sa_aided_left_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sa_aided_left" class="medical-radio" value="NO" <?php echo $sa_aided_left_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>12.4</code></td>
                                                    <td>
                                                        <code>Vision Test - Aided</code>
                                                        <br /><small>If defective, please fill in visual acuity in #14 Comments below</small>
                                                    </td>
                                                    <td class="text-right"><span class="label label-warning">Right</span></td>
                                                    <?php
                                                        if($de->vis_aided_right){
                                                            if($de->vis_aided_right == 'YES'){
                                                                $sa_aided_right_yes = 'checked';
                                                                $sa_aided_right_no = NULL;
                                                            } else if($de->vis_aided_right == 'NO') {
                                                                $sa_aided_right_yes = NULL;
                                                                $sa_aided_right_no = 'checked';
                                                            }
                                                        } else {
                                                            $sa_aided_right_yes = NULL;
                                                            $sa_aided_right_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sa_aided_right" class="medical-radio" value="YES" <?php echo $sa_aided_right_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sa_aided_right" class="medical-radio" value="NO" <?php echo $sa_aided_right_no; ?>>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th width="50%">Description</th>
                                                    <th width="15%">&nbsp;</th>
                                                    <th width="10%"><span class="label label-danger">Abnormal</span></th>
                                                    <th width="10%"><span class="label label-primary">Normal</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><code>13.0</code></td>
                                                    <td colspan="2">
                                                        <code>Others Abnormality</code>
                                                        <br /><small>If abnormal, describe under #15 Comments below</small>
                                                    </td>
                                                    <?php
                                                        if($de->others_general){
                                                            if($de->others_general == 'YES'){
                                                                $sa_other_yes = 'checked';
                                                                $sa_other_no = NULL;
                                                            } else if($de->others_general == 'NO') {
                                                                $sa_other_yes = NULL;
                                                                $sa_other_no = 'checked';
                                                            }
                                                        } else {
                                                            $sa_other_yes = NULL;
                                                            $sa_other_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sa_other" class="medical-radio" value="YES" <?php echo $sa_other_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sa_other" class="medical-radio" value="NO" <?php echo $sa_other_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>14.0</code></td>
                                                    <td><code>Comments</code><br ><small>Refer to Part 3, Section A: 5 - 14</small></td>
                                                    <td colspan="3">
                                                        <textarea name="sa_comment" class="form-control" placeholder="Comments"><?php echo empty($de->comment_general) ? NULL : strtoupper($de->comment_general); ?></textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!-- PART 2 | Physical Examination | Section B Systems Examination -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="pull-right">
                                            <span class="label label-success">Section B Systems Examination</span>
                                        </div>
                                        <span class="label label-success">Part 2</span> Physical Examination
                                    </div>
                                    <div class="panel-body">
                                        <h3>Section B Systems Examination</h3>
                                        <h4>1 - Cardiovascular System</h4>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th width="50%">Description</th>
                                                    <th width="15%">&nbsp;</th>
                                                    <th width="10%"><span class="label label-danger">Abnormal</span></th>
                                                    <th width="10%"><span class="label label-primary">Normal</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><code>1.1</code></td>
                                                    <td><code>Heart Sounds</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($de->cardio_heartsound){
                                                            if($de->cardio_heartsound == 'YES'){
                                                                $sb_heart_sound_yes = 'checked';
                                                                $sb_heart_sound_no = NULL;
                                                            } else if($de->cardio_heartsound == 'NO') {
                                                                $sb_heart_sound_yes = NULL;
                                                                $sb_heart_sound_no = 'checked';
                                                            }
                                                        } else {
                                                            $sb_heart_sound_yes = NULL;
                                                            $sb_heart_sound_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_heart_sound" class="medical-radio" value="YES" <?php echo $sb_heart_sound_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_heart_sound" class="medical-radio" value="NO" <?php echo $sb_heart_sound_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>1.2</code></td>
                                                    <td><code>Heart Size</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($de->cardio_heartsize){
                                                            if($de->cardio_heartsize == 'YES'){
                                                                $sb_heart_size_yes = 'checked';
                                                                $sb_heart_size_no = NULL;
                                                            } else if($de->cardio_heartsize == 'NO') {
                                                                $sb_heart_size_yes = NULL;
                                                                $sb_heart_size_no = 'checked';
                                                            }
                                                        } else {
                                                            $sb_heart_size_yes = NULL;
                                                            $sb_heart_size_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_heart_size" class="medical-radio" value="YES" <?php echo $sb_heart_size_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_heart_size" class="medical-radio" value="NO" <?php echo $sb_heart_size_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>1.3</code></td>
                                                    <td><code>Other Findings</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($de->cardio_other){
                                                            if($de->cardio_other == 'YES'){
                                                                $sb_heart_other_yes = 'checked';
                                                                $sb_heart_other_no = NULL;
                                                            } else if($de->cardio_other == 'NO') {
                                                                $sb_heart_other_yes = NULL;
                                                                $sb_heart_other_no = 'checked';
                                                            }
                                                        } else {
                                                            $sb_heart_other_yes = NULL;
                                                            $sb_heart_other_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_heart_other" class="medical-radio" value="YES" <?php echo $sb_heart_other_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_heart_other" class="medical-radio" value="NO" <?php echo $sb_heart_other_no; ?>>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <h4>2 - Respiratory System</h4>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th width="50%">Description</th>
                                                    <th width="15%">&nbsp;</th>
                                                    <th width="10%"><span class="label label-danger">Abnormal</span></th>
                                                    <th width="10%"><span class="label label-primary">Normal</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><code>2.1</code></td>
                                                    <td><code>Breath Sounds</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($de->res_breath){
                                                            if($de->res_breath == 'YES'){
                                                                $sb_breath_sound_yes = 'checked';
                                                                $sb_breath_sound_no = NULL;
                                                            } else if($de->res_breath == 'NO') {
                                                                $sb_breath_sound_yes = NULL;
                                                                $sb_breath_sound_no = 'checked';
                                                            }
                                                        } else {
                                                            $sb_breath_sound_yes = NULL;
                                                            $sb_breath_sound_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_breath_sound" class="medical-radio" value="YES" <?php echo $sb_breath_sound_yes; ?>>;
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_breath_sound" class="medical-radio" value="NO" <?php echo $sb_breath_sound_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>2.2</code></td>
                                                    <td><code>Other Findings</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($de->res_other){
                                                            if($de->res_other == 'YES'){
                                                                $sb_breath_other_yes = 'checked';
                                                                $sb_breath_other_no = NULL;
                                                            } else if($de->res_other == 'NO') {
                                                                $sb_breath_other_yes = NULL;
                                                                $sb_breath_other_no = 'checked';
                                                            }
                                                        } else {
                                                            $sb_breath_other_yes = NULL;
                                                            $sb_breath_other_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_breath_other" class="medical-radio" value="YES" <?php echo $sb_breath_other_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_breath_other" class="medical-radio" value="NO" <?php echo $sb_breath_other_no; ?>>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <h4>3 - Gastrointestinal System</h4>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th width="50%">Description</th>
                                                    <th width="15%">&nbsp;</th>
                                                    <th width="10%"><span class="label label-danger">Abnormal</span></th>
                                                    <th width="10%"><span class="label label-primary">Normal</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><code>3.1</code></td>
                                                    <td><code>Rectal Examination</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($de->abdomen_rectal){
                                                            if($de->abdomen_rectal == 'YES'){
                                                                $sb_rectal_yes = 'checked';
                                                                $sb_rectal_no = NULL;
                                                            } else if($de->abdomen_rectal == 'NO') {
                                                                $sb_rectal_yes = NULL;
                                                                $sb_rectal_no = 'checked';
                                                            }
                                                        } else {
                                                            $sb_rectal_yes = NULL;
                                                            $sb_rectal_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_rectal" class="medical-radio" value="YES" <?php echo $sb_rectal_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_rectal" class="medical-radio" value="NO" <?php echo $sb_rectal_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>3.2</code></td>
                                                    <td><code>Lymph Nodes</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($de->abdomen_lymph){
                                                            if($de->abdomen_lymph == 'YES'){
                                                                $sb_lymph_yes = 'checked';
                                                                $sb_lymph_no = NULL;
                                                            } else if($de->abdomen_lymph == 'NO') {
                                                                $sb_lymph_yes = NULL;
                                                                $sb_lymph_no = 'checked';
                                                            }
                                                        } else {
                                                            $sb_lymph_yes = NULL;
                                                            $sb_lymph_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_lymph" class="medical-radio" value="YES" <?php echo $sb_lymph_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_lymph" class="medical-radio" value="NO" <?php echo $sb_lymph_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>3.3</code></td>
                                                    <td><code>Swelling</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($de->abdomen_swelling){
                                                            if($de->abdomen_swelling == 'YES'){
                                                                $sb_swelling_yes = 'checked';
                                                                $sb_swelling_no = NULL;
                                                            } else if($de->abdomen_swelling == 'NO') {
                                                                $sb_swelling_yes = NULL;
                                                                $sb_swelling_no = 'checked';
                                                            }
                                                        } else {
                                                            $sb_swelling_yes = NULL;
                                                            $sb_swelling_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_swelling" class="medical-radio" value="YES" <?php echo $sb_swelling_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_swelling" class="medical-radio" value="NO" <?php echo $sb_swelling_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>3.4</code></td>
                                                    <td><code>Spleen</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($de->abdomen_spleen){
                                                            if($de->abdomen_spleen == 'YES'){
                                                                $sb_spleen_yes = 'checked';
                                                                $sb_spleen_no = NULL;
                                                            } else if($de->abdomen_spleen == 'NO') {
                                                                $sb_spleen_yes = NULL;
                                                                $sb_spleen_no = 'checked';
                                                            }
                                                        } else {
                                                            $sb_spleen_yes = NULL;
                                                            $sb_spleen_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_spleen" class="medical-radio" value="YES" <?php echo $sb_spleen_yes; ?>>;
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_spleen" class="medical-radio" value="NO" <?php echo $sb_spleen_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>3.5</code></td>
                                                    <td><code>Liver</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($de->abdomen_liver){
                                                            if($de->abdomen_liver == 'YES'){
                                                                $sb_liver_yes = 'checked';
                                                                $sb_liver_no = NULL;
                                                            } else if($de->abdomen_liver == 'NO') {
                                                                $sb_liver_yes = NULL;
                                                                $sb_liver_no = 'checked';
                                                            }
                                                        } else {
                                                            $sb_liver_yes = NULL;
                                                            $sb_liver_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_liver" class="medical-radio" value="YES" <?php echo $sb_liver_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_liver" class="medical-radio" value="NO" <?php echo $sb_liver_no; ?>>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <h4>4 - Nervous System and Mental Status</h4>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th width="50%">Description</th>
                                                    <th width="15%">&nbsp;</th>
                                                    <th width="10%"><span class="label label-danger">Abnormal</span></th>
                                                    <th width="10%"><span class="label label-primary">Normal</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><code>4.1</code></td>
                                                    <td><code>Reflexes</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($de->nerv_reflex){
                                                            if($de->nerv_reflex == 'YES'){
                                                                $sb_reflex_yes = 'checked';
                                                                $sb_reflex_no = NULL;
                                                            } else if($de->nerv_reflex == 'NO') {
                                                                $sb_reflex_yes = NULL;
                                                                $sb_reflex_no = 'checked';
                                                            }
                                                        } else {
                                                            $sb_reflex_yes = NULL;
                                                            $sb_reflex_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_reflex" class="medical-radio" value="YES" <?php echo $sb_reflex_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_reflex" class="medical-radio" value="NO" <?php echo $sb_reflex_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>4.2</code></td>
                                                    <td><code>Sensory Power</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($de->nerv_sensor){
                                                            if($de->nerv_sensor == 'YES'){
                                                                $sb_sensor_yes = 'checked';
                                                                $sb_sensor_no = NULL;
                                                            } else if($de->nerv_sensor == 'NO') {
                                                                $sb_sensor_yes = NULL;
                                                                $sb_sensor_no = 'checked';
                                                            }
                                                        } else {
                                                            $sb_sensor_yes = NULL;
                                                            $sb_sensor_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_sensor" class="medical-radio" value="YES" <?php echo $sb_sensor_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_sensor" class="medical-radio" value="NO" <?php echo $sb_sensor_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>4.3</code></td>
                                                    <td><code>Motor Power</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($de->nerv_motor){
                                                            if($de->nerv_motor == 'YES'){
                                                                $sb_motor_yes = 'checked';
                                                                $sb_motor_no = NULL;
                                                            } else if($de->nerv_motor == 'NO') {
                                                                $sb_motor_yes = NULL;
                                                                $sb_motor_no = 'checked';
                                                            }
                                                        } else {
                                                            $sb_motor_yes = NULL;
                                                            $sb_motor_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_motor" class="medical-radio" value="YES" <?php echo $sb_motor_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_motor" class="medical-radio" value="NO" <?php echo $sb_motor_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>4.4</code></td>
                                                    <td><code>Size Of Peripheral Nerves</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($de->nerv_size){
                                                            if($de->nerv_size == 'YES'){
                                                                $sb_nerve_yes = 'checked';
                                                                $sb_nerve_no = NULL;
                                                            } else if($de->nerv_size == 'NO') {
                                                                $sb_nerve_yes = NULL;
                                                                $sb_nerve_no = 'checked';
                                                            }
                                                        } else {
                                                            $sb_nerve_yes = NULL;
                                                            $sb_nerve_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_nerve" class="medical-radio" value="YES" <?php echo $sb_nerve_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_nerve" class="medical-radio" value="NO" <?php echo $sb_nerve_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>4.5</code></td>
                                                    <td><code>Cognitive Function</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($de->nerv_cognitive){
                                                            if($de->nerv_cognitive == 'YES'){
                                                                $sb_cognitive_yes = 'checked';
                                                                $sb_cognitive_no = NULL;
                                                            } else if($de->nerv_cognitive == 'NO') {
                                                                $sb_cognitive_yes = NULL;
                                                                $sb_cognitive_no = 'checked';
                                                            }
                                                        } else {
                                                            $sb_cognitive_yes = NULL;
                                                            $sb_cognitive_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_cognitive" class="medical-radio" value="YES" <?php echo $sb_cognitive_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_cognitive" class="medical-radio" value="NO" <?php echo $sb_cognitive_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>4.6</code></td>
                                                    <td><code>Speech</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($de->nerv_speech){
                                                            if($de->nerv_speech == 'YES'){
                                                                $sb_speech_yes = 'checked';
                                                                $sb_speech_no = NULL;
                                                            } else if($de->nerv_speech == 'NO') {
                                                                $sb_speech_yes = NULL;
                                                                $sb_speech_no = 'checked';
                                                            }
                                                        } else {
                                                            $sb_speech_yes = NULL;
                                                            $sb_speech_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_speech" class="medical-radio" value="YES" <?php echo $sb_speech_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_speech" class="medical-radio" value="NO" <?php echo $sb_speech_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>4.7</code></td>
                                                    <td><code>General Mental Status</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($de->nerv_mental){
                                                            if($de->nerv_mental == 'YES'){
                                                                $sb_mental_yes = 'checked';
                                                                $sb_mental_no = NULL;
                                                            } else if($de->nerv_mental == 'NO') {
                                                                $sb_mental_yes = NULL;
                                                                $sb_mental_no = 'checked';
                                                            }
                                                        } else {
                                                            $sb_mental_yes = NULL;
                                                            $sb_mental_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_mental" class="medical-radio" value="YES" <?php echo $sb_mental_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_mental" class="medical-radio" value="NO" <?php echo $sb_mental_no; ?>>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <h4>5 - Genitourinary System</h4>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th width="50%">Description</th>
                                                    <th width="15%">&nbsp;</th>
                                                    <th width="10%"><span class="label label-danger">Abnormal</span></th>
                                                    <th width="10%"><span class="label label-primary">Normal</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><code>5.1</code></td>
                                                    <td><code>Sores/Ulcer</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($de->gen_sores){
                                                            if($de->gen_sores == 'YES'){
                                                                $sb_ulcer_yes = 'checked';
                                                                $sb_ulcer_no = NULL;
                                                            } else if($de->gen_sores == 'NO') {
                                                                $sb_ulcer_yes = NULL;
                                                                $sb_ulcer_no = 'checked';
                                                            }
                                                        } else {
                                                            $sb_ulcer_yes = NULL;
                                                            $sb_ulcer_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_ulcer" class="medical-radio" value="YES" <?php echo $sb_ulcer_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_ulcer" class="medical-radio" value="NO" <?php echo $sb_ulcer_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>5.2</code></td>
                                                    <td><code>Discharge</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($de->gen_discharge){
                                                            if($de->gen_discharge == 'YES'){
                                                                $sb_discharge_yes = 'checked';
                                                                $sb_discharge_no = NULL;
                                                            } else if($de->gen_discharge == 'NO') {
                                                                $sb_discharge_yes = NULL;
                                                                $sb_discharge_no = 'checked';
                                                            }
                                                        } else {
                                                            $sb_discharge_yes = NULL;
                                                            $sb_discharge_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_discharge" class="medical-radio" value="YES" <?php echo $sb_discharge_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_discharge" class="medical-radio" value="NO" <?php echo $sb_discharge_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>5.3</code></td>
                                                    <td><code>Kidney</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($de->gen_kidney){
                                                            if($de->gen_kidney == 'YES'){
                                                                $sb_kidney_yes = 'checked';
                                                                $sb_kidney_no = NULL;
                                                            } else if($de->gen_kidney == 'NO') {
                                                                $sb_kidney_yes = NULL;
                                                                $sb_kidney_no = 'checked';
                                                            }
                                                        } else {
                                                            $sb_kidney_yes = NULL;
                                                            $sb_kidney_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_kidney" class="medical-radio" value="YES" <?php echo $sb_kidney_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="sb_kidney" class="medical-radio" value="NO" <?php echo $sb_kidney_no; ?>>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <h4>6 - Comments</h4>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th width="5%">&nbsp;</th>
                                                    <th>Description</th>
                                                    <th width="30%">&nbsp;</th>
                                                    <th width="10%">&nbsp;</th>
                                                    <th width="10%">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><code>6.0</code></td>
                                                    <td><code>Comments</code><br ><small>Refer to Part 3, Section B: 1 - 5</small></td>
                                                    <td colspan="3">
                                                        <textarea name="sb_comment" class="form-control" placeholder="Comments"><?php echo empty($de->comment_gen) ? NULL : strtoupper($de->comment_gen); ?></textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- PART 3 | Medical History | Category 1 Disease -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="pull-right">
                                            <span class="label label-success">Category 1 Disease</span>
                                        </div>
                                        <span class="label label-success">Part 3</span> Medical History
                                    </div>
                                    <div class="panel-body">
                                        <h3>Category 1 Disease</h3>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th>Disease</th>
                                                    <th width="10%"><span class="label label-danger">Yes</span></th>
                                                    <th width="10%"><span class="label label-primary">No</span></th>
                                                    <th width="40%">Date Detected Since</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><code>1.1</code></td>
                                                    <td><code>Malaria</code></td>
                                                    <?php
                                                        if($de->malaria){
                                                            if($de->malaria == 'YES'){
                                                                $c1_malaria_yes = 'checked';
                                                                $c1_malaria_no = NULL;
                                                            } else if($de->malaria == 'NO') {
                                                                $c1_malaria_yes = NULL;
                                                                $c1_malaria_no = 'checked';
                                                            }
                                                        } else {
                                                            $c1_malaria_yes = NULL;
                                                            $c1_malaria_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="c1_malaria" class="medical-radio" value="YES" <?php echo $c1_malaria_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="c1_malaria" class="medical-radio" value="NO" <?php echo $c1_malaria_no; ?>>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" name="c1_malaria_date" class="form-control" placeholder="Date" value="<?php echo empty($de->malaria_date) ? NULL : date("d-m-Y", strtotime($de->malaria_date)); ?>" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>1.2</code></td>
                                                    <td><code>Sexually Transmitted</code><br /><code>Diseases</code></td>
                                                    <?php
                                                        if($de->std){
                                                            if($de->std == 'YES'){
                                                                $c1_std_yes = 'checked';
                                                                $c1_std_no = NULL;
                                                            } else if($de->std == 'NO') {
                                                                $c1_std_yes = NULL;
                                                                $c1_std_no = 'checked';
                                                            }
                                                        } else {
                                                            $c1_std_yes = NULL;
                                                            $c1_std_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="c1_std" class="medical-radio" value="YES" <?php echo $c1_std_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="c1_std" class="medical-radio" value="NO" <?php echo $c1_std_no; ?>>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" name="c1_std_date" class="form-control" placeholder="Date" value="<?php echo empty($de->std_date) ? NULL : date("d-m-Y", strtotime($de->std_date)); ?>" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>1.3</code></td>
                                                    <td><code>Cancer</code></td>
                                                    <?php
                                                        if($de->cancer){
                                                            if($de->cancer == 'YES'){
                                                                $c1_cancer_yes = 'checked';
                                                                $c1_cancer_no = NULL;
                                                            } else if($de->cancer == 'NO') {
                                                                $c1_cancer_yes = NULL;
                                                                $c1_cancer_no = 'checked';
                                                            }
                                                        } else {
                                                            $c1_cancer_yes = NULL;
                                                            $c1_cancer_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="c1_cancer" class="medical-radio" value="YES" <?php echo $c1_cancer_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="c1_cancer" class="medical-radio" value="NO" <?php echo $c1_cancer_no; ?>>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" name="c1_cancer_date" class="form-control" placeholder="Date" value="<?php echo empty($de->cancer_date) ? NULL : date("d-m-Y", strtotime($de->cancer_date)); ?>" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>1.4</code></td>
                                                    <td><code>Epilepsy</code></td>
                                                    <?php
                                                        if($de->epilepsy){
                                                            if($de->epilepsy == 'YES'){
                                                                $c1_epilepsy_yes = 'checked';
                                                                $c1_epilepsy_no = NULL;
                                                            } else if($de->epilepsy == 'NO') {
                                                                $c1_epilepsy_yes = NULL;
                                                                $c1_epilepsy_no = 'checked';
                                                            }
                                                        } else {
                                                            $c1_epilepsy_yes = NULL;
                                                            $c1_epilepsy_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="c1_epilepsy" class="medical-radio" value="YES" <?php echo $c1_epilepsy_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="c1_epilepsy" class="medical-radio" value="NO" <?php echo $c1_epilepsy_no; ?>>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" name="c1_epilepsy_date" class="form-control" placeholder="Date" value="<?php echo empty($de->epilepsy_date) ? NULL : date("d-m-Y", strtotime($de->epilepsy_date)); ?>" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>1.5</code></td>
                                                    <td><code>Psychiatric Illness</code></td>
                                                    <?php
                                                        if($de->psychiatric){
                                                            if($de->psychiatric == 'YES'){
                                                                $c1_psychiatric_yes = 'checked';
                                                                $c1_psychiatric_no = NULL;
                                                            } else if($de->psychiatric == 'NO') {
                                                                $c1_psychiatric_yes = NULL;
                                                                $c1_psychiatric_no = 'checked';
                                                            }
                                                        } else {
                                                            $c1_psychiatric_yes = NULL;
                                                            $c1_psychiatric_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="c1_psychiatric" class="medical-radio" value="YES" <?php echo $c1_psychiatric_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="c1_psychiatric" class="medical-radio" value="NO" <?php echo $c1_psychiatric_no; ?>>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" name="c1_psychiatric_date" class="form-control" placeholder="Date" value="<?php echo empty($de->psychiatric_date) ? NULL : date("d-m-Y", strtotime($de->psychiatric_date)); ?>" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>1.6</code></td>
                                                    <td><code>Viral Hepatitis</code></td>
                                                    <?php
                                                        if($de->viral){
                                                            if($de->viral == 'YES'){
                                                                $c1_hepatitis_yes = 'checked';
                                                                $c1_hepatitis_no = NULL;
                                                            } else if($de->viral == 'NO') {
                                                                $c1_hepatitis_yes = NULL;
                                                                $c1_hepatitis_no = 'checked';
                                                            }
                                                        } else {
                                                            $c1_hepatitis_yes = NULL;
                                                            $c1_hepatitis_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="c1_hepatitis" class="medical-radio" value="YES" <?php echo $c1_hepatitis_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="c1_hepatitis" class="medical-radio" value="NO" checked <?php echo $c1_hepatitis_no; ?>>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" name="c1_hepatitis_date" class="form-control" placeholder="Date" value="<?php echo empty($de->viral_date) ? NULL : date("d-m-Y", strtotime($de->viral_date)); ?>" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>1.7</code></td>
                                                    <td><code>Leprosy</code></td>
                                                    <?php
                                                        if($de->leprosy){
                                                            if($de->leprosy == 'YES'){
                                                                $c1_leprosy_yes = 'checked';
                                                                $c1_leprosy_no = NULL;
                                                            } else if($de->leprosy == 'NO') {
                                                                $c1_leprosy_yes = NULL;
                                                                $c1_leprosy_no = 'checked';
                                                            }
                                                        } else {
                                                            $c1_leprosy_yes = NULL;
                                                            $c1_leprosy_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="c1_leprosy" class="medical-radio" value="YES" <?php echo $c1_leprosy_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="c1_leprosy" class="medical-radio" value="NO" <?php echo $c1_leprosy_no; ?>>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" name="c1_leprosy_date" class="form-control" placeholder="Date" value="<?php echo empty($de->leprosy_date) ? NULL : date("d-m-Y", strtotime($de->leprosy_date)); ?>" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>1.8</code></td>
                                                    <td><code>Tuberculosis</code></td>
                                                    <?php
                                                        if($de->tuber){
                                                            if($de->tuber == 'YES'){
                                                                $c1_tuberculosis_yes = 'checked';
                                                                $c1_tuberculosis_no = NULL;
                                                            } else if($de->tuber == 'NO') {
                                                                $c1_tuberculosis_yes = NULL;
                                                                $c1_tuberculosis_no = 'checked';
                                                            }
                                                        } else {
                                                            $c1_tuberculosis_yes = NULL;
                                                            $c1_tuberculosis_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="c1_tuberculosis" class="medical-radio" value="YES" <?php echo $c1_tuberculosis_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="c1_tuberculosis" class="medical-radio" value="NO" <?php echo $c1_tuberculosis_no; ?>>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" name="c1_tuberculosis_date" class="form-control" placeholder="Date" value="<?php echo empty($de->tuber_date) ? NULL : date("d-m-Y", strtotime($de->tuber_date)); ?>" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>1.9</code></td>
                                                    <td><code>HIV/Aids</code></td>
                                                    <?php
                                                        if($de->hiv){
                                                            if($de->hiv == 'YES'){
                                                                $c1_hiv_yes = 'checked';
                                                                $c1_hiv_no = NULL;
                                                            } else if($de->hiv == 'NO') {
                                                                $c1_hiv_yes = NULL;
                                                                $c1_hiv_no = 'checked';
                                                            }
                                                        } else {
                                                            $c1_hiv_yes = NULL;
                                                            $c1_hiv_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="c1_hiv" class="medical-radio" value="YES" <?php echo $c1_hiv_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="c1_hiv" class="medical-radio" value="NO" <?php echo $c1_hiv_no; ?>>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" name="c1_hiv_date" class="form-control" placeholder="Date" value="<?php echo empty($de->hiv_date) ? NULL : date("d-m-Y", strtotime($de->hiv_date)); ?>" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!-- PART 3 | Medical History | Category 2 Disease -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="pull-right">
                                            <span class="label label-success">Category 2 Disease</span>
                                        </div>
                                        <span class="label label-success">Part 3</span> Medical History
                                    </div>
                                    <div class="panel-body">
                                        <h3>Category 2 Disease</h3>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th>Disease</th>
                                                    <th width="10%"><span class="label label-danger">Yes</span></th>
                                                    <th width="10%"><span class="label label-primary">No</span></th>
                                                    <th width="40%">Date Detected Since</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><code>2.1</code></td>
                                                    <td><code>Kidney Diseases</code></td>
                                                    <?php
                                                        if($de->kidney){
                                                            if($de->kidney == 'YES'){
                                                                $c2_kidney_yes = 'checked';
                                                                $c2_kidney_no = NULL;
                                                            } else if($de->kidney == 'NO') {
                                                                $c2_kidney_yes = NULL;
                                                                $c2_kidney_no = 'checked';
                                                            }
                                                        } else {
                                                            $c2_kidney_yes = NULL;
                                                            $c2_kidney_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="c2_kidney" class="medical-radio" value="YES" <?php echo $c2_kidney_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="c2_kidney" class="medical-radio" value="NO" <?php echo $c2_kidney_no; ?>>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" name="c2_kidney_date" class="form-control" placeholder="Date" value="<?php echo empty($de->kidney_date) ? NULL : date("d-m-Y", strtotime($de->kidney_date)); ?>" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>2.2</code></td>
                                                    <td><code>Peptic Ulcer</code></td>
                                                    <?php
                                                        if($de->ulcer){
                                                            if($de->ulcer == 'YES'){
                                                                $c2_ulcer_yes = 'checked';
                                                                $c2_ulcer_no = NULL;
                                                            } else if($de->ulcer == 'NO') {
                                                                $c2_ulcer_yes = NULL;
                                                                $c2_ulcer_no = 'checked';
                                                            }
                                                        } else {
                                                            $c2_ulcer_yes = NULL;
                                                            $c2_ulcer_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="c2_ulcer" class="medical-radio" value="YES" <?php echo $c2_ulcer_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="c2_ulcer" class="medical-radio" value="NO" <?php echo $c2_ulcer_no; ?>>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" name="c2_ulcer_date" class="form-control" placeholder="Date" value="<?php echo empty($de->ulcer_date) ? NULL : date("d-m-Y", strtotime($de->ulcer_date)); ?>" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>2.3</code></td>
                                                    <td><code>Diabetes Melitus</code></td>
                                                    <?php
                                                        if($de->diabetes){
                                                            if($de->diabetes == 'YES'){
                                                                $c2_diabetes_yes = 'checked';
                                                                $c2_diabetes_no = NULL;
                                                            } else if($de->diabetes == 'NO') {
                                                                $c2_diabetes_yes = NULL;
                                                                $c2_diabetes_no = 'checked';
                                                            }
                                                        } else {
                                                            $c2_diabetes_yes = NULL;
                                                            $c2_diabetes_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="c2_diabetes" class="medical-radio" value="YES" <?php echo $c2_diabetes_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="c2_diabetes" class="medical-radio" value="NO" <?php echo $c2_diabetes_no; ?>>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" name="c2_diabetes_date" class="form-control" placeholder="Date" value="<?php echo empty($de->diabetes_date) ? NULL : date("d-m-Y", strtotime($de->diabetes_date)); ?>" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>2.4</code></td>
                                                    <td><code>Bronchial Asthma</code></td>
                                                    <?php
                                                        if($de->asthma){
                                                            if($de->asthma == 'YES'){
                                                                $c2_asthma_yes = 'checked';
                                                                $c2_asthma_no = NULL;
                                                            } else if($de->asthma == 'NO') {
                                                                $c2_asthma_yes = NULL;
                                                                $c2_asthma_no = 'checked';
                                                            }
                                                        } else {
                                                            $c2_asthma_yes = NULL;
                                                            $c2_asthma_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="c2_asthma" class="medical-radio" value="YES" <?php echo $c2_asthma_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="c2_asthma" class="medical-radio" value="NO" <?php echo $c2_asthma_no; ?>>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" name="c2_asthma_date" class="form-control" placeholder="Date" value="<?php echo empty($de->asthma_date) ? NULL : date("d-m-Y", strtotime($de->asthma_date)); ?>" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>2.5</code></td>
                                                    <td><code>Heart Diseases</code></td>
                                                    <?php
                                                        if($de->heart_disease){
                                                            if($de->heart_disease == 'YES'){
                                                                $c2_heart_yes = 'checked';
                                                                $c2_heart_no = NULL;
                                                            } else if($de->heart_disease == 'NO') {
                                                                $c2_heart_yes = NULL;
                                                                $c2_heart_no = 'checked';
                                                            }
                                                        } else {
                                                            $c2_heart_yes = NULL;
                                                            $c2_heart_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="c2_heart" class="medical-radio" value="YES" <?php echo $c2_heart_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="c2_heart" class="medical-radio" value="NO" <?php echo $c2_heart_no; ?>>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" name="c2_heart_date" class="form-control" placeholder="Date" value="<?php echo empty($de->heart_disease_date) ? NULL : date("d-m-Y", strtotime($de->heart_disease_date)); ?>" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>2.6</code></td>
                                                    <td><code>Hypertension</code></td>
                                                    <?php
                                                        if($de->hypertension){
                                                            if($de->hypertension == 'YES'){
                                                                $c2_tension_yes = 'checked';
                                                                $c2_tension_no = NULL;
                                                            } else if($de->hypertension == 'NO') {
                                                                $c2_tension_yes = NULL;
                                                                $c2_tension_no = 'checked';
                                                            }
                                                        } else {
                                                            $c2_tension_yes = NULL;
                                                            $c2_tension_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="c2_tension" class="medical-radio" value="YES" <?php echo $c2_tension_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="c2_tension" class="medical-radio" value="NO" <?php echo $c2_tension_no; ?>>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" name="c2_tension_date" class="form-control" placeholder="Date" value="<?php echo empty($de->hypertension_date) ? NULL : date("d-m-Y", strtotime($de->hypertension_date)); ?>" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>2.7</code></td>
                                                    <td><code>Others</code></td>
                                                    <?php
                                                        if($de->others_history){
                                                            if($de->others_history == 'YES'){
                                                                $c2_other_yes = 'checked';
                                                                $c2_other_no = NULL;
                                                            } else if($de->others_history == 'NO') {
                                                                $c2_other_yes = NULL;
                                                                $c2_other_no = 'checked';
                                                            }
                                                        } else {
                                                            $c2_other_yes = NULL;
                                                            $c2_other_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="c2_other" class="medical-radio" value="YES" <?php echo $c2_other_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="c2_other" class="medical-radio" value="NO" checked <?php echo $c2_other_no; ?>>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" name="c2_other_date" class="form-control" placeholder="Date" value="<?php echo empty($de->others_history_date) ? NULL : date("d-m-Y", strtotime($de->others_history_date)); ?>" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>3.0</code></td>
                                                    <td><code>Taken medication/drug</code><br /><code>within the last 2 weeks?</code></td>
                                                    <?php
                                                        if($de->drugs){
                                                            if($de->drugs == 'YES'){
                                                                $c2_drug_yes = 'checked';
                                                                $c2_drug_no = NULL;
                                                            } else if($de->drugs == 'NO') {
                                                                $c2_drug_yes = NULL;
                                                                $c2_drug_no = 'checked';
                                                            }
                                                        } else {
                                                            $c2_drug_yes = NULL;
                                                            $c2_drug_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="c2_drug" class="medical-radio" value="YES" <?php echo $c2_drug_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="c2_drug" class="medical-radio" value="NO" checked <?php echo $c2_drug_no; ?>>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td><code>4.0</code></td>
                                                    <td><code>Comments</code><br ><small>Refer to Part 2</small></td>
                                                    <td colspan="3">
                                                        <textarea name="c2_comment" class="form-control" placeholder="Comments"><?php echo empty($de->comment_history) ? NULL : strtoupper($de->comment_history); ?></textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="message-medical"></div>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <span class="pull-right m-r-md">
                                <a id="update-medical" class="btn btn-w-m btn-primary">Save</a>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- LAB & XRAY -->
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title" style="background-color: #1791d9; color: white;">
                    <h5>Lab & X-Ray Result</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link link-labxray">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
            <?php //if($le || $xe){ ?>
                <form id="form-update-labxray">
                    <div class="ibox-content ibox-content-labxray">
                        <div class="message-labxray"></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="hidden" name="transaction_id" value="<?php echo $transaction->id; ?>" />
                                <input type="hidden" name="type_id" class="type-id" value="<?php echo $_GET['type']; ?>" />
                                <!-- PART 3 | Physical Examination | Section C Lab Result -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="pull-right">
                                            <span class="label label-success">Section C Lab Result</span>
                                        </div>
                                        <span class="label label-success">Part 3</span> Physical Examination
                                    </div>
                                    <div class="panel-body">
                                        <h3>Section C Lab Result</h3>
                                        <h4>Lab Result</h4>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th width="40%">Description</th>
                                                    <th width="12%">&nbsp;</th>
                                                    <th width="40%">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><code>1.0</code></td>
                                                    <td><code>Specimen Received Date</code></td>
                                                    <th>&nbsp;</th>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" name="lab_specimen_date" class="form-control" placeholder="Date" value="<?php echo empty($le->specimen_date) ? NULL : date("d-m-Y", strtotime($le->specimen_date)); ?>" data-required="true" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <h4>Blood Tests</h4>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th width="40%">Description</th>
                                                    <th width="12%">&nbsp;</th>
                                                    <th width="40%">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><code>2.1</code></td>
                                                    <td>
                                                        <code>Blood Group</code>
                                                        <br /><small>Indicate in A, B, AB or D</small>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-flask"></i></span>
                                                                <select name="lab_blood_group" class="form-control chosen-bloodgroup" data-required="true">
                                                                    <option value="" <?php echo empty($le->blood_group) ? 'selected' : NULL; ?>>Select</option>
                                                                    <option value="A" <?php echo $le->blood_group == 'A' ? 'selected' : NULL; ?>>A</option>
                                                                    <option value="B" <?php echo $le->blood_group == 'B' ? 'selected' : NULL; ?>>B</option>
                                                                    <option value="AB" <?php echo $le->blood_group == 'AB' ? 'selected' : NULL; ?>>AB</option>
                                                                    <option value="O" <?php echo $le->blood_group == 'O' ? 'selected' : NULL; ?>>O</option>
                                                                </select>
                                                            </div>    
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>2.2</code></td>
                                                    <td><code>Blood Group, Rh</code></td>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-flask"></i></span>
                                                                <select name="lab_blood_group_rh" class="form-control chosen-bloodgroup-rh" data-required="true">
                                                                    <option value="" <?php echo empty($le->blood_group_rh) ? 'selected' : NULL; ?>>Select</option>
                                                                    <option value="+ve" <?php echo $le->blood_group_rh == '+ve' ? 'selected' : NULL; ?>>+ve</option>
                                                                    <option value="-ve" <?php echo $le->blood_group_rh == '-ve' ? 'selected' : NULL; ?>>-ve</option>
                                                                </select>
                                                            </div>    
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th width="50%">Description</th>
                                                    <th width="15%">&nbsp;</th>
                                                    <th width="10%"><span class="label label-danger">Positive</span></th>
                                                    <th width="10%"><span class="label label-primary">Negative</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><code>3.0</code></td>
                                                    <td><code>Malaria</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($le->blood_malaria){
                                                            if($le->blood_malaria == 'YES'){
                                                                $lab_malaria_yes = 'checked';
                                                                $lab_malaria_no = NULL;
                                                            } else if($le->blood_malaria == 'NO') {
                                                                $lab_malaria_yes = NULL;
                                                                $lab_malaria_no = 'checked';
                                                            }
                                                        } else {
                                                            $lab_malaria_yes = NULL;
                                                            $lab_malaria_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="lab_malaria" class="medical-radio" value="YES" <?php echo $lab_malaria_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="lab_malaria" class="medical-radio" value="NO" <?php echo $lab_malaria_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>4.0</code></td>
                                                    <td><code>VDRL</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($le->blood_vdrl){
                                                            if($le->blood_vdrl == 'YES'){
                                                                $lab_vdrl_yes = 'checked';
                                                                $lab_vdrl_no = NULL;
                                                            } else if($le->blood_vdrl == 'NO') {
                                                                $lab_vdrl_yes = NULL;
                                                                $lab_vdrl_no = 'checked';
                                                            }
                                                        } else {
                                                            $lab_vdrl_yes = NULL;
                                                            $lab_vdrl_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="lab_vdrl" class="medical-radio" value="YES" <?php echo $lab_vdrl_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="lab_vdrl" class="medical-radio" value="NO" <?php echo $lab_vdrl_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>5.0</code></td>
                                                    <td><code>HBsAg</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($le->blood_hbsag){
                                                            if($le->blood_hbsag == 'YES'){
                                                                $lab_hbsag_yes = 'checked';
                                                                $lab_hbsag_no = NULL;
                                                            } else if($le->blood_hbsag == 'NO') {
                                                                $lab_hbsag_yes = NULL;
                                                                $lab_hbsag_no = 'checked';
                                                            }
                                                        } else {
                                                            $lab_hbsag_yes = NULL;
                                                            $lab_hbsag_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="lab_hbsag" class="medical-radio" value="YES" <?php echo $lab_hbsag_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="lab_hbsag" class="medical-radio" value="NO" <?php echo $lab_hbsag_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>6.0</code></td>
                                                    <td><code>HIV Antibody</code> <small>ELISA</small></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($le->blood_hiv){
                                                            if($le->blood_hiv == 'YES'){
                                                                $lab_hiv_yes = 'checked';
                                                                $lab_hiv_no = NULL;
                                                            } else if($le->blood_hiv == 'NO') {
                                                                $lab_hiv_yes = NULL;
                                                                $lab_hiv_no = 'checked';
                                                            }
                                                        } else {
                                                            $lab_hiv_yes = NULL;
                                                            $lab_hiv_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="lab_hiv" class="medical-radio" value="YES" <?php echo $lab_hiv_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="lab_hiv" class="medical-radio" value="NO" <?php echo $lab_hiv_no; ?>>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <h4>Urine Tests</h4>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th width="50%">Description</th>
                                                    <th width="15%">&nbsp;</th>
                                                    <th width="10%"><span class="label label-danger">Positive</span></th>
                                                    <th width="10%"><span class="label label-primary">Negative</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><code>7.0</code></td>
                                                    <td><code>Cannabis</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($le->urine_cannabis){
                                                            if($le->urine_cannabis == 'YES'){
                                                                $lab_cannabis_yes = 'checked';
                                                                $lab_cannabis_no = NULL;
                                                            } else if($le->urine_cannabis == 'NO') {
                                                                $lab_cannabis_yes = NULL;
                                                                $lab_cannabis_no = 'checked';
                                                            }
                                                        } else {
                                                            $lab_cannabis_yes = NULL;
                                                            $lab_cannabis_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="lab_cannabis" class="medical-radio" value="YES" <?php echo $lab_cannabis_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="lab_cannabis" class="medical-radio" value="NO" <?php echo $lab_cannabis_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>8.0</code></td>
                                                    <td><code>Opiates</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($le->urine_opiates){
                                                            if($le->urine_opiates == 'YES'){
                                                                $lab_opiates_yes = 'checked';
                                                                $lab_opiates_no = NULL;
                                                            } else if($le->urine_opiates == 'NO') {
                                                                $lab_opiates_yes = NULL;
                                                                $lab_opiates_no = 'checked';
                                                            }
                                                        } else {
                                                            $lab_opiates_yes = NULL;
                                                            $lab_opiates_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="lab_opiates" class="medical-radio" value="YES" <?php echo $lab_opiates_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="lab_opiates" class="medical-radio" value="NO" <?php echo $lab_opiates_no; ?>>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th width="50%">Description</th>
                                                    <th width="15%">&nbsp;</th>
                                                    <th width="10%"><span class="label label-danger">Abnormal</span></th>
                                                    <th width="10%"><span class="label label-primary">Normal</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><code>9.0</code></td>
                                                    <td><code>Microscopic Examination</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($le->urine_microscopic){
                                                            if($le->urine_microscopic == 'YES'){
                                                                $lab_microscopic_yes = 'checked';
                                                                $lab_microscopic_no = NULL;
                                                            } else if($le->urine_microscopic == 'NO') {
                                                                $lab_microscopic_yes = NULL;
                                                                $lab_microscopic_no = 'checked';
                                                            }
                                                        } else {
                                                            $lab_microscopic_yes = NULL;
                                                            $lab_microscopic_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="lab_microscopic" class="medical-radio" value="YES" <?php echo $lab_microscopic_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="lab_microscopic" class="medical-radio" value="NO" <?php echo $lab_microscopic_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>10.0</code></td>
                                                    <td><code>Albumin</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($le->urine_albumin){
                                                            if($le->urine_albumin == 'YES'){
                                                                $lab_albumin_yes = 'checked';
                                                                $lab_albumin_no = NULL;
                                                            } else if($le->urine_albumin == 'NO') {
                                                                $lab_albumin_yes = NULL;
                                                                $lab_albumin_no = 'checked';
                                                            }
                                                        } else {
                                                            $lab_albumin_yes = NULL;
                                                            $lab_albumin_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="lab_albumin" class="medical-radio" value="YES" <?php echo $lab_albumin_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="lab_albumin" class="medical-radio" value="NO" <?php echo $lab_albumin_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>11.0</code></td>
                                                    <td><code>Sugar</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($le->urine_sugar){
                                                            if($le->urine_sugar == 'YES'){
                                                                $lab_sugar_yes = 'checked';
                                                                $lab_sugar_no = NULL;
                                                            } else if($le->urine_sugar == 'NO') {
                                                                $lab_sugar_yes = NULL;
                                                                $lab_sugar_no = 'checked';
                                                            }
                                                        } else {
                                                            $lab_sugar_yes = NULL;
                                                            $lab_sugar_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="lab_sugar" class="medical-radio" value="YES" <?php echo $lab_sugar_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="lab_sugar" class="medical-radio" value="NO" <?php echo $lab_sugar_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>12.0</code></td>
                                                    <td><code>Specific Gravity</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($le->urine_gravity){
                                                            if($le->urine_gravity == 'YES'){
                                                                $lab_gravity_yes = 'checked';
                                                                $lab_gravity_no = NULL;
                                                            } else if($le->urine_gravity == 'NO') {
                                                                $lab_gravity_yes = NULL;
                                                                $lab_gravity_no = 'checked';
                                                            }
                                                        } else {
                                                            $lab_gravity_yes = NULL;
                                                            $lab_gravity_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="lab_gravity" class="medical-radio" value="YES" <?php echo $lab_gravity_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="lab_gravity" class="medical-radio" value="NO" <?php echo $lab_gravity_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>13.0</code></td>
                                                    <td><code>Colour</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($le->urine_color){
                                                            if($le->urine_color == 'YES'){
                                                                $lab_colour_yes = 'checked';
                                                                $lab_colour_no = NULL;
                                                            } else if($le->urine_color == 'NO') {
                                                                $lab_colour_yes = NULL;
                                                                $lab_colour_no = 'checked';
                                                            }
                                                        } else {
                                                            $lab_colour_yes = NULL;
                                                            $lab_colour_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="lab_colour" class="medical-radio" value="YES" <?php echo $lab_colour_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="lab_colour" class="medical-radio" value="NO" <?php echo $lab_colour_no; ?>>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <h4>Lab Comment</h4>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th width="40%">Description</th>
                                                    <th width="55%">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><code>14.0</code></td>
                                                    <td><code>Reason If Abnormal</code></td>
                                                    <td>
                                                        <textarea name="lab_reason" class="form-control" placeholder="Reason"><?php echo empty($le->reason_if_abnormal) ? NULL : strtoupper($le->reason_if_abnormal); ?></textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <h4>5 - Lab Report</h4>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th width="40%">Description</th>
                                                    <th width="55%">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><code>5.0</code></td>
                                                    <td><code>Date Of Lab Report</code></td>
                                                    <td>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="lab_report_date" class="form-control" placeholder="Date" value="<?php echo empty($le->report_date) ? NULL : date("d-m-Y", strtotime($le->report_date)); ?>" data-required="true" />
                                                        </div>    
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <div class="checkbox checkbox-success">
                                                            <input name="sc_read" type="checkbox" class="review-lab-select" value="YES" <?php echo empty($le->read) ? NULL : 'checked'; ?>>
                                                            <label class="text-danger">Yes, I have reviewed lab result for this foreign worker.</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="message-lab"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!-- PART 3 | Physical Examination | Section D X-Ray Result -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="pull-right">
                                            <span class="label label-success">Section D X-Ray Result</span>
                                        </div>
                                        <span class="label label-success">Part 3</span> Physical Examination
                                    </div>
                                    <div class="panel-body">
                                        <h3>Section D X-Ray Result</h3>
                                        <h4>X-Ray Findings</h4>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th width="40%">Description</th>
                                                    <th width="12%">&nbsp;</th>
                                                    <th width="40%">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><code>1</code></td>
                                                    <td>
                                                        <code>X-Ray Taken Date</code>
                                                        <br /><small>Fill in this box if X-Ray Examination had been performed for this foreign worker</small>
                                                    </td>
                                                    <th>&nbsp;</th>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" name="xray_taken_date" class="form-control" placeholder="Date" value="<?php echo empty($xe->exam_date) ? NULL : date("d-m-Y", strtotime($xe->exam_date)); ?>" data-required="true" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <h4>Report Findings</h4>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th width="40%">Description</th>
                                                    <th width="25%">&nbsp;</th>
                                                    <th width="10%"><span class="label label-danger">Abnormal</span></th>
                                                    <th width="10%"><span class="label label-primary">Normal</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><code>2</code></td>
                                                    <td colspan="2">
                                                        <code>Pleura / Hemidiaphragms / Costopherenic Angles</code>
                                                    </td>
                                                    <?php
                                                        if($xe->pleura){
                                                            if($xe->pleura == 'YES'){
                                                                $xray_pleura_yes = 'checked';
                                                                $xray_pleura_no = NULL;
                                                            } else if($xe->pleura == 'NO') {
                                                                $xray_pleura_yes = NULL;
                                                                $xray_pleura_no = 'checked';
                                                            }
                                                        } else {
                                                            $xray_pleura_yes = NULL;
                                                            $xray_pleura_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="xray_pleura" class="medical-radio" value="YES" <?php echo $xray_pleura_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="xray_pleura" class="medical-radio" value="NO" <?php echo $xray_pleura_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td><small>Details Of Abnormality</small></td>
                                                    <td colspan="3">
                                                        <textarea name="xray_pleura_abnormal" class="form-control" placeholder="Details"><?php echo empty($xe->pleura_reason) ? NULL : strtoupper($xe->pleura_reason); ?></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>3</code></td>
                                                    <td colspan="2">
                                                        <code>Mediastinum and Hila</code>
                                                    </td>
                                                    <?php
                                                        if($xe->mediastinum){
                                                            if($xe->mediastinum == 'YES'){
                                                                $xray_mediastinum_yes = 'checked';
                                                                $xray_mediastinum_no = NULL;
                                                            } else if($xe->mediastinum == 'NO') {
                                                                $xray_mediastinum_yes = NULL;
                                                                $xray_mediastinum_no = 'checked';
                                                            }
                                                        } else {
                                                            $xray_mediastinum_yes = NULL;
                                                            $xray_mediastinum_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="xray_mediastinum" class="medical-radio" value="YES" <?php echo $xray_mediastinum_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="xray_mediastinum" class="medical-radio" value="NO" <?php echo $xray_mediastinum_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td><small>Details Of Abnormality</small></td>
                                                    <td colspan="3">
                                                        <textarea name="xray_mediastinum_abnormal" class="form-control" placeholder="Details"><?php echo empty($xe->mediastinum_reason) ? NULL : strtoupper($xe->mediastinum_reason); ?></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>4</code></td>
                                                    <td colspan="2">
                                                        <code>Lung Fields</code>
                                                    </td>
                                                    <?php
                                                        if($xe->lung_fields){
                                                            if($xe->lung_fields == 'YES'){
                                                                $xray_lung_yes = 'checked';
                                                                $xray_lung_no = NULL;
                                                            } else if($xe->lung_fields == 'NO') {
                                                                $xray_lung_yes = NULL;
                                                                $xray_lung_no = 'checked';
                                                            }
                                                        } else {
                                                            $xray_lung_yes = NULL;
                                                            $xray_lung_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="xray_lung" class="medical-radio" value="YES" <?php echo $xray_lung_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="xray_lung" class="medical-radio" value="NO" <?php echo $xray_lung_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td><small>Details Of Abnormality</small></td>
                                                    <td colspan="3">
                                                        <textarea name="xray_lung_abnormal" class="form-control" placeholder="Details"><?php echo empty($xe->lung_fields_reason) ? NULL : strtoupper($xe->lung_fields_reason); ?></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>5</code></td>
                                                    <td colspan="2">
                                                        <code>Heart Shape and Size</code> <small>CTR if applicable</small>
                                                    </td>
                                                    <?php
                                                        if($xe->heart_shape){
                                                            if($xe->heart_shape == 'YES'){
                                                                $xray_heart_yes = 'checked';
                                                                $xray_heart_no = NULL;
                                                            } else if($xe->heart_shape == 'NO') {
                                                                $xray_heart_yes = NULL;
                                                                $xray_heart_no = 'checked';
                                                            }
                                                        } else {
                                                            $xray_heart_yes = NULL;
                                                            $xray_heart_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="xray_heart" class="medical-radio" value="YES" <?php echo $xray_heart_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="xray_heart" class="medical-radio" value="NO" <?php echo $xray_heart_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td><small>Details Of Abnormality</small></td>
                                                    <td colspan="3">
                                                        <textarea name="xray_heart_abnormal" class="form-control" placeholder="Details"><?php echo empty($xe->heart_shape_reason) ? NULL : strtoupper($xe->heart_shape_reason); ?></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>6</code></td>
                                                    <td colspan="2">
                                                        <code>Thoracic Cage</code>
                                                    </td>
                                                    <?php
                                                        if($xe->thoracic_cage){
                                                            if($xe->thoracic_cage == 'YES'){
                                                                $xray_thoracic_yes = 'checked';
                                                                $xray_thoracic_no = NULL;
                                                            } else if($xe->thoracic_cage == 'NO') {
                                                                $xray_thoracic_yes = NULL;
                                                                $xray_thoracic_no = 'checked';
                                                            }
                                                        } else {
                                                            $xray_thoracic_yes = NULL;
                                                            $xray_thoracic_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="xray_thoracic" class="medical-radio" value="YES" <?php echo $xray_thoracic_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="xray_thoracic" class="medical-radio" value="NO" <?php echo $xray_thoracic_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td><small>Details Of Abnormality</small></td>
                                                    <td colspan="3">
                                                        <textarea name="xray_thoracic_abnormal" class="form-control" placeholder="Details"><?php echo empty($xe->thoracic_cage_reason) ? NULL : strtoupper($xe->thoracic_cage_reason); ?></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>7</code></td>
                                                    <td colspan="2">
                                                        <code>Focal Lesion</code> <small>E.g. Old/New PTB, Maglinancy</small>
                                                    </td>
                                                    <?php
                                                        if($xe->focal_lesion){
                                                            if($xe->focal_lesion == 'YES'){
                                                                $xray_focal_yes = 'checked';
                                                                $xray_focal_no = NULL;
                                                            } else if($xe->thoracic_cage == 'NO') {
                                                                $xray_focal_yes = NULL;
                                                                $xray_focal_no = 'checked';
                                                            }
                                                        } else {
                                                            $xray_focal_yes = NULL;
                                                            $xray_focal_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="xray_focal" class="medical-radio" value="YES" <?php echo $xray_focal_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="xray_focal" class="medical-radio" value="NO" <?php echo $xray_focal_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td><small>Details Of Abnormalities</small></td>
                                                    <td colspan="3">
                                                        <textarea name="xray_focal_abnormal" class="form-control" placeholder="Details"><?php echo empty($xe->focal_lesion_reason) ? NULL : strtoupper($xe->focal_lesion_reason); ?></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>8</code></td>
                                                    <td colspan="2">
                                                        <code>Any Other Abnormalities</code>
                                                    </td>
                                                    <?php
                                                        if($xe->other_abnormal){
                                                            if($xe->other_abnormal == 'YES'){
                                                                $xray_other_yes = 'checked';
                                                                $xray_other_no = NULL;
                                                            } else if($xe->other_abnormal == 'NO') {
                                                                $xray_other_yes = NULL;
                                                                $xray_other_no = 'checked';
                                                            }
                                                        } else {
                                                            $xray_other_yes = NULL;
                                                            $xray_other_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="xray_other" class="medical-radio" value="YES" <?php echo $xray_other_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="xray_other" class="medical-radio" value="NO" <?php echo $xray_other_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td><small>Details Of Abnormalities</small></td>
                                                    <td colspan="3">
                                                        <textarea name="xray_other_abnormal" class="form-control" placeholder="Details"><?php echo empty($xe->other_abnormal_reason) ? NULL : strtoupper($xe->other_abnormal_reason); ?></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>9</code></td>
                                                    <td><code>Impression</code></td>
                                                    <td colspan="3">
                                                        <textarea name="xray_impression" class="form-control" placeholder="Impression"><?php echo empty($xe->impression) ? NULL : strtoupper($xe->impression); ?></textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <h4>3 - X-Ray Report</h4>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th width="44%">Description</th>
                                                    <th width="51%">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><code>3.0</code></td>
                                                    <td><code>Date Of X-Ray Report</code></td>
                                                    <td>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="xray_report_date" class="form-control" placeholder="Date" value="<?php echo empty($xe->report_date) ? NULL : date("d-m-Y", strtotime($xe->report_date)); ?>" data-required="true" />
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <div class="checkbox checkbox-success">
                                                            <input name="sd_read" type="checkbox" class="review-xray-select" value="YES" <?php echo empty($xe->read) ? NULL : 'checked'; ?>>
                                                            <label class="text-danger">Yes, I have reviewed x-ray result for this foreign worker.</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="message-xray"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="message-labxray"></div>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <span class="pull-right m-r-md">
                                <a id="update-labxray" class="btn btn-w-m btn-primary">Save</a>
                            </span>
                        </div>
                    </div>
                </form>
            <?php //} ?>    
            </div>
        </div>
    </div>
    
    <!-- CERTIFICATION -->
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title" style="background-color: #1791d9; color: white;">
                    <h5>Certification</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link link-certify">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
            <?php //if($dc){ ?>    
                <form id="form-update-certify">
                    <div class="ibox-content ibox-content-certify">
                        <div class="message-certify"></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="hidden" name="transaction_id" value="<?php echo $transaction->id; ?>" />
                                <input type="hidden" name="type_id" class="type-id" value="<?php echo $_GET['type']; ?>" />
                                <!-- PART 4 | Certification By Doctor | Diseases/Condition -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="pull-right">
                                            <span class="label label-success">Diseases/Condition</span>
                                        </div>
                                        <span class="label label-success">Part 4</span> Certification By Doctor
                                    </div>
                                    <div class="panel-body">
                                        <h3>Diseases/Condition</h3>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th width="50%">Description</th>
                                                    <th width="15%">&nbsp;</th>
                                                    <th width="10%"><span class="label label-danger">Yes</span></th>
                                                    <th width="10%"><span class="label label-primary">No</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><code>1</code></td>
                                                    <td><code>Psychiatric Illness</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($dc->psychiatric){
                                                            if($dc->psychiatric == 'YES'){
                                                                $p4_psychiatric_yes = 'checked';
                                                                $p4_psychiatric_no = NULL;
                                                            } else if($dc->psychiatric == 'NO') {
                                                                $p4_psychiatric_yes = NULL;
                                                                $p4_psychiatric_no = 'checked';
                                                            }
                                                        } else {
                                                            $p4_psychiatric_yes = NULL;
                                                            $p4_psychiatric_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_psychiatric" class="medical-radio" value="YES" <?php echo $p4_psychiatric_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_psychiatric" class="medical-radio" value="NO" <?php echo $p4_psychiatric_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>2</code></td>
                                                    <td><code>Epilepsy</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($dc->epilepsy){
                                                            if($dc->epilepsy == 'YES'){
                                                                $p4_epilepsy_yes = 'checked';
                                                                $p4_epilepsy_no = NULL;
                                                            } else if($dc->epilepsy == 'NO') {
                                                                $p4_epilepsy_yes = NULL;
                                                                $p4_epilepsy_no = 'checked';
                                                            }
                                                        } else {
                                                            $p4_epilepsy_yes = NULL;
                                                            $p4_epilepsy_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_epilepsy" class="medical-radio" value="YES" <?php echo $p4_epilepsy_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_epilepsy" class="medical-radio" value="NO" <?php echo $p4_epilepsy_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>3</code></td>
                                                    <td><code>Cancer</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($dc->cancer){
                                                            if($dc->cancer == 'YES'){
                                                                $p4_cancer_yes = 'checked';
                                                                $p4_cancer_no = NULL;
                                                            } else if($dc->cancer == 'NO') {
                                                                $p4_cancer_yes = NULL;
                                                                $p4_cancer_no = 'checked';
                                                            }
                                                        } else {
                                                            $p4_cancer_yes = NULL;
                                                            $p4_cancer_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_cancer" class="medical-radio" value="YES" <?php echo $p4_cancer_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_cancer" class="medical-radio" value="NO" <?php echo $p4_cancer_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>4</code></td>
                                                    <td><code>Hepatitis</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($dc->hepatitis){
                                                            if($dc->hepatitis == 'YES'){
                                                                $p4_hepatitis_yes = 'checked';
                                                                $p4_hepatitis_no = NULL;
                                                            } else if($dc->hepatitis == 'NO') {
                                                                $p4_hepatitis_yes = NULL;
                                                                $p4_hepatitis_no = 'checked';
                                                            }
                                                        } else {
                                                            $p4_hepatitis_yes = NULL;
                                                            $p4_hepatitis_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_hepatitis" class="medical-radio" value="YES" <?php echo $p4_hepatitis_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_hepatitis" class="medical-radio" value="NO" <?php echo $p4_hepatitis_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>5</code></td>
                                                    <td><code>Sexually Transmitted Diseases</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($dc->std){
                                                            if($dc->std == 'YES'){
                                                                $p4_std_yes = 'checked';
                                                                $p4_std_no = NULL;
                                                            } else if($dc->std == 'NO') {
                                                                $p4_std_yes = NULL;
                                                                $p4_std_no = 'checked';
                                                            }
                                                        } else {
                                                            $p4_std_yes = NULL;
                                                            $p4_std_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_std" class="medical-radio" value="YES" <?php echo $p4_std_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_std" class="medical-radio" value="NO" <?php echo $p4_std_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>6</code></td>
                                                    <td><code>Leprosy</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($dc->leprosy){
                                                            if($dc->leprosy == 'YES'){
                                                                $p4_leprosy_yes = 'checked';
                                                                $p4_leprosy_no = NULL;
                                                            } else if($dc->leprosy == 'NO') {
                                                                $p4_leprosy_yes = NULL;
                                                                $p4_leprosy_no = 'checked';
                                                            }
                                                        } else {
                                                            $p4_leprosy_yes = NULL;
                                                            $p4_leprosy_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_leprosy" class="medical-radio" value="YES" <?php echo $p4_leprosy_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_leprosy" class="medical-radio" value="NO" <?php echo $p4_leprosy_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>7</code></td>
                                                    <td><code>Malaria</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($dc->malaria){
                                                            if($dc->malaria == 'YES'){
                                                                $p4_malaria_yes = 'checked';
                                                                $p4_malaria_no = NULL;
                                                            } else if($dc->malaria == 'NO') {
                                                                $p4_malaria_yes = NULL;
                                                                $p4_malaria_no = 'checked';
                                                            }
                                                        } else {
                                                            $p4_malaria_yes = NULL;
                                                            $p4_malaria_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_malaria" class="medical-radio" value="YES" <?php echo $p4_malaria_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_malaria" class="medical-radio" value="NO" <?php echo $p4_malaria_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>8</code></td>
                                                    <td><code>Tuberculosis</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($dc->tuberculosis){
                                                            if($dc->tuberculosis == 'YES'){
                                                                $p4_tuberculosis_yes = 'checked';
                                                                $p4_tuberculosis_no = NULL;
                                                            } else if($dc->tuberculosis == 'NO') {
                                                                $p4_tuberculosis_yes = NULL;
                                                                $p4_tuberculosis_no = 'checked';
                                                            }
                                                        } else {
                                                            $p4_tuberculosis_yes = NULL;
                                                            $p4_tuberculosis_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_tuberculosis" class="medical-radio" value="YES" <?php echo $p4_tuberculosis_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_tuberculosis" class="medical-radio" value="NO" <?php echo $p4_tuberculosis_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>9</code></td>
                                                    <td><code>HIV/Aids</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($dc->hiv){
                                                            if($dc->hiv == 'YES'){
                                                                $p4_hiv_yes = 'checked';
                                                                $p4_hiv_no = NULL;
                                                            } else if($dc->hiv == 'NO') {
                                                                $p4_hiv_yes = NULL;
                                                                $p4_hiv_no = 'checked';
                                                            }
                                                        } else {
                                                            $p4_hiv_yes = NULL;
                                                            $p4_hiv_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_hiv" class="medical-radio" value="YES" <?php echo $p4_hiv_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_hiv" class="medical-radio" value="NO" <?php echo $p4_hiv_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>10</code></td>
                                                    <td><code>Others</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($dc->others){
                                                            if($dc->others == 'YES'){
                                                                $p4_other_yes = 'checked';
                                                                $p4_other_no = NULL;
                                                            } else if($dc->others == 'NO') {
                                                                $p4_other_yes = NULL;
                                                                $p4_other_no = 'checked';
                                                            }
                                                        } else {
                                                            $p4_other_yes = NULL;
                                                            $p4_other_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_other" class="medical-radio" value="YES" <?php echo $p4_other_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_other" class="medical-radio" value="NO" <?php echo $p4_other_no; ?>>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <h3>I Also Found That</h3>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th width="50%">Description</th>
                                                    <th width="15%">&nbsp;</th>
                                                    <th width="10%"><span class="label label-danger">Abnormal</span></th>
                                                    <th width="10%"><span class="label label-primary">Normal</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><code>11</code></td>
                                                    <td><code>His/Her urine contains cannabis</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($dc->cannabis){
                                                            if($dc->cannabis == 'YES'){
                                                                $p4_cannabis_yes = 'checked';
                                                                $p4_cannabis_no = NULL;
                                                            } else if($dc->cannabis == 'NO') {
                                                                $p4_cannabis_yes = NULL;
                                                                $p4_cannabis_no = 'checked';
                                                            }
                                                        } else {
                                                            $p4_cannabis_yes = NULL;
                                                            $p4_cannabis_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_cannabis" class="medical-radio" value="YES" <?php echo $p4_cannabis_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_cannabis" class="medical-radio" value="NO" <?php echo $p4_cannabis_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>12</code></td>
                                                    <td><code>His/Her urine contains opiates</code></td>
                                                    <td>&nbsp;</td>
                                                    <?php
                                                        if($dc->opiates){
                                                            if($dc->opiates == 'YES'){
                                                                $p4_opiates_yes = 'checked';
                                                                $p4_opiates_no = NULL;
                                                            } else if($dc->opiates == 'NO') {
                                                                $p4_opiates_yes = NULL;
                                                                $p4_opiates_no = 'checked';
                                                            }
                                                        } else {
                                                            $p4_opiates_yes = NULL;
                                                            $p4_opiates_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_opiates" class="medical-radio" value="YES" <?php echo $p4_opiates_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_opiates" class="medical-radio" value="NO" <?php echo $p4_opiates_no; ?>>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!-- PART 4 | Certification By Doctor | Certification -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="pull-right">
                                            <span class="label label-success">Certification</span>
                                        </div>
                                        <span class="label label-success">Part 4</span> Certification By Doctor
                                    </div>
                                    <div class="panel-body">
                                        <h3>Certification</h3>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th width="50%">Description</th>
                                                    <th width="15%">&nbsp;</th>
                                                    <th width="10%"><span class="label label-primary">Suitable</span></th>
                                                    <th width="10%"><span class="label label-danger">Not Suitable</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><code>14</code></td>
                                                    <td colspan="2">I therefore certify that this foreign worker is found to be medically for employment in Malaysia</td>
                                                    <?php
                                                        if($dc->result){
                                                            if($dc->result == 'YES'){
                                                                $p4_suitable_yes = 'checked';
                                                                $p4_suitable_no = NULL;
                                                            } else if($dc->result == 'NO') {
                                                                $p4_suitable_yes = NULL;
                                                                $p4_suitable_no = 'checked';
                                                            }
                                                        } else {
                                                            $p4_suitable_yes = 'checked';
                                                            $p4_suitable_no = NULL;
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_suitable" class="medical-radio" value="YES" <?php echo $p4_suitable_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_suitable" class="medical-radio" value="NO" <?php echo $p4_suitable_no; ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>15</code></td>
                                                    <td>
                                                        <code>Others Comment</code>
                                                        <br /><small>For any abnormalities detected in Part 4</small>
                                                    </td>
                                                    <td colspan="3">
                                                        <textarea name="p4_comment" class="form-control" placeholder="Comments"><?php echo empty($dc->others_comment) ? NULL : strtoupper($dc->others_comment); ?></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>16</code></td>
                                                    <td>If considered <span class="text-danger">Not Suitable</span> for employment, please state the reason</td>
                                                    <td colspan="3">
                                                        <textarea name="p4_reason" class="form-control" placeholder="Reason"><?php echo empty($dc->reason_comment) ? NULL : strtoupper($dc->reason_comment); ?></textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- PART 4 | Certification By Doctor | Follow-Up -->
                                <!--
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="pull-right">
                                            <span class="label label-success">Follow-Up</span>
                                        </div>
                                        <span class="label label-success">Part 4</span> Certification By Doctor
                                    </div>
                                    <div class="panel-body">
                                        <h3>Follow-Up</h3>
                                        -->
                                        <!--
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th>Disease</th>
                                                    <th width="10%"><span class="label label-danger">Yes</span></th>
                                                    <th width="10%"><span class="label label-primary">No</span></th>
                                                    <th width="40%">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><code>1</code></td>
                                                    <td>Health Office has been notified.</td>
                                                    <?php
                                                        if($dc->office){
                                                            if($dc->office == 'YES'){
                                                                $p4_office_yes = 'checked';
                                                                $p4_office_no = NULL;
                                                            } else if($dc->office == 'NO') {
                                                                $p4_office_yes = NULL;
                                                                $p4_office_no = 'checked';
                                                            }
                                                        } else {
                                                            $p4_office_yes = NULL;
                                                            $p4_office_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_office" class="medical-radio" value="YES" <?php echo $p4_office_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_office" class="medical-radio" value="NO" <?php echo $p4_office_no; ?>>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" name="p4_office_date" class="form-control" placeholder="Date" value="<?php echo empty($dc->office_date) ? NULL : date("d-m-Y", strtotime($dc->office_date)); ?>" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>2</code></td>
                                                    <td>Case referred to Government Hospital.</td>
                                                    <?php
                                                        if($dc->government){
                                                            if($dc->government == 'YES'){
                                                                $p4_government_yes = 'checked';
                                                                $p4_government_no = NULL;
                                                            } else if($dc->government == 'NO') {
                                                                $p4_government_yes = NULL;
                                                                $p4_government_no = 'checked';
                                                            }
                                                        } else {
                                                            $p4_government_yes = NULL;
                                                            $p4_government_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_government" class="medical-radio" value="YES" <?php echo $p4_government_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_government" class="medical-radio" value="NO" <?php echo $p4_government_no; ?>>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" name="p4_government_date" class="form-control" placeholder="Date" value="<?php echo empty($dc->government_date) ? NULL : date("d-m-Y", strtotime($dc->government_date)); ?>" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>3</code></td>
                                                    <td>Case referred to Private Hospital.</td>
                                                    <?php
                                                        if($dc->private){
                                                            if($dc->private == 'YES'){
                                                                $p4_private_yes = 'checked';
                                                                $p4_private_no = NULL;
                                                            } else if($dc->private == 'NO') {
                                                                $p4_private_yes = NULL;
                                                                $p4_private_no = 'checked';
                                                            }
                                                        } else {
                                                            $p4_private_yes = NULL;
                                                            $p4_private_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_private" class="medical-radio" value="YES" <?php echo $p4_private_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_private" class="medical-radio" value="NO" <?php echo $p4_private_no; ?>>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" name="p4_private_date" class="form-control" placeholder="Date" value="<?php echo empty($dc->private_date) ? NULL : date("d-m-Y", strtotime($dc->private_date)); ?>" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>4</code></td>
                                                    <td>I am treating the patient.</td>
                                                    <?php
                                                        if($dc->treating){
                                                            if($dc->treating == 'YES'){
                                                                $p4_treating_yes = 'checked';
                                                                $p4_treating_no = NULL;
                                                            } else if($dc->treating == 'NO') {
                                                                $p4_treating_yes = NULL;
                                                                $p4_treating_no = 'checked';
                                                            }
                                                        } else {
                                                            $p4_treating_yes = NULL;
                                                            $p4_treating_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_treating" class="medical-radio" value="YES" <?php echo $p4_treating_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_treating" class="medical-radio" value="NO" <?php echo $p4_treating_no; ?>>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" name="p4_treating_date" class="form-control" placeholder="Date" value="<?php echo empty($dc->treating_date) ? NULL : date("d-m-Y", strtotime($dc->treating_date)); ?>" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><code>5</code></td>
                                                    <td>The patient is still undergoing treatment in another clinic/hospital.</td>
                                                    <?php
                                                        if($dc->another){
                                                            if($dc->another == 'YES'){
                                                                $p4_another_yes = 'checked';
                                                                $p4_another_no = NULL;
                                                            } else if($dc->another == 'NO') {
                                                                $p4_another_yes = NULL;
                                                                $p4_another_no = 'checked';
                                                            }
                                                        } else {
                                                            $p4_another_yes = NULL;
                                                            $p4_another_no = 'checked';
                                                        }
                                                    ?>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_another" class="medical-radio" value="YES" <?php echo $p4_another_yes; ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="radio" name="p4_another" class="medical-radio" value="NO" <?php echo $p4_another_no; ?>>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" name="p4_another_date" class="form-control" placeholder="Date" value="<?php echo empty($dc->another_date) ? NULL : date("d-m-Y", strtotime($dc->another_date)); ?>" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        -->
                                        <!--
                                        <h3>Under the prevention and control of Infectious Diseases Act 1988. 
                                            It is mandatory to notify the occurance of infectious diseases 
                                            to the nearest Medical Officer of Health.</h3>
                                        -->
                                    <!--    
                                    </div>
                                </div>
                                -->
                            </div>
                        </div>
                    <?php //if($le->read == 'YES' && $le->certify == 'YES' && $xe->read == 'YES' && $xe->certify == 'YES'){ ?>    
                        <div class="message-certify"></div>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <span class="pull-right m-r-md">
                                <a id="save-certify" class="btn btn-w-m btn-primary">Save</a>
								<a href="uploads/reports/MedicalReport.pdf" target="_blank" class="btn btn-w-m btn-primary">Report</a>
                                <a id="submit-certify" class="btn btn-w-m btn-primary">Certify and Upload</a>
                            </span>
                        </div>
                    <?php //} ?>    
                    </div>
                </form>
            <?php //} ?>    
            </div>
        </div>
    </div>
</div>

<?php
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.extend.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/chosen/chosen.jquery.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/datapicker/bootstrap-datepicker.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/sebumi/js/doctor/list/list_medical.js", CClientScript::POS_END);    