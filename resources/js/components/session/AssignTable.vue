<template>
    <main class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
			 <div id='recipients' class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
			 
				
				<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
					<thead>
						<tr>
							<th>ID</th>
							<th>Session Name</th>
							<th>Semester</th>
							<th>Teacher code</th>
							<th>Course code</th>
							<th>Room Number</th>
							
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr  v-for="enrollment in enrollments" :key="enrollment.id">
							<td>{{ enrollment.id }}</td>
              				<td>{{ enrollment.session_name }}</td>
              				<td>{{ enrollment.semester }}</td>
              				<td>{{ enrollment.teacher_code }}</td>
              				<td>{{ enrollment.course_code }}</td>
              				<td>{{ enrollment.room_number }}</td>
							

							
                            <td>
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                        <i class="fas fa-eye"></i></a>
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                        <i class="fas fa-edit">
                                                           <!-- <router-link :to="{name: 'editroom', params: { id: room.id }}" >Edit</router-link>--> 
                                                        </i></a>
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500" @click.prevent="deletePost(session.id)">
                                                        <i class="fas fa-trash"></i>
                                                </a>
                            </td>
						</tr>
						
					
                        

                        

                       


                   

                       

                       

					</tbody>
					
				</table>
				
				
			</div>
        </main>
</template>




<script>
  export default {
      data() {
        return {
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
    methods: {
      deletePost(id)
      {
        let uri = `/api/enrollment/delete/${id}`;
        console.log(id);
        this.axios.delete(uri).then(response => {
          this.enrollments.splice(this.enrollments.findIndex(enrollment => enrollment.id === id), 1);
        });
      }
    }
  }
</script>