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


                        <x-primary-button class="ms-3">
                            {{ __('Book Now') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
