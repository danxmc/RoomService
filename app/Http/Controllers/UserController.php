<?php

namespace App\Http\Controllers;

use App\User;
use App\Room;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::check())
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
        }
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
        //Validate
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'image' => 'required_unless:role, "CLIENT"|image',
        ]);
        
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
        if($request->has('image')){
            $image = $request->file('image');
            $photoName = time() . $image->getClientOriginalName();
            $image->move(public_path('\img\users'), $photoName);

            $picture = Image::create([
                'route' => '/img/users/'.$photoName,
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
        if($user->room != NULL){
        $room = $user->room;
        }else{
        $room="no";
        }
        
        $rooms = Room::where('status', false)->get();
        return view('users.edit', compact('user', 'rooms', 'room'));
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
        //Validate
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        
        $data = $request->all();


        if ($request['password'] != '') {
            $data['password'] = Hash::make($request['password']);
        }else{
            unset($data['password']);
        }
        
        // Unset previous room status
        if ($user->room != NULL) {
            $room = Room::findOrFail($user->room->id)->update(['status' => false, 'user_id' => NULL]);
            $user->room->status = false;
        }
        
        // Set new Room
        if($request['room_id'] ){
        if($room = Room::findOrFail($request['room_id']))
        {
            $room->status = true;
            $user->room()->save($room);
        }
    }
        
        User::findOrFail($user->id)->update($data);
            
        if ($request->file('image')) {
            // Unset previous image
            if($user->image !=NULL)
            {
            $image1 = $user->image;
            $image1->user()->dissociate();
            $image1->save();
            $user->image->null;
            $user->save();
            }
            
            // Sets image for the user
            $image = $request->file('image');
            $photoName = time() . $image->getClientOriginalName();
            $image->move(public_path('\img\users'), $photoName);

            $picture = Image::create([
                'route' => '/img/users/'.$photoName,
                ]);
            $user->image()->save($picture);
            $picture->user()->associate($user)->save();
        }
        
        $request->session()->flash('message', 'Successfully modified the user!');
       
            return redirect('/users/' . $user->id);
        
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
        foreach ($user->orders as $order){
            $order->delete();
        }
        $user->delete();
        $request->session()->flash('message', 'Successfully deleted the user!');
        return redirect('users');
    }
}
