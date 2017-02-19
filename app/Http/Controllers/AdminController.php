<?php

namespace App\Http\Controllers;


use App\Catalog;
use App\Order;
use \Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
        $catalogs = Catalog::all();
        return view('admin.index', ['catalogs' => $catalogs]);
    }
    


    public function createView(){
        return view('admin.create');
    }


    public function updateView(Request $request){
        $catalog = Catalog::find($request->id);
        return view('admin.update', ['catalog' => $catalog]);
    }


    public function createProduct(Request $request){
        Catalog::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'images' => $request->images,
        ]);
        return redirect('/admin');
    }


    public function removeProduct(Request $request){
        $catalog = Catalog::find($request->id);
        $catalog->delete();
        return redirect()->back();
    }


    public function updateProduct(Request $request){
        $catalog = Catalog::find($request->id);
        $catalog->name = $request->name;
        $catalog->description = $request->description;
        $catalog->price = $request->price;
        $catalog->images = $request->images;
        $catalog->save();
        return redirect()->back();
    }
    
    /**
     * Oreder section
     */
    
    public function indexOrder(){
        $orders = Order::all();
        return view('admin.order', ['orders' => $orders]);
    }

    public function changeOrderValue(Request $request){
        $order = Order::find($request->id);
        if(isset($order) && isset($order[$request->column])){
            $order[$request->column] = $request->value;
            $order->save();
        }
        return response()->json(['status' => 'complete']);
    }

    public function removeOrder(Request $request){
        Order::find($request->id)->delete();
        return response()->json(['status' => 'complete']);
    }
    
    /**
     * End order section
     */

}