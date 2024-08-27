@extends('layout.master')

@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3>Teacher Details</h3>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4 font-weight-bold">Teacher Name:</div>
                <div class="col-md-5">{{ $data->name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 font-weight-bold">Room Name:</div>
                <div class="col-md-5">{{ $data->room->name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 font-weight-bold">Room ID:</div>
                <div class="col-md-5">{{ $data->room->id }}</div>
            </div>
        </div>
    </div>
</div>

@endsection
