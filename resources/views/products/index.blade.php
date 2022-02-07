<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="card max-w-7xl mx-auto bg-white">
            <div class="card-body">
                <div class="flex justify-between">
                    <span class="card-title">List product</span>
                    <x-button href="{{ route('admin.products.create') }}">New Product</x-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
