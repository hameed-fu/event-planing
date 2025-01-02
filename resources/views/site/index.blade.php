@extends('site.layouts.app')
@section('content')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body,
        html {
            height: 100%;
            font-family: Arial, sans-serif;
        }

        .slider {
            position: relative;
            height: 100vh;
            /* Full height of the viewport */
            width: 100%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: black;
        }

        .text-overlay {
            position: absolute;
            top: 20%;
            color: white;
            text-align: center;
            z-index: 10;
            font-size: 2rem;
        }

        .text-overlay h1 {
            font-size: 3rem;
            margin-bottom: 10px;
        }

        .text-overlay p {
            font-size: 1.2rem;
        }

        .slides {
            display: flex;
            width: 100%;
            height: 100%;
            transition: transform 0.5s ease;
        }

        .slide {
            min-width: 100%;
            height: 100%;
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .controls {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
            z-index: 10;
        }

        .prev,
        .next {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            font-size: 30px;
            padding: 10px;
            cursor: pointer;
            border-radius: 50%;
            transition: background-color 0.3s;
        }

        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
    </style>


    <script>
        let index = 0;

        function moveSlide(step) {
            const slides = document.querySelectorAll('.slide');
            const totalSlides = slides.length;

            index = (index + step + totalSlides) % totalSlides;
            const newTransformValue = -index * 100;
            document.querySelector('.slides').style.transform = `translateX(${newTransformValue}%)`;
        }

        setInterval(() => {
            moveSlide(1);
        }, 3000); // Automatically move to the next slide every 3 seconds
    </script>
    <div class="slider">
        <div class="text-overlay">
            <h1>Your Dream Wedding Awaits</h1>
            <p>Celebrate with us and make memories that last forever.</p>
        </div>

        <div class="slides">
            <div class="slide">
                <img src="{{ asset('party1.jpg') }}" alt="Image 1">
            </div>
            <div class="slide">
                <img src="{{ asset('party2.jpeg') }}" alt="Image 2">
            </div>
            <div class="slide">
                <img src="{{ asset('party3.jpeg') }}" alt="Image 3">
            </div>
        </div>

        <div class="controls">
            <span class="prev" onclick="moveSlide(-1)">&#10094;</span>
            <span class="next" onclick="moveSlide(1)">&#10095;</span>
        </div>
    </div>



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
@endsection
