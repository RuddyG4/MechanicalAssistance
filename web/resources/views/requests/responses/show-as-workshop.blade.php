<x-workshop-layout>
    <div>
        <div class="px-4 sm:px-0 flex flex-col sm:flex-row gap-2 justify-between">
            <h3 class="text-base font-semibold leading-7 text-gray-900">Response to: <u>{{ $response->request->request_title }}</u></h3>
            <div class="flex flex-col sm:flex-row gap-2">
                <div class="flex">
                    <span class="mt-1 max-w-2xl font-semibold text-sm leading-7 text-gray-900">Response status: &nbsp;</span>
                    <span @class([ 'border inline-flex items-center gap-1 rounded-full px-6 py-1 text-xs font-semibold' , 'border-green-500 bg-green-50 text-green-600'=> $response->response_state == 'In comming',
                        'border-yellow-500 bg-yellow-50 text-yellow-600'=> $response->response_state == 'Waiting',
                        'border-blue-500 bg-blue-50 text-blue-600'=> $response->response_state == 'Accepted',
                        'border-gray-500 bg-gray-50 text-gray-600'=> $response->response_state == 'Completed'
                        ])>
                        {{ $response->response_state }}
                    </span>
                </div>
                <div class="flex gap-2">
                    @if ($response->response_state != 'Completed')
                    <form id="form-response" action="{{ route('workshops.responses.update', [session('workshop_id'), $response->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="px-3 md:px-4 py-1 md:py-2 border border-green-600 text-green-700 rounded-lg hover:border-green-900 hover:bg-green-50"><i class="fa-solid fa-right-long fa-md text-green-700"></i>&nbsp;&nbsp;Next</button>
                    </form>
                    @endif
                    <a class="px-3 md:px-4 py-1 md:py-2 border text-sm border-sky-600 text-sky-700 rounded-lg hover:border-sky-900 hover:bg-sky-50"><i class="fa-regular fa-user fa-md text-sky-700"></i> &nbsp;View customer</a>
                </div>
            </div>
        </div>
        <div class="flex flex-col sm:flex-row mt-6 border-t border-gray-100">
            <dl class="divide-y divide-gray-100 w-full">
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Response</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $response->response_description }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Date</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $response->created_at }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Aproximate solution time</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        {{ $response->aprox_solution_time }} minutes
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Aproximate arrival time</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $response->aprox_arrival_time }} minutes</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Pre-quote</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">BOB {{ $response->pre_quote_amount }}</dd>
                </div>
            </dl>
            @if ($response->response_state == 'In comming')
            <div class="sm:w-1/2 sm:mx-8 my-4">
                <form wire:submit.prevent="store" class="px-2">
                    <div class="space-y-6">
                        <div class="border-b border-gray-900/10 pb-6">
                            <div class="">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Create order</h2>
                                <p class="mt-1 text-sm leading-6 text-gray-600">Create an order and complete de job</p>
                            </div>

                            <div class="mt-4">
                                <div class="col-span-full">
                                    <label for="service_description" class="block text-sm font-medium leading-6 text-gray-900">Service description</label>
                                    <div class="mt-2">
                                        <textarea form="form-response" id="service_description" name="service_description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                    </div>
                                    @error('service_description')
                                    <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-span-full">
                                    <label for="service_price" class="block text-sm font-medium leading-6 text-gray-900">Service cost</label>
                                    <div class="mt-2">
                                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-full">
                                            <input form="form-response" type="number" name="service_price" autocomplete="off" id="service_price" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Service cost">
                                        </div>
                                        @error('service_price')
                                        <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-span-full">
                                    <label for="mechanic_id" class="block text-sm font-medium leading-6 text-gray-900">Mechanic</label>
                                    <div class="mt-2">
                                        <select form="form-response" id="mechanic_id" name="mechanic_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option value="-1">Select a mechanic</option>
                                            @foreach($mechanics as $mechanic)
                                            <option value="{{ $mechanic->id }}">{{ $mechanic->user->first_name . ' ' . $mechanic->user->last_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('mechanic_id')
                                    <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @endif
        </div>
    </div>
</x-workshop-layout>