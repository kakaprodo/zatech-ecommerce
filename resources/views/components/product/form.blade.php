<x-input label="Product Name" placeholder="Provide product name" name="name" value="{{ old('name') }}" />

<x-input label="Product Price" placeholder="Provide product price" name="price" value="{{ old('price') }}"
    type="number" />

<div>
    <label class="label">
        <span class="label-text">Add Discount</span>
    </label>
    <select class="select select-bordered w-full max-w-full" name="discount_id">
        <option disabled="disabled" selected="selected">Choose your discount</option>

        @foreach ($discounts as $discount)
            <option value="{{ $discount->id }}" {!! old('discount_id') == $discount->id ? 'selected' : '' !!}>{{ $discount->description }}
            </option>
        @endforeach

    </select>
    @error('discount_id')
        <span class="text-error text-sm">{{ $message }}</span>
    @enderror
</div>


<x-button>Create</x-button>
