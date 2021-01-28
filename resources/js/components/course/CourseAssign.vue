<template>
    <main class="bg-white-500 flex-1 p-3 overflow-hidden">
        <div class="flex flex-col">
                        <!-- Card Sextion Starts Here -->
                        <div class="container mx-auto h-full flex flex-1 justify-center items-center">
                            <!--Horizontal form-->
                            <div class="mb-2 border-solid border-grey-light rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
                                <div class="bg-gray-300 px-2 py-3 border-solid border-gray-400 border-b">
                                    Course Assign
                                </div>
                                <div class="p-3">
                                     <form class="max-w-xl p-1 ">

                                        <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Session Name
                                                </label>
                                            </div>
                                            

                                           
                                             <div class="md:w-3/4">
                                                <input class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                    id="inline-full-name" v-model="semester.assigncourse.session_name" readonly type="text" >
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
                                                          v-model="assigncourse.semester"  id="grid-state">
                                                        
                                                        <option v-for="semester in semesters" :key="semester.id">{{semester.semester}}</option>
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
                                                           v-model="assigncourse.teacher_code" id="grid-state">
                                                        
                                                        <option v-for="teacher in teachers" :key="teacher.id">{{teacher.code}}</option>
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
                                                          v-model="assigncourse.course_code"  id="grid-state">
                                                        
                                                        <option v-for="course in courses" :value="course.code" :key="course.id">{{course.name}} - {{course.code}}</option>
                                                    </select>
                                                    
                                            </div>
                                        </div>

                                        <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Number of Class
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                 <input type="radio"  value="One"  v-model="numberofclass" > One
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                 
                                                <input type="radio" value="Two" v-model="numberofclass"> Two
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" value="Three" v-model="numberofclass"> Three
                                                    
                                            </div>
                                        </div>

                                        <div class="md:flex md:items-center mb-6" v-if="numberofclass=='One' || numberofclass=='Two' || numberofclass=='Three' ">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Duration
                                                </label>
                                            </div>
                                            <div v-if="numberofclass=='One' || numberofclass=='Two' || numberofclass=='Three' ">
                                                <select class="block appearance-none  bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4  rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                          v-model="assigncourse.duration[0]"  id="grid-state" >
                                                        <option value=1     >01 : 00</option>
                                                        <option value=1.5   >01 : 30</option>
                                                        <option value=2     >02 : 00</option>
                                                        <option value=2.5   >02 : 30</option>
                                                        <option value=3     >03 : 00</option>
                                                        <option value=3.5   >03 : 30</option>
                                                        <option value=4     >04 : 00</option>

                                                </select> 
                                            </div>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <div v-if=" numberofclass=='Two' || numberofclass=='Three' ">
                                                <select class="block appearance-none  bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4  rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                          v-model="assigncourse.duration[1]"  id="grid-state">
                                                        
                                                        <option value=1     >01 : 00</option>
                                                        <option value=1.5   >01 : 30</option>
                                                        <option value=2     >02 : 00</option>
                                                        <option value=2.5   >02 : 30</option>
                                                        <option value=3     >03 : 00</option>
                                                        <option value=3.5   >03 : 30</option>
                                                        <option value=4     >04 : 00</option>
                                                </select>
                                            </div>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <div v-if=" numberofclass=='Three' ">
                                                <select class="block appearance-none  bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4  rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                          v-model="assigncourse.duration[2]"  id="grid-state">
                                                        
                                                        <option value=1     >01 : 00</option>
                                                        <option value=1.5   >01 : 30</option>
                                                        <option value=2     >02 : 00</option>
                                                        <option value=2.5   >02 : 30</option>
                                                        <option value=3     >03 : 00</option>
                                                        <option value=3.5   >03 : 30</option>
                                                        <option value=4     >04 : 00</option>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Number of Group
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                 <input type="radio"  value="One"  v-model="numberofgroup" > One
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                 
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" value="Two" v-model="numberofgroup"> Two
                                                    
                                            </div>
                                        </div>

                                        <div class="md:flex md:items-center mb-6" v-if="numberofgroup=='One' || numberofgroup=='Two' ">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Total Student
                                                </label>
                                            </div>
                                            <div v-if="numberofgroup=='One' || numberofgroup=='Two' ">
                                                <input class="block appearance-none  bg-grey-200 border border-grey-200 text-grey-darker py-3 px-0.5  rounded  focus:outline-none focus:bg-white focus:border-grey"
                                                  v-model="assigncourse.group[0]" id="inline-full-name" type="number" placeholder="group 1">
                                            </div>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <div v-if=" numberofgroup=='Two' ">
                                                <input class="block appearance-none  bg-grey-200 border border-grey-200 text-grey-darker py-3 px-0.5  rounded  focus:outline-none focus:bg-white focus:border-grey"
                                                  v-model="assigncourse.group[1]" id="inline-full-name" type="number" placeholder="group 2">
                                            </div>
                                          
                                        </div>
                                       









                                        



                                        







                                       





                        

                            <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/3"></div>
                                            <div class="md:w-2/3">
                                                <button @click.prevent="assignCourse" class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-full">
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
        data(){
                return {
                selected_session:"",
                active_session:"",
                sessions:{
                        
                        session_name:"",
                        status:true
                },
                newSessions:{
                        
                        session_name:"",
                        status:true
                },
                semester: {
                    semester:"",
                    section:[],
                    total_student:0,
                    session_name:"",
                    status:true
                },

          //**************/
          numberofclass:"select",
          numberofgroup:"select",
          select_2:0,
          day:0,
          //session:{},
          semesters:{},
          teachers:{},
          courses:{},
          rooms:{},
          assigncourse:{
              session_name:"",
              semester:"",
              teacher_code:"",
              course_code:"",
              room_number:0,
              day:0,
              group:[],
              duration:[]
          },
          savecourse:{
              session_name:"",
              semester:"",
              teacher_code:"",
              course_code:"",
              room_number:0,
              group:0,
              //group2:0,
              day:0,
              duration1:0,
              duration2:0,
              total_student1:0,
              total_student2:0
          }
          /*****************/

        }
        
    },
    created() {

        
        this.assigncourse.session_name = this.$route.params.id;

        let uri = `/api/teachers`;
            
        this.axios.get(uri).then((response) => {
            this.teachers = response.data.data;
            //console.log(this.teachers);
        });

        uri = `/api/courses`;
            
        this.axios.get(uri).then((response) => {
            this.courses = response.data.data;
            //console.log(this.courses);
        });
       

        uri = `/api/semester-sections`;
            
        this.axios.get(uri).then((response) => {
            this.semesters = response.data.data;
            console.log(this.semesters);
        });

         uri = '/api/sessions';
        this.axios.get(uri).then(response => {
          this.sessions = response.data.data;
          console.log(this.sessions.length);
          //this.checkSelectedSession();
        });
    },
    methods:{

      
      
      assignCourse()
          {
              
                console.log(this.assigncourse);
                let uri = '/api/enrollment/create';
                this.axios.post(uri, this.savecourse).then((response) => {
                    //this.$router.push({name: 'assigncourses'});
                //this.$router.go(-1);
          });
            },
           
        
          

        
          


     
      }
   
  }
</script>



