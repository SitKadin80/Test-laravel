@extends('layout.master')
@section('content')
<div class="container">
    <form action="{{ URL('parentCreate') }}" method="POST" class="bg-light mt-5">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="modal-body">
            <h5 class="modal-title" id="addParentModalLabel">Add New Parent</h5>
            
            <div class="mb-3">
                <label for="parentName" class="form-label">Parent Name</label>
                <input type="text" class="form-control" id="parentName" name="name" placeholder="Enter parent name" required>
            </div>
            
            <div class="mb-3">
                <label for="studentId" class="form-label">Student ID</label>
                <input type="text" class="form-control" id="studentId" name="student_id" placeholder="Enter student ID" required>
            </div>
            
            <div class="mb-3">
                <label for="phoneNumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phoneNumber" name="phone_number" placeholder="Enter phone number" required>
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{ URL('room') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-success ms-2">Save changes</button>
        </div>
    </form>
</div>
@endsection
