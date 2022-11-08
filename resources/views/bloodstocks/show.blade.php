<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Roles and Permissions') }}
        </h2>
    </x-slot>
    @section('content')
        <a class="btn btn-primary" href="{{ route('admin.blood.manage') }}">Go Back</a>

        <div class="flex items-center w-full px-4 py-10 bg-cover card bg-base-200" style="background-image: url(&quot;https://picsum.photos/id/429/1000/300&quot;);">
            <div class="card glass lg:card-side text-neutral-content">
                <div class="max-w-md card-body">
                    <h2 class="card-title">{{ $bloodstock->bldtyp->bloodtype_name }}</h2>
                    <p class="text-xl font-semibold">{{ $bloodstock->hsptl->hsptl_name }}</p>
                    <p class="text-xl font-semibold">{{ $bloodstock->count }}</p>
                    <p class="text-xl font-semibold">{{ $bloodstock->source }}</p>
                    <div class="card-actions">
                        <button class="rounded-full btn glass">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    @endsection

</x-app-layout>
