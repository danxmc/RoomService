<?php

namespace App\Http\Controllers;

use App\Order;
use App\Meal;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $meals = Meal::all();
        return view('orders.create', compact('meals'));
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
            'phone' => 'required|min:7',
            'room' => 'required',
        ]);
        $data = $request->all();
        $data['status'] = false;
        $order = Order::create($data);

        $data['orderMealQuantity'] = array_filter($data['orderMealQuantity']);// Removes empty array elements
        $data['orderMealQuantity'] = array_values($data['orderMealQuantity']);// Reindexes array

        foreach ($data['orderMeal'] as $key => $value) {
            $order->meals()->attach($value, ['meal_quantity' => $data['orderMealQuantity'][$key]]);
        }
        return redirect('/orders/' . $order->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $meals = Meal::all();
        return view('orders.edit', compact('order', 'meals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //Validate
        $request->validate([
            'name' => 'required',
            'phone' => 'required|min:7',
            'room' => 'required',
        ]);
        $data = $request->all();
        $data['status'] = ($request['status'] == "true") ? true : false ;
        
        $order->meals()->detach();

        $data['orderMealQuantity'] = array_filter($data['orderMealQuantity']);// Removes empty array elements
        $data['orderMealQuantity'] = array_values($data['orderMealQuantity']);// Reindexes array

        foreach ($data['orderMeal'] as $key => $value) {
            $order->meals()->attach($value, ['meal_quantity' => $data['orderMealQuantity'][$key]]);
        }
        
        $order = Order::findOrFail($order->id)->update($data);
        $request->session()->flash('message', 'Successfully modified the order!');
        return redirect('orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Order $order)
    {
        $order->delete();
        $request->session()->flash('message', 'Successfully deleted the order!');
        return redirect('orders');
    }
}
