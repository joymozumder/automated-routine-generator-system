<template>
     <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">
                
                <!-- component -->
                 <div class="flex">

                </div>

                
                   
                    <nav class="list-reset flex flex-col">
                        <router-link v-if="se==1" tag="a" class="block border-b border-light-border px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-100 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none hover:no-underline focus:shadow-outline" to="/user/session"><i class="fas fa-tachometer-alt float-left mx-2"></i>Session</router-link>
                        
                        <router-link v-else @click.native="checkse" tag="a" class="block border-b border-light-border px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none hover:no-underline hover:shadow-outline" to="/user/session"><i class="fas fa-tachometer-alt float-left mx-2"></i>Session</router-link>
                        
                        <router-link v-if="cou==1"  tag="a" class="block border-b border-light-border px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-100 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none hover:no-underline focus:shadow-outline" to="/user/courses"><i class="fab fa-wpforms float-left mx-2"></i>Courses</router-link>
                        <router-link v-else @click.native="checkcou" tag="a" class="block border-b border-light-border px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none hover:no-underline hover:shadow-outline" to="/user/courses"><i class="fab fa-wpforms float-left mx-2"></i>Courses</router-link>
                        
                        <router-link v-if="tc==1" tag="a" class="block border-b border-light-border px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-100 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none hover:no-underline focus:shadow-outline" to="/user/teachers"><i class="fas fa-table float-left mx-2"></i>Teachers</router-link>
                        <router-link v-else  @click.native="checktc" tag="a" class="block border-b border-light-border px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none hover:no-underline hover:shadow-outline" to="/user/teachers"><i class="fas fa-table float-left mx-2"></i>Teachers</router-link>
                        <router-link v-if="ses==1" tag="a" class="block border-b border-light-border px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-100 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none hover:no-underline focus:shadow-outline" to="/user/sessions"><i class="fab fa-uikit float-left mx-2"></i>Sessions</router-link>
                        <router-link v-else  @click.native="checkses" tag="a" class="block border-b border-light-border px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none hover:no-underline hover:shadow-outline" to="/user/sessions"><i class="fab fa-uikit float-left mx-2"></i>Sessions</router-link>
                        <router-link v-if="rm==1" tag="a" class="block border-b border-light-border px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-100 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none hover:no-underline focus:shadow-outline" to="/user/rooms"> <i class="fas fa-square-full float-left mx-2"></i>Rooms</router-link>
                        <router-link v-else  @click.native="checkrm" tag="a" class="block border-b border-light-border px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none hover:no-underline hover:shadow-outline" to="/user/rooms"> <i class="fas fa-square-full float-left mx-2"></i>Rooms</router-link>
                   
                    </nav>
                
                

            </aside>

            
            <!--  -->
</template>

<script>
export default {
    data(){
        return{
            se:1,
            ses:0,
            cou:0,
            rm:0,
            tc:0
        }
    },
    methods:{
        test(){
            console.log("testing ok");
        },
        checkse(){
            this.se=1;
            this.ses=0;
            this.cou=0;
            this.rm=0;
            this.tc=0;
            console.log("testing");
        },
        checkses(){
            this.se=0;
            this.ses=1;
            this.cou=0;
            this.rm=0;
            this.tc=0;
            console.log("testing");
        },
        checkcou(){
            this.se=0;
            this.ses=0;
            this.cou=1;
            this.rm=0;
            this.tc=0;
            console.log("testing");
        },
        checkrm(){
            this.se=0;
            this.ses=0;
            this.cou=0;
            this.rm=1;
            this.tc=0;
            console.log("testing");
        },
        checktc(){
            this.se=0;
            this.ses=0;
            this.cou=0;
            this.rm=0;
            this.tc=1;
            console.log("testing");
        }
    }
}
</script>