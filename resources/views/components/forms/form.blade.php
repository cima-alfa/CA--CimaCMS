<form action="{{ $action }}" method="{{ $method }}"
    @if ($upload) enctype="multipart/form-data" @endif {{ $attributes }}>

    @if ($methodSpoof)
        @method($methodSpoof)
    @endif

    @if ($csrf || $method == 'POST')
        @csrf
    @endif

    {{ $slot }}
</form>
