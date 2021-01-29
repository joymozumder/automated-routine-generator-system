<template>
    <main class="bg-white-500 flex-1 p-3 overflow-hidden">
        <div class="flex flex-col">
                        <!-- Card Sextion Starts Here -->
                        <div class="container mx-auto h-full flex flex-1 justify-center items-center">
                            <!--Horizontal form-->
                            <div class="mb-2 border-solid border-grey-light rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
                                <div class="bg-gray-300 px-2 py-3 border-solid border-gray-400 border-b">
                                   Add Semester 
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
                                                <input class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                    id="inline-full-name" v-model="semester.session_name" readonly type="text" >
                                            </div>
                                        </div>

                                        <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Semester
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <select class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                        v-model="semester.semester" id="grid-state">
                                                        <option value="1">1st Semester</option>
                                                        <option value="2">2nd Semester</option>
                                                        <option value="3">3rd Semester</option>
                                                        <option value="4">4th Semester</option>
                                                        <option value="5">5th Semester</option>
                                                        <option value="6">6th Semester</option>
                                                        <option value="7">7th Semester</option>
                                                        <option value="8">8th Semester</option>
                                                    </select>
                                                    
                                            </div>
                                        </div>

                                         <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Section
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <label class="inline-flex items-center">
                                                    <input type="checkbox" v-model="semester.section" value="a" class="form-checkbox" >
                                                    <span class="ml-2"> A</span>
                                                </label>
                                                <label class="inline-flex items-center p-2">
                                                    
                                                </label>
                                                <label class="inline-flex items-center ">
                                                    <input type="checkbox" v-model="semester.section" value="b" class="form-checkbox" >
                                                    <span class="ml-2">  B</span>
                                                </label>
                                                <label class="inline-flex items-center p-2">
                                                    
                                                </label>
                                                <label class="inline-flex items-center">
                                                    <input type="checkbox" v-model="semester.section" value="c" class="form-checkbox" >
                                                    <span class="ml-2">  C</span>
                                                </label>
                                                <label class="inline-flex items-center p-2">
                                                    &nbsp;
                                                </label>
                                                <label class="inline-flex items-center">
                                                    <input type="checkbox" v-model="semester.section" value="d" class="form-checkbox" >
                                                    <span class="ml-2">  D</span>
                                                </label>
                                                <label class="inline-flex items-center p-2">
                                                    
                                                </label>
                                                <label class="inline-flex items-center">
                                                    <input type="checkbox" v-model="semester.section" value="e" class="form-checkbox" >
                                                    <span class="ml-2">  E</span>
                                                </label>
                                                    
                                            </div>
                                        </div>
                                        
                                       
                                        
                                       <div class="md:flex md:items-center">
                                            <div class="md:w-1/3"></div>
                                            <div class="md:w-2/3">
                                                <button @click.prevent="addSemester" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                                    Add Semester
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

      data() {
        return {
          semester: {
                semester:"",
                section:[],
                total_student:0,
                session_name:"",
                status:true
          },
        }
      },
      created() {
          this.semester.session_name=this.$route.params.session;

        
       
      },
      methods: {
         addSemester() {

             console.log(this.semester);
             let uri = '/api/semester-section/create';
             this.axios.post(uri, this.semester).then((response) => {
               this.$router.push({name: 'sessions'});
             });
         },
      
      }
    }
</script>
