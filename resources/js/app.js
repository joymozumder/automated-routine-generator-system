// App.js

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

//bootstrap table import start

// import Vue from 'vue'
// import { BootstrapVue} from 'bootstrap-vue'
// Vue.use(BootstrapVue)
// import 'bootstrap/dist/css/bootstrap.css'
// import 'bootstrap-vue/dist/bootstrap-vue.css'

//bootstrap table import end




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
import compEditSession from './components/session/EditSession.vue';
import compSessionTable from "./components/session/SessionTable.vue";
import compSessionComponent from './components/session/SessionComponent.vue';



import compAddTeacher from './components/user/AddTeacher.vue';
import compTeacherTable from './components/user/TeacherTable.vue';
import compEditTeacher from './components/user/EditTeacher.vue';


import compRoutine from './components/session/Routine.vue';

import compSemesterCourse from "./components/semester/SemesterCourse.vue";
import compEditSemesterCourse from "./components/semester/EditSemesterCourse.vue";
import compAssignSemesterCourse from './components/semester/AssignSemesterCourse.vue';


//test
import compTest from './components/Test.vue';
import compTest2 from './components/Test2.vue';
import compTest3 from './components/Test3.vue';
import compTest4 from './components/Test4.vue';





const routes = [
    
    {
        name: 'login',
        path: '/login',
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
                    name: 'editsession',
                    path: 'editsession/:id',
                    component: compEditSession
                },
               
                {
                    name: 'session',
                    path: 'session',
                    component: compSessionComponent
                },
               
                {
                    name: 'assigncourse',
                    path: ':id/assigncourse',
                    component: compAssignSemesterCourse
                },
               
                 {
                    name: 'routine',
                    path: 'routine/:session/:day',
                    component: compRoutine
                },
                {
                    name: 'addteacher',
                    path: 'addteacher',
                    component: compAddTeacher
                },
                {
                    name: 'teachers',
                    path: 'teachers',
                    component: compTeacherTable
                },
                {
                    name: 'editteacher',
                    path: 'editteacher/:id',
                    component: compEditTeacher
                },
                {
                    name: 'sessions',
                    path: 'sessions',
                    component: compSessionTable
                },
                {
                    name: 'semestercourse',
                    path: 'semestercourse/:session',
                    component: compSemesterCourse
                },
                {
                    name: 'editsemestercourse',
                    path: 'editsemestercourse/:id',
                    component: compEditSemesterCourse
                },
                // test delete
                {
                    name: 'test',
                    path: 'test',
                    component: compTest
                },
                {
                    name: 'test2',
                    path: 'test2',
                    component: compTest2
                },
                
                {
                    name: 'test3',
                    path: 'test3/:session',
                    component: compTest3
                },
                {
                    name: 'test4',
                    path: 'test4',
                    component: compTest4
                },
                
                
                
                

                

                

        ]
    }
  ];




const router = new VueRouter({ mode: 'history', routes: routes});

router.beforeEach((to,from,next) => {
    if (to.fullPath !== "/login") {
        if(window.localStorage.getItem("userid")=="")
            router.push('/login');
        else next();
    }
    else {
        next();
    }
})

const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');


//import compDataTable from './components/DataTable.vue';