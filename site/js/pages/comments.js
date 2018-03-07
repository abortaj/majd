
$(document).ready(function () {
    commentEvents();
});

function commentEvents(){
    $(".comment-delete").unbind('click').on('click',function (e) {
        e.preventDefault();
        var comment = $(this);
        confirm(function () {
            deleteComment(comment);
        });
    });
    $(".comment-edit").unbind('click').on('click',function (e) {
        var comment = $(this).parents('.comment:first').attr('param');
        var text = $(this).parents('.comment:first').find('.comment-body').text();
        var msg = $(this).attr('comment-edit-msg');
        editComment(comment, text, msg);
    });

    $(".comment-reply").unbind('click').on('click',function (e) {
        var comment = $(this).parents('.comment:first').attr('param');
        var replyMessage = $(this).attr('message');
        reply(comment, replyMessage);
    });

    $(".comment-replies").unbind('click').on('click',function (e) {
        e.preventDefault();
        var comment = $(this).parents('.comment:first');
        if(comment.find('.children').length > 0){
            comment.find('.children').slideUp(function () {
                comment.find('.children').remove();
            });
        }else{
            loadReplies($(this).attr('href'), comment);
        }
    });
}

function reply(comment, replyMessage){
    var form = $('#comment-form');
    removeEdit();
    removeReply();
    var replyCont = $('<div>').addClass('col_full style-msg infomsg');
    var cancel = $('<button>').addClass("close").attr('type','button').attr('data-dismiss','alert').attr('aria-hidden','true').text('×');
    var message = $('<div>').addClass('sb-msg').html(replyMessage);
    replyCont.html(message);
    replyCont.append(cancel);
    form.find('input[name=parent]').val(comment);
    form.prepend(replyCont);

    cancel.click(function () {
        form.find('.infomsg').remove();
        form.find('input[name=parent]').val('');
    })
}

function loadReplies(url, comment){
    $.get(url,function (response) {
        comment.find('.children').remove();
        comment.append(response);
        comment.find('.children').slideDown();
        commentEvents();
    }).fail(function (error) {
        toastr.error(error.responseJSON.message);
    });
}

function deleteComment(comment){
    var url = comment.attr('href');
    $.post(url,function (response) {
        comment.parents('.comment:first').remove();
        toastr.success(response.message);
    }).fail(function (error) {
        toastr.error(error.responseJSON.message);
    });
}

function editComment(comment, text, msg){
    var form = $('#comment-form');
    removeEdit();
    removeReply();
    var replyCont = $('<div>').addClass('col_full style-msg alertmsg');
    var cancel = $('<button>').addClass("close").attr('type','button').attr('data-dismiss','alert').attr('aria-hidden','true').text('×');
    var message = $('<div>').addClass('sb-msg').html(msg);
    replyCont.html(message);
    replyCont.append(cancel);
    form.find('input[name=comment_id]').val(comment);
    form.find('textarea[name=content]').val(text);
    form.prepend(replyCont);
    cancel.click(function () {
        form.find('.alertmsg').remove();
        form.find('input[name=comment_id]').val('');
        form.find('textarea[name=content]').val('');
    })
}

function removeEdit(){
    var form = $('#comment-form');
    form.find('.alertmsg').remove();
    form.find('input[name=comment_id]').val('');
    form.find('textarea[name=content]').val('');
}

function removeReply(){
    var form = $('#comment-form');
    form.find('.infomsg').remove();
    form.find('input[name=parent]').val('');
}