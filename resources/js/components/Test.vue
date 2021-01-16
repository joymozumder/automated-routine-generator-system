<template>
    <main class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
			 <div id='recipients' class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
			 
				
				<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
					<thead>
						<tr>
							<th data-priority="1">ID</th>
							<th data-priority="2">Course Code</th>
							<th data-priority="3">Course Name</th>
							<th data-priority="4">Credit</th>
							<th data-priority="5">Type</th>
							<th data-priority="6">status</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Tiger Nixon</td>
							<td>System Architect</td>
							<td>Edinburgh</td>
							<td>61</td>
							<td>2011/04/25</td>
							<td class="border px-4 py-2">
                                                <i class="fas fa-times text-red-500 mx-2"></i>
                                        </td>
						</tr>
						
						<!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->
						
						<tr>
							<td>Donna Snider</td>
							<td>Customer Support</td>
							<td>New York</td>
							<td>27</td>
							<td>2011/01/25</td>
							<td class="border px-4 py-2">
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                        <i class="fas fa-eye"></i></a>
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                        <i class="fas fa-edit"></i></a>
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500">
                                                        <i class="fas fa-trash"></i>
                                                </a>
                            </td>
						</tr>

                        

                       


                   

                       

                       

					</tbody>
					
				</table>
				
				
			</div>
        </main>
			
</template>