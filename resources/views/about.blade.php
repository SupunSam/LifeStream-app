<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('About Us') }}
        </h2>
    </x-slot>

    @section('content')
        {{-- Details Card --}}
        <div class="col-span-1 shadow-lg xl:col-span-3 card bg-base-100">
            <div class="card-body">
                <h2 class="my-4 text-4xl font-bold card-title">Lifestream.net</h2>
                <div class="mb-4 space-x-2 card-actions">
                    <div class="badge badge-ghost">Best Blood</div>
                    <div class="badge badge-ghost">Best Hospitals</div>
                    <div class="badge badge-ghost">Best Donor Service</div>
                </div>
                <p>Welcome to Lifestream.net We're dedicated to providing you the very best of our service. Our objective is to alter people's eating habits. It has a lot of
                    ambition, but so do we. And we'll need folks like you to assist us. Founded in 2021 by Team Six, Lifestream.net has come a long way from its beginnings
                    in city of Colombo.</p>
                <p>When Team Six first started out, their passion for modern era drove them to start their own business. We hope you enjoy our services as much as we
                    enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.</p>
                <div class="justify-end space-x-2 card-actions">
                    <a href="{{ route('contact') }}" class="btn btn-primary">Contact Us</a>
                    <button href="{{ route('register') }}" class="btn">Register Now</button>
                </div>
            </div>
        </div>
    @endsection

</x-app-layout>
