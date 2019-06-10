
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

////window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

////Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//// const app = new Vue({
////     el: '#app'
//// });

import Vue from 'vue'
import VueRouter from 'vue-router';
import App from './views/App';
import router from './core/Routes';
// import Api from './core/Api';
import API from "./api/api";
import Auth from './core/Auth';

window.Vue = require('vue');
Vue.use(VueRouter)
window.Event = new Vue; // gère l'authentification avec la classe Auth
// window.api = new Api();
window.api = new API({ url: "/api" });
api.createEntity({ name: "users" });
window.auth = new Auth();
//https://stackoverflow.com/questions/48650107/use-axios-globally-in-all-my-components-vue
Vue.prototype.api = window.api;


Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});