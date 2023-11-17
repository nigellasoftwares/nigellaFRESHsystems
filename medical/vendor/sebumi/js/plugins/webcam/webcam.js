/* APPLICANT */

$(document).on('click','.applicant-photo-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-applicant-photo').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-applicant-photo-image').val(data_uri);
    });
    $('.slick-camera-applicant ul li:first-child').trigger('click');
});

$(document).on('click','.applicant-edit-photo-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-applicant-edit-photo').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-applicant-edit-photo-image').val(data_uri);
    });
    $('.slick-camera-applicant-edit ul li:first-child').trigger('click');
});

$(document).on('click','.applicant-passport-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-applicant-passport').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-applicant-passport-image').val(data_uri);
    });
    $('.slick-camera-applicant ul li:nth-child(2)').trigger('click');
});

$(document).on('click','.applicant-edit-passport-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-applicant-edit-passport').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-applicant-edit-passport-image').val(data_uri);
    });
    $('.slick-camera-applicant-edit ul li:nth-child(2)').trigger('click');
});

$(document).on('click','.applicant-birth-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-applicant-birth').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-applicant-birth-image').val(data_uri);
    });
    $('.slick-camera-applicant ul li:nth-child(3)').trigger('click');
});

$(document).on('click','.applicant-edit-birth-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-applicant-edit-birth').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-applicant-edit-birth-image').val(data_uri);
    });
    $('.slick-camera-applicant-edit ul li:nth-child(3)').trigger('click');
});

$(document).on('click','.applicant-national-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-applicant-national').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-applicant-national-image').val(data_uri);
    });
    $('.slick-camera-applicant ul li:nth-child(4)').trigger('click');
});

$(document).on('click','.applicant-edit-national-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-applicant-edit-national').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-applicant-edit-national-image').val(data_uri);
    });
    $('.slick-camera-applicant-edit ul li:nth-child(4)').trigger('click');
});

$(document).on('click','.applicant-marriage-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-applicant-marriage').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-applicant-marriage-image').val(data_uri);
    });
    $('.slick-camera-applicant ul li:nth-child(5)').trigger('click');
});

$(document).on('click','.applicant-edit-marriage-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-applicant-edit-marriage').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-applicant-edit-marriage-image').val(data_uri);
    });
    $('.slick-camera-applicant-edit ul li:nth-child(5)').trigger('click');
});

/*
$(document).on('click','.applicant-imm13-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-applicant-imm13').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-applicant-imm13-image').val(data_uri);
    });
    $('.slick-camera-applicant ul li:nth-child(5)').trigger('click');
});

$(document).on('click','.applicant-edit-imm13-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-applicant-edit-imm13').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-applicant-edit-imm13-image').val(data_uri);
    });
    $('.slick-camera-applicant-edit ul li:nth-child(5)').trigger('click');
});
*/

$(document).on('click','.applicant-other-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-applicant-other').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-applicant-other-image').val(data_uri);
    });
    $('.slick-camera-applicant ul li:last-child').trigger('click');
});

$(document).on('click','.applicant-edit-other-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-applicant-edit-other').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-applicant-edit-other-image').val(data_uri);
    });
    $('.slick-camera-applicant-edit ul li:last-child').trigger('click');
});

/* DEPENDANT 1 */

$(document).on('click','.dependant-1-photo-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-1-photo').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-1-photo-image').val(data_uri);
    });
    $('.slick-camera-dependant-1 ul li:first-child').trigger('click');
});

$(document).on('click','.dependant-1-edit-photo-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-1-edit-photo').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-1-edit-photo-image').val(data_uri);
    });
    $('.slick-camera-dependant-1-edit ul li:first-child').trigger('click');
});

$(document).on('click','.dependant-1-passport-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-1-passport').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-1-passport-image').val(data_uri);
    });
    $('.slick-camera-dependant-1 ul li:nth-child(2)').trigger('click');
});

$(document).on('click','.dependant-1-edit-passport-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-1-edit-passport').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-1-edit-passport-image').val(data_uri);
    });
    $('.slick-camera-dependant-1-edit ul li:nth-child(2)').trigger('click');
});

