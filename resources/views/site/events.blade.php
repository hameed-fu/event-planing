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
  height: 200px;
  object-fit: cover;
}

.event-content {
  padding: 20px;
  text-align: center;
}

.event-title {
  font-size: 1.5em;
  color: #333;
  margin-bottom: 10px;
}

.event-price {
  font-size: 1.2em;
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
  align-items: center;
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

</style>
   
   
    <section class="plan" id="plan" style="margin-top: 100px;margin-bottom:100px">

        <div class="box-container">
            <h1 class="heading">Events</h1>
        </div>
        <div class="box-container">
            
            @foreach ($events as $event)
            <div class="event-card" data-aos="zoom-in-up" data-aos-delay="150">
              <div class="event-image">
                <img src="{{ asset('uploads/events').'/'.$event->image }}" alt="{{ $event->name }}">
              </div>
              <div class="event-content">
                <h4 class="event-title">{{ $event->name }}</h4>
                <h3 class="event-price">{{ $event->price }}<span></span></h3>
                <div style="width: 300px">
                  {!! $event->description !!}
                </div>
                <a href="{{ route('site.event.detail', $event->id) }}"><button class="btn">Book Now</button></a>
              </div>
            </div>
          @endforeach
          
        
           
        
        </div>
        
    </section>
    
@endsection


   