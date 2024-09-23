@extends('admin.layouts.app')
@section('title', 'Events')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('admin.events.create')


                    <button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-dark mt-2">
                        Add New
                    </button>
                    
 
                    <div class="card mt-2 card-dark card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Events</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                            role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $key => $event)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img class="rounded" src="{{ asset('uploads/events').'/'.$event->image }}" width="150" alt="">
                                    </td>
                                    <td>{{ $event->name ?? 'N/A' }}</td>
                                    <td>{{ $event->price }}</td>
 
                                    <td>
                                        <button type="button" data-toggle="modal"
                                            data-target="#editModal{{ $event->id }}"
                                            class="btn btn-sm btn-warning " data-placement="bottom"
                                            data-toggle="tooltip" data-original-title="Edit"><span
                                                class="fa fa-edit"></span></button>
                                        <a onclick="return confirm('are you sure?')"
                                            href="{{ route('events.delete', $event->id) }}"
                                            class="btn btn-sm btn-danger" data-placement="bottom"
                                            data-toggle="tooltip" data-original-title="Delete"><span
                                                class="fa fa-trash"></span></a>

                                     
                                    </td>
                                </tr>
                                @include('admin.events.edit')
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