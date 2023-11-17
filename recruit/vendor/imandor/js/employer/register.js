$(document).ready(function() {
    $('.datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    });
    
    $('.select2-state').select2({
        width: "100%"
    });
});

$(document).on('click','#submit-employer',function() {
    if($('#form-new-employer').parsley().validate()){
        var form = $('#form-new-employer')[0];
        var formData = new FormData(form);

        $.ajax({
            url: "index.php?r=Ajax/AjaxEmployerRegister",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data){
                if(data.status == 'success'){
                    $.toast({
                        heading: 'Success',
                        text: 'New employer has been registered.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        afterShown: function () {
                            $(location).attr('href','index.php?r=Admin/Employer');
                        }
                    });
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'New employer has not been registered.',
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