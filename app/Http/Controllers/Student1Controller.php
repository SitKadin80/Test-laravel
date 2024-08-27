<?php

namespace App\Http\Controllers;
use App\Http\Requests\Student1Request;
use App\Models\Room;
use App\Models\Student;
use Illuminate\Http\Request;

class Student1Controller extends Controller
{
    
    public function index()
    {
        $students = Student::all();
        $rooms = Room::all();
        
        // return view('student.index', ['students' => $students, 'rooms' => $rooms]);
        return view('student.index', compact('students', 'rooms'));
    }
    // public function index()
    // {
    //     $students = Student::with('room')->get(); 
    //     return view('student.index', compact('students'));
    // }
    
    
    public function create()

    {
        $rooms = Room::all();
        return view('student.add',['rooms' => $rooms]);
    }

   
    public function store(Student1Request $request)
    {

        
        Student::create($request->all());

        return redirect()->back();
    }

    public function show(string $id)
    {
        $data = Student::find($id);

        return view('student.show', ['data' => $data]);
    }

   
    public function edit(string $id)
    {
        $student = Student::find($id);

    return view('student.edit', ['student' => $student]);
    }


//     public function update(Request $request, $id)
// {
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'room_id' => 'required|exists:rooms,id',
//     ]);

//     $student = Student::findOrFail($id);
//     $student->name = $request->name;
//     $student->room_id = $request->room_id;
//     $student->save();

//     return redirect()->back()->with('success', 'Student updated successfully');
// }
   
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->room_id = $request->input('room_id');
        $student->save();
        Student::where('id', $id)->update([
            'name' => $request->name,
            'room_id' => $request->room_id
        ]);

        return redirect('/student');
    }

  
    public function destroy(string $id)
    {
        Student::where('id', $id)->delete();

        return redirect('/student');
    }
}
