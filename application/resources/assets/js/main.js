import './bootstrap';
// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import App from './App';
import Auth from './Auth';
import router from './router';
import VueI18n from 'vue-i18n';
import swal from 'sweetalert';
import select2 from 'select2';
window.bootbox = require('bootbox');


Vue.use(VueI18n)
// ESM
import VueTransmit from "vue-transmit";

// Browser
window.VueTransmit

// Installation
Vue.use(VueTransmit)

// Form Stuff
import Page from './components/PageComponent';
import WidgetBox from './components/WidgetBoxComponent';
import BsPanel from './components/PanelComponent';
import BsForm from './components/form/FormComponent';
import BsInput from './components/form/InputComponent';
import BsCheckbox from './components/form/CheckboxComponent';
import BsSelect from './components/form/SelectComponent';
import BsTextarea from './components/form/TextareaComponent';
import TreeView from './components/TreeViewComponent';
import FileInput from './components/form/FileInputComponent';
import Autocomplete from './components/form/AutocompleteComponent';
import Select2 from './components/form/Select2Component';
import MultiSelect2 from './components/form/MultiSelect2Component';

Vue.component('page', Page);
Vue.component('widget-box', WidgetBox);
Vue.component('bs-panel', BsPanel);
Vue.component('bs-form', BsForm);
Vue.component('bs-input', BsInput);
Vue.component('bs-checkbox', BsCheckbox);
Vue.component('bs-select', BsSelect);
Vue.component('bs-textarea', BsTextarea);
Vue.component('tree-view', TreeView);
Vue.component('file-input', FileInput);
Vue.component('Autocomplete',Autocomplete);
Vue.component('bs-select2',Select2);
Vue.component('bs-multi-select2',MultiSelect2);

import Locales from './lang/Locales';
const messages = Locales;
// Create VueI18n instance with options
const i18n = new VueI18n({
  locale: 'ar', // set locale
  messages, // set locale messages
})

$.extend( true, $.fn.dataTable.defaults, {
    language:messages.ar.dataTable,
    pagingType: "full_numbers"
} );

Vue.config.productionTip = false

router.beforeEach(
    (to, from, next) => {
        if(Vue.auth.check()){
            window.axios.defaults.headers.common['Authorization'] = Vue.auth.getTokenBearer();
            $.ajaxSetup({
                headers: {"Authorization":  Vue.auth.getTokenBearer()}
            });
        }
        if(to.path == '/404' && Vue.auth.check()){
            next('/not-found');
        }
        else if(to.matched.some(record => record.meta.isAdmin)){
            if(Vue.auth.isAdmin()){
                next();   
            }else{
                window.location.reload();
            }
        }
        else if(to.matched.some(record => record.meta.auth)){
            if(Vue.auth.check()){
                next();   
            }else{
                window.location.reload();
            }
        }
        else if(to.matched.some(record => record.meta.forVisitors)){
            Vue.auth.check() ? next('/home') : next();
        }else{
            next();
        }
    }
);

new Vue({
	el: '#app',
	router,
	template: '<App/>',
	components: { App },
	i18n,
});
