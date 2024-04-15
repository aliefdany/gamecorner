<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book your console') }}
        </h2>
    </x-slot>

    <section class="min-w-96 py-12">
        <ul class="space-y-12">
            @foreach ($schedulesByConsole as $available_console)
                <li>
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <span>
                            {{ $available_console->name }}
                        </span>
                        -
                        <span>
                            {{ $available_console->console_available_id }}
                        </span>

                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <ul class="px-4 divide-y divide-dashed">
                                @foreach ($available_console->schedules as $sched)
                                    <li class="py-4 flex justify-between">
                                        <div>
                                            <span class="text-gray-900 dark:text-gray-100">
                                                {{ $sched->start }}-{{ $sched->end }}
                                            </span>
                                            <div @class([
                                                'text-red-700 border-red-700 bg-red-300' => $sched->status == 'ORDERED',
                                                'text-green-700 border-green-700 bg-green-300' =>
                                                    $sched->status == 'AVAILABLE',
                                                'font-semibold border-2 p-2 rounded-lg text-center text-sm',
                                            ])>
                                                {{ $sched->status }}
                                            </div>
                                        </div>
                                        <a @disabled($sched->status == 'ORDERED')
                                            tab-index="{{ $sched->status == 'ORDERED' ? -1 : 0 }}" class="block"
                                            href="{{ $sched->status == 'ORDERED' ? '#' : route('schedule.show', ['id' => $sched->id]) }}">
                                            <x-primary-button @class([
                                                'bg-gray-800/50 dark:bg-gray-200/50 hover:bg-gray-800/50 hover:dark:bg-gray-200/50 focus:bg-gray-800/50 focus:dark:bg-gray-200/50' =>
                                                    $sched->status == 'ORDERED',
                                                'h-full',
                                            ]) type="button">
                                                {{ __('Book') }}
                                            </x-primary-button>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>


    </section>
</x-app-layout>
