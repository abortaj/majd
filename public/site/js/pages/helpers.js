function confirm(callback) {
    bootbox.confirm({
        message: "هل أنت متأكد؟",
        buttons: {
            confirm: {
                label: 'نعم',
                className: 'btn-danger'
            },
            cancel: {
                label: 'إلغاء',
                className: 'btn-default'
            }
        },
        callback: function (result) {
            if(result){
                callback.call();
            }
        }
    });
}

function toggleButton(button) {
    if(button.find('.fa-spinner').length > 0){
        button.html(button.attr('text')).removeAttr('disabled');
    }else{
        var spinner = $('<i>').addClass('fa fa-spinner fa-spin');
        var text = button.html();
        button.html(spinner).attr('text',text).attr('disabled','disabled');
    }
}

function submitForm(form, success, fail) {
    var url = form.attr('action');
    var data = form.serialize();
    var submit = form.find('button[type=submit]');
    toggleButton(submit);
    form.find('input.error, select.error').removeClass('error');
    $.post(url,data,function (response){
        toggleButton(submit);
        removeFormErrors(form);
        toastr.success(response.message);
        if(form.attr('on-success')){
            handelCallback(form.attr('on-success'), response, data);
        }else if(success){
            success(response, data);
        }else{
            if(response.redirect){
                window.location.href = response.redirect;
            } else if(response.reload){
                window.location.reload();
            }
        }
    }).fail(function (error) {
        toggleButton(submit);
        toastr.error(error.responseJSON.message);
        if(form.attr('on-fail')){
            handelCallback(form.attr('on-fail'), error.responseJSON, data);
        }else if(fail){
            fail(error.responseJSON, data);
        }
        showFormErrors(form, error.responseJSON);
    });
}

function showFormErrors(form, response) {
    if(!response.hasOwnProperty('errors')){
        removeFormErrors(form);
        return
    }
    var errorsItems = '';
    $.each(response.errors, function (name,error) {
        var element = form.find('[name='+name+']');
        element.addClass('error');
        errorsItems += "<li>"+error[0]+"</li>";
    });
    if(!errorsItems > 0){
        form.find('.errormsg').remove();
        return;
    }
    if(form.find('.errormsg').length > 0){
        form.find('.errormsg .sb-msg ul').html(errorsItems);
        return;
    }
    var errorCont = $('<div>').addClass('col_full style-msg2 errormsg');
    var errorsMessages = $('<div>').addClass('sb-msg');
    var errorsList = $('<ul>').html(errorsItems);
    errorsMessages.html(errorsList);
    errorCont.html(errorsMessages);
    form.prepend(errorCont);
}
function removeFormErrors(form) {
    form.find('input.error, select.error').removeClass('error');
    form.find('.errormsg').remove();
}
function handelCallback(callback, res, data) {
    if (typeof(callback) === 'string') {
        var objects = callback.split('.');
        var fn = window[objects[0]];
        for (var i = 1; i < objects.length; i++)
            fn = fn[objects[i]];
        if (typeof(fn) === 'function') {
            fn(res, data);
        }
    } else if (typeof callback === "function") {
        callback(true, res, data);
    }
}

function initAutoForm() {
    $('.auto-form').each(function(){
        $(this).on('submit',function (e) {
            e.preventDefault();
            submitForm($(this))
        });
    });
}
function ajaxLinks() {
    $('a.ajax').each(function(){
        var $this=$(this);
        var data=$this.attr('data-params') || "";
        var method=$this.attr('data-method') || "GET";
        data="_method="+method+'&'+data;
        $this.on('click',function (e) {
            e.preventDefault();
            var handler=function () {
                $.ajax({
                    url:$this.attr('href'),
                    'success':function(res){
                        if($this.attr('on-success')) {
                            handelCallback($this.attr('on-success'), res);
                        }
                        if($this.attr('reload')) {
                            window.location.reload();
                        }
                        _ajaxLink_onSuccess(res);
                    },
                    'error':function(res){
                        if($this.attr('on-success'))
                            handelCallback($this.attr('on-success'),res);_ajaxLink_onFail(res)
                        ;},
                    'method': method==="GET" ? "GET" : "POST" ,
                    'data':data
                });
            };
            if(typeof($this.attr('confirm')) !== 'undefined'){
                confirm(function () {
                    handler();
                });
            }else{
                handler();
            }
        });
    });
}
function _ajaxLink_onFail(response){
    if(response.responseJSON.message)
        toastr.error(response.responseJSON.message);
    else console.log(response)
}
function _ajaxLink_onSuccess(response){
    if(response.message)
        toastr.success(response.message);
    if(response.reload)
        window.location.reload();
    if(response.redirect)
        window.location.href = response.redirect;
}