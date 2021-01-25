

<template>


    
       
            <main class="bg-white-500 flex-1 p-3 overflow-hidden">

                <div class="flex flex-1">
                   

                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">

                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                                 <button class="modal-trigger bg-green-500 hover:bg-blue-800 text-white font-bold py-2 px-8 rounded-full absolute top-24 right-24 z-50" data-modal='createSessionModal' @click.prevent="">Create Session</button>

                            <div class="p-3">
                                 <compDataTable
             
            title="Room Table"
            
            :columns="tableColumns1"
            :rows="rooms"
            :clickable="false"
            :sortable="True"
            
            :exactSearch="True"
            :searchable="True"
            :paginate="True"
            :exportable="false"
            :printable="false"
            

        > 










                <th slot="thead-tr">
                    Actions
                </th>
                <template slot="tbody-tr" slot-scope="props">
                    <td>
                         <button class="modal-trigger btn red darken-2 waves-effect waves-light compact-btn"
                           data-modal='addRoomModal' @click.prevent="editRoom(props.row.id)" >
                            <i class="material-icons white-text">
                                edit</i>
                               
                        </button> 
               

                         

                        <button class="btn red darken-2 waves-effect waves-light compact-btn"
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
             },
             {
		 		label: "status",
		 		field: "status",
		 		numeric: false,
		 		html: false
             },
             {
		 		label: "id",
		 		field: "id",
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