<template>
    <main class="bg-white-500 flex-1 p-3 overflow-hidden">
        <div class="flex flex-col">
                        <!-- Card Sextion Starts Here -->
                        <div class="container mx-auto h-full flex flex-1 justify-center items-center">
                            <!--Horizontal form-->
                            <div class="mb-2 border-solid border-grey-light rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
                                <div class="bg-gray-300 px-2 py-3 border-solid border-gray-400 border-b">
                                    Update Enrollment
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
                                                <select class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                           v-model="enrollment.session_name" id="grid-state">
                                                        
                                                        <option v-for="session in sessions" :key="session.id">{{session.session_name}}</option>
                                                    </select>
                                                    
                                            </div>
                                        </div>


                                        <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Teacher Code
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <select class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                           v-model="enrollment.teacher_code" id="grid-state">
                                                        
                                                        <option v-for="teacher in teachers" :key="teacher.id">{{teacher.code}}</option>
                                                    </select>
                                                    
                                            </div>
                                        </div>


                                        <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Course Code
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <select class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                           v-model="enrollment.course_code" id="grid-state">
                                                        
                                                        <option v-for="course in courses" :key="course.id">{{course.code}}</option>
                                                    </select>
                                                    
                                            </div>
                                        </div>

                                       
                                        

                                        
                                       

                                        
                                        <div class="md:flex md:items-center">
                                            <div class="md:w-1/3"></div>
                                            <div class="md:w-2/3">
                                                <button @click.prevent="updateEnrollment" class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-full">
                                                    Update Session 
                                                </button>
                                            </div>
                                            <div class="md:w-2/3">
                                                 <button @click.prevent="Cancel" class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-full">
                                                    Cancel 
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
          enrollment: {},
          sessions:{},
          courses:{},
          teachers:{},
        }
      },
      created() {

        console.log(this.$route.params.id);
        let uri = `/api/enrollment/edit/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.enrollment = response.data.data; 
            console.log(this.enrollment);
        });

        uri = `/api/teachers`;
            
        this.axios.get(uri).then((response) => {
            this.teachers = response.data.data;
           // console.log(this.teachers);
        });

        uri = `/api/sessions`;
            
        this.axios.get(uri).then((response) => {
            this.sessions = response.data.data;
            //console.log(this.teachers);
        });


        uri = `/api/courses`;
            
        this.axios.get(uri).then((response) => {
            this.courses = response.data.data;
            //console.log(this.courses);
        });




      },
      methods: {
        updateEnrollment() {

            console.log(this.enrollment);
            let uri = `/api/enrollment/update/${this.$route.params.id}`;
            this.axios.post(uri, this.enrollment).then((response) => {
              this.$router.push({name: 'assigncourses'});
            });
        },
        Cancel() {
            this.$router.go(-1);
        }
      }
    }
</script>
