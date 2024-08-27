@extends('layout.master')

@section('content')
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createStudentModal">
        Add Student
    </button>

    <h5>STUDENT LIST</h5>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark  ">
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Room Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $key => $student)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->room->name }}</td>
                    <td>
                        <div class="action-buttons">
                            <!-- Edit Button -->
                            <button class="btn btn-sm btn-success" data-bs-toggle="modal"
                                data-bs-target="#editStudentModal{{ $student->id }}">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <!-- View Button -->
                            <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#studentDetailsModal{{ $student->id }}">
                                <i class="fas fa-eye"></i> View
                            </button>
                            <!-- Delete Button -->
                            <form action="{{ URL('student/' . $student->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ms-2"><i class="fas fa-trash"></i>
                                    Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <!-- CreateStudentModal -->
                <div class="modal fade" id="createStudentModal" tabindex="-1" aria-labelledby="createStudentModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ URL('student') }}" method="POST">
                                @csrf
                                <div class="modal-header bg-success">
                                    <h5 class="modal-title" id="createStudentModalLabel">Add Student</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="studentName" class="form-label">Student Name</label>
                                        <input type="text" class="form-control" id="studentName" name="name" required>
                                    </div>
                                    <div class="mb-1">
                                        <label for="roomName" class="form-label">Room Name</label>
                                        <select class="form-control" id="roomName" name="room_id" required>
                                            @foreach ($rooms as $room)
                                                <option value="{{ $room->id }}">{{ $room->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#createStudentForm').on('submit', function(event) {
                            event.preventDefault(); // Prevent default form submission

                            var formData = $(this).serialize(); // Serialize form data

                            $.ajax({
                                url: "{{ route('student.store') }}", // Laravel route for storing student
                                type: "POST",
                                data: formData,
                                success: function(response) {
                                    $('#createStudentModal').modal('hide'); // Hide the modal
                                    alert('Student added successfully!');
                                    location.reload(); // Reload the page to reflect changes
                                },
                                error: function(response) {
                                    // Handle validation errors
                                    var errors = response.responseJSON.errors;
                                    $.each(errors, function(key, value) {
                                        alert(value);
                                    });
                                }
                            });
                        });
                    });

                    // ====for edit student==============

                    $(document).ready(function() {
                        $('form[id^="editStudentForm"]').on('submit', function(event) {
                            event.preventDefault(); // Prevent default form submission

                            var formId = $(this).attr('id'); // Get the form ID
                            var studentId = formId.replace('editStudentForm', ''); // Extract student ID
                            var formData = $(this).serialize(); // Serialize form data

                            $.ajax({
                                url: "/student/" + studentId, // Laravel route for updating student
                                type: "PUT",
                                data: formData,
                                success: function(response) {
                                    $('#editStudentModal' + studentId).modal('hide'); // Hide the modal
                                    alert('Student updated successfully!');
                                    location.reload(); // Reload the page to reflect changes
                                },
                                error: function(response) {
                                    // Handle validation errors
                                    var errors = response.responseJSON.errors;
                                    $.each(errors, function(key, value) {
                                        alert(value);
                                    });
                                }
                            });
                        });
                    });
                    // ====for view student details==============
                    $(document).ready(function() {
                        $('#studentDetailsModal').on('show.bs.modal', function(event) {
                            var button = $(event.relatedTarget); // Button that triggered the modal
                            var studentId = button.data('id'); // Extract student ID from data-id attribute
                            var modal = $(this);

                            $.ajax({
                                url: "/student/" + studentId, // Laravel route to fetch student details
                                type: "GET",
                                success: function(response) {
                                    // Load the student details into the modal body
                                    modal.find('#studentDetailsBody').html(
                                        '<div class="row mb-3"><div class="col-md-4 font-weight-bold">Student Name:</div><div class="col-md-8">' +
                                        response.name + '</div></div>' +
                                        '<div class="row mb-3"><div class="col-md-4 font-weight-bold">Room Name:</div><div class="col-md-8">' +
                                        response.room.name + '</div></div>'
                                    );
                                },
                                error: function(response) {
                                    alert('An error occurred while fetching the student details.');
                                }
                            });
                        });
                    });
                </script>
                <!-- EditStudentModal  -->
                <div class="modal fade" id="editStudentModal{{ $student->id }}" tabindex="-1"
                    aria-labelledby="editStudentModalLabel{{ $student->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="/student/{{ $student->id }}">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editStudentModalLabel{{ $student->id }}">Edit Student</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="editStudentName{{ $student->id }}" class="form-label">Student
                                            Name</label>
                                        <input type="text" name="name" class="form-control"
                                            id="editStudentName{{ $student->id }}" value="{{ $student->name }}"
                                            placeholder="Enter name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editRoomName{{ $student->id }}" class="form-label">Room</label>
                                        <select class="form-control" id="editRoomName{{ $student->id }}" name="room_id"
                                            required>
                                            @foreach ($rooms as $room)
                                                <option value="{{ $room->id }}"
                                                    {{ $student->room->id == $room->id ? 'selected' : '' }}>
                                                    {{ $room->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- ViewStudentModal   -->
                <div class="modal fade" id="studentDetailsModal{{ $student->id }}" tabindex="-1"
                    aria-labelledby="studentDetailsModalLabel{{ $student->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-info text-white">
                                <h5 class="modal-title" id="studentDetailsModalLabel{{ $student->id }}">Student Details
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <div class="col-md-4 font-weight-bold">Student Name:</div>
                                    <div class="col-md-8">{{ $student->name }}</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 font-weight-bold">Room Name:</div>
                                    <div class="col-md-8">{{ $student->room->name }}</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 font-weight-bold">Room ID:</div>
                                    <div class="col-md-8">{{ $student->room->id }}</div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
