<div>
    <div class="grid grid-cols-6 gap-6">
        {{-- User ID --}}
        <div class="col-span-6 sm:col-span-3">
            <label for="usrrqst_user" class="block text-sm font-medium text-gray-700">User Name</label>
            <input type="text" name="usrrqst_user" readonly="readonly" value="{{ $user }}" id="usrrqst_user"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        {{-- Email --}}
        <div class="col-span-6 sm:col-span-3">
            <label for="usrrqst_email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="text" name="usrrqst_email" id="usrrqst_email"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        {{-- Request Type --}}
        <div class="col-span-6">
            <label for="usrrqst_request_type" class="block text-sm font-medium text-gray-700">Request Type</label>
            <input type="text" name="usrrqst_request_type" id="usrrqst_request_type"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        {{-- Description --}}
        <div class="col-span-6">
            <label for="usrrqst_desc" class="block text-sm font-medium text-gray-700">
                Description
            </label>
            <div class="mt-1">
                <textarea id="usrrqst_desc" name="usrrqst_desc" rows="3"
                    class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Test"></textarea>
            </div>
            <p class="mt-2 text-sm text-gray-500">
                Brief description for your request. URLs are hyperlinked.
            </p>

        </div>

    </div>
</div>

{{-- Form Submit --}}
<div class="px-4 py-3 mt-6 text-right bg-gray-50 sm:px-6 rounded-box">
    <button type="submit"
        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Send Request
    </button>
</div>
