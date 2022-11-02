<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Orders') }}
        </h2>
    </x-slot>

    @section('content')
        <a class="btn btn-primary" href="{{ route('home') }}">Go Back</a>

        <div class="overflow-x-auto my-6">

            <table class="min-w-full leading-normal rounded-lg">
                <thead>
                    <tr class="rounded-lg">
                        <th class="px-5 py-3 border-b-2 border-gray-400 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Order&nbsp;&nbsp;#
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-400 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Hospital
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-400 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Total
                            Price
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-400 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Order
                            Placed
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-400 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-400 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <div>
                                        <p class="text-gray-900 whitespace-no-wrap font-semibold">
                                            {{ $order->id }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $hospital->hsptl_name }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $order->total_count }}</p>
                            </td>

                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $order->created_at }}
                                </p>
                            </td>

                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    <label class="badge badge-success">{{ $order->status }}</label>
                                </p>
                            </td>

                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    <a class="btn btn-sm btn-info" href="{{ route('orders.show', $order->id) }}">Show</a>
                                    <button type="button" class="btn btn-sm btn-accent"
                                        onclick="event.preventDefault();document.getElementById('delete-order-form-{{ $order->id }}').submit()">
                                        Delete
                                    </button>
                                    {{-- Delete Form --}}
                                <form id="delete-order-form-{{ $order->id }}" action="{{ route('orders.destroy', $order->id) }}" method="post">
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

        {!! $orders->links() !!}
    @endsection

</x-app-layout>
