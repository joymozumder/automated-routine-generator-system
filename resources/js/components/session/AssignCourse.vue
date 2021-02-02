<template>
 <main class="bg-white-500 flex-1 p-3 overflow-hidden">
        <div class="flex flex-col">
                        <!-- Card Sextion Starts Here -->
                        <div class="container mx-auto h-full flex flex-1 justify-center items-center">
                            <!--Horizontal form-->
                            <div class="mb-2 border-solid border-grey-light rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
                                <div class="bg-gray-300 px-2 py-3 border-solid border-gray-400 border-b">
                                 Assign Course
                                </div>
                                <div class="p-3">
                                    <form class="w-full">






                                        
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
              day:0,
              duration1:0,
              duration2:0,
              total_student1:0,
              total_student2:0
          }
         
        }
      },
      created() {

        this.assigncourse.session_name=this.$route.params.id;
       

        
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
              this.savecourse.day = 0;
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
                this.$router.go(-1);
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
