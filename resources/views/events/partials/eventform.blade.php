@section('pagecdns')
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
@endsection

<div>
    <div class="grid grid-cols-6 gap-6">

        {{-- Event Name --}}
        <div class="col-span-6 sm:col-span-3">
            <label for="event_name" class="label">Event Name</label>
            <input type="text" name="event_name" id="event_name" value="{{ old('event_name') }} @isset($event){{ $event->name }} @endisset"
                class="w-full max-w-xs input input-bordered">
        </div>

        {{-- Event Location --}}
        <div class="col-span-6 sm:col-span-3">
            <label for="event_location" class="label">Location</label>
            <input type="text" name="event_location" id="event_location"
                value="{{ old('event_location') }} @isset($event){{ $event->location }} @endisset" class="w-full max-w-xs input input-bordered">
        </div>

        {{-- Event Date --}}
        <div class="col-span-6 sm:col-span-3">
            <label for="date" class="label">Event Date</label>
            @include('events.partials.datepicker')
        </div>

        {{-- Hospital Id --}}
        <div class="col-span-6 sm:col-span-3">
            <label for="event_hospital" class="label">Hospital ID</label>
            <input type="text" name="event_hospital" id="event_hospital" readonly="readonly" value="{{ $hospital->id }}" class="w-full max-w-xs input input-bordered">
        </div>

        {{-- Event Attendance --}}
        <div class="col-span-6 sm:col-span-3">
            <label for="event_attendance" class="label">Attendance</label>
            <input type="text" name="event_attendance" id="event_attendance"
                value="{{ old('event_attendance') }} @isset($event){{ $event->attendance }} @endisset" class="w-full max-w-xs input input-bordered">
        </div>

    </div>
</div>

{{-- Form Submit --}}
<div class="px-4 py-3 mt-6 text-right bg-gray-50 sm:px-6 rounded-box">
    <button type="submit"
        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

        @isset($create)
            Add Event
        @else
            Edit Event
        @endisset

    </button>
</div>

@section('scripts')
    <script type="text/javascript">
        const MONTH_NAMES = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
        ];
        const MONTH_SHORT_NAMES = [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
        ];
        const DAYS = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

        function app() {
            return {
                showDatepicker: false,
                datepickerValue: "",
                selectedDate: "2021-02-04",
                dateFormat: "DD-MM-YYYY",
                month: "",
                year: "",
                no_of_days: [],
                blankdays: [],
                initDate() {
                    let today;
                    if (this.selectedDate) {
                        today = new Date(Date.parse(this.selectedDate));
                    } else {
                        today = new Date();
                    }
                    this.month = today.getMonth();
                    this.year = today.getFullYear();
                    this.datepickerValue = this.formatDateForDisplay(
                        today
                    );
                },
                formatDateForDisplay(date) {
                    let formattedDay = DAYS[date.getDay()];
                    let formattedDate = ("0" + date.getDate()).slice(
                        -2
                    ); // appends 0 (zero) in single digit date
                    let formattedMonth = MONTH_NAMES[date.getMonth()];
                    let formattedMonthShortName =
                        MONTH_SHORT_NAMES[date.getMonth()];
                    let formattedMonthInNumber = (
                        "0" +
                        (parseInt(date.getMonth()) + 1)
                    ).slice(-2);
                    let formattedYear = date.getFullYear();
                    if (this.dateFormat === "DD-MM-YYYY") {
                        return `${formattedDate}-${formattedMonthInNumber}-${formattedYear}`; // 02-04-2021
                    }
                    if (this.dateFormat === "YYYY-MM-DD") {
                        return `${formattedYear}-${formattedMonthInNumber}-${formattedDate}`; // 2021-04-02
                    }
                    if (this.dateFormat === "D d M, Y") {
                        return `${formattedDay} ${formattedDate} ${formattedMonthShortName} ${formattedYear}`; // Tue 02 Mar 2021
                    }
                    return `${formattedDay} ${formattedDate} ${formattedMonth} ${formattedYear}`;
                },
                isSelectedDate(date) {
                    const d = new Date(this.year, this.month, date);
                    return this.datepickerValue ===
                        this.formatDateForDisplay(d) ?
                        true :
                        false;
                },
                isToday(date) {
                    const today = new Date();
                    const d = new Date(this.year, this.month, date);
                    return today.toDateString() === d.toDateString() ?
                        true :
                        false;
                },
                getDateValue(date) {
                    let selectedDate = new Date(
                        this.year,
                        this.month,
                        date
                    );
                    this.datepickerValue = this.formatDateForDisplay(
                        selectedDate
                    );
                    // this.$refs.date.value = selectedDate.getFullYear() + "-" + ('0' + formattedMonthInNumber).slice(-2) + "-" + ('0' + selectedDate.getDate()).slice(-2);
                    this.isSelectedDate(date);
                    this.showDatepicker = false;
                },
                getNoOfDays() {
                    let daysInMonth = new Date(
                        this.year,
                        this.month + 1,
                        0
                    ).getDate();
                    // find where to start calendar day of week
                    let dayOfWeek = new Date(
                        this.year,
                        this.month
                    ).getDay();
                    let blankdaysArray = [];
                    for (var i = 1; i <= dayOfWeek; i++) {
                        blankdaysArray.push(i);
                    }
                    let daysArray = [];
                    for (var i = 1; i <= daysInMonth; i++) {
                        daysArray.push(i);
                    }
                    this.blankdays = blankdaysArray;
                    this.no_of_days = daysArray;
                },
            };
        }
    </script>
@endsection
