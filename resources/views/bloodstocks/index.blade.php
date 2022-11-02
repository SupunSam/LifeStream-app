<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles and Permissions') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Products</h2>
                </div>
                <div class="pull-right">
                    @can('bloodstock-create')
                        <a class="btn btn-success" href="{{ route('bloodstocks.create') }}"> Create New Product</a>
                    @endcan
                </div>
            </div>
        </div>


        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif


        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Details</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($bloodstocks as $bloodstock)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $bloodstock->name }}</td>
                    <td>{{ $bloodstock->detail }}</td>
                    <td>
                        <form action="{{ route('bloodstocks.destroy', $bloodstock->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('bloodstocks.show', $bloodstock->id) }}">Show</a>
                            @can('bloodstock-edit')
                                <a class="btn btn-primary" href="{{ route('bloodstocks.edit', $bloodstock->id) }}">Edit</a>
                            @endcan


                            @csrf
                            @method('DELETE')
                            @can('bloodstock-delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {!! $bloodstocks->links() !!}
    @endsection

</x-app-layout>
