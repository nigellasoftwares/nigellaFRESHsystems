$(document).ready(function() {
    $('#table-application-transaction').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [6]    
        }]
    });
});

$(document).on('click','.transaction-delete',function() {
    var id = $(this).data('id');
    
    $.ajax({
        url: "index.php?r=Ajax/AjaxWorkerView&id=" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            swal({   
                title: "Are you sure?",
                text: "You will not be able to recover this record for\n" + data.worker_code + " " + data.worker_fullname + "!",   
                type: "warning",   
                showCancelButton: true,   
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Yes, delete it!",   
                cancelButtonText: "No, cancel please!",   
                closeOnConfirm: false,   
                closeOnCancel: false 
            }, function(isConfirm){   
                if (isConfirm) {   
                    $.ajax({
                        url: "index.php?r=Ajax/AjaxTransactionDelete&id=" + data.transaction_id,
                        type: "GET",
                        dataType: "JSON",
                        success: function(data2){
                            if(data2.status == 'success'){
                                swal("Deleted!", "Your record has been deleted.", "success");
                            } else if(data2.status == 'failure'){
                                swal("Cancelled", "Your record is safe :)", "error");
                            }
                            $(location).attr('href','index.php?r=' + data2.role + '/Application');
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
                    swal("Cancelled", "Your record is safe :)", "error");   
                } 
            });
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