$(document).ready(function() {
    $('#table-application-agent').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [6]    
        }]
    });
});