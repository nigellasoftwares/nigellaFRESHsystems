$(document).ready(function() {
    $('.input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: false,
        autoclose: true,
        format: "dd-mm-yyyy"
    });
    
    $(document).on('click','#verify-fingerprint',function() {
        var id = $('.transaction-id').val();
        
        $.ajax({
            url: "index.php?r=Doctor/AjaxFingerprintCheck&id=" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                var status = 'success';
                
                var doctor_declare = $('.read-declare-select:checked').length;
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
                    $('.message-form').html(medical_error_form);
                }
                
                if(data.status_verify == 'success'){
                    status = 'success';
                } else if(data.status_verify == 'failure'){
                    status = 'failure';
                    $('.message-form').html(data.error_verify_form);
                } else if(data.status_verify == 'empty'){
                    status = 'failure';
                    $('.message-form').html(data.error_verify_form);
                }
                
                if(status == 'success'){
                    if($('#form-fingerprint-verify').smkValidate()){
                        /*
                        var form = $('#form-barcode-search')[0];
                        var formData = new FormData(form);
                        */

                        $.ajax({
                            url: "index.php?r=Doctor/AjaxFingerprintVerify&id=" + id,
                            type: "POST",
                            /*
                            data: formData,
                            processData: false,
                            contentType: false,
                            */
                            data: $('#form-fingerprint-verify').serialize(),
                            dataType: "JSON",
                            success: function(data){
                                console.log(data);
                                if(data.status == 'success'){
                                    $('.message-form').html(data.success_form);
                                    setTimeout(function(){
                                        $('.message-form').empty();
                                        $(location).attr('href','index.php?r=Doctor/Medical&id='+ data.id + '&type=1');
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
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });
        
    });
});