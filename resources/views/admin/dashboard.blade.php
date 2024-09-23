@extends('admin.layouts.app')
@section('content')

<style>
.bg-gradient-vibrant1 {
    background: linear-gradient(135deg, #f093fb, #f5576c); /* Vibrant pink and red */
}

.bg-gradient-vibrant2 {
    background: linear-gradient(135deg, #5ee7df, #b490ca); /* Soft teal and purple */
}

.bg-gradient-vibrant3 {
    background: linear-gradient(135deg, #f6d365, #fda085); /* Warm yellow and peach */
}

.bg-gradient-vibrant4 {
    background: linear-gradient(135deg, #84fab0, #8fd3f4); /* Soft green and blue */
}

.info-box {
    border-radius: 10px; /* Add rounded corners for a modern look */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Add a subtle shadow for depth */
}

.info-box-icon {
    font-size: 40px;
    opacity: 0.9;
}

.info-box-content {
    color: white; /* Ensure the text stands out against the gradient background */
}

.progress-description {
    font-weight: bold;
}

a.text-white:hover {
    text-decoration: none; /* Remove underline on hover */
}
.info-box-text {
    font-size: 25px;
     
    font-family: Verdana, Geneva, Tahoma, sans-serif
}


</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <a href="{{ route('customers.index') }}" class="text-white">
                        <div class="info-box bg-gradient-vibrant1">
                            <span class="info-box-icon"><i class="fa fa-user"></i></span>
            
                            <div class="info-box-content">
                                <span class="info-box-text">Customers</span>
                                <span class="info-box-number">{{ App\Models\User::where('role', '=', 'customer')->count() }}</span>
            
                                <div class="progress bg-white"></div>
                                <span class="progress-description">
                                    See more
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            
                <div class="col-md-3 col-sm-6 col-12">
                    <a href="{{ route('events.index') }}" class="text-white">
                        <div class="info-box bg-gradient-vibrant2">
                            <span class="info-box-icon"><i class="fa fa-user"></i></span>
            
                            <div class="info-box-content">
                                <span class="info-box-text">Events</span>
                                <span class="info-box-number">{{ App\Models\Event::count() }}</span>
            
                                <div class="progress  bg-white"></div>
                                <span class="progress-description">
                                    See more
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            
                <div class="col-md-3 col-sm-6 col-12">
                    <a href="{{ route('services.index') }}" class="text-white">
                        <div class="info-box bg-gradient-vibrant3">
                            <span class="info-box-icon"><i class="fa fa-user"></i></span>
            
                            <div class="info-box-content">
                                <span class="info-box-text">Services</span>
                                <span class="info-box-number">{{ App\Models\Service::count() }}</span>
            
                                <div class="progress bg-white"></div>
                                <span class="progress-description">
                                    See more
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            
                <div class="col-md-3 col-sm-6 col-12">
                    <a href="{{ route('bookings.index') }}" class="text-white">
                        <div class="info-box bg-gradient-vibrant4">
                            <span class="info-box-icon"><i class="fa fa-user"></i></span>
            
                            <div class="info-box-content">
                                <span class="info-box-text">Bookings</span>
                                <span class="info-box-number">{{ App\Models\Booking::count() }}</span>
            
                                <div class="progress bg-white"></div>
                                <span class="progress-description">
                                    See more
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
            
        </div>
    </section>

</div>
@endsection