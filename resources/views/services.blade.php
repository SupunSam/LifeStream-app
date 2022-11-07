<x-app-layout>

    @section('pagecdns')
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
        <link href="{{ URL::asset('css/homepage.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/flaticon.css') }}" rel="stylesheet" type="text/css">
    @endsection

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Services') }}
        </h2>
    </x-slot>

    @section('content')
        <!-- Start Page Title Area -->
        <section class="pt-10 mb-10 page-title-area page-title-bg3">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            <h2 class="mb-6">Our Services</h2>
                            <button class="btn btn-primary">Make Appointment <i class="flaticon-right-chevron"></i></button>
                            <button class="btn btn-primary">Blood Donation Camp Appointment <i class="flaticon-right-chevron"></i></button>
                            <button class="btn btn-primary">Blood Appointment <i class="flaticon-right-chevron"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Page Title Area -->

        <!-- Start About Area -->
        <section class="mb-10 about-area ptb-100">
            <div class="grid grid-cols-2 gap-4">
                <div class="about-image">
                    <img src="{{ asset('storage/homepage/blog/1.jpg') }}" alt="image">
                </div>
                <div class="about-content">
                    <h2>Our Healthcare Services</h2>
                    <p>Blood banking is the process that takes place in the lab to make sure that donated blood, or blood products, are safe before they are used in
                        blood transfusions and other medical procedures. Blood banking includes typing the blood for transfusion and testing for infectious diseases.
                    </p>
                </div>
            </div>
        </section>
        <!-- End About Area -->


        <!-- Start Main Services Area -->
        <section class="pt-0 main-services-area ptb-100">
            <div class="grid grid-cols-2 gap-4">

                <div class="main-services-box">
                    <div class="icon">
                        <i class="flaticon-cancer"></i>
                    </div>
                    <h3><a href="#">Donation Testing Services</a></h3>
                    <p>TTI Testing (Microbiology) Laboratory Performs testing of Donor blood specimens for TTI markers of HIV, HBV, HCV and Syphilis infections. Donor
                        Grouping Laboratory
                        Performs testing of Donor blood specimens for ABO and Rh D grouping. Routine working hours - 8.00am – 4.00pm on week days
                        8.00am – 12.00pm on Saturdays</p>
                </div>

                <div class="main-services-box">
                    <div class="icon">
                        <i class="flaticon-liver"></i>
                    </div>
                    <h3><a href="#">Compatibility Testing Services</a></h3>
                    <p>This section performs Pre Transfusion Testing on patient samples sent from various hospitals to ensure the compatibility of blood products
                        issued for patients. Hours of the day including weekdays, weekends and public holidays</p>
                </div>

                <div class="main-services-box">
                    <div class="icon">
                        <i class="flaticon-kidney"></i>
                    </div>
                    <h3><a href="#">Hstocompatibility Testing services</a></h3>
                    <p>Provides testing for Class I and Class II HLA by serologic techniques for purposes such as bone marrow and solid organ transplant donor
                        /patient testing, disease association studies and paternity evaluation. Tests include HLA Class I & II typing, antibody
                        screening/identification and cross matching.
                    </p>
                </div>

                <div class="main-services-box">
                    <div class="icon">
                        <i class="flaticon-ekg"></i>
                    </div>
                    <h3><a href="#">Referenece Laboratary Service</a></h3>
                    <p>Performs solving of Blood Group Serology problems referred by various hospital Blood Banks such as Blood Grouping anomalies, Compatibility
                        testing problems. Also carries out special RCI tests like Red Cell Phenotyping, Antibody identification and titration, testing for Cold
                        agglutinins etc.</p>
                </div>
            </div>
        </section>
    @endsection

</x-app-layout>
