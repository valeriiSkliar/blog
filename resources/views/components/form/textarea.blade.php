@props(['name', 'type' => 'text'])
<x-form.field name="{{ $name }}">
    <x-form.lable name="{{ $name }}"/>
    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        {{ $attributes(['value'=> old($name)]) }}
        class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker">
        {{$slot ?? old($name)}}
    </textarea>
    <x-form.error name="{{ $name }}"/>
</x-form.field>
