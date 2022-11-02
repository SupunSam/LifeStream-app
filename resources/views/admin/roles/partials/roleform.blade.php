@csrf
<div>
      <div class="grid grid-cols-3 gap-6">
            {{-- Role Name --}}
            <div class="col-span-2 sm:col-span-2">
                  <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                  <input type="text" name="name" id="name" value="{{ old('name') }} @isset($role){{ $role->name }} @endisset"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="col-span-2 sm:col-span-2 p-6 card bordered shadow">
                  @isset($create)

                        @foreach ($permissions as $permission)
                              <div class="form-control">
                                    <label class="cursor-pointer label">
                                          <span class="label-text font-semibold">{{ $permission->name }}</span>
                                          <input type="checkbox" name="permission" class="checkbox" value="{{ $permission->id }}">
                                    </label>
                              </div>
                        @endforeach

                  @else

                        @foreach ($permissions as $permission)
                              <div class="form-control">
                                    <label class="cursor-pointer label">
                                          <span class="label-text font-semibold">{{ $permission->name }}</span>
                                          <input type="checkbox" name="permission[]" value="{{ $permission->id }}" id="{{ $permission->name }}" @isset($role)
                                                @if (in_array($permission->id, $role->permissions->pluck('id')->toArray())) checked @endif @endisset class="checkbox">
                                    </label>
                              </div>
                        @endforeach


                        {{-- fgdsggsg --}}


                        {{-- @foreach ($permissions as $permission)
                              <div class="form-control">
                                    <label class="cursor-pointer label">
                                          <span class="label-text font-semibold">{{ $permission->name }}</span>
                                          <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="{{ $permission->name }}" @isset($user)
                                                @if (in_array($permission->id, $user->permissions->pluck('id')->toArray())) checked @endif @endisset class="checkbox">
                                    </label>
                              </div>
                        @endforeach

                        @foreach ($permission as $value)
                              <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                                    {{ $value->name }}</label>
                              <br />
                        @endforeach
                        @foreach ($permission as $value)
                              <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $permissionPermissions) ? true : false, ['class' => 'name']) }}
                                    {{ $value->name }}</label>
                              <br />
                        @endforeach --}}



                  @endisset
            </div>

      </div>
</div>
{{-- Form Submit --}}
<div class="px-4 py-3 bg-gray-50 text-right sm:px-6 mt-6 rounded-box">
      <button type="submit"
            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            @isset($create)
                  Create Role
            @else
                  Edit Role
            @endisset
      </button>
</div>
