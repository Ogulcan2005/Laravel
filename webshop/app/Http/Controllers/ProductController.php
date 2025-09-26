<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
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
        return view('welcome.creat_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $validated = Validator::make($request->all(), [
            'name'=> 'required|string|max:20|min:2',
            'price'=> 'required|decimal:2|numeric|min:0',
            'amount'=> 'required|integer|numeric|min:1'
        ], [
            "*.required" => "Dit :attribute is verplicht"
        ])->validate();


    Product::create([
            "name"=> $request->get("name"),
            "price"=> $request->get("price"),
            "amount"=> $request->get("amount")
        ]);
        return redirect()->route("products.welcome");

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
