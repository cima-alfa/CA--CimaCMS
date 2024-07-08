@if ($label)
    <label for="{{ $id }}" class="mb-2 inline-block">{{ $label }}</label>
@endif

<input id="{{ $id }}" type="{{ $type }}" name="{{ $name }}" value="{{ $value }}"
    {{ $attributes->class(['input']) }} @error($name) data-error @enderror>

@error($name)
    <div class="input-message mt-2" data-error>
        {{ $message }}
    </div>
@enderror
