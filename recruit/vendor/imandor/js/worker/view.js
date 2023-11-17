$(document).ready(function() {
    $('.datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    });
    
    $('.select2-employer').select2({
        width: '100%'
    });
});

$(document).on('click','#submit-information',function() {
    var id = $(this).data('id');
    
    $.ajax({
        url: "index.php?r=Ajax/AjaxInformationUpdate&id=" + id,
        type: "POST",
        data: $('#form-update-information').serialize(),
        dataType: "JSON",
        success: function(data){
            if(data.status == 'success'){
                $.toast({
                    heading: 'Success',
                    text: 'Information has been updated.',
                    showHideTransition: 'fade',
                    icon: 'success',
                    position: 'top-right'
                });
                if(data.link == 'PID'){
                    $(location).attr('href','index.php?r=' + data.role + '/View&pid=1&id=' + data.id);
                } else {
                    $(location).attr('href','index.php?r=' + data.role + '/View&id=' + data.id);
                }
            } else if(data.status == 'failure'){
                $.toast({
                    heading: 'Error',
                    text: 'Information has not been updated.',
                    showHideTransition: 'fade',
                    icon: 'error',
                    position: 'top-right'
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown){
            $.toast({
                heading: 'Error',
                text: 'Error get data Ajax.',
                showHideTransition: 'fade',
                icon: 'error',
                position: 'top-right'
            });
        }
    });
});