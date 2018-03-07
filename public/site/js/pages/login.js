function loginSuccess(response) {
    var expiration = response.expires_in + new Date(Date.now()+(new Date().getTimezoneOffset()*60000)).getTime()/1000|0;
    localStorage.setItem('token', response.access_token);
    localStorage.setItem('expiration', expiration);
    localStorage.setItem('user', JSON.stringify(response.user));
    $.ajaxSetup({
        headers: {"Authorization": 'Bearer ' + localStorage.getItem('token')}
    });
    $.cookie('token',response.access_token);
    window.location.reload();
}