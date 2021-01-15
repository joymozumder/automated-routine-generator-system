<template>
    <div class="container mx-auto h-full flex flex-1 justify-center items-center">
    <div class="w-full max-w-lg">
        <div class="leading-loose">
            <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-medium">Register</p>
                <div class="">
                    <label class="block text-sm text-gray-00" for="cus_name">Name</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="cus_name" v-model="user.name" type="text" required="" placeholder="Your Name" aria-label="Name">
                </div>

                <div class="">
                    <label class="block text-sm text-gray-00" for="cus_name">Email</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="cus_name" v-model="user.email" type="text" required="" placeholder="Your Email" aria-label="Name">
                </div>

                <div class="">
                    <label class="block text-sm text-gray-00" for="cus_name">Password</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="cus_name" v-model="user.password" type="password" required="" placeholder="Enter Your Password" aria-label="Name">
                </div>

                <div class="">
                    <label class="block text-sm text-gray-00" for="cus_name">Teacher Code</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="cus_name" v-model="user.code" type="text" required="" placeholder="Enter Your Code" aria-label="Name">
                </div>

                

                

                <div class="mt-4">
                    <button @click.prevent="addUser" class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Register</button>
                </div>
                <a class="inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-blue-800">
                    <router-link to="/">Already have an account ?</router-link>
                </a>
            </form>
        </div>
    </div>
</div>
</template>



<script>
    export default {
        data(){
        return {
          user:{
                name:"",
                email:"",
                password:"",
                code:""
                
          }
        }
    },
    methods: {
      addUser(){
        console.log(this.user);
        
          let uri = '/api/teacher/create';
           this.axios.post(uri, this.user).then((response) => {
             this.$router.push({name: 'login'});
          });
      }
    }
  }
</script>