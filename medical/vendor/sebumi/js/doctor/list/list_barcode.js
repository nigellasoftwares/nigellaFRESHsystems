$(document).ready(function() {
    $(document).on('click','#search-barcode',function() {
        if($('#form-barcode-search').smkValidate()){
            /*
            var form = $('#form-barcode-search')[0];
            var formData = new FormData(form);
            */

            $.ajax({
                url: "index.php?r=Doctor/AjaxBarcodeSearch",
                type: "POST",
                /*
                data: formData,
                processData: false,
                contentType: false,
                */
                data: $('#form-barcode-search').serialize(),
                dataType: "JSON",
                success: function(data){
                    console.log(data);
                    if(data.status == 'success'){
                        $('.message-form').html(data.success_form);
                        setTimeout(function(){
                            $('.message-form').empty();
                            $(location).attr('href','index.php?r=Doctor/Worker&id='+ data.id);
                        }, 1000);
                    } else if(data.status == 'failure'){
                        $('.message-form').html(data.error_form);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Error get data from ajax');
                }
            });

            console.log('No error found!');
        } else {
            console.log('Form got error!');
        }
    });
});