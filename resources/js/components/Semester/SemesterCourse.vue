<template>
    

             <main class="bg-white-500 flex-1 p-3 overflow-x-scroll">
                       

             <div class="">
               <b-row>
               <b-col>
                 <h1>Semester With Courses</h1>
                 
               </b-col>
               <b-col>
                 <b-form-input v-model="filter" type="search" placeholder="Search"></b-form-input>
               </b-col>
             </b-row>

             <b-row>
              
               <b-col>
                 
                 <b-table responsive striped hover :items="semester_courses" :fields="fields" :filter="filter" :per-page="perPage" :current-page="currentPage">
                   
                   <template v-slot:cell(status)="data">
                     <input type="checkbox"  v-model="assigncourse.id" :value="data.item.id">
                   </template>

                    <template v-slot:cell(action)="data1">
                   <router-link tag="button" class="btn btn-primary btn-sm"  :to="{name: 'editsemestercourse', params: { id: data1.item.id }}" >
                             Edit
                         </router-link>
                   </template>

                   

                 </b-table>
                 <b-pagination v-model="currentPage" :total-rows="rows" :per-page="perPage"></b-pagination>
               </b-col>

               
             </b-row>

             

            </div>
      
             <div class="flex justify-center">
                <button data-modal='centeredFormModal'
                    class="modal-trigger bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Select
                    </button>
              </div>


              <!-- Modal -->
           <div id='centeredFormModal' class="modal-wrapper">
    <div class="overlay close-modal"></div>
    <div class="modal modal-centered">
        <div class="modal-content shadow-lg p-5">
            <div class="border-b p-2 pb-3 pt-0 mb-4">
               <div class="flex justify-between items-center">
                    Assign
                    <span class='close-modal cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200'>
                        <i class="fas fa-times text-gray-700"></i>
                    </span>
               </div>
            </div>
            <!-- Modal content -->
            <form id='form_id' class="w-full">
               
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-password">
                            Teacher
                        </label>
                        <select class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-2 px-2 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                             v-model="assigncourse.teacher_code" id="grid-state">
                                                        
                              <option v-for="teacher in teachers" :key="teacher.id " :value="teacher.id">{{teacher.name}}-{{teacher.code}}</option>
                                                        
                                                        
                        </select>
                    </div>
                </div>


                 <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-password">
                            Total Student
                        </label>
                        <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-2 px-2 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                             v-model="assigncourse.total_student" id="grid-state" type="number">
                                                        
                           
                                                        
                                                        
                        
                    </div>
                </div>


              <div class="flex flex-wrap -mx-3 mb-2">
                 <div class="w-full px-3">
                     <!-- v-if="assigncourse.check==1 || set_duration_time==1" -->
                         <label  class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-password">
                            Number of Class
                            &nbsp;
                             <input type="radio"  value=1 v-model="number_of_class"> One
                             &nbsp;&nbsp;
                             <input type="radio" value=2 v-model="number_of_class"> Two
                             &nbsp;&nbsp;
                             <input type="radio" value=3 v-model="number_of_class"> Three
                      </label>
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-password">
                            <!-- Number of Class -->
                            &nbsp;
                             
                            
                            
                             <input type="radio" value=1 v-model="assigncourse.check"> Set Duration 
                             <input  type="radio" value=2 v-model="assigncourse.check"> Set Duration And Time
                                                
                        </label>
                    
                                                  
                </div>
              </div>

                <div v-if="number_of_class>0 && assigncourse.check==1" class="flex flex-wrap -mx-3 mb-2">
                     <div v-if="number_of_class>0" class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state">
                            Duration 1
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                v-model="assigncourse.duration[0]" id="grid-state">
                                <!-- <option >Select</option> -->
                                <option value=1>1.00</option>
                                <option value=1.5>1.30</option>
                                <option value=2>2.00</option>
                                <option value=2.5>2.30</option>
                                <option value=3>3.00</option>
                                <option value=3.5>3.30</option>
                                <option value=4>4.00</option>
                               
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                </svg>
                            </div> 
                        </div>
                    </div>

                    <div v-if="number_of_class>1" class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state">
                            Duration 2
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                v-model="assigncourse.duration[1]" id="grid-state">
                                <!-- <option >Select</option> -->
                                <option value=1>1.00</option>
                                <option value=1.5>1.30</option>
                                <option value=2>2.00</option>
                                <option value=2.5>2.30</option>
                                <option value=3>3.00</option>
                                <option value=3.5>3.30</option>
                                <option value=4>4.00</option>
                               
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                     <div v-if="number_of_class>2" class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state">
                            Duration 3
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                v-model="assigncourse.duration[2]" id="grid-state">
                                <!-- <option >Select</option> -->
                                <option value=1>1.00</option>
                                <option value=1.5>1.30</option>
                                <option value=2>2.00</option>
                                <option value=2.5>2.30</option>
                                <option value=3>3.00</option>
                                <option value=3.5>3.30</option>
                                <option value=4>4.00</option>
                               
                            </select>
                             <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                </svg>
                            </div> 
                        </div>
                    </div>
                </div>










