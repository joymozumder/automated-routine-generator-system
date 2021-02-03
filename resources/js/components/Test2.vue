<template>
        <main class="bg-white-500 flex-1 p-3 overflow-hidden">
            <div class="flex flex-1">
                            <!-- Card Sextion Starts Here -->
                            <div class="container mx-auto h-full flex flex-1 justify-center items-center">
                                <!--Horizontal form-->
                                <div class="mb-2 border-solid border-grey-light rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
                                    <div class="bg-gray-300 px-2 py-3 border-solid border-gray-400 border-b">
                                        Select Session
                                    </div>
                                    <div class="p-3">
                                        <form class="w-full">
                                            <div class="md:flex md:items-center mb-6">
                                                <div class="md:w-1/4">
                                                    <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                        for="inline-course-code">
                                                        Session Name
                                                    </label>
                                                </div>
                                                <div class="md:w-3/4">
                                                    <select  class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                                id="grid-state">
                                                            <option>123</option>
                                                        
                                                        </select>
                                                </div>
                                            </div>
                                            
                                        

                                                
                                            <div class="md:flex md:items-center mb-6 justify-center space-x-2" >

                                                <button class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-2 rounded-full" @click.prevent="addSet" >Print Routine </button>
                                            </div>
                                            

                                        
                                            
                                        
                                        
                                        </form>
                                    </div>
                                </div>

                                <div v-if="set>0" class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2"> </div>

                                <!-- ___________ -->
                                <div  v-if="set>0" class="mb-2 border-solid border-grey-light rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
                                    <div class="bg-gray-300 px-2 py-3 border-solid border-gray-400 border-b">
                                        Select Session
                                    </div>
                                    <div class="p-3">
                                        <form class="w-full">
                                            <div class="md:flex md:items-center mb-6">
                                                <div class="md:w-1/4">
                                                    <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                        for="inline-course-code">
                                                        Session Name
                                                    </label>
                                                </div>
                                                <div class="md:w-3/4">
                                                    <select  class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                                id="grid-state">
                                                            <option>123</option>
                                                        
                                                        </select>
                                                </div>
                                            </div>
                                            
                                        

                                                
                                            <div class="md:flex md:items-center mb-6 justify-center space-x-2" >

                                                <button class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-2 rounded-full" @click.prevent="" >Print Routine </button>
                                            </div>
                                            

                                        
                                            
                                        
                                        
                                        </form>
                                    </div>
                                </div>
                            

                            
                            </div>


            </div>





             <div class="flex flex-1">
                            <!-- Card Sextion Starts Here -->
                            <div class="container mx-auto h-full flex flex-1 justify-center items-center">
                                <!--Horizontal form-->
                                <div class="mb-2 border-solid border-grey-light rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
                                    <div class="bg-gray-300 px-2 py-3 border-solid border-gray-400 border-b">
                                        Select Session
                                    </div>
                                    <div class="p-3">
                                        <form class="w-full">
                                            <div class="md:flex md:items-center mb-6">
                                                <div class="md:w-1/4">
                                                    <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                        for="inline-course-code">
                                                        Session Name
                                                    </label>
                                                </div>
                                                <div class="md:w-3/4">
                                                    <select  class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                                id="grid-state">
                                                            <option>123</option>
                                                        
                                                        </select>
                                                </div>
                                            </div>
                                            
                                        

                                                
                                            <div class="md:flex md:items-center mb-6 justify-center space-x-2" >

                                                <button class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-2 rounded-full" @click.prevent="addSet" >Print Routine </button>
                                            </div>
                                            

                                        
                                            
                                        
                                        
                                        </form>
                                    </div>
                                </div>

                                <div v-if="set>0" class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2"> </div>

                                <!-- ___________ -->
                                <div  v-if="set>0" class="mb-2 border-solid border-grey-light rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
                                    <div class="bg-gray-300 px-2 py-3 border-solid border-gray-400 border-b">
                                        Select Session
                                    </div>
                                    <div class="p-3">
                                        <form class="w-full">
                                            <div class="md:flex md:items-center mb-6">
                                                <div class="md:w-1/4">
                                                    <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                        for="inline-course-code">
                                                        Session Name
                                                    </label>
                                                </div>
                                                <div class="md:w-3/4">
                                                    <select  class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                                id="grid-state">
                                                            <option>123</option>
                                                        
                                                        </select>
                                                </div>
                                            </div>
                                            
                                        

                                                
                                            <div class="md:flex md:items-center mb-6 justify-center space-x-2" >

                                                <button class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-2 rounded-full" @click.prevent="" >Print Routine </button>
                                            </div>
                                            

                                        
                                            
                                        
                                        
                                        </form>
                                    </div>
                                </div>
                            

                            
                            </div>


            </div>






                    


   






    </main>

</template>

<script>
    export default {
        data(){
        return {
            set:0
        
        }
        
    },
    created() {
       console.log(this.set);
    },
    methods:{
        addSet(){
            console.log(this.set);
            
            this.set=1;
            console.log(this.set);
        }
    
    }
   
  }
</script>

