<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Training</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item active">Training</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><span class="label label-primary"><?php echo $user->profile->company->name; ?></span></h4>
            <h4 class="card-title">Training for Worker</h4>
            
            <div class="row">
                <div class="col-lg-3">
                    <div class="card-body">
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h4 class="card-title">Training Center 1</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Attendance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td>16 March 2023</td>
                                                <td><span class="label label-success">PRESENT</span></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">2</td>
                                                <td>17 March 2023</td>
                                                <td><span class="label label-success">PRESENT</span></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">3</td>
                                                <td>20 March 2023</td>
                                                <td><span class="label label-success">PRESENT</span></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">4</td>
                                                <td>21 March 2023</td>
                                                <td><span class="label label-success">PRESENT</span></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">5</td>
                                                <td>22 March 2023</td>
                                                <td><span class="label label-success">PRESENT</span></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">6</td>
                                                <td>23 March 2023</td>
                                                <td><span class="label label-success">PRESENT</span></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">7</td>
                                                <td>24 March 2023</td>
                                                <td><span class="label label-success">PRESENT</span></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">8</td>
                                                <td>27s March 2023</td>
                                                <td><span class="label label-success">PRESENT</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                Print Certificate <a href="uploads/certificates/training.pdf" disable="true" target="_blank" class="btn btn-sm waves-effect waves-light btn-success text-white" data-toggle="tooltip" data-placement="top" title="Certificate" data-original-title="Certificate"><i class="fa fa-file-pdf-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card-body b-l calender-sidebar">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="modal none-border" id="my-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Add Event</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade none-border" id="add-new-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Add</strong> a category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="control-label">Category Name</label>
                            <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">Choose Category Color</label>
                            <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                <option value="success">Success</option>
                                <option value="danger">Danger</option>
                                <option value="info">Info</option>
                                <option value="primary">Primary</option>
                                <option value="warning">Warning</option>
                                <option value="inverse">Inverse</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/datatables/jquery.dataTables.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/toast-master/js/jquery.toast.js", CClientScript::POS_END);
    
    /** Calendar JavaScript **/
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/calendar/jquery-ui.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/moment/moment.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/calendar/dist/fullcalendar.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/calendar/dist/cal-init.js", CClientScript::POS_END);
    
    /** Calendar Bootstrap **/
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/training/calendar.js", CClientScript::POS_END);
    