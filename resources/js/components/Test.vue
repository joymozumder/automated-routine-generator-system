<template>
	<vuetable ref="vuetable"
    :api-mode="false"
    :fields="['id', 'name', 'number', 'status','type']"
    :data="rooms"
    pagination-path=""
  ></vuetable>
</template>

<script>
import Vuetable from 'vuetable-2';
import VuetablePagination from "vuetable-2/src/components/VuetablePagination";
export default {
	data(){
		return{
			rooms:[]
		}		

	},
	created() {
        let uri = '/api/rooms';
        this.axios.get(uri).then(response => {
          this.rooms = response.data.data;
          console.log(this.rooms);
          
        });
    },
	components: {
		Vuetable,
		VuetablePagination
	},
	methods:{
		
	}
	  
}
</script>