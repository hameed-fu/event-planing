<div class="modal fade" id="editModal{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Teacher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form" method="post" action="{{ route('teachers.update') }}" enctype="multipart/form-data">
                <div class="modal-body">
                @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{ $customer->name }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="{{ $customer->email }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="role" value="teacher">
                    <input type="hidden" name="id" value="{{$customer->id}}">
                    <!-- <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="availability" class="form-label">Availability</label>
                                <select name="availability" id="availability" class="form-control form-select">
                                    <option value="">{{ __("Please Select") }}</option>
                                    <option {{ $customer->availability == 1 ? 'selected' : '' }} value="1">Available</option>
                                    <option {{ $customer->availability == 0 ? 'selected' : '' }} value="0">Not Available</option>
                                </select>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark btn_save">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>