$(document).ready(function() {
    var record = $('.record-status').val();
    if(record == 'FOUND'){
        swal("Record Found!", "Worker record has been found via QR code.", "success");
    } else {
        swal("Record Not Found!", "Worker record has not been found via QR code.", "error");
        setTimeout(function(){ 
            $(location).attr('href','index.php?r=Site/Logout'); 
        }, 3000);
    }
});

$(document).on('click','.verify-check',function() {
    $.ajax({
        url: "index.php?r=Ajax/AjaxVerifyProgress",
        type: "POST",
        data: $('#form-verify-worker').serialize(),
        dataType: "JSON",
        success: function(data){
            //$('#form-verify-worker')[0].reset();
            if(data.status == 'success'){
                swal("Record Updated!", "Worker record has been updated.", "success");
                setTimeout(function(){ 
                    $(location).attr('href','index.php?r=Site/Logout'); 
                }, 3000);
                setTimeout(function(){ 
                    window.top.close(); 
                }, 5000);
            } else if(data.status == 'failure'){
                swal("Record Not Updated!", "Worker record has not been updated.", "error");
            }
        },
        error: function(jqXHR, textStatus, errorThrown){
            swal("Ajax Error!", "Error get data Ajax.", "error");
        }
    });
});