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
                                                          v-model="selected_session"  id="grid-state">
                                                        <option v-for="session in sessions" :key="session.id">{{session.session_name}}</option>
                                                       
                                                    </select>
                                            </div>
                                        </div>
                                        
                                       <div class="md:flex md:items-center mb-6">
                                            
                                            <button class="modal-trigger bg-green-500 hover:bg-blue-800 text-white font-bold py-2 px-8 rounded-full" data-modal='createSessionModal' @click.prevent="">Create Session</button>
                                            <button class="modal-trigger bg-green-500 hover:bg-blue-800 text-white font-bold py-2 px-2 rounded-full" data-modal='manualAssignModal' @click.prevent="showSem">Manual Assign</button>

                                        </div>

                                            
                                            
                                        
                                        <div class="md:flex md:items-center">
                                            <!--<div class="md:w-1/4"></div>-->
                                            
                                            <div class="md:w-full" >
                                                    <button class="modal-trigger bg-blue-400 hover:bg-blue-800 text-white font-bold py-2 px-2 rounded-full" data-modal='addSemesterModal' @click.prevent="">Add Semester</button>
                                                    <button class="modal-trigger bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-2 rounded-full" data-modal='assignCourseModal' @click.prevent="showSem">Course Assign</button>
                                                    <button class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-2 rounded-full" @click.prevent="generateRoutine" >Generate Routine 2 </button>
                                                     <button class="bg-green-500 hover:bg-blue-800 text-white font-bold py-2 px-2 rounded-full" @click.prevent="select_2=1" >Print Routine </button>
                                            </div>
                                        </div>

                                       
                                        
                                    
                                        <div v-if="select_2==1" class="inset-0 top-0 pt-6">



                                                        <div class="md:flex md:items-center mb-6">
                                                        <div class="md:w-1/4">
                                                            <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                                for="inline-course-code">
                                                                Select Day
                                                            </label>
                                                        </div>
                                                        <div class="md:w-3/4">
                                                                <select v-model="day" class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                                        id="grid-state">
                                                                        <option value=1>Saturday</option>
                                                                        <option value=2>Sunday</option>
                                                                        <option value=3>Monday</option>
                                                                        <option value=4>Tuesday</option>
                                                                        <option value=5>Wednesday</option>
                                                                        <option value=6>Thursday</option>
                                                                    
                                                                    </select>
                                                            </div>
                                                        </div>
                                        


                                                        <router-link tag="button" class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-1 px-1 rounded-full" :to="{name: 'routine', params: { session: selected_session,day:day }}" >Show</router-link>
                                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--/Horizontal form-->

                        
                        </div>


                        <!-- /Cards Section Ends Here -->

                    
                    </div>






                    


    <!--modal-->
    <div id='manualAssignModal' class="modal-wrapper">
                <div class="overlay close-modal"></div>
                <div class="modal modal-centered overflow-y-auto">
                    <div class="modal-content shadow-lg p-5">
                        <div class="border-b p-2 pb-3 pt-0 mb-4">
                        <div class="flex justify-between items-center">
                                Modal header
                                <span class='close-modal cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200'>
                                    <i class="fas fa-times text-gray-700"></i>
                                </span>
                        </div>
                        </div>
                        <!-- Modal content -->
                       <form class="w-full">
                                        <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Session Name
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <input class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                    id="inline-full-name" type="text" v-model="manualassigncourse.session_name" readonly>
                                            </div>
                                        </div>

                                         <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Semester
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <select class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                          v-model="manualassigncourse.semester"  id="grid-state">
                                                        
                                                        <option v-for="semester in semesters" :key="semester.id">{{semester.semester}}</option>
                                                    </select>
                                                    
                                            </div>
                                        </div>
                                        


                                         <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Teacher Code
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <select class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                           v-model="manualassigncourse.teacher_code" id="grid-state">
                                                        
                                                        <option v-for="teacher in teachers" :key="teacher.id">{{teacher.code}}</option>
                                                    </select>
                                                    
                                            </div>
                                        </div>






                                      
                                        <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Course
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <select class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                          v-model="manualassigncourse.course_code"  id="grid-state">
                                                        
                                                        <option v-for="course in courses" :value="course.code" :key="course.id">{{course.name}} - {{course.code}}</option>
                                                    </select>
                                                    
                                            </div>
                                        </div>



                                        <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Group
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <select v-model="manualassigncourse.group" class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                          id="grid-state">
                                                        <option value=0>Zero</option>
                                                        <option value=1>One</option>
                                                        <option value=2>Two</option>
                                                </select>
                                                    
                                            </div>
                                        </div>









                                        <div class="md:w-3/4">

                                            <div class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4">
                                                <label for="male">Number of Class
                                                    <input type="radio" value="One" v-model="numberofclass"> One
                                                </label>
                                                <label for="female">
                                                    <input type="radio" value="Two" v-model="numberofclass"> Two
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div v-if="numberofclass=='One' || numberofclass=='Two'" > 
                                             <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Day 1
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <select v-model="manualassigncourse.day1" class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                          id="grid-state">
                                                        <option value=1>Saturday</option>
                                                        <option value=2>Sunday</option>
                                                        <option value=3>Monday</option>
                                                        <option value=4>Tuesday</option>
                                                        <option value=5>Wednesday</option>
                                                        
                                                </select>
                                                    
                                            </div>
                                        </div>




                                            <div class="md:flex md:items-center mb-6">
                                                <div class="md:w-1/4">
                                                    <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                        for="inline-course-code">
                                                        Duration 1
                                                    </label>
                                                </div>
                                                <div class="md:w-3/4">
                                                    <input class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light"
                                                        v-model="manualassigncourse.duration1" id="inline-full-name" type="number" placeholder="Enter Duration 1">
                                                </div>

                                                <div class="md:w-1/4">
                                                    <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                        for="inline-course-code">
                                                        Time 1
                                                    </label>
                                                </div>
                                                

                                                <div class="flex">
                                                    <select v-model="manualassigncourse.hour1" name="hours" class="bg-grey-200 text-grey-darker border border-grey-200 appearance-none outline-none">
                                                    <option value=8>8</option>
                                                    <option value=9>9</option>
                                                    <option value=10>10</option>
                                                    <option value=11>11</option>
                                                    <option value=12>12</option>
                                                    <option value=13>1</option>
                                                    <option value=14>2</option>
                                                    <option value=15>3</option>
                                                    <option value=16>4</option>
                                                    <option value=17>5</option>
                                                    <option value=18>6</option>
                                                    </select>
                                                    <span class="text-xl mr-3">:</span>
                                                    <select v-model="manualassigncourse.min1" name="minutes" class="bg-grey-200 text-grey-darker border border-grey-200 appearance-none outline-none mr-4">
                                                    <option value=0>00</option>
                                                    <option value=30>30</option>
                                                    </select>
                                                    <select name="ampm" class="bg-grey-200 text-grey-darker border border-grey-200 appearance-none outline-none">
                                                    <option value="am">AM</option>
                                                    <option value="pm">PM</option>
                                                    </select>
                                                </div>






                                            </div>
                                        </div>







                                        <div v-if="numberofclass=='Two'">

                                            <div v-if="numberofclass=='One' || numberofclass=='Two'" > 
                                             <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Day 2
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <select v-model="manualassigncourse.day2" class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                          id="grid-state">
                                                        <option value=1>Saturday</option>
                                                        <option value=2>Sunday</option>
                                                        <option value=3>Monday</option>
                                                        <option value=4>Tuesday</option>
                                                        <option value=5>Wednesday</option>
                                                        
                                                </select>
                                                    
                                            </div>
                                        </div>


                                        </div>

                                            <div   class="md:flex md:items-center mb-6">
                                                <div class="md:w-1/4">
                                                    <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                        for="inline-course-code">
                                                        Duration 2
                                                    </label>
                                                </div>
                                                <div class="md:w-3/4">
                                                    <input class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light"
                                                        v-model="manualassigncourse.duration2" id="inline-full-name" type="number" placeholder="Enter Duration 2">
                                                </div>

                                                <div class="md:w-1/4">
                                                    <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                        for="inline-course-code">
                                                        Time 2
                                                    </label>
                                                </div>
                                                

                                                <div  class="flex">
                                                    <select v-model="manualassigncourse.hour2" name="hours" class="bg-grey-200 text-grey-darker border border-grey-200 appearance-none outline-none">
                                                    <option value=8>8</option>
                                                    <option value=9>9</option>
                                                    <option value=10>10</option>
                                                    <option value=11>11</option>
                                                    <option value=12>12</option>
                                                    <option value=13>1</option>
                                                    <option value=14>2</option>
                                                    <option value=15>3</option>
                                                    <option value=16>4</option>
                                                    <option value=17>5</option>
                                                    <option value=18>6</option>
                                                
                                                    </select>
                                                    <span class="text-xl mr-3">:</span>
                                                    <select v-model="manualassigncourse.min2" name="minutes" class="bg-grey-200 text-grey-darker border border-grey-200 appearance-none outline-none mr-4">
                                                    <option value=0>00</option>
                                                    <option value=30>30</option>
                                                    </select>
                                                    <select name="ampm" class="bg-grey-200 text-grey-darker border border-grey-200 appearance-none outline-none">
                                                    <option value="am">AM</option>
                                                    <option value="pm">PM</option>
                                                    </select>
                                                </div>






                                            </div>
                                        </div>












                                        

                                        


                                      








                                        



                                        <div class="mt-5">
                                <button  @click="addManually" class='bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded'> Add </button>
                                <span class='close-modal cursor-pointer bg-red-200 hover:bg-red-500 text-red-900 font-bold py-2 px-4 rounded'>
                                    Close
                                </span>
                            </div>

                                        
                                        
                                    </form>
                    </div>
                </div>
            </div>





        <div id='createSessionModal' class="modal-wrapper">
                <div class="overlay close-modal"></div>
                <div class="modal modal-centered">
                    <div class="modal-content shadow-lg p-5">
                        <div class="border-b p-2 pb-3 pt-0 mb-4">
                        <div class="flex justify-between items-center">
                                Modal header
                                <span class='close-modal cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200'>
                                    <i class="fas fa-times text-gray-700"></i>
                                </span>
                        </div>
                        </div>
                        <!-- Modal content -->
                         <form class="w-full">
                                       <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Session Name
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <input class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                    id="inline-full-name" type="text" v-model="newSessions.session_name" placeholder="Enter Session Name">
                                            </div>
                                        </div>

                                        

                                         
                                        
                                        
                                        
                                        
                                        <div class="mt-5">
                                <button  @click="addSession" class='bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded'> Submit </button>
                                <span class='close-modal cursor-pointer bg-red-200 hover:bg-red-500 text-red-900 font-bold py-2 px-4 rounded'>
                                    Close
                                </span>
                            </div>
                                       
                                    </form>
                    </div>
                </div>
            </div>




            <div id='assignCourseModal' class="modal-wrapper">
                <div class="overlay close-modal"></div>
                <div class="modal modal-centered overflow-y-auto" >
                    <div class="modal-content shadow-lg p-5">
                        <div class="border-b p-2 pb-3 pt-0 mb-4">
                        <div class="flex justify-between items-center">
                                Modal header
                                <span class='close-modal cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200'>
                                    <i class="fas fa-times text-gray-700"></i>
                                </span>
                        </div>
                        </div>
                        <!-- Modal content -->
                      <form class="max-w-xl p-1 ">

                                        <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Session Name
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <input class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                    id="inline-full-name" type="text" v-model="selected_session" readonly>
                                            </div>
                                        </div>








                                         <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Semester
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <select class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                          v-model="assigncourse.semester"  id="grid-state">
                                                        
                                                        <option v-for="semester in semesters" :key="semester.id">{{semester.semester}}</option>
                                                    </select>
                                                    
                                            </div>
                                        </div>
                                        


                                         <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Teacher Code
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <select class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                           v-model="assigncourse.teacher_code" id="grid-state">
                                                        
                                                        <option v-for="teacher in teachers" :key="teacher.id">{{teacher.code}}</option>
                                                    </select>
                                                    
                                            </div>
                                        </div>






                                      
                                        <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Course
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <select class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                          v-model="assigncourse.course_code"  id="grid-state">
                                                        
                                                        <option v-for="course in courses" :value="course.code" :key="course.id">{{course.name}} - {{course.code}}</option>
                                                    </select>
                                                    
                                            </div>
                                        </div>



                                       









                                        <div class="md:w-3/4">

                                            <div class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4">
                                                <label for="male">Number of Class
                                                    <input type="radio" value="One" v-model="numberofclass"> One
                                                </label>
                                                <label for="female">
                                                    <input type="radio" value="Two" v-model="numberofclass"> Two
                                                </label>
                                            </div>
                                        </div>


                                         <!--<div v-if="numberofclass=='One' || numberofclass=='Two'" class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Duration 1
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <input class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light"
                                                    v-model="assigncourse.duration[0]" id="inline-full-name" type="number" placeholder="Enter Duration 1">
                                            </div>
                                        </div>-->


                                        <div v-if="numberofclass=='One' || numberofclass=='Two'" class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Duration 1
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <select  v-model="assigncourse.duration[0].hr" name="hours" class="bg-grey-200 appearance-none border-2 border-grey-200 text-grey-darker py-2 px-4 appearance-none outline-none mr-4">
                                                <option value=1>1</option>
                                                <option value=2>2</option>
                                                <option value=3>3</option>
                                                <option value=4>4</option>
                                                <option value=5>5</option>
                                
                                                </select>
                                                <span class="text-xl mr-3">:</span>
                                                <select v-model="assigncourse.duration[0].min" name="minutes" class="bg-grey-200 appearance-none border-2 border-grey-200 text-grey-darker py-2 px-4 appearance-none outline-none mr-4">
                                                <option value=0.0 selected=true>00</option>
                                                <option value=0.5>30</option>
                                                </select>
                                               
                                            </div>
                                        </div>

                                        


                                        <div v-if="numberofclass=='Two'" class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Duration 2
                                                </label>
                                            </div>
                                            <!--<div class="md:w-3/4">
                                                <input class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light"
                                                   v-model="assigncourse.duration[1]" id="inline-full-name" type="number" placeholder="Enter Duration 2">
                                            </div>-->
                                            <div class="md:w-3/4">
                                                <select  v-model="assigncourse.duration[1].hr" name="hours" class="bg-grey-200 appearance-none border-2 border-grey-200 text-grey-darker py-2 px-4 appearance-none outline-none mr-4">
                                                <option value=1>1</option>
                                                <option value=2>2</option>
                                                <option value=3>3</option>
                                                <option value=4>4</option>
                                                <option value=5>5</option>
                                
                                                </select>
                                                <span class="text-xl mr-3">:</span>
                                                <select v-model="assigncourse.duration[1].min" name="minutes"  class="bg-grey-200 appearance-none border-2 border-grey-200 text-grey-darker py-2 px-4 appearance-none outline-none mr-4">
                                                <option value=0.0 selected=true>00</option>
                                                <option value=0.5>30</option>
                                                </select>
                                               
                                            </div>
                                        </div>








                                        <div class="md:w-3/4">

                                            <div class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4">
                                                <label for="male">Number of Group
                                                    <input type="radio" value="One" v-model="numberofgroup"> One
                                                </label>
                                                <label for="female">
                                                    <input type="radio" value="Two" v-model="numberofgroup"> Two
                                                </label>
                                            </div>
                                        </div>


                                         <div v-if="numberofgroup=='One' || numberofgroup=='Two'" class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Total Student of group 1
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <input class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                  v-model="assigncourse.group[0]" id="inline-full-name" type="number" placeholder="Enter Total Student of group 1">
                                            </div>
                                        </div>

                                        


                                        <div v-if="numberofgroup=='Two'" class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Total Student of Group 2
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <input class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                  v-model="assigncourse.group[1]" id="inline-full-name" type="number" placeholder="Enter Total Student of Group 2">
                                            </div>
                                        </div>






                                        
                                         <div class="mt-5">
                                <button  @click="assignCourse" class='bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded'> Add </button>
                                <span class='close-modal cursor-pointer bg-red-200 hover:bg-red-500 text-red-900 font-bold py-2 px-4 rounded'>
                                    Close
                                </span>
                            </div>
                                    </form>
                    </div>
                </div>
            </div>


            <div id='addSemesterModal' class="modal-wrapper">
                <div class="overlay close-modal"></div>
                <div class="modal modal-centered">
                    <div class="modal-content shadow-lg p-5">
                        <div class="border-b p-2 pb-3 pt-0 mb-4">
                        <div class="flex justify-between items-center">
                                Modal header
                                <span class='close-modal cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200'>
                                    <i class="fas fa-times text-gray-700"></i>
                                </span>
                        </div>
                        </div>
                        <!-- Modal content -->
                         <form class="w-full">
                                        <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Session Name
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <input class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                    id="inline-full-name" v-model="selected_session" readonly type="text" >
                                            </div>
                                        </div>

                                        <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Semester
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <select class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                           v-model="semester.semester" id="grid-state">
                                                        <option value="1">1st Semester</option>
                                                        <option value="2">2nd Semester</option>
                                                        <option value="3">3rd Semester</option>
                                                        <option value="4">4th Semester</option>
                                                        <option value="5">5th Semester</option>
                                                        <option value="6">6th Semester</option>
                                                        <option value="7">7th Semester</option>
                                                        <option value="8">8th Semester</option>
                                                    </select>
                                                    
                                            </div>
                                        </div>

                                         <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Section
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <select class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                           v-model="semester.section" id="grid-state">
                                                        <option value="a">A</option>
                                                        <option value="b">B</option>
                                                        <option value="c">C</option>
                                                        <option value="d">D</option>
                                                        <option value="e">E</option>
                                                        
                                                    </select>
                                                    
                                            </div>
                                        </div>
                                        
                                        <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Total Student
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <input class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                   v-model="semester.total_student" id="inline-full-name" type="number" >
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="mt-5">
                                <button  @click="addSemester" class='bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded'> Add </button>
                                <span class='close-modal cursor-pointer bg-red-200 hover:bg-red-500 text-red-900 font-bold py-2 px-4 rounded'>
                                    Close
                                </span>
                            </div>
                                       
                                    </form>
                    </div>
                </div>
            </div>
















    </main>

