<template>
     <main class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
			 <div id='recipients' class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
			 
				
				<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
					<thead>
						<tr>
							<th data-priority="1">ID</th>
							<th data-priority="2">Session Name</th>
							<th data-priority="3">status</th>
							<th data-priority="4">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr  v-for="session in sessions" :key="session.id">
							<td>{{ session.id }}</td>
              				<td>{{ session.session_name }}</td>
							

							<td v-if="session.status===0">
                                                <i class="fas fa-times text-red-500 mx-2"></i>
                            </td>
                            <td v-else>
                                                <i class="fas fa-check text-green-500 mx-2"></i>
                            </td>
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