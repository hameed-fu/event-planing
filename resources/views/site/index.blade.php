@extends('site.layouts.app')
@section('content')
    <section class="home" id="home">

        <div class="content" data-aos="fade-down">
            <h3>your dream wedding <br> as simple as pie</h3>
            <a href="#" class="btn"> see more info</a>
        </div>

    </section>


    <section class="contact" id="contact">

        <h1 class="heading"> <span>contact</span> us </h1>

        <form action="" data-aos="zoom">

            <div class="inputBox">
                <input type="text" placeholder="name" data-aos="fade-up">
                <input type="email" placeholder="email" data-aos="fade-up">
            </div>

            <div class="inputBox">
                <input type="number" placeholder="number" data-aos="fade-up">
                <input type="date" data-aos="fade-up">
            </div>

            <div class="inputBox">
                <input type="text" placeholder="your address" data-aos="fade-up">
                <select name="plan" data-aos="fade-up">
                    <option value="basic">basic plan</option>
                    <option value="premium">premium plan</option>
                    <option value="ultimate">ultimate plan</option>
                </select>
            </div>

            <textarea name="" placeholder="your message" id="" cols="30" rows="10" data-aos="fade-up"></textarea>

            <a href="#" class="btn">send message</a>

        </form>

    </section>
    
@endsection


   