@component('mail::message')
    # Product purchase notification

    Hey {{ $adminUser->name }},
    Be informed that there is a product that has just been purchased in the system. the details of the purchase are as
    follows

@component('mail::panel')
    <p>Product name: {{ $purchase->product->name }}</p>
    <p>Price: {{ $purchase->price }}$</p>
    <p>Quantity: {{ $purchase->quantity }}</p>
    <p>Discount: {{ $purchase->discount }}% </p>
    <p>Discount amount:{{ $purchase->discount_amount }}$</p>
    <p>Total: {{ $purchase->total }}$</p>
@endcomponent

@component('mail::panel')
    <p>Customer name: {{ $purchase->customer->name }}</p>
    <p>Customer email: {{ $purchase->customer->email }}</p>
@endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
