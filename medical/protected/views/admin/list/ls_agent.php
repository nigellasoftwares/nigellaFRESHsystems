<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Agent Management</h2>
        <ol class="breadcrumb">
            <li>
                List
            </li>
            <li>
                Agent
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
            <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Agent Registered List</h5>
                    <div class="ibox-tools">
                        <a class="btn btn-outline btn-success agent-new">
                            Register
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
                        <table class="table table-striped table-bordered table-hover table-list-agent">
                            <thead>
                                <tr>
                                    <th width="6%">#</th>
                                    <th width="12%">Agent Code</th>
                                    <th>Agent Name</th>
                                    <th>Contact Person</th>
                                    <th>District</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(count($agent)){
                                    $i = 0;
                                    foreach($agent as $a){
                                        $i += 1;
                                        $code = empty($a->code) ? '<span class="label text-white">EMPTY</span>' : $a->code;
                                        $agent = empty($a->name) ? '<span class="label text-white">EMPTY</span>' : $a->name;
                                        $contact = empty($a->contact_person) ? '<span class="label text-white">EMPTY</span>' : $a->contact_person;
                                        $district = empty($a->district_id) ? '<span class="label text-white">EMPTY</span>' : $a->district->name;
                            ?>
                                <tr>
                                    <td class="text-center">
                                        <span class="badge badge-primary"><?php echo $i; ?></span>
                                    </td>
                                    <td><?php echo $code; ?></td>
                                    <td><?php echo $agent; ?></td>
                                    <td><?php echo $contact; ?></td>
                                    <td><?php echo $district; ?></td>
                                    <td>
                                        <a class="btn btn-outline btn-sm btn-primary agent-view" data-id="<?php echo $a->id; ?>" data-toggle="tooltip" data-placement="top" title="View Agent"><i class="fa fa-search"></i></a>
                                        <a class="btn btn-outline btn-sm btn-warning agent-edit" data-id="<?php echo $a->id; ?>" data-toggle="tooltip" data-placement="top" title="Edit Agent"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-outline btn-sm btn-danger agent-delete" data-id="<?php echo $a->id; ?>" data-toggle="tooltip" data-placement="top" title="Delete Agent"><i class="fa fa-trash"></i></a>
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
                                    <th>Agent Code</th>
                                    <th>Agent Name</th>
                                    <th>Name</th>
                                    <th>District</th>
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

<div class="modal inmodal" id="modal-new-agent">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">New Agent Information</h4>
            </div>
            <form id="form-new-agent">
                <div class="modal-body">
                    <div class="message-form"></div>
                    <input type="hidden" name="r_type" value="AGENT">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>Agent Name</strong></label>
                                <input type="text" name="r_name" class="form-control" placeholder="Agent Name" data-required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Register Number</strong></label>
                                <input type="text" name="r_register_number" class="form-control" placeholder="Register" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Initial</strong></label>
                                <input type="text" name="r_initial" class="form-control" placeholder="Initial" data-required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>Contact Person</strong></label>
                                <input type="text" name="r_contact_person" class="form-control" placeholder="Contact Person" />
                            </div>
                        </div>
                    </div>        
                    <div class="row">    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Identity Card Number</strong></label>
                                <input type="text" name="r_nric" class="form-control" placeholder="NRIC Number" data-required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label><strong>Address</strong></label>
                                <input type="text" name="r_address1" class="form-control" placeholder="Address Line 1" data-required="true" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><strong>Contact Number</strong></label>
                                <input type="text" name="r_phone1" class="form-control" placeholder="Phone Number 1" data-required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="r_address2" class="form-control" placeholder="Address Line 2" data-required="true" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="r_phone2" class="form-control" placeholder="Phone Number 2" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="r_address3" class="form-control" placeholder="Address Line 3" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="r_fax" class="form-control" placeholder="Fax Number" data-required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <?php
                                    echo CHtml::dropDownList('r_district', null, $list1, 
                                    array(
                                        'empty' => 'Select District', 
                                        'class' => 'form-control chosen-district',
                                        'data-required' => 'true',
                                    ));
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>Email Address</strong></label>
                                <input type="text" name="r_email" class="form-control" placeholder="Email Address" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>Remarks</strong></label>
                                <textarea name="r_remark" class="form-control" placeholder="Remarks"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="register-agent" class="btn btn-primary">Register</a>
                    <a class="btn btn-default" data-dismiss="modal">Close</a>
                </div>
            </form>    
        </div>
    </div>
</div>

<div class="modal inmodal" id="modal-view-agent">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">View Agent Information</h4>
            </div>
            <form id="form-view-agent">
                <div class="modal-body">
                    <div class="message-form"></div>
                    <input type="hidden" name="v_id" class="agent-id">
                    <input type="hidden" name="v_type" class="agent-type">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><strong>Agent Code</strong></label>
                                <input type="text" name="v_code" class="form-control agent-code" placeholder="Agent Code" readonly="true" />
                            </div>
                        </div>
                        <div class="col-md-2">&nbsp;</div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Initial</strong></label>
                                <input type="text" name="v_initial" class="form-control agent-initial" placeholder="Initial" readonly="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>Agent Name</strong></label>
                                <input type="text" name="v_name" class="form-control agent-name" placeholder="Agent Name" readonly="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Register Number</strong></label>
                                <input type="text" name="v_register_number" class="form-control agent-register-number" placeholder="Register" readonly="true" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Identity Card Number</strong></label>
                                <input type="text" name="v_nric" class="form-control agent-nric" placeholder="NRIC Number" readonly="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>Contact Person</strong></label>
                                <input type="text" name="v_contact_person" class="form-control agent-contact-person" placeholder="Contact Person" readonly="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label><strong>Address</strong></label>
                                <input type="text" name="v_address1" class="form-control agent-address1" placeholder="Address Line 1" readonly="true" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><strong>Contact Number</strong></label>
                                <input type="text" name="v_phone1" class="form-control agent-phone1" placeholder="Phone Number 1" readonly="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="v_address2" class="form-control agent-address2" placeholder="Address Line 2" readonly="true" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="v_phone2" class="form-control agent-phone2" placeholder="Phone Number 2" readonly="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="v_address3" class="form-control agent-address3" placeholder="Address Line 3" readonly="true" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="v_fax" class="form-control agent-fax" placeholder="Fax Number" readonly="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="v_district" class="form-control agent-district-name" placeholder="District" readonly="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>Email Address</strong></label>
                                <input type="text" name="v_email" class="form-control agent-email" placeholder="Email Address" readonly="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>Remarks</strong></label>
                                <textarea name="v_remark" class="form-control agent-remark" placeholder="Remarks" readonly="true" ></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-default" data-dismiss="modal">Close</a>
                </div>
            </form>    
        </div>
    </div>
</div>

<div class="modal inmodal" id="modal-edit-agent">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Edit Agent Information</h4>
            </div>
            <form id="form-edit-agent">
                <div class="modal-body">
                    <div class="message-form"></div>
                    <input type="hidden" name="u_id" class="agent-id">
                    <input type="hidden" name="u_type" class="agent-type">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><strong>Agent Code</strong></label>
                                <input type="text" name="u_code" class="form-control agent-code" placeholder="Agent Code" readonly="true" />
                            </div>
                        </div>
                        <div class="col-md-2">&nbsp;</div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Initial</strong></label>
                                <input type="text" name="u_initial" class="form-control agent-initial" placeholder="Initial" data-required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>Agent Name</strong></label>
                                <input type="text" name="u_name" class="form-control agent-name" placeholder="Agent Name" data-required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Register Number</strong></label>
                                <input type="text" name="u_register_number" class="form-control agent-register-number" placeholder="Register" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Identity Card Number</strong></label>
                                <input type="text" name="u_nric" class="form-control agent-nric" placeholder="NRIC Number" data-required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>Contact Person</strong></label>
                                <input type="text" name="u_contact_person" class="form-control agent-contact-person" placeholder="Contact Person" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label><strong>Address</strong></label>
                                <input type="text" name="u_address1" class="form-control agent-address1" placeholder="Address Line 1" data-required="true" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><strong>Contact Number</strong></label>
                                <input type="text" name="u_phone1" class="form-control agent-phone1" placeholder="Phone Number 1" data-required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="u_address2" class="form-control agent-address2" placeholder="Address Line 2" data-required="true" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="u_phone2" class="form-control agent-phone2" placeholder="Phone Number 2" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="u_address3" class="form-control agent-address3" placeholder="Address Line 3" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="u_fax" class="form-control agent-fax" placeholder="Fax Number" data-required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <?php
                                    echo CHtml::dropDownList('u_district', null, $list1, 
                                    array(
                                        'empty' => 'Select District', 
                                        'class' => 'form-control chosen-district agent-district',
                                        'data-required' => 'true',
                                    ));
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>Email Address</strong></label>
                                <input type="text" name="u_email" class="form-control agent-email" placeholder="Email Address" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>Remarks</strong></label>
                                <textarea name="u_remark" class="form-control agent-remark" placeholder="Remarks"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="update-agent" class="btn btn-primary">Update</a>
                    <a class="btn btn-default" data-dismiss="modal">Close</a>
                </div>
            </form>    
        </div>
    </div>
</div>

<div class="modal inmodal" id="modal-delete-agent">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">
                    Delete Agent Information
                    <br /><small>Are you sure you want to delete?</small>
                </h4>
            </div>
            <form id="form-delete-agent">
                <div class="modal-body">
                    <div class="message-form"></div>
                    <input type="hidden" name="d_id" class="agent-id">
                    <input type="hidden" name="d_type" class="agent-type">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><strong>Agent Code</strong></label>
                                <input type="text" name="d_code" class="form-control agent-code" placeholder="Agent Code" readonly="true" />
                            </div>
                        </div>
                        <div class="col-md-2">&nbsp;</div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Initial</strong></label>
                                <input type="text" name="d_initial" class="form-control agent-initial" placeholder="Initial" readonly="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>Agent Name</strong></label>
                                <input type="text" name="d_name" class="form-control agent-name" placeholder="Agent Name" readonly="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label><strong>Address</strong></label>
                                <input type="text" name="d_address1" class="form-control agent-address1" placeholder="Address Line 1" readonly="true" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><strong>Contact Number</strong></label>
                                <input type="text" name="d_phone1" class="form-control agent-phone1" placeholder="Phone Number 1" readonly="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="d_address2" class="form-control agent-address2" placeholder="Address Line 2" readonly="true" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="d_phone2" class="form-control agent-phone2" placeholder="Phone Number 2" readonly="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="d_address3" class="form-control agent-address3" placeholder="Address Line 3" readonly="true" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="d_fax" class="form-control agent-fax" placeholder="Fax Number" readonly="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="d_district" class="form-control agent-district-name" placeholder="District" readonly="true" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="delete-agent" class="btn btn-primary">Yes</a>
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
    Yii::app()->clientScript->registerScriptFile("vendor/inspinia/js/plugins/chosen/chosen.jquery.js", CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("vendor/sebumi/js/admin/list/list_agent.js", CClientScript::POS_END);