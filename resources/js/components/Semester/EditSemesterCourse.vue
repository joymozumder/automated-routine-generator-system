<template>
 <main class="bg-white-500 flex-1 p-3 overflow-hidden">
        <div class="flex flex-col">
                        <!-- Card Sextion Starts Here -->
                        <div class="container mx-auto h-full flex flex-1 justify-center items-center">
                            <!--Horizontal form-->
                            <div class="mb-2 border-solid border-grey-light rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
                                <div class="bg-gray-300 px-2 py-3 border-solid border-gray-400 border-b">
                                    Update Semester and Course 
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
                                                  v-model="session" readonly id="inline-full-name" type="text" >
                                            </div>
                                        </div>

                                         <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Semester-Section
                                                </label>
                                            </div>
                                            <div class="md:w-3/4 relative">
                                                <select class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                          v-model="semester_course.semester_section"  id="grid-state">
                                                        <!-- v-for="semester in semesters" :key="semester.id " :value="semester.id" -->
                                                        <option value="1A">1A</option>
                                                        <option value="1A1">1A1</option>
                                                        <option value="1A2">1A2</option>
                                                        <option value="1B">1B</option>
                                                        <option value="1B1">1B1</option>
                                                        <option value="1B2">1B2</option>
                                                        <option value="1C">1C</option>
                                                        <option value="1C1">1C1</option>
                                                        <option value="1C2">1C2</option>
                                                        <option value="1D">1D</option>
                                                        <option value="1D1">1D1</option>
                                                        <option value="1D2">1D2</option>
                                                        <option value="1E">1E</option>
                                                        <option value="1E1">1E1</option>
                                                        <option value="1E2">1E2</option>

                                                        
                                                        <option value="2A">2A</option>
                                                        <option value="2A1">2A1</option>
                                                        <option value="2A2">2A2</option>
                                                        <option value="2B">2B</option>
                                                        <option value="2B1">2B1</option>
                                                        <option value="2B2">2B2</option>
                                                        <option value="2C">2C</option>
                                                        <option value="2C1">2C1</option>
                                                        <option value="2C2">2C2</option>
                                                        <option value="2D">2D</option>
                                                        <option value="2D1">2D1</option>
                                                        <option value="2D2">2D2</option>
                                                        <option value="2E">2E</option>
                                                        <option value="2E1">2E1</option>
                                                        <option value="2E2">2E2</option>
                                                        
                                                         <option value="3A">3A</option>
                                                        <option value="3A1">3A1</option>
                                                        <option value="3A2">3A2</option>
                                                         <option value="3B">3B</option>
                                                        <option value="3B1">3B1</option>
                                                        <option value="3B2">3B2</option>
                                                         <option value="3C">3C</option>
                                                        <option value="3C1">3C1</option>
                                                        <option value="3C2">3C2</option>
                                                         <option value="3D">3D</option>
                                                        <option value="3D1">3D1</option>
                                                        <option value="3D2">3D2</option>
                                                         <option value="3E">3E</option>
                                                        <option value="3E1">3E1</option>
                                                        <option value="3E2">3E2</option>


                                                        <option value="4A">4A</option>
                                                        <option value="4A1">4A1</option>
                                                        <option value="4A2">4A2</option>
                                                         <option value="4B">4B</option>
                                                        <option value="4B1">4B1</option>
                                                        <option value="4B2">4B2</option>
                                                         <option value="4C">4C</option>
                                                        <option value="4C1">4C1</option>
                                                        <option value="4C2">4C2</option>
                                                         <option value="4D">4D</option>
                                                        <option value="4D1">4D1</option>
                                                        <option value="4D2">4D2</option>
                                                         <option value="4E">4E</option>
                                                        <option value="4E1">4E1</option>
                                                        <option value="4E2">4E2</option>

                                                        <option value="3A">3A</option>
                                                        <option value="3A1">3A1</option>
                                                        <option value="3A2">3A2</option>
                                                         <option value="3B">3B</option>
                                                        <option value="3B1">3B1</option>
                                                        <option value="3B2">3B2</option>
                                                         <option value="3C">3C</option>
                                                        <option value="3C1">3C1</option>
                                                        <option value="3C2">3C2</option>
                                                         <option value="3D">3D</option>
                                                        <option value="3D1">3D1</option>
                                                        <option value="3D2">3D2</option>
                                                         <option value="3E">3E</option>
                                                        <option value="3E1">3E1</option>
                                                        <option value="3E2">3E2</option>
                                                        

                                                        <option value="4A">4A</option>
                                                        <option value="4A1">4A1</option>
                                                        <option value="4A2">4A2</option>
                                                         <option value="4B">4B</option>
                                                        <option value="4B1">4B1</option>
                                                        <option value="4B2">4B2</option>
                                                         <option value="4C">4C</option>
                                                        <option value="4C1">4C1</option>
                                                        <option value="4C2">4C2</option>
                                                         <option value="4D">4D</option>
                                                        <option value="4D1">4D1</option>
                                                        <option value="4D2">4D2</option>
                                                         <option value="4E">4E</option>
                                                        <option value="4E1">4E1</option>
                                                        <option value="4E2">4E2</option>

                                                        <option value="5A">5A</option>
                                                        <option value="5A1">5A1</option>
                                                        <option value="5A2">5A2</option>
                                                         <option value="5B">5B</option>
                                                        <option value="5B1">5B1</option>
                                                        <option value="5B2">5B2</option>
                                                         <option value="5C">5C</option>
                                                        <option value="5C1">5C1</option>
                                                        <option value="5C2">5C2</option>
                                                         <option value="5D">5D</option>
                                                        <option value="5D1">5D1</option>
                                                        <option value="5D2">5D2</option>
                                                         <option value="5E">5E</option>
                                                        <option value="5E1">5E1</option>
                                                        <option value="5E2">5E2</option>
                                                        
                                                        <option value="6A">6A</option>
                                                        <option value="6A1">6A1</option>
                                                        <option value="6A2">6A2</option>
                                                         <option value="6B">6B</option>
                                                        <option value="6B1">6B1</option>
                                                        <option value="6B2">6B2</option>
                                                         <option value="6C">6C</option>
                                                        <option value="6C1">6C1</option>
                                                        <option value="6C2">6C2</option>
                                                         <option value="6D">6D</option>
                                                        <option value="6D1">6D1</option>
                                                        <option value="6D2">6D2</option>
                                                         <option value="6E">6E</option>
                                                        <option value="6E1">6E1</option>
                                                        <option value="6E2">6E2</option>
                                                        

                                                        <option value="7A">7A</option>
                                                        <option value="7A1">7A1</option>
                                                        <option value="7A2">7A2</option>
                                                         <option value="7B">7B</option>
                                                        <option value="7B1">7B1</option>
                                                        <option value="7B2">7B2</option>
                                                         <option value="7C">7C</option>
                                                        <option value="7C1">7C1</option>
                                                        <option value="7C2">7C2</option>
                                                         <option value="7D">7D</option>
                                                        <option value="7D1">7D1</option>
                                                        <option value="7D2">7D2</option>
                                                         <option value="7E">7E</option>
                                                        <option value="7E1">7E1</option>
                                                        <option value="7E2">7E2</option>

                                                        <option value="8A">8A</option>
                                                        <option value="8A1">8A1</option>
                                                        <option value="8A2">8A2</option>
                                                         <option value="8B">8B</option>
                                                        <option value="8B1">8B1</option>
                                                        <option value="8B2">8B2</option>
                                                         <option value="8C">8C</option>
                                                        <option value="8C1">8C1</option>
                                                        <option value="8C2">8C2</option>
                                                         <option value="8D">8D</option>
                                                        <option value="8D1">8D1</option>
                                                        <option value="8D2">8D2</option>
                                                         <option value="8E">8E</option>
                                                        <option value="8E1">8E1</option>
                                                        <option value="8E2">8E2</option>
                                                    </select>
                                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 20 20">
                                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                                        </svg>
                                                    </div>
                                                    
                                            </div>
                                        </div>
                                        


                                         <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Course
                                                </label>
                                            </div>
                                            <div class="md:w-3/4 relative">
                                                <select class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                         v-model="semester_course.course_id"  id="grid-state">
                                                        <!--  v-for="teacher in teachers" :key="teacher.id" -->
                                                        <option v-for="course in courses" :key="course.id" :value="course.id">{{course.name}}-{{course.code}}</option>
                                                       
                                                    </select>
                                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 20 20">
                                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                                        </svg>
                                                    </div>
                                                    
                                            </div>
                                        </div>






                                      
                                        



                                    

                                   
                                    

                                      
                                    



                                   

                                   
                                    
                                   
                                        
                                        <div class="md:flex md:items-center">
                                            <div class="md:w-1/3"></div>
                                            <div class="md:w-2/3">
                                                <button @click.prevent="updateSemesterCourse" class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-full">
                                                    Update Semester Section
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
          semester_course:[],
          sessions:[],
          session:"",
          session_id:0,
          semester:0,
          courses:[],
          check:0,


        }
      },
      created() {

        let uri = `/api/semester-course/edit/${this.$route.params.id}`;
        this.axios.get(uri).then(response => {
          this.semester_course = response.data.data;
          console.log(this.semester_course);

          if(this.semester_course.group!=0){
              if(this.semester_course.group==1)
                this.semester_course.semester_section=this.semester_course.semester_section+"1";
              else if(this.semester_course.group==2)
                this.semester_course.semester_section=this.semester_course.semester_section+"2";
                
          }
          
        });

        uri = '/api/sessions';
        this.axios.get(uri).then(response => {
          this.sessions = response.data.data;
          
          for(var i=0;i<this.sessions.length;i++)
            if(this.sessions[i].id==this.semester_course.session_id){
                this.session=this.sessions[i].session_name;
                this.session_id=this.sessions[i].id;
            }
                
          //console.log(this.session);
        });

         uri = '/api/courses';
        this.axios.get(uri).then(response => {
          this.courses = response.data.data;
          
         
          //console.log(this.courses);
        });
       
      },
      methods: {
         updateSemesterCourse() {
            
           for(var i=0;i<this.courses.length;i++){

                if(this.courses[i].id==this.semester_course.course_id && this.courses[i].type==0)
                {
                    console.log("test");
                    this.semester_course.group=0;
                    this.semester_course.semester_section=this.semester_course.semester_section[0]+this.semester_course.semester_section[1];
                    this.check=1;
                }
            }
            
             //__________________________________________________________
            if(this.semester_course.semester_section.length==2 && this.check==0)
                this.semester_course.group=0;
            else if(this.semester_course.semester_section.length==3 && this.check==0)
            {
                if(this.semester_course.semester_section[2]=="1"){
                    this.semester_course.group=1;
                    this.semester_course.semester_section=this.semester_course.semester_section[0]+this.semester_course.semester_section[1];
                    
                }
                else if(this.semester_course.semester_section[2]=="2"){
                    this.semester_course.group=2;
                    this.semester_course.semester_section=this.semester_course.semester_section[0]+this.semester_course.semester_section[1];
                }
            }     
                 
            
                      
            
           
            console.log(this.semester_course);
            this.semester=this.semester_course.semester_section[0];

            console.log(this.semester);
             let uri = `/api/semester-course/update/${this.$route.params.id}`;
             this.axios.post(uri, this.semester_course).then((response) => {
            //this.$router.push({name: 'semestercourse', params: { session: this.session_id,id: this.semester }});
             this.$router.go(-1)
             console.log("saved");
             });
            
         },
      
      }
    }
</script>
