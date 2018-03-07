function initMedia() {
    Dropzone.prototype.defaultOptions.dictRemoveFile = MEDIA.DELETE;
    Dropzone.prototype.defaultOptions.dictDefaultMessage = MEDIA.FILES_DRAG_DROP;
    _cmp_media_initDropZone();
    /*Init Events, Modal*/
    $(function () {
        $(MEDIA.FORM).append(MEDIA.HIDDEN);
        _media_updateMediaFormInput();
        $('.media-modal-action').click(function () {
            _media_showEditMediaModal(this);
        });
        $('.media-delete-action').click(function () {
            _media_deleteMedia(this);
        });
    });
}
/* Handle Upload or Edit Media Click*/
function _media_showEditMediaModal(obj) {
    var $this = $(obj);
    var dialog = bootbox.dialog({
        title:MEDIA.MEDIA,
        message: '<p><i class="fa fa-spin fa-spinner"></i> '+GLOBAL.LOADING+'</p>',
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
                var id = $modalBody.find('[name="id"]').val();
                var currentIndex = $modalBody.find('[name="currentIndex"]').val();
                var url = $modalBody.find('[name="url"]').val();
                var title = $modalBody.find('[name="title"]').val();
                var alt = $modalBody.find('[name="alt"]').val();
                _media_addFileToContainer(id, url, title, alt, currentIndex);
            }
        }
    }
});
    dialog.init(function () {
        var $modalBody = $('.media-form:first').clone().css('display', 'block');
        var $parent = $this.parent();
        $modalBody.find('[name="id"]').val($parent.attr('data-id'));
        $modalBody.find('[name="currentIndex"]').val($parent.parent().index()-1);
        $modalBody.find('[name="url"]').val($parent.attr('data-url'));
        $modalBody.find('[name="title"]').val($parent.attr('data-title'));
        $modalBody.find('[name="alt"]').val($parent.attr('data-alt'));
        dialog.find('.bootbox-body').html($modalBody);
        $modalBody.find('.media-preview').html(_media_render_file($parent.attr('data-url').split('.').slice(-1)[0],$parent.attr('data-url')));

    });
}
/*Init DropZone*/
function _cmp_media_initDropZone() {
    Dropzone.prototype.defaultOptions.paramName = "file"; // The name that will be used to transfer the file
    Dropzone.prototype.defaultOptions.maxFilesize = MEDIA.MAX_FILE_SIZE; // MB
    Dropzone.prototype.defaultOptions.timeout= 9180000;
    Dropzone.prototype.defaultOptions.accept = function (file, done) {
        if (MEDIA.ALLOWED_EXTEES.indexOf(file.type.split('/')[1].toLowerCase()) == -1) {
            done(MEDIA.NOT_ALLOWED);
        }else if($('.media-item:not(.deleted)').length>=parseInt(MEDIA.MAX_FILE_COUNT)){
            done(MEDIA.MAX_FILE_REACHED);
        } else {
            done();
        }
    };
    Dropzone.prototype.defaultOptions.headers = {authorization: 'Bearer ' + localStorage.token};
    Dropzone.prototype.defaultOptions.success = function (file) {
        var response = JSON.parse(file.xhr.response);
        _media_addFileToContainer("", response.url, "", "");
        this.removeFile(file);

    };
    /*Dropzone.prototype.defaultOptions.init = function () {
     /!* var url = $modalBody.find('[name="url"]').val();
     if (url) {
     var mockFile = {name: '',size:''};
     this.options.addedfile.call(this, mockFile);
     this.options.thumbnail.call(this, mockFile, url);
     }*!/
     // mockFile.previewElement.classList.add('dz-success');
     // mockFile.previewElement.classList.add('dz-complete');
     };*/
    Dropzone.prototype.defaultOptions.dictResponseError = function (res) {
        console.log(res);
        return res.message;
    };
}
/* Add file to media items container (fired when user click save button in modal)*/
function _media_addFileToContainer(id, url, title, alt, currentIndex) {
    var $item = currentIndex ? $('.media-item:eq(' + currentIndex + ')') : $('.media-item-temp').clone().addClass('media-item').removeClass('media-item-temp hide');
    var $mediaInfo = $item.find('.media-info');
    $mediaInfo.attr('data-url', url);
    $mediaInfo.attr('data-title', title);
    $mediaInfo.attr('data-alt', alt);
    if (!currentIndex) {
        $item.append(_media_render_file(url.split('.').slice(-1)[0],url));
        $item.find('.media-modal-action').click(function () {
            _media_showEditMediaModal(this);
        });
        $item.find('.media-delete-action').click(function () {
            _media_deleteMedia(this);
        });
        $('.media-container .row').append($item);
    }
    _media_updateMediaFormInput();
}
/* Update media hidden input (which is used as the user form input (parent form))*/
function _media_updateMediaFormInput() {
    var items = [];
    $('.media-item .media-info').each(function () {
        var $this = $(this);
        items.push({
            id: $this.attr('data-id'),
            title: $this.attr('data-title'),
            url: $this.attr('data-url'),
            deleted: $this.attr('data-deleted'),
            alt: $this.attr('data-alt')
        });
    });
    $(MEDIA.FORM+' [name="media"]').val(JSON.stringify(items));
}
function _media_deleteMedia(obj) {
    var $this = $(obj);
    var $parent = $this.parent();
    if ($parent.attr('data-id')) {
        $parent.attr('data-deleted', 1);
        $parent.parent().css('display', 'none').addClass('deleted');
    }else
        $parent.parent().remove();
    _media_updateMediaFormInput();
}
function _media_render_file(ext,fileUrl){
    ext=ext.toLowerCase();
    if (['jpg', 'png', 'bmp', 'jpeg', 'gif'].indexOf(ext) >= 0)
        return '<div style="height:200px;width:100%;background-size:cover;background-image:url(\'' + fileUrl + '\')"></div>';
    else if (['mp4', 'avi', 'mkv', 'ogg', 'wmv', '3gp'].indexOf(ext) >= 0)
        return '<video controls style="width:100%"> <source   src="' + fileUrl + '" type="video/'+ext+'"> </video>';
    else return '<object style="width:100%"  data="'+fileUrl+'" type="application/'+ext+'">'+
            '</object>';
}