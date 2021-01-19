// App.js

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);


import compLoginComponent from './components/LoginComponent.vue';
import compRegisterComponent from './components/RegisterComponent.vue';
import compUserComponent from './components/UserComponent.vue';

import compHomeComponent from './components/HomeComponent.vue';


import compAddCourse from './components/course/AddCourse.vue';
import compCourseTable from './components/course/CourseTable.vue';
import compEditCourse from './components/course/EditCourse.vue';


import compAddRoom from './components/room/AddRoom.vue';
import compEditRoom from './components/room/EditRoom.vue';
import compRoomTable from './components/room/RoomTable.vue';

import compCreateSession from './components/session/createSession.vue';
import compSelectSession from './components/session/SelectSession.vue';
import compAddSemester from './components/session/AddSemester.vue';
import compAssignCourse from './components/session/AssignCourse.vue';
import compManualAssign from './components/session/ManualAssign.vue';
import compRoutine from './components/session/Routine.vue';

import compTeacherTable from './components/user/TeacherTable.vue';
import compEditUser from './components/user/EditUser.vue';


const routes = [
    {
        name: 'login',
        path: '/',
        component: compLoginComponent
    },
    {
        name: 'register',
        path: '/register',
        component: compRegisterComponent
    },
    {
        name: 'user',
        path: '/user',
        component: compUserComponent,
        children:[
                {
                    name: 'home',
                    path: '/',
                    component: compHomeComponent
                },
                {
                    name: 'addcourse',
                    path: 'addcourse',
                    component: compAddCourse
                },
                {
                    name: 'editcourse',
                    path: 'editcourse/:id',
                    component: compEditCourse
                },
                {
                    name: 'addroom',
                    path: 'addroom',
                    component: compAddRoom
                },
                {
                    name: 'editroom',
                    path: 'editroom/:id',
                    component: compEditRoom
                },
                {
                    name: 'courses',
                    path: 'courses',
                    component: compCourseTable
                },
                {
                    name: 'rooms',
                    path: 'rooms',
                    component: compRoomTable
                },
                {
                    name: 'createsession',
                    path: 'createsession',
                    component: compCreateSession
                },
                {
                    name: 'selectsession',
                    path: 'selectsession',
                    component: compSelectSession
                },
                {
                    name: 'addsemester',
                    path: 'addsemester/:id',
                    component: compAddSemester
                },
                {
                    name: 'assigncourse',
                    path: 'assigncourse/:id',
                    component: compAssignCourse
                },
                {
                    name: 'manualassign',
                    path: 'manualassign/:id',
                    component: compManualAssign
                },
                 {
                    name: 'routine',
                    path: 'routine/:session/:day',
                    component: compRoutine
                },
                {
                    name: 'teachers',
                    path: 'teachers',
                    component: compTeacherTable
                },
                {
                    name: 'edituser',
                    path: 'edituser/:id',
                    component: compEditUser
                }
                

                

        ]
    }
  ];




const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');


//import compDataTable from './components/DataTable.vue';