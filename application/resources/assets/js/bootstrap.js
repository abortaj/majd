import Vue from 'vue';
import VueResource from 'vue-resource';
import axios from 'axios';
import Form from './packages/form/Form';
import Auth from './packages/auth/Auth.js';
import Helpers from './packages/Helpers.js';
import Api from './api/index.js';

try {
    window.$ = window.jQuery = require('jquery');
    require('bootstrap-sass');
} catch (e) {}

window.Vue = Vue;
window.VueResource = VueResource;
Vue.use(Auth);
Vue.use(Api);
Vue.use(Helpers);

window.axios = axios;
window.Form = Form;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let csrf = document.head.querySelector('meta[name="csrf-token"]');

if (csrf) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = csrf.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}


// Modernizr
import '../vendor/modernizr.js';

// Local storage
import '../vendor/jQuery-Storage-API/jquery.storageapi.js';

// jQuery easing
import '../vendor/jquery.easing/js/jquery.easing.js';

// Whirl
import '../vendor/whirl/dist/whirl.css';

// Animo
import '../vendor/animo/animo.js';

// Animate.CSS
import '../vendor/animate.css/animate.min.css';

// fastclick
import '../vendor/fastclick/lib/fastclick.js';

// jQuery UI
import '../vendor/jquery-ui/jquery-ui.js';
import '../vendor/jqueryui-touch-punch/jquery.ui.touch-punch.min.js';

// Slimscroll
import '../vendor/jquery-slimscroll/jquery.slimscroll.min.js';

// Datatable
// import '../vendor/datatables/media/js/jquery.dataTables.min.js';
import '../vendor/datatables/media/js/dataTables.bootstrap.js';

// App
import '../vendor/app.js';