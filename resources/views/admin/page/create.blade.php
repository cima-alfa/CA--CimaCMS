<x-layouts.admin>
    <h1 class="title">Create page</h1>

    <x-forms.form novalidate method="post" route="admin.pages.store" :form="$createPageForm">

        <x-forms.input label="test" name="login" type="email" autocomplete="username" required />

        @php
            $options = [
                '' => '---',
                'test' => 'Test',
            ];
        @endphp

        <x-forms.select label="select" name="select" :options="$options" />

        <x-forms.checkbox label="Accept" name="check[]" value="test" checked />
        {{-- <x-forms.checkbox label="Accept" name="check[]" /> --}}

        <input type="submit" class="btn">
    </x-forms.form>

</x-layouts.admin>
