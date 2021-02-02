<template>
 <main class="bg-white-500 flex-1 p-3 overflow-hidden">
        <div class="flex flex-col">
                        <!-- Card Sextion Starts Here -->
                        <div class="container mx-auto h-full flex flex-1 justify-center items-center">
                            <!--Horizontal form-->
                            <div class="mb-2 border-solid border-grey-light rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
                                <div class="bg-gray-300 px-2 py-3 border-solid border-gray-400 border-b">
                                    Manual Assign
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
                                                <input class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                    id="inline-full-name" type="text" v-model="temp_assign_course.session_name" readonly>
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
                                                          v-model="temp_assign_course.sem_id"  id="grid-state">
                                                        
                                                        <option v-for="semester in semesters" :key="semester.id " :value="semester.id" >{{semester.semester}}</option>
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
                                                           v-model="temp_assign_course.teacher_code" id="grid-state">
                                                        
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
                                                          v-model="temp_assign_course.course_code"  id="grid-state">
                                                        
                                                        <option v-for="course in courses" :value="course.code" :key="course.id">{{course.name}} - {{course.code}}</option>
                                                    </select>
                                                    
                                            </div>
                                        </div>



                                    <!--<div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Group
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <select v-model="temp_assign_course.group" class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                          id="grid-state">
                                                        <option value=0>Zero</option>
                                                        <option value=1>One</option>
                                                        <option value=2>Two</option>
                                                </select>
                                                    
                                            </div>
                                    </div>-->

                                    

                                   
                                        <div class="md:flex md:items-center mb-6" v-if="course_type[temp_assign_course.course_code]!=0 && temp_assign_course.course_code!='' ">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Number of Group
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                 <input type="radio"  value="One"  v-model="numberofgroup" > One
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                 
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" value="Two" v-model="numberofgroup"> Two
                                                    
                                            </div>
                                        </div>

                                      
                                     <!-----------------------------group 0------------------------->
                                        <div v-if="course_type[temp_assign_course.course_code]==0 || temp_assign_course.course_code=='' ">
                                                <div  class="md:flex md:items-center mb-6" >
                                                    <div class="md:w-1/4">
                                                        <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                            for="inline-course-code">
                                                            Total Student
                                                        </label>
                                                    </div>
                                                    <div class="md:w-3/4">
                                                        <input class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                        v-model="temp_assign_course.total_student[0]" id="inline-full-name" type="number" >
                                                    </div>
                                                </div>

                                                <div >
                                                    <div class="md:flex md:items-center mb-6">
                                                        <div class="md:w-1/4">
                                                            <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                                for="inline-course-code">
                                                                Number of Class
                                                            </label>
                                                    </div>
                                                    <div class="md:w-3/4">
                                                        <input type="radio"  value="One"  v-model="numberofclass" > One
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                 
                                                        <input type="radio" value="Two" v-model="numberofclass"> Two
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input type="radio" value="Three" v-model="numberofclass"> Three
                                                            
                                                    </div>
                                                </div>
                                                <div class="md:flex md:items-center mb-6" v-if="numberofclass=='One' || numberofclass=='Two' || numberofclass=='Three' ">
                                                    <div class="md:w-1/4">
                                                        <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                            for="inline-course-code">
                                                            Day 1
                                                        </label>
                                                    </div >
                                                            <div>
                                                                <select v-model="temp_assign_course.day[0][0]" class="block appearance-none bg-grey-200 border border-grey-200 text-grey-darker py-3 px-0.5 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                                    id="grid-state">
                                                                    <option value=1>Saturday</option>
                                                                    <option value=2>Sunday</option>
                                                                    <option value=3>Monday</option>
                                                                    <option value=4>Tuesday</option>
                                                                    <option value=5>Wednesday</option>
                                                                    
                                                                </select>
                                                            </div>&nbsp;
                                                            <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-2"
                                                            for="inline-course-code"> Duration 1</label>
                                                            <div>
                                                                <select class="block appearance-none  bg-grey-200 border border-grey-200 text-grey-darker py-3 px-2  rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                                        v-model="temp_assign_course.duration[0][0]"  id="grid-state" >
                                                                        <option value=1     >01 : 00</option>
                                                                        <option value=1.5   >01 : 30</option>
                                                                        <option value=2     >02 : 00</option>
                                                                        <option value=2.5   >02 : 30</option>
                                                                        <option value=3     >03 : 00</option>
                                                                        <option value=3.5   >03 : 30</option>
                                                                        <option value=4     >04 : 00</option>

                                                                </select>
                                                            </div>&nbsp;
                                                            <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-2"
                                                            for="inline-course-code"> Time 1</label>
                                                            <div class="flex">
                                                            <select v-model="temp_assign_course.hour[0][0]" name="hours" class="bg-grey-200 text-grey-darker border border-grey-200 px-1 py-3 appearance-none outline-none">
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
                                                            <span class="text-xl py-3 mr-1">:</span>
                                                            
                                                            <select v-model="temp_assign_course.min[0][0]" name="minutes" class="bg-grey-200 text-grey-darker border border-grey-200 px-1 appearance-none outline-none mr-2">
                                                            <option value=0>00</option>
                                                            <option value=30>30</option>
                                                            </select>
                                                            <select name="ampm" class="bg-grey-200 text-grey-darker border border-grey-200 appearance-none outline-none">
                                                            <option value="am">AM</option>
                                                            <option value="pm">PM</option>
                                                            </select>
                                                        </div>

                                                </div>
                                                <div class="md:flex md:items-center mb-6" v-if="numberofclass=='Two' || numberofclass=='Three' ">
                                                    <div class="md:w-1/4">
                                                        <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                            for="inline-course-code">
                                                            Day 2
                                                        </label>
                                                    </div>
                                                            <div>
                                                                <select v-model="temp_assign_course.day[0][1]" class="block appearance-none bg-grey-200 border border-grey-200 text-grey-darker py-3 px-0.5 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                                    id="grid-state">
                                                                    <option value=1>Saturday</option>
                                                                    <option value=2>Sunday</option>
                                                                    <option value=3>Monday</option>
                                                                    <option value=4>Tuesday</option>
                                                                    <option value=5>Wednesday</option>
                                                                    
                                                                </select>
                                                            </div>&nbsp;
                                                            <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-2"
                                                            for="inline-course-code"> Duration 2</label>
                                                            <div>
                                                                <select class="block appearance-none  bg-grey-200 border border-grey-200 text-grey-darker py-3 px-2  rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                                        v-model="temp_assign_course.duration[0][1]"  id="grid-state" >
                                                                        <option value=1     >01 : 00</option>
                                                                        <option value=1.5   >01 : 30</option>
                                                                        <option value=2     >02 : 00</option>
                                                                        <option value=2.5   >02 : 30</option>
                                                                        <option value=3     >03 : 00</option>
                                                                        <option value=3.5   >03 : 30</option>
                                                                        <option value=4     >04 : 00</option>

                                                                </select>
                                                            </div>&nbsp;
                                                            <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-2"
                                                            for="inline-course-code"> Time 2</label>
                                                            <div class="flex">
                                                            <select v-model="temp_assign_course.hour[0][1]" name="hours" class="bg-grey-200 text-grey-darker border border-grey-200 px-1 py-3 appearance-none outline-none">
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
                                                            <span class="text-xl py-3 mr-1">:</span>
                                                            
                                                            <select v-model="temp_assign_course.min[0][1]" name="minutes" class="bg-grey-200 text-grey-darker border border-grey-200 px-1 appearance-none outline-none mr-2">
                                                            <option value=0>00</option>
                                                            <option value=30>30</option>
                                                            </select>
                                                            <select name="ampm" class="bg-grey-200 text-grey-darker border border-grey-200 appearance-none outline-none">
                                                            <option value="am">AM</option>
                                                            <option value="pm">PM</option>
                                                            </select>
                                                        </div>

                                                </div>
                                                <div class="md:flex md:items-center mb-6" v-if="numberofclass=='Three' ">
                                                    <div class="md:w-1/4">
                                                        <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                            for="inline-course-code">
                                                            Day 3
                                                        </label>
                                                    </div>
                                                            <div>
                                                                <select v-model="temp_assign_course.day[0][2]" class="block appearance-none bg-grey-200 border border-grey-200 text-grey-darker py-3 px-0.5 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                                    id="grid-state">
                                                                    <option value=1>Saturday</option>
                                                                    <option value=2>Sunday</option>
                                                                    <option value=3>Monday</option>
                                                                    <option value=4>Tuesday</option>
                                                                    <option value=5>Wednesday</option>
                                                                    
                                                                </select>
                                                            </div>&nbsp;
                                                            <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-2"
                                                            for="inline-course-code"> Duration 3</label>
                                                            <div>
                                                                <select class="block appearance-none  bg-grey-200 border border-grey-200 text-grey-darker py-3 px-2  rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                                        v-model="temp_assign_course.duration[0][2]"  id="grid-state" >
                                                                        <option value=1     >01 : 00</option>
                                                                        <option value=1.5   >01 : 30</option>
                                                                        <option value=2     >02 : 00</option>
                                                                        <option value=2.5   >02 : 30</option>
                                                                        <option value=3     >03 : 00</option>
                                                                        <option value=3.5   >03 : 30</option>
                                                                        <option value=4     >04 : 00</option>

                                                                </select>
                                                            </div>&nbsp;
                                                            <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-2"
                                                            for="inline-course-code"> Time 3</label>
                                                            <div class="flex">
                                                            <select v-model="temp_assign_course.hour[0][2]" name="hours" class="bg-grey-200 text-grey-darker border border-grey-200 px-1 py-3 appearance-none outline-none">
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
                                                            <span class="text-xl py-3 mr-1">:</span>
                                                            
                                                            <select v-model="temp_assign_course.min[0][2]" name="minutes" class="bg-grey-200 text-grey-darker border border-grey-200 px-1 appearance-none outline-none mr-2">
                                                            <option value=0>00</option>
                                                            <option value=30>30</option>
                                                            </select>
                                                            <select name="ampm" class="bg-grey-200 text-grey-darker border border-grey-200 appearance-none outline-none">
                                                            <option value="am">AM</option>
                                                            <option value="pm">PM</option>
                                                            </select>
                                                        </div>
                                        
                                                    </div>
                                                
                                                    <br>
                                                </div>
                                        </div>
                                    <!--------------------------end group 0------------------------->



                                    <!-----------------------------group 1------------------------->
                                        <div v-if=" (numberofgroup=='One' || numberofgroup=='Two') && (course_type[temp_assign_course.course_code]!=0 && temp_assign_course.course_code!='' ) ">
                                            <hr>
                                            <br> <!--111-->
                                             <div class="md:flex md:items-center mb-6" >
                                                <div class="md:w-1/4">
                                                    <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                        for="inline-course-code">
                                                        Total Student Group 1
                                                    </label>
                                                </div>
                                                <div class="md:w-3/4">
                                                    <input class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                    v-model="temp_assign_course.total_student[0]" id="inline-full-name" type="number" >
                                                </div>
                                            
                                          
                                            </div>
                                            <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Number of Class
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                 <input type="radio"  value="One"  v-model="numberofclass" > One
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                 
                                                <input type="radio" value="Two" v-model="numberofclass"> Two
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" value="Three" v-model="numberofclass"> Three
                                                    
                                            </div>
                                        </div>
                                        <div class="md:flex md:items-center mb-6" v-if="numberofclass=='One' || numberofclass=='Two' || numberofclass=='Three' ">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Day 1
                                                </label>
                                            </div >
                                                    <div>
                                                        <select v-model="temp_assign_course.day[0][0]" class="block appearance-none bg-grey-200 border border-grey-200 text-grey-darker py-3 px-0.5 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                            id="grid-state">
                                                            <option value=1>Saturday</option>
                                                            <option value=2>Sunday</option>
                                                            <option value=3>Monday</option>
                                                            <option value=4>Tuesday</option>
                                                            <option value=5>Wednesday</option>
                                                            
                                                        </select>
                                                    </div>&nbsp;
                                                    <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-2"
                                                    for="inline-course-code"> Duration 1</label>
                                                    <div>
                                                        <select class="block appearance-none  bg-grey-200 border border-grey-200 text-grey-darker py-3 px-2  rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                                v-model="temp_assign_course.duration[0][0]"  id="grid-state" >
                                                                <option value=1     >01 : 00</option>
                                                                <option value=1.5   >01 : 30</option>
                                                                <option value=2     >02 : 00</option>
                                                                <option value=2.5   >02 : 30</option>
                                                                <option value=3     >03 : 00</option>
                                                                <option value=3.5   >03 : 30</option>
                                                                <option value=4     >04 : 00</option>

                                                        </select>
                                                    </div>&nbsp;
                                                    <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-2"
                                                    for="inline-course-code"> Time 1</label>
                                                     <div class="flex">
                                                    <select v-model="temp_assign_course.hour[0][0]" name="hours" class="bg-grey-200 text-grey-darker border border-grey-200 px-1 py-3 appearance-none outline-none">
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
                                                    <span class="text-xl py-3 mr-1">:</span>
                                                    
                                                    <select v-model="temp_assign_course.min[0][0]" name="minutes" class="bg-grey-200 text-grey-darker border border-grey-200 px-1 appearance-none outline-none mr-2">
                                                    <option value=0>00</option>
                                                    <option value=30>30</option>
                                                    </select>
                                                    <select name="ampm" class="bg-grey-200 text-grey-darker border border-grey-200 appearance-none outline-none">
                                                    <option value="am">AM</option>
                                                    <option value="pm">PM</option>
                                                    </select>
                                                </div>

                                        </div>
                                        <div class="md:flex md:items-center mb-6" v-if="numberofclass=='Two' || numberofclass=='Three' ">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Day 2
                                                </label>
                                            </div>
                                                    <div>
                                                        <select v-model="temp_assign_course.day[0][1]" class="block appearance-none bg-grey-200 border border-grey-200 text-grey-darker py-3 px-0.5 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                            id="grid-state">
                                                            <option value=1>Saturday</option>
                                                            <option value=2>Sunday</option>
                                                            <option value=3>Monday</option>
                                                            <option value=4>Tuesday</option>
                                                            <option value=5>Wednesday</option>
                                                            
                                                        </select>
                                                    </div>&nbsp;
                                                    <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-2"
                                                    for="inline-course-code"> Duration 2</label>
                                                    <div>
                                                        <select class="block appearance-none  bg-grey-200 border border-grey-200 text-grey-darker py-3 px-2  rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                                v-model="temp_assign_course.duration[0][1]"  id="grid-state" >
                                                                <option value=1     >01 : 00</option>
                                                                <option value=1.5   >01 : 30</option>
                                                                <option value=2     >02 : 00</option>
                                                                <option value=2.5   >02 : 30</option>
                                                                <option value=3     >03 : 00</option>
                                                                <option value=3.5   >03 : 30</option>
                                                                <option value=4     >04 : 00</option>

                                                        </select>
                                                    </div>&nbsp;
                                                    <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-2"
                                                    for="inline-course-code"> Time 2</label>
                                                     <div class="flex">
                                                    <select v-model="temp_assign_course.hour[0][1]" name="hours" class="bg-grey-200 text-grey-darker border border-grey-200 px-1 py-3 appearance-none outline-none">
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
                                                    <span class="text-xl py-3 mr-1">:</span>
                                                    
                                                    <select v-model="temp_assign_course.min[0][1]" name="minutes" class="bg-grey-200 text-grey-darker border border-grey-200 px-1 appearance-none outline-none mr-2">
                                                    <option value=0>00</option>
                                                    <option value=30>30</option>
                                                    </select>
                                                    <select name="ampm" class="bg-grey-200 text-grey-darker border border-grey-200 appearance-none outline-none">
                                                    <option value="am">AM</option>
                                                    <option value="pm">PM</option>
                                                    </select>
                                                </div>

                                        </div>
                                        <div class="md:flex md:items-center mb-6" v-if="numberofclass=='Three' ">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Day 3
                                                </label>
                                            </div>
                                                    <div>
                                                        <select v-model="temp_assign_course.day[0][2]" class="block appearance-none bg-grey-200 border border-grey-200 text-grey-darker py-3 px-0.5 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                            id="grid-state">
                                                            <option value=1>Saturday</option>
                                                            <option value=2>Sunday</option>
                                                            <option value=3>Monday</option>
                                                            <option value=4>Tuesday</option>
                                                            <option value=5>Wednesday</option>
                                                            
                                                        </select>
                                                    </div>&nbsp;
                                                    <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-2"
                                                    for="inline-course-code"> Duration 3</label>
                                                    <div>
                                                        <select class="block appearance-none  bg-grey-200 border border-grey-200 text-grey-darker py-3 px-2  rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                                v-model="temp_assign_course.duration[0][2]"  id="grid-state" >
                                                                <option value=1     >01 : 00</option>
                                                                <option value=1.5   >01 : 30</option>
                                                                <option value=2     >02 : 00</option>
                                                                <option value=2.5   >02 : 30</option>
                                                                <option value=3     >03 : 00</option>
                                                                <option value=3.5   >03 : 30</option>
                                                                <option value=4     >04 : 00</option>

                                                        </select>
                                                    </div>&nbsp;
                                                    <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-2"
                                                    for="inline-course-code"> Time 3</label>
                                                     <div class="flex">
                                                    <select v-model="temp_assign_course.hour[0][2]" name="hours" class="bg-grey-200 text-grey-darker border border-grey-200 px-1 py-3 appearance-none outline-none">
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
                                                    <span class="text-xl py-3 mr-1">:</span>
                                                    
                                                    <select v-model="temp_assign_course.min[0][2]" name="minutes" class="bg-grey-200 text-grey-darker border border-grey-200 px-1 appearance-none outline-none mr-2">
                                                    <option value=0>00</option>
                                                    <option value=30>30</option>
                                                    </select>
                                                    <select name="ampm" class="bg-grey-200 text-grey-darker border border-grey-200 appearance-none outline-none">
                                                    <option value="am">AM</option>
                                                    <option value="pm">PM</option>
                                                    </select>
                                                </div>
                                
                                            </div>
                                            <hr>
                                            <br>
                                        </div>
                                    <!--------------------------end group 1------------------------->   

                                    <!-----------------------------group 2------------------------->
                                         <div v-if="numberofgroup=='Two'  && (course_type[temp_assign_course.course_code]!=0 && temp_assign_course.course_code!='' )">
                                           
                                            <div class="md:flex md:items-center mb-6" >
                                                <div class="md:w-1/4">
                                                    <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                        for="inline-course-code">
                                                        Total Student Group 2
                                                    </label>
                                                </div>
                                                <div class="md:w-3/4">
                                                    <input class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                    v-model="temp_assign_course.total_student[1]" id="inline-full-name" type="number" >
                                                </div>
                                            
                                          
                                            </div>

                                            <div class="md:flex md:items-center mb-6">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Number of Class
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                 <input type="radio"  value="One"  v-model="numberofclass2" > One
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                 
                                                <input type="radio" value="Two" v-model="numberofclass2"> Two
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" value="Three" v-model="numberofclass2"> Three
                                                    
                                            </div>
                                        </div>
                                        <div class="md:flex md:items-center mb-6" v-if="numberofclass2=='One' || numberofclass2=='Two' || numberofclass2=='Three' ">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Day 1
                                                </label>
                                            </div >
                                                    <div>
                                                        <select v-model="temp_assign_course.day[1][0]" class="block appearance-none bg-grey-200 border border-grey-200 text-grey-darker py-3 px-0.5 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                            id="grid-state">
                                                            <option value=1>Saturday</option>
                                                            <option value=2>Sunday</option>
                                                            <option value=3>Monday</option>
                                                            <option value=4>Tuesday</option>
                                                            <option value=5>Wednesday</option>
                                                            
                                                        </select>
                                                    </div>&nbsp;
                                                    <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-2"
                                                    for="inline-course-code"> Duration 1</label>
                                                    <div>
                                                        <select class="block appearance-none  bg-grey-200 border border-grey-200 text-grey-darker py-3 px-2  rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                                v-model="temp_assign_course.duration[1][0]"  id="grid-state" >
                                                                <option value=1     >01 : 00</option>
                                                                <option value=1.5   >01 : 30</option>
                                                                <option value=2     >02 : 00</option>
                                                                <option value=2.5   >02 : 30</option>
                                                                <option value=3     >03 : 00</option>
                                                                <option value=3.5   >03 : 30</option>
                                                                <option value=4     >04 : 00</option>

                                                        </select>
                                                    </div>&nbsp;
                                                    <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-2"
                                                    for="inline-course-code"> Time 1</label>
                                                     <div class="flex">
                                                    <select v-model="temp_assign_course.hour[1][0]" name="hours" class="bg-grey-200 text-grey-darker border border-grey-200 px-1 py-3 appearance-none outline-none">
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
                                                    <span class="text-xl py-3 mr-1">:</span>
                                                    
                                                    <select v-model="temp_assign_course.min[1][0]" name="minutes" class="bg-grey-200 text-grey-darker border border-grey-200 px-1 appearance-none outline-none mr-2">
                                                    <option value=0>00</option>
                                                    <option value=30>30</option>
                                                    </select>
                                                    <select name="ampm" class="bg-grey-200 text-grey-darker border border-grey-200 appearance-none outline-none">
                                                    <option value="am">AM</option>
                                                    <option value="pm">PM</option>
                                                    </select>
                                                </div>

                                        </div>
                                        <div class="md:flex md:items-center mb-6" v-if="numberofclass2=='Two' || numberofclass2=='Three' ">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Day 2
                                                </label>
                                            </div>
                                                    <div>
                                                        <select v-model="temp_assign_course.day[1][1]" class="block appearance-none bg-grey-200 border border-grey-200 text-grey-darker py-3 px-0.5 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                            id="grid-state">
                                                            <option value=1>Saturday</option>
                                                            <option value=2>Sunday</option>
                                                            <option value=3>Monday</option>
                                                            <option value=4>Tuesday</option>
                                                            <option value=5>Wednesday</option>
                                                            
                                                        </select>
                                                    </div>&nbsp;
                                                    <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-2"
                                                    for="inline-course-code"> Duration 2</label>
                                                    <div>
                                                        <select class="block appearance-none  bg-grey-200 border border-grey-200 text-grey-darker py-3 px-2  rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                                v-model="temp_assign_course.duration[1][1]"  id="grid-state" >
                                                                <option value=1     >01 : 00</option>
                                                                <option value=1.5   >01 : 30</option>
                                                                <option value=2     >02 : 00</option>
                                                                <option value=2.5   >02 : 30</option>
                                                                <option value=3     >03 : 00</option>
                                                                <option value=3.5   >03 : 30</option>
                                                                <option value=4     >04 : 00</option>

                                                        </select>
                                                    </div>&nbsp;
                                                    <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-2"
                                                    for="inline-course-code"> Time 2</label>
                                                     <div class="flex">
                                                    <select v-model="temp_assign_course.hour[1][1]" name="hours" class="bg-grey-200 text-grey-darker border border-grey-200 px-1 py-3 appearance-none outline-none">
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
                                                    <span class="text-xl py-3 mr-1">:</span>
                                                    
                                                    <select v-model="temp_assign_course.min[1][1]" name="minutes" class="bg-grey-200 text-grey-darker border border-grey-200 px-1 appearance-none outline-none mr-2">
                                                    <option value=0>00</option>
                                                    <option value=30>30</option>
                                                    </select>
                                                    <select name="ampm" class="bg-grey-200 text-grey-darker border border-grey-200 appearance-none outline-none">
                                                    <option value="am">AM</option>
                                                    <option value="pm">PM</option>
                                                    </select>
                                                </div>

                                        </div>
                                        <div class="md:flex md:items-center mb-6" v-if="numberofclass2=='Three' ">
                                            <div class="md:w-1/4">
                                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-course-code">
                                                    Day 3
                                                </label>
                                            </div>
                                                    <div>
                                                        <select v-model="temp_assign_course.day[1][2]" class="block appearance-none bg-grey-200 border border-grey-200 text-grey-darker py-3 px-0.5 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                            id="grid-state">
                                                            <option value=1>Saturday</option>
                                                            <option value=2>Sunday</option>
                                                            <option value=3>Monday</option>
                                                            <option value=4>Tuesday</option>
                                                            <option value=5>Wednesday</option>
                                                            
                                                        </select>
                                                    </div>&nbsp;
                                                    <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-2"
                                                    for="inline-course-code"> Duration 3</label>
                                                    <div>
                                                        <select class="block appearance-none  bg-grey-200 border border-grey-200 text-grey-darker py-3 px-2  rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                                v-model="temp_assign_course.duration[1][2]"  id="grid-state" >
                                                                <option value=1     >01 : 00</option>
                                                                <option value=1.5   >01 : 30</option>
                                                                <option value=2     >02 : 00</option>
                                                                <option value=2.5   >02 : 30</option>
                                                                <option value=3     >03 : 00</option>
                                                                <option value=3.5   >03 : 30</option>
                                                                <option value=4     >04 : 00</option>

                                                        </select>
                                                    </div>&nbsp;
                                                    <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-2"
                                                    for="inline-course-code"> Time 3</label>
                                                     <div class="flex">
                                                    <select v-model="temp_assign_course.hour[1][2]" name="hours" class="bg-grey-200 text-grey-darker border border-grey-200 px-1 py-3 appearance-none outline-none">
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
                                                    <span class="text-xl py-3 mr-1">:</span>
                                                    
                                                    <select v-model="temp_assign_course.min[1][2]" name="minutes" class="bg-grey-200 text-grey-darker border border-grey-200 px-1 appearance-none outline-none mr-2">
                                                    <option value=0>00</option>
                                                    <option value=30>30</option>
                                                    </select>
                                                    <select name="ampm" class="bg-grey-200 text-grey-darker border border-grey-200 appearance-none outline-none">
                                                    <option value="am">AM</option>
                                                    <option value="pm">PM</option>
                                                    </select>
                                                </div>
                                
                                            </div>
                                            <hr>
                                            <br>
                                        </div>
                                    <!--------------------------end group 2------------------------->
                                    
                                   
                                        
                                        <div class="md:flex md:items-center">
                                            <div class="md:w-1/3"></div>
                                            <div class="md:w-2/3">
                                                <button @click.prevent="addManually" class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-full">
                                                    Assign Course Manually
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--/Horizontal form-->

                        
                        </div>


                        <!-- /Cards Section Ends Here -->

                    
                    </div>
    </main>
