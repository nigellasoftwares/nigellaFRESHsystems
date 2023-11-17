$(document).ready(function() {
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
    
    $('#table-application-occupation').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: 3    
        }]
    });
    $('#table-application-family').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: 5    
        }]
    });
    $('#table-application-emergency').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: 5    
        }]
    });
    
    $('.datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    });

    $('.select2-currentnationality').select2();
    $('.select2-formernationality').select2();
    $('.select2-passporttype').select2();
    $('.select2-marital').select2({
        width: '100%'
    });
});

$(document).on('click','#submit-personal',function() {
    if($('#form-update-personal').parsley().validate()){
        $.ajax({
            url: "index.php?r=Branch/AjaxPersonalUpdate",
            type: "POST",
            data: $('#form-update-personal').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $(location).attr('href','index.php?r=Branch/ApplicationApplicant2&id=' + data.id + '#personal1');
                    $.toast({
                        heading: 'Success',
                        text: 'Personal Information has been updated.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right'
                    });
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
            url: "index.php?r=Branch/AjaxPersonal2Update",
            type: "POST",
            data: $('#form-update-personal2').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $(location).attr('href','index.php?r=Branch/ApplicationApplicant2&id=' + data.id + '#personal2');
                    $.toast({
                        heading: 'Success',
                        text: 'Personal Information 2 has been updated.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right'
                    });
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

$(document).on('click','.occupation-new',function() {
    var id = $(this).data('id');
    $('#modal-new-occupation').modal('show');
    $('#form-new-occupation').parsley().reset();
    $('#form-new-occupation')[0].reset();
    $('.applicant-id').val(id);
});

$(document).on('click','#submit-occupation-modal',function() {
    if($('#form-new-occupation').parsley().validate()){
        $.ajax({
            url: "index.php?r=Branch/AjaxOccupationRegister",
            type: "POST",
            data: $('#form-new-occupation').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $(location).attr('href','index.php?r=Branch/ApplicationApplicant2&id=' + data.id + '&tid=1');
                    $.toast({
                        heading: 'Success',
                        text: 'Occupation Information has been updated.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right'
                    });
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Occupation Information has not been updated.',
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

$(document).on('click','.family-new',function() {
    var id = $(this).data('id');
    $('#modal-new-family').modal('show');
    $('#form-new-family').parsley().reset();
    $('#form-new-family')[0].reset();
    $('.applicant-id').val(id);
});

$(document).on('click','#submit-family',function() {
    if($('#form-new-family').parsley().validate()){
        $.ajax({
            url: "index.php?r=Branch/AjaxFamilyRegister",
            type: "POST",
            data: $('#form-new-family').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $(location).attr('href','index.php?r=Branch/ApplicationApplicant2&id=' + data.id + '&tid=2');
                    $.toast({
                        heading: 'Success',
                        text: 'Family Information has been updated.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right'
                    });
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Family Information has not been updated.',
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

$(document).on('click','.emergency-new',function() {
    var id = $(this).data('id');
    $('#modal-new-emergency').modal('show');
    $('#form-new-emergency').parsley().reset();
    $('#form-new-emergency')[0].reset();
    $('.applicant-id').val(id);
});

$(document).on('click','#submit-emergency',function() {
    if($('#form-new-emergency').parsley().validate()){
        $.ajax({
            url: "index.php?r=Branch/AjaxEmergencyRegister",
            type: "POST",
            data: $('#form-new-emergency').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $(location).attr('href','index.php?r=Branch/ApplicationApplicant2&id=' + data.id + '&tid=3');
                    $.toast({
                        heading: 'Success',
                        text: 'Emergency Contact Information has been updated.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right'
                    });
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Emergency Information has not been updated.',
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

$(document).on('click','#submit-travel',function() {
    if($('#form-update-travel').parsley().validate()){
        $.ajax({
            url: "index.php?r=Branch/AjaxTravelUpdate",
            type: "POST",
            data: $('#form-update-travel').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $(location).attr('href','index.php?r=Branch/ApplicationApplicant2&id=' + data.id + '#travel');
                    $.toast({
                        heading: 'Success',
                        text: 'Travel Information has been updated.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right'
                    });
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Travel Information has not been updated.',
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

$(document).on('click','#submit-other',function() {
    if($('#form-update-other').parsley().validate()){
        $.ajax({
            url: "index.php?r=Branch/AjaxOtherUpdate",
            type: "POST",
            data: $('#form-update-other').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $(location).attr('href','index.php?r=Branch/ApplicationApplicant2&id=' + data.id + '#other');
                    $.toast({
                        heading: 'Success',
                        text: 'Other Information has been updated.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right'
                    });
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Other Information has not been updated.',
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

$(document).on('click','#submit-declare',function() {
    if($('#form-update-declare').parsley().validate()){
        $.ajax({
            url: "index.php?r=Branch/AjaxDeclareUpdate",
            type: "POST",
            data: $('#form-update-declare').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $(location).attr('href','index.php?r=Branch/ApplicationBatch&id=' + data.bid);
                    $.toast({
                        heading: 'Success',
                        text: 'Declaration has been updated.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right'
                    });
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Declaration has not been updated.',
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