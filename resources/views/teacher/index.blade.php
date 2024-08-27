@extends('layout.master')

@section('content')

    <head>
        <!-- Other head content -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    </head>

    <a href="{{ URL('teacher/create') }}" class="btn btn-primary mb-3">
        Add Teacher
    </a>

    <h5>TEACHER LIST</h5>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Teacher Name</th>
                <th>Rooms  Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $teacher)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $teacher->name }}</td>
                    <td>
                        <ul>
                            @foreach ($teacher->rooms as $room)
                                <li>{{ $room->name }}</li>
                            @endforeach
                        </ul>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ URL('teacher/' . $teacher->id . '/edit') }}" class="btn btn-sm btn-success">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            {{-- <a href="{{ URL('teacher/' . $teacher->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i> show
                            </a> --}}
                            <form action="{{ URL('teacher/' . $teacher->id) }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger ml-3"><i class="fas fa-trash"></i> Delete</button>
                            </form>
                    </td>
                    </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
