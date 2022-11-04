@csrf
<div>
    <div class="flex items-center justify-center">
        <div class="relative mb-3 datepicker form-floating xl:w-96">
            <input type="text"
                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                placeholder="Select a date" />
            <label for="floatingInput" class="text-gray-700">Select a date</label>
        </div>
    </div>
    <div class="grid grid-cols-6 gap-6">
        {{-- Hospital Name --}}
        <div class="col-span-6 sm:col-span-3">
            <label for="bldstk_hospital" class="label">Hospital ID</label>
            <input type="text" name="bldstk_hospital" id="bldstk_hospital" disabled value="{{ $hospital->id }}" class="w-full max-w-xs input input-bordered">
        </div>

        {{-- Blood Source --}}
        <div class="col-span-6 sm:col-span-3">
            <label for="bldstk_source" class="label">Blood Source</label>
            <input type="text" name="bldstk_source" id="bldstk_source"
                value="{{ old('bloodstock_source') }} @isset($event){{ $event->bloodstock_source }} @endisset"
                class="w-full max-w-xs input input-bordered">
        </div>
        {{-- Blood Count --}}
        <div class="col-span-6 sm:col-span-3">
            <label for="bldstk_count" class="label">Blood Count</label>
            <input type="text" name="bldstk_count" id="bldstk_count"
                value="{{ old('bloodstock_count') }} @isset($event){{ $event->bloodstock_count }} @endisset"
                class="w-full max-w-xs input input-bordered">
        </div>

    </div>
</div>

{{-- Form Submit --}}
<div class="px-4 py-3 mt-6 text-right bg-gray-50 sm:px-6 rounded-box">
    <button type="submit"
        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

        @isset($create)
            Add BloodStock
        @else
            Edit BloodStock
        @endisset

    </button>
</div>
