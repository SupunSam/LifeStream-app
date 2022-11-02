<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Add New Hospital') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="md:grid md:grid-cols-2 md:gap-6">

            <div class="mt-5 md:mt-0 md:col-span-1">

                <div class="px-4 py-5 bg-white shadow sm:rounded-md sm:overflow-hidden sm:p-6">

                    <form action="{{ route('hospital.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- Import Hospital Form --}}
                        @include('hospitals.partials.hospitalform')

                    </form>

                </div>

            </div>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

        </div>
    @endsection

</x-app-layout>
