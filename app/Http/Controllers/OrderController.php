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

        TelegramController::sendMessages('Новый заказ. Телефон - '.$request->phone.'.Имя - '.$request->name.'.Емейл - '.$request->email);

        return response()->json(['status' => 'complete']);
    }

}