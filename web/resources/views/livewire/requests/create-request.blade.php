<div class="w-full lg:w-1/2 border lg:py-4 lg:px-4">
    @if(session()->has('request created'))
    <div class="relative w-full p-4 text-white rounded-lg bg-lime-500">{{ session('request created') }}</div>
    @endif
    <!-- This example requires some changes to your config:
                ```
                // tailwind.config.js
                module.exports = {
                    // ...
                    plugins: [
                        // ...
                        require('@tailwindcss/forms'),
                    ,
                }
                ``` -->
    <form wire:submit.prevent="store" class="px-2">
        <div class="space-y-6">
            <div class="border-b border-gray-900/10 pb-6">
                <div class="grid place-items-center">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">New Request</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Create a new request for get assistance</p>
                </div>

                <div class="mt-6">
                    <div class="col-span-full">
                        <label for="request_title" class="block text-sm font-medium leading-6 text-gray-900">Request title</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-full">
                                <input type="text" wire:model="request_title" id="request_title" autocomplete="request_title" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Title">
                            </div>
                            @error('request_title')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="request_description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                        <div class="mt-2">
                            <textarea id="request_description" wire:model="request_description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                        </div>
                        <p class="mt-3 text-sm leading-6 text-gray-600">Describe the problems you have.</p>
                        @error('request_description')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-full">
                        <label for="vehicle_id" class="block text-sm font-medium leading-6 text-gray-900">Vehicle - Model (Plate)</label>
                        <div class="mt-2">
                            <select id="vehicle_id" wire:model="vehicle_id" autocomplete="vehicle_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option>Select a vehicle</option>
                                @foreach($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}">{{ $vehicle->model . ' (' . $vehicle->plate . ')'}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('vehicle_id')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-full">
                        <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Upload multimedia content</label>
                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                </svg>
                                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                    <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="file-upload" wire:model="files" type="file" multiple class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>
                    </div>
                    @foreach ($files as $key => $file)
                    @if ( in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'gif']))
                    <div class="divide-y">
                        <div class="mt-4 w-full flex items-center gap-4">
                            <img src="{{ $file->temporaryUrl() }}" class="w-14 h-14 rounded">
                            <div class="w-full">
                                <p>{{ $file->getClientOriginalName() }}</p>
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-full">
                                    <input type="text" wire:model.live="file_descriptions.{{ $key }}" id="file_descriptions.{{ $key }}" autocomplete="off" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="file_descriptions">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>

            <div class="border-b border-gray-900/10 pb-6">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Location</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">We need to get your location to provide you assistance.</p>

                <div class="mt-5 space-y-10">
                    <fieldset>
                        <div class="mt-2 space-y-6">
                            <div class="relative flex gap-x-3">
                                <div class="flex h-6 items-center">
                                    <input id="request_location" wire:model.live="request_location" wire:click="requestGeolocation" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                </div>
                                <div class="text-sm leading-6">
                                    <label for="request_location" class="font-medium text-gray-900">Send my location</label>
                                    <p class="text-gray-500">By clicking here, you accept to send your current location</p>
                                </div>
                                @error('request_location')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>

        <div class="my-4 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <button type="submit" @if(!$request_location) disabled style="opacity: 0.5" @endif wire:loading.attr="disabled" wire:loading.class="cursor-not-allowed opacity-50" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Send request</button>
        </div>
    </form>

</div>
@push('scripts')
<script>
    let geolocation = "";

    function obtenerUbicacion() {
        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var latitud = position.coords.latitude;
                var longitud = position.coords.longitude;
                geolocation = latitud + "," + longitud;

                @this.dispatch('geolocationChanged', {
                    geolocation: geolocation,
                    latitude: latitud,
                    longitude: longitud
                });
            }, function(error) {
                // Manejar errores
                switch (error.code) {
                    case error.PERMISSION_DENIED:
                        alert("El usuario denegó la solicitud de geolocalización.");
                        break;
                    case error.POSITION_UNAVAILABLE:
                        alert("La información de ubicación no está disponible.");
                        break;
                    case error.TIMEOUT:
                        alert("La solicitud para obtener la ubicación del usuario ha caducado.");
                        break;
                    case error.UNKNOWN_ERROR:
                        alert("Ocurrió un error desconocido al obtener la ubicación.");
                        break;
                }
            });
        } else {
            alert("La geolocalización no es compatible con este navegador.");
        }
    }

    document.addEventListener('livewire:initialized', () => {
        obtenerUbicacion();
        @this.on('request-geolocation', (event) => {
            obtenerUbicacion();
       });
    });
</script>
@endpush