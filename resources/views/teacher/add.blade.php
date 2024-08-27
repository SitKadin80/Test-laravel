@extends('layout.master')

@section('content')

    <a href="{{ URL('teacher') }}">Back</a>

    <p>Add Teacher</p>

    @if($errors->has('name'))
      <div style="color: red;">{{ $errors->first('name') }}</div>
    @endif

    <form style="margin-top: 50px" action="{{ URL('teacher') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <br/>
          <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{ old('name') }}">
          <br/>
        </div>

        <div class="form-group">
          <select class="w-full" name="room[]" multiple>
            @foreach ($rooms as $room)
              <option value="{{ $room->id }}">{{ $room->name }}</option>
            @endforeach
          </select>
        </div>

        <br/>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

@endsection