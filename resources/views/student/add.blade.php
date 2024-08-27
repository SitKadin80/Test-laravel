{{-- 
@extends('layout.master')

@section('content')

    <a href="{{ URL('student') }}">Back</a>

    <p>Add Student</p>

    <form style="margin-top: 50px" action="{{ URL('student') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <br/>
          <input type="text" name="name" class="form-control" placeholder="Enter name">
          <br/>
        </div>
        <div class="form-group">
          <select class="w-full" name="room_id">
            @foreach ($rooms as $room)
              <option value="{{ $room->id }}">{{ $room->name }}</option>
            @endforeach
          </select>
        </div>
        <br/>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

@endsection

 --}}
