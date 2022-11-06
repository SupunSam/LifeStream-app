<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('My Requests') }}
        </h2>
    </x-slot>

    @section('content')
        <a class="btn btn-primary" href="{{ route('home') }}">Go Back</a>
        <a href="{{ route('userrequests.create') }}" class="btn btn-success" role="button">Create New Request</a>

        <div class="my-6 overflow-x-auto">

            <table class="min-w-full leading-normal rounded-lg">
                <thead>
                    <tr class="rounded-lg">
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                            Request&nbsp;&nbsp;#
                        </th>
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                            User ID
                        </th>
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                            Email
                        </th>
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                            Request Type
                        </th>
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                            Created On
                        </th>
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                            Status
                        </th>
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 border-b-2 border-gray-400">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userrequests as $userrequest)
                        <tr>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <div class="flex items-center">
                                    <div>
                                        <p class="font-semibold text-gray-900 whitespace-no-wrap">
                                            {{ $userrequest->id }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $userrequest->user->name }}</p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $userrequest->email }}</p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $userrequest->request_type }}</p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $userrequest->created_at }}
                                </p>
                            </td>

                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    <label class="badge badge-success">{{ $userrequest->reqstatus->name }}</label>
                                </p>
                            </td>

                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    <a class="btn btn-sm btn-info" href="{{ route('userrequests.show', $userrequest->id) }}">Show</a>
                                    <button type="button" class="btn btn-sm btn-accent"
                                        onclick="event.preventDefault();document.getElementById('delete-order-form-{{ $userrequest->id }}').submit()">
                                        Delete
                                    </button>
                                    {{-- Delete Form --}}
                                <form id="delete-order-form-{{ $userrequest->id }}" action="{{ route('userrequests.destroy', $userrequest->id) }}" method="post">
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

        {!! $userrequests->links() !!}
    @endsection

</x-app-layout>
