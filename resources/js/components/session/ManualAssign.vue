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
                                                        <option value=1>One</option>
                                                        <option value=2>Two</option>
                                                        <option value=3>Three</option>
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


                                         <div v-if="numberofclass=='One' || numberofclass=='Two'" class="md:flex md:items-center mb-6">
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
                                                <select v-model="assigncourse.hour1" name="hours" class="bg-transparent text-xl appearance-none outline-none">
                                                <option value=8>8</option>
                                                <option value=9>9</option>
                                                <option value=3>10</option>
                                                <option value=11>11</option>
                                                <option value=12>12</option>
                                                <option value=13>13</option>
                                                <option value=14>14</option>
                                                <option value=15>15</option>
                                                <option value=16>16</option>
                                                <option value=17>17</option>
                                                <option value=18>18</option>
                                                <option value=19>19</option>
                                                </select>
                                                <span class="text-xl mr-3">:</span>
                                                <select v-model="assigncourse.min1" name="minutes" class="bg-transparent text-xl appearance-none outline-none mr-4">
                                                <option value=0>00</option>
                                                <option value=30>30</option>
                                                </select>
                                                <select name="ampm" class="bg-transparent text-xl appearance-none outline-none">
                                                <option value="am">AM</option>
                                                <option value="pm">PM</option>
                                                </select>
                                            </div>






                                        </div>








                                          <div  v-if="numberofclass=='Two'" class="md:flex md:items-center mb-6">
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
                                                <select v-model="assigncourse.hour2" name="hours" class="bg-transparent text-xl appearance-none outline-none">
                                                <option value=8>8</option>
                                                <option value=9>9</option>
                                                <option value=3>10</option>
                                                <option value=11>11</option>
                                                <option value=12>12</option>
                                                <option value=13>13</option>
                                                <option value=14>14</option>
                                                <option value=15>15</option>
                                                <option value=16>16</option>
                                                <option value=17>17</option>
                                                <option value=18>18</option>
                                                <option value=19>19</option>
                                                </select>
                                                <span class="text-xl mr-3">:</span>
                                                <select v-model="assigncourse.min2" name="minutes" class="bg-transparent text-xl appearance-none outline-none mr-4">
                                                <option value=0>00</option>
                                                <option value=30>30</option>
                                                </select>
                                                <select name="ampm" class="bg-transparent text-xl appearance-none outline-none">
                                                <option value="am">AM</option>
                                                <option value="pm">PM</option>
                                                </select>
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
              group:1,
              duration1:0,
              hour1:8,
              min1:0,
              duration2:0,
              hour2:8,
              min2:0
              
              
          }
         
        }
      },
      created() {

        this.assigncourse.session_name=this.$route.params.id;
       

        let uri = `/api/semester-sections`;
            
        this.axios.get(uri).then((response) => {
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
              console.log(this.assigncourse);
             
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
