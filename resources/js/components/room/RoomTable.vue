

<template>


       
            <main class="bg-white-500 flex-1 p-3 overflow-x-scroll">

                <div class="flex flex-1">
                   

                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">

                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                                 <router-link tag="button" class="modal-trigger bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded-full absolute top-24 right-24 z-50"
                                :to="{name: 'addroom'}">Create Room</router-link>
                            <div class="p-3">
                                 <compDataTable
             
            title="Room Table"
            
            :columns="tableColumns1"
            :rows="rooms"
            :clickable="false"
            :sortable="true"
            
            :exactSearch="true"
            :searchable="true"
            :paginate="true"
            :exportable="false"
            :printable="false"
            

        > 










                <th slot="thead-tr">
                    Actions
                </th>
                <template slot="tbody-tr" slot-scope="props">
                    <td>
                         
               
                         <router-link tag="button"  class="btn  bg-green-500 hover:bg-green-700 darken-2 waves-effect waves-light compact-btn" :to="{name: 'editroom', params: { id: props.row.id }}" >
                             <i class="material-icons white-text">
                                edit</i>
                         </router-link>
                       
                         

                        <button class="btn bg-red-500 hover:bg-red-700 darken-2 waves-effect waves-light compact-btn"
                            @click.prevent="deletePost(props.row.id)"> 
                            <i class="material-icons white-text">delete</i>
                        </button>

                    </td>
                    
                </template>
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
		 		label: "Room Number",
		 		field: "number",
		 		numeric: false,
 		        html: false
		 	},
		 	{
		 		label: "Room Name",
		 		field: "name",
		 		numeric: false,
		 		html: false
		 	},
		 	{
		 		label: "Room Type",
		 		field: "type",
		 		numeric: false,
		 		html: false
		 	},
		 	{
		 		label: "Capacity",
		 		field: "capacity",
		 		numeric: false,
		 		html: false
             }
		 ],
        rooms:[],
        room:[]
        }
        
       
    },
    created() {
        let uri = '/api/rooms';
        this.axios.get(uri).then(response => {
          this.rooms = response.data.data;
          //console.log(this.rooms);
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
     components:{
            compDataTable 
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