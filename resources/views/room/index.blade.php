@extends('layout.master')

@section('content')

<a href="{{ URL('room/create') }}" class="btn btn-primary mb-3">
    Add Room
</a>

<h5>ROOM LIST</h5>

<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Room Name</th>
            <th>Student Name</th>
            {{-- <th>Teacher Name</th> --}}
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $index => $room)
        <tr>
            <th scope="row">{{ $index + 1 }}</th>
            <td>{{ $room->name }}</td>
            <td>
                <ul>
                    @foreach ($room->students as $student)
                    <li>{{ $student->name }}</li>
                    @endforeach
                </ul>
                
            </td>
            <td>
                <a href="{{ URL('room/'.$room->id.'/edit') }}" class="btn btn-success">
                    <i class="fas fa-edit"></i> Edit
                 </a>
                <form action="{{ URL('room/'.$room->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger ml-3"><i class="fas fa-trash"></i> Delete</button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection