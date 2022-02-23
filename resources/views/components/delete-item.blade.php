@props([
    'url', 
    'label' => 'Delete',
    'buttonId',
    'itemType' => ''
])

@php
    $buttonId = "delete-form-".$buttonId
@endphp

<form id="{{ $buttonId }}" method="POST" action="{{ $url }}">
    @csrf
    @method('DELETE')
    <x-button 
        type="button"
        onclick="deleteItem(`{{ $buttonId }}`, `{{ $itemType }}`)" 
        color="error" 
        class="btn-sm"
    >
        {{ $label }}
    </x-button>
</form>