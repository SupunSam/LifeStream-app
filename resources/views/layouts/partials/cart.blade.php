<div class="flex-row-reverse hidden sm:flex sm:items-center sm:ml-6 justify-items-end">
    <x-dropdown align="right" width="48">

        <x-slot name="trigger">
            <button type="button" href="#" class="flex p-2 -m-2 group btn btn-outline btn-accent" data-toggle="dropdown">
                <!-- Heroicon name: outline/shopping-bag -->
                <svg class="flex-shrink-0 w-6 h-6 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <span class="mx-2 font-bold text-gray-700 text-2xm group-hover:text-gray-800">{{ count((array) session('cart')) }}</span>
                <span class="font-bold text-gray-700 text-2xm group-hover:text-gray-800">Requests</span>
            </button>
        </x-slot>

        <x-slot name="content">

            <x-cart-dropdown-link :href="route('admin.dashboard')">

                @if (session('cart'))
                    @foreach (session('cart') as $id => $details)
                        <div class="flex p-2 bg-white border-b border-gray-100 cursor-pointer hover:bg-gray-100">
                            <div class="w-12 p-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                                </svg>
                            </div>
                            <div class="flex-auto w-32 text-sm">
                                <div class="font-bold">{{ $details['blood_group'] }}</div>
                                <div class="truncate">{{ $details['hospital_name'] }}</div>
                                <div class="text-gray-400">{{ $details['hospital_stock'] }}</div>
                            </div>
                            <div class="flex flex-col items-end font-medium w-18">
                                <div class="w-4 h-4 mb-4 text-red-700 rounded-full cursor-pointer hover:bg-red-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 ">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg>
                                </div>
                                {{ $details['requested_stock'] }}
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="flex p-2 bg-white border-b border-gray-100 cursor-pointer hover:bg-gray-100">
                        <div class="w-12 p-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                            </svg>
                        </div>
                        <div class="flex-auto w-32 text-sm">
                            <div class="font-bold">Product 1</div>
                            <div class="truncate">Product 1 description</div>
                            <div class="text-gray-400">Qt: 2</div>
                        </div>
                        <div class="flex flex-col items-end font-medium w-18">
                            <div class="w-4 h-4 mb-6 text-red-700 rounded-full cursor-pointer hover:bg-red-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 ">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                    </path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                            </div>
                            $12.22
                        </div>
                    </div>
                @endif

                <div class="flex p-4 justify-left bg-accent">
                    <div class="font-bold">Total Items: &nbsp;&nbsp;{{ count((array) session('cart')) }}</div>
                </div>

                <div class="flex justify-center p-4 bg-base-300">
                    <a href="{{ route('cart') }}" class="btn btn-sm btn-outline btn-success">Complete Requests</a>
                </div>

            </x-cart-dropdown-link>

        </x-slot>

    </x-dropdown>

</div>
