<div>
    <button type="button" wire:click="respondRequest({{ $request->id }})" @disabled($request->responses_exists) class="{{ $request->responses_exists ? 'cursor-not-allowed' : 'cursor-pointer' }} middle none center mr-3 flex items-center justify-center rounded-lg text-blue-500 border border-blue-500 p-3 font-sans text-xs font-bold uppercase text-blue-border-blue-500 transition-all hover:opacity-75 focus:ring focus:ring-blue-200 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" data-ripple-dark="true">
        <i class="fa-solid fa-reply"></i>
    </button>

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
                                                        <label for="response_description" class="block text-sm font-medium leading-6 text-gray-900">Response Description</label>
                                                        <div class="mt-2">
                                                            <textarea id="response_description" wire:model="response_description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                                        </div>
                                                        @error('response_description')
                                                        <span class="text-red-500">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-span-full mt-4">
                                                        <label for="aprox_solution_time" class="block text-sm font-medium leading-6 text-gray-900">Time to Solve (approx)</label>
                                                        <div class="mt-2">
                                                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-full">
                                                                <input type="number" step="1" wire:model="aprox_solution_time" autocomplete="off" id="aprox_solution_time" autocomplete="aprox_solution_time" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Time to solve in minutes">
                                                            </div>
                                                            @error('aprox_solution_time')
                                                            <span class="text-red-500">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-span-full mt-4">
                                                        <label for="aprox_arrival_time" class="block text-sm font-medium leading-6 text-gray-900">Arrival time (approx)</label>
                                                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-full">
                                                            <input type="number" step="1" wire:model="aprox_arrival_time" autocomplete="off" id="aprox_arrival_time" autocomplete="aprox_arrival_time" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Time to arrive in minutes">
                                                        </div>
                                                        @error('aprox_arrival_time')
                                                        <span class="text-red-500">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-span-full mt-4">
                                                        <label for="pre_quote_amount" class="block text-sm font-medium leading-6 text-gray-900">Pre quote (subject to change)</label>
                                                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-full">
                                                            <input type="number" step="1" wire:model="pre_quote_amount" autocomplete="off" id="pre_quote_amount" autocomplete="pre_quote_amount" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Time to arrive in minutes">
                                                        </div>
                                                        @error('pre_quote_amount')
                                                        <span class="text-red-500">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-100 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="submit" form="response-form" wire:loading.attr="disabled" wire:loading.class="cursor-not-allowed opacity-50" class="inline-flex w-full justify-center rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-600 sm:ml-3 sm:w-auto">Send response</button>
                        <button type="button" wire:click="$toggle('showModal')" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>