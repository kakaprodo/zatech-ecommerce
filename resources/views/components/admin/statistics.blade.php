<div class="w-full shadow stats">
    <div class="stat place-items-center place-content-center">
        <div class="stat-title">Users</div>
        <div class="stat-value">{{ $usersCount }}</div>
        <div class="stat-desc">All users in the system</div>
    </div>
    <div class="stat place-items-center place-content-center">
        <div class="stat-title">Purchases</div>
        <div class="stat-value">{{ $purchasesCount }}</div>
        <div class="stat-desc">
            <a href="{{ route('admin.purchases.index') }}">View more</a>↗︎
        </div>
    </div>
    <div class="stat place-items-center place-content-center">
        <div class="stat-title">products</div>
        <div class="stat-value">{{ $productsCount }}</div>
        <div class="stat-desc">
            <a href="{{ route('admin.products.index') }}">View more</a>↗︎
        </div>
    </div>
</div>
