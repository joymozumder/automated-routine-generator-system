<template>
    
    <main>

         <compDataTable
            title="Sessions table"
            :columns="tableColumns1"
            :rows="sessions"
        > 
                <th slot="thead-tr">
                    Actions
                </th>
                <template slot="tbody-tr" scope="props">
                    <td>
                         <button class="btn red darken-2 waves-effect waves-light compact-btn"
                            >
                            <!-- <i class="material-icons white-text">
                                edit</i> -->
                                <router-link tag="i" class="material-icons white-text" :to="{name: 'editroom', params: { id: props.row.id }}" >edit</router-link>
                            
                        </button> 
                        <button class="btn red darken-2 waves-effect waves-light compact-btn"
                            @click.prevent="deletePost(props.row.id)"> 
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
		 		label: "Session Name",
		 		field: "session_name",
		 		numeric: false,
 		        html: false
		 	},
            {
		 		label: "Status",
		 		field: "status",
		 		numeric: false,
		 		html: false
             }
		 ],
		sessions: []
        }
        
       
    },
    created() {
        let uri = '/api/sessions';
        console.log(this.sessions.id);
        this.axios.get(uri).then(response => {
          this.sessions = response.data.data;
          
        });
    },
     components:{
            compDataTable 
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