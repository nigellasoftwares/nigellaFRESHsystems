$(document).ready(function() {
    $('.table-list-national').DataTable({
        pageLength: 25,
        responsive: true,
        dom: 'lTfgitp'
    });
    
    $('[data-toggle="tooltip"]').tooltip();
});

$(document).on('click','.national-new',function() {
    $('#modal-new-national').modal('show');
    $('#form-new-national')[0].reset();
    
    $.ajax({
        url: "index.php?r=AjaxAdmin/SettingNew&type=NATIONAL",
        dataType: "JSON",
        success: function(data){
            $('[name="r_setting_sequence"]').val(data.sequence);
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
});

$(document).on('click','#register-national',function() {
    if($('#form-new-national').parsley().validate()){
        $.ajax({
            url: "index.php?r=AjaxAdmin/SettingRegister&type=NATIONAL",
            type: "POST",
            data: $('#form-new-national').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $('.message-form').html(data.success_form);
                    setTimeout(function(){
                        $('.message-form').empty();
                        $('#modal-new-national').modal('hide');
                        $(location).attr('href','index.php?r=Admin/SettingNational');
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

$(document).on('click','.national-edit',function() {
    var id = $(this).data('id');
    $('#modal-edit-national').modal('show');
    $('#form-edit-national')[0].reset();
    
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

$(document).on('click','#update-national',function() {
    var id = $('[name="u_setting_id"]').val();
    
    if($('#form-edit-national').parsley().validate()){
        $.ajax({
            url: "index.php?r=AjaxAdmin/SettingUpdate&id=" + id + "&type=NATIONAL",
            type: "POST",
            data: $('#form-edit-national').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $('.message-form').html(data.success_form);
                    setTimeout(function(){
                        $('.message-form').empty();
                        $('#modal-edit-national').modal('hide');
                        $(location).attr('href','index.php?r=Admin/SettingNational');
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

$(document).on('click','.national-delete',function() {
    var id = $(this).data('id');
    $('#modal-delete-national').modal('show');
    $('#form-delete-national')[0].reset();
    
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

$(document).on('click','#delete-national',function() {
    var id = $('[name="d_setting_id"]').val();
    
    $.ajax({
        url: "index.php?r=AjaxAdmin/SettingDelete&id=" + id + "&type=NATIONAL",
        type: "POST",
        data: $('#form-delete-national').serialize(),
        dataType: "JSON",
        success: function(data){
            if(data.status == 'success'){
                $('.message-form').html(data.success_form);
                setTimeout(function(){
                    $('.message-form').empty();
                    $('#modal-delete-national').modal('hide');
                    $(location).attr('href','index.php?r=Admin/SettingNational');
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