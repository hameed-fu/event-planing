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

        .booking-card {
        margin-left: 5px;
        padding: 20px;
        width: 30%;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .booking-title {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
    }

    .inputBox {
        margin-bottom: 15px;
    }

    .inputBox label {
        display: block;
        margin-bottom: 5px;
        font-size: 14px;
        font-weight: bold;
    }

    .inputBox input,
    .inputBox select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    .inputBox input:read-only {
        background-color: #f9f9f9;
    }

    .payment-options {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
    }

    .payment-options label {
        font-size: 14px;
    }

    #online-transfer-section {
        margin-top: 15px;
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .btn {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #0056b3;
    }

        .booking-title {
            font-size: 30px;
            margin-bottom: 10px
        }

        .service-list {
            font-size: 20px
        }

        /* Loading overlay styles */
        #loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 9999;
            display: none;
            /* Hidden by default */
        }

        #loading-overlay.active {
            display: block;
            /* Show when active class is added */
        }
    </style>


    <section class="plan" id="plan" style="margin-top: 100px;margin-bottom:100px">

        <div class="box-container">
            <h1 class="heading">{{ $event->name }}</h1>
        </div>
        <div class="container">


            <div class="event-card col-7" data-aos="zoom-in-up" data-aos-delay="150">
                <div class="event-image">
                    <img src="{{ asset('uploads/events') . '/' . $event->image }}" alt="{{ $event->name }}">
                </div>
                <div class="event-content">
                    <h4 class="event-title">{{ $event->name }}</h4>
                    <h3 class="event-price">{{ $event->price }}<span></span></h3>
                    <p>{{ $event->description }}</p>

                </div>
            </div>
            @auth
                <div id="loading-overlay">
                    <!-- You can put a spinner or text here -->
                    <p style="color:white; text-align:center; font-size:24px; margin-top:20%;">Processing your request...</p>
                </div>
                <div class="booking-card">
                  <h1 class="booking-title">Book Now</h1>
                  <form id="booking-form" enctype="multipart/form-data">
                      <!-- Customer Info -->
                      <div class="inputBox">
                          <label>Full Name</label>
                          <input type="text" readonly value="{{ auth()->user()->name }}">
                      </div>
              
                      <div class="inputBox">
                          <label>Email</label>
                          <input type="text" readonly value="{{ auth()->user()->email }}">
                      </div>
              
                      <div class="inputBox">
                          <label>Amount</label>
                          <input type="text" readonly value="{{ $event->price }}" name="amount">
                      </div>
              
                      <div class="inputBox">
                          <label for="contact_no">Contact No</label>
                          <input type="text" name="contact_no" required>
                      </div>
              
                      <div class="inputBox">
                          <label for="address">Address</label>
                          <input type="text" name="address" required placeholder="Enter your address">
                      </div>
              
                      <div class="inputBox">
                          <label for="perform_on">Date</label>
                          <input type="date" required min="{{ date('Y-m-d') }}" name="perform_on" value="{{ date('Y-m-d') }}">
                      </div>
              
                      <!-- Vendor Selection -->
                      <div class="inputBox">
                          <label for="vendor-select">Vendor</label>
                          <select name="vendor_id" required id="vendor-select">
                              <option value="">Please Select</option>
                              @foreach ($vendors as $vendor)
                                  <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                              @endforeach
                          </select>
                      </div>
              
                      <!-- Service List -->
                      <div class="inputBox">
                          <ul id="service-list">
                              <li>Please select a vendor first</li>
                          </ul>
                      </div>
              
                      <!-- Payment Method -->
                      <div class="payment-options">
                          <label>
                              <input type="radio" name="payment_method" value="online_transfer" id="online-transfer-radio">
                              Online Transfer
                          </label>
                          <label>
                              <input type="radio" name="payment_method" value="pay_after_booking" id="pay-after-booking-radio">
                              Pay after Booking
                          </label>
                      </div>
              
                      <!-- Online Transfer Section (hidden by default) -->
                      <div id="online-transfer-section" style="display: none;" class="inputBox">
                          <label for="bank-select">Select Bank:</label>
                          <select id="bank-select" name="bank">
                              <option value="">Please Select</option>
                              <option value="Easypaisa">Easypaisa - 8998989898</option>
                              <option value="Jazzcash">Jazzcash - 987678987</option>
                              <option value="UBL">UBL - 12345678</option>
                          </select>
              
                          <label for="payment-receipt">Upload Payment Receipt:</label>
                          <input type="file" id="payment-receipt" name="payment_receipt">
                      </div>
              
                      <input type="hidden" name="customer_id" readonly value="{{ auth()->user()->id }}">
              
                      <button type="submit" class="btn">Submit Booking</button>
                  </form>
              </div>
            @endauth


        </div>

    </section>

    <script>
        const onlineTransferRadio = document.getElementById('online-transfer-radio');
        const payAfterBookingRadio = document.getElementById('pay-after-booking-radio');
        const onlineTransferSection = document.getElementById('online-transfer-section');

        onlineTransferRadio.addEventListener('change', function() {
            if (onlineTransferRadio.checked) {
                onlineTransferSection.style.display = 'block';
            }
        });

        payAfterBookingRadio.addEventListener('change', function() {
            if (payAfterBookingRadio.checked) {
                onlineTransferSection.style.display = 'none';
            }
        });

        document.getElementById('booking-form').addEventListener('submit', function(e) {
            e.preventDefault(); 

            const formData = new FormData(this);
            const loadingOverlay = document.getElementById('loading-overlay');

            // Show loading overlay
            loadingOverlay.classList.add('active');

            axios.post('/booking/save', formData)
                .then(response => {
                    alert(response.data.message);
                    loadingOverlay.classList.remove('active');
                    window.location.href = '/booking-success'; // Redirect to success page
                })
                .catch(error => {
                    console.log(error.response.data);
                    loadingOverlay.classList.remove('active');
                    alert('Error occurred while booking.');
                });
        });

        // Show/Hide bank and file input for online transfer
        document.getElementById('online-transfer-radio').addEventListener('change', function() {
            document.getElementById('online-transfer-section').style.display = 'block';
        });

        document.getElementById('pay-after-booking-radio').addEventListener('change', function() {
            document.getElementById('online-transfer-section').style.display = 'none';
        });
    </script>

    <script type="text/javascript">
        document.getElementById('vendor-select').addEventListener('change', function() {
            var vendorId = this.value;

            if (vendorId) {

                axios.get('/get-services/' + vendorId)
                    .then(function(response) {
                        var serviceList = document.getElementById('service-list');

                        serviceList.innerHTML = '';

                        response.data.forEach(function(service) {
                            var li = document.createElement('li');
                            li.textContent = service.name;
                            serviceList.appendChild(li);
                        });
                    })
                    .catch(function(error) {
                        console.error('Error fetching services:', error);
                    });
            } else {

                document.getElementById('service-list').innerHTML = '<li>Please select a vendor first</li>';
            }
        });
    </script>
@endsection
