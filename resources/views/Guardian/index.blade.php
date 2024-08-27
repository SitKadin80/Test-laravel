@extends('layout.master')

@section('content')
<head>
    <!-- Other head content -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

    <a href="{{ URL('formparentcreate') }}" class="btn btn-primary mb-3">
    Add Parent
    </a>

    <h5>PARENT LIST</h5>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Parent Name</th>
                <th>Student Name</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($parents as $index => $parent)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $parent->name }}</td>
                    <td>{{ $parent->student ? $parent->student->name : 'N/A' }}</td>
                    <td>{{ $parent->phone_number }}</td>
                    <td>
                        <a href="{{ URL('formParentUpdate/'.$parent->id) }}" class="btn btn-info">
                            <i class="fas fa-edit"></i> Edit
                        </a> 
                        <a href="{{ URL('parentDelete/'.$parent->id) }}" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash-alt"></i> Delete
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
