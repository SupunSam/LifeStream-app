@csrf
<div>
      <div class="grid grid-cols-6 gap-6">
            {{-- User Name --}}
            <div class="col-span-6 sm:col-span-3">
                  <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                  <input type="text" name="name" id="name" value="{{ old('name') }} @isset($user){{ $user->name }} @endisset"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            {{-- Email --}}
            <div class="col-span-6 sm:col-span-3">
                  <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                  <input type="text" name="email" id="email" value="{{ old('email') }} @isset($user){{ $user->email }} @endisset"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            @isset($create)
                  {{-- Password --}}
                  <div class="col-span-2 sm:col-span-3">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" id="password"
                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>
                  {{-- Confirm Password --}}
                  <div class="col-span-2 sm:col-span-3">
                        <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                        <input type="password" name="confirm-password" id="confirm-password"
                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>
            @endisset

            {{-- Role Slect --}}
            <div class="col-span-2 sm:col-span-2 p-6 card bordered shadow">
                  @foreach ($roles as $role)
                        <div class="form-control">
                              <label class="cursor-pointer label">
                                    <span class="label-text font-semibold">{{ $role->name }}</span>
                                    <input type="checkbox" name="roles[]" value="{{ $role->id }}" id="{{ $role->name }}" @isset($user) @if (in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif
                                          @endisset class="checkbox">
                              </label>
                        </div>
                  @endforeach
            </div>

      </div>
</div>

{{-- Form Submit --}}
<div class="px-4 py-3 bg-gray-50 text-right sm:px-6 mt-6 rounded-box">
      <button type="submit"
            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

            @isset($create)
                  Create User
            @else
                  Edit User
            @endisset

      </button>
</div>
