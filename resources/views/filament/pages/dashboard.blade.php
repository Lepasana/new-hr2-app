<x-filament-panels::page>
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
        <div class="p-4 bg-white rounded shadow">
            <h2 class="text-lg font-semibold">Total Users</h2>
            <p class="text-2xl">{{ $totalUsers }}</p>
        </div>

        <div class="p-4 bg-white rounded shadow">
            <h2 class="text-lg font-semibold">Total Orders</h2>
            <p class="text-2xl">50</p>
        </div>

        <div class="p-4 bg-white rounded shadow">
            <h2 class="text-lg font-semibold">Total Revenue</h2>
            <p class="text-2xl">50</p>
        </div>
        <!-- Add more cards or metrics as needed -->
    </div>
</x-filament-panels::page>
