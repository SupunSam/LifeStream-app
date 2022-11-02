<x-app-layout>

      <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  {{ __('Roles and Permissions') }}
            </h2>
      </x-slot>

      @section('content')

            <a class="btn btn-primary" href="{{ route('admin.dashboard') }}">Go Back</a>
            <a href="{{ route('admin.roles.create') }}" class="btn btn-success" role="button">Create New Role</a>

            <div class="overflow-x-auto my-6">
                  <table class="table w-full border-b border-gray-200 shadow">
                        <thead class="bg-prime">
                              <tr>
                                    <th>#</th>
                                    <th>Role Name</th>
                                    <th>Actions</th>
                              </tr>
                        </thead>

                        <tbody>
                              @foreach ($roles as $role)
                                    <tr>
                                          <td>{{ $role->id }}</td>
                                          <td>{{ $role->name }}</td>
                                          <td>
                                                <a class="btn btn-sm btn-info" href="{{ route('admin.roles.show', $role->id) }}">Show</a>

                                                <a class="btn btn-sm btn-primary" href="{{ route('admin.roles.edit', $role->id) }}">Edit</a>

                                                <button type="button" class="btn btn-sm btn-danger"
                                                      onclick="event.preventDefault();document.getElementById('delete-role-form-{{ $role->id }}').submit()">
                                                      Delete
                                                </button>
                                                {{-- Delete Form --}}
                                                <form id="delete-role-form-{{ $role->id }}" action="{{ route('admin.roles.destroy', $role->id) }}" method="post">
                                                      @csrf
                                                      @method('DELETE')
                                                </form>

                                          </td>
                                    </tr>
                              @endforeach
                        </tbody>

                  </table>
            </div>

            {!! $roles->links() !!}

      @endsection

</x-app-layout>
