<template>
    
    <main>

         <compDataTable
            title="Courses table"
            :columns="tableColumns1"
            :rows="courses"
        > 
                <th slot="thead-tr">
                    Actions
                </th>
                <template slot="tbody-tr" slot-scope="props">
                    <td>
                         <button class="btn red darken-2 waves-effect waves-light compact-btn"
                            >
                            <!-- <i class="material-icons white-text">
                                edit</i> -->
                                <router-link tag="i" class="material-icons white-text" :to="{name: 'editcourse', params: { id: props.row.id }}" >edit</router-link>
                            
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
		 		label: "Course Code",
		 		field: "code",
		 		numeric: false,
 		        html: false
		 	},
		 	{
		 		label: "Course Name",
		 		field: "name",
		 		numeric: false,
		 		html: false
		 	},
		 	{
		 		label: "Credit",
		 		field: "credit",
		 		numeric: false,
		 		html: false
		 	},
		 	{
		 		label: "Type",
		 		field: "type",
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
		courses: []
        }
        
       
    },
    created() {
        let uri = '/api/courses';
        this.axios.get(uri).then(response => {
          this.courses = response.data.data;
          //console.log(response);
        });
    },
     components:{
            compDataTable 
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