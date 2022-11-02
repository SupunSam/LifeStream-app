<x-app-layout>

      <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  {{ Auth::user()->name }}
            </h2>
      </x-slot>

      @section('content')

            <div class="md:grid md:grid-cols-2 md:gap-6">

                  {{-- Details Card --}}
                  <div class="row-span-3 col-span-1 card shadow-lg bg-base-100 w-400">
                        <div class="card-body">
                              <h2 class="my-4 text-4xl font-bold card-title">Update Your Profile</h2>
                              <div class="mb-4 space-x-2 card-actions">
                                    <div class="badge badge-ghost">Name</div>
                                    <div class="badge badge-ghost">Password</div>
                                    <div class="badge badge-ghost">Etc</div>
                              </div>
                              {{-- Profile Update Form --}}
                              <form action="{{ route('profileUpdate', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')

                                    <div class="form-control">
                                          <label for="name" class="label">
                                                <span class="label-text">Name</span>
                                          </label>
                                          <input type="text" placeholder="name" class="input input-primary input-bordered @error('name') is-invalid @enderror" name="name"
                                                id="name" aria-describedby="name" value="{{ Auth::user()->name }} @isset($user){{ $user->name }} @endisset">

                                          @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                      {{ $message }}
                                                </span>
                                          @enderror
                                    </div>

                                    <div class="form-control">
                                          <label for="email" class="label">
                                                <span class="label-text">Email</span>
                                          </label>
                                          <input type="email" placeholder="Email" class="input input-secondary input-bordered @error('email') is-invalid @enderror" name="email"
                                                id="email" aria-describedby="email" value="{{ Auth::user()->email }} @isset($user){{ $user->email }} @endisset">

                                          @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                      {{ $message }}
                                                </span>
                                          @enderror
                                    </div>

                                    <div class="form-control">
                                          <label for="password" class="label">
                                                <span class="label-text">Confirm Password</span>
                                          </label>
                                          <input type="text" placeholder="Password" class="input input-accent input-bordered  @error('password') is-invalid @enderror"
                                                name="password" id="password">
                                          @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                      {{ $message }}
                                                </span>
                                          @enderror
                                    </div>

                                    <div class="form-control">
                                          <label for="confirm-password" class="label">
                                                <span class="label-text">Confirm Password</span>
                                          </label>
                                          <input type="text" placeholder="Password" class="input input-accent input-bordered  @error('confirm-password') is-invalid @enderror"
                                                name="confirm-password" id="password">
                                          @error('confirm-password')
                                                <span class="invalid-feedback" role="alert">
                                                      {{ $message }}
                                                </span>
                                          @enderror
                                    </div>

                                    <div class="justify-end space-x-2 card-actions">
                                          <button type="submit" class="btn btn-primary">Update</button>
                                          <button class="btn">Cancel</button>
                                    </div>
                              </form>
                        </div>
                  </div>

                  <div class="card mt-4 shadow-lg compact side bg-base-100">
                        <div class="flex-row items-center space-x-4 card-body">
                              <div>
                                    <div class="avatar">
                                          <div class="rounded-full w-14 h-14 shadow"><img src="https://i.pravatar.cc/500?img=32"></div>
                                    </div>
                              </div>
                              <div>
                                    <h2 class="card-title">{{ Auth::user()->name }}</h2>
                                    <p class="text-base-content text-opacity-40"></p>
                              </div>
                        </div>
                  </div>

                  <div class="card mt-4 shadow-lg compact side bg-base-100">
                        <div class="flex-row items-center space-x-4 card-body">
                              <div class="flex-1">
                                    <h2 class="card-title font-bold text-info">{{ $orders }}</h2>
                                    <p class="text-base-content font-bold text-opacity-40">Orders</p>
                              </div>
                              <div class="flex space-x-2 flex-0">
                                    <button class="btn btn-sm btn-square">
                                          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                          </svg>
                                    </button>
                              </div>
                        </div>
                  </div>

                  <div class="card mt-4 shadow-lg compact side bg-base-100">
                        <div class="flex-row items-center space-x-4 card-body">
                              <div class="flex-1">
                                    <h2 class="card-title font-bold text-info">
                                          {{ Auth::user()->created_at->toDateString() }}
                                    </h2>
                                    <p class="text-base-content font-bold  text-opacity-40">Member Since</p>
                              </div>
                              <div class="flex space-x-2 flex-0">
                                    <button class="btn btn-sm btn-square">
                                          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                          </svg>
                                    </button>
                              </div>
                        </div>
                  </div>

            </div>

      @endsection

</x-app-layout>
