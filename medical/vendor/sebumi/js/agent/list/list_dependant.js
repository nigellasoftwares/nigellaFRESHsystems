$(document).ready(function() {
    $('.table-list-dependant').DataTable({
        pageLength: 25,
        responsive: true,
        dom: 'lTfgitp'
    });
    
    $('.chosen-gender').chosen({
        width: "100%"
    });
    
    $('.chosen-national').chosen({
        width: "100%"
    });
    
    $('.chosen-job').chosen({
        width: "100%"
    });
    
    $('.input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: false,
        autoclose: true,
        format: "dd-mm-yyyy"
    });
    
    $('[data-toggle="tooltip"]').tooltip();
});

$(document).on('click','.dependant-view',function() {
    var id = $(this).data('id');
    
    $('#modal-view-dependant').modal('show');
    $('#form-view-dependant')[0].reset();
    
    $.ajax({
        url: "index.php?r=Admin/AjaxDependantView&id=" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('.dependant-code').val(data.code);
            $('.dependant-name').val(data.name);
            $('.dependant-passport').val(data.passport);
            $('.dependant-permit').val(data.permit);
            $('.dependant-gender').val(data.gender_name);
            $('.dependant-dob').val(data.dob);
            $('.dependant-arrival-date').val(data.arrival_date);
            $('.dependant-national').val(data.national_name);
            $('.dependant-job').val(data.job_name);
            $('.dependant-remark').val(data.remark);
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
});

$(document).on('click','.dependant-edit',function() {
    var id = $(this).data('id');
    
    $('#modal-edit-dependant').modal('show');
    $('#form-edit-dependant')[0].reset();
    
    $.ajax({
        url: "index.php?r=Admin/AjaxDependantView&id=" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('.dependant-id').val(data.id);
            $('.dependant-code').val(data.code);
            $('.dependant-name').val(data.name);
            $('.dependant-passport').val(data.passport);
            $('.dependant-permit').val(data.permit);
            $('.dependant-gender').val(data.gender).trigger('chosen:updated');
            $('.dependant-dob').val(data.dob);
            $('.dependant-arrival-date').val(data.arrival_date);
            $('.dependant-national').val(data.national).trigger('chosen:updated');
            $('.dependant-job').val(data.job).trigger('chosen:updated');
            $('.dependant-remark').val(data.remark);
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
});

$(document).on('click','#update-dependant',function() {
    var id = $('[name="u_dependant_id"]').val();
    
    if($('#form-edit-dependant').parsley().validate()){
        $.ajax({
            url: "index.php?r=Admin/AjaxDependantUpdate&id=" + id,
            type: "POST",
            data: $('#form-edit-dependant').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $('.message-form').html(data.success_form);
                    setTimeout(function(){
                        $('.message-form').empty();
                        $('#modal-edit-dependant').modal('hide');
                        $(location).attr('href','index.php?r=Admin/ListDependant');
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

$(document).on('click','.dependant-delete',function() {
    var id = $(this).data('id');
    
    $('#modal-delete-dependant').modal('show');
    $('#form-delete-dependant')[0].reset();
    
    $.ajax({
        url: "index.php?r=Admin/AjaxDependantView&id=" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('.dependant-id').val(data.id);
            $('.dependant-code').val(data.code);
            $('.dependant-name').val(data.name);
            $('.dependant-passport').val(data.passport);
            $('.dependant-permit').val(data.permit);
            $('.dependant-gender').val(data.gender_name);
            $('.dependant-dob').val(data.dob);
            $('.dependant-arrival-date').val(data.arrival_date);
            $('.dependant-national').val(data.national_name);
            $('.dependant-job').val(data.job_name);
            $('.dependant-remark').val(data.remark);
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
});

$(document).on('click','#delete-dependant',function() {
    var id = $('[name="d_dependant_id"]').val();
    
    $.ajax({
        url: "index.php?r=Admin/AjaxDependantDelete&id=" + id,
        type: "POST",
        data: $('#form-delete-dependant').serialize(),
        dataType: "JSON",
        success: function(data){
            if(data.status == 'success'){
                $('.message-form').html(data.success_form);
                setTimeout(function(){
                    $('.message-form').empty();
                    $('#modal-delete-dependant').modal('hide');
                    $(location).attr('href','index.php?r=Admin/ListDependant');
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