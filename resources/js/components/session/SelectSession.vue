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
                                            <div class="md:w-1/4"></div>
                                            
                                            <div class="md:w-3/4" >
                                                    
                                                    <router-link tag="button" class=" align-middle bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-full" :to="{name: 'createsession'}" v-if="select.length==0 "  >Create Session</router-link>
                                            </div>
                                        </div>
                                        
                                        <div class="md:flex md:items-center">
                                            <!--<div class="md:w-1/4"></div>-->
                                            
                                            <div class="md:w-full" >
                                                    
                                                    <router-link tag="button" class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-2 rounded-full" :to="{name: 'manualassign', params: { id: select }}" v-if="sessions.status==true && select.length!=0 "  >ManualAssign</router-link>
                                                    <router-link tag="button" class="bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-2 rounded-full" :to="{name: 'addsemester', params: { id: select }}" v-if="sessions.status==true && select.length!=0 " >Add Semester</router-link>
                                                    <router-link tag="button" class="bg-orange-500 hover:bg-orange-800 text-white font-bold py-2 px-2 rounded-full" :to="{name: 'assigncourse', params: { id: select }}" v-if="sessions.status==true && select.length!=0 " >Assign Course</router-link>
                                                    <button class="bg-red-500 hover:bg-orange-800 text-white font-bold py-2 px-2 rounded-full" @click.prevent="generateRoutine" v-if="sessions.status==true && select.length!=0 " >Generate Routine </button>
                            
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--/Horizontal form-->

                        
                        </div>


                        <!-- /Cards Section Ends Here -->

                    
                    </div>
    </main>               
</template>

<script>
    export default {
        data(){
        return {
          select:"",
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
             let uri = `/api/routine/generate/${this.select}`;
             console.log(uri);
        this.axios.get(uri).then(response => {
          		  
		});
             
          },

     
      }
   
  }
</script>



