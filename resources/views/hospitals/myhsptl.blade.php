<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            My Hospital
        </h2>
    </x-slot>

    @section('content')

        @hasrole('Owner')
            <a href="{{ route('hospital.create') }}" class="btn btn-success" role="button">Create New Hospital</a>
        @endhasrole

        <div class="grid grid-cols-1 gap-6 my-4 xl:grid-cols-5 sm:gap-6">

            @foreach ($hospitals as $hospital)
                <div class="shadow-sm card bg-accent text-accent-content">
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
                </div>
            @endforeach

        </div>
        {!! $hospitals->links() !!}


        @if ($client != null)
            {{-- Order Section --}}
            <div class="my-6 overflow-x-auto">

                <table class="min-w-full leading-normal rounded-lg">
                    <thead>
                        <tr class="rounded-lg">
                            <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                                Order&nbsp;&nbsp;#
                            </th>
                            <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                                Client Name
                            </th>
                            <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                                Total
                                Price
                            </th>
                            <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                                Order
                                Placed
                            </th>
                            <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                                Status
                            </th>
                            <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hsptlorders as $hsptlorder)
                            <tr>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div>
                                            <p class="font-semibold text-gray-900 whitespace-no-wrap">
                                                {{ $hsptlorder->id }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $client->name }}</p>
                                </td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $hsptlorder->total_count }}</p>
                                </td>

                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $hsptlorder->created_at }}
                                    </p>
                                </td>

                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        <label class="badge badge-success">{{ $hsptlorder->status }}</label>
                                    </p>
                                </td>

                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        <a class="btn btn-sm btn-info" href="{{ route('orders.show', $hsptlorder->id) }}">Show</a>
                                        <button type="button" class="btn btn-sm btn-accent"
                                            onclick="event.preventDefault();document.getElementById('delete-order-form-{{ $hsptlorder->id }}').submit()">
                                            Delete
                                        </button>
                                        {{-- Delete Form --}}
                                    <form id="delete-order-form-{{ $hsptlorder->id }}" action="{{ route('orders.destroy', $hsptlorder->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    </p>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

            {!! $hsptlorders->links() !!}
        @endif

    @endsection

</x-app-layout>
