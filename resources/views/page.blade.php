<x-layouts.front>

    @dump($currentUser)

    @dump(request()->session()->all())

</x-layouts.front>
