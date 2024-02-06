@props(['name'])
<label
    class="block text-grey-darker text-sm font-bold mb-2"
    for="{{ $name }}">
    {{ ucwords($name) }}
</label>
