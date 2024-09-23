<div class="modal fade" id="editModal{{ $event->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form" method="post" action="{{ route('events.update') }}" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="id" value="{{ $event->id }}" class="form-control">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{ $event->name }}" required class="form-control">
                            </div>
                        </div>

                    
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Price</label>
                                <input type="text" name="price" value="{{ $event->price }}" required class="form-control">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Image</label>
                                <input type="file" name="image" class="form-control">
                                <img class="rounded mt-2" src="{{ asset('uploads/events').'/'.$event->image }}" width="150" alt="">
                            </div>
                        </div>
                        
                    


                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark btn_save">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>



