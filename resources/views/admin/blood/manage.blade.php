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
        <a href="{{ route('bloodstocks.create') }}" class="btn btn-success" role="button">Add New BloodStock</a>

        <div class="flex flex-wrap mt-6">
            @foreach ($allbloodstocks as $allbloodstock)
                <div class="mb-6 mr-2 shadow stats">
                    <div class="w-48 stat">
                        <div class="stat-figure text-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <div class="stat-title">{{ $allbloodstock->bldtyp->bloodtype_name }}</div>
                        <div class="stat-value">{{ $allbloodstock->count }}l</div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="my-6 overflow-x-auto">

            <table class="min-w-full leading-normal rounded-lg">
                <thead>
                    <tr class="rounded-lg">
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">#</th>
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">Hospital</th>
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">User</th>
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">Blood Group</th>
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">Event</th>
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">Source</th>
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
                                <p class="text-gray-900 whitespace-no-wrap">{{ $bloodstock->hsptl->hsptl_name }}</p>
                            </td>

                            <td class="px-2 py-2 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $bloodstock->user->name }}
                                </p>
                            </td>

                            <td class="px-2 py-2 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $bloodstock->bldtyp->bloodtype_code }}
                                </p>
                            </td>

                            <td class="px-2 py-2 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $bloodstock->evnt->name }}
                                </p>
                            </td>

                            <td class="px-2 py-2 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $bloodstock->source }}
                                </p>
                            </td>

                            <td class="px-2 py-2 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $bloodstock->count }}
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