<!-- __________________________________________________________________________________________________ -->
     <div v-if="number_of_class>0 && assigncourse.check==2" class="flex flex-wrap -mx-3 mb-2">
                     <div  class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state">
                            Day 1
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                v-model="assigncourse.day[0]" id="grid-state">
                                <!-- <option >Select</option> -->
                                <option value=1>Saturday</option>
                                <option value=2>Sunday</option>
                                <option value=3>Monday</option>
                                <option value=4>Tuesday</option>
                                <option value=5>Wednesday</option>
                                <option value=6>Thursday</option>
                                <option value=7>Friday</option>
                               
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                </svg>
                            </div> 
                        </div>
                    </div>

                    <div  class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state">
                            Duration 1
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                v-model="assigncourse.duration[0]" id="grid-state">
                                <!-- <option >Select</option> -->
                                <option value=1>1.00</option>
                                <option value=1.5>1.30</option>
                                <option value=2>2.00</option>
                                <option value=2.5>2.30</option>
                                <option value=3>3.00</option>
                                <option value=3.5>3.30</option>
                                <option value=4>4.00</option>
                               
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                     <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state">
                            Time 1
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                v-model="assigncourse.time[0]" id="grid-state">
                                <!-- <option >Select</option> -->
                                <option value=8>8.00 AM</option>
                                <option value=8.5>8.30 AM</option>
                                <option value=9>9.00 AM</option>
                                <option value=9.5>9.30 AM</option>
                                <option value=10>10.00 AM</option>
                                <option value=10.5>10.30 AM</option>
                                <option value=11>11.00 AM</option>
                                <option value=11.5>11.30 AM</option>
                                <option value=12>12.00 PM</option>
                                <option value=12.5>12.30 PM</option>
                                <option value=1>1.00 PM</option>
                                <option value=1.5>1.30 PM</option>
                                <option value=2>2.00 PM</option>
                                <option value=2.5>2.30 PM</option>
                                <option value=3>3.00 PM</option>
                                <option value=3.5>3.30 PM</option>
                                <option value=4>4.00 PM</option>
                                <option value=4.5>4.30 PM</option>
                                <option value=5>5.00 PM</option>
                                <option value=5.5>5.30 PM</option>
                                
                            </select>
                             <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                </svg>
                            </div> 
                        </div>
                    </div>
                </div>

<!-- __________________________________________________________________________________________________ -->
       <div v-if="number_of_class>1 && assigncourse.check==2" class="flex flex-wrap -mx-3 mb-2">
                     <div  class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state">
                            Day 2
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                v-model="assigncourse.day[1]" id="grid-state">
                                <!-- <option >Select</option> -->
                                <option value=1>Saturday</option>
                                <option value=2>Sunday</option>
                                <option value=3>Monday</option>
                                <option value=4>Tuesday</option>
                                <option value=5>Wednesday</option>
                                <option value=6>Thursday</option>
                                <option value=7>Friday</option>
                               
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                </svg>
                            </div> 
                        </div>
                    </div>

                    <div  class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state">
                            Duration 2
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                v-model="assigncourse.duration[1]" id="grid-state">
                                <!-- <option >Select</option> -->
                                <option value=1>1.00</option>
                                <option value=1.5>1.30</option>
                                <option value=2>2.00</option>
                                <option value=2.5>2.30</option>
                                <option value=3>3.00</option>
                                <option value=3.5>3.30</option>
                                <option value=4>4.00</option>
                               
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                     <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state">
                            Time 2
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                v-model="assigncourse.time[1]" id="grid-state">
                                <!-- <option >Select</option> -->
                                <option value=8>8.00 AM</option>
                                <option value=8.5>8.30 AM</option>
                                <option value=9>9.00 AM</option>
                                <option value=9.5>9.30 AM</option>
                                <option value=10>10.00 AM</option>
                                <option value=10.5>10.30 AM</option>
                                <option value=11>11.00 AM</option>
                                <option value=11.5>11.30 AM</option>
                                <option value=12>12.00 PM</option>
                                <option value=12.5>12.30 PM</option>
                                <option value=1>1.00 PM</option>
                                <option value=1.5>1.30 PM</option>
                                <option value=2>2.00 PM</option>
                                <option value=2.5>2.30 PM</option>
                                <option value=3>3.00 PM</option>
                                <option value=3.5>3.30 PM</option>
                                <option value=4>4.00 PM</option>
                                <option value=4.5>4.30 PM</option>
                                <option value=5>5.00 PM</option>
                                <option value=5.5>5.30 PM</option>
                                
                            </select>
                             <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                </svg>
                            </div> 
                        </div>
                    </div>
                </div>
