<x-layouts.admin>

    <h1>Welcome {{ $currentUser->nameDisplay }}</h1>

    @dump(request()->session()->all())

</x-layouts.admin>
