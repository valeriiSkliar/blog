<div>
    <x-dropdown>
        <x-slot name="trigger">
            <button
                class="inline-flex pl-3 w-32"
            >
                {{ isset($currentCategory) ? $currentCategory->name : 'Categories' }}
                <x-icon class="absolute pointer-events-none" name="arrow-down"/>
            </button>
        </x-slot>
        <x-dropdown-item
            :active="request()->routeIs('home')"
            href="/"
        >All
        </x-dropdown-item>
        @if(isset($categories) && count($categories) > 0)
            @foreach($categories as $category)
                <x-dropdown-item
                    :active='isset($currentCategory) && $currentCategory->is($category)'
                    href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category')) }}"
                >
                    {{ ucwords($category->name) }}
                </x-dropdown-item>
            @endforeach
        @else
            <p>No categories found.</p>
        @endif
    </x-dropdown>
</div>
