<header class="header">

    <a data-aos="zoom-in-left" data-aos-delay="150" href="#" class="logo">
        <img style="width:50px;height: 50px" src="{{ asset('logo.jpeg') }}" alt="">
    </a>

    <nav class="navbar">
        <a data-aos="zoom-in-left" data-aos-delay="300" href="/">home</a>
        <a data-aos="zoom-in-left" data-aos-delay="450" href="/about">about</a>
        <a data-aos="zoom-in-left" data-aos-delay="600" href="{{ route('site.events') }}">Events</a>
        <a data-aos="zoom-in-left" data-aos-delay="1200" href="/contact">contact</a>
        @if (Route::has('login'))

            @auth
            <a href="{{ url('/my-bookings') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                My bookings
            </a>
                <a href="{{ url('/logout') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Logout
                </a>
            @else
                <a href="{{ route('login') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Log in
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Register
                    </a>
                @endif
            @endauth

        @endif
    </nav>


    <div class="icons">
        <div data-aos="zoom-in-left" data-aos-delay="1350" class="fas fa-moon" id="theme-btn"></div>
        <div data-aos="zoom-in-left" data-aos-delay="1500" class="fas fa-bars" id="menu"></div>
    </div>


</header>
