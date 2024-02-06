@props(['name', 'type' => 'text'])
<x-form.field name="{{ $name }}">
    <x-form.lable name="{{ $name }}"/>
    <input
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        {{ $attributes(['value'=> old($name)]) }}
        class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker">
    <x-form.error name="{{ $name }}"/>
</x-form.field>
