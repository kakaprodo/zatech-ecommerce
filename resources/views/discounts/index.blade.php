<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All discounts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="card max-w-7xl mx-auto bg-white">
            <div class="card-body">
                <div class="flex justify-between mb-5">
                    <span class="card-title">Discounts list: {{ $discounts->count() }}</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="table w-full table-zebra">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Value</th>
                                <th>Minimum price</th>
                                <th>Maximum price</th>
                                <th>Rule</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($discounts as $discount)
                                <tr>
                                    <td>{{ $discount->description }}</td>
                                    <td>{{ $discount->value }}</td>
                                    <td>{{ $discount->min_price }}</td>
                                    <td>{{ $discount->max_price }}</td>
                                    <td>{{ $discount->rule }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
