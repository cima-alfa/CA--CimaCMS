<label for="{{ $id }}" class="switch-wrapper">
    <span class="switch" @error($name) data-error @enderror>
        <input id="{{ $id }}" type="checkbox" name="{{ $name }}"
            @if ($value) value="{{ $value }}" @endif {{ $attributes }}
            @checked(old($name))>
        <div class="switch-handle"></div>
    </span>

    <span class="select-none leading-none">{{ $label }}</span>

    @error($name)
        <div class="input-message col-span-2" data-error>
            {{ $message }}
        </div>
    @enderror
</label>
