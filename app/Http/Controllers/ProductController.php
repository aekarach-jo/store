<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;


use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ProductData()
    {
        $product = Product::all();
        return response([
            'data' => $product
        ]);
    }
    public function ShowProduct(Request $request)
    {
        // dd($request->input('id'));
        $store = Store::where('id', $request->input('id'))->get()->first();
        $product = Product::where('store_id', $request->input('id'))->get()->all();
        // dd($product);
        return view(
            'products.product',
            [
                'Product' => $product,
                'Store' => $store
            ]
        );
    }

    public function onCreateProduct(Request $request)
    {
        $image = $this->uploadImage($request->image[0]);
        Product::insert([
            'product_name' => $request->product_name,
            'category' => $request->category,
            'unit' => $request->unit,
            'image' => $image,
            // 'image' => ($request->image == null) ? "" : $request->image,
            'store_id' => $request->store_id
        ]);
    }
    public function DestroyProduct($id){
        Product::where('id', $id)->delete();
    }

    public function UpdateProduct(Request $request)
    {
        
        // $request->validate([
        //     'product_name' => 'required',
        //     'category' => 'required',
        //     'unit' => 'required',
        // ]);
        // dd($request->image[0]);
        $image = $this->uploadImage($request->image[0]);
        // dd($image);
        $product = Product::where('id', $request->id)->update([
            'product_name' => $request->product_name,
            'category' => $request->category,
            'unit' => $request->unit,
            'image' =>  $image
            // 'image' => ($request->image == null) ? "" : $request->image,
        ]);
    }


    public function uploadImage($file = null){
        $file->move(public_path().'/upload/', $file->getClientOriginalName());
        return '/upload/'.$file->getClientOriginalName();
    }
}


