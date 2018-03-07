$(document).ready(function () {
    $("#post-rate").on('click',function (e) {
        var url = $(this).attr('url');
        var dialog = bootbox.dialog({
            message: '<div class="center"><i class="fa fa-spin fa-spinner"></i></div>',
            buttons: {
                save: {
                    label: "<i class='fa fa-save'></i>",
                    className: 'btn-success',
                    callback: function(){
                        updateRate(dialog.find('form'));
                    }
                }
            }
        });
        dialog.init(function(){
            $.get(url,function (response) {
                dialog.find('.bootbox-body').html(response);
            })
        });
    });
});