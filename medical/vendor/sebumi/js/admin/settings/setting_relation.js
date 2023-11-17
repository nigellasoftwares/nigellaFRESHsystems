$(document).ready(function() {
    $('.table-list-relation').DataTable({
        pageLength: 25,
        responsive: true,
        dom: 'lTfgitp'
    });
    
    $('[data-toggle="tooltip"]').tooltip();
});

$(document).on('click','.relation-new',function() {
    $('#modal-new-relation').modal('show');
    $('#form-new-relation')[0].reset();
    
    $.ajax({
        url: "index.php?r=AjaxAdmin/SettingNew&type=RELATION",
        dataType: "JSON",
        success: function(data){
            $('[name="r_setting_sequence"]').val(data.sequence);
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
});

$(document).on('click','#register-relation',function() {
    if($('#form-new-relation').parsley().validate()){
        $.ajax({
            url: "index.php?r=AjaxAdmin/SettingRegister&type=RELATION",
            type: "POST",
            data: $('#form-new-relation').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $('.message-form').html(data.success_form);
                    setTimeout(function(){
                        $('.message-form').empty();
                        $('#modal-new-relation').modal('hide');
                        $(location).attr('href','index.php?r=Admin/SettingRelation');
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

$(document).on('click','.relation-edit',function() {
    var id = $(this).data('id');
    $('#modal-edit-relation').modal('show');
    $('#form-edit-relation')[0].reset();
    
    $.ajax({
        url: "index.php?r=AjaxAdmin/SettingEdit&id=" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('[name="u_setting_id"]').val(data.id);
            $('[name="u_setting_name"]').val(data.name);
            $('[name="u_setting_code"]').val(data.code);
            $('[name="u_setting_sequence"]').val(data.sequence);
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
});

$(document).on('click','#update-relation',function() {
    var id = $('[name="u_setting_id"]').val();
    
    if($('#form-edit-relation').parsley().validate()){
        $.ajax({
            url: "index.php?r=AjaxAdmin/SettingUpdate&id=" + id + "&type=RELATION",
            type: "POST",
            data: $('#form-edit-relation').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $('.message-form').html(data.success_form);
                    setTimeout(function(){
                        $('.message-form').empty();
                        $('#modal-edit-relation').modal('hide');
                        $(location).attr('href','index.php?r=Admin/SettingRelation');
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

$(document).on('click','.relation-delete',function() {
    var id = $(this).data('id');
    $('#modal-delete-relation').modal('show');
    $('#form-delete-relation')[0].reset();
    
    $.ajax({
        url: "index.php?r=AjaxAdmin/SettingEdit&id=" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('[name="d_setting_id"]').val(data.id);
            $('[name="d_setting_name"]').val(data.name);
            $('[name="d_setting_code"]').val(data.code);
            $('[name="d_setting_sequence"]').val(data.sequence);
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
});

$(document).on('click','#delete-relation',function() {
    var id = $('[name="d_setting_id"]').val();
    
    $.ajax({
        url: "index.php?r=AjaxAdmin/SettingDelete&id=" + id + "&type=RELATION",
        type: "POST",
        data: $('#form-delete-relation').serialize(),
        dataType: "JSON",
        success: function(data){
            if(data.status == 'success'){
                $('.message-form').html(data.success_form);
                setTimeout(function(){
                    $('.message-form').empty();
                    $('#modal-delete-relation').modal('hide');
                    $(location).attr('href','index.php?r=Admin/SettingRelation');
                }, 1000);
            } else if(data.status == 'failure'){
                $('.message-form').html(data.error_form);
            }
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
});