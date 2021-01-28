<template>
    
              <main class="bg-white-500 flex-1 p-3 overflow-x-scroll z-10">

                <div class="flex flex-1">
                   

                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">

                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                                 <!-- <button class="modal-trigger bg-green-500 hover:bg-blue-800 text-white font-bold py-2 px-8 rounded-full absolute top-24 right-24 z-50" data-modal='createSessionModal' >Create Session</button> -->
                                <!-- <router-link tag="button" class="modal-trigger bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded-full absolute top-24 right-24 z-40"
                                :to="{name: 'courseassign', params: { id: session }}">Create Course</router-link> -->
                            <div class="p-3">
                                 <compDataTable
             
            title="Semester Table"
            
            :columns="tableColumns1"
            :rows="newsemesters"
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
                      

                        <!-- <router-link tag="button"  class="btn  bg-green-500 hover:bg-green-700 darken-2 waves-effect waves-light compact-btn" :to="{name: 'editenrollment', params: { id: props.row.id }}" >
                             <i class="material-icons white-text">
                                edit</i>
                         </router-link> -->
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
    
    data(){
        return{
             tableColumns1: [
            
		 	{
		 		label: "Semester name",
		 		field: "semester",
		 		numeric: false,
 		        html: false
		 	},
		 	{
		 		label: "Section",
		 		field: "section",
		 		numeric: false,
		 		html: false
             },
             {
		 		label: "Total Student",
		 		field: "total_student",
		 		numeric: false,
		 		html: false
		 	},
		 	
		 ],
             semesters:[],
             newsemesters:[
                 {
                    semester:"1st",
                    total_student:0,
                    section:""
                },
                {
                    semester:"2nd",
                    total_student:0,
                    section:""
                },
                {
                    semester:"3rd",
                    total_student:0,
                    section:""
                },
                {
                    semester:"4th",
                    total_student:0,
                    section:""
                },
                {
                    semester:"5th",
                    total_student:0,
                    section:""
                },
                {
                    semester:"6th",
                    total_student:0,
                    section:""
                },
                {
                    semester:"7th",
                    total_student:0,
                    section:""
                },
                {
                    semester:"8th",
                    total_student:0,
                    section:""
                },
                
             ]
             

        }
    },
    created() {
        
        let uri = '/api/semester-sections';
        this.axios.get(uri).then(response => {
            this.semesters = response.data.data;
            //console.log(this.semesters);

            for(var i=0;i<8;i++){
                // this.newsemesters[i]={
                //     semester:"",
                //     total_student:0,
                //     section:""
                // };
               
               //this.newsemesters[i].semester=i+1;
                // this.newsemesters[i].total_student=this.semesters[i].total_student;
                var count=0,total_student;

                this.newsemesters[i].total_student=this.semesters[i].total_student;
                for(var j=0;j<this.semesters.length;j++){
                    if(this.semesters[j].semester[0]==i+1)
                    {
                        count=count+1;
                        this.newsemesters[i].total_student=this.newsemesters[i].total_student+this.semesters[j].total_student;
                    }    
                          
                }
                if(count==0)
                    this.newsemesters[i].section="None";
                else if(count==1)
                        this.newsemesters[i].section="A";
                else if(count==2)
                        this.newsemesters[i].section="A,B";
                else if(count==3)
                        this.newsemesters[i].section="A,B,C";
                else if(count==4)
                        this.newsemesters[i].section="A,B,C,D";
                else if(count==5)
                        this.newsemesters[i].section="A,B,C,D,E";
                else
                        this.newsemesters[i].section="invalid";

        

                            

                    
                
                
            }
            console.log(this.newsemesters);
          
        });

        
    },
     components:{
            compDataTable 
     },
   
}
</script>