<x-app-layout>

      <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  {{ __('User Management') }}
            </h2>
      </x-slot>

      @section('content')

            <a class="btn btn-primary" href="{{ route('admin.dashboard') }}">Go Back</a>
            <a href="{{ route('admin.users.create') }}" class="btn btn-success" role="button">Create New User</a>

            <div class="overflow-x-auto mt-6">
                  <table class="table w-full border-b border-gray-200 shadow">
                        <thead class="bg-prime">
                              <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Actions</th>
                              </tr>
                        </thead>

                        <tbody>
                              @foreach ($users as $user)
                                    <tr>
                                          <td>{{ $user->id }}</td>
                                          <td>{{ $user->name }}</td>
                                          <td>{{ $user->email }}</td>
                                          <td>
                                                @if (!empty($user->getRoleNames()))
                                                      @foreach ($user->getRoleNames() as $v)
                                                            <label class="badge badge-success">{{ $v }}</label>
                                                      @endforeach
                                                @endif
                                          </td>
                                          <td>
                                                <a class="btn btn-sm btn-info" href="{{ route('admin.users.show', $user->id) }}">Show</a>
                                                <a class="btn btn-sm btn-primary" href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                                                <button type="button" class="btn btn-sm btn-danger"
                                                      onclick="event.preventDefault();document.getElementById('delete-user-form-{{ $user->id }}').submit()">
                                                      Delete
                                                </button>
                                                {{-- Delete Form --}}
                                                <form id="delete-user-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                                                      @csrf
                                                      @method('DELETE')
                                                </form>
                                          </td>
                                    </tr>
                              @endforeach
                        </tbody>

                  </table>
            </div>

            {!! $users->links() !!}

      @endsection

</x-app-layout>
