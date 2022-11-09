<div class="my-6 overflow-x-auto">

    <table class="table w-full">
        <thead>
            <tr>
                <th>#</th>
                <th>Requestee</th>
                <th>Requestor</th>
                <th>Blood Group</th>
                <th>Requested Stock</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderitems as $orderitem)
                <tr>
                    <td class="hover">{{ $orderitem->id }}</td>
                    <td class="hover">{{ $orderitem->srchsptl->hsptl_name }}</td>
                    <td class="hover">{{ $orderitem->desthsptl->hsptl_name }}</td>
                    <td class="hover">{{ $orderitem->bldtyp->bloodtype_name }}</td>
                    <td class="hover">{{ $orderitem->requested_stock }}
                        <span class="hidden">{{ $orderitem->srcbldstk->count }}{{ $orderitem->destbldstk->count }}</span>
                    </td>
                    <td class="hover">{{ $orderitem->reqstatus->name }}</td>
                    <td class="hover">
                        <button class="btn btn-sm btn-success" onclick="loadTA(event, {{ $orderitem }})">Process</button>
                        <a class="btn btn-sm btn-error" href="{{ route('bloodstocks.edit', $orderitem->id) }}">Reject</a>
                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>

</div>

{!! $bloodstocks->links() !!}
