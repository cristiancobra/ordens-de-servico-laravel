<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;
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

    $orders = Order::orderBy('id', 'ASC')
        ->where('finished', null)
        ->get();

    $products = Product::getActives();
    
    return view('order.index', compact(
        'orders',
        'products',
    ));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\OrderStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderStoreRequest $request)
    {
        $validated = $request->validated();

        $order = new Order;
        $order->customer_id = Customer::findIdOrCreate( $validated );
        $order->product_id = $validated['product_id'];
        $order->start_date = $validated['start_date'];
        $order->save();

        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $products = Product::getActives();

        return view('order.edit', compact(
            'order',
            'products',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
    * @param  \App\Http\Requests\OrderUpdateRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderUpdateRequest $request, Order $order)
    {
        $validated = $request->validated();

        $order->product_id = $validated['product_id'];
        $order->start_date = $validated['start_date'];
        $order->save();

        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function ajaxUpdate( $id )
    {
        $order = Order::find($id);

        if( $order->finished == null ) {
            $order->finished = 1;
        } elseif ( $order->finished = 1 ) {
            $order->finished = null;
        }

        $order->save();

        return $order->toJson();

    }

}
