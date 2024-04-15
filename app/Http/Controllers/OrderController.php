<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Events\OrderCreated;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $validated = $request->validated();

        $order = new Order;

        $order->controller_amount = $validated['controller_amount']; 

        $order->user_id = $request->user()->id;
        $order->status = 'ORDERED'; 
        $order->console_available_id = $request->console_available_id;
        $order->schedule_id = $request->schedule_id;

        $order->save();

        OrderCreated::dispatch($order);

        return redirect('/book');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
