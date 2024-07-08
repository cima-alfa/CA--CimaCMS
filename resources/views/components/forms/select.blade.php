@if ($label)
    <label for="{{ $id }}" class="mb-2 inline-block">{{ $label }}</label>
@endif

<div class="select" @error($name) data-error @enderror>
    <select id="{{ $id }}" name="{{ $name }}" {{ $attributes }}>
        @foreach ($options as $key => $option)
            <option value="{{ $key }}" @selected(old($name))>
                {{ $option }}
            </option>
        @endforeach
    </select>
</div>

@error($name)
    <div class="input-message mt-2" data-error>
        {{ $message }}
    </div>
@enderror
