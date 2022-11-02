@props(['errors'])

@if ($errors->any())
      <div {{ $attributes }}>

            <div class="alert">
                  <div class="flex-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#ff5724" class="flex-shrink-0 w-6 h-6 mx-2">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                              </path>
                        </svg>
                        <label>
                              <h4 class="text-error font-medium">{{ __('Whoops! Something went wrong.') }}</h4>
                              <ul class="text-sm text-error text-semibold list-disc">
                                    @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                    @endforeach
                              </ul>
                        </label>
                  </div>
            </div>



      </div>

@endif
