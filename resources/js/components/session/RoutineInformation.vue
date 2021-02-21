<template>
    

             <main class="bg-white-500 flex-1 p-3 overflow-x-scroll">
                       

             <div class="">
               <b-row>
               <b-col>
                 <h1>Routine Information</h1>
                 
               </b-col>

                <b-col>
                 <b-form-input v-model="filter" type="search" style="margin-bottom:15px;" placeholder="Search"></b-form-input>
               </b-col>
                
              
              
             </b-row>

             <b-row>
              
               <b-col v-if="allcourse.length>0">
                 
                 <b-table  responsive striped hover :items="allcourse" :fields="fields" :filter="filter" :per-page="perPage" :current-page="currentPage">
                   
                  

                    
                
                   

                 </b-table>
                 <b-pagination v-model="currentPage" :total-rows="rows" :per-page="perPage"></b-pagination>
               </b-col>

               <b-col v-else>
                   <label for="">No Room Information Available</label>
               </b-col> 
              

               
             </b-row>

             

            </div>
      
         



            </main>


   

             



              

       
    
</template>

<script>
import Vue from 'vue'
 import { BootstrapVue} from 'bootstrap-vue';
 Vue.use(BootstrapVue);
export default {
    data() {
        return {
            
            indx:0,
            perPage:10,
            currentPage:1,
            filter:"",
            fields: [
                {
                    key: 'course_code',
                    label:'Session Name',
                    sortable: false
                },
                {
                    key: 'semester_section',
                    label:'Semester',
                    sortable: false
                },
                {
                    key: 'course_name',
                    label: 'Course Name',
                    //sortable: true,
                    
                },
               
                {
                    key: 'teacher_name',
                   label: 'Teacher',
                },
               
          
            ],
            session:[],
            allcourse:[]
          
        }
        
       
    },
   
    computed:{
      rows(){
        return this.allcourse.length;
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
    
    
   methods: {
     
    }
}
</script>