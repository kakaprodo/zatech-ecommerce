@props([
    'color' => 'primary',
    'href' => null,
    'size' => 'sm',
    'rounded' => 'md',
    'textCase' => 'uppercase',
    'outline' => 'btn-outline',
    'delete' => null,
    'noHoverBg' => false,
])

@php
$hover = $noHoverBg ? 'hover:bg-transparent' : '';
@endphp

@if ($href && !$delete)
    <a href="{{ $href }}"
        {{ $attributes->merge([
            'class' => "btn btn-$color btn-$size $textCase no-underline rounded-$rounded $outline $hover ",
        ]) }}>
        {{ $slot }}
    </a>
@else
    <button
        {{ $attributes->merge([
            'type' => 'submit',
            'class' => "btn btn-$color btn-$size $textCase rounded-$rounded $outline",
        ]) }}>
        {{ $slot }}
    </button>
@endif
