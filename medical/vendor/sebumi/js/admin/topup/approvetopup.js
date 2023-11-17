$(document).ready(function() {
    $('.table-list-approvetopup').DataTable({
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
                .column(8)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Page Amount over this page
            var pageAmount = api
                .column(8, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Update footer
            $('#cur_amount').html( accounting.formatMoney(pageAmount.toFixed(2)), "RM ", 2, ".", "," );
            $('#all_amount').html( accounting.formatMoney(allAmount.toFixed(2)), "RM ", 2, ".", "," );
        }
    });
    
    $('.chosen-status').chosen({
        width: "100%"
    });
    
    $('[data-toggle="tooltip"]').tooltip();
    
    $('.price').autoNumeric('init');
});

$(document).on('click','.topup-approve',function() {
    var id = $(this).data('id');
    
    $('#modal-approve-topup').modal('show');
    $('#form-approve-topup')[0].reset();
    $('.topup-image').empty();
    
    $.ajax({
        url: "index.php?r=AjaxAdmin/TopupView&id=" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('.topup-id').val(data.id);
            $('.topup-code').val(data.code);
            $('.topup-agent-code').val(data.agent_code);
            $('.topup-agent-name').val(data.agent_name);
            $('.topup-bank-name').val(data.bank_name);
            $('.topup-location-name').val(data.location);
            $('.topup-account-name').val(data.account_name);
            $('.topup-date').val(data.topup_date);
            $('.topup-reference').val(data.reference);
            $('.topup-amount').val(data.amount);
            $('.topup-remark').val(data.remark);
            $('img.topup-image').removeAttr("src").attr("src",data.imagedir);
            $('.topup-status').val(data.status).trigger("chosen:updated");
            $('.topup-amount').focus().blur();
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
});

$(document).on('click','#update-topup',function() {
    if($('#form-approve-topup').parsley().validate()){
        var id = $('.topup-id').val();
        
        $.ajax({
            url: "index.php?r=AjaxAdmin/TopupUpdate&id=" + id,
            type: "POST",
            data: $('#form-approve-topup').serialize(),
            dataType: "JSON",
            success: function(data){
                if(data.status == 'success'){
                    $('.message-form').html(data.success_form);
                    setTimeout(function(){
                        $('.message-form').empty();
                        $(location).attr('href','index.php?r=Admin/TopupManage');
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