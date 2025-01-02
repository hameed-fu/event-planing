@extends('site.layouts.app')
@section('content')
    <section class="plan" id="plan" style="margin-top: 100px; margin-bottom: 100px">

        <div class="box-container">
            <section class="contact" id="contact">
                <h1 class="heading"><span>Contact</span> Us</h1>
                @if (session('success'))
                    <div class="success-message">{{ session('success') }}</div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" data-aos="zoom">
                    @csrf

                    <div class="inputBox">
                        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required
                            data-aos="fade-up">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required
                            data-aos="fade-up">
                        @error('email')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="inputBox">
                        <input type="text" style="width: 100%" name="phone" placeholder="Phone Number"
                            value="{{ old('phone') }}" required data-aos="fade-up">
                        @error('phone')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <textarea name="message" placeholder="Your Message" id="" cols="30" rows="10" required
                        data-aos="fade-up">{{ old('message') }}</textarea>
                    @error('message')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="btn">Send Message</button>
                </form>
            </section>
        </div>
    </section>
@endsection
