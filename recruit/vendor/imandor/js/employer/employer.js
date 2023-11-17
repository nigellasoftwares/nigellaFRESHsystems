$(document).ready(function() {
    $('#table-application-employer').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [4,5,6]    
        }]
    });
});

$(document).on('click','.employer-delete',function() {
    var id = $(this).data('id');
    
    $.ajax({
        url: "index.php?r=Ajax/AjaxEmployerView&id=" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            swal({   
                title: "Are you sure?",
                text: "You will not be able to recover this record for\n" + data.employer_code + " " + data.employer_name + "!",   
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
                        url: "index.php?r=Ajax/AjaxEmployerDelete&id=" + data.employer_id,
                        type: "GET",
                        dataType: "JSON",
                        success: function(data2){
                            if(data2.status == 'success'){
                                swal("Deleted!", "Your record has been deleted.", "success");
                            } else if(data2.status == 'failure'){
                                swal("Cancelled", "Your record is safe :)", "error");
                            }
                            location.reload();
                            //$(location).attr('href','index.php?r=' + data2.role + '/Application');
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