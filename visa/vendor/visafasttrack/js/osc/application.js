$(document).ready(function() {
    $('#table-application-batch').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [2,3,4,5,6,11]    
        }]
    });
});