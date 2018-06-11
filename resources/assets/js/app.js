
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('datatables.net/js/jquery.dataTables.js');
require('axios/dist/axios.js');

import Vue from 'vue'; // Importing Vue Library
import VueRouter from 'vue-router'; // importing Vue router library

window.Vue = Vue;
Vue.use(VueRouter);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('product', require('./components/ProductComponent.vue'));
Vue.component('product-cart', require('./components/ProductCart.vue'));
Vue.component('product-modal-choose', require('./components/ProductModalChoose.vue'));
Vue.component('the-cart-header', require('./components/TheCartHeader.vue'));
Vue.component('the-cart-content', require('./components/TheCartContent.vue'));
