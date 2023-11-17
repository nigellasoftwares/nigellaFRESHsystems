$(document).ready(function() {
    $('.select2-state').select2({
        width: "100%"
    });
    
    $('#table-application-user').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [7]    
        }]
    });
});

$(document).on('click','#submit-profile',function() {
    if($('#form-edit-profile').parsley().validate()){
        $.ajax({
            url: "index.php?r=Ajax/AjaxProfileUpdate",
            type: "POST",
            data: $('#form-edit-profile').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $.toast({
                        heading: 'Success',
                        text: 'Profile has been updated.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        afterShown: function () {
                            location.reload();
                        }
                    });
                    //$(location).attr('href','index.php?r=' + data.role + '/Profile#profile');
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Profile has not been updated.',
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

$(document).on('click','#submit-company',function() {
    if($('#form-edit-company').parsley().validate()){
        $.ajax({
            url: "index.php?r=Ajax/AjaxCompanyUpdate",
            type: "POST",
            data: $('#form-edit-company').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $.toast({
                        heading: 'Success',
                        text: 'Company has been updated.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        afterShown: function () {
                            location.reload();
                        }
                    });
                    //$(location).attr('href','index.php?r=' + data.role + '/Profile#company');
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Company has not been updated.',
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

$(document).on('click','#submit-company2',function() {
    if($('#form-edit-company2').parsley().validate()){
        $.ajax({
            url: "index.php?r=Ajax/AjaxCompany2Update",
            type: "POST",
            data: $('#form-edit-company2').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $.toast({
                        heading: 'Success',
                        text: 'Company has been updated.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        afterShown: function () {
                            location.reload();
                        }
                    });
                    //$(location).attr('href','index.php?r=' + data.role + '/Profile#company');
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Company has not been updated.',
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

$(document).on('click','#submit-person',function() {
    if($('#form-edit-person').parsley().validate()){
        $.ajax({
            url: "index.php?r=Ajax/AjaxPersonUpdate",
            type: "POST",
            data: $('#form-edit-person').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $.toast({
                        heading: 'Success',
                        text: 'Person In Charge has been updated.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        afterShown: function () {
                            location.reload();
                        }
                    });
                    //$(location).attr('href','index.php?r=' + data.role + '/Profile#person');
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Person In Charge has not been updated.',
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

$(document).on('click','#submit-password',function() {
    if($('#form-edit-password').parsley().validate()){
        $.ajax({
            url: "index.php?r=Ajax/AjaxPasswordMatch",
            type: "POST",
            data: $('#form-edit-password').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $.ajax({
                        url: "index.php?r=Ajax/AjaxPasswordUpdate",
                        type: "POST",
                        data: $('#form-edit-password').serialize(),
                        dataType: "JSON",
                        success: function (data) {
                            if (data.status == 'success') {
                                $.toast({
                                    heading: 'Success',
                                    text: 'New Password has been updated.',
                                    showHideTransition: 'fade',
                                    icon: 'success',
                                    position: 'top-right',
                                    afterShown: function () {
                                        location.reload();
                                    }
                                });
                                //$(location).attr('href', 'index.php?r=' + data.role + '/Profile#password');
                            } else if (data.status == 'failure') {
                                $.toast({
                                    heading: 'Error',
                                    text: 'New Password has not been updated.',
                                    showHideTransition: 'fade',
                                    icon: 'error',
                                    position: 'top-right'
                                });
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            $.toast({
                                heading: 'Error',
                                text: 'Error get data Ajax.',
                                showHideTransition: 'fade',
                                icon: 'error',
                                position: 'top-right'
                            });
                        }
                    });
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'Old Password has not matched.',
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

$(document).on('click','.user-new',function() {
    $('#modal-new-user').modal('show');
    $('#form-new-user')[0].reset();
    $('#form-new-user').parsley().reset();
    $('#title-new-user').html('Add Admin User');
    $('.userid').val('');
    $('.method').val('NEW');        
});

$(document).on('click','#submit-user',function() {
    if($('#form-new-user').parsley().validate()){
        $.ajax({
            url: "index.php?r=Ajax/AjaxAdminUserRegister",
            type: "POST",
            data: $('#form-new-user').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $.toast({
                        heading: 'Success',
                        text: 'New Admin User has been registered.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        afterShown: function () {
                            location.reload();
                        }
                    });
                    //$(location).attr('href','index.php?r=' + data.role + '/Profile#person');
                } else if(data.status == 'failure'){
                    $.toast({
                        heading: 'Error',
                        text: 'New Admin User has not been registered.',
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

$(document).on('click','.user-edit',function() {
    var id = $(this).data('id');
    
    $('#modal-new-user').modal('show');
    $('#form-new-user')[0].reset();
    $('#form-new-user').parsley().reset();
    $('#title-new-user').html('Edit Admin User');
    $('.userid').val(id);
    $('.method').val('EDIT');
    
    $.ajax({
        url: "index.php?r=Ajax/AjaxAdminUserView&id=" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('#form-new-user .fullname').val(data.fullname);
            $('#form-new-user .username').val(data.username);
            $('#form-new-user .contactnumber1').val(data.contactnumber1);
            $('#form-new-user .contactnumber2').val(data.contactnumber2);
            $('#form-new-user .mobilenumber1').val(data.mobilenumber1);
            $('#form-new-user .mobilenumber2').val(data.mobilenumber2);
            $('#form-new-user .emailaddress').val(data.emailaddress);
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

$(document).on('click','.user-delete',function() {
    var id = $(this).data('id');
    
    $.ajax({
        url: "index.php?r=Ajax/AjaxAdminUserView&id=" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            swal({   
                title: "Are you sure?",
                text: "You will not be able to recover this record for\n" + data.code + " " + data.fullname + "!",   
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
                        url: "index.php?r=Ajax/AjaxAdminUserDelete&id=" + data.userid,
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