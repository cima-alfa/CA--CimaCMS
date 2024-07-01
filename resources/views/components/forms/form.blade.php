<form action="{{ $action }}" method="{{ $method }}" {{ $attributes }}>
    @if ($methodSpoof)
        @method($methodSpoof)
    @endif

    @if ($method == 'POST' || $csrf)
        @csrf
    @endif

    {{ $slot }}
</form>
