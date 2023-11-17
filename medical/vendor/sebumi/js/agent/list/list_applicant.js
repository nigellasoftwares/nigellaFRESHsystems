$.prototype.enable = function () {
    $.each(this, function (index, el) {
        $(el).removeAttr('disabled');
    });
}

$.prototype.disable = function () {
    $.each(this, function (index, el) {
        $(el).attr('disabled', 'disabled');
    });
}

$(document).ready(function() {
    $('.slick-camera-applicant').slick({
        dots: true
    });

    $('.slick-camera-applicant-edit').slick({
        dots: true
    });

    $('.slick-camera-dependant-1').slick({
        dots: true
    });

    $('.slick-camera-dependant-1-edit').slick({
        dots: true
    });

    $('.slick-camera-dependant-2').slick({
        dots: true
    });

    $('.slick-camera-dependant-2-edit').slick({
        dots: true
    });

    $('.slick-camera-dependant-3').slick({
        dots: true
    });

    $('.slick-camera-dependant-3-edit').slick({
        dots: true
    });

    $('.slick-camera-dependant-4').slick({
        dots: true
    });

    $('.slick-camera-dependant-4-edit').slick({
        dots: true
    });

    $('.slick-camera-dependant-5').slick({
        dots: true
    });

    $('.slick-camera-dependant-5-edit').slick({
        dots: true
    });

    $('.scroll-content').slimscroll({
        height: '240px'
    });

    $('.table-list-applicant').DataTable({
        pageLength: 25,
        responsive: true,
        dom: 'lTfgitp'
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

$(document).on('click','.applicant-new',function() {
    $.ajax({
        url: "index.php?r=Agent/AjaxCheckBalance",
        type: "GET",
        dataType: "JSON",
        success: function(data){
            if(data.status == 'success'){
                Webcam.reset();
    
                $('#modal-new-applicant').modal('show');
                $('#form-new-applicant')[0].reset();
                $('.tab-dependant').hide();
                $(window).trigger('resize');

                $('.form-dependant-1').disable();
                $('.form-dependant-2').disable();
                $('.form-dependant-3').disable();
                $('.form-dependant-4').disable();
                $('.form-dependant-5').disable();

                Webcam.set({
                    width: 320,
                    height: 240,
                    dest_width: 640,
                            dest_height: 480,
                    image_format: 'jpeg',
                    jpeg_quality: 90
                });
                Webcam.attach('.sebumi-camera');

                $('.snapshot-take').click(function() {
                    Webcam.freeze();
                });

                $('.another-take').click(function() {
                    Webcam.unfreeze();
                });
            } else if(data.status == 'failure'){
                swal({
                    title: "Balance : RM " + data.balance,
                    text: "You have insufficient balance, please top up first before you continue to register a worker.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, top up your balance!",
                    closeOnConfirm: false
                }, function () {
                    swal("Online Top-Up!", "Thank you and please top up online.", "success");
                    $(location).attr('href','index.php?r=Agent/AccountTopupView');
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
});

$(document).on('click','.applicant-new2',function() {
    Webcam.reset();
    
    $('#modal-new-applicant').modal('show');
    $('#form-new-applicant')[0].reset();
    $('.tab-dependant').hide();
    $(window).trigger('resize');
    
    $('.form-dependant-1').disable();
    $('.form-dependant-2').disable();
    $('.form-dependant-3').disable();
    $('.form-dependant-4').disable();
    $('.form-dependant-5').disable();
    
    Webcam.set({
        width: 320,
        height: 240,
        dest_width: 640,
		dest_height: 480,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    Webcam.attach('.sebumi-camera');
    
    $('.snapshot-take').click(function() {
        Webcam.freeze();
    });
    
    $('.another-take').click(function() {
        Webcam.unfreeze();
    });
});

$(document).on('click','.tab-applicant a',function() {
    $('.slick-next').trigger('click');
    $('.slick-prev').trigger('click');
});

$(document).on('click','.tab-dependant-1 a',function() {
    $('.slick-next').trigger('click');
    $('.slick-prev').trigger('click');
});

$(document).on('click','.tab-dependant-2 a',function() {
    $('.slick-next').trigger('click');
    $('.slick-prev').trigger('click');
});

$(document).on('click','.tab-dependant-3 a',function() {
    $('.slick-next').trigger('click');
    $('.slick-prev').trigger('click');
});

$(document).on('click','.tab-dependant-4 a',function() {
    $('.slick-next').trigger('click');
    $('.slick-prev').trigger('click');
});

$(document).on('click','.tab-dependant-5 a',function() {
    $('.slick-next').trigger('click');
    $('.slick-prev').trigger('click');
});

$(document).on('click','.edit-tab-dependant-1 a',function() {
    $('.slick-next').trigger('click');
    $('.slick-prev').trigger('click');
});

$(document).on('click','.edit-tab-dependant-2 a',function() {
    $('.slick-next').trigger('click');
    $('.slick-prev').trigger('click');
});

$(document).on('click','.edit-tab-dependant-3 a',function() {
    $('.slick-next').trigger('click');
    $('.slick-prev').trigger('click');
});

$(document).on('click','.edit-tab-dependant-4 a',function() {
    $('.slick-next').trigger('click');
    $('.slick-prev').trigger('click');
});

$(document).on('click','.edit-tab-dependant-5 a',function() {
    $('.slick-next').trigger('click');
    $('.slick-prev').trigger('click');
});

$(document).on('change','.number-dependant',function() {
    var dependant = parseInt($('.number-dependant option:selected').val());
    
    $('.tab-dependant').hide();
    
    $('.form-dependant-1').disable();
    $('.form-dependant-2').disable();
    $('.form-dependant-3').disable();
    $('.form-dependant-4').disable();
    $('.form-dependant-5').disable();
    
    if(dependant == 0){
        $('.tab-dependant').hide();
        $('.tab-applicant a').trigger('click');
        
    } else {
        for(var i = 0; i < dependant; i++){
            var j = i + 1;
            $('.tab-dependant-' + j).show();
            $('.form-dependant-' + j).enable();
        }
        $('.tab-applicant a').trigger('click');
    }
});

$(document).on('click','#register-applicant',function() {
    if($('#form-new-applicant').smkValidate()){
        var form = $('#form-new-applicant')[0];
        var formData = new FormData(form);
        
        $.ajax({
            url: "index.php?r=Agent/AjaxApplicantRegister",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            /*
            data: $('#form-new-applicant').serialize(),
            dataType: "JSON",
            */
            success: function(data){
                if(data.status == 'success'){
                    $('.message-form').html(data.success_form);
                    setTimeout(function(){
                        $('.message-form').empty();
                        $('#modal-new-applicant').modal('hide');
                        $(location).attr('href','index.php?r=Agent/ListApplicant');
                    }, 1000);
                } else if(data.status == 'failure'){
                    $('.message-form').html(data.error_form);
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });
        
        console.log('No error found!');
    } else {
        console.log('Form got error!');
    }
});

$(document).on('click','.applicant-view',function() {
    var id = $(this).data('id');
    
    $('#modal-view-applicant').modal('show');
    $('#form-view-applicant')[0].reset();
    $('.view-list-dependant').empty();
    $('.applicant-gallery').empty();
    
    $.ajax({
        url: "index.php?r=Agent/AjaxApplicantView&id=" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('.clinic-doctor').val(data.clinic_doctor);
            
            $('.applicant-guid').val(data.applicant_guid);
            $('.applicant-given-name').val(data.applicant_given_name);
            $('.applicant-middle-name').val(data.applicant_middle_name);
            $('.applicant-last-name').val(data.applicant_last_name);
            $('.applicant-birth-date').val(data.applicant_birth_date);
            $('.applicant-gender').val(data.applicant_gender);
            $('.applicant-nationality').val(data.applicant_nationality);
            $('.applicant-job').val(data.applicant_job);
            $('.applicant-address1').val(data.applicant_address1);
            $('.applicant-address2').val(data.applicant_address2);
            $('.applicant-address3').val(data.applicant_address3);
            $('.applicant-district').val(data.applicant_district);
            $('.applicant-contact-number').val(data.applicant_contact_number);
            
            $('.employer-name').val(data.employer_name);
            $('.employer-address1').val(data.employer_address1);
            $('.employer-address2').val(data.employer_address2);
            $('.employer-address3').val(data.employer_address3);
            $('.employer-district').val(data.employer_district);
            $('.employer-contact-number').val(data.employer_contact_number);
            
            $('.applicant-passport-number').val(data.applicant_passport_number);
            $('.applicant-passport-status').val(data.applicant_passport_status);
            $('.applicant-passport-issuedate').val(data.applicant_passport_issuedate);
            $('.applicant-passport-expirydate').val(data.applicant_passport_expirydate);
            $('.applicant-passport-issueplace').val(data.applicant_passport_issueplace);
            $('.applicant-passport-entrypoint').val(data.applicant_passport_entrypoint);
            
            $('.applicant-plks-number').val(data.applicant_plks_number);
            $('.applicant-bpa-number').val(data.applicant_bpa_number);
            $('.applicant-plks-issuedate').val(data.applicant_plks_issuedate);
            $('.applicant-plks-expirydate').val(data.applicant_plks_expirydate);
            
            $('.nextofkin-given-name').val(data.nextofkin_given_name);
            $('.nextofkin-middle-name').val(data.nextofkin_middle_name);
            $('.nextofkin-last-name').val(data.nextofkin_last_name);
            $('.nextofkin-birth-date').val(data.nextofkin_birth_date);
            $('.nextofkin-gender').val(data.nextofkin_gender);
            $('.nextofkin-nationality').val(data.nextofkin_nationality);
            $('.nextofkin-relation').val(data.nextofkin_relation);
            
            $('.nextofkin-address1').val(data.nextofkin_address1);
            $('.nextofkin-address2').val(data.nextofkin_address2);
            $('.nextofkin-address3').val(data.nextofkin_address3);
            $('.nextofkin-district').val(data.nextofkin_district);
            $('.nextofkin-contact-number').val(data.nextofkin_contact_number);
            
            $('.applicant-gallery').html(data.applicant_gallery);
            
            $('.applicant-photo-zoom').elevateZoom();
            $('.applicant-passport-zoom').elevateZoom();
            $('.applicant-birth-zoom').elevateZoom();
            $('.applicant-national-zoom').elevateZoom();
            $('.applicant-marriage-zoom').elevateZoom();
            //$('.applicant-imm13-zoom').elevateZoom();
            $('.applicant-other-zoom').elevateZoom();
            
            
            var dependant = parseInt(data.count_dependant);
            $('.view-tab-dependant').remove();
            
            if(dependant > 0){
                for (var i = 0; i < dependant; i++) { 
                    var j = i + 1; 
                    var tab_dependant = '' +
                        '<li class="view-tab-dependant view-tab-dependant-' + j + '">' +
                            '<a data-toggle="tab" href="#view-pane-dependant-' + j + '">' +
                                'Next Of Kin <span class="label label-warning">' + j + '</span>' +
                            '</a>' +
                        '</li>';
                    $('.view-nav').append(tab_dependant);
                    
                    $('.dependant-' + j + '-guid').val(data.dependant[i].dependant_guid);
                    $('.dependant-' + j + '-given-name').val(data.dependant[i].dependant_given_name);
                    $('.dependant-' + j + '-middle-name').val(data.dependant[i].dependant_middle_name);
                    $('.dependant-' + j + '-last-name').val(data.dependant[i].dependant_last_name);
                    $('.dependant-' + j + '-birth-date').val(data.dependant[i].dependant_birth_date);
                    $('.dependant-' + j + '-gender').val(data.dependant[i].dependant_gender);
                    $('.dependant-' + j + '-nationality').val(data.dependant[i].dependant_nationality);
                    $('.dependant-' + j + '-address1').val(data.dependant[i].dependant_address1);
                    $('.dependant-' + j + '-address2').val(data.dependant[i].dependant_address2);
                    $('.dependant-' + j + '-address3').val(data.dependant[i].dependant_address3);
                    $('.dependant-' + j + '-district').val(data.dependant[i].dependant_district);
                    $('.dependant-' + j + '-contact-number').val(data.dependant[i].dependant_contact_number);
                    $('.dependant-' + j + '-relation').val(data.dependant[i].dependant_relation);
                    
                    $('.dependant-' + j + '-passport-number').val(data.dependant[i].dependant_passport_number);
                    $('.dependant-' + j + '-passport-status').val(data.dependant[i].dependant_passport_status);
                    $('.dependant-' + j + '-passport-issuedate').val(data.dependant[i].dependant_passport_issuedate);
                    $('.dependant-' + j + '-passport-expirydate').val(data.dependant[i].dependant_passport_expirydate);
                    $('.dependant-' + j + '-passport-issueplace').val(data.dependant[i].dependant_passport_issueplace);
                    $('.dependant-' + j + '-passport-entrypoint').val(data.dependant[i].dependant_passport_entrypoint);
                    
                    $('.dependant-' + j + '-gallery').html(data.dependant[i].dependant_gallery);
                    
                    $('.dependant-' + j + '-photo-zoom').elevateZoom();
                    $('.dependant-' + j + '-passport-zoom').elevateZoom();
                    $('.dependant-' + j + '-birth-zoom').elevateZoom();
                    $('.dependant-' + j + '-marriage-zoom').elevateZoom();
                    $('.dependant-' + j + '-imm13-zoom').elevateZoom();
                    $('.dependant-' + j + '-other-zoom').elevateZoom();
                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
});

$(document).on('click','.applicant-edit',function() {
    var id = $(this).data('id');
    Webcam.reset();
    
    $('#modal-edit-applicant').modal('show');
    $('#form-edit-applicant')[0].reset();
    $('.edit-list-dependant').empty();
    $(window).trigger('resize');
    
    $('.slick-next').trigger('click');
    $('.slick-prev').trigger('click');
    
    $('.form-edit-dependant-1').disable();
    $('.form-edit-dependant-2').disable();
    $('.form-edit-dependant-3').disable();
    $('.form-edit-dependant-4').disable();
    $('.form-edit-dependant-5').disable();
    
    Webcam.set({
        width: 320,
        height: 240,
        dest_width: 640,
	dest_height: 480,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    
    Webcam.attach('.sebumi-camera-edit');
    
    $('.snapshot-take-edit').click(function() {
        Webcam.freeze();
    });
    
    $('.another-take-edit').click(function() {
        Webcam.unfreeze();
    });
    
    $.ajax({
        url: "index.php?r=Agent/AjaxApplicantEdit&id=" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('.clinic-doctor').val(data.clinic_doctor);
            
            $('.applicant-guid').val(data.applicant_guid);
            $('.applicant-guid2').val(data.applicant_guid);
            $('.applicant-given-name').val(data.applicant_given_name);
            $('.applicant-middle-name').val(data.applicant_middle_name);
            $('.applicant-last-name').val(data.applicant_last_name);
            $('.applicant-birth-date').val(data.applicant_birth_date);
            $('.applicant-gender').val(data.applicant_gender);
            $('.applicant-nationality').val(data.applicant_nationality);
            $('.applicant-job').val(data.applicant_job);
            $('.applicant-address1').val(data.applicant_address1);
            $('.applicant-address2').val(data.applicant_address2);
            $('.applicant-address3').val(data.applicant_address3);
            $('.applicant-district').val(data.applicant_district);
            $('.applicant-contact-number').val(data.applicant_contact_number);
            
            $('.employer-name').val(data.employer_name);
            $('.employer-address1').val(data.employer_address1);
            $('.employer-address2').val(data.employer_address2);
            $('.employer-address3').val(data.employer_address3);
            $('.employer-district').val(data.employer_district);
            $('.employer-contact-number').val(data.employer_contact_number);
            
            $('.applicant-passport-number').val(data.applicant_passport_number);
            $('.applicant-passport-status').val(data.applicant_passport_status);
            $('.applicant-passport-issuedate').val(data.applicant_passport_issuedate);
            $('.applicant-passport-expirydate').val(data.applicant_passport_expirydate);
            $('.applicant-passport-issueplace').val(data.applicant_passport_issueplace);
            $('.applicant-passport-entrypoint').val(data.applicant_passport_entrypoint);
            
            $('.applicant-plks-number').val(data.applicant_plks_number);
            $('.applicant-bpa-number').val(data.applicant_bpa_number);
            $('.applicant-plks-issuedate').val(data.applicant_plks_issuedate);
            $('.applicant-plks-expirydate').val(data.applicant_plks_expirydate);
            
            $('.nextofkin-given-name').val(data.nextofkin_given_name);
            $('.nextofkin-middle-name').val(data.nextofkin_middle_name);
            $('.nextofkin-last-name').val(data.nextofkin_last_name);
            $('.nextofkin-birth-date').val(data.nextofkin_birth_date);
            $('.nextofkin-gender').val(data.nextofkin_gender);
            $('.nextofkin-nationality').val(data.nextofkin_nationality);
            $('.nextofkin-relation').val(data.nextofkin_relation);
            
            $('.nextofkin-address1').val(data.nextofkin_address1);
            $('.nextofkin-address2').val(data.nextofkin_address2);
            $('.nextofkin-address3').val(data.nextofkin_address3);
            $('.nextofkin-district').val(data.nextofkin_district);
            $('.nextofkin-contact-number').val(data.nextofkin_contact_number);
            
            $('.snap-applicant-edit-photo').html(data.applicant_edit_photo);
            $('.snap-applicant-edit-passport').html(data.applicant_edit_passport);
            $('.snap-applicant-edit-birth').html(data.applicant_edit_birth);
            $('.snap-applicant-edit-national').html(data.applicant_edit_national);
            $('.snap-applicant-edit-marriage').html(data.applicant_edit_marriage);
            //$('.snap-applicant-edit-imm13').html(data.applicant_edit_imm13);
            $('.snap-applicant-edit-other').html(data.applicant_edit_other);
            
            var dependant = parseInt(data.count_dependant);
            $('.edit-tab-dependant').remove();
            
            if(dependant > 0){
                for (var i = 0; i < dependant; i++) { 
                    var j = i + 1; 
                    var tab_dependant = '' +
                        '<li class="edit-tab-dependant edit-tab-dependant-' + j + '">' +
                            '<a data-toggle="tab" href="#edit-pane-dependant-' + j + '">' +
                                'Next Of Kin <span class="label label-warning">' + j + '</span>' +
                            '</a>' +
                        '</li>';
                    $('.edit-nav').append(tab_dependant);
                    $('.form-edit-dependant-' + j).enable();
                    
                    $('.dependant-' + j + '-guid').val(data.dependant[i].dependant_guid);
                    $('.dependant-' + j + '-guid2').val(data.dependant[i].dependant_guid);
                    $('.dependant-' + j + '-given-name').val(data.dependant[i].dependant_given_name);
                    $('.dependant-' + j + '-middle-name').val(data.dependant[i].dependant_middle_name);
                    $('.dependant-' + j + '-last-name').val(data.dependant[i].dependant_last_name);
                    $('.dependant-' + j + '-birth-date').val(data.dependant[i].dependant_birth_date);
                    $('.dependant-' + j + '-gender').val(data.dependant[i].dependant_gender);
                    $('.dependant-' + j + '-nationality').val(data.dependant[i].dependant_nationality);
                    $('.dependant-' + j + '-address1').val(data.dependant[i].dependant_address1);
                    $('.dependant-' + j + '-address2').val(data.dependant[i].dependant_address2);
                    $('.dependant-' + j + '-address3').val(data.dependant[i].dependant_address3);
                    $('.dependant-' + j + '-district').val(data.dependant[i].dependant_district);
                    $('.dependant-' + j + '-contact-number').val(data.dependant[i].dependant_contact_number);
                    $('.dependant-' + j + '-relation').val(data.dependant[i].dependant_relation);
                    
                    $('.dependant-' + j + '-passport-number').val(data.dependant[i].dependant_passport_number);
                    $('.dependant-' + j + '-passport-status').val(data.dependant[i].dependant_passport_status);
                    $('.dependant-' + j + '-passport-issuedate').val(data.dependant[i].dependant_passport_issuedate);
                    $('.dependant-' + j + '-passport-expirydate').val(data.dependant[i].dependant_passport_expirydate);
                    $('.dependant-' + j + '-passport-issueplace').val(data.dependant[i].dependant_passport_issueplace);
                    $('.dependant-' + j + '-passport-entrypoint').val(data.dependant[i].dependant_passport_entrypoint);
                    $('.snap-dependant-' + j + '-edit-photo').html(data.dependant[i].dependant_edit_photo);
                    $('.snap-dependant-' + j + '-edit-passport').html(data.dependant[i].dependant_edit_passport);
                    $('.snap-dependant-' + j + '-edit-birth').html(data.dependant[i].dependant_edit_birth);
                    $('.snap-dependant-' + j + '-edit-marriage').html(data.dependant[i].dependant_edit_marriage);
                    $('.snap-dependant-' + j + '-edit-imm13').html(data.dependant[i].dependant_edit_imm13);
                    $('.snap-dependant-' + j + '-edit-other').html(data.dependant[i].dependant_edit_other);
                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
});

$(document).on('click','#update-applicant',function() {
    if($('#form-edit-applicant').smkValidate()){
        var form = $('#form-edit-applicant')[0];
        var formData = new FormData(form);
        
        $.ajax({
            url: "index.php?r=Agent/AjaxApplicantUpdate",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            /*
            data: $('#form-edit-applicant').serialize(),
            dataType: "JSON",
            */
            success: function(data){
                if(data.status == 'success'){
                    $('.message-form').html(data.success_form);
                    setTimeout(function(){
                        $('.message-form').empty();
                        $('#modal-edit-applicant').modal('hide');
                        $(location).attr('href','index.php?r=Agent/ListApplicant');
                    }, 1000);
                } else if(data.status == 'failure'){
                    $('.message-form').html(data.error_form);
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });
        
        console.log('No error found!');
    } else {
        console.log('Form got error!');
    }
});

$(document).on('click','.applicant-delete',function() {
    var id = $(this).data('id');
    
    $('#modal-delete-applicant').modal('show');
    $('#form-delete-applicant')[0].reset();
    $('.delete-list-dependant').empty();
    $('.applicant-gallery').empty();
    
    $.ajax({
        url: "index.php?r=Agent/AjaxApplicantView&id=" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('.applicant-guid').val(data.applicant_guid);
            $('.applicant-guid2').val(data.applicant_guid);
            $('.applicant-given-name').val(data.applicant_given_name);
            $('.applicant-middle-name').val(data.applicant_middle_name);
            $('.applicant-last-name').val(data.applicant_last_name);
            $('.applicant-birth-date').val(data.applicant_birth_date);
            $('.applicant-gender').val(data.applicant_gender);
            $('.applicant-nationality').val(data.applicant_nationality);
            $('.applicant-job').val(data.applicant_job);
            $('.applicant-address1').val(data.applicant_address1);
            $('.applicant-address2').val(data.applicant_address2);
            $('.applicant-address3').val(data.applicant_address3);
            $('.applicant-district').val(data.applicant_district);
            $('.applicant-contact-number').val(data.applicant_contact_number);
            
            $('.applicant-gallery').html(data.applicant_gallery);
            
            $('.applicant-photo-zoom').elevateZoom();
            $('.applicant-passport-zoom').elevateZoom();
            $('.applicant-birth-zoom').elevateZoom();
            $('.applicant-marriage-zoom').elevateZoom();
            $('.applicant-imm13-zoom').elevateZoom();
            $('.applicant-other-zoom').elevateZoom();
            
            
            var dependant = parseInt(data.count_dependant);
            $('.delete-tab-dependant').remove();
            
            if(dependant > 0){
                for (var i = 0; i < dependant; i++) { 
                    var j = i + 1; 
                    var tab_dependant = '' +
                        '<li class="delete-tab-dependant delete-tab-dependant-' + j + '">' +
                            '<a data-toggle="tab" href="#delete-pane-dependant-' + j + '">' +
                                'Next Of Kin <span class="label label-warning">' + j + '</span>' +
                            '</a>' +
                        '</li>';
                    $('.delete-nav').append(tab_dependant);
                    
                    $('.dependant-' + j + '-guid').val(data.dependant[i].dependant_guid);
                    $('.dependant-' + j + '-given-name').val(data.dependant[i].dependant_given_name);
                    $('.dependant-' + j + '-middle-name').val(data.dependant[i].dependant_middle_name);
                    $('.dependant-' + j + '-last-name').val(data.dependant[i].dependant_last_name);
                    $('.dependant-' + j + '-birth-date').val(data.dependant[i].dependant_birth_date);
                    $('.dependant-' + j + '-gender').val(data.dependant[i].dependant_gender);
                    $('.dependant-' + j + '-nationality').val(data.dependant[i].dependant_nationality);
                    $('.dependant-' + j + '-address1').val(data.dependant[i].dependant_address1);
                    $('.dependant-' + j + '-address2').val(data.dependant[i].dependant_address2);
                    $('.dependant-' + j + '-address3').val(data.dependant[i].dependant_address3);
                    $('.dependant-' + j + '-district').val(data.dependant[i].dependant_district);
                    $('.dependant-' + j + '-contact-number').val(data.dependant[i].dependant_contact_number);
                    $('.dependant-' + j + '-relation').val(data.dependant[i].dependant_relation);
                    
                    $('.dependant-' + j + '-gallery').html(data.dependant[i].dependant_gallery);
                    
                    $('.dependant-' + j + '-photo-zoom').elevateZoom();
                    $('.dependant-' + j + '-passport-zoom').elevateZoom();
                    $('.dependant-' + j + '-birth-zoom').elevateZoom();
                    $('.dependant-' + j + '-marriage-zoom').elevateZoom();
                    $('.dependant-' + j + '-imm13-zoom').elevateZoom();
                    $('.dependant-' + j + '-other-zoom').elevateZoom();
                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
});

$(document).on('click','#delete-applicant',function() {
    $.ajax({
        url: "index.php?r=Agent/AjaxApplicantDelete",
        type: "POST",
        data: $('#form-delete-applicant').serialize(),
        dataType: "JSON",
        success: function(data){
            if(data.status == 'success'){
                $('.message-form').html(data.success_form);
                setTimeout(function(){
                    $('.message-form').empty();
                    $('#modal-delete-applicant').modal('hide');
                    $(location).attr('href','index.php?r=Agent/ListApplicant');
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