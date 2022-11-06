<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Hospitals') }}
        </h2>
    </x-slot>

    @section('content')
        @hasrole('Owner')
            {{-- <a href="{{ route('hospital.create') }}" class="btn btn-success" role="button">Create New Hospital</a> --}}
        @endhasrole

        <div class="grid grid-cols-1 gap-6 my-4 xl:grid-cols-5 sm:gap-6">

            @foreach ($hospitals as $hospital)
                <div class="text-center shadow-2xl card">
                    <figure class="px-10 pt-10">
                        <img src="{{ asset($hospital->hsptl_cover) }}" class="rounded-xl">
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">{{ $hospital->hsptl_name }}</h2>
                        <p class="line-clamp-3">{{ $hospital->hsptl_desc }}</p>
                        <div class="justify-center card-actions">
                            <a href="{{ route('hospital.show', $hospital->id) }}" class="btn btn-outline btn-accent">View More</a>
                        </div>
                    </div>
                </div>
                {{-- <div class="shadow-sm card bg-accent text-accent-content">
                              <figure>
                                    <img src="{{ asset($hospital->hsptl_cover) }}">
                              </figure>
                              <div class="card-body">
                                    <h2 class="card-title">{{ $hospital->hsptl_name }}</h2>
                                    <p class="line-clamp-3">{{ $hospital->hsptl_desc }}</p>
                                    <div class="card-actions">
                                          <a class="btn btn-secondary" href="{{ route('hospital.show', $hospital->id) }}">View More</a>
                                    </div>
                              </div>
                        </div> --}}
            @endforeach

        </div>
        {!! $hospitals->links() !!}
    @endsection

</x-app-layout>
