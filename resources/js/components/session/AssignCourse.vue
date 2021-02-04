<template>
 <main class="bg-white-500 flex-1 p-3 overflow-hidden">
        <div class="flex flex-col">
                        <!-- Card Sextion Starts Here -->
                        <div class="container mx-auto h-full flex flex-1 justify-center items-center">
                            <!--Horizontal form-->
                            <div class="mb-2 border-solid border-grey-light rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
                                <div class="bg-gray-300 px-2 py-3 border-solid border-gray-400 border-b">
                                 Assign Semester with course section
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
                                                    id="inline-full-name" type="text" v-model="this.assign_semester.session_name" readonly>
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
                                                        v-model="assign_semester.semester"    id="grid-state">
                                                        
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
                                                    Course
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <select class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                        v-model="assign_semester.course_code" id="grid-state">
                                                        
                                                        <option v-for="course in courses" :key="course.id " :value="course.code">{{course.name}}-{{course.code}}</option>
                                                        
                                                        
                                                    </select>
                                                    
                                            </div>
                                        </div>

                                        

                                <!-- ____________________number of section_____________________________ -->


                                        <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Number of Section
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <select class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                          v-model="number_of_section"  id="grid-state">
                                                        
                                                        <option value=1>1</option>
                                                        <option value=2>2</option>
                                                        <option value=3>3</option>
                                                        <option value=4>4</option>
                                                        <option value=5>5</option>
                                                </select>
                                                    
                                            </div>
                                        </div>


                                        <div v-if="number_of_section>0 && !checkCoursetype()" class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label v-if="number_of_section>0"  class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Section
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <label v-if="number_of_section>0" class="inline-flex items-center">
                                                    <input v-model="assign_semester.section" type="checkbox"  value="a" class="form-checkbox" >
                                                    <span class="ml-2"> A</span>
                                                </label>
                                                
                                                <label v-if="number_of_section>0"  class="inline-flex items-center p-2">
                                                    
                                                </label>
                                            
                                                <label v-if="number_of_section>1" class="inline-flex items-center ">
                                                    <input v-model="assign_semester.section" type="checkbox"  value="b" class="form-checkbox" >
                                                    <span class="ml-2">  B</span>
                                                </label>
                                                <label v-if="number_of_section>1" class="inline-flex items-center p-2">
                                                    
                                                </label>

                                                <label v-if="number_of_section>2" class="inline-flex items-center">
                                                    <input v-model="assign_semester.section" type="checkbox"  value="c" class="form-checkbox" >
                                                    <span class="ml-2">  C</span>
                                                </label>
                                                <label v-if="number_of_section>2" class="inline-flex items-center p-2">
                                                    
                                                </label>
                                                
                                                <label v-if="number_of_section>3" class="inline-flex items-center">
                                                    <input v-model="assign_semester.section" type="checkbox"  value="d" class="form-checkbox" >
                                                    <span class="ml-2">  D</span>
                                                </label>
                                                <label v-if="number_of_section>3" class="inline-flex items-center p-2">
                                                    
                                                </label>
                                                
                                                <label v-if="number_of_section>4" class="inline-flex items-center">
                                                    <input v-model="assign_semester.section" type="checkbox"  value="e" class="form-checkbox" >
                                                    <span class="ml-2">  E</span>
                                                </label>
                                                 <label v-if="number_of_section>4" class="inline-flex items-center p-2">
                                                    
                                                </label>

                                                <!-- <button v-if="number_of_section>0" @click.prevent="Reset" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                                                    Reset
                                                </button> -->
                                                    
                                            </div>
                                        </div>




                                        <div v-if="number_of_section>0 && checkCoursetype()" class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label v-if="number_of_section>0"  class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Section
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <label v-if="number_of_section>0" class="inline-flex items-center">
                                                    <input v-model="assign_semester.section" type="checkbox"  value="a1" class="form-checkbox" >
                                                    <span class="ml-2"> A1</span>
                                                </label>
                                                
                                                <label v-if="number_of_section>0"  class="inline-flex items-center p-2">
                                                    
                                                </label>

                                                <label v-if="number_of_section>0" class="inline-flex items-center">
                                                    <input v-model="assign_semester.section" type="checkbox"  value="a2" class="form-checkbox" >
                                                    <span class="ml-2"> A2</span>
                                                </label>
                                                
                                                <label v-if="number_of_section>0"  class="inline-flex items-center p-2">
                                                    
                                                </label>
                                            
                                                <label v-if="number_of_section>1" class="inline-flex items-center ">
                                                    <input v-model="assign_semester.section" type="checkbox"  value="b1" class="form-checkbox" >
                                                    <span class="ml-2"> B1</span>
                                                </label>
                                                <label v-if="number_of_section>1" class="inline-flex items-center p-2">
                                                    
                                                </label>

                                                <label v-if="number_of_section>1" class="inline-flex items-center ">
                                                    <input v-model="assign_semester.section" type="checkbox"  value="b2" class="form-checkbox" >
                                                    <span class="ml-2"> B2</span>
                                                </label>
                                                <label v-if="number_of_section>1" class="inline-flex items-center p-2">
                                                    
                                                </label>

                                                <label v-if="number_of_section>2" class="inline-flex items-center">
                                                    <input v-model="assign_semester.section" type="checkbox"  value="c1" class="form-checkbox" >
                                                    <span class="ml-2">C1</span>
                                                </label>
                                                <label v-if="number_of_section>2" class="inline-flex items-center p-2">
                                                    
                                                </label>

                                                <label v-if="number_of_section>2" class="inline-flex items-center">
                                                    <input v-model="assign_semester.section" type="checkbox"  value="c2" class="form-checkbox" >
                                                    <span class="ml-2"> C2</span>
                                                </label>
                                                <label v-if="number_of_section>2" class="inline-flex items-center p-2">
                                                    
                                                </label>
                                                
                                                <label v-if="number_of_section>3" class="inline-flex items-center">
                                                    <input v-model="assign_semester.section" type="checkbox"  value="d1" class="form-checkbox" >
                                                    <span class="ml-2"> D1</span>
                                                </label>
                                                <label v-if="number_of_section>3" class="inline-flex items-center p-2">
                                                    
                                                </label>

                                                <label v-if="number_of_section>3" class="inline-flex items-center">
                                                    <input v-model="assign_semester.section" type="checkbox"  value="d2" class="form-checkbox" >
                                                    <span class="ml-2"> D2</span>
                                                </label>
                                                <label v-if="number_of_section>3" class="inline-flex items-center p-2">
                                                    
                                                </label>
                                                
                                                <label v-if="number_of_section>4" class="inline-flex items-center">
                                                    <input v-model="assign_semester.section" type="checkbox"  value="e1" class="form-checkbox" >
                                                    <span class="ml-2">  E1</span>
                                                </label>
                                                 <label v-if="number_of_section>4" class="inline-flex items-center p-2">
                                                    
                                                </label>

                                                <label v-if="number_of_section>4" class="inline-flex items-center">
                                                    <input v-model="assign_semester.section" type="checkbox"  value="e2" class="form-checkbox" >
                                                    <span class="ml-2">  E2</span>
                                                </label>
                                                 <label v-if="number_of_section>4" class="inline-flex items-center p-2">
                                                    
                                                </label>

                                                <!-- <button v-if="number_of_section>0" @click.prevent="Reset" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                                                    Reset
                                                </button> -->
                                                    
                                            </div>
                                        </div>






                                     
                                        
                                        <div class="md:flex md:items-center">
                                            <div class="md:w-1/3"></div>
                                            <div class="md:w-2/3">
                                                <button @click.prevent="assignSemester" class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-full">
                                                    Assign Semester 
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
                test:"",
                session_name:"",
                number_of_section:0,
                courses:[],
                
                assign_semester:{
                    session_name:"",
                    semester:"",
                    course_code:"",
                    section:[],
                }
            
            }
        },
        created() {

            this.assign_semester.session_name=this.$route.params.id;

            let uri = '/api/courses';
            
            this.axios.get(uri).then((response) => {
                this.courses = response.data.data;
                
                console.log(this.courses);
            });
        

            
        },

        methods:{
            assignSemester(){
                console.log(this.assign_semester);
            },
            checkCoursetype(){
                for(var i=0;i<this.courses.length;i++){
                    if(this.courses[i].code==this.assign_semester.course_code && this.courses[i].type!=0)
                        return true;
                            

                 }
                 return false;
             },

            Reset(){
                this.number_of_section=0;
            }
        }

 


    }
</script>
