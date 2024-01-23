@if(session()->has('success'))
    <div
        x-data="{show: true}"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        class="bg-green-500 bottom-10 fixed px-4 py-2 right-5 rounded text-white text-xs"
    >
        <p>
            {{ session('success') }}
        </p>
    </div>
@endif
