$(document).ready(function() {
    $('.sebumi-password-alert').hide();
});

$(document).on('click','.sebumi-login',function() {
    $('.sebumi-alert').remove();
});

$(document).on('click','.sebumi-password',function() {
    $('.sebumi-password-alert').toggle();
});