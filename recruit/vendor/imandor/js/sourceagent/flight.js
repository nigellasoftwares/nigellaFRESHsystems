$(document).ready(function() {
    window.Parsley.addValidator('fileextension', {
        validateString: function(value, requirement) {
            var fileExtension = value.split('.').pop();
            return fileExtension === requirement;
        },
        messages: {
            en: 'You need to upload the PDF file format only.'
        }
    });
    
    $('.datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    });
    
    $('#table-application-transaction').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [1]    
        }]
    });
});

$(document).on('click','#submit-flight',function() {
    var checked = $("#form-flight-worker input.checkbox-form:checked").length > 0;
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
            url: "index.php?r=Ajax/AjaxFlightUpdate",
            type: "POST",
            data: $('#form-flight-worker').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $.toast({
                        heading: 'Success',
                        text: 'Flight Booking for Worker has been updated.',
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
                        text: 'Flight Booking for Worker has not been updated.',
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right'
                    });
                } else if(data.status == 'nofile'){
                    swal("Pre Flight Covid-19 Test", "There are no PDF files attached for selected workers. Please upload PDF files for the respective selected workers.");
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

$(document).on('click','#upload-covid19',function() {
    var id = $(this).data('id');
    $('#modal-upload-covid19').modal('show');
    $('#form-upload-covid19')[0].reset();
    
    $.ajax({
        url: "index.php?r=Ajax/AjaxWorkerView&id=" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('#form-upload-covid19 .transaction-id').val(data.transaction_id);
            $('#form-upload-covid19 .worker-code').html(data.worker_code);
            $('#form-upload-covid19 .worker-name').html(data.worker_fullname);
            $('#form-upload-covid19 .passport').html(data.passport);
            $('#form-upload-covid19 .nationality').html(data.worker_nationality);
            $('#form-upload-covid19 .employer').html(data.employer);
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
});

$(document).on('click','#submit-covid19',function() {
    if($('#form-upload-covid19').parsley().validate()){
        var form = $('#form-upload-covid19')[0];
        var formData = new FormData(form);

        $.ajax({
            url: "index.php?r=Ajax/AjaxCovid19Upload",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data){
                if(data.status == 'success'){
                    $.toast({
                        heading: 'Success',
                        text: 'Document has been uploaded.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        afterShown: function () {
                            location.reload();
                        }
                    });
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Document has not been uploaded.',
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