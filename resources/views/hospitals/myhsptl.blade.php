<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            My Hospital
        </h2>
    </x-slot>

    @section('pagecdns')
        <style>
            #tabRequested {
                display: none;
            }
        </style>
    @endsection

    @section('content')
        @hasrole('Owner')
            <a href="{{ route('hospital.create') }}" class="btn btn-success" role="button">Add New Hospital</a>
        @endhasrole

        <div class="my-4">

            @foreach ($hospitals as $hospital)
                <div class="shadow-xl card card-side bg-base-100">
                    <figure><img src="{{ asset($hospital->hsptl_cover) }}" alt="hospital"></figure>
                    <div class="card-body">
                        <h2 class="card-title">{{ $hospital->hsptl_name }}</h2>
                        <p>{{ $hospital->hsptl_desc }}</p>
                        <div class="justify-end card-actions">
                            <a class="btn btn-secondary" href="{{ route('hospital.show', $hospital->id) }}">View More</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        {!! $hospitals->links() !!}

        <div class="tabs tabs-boxed">
            <a class="tab tablinks tab-lg tab-active" onclick="changeTab(event, 'tabRecieved')">Recieved</a>
            <a class="tab tablinks tab-lg" onclick="changeTab(event, 'tabRequested')">Requested</a>
        </div>

        <div id="tabRecieved" class="pb-6 my-6 overflow-x-auto tabcontent">
            {{-- Recieved Order Section --}}
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Recieved From</th>
                            <th>Recieved Count</th>
                            <th>Recieved On</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @include('hospitals.partials.rcvdorders')
                    </tbody>
                </table>
            </div>
        </div>

        <div id="tabRequested" class="pb-6 my-6 overflow-x-auto tabcontent">
            {{-- Requested Order Section --}}
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Recieved From</th>
                            <th>Recieved Count</th>
                            <th>Recieved On</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @include('hospitals.partials.rqstorders')
                    </tbody>
                </table>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script type="text/javascript">
            function changeTab(evt, tabName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" tab-active", "");
                }
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " tab-active";
            }
        </script>
    @endsection

</x-app-layout>
