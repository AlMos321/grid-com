<?php

namespace App\Http\Controllers;

use App\Seo;

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
        $pageSlug = "index";
        $seoData = $this->getSeo($pageSlug);
        return view('index', ['seoData' => $seoData]);
    }

    public function thankyou()
    {
        $pageSlug = "thankyou";
        $seoData = $this->getSeo($pageSlug);
        return view('thankyou', ['seoData' => $seoData]);
    }

    public function about()
    {
        $pageSlug = "about";
        $seoData = $this->getSeo($pageSlug);
        return view('about', ['seoData' => $seoData]);
    }

    public function delivery()
    {
        $pageSlug = "delivery";
        $seoData = $this->getSeo($pageSlug);
        return view('delivery', ['seoData' => $seoData]);
    }

    public function novaPoshta(){
        $pageSlug = "poshta";
        $seoData = $this->getSeo($pageSlug);
        return view('index2', ['seoData' => $seoData]);
    }

    /**
     * Get seo for page
     */
    private function getSeo($slug){
        $seo = Seo::where('slug', '=', $slug)->first();
        if(isset($seo)){
            $seoData['title'] = $seo->title;
            $seoData['description'] = $seo->description;
            $seoData['keywords'] = $seo->keywords;
        } else {
            $seoData['title'] = "";
            $seoData['description'] = "";
            $seoData['keywords'] = "";
        }
        return $seoData;
    }

    public function posta(){
        return view('posta');
    }

}