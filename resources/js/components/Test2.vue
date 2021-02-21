<template>


       
            <main class="bg-white-500 flex-1 p-3 overflow-x-scroll">

                <div class="flex flex-1">
                   

                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">

                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                                 <!-- <router-link tag="button" class="modal-trigger bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded-full absolute top-32 right-32 z-50"
                                :to="{name: 'addroom'}">Create Room</router-link> -->
                            <div class="p-3 mt-4">
                                <compDataTable v-if="allcourse.length!=0"
                                    
                                    title="All Information"
                                    
                                    :columns="tableColumns1"
                                    :rows="allcourse"
                                    :clickable="false"
                                    :sortable="true"
                                    
                                    :exactSearch="true"
                                    :searchable="true"
                                    :paginate="true"
                                    :exportable="false"
                                    :printable="false"
                                    

                                > 










                                        
                                </compDataTable>

       
                            </div>
                        </div>
                    </div>
                    <!--/Grid Form-->
                </div>
                 <!-- ___________________________________________ -->
        
        <!-- _____________________________________________ -->
            </main>

           


                                           


 
   
       
    
</template>

<script>
import compDataTable from 'vue-materialize-datatable';
export default {
    data() {
        return {
             tableColumns1: [
                 {
                    label: "Session Name",
                    field: "course_code",
                    numeric: false,
                    html: false
                },
           
                {
                    label: "Semester",
                    field: "semester_section",
                    numeric: false,
                    html: false
                },
                {
                    label: "Course Name",
                    field: "course_name",
                    numeric: false,
                    html: false
                },
                {
                    label: "Teacher",
                    field: "teacher_name",
                    numeric: false,
                    html: false
                },
		 	
		 ],
        
         session:[],
         allcourse:[]
        }
        
       
    },
    created() {

        


        let uri = `/api/find_session/${this.$route.params.session}`;
        
        this.axios.get(uri).then(response => {
          this.session = response.data.data;
          //console.log(this.session);



            uri = `/api/all-course/${this.session.id}`;
            //console.log(uri);
            this.axios.get(uri).then(response => {
                this.allcourse = response.data.data;
                for(var i=0;i<this.allcourse.length;i++){

                    
                    if(this.allcourse[i].group==0)
                        this.allcourse[i].course_name=this.allcourse[i].course_name+"-Section "+this.allcourse[i].semester_section[1];
                    else if(this.allcourse[i].group==1)
                        this.allcourse[i].course_name=this.allcourse[i].course_name+"-Section "+this.allcourse[i].semester_section[1]+"1"; 
                    else if(this.allcourse[i].group==2)
                        this.allcourse[i].course_name=this.allcourse[i].course_name+"-Section "+this.allcourse[i].semester_section[1]+"2";        
                    
                    
                     this.allcourse[i].course_code=this.allcourse[i].course_code=this.session.session_name;
                    
                     if(this.allcourse[i].semester_section[0]=="1"){
                         this.allcourse[i].semester_section=this.allcourse[i].semester_section[0]+"st";
                     }
                     else if(this.allcourse[i].semester_section[0]=="2"){
                         this.allcourse[i].semester_section=this.allcourse[i].semester_section[0]+"nd";
                     }
                     else if(this.allcourse[i].semester_section[0]=="3"){
                         this.allcourse[i].semester_section=this.allcourse[i].semester_section[0]+"rd";
                     }
                     else {
                         this.allcourse[i].semester_section=this.allcourse[i].semester_section[0]+"th";
                     }
                }
                
                console.log(this.allcourse);
            
            });

           
            
            //console.log(this.session);
           

        });



        
       
    },
     components:{
            compDataTable 
     },
     methods: {
        
     
     
    }
}
</script>