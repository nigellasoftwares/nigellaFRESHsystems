$(document).ready(function() {
    $('.table-list-agent').DataTable({
        pageLength: 25,
        responsive: true,
        dom: 'lTfgitp'
    });
    
    $('.chosen-district').chosen({
        width: "100%"
    });
    
    $('[data-toggle="tooltip"]').tooltip();
});

$(document).on('click','.agent-new',function() {
    $('#modal-new-agent').modal('show');
    $('#form-new-agent')[0].reset();
});

$(document).on('click','#register-agent',function() {
    if($('#form-new-agent').parsley().validate()){
        $.ajax({
            url: "index.php?r=AjaxAdmin/ProfileRegister",
            type: "POST",
            data: $('#form-new-agent').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $('.message-form').html(data.success_form);
                    setTimeout(function(){
                        $('.message-form').empty();
                        $('#modal-new-agent').modal('hide');
                        $(location).attr('href','index.php?r=Admin/ListAgent');
                    }, 1000);
                } else if(data.status == 'failure'){
                    $('.message-form').html(data.error_form);
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });
    }
});

$(document).on('click','.agent-view',function() {
    var id = $(this).data('id');
    $('#modal-view-agent').modal('show');
    $('#form-view-agent')[0].reset();
    
    $.ajax({
        url: "index.php?r=AjaxAdmin/ProfileView&id=" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('.agent-id').val(data.id);
            $('.agent-code').val(data.code);
            $('.agent-type').val(data.type);
            $('.agent-name').val(data.name);
            $('.agent-initial').val(data.initial);
            $('.agent-register-number').val(data.register_number);
            $('.agent-contact-person').val(data.contact_person);
            $('.agent-nric').val(data.nric);
            $('.agent-address1').val(data.address1);
            $('.agent-address2').val(data.address2);
            $('.agent-address3').val(data.address3);
            $('.agent-district-name').val(data.district_name);
            $('.agent-phone1').val(data.phone1);
            $('.agent-phone2').val(data.phone2);
            $('.agent-fax').val(data.fax);
            $('.agent-email').val(data.email);
            $('.agent-remark').val(data.comment);
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
});

$(document).on('click','.agent-edit',function() {
    var id = $(this).data('id');
    $('#modal-edit-agent').modal('show');
    $('#form-edit-agent')[0].reset();
    
    $.ajax({
        url: "index.php?r=AjaxAdmin/ProfileView&id=" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('.agent-id').val(data.id);
            $('.agent-code').val(data.code);
            $('.agent-type').val(data.type);
            $('.agent-name').val(data.name);
            $('.agent-initial').val(data.initial);
            $('.agent-register-number').val(data.register_number);
            $('.agent-contact-person').val(data.contact_person);
            $('.agent-nric').val(data.nric);
            $('.agent-address1').val(data.address1);
            $('.agent-address2').val(data.address2);
            $('.agent-address3').val(data.address3);
            $('.agent-district').val(data.district).trigger('chosen:updated');
            $('.agent-phone1').val(data.phone1);
            $('.agent-phone2').val(data.phone2);
            $('.agent-fax').val(data.fax);
            $('.agent-email').val(data.email);
            $('.agent-remark').val(data.comment);
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
});

$(document).on('click','#update-agent',function() {
    var id = $('[name="u_id"]').val();
    
    if($('#form-edit-agent').parsley().validate()){
        $.ajax({
            url: "index.php?r=AjaxAdmin/ProfileUpdate&id=" + id,
            type: "POST",
            data: $('#form-edit-agent').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $('.message-form').html(data.success_form);
                    setTimeout(function(){
                        $('.message-form').empty();
                        $('#modal-edit-agent').modal('hide');
                        $(location).attr('href','index.php?r=Admin/ListAgent');
                    }, 1000);
                } else if(data.status == 'failure'){
                    $('.message-form').html(data.error_form);
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });
    }
});

$(document).on('click','.agent-delete',function() {
    var id = $(this).data('id');
    $('#modal-delete-agent').modal('show');
    $('#form-delete-agent')[0].reset();
    
    $.ajax({
        url: "index.php?r=AjaxAdmin/ProfileView&id=" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('.agent-id').val(data.id);
            $('.agent-code').val(data.code);
            $('.agent-type').val(data.type);
            $('.agent-name').val(data.name);
            $('.agent-initial').val(data.initial);
            $('.agent-address1').val(data.address1);
            $('.agent-address2').val(data.address2);
            $('.agent-address3').val(data.address3);
            $('.agent-district-name').val(data.district_name);
            $('.agent-phone1').val(data.phone1);
            $('.agent-phone2').val(data.phone2);
            $('.agent-fax').val(data.fax);
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
});

$(document).on('click','#delete-agent',function() {
    var id = $('[name="d_id"]').val();
    
    if($('#form-delete-agent').parsley().validate()){
        $.ajax({
            url: "index.php?r=AjaxAdmin/ProfileDelete&id=" + id,
            type: "POST",
            data: $('#form-delete-agent').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $('.message-form').html(data.success_form);
                    setTimeout(function(){
                        $('.message-form').empty();
                        $('#modal-delete-agent').modal('hide');
                        $(location).attr('href','index.php?r=Admin/ListAgent');
                    }, 1000);
                } else if(data.status == 'failure'){
                    $('.message-form').html(data.error_form);
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });
    }
});