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
                                            
                                           
                                            <td v-if="semester.section.a==1" class="border px-4 py-2">
                                                <i class="fas fa-check text-green-500 mx-2"></i>
                                                
                                            </td>
                                             
                                            <td v-else class="border px-4 py-2">
                                                <i class="fas fa-times text-red-500 mx-2"></i>
                                            </td>

                                            <td v-if="semester.section.b==1" class="border px-4 py-2">
                                                <i class="fas fa-check text-green-500 mx-2"></i>
                                                
                                            </td>
                                             
                                            <td v-else class="border px-4 py-2">
                                                <i class="fas fa-times text-red-500 mx-2"></i>
                                            </td>
                                             
                                            <td v-if="semester.section.c==1" class="border px-4 py-2">
                                                <i class="fas fa-check text-green-500 mx-2"></i>
                                                
                                            </td>
                                             
                                            <td v-else class="border px-4 py-2">
                                                <i class="fas fa-times text-red-500 mx-2"></i>
                                            </td>

                                            <td v-if="semester.section.d==1" class="border px-4 py-2">
                                                <i class="fas fa-check text-green-500 mx-2"></i>
                                                
                                            </td>
                                             
                                            <td v-else class="border px-4 py-2">
                                                <i class="fas fa-times text-red-500 mx-2"></i>
                                            </td>

                                             <td v-if="semester.section.e==1" class="border px-4 py-2">
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
                    section:{
                        a:0,
                        b:0,
                        c:0,
                        d:0,
                        e:0,
                        
                    }
                },
                {
                    semester:"2nd",
                    section:{
                        a:0,
                        b:0,
                        c:0,
                        d:0,
                        e:0,
                       
                    }
                },
                {
                    semester:"3rd",
                    section:{
                        a:0,
                        b:0,
                        c:0,
                        d:0,
                        e:0,
                        
                    }
                },
                {
                    semester:"4th",
                    section:{
                        a:0,
                        b:0,
                        c:0,
                        d:0,
                        e:0,
                        
                    }
                },
                {
                    semester:"5th",
                    section:{
                        a:0,
                        b:0,
                        c:0,
                        d:0,
                        e:0,
                        
                    }
                },
                {
                    semester:"6th",
                    section:{
                        a:0,
                        b:0,
                        c:0,
                        d:0,
                        e:0,
                        
                    }
                },
                {
                    semester:"7th",
                    section:{
                        a:0,
                        b:0,
                        c:0,
                        d:0,
                        e:0,
                        
                    }
                },
                {
                    semester:"8th",
                    section:{
                        a:0,
                        b:0,
                        c:0,
                        d:0,
                        e:0,
                        
                    }
                },
                
             ]
             

        }
    },
    created() {
        this.session=this.$route.params.session;
        console.log(this.$route.params.session);
        this.semesters.session_name = this.session;
        

         let uri = '/api/request-sections';
         this.axios.post(uri, this.semesters).then((response) => {
            this.semesters = response.data.data;
           
              for(var i=0;i<8;i++){
                    
                    for(var j=0;j<this.semesters.length;j++){
                        
                        
                        if(this.semesters[j].semester[0]==i+1)
                        {
                            
                            if(this.semesters[j].semester[1]=="a")
                                 this.newsemesters[i].section.a=1;
                            else if(this.semesters[j].semester[1]=="b")
                                 this.newsemesters[i].section.b=1; 
                            else if(this.semesters[j].semester[1]=="c")
                                 this.newsemesters[i].section.c=1; 
                            else if(this.semesters[j].semester[1]=="d")
                                 this.newsemesters[i].section.d=1;  
                            else
                                this.newsemesters[i].section.e=1; 

                        } 
                        
                    }
                  
              }
                
        });
    
    },
    
   
}
</script>