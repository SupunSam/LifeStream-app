<x-app-layout>

      <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  {{ __('View Roles and Permissions') }}
            </h2>
      </x-slot>

      @section('content')

            <a class="btn btn-primary" href="{{ route('admin.roles.index') }}">Go Back</a>

            <div class="card shadow-lg side bg-base-100 mt-6">
                  <div class="flex-row items-center card-body">
                        <div class="flex-1">
                              <h2 class="card-title font-bold text-info">{{ $role->name }}</h2>

                              @if (!empty($rolePermissions))
                                    @foreach ($rolePermissions as $v)
                                          <div class="flex-row items-center p-0 card-body">
                                                <label class="cursor-pointer pb-4 label">
                                                      <input type="checkbox" checked="checked" onclick="return false;" class="checkbox checkbox-accent">
                                                      <span class="mx-4 label-text font-medium text-2xm">{{ $v->name }}</span>
                                                </label>
                                          </div>
                                    @endforeach
                              @endif
                        </div>
                  </div>
            </div>

      @endsection

</x-app-layout>
