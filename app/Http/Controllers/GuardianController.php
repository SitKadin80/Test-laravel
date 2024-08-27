<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Guardian;
use Illuminate\Http\Request;

class GuardianController extends Controller
{


    public function index()
    {
        $parents = Guardian::with('student', 'teacher')->get();

        return view('room.index', ['rooms' => $parents]);
    }
    
    public function showFromCreateRoom(){
        return view('room.create');
    }
public function createRoom(Request $request)
{
    // Validate the input
    $request->validate([
        'name' => 'required|string|max:255',
        'teacher_id' => 'required|exists:teachers,id',
        'student_id' => 'required|exists:students,id',
    ]);

    // Create the room
    Guardian::create([
        'name' => $request->name,
        'teacher_id' => $request->teacher_id,
        'student_id' => $request->student_id
    ]);

    return redirect('room');
}

// show form room update 
public function formUpdateRoom($id){
    $room = Guardian::find($id);
    if ($room) {
        return view('room.update',['room' => $room]);
    }
    return redirect('room');
}

// update room
public function updateRoom(Request $request, $id)    
{
    $room = Guardian::find($id);
    $room->update([
        'name' => $request->name,
       'teacher_id'=>$request->teacher_id,
        'student_id'=>$request->student_id
    ]);
    return redirect('room');
}

// delete room 
public function deleteRoom($id)
{
    Guardian::find($id)->delete();

    return redirect('room');
}
}


