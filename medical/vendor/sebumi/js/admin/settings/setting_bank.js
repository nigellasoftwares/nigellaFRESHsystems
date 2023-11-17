$(document).ready(function() {
    $('.table-list-bank').DataTable({
        pageLength: 25,
        responsive: true,
        dom: 'lTfgitp'
    });
    
    $('[data-toggle="tooltip"]').tooltip();
});

$(document).on('click','.bank-new',function() {
    $('#modal-new-bank').modal('show');
    $('#form-new-bank')[0].reset();
    
    $.ajax({
        url: "index.php?r=AjaxAdmin/SettingNew&type=BANK",
        dataType: "JSON",
        success: function(data){
            $('[name="r_setting_sequence"]').val(data.sequence);
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
});

$(document).on('click','#register-bank',function() {
    if($('#form-new-bank').parsley().validate()){
        $.ajax({
            url: "index.php?r=AjaxAdmin/SettingRegister&type=BANK",
            type: "POST",
            data: $('#form-new-bank').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $('.message-form').html(data.success_form);
                    setTimeout(function(){
                        $('.message-form').empty();
                        $('#modal-new-bank').modal('hide');
                        $(location).attr('href','index.php?r=Admin/SettingBank');
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

$(document).on('click','.bank-edit',function() {
    var id = $(this).data('id');
    $('#modal-edit-bank').modal('show');
    $('#form-edit-bank')[0].reset();
    
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

$(document).on('click','#update-bank',function() {
    var id = $('[name="u_setting_id"]').val();
    
    if($('#form-edit-bank').parsley().validate()){
        $.ajax({
            url: "index.php?r=AjaxAdmin/SettingUpdate&id=" + id + "&type=BANK",
            type: "POST",
            data: $('#form-edit-bank').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $('.message-form').html(data.success_form);
                    setTimeout(function(){
                        $('.message-form').empty();
                        $('#modal-edit-bank').modal('hide');
                        $(location).attr('href','index.php?r=Admin/SettingBank');
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

$(document).on('click','.bank-delete',function() {
    var id = $(this).data('id');
    $('#modal-delete-bank').modal('show');
    $('#form-delete-bank')[0].reset();
    
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

$(document).on('click','#delete-bank',function() {
    var id = $('[name="d_setting_id"]').val();
    
    $.ajax({
        url: "index.php?r=AjaxAdmin/SettingDelete&id=" + id + "&type=BANK",
        type: "POST",
        data: $('#form-delete-bank').serialize(),
        dataType: "JSON",
        success: function(data){
            if(data.status == 'success'){
                $('.message-form').html(data.success_form);
                setTimeout(function(){
                    $('.message-form').empty();
                    $('#modal-delete-bank').modal('hide');
                    $(location).attr('href','index.php?r=Admin/SettingBank');
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