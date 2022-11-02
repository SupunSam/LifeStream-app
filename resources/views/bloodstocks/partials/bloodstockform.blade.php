@csrf
<div>
    <div class="grid grid-cols-6 gap-6">
        {{-- Blood Name --}}
        <div class="col-span-6 sm:col-span-3">
            <label for="bloodstock_name" class="block text-sm font-medium text-gray-700">Blood Group</label>
            <input type="text" name="bloodstock_name" id="bloodstock_name"
                value="{{ old('name') }} @isset($bloodstock){{ $bloodstock->bloodstock_name }} @endisset"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        {{-- Blood Category --}}
        <div class="col-span-6 sm:col-span-3">
            <label for="bloodstock_group" class="block text-sm font-medium text-gray-700">Blood Group</label>
            <select class="w-full max-w-xs select select-error" id="bloodstock_group">
                <option disabled selected>Select the Blood Group</option>
                @foreach ($bldtypes['data'] as $bldtype)
                    <option value="{{ $bldtype->id }}">{{ $bldtype->bloodtype_name }}</option>
                @endforeach
            </select>
        </div>
        {{-- Blood Category --}}
        {{-- <div class="col-span-6 sm:col-span-3">
            <label for="bloodstock_group" class="block text-sm font-medium text-gray-700">Hospital ID</label>
            <input type="text" name="bloodstock_group" id="bloodstock_group"
                value="{{ old('bloodstock_group') }} @isset($bloodstock){{ $bloodstock->bloodstock_group }} @endisset"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div> --}}
        {{-- Blood Description --}}
        <div class="col-span-6 sm:col-span-3">
            <label for="bloodstock_source" class="block text-sm font-medium text-gray-700">Blood Source</label>
            <input type="text" name="bloodstock_source" id="bloodstock_source"
                value="{{ old('bloodstock_source') }} @isset($bloodstock){{ $bloodstock->bloodstock_source }} @endisset"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        {{-- Blood Price --}}
        <div class="col-span-6 sm:col-span-3">
            <label for="bloodstock_count" class="block text-sm font-medium text-gray-700">Blood Count</label>
            <input type="text" name="bloodstock_count" id="bloodstock_count"
                value="{{ old('bloodstock_count') }} @isset($bloodstock){{ $bloodstock->bloodstock_count }} @endisset"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
