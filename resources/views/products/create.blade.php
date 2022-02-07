<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="card max-w-xl mx-auto bg-white">
            <div class="card-body">
                <span class="card-title">Create a product</span>

                <form class="space-y-5" action="{{ route('admin.products.store') }}" method="post">
                    @csrf
                    <x-product.form />
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
