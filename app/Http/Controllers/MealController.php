<?php

namespace App\Http\Controllers;

use App\Meal;
use App\User;
use App\Image;
use Illuminate\Http\Request;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Meal::where('category','Food')->get();
        $drinks = Meal::where('category','Drink')->get();
        $desserts = Meal::where('category','Dessert')->get();
        $users = User::where('role', 'COOK')->get();
        return view('meals.index', compact('foods','drinks','desserts','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meals.create');
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
            'price' => 'required',
            'description' => 'required',
            'category' => 'required',
            'image.*' => 'required|image',
        ]);
        
        $meal = Meal::create($request->all());
        if($request->has('image')){
        $images = $request->file('image');
        foreach($images as $image){
            if($image != NULL){
            $photoName = time() . $image->getClientOriginalName();
            $image->move(public_path('\img\meals'), $photoName);

            $picture = Image::create([
                'route' => '/img/meals/'.$photoName,
                ]);
            $meal->images()->save($picture);
            $picture->meal()->associate($meal)->save();
            }
        }
    }
        return redirect('/meals/' . $meal->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        $cate = $meal->category;
        $meals = Meal::where('category', $cate)->get();
        return view('meals.show', compact('meal', 'meals'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {
        return view('meals.edit', compact('meal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        //Validate
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category' => 'required',
            'image.*' => 'required|image',
        ]);
        
        if($request->has('del_img')){
            $del_imgs = $request->post('del_img');

            foreach($del_imgs as $id){
                $picture =  Image::find($id);
                if($picture != NULL){
                    $picture->delete();
                }
                
            }
        }
        
        if($request->has('image')){
            $images = $request->file('image');
            foreach($images as $image){
                if($image != NULL){
                    $photoName = time() . $image->getClientOriginalName();
                    $image->move(public_path('\img\meals'), $photoName);
                    $picture = Image::create([
                        'route' => '/img/meals/'.$photoName,
                    ]);
                    $meal->images()->save($picture);
                    $picture->meal()->associate($meal)->save();
                }
            }
        }
        Meal::findOrFail($meal->id)->update($request->all());

        $request->session()->flash('message', 'Successfully modified the meal!');
        return redirect('/meals/' . $meal->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Meal $meal)
    {
        $meal->delete();
        $request->session()->flash('message', 'Successfully deleted the meal!');
        return redirect('meals');
    }
    
    public function price(Request $request)
    {
        $meal = Meal::find($request->get("meal"));
        return response('' . $meal->price);
    }
}
