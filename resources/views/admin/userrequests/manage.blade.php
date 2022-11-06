<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('User Requests Management') }}
        </h2>
    </x-slot>

    @section('content')
        <a class="btn btn-primary" href="{{ route('admin.dashboard') }}">Go Back</a>
        <a href="{{ route('userrequests.create') }}" class="btn btn-success" role="button">Create New Request</a>

        <div class="my-6 overflow-x-auto">
            <table class="table w-full border-b border-gray-200 shadow">
                <thead class="bg-prime">
                    <tr>
                        <th>#</th>
                        <th>User ID</th>
                        <th>Email</th>
                        <th>Request Type</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($userrequests as $userrequest)
                        <tr>
                            <td>{{ $userrequest->id }}</td>
                            <td>{{ $userrequest->user->name }}</td>
                            <td>{{ $userrequest->email }}</td>
                            <td>{{ $userrequest->request_type }}</td>
                            <td>{{ $userrequest->description }}</td>
                            <td>{{ $userrequest->reqstatus->name }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('userrequests.edit', $userrequest->id) }}">Edit</a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['userrequests.destroy', $userrequest->id], 'style' => 'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        {!! $userrequests->links() !!}
    @endsection

</x-app-layout>
