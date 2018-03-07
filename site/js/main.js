$(document).ready(function () {
    //header
    var headers={'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    if(localStorage.getItem('token'))
        headers.Authorization='Bearer ' + localStorage.getItem('token');
    $.ajaxSetup({headers: headers});

    //Select Tags
    $(".select-tags").select2();

    //CKEditor
    CKEDITOR.config.language= 'ar';
    CKEDITOR.replaceClass = 'ckeditor';


    setTimeout(function(){
        $(window).trigger('resize');
        for (var i in CKEDITOR.instances) {
            CKEDITOR.instances[i].on('keyup', function() { CKEDITOR.instances[i].updateElement() });
            CKEDITOR.instances[i].on('change', function() { CKEDITOR.instances[i].updateElement() });
        }
    }, 200);

    var url = window.location.href;
    $("#primary-menu").find('a[href="'+url+'"]').parent().addClass('current')
});