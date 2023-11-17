$(document).ready(function() {
    $('#table-application-applicant').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [1,7]    
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
});

$(document).on('click','#return-osc',function() {
    var atLeastOneIsChecked = false;
    
    $('.applicant-osc').each(function(){
        if($(this).is(":checked")){
            atLeastOneIsChecked = true;
        }
    });
    
    if(atLeastOneIsChecked){
        $.ajax({
            url: "index.php?r=Highcomm/AjaxOSCReturn",
            type: "POST",
            data: $('#form-deliver-applicant').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $(location).attr('href','index.php?r=Highcomm/ApplicationBatch&id=' + data.id);
                    $.toast({
                        heading: 'Success',
                        text: 'Passport has been returned to OSC.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right'
                    });
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Passport has not been return to OSC.',
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
            text: 'Please select at least one checkbox to return to OSC if checkbox(es) are available.',
            showHideTransition: 'fade',
            icon: 'error',
            position: 'top-right'
        });
    }    
});