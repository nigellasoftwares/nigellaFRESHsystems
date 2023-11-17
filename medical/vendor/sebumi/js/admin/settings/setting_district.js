$(document).ready(function() {
    $('.table-list-district').DataTable({
        pageLength: 25,
        responsive: true,
        dom: 'lTfgitp'
    });
    
    $('[data-toggle="tooltip"]').tooltip();
});

$(document).on('click','.district-new',function() {
    $('#modal-new-district').modal('show');
    $('#form-new-district')[0].reset();
    
    $.ajax({
        url: "index.php?r=AjaxAdmin/SettingNew&type=DISTRICT",
        dataType: "JSON",
        success: function(data){
            $('[name="r_setting_sequence"]').val(data.sequence);
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
});

$(document).on('click','#register-district',function() {
    if($('#form-new-district').parsley().validate()){
        $.ajax({
            url: "index.php?r=AjaxAdmin/SettingRegister&type=DISTRICT",
            type: "POST",
            data: $('#form-new-district').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $('.message-form').html(data.success_form);
                    setTimeout(function(){
                        $('.message-form').empty();
                        $('#modal-new-district').modal('hide');
                        $(location).attr('href','index.php?r=Admin/SettingDistrict');
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

$(document).on('click','.district-edit',function() {
    var id = $(this).data('id');
    $('#modal-edit-district').modal('show');
    $('#form-edit-district')[0].reset();
    
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

$(document).on('click','#update-district',function() {
    var id = $('[name="u_setting_id"]').val();
    
    if($('#form-edit-district').parsley().validate()){
        $.ajax({
            url: "index.php?r=AjaxAdmin/SettingUpdate&id=" + id + "&type=DISTRICT",
            type: "POST",
            data: $('#form-edit-district').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $('.message-form').html(data.success_form);
                    setTimeout(function(){
                        $('.message-form').empty();
                        $('#modal-edit-district').modal('hide');
                        $(location).attr('href','index.php?r=Admin/SettingDistrict');
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

$(document).on('click','.district-delete',function() {
    var id = $(this).data('id');
    $('#modal-delete-district').modal('show');
    $('#form-delete-district')[0].reset();
    
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

$(document).on('click','#delete-district',function() {
    var id = $('[name="d_setting_id"]').val();
    
    $.ajax({
        url: "index.php?r=AjaxAdmin/SettingDelete&id=" + id + "&type=DISTRICT",
        type: "POST",
        data: $('#form-delete-district').serialize(),
        dataType: "JSON",
        success: function(data){
            if(data.status == 'success'){
                $('.message-form').html(data.success_form);
                setTimeout(function(){
                    $('.message-form').empty();
                    $('#modal-delete-district').modal('hide');
                    $(location).attr('href','index.php?r=Admin/SettingDistrict');
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