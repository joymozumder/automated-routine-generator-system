<template>
    
              <main class="bg-white-500 flex-1 p-3 overflow-x-scroll z-10">

                  <div class="flex flex-col">
                   

                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                Full Table
                            </div>
                            <div class="p-3">
                                <table class="table-responsive w-full rounded">
                                    <thead>
                                      <tr>
                                        <th class="border w-1/7 px-12 py-3">Semester Name</th>
                                        <th class="border w-1/7 px-12 py-3">Section-A</th>
                                        <th class="border w-1/7 px-12 py-3">Section-B</th>
                                        <th class="border w-1/7 px-12 py-3">Section-C</th>
                                        <th class="border w-1/7 px-12 py-3">Section-D</th>
                                        <th class="border w-1/7 px-12 py-3">Section-E</th>
                                        <th class="border w-1/7 px-12 py-3">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="semester in newsemesters" :key="semester.id">
                                            <td class="border px-4 py-2">{{semester.semester}}</td>
                                            
                                           
                                            <td v-if="semester.section>0" class="border px-4 py-2">
                                                <i class="fas fa-check text-green-500 mx-2"></i>
                                                
                                            </td>
                                             
                                            <td v-else class="border px-4 py-2">
                                                <i class="fas fa-times text-red-500 mx-2"></i>
                                            </td>

                                            <td v-if="semester.section>1" class="border px-4 py-2">
                                                <i class="fas fa-check text-green-500 mx-2"></i>
                                                
                                            </td>
                                             
                                            <td v-else class="border px-4 py-2">
                                                <i class="fas fa-times text-red-500 mx-2"></i>
                                            </td>
                                             
                                            <td v-if="semester.section>2" class="border px-4 py-2">
                                                <i class="fas fa-check text-green-500 mx-2"></i>
                                                
                                            </td>
                                             
                                            <td v-else class="border px-4 py-2">
                                                <i class="fas fa-times text-red-500 mx-2"></i>
                                            </td>

                                            <td v-if="semester.section>3" class="border px-4 py-2">
                                                <i class="fas fa-check text-green-500 mx-2"></i>
                                                
                                            </td>
                                             
                                            <td v-else class="border px-4 py-2">
                                                <i class="fas fa-times text-red-500 mx-2"></i>
                                            </td>

                                             <td v-if="semester.section>4" class="border px-4 py-2">
                                                <i class="fas fa-check text-green-500 mx-2"></i>
                                                
                                            </td>
                                             
                                            <td v-else class="border px-4 py-2">
                                                <i class="fas fa-times text-red-500 mx-2"></i>
                                            </td>

                                            <td class="border px-4 py-2">
                                               
                                      

                                            <router-link tag="a"  class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white" :to="{name: 'editsemester', params: { session: session,id:semester.semester[0] }}" >
                                                    <i class="fas fa-edit"></i>
                                             </router-link>


                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500">
                                                        <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/Grid Form-->
                </div>
               
            </main>
       
    
</template>


<script>

export default {
    
    data(){
        return{
             session:"",
             semesters:{},
             newsemesters:[
                 {
                    semester:"1st",
                    //total_student:0,
                    section:0
                },
                {
                    semester:"2nd",
                    //total_student:0,
                    section:0
                },
                {
                    semester:"3rd",
                    //total_student:0,
                    section:0
                },
                {
                    semester:"4th",
                    //total_student:0,
                    section:0
                },
                {
                    semester:"5th",
                    //total_student:0,
                    section:0
                },
                {
                    semester:"6th",
                    //total_student:0,
                    section:0
                },
                {
                    semester:"7th",
                    //total_student:0,
                    section:0
                },
                {
                    semester:"8th",
                    //total_student:0,
                    section:0
                },
                
             ]
             

        }
    },
    created() {
        this.session=this.$route.params.session;
        console.log(this.$route.params.session);
        this.semesters.session_name = this.session;
        
         console.log(this.semesters);

         let uri = '/api/request-sections';
         this.axios.post(uri, this.semesters).then((response) => {
            this.semesters = response.data.data;
            console.log(this.semesters);

              for(var i=0;i<8;i++){
                    for(var j=0;j<this.semesters.length;j++){
                        if(this.semesters[j].semester[0]==i+1)
                        {
                            this.newsemesters[i].section=this.newsemesters[i].section+1;
                        } 
                    }
                    console.log(this.newsemesters[i].section);
              }
        });


        
      
          /*
          for(var i=0;i<8;i++){
               
                // var count=0,total_student;

                // this.newsemesters[i].total_student=this.semesters[i].total_student;
                 for(var j=0;j<this.semesters.length;j++){
                   if(this.semesters[j].semester[0]==i+1)
                     {
                         this.newsemesters[i].section=this.newsemesters[i].section+1;
                        //this.newsemesters[i].total_student=this.newsemesters[i].total_student+this.semesters[j].total_student;
                    }    
                          
                 }
                

                
             }
             console.log(this.newsemesters);*/
          
         

        
    },
    
   
}
</script>