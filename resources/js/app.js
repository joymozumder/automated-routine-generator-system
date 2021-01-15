// App.js

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);


import compHomeComponent from './components/HomeComponent.vue';
import compAddCourse from './components/course/AddCourse.vue';
import compCourseTable from './components/course/CourseTable.vue';
import compEditCourse from './components/course/EditCourse.vue';


import compAddRoom from './components/room/AddRoom.vue';
import compEditRoom from './components/room/EditRoom.vue';
import compRoomTable from './components/room/RoomTable.vue';

import compTest from './components/Test.vue';
//import compDataTable from './components/DataTable.vue';

const routes = [
    {
        name: 'home',
        path: '/',
        component: compHomeComponent
    },
    {
        name: 'addcourse',
        path: '/addcourse',
        component: compAddCourse
    },
    {
        name: 'editcourse',
        path: '/editcourse/:id',
        component: compEditCourse
    },
    {
        name: 'addroom',
        path: '/addroom',
        component: compAddRoom
    },
    {
        name: 'editroom',
        path: '/editroom/:id',
        component: compEditRoom
    },
    {
        name: 'courses',
        path: '/courses',
        component: compCourseTable
    },
    {
        name: 'rooms',
        path: '/rooms',
        component: compRoomTable
    },
    {
        name: 'test',
        path: '/test',
        component: compTest
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