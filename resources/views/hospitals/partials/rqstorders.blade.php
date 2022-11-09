@foreach ($rqstorders as $rqstorder)
    <tr class="hover">
        <th>{{ $rqstorder->id }}</th>
        <td>{{ $rqstorder->hsptl->hsptl_name }}</td>
        <td>{{ $rqstorder->total_count }}</td>
        <td>{{ $rqstorder->created_at }}</td>
        <td><label class="badge badge-success">{{ $rqstorder->reqstatus->name }}</label></td>
        <td>
            <a class="btn btn-sm btn-info" href="{{ route('orders.show', $rqstorder->id) }}">Show</a>
            <button type="button" class="btn btn-sm btn-accent" onclick="event.preventDefault();document.getElementById('delete-order-form-{{ $rqstorder->id }}').submit()">
                Delete
            </button>
            {{-- Delete Form --}}
            <form id="delete-order-form-{{ $rqstorder->id }}" action="{{ route('orders.destroy', $rqstorder->id) }}" method="post">
                @csrf
                @method('DELETE')
            </form>
        </td>
    </tr>
@endforeach
