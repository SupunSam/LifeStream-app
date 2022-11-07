<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Contact Us') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="md:grid md:grid-cols-2 md:gap-6">

            <div class="mt-5 md:mt-0 md:col-span-1">

                <div class="px-4 py-5 bg-white shadow sm:rounded-md sm:overflow-hidden sm:p-6">

                    <form action="{{ route('userrequests.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- Import Hospital Form --}}
                        @if (auth()->check())
                            @include('userrequests.partials.userrequestform', ['user' => Auth::user()->id])
                        @else
                            @include('userrequests.partials.userrequestform', ['user' => 4])
                        @endif
                    </form>

                </div>

            </div>

            <div class="p-6 mr-2 bg-gray-100 dark:bg-gray-800 sm:rounded-lg">
                <h1 class="text-4xl font-extrabold tracking-tight text-gray-800 sm:text-2xl dark:text-white">
                    Get in touch
                </h1>
                <p class="mt-2 text-lg font-medium text-gray-600 text-normal sm:text-xl dark:text-gray-400">
                    Fill in the form to start a conversation
                </p>

                <div class="flex items-center mt-8 text-gray-600 dark:text-gray-400">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24"
                        class="w-8 h-8 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <div class="w-40 ml-4 font-semibold tracking-wide text-md">
                        National&nbsp;Blood&nbsp;Center,
                    </div>
                </div>
                <div class="flex items-center text-gray-600 dark:text-gray-400">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" viewBox="0 0 24 24"
                        class="w-8 h-8 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <div class="w-40 ml-4 font-semibold tracking-wide text-md">
                        No. 555/5D, <br>Elvitigala Mawatha, <br>Narahenpita, <br>Colombo 05, <br>Sri Lanka.
                    </div>
                </div>

                <div class="flex items-center mt-4 text-gray-600 dark:text-gray-400">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24"
                        class="w-8 h-8 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <div class="w-40 ml-4 font-semibold tracking-wide text-md">
                        +94 1122334455
                    </div>
                </div>

                <div class="flex items-center mt-2 text-gray-600 dark:text-gray-400">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24"
                        class="w-8 h-8 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <div class="w-40 ml-4 font-semibold tracking-wide text-md">
                        info@lifestream.net
                    </div>
                </div>
            </div>

        </div>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        </div>
    @endsection

</x-app-layout>
