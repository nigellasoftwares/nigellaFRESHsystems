$(document).ready(function() {
    $('#table-application-batch').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [2,3,4,8]    
        }]
    });
});

$(document).on('click','.batch-new',function() {
    var bid = $(this).data('branch');
    var aid = $(this).data('admin');
    
    $.ajax({
        url: "index.php?r=Branch/AjaxBatchRegister",
        type: "POST",
        data: { branch: bid, admin: aid },
        dataType: "JSON",
        success: function(data){
            if(data.status == 'success'){
                $(location).attr('href','index.php?r=Branch/Application');
                $.toast({
                    heading: 'Success',
                    text: 'New batch has been created.',
                    showHideTransition: 'fade',
                    icon: 'success',
                    position: 'top-right'
                });
//                setTimeout(function(){
//                    $(location).attr('href','index.php?r=Branch/Application');
//                }, 1000);
            } else if(data.status == 'failure'){
                $.toast({
                    heading: 'Error',
                    text: 'New batch has not been created.',
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
});