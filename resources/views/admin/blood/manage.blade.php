<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Blood Management') }}
        </h2>
    </x-slot>

    @section('pagecdns')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    @endsection

    @section('content')
        <a class="btn btn-primary" href="{{ route('admin.dashboard') }}">Go Back</a>

        <div class="my-6 overflow-x-auto">

            <table class="min-w-full leading-normal rounded-lg" id="bldtypes">
                <tbody>
                    @foreach ($bloodtypes as $bloodtype)
                        <tr>
                            <td class="px-2 py-2 text-sm border-b border-gray-200">
                                <div class="h-[60] w-60">
                                    @include('admin.blood.partials.bloodlogo')
                                </div>
                            </td>

                            <td class="px-2 py-2 text-sm border-b border-gray-200">
                                <p class="text-center text-gray-900 whitespace-no-wrap">{{ $bloodtype->bloodtype_name }}</p>
                            </td>

                            <td class="px-2 py-2 text-sm border-b border-gray-200">
                                <p class="text-center text-gray-900 whitespace-no-wrap">
                                    {{ $bloodtype->bloodtype_code }}
                                </p>
                            </td>

                            <td class="px-2 py-2 text-sm border-b border-gray-200">
                                <p class="text-center text-gray-900 whitespace-no-wrap">
                                    {{ $bloodtype->bloodtype_count }}
                                </p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <a href="{{ route('bloodstocks.create') }}" class="btn btn-success" role="button">Add New BloodStock</a>

        <div class="my-6 overflow-x-auto">

            <table class="min-w-full leading-normal rounded-lg">
                <thead>
                    <tr class="rounded-lg">
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">#</th>
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">Name</th>
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">Category</th>
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">Count</th>
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bloodstocks as $bloodstock)
                        <tr>
                            <td class="px-2 py-2 text-sm bg-white border-b border-gray-200">
                                <div class="flex items-center">
                                    <div>
                                        <p class="font-semibold text-gray-900 whitespace-no-wrap">
                                            {{ $bloodstock->id }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-2 py-2 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $bloodstock->bloodstock_name }}</p>
                            </td>

                            <td class="px-2 py-2 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $bloodstock->bloodstock_group }}
                                </p>
                            </td>

                            <td class="px-2 py-2 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $bloodstock->bloodstock_count }}
                                </p>
                            </td>

                            <td class="px-2 py-2 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    <a class="btn btn-sm btn-info" href="{{ route('bloodstocks.show', $bloodstock->id) }}">Show</a>
                                    <a class="btn btn-sm btn-primary" href="{{ route('bloodstocks.edit', $bloodstock->id) }}">Edit</a>
                                    <button type="button" class="btn btn-sm btn-danger"
                                        onclick="event.preventDefault();document.getElementById('delete-user-form-{{ $bloodstock->id }}').submit()">
                                        Delete
                                    </button>
                                    {{-- Delete Form --}}
                                <form id="delete-user-form-{{ $bloodstock->id }}" action="{{ route('bloodstocks.destroy', $bloodstock->id) }}" method="post">
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

        {!! $bloodstocks->links() !!}
    @endsection

    @section('scripts')
        <script type="text/javascript">
            $("table#bldtypes").each(function() {
                var $this = $(this);
                var newrows = [];
                $this.find("tr").each(function(rowToColIndex) {
                    $(this).find("td, th").each(function(colToRowIndex) {
                        if (newrows[colToRowIndex] === undefined) {
                            newrows[colToRowIndex] = $("<tr></tr>");
                        }
                        while (newrows[colToRowIndex].find("td, th").length < rowToColIndex) {
                            newrows[colToRowIndex].append($("<td></td>"));
                        }
                        newrows[colToRowIndex].append($(this));
                    });
                });
                $this.find("tr").remove();
                $.each(newrows, function() {
                    $this.append(this);
                });
            });
        </script>
    @endsection

</x-app-layout>
