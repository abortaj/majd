function _handleImageCropper(obj) {
    var $obj = $(obj);
    var $container = $obj.parent();
    var $preUploaderAction = $container.find('.cropper-pre-uploader');
    var $cropperAction = $container.find('.cropper-cropper');
    var $cropperFile = $container.find('.cropper-file');
    var $cropperValue = $container.find('.cropper-value');
    var $progressBar=$container.find('.cropper-progressbar');
    $preUploaderAction.click(function (e) {
        e.preventDefault();
        $cropperFile.click();
    });
    $cropperFile.change(function () {
        _handleImageCropperPreUploadAction(this, $obj,$cropperAction)
    });
    $cropperAction.click(function (e) {
        e.preventDefault();
        $progressBar.parent().removeClass('hide');
        $progressBar.css('width','0%').find('span').text('0%');
        _handleImageCropperCropAction($obj,$cropperValue,this,$preUploaderAction,$progressBar);
    });
}

function _handleImageCropperPreUploadAction(input, $image,$cropperAction) {
    var cropperOptions = {
        aspectRatio: $image.data('width') / $image.data('height'),
        zoomOnWheel:false,
        autoCropArea:1
    };
    var files = input.files;
    var file;
    if (files && files.length) {
        file = files[0];
        if (/^image\/\w+$/.test(file.type)) {
            var uploadedImageType = file.type;
            if (uploadedImageURL) {
                URL.revokeObjectURL(uploadedImageURL);
            }
            var uploadedImageURL = URL.createObjectURL(file);
            $image.cropper('destroy').attr('src', uploadedImageURL).cropper(cropperOptions);
            $cropperAction.removeClass('hide');
            $(input).val('');
        } else {
            window.alert('Please choose an image file.');
        }
    }
}

function _handleImageCropperCropAction($image,$cropperValue,$cropperAction,$preUploaderAction,$progressBar) {
    $cropperAction=$($cropperAction);
    $preUploaderAction=$($preUploaderAction);
    $progressBar=$($progressBar);
    $cropperAction.addClass('hide');
    $preUploaderAction.addClass('hide');
    $image.next().addClass('hide');//.wrap('<div class="cropper-preloader"></div>');
    //  $image.next().find('div:first').css('visibility','hidden');
    $image.cropper('getCroppedCanvas',{imageSmoothingQuality:'medium'}).toBlob(function (blob) {
        var formData = new FormData();
        formData.append('file', blob);
        formData.append('width', $image.data('width'));
        formData.append('height', $image.data('height'));
        formData.append('encode', $image.data('encode'));
        formData.append('quality', $image.data('quality'));
        $.ajax(__IMAGE_PATH_UPLOAD, {
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers:{authorization: 'Bearer ' + localStorage.token},
            success: function (res) {
                $image.cropper('destroy').attr('src',res.url);
                $preUploaderAction.removeClass('hide');
                $cropperValue.val(res.name);
                //$image.next().remove();
                $progressBar.parent().addClass('hide');
                $progressBar.removeClass('progress-bar-success');
            },
            // this part is progress bar
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        percentComplete = parseInt(percentComplete * 100);
                        if(percentComplete<30)
                            $progressBar.addClass('progress-bar-danger');
                        else if(percentComplete < 50)
                            $progressBar.addClass('progress-bar-warning').removeClass('progress-bar-danger');
                        else if(percentComplete < 80)
                            $progressBar.addClass('progress-bar-info').removeClass('progress-bar-warning');
                        else
                            $progressBar.addClass('progress-bar-success').removeClass('progress-bar-info');
                        $progressBar.find('span:first').html(percentComplete==100?'<i class="fa fa-spin fa-gear"></i>':percentComplete + '%');
                        $progressBar.css('width',percentComplete  + '%');
                    }
                }, false);
                return xhr;
            },
            error: function () {
                $progressBar.parent().addClass('hide');
                $preUploaderAction.removeClass('hide');
                $cropperAction.removeClass('hide');
                $image.next().removeClass('hide');
                toastr.error('Some errors happened during this process.');
            }
        });
    });
}
function initCropper() {
    $('img.cropper').each(function () {
        _handleImageCropper(this);
    });
}

$(document).ready(function () {
    initCropper();
});