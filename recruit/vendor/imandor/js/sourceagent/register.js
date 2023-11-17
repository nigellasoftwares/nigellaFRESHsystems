$(document).ready(function() {
    window.Parsley.addValidator('fileextension', {
        validateString: function(value, requirement) {
            var fileExtension = value.split('.').pop();
            return fileExtension === requirement;
        },
        messages: {
            en: 'You need to upload the jpg file format only.'
        }
    });
    
    $('.datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    });
    
    $('.select2-nationality').select2({
        width: "100%"
    });
    
    $('.select2-jobsector').select2({
        width: "100%"
    });
    
    $('.select2-marital').select2({
        width: "100%"
    });
    
    $('.select2-nextofkin').select2({
        width: "100%"
    });
    
    $('.select2-children').select2({
        width: "100%"
    });
});

$(document).on('click','#submit-applicant2',function() {
    $.toast({
        heading: 'Information',
        text: 'Now you can add icons to generate different kinds of toasts',
        showHideTransition: 'slide',
        icon: 'info',
        position: 'top-right'
    });
});

$(document).on('click','#submit-worker',function() {
    if($('#form-new-worker').parsley().validate()){
        var form = $('#form-new-worker')[0];
        var formData = new FormData(form);

        $.ajax({
            url: "index.php?r=Ajax/AjaxWorkerRegister",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data){
                if(data.status == 'success'){
                    $.toast({
                        heading: 'Success',
                        text: 'New worker has been registered.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        afterShown: function () {
                            $(location).attr('href','index.php?r=Sourceagent/Application');
                        }
                    });
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'New worker has not been registered.',
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