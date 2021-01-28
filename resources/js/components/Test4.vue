<template>
    <main class="bg-white-500 flex-1 p-3 overflow-hidden">
        <div class="flex flex-col">
                   

                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                Full Table
                            </div>
                            <div class="p-3">
                                <table class="table-responsive w-full rounded">
                                    <thead>
                                      <tr>
                                        <th class="border ">Select</th>
                                        <th class="border ">Course Name</th>
                                        <th class="border ">Semester-section</th>
                                        <th class="border ">Teacher</th>
                                        <th class="border ">Time 1</th>
                                        <th class="border ">Time 2</th>
                                        <th class="border ">Time 3</th>
                                        <th class="border ">Gourp 1</th>
                                        <th class="border ">Gourp 2</th>
                                        <th class="border ">Gourp 3</th>
                                        
                                      </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <tr  v-for="course in courses" :key="course.id">
                                            <td class="border px-4 py-2"><input type="checkbox" id="" name="" value=""></td>
                                            
                                            <td class="border px-4 py-2">{{ course.name }}</td>

                                            <td class="border px-4 py-2">

                                                <select class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-1 px-1 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey">
                                                        <option v-for="semester in semesters" :key="semester.id">{{semester.semester}}</option>
                                                </select>
                                            </td>

                                            <td class="border px-4 py-2">

                                                <select class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-1 px-1 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey">
                                                        <option v-for="teacher in teachers" :key="teacher.id">{{teacher.code}}</option>
                                                </select>
                                            </td>


                                            <td class="border px-4 py-2">

                                                <select class="">
                                                        <option value="0.00">0.00</option>
                                                        <option value="1.00">1.00</option>
                                                        <option value="1.50">1.30</option>
                                                        <option value="2.00">2.00</option>
                                                        <option value="2.50">2.30</option>
                                                        <option value="3.00">3.00</option>
                                                        <option value="3.50">3.30</option>
                                                        <option value="4.00">4.00</option>
                                                        
                                                        
                                                </select>
                                            </td>

                                             <td class="border px-4 py-2">

                                                <select class="">
                                                        <option value="0.00">0.00</option>
                                                        <option value="1.00">1.00</option>
                                                        <option value="1.50">1.30</option>
                                                        <option value="2.00">2.00</option>
                                                        <option value="2.50">2.30</option>
                                                        <option value="3.00">3.00</option>
                                                        <option value="3.50">3.30</option>
                                                        <option value="4.00">4.00</option>
                                                        
                                                        
                                                </select>
                                            </td>
                                             <td class="border px-4 py-2">

                                                <select class="">
                                                        <option value="0.00">0.00</option>
                                                        <option value="1.00">1.00</option>
                                                        <option value="1.50">1.30</option>
                                                        <option value="2.00">2.00</option>
                                                        <option value="2.50">2.30</option>
                                                        <option value="3.00">3.00</option>
                                                        <option value="3.50">3.30</option>
                                                        <option value="4.00">4.00</option>
                                                        
                                                        
                                                </select>
                                            </td>




                                            <td class="border px-4 py-2">
                                                
                                                <input v-if="course.type==0" class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-1 px-1 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                   id="" type="number" readonly placeholder="No group">

                                                <input v-else class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-1 px-1 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                   id="" type="number"  placeholder="group 1">   
                                            
                                            </td>
                                            <td class="border px-4 py-2">
                                                
                                                <input v-if="course.type==0" class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-1 px-1 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                   id="" type="number" readonly placeholder="No group">

                                                 <input v-else class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-1 px-1 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                   id="" type="number"  placeholder="group 2">   
                                            
                                            </td>
                                            <td class="border px-4 py-2">
                                                
                                                <input v-if="course.type==0" class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-1 px-1 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                   id="" type="number" readonly  placeholder="No group">

                                                <input v-else class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-1 px-1 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                   id="" type="number"  placeholder="group 3">   
                                            
                                            </td>


                                            
                                            
                                        </tr>
                                       
                                    </tbody>
                                </table>

                                <div class="p-3">
                                
                                <button class="bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-full">
                                    Save
                                </button>
                                
                                <button class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded-full">
                                    Cancel
                                </button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!--/Grid Form-->
                </div>
    </main>                
</template>




<script>
  export default {
      data() {
        return {
          courses: [],
          semesters:[],
          teachers:[]
        }
      },
      created() {
        let uri = '/api/courses';
        this.axios.get(uri).then(response => {
          this.courses = response.data.data;
          //console.log(this.courses);
        });

        uri = '/api/semester-sections';
        this.axios.get(uri).then(response => {
          this.semesters = response.data.data;
          //console.log(this.semesters);
        });

        uri = '/api/teachers';
        this.axios.get(uri).then(response => {
          this.teachers = response.data.data;
          console.log(this.teachers);
        });
    },
    
  }
</script>