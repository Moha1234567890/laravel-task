<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductsController extends Controller
{
    

    public function getProducts($keyword) {

        $searches = Product::select()->where('category_id', 'like', "%$keyword%")
        ->orWhere('brand', 'like', "%$keyword%")
        ->orWhere('price', 'like', "%$keyword%")
        ->get();


        if($searches->count() == 0) {
            return response()->json([
                "data" => null,
                "msg" => "no data found wiht this search",
                "status" => 401,
            ]);
        }

        return response()->json([
            "data" => $searches,
            "msg" => "success",
            "status" => 200,
        ]);

    }
}
