$(document).ready(function() {
    $('#table-application-transaction').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [1]    
        }]
    });
});