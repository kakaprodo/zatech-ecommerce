@props(['product' => null])

<x-input label="Product Name" placeholder="Provide product name" name="name"
    value="{{ old('name', optional($product)->name) }}" />

<x-input label="Product Price" placeholder="Provide product price" name="price"
    value="{{ old('price', optional($product)->price) }}" type="number" />


<x-button>{{ $product ? 'Save changes' : 'Create' }}</x-button>
