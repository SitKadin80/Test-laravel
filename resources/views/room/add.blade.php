@extends('layout.master')
@section('content')
<a href="{{ URL('room') }}">Back</a>
<div class="container">
    <form action="{{ URL('room')}}" method="POST" class="bg-light mt-5">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      
        <div class="modal-body">
            <h5 class="modal-title" id="addStudentModalLabel">Add New Room</h5>
            
            <div class="mb-3">
                <label for="roomName" class="form-label">Room Name</label>
                <input type="text" class="form-control" id="roomName" name="name" placeholder="Enter room name" required>
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{URL('room')}}"class="btn btn-secondary">
                Cancel</a>
            <button type="submit" class="btn btn-info ms-2">Save changes </button>
        </div>
    </form>
</div>
@endsection


