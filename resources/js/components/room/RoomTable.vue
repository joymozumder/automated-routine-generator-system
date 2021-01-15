<template>
     <main class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
			 <div id='recipients' class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
			 
				
				<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
					<thead>
						<tr>
							<th data-priority="1">ID</th>
							<th data-priority="2">Room Number</th>
							<th data-priority="3">Room Name</th>
							<th data-priority="5">Type</th>
							<th data-priority="5">Capacity</th>
							<th data-priority="6">status</th>
							<th data-priority="7">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr  v-for="room in rooms" :key="room.id">
							<td>{{ room.id }}</td>
              				<td>{{ room.number }}</td>
							<td>{{ room.name }}</td>
							<td>{{ room.type }}</td>
							<td>{{ room.capacity }}</td>

							<td v-if="room.status===0">
                                                <i class="fas fa-times text-red-500 mx-2"></i>
                            </td>
                            <td v-else>
                                                <i class="fas fa-check text-green-500 mx-2"></i>
                            </td>
                            <td>
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                        <i class="fas fa-eye"></i></a>
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                        <i class="fas fa-edit"><router-link :to="{name: 'editroom', params: { id: room.id }}" >Edit</router-link></i></a>
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500" @click.prevent="deletePost(room.id)">
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
          rooms: []
        }
      },
      created() {
        let uri = '/api/rooms';
        this.axios.get(uri).then(response => {
          this.rooms = response.data.data;
          
        });
    },
    methods: {
      deletePost(id)
      {
        let uri = `/api/room/delete/${id}`;
        console.log(id);
        this.axios.delete(uri).then(response => {
          this.rooms.splice(this.rooms.findIndex(room => room.id === id), 1);
        });
      }
    }
  }
</script>