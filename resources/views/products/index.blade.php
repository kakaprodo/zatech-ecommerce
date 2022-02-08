<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="card max-w-7xl mx-auto bg-white">
            <div class="card-body">
                <div class="flex justify-between mb-5">
                    <span class="card-title">Products list: {{ $products->total() }}</span>
                    <x-button href="{{ route('admin.products.create') }}">New Product</x-button>
                </div>
                <div class="grid grid-cols-4 gap-5">
                    @foreach ($products as $product)
                        <div class="card card-bordered shadow-sm">
                            <figure>
                                <img src="https://picsum.photos/id/1005/400/250">
                            </figure>
                            <div class="card-body">
                                <h2 class="card-title">{{ $product->name }}</h2>
                                <p>{{ $product->price }}$</p>
                                <p>{{ $product->getDiscount() }}% of discount</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="my-10">
                    {!! $products->render() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
