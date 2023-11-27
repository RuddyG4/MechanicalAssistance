<x-layout>
    <div>
        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">{{ $request->request_title }}</h3>
            <div class="flex justify-between">
                <span class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">{{ $request->request_description }}</span>
                <div>
                    <span class="mt-1 max-w-2xl font-semibold text-sm leading-7 text-gray-900">Request status: &nbsp;</span>
                    <span class="border border-green-500 inline-flex items-center gap-1 rounded bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                        {{ $request->request_state }}
                    </span>
                </div>
            </div>
        </div>
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
                            <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                <div class="flex w-0 flex-1 items-center">
                                    <i class="fa-regular fa-building fa-lg text-gray-500"></i>
                                    <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                        <span class="truncate font-medium">Nombre del taller</span>
                                        <span class="flex-shrink-0 text-gray-400">- Ubicación</span>
                                    </div>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">View workshop</a>
                                </div>
                            </li>
                            <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                <div class="flex w-0 flex-1 items-center">
                                    <i class="fa-regular fa-building fa-lg text-gray-500"></i>
                                    <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                        <span class="truncate font-medium">Nombre del taller</span>
                                        <span class="flex-shrink-0 text-gray-400">- Ubicación</span>
                                    </div>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">View workshop</a>
                                </div>
                            </li>
                            <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                <div class="flex w-0 flex-1 items-center">
                                    <i class="fa-regular fa-building fa-lg text-gray-500"></i>
                                    <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                        <span class="truncate font-medium">Nombre del taller</span>
                                        <span class="flex-shrink-0 text-gray-400">- Ubicación</span>
                                    </div>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">View workshop</a>
                                </div>
                            </li>

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