@foreach ($rcvdorders as $rcvdorder)
    <tr class="hover">
        <th>{{ $rcvdorder->id }}</th>
        <td>{{ $rcvdorder->hsptl->hsptl_name }}</td>
        <td>{{ $rcvdorder->total_count }}</td>
        <td>{{ $rcvdorder->created_at }}</td>
        <td><label class="badge badge-success">{{ $rcvdorder->reqstatus->name }}</label></td>
        <td>
            <a class="btn btn-sm btn-info" href="{{ route('orders.show', $rcvdorder->id) }}">Show</a>
            <button type="button" class="btn btn-sm btn-accent" onclick="event.preventDefault();document.getElementById('delete-order-form-{{ $rcvdorder->id }}').submit()">
                Delete
            </button>
            {{-- Delete Form --}}
            <form id="delete-order-form-{{ $rcvdorder->id }}" action="{{ route('orders.destroy', $rcvdorder->id) }}" method="post">
                @csrf
                @method('DELETE')
            </form>
        </td>
    </tr>
@endforeach
