<template>
    <div class="mx-auto bg-grey-lightest">
    <!--Screen-->
    <div class="min-h-screen flex flex-col">
        <!--Header Section Starts Here-->
        <compNavBar/>
        <!--/Header-->
        <!-- 
            ______________________________________________________________________________________-
         -->

        <div class="flex flex-1">
            <!--Sidebar-->
            <compSideBar/>
            <!--/Sidebar-->

            
            <!--Main-->
            <router-view></router-view>
            <!--/Main-->
        </div>
        <!--Footer-->
        <footer class="bg-grey-darkest text-white p-2">
            <div class="flex flex-1 mx-auto">&copy; My Design</div>
        </footer>
        <!--/footer-->

    </div>

    </div>
</template>

<script>
    import compNavBar from './include/NavBar';
    import compSideBar from './include/SideBar';
   
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        components:{
            compNavBar,
            compSideBar
           
        }
    }
</script>
