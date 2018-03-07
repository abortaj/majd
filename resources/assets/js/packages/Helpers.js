export default function (Vue) {
    Vue.helpers = {
        success(msg){
            jQuery.notify(msg, {status: 'success' , pos: 'top-right'});
        },
        fail(msg){
            jQuery.notify(msg, {status: 'danger' , pos: 'top-right'});
        },

        confirm(callback, message){
            message = message ? message : "هل أنت متأكد من إتمام هذه العملية؟";
            swal({
                text: message,
                buttons: true,
                buttons: ["إلغاء", {closeModal:false, text:"موافق"}],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    callback();
                } 
            });
        },

        alert(text){
            swal({
                text: text,
                buttons: false,
            });
        },

        close(){
            swal.close();
        }

    };

    Object.defineProperties(Vue.prototype, {
        $helpers: {
            get(){
                return Vue.helpers;
            }
        }
    });

}