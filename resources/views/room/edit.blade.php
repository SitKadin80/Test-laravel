{{-- @extends('layout.master')

@section('content')
<div class="container">
<form action="{{URL('room/'.$data->id)}}" method="POST" class="bg-light mt-5">
    
<input type="hidden" name="_token" value="{{ csrf_token() }}">
{{ method_field('PUT') }}
    <div class="modal-body">
        <h5 class="modal-title mb-3" id="addStudentModalLabel">Update room</h5>
        <div class="mb-3">
            <label for="roomName" class="form-label">Room Name</label>
            <input type="hidden" name="id" value="{{ $data->id }}">
            <div class="form-group">
              <label for="exampleInputEmail1"></label>
              <br/>
            <input type="text" class="form-control" id="roomName" name="name" value="{{$data->name}}" placeholder="Enter room name" required>
        </div>
    </div>
    <div class="modal-footer">
    <a href="{{ URL('room') }}" class="btn btn-secondary">
        Cancel</a>

    <button type="submit" class="btn btn-success ms-2">Save changes</button>
</div>
</form>
</div>
@endsection --}}



@extends('layout.master')
@section('content')
<a class="btn btn-outline-secondary" href="{{ URL('room') }}">Back</a>

    <p>Edit Room</p>

    <form style="margin-top: 50px" action="{{ URL('room/'.$data->id) }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    {{ method_field('PUT') }}
    <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="form-group">
          <label for="exampleInputEmail1"></label>
          <br/>
          <input type="text" name="name" value="{{ $data->name }}" class="form-control" placeholder="Enter name">
          @if($errors->has('name'))
      <div style="color: red;">{{ $errors->first('name') }}</div>
    @endif
          <br/>
        
          <br/>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>


@endsection

