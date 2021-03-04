<template>
    

             <main class="bg-white-500 flex-1 p-3 overflow-x-scroll">
                       

             <div class="">
               <b-row>
               <b-col>
                 <h1>Semester With Courses</h1>
                 
               </b-col>
                 
              
               <b-col>
                 <b-form-input v-model="filter" type="search" style="margin-bottom:15px;" placeholder="Search"></b-form-input>
               </b-col>
             </b-row>

             <b-row>
              
               <b-col>
                 
                 <b-table responsive striped hover :items="semester_courses" :fields="fields" :filter="filter" :per-page="perPage" :current-page="currentPage">
                   
                   <template v-slot:cell(select)="data">
                     <input type="checkbox"  v-model="assigncourse.id" :value="data.item.id">
                   </template>

                    <template v-slot:cell(action)="data1">
                   <router-link tag="button" class="btn btn-primary btn-sm"  :to="{name: 'editsemestercourse', params: { id: data1.item.id }}" >
                             <i class="fa fa-edit"></i>
                         </router-link>
                   </template>

                   

                 </b-table>
                 <b-pagination v-model="currentPage" :total-rows="rows" :per-page="perPage"></b-pagination>
               </b-col>

               
             </b-row>

             

            </div>
      
             <div class="flex justify-center">
                <button data-modal='centeredFormModal'
                  @click.prevent="ChackSelect"  class="modal-trigger bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Select
                    </button>
              </div>


              <!-- Modal -->
           <div id='centeredFormModal' class="modal-wrapper">
                <div class="overlay close-modal"></div>
                    <div class="modal modal-centered">
                        <div class="modal-content shadow-2xl p-5">
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
                                       <div class="relative">
                                            <select class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-2 px-2 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                v-model="assigncourse.teacher_id" id="grid-state-2">
                                                <option disabled  value=-1>Select Teacher</option>            
                                                <option v-for="teacher in teachers" :key="teacher.id " :value="teacher.id">{{teacher.name}}-{{teacher.code}}</option>
                                                                            
                                                                            
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 20 20">
                                                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                                            </svg>
                                            </div>
                                       </div>
                                    </div>
                                </div>


                                <div class="flex flex-wrap -mx-3 mb-2">
                                    <div class="w-full px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-password">
                                            Max Student
                                        </label>
                                        <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-2 px-2 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                            v-model="assigncourse.total_student" id="grid-state-3" type="number">
                                                                        
                                        
                                                                        
                                                                        
                                        
                                    </div>
                                </div>


                        <section v-if="same_type==1">
                                <div class="flex flex-wrap -mx-3 mb-2">
                                <div class="w-full px-3">
                                    <!-- v-if="assigncourse.check==1 || set_duration_time==1" -->
                                        
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-2" for="grid-password">
                                            <!-- Number of Class -->
                                            &nbsp;
                                            
                                            
                                            <input type="radio" value=0 v-model="check"> Not Set
                                            <input type="radio" value=1 v-model="check"> Set Duration 
                                            <input  type="radio" value=2 v-model="check"> Set Duration And Time
                                            
                                                                
                                        </label>
                                         
                                        <label v-if="check>0"  class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-2" for="grid-password">
                                            Number of Class
                                            &nbsp;
                                            <input type="radio"  value=1 v-model="number_of_class"> One
                                            &nbsp;&nbsp;
                                            <input type="radio" value=2 v-model="number_of_class"> Two
                                            &nbsp;&nbsp;
                                            <input type="radio" value=3 v-model="number_of_class"> Three
                                        </label>
                                                                
                                </div>
                            </div>

                           

                                <div v-if="number_of_class>0 && check==1" class="flex flex-wrap -mx-3 mb-2">
                                    <div v-if="number_of_class>0" class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state-1">
                                            Duration 1
                                        </label>
                                        <div class="relative">
                                            <select
                                                class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                v-model="assigncourse.duration[0]" id="grid-state-4">
                                                <!-- <option >Select</option> -->
                                                <option disabled  value=0>Duration 1</option>
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
                                        
                                        
                                           <div v-if="lab==1">
                                               <input type="checkbox" :value=1 v-model="duration_type[0]"> Theory
                                           </div>
                                        
                                        
                                    </div>

                                    <div v-if="number_of_class>1" class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state-4">
                                            Duration 2
                                        </label>
                                        <div class="relative">
                                            <select
                                                class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                v-model="assigncourse.duration[1]" id="grid-state-5">
                                                <!-- <option >Select</option> -->
                                                <option disabled  value=0>Duration 2</option>
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
                                            <div v-if="lab==1">
                                               <input type="checkbox" :value=1 v-model="duration_type[1]"> Theory
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
                                                v-model="assigncourse.duration[2]" id="grid-state-6">
                                                <!-- <option >Select</option> -->
                                                <option disabled  value=0>Duration 3</option>
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
                                        <div v-if="lab==1">
                                               <input type="checkbox" :value=1 v-model="duration_type[2]"> Theory
                                        </div>
                                        
                                    </div>
                                </div>










                <!-- __________________________________________________________________________________________________ -->
                    <div v-if="number_of_class>0 && check==2" class="flex flex-wrap -mx-3 mb-2">
                                    <div  class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state-7">
                                            Day 1
                                        </label>
                                        <div class="relative">
                                            <select
                                                class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                v-model="assigncourse.day[0]" id="grid-state-8">
                                                <!-- <option >Select</option> -->
                                                <option disabled  value=0>Day 1</option>
                                                <option value=1>Saturday</option>
                                                <option value=2>Sunday</option>
                                                <option value=3>Monday</option>
                                                <option value=4>Tuesday</option>
                                                <option value=5>Wednesday</option>
                                            
                                            
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                                </svg>
                                            </div> 

                                        </div>
                                        <div v-if="lab==1">
                                               <input type="checkbox" :value=1 v-model="duration_type[0]"> Theory
                                        </div>
                                    </div>

                                    <div  class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state-9">
                                            Duration 1
                                        </label>
                                        <div class="relative">
                                            <select
                                                class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                v-model="assigncourse.duration[0]" id="grid-state-10">
                                                <option disabled  value=0>Duration 1</option>
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
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state-12">
                                            Time 1
                                        </label>
                                        <div class="relative">
                                            <select
                                                class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                v-model="assigncourse.time[0]" id="grid-state-11">
                                                <option disabled  value=0>Time 1</option>
                                                <option value=1>8.30 AM</option>
                                                <option value=2>9.00 AM</option>
                                                <option value=3>9.30 AM</option>
                                                <option value=4>10.00 AM</option>
                                                <option value=5>10.30 AM</option>
                                                <option value=6>11.00 AM</option>
                                                <option value=7>11.30 AM</option>
                                                <option value=8>12.00 PM</option>
                                                <option value=9>12.30 PM</option>
                                                <option value=10>1.00 PM</option>
                                                <option value=11>1.30 PM</option>
                                                <option value=12>2.00 PM</option>
                                                <option value=13>2.30 PM</option>
                                                <option value=14>3.00 PM</option>
                                                <option value=15>3.30 PM</option>
                                                <option value=16>4.00 PM</option>
                                                <option value=17>4.30 PM</option>
                                                <option value=18>5.00 PM</option>
                                                <option value=19>5.30 PM</option>
                                                
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
                    <div v-if="number_of_class>1 && check==2" class="flex flex-wrap -mx-3 mb-2">
                                    <div  class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state">
                                            Day 2
                                        </label>
                                        <div class="relative">
                                            <select
                                                class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                v-model="assigncourse.day[1]" id="grid-state-13">
                                                <option disabled  value=0>Day 2</option>
                                                <option value=1>Saturday</option>
                                                <option value=2>Sunday</option>
                                                <option value=3>Monday</option>
                                                <option value=4>Tuesday</option>
                                                <option value=5>Wednesday</option>
                                                
                                            
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                                </svg>
                                            </div> 
                                        </div>

                                        <div v-if="lab==1">
                                               <input type="checkbox" :value=1 v-model="duration_type[1]"> Theory
                                        </div>
                                    </div>

                                    <div  class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state-15">
                                            Duration 2
                                        </label>
                                        <div class="relative">
                                            <select
                                                class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                v-model="assigncourse.duration[1]" id="grid-state-16">
                                                <option disabled  value=0>Duration 2</option>
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
                                                v-model="assigncourse.time[1]" id="grid-state-17">
                                                <option disabled  value=0>Time 2</option>
                                                <option value=1>8.30 AM</option>
                                                <option value=2>9.00 AM</option>
                                                <option value=3>9.30 AM</option>
                                                <option value=4>10.00 AM</option>
                                                <option value=5>10.30 AM</option>
                                                <option value=6>11.00 AM</option>
                                                <option value=7>11.30 AM</option>
                                                <option value=8>12.00 PM</option>
                                                <option value=9>12.30 PM</option>
                                                <option value=10>1.00 PM</option>
                                                <option value=11>1.30 PM</option>
                                                <option value=12>2.00 PM</option>
                                                <option value=13>2.30 PM</option>
                                                <option value=14>3.00 PM</option>
                                                <option value=15>3.30 PM</option>
                                                <option value=16>4.00 PM</option>
                                                <option value=17>4.30 PM</option>
                                                <option value=18>5.00 PM</option>
                                                <option value=19>5.30 PM</option>
                                                
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
                    <div v-if="number_of_class>2 && check==2" class="flex flex-wrap -mx-3 mb-2">
                                    <div  class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state-18">
                                            Day 3
                                        </label>
                                        <div class="relative">
                                            <select
                                                class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                v-model="assigncourse.day[2]" id="grid-state-19">
                                                <option disabled  value=0>Day 3</option>
                                                <option value=1>Saturday</option>
                                                <option value=2>Sunday</option>
                                                <option value=3>Monday</option>
                                                <option value=4>Tuesday</option>
                                                <option value=5>Wednesday</option>
                                            
                                            
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                                </svg>
                                            </div> 
                                        </div>

                                        <div v-if="lab==1">
                                               <input type="checkbox" :value=1 v-model="duration_type[2]"> Theory
                                        </div>
                                    </div>

                                    <div  class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state">
                                            Duration 3
                                        </label>
                                        <div class="relative">
                                            <select
                                                class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                v-model="assigncourse.duration[2]" id="grid-state-20">
                                                <option disabled  value=0>Duration 3</option>
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
                                                v-model="assigncourse.time[2]" id="grid-state-21">
                                                <option disabled  value=0>Time 3</option>
                                                <option value=1>8.30 AM</option>
                                                <option value=2>9.00 AM</option>
                                                <option value=3>9.30 AM</option>
                                                <option value=4>10.00 AM</option>
                                                <option value=5>10.30 AM</option>
                                                <option value=6>11.00 AM</option>
                                                <option value=7>11.30 AM</option>
                                                <option value=8>12.00 PM</option>
                                                <option value=9>12.30 PM</option>
                                                <option value=10>1.00 PM</option>
                                                <option value=11>1.30 PM</option>
                                                <option value=12>2.00 PM</option>
                                                <option value=13>2.30 PM</option>
                                                <option value=14>3.00 PM</option>
                                                <option value=15>3.30 PM</option>
                                                <option value=16>4.00 PM</option>
                                                <option value=17>4.30 PM</option>
                                                <option value=18>5.00 PM</option>
                                                <option value=19>5.30 PM</option>
                                                
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

                           </section>



                                
                                
                                <div class="mt-5">
                                    <button @click.prevent="multipleAssign" class='close-modal bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded'> Assign </button>
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
 import Swal from 'sweetalert2'
