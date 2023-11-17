$(document).ready(function() {
    /*
    var url = $(location).attr('href');
    var segments = url.split( '=' );
    var tid = segments[3];
    
    if(tid != undefined){
        if(tid == 1){
            $('a[href*="#occupation"]').trigger('click');
        } else if(tid == 2){
            $('a[href*="#family"]').trigger('click');
        } else if(tid == 3){
            $('a[href*="#emergency"]').trigger('click');
        }
    }
    */
   
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
        width: '100%'
    });
    
    $('.select2-jobsector').select2({
        width: '100%'
    });
    
    $('.select2-marital').select2({
        width: '100%'
    });
    
    $('.select2-nextofkin').select2({
        width: '100%'
    });
    
    $('.select2-children').select2({
        width: '100%'
    });
});

$(document).on('click','#submit-personal',function() {
    if($('#form-update-personal').parsley().validate()){
        var form = $('#form-update-personal')[0];
        var formData = new FormData(form);
        
        $.ajax({
            url: "index.php?r=Ajax/AjaxPersonalUpdate",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data){
                if(data.status == 'success'){
                    $.toast({
                        heading: 'Success',
                        text: 'Personal Information has been updated.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        afterShown: function () {
                            location.reload();
                        }
                    });
                    //$(location).attr('href','index.php?r=' + data.role + '/Edit&id=' + data.id + '#personal1');
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Personal Information has not been updated.',
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

$(document).on('click','#submit-personal2',function() {
    if($('#form-update-personal2').parsley().validate()){
        $.ajax({
            url: "index.php?r=Ajax/AjaxPersonal2Update",
            type: "POST",
            data: $('#form-update-personal2').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $.toast({
                        heading: 'Success',
                        text: 'Personal Information 2 has been updated.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        afterShown: function () {
                            location.reload();
                        }
                    });
                    //$(location).attr('href','index.php?r=' + data.role + '/Edit&id=' + data.id + '#personal2');
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Personal Information 2 has not been updated.',
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