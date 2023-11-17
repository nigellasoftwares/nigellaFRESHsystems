$(document).ready(function() {
    $('#table-application-applicant').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [1,2,8]    
        }]
    });
    
    $('.datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    });
    
    $('.chk-hc').change(function(){
        if($(this).is(":checked")){
            $('.applicant-hc').prop('checked',true);
        } else if($(this).is(":not(:checked)")){
            $('.applicant-hc').prop('checked',false);
        }
    });
    
    $('.chk-adm').change(function(){
        if($(this).is(":checked")){
            $('.applicant-adm').prop('checked',true);
        } else if($(this).is(":not(:checked)")){
            $('.applicant-adm').prop('checked',false);
        }
    });
});

$(document).on('click','#deliver-hc',function() {
    var atLeastOneIsChecked = false;
    
    $('.applicant-hc').each(function(){
        if($(this).is(":checked")){
            atLeastOneIsChecked = true;
        }
    });
    
    if(atLeastOneIsChecked){
        $.ajax({
            url: "index.php?r=Osc/AjaxHCDeliver",
            type: "POST",
            data: $('#form-deliver-applicant').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $(location).attr('href','index.php?r=Osc/ApplicationBatch&id=' + data.id);
                    $.toast({
                        heading: 'Success',
                        text: 'Passport has been deivered to High Commission.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right'
                    });
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Passport has not been delivered to High Commission.',
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
    } else {
        $.toast({
            heading: 'Error',
            text: 'Please select at least one checkbox to deliver to High Commission if checkbox(es) are available.',
            showHideTransition: 'fade',
            icon: 'error',
            position: 'top-right'
        });
    }    
});

$(document).on('click','#return-adm',function() {
    var atLeastOneIsChecked = false;
    
    $('.applicant-adm').each(function(){
        if($(this).is(":checked")){
            atLeastOneIsChecked = true;
        }
    });
    
    if(atLeastOneIsChecked){
        $.ajax({
            url: "index.php?r=Osc/AjaxAdminReturn",
            type: "POST",
            data: $('#form-deliver-applicant').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $(location).attr('href','index.php?r=Osc/ApplicationBatch&id=' + data.id);
                    $.toast({
                        heading: 'Success',
                        text: 'Passport has been returned to Admin.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right'
                    });
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Passport has not been returned to Admin.',
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
    } else {
        $.toast({
            heading: 'Error',
            text: 'Please select at least one checkbox to return to Admin if checkbox(es) are available.',
            showHideTransition: 'fade',
            icon: 'error',
            position: 'top-right'
        });
    }
});