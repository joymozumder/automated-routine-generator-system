<template>
    <div>
        semester table 
    </div>
</template>

<script>
export default {
    data(){
        return{
             semesters:[],
             newsemesters:[]
             

        }
    },
    created() {
        
        let uri = '/api/semester-sections';
        this.axios.get(uri).then(response => {
            this.semesters = response.data.data;
            //console.log(this.semesters);
          
        });

        for(var i=0;i<8;i++){
             this.newsemesters[i]={};
             this.newsemesters[i].semester=i+1;
            // this.newsemesters[i].total_student=this.semesters[i].total_student;
             var pos=0;
             for(var j=0;j<this.semesters.length;j++){
                //if(this.semesters[i].semester[0]=='1')
                    //this.
             }
            
            
         }
        // console.log(this.newsemester);
    },
   
}
</script>