<!-- __________________________________________________________________________________________________ -->

<!-- __________________________________________________________________________________________________ -->
       <div v-if="number_of_class>2 && assigncourse.check==2" class="flex flex-wrap -mx-3 mb-2">
                     <div  class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state">
                            Day 3
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                v-model="assigncourse.day[2]" id="grid-state">
                                <!-- <option >Select</option> -->
                                <option value=1>Saturday</option>
                                <option value=2>Sunday</option>
                                <option value=3>Monday</option>
                                <option value=4>Tuesday</option>
                                <option value=5>Wednesday</option>
                                <option value=6>Thursday</option>
                                <option value=7>Friday</option>
                               
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                </svg>
                            </div> 
                        </div>
                    </div>

                    <div  class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state">
                            Duration 3
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                v-model="assigncourse.duration[2]" id="grid-state">
                                <!-- <option >Select</option> -->
                                <option value=1>1.00</option>
                                <option value=1.5>1.30</option>
                                <option value=2>2.00</option>
                                <option value=2.5>2.30</option>
                                <option value=3>3.00</option>
                                <option value=3.5>3.30</option>
                                <option value=4>4.00</option>
                               
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                     <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state">
                            Time 3
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                v-model="assigncourse.time[2]" id="grid-state">
                                <!-- <option >Select</option> -->
                                <option value=8>8.00 AM</option>
                                <option value=8.5>8.30 AM</option>
                                <option value=9>9.00 AM</option>
                                <option value=9.5>9.30 AM</option>
                                <option value=10>10.00 AM</option>
                                <option value=10.5>10.30 AM</option>
                                <option value=11>11.00 AM</option>
                                <option value=11.5>11.30 AM</option>
                                <option value=12>12.00 PM</option>
                                <option value=12.5>12.30 PM</option>
                                <option value=1>1.00 PM</option>
                                <option value=1.5>1.30 PM</option>
                                <option value=2>2.00 PM</option>
                                <option value=2.5>2.30 PM</option>
                                <option value=3>3.00 PM</option>
                                <option value=3.5>3.30 PM</option>
                                <option value=4>4.00 PM</option>
                                <option value=4.5>4.30 PM</option>
                                <option value=5>5.00 PM</option>
                                <option value=5.5>5.30 PM</option>
                                
                            </select>
                             <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                </svg>
                            </div> 
                        </div>
                    </div>
                </div>
<!-- __________________________________________________________________________________________________ -->




                
                
                <div class="mt-5">
                    <button @click.prevent="multipleAssign" class='bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded'> Assign </button>
                    <span class='close-modal cursor-pointer bg-red-200 hover:bg-red-500 text-red-900 font-bold py-2 px-4 rounded'>
                        Close
                    </span>
                </div>
            </form>
        </div>
    </div>
            </div>

              <!-- modal end -->    
          





            </main>


   

             



              

       
    
</template>

<script>
import Vue from 'vue'
 import { BootstrapVue} from 'bootstrap-vue';
 Vue.use(BootstrapVue);


