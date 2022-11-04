{{-- Home Content --}}
@section('pagecdns')
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
@endsection

<div class="h-auto sliderAx">
    <div id="slider-1" class="container mx-auto">
        <div class="object-fill h-auto px-10 py-24 text-black bg-center bg-cover rounded-lg" style="background-image: url({{ asset('img/blood1.jpg') }})">
            <div class="md:w-1/2">
                <p class="text-sm font-bold uppercase">Services</p>
                <p class="text-3xl font-bold">Hello Blood Donors</p>
                <p class="mb-10 text-2xl leading-none">Give the Gift of Life. Donate Blood...</p>
                <a href="#" class="px-8 py-4 text-xs font-bold text-white uppercase bg-purple-800 rounded hover:bg-gray-200 hover:text-gray-800">Contact us</a>
            </div>
        </div> <!-- container -->
        <br>
    </div>

    <div id="slider-2" class="container mx-auto">
        <div class="object-fill h-auto px-10 py-24 text-black bg-top bg-cover rounded-lg" style="background-image: url({{ asset('img/blood2.jpg') }})">
            <p class="text-sm font-bold uppercase">Services</p>
            <p class="text-3xl font-bold">Hello Blood Donors</p>
            <p class="mb-10 text-2xl leading-none">Give the Gift of Life. Donate Blood...</p>
            <a href="#" class="px-8 py-4 text-xs font-bold text-white uppercase bg-purple-800 rounded hover:bg-gray-200 hover:text-gray-800">Contact us</a>
        </div> <!-- container -->
        <br>
    </div>
</div>
<div class="flex justify-between w-12 pb-2 mx-auto">
    <button id="sButton1" onclick="sliderButton1()" class="w-4 pb-2 bg-purple-400 rounded-full "></button>
    <button id="sButton2" onclick="sliderButton2() " class="w-4 p-2 bg-purple-400 rounded-full"></button>
</div>


{{-- Donor Feedback --}}
<div class="grid grid-cols-1 gap-6 mt-6 xl:grid-cols-3 sm:gap-6">

    @foreach ($hospitals as $hospital)
        <div class="shadow-xl card image-full">
            <figure>
                <img src="{{ asset($hospital->hsptl_cover) }}">
            </figure>
            <div class="justify-end card-body">
                <h2 class="text-3xl card-title">{{ $hospital->hsptl_name }}</h2>
                <p class="line-clamp-5">{{ $hospital->hsptl_desc }}</p>
                <div class="card-actions">
                    <a class="btn btn-primary" href="{{ route('hospital.show', $hospital->id) }}">View More</a>
                </div>
            </div>
        </div>
    @endforeach

</div>


{{-- Details Card --}}
<div class="col-span-1 mt-6 shadow-lg xl:col-span-3 card bg-base-100">
    <div class="card-body">
        <h2 class="my-4 text-4xl font-bold card-title">Be the reason for someone's heartbeat.</h2>
        <div class="mb-4 space-x-2 card-actions">
            <div class="badge badge-ghost">Donate Blood</div>
            <div class="badge badge-ghost">Save Lives</div>
            <div class="badge badge-ghost">Humanity at best</div>
        </div>
        <p>You can donate or request blood from the best hospitals in Sri Lanka from our website. Save lives</p>
        <div class="justify-end space-x-2 card-actions">
            <button class="btn btn-primary">Login</button>
            <button class="btn">Register</button>
        </div>
    </div>
</div>


{{-- Ordering Steps --}}
<div class="col-span-1 p-8 mt-6 shadow-lg xl:col-span-3 card bg-base-100">
    <ul class="w-full steps">
        <li class="step step-primary">Register</li>
        <li class="step step-primary">Choose Required Blood</li>
        <li class="step">Place Blood Request</li>
        <li class="step">Save a Life</li>
    </ul>
</div>

@section('scripts')
    <script>
        var cont = 0;

        function loopSlider() {
            var xx = setInterval(function() {
                switch (cont) {
                    case 0: {
                        $("#slider-1").fadeOut(400);
                        $("#slider-2").delay(400).fadeIn(400);
                        $("#sButton1").removeClass("bg-purple-800");
                        $("#sButton2").addClass("bg-purple-800");
                        cont = 1;
                        break;
                    }
                    case 1: {
                        $("#slider-2").fadeOut(400);
                        $("#slider-1").delay(400).fadeIn(400);
                        $("#sButton2").removeClass("bg-purple-800");
                        $("#sButton1").addClass("bg-purple-800");
                        cont = 0;
                        break;
                    }
                }
            }, 8000);
        }

        function reinitLoop(time) {
            clearInterval(xx);
            setTimeout(loopSlider(), time);
        }

        function sliderButton1() {
            $("#slider-2").fadeOut(400);
            $("#slider-1").delay(400).fadeIn(400);
            $("#sButton2").removeClass("bg-purple-800");
            $("#sButton1").addClass("bg-purple-800");
            reinitLoop(4000);
            cont = 0
        }

        function sliderButton2() {
            $("#slider-1").fadeOut(400);
            $("#slider-2").delay(400).fadeIn(400);
            $("#sButton1").removeClass("bg-purple-800");
            $("#sButton2").addClass("bg-purple-800");
            reinitLoop(4000);
            cont = 1
        }
        $(window).ready(function() {
            $("#slider-2").hide();
            $("#sButton1").addClass("bg-purple-800");
            loopSlider();
        });
    </script>
@endsection
