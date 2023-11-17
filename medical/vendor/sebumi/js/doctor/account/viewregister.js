$(document).ready(function() {
    $('.table-list-viewregister').DataTable({
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
                .column(5)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Page Amount over this page
            var pageAmount = api
                .column(5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            /** GST ****************************************/
            // GST over all pages
            var allGST = api
                .column(6)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Page GST over this page
            var pageGST = api
                .column(6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );    

            /** TOTAL ****************************************/
            // Total over all pages
            var allTotal = api
                .column(7)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Page Total over this page
            var pageTotal = api
                .column(7, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Update footer
            $('#cur_amount').html( accounting.formatMoney(pageAmount.toFixed(2)), "RM ", 2, ".", "," );
            $('#all_amount').html( accounting.formatMoney(allAmount.toFixed(2)), "RM ", 2, ".", "," );
            $('#cur_gst').html( accounting.formatMoney(pageGST.toFixed(2)), "RM ", 2, ".", "," );
            $('#all_gst').html( accounting.formatMoney(allGST.toFixed(2)), "RM ", 2, ".", "," );
            $('#cur_total').html( accounting.formatMoney(pageTotal.toFixed(2)), "RM ", 2, ".", "," );
            $('#all_total').html( accounting.formatMoney(allTotal.toFixed(2)), "RM ", 2, ".", "," );
        }
    });
});

$(document).on('click','.register-view',function() {
    var id = $(this).data('id');
    
    $('#modal-view-register').modal('show');
    $('#form-view-register')[0].reset();
    
    $.ajax({
        url: "index.php?r=Doctor/AjaxRegisterView&id=" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            console.log(data);
            
            $('.worker-code').val(data.code);
            $('.worker-name').val(data.name);
            $('.worker-passport').val(data.passport);
            $('.worker-permit').val(data.permit);
            $('.worker-gender').val(data.gender_name);
            $('.worker-dob').val(data.dob);
            $('.worker-arrival-date').val(data.arrival_date);
            $('.worker-national').val(data.national_name);
            $('.worker-job').val(data.job_name);
            $('.worker-remark').val(data.remark);
            $('.transaction-code').val(data.transaction_code);
            $('.receipt-code').val(data.receipt_code);
            $('.employer-name').val(data.employer_name);
            $('.employer-district').val(data.employer_district);
            $('.employer-contact').val(data.employer_contact);
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
});