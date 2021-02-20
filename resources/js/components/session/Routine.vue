<template>
 
			 
				 <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                {{day}}
                            </div>
                            <div class="p-3">
								
                                <table class="table-responsive w-full rounded">
                                    <thead>
                                      <tr>
                                       <th class="border-2 w-1/6 px-2 py-1">Sem</th>
                                       	<th class="border-2 w-1/6 px-2 py-1">8:30-9:00</th>
                                        <th class="border-2 w-1/6 px-2 py-1">9:00-9:30</th>
                                        <th class="border-2 w-1/7 px-2 py-1">9:30-10:00</th>
                                        <th class="border-2 w-1/5 px-2 py-1">10:00-10:30</th>
										<th class="border-2 w-1/5 px-2 py-1">10:30-11:00</th>
										<th class="border-2 w-1/5 px-2 py-1">11:00-11:30</th>
										<th class="border-2 w-1/5 px-2 py-1">11:30-12:00</th>
										<th class="border-2 w-1/5 px-2 py-1">12:00-12:30</th>
										<th class="border-2 w-1/5 px-2 py-1">12:30-1:00</th>
										<th class="border-2 w-1/5 px-2 py-1">1:00-1:30</th>
										<th class="border-2 w-1/5 px-2 py-1">1:30-2:00</th>
										<th class="border-2 w-1/5 px-2 py-1">2:00-2:30</th>
										<th class="border-2 w-1/5 px-2 py-1">2:30-3:00</th>
										<th class="border-2 w-1/5 px-2 py-1">3:00-3:30</th>
										<th class="border-2 w-1/5 px-2 py-1">3:30-4:00</th>
										<th class="border-2 w-1/5 px-2 py-1">4:00-4:30</th>
										<th class="border-2 w-1/5 px-2 py-1">4:30-5:00</th>
										<th class="border-2 w-1/5 px-2 py-1">5:00-5:30</th>
                                      </tr>
                                    </thead>
                                    <tbody v-for="(enrollment,sem,index) in enrollments" :key="index">
											
										 <tr>
											
											<td class="border-2 px-2 py-1"  style="text-align:center" rowspan=2>{{sem}}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  	   v-if="group1[sem][1].group===0 && row1[sem][1]===5" :colspan=group1[sem][1].end-group1[sem][1].start+1 rowspan=2 >{{group1[sem][1].course_code}} / {{group1[sem][1].teacher_code}} / {{group1[sem][1].room_number}}{{ room_name[group1[sem][1].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-else-if="group1[sem][1].group===1 && row1[sem][1]===5" :colspan=group1[sem][1].end-group1[sem][1].start+1           >{{group1[sem][1].course_code}} / {{group1[sem][1].teacher_code}} / {{group1[sem][1].room_number}}{{ room_name[group1[sem][1].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	          v-else-if="row1[sem][1]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  	   v-if="group1[sem][2].group===0 && row1[sem][2]===5" :colspan=group1[sem][2].end-group1[sem][2].start+1 rowspan=2 >{{group1[sem][2].course_code}} / {{group1[sem][2].teacher_code}} / {{group1[sem][2].room_number}}{{ room_name[group1[sem][2].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-else-if="group1[sem][2].group===1 && row1[sem][2]===5" :colspan=group1[sem][2].end-group1[sem][2].start+1           >{{group1[sem][2].course_code}} / {{group1[sem][2].teacher_code}} / {{group1[sem][2].room_number}}{{ room_name[group1[sem][2].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	          v-else-if="row1[sem][2]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  	   v-if="group1[sem][3].group===0 && row1[sem][3]===5" :colspan=group1[sem][3].end-group1[sem][3].start+1 rowspan=2 >{{group1[sem][3].course_code}} / {{group1[sem][3].teacher_code}} / {{group1[sem][3].room_number}}{{ room_name[group1[sem][3].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-else-if="group1[sem][3].group===1 && row1[sem][3]===5" :colspan=group1[sem][3].end-group1[sem][3].start+1           >{{group1[sem][3].course_code}} / {{group1[sem][3].teacher_code}} / {{group1[sem][3].room_number}}{{ room_name[group1[sem][3].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	          v-else-if="row1[sem][3]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  	   v-if="group1[sem][4].group===0 && row1[sem][4]===5" :colspan=group1[sem][4].end-group1[sem][4].start+1 rowspan=2 >{{group1[sem][4].course_code}} / {{group1[sem][4].teacher_code}} / {{group1[sem][4].room_number}}{{ room_name[group1[sem][4].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-else-if="group1[sem][4].group===1 && row1[sem][4]===5" :colspan=group1[sem][4].end-group1[sem][4].start+1           >{{group1[sem][4].course_code}} / {{group1[sem][4].teacher_code}} / {{group1[sem][4].room_number}}{{ room_name[group1[sem][4].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	          v-else-if="row1[sem][4]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  	   v-if="group1[sem][5].group===0 && row1[sem][5]===5" :colspan=group1[sem][5].end-group1[sem][5].start+1 rowspan=2 >{{group1[sem][5].course_code}} / {{group1[sem][5].teacher_code}} / {{group1[sem][5].room_number}}{{ room_name[group1[sem][5].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-else-if="group1[sem][5].group===1 && row1[sem][5]===5" :colspan=group1[sem][5].end-group1[sem][5].start+1           >{{group1[sem][5].course_code}} / {{group1[sem][5].teacher_code}} / {{group1[sem][5].room_number}}{{ room_name[group1[sem][5].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	          v-else-if="row1[sem][5]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  	   v-if="group1[sem][6].group===0 && row1[sem][6]===5" :colspan=group1[sem][6].end-group1[sem][6].start+1 rowspan=2 >{{group1[sem][6].course_code}} / {{group1[sem][6].teacher_code}} / {{group1[sem][6].room_number}}{{ room_name[group1[sem][6].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-else-if="group1[sem][6].group===1 && row1[sem][6]===5" :colspan=group1[sem][6].end-group1[sem][6].start+1           >{{group1[sem][6].course_code}} / {{group1[sem][6].teacher_code}} / {{group1[sem][6].room_number}}{{ room_name[group1[sem][6].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	          v-else-if="row1[sem][6]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  	   v-if="group1[sem][7].group===0 && row1[sem][7]===5" :colspan=group1[sem][7].end-group1[sem][7].start+1 rowspan=2 >{{group1[sem][7].course_code}} / {{group1[sem][7].teacher_code}} / {{group1[sem][7].room_number}}{{ room_name[group1[sem][7].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-else-if="group1[sem][7].group===1 && row1[sem][7]===5" :colspan=group1[sem][7].end-group1[sem][7].start+1           >{{group1[sem][7].course_code}} / {{group1[sem][7].teacher_code}} / {{group1[sem][7].room_number}}{{ room_name[group1[sem][7].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	          v-else-if="row1[sem][7]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  	   v-if="group1[sem][8].group===0 && row1[sem][8]===5" :colspan=group1[sem][8].end-group1[sem][8].start+1 rowspan=2 >{{group1[sem][8].course_code}} / {{group1[sem][8].teacher_code}} / {{group1[sem][8].room_number}}{{ room_name[group1[sem][8].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-else-if="group1[sem][8].group===1 && row1[sem][8]===5" :colspan=group1[sem][8].end-group1[sem][8].start+1           >{{group1[sem][8].course_code}} / {{group1[sem][8].teacher_code}} / {{group1[sem][8].room_number}}{{ room_name[group1[sem][8].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	          v-else-if="row1[sem][8]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  	   v-if="group1[sem][9].group===0 && row1[sem][9]===5" :colspan=group1[sem][9].end-group1[sem][9].start+1 rowspan=2 >{{group1[sem][9].course_code}} / {{group1[sem][9].teacher_code}} / {{group1[sem][9].room_number}}{{ room_name[group1[sem][9].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-else-if="group1[sem][9].group===1 && row1[sem][9]===5" :colspan=group1[sem][9].end-group1[sem][9].start+1           >{{group1[sem][9].course_code}} / {{group1[sem][9].teacher_code}} / {{group1[sem][9].room_number}}{{ room_name[group1[sem][9].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	          v-else-if="row1[sem][9]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  	   v-if="group1[sem][10].group===0 && row1[sem][10]===5" :colspan=group1[sem][10].end-group1[sem][10].start+1 rowspan=2 >{{group1[sem][10].course_code}} / {{group1[sem][10].teacher_code}} / {{group1[sem][10].room_number}}{{ room_name[group1[sem][10].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-else-if="group1[sem][10].group===1 && row1[sem][10]===5" :colspan=group1[sem][10].end-group1[sem][10].start+1           >{{group1[sem][10].course_code}} / {{group1[sem][10].teacher_code}} / {{group1[sem][10].room_number}}{{ room_name[group1[sem][10].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	          v-else-if="row1[sem][10]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  	   v-if="group1[sem][11].group===0 && row1[sem][11]===5" :colspan=group1[sem][11].end-group1[sem][11].start+1 rowspan=2 >{{group1[sem][11].course_code}} / {{group1[sem][11].teacher_code}} / {{group1[sem][11].room_number}}{{ room_name[group1[sem][11].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-else-if="group1[sem][11].group===1 && row1[sem][11]===5" :colspan=group1[sem][11].end-group1[sem][11].start+1           >{{group1[sem][11].course_code}} / {{group1[sem][11].teacher_code}} / {{group1[sem][11].room_number}}{{ room_name[group1[sem][11].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	          v-else-if="row1[sem][11]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  	   v-if="group1[sem][12].group===0 && row1[sem][12]===5" :colspan=group1[sem][12].end-group1[sem][12].start+1 rowspan=2 >{{group1[sem][12].course_code}} / {{group1[sem][12].teacher_code}} / {{group1[sem][12].room_number}}{{ room_name[group1[sem][12].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-else-if="group1[sem][12].group===1 && row1[sem][12]===5" :colspan=group1[sem][12].end-group1[sem][12].start+1           >{{group1[sem][12].course_code}} / {{group1[sem][12].teacher_code}} / {{group1[sem][12].room_number}}{{ room_name[group1[sem][12].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	          v-else-if="row1[sem][12]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  	   v-if="group1[sem][13].group===0 && row1[sem][13]===5" :colspan=group1[sem][13].end-group1[sem][13].start+1 rowspan=2 >{{group1[sem][13].course_code}} / {{group1[sem][13].teacher_code}} / {{group1[sem][13].room_number}}{{ room_name[group1[sem][13].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-else-if="group1[sem][13].group===1 && row1[sem][13]===5" :colspan=group1[sem][13].end-group1[sem][13].start+1           >{{group1[sem][13].course_code}} / {{group1[sem][13].teacher_code}} / {{group1[sem][13].room_number}}{{ room_name[group1[sem][13].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	          v-else-if="row1[sem][13]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  	   v-if="group1[sem][14].group===0 && row1[sem][14]===5" :colspan=group1[sem][14].end-group1[sem][14].start+1 rowspan=2 >{{group1[sem][14].course_code}} / {{group1[sem][14].teacher_code}} / {{group1[sem][14].room_number}}{{ room_name[group1[sem][14].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-else-if="group1[sem][14].group===1 && row1[sem][14]===5" :colspan=group1[sem][14].end-group1[sem][14].start+1           >{{group1[sem][14].course_code}} / {{group1[sem][14].teacher_code}} / {{group1[sem][14].room_number}}{{ room_name[group1[sem][14].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	          v-else-if="row1[sem][14]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  	   v-if="group1[sem][15].group===0 && row1[sem][15]===5" :colspan=group1[sem][15].end-group1[sem][15].start+1 rowspan=2 >{{group1[sem][15].course_code}} / {{group1[sem][15].teacher_code}} / {{group1[sem][15].room_number}}{{ room_name[group1[sem][15].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-else-if="group1[sem][15].group===1 && row1[sem][15]===5" :colspan=group1[sem][15].end-group1[sem][15].start+1           >{{group1[sem][15].course_code}} / {{group1[sem][15].teacher_code}} / {{group1[sem][15].room_number}}{{ room_name[group1[sem][15].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	          v-else-if="row1[sem][15]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  	   v-if="group1[sem][16].group===0 && row1[sem][16]===5" :colspan=group1[sem][16].end-group1[sem][16].start+1 rowspan=2 >{{group1[sem][16].course_code}} / {{group1[sem][16].teacher_code}} / {{group1[sem][16].room_number}}{{ room_name[group1[sem][16].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-else-if="group1[sem][16].group===1 && row1[sem][16]===5" :colspan=group1[sem][16].end-group1[sem][16].start+1           >{{group1[sem][16].course_code}} / {{group1[sem][16].teacher_code}} / {{group1[sem][16].room_number}}{{ room_name[group1[sem][16].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	          v-else-if="row1[sem][16]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  	   v-if="group1[sem][17].group===0 && row1[sem][17]===5" :colspan=group1[sem][17].end-group1[sem][17].start+1 rowspan=2 >{{group1[sem][17].course_code}} / {{group1[sem][17].teacher_code}} / {{group1[sem][17].room_number}}{{ room_name[group1[sem][17].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-else-if="group1[sem][17].group===1 && row1[sem][17]===5" :colspan=group1[sem][17].end-group1[sem][17].start+1           >{{group1[sem][17].course_code}} / {{group1[sem][17].teacher_code}} / {{group1[sem][17].room_number}}{{ room_name[group1[sem][17].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	          v-else-if="row1[sem][17]===1" >&nbsp;</td>

											<td class="border-2 px-2 py-1"  style="text-align:center"  	   v-if="group1[sem][18].group===0 && row1[sem][18]===5" :colspan=group1[sem][18].end-group1[sem][18].start+1 rowspan=2 >{{group1[sem][18].course_code}} / {{group1[sem][18].teacher_code}} / {{group1[sem][18].room_number}}{{ room_name[group1[sem][18].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-else-if="group1[sem][18].group===1 && row1[sem][18]===5" :colspan=group1[sem][18].end-group1[sem][18].start+1           >{{group1[sem][18].course_code}} / {{group1[sem][18].teacher_code}} / {{group1[sem][18].room_number}}{{ room_name[group1[sem][18].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	          v-else-if="row1[sem][18]===1" >&nbsp;</td>
											
										</tr>
										<tr>
											
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-if="group2[sem][1].group===2 && row2[sem][1]===5" :colspan=group2[sem][1].end-group2[sem][1].start+1 >{{group2[sem][1].course_code}} / {{group2[sem][1].teacher_code}} / {{group2[sem][1].room_number}}{{ room_name[group2[sem][1].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	     v-else-if="row2[sem][1]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-if="group2[sem][2].group===2 && row2[sem][2]===5" :colspan=group2[sem][2].end-group2[sem][2].start+1 >{{group2[sem][2].course_code}} / {{group2[sem][2].teacher_code}} / {{group2[sem][2].room_number}}{{ room_name[group2[sem][2].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	     v-else-if="row2[sem][2]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-if="group2[sem][3].group===2 && row2[sem][3]===5" :colspan=group2[sem][3].end-group2[sem][3].start+1 >{{group2[sem][3].course_code}} / {{group2[sem][3].teacher_code}} / {{group2[sem][3].room_number}}{{ room_name[group2[sem][3].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	     v-else-if="row2[sem][3]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-if="group2[sem][4].group===2 && row2[sem][4]===5" :colspan=group2[sem][4].end-group2[sem][4].start+1 >{{group2[sem][4].course_code}} / {{group2[sem][4].teacher_code}} / {{group2[sem][4].room_number}}{{ room_name[group2[sem][4].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	     v-else-if="row2[sem][4]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-if="group2[sem][5].group===2 && row2[sem][5]===5" :colspan=group2[sem][5].end-group2[sem][5].start+1 >{{group2[sem][5].course_code}} / {{group2[sem][5].teacher_code}} / {{group2[sem][5].room_number}}{{ room_name[group2[sem][5].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	     v-else-if="row2[sem][5]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-if="group2[sem][6].group===2 && row2[sem][6]===5" :colspan=group2[sem][6].end-group2[sem][6].start+1 >{{group2[sem][6].course_code}} / {{group2[sem][6].teacher_code}} / {{group2[sem][6].room_number}}{{ room_name[group2[sem][6].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	     v-else-if="row2[sem][6]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-if="group2[sem][7].group===2 && row2[sem][7]===5" :colspan=group2[sem][7].end-group2[sem][7].start+1 >{{group2[sem][7].course_code}} / {{group2[sem][7].teacher_code}} / {{group2[sem][7].room_number}}{{ room_name[group2[sem][7].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	     v-else-if="row2[sem][7]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-if="group2[sem][8].group===2 && row2[sem][8]===5" :colspan=group2[sem][8].end-group2[sem][8].start+1 >{{group2[sem][8].course_code}} / {{group2[sem][8].teacher_code}} / {{group2[sem][8].room_number}}{{ room_name[group2[sem][8].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	     v-else-if="row2[sem][8]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-if="group2[sem][9].group===2 && row2[sem][9]===5" :colspan=group2[sem][9].end-group2[sem][9].start+1 >{{group2[sem][9].course_code}} / {{group2[sem][9].teacher_code}} / {{group2[sem][9].room_number}}{{ room_name[group2[sem][9].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	     v-else-if="row2[sem][9]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-if="group2[sem][10].group===2 && row2[sem][10]===5" :colspan=group2[sem][10].end-group2[sem][10].start+1 >{{group2[sem][10].course_code}} / {{group2[sem][10].teacher_code}} / {{group2[sem][10].room_number}}{{ room_name[group2[sem][10].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	     v-else-if="row2[sem][10]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-if="group2[sem][11].group===2 && row2[sem][11]===5" :colspan=group2[sem][11].end-group2[sem][11].start+1 >{{group2[sem][11].course_code}} / {{group2[sem][11].teacher_code}} / {{group2[sem][11].room_number}}{{ room_name[group2[sem][11].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	     v-else-if="row2[sem][11]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-if="group2[sem][12].group===2 && row2[sem][12]===5" :colspan=group2[sem][12].end-group2[sem][12].start+1 >{{group2[sem][12].course_code}} / {{group2[sem][12].teacher_code}} / {{group2[sem][12].room_number}}{{ room_name[group2[sem][12].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	     v-else-if="row2[sem][12]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-if="group2[sem][13].group===2 && row2[sem][13]===5" :colspan=group2[sem][13].end-group2[sem][13].start+1 >{{group2[sem][13].course_code}} / {{group2[sem][13].teacher_code}} / {{group2[sem][13].room_number}}{{ room_name[group2[sem][13].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	     v-else-if="row2[sem][13]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-if="group2[sem][14].group===2 && row2[sem][14]===5" :colspan=group2[sem][14].end-group2[sem][14].start+1 >{{group2[sem][14].course_code}} / {{group2[sem][14].teacher_code}} / {{group2[sem][14].room_number}}{{ room_name[group2[sem][14].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	     v-else-if="row2[sem][14]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-if="group2[sem][15].group===2 && row2[sem][15]===5" :colspan=group2[sem][15].end-group2[sem][15].start+1 >{{group2[sem][15].course_code}} / {{group2[sem][15].teacher_code}} / {{group2[sem][15].room_number}}{{ room_name[group2[sem][15].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	     v-else-if="row2[sem][15]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-if="group2[sem][16].group===2 && row2[sem][16]===5" :colspan=group2[sem][16].end-group2[sem][16].start+1 >{{group2[sem][16].course_code}} / {{group2[sem][16].teacher_code}} / {{group2[sem][16].room_number}}{{ room_name[group2[sem][16].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	     v-else-if="row2[sem][16]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-if="group2[sem][17].group===2 && row2[sem][17]===5" :colspan=group2[sem][17].end-group2[sem][17].start+1 >{{group2[sem][17].course_code}} / {{group2[sem][17].teacher_code}} / {{group2[sem][17].room_number}}{{ room_name[group2[sem][17].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	     v-else-if="row2[sem][17]===1" >&nbsp;</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  v-if="group2[sem][18].group===2 && row2[sem][18]===5" :colspan=group2[sem][18].end-group2[sem][18].start+1 >{{group2[sem][18].course_code}} / {{group2[sem][18].teacher_code}} / {{group2[sem][18].room_number}}{{ room_name[group2[sem][18].room_number] }}</td>
											<td class="border-2 px-2 py-1"  style="text-align:center"  				  	     v-else-if="row2[sem][18]===1" >&nbsp;</td>

										</tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
				
				
		
</template>

<script>
export default {
	data(){
		return {
			enrollments:[],
			group1:[],
			group2:[],
			row1:[],
			row2:[],
			day:"",
			dayspan:0,
			rooms:{},
			room_name:[],
		}
	},
	created(){
		let uri = `/api/print/${this.$route.params.session}/${this.$route.params.day}`;
		console.log(uri);
			this.axios.get(uri).then(response => {
				this.enrollments = response.data.data;
				console.log(this.enrollments);
				this.checkTd();
				this.checkRoomName();
				this.checkDay();
			});
			 uri = '/api/rooms';
			this.axios.get(uri).then(response => {
			this.rooms = response.data.data;
			

			});
	},
	methods:{
		checkTd(){
			//console.log(this.enrollments);
			for(var y in this.enrollments)
			{
				this.dayspan++;
				this.row1[y] = [];
				this.row2[y] = [];
				this.group1[y]=[];
				this.group2[y]=[];
				for(var tm=0;tm<20;tm++)
				{
					this.row1[y][tm] = 1;
					this.row2[y][tm] = 1;
					this.group1[y].push({});
					this.group2[y].push({});
				}
				for(var i =0;i<this.enrollments[y].length;i++)
				{
					//console.log(this.enrollments[y][i].course_code);
					
					var st=this.enrollments[y][i].start;
					
					var et=this.enrollments[y][i].end;
					var grp=this.enrollments[y][i].group;
					//console.log(st +" "+et+" "+grp);
					if(grp===0)
					{
						this.group1[y][st] = this.enrollments[y][i];
						this.row1[y][st]=5;
						this.row2[y][st]=0;
						for(var tm=st+1;tm<=et;tm++)
						{
							this.row1[y][tm]=0;
							this.row2[y][tm]=0
						}
						for(var tm=st;tm<=et;tm++)
						{
							//this.row2[y][tm]=0;
						}
					}
					else if(grp===1)
					{
						this.group1[y][st] = this.enrollments[y][i];
						this.row1[y][st]=5;
						for(var tm=st+1;tm<=et;tm++)
						{
							this.row1[y][tm]=0;
						}
					}
					else if(grp===2)
					{
						this.group2[y][st] = this.enrollments[y][i];
						this.row2[y][st]=5;
						for(var tm=st+1;tm<=et;tm++)
						{
							this.row2[y][tm]=0;
						}
					}
					
				}

			}
			console.log(this.row1);
			console.log(this.row2);
			console.log(this.group1);
			console.log(this.group2);
			
		},
		checkDay(){
			var dy = this.$route.params.day;
			if(dy==1) this.day="Saturday";
			else if(dy==2) this.day="Sunday";
			else if(dy==3) this.day="Monday";
			else if(dy==4) this.day="Tuesday";
			else if(dy==5) this.day="Wednesday";
			//console.log("day name = "+this.day);
		},
		checkRoomName(){
			for(var i=0;i<this.rooms.length;i++)
            {
				if(this.rooms[i].number==Number(this.rooms[i].name))
					this.room_name[this.rooms[i].number]="";
				else
					this.room_name[this.rooms[i].number]="-"+this.rooms[i].name;
				console.log(this.room_name[this.rooms[i].number]);
			}
			console.log("room name:");
			//console.log(this.room_name);
			for(var i=0;i<this.rooms.length;i++)
            {
				
				console.log(this.room_name[this.rooms[i].number]);
			}
		}
	}
}
</script>

<style>

</style>