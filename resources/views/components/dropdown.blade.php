@props(['trigger'])

<div class="
            flex-1 appearance-none  bg-transparent py-2
            pr-9 text-sm font-semibold"
     x-data="{ show: false }" @click.away="show = false"
>

    <div @click="show = !show">
        {{ $trigger }}
    </div>
    <div
        style="display: none"
        x-show="show"
        class="
        mt-3 pt-3 absolute overflow-auto max-h-52
        w-full bg-gray-100 rounded-xl"
    >
        {{ $slot }}
    </div>
</div>
