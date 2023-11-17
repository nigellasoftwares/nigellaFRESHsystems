//file extension
window.Parsley.addValidator('fileextension', {
    validateString: function(value, requirement) {
        var fileExtension = value.split('.').pop();
        return fileExtension === requirement;
    },
    messages: {
        en: 'You need to upload the PDF file format only.'
    }
});

//white space
window.Parsley.addValidator('whitespace', {
    requirementType: 'number',
    validateString: function(value, requirement) {
        var whitespaces = value.match(/[\s]/g) || [];
        return whitespaces.length <= requirement;
    },
    messages: {
        en: 'Username must not contain any white space.'
    }
});

//username
window.Parsley.addValidator('username', {
    validateString: function(value, requirement) {
        var response = false;
        $.ajax({
            url: "index.php?r=Ajax/AjaxUsernameCheck",
            type: "POST",
            data: {
                username: value
            },
            dataType: "JSON",
            async: false, /* to send result (return) outside ajax */
            success: function(data){
                if(data.status == 'success'){
                    response = true;
                } else if(data.status == 'failure'){
                    response = false;
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                response = false;
            }
        });
        return response === requirement;
    },
    messages: {
        en: 'This username is already taken.'
    }
});