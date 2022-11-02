<div>
    <div class="grid grid-cols-6 gap-6">
        {{-- Hospital Name --}}
        <div class="col-span-6 sm:col-span-3">
            <label for="hsptl_name" class="block text-sm font-medium text-gray-700">Hospital Name</label>
            <input type="text" name="hsptl_name" id="hsptl_name"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        {{-- Hospital Type --}}
        <div class="col-span-6 sm:col-span-3">
            <label for="hsptl_category" class="block text-sm font-medium text-gray-700">Hospital Category</label>
            <input type="text" name="hsptl_category" id="hsptl_category"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        {{-- Hospital Address --}}
        <div class="col-span-6">
            <label for="hsptl_address" class="block text-sm font-medium text-gray-700">Address</label>
            <input type="text" name="hsptl_address" id="hsptl_address"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        {{-- Hospital City --}}
        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
            <label for="hsptl_city" class="block text-sm font-medium text-gray-700">City</label>
            <input type="text" name="hsptl_city" id="hsptl_city"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

    </div>
</div>

{{-- Hospital Description --}}
<div class="mt-6">
    <label for="hsptl_desc" class="block text-sm font-medium text-gray-700">
        About
    </label>
    <div class="mt-1">
        <textarea id="hsptl_desc" name="hsptl_desc" rows="3"
            class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            placeholder="This is the best seablood hospital around colombo area."></textarea>
    </div>
    <p class="mt-2 text-sm text-gray-500">
        Brief description for your hospital. URLs are hyperlinked.
    </p>

</div>

{{-- Hospital Website --}}
<div class="col-span-3 mt-4 sm:col-span-2">
    <label for="hsptl_web" class="block text-sm font-medium text-gray-700">
        Website
    </label>
    <div class="flex mt-1 rounded-md shadow-sm">
        <span class="inline-flex items-center px-3 text-sm text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50">
            http://
        </span>
        <input type="text" name="hsptl_web" id="hsptl_web"
            class="flex-1 block w-full border-gray-300 rounded-none focus:ring-indigo-500 focus:border-indigo-500 rounded-r-md sm:text-sm" placeholder="www.example.com">
    </div>
</div>

{{-- Hospital Logo --}}
<div class="mt-6">
    <label class="block text-sm font-medium text-gray-700">
        Logo
    </label>
    <div class="flex items-center mt-1">
        <span class="inline-block w-12 h-12 overflow-hidden bg-gray-100 rounded-full">
            <svg class="w-full h-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
        </span>
        <input type="file" name="hsptl_logo" id="hsptl_logo"
            class="px-3 py-2 ml-5 text-sm font-medium leading-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        </input>
    </div>
</div>

{{-- Hospital Cover --}}
<div class="mt-6">
    <label class="block text-sm font-medium text-gray-700">
        Cover Photo
    </label>
    <div class="flex justify-center px-6 pt-5 pb-6 mt-1 border-2 border-gray-300 border-dashed rounded-md">
        <div class="space-y-1 text-center">
            <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                <path
                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <div class="flex text-sm text-gray-600">
                <label for="hsptl_cover"
                    class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                    <span>Upload a file</span>
                    <input id="hsptl_cover" name="hsptl_cover" type="file" class="sr-only">
                </label>
                <p class="pl-1">or drag and drop</p>
            </div>
            <p class="text-xs text-gray-500">
                PNG, JPG, GIF up to 10MB
            </p>
        </div>
    </div>
</div>

{{-- Form Submit --}}
<div class="px-4 py-3 mt-6 text-right bg-gray-50 sm:px-6 rounded-box">
    <button type="submit"
        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Save
    </button>
</div>
