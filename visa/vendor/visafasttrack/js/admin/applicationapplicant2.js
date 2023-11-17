$(document).ready(function() {
    $('#table-application-occupation').DataTable();
    $('#table-application-family').DataTable();
    $('#table-application-emergency').DataTable();
    
    $('.datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    });
    
    $('.select2-marital').select2({
        width: '100%'
    });
//    $('.select2-formernationality').select2();
//    $('.select2-passporttype').select2();
    
});