$(document).on('click','.dependant-1-birth-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-1-birth').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-1-birth-image').val(data_uri);
    });
    $('.slick-camera-dependant-1 ul li:nth-child(3)').trigger('click');
});

$(document).on('click','.dependant-1-edit-birth-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-1-edit-birth').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-1-edit-birth-image').val(data_uri);
    });
    $('.slick-camera-dependant-1-edit ul li:nth-child(3)').trigger('click');
});

$(document).on('click','.dependant-1-marriage-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-1-marriage').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-1-marriage-image').val(data_uri);
    });
    $('.slick-camera-dependant-1 ul li:nth-child(4)').trigger('click');
});

$(document).on('click','.dependant-1-edit-marriage-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-1-edit-marriage').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-1-edit-marriage-image').val(data_uri);
    });
    $('.slick-camera-dependant-1-edit ul li:nth-child(4)').trigger('click');
});

$(document).on('click','.dependant-1-imm13-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-1-imm13').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-1-imm13-image').val(data_uri);
    });
    $('.slick-camera-dependant-1 ul li:nth-child(5)').trigger('click');
});

$(document).on('click','.dependant-1-edit-imm13-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-1-edit-imm13').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-1-edit-imm13-image').val(data_uri);
    });
    $('.slick-camera-dependant-1-edit ul li:nth-child(5)').trigger('click');
});

$(document).on('click','.dependant-1-other-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-1-other').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-1-other-image').val(data_uri);
    });
    $('.slick-camera-dependant-1 ul li:last-child').trigger('click');
});

$(document).on('click','.dependant-1-edit-other-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-1-edit-other').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-1-edit-other-image').val(data_uri);
    });
    $('.slick-camera-dependant-1-edit ul li:last-child').trigger('click');
});

/* DEPENDANT 2 */

$(document).on('click','.dependant-2-photo-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-2-photo').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-2-photo-image').val(data_uri);
    });
    $('.slick-camera-dependant-2 ul li:first-child').trigger('click');
});

$(document).on('click','.dependant-2-edit-photo-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-2-edit-photo').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-2-edit-photo-image').val(data_uri);
    });
    $('.slick-camera-dependant-2-edit ul li:first-child').trigger('click');
});

$(document).on('click','.dependant-2-edit-passport-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-2-edit-passport').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-2-edit-passport-image').val(data_uri);
    });
    $('.slick-camera-dependant-2-edit ul li:nth-child(2)').trigger('click');
});

$(document).on('click','.dependant-2-birth-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-2-birth').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-2-birth-image').val(data_uri);
    });
    $('.slick-camera-dependant-2 ul li:nth-child(3)').trigger('click');
});

$(document).on('click','.dependant-2-edit-birth-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-2-edit-birth').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-2-edit-birth-image').val(data_uri);
    });
    $('.slick-camera-dependant-2-edit ul li:nth-child(3)').trigger('click');
});

$(document).on('click','.dependant-2-marriage-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-2-marriage').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-2-marriage-image').val(data_uri);
    });
    $('.slick-camera-dependant-2 ul li:nth-child(4)').trigger('click');
});

$(document).on('click','.dependant-2-edit-marriage-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-2-edit-marriage').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-2-edit-marriage-image').val(data_uri);
    });
    $('.slick-camera-dependant-2-edit ul li:nth-child(4)').trigger('click');
});

$(document).on('click','.dependant-2-imm13-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-2-imm13').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-2-imm13-image').val(data_uri);
    });
    $('.slick-camera-dependant-2 ul li:nth-child(5)').trigger('click');
});

$(document).on('click','.dependant-2-edit-imm13-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-2-edit-imm13').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-2-edit-imm13-image').val(data_uri);
    });
    $('.slick-camera-dependant-2-edit ul li:nth-child(5)').trigger('click');
});

$(document).on('click','.dependant-2-other-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-2-other').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-2-other-image').val(data_uri);
    });
    $('.slick-camera-dependant-2 ul li:last-child').trigger('click');
});

