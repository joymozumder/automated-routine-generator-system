<template>
 <main class="bg-white-500 flex-1 p-3 overflow-hidden">
        <div class="flex flex-col">
                        <!-- Card Sextion Starts Here -->
                        <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                            <!--Horizontal form-->
                            <div class="mb-2 border-solid border-grey-light rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
                                <div class="bg-gray-300 px-2 py-3 border-solid border-gray-400 border-b">
                                    Assign Course
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
                                                <input class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light"
                                                    id="inline-full-name" type="text" v-model="assigncourse.session_name" readonly>
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



                                       









                                        <div class="md:w-3/4">

                                            <div class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4">
                                                <label for="male">Number of Class
                                                    <input type="radio" value="One" v-model="numberofclass"> One
                                                </label>
                                                <label for="female">
                                                    <input type="radio" value="Two" v-model="numberofclass"> Two
                                                </label>
                                            </div>
                                        </div>


                                         <!--<div v-if="numberofclass=='One' || numberofclass=='Two'" class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Duration 1
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <input class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light"
                                                    v-model="assigncourse.duration[0]" id="inline-full-name" type="number" placeholder="Enter Duration 1">
                                            </div>
                                        </div>-->


                                        <div v-if="numberofclass=='One' || numberofclass=='Two'" class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Duration 1
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <select  v-model="assigncourse.duration[0].hr" name="hours" class="bg-grey-200 appearance-none border-2 border-grey-200 text-grey-darker py-2 px-4 appearance-none outline-none mr-4">
                                                <option value=1>1</option>
                                                <option value=2>2</option>
                                                <option value=3>3</option>
                                                <option value=4>4</option>
                                                <option value=5>5</option>
                                
                                                </select>
                                                <span class="text-xl mr-3">:</span>
                                                <select v-model="assigncourse.duration[0].min" name="minutes" class="bg-grey-200 appearance-none border-2 border-grey-200 text-grey-darker py-2 px-4 appearance-none outline-none mr-4">
                                                <option value=0.0 selected=true>00</option>
                                                <option value=0.5>30</option>
                                                </select>
                                               
                                            </div>
                                        </div>

                                        


                                        <div v-if="numberofclass=='Two'" class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Duration 2
                                                </label>
                                            </div>
                                            <!--<div class="md:w-3/4">
                                                <input class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light"
                                                   v-model="assigncourse.duration[1]" id="inline-full-name" type="number" placeholder="Enter Duration 2">
                                            </div>-->
                                            <div class="md:w-3/4">
                                                <select  v-model="assigncourse.duration[1].hr" name="hours" class="bg-grey-200 appearance-none border-2 border-grey-200 text-grey-darker py-2 px-4 appearance-none outline-none mr-4">
                                                <option value=1>1</option>
                                                <option value=2>2</option>
                                                <option value=3>3</option>
                                                <option value=4>4</option>
                                                <option value=5>5</option>
                                
                                                </select>
                                                <span class="text-xl mr-3">:</span>
                                                <select v-model="assigncourse.duration[1].min" name="minutes"  class="bg-grey-200 appearance-none border-2 border-grey-200 text-grey-darker py-2 px-4 appearance-none outline-none mr-4">
                                                <option value=0.0 selected=true>00</option>
                                                <option value=0.5>30</option>
                                                </select>
                                               
                                            </div>
                                        </div>








                                        <div class="md:w-3/4">

                                            <div class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4">
                                                <label for="male">Number of Group
                                                    <input type="radio" value="One" v-model="numberofgroup"> One
                                                </label>
                                                <label for="female">
                                                    <input type="radio" value="Two" v-model="numberofgroup"> Two
                                                </label>
                                            </div>
                                        </div>


                                         <div v-if="numberofgroup=='One' || numberofgroup=='Two'" class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Total Student of group 1
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <input class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light"
                                                  v-model="assigncourse.group[0]" id="inline-full-name" type="number" placeholder="Enter Total Student of group 1">
                                            </div>
                                        </div>

                                        


                                        <div v-if="numberofgroup=='Two'" class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Total Student of Group 2
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <input class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light"
                                                  v-model="assigncourse.group[1]" id="inline-full-name" type="number" placeholder="Enter Total Student of Group 2">
                                            </div>
                                        </div>






                                        
                                        <div class="md:flex md:items-center">
                                            <div class="md:w-1/3"></div>
                                            <div class="md:w-2/3">
                                                <button @click.prevent="assignCourse" class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-full">
                                                    Assign Course 
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
          numberofclass:"select",
          numberofgroup:"select",
          session:{},
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
              group:[],
              duration:[{
                  hr : 0,
                  min : 0.0
              },
              {
                  hr : 0,
                  min : 0.0
              }
              ]
          },
          savecourse:{
              session_name:"",
              semester:"",
              teacher_code:"",
              course_code:"",
              room_number:0,
              group:0,
              //group2:0,
              duration1:0,
              duration2:0,
              total_student1:0,
              total_student2:0
          }
         
        }
      },
      created() {

        this.assigncourse.session_name=this.$route.params.id;
       

        let uri = '/api/request-sections';
            
        this.axios.post(uri, this.assigncourse).then((response) => {
            this.semesters = response.data.data;
            //console.log(this.semesters);
        });

        uri = `/api/teachers`;
            
        this.axios.get(uri).then((response) => {
            this.teachers = response.data.data;
            //console.log(this.teachers);
        });

        uri = `/api/rooms`;
            
        this.axios.get(uri).then((response) => {
            this.rooms = response.data.data;
            //console.log(this.rooms);
        });

        uri = `/api/courses`;
            
        this.axios.get(uri).then((response) => {
            this.courses = response.data.data;
            //console.log(this.courses);
        });
      },

      methods:{
          assignCourse()
          {
              
              //console.log(this.assigncourse.group[0]);
              this.savecourse.session_name    =   this.assigncourse.session_name;
              this.savecourse.semester        =   this.assigncourse.semester;
              this.savecourse.teacher_code    =   this.assigncourse.teacher_code;
              this.savecourse.course_code     =   this.assigncourse.course_code;
              //this.savecourse.room_number     =   this.assigncourse.room_number;
              //this.savecourse.group           =   this.assigncourse.group[i]; /** */
              //this.savecourse.duration        =   this.assigncourse.duration; /** */
              //this.savecourse.totalstudent    =   this.assigncourse.totalstudent;
              this.savecourse.group = 0;
              this.savecourse.total_student1 = 0;
              this.savecourse.total_student2 = 0;
              this.savecourse.duration1 = 0;
              this.savecourse.duration2 = 0;
              
              if(this.assigncourse.group.length == 1)
              {
                  this.savecourse.group = 1;
                  this.savecourse.total_student1 = Number(this.assigncourse.group[0]);
              }
              else
              {
                  this.savecourse.group = 2;
                  this.savecourse.total_student1 = Number(this.assigncourse.group[0]);
                  this.savecourse.total_student2 = Number(this.assigncourse.group[1]);
              }
              if(this.assigncourse.duration.length == 1)
              {
                  this.savecourse.duration1 = Number(this.assigncourse.duration[0].hr) + Number(this.assigncourse.duration[0].min);
                  this.savecourse.duration2 = 0;
              }
              else
              {
                 this.savecourse.duration1 = Number(this.assigncourse.duration[0].hr) + Number(this.assigncourse.duration[0].min);
                 this.savecourse.duration2 = Number(this.assigncourse.duration[1].hr) + Number(this.assigncourse.duration[1].min);
              }
              
                //console.log(this.savecourse);
                let uri = '/api/enrollment/create';
                this.axios.post(uri, this.savecourse).then((response) => {
                this.$router.push({name: 'selectsession'});
          });
            }
        }

    //   methods: {
    //       addSemester(){
    //     console.log(this.semester);
        
    //      let uri = '/api/semester-section/create';
    //       this.axios.post(uri, this.semester).then((response) => {
    //         this.$router.push({name: 'home'});
    //      });
    //   }
         
    //   }


    }
</script>
