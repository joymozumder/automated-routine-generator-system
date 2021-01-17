<template>
       <main class="bg-white-500 flex-1 p-3 overflow-hidden">

                <div class="flex flex-col">
                    <!-- Card Sextion Starts Here -->
                    <div class="container mx-auto h-full flex flex-1 justify-center items-center">
                        <!--Horizontal form-->
                        <div class="mb-2 border-solid border-grey-light rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
                            <div class="bg-gray-300 px-2 py-3 border-solid border-gray-400 border-b">
                                Room Information
                            </div>
                            <div class="p-3">
                                <form class="w-full">
                                    <div class="md:flex md:items-center mb-6">
                                        <div class="md:w-1/4">
                                            <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                   for="inline-course-code">
                                                Room Number
                                            </label>
                                        </div>
                                        <div class="md:w-3/4">
                                            <input class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                   id="inline-full-name" type="number" v-model="room.number" placeholder="Enter Room Number">
                                        </div>
                                    </div>
                                     
                                    <div class="md:flex md:items-center mb-6">
                                        <div class="md:w-1/4">
                                            <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                   for="inline-course-code">
                                                Room Name
                                            </label>
                                        </div>
                                        <div class="md:w-3/4">
                                            <input class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                   id="inline-full-name" type="text" v-model="room.name" placeholder="Enter Room Name">
                                        </div>
                                    </div>
                                    
                                    
                                   

                                    <div class="md:flex md:items-center mb-6">
                                        <div class="md:w-1/4">
                                            <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                   for="inline-course-code">
                                                Room Type
                                            </label>
                                        </div>
                                        <div class="md:w-3/4">
                                            
                                            <select class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                       v-model="room.type" id="grid-state">
                                                    <option value="0">Theory Class</option>
                                                    <option value="1">CSE LAB</option>
                                                    <option value="2">EEE LAB</option>
                                                    <option value="3">Communication LAB</option>
                                                    <option value="4">Mechanical LAB</option>
                                                    <option value="5">Physics LAB</option>
                                                </select>
                                                
                                        </div>
                                    </div>



                                    <div class="md:flex md:items-center mb-6">
                                        <div class="md:w-1/4">
                                            <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                   for="inline-course-code">
                                                Capacity
                                            </label>
                                        </div>
                                        <div class="md:w-3/4">
                                            <input class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                   id="inline-full-name" type="number" v-model="room.capacity" placeholder="Enter Capacity">
                                        </div>
                                    </div>










                                    
                                    <div class="md:flex md:items-center mb-6">
                                        <div class="md:w-1/3"></div>
                                        <label class="md:w-2/3 block text-grey font-regular">
                                            <input class="mr-2 leading-tight" v-model="room.status" type="checkbox">
                                            <span class="text-sm">
                                                Status
                                            </span>
                                        </label>
                                    </div>
                                    <div class="md:flex md:items-center">
                                        <div class="md:w-1/3"></div>
                                        <div class="md:w-2/3">
                                            <button @click.prevent="addRoom" class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-full">
                                                Save Room 
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--/Horizontal form-->

                       
                    </div>

























                    <!-- /Cards Section Ends Here -->

                   
                </div>
            </main>
</template>


<script>
    export default {
        data(){
        return {
          room:{
              number:0,
              name:"",
              type:0,
              capacity:0,
              status:false
          }
        }
    },
    methods: {
      addRoom(){
        //console.log(this.room);
        
          let uri = '/api/room/create';
         this.axios.post(uri, this.room).then((response) => {
         this.$router.push({name: 'rooms'});
      });
}
    }
  }
</script>