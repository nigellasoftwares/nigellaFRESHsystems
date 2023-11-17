<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Bank Options</h2>
        <ol class="breadcrumb">
            <li>
                Settings
            </li>
            <li>
                Bank
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
            <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Bank Registered List</h5>
                    <div class="ibox-tools">
                        <a class="bank-new">
                            <i class="fa fa-plus"></i>
                        </a>
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover table-list-bank">
                            <thead>
                                <tr>
                                    <th width="6%">#</th>
                                    <th width="10%">Bank Code</th>
                                    <th>Bank Name</th>
                                    <th width="10%">Sequence</th>
                                    <th width="11%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(count($bank)){
                                    $i = 0;
                                    foreach($bank as $b){
                                        $i += 1;
                                        $code = empty($b->initial) ? '<span class="label text-white">EMPTY</span>' : $b->initial;
                                        $name = empty($b->name) ? '<span class="label text-white">EMPTY</span>' : $b->name;
                                        $sequence = empty($b->order_number) ? '<span class="label text-white">EMPTY</span>' : $b->order_number;
                            ?>
                                <tr>
                                    <td class="text-center">
                                        <span class="badge badge-primary"><?php echo $i; ?></span>
                                    </td>
                                    <td><?php echo $code; ?></td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $sequence; ?></td>
                                    <td>
                                        <a class="btn btn-outline btn-sm btn-warning bank-edit" data-id="<?php echo $b->id; ?>" data-toggle="tooltip" data-placement="top" title="Edit Bank"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-outline btn-sm btn-danger bank-delete" data-id="<?php echo $b->id; ?>" data-toggle="tooltip" data-placement="top" title="Delete Bank"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php 
                                    }
                                }    
                            ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Bank Code</th>
                                    <th>Bank Name</th>
                                    <th>Sequence</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="modal-new-bank">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">New Bank Information</h4>
            </div>
            <form id="form-new-bank">
                <div class="modal-body">
                    <div class="message-form"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>Bank Name</strong></label>
                                <input type="text" name="r_setting_name" class="form-control" placeholder="Bank Name" data-required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Bank Code</strong></label>
                                <input type="text" name="r_setting_code" class="form-control" placeholder="Bank Code" data-required="true" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Sequence</strong></label>
                                <input type="text" name="r_setting_sequence" class="form-control" placeholder="Sequence" readonly="true" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="register-bank" class="btn btn-primary">Register</a>
                    <a class="btn btn-default" data-dismiss="modal">Close</a>
                </div>
            </form>    
        </div>
    </div>
</div>

<div class="modal inmodal" id="modal-edit-bank">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Edit Bank Information</h4>
            </div>
            <form id="form-edit-bank">
                <div class="modal-body">
                    <div class="message-form"></div>
                    <input type="hidden" name="u_setting_id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>Bank Name</strong></label>
                                <input type="text" name="u_setting_name" class="form-control" placeholder="Bank Name" data-required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Bank Code</strong></label>
                                <input type="text" name="u_setting_code" class="form-control" placeholder="Bank Code" data-required="true" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Sequence</strong></label>
                                <input type="text" name="u_setting_sequence" class="form-control" placeholder="Sequence" data-required="true" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="update-bank" class="btn btn-primary">Update</a>
                    <a class="btn btn-default" data-dismiss="modal">Close</a>
                </div>
            </form>    
        </div>
    </div>
</div>

<div class="modal inmodal" id="modal-delete-bank">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">
                    Delete Bank Information
                    <br /><small>Are you sure you want to delete?</small>
                </h4>
            </div>
            <form id="form-delete-bank">
                <div class="modal-body">
                    <div class="message-form"></div>
                    <input type="hidden" name="d_setting_id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>Bank Name</strong></label>
                                <input type="text" name="d_setting_name" class="form-control" placeholder="Bank Name" readonly="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Bank Code</strong></label>
                                <input type="text" name="d_setting_code" class="form-control" placeholder="Bank Code" readonly="true" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Sequence</strong></label>
                                <input type="text" name="d_setting_sequence" class="form-control" placeholder="Sequence" readonly="true" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="delete-bank" class="btn btn-primary">Yes</a>
                    <a class="btn btn-default" data-dismiss="modal">No</a>
                </div>
            </form>    
        </div>
    </div>
</div>
<?php
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/dataTables/datatables.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.min.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/assets/parsley/parsley.extend.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/sebumi/js/admin/settings/setting_bank.js", CClientScript::POS_END);