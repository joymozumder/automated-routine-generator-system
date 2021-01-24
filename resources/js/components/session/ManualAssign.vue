<template>
 <main class="bg-white-500 flex-1 p-3 overflow-hidden">
        <div class="flex flex-col">
                        <!-- Card Sextion Starts Here -->
                        <div class="container mx-auto h-full flex flex-1 justify-center items-center">
                            <!--Horizontal form-->
                            <div class="mb-2 border-solid border-grey-light rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
                                <div class="bg-gray-300 px-2 py-3 border-solid border-gray-400 border-b">
                                    Manual Assign
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



                                        <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Group
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <select v-model="assigncourse.group" class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                          id="grid-state">
                                                        <option value=0>Zero</option>
                                                        <option value=1>One</option>
                                                        <option value=2>Two</option>
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
                                        
                                        <div v-if="numberofclass=='One' || numberofclass=='Two'" > 
                                             <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Day 1
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <select v-model="assigncourse.day1" class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                          id="grid-state">
                                                        <option value=1>Saturday</option>
                                                        <option value=2>Sunday</option>
                                                        <option value=3>Monday</option>
                                                        <option value=4>Tuesday</option>
                                                        <option value=5>Wednesday</option>
                                                        
                                                </select>
                                                    
                                            </div>
                                        </div>




                                            <div class="md:flex md:items-center mb-6">
                                                <div class="md:w-1/4">
                                                    <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                        for="inline-course-code">
                                                        Duration 1
                                                    </label>
                                                </div>
                                                <div class="md:w-3/4">
                                                    <input class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light"
                                                        v-model="assigncourse.duration1" id="inline-full-name" type="number" placeholder="Enter Duration 1">
                                                </div>

                                                <div class="md:w-1/4">
                                                    <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                        for="inline-course-code">
                                                        Time 1
                                                    </label>
                                                </div>
                                                

                                                <div class="flex">
                                                    <select v-model="assigncourse.hour1" name="hours" class="bg-grey-200 text-grey-darker border border-grey-200 appearance-none outline-none">
                                                    <option value=8>8</option>
                                                    <option value=9>9</option>
                                                    <option value=10>10</option>
                                                    <option value=11>11</option>
                                                    <option value=12>12</option>
                                                    <option value=13>1</option>
                                                    <option value=14>2</option>
                                                    <option value=15>3</option>
                                                    <option value=16>4</option>
                                                    <option value=17>5</option>
                                                    <option value=18>6</option>
                                                    </select>
                                                    <span class="text-xl mr-3">:</span>
                                                    <select v-model="assigncourse.min1" name="minutes" class="bg-grey-200 text-grey-darker border border-grey-200 appearance-none outline-none mr-4">
                                                    <option value=0>00</option>
                                                    <option value=30>30</option>
                                                    </select>
                                                    <select name="ampm" class="bg-grey-200 text-grey-darker border border-grey-200 appearance-none outline-none">
                                                    <option value="am">AM</option>
                                                    <option value="pm">PM</option>
                                                    </select>
                                                </div>






                                            </div>
                                        </div>







                                        <div v-if="numberofclass=='Two'">

                                            <div v-if="numberofclass=='One' || numberofclass=='Two'" > 
                                             <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Day 2
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <select v-model="assigncourse.day2" class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                          id="grid-state">
                                                        <option value=1>Saturday</option>
                                                        <option value=2>Sunday</option>
                                                        <option value=3>Monday</option>
                                                        <option value=4>Tuesday</option>
                                                        <option value=5>Wednesday</option>
                                                        
                                                </select>
                                                    
                                            </div>
                                        </div>


                                        </div>

                                            <div   class="md:flex md:items-center mb-6">
                                                <div class="md:w-1/4">
                                                    <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                        for="inline-course-code">
                                                        Duration 2
                                                    </label>
                                                </div>
                                                <div class="md:w-3/4">
                                                    <input class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light"
                                                        v-model="assigncourse.duration2" id="inline-full-name" type="number" placeholder="Enter Duration 2">
                                                </div>

                                                <div class="md:w-1/4">
                                                    <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                        for="inline-course-code">
                                                        Time 2
                                                    </label>
                                                </div>
                                                

                                                <div  class="flex">
                                                    <select v-model="assigncourse.hour2" name="hours" class="bg-grey-200 text-grey-darker border border-grey-200 appearance-none outline-none">
                                                    <option value=8>8</option>
                                                    <option value=9>9</option>
                                                    <option value=10>10</option>
                                                    <option value=11>11</option>
                                                    <option value=12>12</option>
                                                    <option value=13>1</option>
                                                    <option value=14>2</option>
                                                    <option value=15>3</option>
                                                    <option value=16>4</option>
                                                    <option value=17>5</option>
                                                    <option value=18>6</option>
                                                
                                                    </select>
                                                    <span class="text-xl mr-3">:</span>
                                                    <select v-model="assigncourse.min2" name="minutes" class="bg-grey-200 text-grey-darker border border-grey-200 appearance-none outline-none mr-4">
                                                    <option value=0>00</option>
                                                    <option value=30>30</option>
                                                    </select>
                                                    <select name="ampm" class="bg-grey-200 text-grey-darker border border-grey-200 appearance-none outline-none">
                                                    <option value="am">AM</option>
                                                    <option value="pm">PM</option>
                                                    </select>
                                                </div>






                                            </div>
                                        </div>












                                        

                                        


                                      








                                        





                                        
                                        <div class="md:flex md:items-center">
                                            <div class="md:w-1/3"></div>
                                            <div class="md:w-2/3">
                                                <button @click.prevent="addManually" class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-full">
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
          session:{},
          semesters:{},
          teachers:{},
          courses:{},
          assigncourse:{
              session_name:"",
              semester:"",
              teacher_code:"",
              course_code:"",
              group:0,
              day1:0,
              duration1:0,
              hour1:0,
              min1:0,
              day2:0,
              duration2:0,
              hour2:0,
              min2:0
          },
          savecourse:{
              session_name  :   "",
              semester      :   "",
              teacher_code  :   "",
              course_code   :   "",
              group         :   1,
              start1        :   1,
              end1          :   1,
              duration1     :   0,
              start2        :   1,
              end2          :   1,
              duration2     :   0
            
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

        uri = `/api/courses`;
            
        this.axios.get(uri).then((response) => {
            this.courses = response.data.data;
            //console.log(this.courses);
        });
      },

      methods:{
          addManually(){
              var hr1,hr2,mn1,mn2,dy1,dy2;
              //console.log(this.assigncourse);
              this.savecourse.session_name    =   this.assigncourse.session_name;
              this.savecourse.semester        =   this.assigncourse.semester;
              this.savecourse.teacher_code    =   this.assigncourse.teacher_code;
              this.savecourse.course_code     =   this.assigncourse.course_code;
              //this.savecourse.room_number     =   this.assigncourse.room_number;
              //this.savecourse.group           =   this.assigncourse.group[i]; /** */
              //this.savecourse.duration        =   this.assigncourse.duration; /** */
              //this.savecourse.totalstudent    =   this.assigncourse.totalstudent;
              this.savecourse.group             =    Number(this.assigncourse.group) ;
              this.savecourse.duration1         =    Number(this.assigncourse.duration1);
              this.savecourse.duration2         =    Number(this.assigncourse.duration2);
              hr1 = Number(this.assigncourse.hour1);
              mn1 = Number(this.assigncourse.min1);
              dy1 = Number(this.assigncourse.day1);

              this.savecourse.start1            =   this.convert_time(hr1,mn1)+((dy1-1)*18);
              this.savecourse.end1              =   this.savecourse.start1+this.savecourse.duration1+this.savecourse.duration1-1;

              hr2 = Number(this.assigncourse.hour2);
              mn2 = Number(this.assigncourse.min2);
              dy2 = Number(this.assigncourse.day2);
            
              this.savecourse.start2            =   this.convert_time(hr2,mn2)+((dy2-1)*18);
              this.savecourse.end2              =   this.savecourse.start2+this.savecourse.duration2+this.savecourse.duration2-1;


              //console.log(this.savecourse);
              let uri = '/api/enrollment/manualcreate';
                this.axios.post(uri, this.savecourse).then((response) => {
                this.$router.push({name: 'selectsession'});
          });
             
          },

          convert_time(h,m)
          {
              if(h==8 && m==30) return 1;
              else if(h==9 && m==0) return 2;
              else if(h==9 && m==30) return 3;
              else if(h==10 && m==0) return 4;
              else if(h==10 && m==30) return 5;
              else if(h==11 && m==0) return 6;
              else if(h==11 && m==30) return 7;
              else if(h==12 && m==0) return 8;
              else if(h==12 && m==30) return 9;
              else if(h==13 && m==0) return 10;
              else if(h==13 && m==30) return 11;
              else if(h==14 && m==0) return 12;
              else if(h==14 && m==30) return 13;
              else if(h==15 && m==0) return 14;
              else if(h==15 && m==30) return 15;
              else if(h==16 && m==0) return 16;
              else if(h==16 && m==30) return 17;
              else if(h==17 && m==0) return 18;
              else if(h==17 && m==30) return 19;
              
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
