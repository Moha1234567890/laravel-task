<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function search(Request $request)
    {
        Request()->validate([
            "keyword" => "required",
           
         
        ]);


        
        $keyword = $request->get('keyword');
       
       

        $searches = Product::select()->where('title', 'like', "%$keyword%")
         ->orWhere('brand', 'like', "%$keyword%")
         ->orWhere('price', 'like', "%$keyword%")
         ->get();

        //return  $searches;
        return view('products.search', compact('searches'));
    }
}
