<template>
    <main class="bg-white-500 flex-1 p-3 overflow-hidden">
        <div class="flex flex-col">
                        <!-- Card Sextion Starts Here -->
                        <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
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
                                            <div class="md:w-1/3"></div>
                                            <div class="md:w-2/3">
                                               
                               

                                                    <button class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-full">
                                                        <router-link :to="{name: 'manualassign', params: { id: select }}" >ManualAssign</router-link>
                                                    </button>
                                                    <button class="bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-full">
                                                        <router-link :to="{name: 'addsemester', params: { id: select }}" >Semester</router-link>
                                                    </button>
                                                    <button class="bg-orange-500 hover:bg-orange-800 text-white font-bold py-2 px-4 rounded-full">
                                                        <router-link :to="{name: 'assigncourse', params: { id: select }}" >Course</router-link>
                                                    </button>
                                

                                
                                
                            
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
    }
   
  }
</script>



