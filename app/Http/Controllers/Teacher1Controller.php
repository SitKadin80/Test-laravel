<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher1Request;
use App\Models\Room;
use App\Models\Teacher;
use Illuminate\Http\Request;

class Teacher1Controller extends Controller
{

    public function index()
    {
        $data = Teacher::all();
        return view('teacher.index', compact('data'));
    }


    public function create()
    {
        $rooms = Room::all();
        return view('teacher.add', ['rooms' => $rooms]);
    }


    public function store(Teacher1Request $request)
    {
        $entry = Teacher::create([
            'name' => $request->name
        ]);

        $entry->rooms()->attach($request->room);

        return redirect()->back();
    }


    public function show(string $id)
    {
        $data = Teacher::find($id);

        return view('teacher.show', ['data' => $data]);
    }


    public function edit(string $id)
    {
        $teacher = Teacher::where('id', $id)->first();
        $rooms = Room::get();

        return view('teacher.edit', ['data' => $teacher, 'rooms' => $rooms]);
    }


    public function update(Request $request, string $id)
    {
        $entry = Teacher::find($id);

        $entry->update([
            'name' => $request->name
        ]);

        $entry->rooms()->sync($request->room);

        return redirect('/teacher');
    }


    public function destroy(string $id)
    {
        $entry = Teacher::find($id);

        $entry->rooms()->detach();

        $entry->delete();

        return redirect()->back();
    }
}
