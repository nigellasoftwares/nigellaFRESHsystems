$(document).on('click','#scan-applicant',function() {
    $.ajax({
        url: "index.php?r=Admin/AjaxQRCheck",
        type: "POST",
        data: $('#form-scan-applicant').serialize(),
        dataType: "JSON",
        success: function(data){
            $('#form-verify-applicant')[0].reset();
            
            if(data.status == 'success'){
                $.toast({
                    heading: 'Success',
                    text: 'Record found.',
                    showHideTransition: 'fade',
                    icon: 'success',
                    position: 'top-right'
                });
                
                $('.applicant-id').val(data.applicant_id);
                $('.batch_id').val(data.batch_id);
                $('.applicant-guid').val(data.guid);
                $('.fullname').val(data.fullname);
                $('.gender').val(data.gender);
                $('.dateofbirth').val(data.dateofbirth);
                $('.placeofbirth').val(data.placeofbirth);
                $('.passport_number').val(data.passport_number);
                $('.nationality').val(data.nationality);
                $('.dateofissue').val(data.dateofissue);
                $('.placeofissue').val(data.placeofissue);
                $('.dateofexpiry').val(data.dateofexpiry);
                $('.photo').html(data.photo);
                
                $('.verify-check').attr('id','');
                if(data.result_id == 2){
                    $('.verify-check').attr('id','verify-deliver');
                } else if(data.result_id == 15){
                    $('.verify-check').attr('id','verify-return');
                } else if(data.result_id == 3 || data.result_id == 16) {
                    $('.verify-check').attr('id','verify-already');
                } else {
                    $('.verify-check').attr('id','verify-notinstage');
                }
                
            } else if(data.status == 'failure'){
                $.toast({
                    heading: 'Error',
                    text: 'Record not found.',
                    showHideTransition: 'fade',
                    icon: 'error',
                    position: 'top-right'
                });
                
                $('.photo').html('<img class="image-applicant" title="Applicant" src="vendor/visafasttrack/images/no_image_available.png" height="200" />');
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

$(document).on('click','.verify-reset',function() {
    $('#form-scan-applicant')[0].reset();
    $('#form-verify-applicant')[0].reset();
    $('.photo').html('<img class="image-applicant" title="Applicant" src="vendor/visafasttrack/images/no_image_available.png" height="200" />');
});

$(document).on('click','#verify-deliver',function() {
    $.ajax({
        url: "index.php?r=Admin/AjaxApplicantVerifyDeliver",
        type: "POST",
        data: $('#form-verify-applicant').serialize(),
        dataType: "JSON",
        success: function(data){
            $('#form-verify-applicant')[0].reset();
            
            if(data.status == 'success'){
                $(location).attr('href','index.php?r=Admin/ApplicationBatch&id=' + data.id);
                $.toast({
                    heading: 'Success',
                    text: 'Passport has been verified.',
                    showHideTransition: 'fade',
                    icon: 'success',
                    position: 'top-right'
                });
            } else if(data.status == 'failure'){
                $.toast({
                    heading: 'Error',
                    text: 'Passport has not been verified.',
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

$(document).on('click','#verify-return',function() {
    $.ajax({
        url: "index.php?r=Admin/AjaxApplicantVerifyReturn",
        type: "POST",
        data: $('#form-verify-applicant').serialize(),
        dataType: "JSON",
        success: function(data){
            $('#form-verify-applicant')[0].reset();
            
            if(data.status == 'success'){
                $(location).attr('href','index.php?r=Admin/ApplicationBatch&id=' + data.id);
                $.toast({
                    heading: 'Success',
                    text: 'Passport has been verified.',
                    showHideTransition: 'fade',
                    icon: 'success',
                    position: 'top-right'
                });
            } else if(data.status == 'failure'){
                $.toast({
                    heading: 'Error',
                    text: 'Passport has not been verified.',
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

$(document).on('click','#verify-already',function() {
    $.toast({
        heading: 'Error',
        text: 'Passport has already verified.',
        showHideTransition: 'fade',
        icon: 'error',
        position: 'top-right'
    });
});

$(document).on('click','#verify-notinstage',function() {
    $.toast({
        heading: 'Error',
        text: 'Passport has not been verified. (Code 2)',
        showHideTransition: 'fade',
        icon: 'error',
        position: 'top-right'
    });
});