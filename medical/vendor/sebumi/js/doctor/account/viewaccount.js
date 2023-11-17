$(document).ready(function() {
    $('.table-list-viewaccount').DataTable({
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
            // Amount Out over all pages
            var allAmountOut = api
                .column(5)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Page Amount Out over this page
            var pageAmountOut = api
                .column(5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                
            // Amount In over all pages
            var allAmountIn = api
                .column(6)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Page Amount In over this page
            var pageAmountIn = api
                .column(6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                
            /** BALANCE AMOUNT ****************************************/
            var pageAmountBalance = pageAmountIn - pageAmountOut;
            var allAmountBalance = allAmountIn - allAmountOut;    

            /** Pending ****************************************/
            // Pending Out over all pages
            var allPendingOut = api
                .column(7)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Page Pending Out over this page
            var pagePendingOut = api
                .column(7, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                
            // Pending In over all pages
            var allPendingIn = api
                .column(8)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Page Pending In over this page
            var pagePendingIn = api
                .column(8, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                
            /** BALANCE PENDING ****************************************/
            var pagePendingBalance = pagePendingIn - pagePendingOut;
            var allPendingBalance = allPendingIn - allPendingOut;    

            /** CURRENT ****************************************/
            // Current Out over all pages
            var allCurrentOut = api
                .column(9)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Page Current Out over this page
            var pageCurrentOut = api
                .column(9, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                
            // Current In over all pages
            var allCurrentIn = api
                .column(10)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Page Current In over this page
            var pageCurrentIn = api
                .column(10, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                
            /** BALANCE CURRENT ****************************************/
                var pageCurrentBalance = pageCurrentIn - pageCurrentOut;
                var allCurrentBalance = allCurrentIn - allCurrentOut;
            

            // Update footer
            $('#cur_amount_out').html( accounting.formatMoney(pageAmountOut.toFixed(2)), "RM ", 2, ".", "," );
            $('#cur_amount_in').html( accounting.formatMoney(pageAmountIn.toFixed(2)), "RM ", 2, ".", "," );
            $('#all_amount_out').html( accounting.formatMoney(allAmountOut.toFixed(2)), "RM ", 2, ".", "," );
            $('#all_amount_in').html( accounting.formatMoney(allAmountIn.toFixed(2)), "RM ", 2, ".", "," );
            $('#cur_balance_amount').html( accounting.formatMoney(pageAmountBalance.toFixed(2)), "RM ", 2, ".", "," );
            $('#all_balance_amount').html( accounting.formatMoney(allAmountBalance.toFixed(2)), "RM ", 2, ".", "," );
            
            $('#cur_pending_out').html( accounting.formatMoney(pagePendingOut.toFixed(2)), "RM ", 2, ".", "," );
            $('#cur_pending_in').html( accounting.formatMoney(pagePendingIn.toFixed(2)), "RM ", 2, ".", "," );
            $('#all_pending_out').html( accounting.formatMoney(allPendingOut.toFixed(2)), "RM ", 2, ".", "," );
            $('#all_pending_in').html( accounting.formatMoney(allPendingIn.toFixed(2)), "RM ", 2, ".", "," );
            $('#cur_balance_pending').html( accounting.formatMoney(pagePendingBalance.toFixed(2)), "RM ", 2, ".", "," );
            $('#all_balance_pending').html( accounting.formatMoney(allPendingBalance.toFixed(2)), "RM ", 2, ".", "," );
            
            $('#cur_current_out').html( accounting.formatMoney(pageCurrentOut.toFixed(2)), "RM ", 2, ".", "," );
            $('#cur_current_in').html( accounting.formatMoney(pageCurrentIn.toFixed(2)), "RM ", 2, ".", "," );
            $('#all_current_out').html( accounting.formatMoney(allCurrentOut.toFixed(2)), "RM ", 2, ".", "," );
            $('#all_current_in').html( accounting.formatMoney(allCurrentIn.toFixed(2)), "RM ", 2, ".", "," );
            $('#cur_balance_current').html( accounting.formatMoney(pageCurrentBalance.toFixed(2)), "RM ", 2, ".", "," );
            $('#all_balance_current').html( accounting.formatMoney(allCurrentBalance.toFixed(2)), "RM ", 2, ".", "," );
        }
    });
    
    $('.input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: false,
        autoclose: true,
        format: 'dd-mm-yyyy'
        //daysOfWeekDisabled: [0,6]
    });

//    $('.input-group.date').datetimepicker({
//        todayBtn: "linked",
//        todayHighlight: true,
//        keyboardNavigation: false,
//        forceParse: false,
//        autoclose: true,
//        minView: 'month',
//        format: 'dd-mm-yyyy',
//        daysOfWeekDisabled: [0,6],
//        datesDisabled: ['04-06-2018','05-06-2018']
//    });
});