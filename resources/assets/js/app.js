
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

import axios from 'axios';
import Vue from 'vue';
import Vuex from 'vuex';
import store from './store';

window.Vue = Vue;
window.axios = axios;


Vue.use(Vuex);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('counter', require('./components/Counter'));
Vue.component('todos', require('./components/Todos'));
Vue.component('post-list', require('./Post'));
new Vue({
  el: '#app',
  store: new Vuex.Store(store) 
});