<?php

namespace App\Http\Controllers;

class FrontController extends Controller
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
    
    
    public function index()
    {
        return view('index');
    }

    public function thankyou()
    {
        return view('thankyou');
    }

    public function about()
    {
        return view('about');
    }

    public function delivery()
    {
        return view('delivery');
    }

}