$(document).ready(function() {
    $('.table-list-job').DataTable({
        pageLength: 25,
        responsive: true,
        dom: 'lTfgitp'
    });
    
    $('[data-toggle="tooltip"]').tooltip();
});

$(document).on('click','.job-new',function() {
    $('#modal-new-job').modal('show');
    $('#form-new-job')[0].reset();
    
    $.ajax({
        url: "index.php?r=AjaxAdmin/SettingNew&type=JOB",
        dataType: "JSON",
        success: function(data){
            $('[name="r_setting_sequence"]').val(data.sequence);
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
});

$(document).on('click','#register-job',function() {
    if($('#form-new-job').parsley().validate()){
        $.ajax({
            url: "index.php?r=AjaxAdmin/SettingRegister&type=JOB",
            type: "POST",
            data: $('#form-new-job').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $('.message-form').html(data.success_form);
                    setTimeout(function(){
                        $('.message-form').empty();
                        $('#modal-new-job').modal('hide');
                        $(location).attr('href','index.php?r=Admin/SettingJob');
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

$(document).on('click','.job-edit',function() {
    var id = $(this).data('id');
    $('#modal-edit-job').modal('show');
    $('#form-edit-job')[0].reset();
    
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

$(document).on('click','#update-job',function() {
    var id = $('[name="u_setting_id"]').val();
    
    if($('#form-edit-job').parsley().validate()){
        $.ajax({
            url: "index.php?r=AjaxAdmin/SettingUpdate&id=" + id + "&type=JOB",
            type: "POST",
            data: $('#form-edit-job').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $('.message-form').html(data.success_form);
                    setTimeout(function(){
                        $('.message-form').empty();
                        $('#modal-edit-job').modal('hide');
                        $(location).attr('href','index.php?r=Admin/SettingJob');
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

$(document).on('click','.job-delete',function() {
    var id = $(this).data('id');
    $('#modal-delete-job').modal('show');
    $('#form-delete-job')[0].reset();
    
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

$(document).on('click','#delete-job',function() {
    var id = $('[name="d_setting_id"]').val();
    
    $.ajax({
        url: "index.php?r=AjaxAdmin/SettingDelete&id=" + id + "&type=JOB",
        type: "POST",
        data: $('#form-delete-job').serialize(),
        dataType: "JSON",
        success: function(data){
            if(data.status == 'success'){
                $('.message-form').html(data.success_form);
                setTimeout(function(){
                    $('.message-form').empty();
                    $('#modal-delete-job').modal('hide');
                    $(location).attr('href','index.php?r=Admin/SettingJob');
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