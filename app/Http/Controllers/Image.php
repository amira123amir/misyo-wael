<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class Image extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('image');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {    
        $image =$request->file('image')->getClientOriginalName();
        //  $request->file('image')->storeAs('op',$image,'public');
         $n= $request->file('image')->storeAs('products',$image,'public');
            $product=Product::find(4);
       $product->update([
            'image'=>$image,
        ]);
        
        return "hello";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
