// App.js

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);
import compExampleComponent from './components/ExampleComponent.vue';

const routes = [
    {
        name: 'home',
        path: '/',
        component: compExampleComponent
    }
  ];

/* //this are like the basic setup file
import compHomeComponent from './components/HomeComponent.vue';
import compCreateComponent from './components/CreateComponent.vue';
import compIndexComponent from './components/IndexComponent.vue';
import compEditComponent from './components/EditComponent.vue';

const routes = [
 {
     name: 'home',
     path: '/',
     component: compHomeComponent
 },
 {
     name: 'create',
     path: '/create',
     component: compCreateComponent
 },
 {
     name: 'posts',
     path: '/posts',
     component: compIndexComponent
 },
 {
     name: 'edit',
     path: '/edit/:id',
     component: compEditComponent
 }
];
*/

const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');