$(document).on('click','.dependant-2-edit-other-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-2-edit-other').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-2-edit-other-image').val(data_uri);
    });
    $('.slick-camera-dependant-2-edit ul li:last-child').trigger('click');
});

/* DEPENDANT 3 */

$(document).on('click','.dependant-3-photo-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-3-photo').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-3-photo-image').val(data_uri);
    });
    $('.slick-camera-dependant-3 ul li:first-child').trigger('click');
});

$(document).on('click','.dependant-3-edit-photo-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-3-edit-photo').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-3-edit-photo-image').val(data_uri);
    });
    $('.slick-camera-dependant-3-edit ul li:first-child').trigger('click');
});

$(document).on('click','.dependant-3-passport-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-3-passport').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-3-passport-image').val(data_uri);
    });
    $('.slick-camera-dependant-3 ul li:nth-child(2)').trigger('click');
});

$(document).on('click','.dependant-3-edit-passport-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-3-edit-passport').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-3-edit-passport-image').val(data_uri);
    });
    $('.slick-camera-dependant-3-edit ul li:nth-child(2)').trigger('click');
});

$(document).on('click','.dependant-3-birth-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-3-birth').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-3-birth-image').val(data_uri);
    });
    $('.slick-camera-dependant-3 ul li:nth-child(3)').trigger('click');
});

$(document).on('click','.dependant-edit-3-birth-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-3-edit-birth').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-3-edit-birth-image').val(data_uri);
    });
    $('.slick-camera-dependant-3-edit ul li:nth-child(3)').trigger('click');
});

$(document).on('click','.dependant-3-marriage-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-3-marriage').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-3-marriage-image').val(data_uri);
    });
    $('.slick-camera-dependant-3 ul li:nth-child(4)').trigger('click');
});

$(document).on('click','.dependant-3-edit-marriage-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-3-edit-marriage').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-3-edit-marriage-image').val(data_uri);
    });
    $('.slick-camera-dependant-3-edit ul li:nth-child(4)').trigger('click');
});

$(document).on('click','.dependant-3-imm13-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-3-imm13').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-3-imm13-image').val(data_uri);
    });
    $('.slick-camera-dependant-3 ul li:nth-child(5)').trigger('click');
});

$(document).on('click','.dependant-3-edit-imm13-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-3-edit-imm13').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-3-edit-imm13-image').val(data_uri);
    });
    $('.slick-camera-dependant-3-edit ul li:nth-child(5)').trigger('click');
});

$(document).on('click','.dependant-3-other-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-3-other').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-3-other-image').val(data_uri);
    });
    $('.slick-camera-dependant-3 ul li:last-child').trigger('click');
});

$(document).on('click','.dependant-3-edit-other-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-3-edit-other').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-3-edit-other-image').val(data_uri);
    });
    $('.slick-camera-dependant-3-edit ul li:last-child').trigger('click');
});

/* DEPENDANT 4 */

$(document).on('click','.dependant-4-photo-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-4-photo').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-4-photo-image').val(data_uri);
    });
    $('.slick-camera-dependant-4 ul li:first-child').trigger('click');
});

$(document).on('click','.dependant-4-edit-photo-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-4-edit-photo').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-4-edit-photo-image').val(data_uri);
    });
    $('.slick-camera-dependant-4-edit ul li:first-child').trigger('click');
});

$(document).on('click','.dependant-4-passport-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-4-passport').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-4-passport-image').val(data_uri);
    });
    $('.slick-camera-dependant-4 ul li:nth-child(2)').trigger('click');
});

$(document).on('click','.dependant-4-edit-passport-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-4-edit-passport').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-4-edit-passport-image').val(data_uri);
    });
    $('.slick-camera-dependant-4-edit ul li:nth-child(2)').trigger('click');
});

$(document).on('click','.dependant-4-birth-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-4-birth').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-4-birth-image').val(data_uri);
    });
    $('.slick-camera-dependant-4 ul li:nth-child(3)').trigger('click');
});

