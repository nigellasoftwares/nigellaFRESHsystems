$(document).ready(function() {
    $('.input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: false,
        autoclose: true,
        format: "dd-mm-yyyy"
    });
    
    var type_id = $('.type-id').val();
    
    if(type_id == '1'){
        $('.link-labxray').trigger('click');
        $('.link-certify').trigger('click');
    } else if(type_id == '2'){
        $('.link-medical').trigger('click');
        $('.link-certify').trigger('click');
    } else if(type_id == '3'){
        $('.link-medical').trigger('click');
        $('.link-labxray').trigger('click');
    }
    
    $('.chosen-bloodgroup').chosen({
        width: "100%"
    });
    
    $('.chosen-bloodgroup-rh').chosen({
        width: "100%"
    });
});

$(document).on('click','.link-medical',function() {
    $('.ibox-content-medical').toggle();
});

$(document).on('click','.link-labxray',function() {
    $('.ibox-content-labxray').toggle();
});

$(document).on('click','.link-certify',function() {
    $('.ibox-content-certify').toggle();
});

$(document).on('click','#update-medical2',function() {
    var id = $('.transaction-id').val();
    var doctor_declare = $('.read-declare-select:checked').length;
    var status = 'success';
    var medical_error_form = '<div class="row">' +
                                '<div class="col-md-12">' +
                                    '<div class="alert alert-danger alert-dismissable">' +
                                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                                        'Please tick a Declaration By Doctor check box.' +
                                    '</div>' +
                                '</div>' +  
                            '</div>';
    
    if(doctor_declare > 0){
        status = 'success';
    } else {
        status = 'failure';
        $('.message-medical').html(medical_error_form);
    }
});

$(document).on('click','#update-medical',function() {
    var id = $('.transaction-id').val();
    
    if($('#form-update-medical').parsley().validate()){
        $.ajax({
            url: "index.php?r=Doctor/AjaxMedicalUpdate&id=" + id,
            type: "POST",
            data: $('#form-update-medical').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $('.message-medical').html(data.success_form);
                    setTimeout(function(){
                        $('.message-medical').empty();
                        $(location).attr('href','index.php?r=Doctor/Medical&id=' + data.id + '&type=2');
                    }, 1000);
                } else if(data.status == 'failure'){
                    $('.message-medical').html(data.error_form);
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });
    }
});

$(document).on('click','#update-labxray',function() {
    var id = $('.transaction-id').val();
    var tid = $('.type-id').val();
    var lab_declare = $('.review-lab-select:checked').length;
    var xray_declare = $('.review-xray-select:checked').length;
    var status = 'success';
    
    var lab_error_form = '<div class="row">' +
                                '<div class="col-md-12">' +
                                    '<div class="alert alert-danger alert-dismissable">' +
                                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                                        'Please tick a Lab Reviewed check box.' +
                                    '</div>' +
                                '</div>' +  
                            '</div>';
    var xray_error_form = '<div class="row">' +
                                '<div class="col-md-12">' +
                                    '<div class="alert alert-danger alert-dismissable">' +
                                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                                        'Please tick an X-Ray Reviewed check box.' +
                                    '</div>' +
                                '</div>' +  
                            '</div>';                
    
    if(lab_declare > 0){
        status = 'success';
    } else {
        status = 'failure';
        $('.message-lab').html(lab_error_form);
    }
    
    if(xray_declare > 0){
        status = 'success';
    } else {
        status = 'failure';
        $('.message-xray').html(xray_error_form);
    }
    
    if(status == 'success'){
        if($('#form-update-labxray').parsley().validate()){
            $.ajax({
                url: "index.php?r=Doctor/AjaxLabxrayUpdate&id=" + id,
                type: "POST",
                data: $('#form-update-labxray').serialize(),
                dataType: "JSON",
                success: function(data){
                    if(data.status == 'success'){
                        $('.message-labxray').html(data.success_form);
                        setTimeout(function(){
                            $('.message-labxray').empty();
                            $(location).attr('href','index.php?r=Doctor/Medical&id=' + data.id + '&type=3');
                        }, 1000);
                    } else if(data.status == 'failure'){
                        $('.message-labxray').html(data.error_form);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Error get data from ajax');
                }
            });
        }
    }
});

$(document).on('click','#save-certify',function() {
    var id = $('.transaction-id').val();
    
    if($('#form-update-certify').parsley().validate()){
        $.ajax({
            url: "index.php?r=Doctor/AjaxCertifyUpdate&id=" + id,
            type: "POST",
            data: $('#form-update-certify').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $('.message-certify').html(data.success_form);
                    setTimeout(function(){
                        $('.message-certify').empty();
                        $(location).attr('href','index.php?r=Doctor/Medical&id=' + data.id + '&type=3');
                    }, 1000);
                } else if(data.status == 'failure'){
                    $('.message-certify').html(data.error_form);
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });
    }
});

$(document).on('click','#submit-certify',function() {
    var id = $('.transaction-id').val();
    
    if($('#form-update-certify').parsley().validate()){
        $.ajax({
            url: "index.php?r=Doctor/AjaxCertifyUpdate&id=" + id,
            type: "POST",
            data: $('#form-update-certify').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $('.message-certify').html(data.success_form);
                    setTimeout(function(){
                        $('.message-certify').empty();
                        $(location).attr('href','index.php?r=Doctor/Barcode');
                    }, 1000);
                } else if(data.status == 'failure'){
                    $('.message-certify').html(data.error_form);
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });
    }
});