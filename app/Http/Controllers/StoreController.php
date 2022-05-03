<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function onCreateStore(Request $request)
    {
        $store = Store::insert([
            'storeName' => $request->storeName,
            'address' => $request->address,
            'tel' => $request->tel
        ]);
    }

    public function ShowStore()
    {
        $store = Store::all();
        return view('stores.store', [
            'viewContent' => $store
        ]);
        // return response(['data' => $store]);
    }
    public function StoreData()
    {
        $store = Store::all();
        return response([
            'data' => $store
        ]);
        // return response(['data' => $store]);
    }


    public function UpdateStore(Request $request)
    {
        $request->validate([
            'storeName' => 'required',
            'address' => 'required',
            'tel' => 'required'
        ]);
        $store = Store::where('id', $request->id)->update([
            'storeName' => $request->storeName,
            'address' => $request->address,
            'tel' => $request->tel
        ]);
    }

    public function DestroyStore($id)
    {
        Store::where('id', $id)->delete();
    }

    public function StoreIdData($id)
    {
        $store = Store::where('id', $id)->get()->first();
        return view(
            'products.product',[
            'Store' => $store
        ]);
    }
}
