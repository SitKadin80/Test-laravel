<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Room1Request;
use App\Http\Requests\RoomRequest;
use App\Models\Room;
use Illuminate\Http\Request;

class Room1Controller extends Controller
{   
   
    public function index()
    {
        $data = Room::all();
        return view('room.index', ['data' => $data]);
    }
    
    public function create()
    {
        return view('room.add');
    }
  
    public function store(Room1Request $request)
    {
        Room::create($request->all());

        return redirect()->back();
    }

  
    public function show(string $id)
    {
        $data = Room::find($id);
        return view('room.show', ['data' => $data]);
    }

   
    public function edit(string $id)
    {
        $room = Room::where('id', $id)->first();
        

        return view('room.edit', ['data' => $room]);
    }

    public function update(Request $request, string $id)
    {
        Room::where('id', $id)->update([
            'name' => $request->name
        ]);

        return redirect('/room');
    }

    public function destroy(string $id)
    {
        Room::where('id', $id)->delete();
        return redirect()->back();
    }
}
