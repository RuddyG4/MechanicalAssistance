<x-layout>
    <!-- component -->
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-xl border-2 border-gray-400 overflow-hidden md:max-w-2xl m-5">
        <div class="md:flex">
            <div class="md:flex-shrink-0">
                <img class="h-48 w-full object-cover md:w-48" src="{{ asset('assets/img/taller.jpg') }}" alt="Event image">
            </div>
            <div class="p-8">
                <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">{{ $workshop->workshop_name }}</div>
                <p class="block mt-1 text-lg leading-tight font-medium text-black">{{ $workshop->workshop_address }}</p>
                <p class="mt-2 text-gray-500">
                    Rating : &nbsp;
                    <span class="mt-1 max-w-2xl text-sm leading-6 text-gray-900">
                        @for($i = 0; $i < 5; $i++) @if ($i < $workshop->workshop_rating)
                            <i class="fa-solid fa-star text-yellow-500"></i>
                            @else
                            <i class="fa-regular fa-star text-yellow-500"></i>
                            @endif
                            @endfor
                    </span>
                </p>
            </div>
        </div>
    </div>

    @foreach ($workshop->mechanics as $mechanic)
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl m-3">
        <div class="md:flex">
            <div class="md:flex-shrink-0">
                <img class="h-48 w-full object-cover md:w-48" src="{{ $mechanic->user->profile_photo_path != null ? $mechanic->user->profile_photo_path : 'https://i.pravatar.cc/300' }}" alt="Doctor's image">
            </div>
            <div class="p-8">
                <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Ing. {{ $mechanic->user->first_name }}</div>
                <p class="block mt-1 text-lg leading-tight font-medium text-black">Specialty: {{ $mechanic->speciality }}</p>
                <p class="mt-2 text-gray-500">Available Time Slots:</p>
                <ul class="list-disc unlisted list-inside flex gap-3">
                    <li>10:00 - 11:00</li>
                    <li>13:00 - 14:00</li>
                    <li>16:00 - 17:00</li>
                </ul>
                <button class="mt-5 px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Book Appointment
                </button>
            </div>
        </div>
    </div>
    @endforeach


    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl m-5">
        <div class="p-8">
            <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Leave your comments</div>
            <p class="block mt-1 text-lg leading-tight font-medium text-black">What do you think about us?</p>
            <input type="text" class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2" placeholder="Write a comment...">
            <p class="mt-2 text-gray-500">have a nice day!!</p>
        </div>
    </div>
</x-layout>