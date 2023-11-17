$(document).ready(function() {
    $('.table-list-viewtopup').DataTable({
        pageLength: 25,
        responsive: true,
        dom: 'lTfgitp',
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };

            /** AMOUNT ****************************************/
            // Amount over all pages
            var allAmount = api
                .column(7)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Page Amount over this page
            var pageAmount = api
                .column(7, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Update footer
            $('#cur_amount').html( accounting.formatMoney(pageAmount.toFixed(2)), "RM ", 2, ".", "," );
            $('#all_amount').html( accounting.formatMoney(allAmount.toFixed(2)), "RM ", 2, ".", "," );
        }
    });
    
    $('.chosen-bank').chosen({
        width: "100%"
    });
    
    $('.chosen-account').chosen({
        width: "100%"
    });
    
    $('.chosen-location').chosen({
        width: "100%"
    });
    
    $('.datetimepicker').datetimepicker({
        weekStart: 0,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1,
        minuteStep: 1,
        keyboardNavigation: true,
        pickerReferer: 'input',
        format: 'dd-mm-yyyy hh:ii'
    });
    
    $('[data-toggle="tooltip"]').tooltip();
    
    $('.price').autoNumeric('init');
});

$(document).on('click','.topup-register',function() {
    $('#modal-new-topup').modal('show');
});

$(document).on('click','#submit-topup',function() {
    if($('#form-new-topup').parsley().validate()){
        var form = $('#form-new-topup')[0];
        var formData = new FormData(form);
    
        $.ajax({
            url: "index.php?r=Doctor/AjaxTopupRegister",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data){
                if(data.status == 'success'){
                    $('.message-form').html(data.success_form);
                    setTimeout(function(){
                        $('.message-form').empty();
                        $(location).attr('href','index.php?r=Agent/AccountTopupView');
                    }, 1000);
                } else if(data.status == 'failure'){
                    $('.message-form').html(data.error_form);
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });
    }
});

$(document).on('click','.topup-view',function() {
    var id = $(this).data('id');
    
    $('#modal-view-topup').modal('show');
    $('#form-view-topup')[0].reset();
    $('.topup-image').empty();
    
    $.ajax({
        url: "index.php?r=Doctor/AjaxTopupView&id=" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            console.log(data.imagedir);
            
            $('.topup-id').val(data.id);
            $('.topup-code').val(data.code);
            $('.topup-agent-name').val(data.agent_name);
            $('.topup-bank-name').val(data.bank_name);
            $('.topup-location-name').val(data.location);
            $('.topup-account-name').val(data.account_name);
            $('.topup-date').val(data.topup_date);
            $('.topup-reference').val(data.reference);
            $('.topup-amount').val(data.amount);
            $('.topup-status-name').val(data.status_name);
            $('.topup-remark').val(data.remark);
            $('img.topup-image').removeAttr("src").attr("src",data.imagedir);
            $('.topup-amount').focus().blur();
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
});

$(document).on('click','.topup-edit',function() {
    var id = $(this).data('id');
    
    $('#modal-edit-topup').modal('show');
    $('#form-edit-topup')[0].reset();
    $('.topup-image').empty();
    
    $.ajax({
        url: "index.php?r=Doctor/AjaxTopupView&id=" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('.topup-id').val(data.id);
            $('.topup-code').val(data.code);
            $('.topup-bank').val(data.bank).trigger("chosen:updated");
            $('.topup-location').val(data.location);
            $('.topup-account').val(data.account).trigger("chosen:updated");
            $('.topup-date').val(data.topup_date);
            $('.topup-reference').val(data.reference);
            $('.topup-amount').val(data.amount);
            $('.topup-status-name').val(data.status_name);
            $('.topup-remark').val(data.remark);
            $('img.topup-image').removeAttr("src").attr("src",data.imagedir);
            $('.topup-amount').focus().blur();
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
    
    $.ajaxSetup({
        cache: false
    });
    $('.topup-image-obyu').load('index.php?r=Doctor/AjaxTopupImage&id=' + id);
    setInterval(function() {
       $('.topup-image-obyu').load('index.php?r=Doctor/AjaxTopupImage&id=' + id);
    }, 500);
});

$(document).on('click','#update-topup',function() {
    if($('#form-edit-topup').parsley().validate()){
        var id = $('.topup-id').val();
        var form = $('#form-edit-topup')[0];
        var formData = new FormData(form);
    
        $.ajax({
            url: "index.php?r=Doctor/AjaxTopupUpdate&id=" + id,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data){
                if(data.status == 'success'){
                    $('.message-form').html(data.success_form);
                    setTimeout(function(){
                        $('.message-form').empty();
                        $(location).attr('href','index.php?r=Doctor/AccountTopupView');
                    }, 1000);
                } else if(data.status == 'failure'){
                    $('.message-form').html(data.error_form);
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });
    }
});

$(document).on('click','.topup-image-obyu',function() {
    var id = $('.topup-id').val();
    $('.topup-image-obyu').load('index.php?r=Doctor/AjaxTopupImage&id=' + id);
});