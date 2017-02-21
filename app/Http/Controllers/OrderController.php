<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderPost;
use App\Order;
use App\PostaOrder;
use Illuminate\Http\Request;

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


    /**
     * it's not really order. Just phone call
     * @param StoreOrderPost $request
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * Order from nowa poshta form
     */
    public function createPoshtaOrder(Request $request){

        PostaOrder::create([
           'city_poster' => $request->city_poster,
           'type-of-services' => $request->type_of_services,
           'departyre-type' => "",
           'phone_recipient' => $request->phone_recipient,
           'phone_poster' => $request->phone_poster,
           'name_recipient' => $request->name_recipient,
           'name_poster' => $request->name_poster,
           'sender' => "",
           'recipient' => "",
           'product-type' => $request->product_type,
           'product-count' => $request->product_count,
           'email_poster' => $request->email_poster,
           'email_recipient' => $request->email_recipient,
        ]);

        return "<h3 style='text-align: center;  font-size: 25px;  padding-top: 40px;'>Заказ оформен. Скоро мы с вами свяжемся</h3>";

    }

}