<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Shopping Cart') }}
        </h2>
    </x-slot>

    @section('pagecdns')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    @endsection

    @section('content')

        <a class="btn btn-primary" href="{{ route('admin.dashboard') }}">Go Back</a>

        <div class="mt-6 overflow-x-auto ">

            <table class="min-w-full leading-normal rounded-lg">
                <thead>
                    <tr class="rounded-lg">
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                            Blood
                        </th>
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                            Price
                        </th>
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                            Quantity
                        </th>
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                            Sub Total
                        </th>
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @if (session('cart'))
                        @foreach (session('cart') as $id => $details)
                            @php $total += $details['bloodstock_count'] * $details['quantity'] @endphp
                            <tr data-id="{{ $id }}">
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="ml-3" data-th="Product">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $details['bloodstock_name'] }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <td data-th="Price" class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">${{ $details['bloodstock_count'] }}</p>
                                </td>

                                <td data-th="Quantity" class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                                    </p>
                                </td>

                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                                        <span aria-hidden class="absolute inset-0 bg-green-200 rounded-full opacity-50"></span>
                                        <span class="relative">$ {{ $details['bloodstock_count'] * $details['quantity'] }}</span>
                                    </span>
                                </td>

                                <td data-th="" class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        <button class="btn btn-outline btn-circle btn-sm remove-from-cart">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-4 h-4 stroke-current">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>

                <tfoot>
                    <tr class="rounded-lg">
                        <td class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                            <a href="{{ url('/') }}" class="btn btn-warning">Continue Shopping</a>
                            <a href="{{ route('newOrder') }}" type="submit" class="btn btn-success">Checkout</a>
                        </td>
                        <td class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                        </td>
                        <td class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                            <span class="text-xl">Total</span>
                        </td>
                        <td class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                            <div class="ml-2 badge badge-outline">${{ $total }}</div>
                        </td>
                        <td class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                        </td>
                    </tr>
                </tfoot>

            </table>

        </div>

    @endsection

    @section('scripts')
        <script type="text/javascript">
            $(".update-cart").change(function(e) {
                e.preventDefault();

                var ele = $(this);

                $.ajax({
                    url: '{{ route('update.cart') }}',
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id"),
                        quantity: ele.parents("tr").find(".quantity").val()
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            });

            $(".remove-from-cart").click(function(e) {
                e.preventDefault();

                var ele = $(this);

                if (confirm("Are you sure want to remove?")) {
                    $.ajax({
                        url: '{{ route('remove.from.cart') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.parents("tr").attr("data-id")
                        },
                        success: function(response) {
                            window.location.reload();
                        }
                    });
                }
            });
        </script>
    @endsection

</x-app-layout>
