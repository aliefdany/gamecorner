<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book your console') }}
        </h2>
    </x-slot>

    <section class="min-w-96 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form method="post" action="{{ route('order.store') }}" class="p-6">
                    @csrf
                    @method('post')

                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Do you want to book this schedule?') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>

                    <div class="mt-6">
                        <x-input-label for="controller_amount" value="{{ __('Controller Amount') }}" class="sr-only" />

                        <x-text-input id="controller_amount" name="controller_amount" type="number"
                            class="mt-1 block w-3/4" value="1"
                            placeholder="{{ __('How many controller you need?') }}" />

                        <x-input-error :messages="$errors->get('controller_amount')" class="mt-2" />


                        <x-text-input id="console_available_id" name="console_available_id" type="hidden"
                            value="{{ $schedule->console_available_id }}" />

                        <x-text-input id="schedule_id" name="schedule_id" type="hidden" value="{{ $schedule->id }}" />
                    </div>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Cancel') }}
                        </x-secondary-button>


                         <x-primary-button type="button" id="book-now-button" class="ms-3">
                            {{ __('Book Now') }}
                        </x-primary-button>

<!-- Dialog kotak -->
<div id="success-dialog" class="hidden fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Overlay latar belakang semitransparan -->
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-30"></div>
        </div>
    
        <!-- Konten dialog -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <!-- Logo centang hijau -->
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                        <!-- Heroicon name: check -->
                        <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg font-medium text-gray-900" id="modal-title">
                            BOOKED!
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Jangan lupa bawa KTM mu dan datang sesuai waktunya yaa!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" id="close-button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                    OK
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('book-now-button').addEventListener('click', function () {
        // Menampilkan dialog kotak
        document.getElementById('success-dialog').classList.remove('hidden');
    });

    // Tombol OK pada dialog
    document.getElementById('close-button').addEventListener('click', function () {
        // Menutup dialog kotak
        document.getElementById('success-dialog').classList.add('hidden');
    });
</script>

                        
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
