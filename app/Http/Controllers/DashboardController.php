<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Requests\FilterOrdersRequest;


class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @param  \App\Http\Requests\FilterOrdersRequest  $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index( FilterOrdersRequest $request )
    {

    $orders = Order::filterOrders( $request );


    return view('dashboard.orders', compact(
        'orders',
    ));
    
    }
}
