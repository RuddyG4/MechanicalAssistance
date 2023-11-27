<!-- component -->
<div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
    <div class="px-6 py-4 text-gray-900">
        <div class="flex items-center gap-x-3">
            <h2 class="text-lg font-medium">Open Requests</h2>

            <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full">{{ $requests->count() }} requests</span>
        </div>

        <p class="mt-1 text-sm">These are the open requests, you can respond to them.</p>
    </div>
    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Request title</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Request description</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Link to geolocation</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Datetime</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            @foreach ($requests as $request)
            <tr class="hover:bg-gray-50">
                <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                    <div class="text-sm">
                        <div class="font-medium text-gray-700">{{ $request->request_title }}</div>
                        <div class="text-gray-400">{{ $request->customer->user->email }}</div>
                    </div>
                </th>
                <td class="px-6 py-4">
                    <div class="text-sm">
                        <div class="text-gray-600">{{ $request->request_description }}</div>
                    </div>
                    <!-- <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                        <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                        Active
                    </span> -->
                </td>
                <td class="px-6 py-4">
                    <a href="https://maps.google.com/?q={{ $request->request_location}}" target="_blank"><u class="text-blue-500">https://maps.google.com/?q={{ $request->request_location }}</u></a>
                </td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <div class="text-gray-600">{{ $request->created_at }}</div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex justify-end gap-4">
                        <a href="{{ url('requests/' . $request->id) }}" class="cursor-pointer middle none center mr-3 flex items-center justify-center rounded-lg text-blue-500 border border-blue-500 p-3 font-sans text-xs font-bold uppercase text-blue-border-blue-500 transition-all hover:opacity-75 focus:ring focus:ring-blue-200 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" data-ripple-dark="true">
                            <i class="fa-regular fa-eye fa-lg"></i>
                        </a>
                        <button type="button" wire:click="respondRequest({{ $request->id }})" class="cursor-pointer middle none center mr-3 flex items-center justify-center rounded-lg text-blue-500 border border-blue-500 p-3 font-sans text-xs font-bold uppercase text-blue-border-blue-500 transition-all hover:opacity-75 focus:ring focus:ring-blue-200 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" data-ripple-dark="true">
                            <i class="fa-solid fa-reply"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    @if($showModal)
    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="">
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Respond to Request</h3>
                                <div class="mt-2">

                                    <form id="response-form" wire:submit.prevent="sendResponse" class="px-2">
                                        <div class="space-y-6">
                                            <div class="border-b border-gray-900/10 pb-6">
                                                <div class="mt-6">
                                                    <div class="col-span-full">
                                                        <label for="request_description" class="block text-sm font-medium leading-6 text-gray-900">Response Description</label>
                                                        <div class="mt-2">
                                                            <textarea id="request_description" wire:model="request_description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                                        </div>
                                                        @error('request_description')
                                                        <span class="text-red-500">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    
                                                    <div class="col-span-full">
                                                        <label for="aprox_solution_time" class="block text-sm font-medium leading-6 text-gray-900">Time to Solve (in minutes, approx)</label>
                                                        <div class="mt-2">
                                                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-full">
                                                                <input type="text" wire:model="aprox_solution_time" id="aprox_solution_time" autocomplete="aprox_solution_time" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Title">
                                                            </div>
                                                            @error('aprox_solution_time')
                                                            <span class="text-red-500">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-span-full">
                                                        <label for="aprox_arrival_time" class="block text-sm font-medium leading-6 text-gray-900">Arrival time (in minutes, approx)</label>
                                                        <div class="mt-2">
                                                            <textarea id="aprox_arrival_time" wire:model="aprox_arrival_time" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                                        </div>
                                                        @error('aprox_arrival_time')
                                                        <span class="text-red-500">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    @if($mechanics)
                                                    <div class="col-span-full">
                                                        <label for="vehicle_id" class="block text-sm font-medium leading-6 text-gray-900">Mechanics to assist</label>
                                                        <div class="mt-2">
                                                            <select id="vehicle_id" wire:model="vehicle_id" autocomplete="vehicle_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                                <option>Select a mechanic to add</option>
                                                                @foreach($mechanics as $mechanic)
                                                                <option value="{{ $mechanic->id }}">{{ $mechanic->user->first_name . ' (' . $mechanic->user->last_name . ')'}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('mechanic_id')
                                                        <span class="text-red-500">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-100 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="submit" form="response-form" wire:loading.attr="disabled" wire:loading.class="cursor-not-allowed opacity-50" class="inline-flex w-full justify-center rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-600 sm:ml-3 sm:w-auto">Deactivate</button>
                        <button type="button" wire:click="$toggle('showModal')" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>