@extends('site.layouts.app')
@section('content')
    <style>
        .event-card {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

            transition: transform 0.3s ease;
        }

        .event-card:hover {
            transform: translateY(-10px);
        }

        .event-image img {
            width: 100%;


        }

        .event-content {
            padding: 20px;

        }

        .event-title {
            font-size: 3em;
            color: #333;
            margin-bottom: 10px;
        }

        .event-price {
            font-size: 2em;
            color: #a03382;
            margin-bottom: 20px;
        }

        .event-features {
            list-style: none;
            padding: 0;
            margin-bottom: 20px;
        }

        .event-features li {
            display: flex;

            font-size: 1em;
            color: #666;
            margin: 5px 0;
        }

        .event-features li i {
            color: #a03382;
            margin-right: 10px;
        }

        .event-features li i.fa-times {
            color: #d9534f;
        }

        .btn {
            background-color: #a03382;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-size: 1.5em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #8b2a6f;
        }

        .container {
            display: flex
        }

        .col-7 {
            width: 70%
        }

        .inputBox input,
        select {
            border: 1px slateblue solid;
            width: 100%;
            border-radius: 4px;
            height: 40px;
            font-size: 14px;
            padding: 10px;
            margin-bottom: 10px
        }

        .booking-card {
            background-color: white;
            padding: 10px;
            border-radius: 10px
        }

        .booking-title {
            font-size: 30px;
            margin-bottom: 10px
        }

        .service-list {
            font-size: 20px
        }
    </style>


    <section class="plan" id="plan" style="margin-top: 100px;margin-bottom:100px">

        <div class="box-container">
            <h1 class="heading">Your booking successully submitted</h1>
        </div>
        
    </section>
@endsection
