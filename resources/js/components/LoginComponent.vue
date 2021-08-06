<template>
      <div class="container mx-auto h-full flex flex-1 justify-center items-center">
  <div class="w-full max-w-lg">
    <div class="leading-loose">
      <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
        <p class="text-gray-800 font-medium text-center text-lg font-bold">Login</p>
        <div class="">
          <label class="block text-sm text-gray-00" for="username">Username</label>
          <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="username" name="username" type="text" required="" placeholder="User Name" aria-label="username" v-model="user.user_name">
        </div>
        <div class="mt-2">
          <label class="block text-sm text-gray-600" for="password">Password</label>
          <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="password" name="password" type="password" required="" placeholder="*******" aria-label="password" v-model="user.password">
        </div>
        <div class="mt-4 items-center justify-between">
          <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit" @click.prevent="logIn">Login</button>
          
        </div>
        
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
        user_name :"",
        password :""
      }
    }
  },
  created(){
    //console.log(this.book);
  },
  
  methods:{
    logIn(){
        let uri = '/api/login';
           this.axios.post(uri, this.user).then((response) => {
             window.localStorage.setItem("userid", response.data.code);
             
             this.$router.push({name: 'session'});
          }).catch((e) => {
            if(e.response.status === 401)
              this.$router.go(0);
          })
    }
  },
  computed:{
        book(){
          console.log("hello");
            console.log( this.store);
        }
  }
}
</script>