<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all records
         $products = products::all();
         return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
            $request->validate([
                    'title' => 'required|max:255',
                    'description' => 'required',
                    'price' => 'required',
                    'price_category' => 'required',
            ]);

            $products = new products([
                    'title' => $request->get('title'),
                    'description' => $request->get('description'),
                    'price' => $request->get('price'),
                    'price_category' => $request->get('price_category'),
            ]);

            $products->save();
            return response()->json($products);
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
        //
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
        $products = products::findOrFail($id);

        $request->validate([
           'title' => 'required|max:255',
                    'description' => 'required',
                    'price' => 'required',
                    'price_category' => 'required',
        ]);

        $products->title = $request->get('title');
        $products->description = $request->get('description');
        $products->price = $request->get('price');
        $products->price_category = $request->get('price_category');
        $products->save();

        return response()->json($products);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = products::findOrFail($id);
        $products->delete();

        return response()->json($products::all());
    }
}
