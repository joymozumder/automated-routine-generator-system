<template>
    
    <main>

         <compDataTable
            title="Room table"
            :columns="tableColumns1"
            :rows="rooms"
        > 
                <th slot="thead-tr">
                    Actions
                </th>
                <template slot="tbody-tr" scope="props">
                    <td>
                         <button class="btn red darken-2 waves-effect waves-light compact-btn"
                            @click.prevent="deletePost(name)">
                            <i class="material-icons white-text">edit</i>
                        </button> 
                        <button class="btn red darken-2 waves-effect waves-light compact-btn"
                            @click.prevent="deletePost(props.row)"> 
                            <i class="material-icons white-text">delete</i>
                        </button>
                    </td>
                    
                </template>
        </compDataTable>
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
		rooms:[]
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
      deletePost(row)
      {
        let id=row.id;
        console.log(row);
        let uri = `/api/room/delete/${id}`;
        
        this.axios.delete(uri).then(response => {
           this.rooms.splice(this.rooms.findIndex(room => room.id === id), 1);
        });
      }
    }
}
</script>