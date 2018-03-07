export default function (Vue) {
    Vue.auth = {

        client_id : 2,
        client_secret : 'egyhHYZPFHl48x2xFDjyxOiw8rjqIYaU0fV0mKh9',

        setToken(token, expiration){
            expiration = expiration + new Date(Date.now()+(new Date().getTimezoneOffset()*60000)).getTime()/1000|0
            localStorage.setItem('token', token);
            localStorage.setItem('expiration', expiration);
        },

        setUser(user){
            localStorage.setItem('user', JSON.stringify(user));
        },

        getToken(){
            let token = localStorage.getItem('token');
            let expiration = localStorage.getItem('expiration');
            let user = JSON.parse(localStorage.getItem('user'));
            if(! token || ! expiration || !user){
                this.destroyToken();
                return null;
            }            
            let now = new Date(Date.now()+(new Date().getTimezoneOffset()*60000)).getTime()/1000|0;
            if(now > parseInt(expiration)){
                this.destroyToken();
                return null;
            }
            return token;
        },

        getTokenBearer(){
            return "Bearer " + localStorage.getItem('token');
        },

        destroyToken(){
            localStorage.removeItem('token');
            localStorage.removeItem('expiration');
            localStorage.removeItem('user');
        },

        logout(){
            this.destroyToken();
        },

        check(){
            return this.getToken() ? true : false;
        },

        isAdmin(){
            let user = JSON.parse(localStorage.getItem('user'));
            if(user){
                return user.type == 'admin';    
            }
            return false;            
        },

        setPermissions(permissions){
            localStorage.setItem('permissions', JSON.stringify(permissions)); 
        },

        can(permission){
            let permissions = JSON.parse(localStorage.getItem('permissions'));
            for(let item in permissions){
                if (permissions[item] == permission) {
                    return true;
                }
            }
            return false;
        },

    };

    Object.defineProperties(Vue.prototype, {
        $auth: {
            get(){
                return Vue.auth;
            }
        }
    });

}