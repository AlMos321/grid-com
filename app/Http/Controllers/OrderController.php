<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderPost;
use App\Order;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }


    public function createOrder(StoreOrderPost $request)
    {
        Order::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => 'new',
            'description' => ''
        ]);

        return response()->json(['status' => 'complete']);
    }

}