<template>
    

             <main class="bg-white-500 flex-1 p-3 overflow-x-scroll">
                       

             <div class="">
               <b-row>
               <b-col>
                 <h1>Room List</h1>
                 
               </b-col>

                <b-col>
                 <b-form-input v-model="filter" type="search" style="margin-bottom:15px;" placeholder="Search"></b-form-input>
               </b-col>
                 <b-col>
                    <router-link tag="button" align="right" type="button" class="btn btn-success" :to="{name: 'addroom'}">Add Room</router-link>
                 
                </b-col>
              
              
             </b-row>

             <b-row>
              
               <b-col v-if="rooms.length>0">
                 
                 <b-table  responsive striped hover :items="rooms" :fields="fields" :filter="filter" :per-page="perPage" :current-page="currentPage">
                   
                  

                    <template v-slot:cell(action)="data">
                            <router-link tag="button" class="btn btn-primary btn-sm"  :to="{name: 'editroom', params: { id: data.item.id }}" >
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
                    key: 'number',
                    label:'Room Number',
                    sortable: false
                },
                {
                    key: 'name',
                    label:'Room Name',
                    sortable: false
                },
                {
                    key: 'type',
                    label: 'Room Type',
                    //sortable: true,
                    
                },
                {
                    key: 'capacity',
                    label: 'Capacity',
                },
                {
                    key: 'action',
                    sortable: false
                },
               
          
            ],
             rooms:[],
             room:[]
          
        }
        
       
    },
   
    computed:{
      rows(){
        return this.rooms.length;
      }
    },
     created() {
         let uri = '/api/rooms';
         this.axios.get(uri).then(response => {
           this.rooms = response.data.data;
           console.log(this.rooms);
           for(var i=0;i<this.rooms.length;i++){
                 if(this.rooms[i].type==0)
                      this.rooms[i].type="Theory Class";
                 else if(this.rooms[i].type==1)
                      this.rooms[i].type="CSE LAB";
                 else if(this.rooms[i].type==2)
                       this.rooms[i].type="EEE LAB";
                 else if(this.rooms[i].type==3)
                      this.rooms[i].type="Communication LAB";
                 else if(this.rooms.type==4)
                       this.rooms[i].type="Mechanical LAB";
                 else if(this.rooms[i].type==5)
                       this.rooms[i].type="Physics LAB";
                 else    
                       this.rooms[i].type="none";
           }
          
         });
    },
    
    
   methods: {
      deletePost(id)
      {
        
        console.log(id);
        let uri = `/api/room/delete/${id}`;
        
        this.axios.delete(uri).then(response => {
           this.rooms.splice(this.rooms.findIndex(room => room.id === id), 1);
        });
      },
      editRoom(id){
            
            let uri = `/api/room/edit/${id}`;
            this.axios.get(uri).then((response) => {
                this.room = response.data.data;
                console.log(this.room); 
            });
            
      }
    }
}
</script>