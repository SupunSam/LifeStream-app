<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $hospital->hsptl_name }}
        </h2>
    </x-slot>

    @section('pagecdns')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    @endsection

    @section('content')
        @hasrole('Owner')
            <a class="btn btn-primary" href="{{ route('hospital.myhsptl') }}">Go Back</a>
        @endhasrole
        @hasrole(['Admin', 'Donor'])
            <a class="btn btn-primary" href="{{ route('hospital.index') }}">Go Back</a>
        @endhasrole

        @can('bloodstock-create')
            <a href="{{ route('bloodstocks.create', $hospital->id) }}" class="btn btn-success" role="button">Add BloodStocks</a>
        @endcan

        <div class="flex flex-wrap mt-6">
            @foreach ($bloodstocks as $bloodstock)
                <div class="mb-6 mr-2 shadow stats">
                    <div class="w-48 stat">
                        <div class="stat-figure text-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <div class="stat-title">{{ $bloodstock->bldtyp->bloodtype_name }}</div>
                        <div class="stat-value">{{ $bloodstock->count }}l</div>
                        {{-- <div class="mt-2 stat-desc"><a href="{{ route('add.to.cart', [$bloodstock->id, $hospital->id]) }}" class="btn btn-sm btn-error">Request</a></div> --}}
                    </div>
                </div>
            @endforeach
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
