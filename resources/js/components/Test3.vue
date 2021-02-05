<template>
    
           <main class="bg-white-500 flex-1 p-3 overflow-x-scroll">

                <div class="flex flex-1">
                   

                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">

                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                                <router-link tag="button" class="modal-trigger bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded-full absolute top-32 right-32 z-50"
                                :to="{name: 'addteacher'}">Add Teacher</router-link>
                            <div class="p-3">
                                        <compDataTable
                                        
                                        title="Teachers Table"
                                        
                                        :columns="tableColumns1"
                                        :rows="semester_courses"
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
                                                    <router-link tag="button"  class="btn  bg-green-500 hover:bg-green-700 darken-2 waves-effect waves-light compact-btn" :to="{name: 'editteacher', params: { id: props.row.id }}" >
                                                        <i class="material-icons white-text">
                                                            edit</i>
                                                    </router-link> 
                                                    <button class="btn  bg-red-500 hover:bg-red-700 darken-2 waves-effect waves-light compact-btn"
                                                        @click.prevent="deletePost(props.row.id)"> 
                                                        <i class="material-icons white-text">delete</i>
                                                    </button>
                                                </td>
                                                
                                            </template>
                                    </compDataTable>

                            </div>
                        </div>
                    </div>
                   
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
		 		label: "Session Name",
		 		field: "session_name",
		 		numeric: false,
		 		html: false
		 	},
            
		 	{
		 		label: "Semester Section",
		 		field: "semester_section",
		 		numeric: false,
 		        html: false
		 	},
		 	{
		 		label: "Course Name",
		 		field: "course_name",
		 		numeric: false,
		 		html: false
		 	},
		 	
		 ],
		semester_courses: [],
        teachers:[]
        }
        
       
    },
    created() {
        let uri = `/api/semester-courses/${this.$route.params.session}/${this.$route.params.id}`;
        this.axios.get(uri).then(response => {
          this.semester_courses = response.data.data;
          console.log(this.semester_courses);
        });

        uri = '/api/teachers';
        this.axios.get(uri).then(response => {
          this.teachers = response.data.data;
          console.log(this.teachers);
        });
    },
     components:{
            compDataTable 
     },
     methods: {
      
    }
}
</script>