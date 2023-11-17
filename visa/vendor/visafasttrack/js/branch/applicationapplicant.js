$(document).ready(function() {
    $('.datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    });
    
    $('.select2-currentnationality').select2();
    $('.select2-formernationality').select2();
    $('.select2-passporttype').select2();
    
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

$(document).on('click','#submit-applicant',function() {
    if($('#form-new-applicant').parsley().validate()){
        var form = $('#form-new-applicant')[0];
        var formData = new FormData(form);

        $.ajax({
            url: "index.php?r=Branch/AjaxApplicantRegister",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data){
                if(data.status == 'success'){
                    $(location).attr('href','index.php?r=Branch/ApplicationApplicant2&id=' + data.id);
                    $.toast({
                        heading: 'Success',
                        text: 'New applicant has been created.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right'
                    });
    //                setTimeout(function(){
    //                    $(location).attr('href','index.php?r=Branch/Application');
    //                }, 1000);
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'New applicant has not been created.',
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
    }
});