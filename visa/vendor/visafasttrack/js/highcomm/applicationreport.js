$(document).ready(function() {
    $('#table-application-report').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [2,3,4,5,6,7,8,9,10,11,12,13,14]
            //targets: [2,3,4,5,6,7,8,9,10,11,12,13,14,15]    
        }]
    });
});

$(document).on('click','.visa-view',function() {
    var id = $(this).data('id');
    $('#modal-view-visa').modal('show');
    $('#form-view-visa')[0].reset();
    $('.photo').html('');
    $('.fullname').html('');
    $('.guid').html('');
    $('.nationality').html('');
    $('.passport').html('');
    
    $.ajax({
        url: "index.php?r=Highcomm/AjaxApplicantView&id=" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('.fullname').html(data.fullname);
            $('.guid').html(data.guid);
            $('.nationality').html(data.current_nationality);
            $('.passport').html(data.passport_number);
            $('.photo').html(data.photo);
            
            $('.firstname').val(data.firstname);
            $('.middlename').val(data.middlename);
            $('.lastname').val(data.lastname);
            $('.gender').val(data.gender);
            $('.dateofbirth').val(data.dateofbirth);
            $('.placeofbirth').val(data.placeofbirth);
            $('.current-nationality').val(data.current_nationality);
            $('.citizen-number').val(data.citizen_number);
            $('.former-nationality').val(data.former_nationality);
            $('.passport-type').val(data.passport_type);
            $('.passport-other').val(data.passport_other);
            $('.passport-number').val(data.passport_number);
            $('.passport-dateofissue').val(data.passport_dateofissue);
            $('.passport-placeofissue').val(data.passport_placeofissue);
            $('.passport-dateofexpiry').val(data.passport_dateofexpiry);
            
            $('.education').val(data.education);
            $('.education-other').val(data.education_other);
            $('.email').val(data.email);
            $('.employer-name').val(data.employer_name);
            $('.employer-address').val(data.employer_address);
            $('.employer-zipcode').val(data.employer_zipcode);
            $('.employer-phone').val(data.employer_phone);
            $('.home-address').val(data.home_address);
            $('.home-zipcode').val(data.home_zipcode);
            $('.home-phone').val(data.home_phone);
            $('.home-mobile').val(data.home_mobile);
            $('.marital-status').val(data.marital_status);
            $('.marital-other').val(data.marital_other);
            $('.location-visa-apply').val(data.location_visa_apply);
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