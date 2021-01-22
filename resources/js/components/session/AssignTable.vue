<template>
    
    <main>

         <compDataTable
            title="Assign Courses"
            :columns="tableColumns1"
            :rows="enrollments"
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
		 		label: "Semester",
		 		field: "semester",
		 		numeric: false,
		 		html: false
		 	},
		 	{
		 		label: "Teacher Code",
		 		field: "teacher_code",
		 		numeric: false,
		 		html: false
		 	},
            {
		 		label: "Course Code",
		 		field: "course_code",
		 		numeric: false,
		 		html: false
             },
            {
		 		label: "Room Number",
		 		field: "room_number",
		 		numeric: false,
		 		html: false
             }
		 ],
		enrollments: []
        }
        
       
    },
    created() {
        let uri = '/api/enrollments';
        //console.log(this.sessions.id);
        this.axios.get(uri).then(response => {
          this.enrollments = response.data.data;
          
        });
    },
     components:{
            compDataTable 
     },
     methods: {
      deletePost(id)
      {
        let uri = `/api/enrollment/delete/${id}`;
        //console.log(id);
        this.axios.delete(uri).then(response => {
          this.enrollments.splice(this.enrollments.findIndex(enrollment => enrollment.id === id), 1);
        });
      }
    }
}
</script>