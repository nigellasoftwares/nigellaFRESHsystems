$(document).ready(function() {
    $('.chosen-bank').chosen({
        width: "100%"
    });
    
    $('.chosen-account').chosen({
        width: "100%"
    });
    
    $('.chosen-location').chosen({
        width: "100%"
    });
    
    $('.input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: false,
        autoclose: true,
        format: "dd-mm-yyyy",
        inline: true,
        sideBySide: true
    });
    
    $('.clockpicker').clockpicker({
        default: 'now',
        autoclose: true,
        donetext: 'done',
        placement: 'top'
    });
    
    $('.price').autoNumeric('init');
});

$(document).on('click','#submit-topup',function() {
    if($('#form-new-topup').parsley().validate()){
        var form = $('#form-new-topup')[0];
        var formData = new FormData(form);
    
        $.ajax({
            url: "index.php?r=Agent/AjaxTopupRegister",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data){
                if(data.status == 'success'){
                    $('.message-form').html(data.success_form);
                    setTimeout(function(){
                        $('.message-form').empty();
                        $(location).attr('href','index.php?r=Agent/AccountTopupView');
                    }, 1000);
                } else if(data.status == 'failure'){
                    $('.message-form').html(data.error_form);
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });
    }
});

$(document).on('click','#submit-topup2',function() {
    if($('#form-new-topup').parsley().validate()){
        $.ajax({
            url: "index.php?r=Agent/AjaxTopupRegister",
            type: "POST",
            data: $('#form-new-topup').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $('.message-form').html(data.success_form);
                    setTimeout(function(){
                        $('.message-form').empty();
                        $(location).attr('href','index.php?r=Agent/AccountTopupView');
                    }, 1000);
                } else if(data.status == 'failure'){
                    $('.message-form').html(data.error_form);
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });
    }
});