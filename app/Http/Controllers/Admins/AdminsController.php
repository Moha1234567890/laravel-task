<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use File;
class AdminsController extends Controller
{
    

    public function viewLogin() {

        return view('admins.login');
    }



    public function checkLogin(Request $request) {

        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            
            return redirect() -> route('admins.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
    }




    public function index() {

        return view('admins.index');
    }


    public function allProducts() {


        $products= Product::all();
        return view('admins.all-proudcts', compact('products'));
    }


    public function createProducts() {


        return view(view: 'admins.create-proudcts');
    }


    public function insertProducts(Request $request) {


        Request()->validate([
            "title" => "required|max:40",
            "price" => "required|max:40",
            "image" => "required|mimes:jpeg,jpg,png,gif|max:10000",
            "brand" => "required|max:40",
            "details" => "required|min:30",
        ]);



        $destinationPath = 'assets/images/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);

        $storeProducts = Product::create([

            'title' => $request->title,
            'price' => $request->price,
            'image' => $destinationPath . $myimage,
            'brand' => $request->brand,
            'details' => $request->details,
            

        ]);


        if($storeProducts) {

            return redirect('/admin/all-products/')->with('success', 'product added successfully');

        }
    }


    public function editProducts($id) {

        $product = Product::find($id);

       // return view(view: 'admins.edit-proudcts', compact('product'));
        return view(view:'admins.edit-proudcts', data: compact(var_name: 'product'));
    }


    

    public function updateProducts(Request $request, $id) {

        Request()->validate([
            "title" => "required|max:40",
            "price" => "required|max:40",
            "image" => "required|mimes:jpeg,jpg,png,gif|max:10000",
            "brand" => "required|max:40",
            "details" => "required|min:30",
        ]);

        $productUpdate = Product::find($id);


        //deleting old file
        if(File::exists(public_path('assets/images/' . $productUpdate->image))){
            File::delete(public_path('assets/images/' . $productUpdate->image));
        }else{
            //dd('File does not exists.');
        }

        $destinationPath = 'assets/images/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);


        $productUpdate->update([
            'title' => $request->title,
            'price' => $request->price,
            'image' => $destinationPath . $myimage,
            'brand' => $request->brand,
            'details' => $request->details,
            
        ]);

    

        if($productUpdate) {
                return redirect('/admin/all-products/')->with('update', 'Category updated successfully');

        }
    } 
    

    


    public function deleteProducts($id) {

        $deleteProduct = Product::find($id);


        if(File::exists(public_path( $deleteProduct->image))){
            File::delete(public_path( $deleteProduct->image));
        }else{
            //dd('File does not exists.');
        }

        $deleteProduct->delete();

        if($deleteProduct) {
            return redirect('admin/all-products/')->with('delete', 'product deleted successfully');

        }
    }
    
}
