<?php

namespace App\Http\Controllers;

use App\Room;
use App\User;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['status'] = false;

        $room = Room::create($data);

        return redirect('/rooms/' . $room->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $data = $request->all();
        
        if ($request['status'] == "true") {
            $data['status'] = true;
        } else {
            $data['status'] = false;
            $data['user_id'] = NULL;
        }

        $room = Room::findOrFail($room->id)->update($data);
        $request->session()->flash('message', 'Successfully modified the room!');
        return redirect('rooms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Room $room)
    {
        $room->delete();
        $request->session()->flash('message', 'Successfully deleted the room!');
        return redirect('rooms');
    }

    /**
     * Show the Occupied Rooms
     * 
     * @return \Illuminate\Http\Response
     */
    public function occupied()
    {
        $rooms = Room::where('status', true)->get();
        return view('rooms.occupied', compact('rooms'));
    }

    /**
     * Show the Delivered Orders
     * 
     * @return \Illuminate\Http\Response
     */
    public function vacant()
    {
        $rooms = Room::where('status', false)->get();
        return view('rooms.vacant', compact('rooms'));
    }
}
