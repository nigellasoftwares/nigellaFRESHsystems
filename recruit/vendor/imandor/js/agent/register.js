$(document).ready(function() {
    $('.datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    });
    
    $('.select2-country').select2({
        width: "100%"
    });
});

$(document).on('click','#submit-agent',function() {
    if($('#form-new-agent').parsley().validate()){
        $.ajax({
            url: "index.php?r=Ajax/AjaxAgentRegister",
            type: "POST",
            data: $('#form-new-agent').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $.toast({
                        heading: 'Success',
                        text: 'New agent has been registered.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        afterShown: function () {
                            $(location).attr('href','index.php?r=Admin/Worker');
                        }
                    });
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'New agent has not been registered.',
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
    } else {
        console.log('Invalidated.');
    }
});