</template>



<script>
    export default {

      data() {
        return {
          numberofclass:"select",
          numberofclass2:"select",
          numberofgroup:"select",          
          semesters:{},
          teachers:{},
          courses:{},
          temp_assign_course:{
              session_name:"",
              sem_id:"",
              teacher_code:"",
              course_code:"",
              total_student:[],
              day:[[],[]],
              hour: [[],[]],
              min : [[],[]],
              duration:[[],[]],
              
              /*day1:0,
              duration1:0,
              hour1:0,
              min1:0,
              day2:0,
              duration2:0,
              hour2:0,
              min2:0*/
          },
          assign_course:{
              session_name:"",
              sem_id:0,
              teacher_code:"",
              course_code:"",
              group:0,
              total_student:[],
              duration1:[],
              start1:[],
              end1:[],
              day1:[],
              duration2:[],
              start2:[],
              end2:[],
              day2:[],
          },
          course_type:[],
        }
      },
      created() {
          

       
        this.temp_assign_course.session_name=this.$route.params.id;
        console.log(this.temp_assign_course.session_name);

        let uri = '/api/request-sections';
            
        this.axios.post(uri, this.temp_assign_course).then((response) => {
            this.semesters = response.data.data;
            //console.log(this.semesters);
        });

        uri = `/api/teachers`;
            
        this.axios.get(uri).then((response) => {
            this.teachers = response.data.data;
            //console.log(this.teachers);
        });

        uri = `/api/courses`;
            
        this.axios.get(uri).then((response) => {
            this.courses = response.data.data;
            this.courseTypeCheck();
            //console.log(this.courses);
        });
        //this.gen2d();
      },

        methods:{
            addManually(){
                var hour1=[],hour2=[],min1=[],min2=[];
                this.assign_course.session_name   =   this.temp_assign_course.session_name;
                this.assign_course.sem_id         =   this.temp_assign_course.sem_id;
                this.assign_course.teacher_code   =   this.temp_assign_course.teacher_code;
                this.assign_course.course_code    =   this.temp_assign_course.course_code;
                this.assign_course.total_student =   this.temp_assign_course.total_student;
                if(this.numberofgroup!="Two" || this.course_type[this.temp_assign_course.course_code]=='') //group=0
                {
                    this.assign_course.group      =   0;
                }
                else
                {
                    this.assign_course.group      =   2;
                }
                this.assign_course.day1            =    this.temp_assign_course.day[0];
                this.assign_course.day2            =    this.temp_assign_course.day[1];
                hour1            =    this.temp_assign_course.hour[0];
                hour2            =    this.temp_assign_course.hour[1];

                min1            =    this.temp_assign_course.min[0];
                min2            =    this.temp_assign_course.min[1];
                this.assign_course.duration1            =    this.temp_assign_course.duration[0];
                this.assign_course.duration2            =    this.temp_assign_course.duration[1];
                for(var i=0;i< this.assign_course.duration1.length;i++)
                {
                    var hr = Number(hour1[i]);
                    var mn = Number(min1[i]);
                    var dy = Number(this.assign_course.day1[i]);
                    var dn = Number(this.assign_course.duration1[i]);
                    this.assign_course.start1[i]   =   this.convert_time(hr,mn)+((dy-1)*18);
                    this.assign_course.end1[i]     =   this.assign_course.start1[i]+dn+dn-1;

                }
                for(var i=0;i< this.assign_course.duration2.length;i++)
                {
                    var hr = Number(hour2[i]);
                    var mn = Number(min2[i]);
                    var dy = Number(this.assign_course.day2[i]);
                    var dn = Number(this.assign_course.duration2[i]);
                    this.assign_course.start2[i]   =   this.convert_time(hr,mn)+((dy-1)*18);
                    console.log( this.assign_course.start2[i]);
                    this.assign_course.end2[i]     =   this.assign_course.start2[i]+dn+dn-1;

                }

                console.log(this.assign_course);
                let uri = '/api/enrollment/manual-create';
                this.axios.post(uri, this.assign_course).then((response) => {
                this.$router.push({name: 'assigncourses', params: { id: this.$route.params.id }});
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
          courseTypeCheck(){
            console.log("courses:");
            console.log(this.courses);
            for(var i=0;i<this.courses.length;i++)
            {
                this.course_type[this.courses[i].code]=this.courses[i].type;
            }
        }
      }

    //   methods: {
    //       addSemester(){
    //     console.log(this.semester);
        
    //      let uri = '/api/semester-section/create';
    //       this.axios.post(uri, this.semester).then((response) => {
    //         this.$router.push({name: 'home'});
    //      });
    //   }
         
    //   }


    }
</script>
