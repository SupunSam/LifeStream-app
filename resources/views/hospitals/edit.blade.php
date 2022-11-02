<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Hospital') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="md:grid md:grid-cols-2 md:gap-6">

            <div class="mt-5 md:mt-0 md:col-span-1">

                <div class="px-4 py-5 bg-white shadow sm:rounded-md sm:overflow-hidden sm:p-6">

                    <form action="{{ route('hospital.update', $hospital->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <div class="grid grid-cols-6 gap-6">
                                {{-- Hospital Name --}}
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="hsptl_name" class="block text-sm font-medium text-gray-700">Hospital Name</label>
                                    <input type="text" name="hsptl_name" id="hsptl_name" value="{{ $hospital->hsptl_name }}"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                {{-- Hospital Type --}}
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="hsptl_category" class="block text-sm font-medium text-gray-700">Hospital Category</label>
                                    <input type="text" name="hsptl_category" value="{{ $hospital->hsptl_category }}" id="hsptl_category"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                {{-- Hospital Address --}}
                                <div class="col-span-6">
                                    <label for="hsptl_address" class="block text-sm font-medium text-gray-700">Address</label>
                                    <input type="text" name="hsptl_address" id="hsptl_address" value="{{ $hospital->hsptl_address }}"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                {{-- Hospital City --}}
                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                    <label for="hsptl_city" class="block text-sm font-medium text-gray-700">City</label>
                                    <input type="text" name="hsptl_city" id="hsptl_city" value="{{ $hospital->hsptl_city }}"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>

                            </div>
                        </div>

                        {{-- Hospital Description --}}
                        <div class="mt-6">
                            <label for="hsptl_desc" class="block text-sm font-medium text-gray-700">
                                About
                            </label>
                            <div class="mt-1">
                                <textarea id="hsptl_desc" name="hsptl_desc" rows="3"
                                    class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $hospital->hsptl_desc }}</textarea>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">
                                Brief description for your hospital. URLs are hyperlinked.
                            </p>

                        </div>

                        {{-- Hospital Website --}}
                        <div class="col-span-3 mt-4 sm:col-span-2">
                            <label for="hsptl_web" class="block text-sm font-medium text-gray-700">
                                Website
                            </label>
                            <div class="flex mt-1 rounded-md shadow-sm">
                                <span class="inline-flex items-center px-3 text-sm text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50">
                                    http://
                                </span>
                                <input type="text" name="hsptl_web" id="hsptl_web" value="{{ $hospital->hsptl_web }}"
                                    class="flex-1 block w-full border-gray-300 rounded-none focus:ring-indigo-500 focus:border-indigo-500 rounded-r-md sm:text-sm"
                                    placeholder="www.example.com">
                            </div>
                        </div>

                        {{-- Hospital Logo --}}
                        <div class="mt-6">
                            <label class="block text-sm font-medium text-gray-700">
                                Logo
                            </label>
                            <div class="flex items-center mt-1">
                                <span class="inline-block w-12 h-12 overflow-hidden bg-gray-100 rounded-full">
                                    @include('hospitals.partials.formicon', ['logo1' => true])
                                </span>
                                <input type="file" name="hsptl_logo" id="hsptl_logo" value="{{ $hospital->hsptl_logo }}"
                                    class="px-3 py-2 ml-5 text-sm font-medium leading-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                </input>
                            </div>
                        </div>

                        {{-- Hospital Cover --}}
                        <div class="mt-6">
                            <label class="block text-sm font-medium text-gray-700">
                                Cover Photo
                            </label>
                            <div class="flex justify-center px-6 pt-5 pb-6 mt-1 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    @include('hospitals.partials.formicon', ['logo2' => true])
                                    <div class="flex text-sm text-gray-600">
                                        <label for="hsptl_cover"
                                            class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="hsptl_cover" name="hsptl_cover" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        PNG, JPG, GIF up to 10MB
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Form Submit --}}
                        <div class="px-4 py-3 mt-6 text-right bg-gray-50 sm:px-6 rounded-box">
                            <button type="submit"
                                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Update
                            </button>
                        </div>

                    </form>

                </div>

            </div>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

        </div>
    @endsection

</x-app-layout>
