<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storedData = $request-> validate([
            'product_name'=>'required | max:255',
            'product_description'=>'required | max:255',
            'quantity'=>'required | numeric',
            'price'=>'required | numeric',
            'status'=>'required | max:255',
        ]);
        $products = Product::create($storedData);
        return redirect('products')-> with('Completed','New Product has been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::findorfail($id);
        return view('edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateData = $request-> validate([
            'product_name'=>'required | max:255',
            'product_description'=>'required | max:255',
            'quantity'=>'required | numeric',
            'price'=>'required | numeric',
            'status'=>'required | max:255',
        ]);

        Product::whereId($id)->update($updateData);
        return redirect('products')->with('Updated!','Product has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::findorfail($id);
        $products->delete();
        return redirect('products')-> with('Deleted.', 'Product has been removed');
    }
}
