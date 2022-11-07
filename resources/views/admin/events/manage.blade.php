<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Events Management') }}
        </h2>
    </x-slot>

    @section('content')
        <a class="btn btn-primary" href="{{ route('admin.dashboard') }}">Go Back</a>
        <a href="{{ route('events.create') }}" class="btn btn-success" role="button">Create New Event</a>
        <a href="{{ route('admin.events.export') }}" class="btn btn-info" role="button">Generate Report</a>

        <div class="my-6 overflow-x-auto">
            <table class="table w-full border-b border-gray-200 shadow">
                <thead class="bg-prime">
                    <tr>
                        <th>#</th>
                        <th>Event Name</th>
                        <th>Hospital</th>
                        <th>Location</th>
                        <th>Event Date</th>
                        <th>Attendance</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->id }}</td>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->evnthsptl->hsptl_name }}</td>
                            <td>{{ $event->location }}</td>
                            <td>{{ $event->date }}</td>
                            <td>{{ $event->attendance }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('events.edit', $event->id) }}">Edit</a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['events.destroy', $event->id], 'style' => 'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        {!! $events->links() !!}
    @endsection

</x-app-layout>
