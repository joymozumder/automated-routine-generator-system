<template>
    
              <main class="bg-white-500 flex-1 p-3 overflow-x-scroll z-10">

                <div class="flex flex-1">
                   

                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">

                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                                 <!-- <button class="modal-trigger bg-green-500 hover:bg-blue-800 text-white font-bold py-2 px-8 rounded-full absolute top-24 right-24 z-50" data-modal='createSessionModal' >Create Session</button> -->
                                <router-link tag="button" class="modal-trigger bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded-full absolute top-24 right-24 z-40"
                                :to="{name: 'courseassign'}">Create Course</router-link>
                            <div class="p-3">
                                 <compDataTable
             
            title="Enrollment Table"
            
            :columns="tableColumns1"
            :rows="enrollments"
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
                      

                        <router-link tag="button"  class="btn  bg-green-500 hover:bg-green-700 darken-2 waves-effect waves-light compact-btn" :to="{name: 'editenrollment', params: { id: props.row.id }}" >
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