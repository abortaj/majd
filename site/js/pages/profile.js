$(function(){
    $('.edit-profile-image').click(function(){
        _profile_showEditImageModal();
    });
});
/* Handle Edit Image Click*/
function _profile_showEditImageModal(obj) {
    var $this = $(obj);
    var dialog = bootbox.dialog({
        title: PROFILE.EDIT_PROFILE_IMAGE,
        message:$('.image-cropper-container').clone().removeClass('hide'),
        className:"profile-edit-image-modal",
        buttons: {
            cancel: {
                label: GLOBAL.CLOSE,
                    className: 'button  button-black',
            },
            ok: {
                label: GLOBAL.SAVE,
                    className: 'button button-green ',
                    callback: function () {
                    var $modalBody = $('.bootbox-body');
                    if($modalBody.find("[name='image_name']").val()) {
                        $.post(PROFILE.UPDATE, "image=" + $modalBody.find("[name='image_name']").val(), function (res) {
                            $(".user-image,.cropper").attr('src',res.url);
                            bootbox.hideAll();
                        });
                        return false;
                    }else return true;
                }
            }
        }
    });
    dialog.init(function () {
        var $modalBody = $('.media-form:first').clone().css('display', 'block');
        initCropper();
    });
}