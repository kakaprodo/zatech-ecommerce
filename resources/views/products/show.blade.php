<x-app-layout>

    <div class="py-12">
        <div class="card max-w-xl mx-auto bg-white">
            <div class="card-body">
                <div class="flex justify-between">
                    <span class="card-title">Product details</span>
                    <form method="POST" action="{{ route('admin.products.destroy', $product) }}">
                        @csrf
                        @method('DELETE')
                        <x-button color="error" class="btn-sm">Delete</x-button>
                    </form>
                </div>
                <div class="flex flex-col place-items-center">
                    <img src="{{ $product->image }}" alt="" class="h-32 w-32 rounded-md">
                    <p>{{ $product->name }} {{ $product->price }}$</p>
                </div>

                <div class="divider">Edit form</div>
                <form class="space-y-5" action="{{ route('admin.products.update', $product) }}" method="post">
                    @csrf
                    @method('PUT')
                    <x-product.form :product="$product" />
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
