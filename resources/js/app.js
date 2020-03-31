/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./assets/select2/dist/js/select2');


window.Vue = require('vue');
import store from './store/index'
import Select2 from 'v-select2-component';
 
Vue.component('Select2', Select2);

import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
library.add(faUserSecret)

import VueSweetalert2 from 'vue-sweetalert2';
 
// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';
 
Vue.use(VueSweetalert2);

Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.config.productionTip = false


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
/*
Vue.component('client-passport', require('./components/Clients.vue').default);
Vue.component('authorized-passport', require('./components/AuthorizedClients.vue').default);
Vue.component('pat-passport', require('./components/PersonalAccessTokens.vue').default);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('create-product', require('./components/CreateProduct.vue').default);
Vue.component('all-products', require('./components/Products.vue').default);
Vue.component('all-students', require('./components/Students.vue').default);
*/

Vue.component('key-board', require('./components/Keyboard.vue').default);
Vue.component('home-page', require('./components/Home.vue').default);

Vue.component('globe-page', require('./components/Globe.vue').default);
Vue.component('tnt-page', require('./components/Tnt.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store
});
