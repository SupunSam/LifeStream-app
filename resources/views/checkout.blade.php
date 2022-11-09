<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Request Bucket') }}
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
                            Hospital
                        </th>
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                            Blood Group
                        </th>
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                            Available Stock
                        </th>
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                            Requested Stock
                        </th>
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php $total_requested_blood = 0 @endphp
                    @if (session('cart'))
                        @foreach (session('cart') as $id => $details)
                            @php $total_requested_blood += $details['requested_stock'] @endphp
                            <tr data-id="{{ $id }}">

                                <td data-th="Price" class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $details['src_hsptl_name'] }}</p>
                                </td>

                                <td data-th="Price" class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $details['blood_group'] }}</p>
                                </td>

                                <td data-th="HospitalStock" class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $details['src_hsptl_stock'] }}</p>
                                </td>

                                <td data-th="RequestedStock" class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        <input type="number" value="{{ $details['requested_stock'] }}" class="form-control requested_stock update-cart" />
                                    </p>
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
                        <td class="px-2 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                            <a href="{{ url('/BrowseHospitals') }}" class="btn btn-warning">Browse Other Stocks</a>
                        </td>
                        <td class="px-2 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                            <a href="{{ route('newOrder') }}" type="submit" class="btn btn-success">Send to Approval</a>
                        </td>
                        <td class="px-2 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                            <span class="text-xl">Total Requested Blood Count</span>
                        </td>
                        <td class="px-2 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                            <div class="p-4 ml-2 text-lg badge badge-outline">{{ $total_requested_blood }}</div>
                        </td>
                        <td class="px-2 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
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
                        requested_stock: ele.parents("tr").find(".requested_stock").val()
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