$(document).on('click','.dependant-4-edit-birth-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-4-edit-birth').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-4-edit-birth-image').val(data_uri);
    });
    $('.slick-camera-dependant-4-edit ul li:nth-child(3)').trigger('click');
});

$(document).on('click','.dependant-4-edit-marriage-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-4-edit-marriage').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-4-edit-marriage-image').val(data_uri);
    });
    $('.slick-camera-dependant-4-edit ul li:nth-child(4)').trigger('click');
});

$(document).on('click','.dependant-4-imm13-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-4-imm13').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-4-imm13-image').val(data_uri);
    });
    $('.slick-camera-dependant-4 ul li:nth-child(5)').trigger('click');
});

$(document).on('click','.dependant-4-edit-imm13-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-4-edit-imm13').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-4-edit-imm13-image').val(data_uri);
    });
    $('.slick-camera-dependant-4-edit ul li:nth-child(5)').trigger('click');
});

$(document).on('click','.dependant-4-other-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-4-other').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-4-other-image').val(data_uri);
    });
    $('.slick-camera-dependant-4 ul li:last-child').trigger('click');
});

$(document).on('click','.dependant-4-edit-other-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-4-edit-other').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-4-edit-other-image').val(data_uri);
    });
    $('.slick-camera-dependant-4-edit ul li:last-child').trigger('click');
});
/* DEPENDANT 5 */

$(document).on('click','.dependant-5-photo-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-5-photo').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-5-photo-image').val(data_uri);
    });
    $('.slick-camera-dependant-5 ul li:first-child').trigger('click');
});

$(document).on('click','.dependant-5-edit-photo-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-5-edit-photo').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-5-edit-photo-image').val(data_uri);
    });
    $('.slick-camera-dependant-5-edit ul li:first-child').trigger('click');
});

$(document).on('click','.dependant-5-passport-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-5-passport').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-5-passport-image').val(data_uri);
    });
    $('.slick-camera-dependant-5 ul li:nth-child(2)').trigger('click');
});

$(document).on('click','.dependant-5-edit-passport-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-5-edit-passport').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-5-edit-passport-image').val(data_uri);
    });
    $('.slick-camera-dependant-5-edit ul li:nth-child(2)').trigger('click');
});

$(document).on('click','.dependant-5-birth-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-5-birth').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-5-birth-image').val(data_uri);
    });
    $('.slick-camera-dependant-5 ul li:nth-child(3)').trigger('click');
});

$(document).on('click','.dependant-5-edit-birth-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-5-edit-birth').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-5-edit-birth-image').val(data_uri);
    });
    $('.slick-camera-dependant-5-edit ul li:nth-child(3)').trigger('click');
});

$(document).on('click','.dependant-5-marriage-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-5-marriage').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-5-marriage-image').val(data_uri);
    });
    $('.slick-camera-dependant-5 ul li:nth-child(4)').trigger('click');
});

$(document).on('click','.dependant-5-edit-marriage-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-5-edit-marriage').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-5-edit-marriage-image').val(data_uri);
    });
    $('.slick-camera-dependant-5-edit ul li:nth-child(4)').trigger('click');
});

$(document).on('click','.dependant-5-imm13-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-5-imm13').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-5-imm13-image').val(data_uri);
    });
    $('.slick-camera-dependant-5 ul li:nth-child(5)').trigger('click');
});

$(document).on('click','.dependant-5-edit-imm13-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-5-edit-imm13').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-5-edit-imm13-image').val(data_uri);
    });
    $('.slick-camera-dependant-5-edit ul li:nth-child(5)').trigger('click');
});

$(document).on('click','.dependant-5-other-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-5-other').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-5-other-image').val(data_uri);
    });
    $('.slick-camera-dependant-5 ul li:last-child').trigger('click');
});

$(document).on('click','.dependant-5-edit-other-save',function() {
    Webcam.snap( function(data_uri){
        $('.snap-dependant-5-edit-other').html('<img src="'+data_uri+'" height="240" />');
        $('.snap-dependant-5-edit-other-image').val(data_uri);
    });
    $('.slick-camera-dependant-5-edit ul li:last-child').trigger('click');
});