<?php

namespace App\Http\Controllers;


use App\Catalog;
use App\Order;
use App\Seo;
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
            'count' => $request->count,
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
        $catalog->count = $request->count;
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
    
    /**
     * Seo section
     */
    
    public function indexSeo(){
        $seos = Seo::all();
        return view('admin.seo', ['seos' => $seos]);
    }
    
    public function createSeo(){
        Seo::create([
            'name' => 'name',
            'slug' => 'slug',
            'description' => 'description',
            'keywords' => 'keywords',
            'title' => 'title',
        ]);
        return redirect()->back();
    }

    public function updateSeo(Request $request){
        $item = Seo::find($request->id);
        if(isset($item) && isset($item[$request->column])){
            $item[$request->column] = $request->value;
            $item->save();
        }
        return response()->json(['status' => 'complete']);
    }
    
    /**
     * End seo section
     */

}