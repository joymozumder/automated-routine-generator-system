<template>
    

             <main class="bg-white-500 flex-1 p-3 overflow-x-scroll">
                       

             <div class="">
               <b-row>
               <b-col>
                 <h1>All Rooms</h1>
                 
               </b-col>

                <b-col>
                 <b-form-input v-model="filter" type="search" style="margin-bottom:15px;" placeholder="Search"></b-form-input>
               </b-col>
                 <b-col>
                    <router-link tag="button" align="right" type="button" class="btn btn-success" :to="{name: 'addcourse'}">Add Course</router-link>
                 
                </b-col>
              
              
             </b-row>

             <b-row>
              
               <b-col v-if="courses.length>0">
                 
                 <b-table  responsive striped hover :items="courses" :fields="fields" :filter="filter" :per-page="perPage" :current-page="currentPage">
                   
                  

                    <template v-slot:cell(action)="data">
                            <router-link tag="button" class="btn btn-primary btn-sm"  :to="{name: 'editcourse', params: { id: data.item.id }}" >
                                Edit
                            </router-link>
                             <button class="btn btn btn-danger btn-sm" @click.prevent="deletePost(data.item.id)">
                                Delete
                            </button>
                   </template> 
                
                   

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
            perPage:8,
            currentPage:1,
            filter:"",
            fields: [
                {
                    key: 'code',
                    label:'Course Code',
                    sortable: false
                },
                {
                    key: 'name',
                    label:'Course Name',
                    sortable: false
                },
                {
                    key: 'credit',
                    label: 'Credit',
                    //sortable: true,
                    
                },
                {
                    key: 'capacity',
                    label: 'Capacity',
                },
                 {
                    key: 'type',
                    label: 'Type',
                },
                {
                    key: 'action',
                    sortable: false
                },
               
          
            ],
             courses: []
          
        }
        
       
    },
   
    computed:{
      rows(){
        return this.courses.length;
      }
    },
    created() {
        let uri = '/api/courses';
        this.axios.get(uri).then(response => {
          this.courses = response.data.data;

        
          
          for(var i=0;i<this.courses.length;i++){
              
                if(this.courses[i].type==0)
                     this.courses[i].type="Theory Class";
                else if(this.courses[i].type==1)
                     this.courses[i].type="CSE LAB";
                else if(this.courses[i].type==2)
                      this.courses[i].type="EEE LAB";
                else if(this.courses[i].type==3)
                     this.courses[i].type="Communication LAB";
                else if(this.courses.type==4)
                      this.courses[i].type="Mechanical LAB";
                else if(this.courses[i].type==5)
                      this.courses[i].type="Physics LAB";
                else    
                      this.courses[i].type="none";
          }
        });
    },
    
    
   methods: {
      deletePost(id)
      {
		
		//console.log(id);
        let uri = `/api/course/delete/${id}`;
        
         this.axios.delete(uri).then(response => {
           this.courses.splice(this.courses.findIndex(course => course.id === id), 1);
         });
      }
    }
}
</script>