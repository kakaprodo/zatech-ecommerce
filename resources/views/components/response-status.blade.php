@props(['status' => null])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600']) }}>
        {{ $status }}
    </div>
@endif

@if (session('success'))
    <div class="bg-white p-10">
        <div class="alert alert-success">
            <div class="flex-1">
                <svg class="w-6 h-6 mx-2 stroke-current" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <path d="M7 12l5 5l10 -10" />
                    <path d="M2 12l5 5m5 -5l5 -5" />
                </svg>
                <label>{{ session('success') }}</label>
            </div>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="bg-white p-5">
        <div class="alert alert-error">
            <div class="flex-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="w-6 h-6 mx-2 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636">
                    </path>
                </svg>
                <label>{{ session('error') }}</label>
            </div>
        </div>
    </div>
@endif
