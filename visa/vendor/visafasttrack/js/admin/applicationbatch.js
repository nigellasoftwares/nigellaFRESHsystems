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
    
    $('.chk-osc').change(function(){
        if($(this).is(":checked")){
            $('.applicant-osc').prop('checked',true);
        } else if($(this).is(":not(:checked)")){
            $('.applicant-osc').prop('checked',false);
        }
    });
    
    $('.chk-brn').change(function(){
        if($(this).is(":checked")){
            $('.applicant-brn').prop('checked',true);
        } else if($(this).is(":not(:checked)")){
            $('.applicant-brn').prop('checked',false);
        }
    });
});

$(document).on('click','#deliver-osc',function() {
    var atLeastOneIsChecked = false;
    
    $('.applicant-osc').each(function(){
        if($(this).is(":checked")){
            atLeastOneIsChecked = true;
        }
    });
    
    if(atLeastOneIsChecked){
        $.ajax({
            url: "index.php?r=Admin/AjaxOSCDeliver",
            type: "POST",
            data: $('#form-deliver-applicant').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $(location).attr('href','index.php?r=Admin/ApplicationBatch&id=' + data.id);
                    $.toast({
                        heading: 'Success',
                        text: 'Passport has been deivered to OSC.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right'
                    });
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Passport has not been delivered to OSC.',
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
            text: 'Please select at least one checkbox to deliver to OSC if checkbox(es) are available.',
            showHideTransition: 'fade',
            icon: 'error',
            position: 'top-right'
        });
    }    
});

$(document).on('click','#return-brn',function() {
    var atLeastOneIsChecked = false;
    
    $('.applicant-brn').each(function(){
        if($(this).is(":checked")){
            atLeastOneIsChecked = true;
        }
    });
    
    if(atLeastOneIsChecked){
        $.ajax({
            url: "index.php?r=Admin/AjaxBranchReturn",
            type: "POST",
            data: $('#form-deliver-applicant').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $(location).attr('href','index.php?r=Admin/ApplicationBatch&id=' + data.id);
                    $.toast({
                        heading: 'Success',
                        text: 'Passport has been returned to Branch.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right'
                    });
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Passport has not been returned to Branch.',
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
            text: 'Please select at least one checkbox to return to Branch if checkbox(es) are available.',
            showHideTransition: 'fade',
            icon: 'error',
            position: 'top-right'
        });
    }
});