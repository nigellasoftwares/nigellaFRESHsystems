$(document).ready(function() {
    window.Parsley.addValidator('fileextension', {
        validateString: function(value, requirement) {
            var fileExtension = value.split('.').pop();
            return fileExtension === requirement;
        },
        messages: {
            en: 'You need to upload the required file format only.'
        }
    });
    
    $('.datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    });
    
    $('.select2-state').select2({
        width: "100%"
    });
    
    $(".fw-required").on("keypress keyup blur",function (event) {    
        $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
     });
    
    $('.fw-required').TouchSpin({
        min: 0,
        max: 50000
    });
});

$(document).on('click','#update-employer',function() {
    var id = $('.employerid').val();
    
    if($('#form-edit-employer').parsley().validate()){
        var form = $('#form-edit-employer')[0];
        var formData = new FormData(form);

        $.ajax({
            url: "index.php?r=Ajax/AjaxEmployerInfoUpdate&id=" + id,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data){
                if(data.status == 'success'){
                    $.toast({
                        heading: 'Success',
                        text: 'Employer has been updated.',
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
                        text: 'Employer has not been updated.',
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

$(document).on('click','#submit-demandletter',function() {
    if($('#form-register-demandletter').parsley().validate()){
        var form = $('#form-register-demandletter')[0];
        var formData = new FormData(form);

        $.ajax({
            url: "index.php?r=Ajax/AjaxDemandLetterRegister",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data){
                if(data.status == 'success'){
                    $.toast({
                        heading: 'Success',
                        text: 'New demand letter has been registered.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        afterShown: function () {
                            $(location).attr('href','index.php?r=Admin/EditEmployer&id=' + data.id);
                        }
                    });
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'New demand letter has not been registered.',
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

$(document).on('click','.edit-demandletter',function() {
    var id = $(this).data('id');
    
    $('#modal-edit-demandletter').modal('show');
    $('#form-edit-demandletter')[0].reset();
    
    $.ajax({
        url: "index.php?r=Ajax/AjaxDemandLetterView&id=" + id,
        type: "GET",
        dataType: "JSON",
        context: id,
        success: function(data){
            $('form#form-edit-demandletter .fw-required').val(data.required);
            $('form#form-edit-demandletter .fw-remark').val(data.remark);
            $('form#form-edit-demandletter .demandletter-id').val(id);
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
});

$(document).on('click','#update-demandletter',function() {
    if($('#form-edit-demandletter').parsley().validate()){
        var form = $('#form-edit-demandletter')[0];
        var formData = new FormData(form);

        $.ajax({
            url: "index.php?r=Ajax/AjaxDemandLetterUpdate",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data){
                if(data.status == 'success'){
                    $.toast({
                        heading: 'Success',
                        text: 'Demand Letter has been updated.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        afterShown: function () {
                            $(location).attr('href','index.php?r=Admin/EditEmployer&id=' + data.id);
                        }
                    });
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Demand Letter has not been updated.',
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

$(document).on('click','.delete-demandletter',function() {
    var id = $(this).data('id');
    
    swal({   
        title: "Are you sure?",   
        text: "You will not be able to recover this demand letter!",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, delete it!",   
        cancelButtonText: "No, cancel please!",   
        closeOnConfirm: false,   
        closeOnCancel: false 
    }, function(isConfirm){   
        if (isConfirm) {     
            swal("Deleted!", "Your demand letter has been deleted.", "success");
            $.ajax({
                url: "index.php?r=Ajax/AjaxDemandLetterDelete&id=" + id,
                type: "GET",
                success: function(data){
                    if(data.status == 'success'){
                        $.toast({
                            heading: 'Success',
                            text: 'Demand Letter has been deleted.',
                            showHideTransition: 'fade',
                            icon: 'success',
                            position: 'top-right',
                            afterShown: function () {
                                $(location).attr('href','index.php?r=Admin/EditEmployer&id=' + data.id);
                            }
                        });
                    } else if(data.status == 'failure'){
                        $.toast({
                            heading: 'Error',
                            text: 'Demand Letter has not been deleted.',
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
            swal("Cancelled", "Your demand letter is safe.", "error");   
        } 
    });
});