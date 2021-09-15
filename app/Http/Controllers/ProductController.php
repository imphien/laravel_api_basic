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
        return Product::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name_product=$request->name_product;
        $result = $product->save();
        if( $result)
        {
            return ["Result"=>"Data has been saved"];
        }else
        {
            return ["Result"=>"Error"];
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_product)
    {
        $product = Product::find($request->id_product);
        $product->name_product=$request->name_product;
        $result = $product->save();
        if( $result)
        {
            return ["Result"=>"Data has been updated"];
        }else
        {
            return ["Result"=>"Error"];
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $result=$product->delete();
        if( $result)
        {
            return ["Result"=>"Data has been deleted"];
        }else
        {
            return ["Result"=>"Error"];
        }  
    }

    public function search($name)
    {
        return Product::where("name_product","like","%".$name."%")->get();
    }
}
