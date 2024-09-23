@extends('admin.layouts.app')
@section('title', 'Customers')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    {{-- @include('admin.customers.create')
                    <button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-dark mt-2">
                        Add New
                    </button> --}}
                    <div class="card mt-2 card-dark card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Customers</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <!-- <th>Availability</th> -->
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $key => $customer)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $customer->name ?? 'N/A' }}</td>
                                        <td>{{ $customer->email ?? 'N/A' }}</td>
                                        <!-- <td><span class='badge bg-@{{ $customer->availability ? "success" : "danger" }}'>@{{ $customer->availability ? "Available" : "Not Available" ?? 'N/A' }}</span></td> -->

                                        <td>
                                             
                                            <a onclick="return confirm('are you sure?')"
                                                href="{{ route('customers.delete', $customer->id) }}"
                                                class="btn btn-sm btn-danger" data-placement="bottom"
                                                data-toggle="tooltip" data-original-title="Delete"><span
                                                    class="fa fa-trash"></span></a>

                                           
                                        </td>
                                    </tr>
                                    {{-- @include('admin.customers.edit') --}}
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