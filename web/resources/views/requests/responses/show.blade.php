<x-layout>
    <div>
        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">Response to: <u>{{ $response->request->request_title }}</u></h3>
            <div class="flex justify-between">
                <span class="mt-1 max-w-2xl text-sm leading-6 text-gray-900">
                    {{ $response->workshop->workshop_name . ' - ' . $response->workshop->workshop_address }} &nbsp;&nbsp;
                    @for($i = 0; $i < 5; $i++) @if ($i < $response->workshop->workshop_rating)
                        <i class="fa-solid fa-star text-yellow-500"></i>
                        @else
                        <i class="fa-regular fa-star text-yellow-500"></i>
                        @endif
                        @endfor
                </span>
                <div>
                    @if ($response->request->request_state == 'Open')
                    <form action="{{ route('acceptResponse', $response->id) }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" @disabled($response->request->request_state != 'Open') @class(["px-3 md:px-4 py-1 md:py-2 border border-green-600 text-green-700 rounded-lg hover:border-green-900 hover:bg-green-50"])><i class="fa-solid fa-check"></i> &nbsp;accept response</button>
                    </form>
                    @endif
                    <a class="px-3 md:px-4 py-1 md:py-2 border border-sky-600 text-sky-700 rounded-lg hover:border-sky-900 hover:bg-sky-50"><i class="fa-regular fa-building fa-lg text-sky-700"></i> &nbsp;View workshop</a>
                </div>
            </div>
        </div>
        <div class="mt-6 border-t border-gray-100">
            <dl class="divide-y divide-gray-100">
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
        </div>
    </div>
</x-layout>