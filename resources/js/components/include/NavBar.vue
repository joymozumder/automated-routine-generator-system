<template>
    <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <i class="fas fa-bars pr-2 text-white" @click="sidebarToggle"></i>
                    <h3 class="text-white p-2">Automated Routine System</h3>
                </div>
                <div class="p-1 flex flex-row items-center">
                    <img  class="inline-block h-8 w-8 rounded-full" src="https://avatars0.githubusercontent.com/u/4323180?s=460&v=4" alt="">
                    <a @click="profileToggle" style="cursor : pointer" class="text-white p-6 no-underline hidden md:block lg:block">{{user.userid}}</a>
                    <div id="ProfileDropDown" class="rounded hidden shadow-md bg-white absolute pin-t mt-12 mr-1 pin-r z-50">
                        <ul class="list-reset ">
                          
                          <li><a style="cursor : pointer" class="no-underline px-4 py-2 block text-black hover:bg-grey-light" @click.prevent="logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
</template>

<script>
export default {
    data()
    {
        return{
            user:{
                userid: "",
            }
        }
    },
    created(){
        
        this.user.userid = window.localStorage.getItem("userid");
        
        
    },
    mounted(){
       
    },
    methods:{
        logout(){
            window.localStorage.setItem("userid","");
            this.$router.push({name: 'login'});
        },
        profileToggle(){
            var Profile_DropDown = document.getElementById('ProfileDropDown')
            if (Profile_DropDown.style.display == "none" || Profile_DropDown.style.display == "") {
                Profile_DropDown.style.display = "block";
            } else {
                Profile_DropDown.style.display = "none";
            }
        },
        

         sidebarToggle() {
             var side_bar = document.getElementById('sidebar');
            if (side_bar.style.display === "none" || side_bar.style.display == "") {
                side_bar.style.display = "block";
            } else {
                side_bar.style.display = "none";
            }
        }
       
    }
}
</script>