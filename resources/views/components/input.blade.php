@props([
    'disabled' => false,
    'label' => null,
    'name' => null,
    'textarea' => false,
])

@if (!$label)
    <input name="{{ $name }}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'input input-bordered']) !!}>

@elseif($textarea)
    <div class="form-control">
        <label class="label">
            <span class="label-text">{{ $label }}</span>
        </label>
        <textarea name="{{ $name }}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'textarea h-24 textarea-bordered']) !!}>
            {!! $attributes['value'] ?? ($attributes['placeholder'] ?? null) !!}
        </textarea>

        @error($name)
            <span class="text-error text-sm">{{ $message }}</span>
        @enderror
    </div>
@else
    <div class="form-control">
        <label class="label">
            <span class="label-text">{{ $label }}</span>
        </label>
        <input name="{{ $name }}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'input input-bordered']) !!}>

        @error($name)
            <span class="text-error text-sm">{{ $message }}</span>
        @enderror
    </div>
@endif
