<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>


    <section class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="text-xl font-semibold mb-4">Riwayat Pemesanan</h3>
            <x-data-table :columns="[
                [
                    'name' => 'Status',
                    'field' => 'status',
                ],
                [
                    'name' => 'Jumlah Controller',
                    'field' => 'controller_amount',
                ],
                [
                    'name' => 'Nomor Konsol',
                    'field' => 'console_available_id',
                ],
                [
                    'name' => 'Nama Konsol',
                    'field' => 'name',
                ],
                [
                    'name' => 'Tanggal',
                    'field' => 'date',
                ],
                [
                    'name' => 'Jam Mulai',
                    'field' => 'start',
                ],
                [
                    'name' => 'Jam Berakhir',
                    'field' => 'end',
                ],
            ]" :rows="$orderHistory" />
        </div>
    </section>
</x-app-layout>
