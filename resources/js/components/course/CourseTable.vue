<template>
     <main class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
			 <div id='recipients' class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
			 
				
				<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
					<thead>
						<tr>
							<th data-priority="1">ID</th>
							<th data-priority="2">Course Code</th>
							<th data-priority="3">Course Name</th>
							<th data-priority="4">Credit</th>
							<th data-priority="5">Type</th>
							<th data-priority="6">status</th>
							<th data-priority="7">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr  v-for="course in courses" :key="course.id">
							<td>{{ course.id }}</td>
              <td>{{ course.code }}</td>
							<td>{{ course.name }}</td>
							<td>{{ course.credit }}</td>
							<td>{{ course.type }}</td>
							
							<td v-if="course.status===0">
                                                <i class="fas fa-times text-red-500 mx-2"></i>
                            </td>
                            <td v-else>
                                                <i class="fas fa-check text-green-500 mx-2"></i>
                            </td>
                            <td>
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                        <i class="fas fa-eye"></i></a>
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                        <i class="fas fa-edit"><router-link :to="{name: 'editcourse', params: { id: course.id }}" >Edit</router-link></i></a>
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500" @click.prevent="deletePost(course.id)">
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
    methods: {
      deletePost(id)
      {
        let uri = `/api/course/delete/${id}`;
        console.log(id);
        this.axios.delete(uri).then(response => {
          this.courses.splice(this.courses.findIndex(course => course.id === id), 1);
        });
      }
    }
  }
</script>


