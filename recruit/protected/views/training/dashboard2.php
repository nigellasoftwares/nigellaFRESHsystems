<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Dashboard</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><span class="label label-primary"><?php echo $user->profile->company->name; ?></span></h4>
            <h4 class="card-title">Training for Worker</h4>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-info">
                                <h3 class="text-white box m-b-0"><i class="icon-people"></i></h3></div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-info">3</h3>
                                <h5 class="text-muted m-b-0">Registered</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-success">
                                <h3 class="text-white box m-b-0"><i class="icon-people"></i></h3></div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-success">1</h3>
                                <h5 class="text-muted m-b-0">Present</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-warning">
                                <h3 class="text-white box m-b-0"><i class="icon-people"></i></h3></div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0">2</h3>
                                <h5 class="text-muted m-b-0">Queue</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-danger">
                                <h3 class="text-white box m-b-0"><i class="icon-people"></i></h3></div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-danger">0</h3>
                                <h5 class="text-muted m-b-0">Absent</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="table-responsive m-t-40">
                <table id="table-application-transaction" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th width="10%" class="text-center">Present</th>
                            <th width="10%">Worker Code</th>
                            <th>Worker Name</th>
                            <th width="15%">Passport</th>
                            <th width="15%">Training Date</th>
                            <th width="15%">Registered Date</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
						<tr>
                            <td class="text-center">1</td>
                            <td class="text-center">
                                <i class="fa fa-check fa-2x text-success"></i>
                            </td>
                            <td>BWAAAA0004</td>
                            <td>MATT DOUGLAS DAMON</td>
                            <td>BM21002101</td>
                            <td>10 Jan 2022</td>
                            <td>10 Jan 2022</td>
                            <td>
                                <a href="uploads/certificates/training.pdf" target="_blank" class="btn btn-sm waves-effect waves-light btn-success text-white" data-toggle="tooltip" data-placement="top" title="Certificate" data-original-title="Certificate"><i class="fa fa-file-pdf-o"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">
                                <input type="checkbox" name="present[]" class="checkbox-form checkbox-print" value="present" />
                            </td>
                            <td>BWAAAA0003</td>
                            <td>ANDREW</td>
                            <td>PASS11251012303</td>
                            <td>13 Nov 2021</td>
                            <td>01 Nov 2021</td>
                            <td>
                                <a href="uploads/certificates/training.pdf" class="btn btn-sm waves-effect waves-light btn-dark text-white disabled" data-toggle="tooltip" data-placement="top" title="Certificate" data-original-title="Certificate"><i class="fa fa-file-pdf-o"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="text-center">
                                <input type="checkbox" name="present[]" class="checkbox-form checkbox-print" value="present" />
                            </td>
                            <td>BWAAAA0002</td>
                            <td>MICHAEL</td>
                            <td>PASS11251012302</td>
                            <td>13 Nov 2021</td>
                            <td>01 Nov 2021</td>
                            <td>
                                <a href="uploads/certificates/training.pdf" class="btn btn-sm waves-effect waves-light btn-dark text-white disabled" data-toggle="tooltip" data-placement="top" title="Certificate" data-original-title="Certificate"><i class="fa fa-file-pdf-o"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td class="text-center">
                                <i class="fa fa-check fa-2x text-success"></i>
                            </td>
                            <td>BWAAAA0001</td>
                            <td>JAMES</td>
                            <td>PASS11251012301</td>
                            <td>06 Nov 2021</td>
                            <td>01 Nov 2021</td>
                            <td>
                                <a href="uploads/certificates/training.pdf" target="_blank" class="btn btn-sm waves-effect waves-light btn-success text-white" data-toggle="tooltip" data-placement="top" title="Certificate" data-original-title="Certificate"><i class="fa fa-file-pdf-o"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="row m-t-30">
                <div class="col-md-12">
                    <div class="pull-right">
                        <a class="btn btn-success">
                            <i class="fa fa-print"></i> Save
                        </a>
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