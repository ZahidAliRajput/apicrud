<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getproducts()
    {
        $products = Product::all();
        return response()->json(['products' => $products]);
    }

    public function getproduct($id){
        $product = Product::find($id);
        if($product){
            return response()->json(['product' => $product]);
        }
        else{
        return response()->json(['message' => 'No, product found'], 404);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'qty' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['message' => 'Input Data is missing'], 400);
        }

        $product = new Product();
        
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $productadded = $product->save();
        
        if($productadded){
            return response()->json(['message', 'Product is added'], 200);
        }
        else{
            return response()->json(['message', 'Something went wrong.'],300);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function updateproduct(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'qty' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['message' => 'Input Data is missing'], 400);
        }

        $product = Product::find($id);
        
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $productupdated = $product->update();
        if($productupdated){
            return response()->json(['message', 'Product is Updated'], 200);
        }
        else{
            return response()->json(['message', 'Something went wrong.'],404);
        }
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product){
            $product->delete();
            return response()->json(['message', 'Product is deleted'], 200);
        }
        else{
            return response()->json(['message', 'Product is not deleted'], 404);
        }
    }
}
