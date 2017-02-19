<?php

namespace App\Http\Controllers;

use App\Catalog;

class CatalogController extends Controller
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
        $catalogs = Catalog::all();
        return view('catalog', ['catalogs' => $catalogs]);
    }

    public function thankyou()
    {
        return view('thankyou');
    }

}