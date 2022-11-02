<x-app-layout>

      <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  {{ __('User Management - ') }} {{ $user->name }}
            </h2>
      </x-slot>

      @section('content')

            <a class="btn btn-primary" href="{{ route('admin.users.index') }}">Go Back</a>

            <div class="card shadow-lg compact side bg-base-100 mt-6">
                  <div class="flex-row items-center space-x-4 card-body">
                        <div class="flex-1">
                              <h2 class="card-title font-bold text-info">Name</h2>
                              <p class="text-base-content font-bold text-opacity-40">{{ $user->name }}</p>
                        </div>
                        <div class="flex space-x-2 flex-0">
                              <button class="btn btn-sm btn-square">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                          </path>
                                    </svg>
                              </button>
                        </div>
                  </div>
            </div>

            <div class="card shadow-lg compact side bg-base-100 mt-6">
                  <div class="flex-row items-center space-x-4 card-body">
                        <div class="flex-1">
                              <h2 class="card-title font-bold text-info">Email</h2>
                              <p class="text-base-content font-bold text-opacity-40">{{ $user->email }}</p>
                        </div>
                        <div class="flex space-x-2 flex-0">
                              <button class="btn btn-sm btn-square">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                    </svg>
                              </button>
                        </div>
                  </div>
            </div>

            <div class="card shadow-lg compact side bg-base-100 mt-6">
                  <div class="flex-row items-center space-x-4 card-body">
                        <div class="flex-1">
                              <h2 class="card-title font-bold text-info">Roles</h2>
                              <p class="text-base-content font-bold  text-opacity-40">
                                    @if (!empty($user->getRoleNames()))
                                          @foreach ($user->getRoleNames() as $v)
                                                <div class="badge-lg badge badge-secondary">{{ $v }}</div>
                                          @endforeach
                                    @endif
                              </p>
                        </div>
                        <div class="flex space-x-2 flex-0">
                              <button class="btn btn-sm btn-square">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01">
                                          </path>
                                    </svg>
                              </button>
                        </div>
                  </div>
            </div>

      @endsection

</x-app-layout>
