<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Transactions') }}
        </h2>
    </x-slot>

    @section('pagecdns')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    @endsection

    @section('content')
        <a class="btn btn-primary" href="{{ route('admin.dashboard') }}">Go Back</a>
        <a href="{{ route('admin.bloodstocks.export') }}" class="btn btn-info" role="button">Generate Report</a>
        <button type="button" onclick="resetTA()" class="btn btn-base-300">Reset</button>

        @include('admin.blood.partials.transfer')

        @include('admin.blood.partials.transactionlist')
    @endsection

    @section('scripts')
        <script type="text/javascript">
            function loadTA(evt, orderdetails) {
                console.log(orderdetails);

                var x = orderdetails.srcbldstk.count;
                var x = orderdetails.destbldstk.count;
                var z = orderdetails.requested_stock;

                document.getElementById("src_hsptl").innerHTML = orderdetails.srchsptl.hsptl_name;
                document.getElementById("src_curr_stock").innerHTML = orderdetails.srcbldstk.count;
                document.getElementById("src_aftr_stock").innerHTML = (x - z);

                document.getElementById("dest_hsptl").innerHTML = orderdetails.desthsptl.hsptl_name;
                document.getElementById("dest_curr_stock").innerHTML = orderdetails.destbldstk.count;
                document.getElementById("dest_aftr_stock").innerHTML = (x + z);

                document.getElementById("transaction_count").innerHTML = orderdetails.bldtyp.bloodtype_name + '&nbsp;' + z;

                document.getElementById("src_hsptl_id").value = orderdetails.srchsptl.id;
                document.getElementById("src_bldstk_id").value = orderdetails.src_bldstk_id;
                document.getElementById("src_currstk").value = orderdetails.srcbldstk.count;
                document.getElementById("src_aftrstk").value = (x - z);
                document.getElementById("dest_hsptl_id").value = orderdetails.desthsptl.id
                document.getElementById("dest_bldstk_id").value = orderdetails.dest_bldstk_id;
                document.getElementById("dest_currstk").value = orderdetails.destbldstk.count;
                document.getElementById("dest_aftrstk").value = (x + z);

                document.getElementById("order_id").value = orderdetails.order_id;
                document.getElementById("order_item_id").value = orderdetails.id;

            }

            function resetTA() {
                document.getElementById("src_hsptl").innerHTML = 'Hospital A';
                document.getElementById("src_curr_stock").innerHTML = '000';
                document.getElementById("src_aftr_stock").innerHTML = '000';

                document.getElementById("dest_hsptl").innerHTML = 'Hospital B';
                document.getElementById("dest_curr_stock").innerHTML = '000';
                document.getElementById("dest_aftr_stock").innerHTML = '000';

                document.getElementById("transaction_count").innerHTML = 'Transaction';

                document.getElementById("src_hsptl_id").value = "";
                document.getElementById("src_bldstk_id").value = "";
                document.getElementById("src_currstk").value = "";
                document.getElementById("src_aftrstk").value = "";
                document.getElementById("dest_hsptl_id").value = "";
                document.getElementById("dest_bldstk_id").value = "";
                document.getElementById("dest_currstk").value = "";
                document.getElementById("dest_aftrstk").value = "";
                document.getElementById("order_id").value = "";
                document.getElementById("order_item_id").value = "";
            }
        </script>
    @endsection

</x-app-layout>
