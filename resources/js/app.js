
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import { Form, HasError, AlertError } from 'vform';

window.events = new Vue();
  
window.flash = function(message) {
    window.events.$emit('flash',message);
}

window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import VueRouter from 'vue-router'

import Swal from 'sweetalert2'
window.Swal = Swal ;


Vue.use(VueRouter)

let routes = [
    { path: '/dashboard', component: require('./components/dashboard.vue').default},
    { path: '/dashboard/users', component: require('./components/users.vue').default},
    { path: '/dashboard/jobs', component: require('./components/jobs.vue').default},
    { path: '/dashboard/profile', component: require('./components/profile.vue').default},
    { path: '/dashboard/developper', component: require('./components/developper.vue').default},
    { path: '/dashboard/subscribe', component: require('./components/subscribe.vue').default},
    { path: '/dashboard/message', component: require('./components/message.vue').default}
  ]

  const toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

  window.toast = toast;

  const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
  })

  window.Fire = new Vue();


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('autocomplete', require('./components/Autocomplete.vue'));

// Vue.component('flash', require('./components/Flash.vue'));


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


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
