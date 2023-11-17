var tablelist = $('#table-application-approval').DataTable({
    columnDefs : [{
        orderable: false, 
        targets: [4,5,6,7,8,9]    
    }]
});

$(document).ready(function() {
    $('#table-application-total').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [3,5,6,7,8,9,10,11]    
        }]
    });
    
    $('#table-application-medical').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [4,5,6,7,8,9,10]    
        }]
    });
    
    $('#table-application-training').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [4,5,6,7,8,9,10]    
        }]
    });
    
    $('#table-application-pendingvdr').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [4,5,6,7,8,9,10,11]    
        }]
    });
    
    $('#table-application-vdrapproved').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [4,5,6,7,8,9,10]    
        }]
    });
    
    $('#table-application-departure').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [4,5,6,7,8,9,10]    
        }]
    });
    
    $('#table-application-arrival').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [4,5,6,7,8,9,10]    
        }]
    });
    
    $('#table-employer-quota').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [3,4,5,6,7]    
        }]
    });
    
    $('.select2-jobsector').select2({
        width: "100%"
    });
    
    $('.select2-demandletter').select2({
        width: "100%"
    });
});

$(document).on('click','#submit-total-print',function() {
    var checked = $("#form-total-worker input.checkbox-print:checked").length > 0;
    if (!checked){
        $.toast({
            heading: 'Error',
            text: 'Please check at least one checkbox in Print column.',
            showHideTransition: 'fade',
            icon: 'error',
            position: 'top-right'
        });
        return false;
    } else {
        $.ajax({
            url: "index.php?r=Ajax/AjaxWorkerPrint",
            type: "POST",
            data: $('#form-total-worker').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $.toast({
                        heading: 'Success',
                        text: 'Worker Information has been printed.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        afterShown: function () {
                            $.ajax({
                                url: "index.php?r=Admin/PrintWorker",
                                type: "POST",
                                data: {
                                    "print[]" : data.print
                                },
                                success: function(response){
                                    //window.open("data:application/pdf;base64," + response);
                                    var a = document.createElement('a');
                                    var pdfAsDataUri = "data:application/pdf;base64," + response;
                                    var dateString = timeSolver.getString(new Date(), "YYYYMMDD");
                                    a.download = 'fresh_vdr_foreignworker_' + dateString + '.pdf';
                                    a.type = 'application/pdf';
                                    a.href = pdfAsDataUri;
                                    a.click();
                                },
                                error: function(jqXHR, textStatus, errorThrown){
                                    $.toast({
                                        heading: 'Error',
                                        text: 'Error get data Ajax.',
                                        showHideTransition: 'fade',
                                        icon: 'error',
                                        position: 'top-right'
                                    });
                                    //console.log(jqXHR.responseText);
                                }
                            });
                        }
                    });
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Worker Information has not been printed.',
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

$(document).on('click','#submit-training',function() {
    var checked = $("#form-training-worker input.checkbox-form:checked").length > 0;
    if (!checked){
        $.toast({
            heading: 'Error',
            text: 'Please check at least one checkbox in VDR Approved column.',
            showHideTransition: 'fade',
            icon: 'error',
            position: 'top-right'
        });
        return false;
    } else {
        $.ajax({
            url: "index.php?r=Ajax/AjaxVisaUpdate",
            type: "POST",
            data: $('#form-training-worker').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $.toast({
                        heading: 'Success',
                        text: 'Visa Approval has been updated.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        afterShown: function () {
                            location.reload();
                        }
                    });
                    //$(location).attr('href','index.php?r=' + data.role + '/LinkWorker&id=' + data.agent + '#medical');
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Visa Approval has not been updated.',
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

$(document).on('click','#submit-pending',function() {
    var checked = $("#form-pending-worker input.checkbox-visa:checked").length > 0;
    if (!checked){
        $.toast({
            heading: 'Error',
            text: 'Please check at least one checkbox in VDR Approved column.',
            showHideTransition: 'fade',
            icon: 'error',
            position: 'top-right'
        });
        return false;
    } else {
        $.ajax({
            url: "index.php?r=Ajax/AjaxVisaUpdate",
            type: "POST",
            data: $('#form-pending-worker').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $.toast({
                        heading: 'Success',
                        text: 'Visa Approval has been updated.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        afterShown: function () {
                            location.reload();
                        }
                    });
                    //$(location).attr('href','index.php?r=' + data.role + '/LinkWorker&id=' + data.agent + '#pendingvdr');
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Visa Approval has not been updated.',
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

$(document).on('click','#submit-pending-print',function() {
    var checked = $("#form-pending-worker input.checkbox-print:checked").length > 0;
    if (!checked){
        $.toast({
            heading: 'Error',
            text: 'Please check at least one checkbox in Print column.',
            showHideTransition: 'fade',
            icon: 'error',
            position: 'top-right'
        });
        return false;
    } else {
        $.ajax({
            url: "index.php?r=Ajax/AjaxWorkerPrint",
            type: "POST",
            data: $('#form-pending-worker').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $.toast({
                        heading: 'Success',
                        text: 'Worker Information has been printed.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        afterShown: function () {
                            $.ajax({
                                url: "index.php?r=Admin/PrintWorker",
                                type: "POST",
                                data: {
                                    "print[]" : data.print
                                },
                                success: function(response){
                                    //window.open("data:application/pdf;base64," + response);
                                    var a = document.createElement('a');
                                    var pdfAsDataUri = "data:application/pdf;base64," + response;
                                    var dateString = timeSolver.getString(new Date(), "YYYYMMDD");
                                    a.download = 'imandor_vdr_foreignworker_' + dateString + '.pdf';
                                    a.type = 'application/pdf';
                                    a.href = pdfAsDataUri;
                                    a.click();
                                },
                                error: function(jqXHR, textStatus, errorThrown){
                                    $.toast({
                                        heading: 'Error',
                                        text: 'Error get data Ajax.',
                                        showHideTransition: 'fade',
                                        icon: 'error',
                                        position: 'top-right'
                                    });
                                    //console.log(jqXHR.responseText);
                                }
                            });
                        }
                    });
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Worker Information has not been printed.',
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

$(document).on('click','#submit-vdrapproved',function() {
    var checked = $("#form-vdrapproved-worker input.checkbox-form:checked").length > 0;
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
            url: "index.php?r=Ajax/AjaxDepartureUpdate",
            type: "POST",
            data: $('#form-vdrapproved-worker').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $.toast({
                        heading: 'Success',
                        text: 'Departure Approval has been updated.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        afterShown: function () {
                            location.reload();
                        }
                    });
                    //$(location).attr('href','index.php?r=' + data.role + '/LinkWorker&id=' + data.agent + '#vdrapproved');
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Departure Approval has not been updated.',
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

$(document).on('click','#submit-employer',function() {
    var checked = $("#form-total-worker input.checkbox-worker:checked").length > 0;
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
        if($('#form-total-worker').parsley().validate()){
            $.ajax({
                url: "index.php?r=Ajax/AjaxEmployerUpdate",
                type: "POST",
                data: $('#form-total-worker').serialize(),
                dataType: "JSON",
                success: function(data){
                    if(data.status == 'success'){
                        $.toast({
                            heading: 'Success',
                            text: 'Employer has been updated.',
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
                            text: 'Employer has not been updated.',
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
    }
});

$(document).on('change','.select-jobsector',function() {
    var job = $('.select-jobsector').val();
    
    if(job == ''){
        tablelist.columns(4).search('').draw();
    } else {
        $.ajax({
            url: "index.php?r=Ajax/AjaxJobSearch",
            type: "POST",
            data: {
                job_id: job
            },
            success: function(data){
                tablelist.columns(4).search(data.jobsector).draw();
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