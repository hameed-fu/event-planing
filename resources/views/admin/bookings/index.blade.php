@extends('admin.layouts.app')
@section('title', 'vendors')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        {{-- @include('admin.vendors.create')
                    <button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-dark mt-2">
                        Add New
                    </button> --}}
                        <div class="card mt-2 card-dark card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Bookings</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                    role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th>Customer</th>
                                            <th>Event</th>
                                            <th>Services</th>
                                            <th>Payment Method/Amount</th>
                                            <th>Status</th>
                                            <th>Address</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bookings as $key => $booking)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $booking->customer->name }}</td>
                                                <td>

                                                    {{ $booking->vendor->name ?? 'N/A' }}


                                                </td>
                                                <td>

                                                    @if ($booking->services->count())
                                                        <ul>
                                                            @foreach ($booking->services as $service)
                                                                <li>{{ $service->name }}</li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <span>No services available</span>
                                                    @endif
                                                </td>

                                                <td class="text-capitalize">

                                                    <div> {{ str_replace('_', ' ', $booking->payment_method) }}</div>
                                                    <div>
                                                        <div class="badge bg-success"> {{ $booking->amount }}</div>
                                                    </div>
                                                    <div>

                                                        @if ($booking->payment_method == 'online_transfer')
                                                            <button data-toggle="modal"
                                                                data-target="#myModal{{ $booking->id }}"
                                                                class="btn btn-sm btn-info"><span
                                                                    class="fa fa-eye"></span></button>
                                                        @endif
                                                    </div>

                                                    <div class="modal fade" id="myModal{{ $booking->id }}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <!-- Modal Header -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Payment Receipt</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal">&times;</button>
                                                                </div>

                                                                <!-- Modal body -->
                                                                <div class="modal-body">
                                                                    <img width="100%"
                                                                        src="{{ asset('uploads/payment_receipt') . '/' . $booking->payment_proof }}"
                                                                        alt="">
                                                                        <hr>
                                                                        <div>
                                                                            <strong>Pay via</strong>
                                                                            {{ $booking->bank }}
                                                                        </div>
                                                                </div>

                                                                <!-- Modal footer -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $booking->address }}</td>
                                                <td>
                                                    @if($booking->status )
                                                        <a href="{{ route('bookings.status_change',['id' => $booking->id, 'status' => 0]) }}" class="btn btn-sm btn-primary "> Approved</a>
                                                    @else
                                                    <a href="{{ route('bookings.status_change',['id' => $booking->id, 'status' => 1]) }}" class="btn btn-sm btn-danger ">Pending</a>
                                                    @endif
                                                </td>

                                                <td>
                                                   
                                                    <a onclick="return confirm('are you sure?')"
                                                        href="{{ route('bookings.delete', $booking->id) }}"
                                                        class="btn btn-sm btn-danger" data-placement="bottom"
                                                        data-toggle="tooltip" data-original-title="Delete"><span
                                                            class="fa fa-trash"></span></a>


                                                </td>
                                            </tr>
                                            {{-- @include('admin.vendors.edit') --}}
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
