<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Foreign Worker Management</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item active">Foreign Worker Management</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="pull-right">
                <a href="<?php echo $link; ?>" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                    <i class="fa fa-arrow-circle-o-left"></i> Back To Agent
                </a>
            </div>
            
            <h4 class="card-title"><span class="label label-primary">Application for Foreign Worker</span></h4>
            <h3 class="card-title"><?php echo $agent->profile->company->name; ?></h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs customtab2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#total" role="tab">
                        <span class="badge badge-info"><?php echo count($total); ?></span><br />
                        <span class="hidden-xs-down">Total</span>
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo Helpers::percentvalue($percenter['total']); ?>;height:15px;" role="progressbar">
                                <?php echo Helpers::percentvalue($percenter['total']); ?>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" data-toggle="tab" href="#medical" role="tab">
                        <span class="badge badge-info"><?php echo count($medical); ?></span><br />
                        <span class="hidden-xs-down">Medical</span>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo Helpers::percentvalue($percenter['medical']); ?>;height:15px;" role="progressbar">
                                <?php echo Helpers::percentvalue($percenter['medical']); ?>
                            </div>
                        </div>
                    </a> 
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" data-toggle="tab" href="#training" role="tab">
                        <span class="badge badge-info"><?php echo count($training); ?></span><br />
                        <span class="hidden-xs-down">Training</span>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo Helpers::percentvalue($percenter['training']); ?>;height:15px;" role="progressbar">
                                <?php echo Helpers::percentvalue($percenter['training']); ?>
                            </div>
                        </div>
                    </a> 
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" data-toggle="tab" href="#pendingvdr" role="tab">
                        <span class="badge badge-info"><?php echo count($pendingvdr); ?></span><br />
                        <span class="hidden-xs-down">Pending VDR</span>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo Helpers::percentvalue($percenter['pendingvdr']); ?>;height:15px;" role="progressbar">
                                <?php echo Helpers::percentvalue($percenter['pendingvdr']); ?>
                            </div>
                        </div>
                    </a> 
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" data-toggle="tab" href="#vdrapproved" role="tab">
                        <span class="badge badge-info"><?php echo count($vdrapproved); ?></span><br />
                        <span class="hidden-xs-down">VDR Approved</span>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo Helpers::percentvalue($percenter['vdrapproved']); ?>;height:15px;" role="progressbar">
                                <?php echo Helpers::percentvalue($percenter['vdrapproved']); ?>
                            </div>
                        </div>
                    </a> 
                </li>
		<li class="nav-item"> 
                    <a class="nav-link" data-toggle="tab" href="#approval" role="tab">
                        <span class="badge badge-info"><?php echo count($approval); ?></span><br />
                        <span class="hidden-xs-down">Approved For Departure</span>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo Helpers::percentvalue($percenter['approval']); ?>;height:15px;" role="progressbar">
                                <?php echo Helpers::percentvalue($percenter['approval']); ?>
                            </div>
                        </div>
                    </a> 
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" data-toggle="tab" href="#ready" role="tab">
                        <span class="badge badge-info"><?php echo count($departure); ?></span><br />
                        <span class="hidden-xs-down">Ready For Departure</span>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo Helpers::percentvalue($percenter['departure']); ?>;height:15px;" role="progressbar">
                                <?php echo Helpers::percentvalue($percenter['departure']); ?>
                            </div>
                        </div>
                    </a> 
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" data-toggle="tab" href="#arrival" role="tab">
                        <span class="badge badge-info"><?php echo count($arrival); ?></span><br />
                        <span class="hidden-xs-down">Arrival & Completed</span>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo Helpers::percentvalue($percenter['arrival']); ?>;height:15px;" role="progressbar">
                                <?php echo Helpers::percentvalue($percenter['arrival']); ?>
                            </div>
                        </div>
                    </a> 
                </li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content">
                
                <!-- Total Registered -->
                <div class="tab-pane active" id="total" role="tabpanel">
                    <form id="form-total-worker">
                        <div class="card">
                            <div class="card-body">
                                <div class="ribbon ribbon-danger ribbon-right">Total</div>
                                
                                <div class="table-responsive">
                                    <table id="table-application-total" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Foreign<br />Worker</th>
                                                <th class="text-center">Passport<br />Sector</th>
                                                <th class="text-center"><i class="fa fa-print"></i></th>
                                                <th class="text-center">Employer</th>
                                                <th class="text-center">Medical</th>
                                                <th class="text-center">Training</th>
                                                <th class="text-center">VDR<br />Approved</th>
                                                <th class="text-center">Approved<br />For<br />Departure</th>
                                                <th class="text-center">Departure<br />Confirmed</th>
                                                <th class="text-center">Arrival<br />Confirmed</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $m = 0;
                                            foreach($total as $t){
                                                $m++;
                                        ?>
                                            <tr>
                                                <td class="text-center vert-middle"><?php echo $m; ?></td>
                                                <td class="vert-middle">
                                                    <span class="badge badge-info"><?php echo $t->worker->code; ?></span>
                                                    <br /><?php echo strtoupper($t->worker->full_name); ?>
                                                </td>
                                                <td class="vert-middle">
                                                    <?php echo strtoupper($t->passport->number); ?>
                                                    <br /><small><?php echo strtoupper($t->worker->jobsector->name); ?></small>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <input type="checkbox" name="print[]" class="checkbox-form checkbox-print" value="<?php echo $t->id; ?>" />
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php
                                                        if(empty($t->employer_id)){
                                                            echo '<input type="checkbox" name="worker[]" class="checkbox-form checkbox-worker" value="'.$t->id.'" />';
                                                        } else {
                                                            echo '<span class="badge badge-info">'.$t->quota->code.'</span><br />';
                                                            echo '<small>'.strtoupper($t->employer->profile->company->name).'</small>';
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->medical == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->training == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->visa == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->approval == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->departure == 'YES' ? '<span class="font-bold">'.$t->flight_number.'</span><br /><small>'.date('d M Y', strtotime($t->flight_date)).'</small><br /><small>ETA : '.$t->eta_malaysia.'</small><br /><small>'.Helpers::checkCovid19Document($t->guid).'</small>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->arrival == 'YES' ? date('d M Y', strtotime($t->arrival_date)) : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <a href="index.php?r=Admin/View&id=<?php echo $t->id; ?>" class="btn btn-sm waves-effect waves-light btn-info text-white" data-toggle="tooltip" data-placement="top" title="View" data-original-title="View"><i class="fa fa-search"></i></a>
                                                    <a href="index.php?r=Admin/Photo&id=<?php echo $t->id; ?>" class="btn btn-sm waves-effect waves-light btn-warning text-dark" data-toggle="tooltip" data-placement="top" title="Photo" data-original-title="Photo"><i class="fa fa-image"></i></a>
                                                    <a href="index.php?r=Admin/Passport&id=<?php echo $t->id; ?>" class="btn btn-sm waves-effect waves-light btn-success text-white" data-toggle="tooltip" data-placement="top" title="Passport" data-original-title="Passport"><i class="fa fa-book"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                            }    
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <div class="pull-right">
                                            <input type="hidden" name="agent_id" value="<?php echo $_GET['id']; ?>" />
                                            <a class="btn btn-warning" id="submit-total-print">
                                                <i class="fa fa-print"></i> Print
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="table-responsive">
                                            <table id="table-employer-quota" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center number" rowspan="2">#</th>
                                                        <th class="text-center" colspan="2">Demand Letter</th>
                                                        <th class="text-center" colspan="5">Foreign Worker</th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center">Employer</th>
                                                        <th class="text-center">Code</th>
                                                        <th class="text-center font-small">
                                                            <span class="badge badge-info">A</span><br />Required
                                                        </th>
                                                        <th class="text-center font-small">
                                                            <span class="badge badge-info">B</span><br />Allocated
                                                        </th>
                                                        <th class="text-center font-small">
                                                            <span class="badge badge-danger">C = A - B</span><br />Balance
                                                        </th>
                                                        <th class="text-center font-small">
                                                            <span class="badge badge-info">D</span><br />Arrived
                                                        </th>
                                                        <th class="text-center font-small">
                                                            <span class="badge badge-danger">E = C - D</span><br />Balance
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                    $i = 0;
                                                    foreach($quotafw as $q){
                                                        $i++;
                                                        
                                                        if(!empty($q['remark'])){
                                                            $remark = '<br /><span class="badge badge-info">'.strtoupper($q['remark']).'</span>';
                                                        } else {
                                                            $remark = NULL;
                                                        }
                                                ?>
                                                    <tr>
                                                        <td class="text-center vert-middle"><?php echo $i; ?></td>
                                                        <td class="vert-middle">
                                                            <span class="badge badge-info"><?php echo $q['employercode']; ?></span>
                                                            <br />
                                                            <?php echo strtoupper($q['employer']); ?>
                                                        </td>
                                                        <td class="text-center vert-middle">
                                                            <?php echo $q['code']; ?>
                                                            <br />
                                                            <small><?php echo $q['createddate']; ?></small>
                                                            <?php echo $remark; ?>
                                                        </td>
                                                        <td class="text-center vert-middle font-large required"><?php echo $q['required']; ?></td>
                                                        <td class="text-center vert-middle font-large allocated"><?php echo $q['allocated']; ?></td>
                                                        <td class="text-center vert-middle font-large balance1 text-danger"><?php echo $q['balance1']; ?></td>
                                                        <td class="text-center vert-middle font-large arrived"><?php echo $q['arrived']; ?></td>
                                                        <td class="text-center vert-middle font-large balance2 text-danger"><?php echo $q['balance2']; ?></td>
                                                    </tr>
                                                <?php
                                                    }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row m-t-10">&nbsp;</div>
                                        <div class="row m-t-40">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"><strong>Filter Job Sector</strong></label>
                                                    <?php
                                                        $jobsector_list = CHtml::listData($jobsector, 'id', 'name');
                                                        echo CHtml::dropDownList('jobsector', null, $jobsector_list, 
                                                        array(
                                                            'empty' => 'Select All Job Sector',
                                                            'class' => 'form-control select2-jobsector select-jobsector custom-select vft-element'
                                                        ));
                                                    ?>
                                                </div>
                                            </div>
                                        </div>    
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"><strong>Demand Letter</strong> <span class="text-danger">*</span></label>
                                                    <select name="demandletter" class="form-control select2-demandletter custom-select vft-element" data-required="true">
                                                        <option value="">Select Demand Letter</option>
                                                        <?php 
                                                            foreach($quotafw as $dl){ 
                                                                if(!empty($dl['remark'])){
                                                                    $remark = ' - '.strtoupper($dl['remark']);
                                                                } else {
                                                                    $remark = NULL;
                                                                }
                                                        ?>
                                                            <option value="<?php echo $dl['id']; ?>">
                                                                <?php echo $dl['code']; ?> - <?php echo $dl['employer'].$remark; ?>
                                                            </option>
                                                        <?php 
                                                            } 
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-30">
                                            <div class="col-md-12">
                                                <div class="pull-right">
                                                    <input type="hidden" name="agent_id" value="<?php echo $_GET['id']; ?>" />
                                                    <a class="btn btn-success" id="submit-employer">
                                                        <i class="fa fa-check"></i> Save
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </form>    
                </div>
                
                <!-- Medical Completed -->
                <div class="tab-pane" id="medical" role="tabpanel">
                    <form id="form-medical-worker">
                        <div class="card">
                            <div class="card-body">
                                <div class="ribbon ribbon-danger ribbon-right">Medical</div>
                                
                                <div class="table-responsive">
                                    <table id="table-application-medical" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Foreign<br />Worker</th>
                                                <th class="text-center">Passport<br />Sector</th>
                                                <th class="text-center">Employer</th>
                                                <th class="text-center">Medical</th>
                                                <th class="text-center">Training</th>
                                                <th class="text-center">VDR<br />Approved</th>
						<th class="text-center">Approved<br />For<br />Departure</th>
                                                <th class="text-center">Departure<br />Confirmed</th>
                                                <th class="text-center">Arrival<br />Confirmed</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $m = 0;
                                            foreach($medical as $t){
                                                $m++;
                                        ?>
                                            <tr>
                                                <td class="text-center vert-middle"><?php echo $m; ?></td>
                                                <td class="vert-middle">
                                                    <span class="badge badge-info"><?php echo $t->worker->code; ?></span>
                                                    <br /><?php echo strtoupper($t->worker->full_name); ?>
                                                </td>
                                                <td class="vert-middle">
                                                    <?php echo strtoupper($t->passport->number); ?>
                                                    <br /><small><?php echo strtoupper($t->worker->jobsector->name); ?></small>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php
                                                        if(empty($t->employer_id)){
                                                            echo '<small>NO EMPLOYER</small>';
                                                        } else {
                                                            echo '<span class="badge badge-info">'.$t->quota->code.'</span><br />';
                                                            echo '<small>'.strtoupper($t->employer->profile->company->name).'</small>';
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->medical == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->training == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->visa == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->approval == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->departure == 'YES' ? '<span class="font-bold">'.$t->flight_number.'</span><br /><small>'.date('d M Y', strtotime($t->flight_date)).'</small><br /><small>ETA : '.$t->eta_malaysia.'</small><br /><small>'.Helpers::checkCovid19Document($t->guid).'</small>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->arrival == 'YES' ? date('d M Y', strtotime($t->arrival_date)) : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <a href="index.php?r=Admin/View&id=<?php echo $t->id; ?>" class="btn btn-sm waves-effect waves-light btn-success text-white" data-toggle="tooltip" data-placement="top" title="View" data-original-title="View"><i class="fa fa-search"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                            }    
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
                <!-- Training -->
                <div class="tab-pane" id="training" role="tabpanel">
                    <form id="form-training-worker">
                        <div class="card">
                            <div class="card-body">
                                <div class="ribbon ribbon-danger ribbon-right">Training</div>
                                
                                <div class="table-responsive">
                                    <table id="table-application-training" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Foreign<br />Worker</th>
                                                <th class="text-center">Passport<br />Sector</th>
                                                <th class="text-center">Employer</th>
                                                <th class="text-center">Medical</th>
                                                <th class="text-center">Training</th>
                                                <th class="text-center">VDR<br />Approved</th>
                                                <th class="text-center">Approved<br />For<br />Departure</th>
                                                <th class="text-center">Departure<br />Confirmed</th>
                                                <th class="text-center">Arrival<br />Confirmed</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $m = 0;
                                            foreach(training as $t){
                                                $m++;
                                        ?>
                                            <tr>
                                                <td class="text-center vert-middle">100<?php echo $m; ?></td>
                                                <td class="vert-middle">
                                                    <span class="badge badge-info"><?php echo $t->worker->code; ?></span>
                                                    <br /><?php echo strtoupper($t->worker->full_name); ?>
                                                </td>
                                                <td class="vert-middle">
                                                    <?php echo strtoupper($t->passport->number); ?>
                                                    <br /><small><?php echo strtoupper($t->worker->jobsector->name); ?></small>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php
                                                        if(empty($t->employer_id)){
                                                            echo '<small>NO EMPLOYER</small>';
                                                        } else {
                                                            echo '<span class="badge badge-info">'.$t->quota->code.'</span><br />';
                                                            echo '<small>'.strtoupper($t->employer->profile->company->name).'</small>';
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->medical == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->training == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i><br /><input type="checkbox" name="training[]" class="checkbox-form" value="'.$t->id.'" />'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->visa == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i><br /><input type="checkbox" name="visa[]" class="checkbox-form" value="'.$t->id.'" />'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->approval == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->departure == 'YES' ? '<span class="font-bold">'.$t->flight_number.'</span><br /><small>'.date('d M Y', strtotime($t->flight_date)).'</small><br /><small>ETA : '.$t->eta_malaysia.'</small><br /><small>'.Helpers::checkCovid19Document($t->guid).'</small>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->arrival == 'YES' ? date('d M Y', strtotime($t->arrival_date)) : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <a href="index.php?r=Admin/View&id=<?php echo $t->id; ?>" class="btn btn-sm waves-effect waves-light btn-success text-white" data-toggle="tooltip" data-placement="top" title="View" data-original-title="View"><i class="fa fa-search"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                            }    
                                        ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <div class="pull-right">
                                            <input type="hidden" name="agent_id" value="<?php echo $_GET['id']; ?>" />
                                            <a class="btn btn-success" id="submit-training">
                                                <i class="fa fa-check"></i> Save
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
                <!-- Pending VDR -->
                <div class="tab-pane" id="pendingvdr" role="tabpanel">
                    <form id="form-pending-worker">
                        <div class="card">
                            <div class="card-body">
                                <div class="ribbon ribbon-danger ribbon-right">Pending VDR</div>
                                
                                <div class="table-responsive">
                                    <table id="table-application-pendingvdr" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Foreign<br />Worker</th>
                                                <th class="text-center">Passport<br />Sector</th>
                                                <th class="text-center">Employer</th>
                                                <th class="text-center"><i class="fa fa-print"></i></th>
                                                <th class="text-center">Medical</th>
                                                <th class="text-center">Training</th>
                                                <th class="text-center">VDR<br />Approved</th>
                                                <th class="text-center">Approved<br />For<br />Departure</th>
                                                <th class="text-center">Departure<br />Confirmed</th>
                                                <th class="text-center">Arrival<br />Confirmed</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $m = 0;
                                            foreach($pendingvdr as $t){
                                                $m++;
                                        ?>
                                            <tr>
                                                <td class="text-center vert-middle"><?php echo $m; ?></td>
                                                <td class="vert-middle">
                                                    <span class="badge badge-info"><?php echo $t->worker->code; ?></span>
                                                    <br /><?php echo strtoupper($t->worker->full_name); ?>
                                                </td>
                                                <td class="vert-middle">
                                                    <?php echo strtoupper($t->passport->number); ?>
                                                    <br /><small><?php echo strtoupper($t->worker->jobsector->name); ?></small>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php
                                                        if(empty($t->employer_id)){
                                                            echo '<small>NO EMPLOYER</small>';
                                                        } else {
                                                            echo '<span class="badge badge-info">'.$t->quota->code.'</span><br />';
                                                            echo '<small>'.strtoupper($t->employer->profile->company->name).'</small>';
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <input type="checkbox" name="print[]" class="checkbox-form checkbox-print" value="<?php echo $t->id; ?>" />
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->medical == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->medical == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i><br /><input type="checkbox" name="training[]" class="checkbox-form checkbox-visa" value="'.$t->id.'" />'; ?>
                                                </td>
												<td class="text-center vert-middle">
                                                    <?php echo $t->visa == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i><br /><input type="checkbox" name="visa[]" class="checkbox-form checkbox-visa" value="'.$t->id.'" />'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->approval == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->departure == 'YES' ? '<span class="font-bold">'.$t->flight_number.'</span><br /><small>'.date('d M Y', strtotime($t->flight_date)).'</small><br /><small>ETA : '.$t->eta_malaysia.'</small><br /><small>'.Helpers::checkCovid19Document($t->guid).'</small>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->arrival == 'YES' ? date('d M Y', strtotime($t->arrival_date)) : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <a href="index.php?r=Admin/View&id=<?php echo $t->id; ?>" class="btn btn-sm waves-effect waves-light btn-success text-white" data-toggle="tooltip" data-placement="top" title="View" data-original-title="View"><i class="fa fa-search"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                            }    
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <div class="pull-right">
                                            <input type="hidden" name="agent_id" value="<?php echo $_GET['id']; ?>" />
                                            <a class="btn btn-warning" id="submit-pending-print">
                                                <i class="fa fa-print"></i> Print
                                            </a>
                                            <a class="btn btn-success" id="submit-pending">
                                                <i class="fa fa-check"></i> Save
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
                <!-- VDR Approved -->
                <div class="tab-pane" id="vdrapproved" role="tabpanel">
                    <form id="form-vdrapproved-worker">
                        <div class="card">
                            <div class="card-body">
                                <div class="ribbon ribbon-danger ribbon-right">VDR Approved</div>
                                
                                <div class="table-responsive">
                                    <table id="table-application-vdrapproved" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Foreign<br />Worker</th>
                                                <th class="text-center">Passport<br />Sector</th>
                                                <th class="text-center">Employer</th>
                                                <th class="text-center">Medical</th>
                                                <th class="text-center">Training</th>
                                                <th class="text-center">VDR<br />Approved</th>
                                                <th class="text-center">Approved<br />For<br />Departure</th>
                                                <th class="text-center">Departure<br />Confirmed</th>
                                                <th class="text-center">Arrival<br />Confirmed</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $m = 0;
                                            foreach($vdrapproved as $t){
                                                $m++;
                                        ?>
                                            <tr>
                                                <td class="text-center vert-middle"><?php echo $m; ?></td>
                                                <td class="vert-middle">
                                                    <span class="badge badge-info"><?php echo $t->worker->code; ?></span>
                                                    <br /><?php echo strtoupper($t->worker->full_name); ?>
                                                </td>
                                                <td class="vert-middle">
                                                    <?php echo strtoupper($t->passport->number); ?>
                                                    <br /><small><?php echo strtoupper($t->worker->jobsector->name); ?></small>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php
                                                        if(empty($t->employer_id)){
                                                            echo '<small>NO EMPLOYER</small>';
                                                        } else {
                                                            echo '<span class="badge badge-info">'.$t->quota->code.'</span><br />';
                                                            echo '<small>'.strtoupper($t->employer->profile->company->name).'</small>';
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->medical == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->medical == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
												<td class="text-center vert-middle">
                                                    <?php echo $t->visa == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php 
                                                        if($t->approval == 'YES'){
                                                            echo '<i class="fa fa-check text-success"></i>';
                                                        } else {
                                                            echo '<i class="fa fa-times text-danger"></i><br /><input type="checkbox" name="approval[]" class="checkbox-form" value="'.$t->id.'" />';
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->departure == 'YES' ? '<span class="font-bold">'.$t->flight_number.'</span><br /><small>'.date('d M Y', strtotime($t->flight_date)).'</small><br /><small>ETA : '.$t->eta_malaysia.'</small><br /><small>'.Helpers::checkCovid19Document($t->guid).'</small>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->arrival == 'YES' ? date('d M Y', strtotime($t->arrival_date)) : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <a href="index.php?r=Admin/View&id=<?php echo $t->id; ?>" class="btn btn-sm waves-effect waves-light btn-success text-white" data-toggle="tooltip" data-placement="top" title="View" data-original-title="View"><i class="fa fa-search"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                            }    
                                        ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <div class="pull-right">
                                            <input type="hidden" name="agent_id" value="<?php echo $_GET['id']; ?>" />
                                            <a class="btn btn-success" id="submit-vdrapproved">
                                                <i class="fa fa-check"></i> Save
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
                <!-- Approved For Departure -->
                <div class="tab-pane" id="approval" role="tabpanel">
                    <form id="form-approval-worker">
                        <div class="card">
                            <div class="card-body">
                                <div class="ribbon ribbon-danger ribbon-right">Approved For Departure</div>
                                
                                <div class="table-responsive">
                                    <table id="table-application-approval" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Foreign<br />Worker</th>
                                                <th class="text-center">Passport<br />Sector</th>
                                                <th class="text-center">Employer</th>
                                                <th class="text-center">Medical</th>
                                                <th class="text-center">Training</th>
                                                <th class="text-center">VDR<br />Approved</th>
						<th class="text-center">Approved<br />For<br />Departure</th>
                                                <th class="text-center">Departure<br />Confirmed</th>
                                                <th class="text-center">Arrival<br />Confirmed</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $m = 0;
                                            foreach($approval as $t){
                                                $m++;
                                        ?>
                                            <tr>
                                                <td class="text-center vert-middle"><?php echo $m; ?></td>
                                                <td class="vert-middle">
                                                    <span class="badge badge-info"><?php echo $t->worker->code; ?></span>
                                                    <br /><?php echo strtoupper($t->worker->full_name); ?>
                                                </td>
                                                <td class="vert-middle">
                                                    <?php echo strtoupper($t->passport->number); ?>
                                                    <br /><small><?php echo strtoupper($t->worker->jobsector->name); ?></small>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php
                                                        if(empty($t->employer_id)){
                                                            echo '<small>NO EMPLOYER</small>';
                                                        } else {
                                                            echo '<span class="badge badge-info">'.$t->quota->code.'</span><br />';
                                                            echo '<small>'.strtoupper($t->employer->profile->company->name).'</small>';
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->medical == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->medical == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->visa == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->approval == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->departure == 'YES' ? '<span class="font-bold">'.$t->flight_number.'</span><br /><small>'.date('d M Y', strtotime($t->flight_date)).'</small><br /><small>ETA : '.$t->eta_malaysia.'</small><br /><small>'.Helpers::checkCovid19Document($t->guid).'</small>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <?php echo $t->arrival == 'YES' ? date('d M Y', strtotime($t->arrival_date)) : '<i class="fa fa-times text-danger"></i>'; ?>
                                                </td>
                                                <td class="text-center vert-middle">
                                                    <a href="index.php?r=Admin/View&id=<?php echo $t->id; ?>" class="btn btn-sm waves-effect waves-light btn-success text-white" data-toggle="tooltip" data-placement="top" title="View" data-original-title="View"><i class="fa fa-search"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                            }    
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
				
                <!-- Ready For Departure -->
                <div class="tab-pane" id="ready" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <div class="ribbon ribbon-danger ribbon-right">Ready For Departure</div>
                            
                            <div class="table-responsive">
                                <table id="table-application-departure" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Foreign<br />Worker</th>
                                            <th class="text-center">Passport<br />Sector</th>
                                            <th class="text-center">Employer</th>
                                            <th class="text-center">Medical</th>
                                            <th class="text-center">Training</th>
                                            <th class="text-center">VDR<br />Approved</th>
                                            <th class="text-center">Approved<br />For<br />Departure</th>
                                            <th class="text-center">Departure<br />Confirmed</th>
                                            <th class="text-center">Arrival<br />Confirmed</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $m = 0;
                                        foreach($departure as $t){
                                            $m++;
                                    ?>
                                        <tr>
                                            <td class="text-center vert-middle"><?php echo $m; ?></td>
                                            <td class="vert-middle">
                                                <span class="badge badge-info"><?php echo $t->worker->code; ?></span>
                                                <br /><?php echo strtoupper($t->worker->full_name); ?>
                                            </td>
                                            <td class="vert-middle">
                                                <?php echo strtoupper($t->passport->number); ?>
                                                <br /><small><?php echo strtoupper($t->worker->jobsector->name); ?></small>
                                            </td>
                                            <td class="text-center vert-middle">
                                                <?php
                                                    if(empty($t->employer_id)){
                                                        echo '<small>NO EMPLOYER</small>';
                                                    } else {
                                                        echo '<span class="badge badge-info">'.$t->quota->code.'</span><br />';
                                                        echo '<small>'.strtoupper($t->employer->profile->company->name).'</small>';
                                                    }
                                                ?>
                                            </td>
                                            <td class="text-center vert-middle">
                                                <?php echo $t->medical == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                            </td>
                                            <td class="text-center vert-middle">
                                                <?php echo $t->medical == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                            </td>
                                            <td class="text-center vert-middle">
                                                <?php echo $t->visa == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                            </td>
                                            <td class="text-center vert-middle">
                                                <?php echo $t->approval == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                            </td>
                                            <td class="text-center vert-middle">
                                                <?php echo $t->departure == 'YES' ? '<span class="font-bold">'.$t->flight_number.'</span><br /><small>'.date('d M Y', strtotime($t->flight_date)).'</small><br /><small>ETA : '.$t->eta_malaysia.'</small><br /><small>'.Helpers::checkCovid19Document($t->guid).'</small>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                            </td>
                                            <td class="text-center vert-middle">
                                                <?php echo $t->arrival == 'YES' ? date('d M Y', strtotime($t->arrival_date)) : '<i class="fa fa-times text-danger"></i>'; ?>
                                            </td>
                                            <td class="text-center vert-middle">
                                                <a href="index.php?r=Admin/View&id=<?php echo $t->id; ?>" class="btn btn-sm waves-effect waves-light btn-success text-white" data-toggle="tooltip" data-placement="top" title="View" data-original-title="View"><i class="fa fa-search"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                        }    
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Arrival & Completed -->
                <div class="tab-pane" id="arrival" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <div class="ribbon ribbon-danger ribbon-right">Arrival & Completed</div>
                            
                            <div class="table-responsive">
                                <table id="table-application-arrival" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Foreign<br />Worker</th>
                                            <th class="text-center">Passport<br />Sector</th>
                                            <th class="text-center">Employer</th>
                                            <th class="text-center">Medical</th>
                                            <th class="text-center">Training</th>
                                            <th class="text-center">VDR<br />Approved</th>
                                            <th class="text-center">Approved<br />For<br />Departure</th>
                                            <th class="text-center">Departure<br />Confirmed</th>
                                            <th class="text-center">Arrival<br />Confirmed</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $m = 0;
                                        foreach($arrival as $t){
                                            $m++;
                                    ?>
                                        <tr>
                                            <td class="text-center vert-middle"><?php echo $m; ?></td>
                                            <td class="vert-middle">
                                                <span class="badge badge-info"><?php echo $t->worker->code; ?></span>
                                                <br /><?php echo strtoupper($t->worker->full_name); ?>
                                            </td>
                                            <td class="vert-middle">
                                                <?php echo strtoupper($t->passport->number); ?>
                                                <br /><small><?php echo strtoupper($t->worker->jobsector->name); ?></small>
                                            </td>
                                            <td class="text-center vert-middle">
                                                <?php
                                                    if(empty($t->employer_id)){
                                                        echo '<small>NO EMPLOYER</small>';
                                                    } else {
                                                        echo '<span class="badge badge-info">'.$t->quota->code.'</span><br />';
                                                        echo '<small>'.strtoupper($t->employer->profile->company->name).'</small>';
                                                    }
                                                ?>
                                            </td>
                                            <td class="text-center vert-middle">
                                                <?php echo $t->medical == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                            </td>
                                            <td class="text-center vert-middle">
                                                <?php echo $t->medical == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                            </td>
                                            <td class="text-center vert-middle">
                                                <?php echo $t->visa == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                            </td>
                                            <td class="text-center vert-middle">
                                                <?php echo $t->approval == 'YES' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                            </td>
                                            <td class="text-center vert-middle">
                                                <?php echo $t->departure == 'YES' ? '<span class="font-bold">'.$t->flight_number.'</span><br /><small>'.date('d M Y', strtotime($t->flight_date)).'</small><br /><small>ETA : '.$t->eta_malaysia.'</small><br /><small>'.Helpers::checkCovid19Document($t->guid).'</small>' : '<i class="fa fa-times text-danger"></i>'; ?>
                                            </td>
                                            <td class="text-center vert-middle">
                                                <?php echo $t->arrival == 'YES' ? date('d M Y', strtotime($t->arrival_date)) : '<i class="fa fa-times text-danger"></i>'; ?>
                                            </td>
                                            <td class="text-center vert-middle">
                                                <a href="index.php?r=Admin/View&id=<?php echo $t->id; ?>" class="btn btn-sm waves-effect waves-light btn-success text-white" data-toggle="tooltip" data-placement="top" title="View" data-original-title="View"><i class="fa fa-search"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                        }    
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/timeSolver/1.2.0/timeSolver.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/admin/linkworker.js", CClientScript::POS_END);