<x-app-layout>
    <div class="flex-none mb-[50vh]"></div>
    <h1 class="font-semibold text-2xl">Web Pemesanan Jadwal GameCorner</h1>
    <div class="flex-none mb-4"></div>
    <section class="flex-none min-w-96">
        <ul class="space-y-4">
            @foreach ($bookingLists as $available_console)
                <li>
                    <div>
                        <span>
                            {{ $available_console->name }}
                        </span>
                        -
                        <span>
                            {{ $available_console->console_available_id }}
                        </span>
                        <ul class="border-2 border-black space-y-4 p-4">
                            @foreach ($available_console->schedules as $sched)
                                <li class="flex justify-between">
                                    <div>
                                        <span>
                                            {{ $sched->start }}-{{ $sched->end }}
                                        </span>
                                        <div>
                                            {{ $sched->status }}
                                        </div>
                                    </div>
                                    <x-primary-button x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'book-schedule')">{{ __('Book') }}</x-primary-button>


                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endforeach
        </ul>

        <x-modal name="book-schedule" focusable>
            {{ __('Hello World') }}
        </x-modal>
    </section>
</x-app-layout>