export default {
    data() {
        return {
            set_duration_time:0,
            number_of_class:0,
            indx:0,
            perPage:8,
            currentPage:1,
            filter:"",
            fields: ['status','session_name','course_name', 'semester_section','action'],
            semester_courses: [],
            teachers:[],
            cardopen:0,
            check_id:[],
            id_tracker:[],
            courses:[],
            assigncourse:{
              id:[],
              teacher_code:"",
              duration:[0,0,0,],
              total_student:0,
              check:0,
              day:[0,0,0],
              time:[0,0,0]
            }
        }
        
       
    },
    computed:{
      rows(){
        return this.semester_courses.length;
      }
    },
    created() {
        let uri = `/api/semester-courses/${this.$route.params.session}/${this.$route.params.id}`;
        this.axios.get(uri).then(response => {
          this.semester_courses = response.data.data;
          console.log(this.semester_courses);
          //this.initializeIdTracker();
        });

        uri = '/api/teachers';
        this.axios.get(uri).then(response => {
          this.teachers = response.data.data;
          console.log(this.teachers);
        });

         uri = '/api/courses';
         this.axios.get(uri).then(response => {
           this.courses = response.data.data;
           console.log(this.courses);
         });


    },
    
    methods: {
      multipleAssign(){
          console.log(4/3);
        if(this.assigncourse.check==0){
            for(var i=0;i<this.courses.length;i++){
                
                if(this.assigncourse.id[0]==this.courses[i].id){
                    if(this.courses[i].credit==1)
                    {
                        if(this.number_of_class==1)
                            this.assigncourse.duration[0]=2;
                        else if(this.number_of_class==2){
                            this.assigncourse.duration[0]=1;
                            this.assigncourse.duration[1]=1;
                            
                        }    
                    }
                    else if(this.courses[i].credit==1.5)
                    {
                        if(this.number_of_class==1)
                            this.assigncourse.duration[0]=3;
                        
                        else if(this.number_of_class==2){
                            this.assigncourse.duration[0]=1.5;
                            this.assigncourse.duration[1]=1.5;
                            
                        }
                        
                        else if(this.number_of_class==3){
                            this.assigncourse.duration[0]=1;
                            this.assigncourse.duration[1]=1;
                            this.assigncourse.duration[2]=1;
                            
                        }
                    }
                    
                    else if(this.courses[i].credit==2)
                    {
                         if(this.number_of_class==1)
                            this.assigncourse.duration[0]=2;
                         else{

                             this.assigncourse.duration[0]=1;
                             this.assigncourse.duration[1]=1;
                         }   
                    }
                    else if(this.courses[i].credit==3)
                    {
                        if(this.number_of_class==1)
                            this.assigncourse.duration[0]=3;
                        
                        else if(this.number_of_class==2){
                            this.assigncourse.duration[0]=1.5;
                            this.assigncourse.duration[1]=1.5;
                            
                        }
                        
                        else if(this.number_of_class==3){
                            this.assigncourse.duration[0]=1;
                            this.assigncourse.duration[1]=1;
                            this.assigncourse.duration[2]=1;
                            
                        }
                    }
                    else if(this.courses[id].credit==4)
                    {
                        if(this.number_of_class==1)
                            this.assigncourse.duration[0]=4;
                        
                        else if(this.number_of_class==2){
                            this.assigncourse.duration[0]=2;
                            this.assigncourse.duration[1]=2;
                            
                        }
                        
                        else if(this.number_of_class==3){
                            this.assigncourse.duration[0]=1.5;
                            this.assigncourse.duration[1]=1.5;
                            this.assigncourse.duration[2]=1;
                            
                        }
                    }
                }
            }
        }
        
        console.log(this.assigncourse);    
      },
    
/*
                  if(this.courses[i].credit==1)
                    {
                        this.assigncourse.duration[0]=2;
                    }
                    else if(this.courses[i].credit==1.5)
                    {
                        this.assigncourse.duration[0]=3;
                    }
                    else if(this.courses[i].credit==2)
                    {
                        this.assigncourse.duration[0]=1;
                        this.assigncourse.duration[1]=1;
                    }
                    else if(this.courses[i].credit==3)
                    {
                        this.assigncourse.duration[0]=1.5;
                        this.assigncourse.duration[1]=1.5;
                    }
                    else if(this.courses[id].credit==4)
                    {
                        this.assigncourse.duration[0]=2;
                        this.assigncourse.duration[1]=2;
                    }
*/
     
    }
}
</script>

