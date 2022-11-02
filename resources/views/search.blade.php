<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Search Blood') }}
        </h2>
    </x-slot>

    @section('content')
        @if (isset($bloodstocks))
            <p>We have found {{ count($bloodstocks) }} bloodstocks for <b> {{ $searchq }} </b> are :</p>

            <div class="grid grid-cols-1 gap-6 py-6 xl:grid-cols-5 sm:gap-6">

                @foreach ($bloodstocks as $bloodstock)
                    <div class="shadow-sm card bg-accent text-accent-content">
                        <div class="card-body">
                            <h2 class="card-title">{{ $bloodstock->bloodstock_name }}</h2>
                            <p class="line-clamp-3">{{ $bloodstock->bloodstock_group }}</p>
                            <div class="card-actions">
                                <a class="btn btn-secondary" href="{{ route('add.to.cart', $bloodstock->id) }}">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            {!! $bloodstocks->links() !!}
        @endif

    @endsection

</x-app-layout>
