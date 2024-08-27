{{-- @extends('layout.master')

@section('content')

<!-- Trigger button to open the modal -->

<button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#studentDetailsModal">
    View Student Details
</button>

<!-- Modal -->
<div class="modal fade" id="studentDetailsModal" tabindex="-1" aria-labelledby="studentDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Use modal-lg for a larger modal -->
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="studentDetailsModalLabel">Student Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-4 font-weight-bold">Student Name:</div>
                    <div class="col-md-8">{{ $data->name }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 font-weight-bold">Room Name:</div>
                    <div class="col-md-8">{{ $data->room->name }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 font-weight-bold">Room ID:</div>
                    <div class="col-md-8">{{ $data->room->id }}</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection --}}
