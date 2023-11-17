$(document).ready(function() {
    $('#table-application-transaction').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [1]    
        }]
    });
});

$(document).on('click','#submit-training',function() {
    var checked = $("#form-training-worker input.checkbox-form:checked").length > 0;
    if (!checked){
        $.toast({
            heading: 'Error',
            text: 'Please check at least one checkbox.',
            showHideTransition: 'fade',
            icon: 'error',
            position: 'top-right'
        });
        return false;
    } else {
        $.ajax({
            url: "index.php?r=Ajax/AjaxTrainingUpdate",
            type: "POST",
            data: $('#form-training-worker').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $.toast({
                        heading: 'Success',
                        text: 'Training for Worker has been updated.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        afterShown: function () {
                            location.reload();
                        }
                    });
                    //$(location).attr('href','index.php?r=' + data.role + '/Medical');
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Training for Worker has not been updated.',
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
    }
});