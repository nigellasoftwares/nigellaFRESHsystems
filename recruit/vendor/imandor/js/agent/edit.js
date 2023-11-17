$(document).ready(function() {
    $('.datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    });
    
    $('.select2-country').select2({
        width: "100%"
    });
});

$(document).on('click','#update-agent',function() {
    var id = $('.agentid').val();
    
    if($('#form-edit-agent').parsley().validate()){
        $.ajax({
            url: "index.php?r=Ajax/AjaxAgentUpdate&id=" + id,
            type: "POST",
            data: $('#form-edit-agent').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $.toast({
                        heading: 'Success',
                        text: 'Agent has been updated.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        afterShown: function () {
                            $(location).attr('href','index.php?r=Admin/Worker');
                        }
                    });
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'New agent has not been updated.',
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
        console.log('Invalidated.');
    }
});