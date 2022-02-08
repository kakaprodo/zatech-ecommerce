<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Purchases') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="card max-w-7xl mx-auto bg-white">
            <div class="card-body">
                <div class="flex justify-between mb-5">
                    <span class="card-title">Purchases list: {{ $purchases->total() }}</span>
                </div>
                <div class="grid grid-cols-4 gap-5">
                    @foreach ($purchases as $purchase)
                        <div class="card card-bordered shadow-md">
                            <figure>
                                <img src="{{ $purchase->product->image }}" class="h-56">
                            </figure>
                            <div class="card-body p-3">
                                <h2 class="card-title">{{ $purchase->product->name }}</h2>
                                <p>Price: {{ $purchase->price }}$</p>
                                <p>Quantity: {{ $purchase->quantity }}</p>
                                <p>Discount: {{ $purchase->discount }}% </p>
                                <p>Discount amount:{{ $purchase->discount_amount }}$</p>
                                <p>Total: {{ $purchase->total }}$</p>
                                <p>created on: {{ $purchase->created_at }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="my-10">
                    {!! $purchases->render() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
