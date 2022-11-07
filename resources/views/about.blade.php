<x-app-layout>

    @section('pagecdns')
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
        <link href="{{ URL::asset('css/homepage.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/flaticon.css') }}" rel="stylesheet" type="text/css">
    @endsection

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('About Us') }}
        </h2>
    </x-slot>

    @section('content')
        <!-- Start About Area -->
        <section class="about-area ptb-100">
            <div class="grid grid-cols-2 gap-4">
                <div class="about-image">
                    <img src="{{ asset('storage/homepage/blog/8.jpg') }}" alt="image">
                </div>
                <div class="about-content">
                    <h2>WHO Collaborating Center</h2>
                    <p>This recognition for NBTS Sri Lanka, is a result of the strong successful collaborative work with WHO carried out over many years.
                        Declaration of self-sufficiency of blood supply with 100% voluntary, non-remunerated blood donations and hosting of World Blood Donor Day
                        2014 global event in Sri Lanka with great success was the landmark of this process.</p>
                    <h2>Our Team</h2>
                    <ul>
                        <li><i class="flaticon-check-mark"></i>Head of WHO Collaborating Center : Dr. Lakshman Edirisinghe (Director/ National Blood Transfusion
                            Service Sri Lanka)</li>
                        <li><i class="flaticon-check-mark"></i>Dr. Senarath Jayasekara (MBBS,DTM, MD), Senior Consultant Transfusion Physician</li>
                        <li><i class="flaticon-check-mark"></i>Dr. Jeewaka Galhenage (MBBS, DTM, MD), Consultant Transfusion Physician</li>
                        <li><i class="flaticon-check-mark"></i>Dr. Indika de Alwis (MBBS, DTM, MD), Consultant Transfusion Physician</li>
                        <li><i class="flaticon-check-mark"></i>Dr. Pavitha Arewatte (MBBS, DTM, MD), Consultant Transfusion Physician </li>
                        <li><i class="flaticon-check-mark"></i>Dr. Anoja Herath (MD, DTM, MD Tr.Med), Consultant Transfusion Physician</li>
                        <li><i class="flaticon-check-mark"></i>Dr. Kumudu Kuruppu (MD, DTM, MD Tr.Med), Act. Consultant Transfusion Physician</li>
                        <li><i class="flaticon-check-mark"></i>Dr. Nandika Somasiri (MBBS, DTM), Senior Medical Officer</li>
                        <li><i class="flaticon-check-mark"></i>Dr. Senal Rupasinghe (MBBS, DTM), Medical Officer In-charge, Donor Section</li>
                        <li><i class="flaticon-check-mark"></i>Dr. Rajitha Siriwardena (MBBS), Medical Officer In-charge, HLA Laboratory</li>
                        <li><i class="flaticon-check-mark"></i>Dr. Dilani Jayalath (MBBS, DTM) </li>
                        <li><i class="flaticon-check-mark"></i>Dr. Narmada Manawasinghe (MBBS, DTM), Medical Officer In-charge, Teaching & Training Unit</li>
                        <li><i class="flaticon-check-mark"></i>Dr. Chavithri Siriwardena (MBBS, DTM), Medical Officer Planning </li>
                        <li><i class="flaticon-check-mark"></i>Dr. Ruwani Wijesiri (MBBS, DTM)</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End About Area -->

        <!-- Start Our Mission Area -->
        <section class="pt-0 our-mission-area ptb-100">
            <div class="grid grid-cols-2 gap-4">
                <div class="our-mission-content">
                    <h2>Resource persons</h2>
                    <ul>
                        <li><i class="flaticon-check-mark"></i> Dr. Senarath Jayasekara (MBBS,DTM, MD), Senior Consultant Transfusion Physician</li>
                        <li><i class="flaticon-check-mark"></i>Dr. Jeewaka Galhenage (MBBS, DTM, MD), Consultant Transfusion Physician</li>
                        <li><i class="flaticon-check-mark"></i> Dr. Indika de Alwis (MBBS, DTM, MD), Consultant Transfusion Physician</li>
                        <li><i class="flaticon-check-mark"></i> Dr. Pavitha Arewatte (MBBS, DTM, MD), Consultant Transfusion Physician </li>
                        <li><i class="flaticon-check-mark"></i> Dr. Anoja Herath (MD, DTM, MD Tr.Med), Consultant Transfusion Physician</li>
                        <li><i class="flaticon-check-mark"></i>Dr. Kumudu Kuruppu (MD, DTM, MD Tr.Med), Act. Consultant Transfusion Physician</li>
                        <li><i class="flaticon-check-mark"></i> Dr. Nandika Somasiri (MBBS, DTM), Senior Medical Officer</li>
                        <li><i class="flaticon-check-mark"></i>Dr. Senal Rupasinghe (MBBS, DTM), Medical Officer In-charge, Donor Section</li>
                        <li><i class="flaticon-check-mark"></i> Dr. Rajitha Siriwardena (MBBS), Medical Officer In-charge, HLA Laboratory</li>
                        <li><i class="flaticon-check-mark"></i> Dr. Dilani Jayalath (MBBS, DTM) </li>
                        <li><i class="flaticon-check-mark"></i> Dr. Narmada Manawasinghe (MBBS, DTM), Medical Officer In-charge, Teaching & Training Unit</li>
                        <li><i class="flaticon-check-mark"></i>Dr. Chavithri Siriwardena (MBBS, DTM), Medical Officer Planning </li>
                        <li><i class="flaticon-check-mark"></i>Dr. Ruwani Wijesiri (MBBS, DTM)</li>
                    </ul>
                </div>
                <div class="our-mission-image">
                    <img src="{{ asset('storage/homepage/blog/6.jpg') }}" alt="image">
                </div>
            </div>
        </section>
        <!-- End Our Mission Area -->
    @endsection

</x-app-layout>
