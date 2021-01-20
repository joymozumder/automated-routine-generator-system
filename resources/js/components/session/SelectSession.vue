<template>
    <main class="bg-white-500 flex-1 p-3 overflow-hidden">
        <div class="flex flex-1">
                        <!-- Card Sextion Starts Here -->
                        <div class="container mx-auto h-full flex flex-1 justify-center items-center">
                            <!--Horizontal form-->
                            <div class="mb-2 border-solid border-grey-light rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
                                <div class="bg-gray-300 px-2 py-3 border-solid border-gray-400 border-b">
                                    Select Session
                                </div>
                                <div class="p-3">
                                    <form class="w-full">
                                        <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Session Name
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <select  class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                          v-model="select"  id="grid-state">
                                                        <option v-for="session in sessions" :key="session.id">{{session.session_name}}</option>
                                                       
                                                    </select>
                                            </div>
                                        </div>
                                        
                                       <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/3"></div>
                                            <label class="md:w-2/3 block text-grey font-regular">
                                                <input class="mr-2 leading-tight" value="true" v-model="sessions.status" type="checkbox">
                                                <span class="text-sm">
                                                    Status
                                                </span>
                                            </label>
                                        </div>

                                        
                                        <div class="md:flex md:items-center">
                                            <!--<div class="md:w-1/4"></div>-->
                                            <div class="md:w-full">
                                               
                               
                                                    <div v-if="select_2==0">   
                                                        <router-link tag="button" class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-1 px-1 rounded-full" :to="{name: 'manualassign', params: { id: select }}" >ManualAssign</router-link>
                                                        <router-link tag="button" class="bg-green-500 hover:bg-green-800 text-white font-bold py-1 px-1 rounded-full" :to="{name: 'addsemester', params: { id: select }}" >Add Semester</router-link>
                                                        <router-link tag="button" class="bg-orange-500 hover:bg-orange-800 text-white font-bold py-1 px-1 rounded-full" :to="{name: 'assigncourse', params: { id: select }}" >Assign Course</router-link>
                                                        <button class="bg-red-500 hover:bg-orange-800 text-white font-bold py-1 px-1 rounded-full" @click.prevent="generateRoutine" >Generate Routine </button>
                                                    
                                                        
                                                        <!-- <button class="bg-red-500 hover:bg-orange-800 text-white font-bold py-1 px-1 rounded-full" @click.prevent="assignSelect" >Show Routine </button>
                                                         -->
                                                        
                                                        <button class="bg-red-500 hover:bg-orange-800 text-white font-bold py-1 px-1 rounded-full" @click.prevent="select_2=1" >Show Routine </button>
                                                    
                                                   </div>
                                                   
                                                   
                                                   
                                                    <div v-if="select_2==1" class="inset-0 top-0 pt-6">



                                                        <div class="md:flex md:items-center mb-6">
                                                        <div class="md:w-1/4">
                                                            <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                                for="inline-course-code">
                                                                Select Day
                                                            </label>
                                                        </div>
                                                        <div class="md:w-3/4">
                                                                <select v-model="day" class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                                        id="grid-state">
                                                                        <option value=1>Saturday</option>
                                                                        <option value=2>Sunday</option>
                                                                        <option value=3>Monday</option>
                                                                        <option value=4>Tuesday</option>
                                                                        <option value=5>Wednesday</option>
                                                                        <option value=6>Thursday</option>
                                                                    
                                                                    </select>
                                                            </div>
                                                        </div>
                                


                                                        <router-link tag="button" class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-1 px-1 rounded-full" :to="{name: 'routine', params: { session: select,day:day }}" >Show</router-link>
                                                        <!-- :to="{name: 'routine', params: { session: select }}" -->
                                                    
                                                   </div>


                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--/Horizontal form-->

                        
                        </div>


                        <!-- /Cards Section Ends Here -->

                    <!-- <router-link to="'/dashboard-user/id/vendor-detail/' + board.id" class="db link dim tc grow dashboard--card">
            <img src="../../assets/img/print1.png" alt="Profil Percetakan" class="w-100 db"/> -->
                    </div>
    </main>               
</template>

<script>
    export default {
        data(){
        return {
          select:"",
          select_2:0,
          day:0,
          sessions:{
                
                session_name:"",
                status:false
          }

        }
        
    },
    created() {
        let uri = '/api/sessions';
        this.axios.get(uri).then(response => {
          this.sessions = response.data.data;
          console.log(this.sessions);
        });
    },
    methods:{
          generateRoutine(){
              console.log("hello")
             let uri = `/api/routine/generate/${this.select}`;
             console.log(uri);
            this.axios.get(uri).then(response => {
          		  
		});
             
          },

          assignSelect(){
              this.select_2=1;
              //cosole.log(this.day);
          }

     
      }
   
  }
</script>