export default {
    data() {
        return {
            duration_type:[false,false,false],
            same_type:1,
            lab:0,
            course_id:[],
            course_type:[],
            course_credit:[],
            lab_theory:0,
            session:{},
            semester:0,
            set_duration_time:0,
            number_of_class:0,
            indx:0,
            perPage:8,
            currentPage:1,
            filter:"",
            fields: [
                {
                    key: 'select',
                    sortable: false
                },
                {
                    key: 'session_name',
                    sortable: false
                },
                {
                    key: 'semester_section',
                    label: 'Semester',
                    //sortable: true,
                    
                },
                {
                    key: 'course_name',
                    sortable: false
                },
                {
                    key: 'status',
                    sortable: false
                },
                {
                    key: 'action',
                    sortable: false
                },
          
            ],
            semester_courses: [],
            teachers:[],
            cardopen:0,
            check_id:[],
            id_tracker:[],
            courses:[],
            check:0,
            temp:[],
            assigned_check:[],
            routine:{

            },
            assigncourse:{
              entry_type:0,
              id:[],
              course_type:[],
              teacher_id:-1,
              duration:[0,0,0,],
              daration_manually:[],
              duration_type:[0,0,0,],
              total_student:0,
              day:[0,0,0],
              time:[0,0,0],
              start:[0,0,0],
              end:[0,0,0]
            }
        }
        
       
    },
    computed:{
      rows(){
        return this.semester_courses.length;
      }
    },
    mounted() {
        if (localStorage.getItem('reloaded')) {
            localStorage.removeItem('reloaded');
        } 
        else {
            localStorage.setItem('reloaded', '1');
            location.reload();
        }
    },
    created() {
        for(var i= 0; i<500;i++) this.assigned_check[i] = 0;
        //console.log(this.assigned_check);
        console.log(this.$route.params.session);
        let uri = `/api/find_session/${this.$route.params.session}`;
        this.axios.get(uri).then(response => {
          this.session = response.data.data;
          //console.log(this.session);

           /*  */
                        //${this.session.id}
                        
                        
                        let uri2 = `/api/routines`;
                               this.axios.get(uri2).then(response => {
                                this.routine = response.data.data;
                                console.log(this.routine.length);
                                for(var rl=0; rl<this.routine.length;rl++)
                                {
                                    this.assigned_check[this.routine[rl].semester_course_id] = 1;
                                }
                                
                                });
                        /*  */
                        console.log(this.assigned_check);
          this.callMethod(); 
        });
        
        
    },
    
    
    methods: {
        callMethod(){


               
                console.log(this.session);
                console.log("end");
                let uri = `/api/semester-courses/${this.session.id}`;
                console.log(uri);
                this.axios.get(uri).then(response => {
                this.semester_courses = response.data.data;
                
                    for(var i=0;i<this.semester_courses.length;i++){
                        console.log("start "+ i);
                        console.log(this.semester_courses[i]);
                        console.log("ennnn");
                        
                        if(this.assigned_check[this.semester_courses[i].id] == 1 ) {
                                    this.semester_courses[i].status = "assigned";
                                }
                                else
                                {
                                    this.semester_courses[i].status = "not assigned";
                                }
                        
                        
                        console.log(this.semester_courses[i].group);
                        if(this.semester_courses[i].group==0){
                            this.semester_courses[i].course_name=this.semester_courses[i].course_name+" -Section "+this.semester_courses[i].semester_section[1];
                                   
                        }
                        else if(this.semester_courses[i].group==1){
                            this.semester_courses[i].course_name=this.semester_courses[i].course_name+" -Section "+this.semester_courses[i].semester_section[1]+"1";
                            //console.log("this.semester_courses");
                        }
                        else{
                                
                            this.semester_courses[i].course_name=this.semester_courses[i].course_name+" -Section "+this.semester_courses[i].semester_section[1]+"2";
                        }    
                        if(this.semester_courses[i].semester_section[0]==1)
                            this.semester_courses[i].semester_section=this.semester_courses[i].semester_section[0]+"st";
                        else if(this.semester_courses[i].semester_section[0]==2)
                            this.semester_courses[i].semester_section=this.semester_courses[i].semester_section[0]+"nd";
                        else if(this.semester_courses[i].semester_section[0]==3)
                            this.semester_courses[i].semester_section=this.semester_courses[i].semester_section[0]+"rd";
                        else if(this.semester_courses[i].semester_section[0]>3)
                            this.semester_courses[i].semester_section=this.semester_courses[i].semester_section[0]+"th";
                    }
                    console.log(this.semester_courses);
                });
                uri = '/api/teachers';
                this.axios.get(uri).then(response => {
                this.teachers = response.data.data;
                //console.log(this.teachers);
                });
                uri = '/api/courses';
                this.axios.get(uri).then(response => {
                this.courses = response.data.data;
                //console.log(this.courses);
                });

        },
      ChackSelect(){
          

          for(var i=0;i<this.assigncourse.id.length;i++){
              
               for(var j=0;j<this.semester_courses.length;j++){
                   
                    
                    if(this.semester_courses[j].id==this.assigncourse.id[i]){
                       
                        this.course_type[i]=this.courses[this.semester_courses[j].course_id-1].type;
                        this.course_credit[i]=this.courses[this.semester_courses[j].course_id-1].credit;
                        
                    }
        
               }
           }

          

            
            
           for(var i=0;i<this.course_type.length-1;i++){
                if(this.course_type[i]!=this.course_type[i+1]){
                    this.same_type=0;
                }
           }

           if(this.same_type==1 && this.course_type.length>0){
                if(this.course_type[0] != 0){
                    this.assigncourse.duration_type[0]=this.course_type[0];
                    this.assigncourse.duration_type[1]=this.course_type[0];
                    this.assigncourse.duration_type[2]=this.course_type[0];
                }
           }

           if(this.course_type.length>0){
               if(this.course_type!=0){
                   this.lab=1;
                   
               }
           }
           

           console.log(this.course_type);
           //console.log(this.course_credit);
           for(var i=0;i<this.assigncourse.id.length;i++){ 
                this.assigncourse.daration_manually[i]=[];
           }
           
           if(this.same_type==0){
               for(var i=0;i<this.assigncourse.id.length;i++){
                        if(this.course_type[i]==0){
                            if(this.course_credit[i]==2){
                                this.assigncourse.daration_manually[i][0]=1;
                                this.assigncourse.daration_manually[i][1]=1;
                            }
                            
                            else if(this.course_credit[i]==3){
                                this.assigncourse.daration_manually[i][0]=1.5;
                                this.assigncourse.daration_manually[i][1]=1.5;
                           
                            }
                            else if(this.course_credit[i]==4){
                                this.assigncourse.daration_manually[i][0]=2;
                                this.assigncourse.daration_manually[i][1]=2;
                            }    
                                
                            
                                  
                        }
                        else if(this.course_type[i]!=0){
                            if(this.course_credit[i]==1){
                                this.assigncourse.daration_manually[i][0]=2;
                                
                            }
                            
                            else if(this.course_credit[i]==1.5){
                                this.assigncourse.daration_manually[i][0]=2;
                                
                            }
                            else if(this.course_credit[i]==2){
                                this.assigncourse.daration_manually[i][0]=4;
                            }    
                        }
                
                }
           }
           
           
      },






































      
       
      multipleAssign(){
           if(this.check==2)
            this.assigncourse.entry_type=1;
          console.log(this.assigncourse.entry_type);
          if(this.assigncourse.entry_type==1)
          {
              for(var i=0; i<this.assigncourse.duration.length;i++)
              {
                  this.assigncourse.start[i] = Number(this.assigncourse.time[i]) + Number(( Number(this.assigncourse.day[i]) -1)*18);
                  this.assigncourse.end[i] = Number(this.assigncourse.start[i]) + Number(this.assigncourse.duration[i]) + Number(this.assigncourse.duration[i])-1;
              }
                //console.log(this.assigncourse);
          }
          
           //this.assigncourse.course_type=this.assigncourse.id;
          for(var i=0;i<this.assigncourse.id.length;i++){
               for(var j=0;j<this.courses.length;j++){
                    if(this.courses[j].id==this.assigncourse.id[i]){
                        this.assigncourse.course_type[i]=this.courses[j].type;
                    }
        
               }
           }
          
         
        //console.log(this.duration_type);
         for(var i=0;i<3;i++){
             if(this.duration_type[i]==true){
                 this.assigncourse.duration_type[i]=0;
             }
         }
        this.assigncourse.course_type=this.course_type;
        if(this.check==0 && this.same_type==1){
              
                 
                      if(this.course_credit[0]==4){
                           this.assigncourse.duration[0]=2;
                           this.assigncourse.duration[1]=2;
                      }
                      else if(this.course_credit[0]==3){
                           this.assigncourse.duration[0]=1.5;
                            this.assigncourse.duration[1]=1.5;
                      }
                      else if(this.course_credit[0]==2){
                           this.assigncourse.duration[0]=2;
                      }
                      else if(this.course_credit[0]==1.5){
                           this.assigncourse.duration[0]=3;
                      }
                      else if(this.course_credit[0]==1){
                           this.assigncourse.duration[0]=2;
                      }
                  
              
          }
        




console.log("please");
        console.log(this.semester_courses);    
        console.log(this.assigncourse.id);
        
                   
        let uri = '/api/routine/create';
                this.axios.post(uri, this.assigncourse).then((response) => {
                 //this.$router.go(this.$router.currentRoute);
                for(var i=0; i<this.assigncourse.id.length;i++)
                 {
                     for(var j=0;j<this.semester_courses.length;j++)
                    {
                        if(this.semester_courses[j].id == this.assigncourse.id[i])
                        {
                            console.log(this.assigncourse.duration);
                            if(this.assigncourse.duration[0] == 0){
                                this.$router.go(0);
                            }
                            console.log("saved");
                            Swal.fire({
                                position: 'top-center',
                                icon: 'success',
                                title: 'Successfully Assigned',
                                showConfirmButton: false,
                                timer: 1500
                                })
                            this.semester_courses[j].status = "assigned";
                        }
                    }
                   
                 }  
                    //this.semester_courses[this.temp.semester_course_id-1].status = "assigned";
                 this.assigncourse.id = [];
                 this.assigncourse.teacher_id= -1;
                 this.assigncourse.course_type = [];
                 this.assigncourse.duration_type = [0,0,0];
                 this.assigncourse.total_student = 0;
                 this.assigncourse.entry_type=0;
                 this.assigncourse.duration=[0,0,0,];
                 this.assigncourse.day=[0,0,0];
                 this.assigncourse.time=[0,0,0];
                 this.assigncourse.start=[0,0,0];
                 this.assigncourse.end=[0,0,0];

                
          });
          
      },
     
     
    }
}
</script>