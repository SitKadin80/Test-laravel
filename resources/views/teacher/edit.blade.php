@extends('layout.master')
@section('content')
<a  href="{{ URL('teacher') }}">Back</a>

    <p>Edit Teacher</p>

    <form style="margin-top: 50px" action="{{ URL('teacher/'.$data->id) }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        {{ method_field('PUT') }}
        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="form-group">
          <br/>
          <input type="text" name="name" value="{{ $data->name }}" class="form-control" placeholder="Enter name">
          @if($errors->has('name'))
      <div style="color: red;">{{ $errors->first('name') }}</div>
    @endif
          <br/>
        </div>
        <br/>
        <div class="form-group">
          <select class="w-full mb-3" name="room[]" multiple>
            @foreach ($rooms as $room)
                <option value="{{ $room->id }}" {{ in_array($room->id, old('room', [])) ? 'selected' : '' }}>
                    {{ $room->name }}
                </option>
            @endforeach
        </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>


@endsection