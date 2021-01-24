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