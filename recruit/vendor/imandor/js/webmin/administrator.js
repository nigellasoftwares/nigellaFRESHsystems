$(document).ready(function() {
    $('#table-application-admin').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [6]    
        }]
    });
});