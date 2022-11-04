<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Events Management') }}
        </h2>
    </x-slot>

    @section('content')
        <a class="btn btn-primary" href="{{ route('admin.dashboard') }}">Go Back</a>
        <a href="{{ route('events.create') }}" class="btn btn-success" role="button">Create New Event</a>

        <div class="my-6 overflow-x-auto">
            <table class="table w-full border-b border-gray-200 shadow">
                <thead class="bg-prime">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->id }}</td>
                            <td>{{ $event->hsptl_name }}</td>
                            <td>{{ $event->hsptl_category }}</td>
                            <td>{{ $event->hsptl_address }}</td>
                            <td>{{ $event->hsptl_city }}</td>
                            <td>
                                {{-- <a class="btn btn-sm btn-info" href="{{ route('hospital.show', $event->id) }}">Show</a> --}}
                                {{-- <a class="btn btn-sm btn-primary" href="{{ route('hospital.edit', $event->id) }}">Edit</a> --}}
                                {{-- {!! Form::open(['method' => 'DELETE', 'route' => ['hospital.destroy', $event->id], 'style' => 'display:inline']) !!} --}}
                                {{-- {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!} --}}
                                {{-- {!! Form::close() !!} --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        {!! $events->links() !!}
    @endsection

</x-app-layout>
