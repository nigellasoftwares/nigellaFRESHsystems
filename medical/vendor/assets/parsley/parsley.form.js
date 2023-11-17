    var parsleyOptions = {
        trigger: 'change',
        errorClass: 'has-parsley-error',
        successClass: 'has-success',
        classHandler: function(field){
            const $parent = field.$element.closest('.input-group');
            if($parent.length){
                return $parent;
            }
            return field.$element;
        },
        /*
        errorsContainer: function(elem){
            if($( elem ).is('select')){
                return $(elem).parent();
            } else if($(elem).is('[type=text]')){
                return $(elem).parent();
            }
            return $(elem);
        },
        */
        errors: {
            container: function (elem){
                if($(elem).is('select')){
                    return $(elem).parent();
                } else if($(elem).is('[type=text]')){
                    return $(elem).parent();
                }
                return $(elem);
            }
        }
        /*
        errorsWrapper: '<ul class="parsley-errors-list"></ul>',
        errorTemplate: '<li></li>'
        */

        /* https://devhints.io/parsley */
    };