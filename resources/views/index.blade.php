<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Welcome To Lifestream.net') }}
        </h2>
    </x-slot>

    @section('content')
        @include('layouts.home', ['hospitals' => $hospitals])
    @endsection

</x-app-layout>
