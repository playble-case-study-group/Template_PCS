
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('left-menu', require('./components/LeftMenu/LeftMenu.vue'));
Vue.component('right-menu', require('./components/RightMenu/RightMenu.vue'));
Vue.component('email', require('./components/Email/Email.vue'));
Vue.component('gallery', require('./components/Gallery/Gallery.vue'));
Vue.component('library', require('./components/Library/library.vue'));


import store from './vuex/store';
import { mapActions } from 'vuex';


const app = new Vue({
    el: '#app',
    store,
    data: function () {
        return {
            user: {}
        }
    },
    methods: mapActions([
        'GET_TASKS',
        'GET_USER',
        'GET_SIMULATION'
    ]),
    mounted() {
        // When the program loads we are going to get the user object and all tasks.  See store.js
        this.GET_TASKS();
        this.GET_USER();
        this.GET_SIMULATION();
    }

});
