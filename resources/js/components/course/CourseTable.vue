<template>
    
    <main class="bg-white-500 flex-1 p-3 overflow-x-scroll">

                <div class="flex flex-1">
                   

                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">

                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                                 <!-- <button class="modal-trigger bg-green-500 hover:bg-blue-800 text-white font-bold py-2 px-8 rounded-full absolute top-24 right-24 z-50" data-modal='createSessionModal' >Create Session</button> -->
                                <router-link tag="button" class="modal-trigger bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded-full absolute top-32 right-32 z-20"
                                :to="{name: 'addcourse'}">Create Course</router-link>
                            <div class="p-3">
        <compDataTable
             
            title="Courses Table"
            
            :columns="tableColumns1"
            :rows="courses"
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
                         


                        <router-link tag="button"  class="btn  bg-green-500 hover:bg-green-700 darken-2 waves-effect waves-light compact-btn" :to="{name: 'editcourse', params: { id: props.row.id }}" >
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
             
		 ],
		courses: []
        }
        
       
    },
    created() {
        let uri = '/api/courses';
        this.axios.get(uri).then(response => {
          this.courses = response.data.data;

        
          
          for(var i=0;i<this.courses.length;i++){
              
                if(this.courses[i].type==0)
                     this.courses[i].type="Theory Class";
                else if(this.courses[i].type==1)
                     this.courses[i].type="CSE LAB";
                else if(this.courses[i].type==2)
                      this.courses[i].type="EEE LAB";
                else if(this.courses[i].type==3)
                     this.courses[i].type="Communication LAB";
                else if(this.courses.type==4)
                      this.courses[i].type="Mechanical LAB";
                else if(this.courses[i].type==5)
                      this.courses[i].type="Physics LAB";
                else    
                      this.courses[i].type="none";
          }
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