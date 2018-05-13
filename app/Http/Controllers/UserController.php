<?php

namespace App\Http\Controllers;

use App\User;
use App\Room;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
                if(Auth::user()->role == 'ADMIN')
            {
                $users = User::all();
            }
            if(Auth::user()->role == 'LOBBY')
            {
                $users = User::where('role', 'CLIENT')->get();
            }
            return view('users.index', compact('users'));
        
            return redirect('/');
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::where('status', false)->get();
        return view('users.create', compact('user', 'rooms'));
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
        $data['password'] = Hash::make($request['password']);

        if ($request['room_id'] == 'NoRoom') {
            $user = User::create($data);
        } else {
            //Set new Room
            $room = Room::findOrFail($request['room_id']);
            $room->status = true;
    
            $user = User::create($data);
            $user->room()->save($room);
        }

        // Sets image for the user
        $images = $request->file('image');
        foreach($images as $image){
            $photoName = time() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('\images'), $photoName);

            $picture = Image::create([
                'route' => $photoName,
                ]);
            $user->image()->save($picture);
            $picture->user()->associate($user)->save();
        }

        return redirect('/users/' . $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $rooms = Room::where('status', false)->get();
        return view('users.edit', compact('user', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {   
        //Unset previous room status
        if ($user->room != NULL) {
            $room = Room::findOrFail($user->room->id)->update(['status' => false, 'user_id' => NULL]);
            $user->room->status = false;
        }
        
        if ($request['room_id'] == 'NoRoom') {
            $user = User::findOrFail($user->id)->update($request->all());
        } else {
            //Set new Room
            $room = Room::findOrFail($request['room_id']);
            $room->status = true;
    
            $user->room()->save($room);
            $user = User::findOrFail($user->id)->update($request->all());
        }

        if ($request['image']) {
            // Sets image for the user
            $images = $request->file('image');
            foreach($images as $image){
                $photoName = time() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('\images'), $photoName);
    
                $picture = Image::create([
                    'route' => $photoName,
                    ]);
                $user->image()->save($picture);
                $picture->user()->associate($user)->save();
            }
        }
        
        $request->session()->flash('message', 'Successfully modified the user!');
        if (Auth::user()->role == "ADMIN") {
            return redirect('users');
        } else {
            return view('users.show', compact('user'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        //Unset previous room status
        if ($user->room != NULL) {
            $room = Room::findOrFail($user->room->id)->update(['status' => false, 'user_id' => NULL]);
            $user->room->status = false;
        }
        $user->delete();
        $request->session()->flash('message', 'Successfully deleted the user!');
        return redirect('users');
    }
}
