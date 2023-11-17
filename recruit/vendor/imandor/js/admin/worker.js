$(document).ready(function() {
    $('#table-application-agent').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [2,3,4,5,6,7,8,9]    
        }]
    });
});