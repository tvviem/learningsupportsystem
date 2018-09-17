
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import moment from 'moment';
// Using beautiful alert
import swal from 'sweetalert2';
window.swal = swal;
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
window.toast = toast;

import VueRouter from 'vue-router'
Vue.use(VueRouter)

// progress bar
import VueProgressBar from 'vue-progressbar'
const options = {
    color: '#77ffb9',
    failedColor: '#f23030',
    thickness: '5px',
    transition: {
      speed: '0.5s',
      opacity: '0.6s',
      termination: 300
    },
    autoRevert: true,
    location: 'top',
    inverse: false
}
Vue.use(VueProgressBar, options)

// vform lib for package attribute, to easy send to server
import { Form, HasError, AlertError } from 'vform'
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form;

let routes = [
    { path: '/dashboard', component: require('./components/Dashboard.vue') },
    { path: '/developer', component: require('./components/Developer.vue') },
    { path: '/users', component: require('./components/Users.vue') },
    { path: '/profile', component: require('./components/Profile.vue') }
]
const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

window.Fire = new Vue();

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

const app = new Vue({
    el: '#app',
    router
});
// Filter and Show custom text to client
Vue.filter('upText', function(text) {
    return text.charAt(0).toUpperCase() + text.slice(1)
})
// Filter and Show custome datetime to client
Vue.filter('showDate', function(created) {
    return moment(created).format('DD/MM/YYYY, h:mm:ss a')
})
