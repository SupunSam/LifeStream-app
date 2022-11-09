<form action="{{ route('admin.bloodstocks.transfer') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <div class="flex items-center justify-center mt-12">
        <h1 class="text-5xl font-bold text-error" id="transaction_count">Transaction</h1>
    </div>

    <div class="flex items-center justify-center mt-4">
        <h1 class="text-5xl font-bold text-error">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
            </svg>
        </h1>
    </div>

    <div class="flex items-center justify-center mt-4">
        <button type="submit" class="btn btn-info" href="{{ route('admin.bloodstocks.transfer') }}">Complete</button>
    </div>

    <div class="flex items-center justify-center mt-4">

        <div class="stats bg-primary text-primary-content">

            <div class="stat">
                <h2 id="src_hsptl">Hospital A</h2>
                <div class="stat-title">Current Balance</div>
                <div class="stat-value" id="src_curr_stock">000</div>
                <div class="stat-title">After Balance</div>
                <div class="stat-value" id="src_aftr_stock">000</div>
                <div class="stat-actions">
                    <button class="btn btn-sm btn-warning read-only">Withdrawal</button>
                </div>
            </div>

            <div class="stat">
                <h2 id="dest_hsptl">Hospital B</h2>
                <div class="stat-title">Current Balance</div>
                <div class="stat-value" id="dest_curr_stock">000</div>
                <div class="stat-title">After Balance</div>
                <div class="stat-value" id="dest_aftr_stock">000</div>
                <div class="stat-actions">
                    <button class="btn btn-sm btn-success read-only">Deposit</button>
                </div>
            </div>

        </div>

        {{-- FormRequest Fields --}}
        <input type="text" name="src_hsptl_id" id="src_hsptl_id" value="" hidden />
        <input type="text" name="src_bldstk_id" id="src_bldstk_id" value="" hidden />
        <input type="text" name="src_currstk" id="src_currstk" value="" hidden />
        <input type="text" name="src_aftrstk" id="src_aftrstk" value="" hidden />
        <input type="text" name="dest_hsptl_id" id="dest_hsptl_id" value="" hidden />
        <input type="text" name="dest_bldstk_id" id="dest_bldstk_id" value="" hidden />
        <input type="text" name="dest_currstk" id="dest_currstk" value="" hidden />
        <input type="text" name="dest_aftrstk" id="dest_aftrstk" value="" hidden />

        <input type="text" name="order_id" id="order_id" value="" hidden />
        <input type="text" name="order_item_id" id="order_item_id" value="" hidden />
    </div>

</form>
