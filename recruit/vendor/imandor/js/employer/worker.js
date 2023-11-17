$(document).ready(function() {
    $('#table-application-transaction').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [4,5,7]    
        }]
    });
});