<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Attendance</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo Helpers::describeRole($user->role_id); ?></li>
                    <li class="breadcrumb-item active">Attendance</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><span class="label label-primary"><?php echo $user->profile->company->name; ?></span></h4>
            <h4 class="card-title">Attendance for Foreign Worker</h4>
            
            <div class="row">
                <div class="col-lg-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="calendar-events" class="">
                                    <div class="calendar-events" data-class="bg-info"><i class="fa fa-circle text-info"></i> Present</div>
                                    <div class="calendar-events" data-class="bg-success"><i class="fa fa-circle text-success"></i> Leave</div>
                                    <div class="calendar-events" data-class="bg-danger"><i class="fa fa-circle text-danger"></i> Absent</div>
                                    <div class="calendar-events" data-class="bg-warning"><i class="fa fa-circle text-warning"></i> MC</div>
                                </div>
                                <!-- checkbox -->
                                <div class="checkbox m-t-20">
                                    <input id="drop-remove" type="checkbox">
                                    <label for="drop-remove">
                                        Remove after drop
                                    </label>
                                </div>
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#add-new-event" class="btn m-t-10 btn-info btn-block waves-effect waves-light">
                                        <i class="ti-plus"></i> Add New Event
                                    </a>
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
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/toast-master/js/jquery.toast.js", CClientScript::POS_END);
    /** Calendar JavaScript **/
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/calendar/jquery-ui.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/moment/moment.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/calendar/dist/fullcalendar.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/elite/assets/node_modules/calendar/dist/cal-init.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/imandor/js/employer/attendance.js", CClientScript::POS_END);