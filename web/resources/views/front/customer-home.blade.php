<x-layout>
    <section class="p-2 lg:p-8 flex flex-col lg:flex-row gap-8 justify-center rounded border">
        <livewire:requests.create-request />
        <div class="overflow-auto w-full lg:w-1/2 border">
            <div class="grid place-items-center mt-4">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Latest Requests</h2>
            </div>
            <!-- component -->
            <div class="rounded-lg border border-gray-200 shadow-md m-5">
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Title</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Car</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Date</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Status</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                        @foreach($requests as $request)
                        <tr class="hover:bg-gray-50">
                            <th class="flex gap-3 p-4 font-normal text-gray-900">
                                <!-- <div class="relative h-10 w-10">
                                        <img class="h-full w-full rounded-full object-cover object-center" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                                        <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                                    </div> -->
                                <div class="text-sm">
                                    <div class="font-medium text-gray-700">{{ $request->request_title }}</div>
                                    <div class="text-gray-400">{{ $request->request_description }}</div>
                                </div>
                            </th>
                            <td class="px-2 py-4">
                                <div class="font-medium text-gray-700">{{ $request->vehicle->model }}</div>
                                <!-- <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                                        <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                                        Active
                                    </span> -->
                            </td>
                            <td class="px-2 py-4">
                                <div class="font-medium text-gray-700">{{ $request->created_at->format('d-m-Y') }}</div>
                            </td>
                            <td class="px-2 py-4">
                                <div class="flex gap-2">
                                    <span @class([ 'border inline-flex items-center gap-1 rounded-full px-2 py-1 text-xs font-semibold' , 'border-green-500 bg-green-50 text-green-600'=> $request->request_state == 'Open',
                                        'border-yellow-500 bg-yellow-50 text-yellow-600'=> $request->request_state == 'Evaluating',
                                        'border-blue-500 bg-blue-50 text-blue-600'=> $request->request_state == 'Assigned',
                                        'border-gray-500 bg-gray-50 text-gray-600'=> $request->request_state == 'Closed'
                                        ])>
                                        {{ $request->request_state }}
                                    </span>
                                    <!-- <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">
                                            Design
                                        </span> -->
                                </div>
                            </td>
                            <td class="px-2 py-4">
                                <div class="flex justify-end gap-4">
                                    <a href="{{ url('requests/' . $request->id) }}" class="cursor-pointer middle none center mr-3 flex items-center justify-center rounded-lg text-blue-500 border border-blue-500 p-3 font-sans text-xs font-bold uppercase text-blue-border-blue-500 transition-all hover:opacity-75 focus:ring focus:ring-blue-200 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" data-ripple-dark="true">
                                        <i class="fa-regular fa-eye fa-lg"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-layout>