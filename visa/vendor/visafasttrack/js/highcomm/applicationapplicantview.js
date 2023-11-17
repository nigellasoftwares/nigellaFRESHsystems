$(document).ready(function() {
    
});

$(document).on('click','.visa-result',function() {
    var id = $(this).data('id');
    $('#modal-update-result').modal('show');
    $('#form-update-result').parsley().reset();
    $('#form-update-result')[0].reset();
    $('.applicant-id').val(id);
    
    $.ajax({
        url: "index.php?r=Highcomm/AjaxApplicantResultView&id=" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            if(data.result != 1){
                $('.select-result').val(data.result);
            }
            $('.remark-result').val(data.remarks);
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
});

$(document).on('click','#submit-result',function() {
    if($('#form-update-result').parsley().validate()){
        $.ajax({
            url: "index.php?r=Highcomm/AjaxApplicantResult",
            type: "POST",
            data: $('#form-update-result').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $(location).attr('href','index.php?r=Highcomm/ApplicationApplicantView&id=' + data.id);
                    $.toast({
                        heading: 'Success',
                        text: 'Result has been updated.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right'
                    });
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Result has not been updated.',
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