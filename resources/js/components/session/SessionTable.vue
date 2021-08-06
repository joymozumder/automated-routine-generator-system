<template>
    

             <main class="bg-white-500 flex-1 p-3 overflow-x-scroll">
                       

             <div class="">
               <b-row>
               <b-col>
                 <h1>Session's List</h1>
                 
               </b-col>

                <b-col>
                 <b-form-input v-model="filter" type="search" style="margin-bottom:15px;" placeholder="Search"></b-form-input>
               </b-col>
                 <b-col>
                    <router-link tag="button" align="right" type="button" class="btn btn-success" :to="{name: 'createsession'}">Create Session</router-link>
                 
                </b-col>
              
              
             </b-row>

             <b-row>
              
               <b-col v-if="sessions.length>0">
                 
                 <b-table  responsive striped hover :items="sessions" :fields="fields" :filter="filter" :per-page="perPage" :current-page="currentPage">
                   
                  

                    <template v-slot:cell(action)="data">
                            <router-link tag="button" class="btn btn-primary btn-sm"  :to="{name: 'editsession', params: { id: data.item.id }}" >
                                  <i class="fa fa-edit"></i>
                            </router-link>
                             <button class="btn btn btn-danger btn-sm" @click.prevent="deletePost(data.item.id)">
                                <i class="fa fa-trash"></i>
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
                    key: 'session_name',
                    label:'Session Name',
                    sortable: false
                },
               
                
                {
                    key: 'action',
                    sortable: false
                },
               
          
            ],
             sessions: []
          
        }
        
       
    },
   
    computed:{
      rows(){
        return this.sessions.length;
      }
    },
    created() {
        let uri = '/api/sessions';
        console.log(this.sessions.id);
        this.axios.get(uri).then(response => {
          this.sessions = response.data.data;
          
        });
    },
    
    
  methods: {
      deletePost(id)
      {
        let uri = `/api/session/delete/${id}`;
        console.log(id);
        this.axios.delete(uri).then(response => {
          this.sessions.splice(this.sessions.findIndex(session => session.id === id), 1);
        });
      }
    }
}
</script>