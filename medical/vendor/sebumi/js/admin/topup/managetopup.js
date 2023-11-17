$(document).ready(function() {
    $('.table-list-managetopup').DataTable({
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
                .column(6)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Page Amount over this page
            var pageAmount = api
                .column(6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            /** PENDING ****************************************/
            // Pending over all pages
            var allPending = api
                .column(7)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Page Pending over this page
            var pagePending = api
                .column(7, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );    

            /** CURRENT ****************************************/
            // Current over all pages
            var allCurrent = api
                .column(8)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Page Current over this page
            var pageCurrent = api
                .column(8, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Update footer
            $('#cur_amount').html( accounting.formatMoney(pageAmount.toFixed(2)), "RM ", 2, ".", "," );
            $('#all_amount').html( accounting.formatMoney(allAmount.toFixed(2)), "RM ", 2, ".", "," );
            $('#cur_pending').html( accounting.formatMoney(pagePending.toFixed(2)), "RM ", 2, ".", "," );
            $('#all_pending').html( accounting.formatMoney(allPending.toFixed(2)), "RM ", 2, ".", "," );
            $('#cur_current').html( accounting.formatMoney(pageCurrent.toFixed(2)), "RM ", 2, ".", "," );
            $('#all_current').html( accounting.formatMoney(allCurrent.toFixed(2)), "RM ", 2, ".", "," );
        }    
    });
    
    $('[data-toggle="tooltip"]').tooltip();
    
    $('.price').autoNumeric('init');
});

$(document).on('click','.topup-view',function() {
    var id = $(this).data('id');
    
    $('#modal-view-topup').modal('show');
    $('#form-view-topup')[0].reset();
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