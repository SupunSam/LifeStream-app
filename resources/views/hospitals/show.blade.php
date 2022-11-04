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

        <div class="grid grid-cols-1 gap-6 py-6 xl:grid-cols-5 sm:gap-6">

            @foreach ($bloodstocks as $bloodstock)
                <div class="shadow-xl card w-66 bg-base-100">
                    <div class="items-center text-center card-body">
                        <h2 class="card-title">{{ $bloodstock->bldtyp->bloodtype_name }}</h2>
                        @include('hospitals.partials.bloodbaglogo', ['bldtype' => $bloodstock->bldtyp->bloodtype_code])
                        <h2 class="card-title collapsed">{{ $bloodstock->count }}</h2>
                        <div class="justify-end card-actions">
                            <a href="{{ route('add.to.cart', [$bloodstock->id, $hospital->id]) }}" class="btn btn-error">Add to Cart</a>
                        </div>
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
