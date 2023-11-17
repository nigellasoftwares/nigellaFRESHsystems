var tablelist = $('#table-application-approval').DataTable({
    columnDefs : [{
        orderable: false, 
        targets: [4,5,6,7,8,9]    
    }]
});

$(document).ready(function() {
    $('#table-application-total').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [4,5,6,7,8,9,10]    
        }]
    });
    
    $('#table-application-medical').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [4,5,6,7,8,9]    
        }]
    });
    
    $('#table-application-training').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [4,5,6,7,8,9]    
        }]
    });
    
    $('#table-application-pendingvdr').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [4,5,6,7,8,9]    
        }]
    });
    
    $('#table-application-vdrapproved').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [4,5,6,7,8,9]    
        }]
    });
    
    $('#table-application-departure').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [4,5,6,7,8,9]    
        }]
    });
    
    $('#table-application-arrival').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [4,5,6,7,8,9]    
        }]
    });
});