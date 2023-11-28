<x-layout>
    <div>
        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">{{ $request->request_title }}</h3>
            <div class="flex justify-between">
                <span class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">{{ $request->request_description }}</span>
                <div>
                    <span class="mt-1 max-w-2xl font-semibold text-sm leading-7 text-gray-900">Request status: &nbsp;</span>
                    <span @class([ 'border inline-flex items-center gap-1 rounded-full px-2 py-1 text-xs font-semibold' , 'border-green-500 bg-green-50 text-green-600'=> $request->request_state == 'Open',
                        'border-yellow-500 bg-yellow-50 text-yellow-600'=> $request->request_state == 'Evaluating',
                        'border-blue-500 bg-blue-50 text-blue-600'=> $request->request_state == 'Assigned',
                        'border-gray-500 bg-gray-50 text-gray-600'=> $request->request_state == 'Closed'
                        ])>
                        {{ $request->request_state }}
                    </span>
                </div>
            </div>
        </div>

        {{ $request->id}}
        <div class="mt-6 border-t border-gray-100">
            <dl class="divide-y divide-gray-100">
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Vehicle</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $request->vehicle->model }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Date</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $request->created_at }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Location</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        <a href="https://maps.google.com/?q={{ $request->request_location}}" target="_blank"><u class="text-blue-500">https://maps.google.com/?q={{ $request->request_location }}</u></a>
                        {{--<iframe class="mt-6 h-96 w-1/2" style="border:0" Loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/place?q={{ $request->request_location }}&key={{ ENV('GOOGLE_MAPS_KEY')}}"></iframe>--}}
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Latitude</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $request->request_latitude }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Lontitude</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $request->request_longitude }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Responses</dt>
                    <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                            @if(count($request->responses) == 0)
                            <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                <div class="flex w-0 flex-1 items-center">
                                    <i class="fa-regular fa-circle-xmark fa-lg text-red-500"></i>
                                    <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                        <span class="truncate font-medium">No responses yet</span>
                                    </div>
                                </div>
                            </li>
                            @endif
                            @foreach($request->responses as $response)
                            <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                <div class="flex w-0 flex-1 items-center">
                                    <i class="fa-regular fa-building fa-lg text-gray-500"></i>
                                    <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                        <span class="truncate font-medium">{{ $response->workshop->workshop_name }}</span>
                                        <span class="flex-shrink-0 text-gray-400">- {{ $response->aprox_solution_time }} minutes to solve</span>
                                        <div>
                                            @if($response->response_state == 'Accepted')
                                            <i class="fa-solid fa-circle-check text-green-500 fa-lg"></i>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <a href="{{ route('responses.show', $response->id) }}" class="font-medium text-indigo-600 hover:text-indigo-500">View response</a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Multimedia</dt>
                    <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <div class="mx-auto max-w-2xl px-4 py-4 sm:px-6 sm:py-6 lg:max-w-7xl lg:px-8">

                            <div class="grid grid-cols-1 gap-x-4 gap-y-10 sm:grid-cols-2 xl:gap-x-8">
                                @foreach($request->multimedia as $media)
                                @if($media->multimedia_type == 'image')
                                <div class="group relative">
                                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-90 lg:h-80">
                                        <img src="{{ Storage::url($media->multimedia_path) }}" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                    </div>
                                    <div class="mt-4 text-center">
                                        <p class="mt-1 text-sm text-gray-500">{{ $media->multimedia_description }}</p>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</x-layout>