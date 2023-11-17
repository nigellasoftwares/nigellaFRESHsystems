$(document).ready(function() {
    $('.vft-password-alert').hide();
    $(".preloader").fadeOut();
    $('[data-toggle="tooltip"]').tooltip();
});

$(document).on('click','.vft-login',function() {
    $('.vft-alert').remove();
});

$(document).on('click','.vft-password',function() {
    $('.vft-password-alert').toggle();
});