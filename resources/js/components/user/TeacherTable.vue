<template>
    
    <main>

         <compDataTable
            title="Teachers table"
            :columns="tableColumns1"
            :rows="teachers"
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
		 		label: "Teacher Name",
		 		field: "name",
		 		numeric: false,
 		        html: false
		 	},
		 	{
		 		label: "Teacher Email",
		 		field: "email",
		 		numeric: false,
		 		html: false
		 	},
		 	{
		 		label: "Teacher Code",
		 		field: "code",
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
		teachers: []
        }
        
       
    },
    created() {
        let uri = '/api/teachers';
        this.axios.get(uri).then(response => {
          this.teachers = response.data.data;
          
        });
    },
     components:{
            compDataTable 
     },
     methods: {
      deletePost(id)
      {
        let uri = `/api/teacher/delete/${id}`;
        console.log(id);
        this.axios.delete(uri).then(response => {
          this.teachers.splice(this.teachers.findIndex(teacher => teacher.id === id), 1);
        });
      }
    }
}
</script>