

@props(['name'])
<x-form.field>
    <x-form.label name="{{ $name }}" />
    <textarea
        class="border border-gray-200 p-2 w-full rounded"
        name="{{ $name }}"
        id="{{ $name }}"

        {{ $attributes }}
    >{{ $slot ?? old($name) }}</textarea>

    <x-error-message field="{{$name}}" />
</x-form.field>