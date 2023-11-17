$(document).ready(function() {
    $('.slick-camera-applicant').slick({
        dots: true
    });
    
    $('.slick-camera-dependant-1, .slick-camera-dependant-2, .slick-camera-dependant-3, .slick-camera-dependant-4, .slick-camera-dependant-5').slick({
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
    
    $('.chosen-gender').chosen({
        width: "100%"
    });
    
    $('.chosen-nationality').chosen({
        width: "100%"
    });
    
    $('.chosen-district').chosen({
        width: "100%"
    });
    
    $('.chosen-job').chosen({
        width: "100%"
    });
    
    $('.chosen-relation').chosen({
        width: "100%"
    });
    
    $('.chosen-passport').chosen({
        width: "100%"
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
    $('#modal-new-applicant').modal('show');
    $('#form-new-applicant')[0].reset();
    $('.tab-dependant').hide();
    $(window).trigger('resize');
    
    $('.form-dependant-1').empty();
    $('.form-dependant-2').empty();
    $('.form-dependant-3').empty();
    $('.form-dependant-4').empty();
    $('.form-dependant-5').empty();
    
    var parsleyOptions = {
        errors: {
            container: function (elem){
                if($( elem ).is('select')){
                    return $(elem).parent();
                } else if($(elem).is('[type=text]')){
                    return $(elem).parent();   
                }    
                return $(elem);
            }
        },
        trigger: 'change',
        successClass: 'has-success',
        errorClass: 'has-parsley-error'
    };
    
    $('#form-new-applicant').parsley( parsleyOptions );
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

$(document).on('click','#register-applicant',function() {
    if($('#form-new-applicant').parsley().validate()){
        /*
        var form = $('#form-new-applicant')[0];
        var formData = new FormData(form);
        
        $.ajax({
            url: "index.php?r=Agent/AjaxApplicantRegister",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            //data: $('#form-new-applicant').serialize(),
            //dataType: "JSON",
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
        */
        console.log('No error found!');
    } else {
        console.log('Form got error!');
    }
});

$(document).on('change','.number-dependant',function() {
    var dependant = parseInt($('.number-dependant option:selected').val());
    $('.tab-dependant').hide();
    
    $('.form-dependant-1').empty();
    $('.form-dependant-2').empty();
    $('.form-dependant-3').empty();
    $('.form-dependant-4').empty();
    $('.form-dependant-5').empty();
    
    if(dependant == 0){
        $('.tab-dependant').hide();
        $('.tab-applicant a').trigger('click');
        
    } else {
        for (var i = 0; i < dependant; i++) {
            var j = i + 1;
            var form_dependant = '' +
                '<div class="row">' +
                    '<div class="col-md-12">' +
                        '<span class="label label-primary2">Personal</span>' +
                    '</div>' +
                    '<div class="hr-line-solid"></div>' +
                '</div>' +
                '<div class="row">' +
                    '<div class="col-md-4">' +
                        '<div class="form-group">' +
                            '<label><strong>Given Name</strong> <i class="fa fa-asterisk text-danger"></i></label>' +
                            '<input type="text" name="r_dependant_given_name[' + j + ']" class="form-control" placeholder="Given Name" data-required="true" />' +
                        '</div>' +
                    '</div>' +
                    '<div class="col-md-4">' +
                        '<div class="form-group">' +
                            '<label><strong>Middle Name</strong></label>' +
                            '<input type="text" name="r_dependant_middle_name[' + j + ']" class="form-control" placeholder="Middle Name" />' +
                        '</div>' +
                    '</div>' +
                    '<div class="col-md-4">' +
                        '<div class="form-group">' +
                            '<label><strong>Last Name</strong> <i class="fa fa-asterisk text-danger"></i></label>' +
                            '<input type="text" name="r_dependant_last_name[' + j + ']" class="form-control" placeholder="Last Name" data-required="true" />' +
                        '</div>' +
                    '</div>' +
                '</div>';
            $('.form-dependant-' + j).append(form_dependant);
            $('.tab-dependant-' + j).show();
        }
        
        $('.tab-applicant a').trigger('click');
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
            
            $('.applicant-gallery').html(data.applicant_gallery);
            
            var dependant = parseInt(data.count_dependant);
            
            if(dependant > 0){
                for (var i = 0; i < dependant; i++) { 
                    var j = i + 1; 
                    var form_dependant = '' +
                        '<div class="row">' +
                            '<h2>Dependant ' + j + '</h2>' +
                        '</div>' +
                        '<div class="hr-line-dashed">' +
                            '<span class="label label-primary pull-right">Dependant ' + j + '</span>' +
                        '</div>' +
                        '<div class="row">' +
                            '<div class="col-md-12">' +
                                '<div class="form-group">' +
                                    '<label><strong>ID</strong> <i class="fa fa-asterisk text-danger"></i></label>' +
                                    '<input type="text" name="r_dependant_id" class="form-control" placeholder="ID" value="' + data.dependant[i]['dependant_guid'] + '" disabled="true" />' +
                                '</div>' +
                            '</div>' +
                            '<div class="col-md-4">' +
                                '<div class="form-group">' +
                                    '<label><strong>Given Name</strong> <i class="fa fa-asterisk text-danger"></i></label>' +
                                    '<input type="text" name="r_dependant_given_name" class="form-control" placeholder="Given Name" value="' + data.dependant[i]['dependant_given_name'] + '" disabled="true" />' +
                                '</div>' +
                            '</div>' +
                            '<div class="col-md-4">' +
                                '<div class="form-group">' +
                                    '<label><strong>Middle Name</strong></label>' +
                                    '<input type="text" name="r_dependant_middle_name" class="form-control" placeholder="Middle Name" value="' + data.dependant[i]['dependant_middle_name'] + '" disabled="true" />' +
                                '</div>' +
                            '</div>' +
                            '<div class="col-md-4">' +
                                '<div class="form-group">' +
                                    '<label><strong>Last Name</strong> <i class="fa fa-asterisk text-danger"></i></label>' +
                                    '<input type="text" name="r_dependant_last_name" class="form-control" placeholder="Last Name" value="' + data.dependant[i]['dependant_last_name'] + '" disabled="true" />' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                        '<div class="row">' +
                            '<div class="col-md-4">' +
                                '<div class="form-group">' +
                                    '<label><strong>Address (Line 1)</strong> <i class="fa fa-asterisk text-danger"></i></label>' +
                                    '<input type="text" name="r_dependant_address1" class="form-control" placeholder="Address (Line 1)" value="' + data.dependant[i]['dependant_address1'] + '" disabled="true" />' +
                                '</div>' +
                            '</div>' +
                            '<div class="col-md-4">' +
                                '<div class="form-group">' +
                                    '<label><strong>Date Of Birth</strong> <i class="fa fa-asterisk text-danger"></i></label>' +
                                    '<div class="input-group date">' +
                                        '<span class="input-group-addon"><i class="fa fa-calendar"></i></span>' +
                                        '<input type="text" name="r_dependant_birth_date" class="form-control" placeholder="Date Of Birth" value="' + data.dependant[i]['dependant_birth_date'] + '" disabled="true" />' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                            '<div class="col-md-4">' +
                                '<div class="form-group">' +
                                    '<label><strong>Gender</strong> <i class="fa fa-asterisk text-danger"></i></label>' +
                                    '<input type="text" name="r_dependant_gender" class="form-control" placeholder="Gender" value="' + data.dependant[i]['dependant_gender'] + '" disabled="true" />' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                        '<div class="row">' +
                            '<div class="col-md-4">' +
                                '<div class="form-group">' +
                                    '<label><strong>Address (Line 2)</strong></label>' +
                                    '<input type="text" name="r_dependant_address2" class="form-control" placeholder="Address (Line 2)" value="' + data.dependant[i]['dependant_address2'] + '" disabled="true" />' +
                                '</div>' +
                            '</div>' +
                            '<div class="col-md-4">' +
                                '<div class="form-group">' +
                                    '<label><strong>Nationality</strong> <i class="fa fa-asterisk text-danger"></i></label>' +
                                    '<input type="text" name="r_dependant_nationality" class="form-control" placeholder="Nationality" value="' + data.dependant[i]['dependant_nationality'] + '" disabled="true" />' +
                                '</div>' +
                            '</div>' +
                            '<div class="col-md-4">' +
                                '<div class="form-group">' +
                                    '<label><strong>Contact Number</strong></label>' +
                                    '<input type="text" name="r_dependant_contact" class="form-control" placeholder="Contact Number" value="' + data.dependant[i]['dependant_contact_number'] + '" disabled="true" />' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                        '<div class="row">' +
                            '<div class="col-md-4">' +
                                '<div class="form-group">' +
                                    '<label><strong>Address (Line 3)</strong></label>' +
                                    '<input type="text" name="r_dependant_address3" class="form-control" placeholder="Address (Line 3)" value="' + data.dependant[i]['dependant_address3'] + '" disabled="true" />' +
                                '</div>' +
                            '</div>' +
                            '<div class="col-md-4">' +
                                '<div class="form-group">' +
                                    '<label><strong>District</strong> <i class="fa fa-asterisk text-danger"></i></label>' +
                                    '<input type="text" name="r_dependant_district" class="form-control" placeholder="District" value="' + data.dependant[i]['dependant_district'] + '" disabled="true" />' +
                                '</div>' +
                            '</div>' +
                            '<div class="col-md-4">' +
                                '<div class="form-group">' +
                                    '<label><strong>Relation</strong> <i class="fa fa-asterisk text-danger"></i></label>' +
                                    '<input type="text" name="r_dependant_relation" class="form-control" placeholder="Relation" value="' + data.dependant[i]['dependant_relation'] + '" disabled="true" />' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                        '<div class="hr-line-dashed">' +
                            '<span class="label label-primary pull-right">Passport Dependant ' + j + '</span>' +
                        '</div>' +
                        '<div class="row">' +
                            '<div class="col-md-6">' +
                                '<div class="form-group">' +
                                    '<label><strong>Passport Number</strong></label>' +
                                    '<input type="text" name="r_dependant_passport_number" class="form-control" placeholder="Passport Number" value="' + data.dependant[i]['dependant_passport_number'] + '" disabled="true" />' +
                                '</div>' +
                            '</div>' +
                            '<div class="col-md-6">' +
                                '<div class="form-group">' +
                                    '<label><strong>Passport Status</strong></label>' +
                                    '<input type="text" name="r_dependant_passport_status" class="form-control" placeholder="Passport Status" value="' + data.dependant[i]['dependant_passport_status'] + '" disabled="true" />' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                        '<div class="row">' +
                            '<div class="col-md-6">' +
                                '<div class="form-group">' +
                                    '<label><strong>Passport Issue Date</strong></label>' +
                                    '<div class="input-group date">' +
                                        '<span class="input-group-addon"><i class="fa fa-calendar"></i></span>' +
                                        '<input type="text" name="r_dependant_passport_issuedate" class="form-control" placeholder="Passport Issue Date" value="' + data.dependant[i]['dependant_passport_issuedate'] + '" disabled="true" />' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                            '<div class="col-md-6">' +
                                '<div class="form-group">' +
                                    '<label><strong>Passport Expiry Date</strong></label>' +
                                    '<div class="input-group date">' +
                                        '<span class="input-group-addon"><i class="fa fa-calendar"></i></span>' +
                                        '<input type="text" name="r_dependant_passport_expirydate" class="form-control" placeholder="Passport Expiry Date" value="' + data.dependant[i]['dependant_passport_expirydate'] + '" disabled="true" />' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                        '<div class="row">' +
                            '<div class="col-md-6">' +
                                '<div class="form-group">' +
                                    '<label><strong>Passport Issue Place</strong></label>' +
                                    '<input type="text" name="r_dependant_passport_issueplace" class="form-control" placeholder="Passport Issue Place" value="' + data.dependant[i]['dependant_passport_issueplace'] + '" disabled="true" />' +
                                '</div>' +
                            '</div>' +
                            '<div class="col-md-6">' +
                                '<div class="form-group">' +
                                    '<label><strong>Passport Entry Point</strong></label>' +
                                    '<input type="text" name="r_dependant_passport_entrypoint" class="form-control" placeholder="Passport Entry Point" value="' + data.dependant[i]['dependant_passport_entrypoint'] + '" disabled="true" />' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                        '<div class="hr-line-dashed">' +
                            '<span class="label label-primary pull-right">Document Dependant ' + j + '</span>' +
                        '</div>' +
                        '<div class="row">' +
                            '<div class="col-md-12">' +
                                '<div class="lightBoxGallery">' +
                                    '<a href="uploads/photos/' + data.dependant[i]['dependant_guid'] + '.jpg" title="Photo" data-gallery=""><img src="uploads/photos/' + data.dependant[i]['dependant_guid'] + '.jpg" height="100" width="100"></a>' +
                                    '<a href="uploads/passports/' + data.dependant[i]['dependant_guid'] + '.jpg" title="Passport" data-gallery=""><img src="uploads/passports/' + data.dependant[i]['dependant_guid'] + '.jpg" height="100" width="100"></a>' +
                                    '<a href="uploads/births/' + data.dependant[i]['dependant_guid'] + '.jpg" title="Birth Certificate" data-gallery=""><img src="uploads/births/' + data.dependant[i]['dependant_guid'] + '.jpg" height="100" width="100"></a>' +
                                    '<a href="uploads/marriages/' + data.dependant[i]['dependant_guid'] + '.jpg" title="Marriage Certificate" data-gallery=""><img src="uploads/marriages/' + data.dependant[i]['dependant_guid'] + '.jpg" height="100" width="100"></a>' +
                                    '<a href="uploads/imm13s/' + data.dependant[i]['dependant_guid'] + '.jpg" title="IMM13" data-gallery=""><img src="uploads/imm13s/' + data.dependant[i]['dependant_guid'] + '.jpg" height="100" width="100"></a>' +
                                    '<a href="uploads/others/' + data.dependant[i]['dependant_guid'] + '.jpg" title="Other Document" data-gallery=""><img src="uploads/others/' + data.dependant[i]['dependant_guid'] + '.jpg" height="100" width="100"></a>' +
                                '</div>' +
                                
                                '<div id="blueimp-gallery" class="blueimp-gallery">' +
                                    '<div class="slides"></div>' +
                                    '<h3 class="title"></h3>' +
                                    '<a class="prev">‹</a>' +
                                    '<a class="next">›</a>' +
                                    '<a class="close">×</a>' +
                                    '<a class="play-pause"></a>' +
                                    '<ol class="indicator"></ol>' +
                                '</div>' +
                            '</div>' +
                        '</div>';
                    $('.view-list-dependant').append(form_dependant);
                }        
            } else {
                $('.view-list-dependant').empty();
            }
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
});

$(document).ready(function() {
    var parsleyOptions = {
        errors: {
            container: function (elem){
                if($( elem ).is('select')){
                    return $(elem).parent();
                } else if($(elem).is('[type=text]')){
                    return $(elem).parent();   
                }    
                return $(elem);
            }
        },
        trigger: 'change',
        successClass: 'has-success',
        errorClass: 'has-parsley-error'
    };
    
    $('#form-new-applicant').parsley( parsleyOptions );
});    