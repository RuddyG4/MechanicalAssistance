<x-workshop-layout :workshop="$workshop">
    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-md m-2">
        <div class="px-6 py-4 text-gray-900">
            <div class="flex items-center gap-x-3">
                <h2 class="text-lg font-medium">Accepted Requests</h2>
                @php $requestsCount = $requests->count() @endphp

                <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full">{{ $requestsCount }} requests</span>
            </div>

            <p class="mt-1 text-sm">These are the accepted requests, you can update the responses.</p>
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
                @if($requestsCount == 0)
                <tr class="text-center">
                    <td colspan="5" class="px-6 py-12">there are no requests accepted yet.</td>
                </tr>
                @endif
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
                            <a href="{{ route('requests.showAsWorkshop', $request->id) }}" class="cursor-pointer middle none center mr-3 flex items-center justify-center rounded-lg text-blue-500 border border-blue-500 p-3 font-sans text-xs font-bold uppercase text-blue-border-blue-500 transition-all hover:opacity-75 focus:ring focus:ring-blue-200 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" data-ripple-dark="true">
                                <i class="fa-regular fa-eye fa-lg"></i>
                            </a>
                            <a href="{{ route('workshops.responses.show', [session('workshop_id'), $request->acceptedResponse->id]) }}" class="cursor-pointer middle none center mr-3 flex items-center justify-center rounded-lg text-blue-500 border border-blue-500 p-3 font-sans whitespace-nowrap text-xs font-bold text-blue-border-blue-500 transition-all hover:opacity-75 focus:ring focus:ring-blue-200 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" data-ripple-dark="true">
                                <i class="fa-regular fa-clipboard fa-lg"></i> &nbsp;&nbsp;&nbsp;View response
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-workshop-layout>