</template>

<script>
    export default {
        data(){
                return {
                selected_session:"",
                active_session:"",
                sessions:{
                        
                        session_name:"",
                        status:true
                },
                newSessions:{
                        
                        session_name:"",
                        status:true
                },
                semester: {
                    semester:"",
                    section:"",
                    total_student:0,
                    session_name:"",
                    status:true
                },

          //**************/
          numberofclass:"select",
          numberofgroup:"select",
          select_2:0,
          day:0,
          //session:{},
          semesters:{},
          teachers:{},
          courses:{},
          rooms:{},
          assigncourse:{
              session_name:"",
              semester:"",
              teacher_code:"",
              course_code:"",
              room_number:0,
              day:0,
              group:[],
              duration:[{
                  hr : 0,
                  min : 0.0
              },
              {
                  hr : 0,
                  min : 0.0
              }
              ]
          },
          savecourse:{
              session_name:"",
              semester:"",
              teacher_code:"",
              course_code:"",
              room_number:0,
              group:0,
              //group2:0,
              day:0,
              duration1:0,
              duration2:0,
              total_student1:0,
              total_student2:0
          },
          manualassigncourse:{
              session_name:"",
              semester:"",
              teacher_code:"",
              course_code:"",
              group:0,
              day1:0,
              duration1:0,
              hour1:0,
              min1:0,
              day2:0,
              duration2:0,
              hour2:0,
              min2:0
          },
          manualsavecourse:{
              session_name  :   "",
              semester      :   "",
              teacher_code  :   "",
              course_code   :   "",
              group         :   1,
              start1        :   1,
              end1          :   1,
              duration1     :   0,
              start2        :   1,
              end2          :   1,
              duration2     :   0
            
          }

          /*****************/

        }
        
    },
    created() {

        
        

        let uri = `/api/teachers`;
            
        this.axios.get(uri).then((response) => {
            this.teachers = response.data.data;
            //console.log(this.teachers);
        });

        uri = `/api/rooms`;
            
        this.axios.get(uri).then((response) => {
            this.rooms = response.data.data;
            //console.log(this.rooms);
        });

        uri = `/api/courses`;
            
        this.axios.get(uri).then((response) => {
            this.courses = response.data.data;
            //console.log(this.courses);
        });

         uri = '/api/sessions';
        this.axios.get(uri).then(response => {
          this.sessions = response.data.data;
          console.log(this.sessions.length);
          this.checkSelectedSession();
        });
    },
    methods:{

        addSemester(){
        
        this.semester.session_name=this.selected_session;
         let uri = '/api/semester-section/create';
          this.axios.post(uri, this.semester).then((response) => {
         });
      },
      addSession(){
            console.log(this.newSessions);
            let uri = '/api/session/create';
            this.selected_session = this.newSessions.session_name;
            this.axios.post(uri, this.newSessions).then((response) => {
                
            });
      },
      assignCourse()
          {
              
              //console.log(this.assigncourse.group[0]);
             this.assigncourse.session_name=this.selected_session;
              this.savecourse.session_name    =   this.assigncourse.session_name;
              this.savecourse.semester        =   this.assigncourse.semester;
              this.savecourse.teacher_code    =   this.assigncourse.teacher_code;
              this.savecourse.course_code     =   this.assigncourse.course_code;
              //this.savecourse.room_number     =   this.assigncourse.room_number;
              //this.savecourse.group           =   this.assigncourse.group[i]; /** */
              //this.savecourse.duration        =   this.assigncourse.duration; /** */
              //this.savecourse.totalstudent    =   this.assigncourse.totalstudent;
              this.savecourse.group = 0;
              this.savecourse.day = 0;
              this.savecourse.total_student1 = 0;
              this.savecourse.total_student2 = 0;
              this.savecourse.duration1 = 0;
              this.savecourse.duration2 = 0;
              
              if(this.assigncourse.group.length == 1)
              {
                  this.savecourse.group = 1;
                  this.savecourse.total_student1 = Number(this.assigncourse.group[0]);
              }
              else
              {
                  this.savecourse.group = 2;
                  this.savecourse.total_student1 = Number(this.assigncourse.group[0]);
                  this.savecourse.total_student2 = Number(this.assigncourse.group[1]);
              }
              if(this.assigncourse.duration.length == 1)
              {
                  this.savecourse.duration1 = Number(this.assigncourse.duration[0].hr) + Number(this.assigncourse.duration[0].min);
                  this.savecourse.duration2 = 0;
              }
              else
              {
                 this.savecourse.duration1 = Number(this.assigncourse.duration[0].hr) + Number(this.assigncourse.duration[0].min);
                 this.savecourse.duration2 = Number(this.assigncourse.duration[1].hr) + Number(this.assigncourse.duration[1].min);
              }
              
                //console.log(this.savecourse);
                let uri = '/api/enrollment/create';
                this.axios.post(uri, this.savecourse).then((response) => {
                //this.$router.go(-1);
          });
            },
            showSem(){
                this.assigncourse.session_name=this.selected_session;
                this.manualassigncourse.session_name=this.selected_session;
        //console.log(this.assigncourse);
        let uri = '/api/request-sections';
            
        this.axios.post(uri, this.assigncourse).then((response) => {
            this.semesters = response.data.data;
            //console.log(this.semesters);
        });
            },
        checkSelectedSession(){
          for(var i=0;i<this.sessions.length;i++)
          {
              if(this.sessions[i].status==1)
              {
                  this.selected_session=this.sessions[i].session_name;
                  this.active_session=this.sessions[i].session_name;
              }
          }
        },
          generateRoutine(){
             let uri = `/api/routine/generate/${this.selected_session}`;
             console.log(uri);
            this.axios.get(uri).then(response => {
          		  
		});
             
          },

           addManually(){
              var hr1,hr2,mn1,mn2,dy1,dy2;
              //console.log(this.manualassigncourse);
              this.manualsavecourse.session_name    =   this.manualassigncourse.session_name;
              this.manualsavecourse.semester        =   this.manualassigncourse.semester;
              this.manualsavecourse.teacher_code    =   this.manualassigncourse.teacher_code;
              this.manualsavecourse.course_code     =   this.manualassigncourse.course_code;
              //this.manualsavecourse.room_number     =   this.manualassigncourse.room_number;
              //this.manualsavecourse.group           =   this.manualassigncourse.group[i]; /** */
              //this.manualsavecourse.duration        =   this.manualassigncourse.duration; /** */
              //this.manualsavecourse.totalstudent    =   this.manualassigncourse.totalstudent;
              this.manualsavecourse.group             =    Number(this.manualassigncourse.group) ;
              this.manualsavecourse.duration1         =    Number(this.manualassigncourse.duration1);
              this.manualsavecourse.duration2         =    Number(this.manualassigncourse.duration2);
              hr1 = Number(this.manualassigncourse.hour1);
              mn1 = Number(this.manualassigncourse.min1);
              dy1 = Number(this.manualassigncourse.day1);

              this.manualsavecourse.start1            =   this.convert_time(hr1,mn1)+((dy1-1)*18);
              this.manualsavecourse.end1              =   this.manualsavecourse.start1+this.manualsavecourse.duration1+this.manualsavecourse.duration1-1;

              hr2 = Number(this.manualassigncourse.hour2);
              mn2 = Number(this.manualassigncourse.min2);
              dy2 = Number(this.manualassigncourse.day2);
            
              this.manualsavecourse.start2            =   this.convert_time(hr2,mn2)+((dy2-1)*18);
              this.manualsavecourse.end2              =   this.manualsavecourse.start2+this.manualsavecourse.duration2+this.manualsavecourse.duration2-1;

              console.log(this.manualsavecourse);
              let uri = '/api/enrollment/manual-create';
              console.log(uri);
                this.axios.post(uri, this.manualsavecourse).then((response) => {
                         });
             
          },

          convert_time(h,m)
          {
              if(h==8 && m==30) return 1;
              else if(h==9 && m==0) return 2;
              else if(h==9 && m==30) return 3;
              else if(h==10 && m==0) return 4;
              else if(h==10 && m==30) return 5;
              else if(h==11 && m==0) return 6;
              else if(h==11 && m==30) return 7;
              else if(h==12 && m==0) return 8;
              else if(h==12 && m==30) return 9;
              else if(h==13 && m==0) return 10;
              else if(h==13 && m==30) return 11;
              else if(h==14 && m==0) return 12;
              else if(h==14 && m==30) return 13;
              else if(h==15 && m==0) return 14;
              else if(h==15 && m==30) return 15;
              else if(h==16 && m==0) return 16;
              else if(h==16 && m==30) return 17;
              else if(h==17 && m==0) return 18;
              else if(h==17 && m==30) return 19;
              
          },
          assignSelect(){
              this.select_2=1;
              //cosole.log(this.day);
          }


     
      }
   
  }
</script>



