$(document).ready(function() {
    $('#table-application-flight').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [7]    
        }]
    });
});